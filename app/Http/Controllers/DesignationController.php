<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\designations;
class DesignationController extends Controller
{
    public function Designationview(){

    	$data['designation'] =designations::get();

    	return view('backend/designation/designation_view',$data); 
    }  


      public function Designationviewajax(){

    	$data['designation'] = designations::get();

    	return view('backend/designation/designation_view_ajax',$data); 
    }


    public function DesignationSave(Request $Request){

    	$Request->validate([
         'name'=>'required|unique:designations,name',
    	]);

    	if ($Request->ajax()) {
    		
    		$s = new designations();
    		$s->name = $Request->name;
    		$s->status = 1;
    		$s->save();

    	 return $this->Designationviewajax($Request);	
    	}
    }

    public function DesignationActiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = designations::find($Request->DesiId);
    		$a->status=2;
    		$a->save();
    		return $this->Designationviewajax($Request);	
    	}
    }  

      public function DesignationDeactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = designations::find($Request->DesiId);
    		$a->status=1;
    		$a->save();
    		return $this->Designationviewajax($Request);	
    	}
    }    


      public function DesignationDeleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = designations::find($Request->DesiId);
    		$a->delete();
    		return $this->Designationviewajax($Request);	
    	}
    }

    public function DesignationEditeajax(Request $Request){

    	$edite = designations::find($Request->desId);

    	$Request->validate([
       'name'=>'required|unique:designations,name,'.$edite->id
    	]);

    	if ($Request->ajax()) {
    		
    		$edite->name = $Request->name;
    		$edite->save();
    		return $this->Designationviewajax($Request);
    	}


    }
}
