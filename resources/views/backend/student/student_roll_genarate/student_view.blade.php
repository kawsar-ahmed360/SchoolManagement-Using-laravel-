@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Assign Student Roll Genarate</h4>

                               <form action="{{ route('StudentRollPost') }}" method="post" accept-charset="utf-8">
                                 @csrf

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
                                                        @foreach($year as $y)
                                                          <option value="{{ $y->id }}">{{ $y->session }}-{{ $y->session+1 }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                 



                                      
                              
                                         <div class="full_table d-none">
                                               <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                {{-- <th>Sl</th> --}}
                                                <th>Student No</th>
                                                <th>Student Name</th>
                                                <th>Father Name</th>
                                                <th>Gender</th>
                                            
                                                <th>Roll No</th>
                                                
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                            </thead>


                                            <tbody id="examnew" style="text-align: center">
                                                  
                                       

                                            </tbody>
                                        </table>
                                         <button type="submit" style="cursor: pointer;" class="btn btn-success btn-sm">Genarate Roll</button>
                                         
                                         </div>


                                          </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

{{-- @include('backend/exam_type/modal/add_exam') --}}
{{-- @include('backend/exam_type/modal/edite') --}}
@section('footer')


<script type="text/javascript">
  
   $(document).on('change','#session_id',function(){
    var session_id = $(this).val();
    var class_id = $('#class_id').val();

    if (session_id && class_id) {
      $.ajax({
          url:"{{ route('StudentRollJax') }}",
          type:"GET",
          data:{session_id:session_id,class_id:class_id},
          success:function(data){
            $('.full_table').removeClass('d-none');
             var html = '';
            $.each(data,function(key,v){
             
             html+=
             '<tr>'+
                '<td>'+v.user.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> </td>'+
                '<td>'+v.user.name+'</td>'+
                '<td>'+v.user.fname+'</td>'+
                '<td>'+v.user.gender+'</td>'+
                '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
             '</tr>';

            });


            $('#examnew').html(html);
          }
      });
    }
   });

</script>
  


@endsection