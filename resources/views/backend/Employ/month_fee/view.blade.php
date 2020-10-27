@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">




                                        <h4 class="card-title">Employ Monthly Fee</h4>



					                      {{-- <input type="hidden" value="{{ @$edite->id }}" name="id"> --}}
					                      
					                      <div class="form-row">

					                      


					                     
					                       	<div class="form-group col-md-4">
					                          <label style="color:white">Find Date <font style="color:red">*</font></label>
					                          <input type="date" class="form-control form-control-sm @error('start_date') is-invalid @enderror" name="date" id="date" value="{{ @$edite->date }}"  placeholder="Enter your date..">

					                           @error('date')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div> 


					                       <div class="form-group col-md-2" style="padding-top: 30px">
					                       		<button type="submit" id="Search" name="search" class="btn btn-success btn-sm">Search</button>
					                       	</div>	


					                  

					                      </div>



					                     <div class="card">
					                     	<div class="card-body">
					                     		
					                     		<div id="DocumentAll">
					                     			
					                     		</div>

					                     	</div>
					                     </div> 

                      




                   


                                  </div>      
                                  </div>      

@endsection

@section('footer')

<script id="Fullhtml" type="text/x-handlebars-template">
	
	 <table class="table table-sm table-striped table-bordered" style="width:100%"">

	 	<thead>
	 		<tr>
	 		    @{{{thsourch}}}
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@{{#each this}}
	 		<tr style="text-align:center">
	 		   @{{{tdsourch}}}
	 		</tr>
	 		@{{/each}}
	 	</tbody>
	 </table>

</script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


  $(document).on('click','#Search',function(){

   var date = $('#date').val();

    if (date) {

    	$.ajax({
    		url:"{{ route('Employ_monthSalaryajax') }}",
    		type:"GET",
    		data:{date:date},

    		success:function(data){

    			var source = $('#Fullhtml').html();

    			var template = Handlebars.compile(source);

    			var html = template(data);

    			$('#DocumentAll').html(html);
    		}
    	});
    }

  });




</script>
@endsection