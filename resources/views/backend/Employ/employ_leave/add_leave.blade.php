@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">




                                        <h4 class="card-title"> {{ (@$edite)?"Employ Leave update":"Add Employ Leave form" }}</h4>

                                       <form action="{{ (@$edite)?route('Employ_LeaveUpdate'):route('Employ_LeaveSave') }}" method="post" accept-charset="utf-8" id="examadd" enctype="multipart/form-data">
					                      @csrf


					                      <input type="hidden" value="{{ @$edite->id }}" name="id">
					                      
					                      <div class="form-row">

					                      	<div class="form-group col-md-4">
					                          <label style="color:white">Employ Name <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('employ_id') is-invalid @enderror" name="employ_id" id="employ_id">
					                          	<option disabled="" selected="">------Select Employ-----</option>
					                          	@foreach($employ as $e)
                                                 <option value="{{ $e->id }}"
                                                 	{{ ($e->id == @$edite->employ_id)?"selected":'' }}>{{ $e->name }}</option>
					                          	@endforeach
					                          </select>

					                           @error('increment_salary')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       <div class="form-group col-md-4">
					                          <label style="color:white">Leave Purpose <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('leave_purpose_id') is-invalid @enderror" name="leave_purpose_id" id="leave_purpose_id">
					                          	<option disabled="" selected="">------Select leave_purpose-----</option>
					                          	@foreach($leavepurpose as $l)
                                                 <option value="{{ $l->id }}" {{ ($l->id == @$edite->leave_purpose_id)?"selected":'' }}>{{ $l->name }}</option>
					                          	@endforeach
					                          	<option value="newPurpose">New Purpose</option>
					                          </select>

					                          <div class="newleaves" style="display: none;margin-top: 5px">
					                          	 <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter your leave purpose">
					                          </div>

					                           @error('leave_purpose_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Start Date <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('start_date') is-invalid @enderror" name="start_date" id="start_date" value="{{ @$edite->start_date }}"  placeholder="Enter your start_date..">

					                           @error('start_date')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 	


					                       <div class="form-group col-md-4">
					                          <label style="color:white">End Date <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('end_date') is-invalid @enderror" name="end_date" id="end_date" value="{{ @$edite->end_date }}"  placeholder="Enter your end_date..">

					                           @error('end_date')
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
                                                    <option value="{{ $y->id }}"{{ @$edite ?? ''->session_id == $y->id?"selected":"" }}>{{ $y->session }}-{{ $y->session+1 }}</option>
                                                    
                                                  @endforeach
                                                   

					                          </select>

					                           @error('session_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> --}}
 

					                     


					                      
                                        



								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
								        <button type="reset" class="btn btn-danger btn-sm">Clear Data</button>
								        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
								      </div>

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


 $(document).on('change','#leave_purpose_id',function(){
 	var leave = $(this).val();

 	if (leave=='newPurpose') {
 		$('.newleaves').show();
 	}else{

 		$('.newleaves').hide();
 	}
 });

</script>
@endsection