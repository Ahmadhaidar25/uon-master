<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilai;
use App\Models\User;
use App\Models\mapel;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $pengguna_guru = User::where('levels','guru')->count();
        $pengguna_siswa = User::where('levels','siswa')->count();
        $mapel = mapel::count();
        $nilai = nilai::all();
        return view('home',compact('nilai','pengguna_guru','pengguna_siswa','mapel'));
    }
}
