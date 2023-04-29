<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.bahan', [
            'materials' => Material::all()
        ]);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama_bahan' => 'required|unique:tbl_nama_bahan',
        ]);

        Material::create($validated);

        return redirect()->back()->with('success', 'Nama bahan uploaded successfully.');;
    }
    public function destroy(Material $bahan)
    {
        $bahan = Material::find($bahan);
        if ($bahan) {
            $bahan->each->delete();
            return back()->with('success', 'Bahan has been deleted');
        }
    }
    public function findUpdate($id)
    {
        return view('admin.edit-bahan', [
            'material' => Material::find($id),
        ]);
    }
    public function update(Request $request, $id)
    {
        $bahan = Material::find($id);
        $request->validate([
            'nama_bahan' => 'required|unique:tbl_nama_bahan',
        ]);

        $bahan->nama_bahan = $request->input('nama_bahan');
        $bahan->save();

        return redirect('/admin/bahan')->with('success', 'Bahan updated successfully');
    }
}
