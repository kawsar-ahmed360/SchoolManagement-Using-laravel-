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
use App\examtypes;
use App\User;
use DB;
use PDF;
use Image;

class ExamfeeController extends Controller
{
    public function Student_ExamFee(){
         
         $data['class'] = studentclasses::where('status','2')->OrderBy('id','asc')->get();
         $data['year'] = sessions::where('status','2')->OrderBy('id','asc')->get();
         $data['exam'] = examtypes::where('status','1')->OrderBy('id','asc')->get();

    	return view('backend/student/student_Exam_fee/view',$data);
    }

    public function StudentExamAjax(Request $Request){

           if ($Request->ajax()) {
           	
           	 $asssing = assignstudents::with(['discountstudents'])->where('class_id','like',$Request->class_id.'%')->where('session_id','like',$Request->session_id.'%')->get();

           	  $html['thsourch'] = '<th>Sl</th>';
           	  $html['thsourch'] .= '<th>Student Id</th>';
           	  $html['thsourch'] .= '<th>Student Name</th>';
           	  $html['thsourch'] .= '<th>Student Roll</th>';
           	  $html['thsourch'] .= '<th>Exam Name</th>';
           	  $html['thsourch'] .= '<th>Exam Fee</th>';
           	  $html['thsourch'] .= '<th>Discount</th>';
           	  $html['thsourch'] .= '<th>Current Fee(This Student)</th>';
           	  $html['thsourch'] .= '<th>Action</th>';

           	  foreach ($asssing as $key=>$value) {
           	  	
           	  	 $examfee = feecategoryammounts::where('fee_category_id','2')->where('class_id',$value->class_id)->first();
                 
                 $examname = examtypes::where('id',$Request->exam_id)->first();

                $color = 'success';
           	  	  $html[$key]['tdsourch'] = '<td>'.($key+1).'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$value['user']['id_no'].'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$value['user']['name'].'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$value['roll'].'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$examname['exam_name'].'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$examfee['ammount'].' Taka'.'</td>';
           	  	  $html[$key]['tdsourch'] .= '<td>'.$value['discountstudents']['discount'].'%'.'</td>';

           	  	  $examfee = $examfee->ammount;
           	  	  $discount =$value['discountstudents']['discount'];
           	  	  $dicountfee = $discount/100*$examfee;
           	  	  $finalfee = (float)$examfee-(float)$dicountfee;

           	  	  $html[$key]['tdsourch'] .= '<td>'.$finalfee.' Taka'.'</td>';   
           	  	  $html[$key]['tdsourch'] .= '<td>'; 
           	  	  
           	  	  $html[$key]['tdsourch'] .= '<a class="btn btn-sm btn-'.$color.'" title="paysip" target="_blank" href="'.route("Examfeepayslip").'?class_id='.$value->class_id.'&student_id='.$value->student_id.'&exam_id='.$Request->exam_id.'">paySlip</a>'; 

           	  	  $html[$key]['tdsourch'] .= '</td>';   
           	  }

           	  return response()->json(@$html);

           }
    }

    public function Examfeepayslip(Request $Request){
         

    	 
       $data['edite'] = DB::table('assignstudents')
                        ->join('users','assignstudents.student_id','users.id')
                        ->join('sessions','assignstudents.session_id','sessions.id')
                        ->join('studentclasses','assignstudents.class_id','studentclasses.id')
                        ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
                        ->select('assignstudents.*','users.name','users.image','users.address','users.image','users.fname','users.id_no','users.number','sessions.session','studentclasses.class_name','discountstudents.discount')
                        ->where('assignstudents.class_id',$Request->class_id)->where('assignstudents.student_id',$Request->student_id)->first();

                 $data['examname'] =feecategoryammounts::where('fee_category_id','2')->where('class_id',$Request->class_id)->first();

                 $data['examname'] = examtypes::where('id',$Request->exam_id)->first();
                 
                 $totalamm = $data['examname']->ammount;
                 $discount = $data['edite']->discount;
                 $discountfee =$discount/100*$totalamm;
                 $data['finalfee'] = (float)$totalamm-(float)$discountfee;        

    	$pdf = PDF::loadView('backend/student/student_Exam_fee/pdf/exam_fee_pdf', $data);
		     $pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');
    }
}
