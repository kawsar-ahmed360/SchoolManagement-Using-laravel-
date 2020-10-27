<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignstudents;
use App\discountstudents;
use App\shifts;
use App\studentclasses;
use App\sessions;
use App\studentgrouops;
use App\User;
use DB;
use PDF;
use Image;
class StudentRegistationController extends Controller
{
    public function Student_regview(){
          $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
         $data['all_data'] = assignstudents::get(); 
    	return view('backend/student/student_reg/student_view',$data);
    }

    public function Student_regadd(){
        
        $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
        $data['group'] = studentgrouops::where('status','2')->get();
        $data['shift'] = shifts::where('status','2')->get();
    	return view('backend/student/student_reg/add_student',$data);
    }

    public function Student_regSave(Request $Request){

    	$Request->validate([
         
         'name'=>'required',
         'fname'=>'required',
         'mname'=>'required',
         'number'=>'required',
         'address'=>'required',
         'gender'=>'required',
         'religion'=>'required',
         'dob'=>'required',
         'discount'=>'required',
         'class_id'=>'required',
         'session_id'=>'required',
    	]);

    	DB::transaction(function()use($Request){
              
              $year = sessions::find($Request->session_id)->session;
              
              $user = user::where('userType','student')->first();

              if ($user==null) {
              	
              	$newreg = 0;
              	$studentId = $newreg+1;

              	if ($studentId<10) {
              		$id_no = '000'.$studentId;
              	}elseif ($studentId<100) {
              		
              		$id_no = '00'.$studentId;
              	}elseif ($studentId<1000) {
              	  $id_no = '0'.$studentId;	
              	}
              }else{

              $user = user::where('userType','student')->OrderBy('id','desc')->first()->id;
              $studentId = $user+1;
              if ($studentId<10) {
              	$id_no = '000'.$studentId;
              }elseif($studentId<100){
                $id_no = '00'.$studentId;

              }elseif($studentId<1000){
              	$id_no ='0'.$studentId;
              }
          }

          $final_id = $year.$id_no;
          $code = rand(0000,9999);
          $user = new user();
          $user->id_no = $final_id;
          $user->name = $Request->name;
          $user->fname = $Request->fname;
          $user->mname = $Request->mname;
          $user->religion = $Request->religion;
          $user->dob = $Request->dob;
          $user->gender = $Request->gender;
          $user->userType = 'student';
          $user->number = $Request->number;
          $user->code = $code;
          $user->password = bcrypt($code);
          $user->address = $Request->address;

          if ($Request->hasFile('image')) {
          	
             $image = $Request->file('image');
             $full_name = time().'.'.$image->getClientOriginalExtension();

              Image::make($image)->resize(300,320)->save('public/backend/student_profile/'.$full_name);

              $user->image = $full_name;
          }

          $user->save();

          $assing_stu = new assignstudents();
          $assing_stu->student_id = $user->id;
          $assing_stu->class_id = $Request->class_id;
          $assing_stu->shift_id = $Request->shift_id;
          $assing_stu->group_id = $Request->group_id;
          $assing_stu->session_id = $Request->session_id;
          $assing_stu->save();

          $discount_stu = new discountstudents();

          $discount_stu->assign_student_id = $assing_stu->id;
          $discount_stu->discount =$Request->discount; 
          $discount_stu->fee_category_id =1;
          $discount_stu->save();

    	});

    	
    		
    	
    		$notification = array(
    	      'message'=>'student successfully registared',
              'alert-type'=>'success',
    		);
   

    	return redirect()->route('Student_regview')->with($notification);



    }

    public function Student_Sessionajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$session =DB::table('assignstudents')
    		                 ->join('sessions','assignstudents.session_id','sessions.id')
    		                 ->select('sessions.session','assignstudents.session_id')
    		                 ->where('class_id',$Request->class_id)->get();

    		return response()->json($session); 
    	}
    }


    public function Student_ClassYear(Request $Request){

    	if ($Request->ajax()) {
    		
    		$data['alldata'] = DB::table('assignstudents')
                              ->join('users','assignstudents.student_id','users.id')  
                              ->join('studentclasses','assignstudents.class_id','studentclasses.id')
                              ->join('sessions','assignstudents.session_id','sessions.id')
                              ->select('assignstudents.*','users.name','users.id_no','users.image','users.code','studentclasses.class_name','sessions.session')  
    		                  ->where('assignstudents.class_id',$Request->class_id)->where('assignstudents.session_id',$Request->session_id)->get();

    		return view('backend/student/student_reg/view_class_year_ajax',$data);
    	}
    }

    public function Student_regEditeajax($student_id){

    	$data['edite'] = DB::table('assignstudents')
    	                 ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
    	                 ->join('users','assignstudents.student_id','users.id')
    	                 ->join('studentclasses','assignstudents.class_id','studentclasses.id')
    	                 ->join('sessions','assignstudents.session_id','sessions.id')
    	                 // ->join('shifts','assignstudents.shift_id','shifts.id')
    	                
    	                 
    	                 ->select('assignstudents.*','discountstudents.discount','users.name','users.fname','users.image','users.mname','users.number','users.address','users.gender','users.religion','users.dob','studentclasses.class_name','sessions.session')
    	                 ->where('assignstudents.student_id',$student_id)->first();
    	 $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
        $data['group'] = studentgrouops::where('status','2')->get();
        $data['shift'] = shifts::where('status','2')->get();

        return view('backend/student/student_reg/add_student',$data);
    	
    }

    public function Student_regupdate(Request $Request,$student_id){

    	DB::transaction(function() use($Request,$student_id){
              
              $user = user::where('id',$student_id)->first();

		          $user->name = $Request->name;
		          $user->fname = $Request->fname;
		          $user->mname = $Request->mname;
		          $user->religion = $Request->religion;
		          $user->dob = $Request->dob;
		          $user->gender = $Request->gender; 
		          $user->number = $Request->number;
		          $user->address = $Request->address;
                  if ($Request->hasFile('image')) {
          	
		             $image = $Request->file('image');
		             $full_name = time().'.'.$image->getClientOriginalExtension();

		             @unlink(public_path('backend/student_profile/'.$user->image));

		              Image::make($image)->resize(300,320)->save('public/backend/student_profile/'.$full_name);

		              $user->image = $full_name;
		          }
		          $user->save();

		          $assing = assignstudents::where('student_id',$user->id)->where('id',$Request->id)->first();
		           $assing->student_id = $user->id;
		          $assing->class_id = $Request->class_id;
		          $assing->shift_id = $Request->shift_id;
		          $assing->group_id = $Request->group_id;
		          $assing->session_id = $Request->session_id;
		          $assing->save();

		          $discount = discountstudents::where('assign_student_id',$assing->id)->first();
		           $discount->assign_student_id = $assing->id;
		          $discount->discount =$Request->discount; 
		          $discount->save();

    	});


    	return redirect()->route('Student_regview')->with('success','successfully update');
    }

    public function Student_promotion($student_id){

    	$data['edite'] = DB::table('assignstudents')
    	                 ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
    	                 ->join('users','assignstudents.student_id','users.id')
    	                 ->join('studentclasses','assignstudents.class_id','studentclasses.id')
    	                 ->join('sessions','assignstudents.session_id','sessions.id')
    	                 // ->join('shifts','assignstudents.shift_id','shifts.id')
    	                
    	                 
    	                 ->select('assignstudents.*','discountstudents.discount','users.name','users.fname','users.image','users.mname','users.number','users.address','users.gender','users.religion','users.dob','studentclasses.class_name','sessions.session')
    	                 ->where('assignstudents.student_id',$student_id)->first();
    	 $data['class'] = studentclasses::where('status','2')->get();
        $data['year'] = sessions::where('status','2')->get();
        $data['group'] = studentgrouops::where('status','2')->get();
        $data['shift'] = shifts::where('status','2')->get();

        return view('backend/student/student_reg/promotion',$data);
    }

    public function Student_promUpda(Request $Request,$student_id){

    	DB::transaction(function()use($Request,$student_id){
              
               $user = user::where('id',$student_id)->first();
               $user->name = $Request->name;
		          $user->fname = $Request->fname;
		          $user->mname = $Request->mname;
		          $user->religion = $Request->religion;
		          $user->dob = $Request->dob;
		          $user->gender = $Request->gender; 
		          $user->number = $Request->number;
		          $user->address = $Request->address;
		          if ($Request->hasFile('image')) {
          	
		             $image = $Request->file('image');
		             $full_name = time().'.'.$image->getClientOriginalExtension();

		             @unlink(public_path('backend/student_profile/'.$user->image));

		              Image::make($image)->resize(300,320)->save('public/backend/student_profile/'.$full_name);

		              $user->image = $full_name;
		          }
		          $user->save();

		          $assing_stu = new assignstudents();
		          $assing_stu->student_id = $user->id;
		          $assing_stu->class_id = $Request->class_id;
		          $assing_stu->shift_id = $Request->shift_id;
		          $assing_stu->group_id = $Request->group_id;
		          $assing_stu->session_id = $Request->session_id;
		          $assing_stu->save();

		          $discount_stu =new discountstudents();
		        
		          $discount_stu->assign_student_id = $assing_stu->id;
		          $discount_stu->discount =$Request->discount; 
		          $discount_stu->fee_category_id =1;
		          $discount_stu->save();



    	});

    		$notification = array(
    	      'message'=>'student successfully Promoted next class',
              'alert-type'=>'success',
    		);
   

    	return redirect()->route('Student_regview')->with($notification);
    }

    public function Student_details($student_id){
         
         $data['edite'] = DB::table('assignstudents')
    	                 ->join('discountstudents','discountstudents.assign_student_id','assignstudents.id')
    	                 ->join('users','assignstudents.student_id','users.id')
    	                 ->join('studentclasses','assignstudents.class_id','studentclasses.id')
    	                 ->join('sessions','assignstudents.session_id','sessions.id')
    	                 // ->join('shifts','assignstudents.shift_id','shifts.id')
    	                
    	                 
    	                 ->select('assignstudents.*','discountstudents.discount','users.name','users.fname','users.image','users.mname','users.id_no','users.number','users.address','users.gender','users.religion','users.dob','studentclasses.class_name','sessions.session')
    	                 ->where('assignstudents.student_id',$student_id)->first();


    	
								$pdf = PDF::loadView('backend/student/student_reg/pdf/details', $data);
								$pdf->SetProtection(['copy', 'print'], '', 'pass');
								return $pdf->stream('document.pdf');      

    }
}
