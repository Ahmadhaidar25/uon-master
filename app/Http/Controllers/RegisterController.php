<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        //dd($request->all());

       $validate=$request->validate([
            'nis'=>'required',
            'email'=>'required',
            'password'=>'required',
            'levels'=>'required'

        ]);

       
            $post = new User;
            $post->nis = $request->nis;
            $post->email = $request->email;
            $post->password = Hash::make($request->password);
            $post->levels = $request->levels;
            $post->save();
            return back()->with(['success' => 'Register Berhasil']);
        
    }
}
