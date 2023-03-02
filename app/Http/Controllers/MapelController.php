<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\User;
use DB;
use Auth;

class MapelController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
}
public function mapel()
{
    $data = mapel::all();
    
    return view('master-mapel.mapel',compact('data'));
}

public function tambah_mapel()
{


    $kode = mapel::all('kode_mapel')->max('kode_mapel');
    $data = User::all('id','guru_id','nis','email','levels')->where('levels','guru');
    $addNol = '';
    $kode = str_replace("MPL-0", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "0";
    } elseif (strlen($kode) == 1) {
        $addNol = "0";
    } elseif (strlen($kode == 1)) {
        $addNol = "0";
    }
    $kodeBaru = "MPL-0".$addNol.$incrementKode;
    return view('master-mapel.tambah',compact('kodeBaru','data'));
}

public function post_mapel(Request $request)
{
 if ($request->user_id==null) {
    alert()->warning('Peringatan','nama guru tidak boleh kosong');
    return redirect()->back();
}elseif ($request->kode_mapel==null) {
    alert()->warning('Peringatan','kode mapel tidak boleh kosong');
    return redirect()->back();
}elseif ($request->nama_mapel==null) {
    alert()->warning('Peringatan','nama mapel tidak boleh kosong');
    return redirect()->back();
}else{

    $post = new mapel;
    $post->user_id = $request->user_id;
    $post->kode_mapel = $request->kode_mapel;
    $post->nama_mapel = $request->nama_mapel;
    $post->save();
    alert()->success('Mapel','berhasil ditambah');
}
return redirect('mapel');
}

public function hapus_mapel($id)
{
    $hapus = mapel::find($id);
    $hapus->delete();
    alert()->success('Mapel','berhasil dihapus');
    return back();
}


public function edit_mapel($id)
{
    $edit=mapel::find($id);
    $datas = User::all('id','guru_id','nis','email','levels')->where('levels','guru');
    return view('master-mapel.edit',compact('edit','datas'));
}

public function update_mapel(Request $request, $id)
{
  if ($request->kode_mapel==null) {
    alert()->success('Peringatan','berhasil dihapus');
    return redirect()->back();
}elseif ($request->user_id==null) {
 alert()->success('Peringatan','nama guru tidak boleh dikosongkan');
 return redirect()->back();
}elseif ($request->nama_mapel==null) {
 alert()->success('Peringatan','nama mapel tidak boleh dikosongkan');
 return redirect()->back();
}else{

    $update = mapel::find($id);
    $update->kode_mapel = $request->kode_mapel;
    $update->user_id = $request->user_id;
    $update->nama_mapel = $request->nama_mapel;
    $update->update();
    alert()->success('Mapel','berhasil diubah');
}
return redirect('mapel');
}
}
