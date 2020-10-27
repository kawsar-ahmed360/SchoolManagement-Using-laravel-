@php($sl=1)

@foreach($feecategoryammount as $feeammount)
  <tr align="center">
  	 <td>{{ $sl++ }}</td>
  	 <td>{{ $feeammount->class_name }}</td>
  	 <td>{{ $feeammount->fee_category }}</td>
  	 <td>{{ $feeammount->ammount }}</td>
  	 <td>
  	 	@if($feeammount->status=='1')
  	 	 <span class="badge badge-warning">Deactive</span>
  	 	@else
  	 	 <span class="badge badge-success">Active</span>
  	 	@endif
  	 </td>

  	 <td>
  	 	@if($feeammount->status=='1')
  	 	 <button onclick="" style="padding: 7px" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
  	 	@else
  	 	 <button onclick="" style="padding: 7px" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>
  	 	
  	 	@endif
  	 	 <button onclick="" style="padding: 7px" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
  	 	 <button onclick="" style="padding: 7px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
  	 </td>
  </tr>
@endforeach