<ul @isset($id) id="{{$id}}" @endisset>
	@foreach ($menus as $m)
		<li menu-id="{{$m->id}}">
			<div class="btn btn-primary btn-block">
				<div class="row">
					<div class="col-xs-1 move-btn" data-toggle="collapse" data-target="#menu_edit_{{$m->id}}" >
						<i class="fas fa-arrows-alt"></i>
					</div>
					<div class="col-xs-7 text-left menu-title">
						{{ $m->label }}
					</div>
					<div class="col-xs-4 text-right">
						<span class="fa fa-edit"></span>
					</div>
				</div>
			</div>
			<div id="menu_edit_{{$m->id}}" class="collapse btn btn-block btn-bordered">
				{!! Form::model($m, ["action" => ["MenuController@update", $m->id], "class" => "edit-form"]) !!}
				<div class="form-group">
					{!! Form::hidden("menu", $m->id) !!}
					{!! Form::label("label") !!}
					{!! Form::text("label", null, ["class" => "form-control", "required" => true, "autocomplete" => "off"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label("url") !!}
					{!! Form::text("url", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label("icon", "Icon Class") !!}
					<div class="input-group">
						{!! Form::text("icon", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
						<div class="input-group-addon icon-preview"><i class="{{$m->icon}}"></i></div>
					</div>					
				</div>
				<div class="form-group">
					{!! Form::label("roles") !!}
					{!! Form::select("roles[]", \App\Role::orderBy("level", "desc")->pluck("label", "id"), null, ["class" => "form-control selectize", "autocomplete" => "off", "multiple" => "true"]) !!}
				</div>
				<div class="form-group">
					{!! Form::submit("Save", ["class" => "btn btn-success"]) !!}
					{!! Form::button("Cancel", ["class" => "btn btn-primary", "data-toggle" => "collapse", "data-target" => "#menu_edit_".$m->id]) !!}
					{!! Form::button("Delete", ["class" => "btn btn-danger", "data-toggle" => "modal", "data-target" => "#menu_delete_modal", "data-label" => $m->label, "data-id" => $m->id]) !!}
				</div>
				{!! Form::close() !!}
			</div>
			@if ($m->HasChilds())
				@component('comps.menus_edit', ["menus" => $m->Childs()->orderBy("sort", "asc")->get()])@endcomponent
			@else
			<ul></ul>
			@endif
		</li>
	@endforeach
</ul>


<div class="modal fade" id="menu_delete_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Delete Menu Item</h4>
			</div>
			<div class="modal-body">
				Do you want to delete the menu item: <b></b>
			</div>
			<div class="modal-footer">
				{!! Form::open(["action" => "MenuController@delete"]) !!}
					{!! Form::hidden("menu_id") !!}
					{!! Form::submit("YES", ["class" => "btn btn-success"]) !!}
					{!! Form::button("NO", ["class" => "btn btn-danger", "data-dismiss" => "modal"]) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
