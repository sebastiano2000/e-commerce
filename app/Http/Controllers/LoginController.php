<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
 
    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('products.index')->with('success', 'Login successful');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show register form
    public function showRegister()
    {
        return view('auth.register');
    }
 
     // Handle registration
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        Auth::login($user);
        return redirect()->route('products.index')->with('success', 'Registration successful');
    }
 
     // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
