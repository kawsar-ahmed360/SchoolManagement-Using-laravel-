<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assingsubjects;
use App\studentclasses;
use App\subjects;
use DB;
class AssignSubjectController extends Controller
{
    public function AssignSubjectview(){

    	$data['assing_subject'] = assingsubjects::select('class_id')->groupBy('class_id')->get();

    	return view('backend/assign_subject/subject_view',$data);
    }

    public function add_subject(){

    	$data['class'] = studentclasses::where('status','2')->get();
    	$data['subject'] = subjects::where('status','2')->get();

    	return view('backend/assign_subject/modal/add_subject',$data);
    }

    public function AssignSubjectSave(Request $Request){

    	$Request->validate([
          'class_id'=>'required',
          'subject_id'=>'required',
          'full_mark'=>'required',
          'pass_mark'=>'required',
          'get_mark'=>'required', 
    	]);
        
        if ($Request->subject_id == null) {
        	return redirect()->back();
        }else{
            
            foreach ($Request->subject_id as $key=>$value) {
            	
            	$ins = new assingsubjects();
            	$ins->class_id = $Request->class_id;
            	$ins->subject_id = $value;
            	$ins->full_mark = $Request->full_mark[$key];
            	$ins->pass_mark = $Request->pass_mark[$key];
            	$ins->get_mark = $Request->get_mark[$key];
            	$ins->save();
            }

        }

        if ($ins->save()) {
          	  	echo "success";
          	  	$nofication = array(
                 'message'=>'over all successfully inserted',
                 'alert-type'=>'success',
          	  	);

          	  }

          return redirect()->back()->with($nofication);
    }

    public function AssignSubjectEditeajax($class_id){


        $data['class'] = studentclasses::where('status','2')->get();
    	$data['subject'] = subjects::where('status','2')->get();

    	$data['edite'] = assingsubjects::where('class_id',$class_id)->get();

    	return view('backend/assign_subject/modal/edite',$data);
    }

    public function AssignSubjectupdate(Request $Request,$class_id){


    	    if ($Request->class_id==null) {
    	    	
    	    	return redirect()->back();
    	    }else{

           // return $Request->all();

    	    	$edite = assingsubjects::whereNotIn('subject_id',$Request->subject_id)->where('class_id',$class_id)->delete();

    	    	foreach ($Request->subject_id as $key=>$value) {

              $subjectexist =assingsubjects::where('subject_id',$Request->subject_id[$key])->where('class_id',$Request->class_id)->first();

              if ($subjectexist) {
                $ins =$subjectexist; 
              }else{

    	    	    $ins = new assingsubjects();
              }

            	$ins->class_id = $Request->class_id;
            	$ins->subject_id = $value;
            	$ins->full_mark = $Request->full_mark[$key];
            	$ins->pass_mark = $Request->pass_mark[$key];
            	$ins->get_mark = $Request->get_mark[$key];
            	$ins->save();
                


    	    	}
    	    }

    	      if ($ins->save()) {
          	  	echo "success";
          	  	$nofication = array(
                 'message'=>'over all successfully Update',
                 'alert-type'=>'success',
          	  	);

          	  }

          return redirect()->route('AssignSubjectview')->with($nofication);


    }

    public function AssignSubjectEye($class_id){

    	$data['assing_subject'] = DB::table('assingsubjects')
    	                         ->join('subjects','assingsubjects.subject_id','subjects.id')
    	                         ->join('studentclasses','assingsubjects.class_id','studentclasses.id')
    	                         ->select('assingsubjects.*','subjects.subject','studentclasses.class_name')
    	                         ->where('class_id',$class_id)->get();

    	return view('backend/assign_subject/modal/eye',$data);
    }
}
