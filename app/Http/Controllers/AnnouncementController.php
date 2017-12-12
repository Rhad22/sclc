<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Department;
use App\Profile;
use App\User;

class AnnouncementController extends Controller
{ 
    public function index()
    {
        $announcements = User::join('announcements','announcements.user_id','=','users.id')->get();
            
        return view('announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcement.create');
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

        return redirect('/announcements')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $announcements = Announcement::find($id);
        $user = Announcement::find($id)->user;

        return view('announcement.show', compact('announcements', 'user'));
    }

    public function edit($id)
    {
        $announcements = Announcement::find($id);
        return view('announcement.edit', compact('announcements'));
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
}
