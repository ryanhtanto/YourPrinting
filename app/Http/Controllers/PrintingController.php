<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Material;
use App\Models\Printing;
use App\Models\Service;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PrintingController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'printings' => Printing::all(),
        ]);
    }

    public function indexAdmin()
    {
        return view('admin.home', [
            'printings' => Printing::all(),
        ]);
    }

    public function show(Printing $printing)
    {
        return view('user.detail', [
            'printing' => $printing,
            'services' => $printing,
        ]);
    }

    public function showAdmin(Printing $printing)
    {
        $daftar_service = DB::table('tbl_daftar_service')
            ->join('tbl_nama_bahan', 'tbl_daftar_service.id_bahan', '=', 'tbl_nama_bahan.id')
            ->join('tbl_nama_service', 'tbl_daftar_service.id_service', '=', 'tbl_nama_service.id')
            ->join('tbl_ukuran', 'tbl_daftar_service.id_ukuran', '=', 'tbl_ukuran.id')
            ->join('tbl_tempat_printing', 'tbl_daftar_service.id_tempat_printing', '=', 'tbl_tempat_printing.id')
            ->where('tbl_tempat_printing.id', '=', $printing->id)
            ->get();
        
        return view('admin.detail', [
            'printing' => $printing,
            'daftarServices' => $daftar_service,
        ]);
    }

    public function indexAddPrinting()
    {
        return view('admin.add-printing');
    }

    public function indexEditPrinting($id)
    {
        return view('admin.edit-printing',[
            'detailPrinting' => Printing::find($id),
        ]);
    }

    public function storePrinting(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tbl_tempat_printing',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'picture' => 'required',
            'bobot_jenis_layanan' => 'required',
            'bobot_bahan' => 'required',
            'bobot_respon' => 'required',
            'bobot_ukuran' => 'required',
        ]);

        $printing = new Printing();

        $printing->nama = $request->input('nama');
        $printing->alamat = $request->input('alamat');
        $printing->no_hp = $request->input('no_hp');
        $printing->latitude = $request->input('latitude');
        $printing->longitude = $request->input('longitude');
        $filename = $request->file('picture')->getClientOriginalName();
        $printing->picture = $filename;
        $request->file('picture')->move(public_path('images'),$filename);
        $printing->bobot_jenis_layanan = $request->input('bobot_jenis_layanan');
        $printing->bobot_bahan = $request->input('bobot_bahan');
        $printing->bobot_respon = $request->input('bobot_respon');
        $printing->bobot_ukuran = $request->input('bobot_ukuran');

        $printing->save();
        
        return redirect('/admin/home')->with('success', "Printing added into database!");
    }

    public function updateDetail(Request $request, $id)
    {
        $printing = Printing::find($id);
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'bobot_jenis_layanan' => 'required',
            'bobot_bahan' => 'required',
            'bobot_respon' => 'required',
            'bobot_ukuran' => 'required',
        ]);

        $printing->nama = $request->input('nama');
        $printing->alamat = $request->input('alamat');
        $printing->no_hp = $request->input('no_hp');
        $printing->latitude = $request->input('latitude');
        $printing->longitude = $request->input('longitude');
        $printing->bobot_jenis_layanan = $request->input('bobot_jenis_layanan');
        $printing->bobot_bahan = $request->input('bobot_bahan');
        $printing->bobot_respon = $request->input('bobot_respon');
        $printing->bobot_ukuran = $request->input('bobot_ukuran');
        if($request->file('picture')){
            $filename = $request->file('picture')->getClientOriginalName();
            if(File::exists(public_path('images/'.$printing['picture']))){
                File::delete(public_path('images/'.$printing['picture']));
            }
            $printing->picture = $filename;
            $request->file('picture')->move(public_path('images'),$filename);
        }

        $printing->save();

        return redirect('/admin/home')->with('success', 'Detail printing updated successfully');
    }

    public function viewService()
    {
        return view('admin.add-service',[
            'printings' => Printing::all(),
            'services' => Service::all(),
            'materials' => Material::all(),
            'sizes' => Size::all(),
        ]);
    }

    public function viewEditService(DaftarService $daftarService)
    {
        return view('admin.edit-detail-service',[
            'printings' => Printing::all(),
            'services' => Service::all(),
            'materials' => Material::all(),
            'sizes' => Size::all(),
            'daftarService' => $daftarService,
        ]);
    }

    public function addService(Request $request)
    {
        $validated = $request->validate([
            'id_tempat_printing' => 'required',
            'id_service' => 'required',
            'id_bahan' => 'required',
            'id_ukuran' => 'required',
            'harga' => 'required',
        ]);

        DaftarService::create($validated);

        return redirect()->back()->with('success', 'Daftar service addedd successfully.');
    }

    public function editDaftarService(Request $request, $id)
    {
        $daftarService = DaftarService::find($id);
        $request->validate([
            'harga' => 'required',
        ]);

        if($request->input('id_tempat_printing')){
            $daftarService->id_tempat_printing = $request->input('id_tempat_printing');
        }
       
        $daftarService->id_bahan = $request->input('id_bahan');
        $daftarService->id_service = $request->input('id_service');
        $daftarService->id_ukuran = $request->input('id_ukuran');
        $daftarService->harga = $request->input('harga');

        $daftarService->save();

        return redirect()->back()->with('success', 'Daftar service updated successfully.');
    }

    public function destroy(DaftarService $daftarService)
    {
        $services = DaftarService::find($daftarService);
        if ($services) {
            $services->each->delete();
            return back()->with('success', 'Daftar Service has been deleted');
        }
    }
}
