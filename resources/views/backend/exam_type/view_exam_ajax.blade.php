@php($sl=1)

@foreach($exam as $e)

 <tr align="center">
 	<td>{{ $sl++ }}</td>
 	<td>{{ $e->exam_name }}</td>
 	<td>
 		@if($e->status=='1')
 		<span class="badge badge-warning">Deactive</span>
 		@else
 		<span class="badge badge-success">Active</span>
 		@endif
 	</td>

 	<td>
 		@if($e->status=='1')
            <button onclick="Active('{{ $e->id }}')" style="padding: 7px" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
 		@else
            <button onclick="Deactive('{{ $e->id }}')" style="padding: 7px" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>

 		@endif
            <button onclick="edite('{{ $e->id }}','{{ $e->exam_name }}')" style="padding: 7px" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
            <button onclick="Dele('{{ $e->id }}')" style="padding: 7px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
 	</td>
 </tr>

@endforeach