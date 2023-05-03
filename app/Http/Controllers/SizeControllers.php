<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeControllers extends Controller
{
    public function indexAdmin()
    {
        return view('admin.ukuran', [
            'sizes' => Size::all()
        ]);
    }

    public function destroy(Size $size)
    {
        $ukuran = Size::find($size);
        if ($ukuran) {
            $ukuran->each->delete();
            return back()->with('success', 'Ukuran has been deleted');
        }
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'jenis_ukuran' => 'required|unique:tbl_ukuran',
        ]);

        Size::create($validated);

        return redirect()->back()->with('success', 'Ukuran uploaded successfully.');;
    }

    public function findUpdate($id)
    {
        return view('admin.edit-ukuran', [
            'size' => Size::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $ukuran = Size::find($id);
        $request->validate([
            'jenis_ukuran' => 'required|unique:tbl_ukuran',
        ]);

        $ukuran->jenis_ukuran = $request->input('jenis_ukuran');
        $ukuran->save();

        return redirect('/admin/ukuran')->with('success', 'Ukuran updated successfully');
    }
}
