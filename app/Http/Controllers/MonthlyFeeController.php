<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignstudents;
use App\discountstudents;
use App\shifts;
use App\studentclasses;
use App\sessions;
use App\studentgrouops;
use App\feecategoryammounts;
use App\User;
use DB;
use PDF;
use Image;
class MonthlyFeeController extends Controller
{
    public function Student_MonthlyFee(){

    	$data['class'] = studentclasses::where('status','2')->OrderBy('id','desc')->get();
    	$data['year'] = sessions::where('status','2')->OrderBy('id','asc')->get();

    	return view('backend/student/student_monthly_fee/view',$data);
    }

    public function StudentMonthlyAjax(Request $Request){

     $class_id = $Request->class_id;
     $session_id = $Request->session_id;
     $month = $Request->month;



    	if ($Request->ajax()) {
    		
    		$assing = assignstudents::with(['discountstudents'])->where('class_id','like',$class_id.'%')->where('session_id','like',$session_id.'%')->get();
           
            $html['thsourch'] = '<th>Sl</th>';
            $html['thsourch'] .= '<th>ID No</th>';
            $html['thsourch'] .= '<th>Month</th>';
            $html['thsourch'] .= '<th>Student Name</th>';
            $html['thsourch'] .= '<th>Roll Number</th>';
            $html['thsourch'] .= '<th>Monthly Fee</th>';
            $html['thsourch'] .= '<th>Discount Ammount</th>';
            $html['thsourch'] .= '<th>Fee (This Student)</th>';
            $html['thsourch'] .= '<th>Action</th>';

           foreach ($assing as $key=>$value) {
           	
           	   $monthfee = feecategoryammounts::where('fee_category_id','4')->where('class_id',$value->class_id)->first();
               $color = "success";
           	   $html[$key]['tdsourch'] = '<td>'.($key+1).'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$value['user']['id_no'].'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$Request->month.'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$value['user']['name'].'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$value['roll'].'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$monthfee['ammount'].'Taka'.'</td>';
           	   $html[$key]['tdsourch'] .= '<td>'.$value['discountstudents']['discount'].'%'.'</td>';

           	   $fullammount =$monthfee->ammount;
           	   $discount = $value['discountstudents']['discount'];
           	   $discountfee =$discount/100*$fullammount;
           	   $finalfee = (float)$fullammount-(float)$discountfee;

           	   $html[$key]['tdsourch'] .= '<td>'.$finalfee.'Taka'.'</td>';

           	   $html[$key]['tdsourch'] .='<td>';
           	   $html[$key]['tdsourch'] .='<a class="btn btn-sm btn-'.$color.'" title="payslip" target="_blank" href="'.route("Monthlyfeepayslip").'?class_id='.$value->class_id.'&student_id='.$value->student_id.'&month='.$Request->month.'">payslip</a>';
           	   $html[$key]['tdsourch'] .='</td>';


           }

           return response()->json(@$html);
    	}
    }

    public function Monthlyfeepayslip(Request $Request){
         
         $data['month'] = $Request->month;

         $data['edite'] = DB::table('assignstudents')
                          ->join('users','assignstudents.student_id','users.id')
                          ->join('sessions','assignstudents.session_id','sessions.id')
                          ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
                          ->join('studentclasses','assignstudents.class_id','studentclasses.id')
                          ->select('assignstudents.*','users.name','users.image','users.id_no','users.address','users.number','users.fname','sessions.session','studentclasses.class_name','discountstudents.discount')
                         ->where('assignstudents.class_id',$Request->class_id)->where('assignstudents.student_id',$Request->student_id) 
                         ->first();
              $data['monthlyfee'] = feecategoryammounts::where('fee_category_id','4')->where('class_id',$Request->class_id)->first();

              $monthlfeee = $data['monthlyfee']->ammount;
              $discounts = $data['edite']->discount;
              $monthlydiscountfee = $discounts/100*$monthlfeee;
              $data['finalfee'] = (float)$monthlfeee-(float)$monthlydiscountfee;          


    	$pdf = PDF::loadView('backend/student/student_monthly_fee/pdf/monthly_fee_pdf', $data);
		     $pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');
    }
}
