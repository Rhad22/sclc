<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Profile;
use App\User;
use App\Report;
use App\Notify;
use Charts;
use Auth;
use App\Traits\reports;

class HomeController extends Controller
{
    use reports;
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

        $chart = Charts::database(Report::all(), 'bar', 'highcharts')
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->lastByMonth(12, true);
        
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept'));
    }

    public function users()
    {
        $users = User::orderBy('created_at','desc')->paginate(8);
        $notifies = $this->notification();
        $dept = $this->dept();

        return view('users.account', compact('users', 'notifies', 'dept'));
    }

    public function show($id)
    {
        $users = User::find($id);
        $dept = $this->dept();

        return view('users.show', compact('users', 'dept'));
    }

    public function chatbox()
    {
        return view('messenger.chatbox');
    }

     public function notif()
    {
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('notification.notify', compact('notifies', 'sidebar', 'dept'));
    }

}
