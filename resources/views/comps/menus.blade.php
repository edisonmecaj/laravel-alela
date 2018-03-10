<ul class="{{$class or ''}}">
	@foreach ($menus as $m)
		@if ($m->HasChilds())
			<li menu-id="{{$m->id}}">
				<a>
					@if (!empty($m->icon))
						<i class="{{$m->icon}}"></i>
					@endif
					{{$m->label}}
					@isset($edit)
					@else
					<span class="fas fa-chevron-down"></span>
					@endisset
				</a>
				@component('comps.menus', ["menus" => $m->Childs()->orderBy("sort", "asc")->get(), "class" => "nav child_menu"])@endcomponent
			</li>
		@else
		<li menu-id="{{$m->id}}">
			<a @isset($m->url) href="{{ url($m->url) }}" @endisset>
				@if (!empty($m->icon))
					<i class="{{$m->icon}}"></i>
				@endif
				{{$m->label}}
			</a>
			@isset($edit)
				<ul></ul>
			@endisset
		</li>						
		@endif
	@endforeach
</ul>