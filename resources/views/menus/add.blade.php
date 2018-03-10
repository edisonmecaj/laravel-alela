@extends('layouts.default', ["title" => "Menu"])
@section('styles')
	<link rel="stylesheet" href="{{ asset('vendors/selectize/selectize.bootstrap3.css') }}">
@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		{!! Form::open(["class" => "text-center"]) !!}
		<div class="form-group">
			{!! Form::label("label") !!}
			{!! Form::text("label", null, ["autocomplete" => "off", "class" => "form-control"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("url") !!}
			{!! Form::text("url", null, ["autocomplete" => "off", "class" => "form-control"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("icon", "Icon Class") !!}
			<div class="input-group">
				{!! Form::text("icon", null, ["autocomplete" => "off", "class" => "form-control"]) !!}
				<div class="input-group-addon icon-preview"><i>...</i></div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label("roles") !!}
			{!! Form::select("roles[]", \App\Role::orderBy("level", "desc")->pluck("label", "id"), null, ["autocomplete" => "off", "class" => "form-control selectize", "multiple" => true, "size" => 1]) !!}
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
				</div>
				<div class="col-xs-6">
					<a href="{{ url('menus') }}" class="btn btn-danger btn-block">Cancel</a>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')
	<script src="{{ asset("vendors/selectize/selectize.js") }}"></script>
	<script>
		$(document).ready(function(){
			$(".selectize").selectize({
				multiple: true
			});
		});

		$("input[name='icon']").keyup(function(){
			var cl = $(this).val();
			$prev = $(".icon-preview");
			if(cl.trim() == ""){
				$prev.html("<i>...</i>");
			}else{
				$prev.html("<i class='"+cl+"'></i>");
			}
		});
	</script>
@endsection