<?php

namespace App\Http\Controllers;

use Error;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
            $validated = $request->validate([
            'nama' => 'required|string|max:225',
            'password' => 'required|string|min:8'
        ]);

        $user = Admin::where('nama', $validated['nama'])->first();

        // 1. Check if user exists AND password is correct
        if ($user) {
            if (Hash::check($validated['password'], $user->password)){
                Auth::login($user); 
                $request->session()->regenerate();
            }
            else {
                return back()->withErrors([
                    'message' => 'Password doesnt match',
                ]);
            }

            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Username not found',
            ]);
        }

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
