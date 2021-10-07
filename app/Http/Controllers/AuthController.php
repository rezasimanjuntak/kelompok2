<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Util\Helper;

class AuthController extends Controller
{
    public function index(){
        //halaman login
        return view('login');
    }

    public function verify(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin', 'status' => 1])) {
            return redirect()->intended('/admin/dashboard');
        } else if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'sa', 'status' => 1])) {
            return redirect()->intended('/superadmin/dashboard');
        }else{
            //user tidak ditemukan
            return redirect('/login')->with('pesan','Password yang anda masukan salah');
        }
    }
    public function logout(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }elseif (Auth::guard('superadmin')->check()){
            Auth::guard('superadmin')->logout();
        }
        return redirect('/login');
    }
}
