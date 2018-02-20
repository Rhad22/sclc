<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Department;
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

        $sidebar = $this->sidebar();
        $dept_id = $sidebar[0]->dept;
        $row = 1;
        $year = date('Y');
            $value =  array ();
            for ($x=1; $x <= 12; $x++) { 
                array_push($value, $day = Report::where('dept_id', $dept_id)
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
        $add1 = date('d') + 1;
        $end = date('Y-m-'. $add1);
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
        $dept = $this->dept();

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept_id', 'row', 'content', 'year', 'allactivity', 'week', 'buwan', 'all', 'profile'));
    }

    public function chart(Request $request, $dept_id, $row)
    {   $ids = auth()->user()->id;
        
        $announcements = User::join('announcements','announcements.user_id','=','users.id')
            ->orderBy('announcements.created_at','DESC')->paginate(20);
        $dept = $this->dept();
        $content = $this->title();
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        
        $sidebar = $this->sidebar();
        
            $value =  array ();
            for ($x=1; $x <= 12; $x++) { 
                array_push($value, $day = Report::where('dept_id', $dept_id)
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
        $add1 = date('d') + 1;
        $end = date('Y-m-'. $add1);
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
        $dept = $this->dept();
        

        return view('home', compact('chart','announcements', 'notifies', 'sidebar', 'dept','value', 'dept_id', 'content', 'row' , 'year', 'allactivity', 'week', 'buwan', 'all', 'profile'));
    }

    public function users()
    {

        $users = Profile::join('users','users.id','=','profiles.user_id')
            ->orderBy('users.created_at','DESC')->paginate(12)
            ;

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();
        if (Auth()->user()->position !== 'Admin') {
            return redirect('/home');
        }

        return view('users.account', compact('users', 'notifies', 'dept', 'sidebar'));
    }

    public function edituser($id)
    {
        $user = User::find($id);
        $userdept = Department::where('user_id', $id)->get();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        if (Auth()->user()->position !== 'Admin') {
            return redirect('/home');
        }

        return view('users.edituser', compact('user', 'profile', 'sidebar', 'notifies', 'userdept', 'dept'));
    }

    public function changename(Request $request) {
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required'
        ]);
        $id = $request->input('id');

        User::where('id', $id)->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'lastname' => $request->lastname
                ]);
        return redirect()->back()->with('success', 'Account Informations are updated');
    }

    public function updateposition(Request $request) {

        $this->validate($request, [
            'position' => 'required',
            'district' => 'required'
        ]);
        $id = $request->input('id');

        User::where('id', $id)->update([
                    'position' => $request->position,
                    'district' => $request->district,
                ]);
        $depts = $request->input('dept');

            if (count($depts) > 0) {

                foreach ($depts as $dept) {
                $awe = Department::create([
                'user_id' => $id,
                'dept' => $dept,
                ]);
            }
        }
        
        return redirect()->back()->with('success', "Imployee's position have been updated");
    }

    public function disableaccount(Request $request) {
        $id = $request->input('id');

        User::where('id', $id)->update([
                    'isBan' => $request->isBan,
                ]);

        return redirect()->back()->with('success', 'Account Informations are updated');
    }

    public function destroy($id)
    {
        $dept = Department::find($id);
        $dept->delete();
        return redirect()->back()->with('success', 'Department Removed');
    }

    public function show($id)
    {
        $users = User::find($id);
        $profile = Profile::where('user_id', $id)->first();
        $dept = $this->dept();

        return view('users.show', compact('users', 'dept', 'profile'));
    }



    public function notif()
    {
        $ids = auth()->user()->id;
        $allnotify = User::join('notifies','notifies.sender','=','users.id')
            ->where(['receiver'=> $ids])
            ->where('sender', '!=', $ids)
            ->orderBy('notifies.created_at','DESC')
            ->get();
        

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('notification.notify', compact('allnotify','notifies', 'sidebar', 'dept'));

}
}