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
use App\gradepoints;
use DB;
use Image;
use PDF;
class GradePointController extends Controller
{
    public function GrapdePointview(){
       $data['grade'] = gradepoints::get();
    	return view('backend/Grade_point/view',$data);
    }

    public function GrapdePointadd(){

    	return view('backend/Grade_point/add_grade_point');
    }

    public function GrapdePointSave(Request $Request){

    	$Request->validate([
         'grade_name'=>'required',
         'grade_point'=>'required',
         'start_marks'=>'required',
         'end_marks'=>'required',
         'start_point'=>'required',
         'end_point'=>'required',
         'remarks'=>'required',
    	]);


    	$grade =new gradepoints();
    	$grade->grade_name =$Request->grade_name;
    	$grade->grade_point =$Request->grade_point;
    	$grade->start_marks =$Request->start_marks;
    	$grade->end_marks =$Request->end_marks;
    	$grade->start_point =$Request->start_point;
    	$grade->end_point =$Request->end_point;
    	$grade->remarks =$Request->remarks;

    	$grade->save();

    	$notification = array(
    	      'message'=>'student Grade successfully inserted',
              'alert-type'=>'success',
    		);

    	return redirect()->route('GrapdePointview')->with($notification);
    }

    public function GrapdePointedite($id){
      
      $data['edite'] = gradepoints::find($id);

      return view('backend/Grade_point/add_grade_point',$data);
       
    }

    public function GrapdePointUpdate(Request $Request){

    	$update = gradepoints::where('id',$Request->id)->update([
         'grade_name'=>$Request->grade_name,
		'grade_point'=>$Request->grade_point,
		'start_marks'=>$Request->start_marks,
		'end_marks'=>$Request->end_marks,
		'start_point'=>$Request->start_point,
		'end_point'=>$Request->end_point,
		'remarks'=>$Request->remarks,

    	]);

    		$notification = array(
    	      'message'=>'Grade successfully Updated',
              'alert-type'=>'success',
    		);

    	return redirect()->route('GrapdePointview')->with($notification);
    }
}
