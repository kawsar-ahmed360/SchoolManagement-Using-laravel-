@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Employe Attendance Detials  <a href="{{ route('Employ_Attendanceadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employe Attendace</a></h4>


                                   
                                            <span style="font-size: 26px;font-weight: bold">Attendance Date : {{ $user[0]->date }}</span>
                                               
                                              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th>Sl</th>
                                                      <th>Employ Name</th>
                                                      <th>Employ Id No</th>
                                                      <th>Employ number</th>
                                                      <th>Attendance Status</th>
                                                      
                                                     
                                                    </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($user as $e)
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                         <td>{{ $e->name }}</td>
                                                         <td>{{ $e->id_no }}</td>
                                                         <td>{{ $e->number }}</td>
                                                         <td><span class="badge badge-success">{{ $e->attendance }}</span></td>
                                                        
                                                        
                                                     
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
