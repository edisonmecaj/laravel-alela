@extends('layouts.default', ["title" => "Roles"])
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-sm-4 col-sm-offset-4">
		{!! Form::model($role) !!}
			<div class="form-group">
				{!! Form::label("label", "Role Label") !!}
				{!! Form::text("label", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
			</div>
			<div class="form-group">
				{!! Form::label("role", "Role Code") !!}
				{!! Form::text("role", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
			</div>
			<div class="form-group">
				{!! Form::label("level", "Level") !!}
				{!! Form::text("level", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
					</div>
					<div class="col-xs-6">
						<a href="{{ url('roles') }}" class="btn btn-danger btn-block">Cancel</a>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection