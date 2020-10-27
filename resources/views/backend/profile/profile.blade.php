@extends('backend/master')

@section('content')

  <div class="profile">
  	      <h4>Profile</h4>

           
        <div class="card">
        	<div class="card-body">
                    
                    <div class="row">
                    	
                          
                          <div class="col-md-2">
                          	
                          </div>


                          <div class="col-md-7" id="showall">
                                  
                               @include('backend/profile/profile_view_ajax')                      	
                           </div>



                          <div class="col-md-3">
                          	
                          </div>

                    </div>

           </div>
        </div>
           
  </div>

@endsection
@include('backend/profile/modal/edite')
@include('backend/profile/modal/password_change')
@include('backend/profile/modal/img')

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


 	function edite_profile(UserId,Name,Email,MNumber,Address){
 
      $('#exampleModal').modal('show');
      $('#exampleModal').find('#name').val(Name);
      $('#exampleModal').find('#email').val(Email);
      $('#exampleModal').find('#number').val(MNumber);
      $('#exampleModal').find('#address').val(Address);
      $('#exampleModal').find('#UserId').val(UserId);
 	}

 	$('#Editepro').submit(function(e){
 		e.preventDefault();

 		var url = $(this).attr('action');
 		var method = $(this).attr('method');
 		var data = $(this).serialize();
      // $('#exampleModal').find('input').empty();
      $('#exampleModal').modal('hide');

 		$.ajax({
            url:url,
            method:method,
            data:data,

            success:function(data){

            	$('#showall').empty().html(data);
            }

 		});
 	});


 	function change(UserId){

 		$('#passwordchange').modal('show');
 		$('#passwordchange').find('#UserId').val(UserId);
 	}

 	$('#Editepass').submit(function(e){
 		e.preventDefault();

 		var url = $(this).attr('action');
 		var method = $(this).attr('method');
 		var data = $(this).serialize();
 		$('#passwordchange').modal('hide');

 		$.ajax({
 			url:url,
 			type:method,
 			data:data,

 			success:function(data){

 				$('#showall').empty().html(data);
 				alert('password successfully Change');
 			}
 		});


 	});

 	function image(UserId){

 		$('#imageUp').modal('show');
 		$('#imageUp').find('#UserId').val(UserId);
         

 	}

 
 </script>

@endsection