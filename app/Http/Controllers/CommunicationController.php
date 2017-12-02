<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Content;
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
    
    //1st quater  
        $qr1 = Report::where('dept_id','1')
            ->whereBetween('created_at', array($from, $to))
            ->get();
        

    //2nd quater
        $qr2 = Report::where('dept_id','1')
            ->whereBetween('created_at', array($from2, $to2))
            ->get();
        
    //3rd quater
        $qr3 = Report::where('dept_id','1')
            ->whereBetween('created_at', array($from3, $to3))
            ->get();
        
    //4th quater
        $qr4 = Report::where('dept_id','1')
            ->whereBetween('created_at', array($from4, $to4))
            ->get();
        
    //total
        $qrt = Report::where('dept_id','1')
            ->whereYear('created_at', $year)
            ->get();
       
        $contents = Content::where('id','1')->get();
        return view('/communication.yearly',['qr1'=>$qr1,'qr2'=>$qr2,'qr3'=>$qr3,'qr4'=>$qr4,'qrt'=>$qrt, 'contents'=>$contents, 'year'=>$year]);
    }

    public function monthly(Request $request)
    {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $month = $request->input('month');
        ($year == "") ? $month = date('M'): "";
        $dept = 1;

        $tmonth = date("F", mktime(0, 0, 0, $month, 1, $year));
        $td = date("M", mktime(0, 0, 0, $month, 1, $year));
        // date("l", mktime(0, 0, 0, 7, 1, 2000));

        $days = Report::where('dept_id', $dept)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at','asc')
            ->get();

        $row1 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row1');
        $row2 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row2');
        $row3 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row3');
        $row4 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row4');
        $row5 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row5');
        $row6 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row6');


        $tmonth = date("F", mktime(0, 0, 0, $month, 1, $year));
        $td = date("M", mktime(0, 0, 0, $month, 1, $year));
        // date("l", mktime(0, 0, 0, 7, 1, 2000));

        $days = Report::where('dept_id', $dept)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at','asc')
            ->get();


        $row1 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row1');
        $row2 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row2');
        $row3 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row3');
        $row4 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row4');
        $row5 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row5');
        $row6 = Report::where('dept_id', $dept)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('row6');


        return view('communication.monthly', compact('days', 'row1', 'row2', 'row3', 'row4', 'row5', 'row6', 'year', 'month', 'tmonth', 'td'));
    }

    public function first(Request $request) {

        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $from1 = date($year. '-01-01');
        $to1 = date($year. '-01-31');
        $from2 = date($year. '-02-01');
        $to2 = date($year. '-02-30');
        $from3 = date($year. '-03-01');
        $to3 = date($year. '-03-31');
        $fromt1 = date($year. '-01-01');
        $tot1 = date($year. '-03-31');

        $bible1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row1');
        $seven1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row2');
        $worship1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row3');
        $prophet1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row4');
        $signs1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row5');
        $hope1 = Report::whereBetween('created_at', array($from1, $to1))
            ->sum('row6');

        $bible2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row1');
        $seven2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row2');
        $worship2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row3');
        $prophet2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row4');
        $signs2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row5');
        $hope2 = Report::whereBetween('created_at', array($from2, $to2))
            ->sum('row6');

        $bible3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row1');
        $seven3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row2');
        $worship3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row3');
        $prophet3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row4');
        $signs3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row5');
        $hope3 = Report::whereBetween('created_at', array($from3, $to3))
            ->sum('row6');

        $biblet1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row1');
        $sevent1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row2');
        $worshipt1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row3');
        $prophett1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row4');
        $signst1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row5');
        $hopet1 = Report::whereBetween('created_at', array($fromt1, $tot1))
            ->sum('row6');

        return view('communication.first', compact(
            'bible1', 'seven1', 'worship1', 'prophet1', 'signs1', 'hope1',
            'bible2', 'seven2', 'worship2', 'prophet2', 'signs2', 'hope2',
            'bible3', 'seven3', 'worship3', 'prophet3', 'signs3', 'hope3',
            'biblet1', 'sevent1', 'worshipt1', 'prophett1', 'signst1', 'hopet1',
            'year'));

    }

    public function second(Request $request) {
        
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $from4 = date($year. '-04-01');
        $to4 = date($year. '-04-31');
        $from5 = date($year. '-05-01');
        $to5 = date($year. '-05-30');
        $from6 = date($year. '-06-01');
        $to6 = date($year. '-06-31');
        $fromt2 = date($year. '-04-01');
        $tot2 = date($year. '-06-31');

        $bible4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row1');
        $seven4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row2');
        $worship4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row3');
        $prophet4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row4');
        $signs4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row5');
        $hope4 = Report::whereBetween('created_at', array($from4, $to4))
            ->sum('row6');

        $bible5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row1');
        $seven5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row2');
        $worship5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row3');
        $prophet5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row4');
        $signs5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row5');
        $hope5 = Report::whereBetween('created_at', array($from5, $to5))
            ->sum('row6');

        $bible6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row1');
        $seven6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row2');
        $worship6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row3');
        $prophet6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row4');
        $signs6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row5');
        $hope6 = Report::whereBetween('created_at', array($from6, $to6))
            ->sum('row6');

        $biblet2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row1');
        $sevent2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row2');
        $worshipt2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row3');
        $prophett2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row4');
        $signst2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row5');
        $hopet2 = Report::whereBetween('created_at', array($fromt2, $tot2))
            ->sum('row6');

        return view('communication.second', compact(
            'bible4', 'seven4', 'worship4', 'prophet4', 'signs4', 'hope4',
            'bible5', 'seven5', 'worship5', 'prophet5', 'signs5', 'hope5',
            'bible6', 'seven6', 'worship6', 'prophet6', 'signs6', 'hope6',
            'biblet2', 'sevent2', 'worshipt2', 'prophett2', 'signst2', 'hopet2',
            'year'));
        
    }

    public function third(Request $request) {
        
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $from7 = date($year. '-07-01');
        $to7 = date($year. '-07-31');
        $from8 = date($year. '-08-01');
        $to8 = date($year. '-08-30');
        $from9 = date($year. '-09-01');
        $to9 = date($year. '-09-31');
        $fromt3 = date($year. '-07-01');
        $tot3 = date($year. '-09-31');

        $bible7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row1');
        $seven7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row2');
        $worship7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row3');
        $prophet7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row4');
        $signs7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row5');
        $hope7 = Report::whereBetween('created_at', array($from7, $to7))
            ->sum('row6');

        $bible8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row1');
        $seven8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row2');
        $worship8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row3');
        $prophet8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row4');
        $signs8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row5');
        $hope8 = Report::whereBetween('created_at', array($from8, $to8))
            ->sum('row6');

        $bible9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row1');
        $seven9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row2');
        $worship9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row3');
        $prophet9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row4');
        $signs9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row5');
        $hope9 = Report::whereBetween('created_at', array($from9, $to9))
            ->sum('row6');

        $biblet3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row1');
        $sevent3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row2');
        $worshipt3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row3');
        $prophett3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row4');
        $signst3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row5');
        $hopet3 = Report::whereBetween('created_at', array($fromt3, $tot3))
            ->sum('row6');

        return view('communication.third', compact(
            'bible7', 'seven7', 'worship7', 'prophet7', 'signs7', 'hope7',
            'bible8', 'seven8', 'worship8', 'prophet8', 'signs8', 'hope8',
            'bible9', 'seven9', 'worship9', 'prophet9', 'signs9', 'hope9',
            'biblet3', 'sevent3', 'worshipt3', 'prophett3', 'signst3', 'hopet3',
            'year'));
        
    }

    public function fourth(Request $request) {  
        
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $from10 = date($year. '-10-01');
        $to10 = date($year. '-10-31');
        $from11 = date($year. '-11-01');
        $to11 = date($year. '-11-30');
        $from12 = date($year. '-12-01');
        $to12 = date($year. '-12-31');
        $fromt = date($year. '-10-01');
        $tot = date($year. '-12-31');

        $bible10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row1');
        $seven10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row2');
        $worship10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row3');
        $prophet10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row4');
        $signs10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row5');
        $hope10 = Report::whereBetween('created_at', array($from10, $to10))
            ->sum('row6');

        $bible11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row1');
        $seven11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row2');
        $worship11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row3');
        $prophet11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row4');
        $signs11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row5');
        $hope11 = Report::whereBetween('created_at', array($from11, $to11))
            ->sum('row6');

        $bible12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row1');
        $seven12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row2');
        $worship12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row3');
        $prophet12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row4');
        $signs12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row5');
        $hope12 = Report::whereBetween('created_at', array($from12, $to12))
            ->sum('row6');

        $biblet = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row1');
        $sevent = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row2');
        $worshipt = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row3');
        $prophett = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row4');
        $signst = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row5');
        $hopet = Report::whereBetween('created_at', array($fromt, $tot))
            ->sum('row6');


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
        $post = new Report;
        $post->user_id = auth()->user()->id;
        $post->dept_id = '1';
        $post->dept = 'communication';
        $post->row1 = $request->input('bible');
        $post->row2 = $request->input('seven');
        $post->row3 = $request->input('worship');
        $post->row4 = $request->input('prophet');
        $post->row5 = $request->input('signs');
        $post->row6 = $request->input('hope');
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
        $days = Report::find($id);
        return view('communication.edit', compact('days'));
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
        $this->validate($request, [
            'bible' => 'required',
            'seven' => 'required',
            'worship' => 'required',
            'prophet' => 'required',
            'signs' => 'required',
            'hope' => 'required'
        ]);

        $post = Report::find($id);
        $post->row1 = $request->input('bible');
        $post->row2 = $request->input('seven');
        $post->row3 = $request->input('worship');
        $post->row4 = $request->input('prophet');
        $post->row5 = $request->input('signs');
        $post->row6 = $request->input('hope');
        $post->save();

        return redirect('/communication.monthly')->with('success', 'Report Updated');
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
