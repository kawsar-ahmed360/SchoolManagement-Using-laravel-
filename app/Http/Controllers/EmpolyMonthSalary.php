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
use App\employsalarylogs;
use App\designations;
use App\leavepurposes;
use App\employleaves;
use App\employattendaces;
use App\User;
use DB;
use Image;
use PDF;
class EmpolyMonthSalary extends Controller
{
    public function Employ_monthSalaryview(){

    	return view('backend/Employ/month_fee/view');
    }

    public function Employ_monthSalaryajax(Request $Request){

    	$Request->validate([
         'date'=>'required',
    	]);

    	if ($Request->ajax()) {


    		$employ =employattendaces::with(['user'])->where('date','like',$Request->date.'%')->get(); 
    		
    		// $employ = DB::table('employattendaces')
      //                   ->join('users','employattendaces.employ_id','users.id')
      //                   ->select('employattendaces.*','users.name','users.id_no','users.selary')
    		//            ->where('employattendaces.date','like',$Request->date.'%')->get();



    		$html['thsourch'] = '<th>Sl</th>';
    		$html['thsourch'] .= '<th>Employ Name</th>';
    		$html['thsourch'] .= '<th>Employ Id No</th>';
    		$html['thsourch'] .= '<th>Preview Salary</th>';
    		$html['thsourch'] .= '<th>Total Absence</th>';
    		$html['thsourch'] .= '<th>Salary (This slaary)</th>';
    		$html['thsourch'] .= '<th>Action</th>';


    		foreach ($employ as $key=>$emp) {
    			
               $useratt = employattendaces::with(['user'])->where('employ_id',$emp->employ_id)->where('date','like',$Request->date.'%')->get();
                
               $absenceday = count($useratt->where('attendance','absence'));
               
           
             
               $color = "success";
    			$html[$key]['tdsourch'] = '<td>'.($key+1).'</td>';
    			$html[$key]['tdsourch'] .= '<td>'.$emp['user']->name.'</td>';
    			$html[$key]['tdsourch'] .= '<td>'.$emp['user']->id_no.'</td>';
    			$html[$key]['tdsourch'] .= '<td>'.$emp['user']->selary.'</td>';
    			$html[$key]['tdsourch'] .= '<td>'.$absenceday.'</td>';
    			
    			$old_salary = $emp['user']->selary;
    			$perdaysalary =$old_salary/30;
    			$absenceminus = $perdaysalary*$absenceday;
    			$originalammount = $old_salary-$absenceminus;
    			$html[$key]['tdsourch'] .= '<td>'.$originalammount.'</td>';
    			$html[$key]['tdsourch'] .='<td>';
                $html[$key]['tdsourch'] .='<a class="btn btn-sm btn-'.$color.'" href="'.route("Employ_monthSalarypayslip").'?employ_id='.$emp->employ_id.'">PaySlip</a>';
    			$html[$key]['tdsourch'] .='</td>';


    		}
    			return response()->json(@$html);
    	}
    }

    public function Employ_monthSalarypayslip(Request $Request){



    	 $data['edite'] =DB::table('employattendaces')
    	         ->join('users','employattendaces.employ_id','users.id')
    	         ->select('employattendaces.*','users.name','users.id_no','users.selary','users.number','users.image')
    	         ->where('employattendaces.employ_id',$Request->employ_id)->first();



           $abse = employattendaces::where('employ_id',$Request->employ_id)->get();

    	    $data['absence'] =count($abse->where('attendance','absence'));

    	         





    	   $old_salary =$data['edite']->selary;

    	   // return $old_salary;

    	   

    	   $day_salary =$old_salary/30;
    	   $absence_salary = $day_salary*$data['absence'];
    	   $data['final_ammount'] = $old_salary-$absence_salary;

    	   $pdf = PDF::loadView('backend/Employ/month_fee/pdf/monthly_fee_pdf', $data);
		     $pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');


    }
}
