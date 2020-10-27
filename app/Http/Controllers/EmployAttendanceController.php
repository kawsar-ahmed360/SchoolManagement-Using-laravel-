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
use App\employattendaces;
use App\User;
use DB;
use Image;
use PDF;
class EmployAttendanceController extends Controller
{
   public function Employ_Attendanceview(){

   	 $data['atten'] =employattendaces::select('date')->groupBy('date')->get(); 

   	return view('backend/Employ/employ_attendance/view',$data);
   }

   public function Employ_Attendanceadd(){
    
    $data['employ'] = user::where('userType','employ')->get();
   	return view('backend/Employ/employ_attendance/add_atten',$data);
   }

   public function Employ_AttendanceSave(Request $Request){
       
       // $Request->validate([
       //  'date'=>'required',
       // ]);


     
          
     



       $date_validate =employattendaces::whereDate('created_at',$Request->date)->get();

       if (count($date_validate)>0) {
          echo "error";

           $notification = array(
               'message'=>'attendsance alrady added',
               'alert-type'=>'error',
           );

          return redirect()->back()->with($notification); 
        }
   	 
         
        foreach ($Request->attendance as $key=>$att) {
        	
        	$atte =new employattendaces();
        	$atte->employ_id = $key;
        	$atte->date = $Request->date; 
        	$atte->attendance = $att;

        	$atte->save(); 
        }

        $notification = array(
         'message'=>'attendance succesfuuly added',
         'alert-type'=>'success',
        );

        return redirect()->route('Employ_Attendanceview')->with($notification);

   }

   public function Employ_Attendanceedite($date){
     
     $data['att'] =DB::table('employattendaces')
                   ->join('users','employattendaces.employ_id','users.id')
                   ->select('employattendaces.*','users.name','users.id_no')
                  ->where('employattendaces.date',$date)->get();

    
     

    return view('backend/Employ/employ_attendance/edite_att',$data);
   }

   public function Employ_AttendanceUpdate(Request $Request){

   	
 
   	         $edite = employattendaces::where('date',$Request->date)->delete();

   	          
        foreach($Request->attendance as $key=>$att) {
        	 
            $atte =new employattendaces();

            $atte->employ_id = $key;
        	$atte->date = $Request->date; 
        	$atte->attendance = $att;

        	$atte->save();  
             
        }

                $notification = array(
         'message'=>'attendance succesfuuly added',
         'alert-type'=>'success',
        );

        return redirect()->route('Employ_Attendanceview')->with($notification);

   }

   public function Employ_AttendanceEye($date){
           

           $data['user'] = DB::table('users')
                    ->join('employattendaces','employattendaces.employ_id','users.id')
                    ->select('users.*','employattendaces.date','employattendaces.attendance')
                   ->where('employattendaces.date',$date)
                   ->get(); 
    

         return view('backend/Employ/employ_attendance/details_att',$data);      

   }
}
