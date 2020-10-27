@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Grade Point List  <a href="{{ route('GrapdePointadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Grade Point</a></h4>


                                   

                                               
                                              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th>Sl</th>
                                                      <th>Grade Name</th>
                                                      <th>Grade Point</th>
                                                      <th>Start Mark</th>
                                                      <th>End Mark</th>
                                                      <th>point Range</th>
                                                      
                                                      <th>Remarks</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($grade as $g)
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                         <td>{{ $g->grade_name }}</td>
                                                         <td>{{ $g->grade_point }}</td>
                                                         <td>{{ $g->start_marks }}</td>
                                                         <td>{{ $g->end_marks }}</td>
                                                         <td>{{ $g->start_point }} - {{ $g->end_point }}</td>
                                                        
                                                         <td>{{ $g->remarks }}</td>
                                                       
                                                        <td>
                                                          
                                                          <a href="{{ route('GrapdePointedite',$g->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        
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
  </script>

@endsection
