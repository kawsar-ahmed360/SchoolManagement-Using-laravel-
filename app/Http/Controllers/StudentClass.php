<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentclasses;
class StudentClass extends Controller
{
    public function studentClassview(){
        
        $data['class'] =studentclasses::get();
    	return view('backend/student_class/view_student',$data);
    }

    public function studentClassviewajax(){
       
        $data['class'] =studentclasses::get();
    	return view('backend/student_class/view_student_ajax',$data);

    }

    public function studentClassSave(Request $Request){

    	$Request->validate([
        'class_name'=>'required|unique:studentclasses,class_name',
    	]);

    	if ($Request->ajax()) {
    		
    		 $class = new studentclasses();
    		 $class->class_name = $Request->class_name;
    		 $class->status = 1;
    		 $class->save();

    		 return $this->studentClassviewajax($Request);
    	}
    }

    public function studentClassActiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$active = studentclasses::find($Request->classId);
    		$active->status = 2;
    		$active->save();

    		return $this->studentClassviewajax($Request);
    	}
    }  


     public function studentClassDeactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$active = studentclasses::find($Request->classId);
    		$active->status = 1;
    		$active->save();

    		return $this->studentClassviewajax($Request);
    	}
    } 

      public function studentClassDeleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$active = studentclasses::find($Request->classId);
    		$active->delete();

    		return $this->studentClassviewajax($Request);
    	}
    }

    public function studentClassEditeajax(Request $Request){

    	$edite = studentclasses::find($Request->useriD);

    	$Request->validate([
          'class_name'=>'required|unique:studentclasses,class_name,'.$edite->id
    	]);

    	
    		
    		$edite->class_name = $Request->class_name;
    		$edite->save();

    		return $this->studentClassviewajax($Request);
    	
    }
}
