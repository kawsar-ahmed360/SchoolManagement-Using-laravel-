<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shifts;
class StudentShift extends Controller
{
   public function studentShiftview(){
      
      $data['shift'] =shifts::get(); 
   	return view('backend/student_shift/view_shift',$data);
   }

   public function studentShiftviewajax(){
      
      $data['shift'] =shifts::get(); 
   	return view('backend/student_shift/view_shift_ajax',$data);
   }

   public function studentShiftSave(Request $Request){
      
      $Request->validate([
       'shift'=>'required|unique:shifts,shift',
      ]);

      if ($Request->ajax()) {
      	
      	$s = new shifts();
      	$s->shift = $Request->shift;
      	$s->status = 1;
      	$s->save();

      	return $this->studentShiftviewajax($Request);
      }

   }

   public function studentShiftActiveajax(Request $Request){
        
        if ($Request->ajax()) {
        	
        	$a= shifts::find($Request->SId);
        	$a->status = 2;
        	$a->save();
        	return $this->studentShiftviewajax($Request);
        }

   }  


    public function studentShiftDeactiveajax(Request $Request){
        
        if ($Request->ajax()) {
        	
        	$a= shifts::find($Request->SId);
        	$a->status = 1;
        	$a->save();
        	return $this->studentShiftviewajax($Request);
        }

   }  

     public function studentShiftDeleteajax(Request $Request){
        
        if ($Request->ajax()) {
        	
        	$a= shifts::find($Request->SId);
        	$a->delete();
        	return $this->studentShiftviewajax($Request);
        }

   }

   public function studentShiftEditeajax(Request $Request){
      
      $edite = shifts::find($Request->shiftId);

      $Request->validate([
       'shift'=>'required|unique:shifts,shift,'.$edite->id
      ]);

      if ($Request->ajax()) {
      	
      	$edite->shift = $Request->shift;
      	$edite->save();
      	return $this->studentShiftviewajax($Request);
      }

   }
}
