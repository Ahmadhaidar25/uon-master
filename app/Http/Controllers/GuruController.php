<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guru;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function data_guru()
    {
        $data = guru::all();
        return view('master-guru.guru',compact('data'));
    }

    public function tambah_guru()
    {
        return view('master-guru.tambah');
    }

    public function post_guru(Request $request)
    {

        if ($request->nama_guru==null) {
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
        }elseif ($request->status==null) {
            alert()->warning('Peringatan','status harus diisi');
            return redirect()->back();
        }else{

            $post = new guru;
            $post->nama_guru = $request->nama_guru;
            $post->tempat_lahir = $request->tempat_lahir;
            $post->tgl_lahir = $request->tgl_lahir;
            $post->umur = $request->umur;
            $post->jk = $request->jk;
            $post->alamat = $request->alamat;
            $post->no_tlp = $request->no_tlp;
            $post->status = $request->status;
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
         alert()->success('Data Guru','berhasil ditambahkan');
         $post->save();
         return redirect('/data/guru');
     }
 }


 public function edit_guru($id)
 {
     $edit = guru::find($id);
     return view('master-guru.edit',compact('edit'));
 }

 public function update_guru(Request $request, $id)
 {
     if ($request->nama_guru==null) {
        alert()->warning('Peringatan','nama guru tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->tempat_lahir==null) {
        alert()->warning('Peringatan','tempat lahir tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->tgl_lahir==null) {
        alert()->warning('Peringatan','tanggal lahir tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->umur==null) {
        alert()->warning('Peringatan','umur tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->jk==null) {
        alert()->warning('Peringatan','jenis kelamin tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->status==null) {
        alert()->warning('Peringatan','status tidak boleh kosong');
        return redirect()->back();
    }else{

        $post = guru::find($id);
        $post->nama_guru = $request->nama_guru;
        $post->tempat_lahir = $request->tempat_lahir;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->umur = $request->umur;
        $post->jk = $request->jk;
        $post->alamat = $request->alamat;
        $post->no_tlp = $request->no_tlp;
        $post->status = $request->status;
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
     alert()->success('Data Guru','berhasil diubah');
     $post->update();
     return redirect('/data/guru');
 }
}


public function hapus_guru($id)
{
   $hapus = guru::find($id);
   $file = public_path('/avatar/').$hapus->avatar;
   if (file_exists($hapus)) {
    unlink($file);
   }
   $hapus->delete();
   alert()->success('Data Guru','berhasil dihapus');
   return redirect()->back();
}
}
