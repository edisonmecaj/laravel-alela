@extends('layouts.default', ["title" => $title])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
		{!! Form::model($attr) !!}
		<div class="form-group">
			{!! Form::label("name", "Attribute Name") !!}
			{!! Form::text("name", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("category_id", "Category") !!}
			{!! Form::select("category_id", \App\Category::pluck("name", "id"), $cat, ["class" => "form-control", "autocomplete" => "off"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("required") !!}			
			<div class="btn-group btn-group-justified" data-toggle="buttons">
				<label for="required" class="btn btn-default btn-block {{ $attr->required ? 'active' : ''}}">
					{!! Form::radio("required", 1, $attr->required) !!} YES
				</label>
				<label for="required" class="btn btn-default btn-block {{ !$attr->required ? 'active' : ''}}">
					{!! Form::radio("required", 0, !$attr->required) !!} NO
				</label>
			</div>			
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
				</div>
				<div class="col-xs-6">
					<a href="{{ url('attributes') }}" class="btn btn-danger btn-block">Cancel</a>
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