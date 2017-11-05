<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
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
        $announcements = Announcement::orderBy('created_at','desc')->paginate(5);
        return view('home', compact('announcements'));
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

    public function chatbox()
    {
        return view('messenger.chatbox');
    }

}
