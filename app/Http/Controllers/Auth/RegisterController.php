<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Redirect;

class RegisterController extends Controller
{
   
    use RegistersUsers;

    protected $redirectTo = '/users';

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        return $this->registered($request, $user)
        ?: redirect::back()->with('success', 'Registration Completed');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dept' => 'required'
        ]);
    }

    protected function create(array $data)
    {

        $defaultprofile = 'public/profile/default.jpg';

        $user = User::create([
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'slug' => str_slug($data['firstname'] . $data['lastname']),
            'position' => $data['position'],
            'district' => $data['district'],
            'profile_pic' => $defaultprofile,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'isBan' => 0,
            ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            ]);

        $depts = $data['dept'];
        if (count($depts) > 0) {
        foreach ($depts as $dept) {
            $awe = Department::create([
            'user_id' => $user->id,
            'dept' => $dept,
            ]);
        }
        }
        
        
        return $user;
    }

}
