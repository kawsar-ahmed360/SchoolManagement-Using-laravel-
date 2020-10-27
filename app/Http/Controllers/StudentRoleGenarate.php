<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignstudents;
use App\discountstudents;
use App\shifts;
use App\studentclasses;
use App\sessions;
use App\studentgrouops;
use App\User;
use DB;
use PDF;
use Image;
class StudentRoleGenarate extends Controller
{
   public function Student_Rollview(){

   	 $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
         $data['all_data'] = assignstudents::get(); 
    	return view('backend/student/student_roll_genarate/student_view',$data);
   } 

   public function StudentRollJax(Request $Request){

   	if ($Request->ajax()) {
   		
   		$fulldata = assignstudents::with(['user'])->where('class_id',$Request->class_id)->where('session_id',$Request->session_id)->get();

   		return response()->json($fulldata);
   	}
   }

   public function StudentRollPost(Request $Request){



      if ($Request->student_id!=null) {
      	
      	 foreach ($Request->student_id as $key=>$value) {
      	 	 
      	 	 $assign = assignstudents::where('class_id',$Request->class_id)->where('session_id',$Request->session_id)->where('student_id',$value)->update(['roll'=>$Request->roll[$key]]);

      	 	
      	 }
      	
      }else{

      	return redirect()->back();
      }

      return redirect()->route('Student_Rollview')->with('success','data');
   }
}
