<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Communication;
use App\Traits\reports;

class CommunicationController extends Controller
{
    use Reports;
    
    public function index()
    {
        
        $field = array('bible', 'seven', 'worship', 'hope');

        foreach ($field as $value) {
            $tests = $this->qtr4($value);
        }

        return view('communication.report', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {  
    //     $year = $request->input('year');
    //     return view('communication.create', compact('$year'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bible' => 'required',
            'seven' => 'required',
            'worship' => 'required',
            'prophet' => 'required',
            'signs' => 'required',
            'hope' => 'required'
        ]);

        //Make a Report
        $post = new Communication;
        $post->bible = $request->input('bible');
        $post->seven = $request->input('seven');
        $post->worship = $request->input('worship');
        $post->prophet = $request->input('prophet');
        $post->signs = $request->input('signs');
        $post->hope = $request->input('hope');
        $post->user_id = auth()->user()->id;
        $post->save();
    
        return redirect('/communication')->with('success', 'Send successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
