@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">




                                        <h4 class="card-title"> {{ (@$edite)?"Employ Leave update":"Add Grade Point form" }}<a style="margin-left: 10px" href="{{ route('GrapdePointview') }}" class="btn btn-dark btn-sm"><i class="fa fa-list"></i>Grade List</a></h4>

                                       <form action="{{ (@$edite)?route('GrapdePointUpdate'):route('GrapdePointSave') }}" method="post" accept-charset="utf-8" id="examadd" enctype="multipart/form-data">
					                      @csrf


					                      <input type="hidden" value="{{ @$edite->id }}" name="id">
					                      
					                      <div class="form-row">

					                      	<div class="form-group col-md-3">
					                          <label style="color:white">Grade Name <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('grade_name') is-invalid @enderror" name="grade_name" id="grade_name" value="{{ @$edite->grade_name }}" placeholder="Enter Grade Name....A+">

					                           @error('grade_name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>	


					                       <div class="form-group col-md-3">
					                          <label style="color:white">Grade Point <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('grade_point') is-invalid @enderror" name="grade_point" value="{{ @$edite->grade_point }}" id="grade_point" placeholder="Enter Grade Point....5.00">

					                           @error('grade_point')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 

					                       <div class="form-group col-md-3">
					                          <label style="color:white">Start Mark <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('start_marks') is-invalid @enderror" name="start_marks" value="{{ @$edite->start_marks }}" id="start_marks" placeholder="Enter Start Mark....">

					                           @error('start_marks')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 


					                        <div class="form-group col-md-3">
					                          <label style="color:white">End Mark <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('end_marks') is-invalid @enderror" name="end_marks" value="{{ @$edite->end_marks }}" id="end_marks" placeholder="Enter End Mark....">

					                           @error('end_marks')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                        <div class="form-group col-md-3">
					                          <label style="color:white">Start Point <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('start_point') is-invalid @enderror" name="start_point" value="{{ @$edite->start_point }}" id="start_point" placeholder="Enter Start Point....">

					                           @error('start_point')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       <div class="form-group col-md-3">
					                          <label style="color:white">End Point <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('end_point') is-invalid @enderror" name="end_point" value="{{ @$edite->end_point }}" id="end_point" placeholder="Enter End Point....">

					                           @error('end_point')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       <div class="form-group col-md-2">
					                          <label style="color:white">Remark <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('remarks') is-invalid @enderror" name="remarks" value="{{ @$edite->remarks }}" id="remarks" placeholder="Remarks....">

					                           @error('remarks')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>




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