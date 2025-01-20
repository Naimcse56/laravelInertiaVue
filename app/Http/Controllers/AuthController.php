<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        sleep(1);
        $validateData = $request->validate([
                            'name' => ['required', 'string', 'max:255'],
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                            'password' => ['required', 'string', 'min:6', 'confirmed'],
                        ]);
        $user = User::create($validateData);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
                            'email' => 'required|email',
                            'password' => 'required|min:6',
                        ]);

        if (Auth::attempt($validateData, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('home'); // Redirect to dashboard or intended page
        }

        // If authentication fails
        return back()->withErrors(['email' => 'Email or Password not found in Database!'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/');
    }
}
