<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        return view('admin.layanan', [
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_service' => 'required|unique:tbl_nama_service',
        ]);

        Service::create($validated);

        return redirect()->back()->with('success', 'Nama service uploaded successfully.');
    }

    public function findUpdate($id)
    {
        return view('admin.edit-service', [
            'service' => Service::find($id),
        ]);
    }
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $request->validate([
            'nama_service' => 'required|unique:tbl_nama_service',
        ]);

        $service->nama_service = $request->input('nama_service');
        $service->save();

        return redirect('/admin/layanan')->with('success', 'Layanan updated successfully');
    }

    public function destroy(Service $service)
    {
        $service = Service::find($service);
        if ($service) {
            $service->each->delete();
            return back()->with('success', 'Layanan has been deleted');
        } else {
            return back()->with('error', 'Layanan not found'); // Return an error response if the item is not found
        }
    }
}
