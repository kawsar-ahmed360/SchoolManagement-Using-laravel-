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
class RegistationFeeCcontroller extends Controller
{
    public function Student_RegisFee(){
        $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
    	return view('backend/student/student_registaion/view',$data);
    }

    public function StudentRegisAjax(Request $Request){
      
      $class_id = $Request->class_id;
      $session_id = $Request->session_id;

      // if ($class_id!='') {
      // 	$where[] = ['class_id','like',$class_id.'%'];
      	
      // }
      // if ($session_id!='') {
      // 	$where[] = ['session_id','like',$session_id.'%'];
      // }

       $assign = assignstudents::with(['discountstudents'])->where('class_id','like',$class_id.'%')->where('session_id','like',$session_id.'%')->get();

       $html['thsourch'] = '<th>Sl</th>';         
       $html['thsourch'] .= '<th>Id No</th>';         
       $html['thsourch'] .= '<th>Student Name</th>';         
       $html['thsourch'] .= '<th>Roll Number</th>';         
       $html['thsourch'] .= '<th>Registation</th>';         
       $html['thsourch'] .= '<th>Discount Ammount</th>';         
       $html['thsourch'] .= '<th>Fee(This Student)</th>';         
       $html['thsourch'] .= '<th>Action</th>';

       foreach ($assign as $key=>$value) {
                	
               $RegistationFee = feecategoryammounts::where('fee_category_id','1')->where('class_id',$value->class_id)->first();
               $color = "success";
               $html[$key]['tdsourch'] = '<td>'.($key+1).'</td>';
               $html[$key]['tdsourch'] .= '<td>'.$value['user']['id_no'].'</td>';
               $html[$key]['tdsourch'] .= '<td>'.$value['user']['name'].'</td>';
               $html[$key]['tdsourch'] .= '<td>'.$value['roll'].'</td>';
               $html[$key]['tdsourch'] .= '<td>'.$RegistationFee->ammount.'Tk'.'</td>';
               $html[$key]['tdsourch'] .= '<td>'.$value['discountstudents']['discount'].'%'.'</td>';

               $originalfee = $RegistationFee->ammount;
               $discount = $value['discountstudents']['discount'];
               $discounttablefee = $discount/100*$originalfee;
               $finalfree = (float)$originalfee-(float)$discounttablefee;

               $html[$key]['tdsourch'] .= '<td>'.$finalfree.'Tk'.'</td>';
               $html[$key]['tdsourch'] .='<td>';

               $html[$key]['tdsourch'] .='<a class="btn btn-sm btn-'.$color.'" title="payslip" target="_blank" href="'.route("payslip").'?class_id='.$value->class_id.'&student_id='.$value->student_id.'">Fee Slip</a>'; 
               $html[$key]['tdsourch'] .='</td>';
            }

            return response()->json(@$html);         

    }

    public function payslip(Request $Request){

    	$data['edite'] = DB::table('assignstudents')
                         ->join('users','assignstudents.student_id','users.id')
                         ->join('sessions','assignstudents.session_id','sessions.id')
                         ->join('studentclasses','assignstudents.class_id','studentclasses.id')
                         ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
                         ->select('assignstudents.*','users.name','users.fname','users.id_no','users.image','users.number','users.address','sessions.session','studentclasses.class_name','discountstudents.discount')
    	                 ->where('assignstudents.class_id',$Request->class_id)->where('assignstudents.student_id',$Request->student_id)->first();

    	$data['RegistatioFee'] = feecategoryammounts::where('fee_category_id','1')->where('class_id',$Request->class_id)->first();
    	
    	$originalfee = $data['RegistatioFee']->ammount;
    	$discount = $data['edite']->discount/100*$originalfee;
    	$data['discountfeeammount'] = (float)$originalfee-(float)$discount;




    		$pdf = PDF::loadView('backend/student/student_registaion/pdf/student_fee_pdf', $data);
		     $pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');    
    }
}
