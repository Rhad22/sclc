<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Report;
use App\Profile;
use App\Traits\reports;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $year)
    {
         
        
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
        $qr1 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from, $to))
            ->get();
        
    //2nd quater
        $qr2 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from2, $to2))
            ->get();
        
    //3rd quater
        $qr3 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from3, $to3))
            ->get();
        
    //4th quater
        $qr4 = Report::where('dept_id', $id)
            ->whereBetween('created_at', array($from4, $to4))
            ->get();
        
    //total
        $qrt = Report::where('dept_id', $id)
            ->whereYear('created_at', $year)
            ->get();

        // $content = Content::orderBy('id')->get();
        $content = array
            (
                array("BMW",15,13),
                array(
                    "Communication Department",
                    "No. of members following the yearly bible reading plan.",
                    "No. of members following the revive by his prophet initiative",
                    "No. of members following the 777 Program.",
                    "No. of church with directional signs.",
                    "No. of cable head ends carrying hope channel.",
                    "No of church following the hour of worship format"),
                array("Children's Ministries",15,13),
                array("Women's Ministries",17,15),
                array("Ministerial",5,2),
                array("Stewardship Ministries",17,15),
                array("Health Ministries",17,15),
                array("Personal Ministries",17,15),

            );
        $length = count($content[$id]);
        return view('/report.yearly', compact( 'year',
        'qr1','qr2','qr3','qr4','qrt', 'content', 'id', 'length'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
