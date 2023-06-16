<?php

namespace App\Http\Controllers;

use App\Models\BobotKriteria;
use Illuminate\Http\Request;

class BobotKriteriaController extends Controller
{
    public function index()
    {
        return view('admin.bobot', [
            'bobots' => BobotKriteria::all(),
        ]);
    }

    public function editBobotKriteria(Request $request, $id)
    {
        $bobot = BobotKriteria::find($id);
        $request->validate([
            'jenis_layanan' => 'required',
            'bahan' => 'required',
            'respon' => 'required',
            'ukuran' => 'required',
            'harga' => 'required'
        ]);

        $bobot->jenis_layanan = $request->input('jenis_layanan');
        $bobot->bahan = $request->input('bahan');
        $bobot->respon = $request->input('respon');
        $bobot->ukuran = $request->input('ukuran');
        $bobot->harga = $request->input('harga');

        $bobot->save();

        return redirect()->back()->with('success', 'Bobot Kriteria updated successfully.');
    }
}
