<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Material;
use App\Models\Printing;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $filename = $request->file('picture');
        $printing->picture = $filename;
        $request->file('picture')->store('public/images');
        $printing->jenis_layanan = $request->input('jenis_layanan');
        $printing->bahan = $request->input('bahan');
        $printing->harga = $request->input('harga');
        
        $printing->save();
        
        return redirect('/admin/home')->with('success', "Items added into database!");
    }

    public function viewService()
    {
        return view('admin.add-service',[
            'printings' => Printing::all(),
            'services' => Service::all(),
            'materials' => Material::all(),
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
}
