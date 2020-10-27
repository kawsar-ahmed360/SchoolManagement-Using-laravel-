 @extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Class wise Subject List  <a href="{{ route('add_subject') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Assing subject</a></h4>
                                   
                                        <span style="font-weight: bold">{{ $assing_subject['0']->class_name }}</span>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Subject Name</th>
                                            
                                                <th>Full Mark</th>
                                                <th>Pass Mark</th>
                                                <th>Get Mark</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                            </thead>


                                            <tbody id="examnew">

                                       @php($sl=1)
                                           @foreach($assing_subject as $a)
                                               <tr style="text-align: center">
                                               	      <td>{{ $sl++ }}</td>
                                               	      <td>{{ $a->subject }}</td>
                                                      <td>{{ $a->full_mark }}</td>
                                                      <td>{{ $a->pass_mark }}</td>
                                                      <td>{{ $a->get_mark }}</td>
                                               	     
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