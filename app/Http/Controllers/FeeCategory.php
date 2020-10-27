<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feecategorys;
class FeeCategory extends Controller
{
    public function FeeCategoryview(){
      
      $data['fee'] = feecategorys::get();
    	return view('backend/fee_category/view_fee',$data);
    } 


     public function FeeCategoryviewajax(){
      
      $data['fee'] = feecategorys::get();
    	return view('backend/fee_category/view_fee_ajax',$data);
    }

    public function FeeCategorySave(Request $Request){

    	$Request->validate([
         'fee_category'=>'required|unique:feecategorys,fee_category',
    	 ]);

    	if ($Request->ajax()) {
    		
    		 $s = new feecategorys();
    		 $s->fee_category = $Request->fee_category;
    		 $s->status = 1;
    		 $s->save();

    		 return $this->FeeCategoryviewajax($Request);
    	}
    }

    public function FeeCategoryActiveajax(Request $Request){

    	 if ($Request->ajax()) {
    	 	
    	 	$a = feecategorys::find($Request->feeId);
    	 	$a->status =2;
    	 	$a->save();

    	 	return $this->FeeCategoryviewajax($Request);
    	 }
    }  

      public function FeeCategoryDeactiveajax(Request $Request){

    	 if ($Request->ajax()) {
    	 	
    	 	$a = feecategorys::find($Request->feeId);
    	 	$a->status =1;
    	 	$a->save();

    	 	return $this->FeeCategoryviewajax($Request);
    	 }
    }    

      public function FeeCategoryDeleteajax(Request $Request){

    	 if ($Request->ajax()) {
    	 	
    	 	$a = feecategorys::find($Request->feeId);
    	 	$a->delete();

    	 	return $this->FeeCategoryviewajax($Request);
    	 }
    }

    public function FeeCategoryEditeajax(Request $Request){

    	$edite = feecategorys::find($Request->feeId);
       
       $Request->validate([
       'fee_category'=>'required|unique:feecategorys,fee_category,'.$edite->id
       ]);
 
    	if ($Request->ajax()) {
    		
       $edite->fee_category = $Request->fee_category;
       $edite->save();

       return $this->FeeCategoryviewajax($Request);
    	}
    }
}
