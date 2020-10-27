<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feecategoryammounts;
use App\studentclasses;
use App\feecategorys;
use DB;
class FeeCategoryAmmount extends Controller
{
    public function FeeAmmountview(){
        
        $data['feecategoryammount'] = feecategoryammounts::select('fee_category_id')->groupBy('fee_category_id')
                                     ->get();
 
    	return view('backend/fee_ammount/view_fee_ammount',$data);
    }  

  public function FeeAmmountadd(){

  	    $data['class'] = studentclasses::where('status','2')->get();
        $data['feecategory'] = feecategorys::where('status','2')->get();

         return view('backend/fee_ammount/modal/add_fee_ammount',$data);

  }

  public function FeeAmmountSave(Request $Request){
  
     $Request->validate([
          'class_id'=>'required',
          'fee_category_id'=>'required',
          'ammount'=>'required',
  	   ]);
  	 


  	   

  	   if ($Request->class_id!=null) {
  	   	
          foreach ($Request->class_id as $key=>$value) {
          	 
          	  $sa = new feecategoryammounts();
          	  $sa->fee_category_id = $Request->fee_category_id;
          	  $sa->class_id = $value;
          	  $sa->ammount = $Request->ammount[$key];
          	  $sa->status = 1;
          	  $sa->save();

          	  if ($sa->save()) {
          	  	echo "success";
          	  	$nofication = array(
                 'message'=>'over all successfully inserted',
                 'alert-type'=>'success',
          	  	);

          	  }


          }

  	   }else{
  	   	 return redirect()->back();

  	   }

  	  return redirect()->route('FeeAmmountview')->with($nofication); 
  }

  public function FeeAmmountEditeajax($fee_category_id){

  	  $data['edite'] = feecategoryammounts::where('fee_category_id',$fee_category_id)->get();
  	  $data['class'] = studentclasses::where('status','2')->get();
        $data['feecategory'] = feecategorys::where('status','2')->get();
        
        return view('backend/fee_ammount/modal/edite',$data);

  }

  public function FeeAmmountupdate(Request $Request,$fee_category_id){


       if ($Request->class_id==null) {
       	return redirect()->back();
       }else{


        // return $Request->all();


        foreach ($Request->class_id as $key=>$class) {
          
       	 $edite = feecategoryammounts::where('class_id',$class)->where('fee_category_id',$fee_category_id)->delete();

        }

       	  

       	  foreach ($Request->class_id as $key=>$value) {


        	 
        	$sa = new feecategoryammounts();
          
          	  $sa->fee_category_id = $Request->fee_category_id;
          	  $sa->class_id = $value;
          	  $sa->ammount = $Request->ammount[$key];
          	  $sa->status = 2;
          	  $sa->save();
        }

       }




        if ($sa->save()) {
          	  	echo "success";
          	  	$nofication = array(
                 'message'=>'over all successfully Updated',
                 'alert-type'=>'success',
          	  	);

          	  }

         return redirect()->route('FeeAmmountview')->with($nofication); 	  

  }

  public function FeeAmmounteye($fee_category_id){

  	 $data['view'] =DB::table('feecategoryammounts')
  	                ->join('studentclasses','feecategoryammounts.class_id','studentclasses.id')
  	                ->join('feecategorys','feecategoryammounts.fee_category_id','feecategorys.id')
  	                ->select('feecategoryammounts.*','studentclasses.class_name','feecategorys.fee_category')
  	                ->where('fee_category_id',$fee_category_id)->get();

  	   return view('backend/fee_ammount/modal/eye',$data);
  }

}
