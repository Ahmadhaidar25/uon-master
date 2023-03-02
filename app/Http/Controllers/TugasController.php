<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tugas;
use App\Models\plmapel;
use Illuminate\Support\Facades\File;
use Auth;

class TugasController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
}
public function post_tugas(Request $request)
{
 if ($request->file==null) {
    alert()->warning('Peringatan','File harus diisi');
    return redirect()->back();
}else{

    $post = new tugas;
    $post->plmapel_id = $request->plmapel_id;
    $post->user_id = Auth::user()->id;
    $post->status = $request->status;
    $post->parent = $request->parent;

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
     $file->move('tugas', $filename);
     $post->file = $filename;
 }
 alert()->success('Tugas','berhasil dikirim');
 $post->save();
 return redirect()->back();
}
}


public function riwayat_tugas()
{
    $data = tugas::orderBy('id', 'desc')->get();
    return view('riwayat-tugas.tugas',compact('data'));
}

public function hasil_ujian()
{
   $data = plmapel::all();

        // Looping semua post
   foreach ($data as $post) {
            // Menghitung jumlah komentar di setiap post
    $commentCount = tugas::where('plmapel_id', $post->id)->count();
}
$hasil_ujian = tugas::orderBy('id', 'desc')->get();
return view('hasil-ujian-siswa.hasil-ujian',compact('hasil_ujian','data'));
}
}
