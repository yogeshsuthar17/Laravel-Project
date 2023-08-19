<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Here we can also redirect to the dashboard based on access role, if we have multiple dashboard.
            $user = Auth::user();
            if ($user->access_role == 2 ) { // Check user's access role
                return redirect()->route('login')->with('error', 'You are not allowed to login from here'); // Based on the requirement we are redirecting back to login if the user is customer (whose access_role is 2)
            }
            return redirect()->route('dashboard')->with('success', 'Successfully logged');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
