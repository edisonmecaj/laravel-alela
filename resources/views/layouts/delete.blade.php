@extends('layouts.default', ["title" => (isset($title) ? $title : "Delete")])
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 text-center">
		<h3>{{ $message or '' }}</h3>
		<div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
			<div class="row">
				<div class="col-xs-6">
					{!! Form::open() !!}
					{!! Form::hidden("id", $id) !!}
					{!! Form::submit("YES", ["class" => "btn btn-success btn-block"]) !!}
					{!! Form::close() !!}
				</div>
				<div class="col-xs-6">
					<a href="{{ url($return) }}" class="btn btn-danger btn-block">NO</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection