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
}
