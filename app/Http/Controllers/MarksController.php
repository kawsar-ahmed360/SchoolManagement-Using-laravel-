<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignstudents;
use App\assingsubjects;
use App\discountstudents;
use App\shifts;
use App\studentclasses;
use App\sessions;
use App\subjects;
use App\studentgrouops;
use App\student_marks;
use App\feecategoryammounts;
use App\employsalarylogs;
use App\designations;
use App\leavepurposes;
use App\employleaves;
use App\employattendaces;
use App\examtypes;
use App\User;
use DB;
use Image;
use PDF;
class MarksController extends Controller
{
    public function Employ_markEntyadd(){
        $data['session'] = sessions::where('status','2')->get();
        $data['class'] = studentclasses::where('status','2')->get();
        $data['exam'] = examtypes::where('status','1')->get();
    	return view('backend/mark_management/add_mark',$data);
    }

    public function Employ_assign_subjectajax(Request $Request){

    	if ($Request->ajax()) {
    		
    	    $allData = DB::table('assingsubjects')
    	              ->join('subjects','assingsubjects.subject_id','subjects.id')
    	              ->select('assingsubjects.*','subjects.subject')
    	              ->where('assingsubjects.class_id',$Request->class_id)->get();

    	    // return $allData;

    	    return Response()->json($allData);
    	}
    }

    public function Employ_assign_studentajax(Request $Request){

    	

    		
    		$student = DB::table('assignstudents')
    		          ->join('users','assignstudents.student_id','users.id')
    		          ->select('assignstudents.*','users.name','users.id_no','users.gender')
    		          ->where('assignstudents.class_id',$Request->class_id)->where('assignstudents.session_id',$Request->session_id)->get();


    		// $student = assignstudents::where('class_id',$Request->class_id)->where('session_id',$Request->session_id)->get();

    		// return $student;


    		      return response()->json($student);    
    	
    }

    public function Employ_markEntySave(Request $Request){


    	// return $Request->all();

    	$Request->validate([
            'student_id'=>'required',
           
    	]);

    	if ($Request->student_id==null) {
    		return redirect()->back();
    	}else{

    	DB::transaction(function()use($Request){

    			foreach ($Request->student_id as $key=>$value) {
    			
    			$mark =new student_marks();
    			$mark->student_id = $value;
    			$mark->id_no = $Request->id_no[$key];
    			$mark->session_id = $Request->session_id;
    			$mark->class_id = $Request->class_id;
    			$mark->assing_subject_id = $Request->assing_subject_id;
    			$mark->exam_type_id = $Request->exam_type_id;
    			$mark->marks = $Request->marks[$key];

    			$mark->save();
    		}
    	});
    	}

    	 $notificatin= array(
         'message'=>'succesfuuly marke enty',
         'alert-type'=>'success',
    	 );

    	return redirect()->back()->with($notificatin);
    }

    public function Employ_markEntyedite(){
         
          $data['session'] = sessions::where('status','2')->get();
        $data['class'] = studentclasses::where('status','2')->get();
        $data['exam'] = examtypes::where('status','1')->get();
    	return view('backend/mark_management/edite_mark',$data);
    }


    public function Employ_markEntyUpdate(Request $Request){

    	$allData = DB::table('student_marks')
    	           ->join('users','student_marks.student_id','users.id')
    	           ->select('student_marks.*','users.name','users.gender','users.id_no')
    	           ->where([
                   'student_marks.class_id'=>$Request->class_id,
                   'student_marks.session_id'=>$Request->session_id,
                   'student_marks.assing_subject_id'=>$Request->assing_subject_id,
                   'student_marks.exam_type_id'=>$Request->exam_type_id,
    	           ])
    	           ->get();

    	        return response()->json($allData);   
    }

    public function Employ_markEntyUpdateroute(Request $Request){
       
       student_marks::where('class_id',$Request->class_id)->where('session_id',$Request->session_id)->where('assing_subject_id',$Request->assing_subject_id)->where('exam_type_id',$Request->exam_type_id)->delete();

          foreach ($Request->student_id as $key=>$value) {
          	
          	 $update =new student_marks();
          	 $update->student_id = $value; 
          	 $update->id_no = $Request->id_no[$key]; 
          	 $update->session_id = $Request->session_id; 
          	 $update->class_id = $Request->class_id;  
          	 $update->assing_subject_id = $Request->assing_subject_id;  
          	 $update->exam_type_id = $Request->exam_type_id;  
          	 $update->marks = $Request->marks[$key];

          	 $update->save();  
          }

           $notificatin= array(
         'message'=>'succesfuuly marke Update',
         'alert-type'=>'success',
    	 );

    	return redirect()->back()->with($notificatin);
    } 
}
