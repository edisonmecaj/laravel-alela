@extends('layouts.default', ["title" => "Attributes List"])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
		<a href="{{ url('attributes/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new Attribute</a>
		<table class="table table-fixed table-bordered table-striped table-centered">
			<thead>
				<tr>
					<th style="width: 10%">Sort</th>
					<th>Name</th>
					<th>Category</th>
					<th>Required</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($list as $item)
					<tr row-id="{{ $item->id }}">
						<td><i class="fas fa-bars"></i></td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->Category->name }}</td>
						<td>{!! $item->req !!}</td>
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
		$('.table').sortable({
			containerSelector: 'table',
			itemPath: '> tbody',
			itemSelector: 'tr',
			placeholder: "<tr class='table-placeholder'><td colspan='5'>Place row here...</td><tr>",
			handle: 'td:first-child',
			onDrop: function  ($item, container, _super) {
				_super($item, container);
				$(".dragged").remove();
				$.ajax({
					headers: {
    					'X-CSRF-TOKEN': "{{ csrf_token() }}"
    				},
					url: "{{ url('attributes/sort') }}",
					method: "POST",
					data: {json : json()}
				});
			}
		});

		function json(){
			var arr = [];
			$(".table tbody tr").each(function(k,r){
				$tr = $(r);
				var id = $tr.attr("row-id");
				arr.push({id : id, sort : k});
			});
			console.log(arr);
			return JSON.stringify(arr);
		}
	</script>
@endsection