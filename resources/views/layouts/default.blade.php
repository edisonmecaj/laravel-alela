<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	{{ Html::style('vendors/bootstrap/dist/css/bootstrap.min.css') }}
	{{ Html::style('vendors/icomoon/style.css') }}
	{{--  {{ Html::style('vendors/font-awesome/css/font-awesome.min.css') }}  --}}
	<link rel="shortcut icon" href="{{{ asset('images/logo.png') }}}">
	{{ Html::style('vendors/fa5/css/fontawesome-all.min.css')}}
	{{ Html::style('vendors/nprogress/nprogress.css') }}
	{{ Html::style('css/alela.min.css') }}
	@yield('styles')
	{{ Html::style('css/custom.css') }}
	<title>{{ config('app.name', 'Laravel') }} {{ isset($title) ? " | ".$title : "" }}</title>
</head>
<body class="nav-md" cz-shortcut-listen="true">
	<div class="container body">
		<div class="main_container">
			@guest
			@else
			@include('layouts.sidebar')
			@include('layouts.topbar')
			@endguest
			<div class="right_col" role="main" style="min-height: 900px;">
				<div class="page-title">
					<div class="col-sm-6 col-xs-12 pull-right">
						<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for watches...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Go!</button>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-5 col-xs-12">
						@isset($title)
							<h3>{{$title}}</h3>
						@endisset
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="container">
					@include('layouts.messages')
					@yield('content')
				</div>
			</div>
			<footer>
				<div class="pull-right">
					<small class="text-muted">Copyright 2017 © - E.M.</small>
				</div>
				<div class="clearfix"></div>
			</footer>
		</div>
	</div>
	<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
	<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
	<script src="{{ asset('vendors/sortable/jquery-sortable.js') }}"></script>
	<script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('js/ajax.js') }}"></script>
	<script src="{{ asset('js/alela.min.js') }}"></script>
	@yield('scripts')
</body>
</html>