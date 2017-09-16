<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Communication;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $year = $request->input('year');
        $user = auth()->user()->id;

        ($year == "") ? $year = date('Y'): "";
        
     
    //1st quarter
        $from = date($year . '-01-01');
        $to = date($year . '-03-31');

    //2nd quater
        $from2 = date($year . '-04-01');
        $to2 = date($year . '-06-30');
    
    //3rd quater
        $from3 = date($year . '-07-01');
        $to3 = date($year . '-09-30');

    //4th quater
        $from4 = date($year . '-10-01');
        $to4 = date($year . '-12-31');



        
    if (auth()->user()->user_postion == 'District Pastor' ) {
    //1st quarter

        $bible = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('bible');
        $seven = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('seven');
        $worship = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('worship');
        $prophet = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('prophet');
        $signs = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('signs');
        $hope = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from, $to))
            ->sum('hope');
    //2nd quater
        $bible2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('bible');
        $seven2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('seven');
        $worship2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('worship');
        $prophet2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('prophet');
        $signs2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('signs');
        $hope2 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from2, $to2))
            ->sum('hope');
    //3rd quater
        $bible3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('bible');
        $seven3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('seven');
        $worship3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('worship');
        $prophet3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('prophet');
        $signs3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('signs');
        $hope3 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from3, $to3))
            ->sum('hope');
    //4th quater
        $bible4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('bible');
        $seven4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('seven');
        $worship4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('worship');
        $prophet4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('prophet');
        $signs4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('signs');
        $hope4 = communication:: where('user_id', $user)
            ->whereBetween('created_at', array($from4, $to4))
            ->sum('hope');
        }
        
        else {
        //1st quarter
        $bible = communication::whereBetween('created_at', array($from, $to))
            ->sum('bible');
        $seven = communication::whereBetween('created_at', array($from, $to))
            ->sum('seven');
        $worship = communication::whereBetween('created_at', array($from, $to))
            ->sum('worship');
        $prophet = communication::whereBetween('created_at', array($from, $to))
            ->sum('prophet');
        $signs = communication::whereBetween('created_at', array($from, $to))
            ->sum('signs');
        $hope = communication::whereBetween('created_at', array($from, $to))
            ->sum('hope');
    //2nd quater
        $bible2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('bible');
        $seven2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('seven');
        $worship2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('worship');
        $prophet2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('prophet');
        $signs2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('signs');
        $hope2 = communication::whereBetween('created_at', array($from2, $to2))
            ->sum('hope');
    //3rd quater
        $bible3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('bible');
        $seven3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('seven');
        $worship3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('worship');
        $prophet3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('prophet');
        $signs3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('signs');
        $hope3 = communication::whereBetween('created_at', array($from3, $to3))
            ->sum('hope');
    //4th quater
        $bible4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('bible');
        $seven4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('seven');
        $worship4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('worship');
        $prophet4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('prophet');
        $signs4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('signs');
       $hope4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('hope');
        }


        return view('/communication.index', compact(
        'bible', 'seven', 'worship', 'prophet', 'signs','hope',
        'bible2', 'seven2', 'worship2', 'prophet2', 'signs2', 'hope2',
        'bible3', 'seven3', 'worship3', 'prophet3', 'signs3', 'hope3',
        'bible4', 'seven4', 'worship4', 'prophet4', 'signs4', 'hope4', 'year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        $year = $request->input('year');
        return view('communication.create', compact('$year'));
    }

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
