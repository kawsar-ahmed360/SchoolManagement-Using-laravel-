 @extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Exam List  <a href="{{ route('add_subject') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Assing subject</a></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Class Name</th>
                                            
                                                {{-- <th>Status</th> --}}
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="examnew">

                                       @php($sl=1)
                                           @foreach($assing_subject as $a)
                                               <tr style="text-align: center">
                                               	      <td>{{ $sl++ }}</td>
                                               	      <td>{{ $a->class['class_name'] }}</td>
                                               	      <td>	
                                               	      	<a href="{{ route('AssignSubjectEditeajax',$a->class_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                               	      	<a href="{{ route('AssignSubjectEye',$a->class_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                               	      </td>
                                               </tr>
                                           @endforeach


                                            </tbody>
                                        </table>
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
  var type = "{{ Session::get('alert-type','success') }}";

  switch(type){
    case "success":
    toastr.success("{{ Session::get('message') }}");
    break;
  }
  @endif

</script>

@endsection