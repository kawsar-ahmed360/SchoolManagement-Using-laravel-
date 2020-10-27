<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subjects;
class SubjectManagement extends Controller
{
    public function Subjectview(){

    	$data['subject'] = subjects::get();

    	return view('backend/subject_manage/view_subject',$data);
    }   


     public function Subjectviewajax(){

    	$data['subject'] = subjects::get();

    	return view('backend/subject_manage/view_subject_ajax',$data);
    }

   public function SubjectSave(Request $Request){

   	$Request->validate([
      'subject'=>'required|unique:subjects,subject',
   	]);
        
        if ($Request->ajax()) {
        	
        	$s = new subjects();
        	$s->subject = $Request->subject;
        	$s->status = 1;
        	$s->save();

        	return $this->Subjectviewajax($Request);
        }

   }

   public function SubjectActiveajax(Request $Request){
     
     if ($Request->ajax()) {
     	
     	$ac = subjects::find($Request->SubjectId);
     	$ac->status=2;
     	$ac->save();

     	return $this->Subjectviewajax($Request);
     }

   }  

    public function SubjectDeleteajax(Request $Request){
     
     if ($Request->ajax()) {
     	
     	$ac = subjects::find($Request->SubjectId);
     	$ac->delete();

     	return $this->Subjectviewajax($Request);
     }

   }


   public function SubjectEditeajax(Request $Request){

        $edite = subjects::find($Request->shiftId);
        
        $Request->validate([
        'subject'=>'required|unique:subjects,subject,'.$edite->id
        ]);

        if ($Request->ajax()) {
        	
        	$edite->subject = $Request->subject;
        	$edite->save();
           
           return $this->Subjectviewajax($Request);

        }


   }


}
