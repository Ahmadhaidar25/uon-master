<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listmapel;
use App\Models\plmapel;
use Auth;
use DB;

class PilihMapelController extends Controller
{

 public function __construct()
 {
    $this->middleware('auth');
 }
 public function pilih_kelas()
 {
  $data = listmapel::all();
  return view('pilih-mapel.mapel',compact('data'));
}

public function post_pilih_mapel(Request $request)
{
  if ($request->listmapel_id==null) {
    alert()->warning('Peringatan','centang mata pelajaran terlebih dahulu');
    return redirect()->back();
 }else{
    $listmapel_id = $request->input('listmapel_id');

    foreach ($listmapel_id as $key => $value) {
       $post = new plmapel();
       $post->user_id = Auth::user()->id;
       $post->listmapel_id = $value;
       $post->save();
       alert()->success('Mapel','berhasil dipilih');
    }
    return redirect()->back();
 }
}
}
