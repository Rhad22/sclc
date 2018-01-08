<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Profile;
use App\User;
use App\Report;
use Charts;
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

        $chart = Charts::database(Report::all(), 'bar', 'highcharts')
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->lastByMonth(12, true);
        

        return view('home', compact('chart','announcements'));
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

    public function awea() 
    {

        $viewer = View::select(DB::raw("SUM(numberofview) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("year(created_at)"))
        ->get()->toArray();
    $viewer = array_column($viewer, 'count');
    }
}
