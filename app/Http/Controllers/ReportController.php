<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Report;
use App\Profile;
use App\Traits\reports;

class ReportController extends Controller
{
    use reports;

    public function yearly(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $from = date($year . '-01-01');
        $to = date($year . '-03-31');
        $from2 = date($year . '-04-01');
        $to2 = date($year . '-06-30');
        $from3 = date($year . '-07-01');
        $to3 = date($year . '-09-30');
        $from4 = date($year . '-10-01');
        $to4 = date($year . '-12-31');
        $qr1 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from, $to))
            ->get();
        $qr2 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from2, $to2))
            ->get();
        $qr3 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from3, $to3))
            ->get();
        $qr4 = Report::where('dept_id', $id)
            ->whereBetween('created_at', array($from4, $to4))
            ->get();
        $qrt = Report::where('dept_id', $id)
            ->whereYear('created_at', $year)
            ->get();
        $content = $this->data();
        $length = count($content[$id]);
        return view('/report.yearly', compact( 'year',
        'qr1','qr2','qr3','qr4','qrt', 'content', 'id', 'length'));
    }

    public function first(Request $request, $id) {
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
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        $content =$this->data();
        $length = count($content[$id]);
        return view('/report.first', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length'));
    }

    public function second(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $from1 = date($year. '-04-01');
        $to1 = date($year. '-04-31');
        $from2 = date($year. '-05-01');
        $to2 = date($year. '-05-30');
        $from3 = date($year. '-06-01');
        $to3 = date($year. '-06-31');
        $fromt1 = date($year. '-04-01');
        $tot1 = date($year. '-06-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        $content =$this->data();
        $length = count($content[$id]);
        return view('/report.second', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length'));
    }

    public function third(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $from1 = date($year. '-07-01');
        $to1 = date($year. '-07-31');
        $from2 = date($year. '-08-01');
        $to2 = date($year. '-08-30');
        $from3 = date($year. '-09-01');
        $to3 = date($year. '-09-31');
        $fromt1 = date($year. '-07-01');
        $tot1 = date($year. '-09-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        $content =$this->data();
        $length = count($content[$id]);
        return view('/report.third', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length'));
    }


    public function fourth(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $from1 = date($year. '-10-01');
        $to1 = date($year. '-10-31');
        $from2 = date($year. '-11-01');
        $to2 = date($year. '-11-30');
        $from3 = date($year. '-12-01');
        $to3 = date($year. '-12-31');
        $fromt1 = date($year. '-10-01');
        $tot1 = date($year. '-12-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        $content = $this->data();
        $length = count($content[$id]);
        return view('/report.fourth', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length'));
    }

    public function monthly(Request $request, $id) {
         $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $month = $request->input('month');
        ($month == "") ? $month = date('m'): "";
        $days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $hmonth  = date("F", strtotime("2011-".$month. "-01"));
        $user_id = 2;
        $dept = $this->dept();
        $content = $this->title();
        $length = count($content[$id]);
        $data = array ();
        if (auth()->user()->position == 'District Pastor' ) {
            $sdata = Report::where('dept_id', $id)
                    ->where('user_id', $user_id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->get();
        }
        else {
            for ($i=1; $i <= $length; $i++) { 
            $new =  array ();
            for ($x=1; $x <= $days; $x++) { 
                array_push($new, $day = Report::where('dept_id', $id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $x)
                    ->sum('row'.$i));
                }
            array_push($data,$new);
            }
        }
        $total = array ();
        for ($x=1; $x <= $length; $x++) { 
                array_push($total, $day = Report::where('dept_id', $id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->sum('row'.$x));
        }
        return view('/report.monthly', compact('data', 'year', 'id', 'content', 'length', 'days', 'dept', 'hmonth', 'total', 'sdata'));
    }

    
    public function report($id) {
        $content =$this->data();
        $length = count($content[$id]);
        return view('report.create', compact('content', 'length', 'id'));
    }

    public function store(Request $request) {
        $post = new Report;
        $post->user_id = auth()->user()->id;
        $post->dept_id =  $request->input('dept');
        $post->dept = $request->input('dept_name');
        $post->row1 = $request->input('row1');
        $post->row2 = $request->input('row2');
        $post->row3 = $request->input('row3');
        $post->row4 = $request->input('row4');
        $post->row5 = $request->input('row5');
        $post->row6 = $request->input('row6');
        $post->row7 = $request->input('row7');
        $post->row8 = $request->input('row8');
        $post->row9 = $request->input('row9');
        $post->row10 = $request->input('row10');
        $post->row11 = $request->input('row11');
        $post->row12 = $request->input('row12');
        $post->row13 = $request->input('row13');
        $post->row14 = $request->input('row14');
        $post->row15 = $request->input('row15');
        $post->row16 = $request->input('row16');
        $post->row17 = $request->input('row17');
        $post->row18 = $request->input('row18');
        $post->row19 = $request->input('row19');
        $post->row20 = $request->input('row20');
        $post->row21 = $request->input('row21');
        $post->row22 = $request->input('row22');
        $post->row23 = $request->input('row23');
        $post->row24 = $request->input('row24');
        $post->row25 = $request->input('row25');
        $post->row26 = $request->input('row26');
        $post->row27 = $request->input('row27');
        $post->row28 = $request->input('row28');
        $post->row29 = $request->input('row29');
        $post->row30 = $request->input('row30');
        $post->row31 = $request->input('row31');
        $post->row32 = $request->input('row32');
        $post->row33 = $request->input('row33');
        $post->row34 = $request->input('row34');
        $post->row35 = $request->input('row35');
        $post->row36 = $request->input('row36');
        $post->row37 = $request->input('row37');
        $post->row38 = $request->input('row38');
        $post->row39 = $request->input('row39');
        $post->row40 = $request->input('row40');
        $post->row41 = $request->input('row41');
        $post->row42 = $request->input('row42');
        $post->row43 = $request->input('row43');    
        $post->row44 = $request->input('row44');
        $post->row45 = $request->input('row45');
        $post->save();
        return redirect()->back()->with('success', ' Report send successfully');
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
    public function edit($ids, $id)
    {
        $days = Report::find($id);
        $content = $this->title();
        $length = count($content[$ids]);
        $dept = $this->dept();

        return view('report.edit', compact('days', 'content', 'length', 'ids', 'dept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids, $id)
    {
        $post = Report::find($id);
        $post->row1 = $request->input('row1');
        $post->row2 = $request->input('row2');
        $post->row3 = $request->input('row3');
        $post->row4 = $request->input('row4');
        $post->row5 = $request->input('row5');
        $post->row6 = $request->input('row6');
        $post->row7 = $request->input('row7');
        $post->row8 = $request->input('row8');
        $post->row9 = $request->input('row9');
        $post->row10 = $request->input('row10');
        $post->row11 = $request->input('row11');
        $post->row12 = $request->input('row12');
        $post->row13 = $request->input('row13');
        $post->row14 = $request->input('row14');
        $post->row15 = $request->input('row15');
        $post->row16 = $request->input('row16');
        $post->row17 = $request->input('row17');
        $post->row18 = $request->input('row18');
        $post->row19 = $request->input('row19');
        $post->row20 = $request->input('row20');
        $post->row21 = $request->input('row21');
        $post->row22 = $request->input('row22');
        $post->row23 = $request->input('row23');
        $post->row24 = $request->input('row24');
        $post->row25 = $request->input('row25');
        $post->row26 = $request->input('row26');
        $post->row27 = $request->input('row27');
        $post->row28 = $request->input('row28');
        $post->row29 = $request->input('row29');
        $post->row30 = $request->input('row30');
        $post->row31 = $request->input('row31');
        $post->row32 = $request->input('row32');
        $post->row33 = $request->input('row33');
        $post->row34 = $request->input('row34');
        $post->row35 = $request->input('row35');
        $post->row36 = $request->input('row36');
        $post->row37 = $request->input('row37');
        $post->row38 = $request->input('row38');
        $post->row39 = $request->input('row39');
        $post->row40 = $request->input('row40');
        $post->row41 = $request->input('row41');
        $post->row42 = $request->input('row42');
        $post->row43 = $request->input('row43');    
        $post->row44 = $request->input('row44');
        $post->row45 = $request->input('row45');
        $post->save();
        return redirect()->back()->with('success', ' Report successfully Updated');
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

    public function awe($id) {

        echo $id;
    }
}
