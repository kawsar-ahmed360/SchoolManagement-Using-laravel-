@php($sl=1)

@foreach($fee as $f)
  <tr align="center">
  	<td>{{ $sl++ }}</td>
  	<td>{{ $f->fee_category }}</td>
  	<td>
  		@if($f->status=='1')
  		<span class="badge badge-warning">Deactive</span>
  		@else
  		<span class="badge badge-success">Active</span>
  		@endif
  	</td>

  		<td>
   		@if($f->status=='1')
   		<button onclick="Active('{{ $f->id }}')" style="padding: 7px" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
   		@else
   		<button onclick="Deactive('{{ $f->id }}')" style="padding: 7px" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>
   		@endif
   		<button onclick="Edite('{{ $f->id }}','{{ $f->fee_category }}')" style="padding: 7px" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
   		<button onclick="Del('{{ $f->id }}')" style="padding: 7px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
   	</td>
  </tr>
@endforeach