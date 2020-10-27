<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sessions;
class StudentYear extends Controller
{
    public function studentyearview(){
       
       $data['session'] = sessions::get();
    	return view('backend/student_session/view_session',$data);
    }  

    public function studentyearviewajax(){
       
       $data['session'] = sessions::get();
    	return view('backend/student_session/view_session_ajax',$data);
    }

    public function studentyearSave(Request $Request){

    	  $Request->validate([
           'session'=>'required|unique:sessions,session',
    	  ]);

    	  if ($Request->ajax()) {
    	  	
    	  	$save = new sessions();

    	  	$save->session = $Request->session;
    	  	$save->status = 1;
    	  	$save->save();
    	  	return $this->studentyearviewajax($Request);
    	  }
    }

    public function studentyearActiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sessions::find($Request->SessionId);
    		$a->status = 2;
    		$a->save();
    		return $this->studentyearviewajax($Request);
    	}
    } 


      public function studentyearDeactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sessions::find($Request->SessionId);
    		$a->status = 1;
    		$a->save();
    		return $this->studentyearviewajax($Request);
    	}
    }    


      public function studentyearDeleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sessions::find($Request->SessionId);
    		$a->delete();
    		return $this->studentyearviewajax($Request);
    	}
    }

    public function studentyearEditeajax(Request $Request){
           
           $edite = sessions::find($Request->SessioId);

    	$Request->validate([
          'session'=>'required|unique:sessions,session,'.$edite->id
    	]);

    	if ($Request->ajax()) {
    		
    		$edite->session = $Request->session;
    		$edite->save();

    		return $this->studentyearviewajax($Request);
    	}
    }
}
