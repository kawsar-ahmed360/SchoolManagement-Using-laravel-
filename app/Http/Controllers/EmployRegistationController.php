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
use App\User;
use DB;
use Image;
use PDF;
class EmployRegistationController extends Controller
{
    public function Employ_regview(){

    	$data['employ'] = User::where('userType','employ')->get();

    	return view('backend/Employ/employ_registation/view',$data);
    }
    public function Employ_regadd(){

    	$data['designation'] =designations::where('status','2')->get();

    	return view('backend/Employ/employ_registation/add_amploy',$data); 
    }

    public function Employ_regSave(Request $Request){

    	 $Request->validate([
          'name'=>'required',
         'email'=>'required',
         'number'=>'required',
         'address'=>'required',
         'gender'=>'required',
         'religion'=>'required',
         'dob'=>'required',
         'selary'=>'required',
         'join_date'=>'required',
         'designation_id'=>'required',
    	  ]);

    	 DB::transaction(function()use($Request){
             
             $checkyear = date('Ym',strtotime($Request->join_date));

             $user = user::where('userType','employ')->OrderBy('id','desc')->first();

             if ($user == null) {
             	$newreg = 0;
             	$employId = $newreg+1;

             	if ($employId<10) {
             		
             		$id_no = '000'.$employId;
             	}elseif ($employId<100) {
             		$id_no = '00'.$employId;
             	}elseif ($employId<1000) {
             		$id_no = '0'.$employId;
             	}
             }else{

             	$user = user::where('userType','employ')->first()->id;
             	$employId =$user+1; 
             	if ($employId<10) {
             		$id_no = '000'.$employId;
             	}elseif ($employId<100) {
             		$id_no = '00'.$employId;
             	}elseif ($employId<1000) {
             		$id_no = '0'.$employId;
             	}
             }

             $final_id =$checkyear.$id_no;
             $code = rand(0000,9999);
             $employ =new user();
             $employ->id_no = $final_id; 
             $employ->code = $code; 
             $employ->password = bcrypt($code); 
             $employ->userType = 'employ'; 
             $employ->user_roll = '3'; 
             $employ->name = $Request->name; 
             $employ->email = $Request->email; 
             $employ->number = $Request->number; 
             $employ->address = $Request->address;
              $employ->selary = $Request->selary; 
             $employ->gender = $Request->gender; 
             $employ->religion = $Request->religion; 
             $employ->dob = $Request->dob; 
             $employ->join_date = $Request->join_date; 
             $employ->designation_id = $Request->designation_id; 
             
             if ($Request->hasFile('image')) {
             	
             	$image = $Request->file('image');
             	$full_name = time().'.'.$image->getClientOriginalExtension();

             	Image::make($image)->resize(300,320)->save('public/backend/employ_profile/'.$full_name);

             	$employ->image = $full_name;
             }

             $employ->save();

             $employ_salary =new employsalarylogs();
             $employ_salary->employ_id = $employ->id;
             $employ_salary->previous_salary = $Request->selary;
             $employ_salary->present_salary = $Request->selary;
             $employ_salary->increment_salary = '0';
             $employ_salary->effacted_date = date('Y-m-d',strtotime($Request->join_date));
             $employ_salary->save();
    	 });

    	 $notificaion  = array(
         'message'=>'employe successfully registared',
         'alert-type'=>'success'
    	 );

    	 return redirect()->route('Employ_regview')->with($notificaion);
    }

    public function Employ_regEdite($id){

    	$data['edite'] = DB::table('employsalarylogs')
                        ->join('users','employsalarylogs.employ_id','users.id')
                        ->select('employsalarylogs.*','users.name','users.email','users.number','users.address','users.gender','users.join_date','users.dob','users.designation_id','users.selary','users.image','users.religion')
                        ->where('employsalarylogs.employ_id',$id)->first(); 

                        
    	$data['designation'] =designations::where('status','2')->get();

    	

    	return view('backend/Employ/employ_registation/add_amploy',$data); 
    }

    public function Employ_regUpdate(Request $Request,$employ_id){


        DB::transaction(function()use($Request,$employ_id){
              
              $user = user::where('id',$employ_id)->first();
              $user->name = $Request->name; 
             $user->email = $Request->email; 
             $user->number = $Request->number; 
             $user->address = $Request->address;
              // $user->selary = $Request->selary; 
             $user->gender = $Request->gender; 
             $user->religion = $Request->religion; 
             $user->dob = $Request->dob; 
             // $user->join_date = $Request->join_date; 
             $user->designation_id = $Request->designation_id;

             if ($Request->hasFile('image')) {
                 
                 $image = $Request->file('image');
                 $full_nmae = time().'.'.$image->getClientOriginalExtension();

                 @unlink(public_path('backend/employ_profile/'.$user->image));

                 Image::make($image)->resize(300,320)->save('public/backend/employ_profile/'.$full_nmae);

                 $user->image = $full_nmae;
             }

             $user->save();

            
        });

         $notificaion  = array(
         'message'=>'employe successfully Update',
         'alert-type'=>'success'
         );

         return redirect()->route('Employ_regview')->with($notificaion);
    }

    public function Employ_regEye($id){

        $data['edite'] = DB::table('employsalarylogs')
                        ->join('users','employsalarylogs.employ_id','users.id')
                        ->select('employsalarylogs.*','users.name','users.image','users.number','users.address','users.email','users.gender','users.religion','users.designation_id','users.id_no','users.join_date','users.selary')
                        ->where('employsalarylogs.employ_id',$id)->first();

               $data['designation'] = designations::where('id',$data['edite']->designation_id)->first();
               
                $pdf = PDF::loadView('backend/Employ/employ_registation/pdf/employ_details', $data);
                 $pdf->SetProtection(['copy', 'print'], '', 'pass');
                return $pdf->stream('document.pdf');             


    }
}
