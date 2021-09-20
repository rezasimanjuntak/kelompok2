<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        //hal login
        return view('login');
    }
    public function verify(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            // if successful, then redirect to their intended location
            return redirect()->intended('/dashboard');
        } else if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'sa'])) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/login')->with('pesan', 'Email dan password salah');
        }
    }
}
