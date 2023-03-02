<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presensi;
use Auth;

class PresensiController extends Controller
{
    public function post_presensi(Request $request)
    {
        if ($request->ket==null) {
         alert()->warning('Peringatan','keterangan harus di centang');
          return redirect()->back();
     }else{
        $post = new presensi;
        $post->user_id = Auth::user()->id;
        $post->plmapel_id = $request->plmapel_id;
        $post->ket = $request->ket;
        $post->save();
        alert()->success('Presensi','berhasil dikirim');
        return redirect()->back();
    }
}

public function riwayat_presensi()
{
    $data = presensi::orderBy('id','desc')->get();
    return view('master-soal-ujian.presensi',compact('data'));
}
}
