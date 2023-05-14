<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class RecommendationController extends Controller
{
    public function indexFilter(Request $request)
    {
        $selectedValue = $request->input('selectedValue');

        $filteredDataBahan = DB::table('tbl_filter_bahan')
            ->join('tbl_nama_bahan', 'tbl_filter_bahan.id_bahan', '=', 'tbl_nama_bahan.id')
            ->where('id_service', $selectedValue)
            ->get();

        $filteredDataUkuran = DB::table('tbl_filter_ukuran')
            ->join('tbl_ukuran', 'tbl_filter_ukuran.id_ukuran', '=', 'tbl_ukuran.id')
            ->where('id_service', $selectedValue)
            ->get();

        $filteredDataHarga = DB::table('tbl_filter_harga')
            ->where('id_service', $selectedValue)
            ->get();

        $tablesFilter = array('arrayBahan' => $filteredDataBahan, 'arrayUkuran' => $filteredDataUkuran, 'arrayHarga' => $filteredDataHarga);
        return response()->json($tablesFilter);
    }
    public function index()
    {
        return view('user.recommendation', [
            'services' => Service::all(),
        ]);
    }
    
    public function submitForm(Request $request)
    {
        $request->validate([
            'id_service' => 'required',
            'id_bahan' => 'required',
            'id_ukuran' => 'required',
            'harga' => 'required',
        ]);
        
        //get Location
        $position = Location::get('ipAddress');
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
            //get distance
            $latFrom  = deg2rad($position->latitude);
            $lonFrom  = deg2rad($position->longitude);
            $earthRadius = 6371;
            foreach($places as $place){
                $latTo  = deg2rad($place->latitude);
                $lonTo  = deg2rad($place->longitude);
                
                $latDelta = $latTo - $latFrom;
                $lonDelta = $lonTo - $lonFrom;
                
                $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                $distance = $earthRadius * $angle;
                $place->distance = $distance;
            }

            //array penampung nilai bobot (Wj)
            $bobot_preferensi = [];

            //nilai bobot kriteria
            $kriteria_jenis_layanan = 3;
            $kriteria_bahan = 3;
            $kriteria_jarak = 3;
            $kriteria_harga = 5;
            $kriteria_respon = 4;
            $kriteria_ukuran = 3;
            
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
                $preferensi = pow($place->bobot_jenis_layanan, $bobot_preferensi[0]) * pow($place->bobot_bahan, $bobot_preferensi[1]) * pow($place->bobot_harga, ( -1 * $bobot_preferensi[2])) * pow($place->bobot_ukuran , $bobot_preferensi[3]) * pow($place->bobot_respon , $bobot_preferensi[4]);
                array_push($preferensi_alternatif, $preferensi);
            }
           
            //Jumlah nilai normalisasi preferensi alternatif
            $sumPreferensi = array_sum($preferensi_alternatif);
            
            //menghitung nilai vektor (V)
            $hasil_vektor = [];
            foreach($preferensi_alternatif as $vektor){
                $hasil_vektor_satuan = $vektor/$sumPreferensi;
                array_push($hasil_vektor, $hasil_vektor_satuan);
            }

            //sorting places and hasil vektor by descending depends on Vector value
            $count = 0;
            foreach($places as $place){
                $place->weightedValue = $hasil_vektor[$count];
                $count++;
            }

            $sortedPlaces = collect($places)->sortByDesc('weightedValue');

            return view('user.hasil-rekomendasi', [
                'places' => $sortedPlaces,
            ]);
        }else{
            return view('user.hasil-rekomendasi', [
                'places' => [],
            ]);
        }
    }
}
