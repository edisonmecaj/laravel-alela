@extends('layouts.default', ["title" => "Menu"])
@section('styles')
	<link rel="stylesheet" href="{{ asset('vendors/selectize/selectize.bootstrap3.css') }}">
@endsection
@section('content')
@parent
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<a href="{{ url('menus/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Menu</a>
		<br><br>
		@component('comps.menus_edit', ["menus" => \App\Menu::where("parent", null)->orderBy("sort", "asc")->get(), "id" => "main_menu_edit"])
			
		@endcomponent
		{!! Form::open(["class" => "text-center"]) !!}
		{!! Form::hidden("json", "") !!}
		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
				{!! Form::submit("Save", ["class" => "btn btn-success btn-block"]) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')
	<script src="{{ asset("vendors/selectize/selectize.js") }}"></script>
	<script>
		$("#main_menu_edit").sortable({
			handle: '.move-btn',
			onDrop: function  ($item, container, _super) {
				$("input[name='json']").val(json());
				_super($item, container);
			},
		});

		$(document).ready(function(){
			$("input[name='json']").val(json());
			$(".selectize").selectize({
				multiple: true
			});
		});

		function json(){
			var arr = new Array();
			$("#main_menu_edit li").each(function(k,li){
				var id = $(li).attr("menu-id");
				var parent = $(li).parent().closest("li").attr("menu-id");
				parent = parent !== undefined ? parent : null;
				arr.push({id : id, parent : parent, sort: k});
			});
			return JSON.stringify(arr);
		}

		$("input[name='icon'").keyup(function(){
			$el = $(this).parent().find(".icon-preview i");
			$el.removeAttr("class");
			$el.addClass($(this).val());
		});

		$(".edit-form").submit(function(e){
			e.preventDefault();
			$form = $(this);
			var data = $form.serialize();
			$(".messages-container").empty();
			$form.find("[type='submit']").addClass("disabled").prop("disabled", true);
			$.ajax({
				type: 'POST',
				url: "{{ url('menus/update') }}",
				data: data,
				dataType: "json",
				success: function(x){
					if(x.errors){
						for(var i in x.errors){
							$(x.errors[i]).each(function(k,m){
								$(".messages-container").append("<div class='alert alert-danger'>" + m + "</div>");
							});
						}
						$form.find("[type='submit']").removeClass("disabled").prop("disabled", false);
					}else{
						console.log("refresh");
						window.location = window.location;
					}
				}
			});
			return false;
		});

		$('#menu_delete_modal').on('show.bs.modal', function(e) {
			var id = e.relatedTarget.dataset.id;
			var label = e.relatedTarget.dataset.label;
			$(this).find("[name='menu_id']").val(id);
			$(this).find(".modal-body b").text(label);
		});
	</script>
@endsection