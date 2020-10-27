@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Exam List  <button onclick="add_exam()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Exam</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Shift</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="examnew">

                                       
                                               @include('backend/exam_type/view_exam_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/exam_type/modal/add_exam')
@include('backend/exam_type/modal/edite')
@section('footer')


<script type="text/javascript">
  
  function add_exam(){

    $('#exam').modal('show');
  }

  $('#examadd').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#exam').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){
        $('#examnew').empty().html(data);
      }
    });

  });

  function Active(ExamId){
 
     var alrm ="if you want to active this item";

     if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('ExamTypeActiveajax') }}",
        type:"GET",
        data:{ExamId:ExamId},

        success:function(data){
            $('#examnew').empty().html(data);
        }
      });
     }
  } 


   function Deactive(ExamId){
 
     var alrm ="if you want to Deactive this item";

     if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('ExamTypeDeactiveajax') }}",
        type:"GET",
        data:{ExamId:ExamId},

        success:function(data){
            $('#examnew').empty().html(data);
        }
      });
     }
  }  


   function Dele(ExamId){
 
     var alrm ="if you want to Delete this item";

     if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('ExamTypeDeleteajax') }}",
        type:"GET",
        data:{ExamId:ExamId},

        success:function(data){
            $('#examnew').empty().html(data);
        }
      });
     }
  }

  function edite(ExamId,ExamName){

    $('#examedite').modal('show');
    $('#examedite').find('#exam_name').val(ExamName);
    $('#examedite').find('#examId').val(ExamId);
  }
  $('#examE').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#examedite').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){
        $('#examnew').empty().html(data);
      }
    });

  });

</script>
 


@endsection