<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Profile;

class AnnouncementController extends Controller
{ 
    public function index()
    {
        $announcements = Announcement::orderBy('created_at','desc')->paginate(5);
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
        return view('announcement.show', compact('announcements'));
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
