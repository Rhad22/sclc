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

        $content = $this->title();
        $dept = 1;
        $row = 1;
        $year = 2018;
        $dept_id = 1;

        
            $value =  array ();
            for ($x=1; $x <= 12; $x++) { 
                array_push($value, $day = Report::where('dept_id', $dept)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $x)
                    ->sum('row'.$row));
                }
         
        
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept_id', 'row', 'content', 'year'));
    }

    public function chart(Request $request, $dept_id, $row)
    {
        $announcements = Announcement::orderBy('created_at','desc')->paginate(5);
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
         
        
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept', 'dept_id', 'content', 'row' , 'year'));
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

    public function chatbox()
    {
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('messenger.chatbox', compact('notifies', 'sidebar', 'dept'));
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
