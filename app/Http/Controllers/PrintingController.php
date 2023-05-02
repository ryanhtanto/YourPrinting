<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Material;
use App\Models\Printing;
use App\Models\Service;
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
        return view('admin.detail', [
            'printing' => $printing,
            'daftarServices' => $printing,
            'services' => $printing,
            'materials' => $printing,
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
            'jenis_layanan' => 'required',
            'bahan' => 'required',
            'harga' => 'required',
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
        $printing->jenis_layanan = $request->input('jenis_layanan');
        $printing->bahan = $request->input('bahan');
        $printing->harga = $request->input('harga');
        
        $printing->save();
        
        return redirect('/admin/home')->with('success', "Items added into database!");
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
            'jenis_layanan' => 'required',
            'bahan' => 'required',
            'harga' => 'required',
        ]);

        $printing->nama = $request->input('nama');
        $printing->alamat = $request->input('alamat');
        $printing->no_hp = $request->input('no_hp');
        $printing->latitude = $request->input('latitude');
        $printing->longitude = $request->input('longitude');
        if($request->file('picture')){
            $filename = $request->file('picture')->getClientOriginalName();
            if(File::exists(public_path('images/'.$printing['picture']))){
                File::delete(public_path('images/'.$printing['picture']));
            }
            $printing->picture = $filename;
            $request->file('picture')->move(public_path('images'),$filename);
        }
        $printing->jenis_layanan = $request->input('jenis_layanan');
        $printing->bahan = $request->input('bahan');
        $printing->harga = $request->input('harga');
        
        $printing->save();

        return redirect('/admin/home')->with('success', 'Detail printing updated successfully');
    }

    public function viewService()
    {
        return view('admin.add-service',[
            'printings' => Printing::all(),
            'services' => Service::all(),
            'materials' => Material::all(),
        ]);
    }

    public function viewEditService(DaftarService $daftarService)
    {
        return view('admin.edit-detail-service',[
            'printings' => Printing::all(),
            'services' => Service::all(),
            'materials' => Material::all(),
            'daftarService' => $daftarService,
        ]);
    }

    public function addService(Request $request)
    {
        $validated = $request->validate([
            'id_tempat_printing' => 'required',
            'id_service' => 'required',
            'id_bahan' => 'required',
            'harga' => 'required'
        ]);

        DaftarService::create($validated);

        return redirect()->back()->with('success', 'Daftar service addedd successfully.');
    }

    public function editDaftarService(Request $request, $id)
    {
        $daftarService = DaftarService::find($id);
        $request->validate([
            'harga' => 'required'
        ]);

        if($request->input('id_tempat_printing')){
            $daftarService->id_tempat_printing = $request->input('id_tempat_printing');
        }
       
        $daftarService->id_bahan = $request->input('id_bahan');
        $daftarService->id_service = $request->input('id_service');
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
