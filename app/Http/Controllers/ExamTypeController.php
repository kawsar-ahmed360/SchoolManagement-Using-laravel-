<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\examtypes;
class ExamTypeController extends Controller
{
    public function ExamTypeview(){

    	$data['exam'] = examtypes::get();

    	return view('backend/exam_type/view_exam',$data);
    }  


     public function ExamTypeviewajax(){

    	$data['exam'] = examtypes::get();

    	return view('backend/exam_type/view_exam_ajax',$data);
    }

    public function ExamTypeSave(Request $Request){

    	if ($Request->ajax()) {
    		
    		$s = new examtypes();

    		$s->exam_name = $Request->exam_name;
    		$s->status = 1;
    		$s->save();

    		return $this->ExamTypeviewajax($Request);
    	}
    }

    public function ExamTypeActiveajax(Request $Request){

        if ($Request->ajax()) {
            
            $a = examtypes::find($Request->ExamId);
            $a->status = 2;
            $a->save();

            return $this->ExamTypeviewajax($Request);
        }
    }   


     public function ExamTypeDeactiveajax(Request $Request){

        if ($Request->ajax()) {
            
            $a = examtypes::find($Request->ExamId);
            $a->status = 1;
            $a->save();

            return $this->ExamTypeviewajax($Request);
        }
    }


    public function ExamTypeDeleteajax(Request $Request){

        if ($Request->ajax()) {
            
            $a = examtypes::find($Request->ExamId);
            $a->delete();

            return $this->ExamTypeviewajax($Request);
        }
    }

    public function ExamTypeEditeajax(Request $Request){

        $edite = examtypes::find($Request->examId);

        $Request->validate([
         'exam_name'=>'required|unique:examtypes,exam_name,'.$edite->id
        ]);

        if ($Request->ajax()) {
            
            $edite->exam_name= $Request->exam_name;
            $edite->save();

            return $this->ExamTypeviewajax($Request);
        }
    }
}
