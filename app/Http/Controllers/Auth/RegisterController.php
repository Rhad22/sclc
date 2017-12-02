<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
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
        $this->middleware('guest');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
            'profile_pic' => $defaultprofile,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    
        Profile::create([
            'user_id' => $user->id,
            'dept' => $data['dept'],
            ]);
        
        return $user;
    }

}
