<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    public function index($email)
    {
    $user = User::where('email', $email)->first();
    $id = User::where('email', $email)->value('id');
    $profile = profile::where('user_id', $id)->first();
    return view('profiles.myprofile', compact('user', 'profile'));
    // return view('profiles.profi­le')->with('user', $user);
    }

    // public function myprofile(Request $request) 
    // {
    //     $id = auth()->user()->id;
    //     $birthday = profile::where('user_id', $id)->value('birthday'); 
    //     $address = profile::where('user_id', $id)->value('address');
    //     $cp = profile::where('user_id', $id)->value('mobilenumber');
    //     $gender = profile::where('user_id', $id)->value('gender');
    //     return view('profiles.myprofile', compact('birthday','address', 'cp', 'gender'));
    // }

    // public function update(Request $request)
    // {
    //     $this->validate($request, [
    //         'address' => 'required',
    //     ]);

    //     Auth::user()->profil­e()->update(['address']);

    //     return redirect('/myprofile/settings')->with('success', 'Post Updated');
    // }

}
