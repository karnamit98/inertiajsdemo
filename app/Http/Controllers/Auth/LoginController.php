<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller 
{

    public function index()
    {
        return Inertia::render('Auth/Login');
        return 'Please Login!';
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
