<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Service;
use App\Models\Size;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        return view('user.recommendation', [
            'services' => Service::all(),
            'materials' => Material::all(),
            'sizes' => Size::all()
        ]);
    }
}
