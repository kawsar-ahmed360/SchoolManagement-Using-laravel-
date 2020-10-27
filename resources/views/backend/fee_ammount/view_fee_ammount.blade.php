@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">All Fee Ammount List  <a href="{{ route('FeeAmmountadd') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add fee ammount</a></h4>
                                   

                                        <table id="{{-- datatable-buttons --}}" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                {{-- <th>Class Name</th> --}}
                                                <th>Fee Category Name</th>
                                                {{-- <th>Ammount</th> --}}
                                            
                                                {{-- <th>Status</th> --}}
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="">

                                       
                                             @php($sl=1)

                                            @foreach($feecategoryammount as $key=>$f)
                                                <tr style="text-align: center">
                                                  <td>{{ $sl++ }}</td>
                                                  <td>{{ $f['feecategor']['fee_category'] }}</td>
                                                  <td>
                                                    <a href="{{ route('FeeAmmountEditeajax',$f->fee_category_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('FeeAmmounteye',$f->fee_category_id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                  </td>
                                                
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection


@section('footer')


<script type="text/javascript">
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','success') }}";

  switch(type){
    case "success":
    toastr.success("{{ Session::get('message') }}");
    break;
  }
  @endif
</script>
 


@endsection