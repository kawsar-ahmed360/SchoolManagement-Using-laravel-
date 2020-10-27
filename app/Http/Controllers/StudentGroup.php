<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentgrouops;
class StudentGroup extends Controller
{
    public function studentGroupview(){
        $data['group'] = studentgrouops::get();
    	return view('backend/student_group/view_group',$data);
    }  

      public function studentGroupviewajax(){
        $data['group'] = studentgrouops::get();
    	return view('backend/student_group/view_group_ajax',$data);
    }

    public function studentGroupSave(Request $Request){
     
     $Request->validate([
      'group'=>'required|unique:studentgrouops,group',
     ]);
    	if ($Request->ajax()) {
    		
    		  $save = new studentgrouops();
    		  $save->group=$Request->group;
    		  $save->status=1;
    		  $save->save();

    		 return $this->studentGroupviewajax($Request); 
    	}
    }

    public function studentGroupActiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = studentgrouops::find($Request->gId);
    		$a->status=2;
    		$a->save();
    		 return $this->studentGroupviewajax($Request); 
    	}
    } 

       public function studentGroupDeactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = studentgrouops::find($Request->gId);
    		$a->status=1;
    		$a->save();
    		 return $this->studentGroupviewajax($Request); 
    	}
    }    

       public function studentGroupDeleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = studentgrouops::find($Request->gId);
    		$a->delete();
    		 return $this->studentGroupviewajax($Request); 
    	}
    }

    public function studentGroupEditeajax(Request $Request){
     
         $edite = studentgrouops::find($Request->grupId);
    	$Request->validate([
         'group'=>'required|unique:studentgrouops,group,'.$edite->id
    	]);

       if ($Request->ajax()) {
       	
       	 $edite->group = $Request->group;
       	 $edite->save();
       	 return $this->studentGroupviewajax($Request);
       }
       	
    }
}
