<li>
	<img src="{{ url('storage/images/profiles/thumb/' . (isset($pic) ? $pic : 'default.png')) }}" class="avatar" alt="Avatar">
	<div class="message_date">
		<h3 class="date text-info">{{ isset($dt) ? \Carbon\Carbon::parse($dt)->format("dd") : '01' }}</h3>
		<p class="month">{{ isset($dt) ? \Carbon\Carbon::parse($dt)->format("mmm") : 'Jan' }}</p>
	</div>
	<div class="message_wrapper">
		<h4 class="heading">{{ $name or 'title goes here...'}}</h4>
		<blockquote class="message">
			{{ $text or 'text goes here...' }}
		</blockquote>
		<br />
		<p class="url">
			<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
			<a href="{{ url(isset($url) ? $url : '#') }}">
				<i class="fa fa-paperclip"></i>
				{{$link or 'Link'}}
			</a>
		</p>
	</div>
</li>