@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Employe List  <a href="{{ route('Employ_regadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employe</a></h4>


                                   

                                               
                                              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th>Sl</th>
                                                      <th>Employ Name</th>
                                                      <th>Employ Email</th>
                                                      <th>Mobile</th>
                                                      <th>Address</th>
                                                      <th>Gender</th>
                                                      @if(Auth::user()->user_roll=='1')
                                                        <th>Code</th>
                                                      @endif
                                                      <th>Join Date</th>
                                                      <th>Salary</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($employ as $e)
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                        <td>{{ $e->name }}</td>
                                                        <td>{{ $e->email }}</td>
                                                        <td>{{ $e->number }}</td>
                                                        <td>{{ $e->address }}</td>
                                                        <td>{{ $e->gender }}</td>
                                                         @if(Auth::user()->user_roll=='1')
                                                        <td>{{ $e->code }}</td>
                                                      @endif
                                                        <td>{{ $e->join_date }}</td>
                                                        <td>{{ $e->selary }}</td>
                                                        <td>
                                                          
                                                          <a href="{{ route('Employ_regEdite',$e->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                          {{-- <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                                                          <a href="{{ route('Employ_regEye',$e->id) }}" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
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
