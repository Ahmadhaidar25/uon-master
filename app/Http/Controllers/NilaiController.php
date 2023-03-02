<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilai;
use App\Models\tugas;

class NilaiController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
}
public function post_nilai(Request $request, $id)
{
    if ($request->nilai==null) {
        alert()->warning('Peringatan','nilai harus diisi');
        return redirect()->back();
    }else{
        $post = new nilai;
        $post->tugas_id = $request->tugas_id;
        $post->nilai = $request->nilai;
        $post->save();
        alert()->success('Berhasil');
        
        $ubah = tugas::find($id);
        $ubah->status = $request->status;
        $ubah->update();

    }
    return back();

}
}
