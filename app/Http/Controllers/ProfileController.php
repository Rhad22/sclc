<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;


class ProfileController extends Controller
{
    public function index($email)
    {
        $user = User::where('email' ,$email)->first();
        $id = User::where('email', $email)->value('id');
        $profile = profile::where('user_id', $id)->first();
        return view('profiles.myprofile',['user'=>$user,'profile'=>$profile]);
    }

    // public function update(Request $request)
    // {
    //     $this->validate($request, [
    //         'address' => 'required',
    //     ]);

    //     Auth::user()->profile()->update(['address']);

    //     return redirect('/myprofile/settings')->with('success', 'Post Updated');
    // }

}
