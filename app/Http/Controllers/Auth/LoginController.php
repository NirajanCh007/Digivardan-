<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function redirectToRoleDashboard()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'patient':
                return redirect()->route('patient.dashboard');
            case 'doctor':
                return redirect()->route('doctor.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect('/');
        }
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route("{$user->roles}.dashboard");
    }


    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
