@extends('layouts.default', ["title" => "Add new Model"])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
		{!! Form::model($make) !!}
		<div class="form-group">
			{!! Form::label("name", "Make Name") !!}
			{!! Form::text("name", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("category_id", "Category") !!}
			{!! Form::select("category_id", \App\Category::pluck("name", "id"), null, ["class" => "form-control", "autocomplete" => "off"]) !!}
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
				</div>
				<div class="col-xs-6">
					<a href="{{ url('models') }}" class="btn btn-danger btn-block">Cancel</a>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')
	<script>
		
	</script>
@endsection