<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Department;
use App\Profile;
use App\Notify;
use App\User;
use App\Traits\reports;

class AnnouncementController extends Controller
{
    use reports;

    public function index()
    {
        $announcements = User::join('announcements','announcements.user_id','=','users.id')
            ->orderBy('announcements.created_at','DESC')->paginate(10);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('announcement.index', compact('announcements', 'notifies', 'sidebar', 'dept'));
    }

    public function create()
    {
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        
        
        return view('announcement.create', compact('notifies', 'sidebar', 'dept'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $announcements = new Announcement;
        $announcements->title = $request->input('title');
        $announcements->content = $request->input('content');
        $announcements->user_id = auth()->user()->id;
        $announcements->save();

        $users = User::all();

        foreach ($users as $position) {
            Notify::create([
                'sender' => auth()->user()->id,
                'receiver' => $position->id,
                'content' => 'post an announcement',
                'read' => 0,
                'type' => 1,
                'link_id' => $announcements->id,
                'dept_id' => 0
            ]);
        }
        return redirect('/announcements')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $announcements = Announcement::find($id);
        $user = Announcement::find($id)->user;
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('announcement.show', compact('announcements', 'user', 'notifies', 'sidebar', 'dept'));
    }

    public function edit($id)
    {
        $announcements = Announcement::find($id);
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();
        
        return view('announcement.edit', compact('announcements', 'notifies', 'sidebar', 'dept'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $announcements = Announcement::find($id);
        $announcements->title = $request->input('title');
        $announcements->content = $request->input('content');
        $announcements->save();

        return redirect('/announcements')->with('success', 'Post Updated');
    }

    public function destroy($id)
    {
        $announcements = Announcement::find($id);
        $announcements->delete();
        return redirect('/announcements')->with('success', 'Post Removed');
    }

    public function viewann($link_id, $notif_id)
    {
        $announcements = Announcement::find($link_id);
        $user = Announcement::find($link_id)->user;

        $markasread = Notify::find($notif_id);
        $markasread->read = 1;
        $markasread->save();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('announcement.show', compact('announcements', 'user', 'notifies', 'sidebar', 'dept'));
    }
}
