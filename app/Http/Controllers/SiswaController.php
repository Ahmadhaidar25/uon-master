<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    public function data_siswa()
    {
        $data = siswa::all();
        return view('master-siswa.siswa',compact('data'));
    }

    public function tambah_siswa()
    {
       return view('master-siswa.tambah');
   }

   public function post_siswa(Request $request)
   {
    if ($request->nama_siswa==null) {
        alert()->warning('Peringatan','nama guru harus diisi');
        return redirect()->back();
    }elseif ($request->tempat_lahir==null) {
        alert()->warning('Peringatan','tempat lahir harus diisi');
        return redirect()->back();
    }elseif ($request->tgl_lahir==null) {
        alert()->warning('Peringatan','tanggal lahir harus diisi');
        return redirect()->back();
    }elseif ($request->umur==null) {
        alert()->warning('Peringatan','umur harus diisi');
        return redirect()->back();
    }elseif ($request->jk==null) {
        alert()->warning('Peringatan','jenis kelamin harus diisi');
        return redirect()->back();
    }elseif ($request->kelas==null) {
        alert()->warning('Peringatan','status harus diisi');
        return redirect()->back();
    }else{

        $post = new siswa;
        $post->nama_siswa = $request->nama_siswa;
        $post->tempat_lahir = $request->tempat_lahir;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->umur = $request->umur;
        $post->jk = $request->jk;
        $post->alamat = $request->alamat;
        $post->no_tlp = $request->no_tlp;
        $post->kelas = $request->kelas;
        if ($request->hasfile('avatar')) 
        {
            $destination = '/avatar/'.$post->avatar;

            if (File::exists($destination)) 
            {
             File::delete($destination);
         }

         $file = $request->file('avatar');
         $extention = $file->getClientOriginalExtension();
         $filename = time().'.'.$extention;
         $file->move('avatar', $filename);
         $post->avatar = $filename;
     }
     alert()->success('Data Siswa','berhasil ditambahkan');
     $post->save();
     return redirect('/data/siswa');
 }
}

public function edit_siswa($id)
{
    $edit = siswa::find($id);
    return view('master-siswa.edit',compact('edit'));
}

public function update_siswa(Request $request,$id)
{
    if ($request->nama_siswa==null) {
        alert()->warning('Peringatan','nama guru harus diisi');
        return redirect()->back();
    }elseif ($request->tempat_lahir==null) {
        alert()->warning('Peringatan','tempat lahir harus diisi');
        return redirect()->back();
    }elseif ($request->tgl_lahir==null) {
        alert()->warning('Peringatan','tanggal lahir harus diisi');
        return redirect()->back();
    }elseif ($request->umur==null) {
        alert()->warning('Peringatan','umur harus diisi');
        return redirect()->back();
    }elseif ($request->jk==null) {
        alert()->warning('Peringatan','jenis kelamin harus diisi');
        return redirect()->back();
    }elseif ($request->kelas==null) {
        alert()->warning('Peringatan','status harus diisi');
        return redirect()->back();
    }else{

        $post = siswa::find($id);
        $post->nama_siswa = $request->nama_siswa;
        $post->tempat_lahir = $request->tempat_lahir;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->umur = $request->umur;
        $post->jk = $request->jk;
        $post->alamat = $request->alamat;
        $post->no_tlp = $request->no_tlp;
        $post->kelas = $request->kelas;
        if ($request->hasfile('avatar')) 
        {
            $destination = '/avatar/'.$post->avatar;

            if (File::exists($destination)) 
            {
             File::delete($destination);
         }

         $file = $request->file('avatar');
         $extention = $file->getClientOriginalExtension();
         $filename = time().'.'.$extention;
         $file->move('avatar', $filename);
         $post->avatar = $filename;
     }
     alert()->success('Data Siswa','berhasil diubah');
     $post->update();
     return redirect('/data/siswa');
 }
}

public function hapus_siswa($id)
{
 $hapus = siswa::find($id);
 $file = public_path('/avatar/').$hapus->avatar;
 if (file_exists($hapus)) {
    unlink($file);
}
$hapus->delete();
alert()->success('Data Siswa','berhasil dihapus');
return redirect()->back();
}
}
