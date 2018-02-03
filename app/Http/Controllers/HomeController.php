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
use PDF;
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
        $announcements = User::join('announcements','announcements.user_id','=','users.id')
            ->orderBy('announcements.created_at','DESC')->paginate(20);
        $content = $this->title();
        $ids = auth()->user()->id;
        $profile = Profile::where('user_id', $ids)->first();
        if (auth()->user()->position == 'Admin') {
            $dept = 1;
        }else {
            $dept = $profile->dept;
        }
        $dept_id = 1;
        $row = 1;
        $year = date('Y');
            $value =  array ();
            for ($x=1; $x <= 12; $x++) { 
                array_push($value, $day = Report::where('dept_id', $dept)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $x)
                    ->sum('row'.$row));
                }

        $allactivity = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids])
            ->orderBy('notifies.created_at','DESC')
            ->get();

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start = date("Y-m-d",$end_week);
        $end = date('Y-m-d');
        $week = Notify::where(['receiver'=> $ids])
            ->whereBetween('created_at', array($start, $end))
            ->count('id');

        $month = date('m');
        $buwan = Notify::where(['receiver'=> $ids])
            ->whereMonth('created_at', $month)
            ->count('id');
        $all = Notify::where(['receiver'=> $ids])
            ->count('id');

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept_id', 'row', 'content', 'year', 'allactivity', 'week', 'buwan', 'all', 'profile'));
    }

    public function chart(Request $request, $dept_id, $row)
    {
        $announcements = User::join('announcements','announcements.user_id','=','users.id')
            ->orderBy('announcements.created_at','DESC')->paginate(20);
        $dept = $this->dept();
        $content = $this->title();
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        
            $value =  array ();
            for ($x=1; $x <= 12; $x++) { 
                array_push($value, $day = Report::where('dept_id', $dept_id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $x)
                    ->sum('row'.$row));
                }
        $ids = auth()->user()->id;
        $allactivity = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids])
            ->orderBy('notifies.created_at','DESC')
            ->get();

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start = date("Y-m-d",$end_week);
        $end = date('Y-m-d');
        $week = Notify::where(['receiver'=> $ids])
            ->whereBetween('created_at', array($start, $end))
            ->count('id');

        $month = date('m');
        $buwan = Notify::where(['receiver'=> $ids])
            ->whereMonth('created_at', $month)
            ->count('id');
        $all = Notify::where(['receiver'=> $ids])
            ->count('id');

        $profile = Profile::where('user_id', $ids)->first();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept', 'dept_id', 'content', 'row' , 'year', 'allactivity', 'week', 'buwan', 'all', 'profile'));
    }

    public function users()
    {
        $users = User::join('profiles','profiles.user_id','=','users.id')
            ->orderBy('users.created_at','DESC')->paginate(8)
            ;
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

    public function notif()
    {
        $ids = auth()->user()->id;
        $allnotify = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids])
            ->orderBy('notifies.created_at','DESC')
            ->get();
        

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('notification.notify', compact('allnotify','notifies', 'sidebar', 'dept'));
    }

}
