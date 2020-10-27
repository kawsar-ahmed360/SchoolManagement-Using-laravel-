@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Session List  <button onclick="add_session()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Session</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Session(year)</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="sessionlist">

                                       
                                               @include('backend/student_session/view_session_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/student_session/modal/add_session')
@include('backend/student_session/modal/edite')
@section('footer')


<script type="text/javascript">
  
  function add_session(){

    $('#session').modal('show');
  }

  $('#addsession').submit(function(e){

     e.preventDefault();

     var url = $(this).attr('action');
     var method = $(this).attr('method');
     var data = $(this).serialize();

    $('#session').modal('hide');

    $.ajax({
        url:url,
        type:method,
        data:data,

        success:function(data){

      $('#sessionlist').empty().html(data);  
        }
    });

  });

  function Active(SessionId){

    var alrm = "if you want to Active this item";

    if (confirm(alrm)) {
        $.ajax({
            url:"{{ route('studentyearActiveajax') }}",
            type:"GET",
            data:{SessionId:SessionId},
            success:function(data){

                 $('#sessionlist').empty().html(data);  
            }
        });
    }
  } 

   function Deactive(SessionId){

    var alrm = "if you want to Deactive this item";

    if (confirm(alrm)) {
        $.ajax({
            url:"{{ route('studentyearDeactiveajax') }}",
            type:"GET",
            data:{SessionId:SessionId},
            success:function(data){

                 $('#sessionlist').empty().html(data);  
            }
        });
    }
  }  

   function del(SessionId){

    var alrm = "if you want to Delete this item";

    if (confirm(alrm)) {
        $.ajax({
            url:"{{ route('studentyearDeleteajax') }}",
            type:"GET",
            data:{SessionId:SessionId},
            success:function(data){

                 $('#sessionlist').empty().html(data);  
            }
        });
    }
  }

  function edite(SessionId,Session){
 
 $('#sessionedite').modal('show');
 $('#sessionedite').find('#session').val(Session);
 $('#sessionedite').find('#SessioId').val(SessionId);

  }

  $('#Editesession').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

  $('#sessionedite').modal('hide');

   $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){

        $('#sessionlist').empty().html(data); 
      }
   });

  });

</script>
 


@endsection