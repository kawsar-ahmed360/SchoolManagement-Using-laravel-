@php($sl=1)

@foreach($session as $s)
<tr align="center">
	<td>{{ $sl++ }}</td>
	<td>{{ $s->session }}-{{ $s->session+1 }}</td>
	<td>
		@if($s->status=='1')
		<span class="badge badge-warning">Deactive</span>
		@else
		<span class="badge badge-success">Active</span>
		@endif
	</td>

	<td>
		@if($s->status=='1')
         <button onclick="Active('{{ $s->id }}')" style="padding: 6px" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
		@else
         <button onclick="Deactive('{{ $s->id }}')" style="padding: 6px" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>

		@endif
         <button onclick="edite('{{ $s->id }}','{{ $s->session }}')" style="padding: 6px" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
         <button onclick="del('{{ $s->id }}')" style="padding: 6px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	</td>
</tr>
@endforeach