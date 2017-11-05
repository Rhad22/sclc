<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Communication;
use App\Profile;
use App\Traits\reports;

class CommunicationController extends Controller
{
    use Reports;
    
    public function index(Request $request)
    {
        $year = $request->input('year');
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
    //tatol
        $tfrom = date($year . '-01-01');
        $tto = date($year . '-12-31');
        
       
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
    //total
        $tbible = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('bible');
        $tseven = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('seven');
        $tworship = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('worship');
        $tprophet = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('prophet');
        $tsigns = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('signs');
        $thope = communication::whereBetween('created_at', array($tfrom, $tto))
            ->sum('hope');

        return view('/communication.yearly', compact( 'year',
        'bible', 'seven', 'worship', 'prophet', 'signs','hope',
        'bible2', 'seven2', 'worship2', 'prophet2', 'signs2', 'hope2',
        'bible3', 'seven3', 'worship3', 'prophet3', 'signs3', 'hope3',
        'bible4', 'seven4', 'worship4', 'prophet4', 'signs4', 'hope4', 
        'tbible', 'tseven', 'tworship', 'tprophet', 'tsigns', 'thope'));
    }

    public function monthly()
    {   
        $month = 11;
        $year = 2017;

        $from4 = date($year. '-' .$month. '-04 01:00:00' );
        $to4 = date($year.'-' .$month. '-04 24:60:60');
        $from5 = date($year. '-' .$month. '-05 01:00:00');
        $to5 = date($year.'-' .$month. '-05 24:60:60');

        $bible4 = communication::whereBetween('created_at', array($from4, $to4))
            ->sum('bible');
        $bible5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('bible');


        return view('communication.monthly', compact('bible4', 'bible5', 'from4'));
    }

    public function first(Request $request) {

        $year = $request->input('year');

        $from1 = date($year. '-01-01');
        $to1 = date($year. '-01-31');
        $from2 = date($year. '-02-01');
        $to2 = date($year. '-02-30');
        $from3 = date($year. '-03-01');
        $to3 = date($year. '-03-31');
        $fromt1 = date($year. '-01-01');
        $tot1 = date($year. '-03-31');

        $bible1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('bible');
        $seven1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('seven');
        $worship1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('worship');
        $prophet1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('prophet');
        $signs1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('signs');
        $hope1 = communication::whereBetween('created_at', array($from1, $to1))
            ->sum('hope');

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

        $biblet1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('bible');
        $sevent1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('seven');
        $worshipt1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('worship');
        $prophett1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('prophet');
        $signst1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('signs');
        $hopet1 = communication::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('hope');

        return view('communication.first', compact(
            'bible1', 'seven1', 'worship1', 'prophet1', 'signs1', 'hope1',
            'bible2', 'seven2', 'worship2', 'prophet2', 'signs2', 'hope2',
            'bible3', 'seven3', 'worship3', 'prophet3', 'signs3', 'hope3',
            'biblet1', 'sevent1', 'worshipt1', 'prophett1', 'signst1', 'hopet1',
            'year'));

    }

    public function second(Request $request) {
        
        $year = $request->input('year');

        $from4 = date($year. '-04-01');
        $to4 = date($year. '-04-31');
        $from5 = date($year. '-05-01');
        $to5 = date($year. '-05-30');
        $from6 = date($year. '-06-01');
        $to6 = date($year. '-06-31');
        $fromt2 = date($year. '-04-01');
        $tot2 = date($year. '-06-31');

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

        $bible5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('bible');
        $seven5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('seven');
        $worship5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('worship');
        $prophet5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('prophet');
        $signs5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('signs');
        $hope5 = communication::whereBetween('created_at', array($from5, $to5))
            ->sum('hope');

        $bible6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('bible');
        $seven6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('seven');
        $worship6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('worship');
        $prophet6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('prophet');
        $signs6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('signs');
        $hope6 = communication::whereBetween('created_at', array($from6, $to6))
            ->sum('hope');

        $biblet2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('bible');
        $sevent2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('seven');
        $worshipt2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('worship');
        $prophett2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('prophet');
        $signst2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('signs');
        $hopet2 = communication::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('hope');

        return view('communication.second', compact(
            'bible4', 'seven4', 'worship4', 'prophet4', 'signs4', 'hope4',
            'bible5', 'seven5', 'worship5', 'prophet5', 'signs5', 'hope5',
            'bible6', 'seven6', 'worship6', 'prophet6', 'signs6', 'hope6',
            'biblet2', 'sevent2', 'worshipt2', 'prophett2', 'signst2', 'hopet2',
            'year'));
        
    }

    public function third(Request $request) {
        
        $year = $request->input('year');

        $from7 = date($year. '-07-01');
        $to7 = date($year. '-07-31');
        $from8 = date($year. '-08-01');
        $to8 = date($year. '-08-30');
        $from9 = date($year. '-09-01');
        $to9 = date($year. '-09-31');
        $fromt3 = date($year. '-07-01');
        $tot3 = date($year. '-09-31');

        $bible7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('bible');
        $seven7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('seven');
        $worship7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('worship');
        $prophet7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('prophet');
        $signs7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('signs');
        $hope7 = communication::whereBetween('created_at', array($from7, $to7))
            ->sum('hope');

        $bible8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('bible');
        $seven8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('seven');
        $worship8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('worship');
        $prophet8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('prophet');
        $signs8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('signs');
        $hope8 = communication::whereBetween('created_at', array($from8, $to8))
            ->sum('hope');

        $bible9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('bible');
        $seven9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('seven');
        $worship9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('worship');
        $prophet9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('prophet');
        $signs9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('signs');
        $hope9 = communication::whereBetween('created_at', array($from9, $to9))
            ->sum('hope');

        $biblet3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('bible');
        $sevent3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('seven');
        $worshipt3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('worship');
        $prophett3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('prophet');
        $signst3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('signs');
        $hopet3 = communication::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('hope');

        return view('communication.third', compact(
            'bible7', 'seven7', 'worship7', 'prophet7', 'signs7', 'hope7',
            'bible8', 'seven8', 'worship8', 'prophet8', 'signs8', 'hope8',
            'bible9', 'seven9', 'worship9', 'prophet9', 'signs9', 'hope9',
            'biblet3', 'sevent3', 'worshipt3', 'prophett3', 'signst3', 'hopet3',
            'year'));
        
    }

    public function fourth(Request $request) {  
        
        $year = $request->input('year');

        $from10 = date($year. '-10-01');
        $to10 = date($year. '-10-31');
        $from11 = date($year. '-11-01');
        $to11 = date($year. '-11-30');
        $from12 = date($year. '-12-01');
        $to12 = date($year. '-12-31');
        $fromt = date($year. '-10-01');
        $tot = date($year. '-12-31');

        $bible10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('bible');
        $seven10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('seven');
        $worship10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('worship');
        $prophet10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('prophet');
        $signs10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('signs');
        $hope10 = communication::whereBetween('created_at', array($from10, $to10))
            ->sum('hope');

        $bible11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('bible');
        $seven11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('seven');
        $worship11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('worship');
        $prophet11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('prophet');
        $signs11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('signs');
        $hope11 = communication::whereBetween('created_at', array($from11, $to11))
            ->sum('hope');

        $bible12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('bible');
        $seven12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('seven');
        $worship12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('worship');
        $prophet12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('prophet');
        $signs12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('signs');
        $hope12 = communication::whereBetween('created_at', array($from12, $to12))
            ->sum('hope');

        $biblet = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('bible');
        $sevent = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('seven');
        $worshipt = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('worship');
        $prophett = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('prophet');
        $signst = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('signs');
        $hopet = communication::whereBetween('created_at', array($fromt, $tot))
            ->sum('hope');


        return view('communication.fourth', compact(
            'bible10', 'seven10', 'worship10', 'prophet10', 'signs10', 'hope10',
            'bible12', 'seven12', 'worship12', 'prophet12', 'signs12', 'hope12',
            'bible11', 'seven11', 'worship11', 'prophet11', 'signs11', 'hope11',
            'biblet', 'sevent', 'worshipt', 'prophett', 'signst', 'hopet',
            'year'));
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
