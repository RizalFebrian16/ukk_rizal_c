<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /*
    ========================
    FORM LOGIN
    ========================
    */

    public function loginForm()
    {
        return view('login');
    }

    /*
    ========================
    LOGIN
    ========================
    */

    public function login(Request $request)
{
    $credentials = $request->only(
        'email',
        'password'
    );

    if (Auth::attempt($credentials)) {

        return redirect('/dashboard');

    }

    return back()
        ->with('error', 'Login gagal');
}

    /*
    ========================
    FORM REGISTER
    ========================
    */

    public function registerForm()
    {
        return view('register');
    }

    /*
    ========================
    REGISTER
    ========================
    */

    public function register(Request $request)
    {
        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => $request->role

        ]);

        return redirect('/login');
    }

    /*
    ========================
    LOGOUT
    ========================
    */

    public function logout()
{
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
}

}
