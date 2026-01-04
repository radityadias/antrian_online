<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex() {
        return view('login_admin');
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:225',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:225',
            'password' => 'required|string|min:8'
        ]);

        if ($validated) {
            $hashedPassword = Hash::make($validated['password']);
        };

        Admin::create([
            'nama' => $validated['nama'],
            'password' => $hashedPassword,
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}