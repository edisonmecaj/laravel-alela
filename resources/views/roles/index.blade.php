@extends('layouts.default', ["title" => "Roles"])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<a href="{{ url('roles/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new Role</a>
		<table class="table table-striped table-fixed table-centered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Role Label</th>
					<th>Role Code</th>
					<th>Level</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($roles as $role)
					<tr>
						<td>{{$role->id}}</td>
						<td>{{$role->label}}</td>
						<td>{{$role->role}}</td>
						<td>{{$role->level}}</td>
						<td>
							<a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary btn-xs"><i class="far fa-edit"></i></a>
							<a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
	<script>
		
	</script>
@endsection