<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    public function create() {
        return view('registration.admin.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|min:8',
        ]);
    
        // Hash the password before storing it in the database
        $data['password'] = Hash::make($data['password']);
        $data['access_role'] = '1';
        User::create($data);
        return redirect()->route('/')->with('success', 'User registered successfully!');
    }

}

