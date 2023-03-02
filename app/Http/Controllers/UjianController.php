<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\listmapel;
use App\Models\plmapel;
use Auth;
use Illuminate\Support\Facades\File;

class UjianController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
}
public function soal()
{
    $data = listmapel::all();
    return view('master-soal.soal',compact('data'));
}

public function tambah_soal()
{
    $mapel = mapel::all();
    return view('master-soal.tambah',compact('mapel'));
}

public function post_soal(Request $request)
{
        //dd($request->all());
    $request->validate([
      'nama_ujian'=>'required',
      'mapel_id'=>'required',
      'tanggal'=>'required',

  ]);


    $post = new listmapel;
    $post->nama_ujian = $request->nama_ujian;
    $post->mapel_id = $request->mapel_id;
    $post->user_id = Auth::user()->id;
    $post->tanggal = $request->tanggal;
    $post->status = $request->has('status');

    if ($request->hasfile('file')) 
    {
     $destination = '/file/'.$post->file;

     if (File::exists($destination)) 
     {
         File::delete($destination);
     }

     $file = $request->file('file');
     $extention = $file->getClientOriginalExtension();
     $filename = time().'.'.$extention;
     $file->move('file', $filename);
     $post->file = $filename;
 }
 alert()->success('Soal','berhasil ditambahkan');
 $post->save();
 return redirect('/soal/ujian');
}


public function ujian_online()
{
 $data = plmapel::all();
 return view('master-soal-ujian.ujian-online',compact('data'));
}

public function edit_soal($id)
{
    $data = listmapel::find($id);
    $mapel = mapel::all();
    return view('master-soal.edit',compact('data','mapel'));
}

public function ubah_soal(Request $request,$id)
{
    //dd($request->all());
    $request->validate([
      'nama_ujian'=>'required',
      'mapel_id'=>'required',
      'tanggal'=>'required',

  ]);


    $ubah = listmapel::find($id);
    $ubah->nama_ujian = $request->nama_ujian;
    $ubah->mapel_id = $request->mapel_id;
    $ubah->user_id = Auth::user()->id;
    $ubah->tanggal = $request->tanggal;
    $ubah->status = $request->has('status');

    if ($request->hasfile('file')) 
    {
     $destination = '/file/'.$ubah->file;

     if (File::exists($destination)) 
     {
         File::delete($destination);
     }

     $file = $request->file('file');
     $extention = $file->getClientOriginalExtension();
     $filename = time().'.'.$extention;
     $file->move('file', $filename);
     $ubah->file = $filename;
 }
 alert()->success('Soal','berhasil diubah');
 $ubah->save();
 return redirect('/soal/ujian');
}

public function hapus_soal($id)
{
   $hapus = listmapel::find($id);
   $file=public_path('/file/').$hapus->file;
   if (file_exists($hapus)) {
    unlink($file);
}
$hapus->delete();
alert()->success('Soal','berhasil dihapus');
return back();
}


public function materi_ujian_online($id)
{
    $materi = plmapel::find($id);
    return view('master-soal-ujian.materi',compact('materi')); 
}
}
