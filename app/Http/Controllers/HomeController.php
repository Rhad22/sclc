<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function users()
    {
        $users = User::orderBy('created_at','desc')->paginate(8);
        return view('users.account', compact('users'));
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('users.show', compact('users'));
    }

}
