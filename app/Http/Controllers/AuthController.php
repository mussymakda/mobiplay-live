<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function index()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // If the user is authenticated, redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // If the user is not authenticated, show the login form
        return view('index'); // Make sure this matches your view file name
    }

    // Show the dashboard
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    // Handle login form submission
    public function login(Request $request)
    {

        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // If successful, regenerate the session and redirect to the dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // If unsuccessful, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout the user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
