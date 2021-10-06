<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index(){
        //untuk list admin
        Session::put('tittle','Data Admin');

        $pengguna = Pengguna::all();
        return view('superadmin/content/pengguna/list',compact('pengguna'));
    }

    public function add(){
        //menampilkan form tambah
        Session::put('tittle','Tambah Data Admin');
        return view('superadmin/content/pengguna/add');
    }

    public function store(Request $request){
        $pengguna = new pengguna();
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email  = $request->email;
        $pengguna->password  = bcrypt("12345678");

        try  {
            $pengguna->save();
            //pesan notifikasi sukses
            //redirect
            return redirect(route("superadmin.pengguna.index"))->with('pesan-berhasil', 'Anda berhasil menambah data pengguna');
        }catch (\Exception $e){
            //pesan notifikasi tidak sukses
            //redirect
            return redirect(route("superadmin.pengguna.index"))->with('pesan-gagal', 'Anda gagal menambah data pengguna');
        }

    }

    public function delete($id){
       //pastikan ada data
        $pengguna = Pengguna::findOrFail($id);
        try  {
            $pengguna->delete();
            return redirect(route("superadmin.pengguna.index"))->with('pesan-berhasil', 'Anda berhasil menghapus data pengguna');
        }catch (\Exception $e){
            return redirect(route("superadmin.pengguna.index"))->with('pesan-gagal', 'Anda gagal menghapus  data pengguna');
        }
    }
}
