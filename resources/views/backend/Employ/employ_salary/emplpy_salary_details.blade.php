@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">{{ $user->name }} Salary Detials </h4>


                                   

                                               
                                              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th>Sl</th>
                                                      <th>Previous Salary</th>
                                                      <th>Present Salary</th>
                                                      <th>Increment Salary</th>
                                                      <th>Effacted_Date</th>
                                                      
                                                    </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($employ_salary as $key=>$e)

                                                   @if($key=='0')
                                                        <tr>
                                                          <td colspan="5" class="text-center"><strong>Previous Salary </strong>{{ $e->previous_salary }}</td>
                                                        </tr>
                                                   @else
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                        <td>{{ $e->previous_salary }}</td>
                                                        <td>{{ $e->present_salary }}</td>
                                                        <td>{{ $e->increment_salary }}</td>
                                                        <td>{{ $e->effacted_date }}</td>
                                                       
                                                      
                                                     </tr>

                                                     @endif
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
