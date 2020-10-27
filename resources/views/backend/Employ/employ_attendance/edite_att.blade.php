@extends('backend/master')

@section('content')

<style type="text/css">
  input {
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    color: -internal-light-dark(red, white);
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    appearance: textfield;
    background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
    -webkit-rtl-ordering: logical;
    cursor: text;
    margin: 0em;
    font: 400 13.3333px Arial;
    padding: 1px 2px;
    border-width: 2px;
    border-style: inset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(195, 195, 195));
    border-image: initial;
}
</style>


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Employe Attendance Edite  <a href="{{ route('Employ_Attendanceview') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-list"></i> List Employe Attendace</a></h4>


                                         
                                         <form action="{{ route('Employ_AttendanceUpdate') }}" method="POST" accept-charset="utf-8">
                                           @csrf

                                            <div class="card-body">
                                              <div class="form-group col-md-4">
                                                <label style="font-weight: bold">Attendance Date</label>
                                                <input type="date" class="form-control form-control-sm @error('date') is-invalid @enderror" name="date" value="{{ $att[0]->date }}" id="date">
                                              </div>
                                            </div>


                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      
                                                 <thead>
                                                    <tr style="text-align: center">
                                                      <th rowspan="2" style="vertical-align: middle;font-weight: bold">Sl</th>
                                                      <th rowspan="2" style="vertical-align: middle;font-weight: bold">Employ Name</th>
                                                      <th rowspan="2" style="vertical-align: middle;font-weight: bold">Employ Id No</th>
                                                      <th colspan="3" style="vertical-align: middle; width: 25%;font-weight: bold">Attendance</th>
                                                  </tr> 

                                                  <tr style="text-align: center">
                                                      <th class="text-center btn present_all" style="display: table-cell;background-color: #114190;">Present</th>
                                                      <th class="text-center btn leave_all" style="display: table-cell;background-color: #114190;">Leave</th>
                                                      <th class="text-center btn absence_all" style="display: table-cell;background-color: #114190;">Absence</th>
                                                  </tr>
                                                </thead>
                                                  <tbody>
                                                    @php($sl=1)
                                                   @foreach($att as $key=>$e)

                                                   {{-- <input type="hidden" name="atte_id[]" value="{{ $e->employ_id }}"> --}}
                                                    <tr style="text-align: center">
                                                        <td>{{ $sl++ }}</td>
                                                         <td>{{ $e->name }}</td>
                                                         <td>{{ $e->id_no }}</td>
                                                        <td colspan="3">
                                                          
                                                         <span>Present</span>  <input style="margin-right: 8px" type="radio" style="font-size: 1px" class="attendace" name="attendance[{{ $e->employ_id }}]" value="present" {{ ($e->attendance=='present')?'checked':'' }} >
                                                         <span>Leave</span>  <input style="margin-right: 8px" type="radio" style="font-size: 1px" class="attendace" name="attendance[{{ $e->employ_id }}]" value="leave" {{ ($e->attendance=='leave')?'checked':'' }}>
                                                         <span>Absence</span>  <input type="radio" style="font-size: 1px" class="" name="attendance[{{ $e->employ_id }}]" value="absence" {{ ($e->attendance=='absence')?'checked':'' }}>
                                                        
                                                        </td>
                                                     </tr>
                                                   @endforeach
                                               </tbody>
                                         </table> 

                                          <button type="submit" class="btn btn-success btn-sm">Attendance Update</button>     
                                           
                                         </form>

                                               
                                         
                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@section('footer')

<script type="text/javascript">
  $(document).on('click','.leave_all',function(){

    $('input[value=leave]').prop('checked',true);

  });

   $(document).on('click','.present_all',function(){

    $('input[value=present]').prop('checked',true);

  });

    $(document).on('click','.absence_all',function(){

    $('input[value=absence]').prop('checked',true);

  });
</script>

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
