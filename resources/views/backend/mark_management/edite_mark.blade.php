@extends('backend/master')

@section('content')


<div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Mark Entry Manage</h4>

                <form action="{{ route('Employ_markEntyUpdateroute') }}" method="POST" accept-charset="utf-8">
                	
                	@csrf
                

                                         <div class="card">
                                         	 <div class="card-body">


                                        <div class="form-row">

					                      	<div class="form-group col-md-3">
					                          <label style="color:white">Session <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('session_id') is-invalid @enderror" name="session_id" id="session_id">
					                          	<option disabled="" selected="">---Select Session---</option>
					                             @foreach($session as $s)
                                                   <option value="{{ $s->id }}">{{ $s->session }} - {{ $s->session+1}}</option>
					                             @endforeach
					                          </select>
					                      

					                           @error('session_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                       <div class="form-group col-md-3">
					                          <label style="color:white">Class Name <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('class_id') is-invalid @enderror" name="class_id" id="class_id">
					                          	<option disabled="" selected="">---Select Class---</option>
					                             @foreach($class as $c)
                                                   <option value="{{ $c->id }}">{{ $c->class_name }}</option>
					                             @endforeach
					                          </select>
					                      

					                           @error('class_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                        <div class="form-group col-md-3">
					                          <label style="color:white">Subject Name <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('assing_subject_id') is-invalid @enderror" name="assing_subject_id" id="assing_subject_id">
					                          	<option disabled="" selected="">---Select Subject---</option>
					                          
					                          </select>
					                      

					                           @error('assing_subject_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>

					                         <div class="form-group col-md-3">
					                          <label style="color:white">Exam Name <font style="color:red">*</font></label>
					                          <select class="form-control form-control-sm @error('exam_type_id') is-invalid @enderror" name="exam_type_id" id="exam_type_id">
					                          	<option disabled="" selected="">---Select exam---</option>
					                             @foreach($exam as $e)
                                                   <option value="{{ $e->id }}">{{ $e->exam_name }}</option>
					                             @endforeach
					                          </select>
					                      

					                           @error('exam_type_id')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                       </div>


					                       <div class="form-group col-md-1">
					                       	        <a id="Search" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>assign</a>
					                       </div>





					                      </div>



                                         	 </div>
                                         </div>


                                         <div class="card">
                                         	<div class="card-body">
                                         		 <div id="full_documnet" class="d-none">
                                         		 	
                                         		 	 <table class="table table-bordered table-striped">
                                         		 	 	
                                         		 	 	<thead>
                                         		 	 		<tr style="text-align: center">
                                         		 	 			<th>Sl</th>
                                         		 	 			<th>Student Id No</th>
                                         		 	 			<th>Student Name</th>
                                         		 	 			<th>Gender</th>
                                         		 	 			<th>Student Mark</th>
                                         		 	 		</tr>
                                         		 	 	</thead>
                                         		 	 	<tbody id="all_show">
                                         		 	 		
                                         		 	 	</tbody>
                                         		 	 </table>
                                                  <button type="submit" class="btn btn-success btn-sm">Update</button>
                                         		 </div>
                                         	</div>
                                         </div>

								          </form>          
                                  </div>      
                                  </div>      

@endsection

@section('footer')

<script type="text/javascript">

 @if(Session::has('message'))
         
         var type ="{{ Session::get('alert-type','success') }}";

         switch(type){
          case "success":
          toastr.success("{{ Session::get('message') }}");
          break;
          case "error":
          toastr.error("{{ Session::get('message') }}");
          break;
         }

  @endif
	
	$(document).on('click','#Search',function(){
       
       var class_id = $('#class_id').val();
       var session_id = $('#session_id').val();
       var assing_subject_id = $('#assing_subject_id').val();
       var exam_type_id = $('#exam_type_id').val();

       if (class_id && session_id && assing_subject_id && exam_type_id) {
          
         $.ajax({
         	url:"{{ route('Employ_markEntyUpdate') }}",
         	type:"GET",
         	data:{class_id:class_id,session_id:session_id,assing_subject_id:assing_subject_id,exam_type_id:exam_type_id},
         	success:function(data){

         		$('#full_documnet').removeClass('d-none');

         		var html ="";

         		$.each(data,function(key,v){
                
                  html+=
                  '<tr style="text-align:center">'+
                     '<td>'+(key+1)+'</td>'+
                     '<td>'+v.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.id_no+'"></td>'+
                     '<td>'+v.name+'</td>'+
                     '<td>'+v.gender+'</td>'+
                     '<td><input type="text" name="marks[]" class="form-control-sm" value="'+v.marks+'" placeholder="Enty Mark"></td>'
                  +'</tr>';

         		});

         		$('#all_show').html(html);
         	}
         });

       }else{

       	alert('please check this over all field!!');
       }
	});
</script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


  $(document).on('change','#class_id',function(){
  	var class_id = $(this).val();
  	if (class_id) {
       
       $.ajax({
       	url:"{{ route('Employ_assign_subjectajax') }}",
       	type:"GET",
       	data:{class_id:class_id},
       	success:function(data){

       		var html = '<option value="">----Select Subject---</option>';
            $.each(data,function(key,v){

            	html+='<option value="'+v.id+'">'+v.subject+'</option>';
            });

       	   $('#assing_subject_id').html(html);
       	}
       });
  	}else{
  		alert('please class_id select');
  	}
  });
</script>
@endsection