<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Mail;
use Image;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{

	public function userList(){
     
     $data['user'] = user::get();

     return view('backend/user/all_user',$data); 

	}

	public function userListajax(){
        
         $data['user'] = user::get();

     return view('backend/user/all_user_view_ajax',$data); 

	}


    public function AddUser(Request $Request){

        $Request->validate([
        'user_roll'=>'required',
        'name'=>'required',
        'email'=>'required',
        ]);

        if ($Request->ajax()) {
            
            $code = rand(00000,99999);
            $ne =new user();
            $ne->userType = 'Admin';
            $ne->user_roll = $Request->user_roll;
            $ne->name = $Request->name;
            $ne->email = $Request->email;
            $ne->code = $code;
            $ne->password = bcrypt($code);
            $ne->save();


            $mailsend = array(
             'email'=>$Request->email,
             'code'=>$code,
            );

            Mail::send('backend/user/mail/password',$mailsend,function($message) use($mailsend){
             $message->from('a.b123kwsar@gmail.com','kawsar ahmed');
             $message->to($mailsend['email']);
             $message->subject('This Code In your Account Password');
            });

            return $this->userListajax($Request);
        }
    }

	public function userListDelete(Request $Request){

		 if ($Request->ajax()) {
		 	
		 	$user = user::find($Request->UserId);

		 	 @unlink(public_path('backend/profile/'.$user->image));

		 	 $user->delete();

		 	 return $this->userListajax($Request);
		 }
	}


    public function user_profile(){

    	$userid = Auth::user()->id;

    	$data['user'] = user::find($userid);

    	return view('backend/profile/profile',$data);


    }

    public function user_profileajax(){
       
       $userid = Auth::user()->id;

    	$data['user'] = user::find($userid);

    	return view('backend/profile/profile_view_ajax',$data);

    }

    public function profile_update(Request $Request){

    	if ($Request->ajax()) {
    		
    		$user = user::find($Request->UserId);
    		$user->name = $Request->name;
    		$user->email = $Request->email;
    		$user->number = $Request->number;
    		$user->address = $Request->address;
    		$user->save();

    		return $this->user_profileajax($Request);
    	}
    }

    public function pass_change(Request $Request){

    	$Request->validate([
           'current_pass'=>'required|min:5',
           'new_pass'=>'required|min:5|same:confirm'
    	]);

    	if ($Request->ajax()) {
    		
    		if (Auth::attempt(['id'=>$Request->UserId,'password'=>$Request->current_pass])) {
    			
    			$user = user::find($Request->UserId);
    			$user->password = Hash::make($Request->new_pass);
    			$user->save();
    			return $this->user_profileajax($Request);
    		}
    	}
    }

    public function profileChange(Request $Request){

    	 $user = user::find($Request->UserId);


    	  if ($Request->hasFile('image')) {
    	  	
    	  	$image = $Request->file('image');

    	  	$full_name = time().'.'.$image->getClientOriginalExtension();

    	  	@unlink(public_path('backend/backend/profile/'.$user->image));

    	  	Image::make($image)->resize(300,320)->save('public/backend/profile/'.$full_name);

    	  	$user->image = $full_name;

    	  	$user->save();

    	  }

    		
     if ($user->save()) {
     	echo 'success';

     	$notification = array(
         'message'=>'message successfully inserted',
         'alert-type'=>'success'
     	);
     }
    	  	
    	 return redirect()->route('user_profile')->with($notification); 	  
    }
}
