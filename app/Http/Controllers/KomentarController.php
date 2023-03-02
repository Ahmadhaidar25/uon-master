<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komentar;
use Auth;

class KomentarController extends Controller
{
    public function post_komentar(Request $request)
    {
     if ($request->komentar==null) {
        alert()->warning('Peringatan','kolom komentar harus diisi');
        return redirect()->back();
    }else{

        $post = new komentar;
        $post->user_id = Auth::user()->id;
        $post->plmapel_id = $request->plmapel_id;
        $post->komentar = $request->komentar;
        $post->parent = $request->parent;
        $post->save();

    }
    return redirect()->back();
}

public function balas_komentar(Request $request)
{
 if ($request->komentar==null) {
    alert()->warning('Peringatan','kolom balas komentar harus diisi');
    return redirect()->back();
}else{

    $post = new komentar;
    $post->user_id = Auth::user()->id;
    $post->plmapel_id = $request->plmapel_id;
    $post->komentar = $request->komentar;
    $post->parent = $request->parent;
    $post->save();

}
return redirect()->back();
}
}
