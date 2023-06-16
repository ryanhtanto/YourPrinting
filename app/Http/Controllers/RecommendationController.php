<?php

namespace App\Http\Controllers;

use App\Models\BobotKriteria;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function indexFilter(Request $request)
    {
        $selectedValue = $request->input('selectedValue');

        $filteredDataBahan = DB::table('tbl_daftar_service')
            ->join('tbl_nama_bahan', 'tbl_daftar_service.id_bahan', '=', 'tbl_nama_bahan.id')
            ->select('tbl_daftar_service.id_bahan', 'tbl_nama_bahan.nama_bahan')
            ->where('id_service', $selectedValue)
            ->groupBy('tbl_daftar_service.id_bahan', 'tbl_nama_bahan.nama_bahan')
            ->get();

        $filteredDataUkuran = DB::table('tbl_daftar_service')
            ->join('tbl_ukuran', 'tbl_daftar_service.id_ukuran', '=', 'tbl_ukuran.id')
            ->select('tbl_daftar_service.id_ukuran', 'tbl_ukuran.jenis_ukuran')
            ->where('id_service', $selectedValue)
            ->groupBy('tbl_daftar_service.id_ukuran', 'tbl_ukuran.jenis_ukuran')
            ->get();

        $tablesFilter = array('arrayBahan' => $filteredDataBahan, 'arrayUkuran' => $filteredDataUkuran);
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
            //array bobot harga
            $bobot_harga_array = [];

            //pengecekan jumlah tempat yang direkomendasi
            if(count($places) == 1){
                $bobot_harga = 1;
                array_push($bobot_harga_array, $bobot_harga);
            }else{
                //menentukan bobot harga
                $maxValue = null;
                $minValue = null;
                foreach($places as $place){
                    if ($maxValue === null || $place->harga > $maxValue) {
                        $maxValue = $place->harga;
                    }
                    if ($minValue === null || $place->harga < $minValue) {
                        $minValue = $place->harga;
                    }
                }
                $rentang = ($maxValue - $minValue);
                foreach($places as $place){
                    $normalisasi = ($place->harga - $minValue) / $rentang;
                    array_push($bobot_harga_array, $normalisasi);
                }
            }
            foreach ($bobot_harga_array as $key => $value) {
                if ($value < 5) {
                    $bobot_harga_array[$key] = $bobot_harga_array[$key] + 1;
                }
            }
            
            //nilai bobot kriteria
            $bobots = BobotKriteria::all();

            foreach($bobots as $bobot){
                $bobotKriteria = array_values($bobot->toArray());
                unset($bobotKriteria[0]);
                $criterias[] = $bobotKriteria;
            }

            //menambahkan setiap bobot kriteria
            $sumCriteria = [];
            foreach ($criterias as $criteria) {
                $sumCriteria[] = array_sum($criteria);
            }

            //array penampung nilai bobot (Wj)
            $bobot_preferensi = [];

            //masukkan ke array bobot preferensi
            foreach($criterias as $criteria){
                $result = [];
                foreach ($criteria as $value) {
                    $result[] = $value / $sumCriteria[0];
                }
                $bobot_preferensi[] = $result;
            }

            //menghitung nilai preferensi alternatif(S)
            $preferensi_alternatif = [];
            $count1 = 0;
            foreach($places as $place){
                $preferensi = pow($place->bobot_jenis_layanan, $bobot_preferensi[0][0]) * pow($place->bobot_bahan, $bobot_preferensi[0][1]) * 
                    pow($bobot_harga_array[$count1], ( -1 * $bobot_preferensi[0][2])) * pow($place->bobot_respon , $bobot_preferensi[0][3]) * 
                    pow($place->bobot_ukuran , $bobot_preferensi[0][4]) ;
                array_push($preferensi_alternatif, $preferensi);
                $count1++;
            }
            //Jumlah nilai normalisasi preferensi alternatif
            $sumPreferensi = array_sum($preferensi_alternatif);

            //menghitung nilai vektor (V)
            $hasil_vektor = [];
            foreach($preferensi_alternatif as $vektor){
                $hasil_vektor_satuan = $vektor/$sumPreferensi;
                array_push($hasil_vektor, $hasil_vektor_satuan);
            }
            // dd($hasil_vektor);
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
