<div class="row">
	<div class="col-xs-12 messages-container">
		@if ($errors->any())
			<div class="alert alert-danger alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				@if (sizeof($errors->all()) == 1)
					{!! $errors->first() !!}
				@else
				<ul>
					@foreach ($errors->all() as $error)
					<li>{!! $error !!}</li>
					@endforeach
				</ul>
				@endif
			</div>
		@endif
		@if (Session::has("success_message"))
			<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				@if (!is_array(Session::get("success_message")))
					{!! Session::get("success_message") !!}
				@else
				<ul>
					@foreach (Session::get("success_message") as $mess)
					<li>{!! $mess !!}</li>
					@endforeach
				</ul>
				@endif
			</div>
			{{ Session::forget("success_message") }}
		@endif
	</div>
</div>