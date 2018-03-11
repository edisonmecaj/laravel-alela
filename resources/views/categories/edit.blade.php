@extends('layouts.default', ["title" => $title])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
		{!! Form::model($cat) !!}
		<div class="form-group">
			{!! Form::label("name", "Category Name") !!}
			{!! Form::text("name", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
				</div>
				<div class="col-xs-6">
					<a href="{{ url('categories') }}" class="btn btn-danger btn-block">Cancel</a>
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