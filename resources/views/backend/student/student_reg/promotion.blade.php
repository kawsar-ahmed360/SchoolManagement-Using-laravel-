@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title"> {{ (@$edite)?"Student Registation update":"Add student registation form" }}  <a href="{{ route('Student_regview') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> View Student</a></h4>

                                       <form action="{{ route('Student_promUpda',$edite->student_id) }}" method="post" accept-charset="utf-8" id="examadd" enctype="multipart/form-data">
					                      @csrf


					                      <input type="hidden" value="{{ @$edite->id }}" name="id">
					                      
					                      <div class="form-row">

					                      	<div class="form-group col-md-4">
					                          <label style="color:white">Student Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ @$edite->name }}" id="name" placeholder="Enter your name..">

					                           @error('name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Father Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname" id="fname" value="{{ @$edite->fname }}" placeholder="Enter your fname..">

					                           @error('fname')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Mother Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('mname') is-invalid @enderror" name="mname" id="mname" value="{{ @$edite->mname }}" placeholder="Enter your mname..">

					                           @error('mname')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Mobile Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('number') is-invalid @enderror" name="number" id="number" value="{{ @$edite->number }}" placeholder="Enter your number..">

					                           @error('number')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Address <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" value="{{ @$edite->address }}" placeholder="Enter your address..">

					                           @error('address')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Gender <font style="color:red">*</font></label>
					                          <select type="text" class="form-control form-control-sm @error('gender') is-invalid @enderror" name="gender" id="gender">
                                                   
                                                   <option disabled="" selected="">----Select Gender-----</option>
                                                   <option value="male" {{ @$edite->gender == 'male'?"selected":"" }}>Male</option>
                                                   <option value="female" {{ @$edite->gender == 'female'?"selected":"" }}>Female</option>
                                                   

					                          </select>

					                           @error('gender')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Relagion <font style="color:red">*</font></label>
					                          <select type="text" class="form-control form-control-sm @error('religion') is-invalid @enderror" name="religion" id="religion">
                                                   
                                                   <option disabled="" selected="">----Select religion-----</option>
                                                   <option value="islam" {{ @$edite->religion == 'islam'?"selected":"" }}>Islam</option>
                                                   <option value="hindu" {{ @$edite->religion == 'hindu'?"selected":"" }}>Hindu</option>
                                                   <option value="cristran" {{ @$edite->religion == 'cristran'?"selected":"" }}>Cristran</option>
                                                   

					                          </select>

					                           @error('religion')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       <div class="form-group col-md-4">
					                          <label style="color:white">Date Of Birth <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('dob') is-invalid @enderror" name="dob" id="dob" value="{{ @$edite->dob }}" placeholder="Enter your dob.." autocomplete="off">

					                           @error('dob')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 


					                       <div class="form-group col-md-4">
					                          <label style="color:white"> Discount </label>
					                          <input type="text" class="form-control form-control-sm @error('discount') is-invalid @enderror" name="discount" id="discount" value="{{ @$edite->discount }}" placeholder="Enter discount..">

					                           @error('discount')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

                                           
                                           <div class="form-group col-md-4">
					                          <label style="color:white">Class Name <font style="color:red">*</font></label>
					                          <select type="text" class="form-control form-control-sm @error('class_id') is-invalid @enderror" name="class_id" id="class_id">
                                                   
                                                   <option disabled="" selected="">----Select class-----</option>
                                                  
                                                  @foreach($class as $c)
                                                    <option value="{{ $c->id }}" {{ @$edite->class_id == $c->id?"selected":"" }}>{{ $c->class_name }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('class_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       <div class="form-group col-md-4">
					                          <label style="color:white">Shift Name</label>
					                          <select type="text" class="form-control form-control-sm @error('shift_id') is-invalid @enderror" name="shift_id" id="shift_id">
                                                   
                                                   <option disabled="" selected="">----Select Shift-----</option>
                                                  
                                                  @foreach($shift as $s)
                                                    <option value="{{ $s->id }}" {{ @$edite->shift_id == $s->id?"selected":"" }}>{{ $s->shift }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('shift_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 




					                       <div class="form-group col-md-4">
					                          <label style="color:white">Session <font style="color:red">*</font></label>
					                          <select type="text" class="form-control form-control-sm @error('session_id') is-invalid @enderror" name="session_id" id="session_id">
                                                   
                                                   <option disabled="" selected="">----Select Session-----</option>
                                                  
                                                  @foreach($year as $y)
                                                    <option value="{{ $y->id }}"{{ @$edite->session_id == $y->id?"selected":"" }}>{{ $y->session }}-{{ $y->session+1 }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('session_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>
 

					                       <div class="form-group col-md-4">
					                          <label style="color:white">Group Name</label>
					                          <select type="text" class="form-control form-control-sm @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                                                   
                                                   <option disabled="" selected="">----Select Group-----</option>
                                                  
                                                  @foreach($group as $g)
                                                    <option value="{{ $g->id }}" {{ @$edite->group_id == $g->id?"selected":"" }}>{{ $g->group }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('group_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>



					                       <div class="form-group col-md-4">
					                          <label style="color:white">Image</label>
					                          <input type="file" name="image" id="image" class="form-control form-control-sm" onchange="loadFile(event)" >

 
					                           @error('image')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>
                                             


                                               <div class="form-group col-md-2">
					                          <label style="color:white">Image</label>
					                          <img id="output"/ width="100px" src="{{ asset('public/pro.jpg') }}" style="border:1px solid black;border-radius: 4px">
					                       </div>

					                       <div class="form-group col-md-2">
					                          <label style="color:white">Old Image</label>
					                          <img src="{{ @$edite->image?url('public/backend/student_profile/'.$edite->image):"" }}" alt="" width="100px">
					                       </div>



					                      </div>

                      




                   


								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
								        <button type="reset" class="btn btn-danger btn-sm">Clear Data</button>
								        <button type="submit" class="btn btn-primary btn-sm">Pormotion</button>
								      </div>
								                    </form>

                                  </div>      
                                  </div>      

@endsection

@section('footer')

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection