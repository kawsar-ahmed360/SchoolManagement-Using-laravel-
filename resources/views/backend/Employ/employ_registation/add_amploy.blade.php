@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title"> {{ (@$edite)?"Employ Registation update":"Add Employ registation form" }}  <a href="{{ route('Employ_regview') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> View Employ</a></h4>

                                       <form action="{{ (@$edite)?route('Employ_regUpdate',$edite->employ_id):route('Employ_regSave') }}" method="post" accept-charset="utf-8" id="examadd" enctype="multipart/form-data">
					                      @csrf


					                      {{-- <input type="hidden" value="{{ @$edite->id }}" name="id"> --}}
					                      
					                      <div class="form-row">

					                      	<div class="form-group col-md-4">
					                          <label style="color:white">Employ Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ @$edite->name }}" id="name" placeholder="Enter your name..">

					                           @error('name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Employ Email <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" value="{{ @$edite->email }}" placeholder="Enter your email..">

					                           @error('email')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Mobile <font style="color:red">*</font></label>
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

					                       @if(!@$edite)


					                       <div class="form-group col-md-4">
					                          <label style="color:white"> Salary </label>
					                          <input type="text" class="form-control form-control-sm @error('selary') is-invalid @enderror" name="selary" id="selary" value="{{ @$edite->selary }}" placeholder="Enter selary..">

					                           @error('selary')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                         <div class="form-group col-md-4">
					                          <label style="color:white">Join Date <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('join_date') is-invalid @enderror" name="join_date" id="join_date" value="{{ @$edite->join_date }}" placeholder="Enter your join_date.." autocomplete="off">

					                           @error('join_date')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       @endif 

                                           
                                           <div class="form-group col-md-4">
					                          <label style="color:white">Designation Name <font style="color:red">*</font></label>
					                          <select type="text" class="form-control form-control-sm @error('designation_id') is-invalid @enderror" name="designation_id" id="designation_id">
                                                   
                                                   <option disabled="" selected="">----Select Designation-----</option>
                                                  
                                                  @foreach($designation as $c)
                                                    <option value="{{ $c->id }}" {{ @$edite->designation_id == $c->id?"selected":"" }}>{{ $c->name }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('designation_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>




					                  {{--      <div class="form-group col-md-4">
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
					                       </div> --}}
 

					                     


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
					                          <img src="{{ @$edite->image?url('public/backend/employ_profile/'.$edite->image):"" }}" alt="" width="100px">
					                       </div>



					                      </div>

                      




                   


								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
								        <button type="reset" class="btn btn-danger btn-sm">Clear Data</button>
								        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
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