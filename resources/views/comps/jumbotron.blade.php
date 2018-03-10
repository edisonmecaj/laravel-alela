<div class="jumbotron">
	<div class="container">
		<h1>{{ $title or ''}}</h1>
		<p>{{ $content or ''}}</p>
		<p>
			<a class="btn btn-primary btn-lg" href="{{ isset($href) ? $href : '#' }}">{{$button or ''}}</a>
		</p>
	</div>
</div>