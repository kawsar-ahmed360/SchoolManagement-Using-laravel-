@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Assign Student List  <a href="{{ route('Student_regadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Student</a></h4>


                                        <div class="card">
                                           <div class="card-body">
                                              <div class="form-row">
                                                 <div class="form-group col-md-5">
                                                    <label>Class Name</label>
                                                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                                                        <option selected disabled="">---Select Class--</option>
                                                        @foreach($class as $c)
                                                          <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-5">
                                                    <label>Session Name</label>
                                                    <select class="form-control form-control-sm" name="session_id" id="session_id">
                                                        <option selected="" disabled="">---Select session--</option>
                                                       {{--  @foreach($year as $y)
                                                          <option value="{{ $y->id }}">{{ $y->session }}-{{ $y->session+1 }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                   

                                         <div class="full_table">
                                               
                                         
                                         </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

{{-- @include('backend/exam_type/modal/add_exam') --}}
{{-- @include('backend/exam_type/modal/edite') --}}
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


$('#class_id').on('change',function(){
  var class_id = $(this).val();
   
   $.ajax({
    url:"{{ route('Student_Sessionajax') }}",
    type:"GET",
    data:{class_id:class_id},
    success:function(data){
      var html = "<option value=''>---Select year--</option>";

      $.each(data,function(key,v){
         html+='<option value="'+v.session_id+'">'+v.session+'</option>';
      });
      $('#session_id').empty().html(html);
    }
   });

});

$('#session_id').on('change',function(){
  var session_id = $(this).val();
  var class_id = $('#class_id').val();

  if (session_id && class_id) {
    $.ajax({
      url:"{{ route('Student_ClassYear') }}",
      type:"GET",
      data:{session_id:session_id,class_id:class_id},
      success:function(data){
        
        $('.full_table').empty().html(data);

      }
    });
  }
});

  
 </script>


@endsection