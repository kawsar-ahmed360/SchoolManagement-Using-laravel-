@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All User List <button onclick="add_user()" class="btn btn-success btn-sm">Add User</button></h4>
                                   

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Password</th>
                                                <th>Address</th>
                                                <th>User Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="userlist">

                                       
                                               @include('backend/user/all_user_view_ajax')


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

@include('backend/user/modal/add_user')

@section('footer')


  <script type="text/javascript">
      
      function dele(UserId){

        var alrm = "If you want to delete This Item";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('userListDelete') }}",
                type:"GET",
                data:{UserId:UserId},

                success:function(data){

                    $('#userlist').empty().html(data);
                    alert('user successfully deleted'); 
                }
            });
        }
      }


      function add_user(){

        $('#user').modal('show');
      }

      $('#useradd').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('#user').modal('hide');
        $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(data){

                $('#userlist').empty().html(data);
            }
        });
      });

  </script>

@endsection