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
use App\User;
use DB;
use Image;
use PDF;
class EmploySalaryController extends Controller
{
    public function Employ_Salaryview(){
           
           $data['employ'] = user::where('userType','employ')->get();
    	return view('backend/Employ/employ_salary/view',$data);
    }

    public function Employ_Salaryincrement($id){
        
        $data['edite'] = employsalarylogs::where('employ_id',$id)->first();


    	return view('backend/Employ/employ_salary/increment_salary',$data);
    }

    public function Employ_SalarySave(Request $Request){
    	 

    	 DB::transaction(function()use($Request){



               $user = user::where('id',$Request->employ_id)->first();
               $previous_salary= $user->selary;
               $present_salary = (float)$previous_salary+(float)$Request->increment_salary;
               $user->selary = $present_salary;
               $user->save();

               $employ_salary =new employsalarylogs();
               $employ_salary->employ_id = $Request->employ_id;
               $employ_salary->previous_salary = $previous_salary;
               $employ_salary->increment_salary = $Request->increment_salary;
               $employ_salary->present_salary = $present_salary;
               $employ_salary->effacted_date = $Request->effacted_date;
               $employ_salary->save();


    	 });

    	 		$notification = array(
    	      'message'=>'student successfully Update',
              'alert-type'=>'success',
    		);
   

    	return redirect()->route('Employ_Salaryview')->with($notification);
    }

    public function Employ_SalaryEye($id){

    	$data['user'] = user::find($id);
    	$data['employ_salary'] = employsalarylogs::where('employ_id',$data['user']->id)->get();
    	
    	return view('backend/Employ/employ_salary/emplpy_salary_details',$data);
    }
}
