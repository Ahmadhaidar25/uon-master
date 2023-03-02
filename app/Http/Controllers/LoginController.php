<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
     if ($request->nis==null) {
        alert()->warning('Peringatan','nis harus diisi');
        return redirect()->back();
    }elseif ($request->password==null) {
        alert()->warning('Peringatan','password harus diisi');
        return redirect()->back();
    }else{
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->status==1) {
                $request->session()->regenerate();
                alert()->success('Berhasil','Data ditemukan');
                return redirect()->intended('home');
            }elseif (auth()->user()->status==0) {
               alert()->warning('Maaf akun anda sudah non aktif silahkan hubungi admin');
               return redirect()->intended('/');
           }

       }  
   }

 //alert()->error('User Tidak ditemukan');
   return redirect('/')->with(['error' => 'Pengguna tidak ditemukan']); 
}

public function logout()
{
    Auth::logout();
    toast('Berhasil','success');
    return redirect('/');
}
}

