<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Notify;
use Auth;
use App\Traits\reports;

class ProfileController extends Controller
{
    use reports;
    
    public function index($email)
    {
        $user = User::where('email' ,$email)->first();
        $id = User::where('email', $email)->value('id');
        $profile = Profile::where('user_id', $id)->first();

        $ids = auth()->user()->id;
        $activities = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids, 'sender'=> $ids])
            ->orderBy('notifies.created_at','DESC')
            ->get();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();


        return view('profiles.myprofile',['user'=>$user,'profile'=>$profile, 'notifies'=>$notifies, 'sidebar'=>$sidebar, 'dept'=>$dept, 'activities' => $activities]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
    		'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required|max:11',
            'gender' => 'required',
            'status' => 'required',
            'profilepicture' => 'mimes:jpeg,png,bmp,tiff |max:2000'
    	]);

    	Auth::user()->profile->update([
    				'address' => $request->address,
                    'birthday' => $request->birthday,
                    'mobilenumber' => $request->phone,
                    'gender' => $request->gender,
                    'status' => $request->status
    		]);
        
        if($request->hasFile('profilepicture')){
    			Auth::user()->update([
    				'profile_pic' => $request->profilepicture->store('public/profile')
    			]);
    	}

        $users = User::all();

        foreach ($users as $position) {
            Notify::create([
                'sender' => auth()->user()->id,
                'receiver' => $position->id,
                'content' => 'updated his profile',
                'read' => 0,
                'type' => 2,
                'link_id' => auth()->user()->email,
                'dept_id' => 0
            ]);
        }

        return redirect()->back()->with('success', 'Profile Informations are updated');;

    }

    public function viewprofile($link_id, $notif_id)
    {
        $user = User::where('email' ,$link_id)->first();
        $id = User::where('email', $link_id)->value('id');
        $profile = Profile::where('user_id', $id)->first();

        $markasread = Notify::find($notif_id);
        $markasread->read = 1;
        $markasread->save();

        $ids = User::where('email', $link_id)->value('id');
        $activities = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids, 'sender'=> $ids])
            ->orderBy('notifies.created_at','DESC')
            ->get();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('profiles.myprofile', compact('profile', 'user', 'notifies', 'sidebar', 'dept', 'activities'));
    }
}
