<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function index($email)
    {
        $user = User::where('email' ,$email)->first();
        $id = User::where('email', $email)->value('id');
        $profile = profile::where('user_id', $id)->first();
        return view('profiles.myprofile',['user'=>$user,'profile'=>$profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
    		'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'profilepicture' => 'mimes:jpeg,png,bmp,tiff |max:2000'
    	]);

    	Auth::user()->profile->update([
    				'address' => $request->address,
                    'birthday' => $request->birthday,
                    'mobilenumber' => $request->phone,
                    'gender' => $request->gender
    		]);
        
        if($request->hasFile('profilepicture')){
    			Auth::user()->update([
    				'profile_pic' => $request->profilepicture->store('public/profile')
    			]);
    	}

        return redirect()->back()->with('success', 'Profile Informations are updated');;

    }

}
