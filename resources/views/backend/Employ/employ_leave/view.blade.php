@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Employe Leave List  <a href="{{ route('Employ_Leaveadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employe Leave</a></h4>


                                   

                                               
                                              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th>Sl</th>
                                                      <th>Employ Name</th>
                                                      <th>Employ Id No</th>
                                                      <th>Leave Perpose</th>
                                                      <th>Start Date</th>
                                                      <th>End Date</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($leave as $e)
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                         <td>{{ $e->user['name'] }}</td>
                                                         <td>{{ $e->user['id_no'] }}</td>
                                                         <td>{{ $e->leavepurposes['name'] }}</td>
                                                         <td>{{ $e->start_date }}</td>
                                                         <td>{{ $e->end_date }}</td>
                                                        <td>
                                                          
                                                          <a href="{{ route('Employ_Leaveedite',$e->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        
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
