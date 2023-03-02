<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\guru;
use App\Models\siswa;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function pengguna()
    {
        $select_guru = guru::all();
        $select_siswa = siswa::all();

        $admin = User::all('id','guru_id','siswa_id','nis','email','levels','status')
        ->where('levels','admin');
        $guru = User::all('id','guru_id','siswa_id','nis','email','levels','status')
        ->where('levels','guru');
        $siswa = User::all('id','guru_id','siswa_id','nis','email','levels','status')
        ->where('levels','siswa');
        return view('master-pengguna.pengguna',compact('admin','guru','select_guru','siswa',
            'select_siswa'));
    }

    public function post_pengguna_guru(Request $request)
    {
        if ($request->guru_id==null) {
            alert()->warning('Peringatan','nama guru tidak boleh kosong');
            return redirect()->back();
        }elseif ($request->nis==null) {
            alert()->warning('Peringatan','nig tidak boleh kosong');
            return redirect()->back();
        }elseif ($request->email==null) {
            alert()->warning('Peringatan','email tidak boleh kosong');
            return redirect()->back();
        }elseif ($request->password==null) {
            alert()->warning('Peringatan','password tidak boleh kosong');
            return redirect()->back();
        }elseif ($request->levels==null) {
            alert()->warning('Peringatan','levels tidak boleh kosong');
            return redirect()->back();
        }elseif ($request->status==null) {
            alert()->warning('Peringatan','status tidak boleh kosong');
            return redirect()->back();
        }else{

            $post = new User;
            $post->guru_id = $request->guru_id;
            $post->nis = $request->nis;
            $post->email = $request->email;
            $post->password = Hash::make($request->password);
            $post->levels = $request->levels;
            $post->status = $request->status;
            $post->save();
            alert()->success('pengguna berhasil di tambhakan');
        }
        return redirect()->back();
    }


    public function update_pengguna_guru(Request $request,$id)
    {
        //dd($request->all());
       if ($request->guru_id==null) {
        alert()->warning('Peringatan','nama guru tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->nis==null) {
        alert()->warning('Peringatan','nig tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->email==null) {
        alert()->warning('Peringatan','email tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->levels==null) {
        alert()->warning('Peringatan','levels tidak boleh kosong');
        return redirect()->back();
        
    }else{

        $post = User::find($id);
        $post->guru_id = $request->guru_id;
        $post->nis = $request->nis;
        $post->email = $request->email;
        $post->levels = $request->levels;
        $post->status = $request->has('status');
        $post->save();
        alert()->success('pengguna berhasil di ubah');
    }
    return redirect()->back();
}


public function post_pengguna_siswa(Request $request)
{
    if ($request->siswa_id==null) {
        alert()->warning('Peringatan','nama guru tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->nis==null) {
        alert()->warning('Peringatan','nig tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->email==null) {
        alert()->warning('Peringatan','email tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->password==null) {
        alert()->warning('Peringatan','password tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->levels==null) {
        alert()->warning('Peringatan','levels tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->status==null) {
        alert()->warning('Peringatan','status tidak boleh kosong');
        return redirect()->back();
    }else{

        $post = new User;
        $post->siswa_id = $request->siswa_id;
        $post->nis = $request->nis;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->levels = $request->levels;
        $post->status = $request->status;
        $post->save();
        alert()->success('pengguna berhasil di tambhakan');
    }
    return redirect()->back();
}

public function update_pengguna_siswa(Request $request,$id)
{
        //dd($request->all());
   if ($request->siswa_id==null) {
    alert()->warning('Peringatan','nama siswa tidak boleh kosong');
    return redirect()->back();
}elseif ($request->nis==null) {
    alert()->warning('Peringatan','nis tidak boleh kosong');
    return redirect()->back();
}elseif ($request->email==null) {
    alert()->warning('Peringatan','email tidak boleh kosong');
    return redirect()->back();
}elseif ($request->levels==null) {
    alert()->warning('Peringatan','levels tidak boleh kosong');
    return redirect()->back();

}else{

    $post = User::find($id);
    $post->siswa_id = $request->siswa_id;
    $post->nis = $request->nis;
    $post->email = $request->email;
    $post->levels = $request->levels;
    $post->status = $request->has('status');
    $post->update();
    alert()->success('pengguna berhasil di ubah');
}
return redirect()->back();
}


public function profil()
{
    return view('profil-pengguna.profil');
}

}
