<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\FileUploadTrait;

class AuthController extends Controller
{
    use FileUploadTrait;
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
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
                            'email' => 'required|email',
                            'password' => 'required|min:6',
                        ]);

        if (Auth::attempt($validateData, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect to dashboard or intended page
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

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'avatar' => 'nullable',
        ]);
        $user = auth()->user();
        $user->name = $request->name;
        if ($request->hasFile('avatar')) {
            if($user->avatar)
            {
                $this->deleteFile($user->avatar);
            }
            $user->avatar = $this->uploadFile($request->avatar, 'user-profile-image');
        }
        $user->save();
        return redirect()->route('dashboard');
    }
}
