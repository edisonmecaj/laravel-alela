@extends('layouts.default', ["title" => $title])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3">
		<a href="{{ url($route.'/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new {{ $name }}</a>
		<table class="table table-fixed table-bordered table-striped table-centered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($list as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>
							{!! $item->edit_btn !!}
							{!! $item->delete_btn !!}
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