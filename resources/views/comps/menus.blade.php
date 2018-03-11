<ul class="{{$class or ''}}">
	@foreach ($menus as $m)
		@php
		$dyn = $m->HasDynamic();
		@endphp
		@if ($m->HasChilds())
			<li menu-id="{{$m->id}}">
				<a>
					@if (!empty($m->icon))
						<i class="{{$m->icon}}"></i>
					@endif
					{{$m->label}}
					<span class="fas fa-chevron-down"></span>
				</a>
				@component('comps.menus', ["menus" => $m->Childs()->orderBy("sort", "asc")->get(), "class" => "nav child_menu"])@endcomponent
			</li>
		@else
		<li menu-id="{{$m->id}}">
			@if (!$dyn)
			<a @isset($m->url) href="{{ url($m->url) }}" @endisset>
			@else
			<a>
			@endif
			@if (!empty($m->icon))
				<i class="{{$m->icon}}"></i>
			@endif
			{{$m->label}}
			@if ($dyn)
			<span class="fas fa-chevron-down"></span>
			</a>
			<ul class="nav child_menu">
				@foreach ($m->DynamicChilds() as $di)
					<li>
						<a href="{{ url($m->url.'/'.$di->id) }}">
							{{$di->label}}
						</a>
					</li>
				@endforeach
			</ul>
			@else
			</a>
			@endif			
		</li>						
		@endif
	@endforeach
</ul>