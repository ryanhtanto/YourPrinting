<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Material;
use App\Models\Service;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function index()
    {
        return view('user.recommendation', [
            'services' => Service::all(),
            'materials' => Material::all(),
            'sizes' => Size::all()
        ]);
    }

    public function submitForm(Request $request)
    {
        $id_service = $request->input('id_service');
        $id_bahan = $request->input('id_bahan');
        $id_ukuran = $request->input('id_ukuran');
        $harga = $request->input('harga');

        $places = DB::table('tbl_daftar_service')
            ->join('tbl_nama_bahan', 'tbl_daftar_service.id_bahan', '=', 'tbl_nama_bahan.id')
            ->join('tbl_nama_service', 'tbl_daftar_service.id_service', '=', 'tbl_nama_service.id')
            ->join('tbl_ukuran', 'tbl_daftar_service.id_ukuran', '=', 'tbl_ukuran.id')
            ->join('tbl_tempat_printing', 'tbl_daftar_service.id_tempat_printing', '=', 'tbl_tempat_printing.id')
            ->where('tbl_nama_bahan.id', '=', $id_bahan)
            ->where('tbl_nama_service.id', '=', $id_service)
            ->where('tbl_ukuran.id', '=', $id_ukuran)
            ->where('harga', '<=', intval($harga))
            ->get();

        if(count($places) != 0){
            //array penampung nilai bobot (Wj)
            $bobot_preferensi = [];

            //nilai bobot kriteria
            $kriteria_jenis_layanan = 3;
            $kriteria_bahan = 3;
            $kriteria_jarak = 3;
            $kriteria_harga = 4;
            $kriteria_ukuran = 3;
            $kriteria_respon = 5;
            $criterias = [$kriteria_jenis_layanan, $kriteria_bahan, $kriteria_harga, $kriteria_ukuran, $kriteria_respon];

            //menambahkan setiap bobot kriteria
            $sumCriteria = array_sum($criterias);

            //masukkan ke array bobot preferensi
            foreach($criterias as $criteria){
                array_push($bobot_preferensi, $criteria/$sumCriteria);
            }

            //menghitung nilai preferensi alternatif(S)
            $preferensi_alternatif = [];

            foreach($places as $place){
                $VektorS = pow($place->bobot_jenis_layanan, $bobot_preferensi[0]) * pow($place->bobot_bahan, $bobot_preferensi[1]) * pow($place->bobot_harga, $bobot_preferensi[2]) * pow($place->bobot_ukuran , $bobot_preferensi[3]) * pow($place->bobot_respon , $bobot_preferensi[4]);
                array_push($preferensi_alternatif, $VektorS);
            }
           
            //Jumlah nilai normalisasi preferensi alternatif
            $sumPreferensi = array_sum($preferensi_alternatif);
            
            //menghitung nilai vektor (V)
            $hasil_vektor = [];
            foreach($preferensi_alternatif as $vektor){
                $hasil_vektor_satuan = $vektor/$sumPreferensi;
                array_push($hasil_vektor, $hasil_vektor_satuan);
            }
            
            //sorting places by descending depends on Vector value

            return view('user.hasil-rekomendasi', [
                'places' => $places,
                'hasil_vektor' => $hasil_vektor,
            ]);
        }else{
            echo 'tidak ada data';
        }
    }
}
