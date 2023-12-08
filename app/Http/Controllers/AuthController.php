<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function login()
    {
        return view('/auth/login');
    }

    public function register()
    {   
    return view('/auth/register');
    }

    public function loginuser(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){     
            return redirect('/');
        }

            return \redirect('login');
    }

    public function registeruser(Request $request)
    {
        User::create([
            'pegawai_nama' => $request->nama,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),

        ]);
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        auth::logout();
        
        return \redirect('login');
    }
}
