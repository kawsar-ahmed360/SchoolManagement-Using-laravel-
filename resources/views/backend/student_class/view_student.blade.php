@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Class List  <button onclick="add_class()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Class</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Name</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="classlist">

                                       
                                               @include('backend/student_class/view_student_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/student_class/modal/add_class')
@include('backend/student_class/modal/edite')
@section('footer')


  <script type="text/javascript">
  
 
 function add_class(){

    $('#classasdd').modal('show');
 }

  $('#class').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#classasdd').modal('hide');

     $.ajax({
        url:url,
        type:method,
        data:data,

        success:function(data){
          
          $('#classlist').empty().html(data);

        }
    });


  });

  function Active(classId){

    var alrm = "if you want to active this item";

    if (confirm(alrm)) {

        $.ajax({
            url:"{{ route('studentClassActiveajax') }}",
            type:"GET",
            data:{classId:classId},
            success:function(data){

                $('#classlist').empty().html(data);
            }
        });
    }
  }

  function Deactive(classId){

    var alrm = "if you want to Deactive this item";

    if (confirm(alrm)) {

        $.ajax({
            url:"{{ route('studentClassDeactiveajax') }}",
            type:"GET",
            data:{classId:classId},
            success:function(data){

                $('#classlist').empty().html(data);
            }
        });
    }
  }



   function del(classId){

    var alrm = "if you want to Delete this item";

    if (confirm(alrm)) {

        $.ajax({
            url:"{{ route('studentClassDeleteajax') }}",
            type:"GET",
            data:{classId:classId},
            success:function(data){

                $('#classlist').empty().html(data);
            }
        });
    }
  }

  function edite(classId,ClassName){

    $('#classasedit').modal('show');
    $('#classasedit').find('#class_name').val(ClassName);
    $('#classasedit').find('#useriD').val(classId);
  }
  $('#classEdite').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#classasedit').modal('hide');

    $.ajax({
        url:url,
        type:method,
        data:data,

        success:function(data){

           $('#classlist').empty().html(data);
        }
    });

  });

  </script>

@endsection