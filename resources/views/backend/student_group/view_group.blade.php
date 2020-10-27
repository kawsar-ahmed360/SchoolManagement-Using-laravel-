@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Group List  <button onclick="add_group()" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Group</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Name</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="grouplist">

                                       
                                               @include('backend/student_group/view_group_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/student_group/modal/add_group')
@include('backend/student_group/modal/edite')
@section('footer')

<script type="text/javascript">
    

    function add_group(){

        $('#groupadd').modal('show');
    }

    $('#grouop').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#groupadd').modal('hide');

        $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(data){

                $('#grouplist').empty().html(data);
            }
        });

    });


    function Active(gId){

        var alrm = "If you want to Active This Item";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('studentGroupActiveajax') }}",
                type:"GET",
                data:{gId:gId},

                success:function(data){

                    $('#grouplist').empty().html(data);
                }
            });
        }
    }  


      function Deactive(gId){

        var alrm = "If you want to Deactive This Item";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('studentGroupDeactiveajax') }}",
                type:"GET",
                data:{gId:gId},

                success:function(data){

                    $('#grouplist').empty().html(data);
                }
            });
        }
    }    


      function del(gId){

        var alrm = "If you want to Delete This Item";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('studentGroupDeleteajax') }}",
                type:"GET",
                data:{gId:gId},

                success:function(data){

                    $('#grouplist').empty().html(data);
                }
            });
        }
    }

    function Edite(gId,groupName){

        $('#groupedite').modal('show');
        $('#groupedite').find('#group').val(groupName);
        $('#groupedite').find('#grupId').val(gId);
    }

    $('#grouope').submit(function(e){
        e.preventDefault();

        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#groupedite').modal('hide');

        $.ajax({
            url:url,
            type:method,
            data:data,
            success:function(data){

                $('#grouplist').empty().html(data);
            }
        });

    });

</script>
  


@endsection