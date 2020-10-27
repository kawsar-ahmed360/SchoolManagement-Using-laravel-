@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Fee List  <button onclick="add_fee()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Fee</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Fee</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="feelist">

                                       
                                               @include('backend/fee_category/view_fee_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/fee_category/modal/add_fee')
@include('backend/fee_category/modal/edite')
@section('footer')

<script type="text/javascript">
 
  function add_fee(){
  $('#fee').modal('show');
     
  }

  $('#feeadd').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

  $('#fee').modal('hide');

  $.ajax({
    url:url,
    type:method,
    data:data,
    success:function(data){

      $('#feelist').empty().html(data);
    }

  });

  });

  function Active(feeId){

    var alrm = "If you want to active this item press ok";
    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('FeeCategoryActiveajax') }}",
        type:"GET",
        data:{feeId:feeId},

        success:function(data){

           $('#feelist').empty().html(data);
        }
      });
    }
  }  
 
  function Deactive(feeId){

    var alrm = "If you want to Deactive this item press ok";
    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('FeeCategoryDeactiveajax') }}",
        type:"GET",
        data:{feeId:feeId},

        success:function(data){

           $('#feelist').empty().html(data);
        }
      });
    }
  }  
 
  function Del(feeId){

    var alrm = "If you want to Delete this item press ok";
    if (confirm(alrm)) {
      $.ajax({
        url:"{{ route('FeeCategoryDeleteajax') }}",
        type:"GET",
        data:{feeId:feeId},

        success:function(data){

           $('#feelist').empty().html(data);
        }
      });
    }
  } 

  function Edite(FeeiD,feeName){

    $('#feeedite').modal('show');
    $('#feeedite').find('#fee_category').val(feeName);
    $('#feeedite').find('#feeId').val(FeeiD);
  }

  $('#feeed').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $('#feeedite').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,
      success:function(data){
        
         $('#feelist').empty().html(data);

      }
    });

  }); 

</script>
 


@endsection