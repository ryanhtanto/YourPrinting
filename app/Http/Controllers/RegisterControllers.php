<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterControllers extends Controller
{
    public function index(){
        return view('admin.registration');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:20',
        ]);  

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        
        return redirect('/admin/login')->with('success', 'User registered successfully.');
    }
}
