@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Designation List  <button onclick="add_designation()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Designation</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Shift</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="designationss">

                                       
                                               @include('backend/designation/designation_view_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/designation/modal/add_designation')
@include('backend/designation/modal/edite')
@section('footer')


<script type="text/javascript">
  

function add_designation(){

  $('#designation').modal('show');
}


$('#designationadd').submit(function(e){
   e.preventDefault();

   var url = $(this).attr('action');
   var method = $(this).attr('method');
   var data = $(this).serialize();

   // alert(data);

   $('#designation').modal('hide');

   $.ajax({
    url:url,
    type:method,
    data:data,
    success:function(data){

      $('#designationss').empty().html(data);
    }
   });
});

function Active(DesiId){

  var alrm = "If you Want to Active this item ,press ok";

  if (confirm(alrm)) {

    $.ajax({
      url:"{{ route('DesignationActiveajax') }}",
      type:"GET",
      data:{DesiId:DesiId},

      success:function(data){
       
       $('#designationss').empty().html(data);
      }
    });
  }
}

function Deactive(DesiId){

  var alrm = "If you Want to Deactive this item ,press ok";

  if (confirm(alrm)) {

    $.ajax({
      url:"{{ route('DesignationDeactiveajax') }}",
      type:"GET",
      data:{DesiId:DesiId},

      success:function(data){
       
       $('#designationss').empty().html(data);
      }
    });
  }
}

function Dele(DesiId){

  var alrm = "If you Want to Delete this item ,press ok";

  if (confirm(alrm)) {

    $.ajax({
      url:"{{ route('DesignationDeleteajax') }}",
      type:"GET",
      data:{DesiId:DesiId},

      success:function(data){
       
       $('#designationss').empty().html(data);
      }
    });
  }
}

function edite(DesiId,Name){

  $('#designationedite').modal('show');
  $('#designationedite').find('#name').val(Name);
  $('#designationedite').find('#desId').val(DesiId);
}


$('#designatid').submit(function(e){
  e.preventDefault();

  var url = $(this).attr('action');
  var method = $(this).attr('method');
  var data = $(this).serialize();

  $('#designationedite').modal('hide');

  $.ajax({
    url:url,
    type:method,
    data:data,

    success:function(data){

      $('#designationss').empty().html(data);
    }
  });
});
</script>
 


@endsection