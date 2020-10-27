@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Shift List  <button onclick="add_shift()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Shift</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Shift</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="shiftid">

                                       
                                               @include('backend/student_shift/view_shift_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/student_shift/modal/add_shift')
@include('backend/student_shift/modal/edite')
@section('footer')


<script type="text/javascript">
  
  function add_shift(){
    $('#shift').modal('show');
  }

  $('#shiftadd').submit(function(e){
    e.preventDefault();

     var url = $(this).attr('action');
     var method = $(this).attr('method');
     var data = $(this).serialize();

    $('#shift').modal('hide');

    $.ajax({
       url:url,
       type:method,
       data:data,
       success:function(data){

        $('#shiftid').empty().html(data);
       }
    });
  });

  function Active(SId){

    var alrm = "If you want To Active This Item";

    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('studentShiftActiveajax') }}",
        type:"GET",
        data:{SId:SId},
        success:function(data){
           $('#shiftid').empty().html(data);
        }
      });
    }
  } 

   function Deactive(SId){

    var alrm = "If you want To Deactive This Item";

    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('studentShiftDeactiveajax') }}",
        type:"GET",
        data:{SId:SId},
        success:function(data){
           $('#shiftid').empty().html(data);
        }
      });
    }
  }  

   function Del(SId){

    var alrm = "If you want To Delete This Item";

    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('studentShiftDeleteajax') }}",
        type:"GET",
        data:{SId:SId},
        success:function(data){
           $('#shiftid').empty().html(data);
        }
      });
    }
  }

  function Edite(SId,Shift){

    $('#shiftEdite').modal('show');
    $('#shiftEdite').find('#shift').val(Shift);
    $('#shiftEdite').find('#shiftId').val(SId);
  }

  $('#shiftE').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#shiftEdite').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){
        
        $('#shiftid').empty().html(data);
      }
    });

  });

</script>
 


@endsection