@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Subject List  <button onclick="add_subject()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Subject</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Subject</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="subjectone">

                                       
                                               @include('backend/subject_manage/view_subject_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/subject_manage/modal/add_subject')
@include('backend/subject_manage/modal/edite')
@section('footer')


<script type="text/javascript">
  function add_subject(){

    $('#subject').modal('show');
  }

  $('#subjectadd').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();
    
     $('#subject').modal('hide');


     $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){

        $('#subjectone').empty().html(data);
      }
     });

  });


  function Active(SubjectId){

    var alrm = 'If you Want to Active this item,press ok';

    if (confirm(alrm)) {
      
     $.ajax({
        url:"{{ route('SubjectActiveajax') }}",
      type:"GET",
      data:{SubjectId:SubjectId},

      success:function(data){

        $('#subjectone').empty().html(data);
      }

     });

    }
  } 


   function Deactive(SubjectId){

    var alrm = 'If you Want to Deactive this item,press ok';

    if (confirm(alrm)) {
      
     $.ajax({
        url:"{{ route('SubjectDeactiveajax') }}",
      type:"GET",
      data:{SubjectId:SubjectId},

      success:function(data){

        $('#subjectone').empty().html(data);
      }

     });

    }
  }  


   function Dele(SubjectId){

    var alrm = 'If you Want to Delete this item,press ok';

    if (confirm(alrm)) {
      
     $.ajax({
       url:"{{ route('SubjectDeleteajax') }}",
      type:"GET",
      data:{SubjectId:SubjectId},

      success:function(data){

        $('#subjectone').empty().html(data);
      }

     });

    }
  }


  function edite(SubjectId,SubjectName){
    $('#subjectedite').modal('show');
    $('#subjectedite').find('#subject').val(SubjectName);
    $('#subjectedite').find('#shiftId').val(SubjectId);
  }

  $('#subjectediteform').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();
    $('#subjectedite').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){
         $('#subjectone').empty().html(data);
      }
    });
  });
</script>
 


@endsection