<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\Content;
use App\Report;
use App\Notify;
use App\Profile;
use App\User;
use PDF;
use App\Traits\reports;

class ReportController extends Controller
{
    use reports;

    public function yearly(Request $request, $id) {
        

        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $qr1 = $this->qr1($id, $year);
        $qr2 = $this->qr2($id, $year);
        $qr3 = $this->qr3($id, $year);
        $qr4 = $this->qr4($id, $year);
        $qrt = $this->qrt($id, $year);

        $content = $this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('/report.yearly', compact( 'year',
        'qr1','qr2','qr3','qr4','qrt', 'content', 'id', 'length', 'notifies', 'sidebar', 'dept'));
    }

    public function yearlyPDF($id, $year) {
        $qr1 = $this->qr1($id, $year);
        $qr2 = $this->qr2($id, $year);
        $qr3 = $this->qr3($id, $year);
        $qr4 = $this->qr4($id, $year);
        $qrt = $this->qrt($id, $year);

        $content = $this->data();
        $length = count($content[$id]);

        $url = url()->previous();
        $pdf = PDF::loadView('report.pdfyearly', compact('year',
        'qr1','qr2','qr3','qr4','qrt', 'content', 'id', 'length', 'notifies', 'sidebar', 'dept','url'));

        return $pdf->stream('SCLC_yearly_report.pdf');

    }

    public function first(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        
        $m1 = $this->jan($id, $year);
        $m2 = $this->feb($id, $year);
        $m3 = $this->mar($id, $year);
        $mt = $this->total1($id, $year);

        $content =$this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('/report.first', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length', 'notifies', 'sidebar', 'dept'));

    }

    public function firstPDF($id, $year) {
        $m1 = $this->jan($id, $year);
        $m2 = $this->feb($id, $year);
        $m3 = $this->mar($id, $year);
        $mt = $this->total1($id, $year);

        $content =$this->data();
        $length = count($content[$id]);

        $url = url()->previous();
        $pdf = PDF::loadView('report.pdffirst', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length','url'));

        return $pdf->stream('SCLC_quarterly_report.pdf');

    }

    public function second(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";

        $m1 = $this->apr($id, $year);
        $m2 = $this->may($id, $year);
        $m3 = $this->jun($id, $year);
        $mt = $this->total2($id, $year);
        
        $content =$this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('/report.second', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length', 'notifies', 'sidebar', 'dept'));
    }

    public function secondPDF($id, $year) {
        $m1 = $this->apr($id, $year);
        $m2 = $this->may($id, $year);
        $m3 = $this->jun($id, $year);
        $mt = $this->total2($id, $year);

        $content =$this->data();
        $length = count($content[$id]);


        $url = url()->previous();
        $pdf = PDF::loadView('report.pdfsecond', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length','url'));

        return $pdf->stream('SCLC_quarterly_report.pdf');

    }

    public function third(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        
        $m1 = $this->jul($id, $year);
        $m2 = $this->aug($id, $year);
        $m3 = $this->sept($id, $year);
        $mt = $this->total3($id, $year);
        
        $content =$this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('/report.third', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length', 'notifies', 'sidebar', 'dept'));

    }

    public function thirdPDF($id, $year) {
        $m1 = $this->jul($id, $year);
        $m2 = $this->aug($id, $year);
        $m3 = $this->sept($id, $year);
        $mt = $this->total3($id, $year);

        $content =$this->data();
        $length = count($content[$id]);

        $url = url()->previous();
        $pdf = PDF::loadView('report.pdfthird', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length','url'));

        return $pdf->stream('SCLC_quarterly_report.pdf');

    }


    public function fourth(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        
        $m1 = $this->oct($id, $year);
        $m2 = $this->nov($id, $year);
        $m3 = $this->dec($id, $year);
        $mt = $this->total4($id, $year);
        
        $content = $this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('/report.fourth', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length', 'notifies', 'sidebar', 'dept'));

    }

    public function fourthPDF($id, $year) {
        $m1 = $this->oct($id, $year);
        $m2 = $this->nov($id, $year);
        $m3 = $this->dec($id, $year);
        $mt = $this->total4($id, $year);

        $content =$this->data();
        $length = count($content[$id]);

        $url = url()->previous();
        $pdf = PDF::loadView('report.pdffourth', compact('m1', 'm2', 'm3', 'mt','id', 'year', 'content', 'length','url'));

        return $pdf->stream('SCLC_quarterly_report.pdf');

    }

    public function monthly(Request $request, $id) {
        $year = $request->input('year');
        ($year == "") ? $year = date('Y'): "";
        $month = $request->input('month');
        ($month == "") ? $month = date('m'): "";
        $days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $hmonth  = date("F", strtotime("2011-".$month. "-01"));
        $user_id = auth()->user()->id;
        $dept = $this->dept();
        $content = $this->title();
        $length = count($content[$id]);
        $data = array (0,);
        if (auth()->user()->position == 'District Pastor' ) {
            $sdata = Report::where('dept_id', $id)
                    ->where('user_id', $user_id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->get();
        }

        else {$data = $this->daily($id, $year, $month, $length, $days);}
        $total = $this->alldaily($id, $year, $month, $length);


        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();


        $names =  $this->sender($id);
        

        return view('/report.monthly', compact('data', 'year', 'id', 'content', 'length', 'days', 'dept', 'month', 'hmonth', 'total', 'sdata', 'notifies', 'sidebar', 'dept', 'names'));
    }

    public function monthlyPDF($year,$month, $id){
        $dept = $this->dept();
        
        $hmonth  = date("F", strtotime("2011-".$month. "-01"));
        $days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $content = $this->data();
        $length = count($content[$id]);
        $data = $this->daily($id, $year, $month, $length, $days);
        $total = $this->alldaily($id, $year, $month, $length);
        $names =  $this->sender($id);
        $url = url()->previous();
        $pdf = PDF::loadView('report.pdf', compact('data', 'year', 'id', 'content', 'length', 'days', 'dept', 'month', 'hmonth', 'total', 'sdata', 'notifies', 'sidebar', 'dept', 'names','url'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('SCLC_monthly_report.pdf');
    }

    public function viewreport(Request $request, $ids, $link_id, $notif_id)
    {
        $id = Notify::where('link_id', $link_id)->value('sender');
        $user = User::where('id' ,$id)->first();

        $markasread = Notify::find($notif_id);
        $markasread->read = 1;
        $markasread->save();

        $days = Report::find($link_id);
        $content = $this->title();
        $length = count($content[$ids]);
        $dept = $this->dept();
         
        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('report.viewreport', compact('notifies', 'sidebar', 'dept', 'content', 'length', 'ids', 'days', 'user')); 
    }

    public function report($id) {
        $content =$this->data();
        $length = count($content[$id]);

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('report.create', compact('content', 'length', 'id', 'notifies', 'sidebar', 'dept'));
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

        $dept = $request->input('dept_name');

        $users = User::with('position')->whereIn('position', array('Admin', 'Director of '.$dept))
            ->orWhere('id', auth()->user()->id)
            ->get();


        foreach ($users as $position) {
            Notify::create([
                'sender' => auth()->user()->id,
                'receiver' => $position->id,
                'content' => 'sent a report in '. $dept,
                'read' => 0,
                'type' => 0,
                'link_id' => $post->id,
                'dept_id' =>  $request->input('dept')
            ]);
        }

        return redirect()->back()->with('success', ' Report sent successfully');
    }

    public function edit($ids, $id)
    {
        $days = Report::find($id);
        $content = $this->title();
        $length = count($content[$ids]);
        $dept = $this->dept();

        $notifies = $this->notification();
        $sidebar = $this->sidebar();
        $dept = $this->dept();

        return view('report.edit', compact('days', 'content', 'length', 'ids', 'dept', 'notifies', 'sidebar', 'dept'));
    }

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
    

}
