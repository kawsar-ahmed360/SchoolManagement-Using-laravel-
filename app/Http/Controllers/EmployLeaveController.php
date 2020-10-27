<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignstudents;
use App\discountstudents;
use App\shifts;
use App\studentclasses;
use App\sessions;
use App\studentgrouops;
use App\feecategoryammounts;
use App\employsalarylogs;
use App\designations;
use App\leavepurposes;
use App\employleaves;
use App\User;
use DB;
use Image;
use PDF;
class EmployLeaveController extends Controller
{
    public function Employ_Leaveview(){
   
     $data['leave'] = employleaves::get();

     return view('backend/Employ/employ_leave/view',$data);

    }

    public function Employ_Leaveadd(){

    	$data['leavepurpose'] = leavepurposes::all();
    	$data['employ'] = user::where('userType','employ')->get();

    	return view('backend/Employ/employ_leave/add_leave',$data);
    }

    public function Employ_LeaveSave(Request $Request){


      // return $Request->all();
       
       $Request->validate([
       'employ_id'=>'required',
       // 'leave_purpose_id'=>'required',
       'start_date'=>'required',
       'end_date'=>'required',
       ]);
    	DB::transaction(function()use($Request){

    		 if ($Request->leave_purpose_id=='name') {
    		 	
    		 	 $leave_perpose = new leavepurposes();
    		 	 $leave_perpose->name = $Request->name;
           $leave_perpose->save();
    		 	 $purpose_id = $leave_perpose->id; 
    		 }else{

    		 $purpose_id = $Request->leave_purpose_id;

         }

              
              $employ_leave =new employleaves();
              $employ_leave->employ_id = $Request->employ_id; 
              $employ_leave->leave_purpose_id = $purpose_id; 
              $employ_leave->start_date = $Request->start_date; 
              $employ_leave->end_date = $Request->end_date;

              $employ_leave->save(); 
    	});

    	$notifation = array(
          'message' =>'Over All success fully inserted',
          'alert-type'=>'success',
    	);

    	return redirect()->route('Employ_Leaveview')->with($notifation);
    }

    public function Employ_Leaveedite($id){

    	$data['edite'] =employleaves::find($id);
    	$data['leavepurpose'] = leavepurposes::get();
    	$data['employ'] = user::where('userType','employ')->get();

    	return view('backend/Employ/employ_leave/add_leave',$data); 
    }

    public function Employ_LeaveUpdate(Request $Request){

        $update =employleaves::where('id',$Request->id)->update(['start_date'=>$Request->start_date,'end_date'=>$Request->end_date]);

      $notifation = array(
          'message' =>'Over All success fully inserted',
          'alert-type'=>'success',
      );

      return redirect()->route('Employ_Leaveview')->with($notifation);  

    }
}
