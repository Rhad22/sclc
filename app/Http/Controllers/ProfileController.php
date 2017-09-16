<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    public function myprofile(Request $request) 
    {
        $id = auth()->user()->id;
        $birthday = profile::where('user_id', $id)->value('birthday'); 
        $address = profile::where('user_id', $id)->value('address');
        $cp = profile::where('user_id', $id)->value('mobilenumber');
        $gender = profile::where('user_id', $id)->value('gender');
        return view('profile.myprofile', compact('birthday','address', 'cp', 'gender'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            
            'address' => 'required',
            
        ]);
        $id = auth()->user()->id;
        $profiles = Profile::find($id);
        $profiles = $request->input('address');
        
        $profiles->save();

        return redirect('/myprofile/settings')->with('success', 'Post Updated');
    }

}
