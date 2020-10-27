@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">




                                        <h4 class="card-title"> {{ (@$edite)?"Employ Registation update":"Add Employ registation form" }}</h4>

                                       <form action="{{ route('Employ_SalarySave') }}" method="post" accept-charset="utf-8" id="examadd" enctype="multipart/form-data">
					                      @csrf


					                      <input type="hidden" value="{{ @$edite->employ_id }}" name="employ_id">
					                      
					                      <div class="form-row">

					                      	<div class="form-group col-md-4">
					                          <label style="color:white">Salary Ammount <font style="color:red">*</font></label>
					                          <input type="text" class="form-control form-control-sm @error('increment_salary') is-invalid @enderror" name="increment_salary" id="increment_salary" placeholder="Enter your increment_salary..">

					                           @error('increment_salary')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Effacterd Date <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('effacted_date') is-invalid @enderror" name="effacted_date" id="effacted_date"  placeholder="Enter your effacted_date..">

					                           @error('effacted_date')
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
</script>
@endsection