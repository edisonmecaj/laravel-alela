<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="{{ url('home') }}" class="site_title text-center">
				<img class="wh100" src="{{ asset('storage/images/logo_w.png') }}" alt="">
			</a>
		</div>
		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{ asset(Auth::user()->thumb) }}" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>Edison Mecaj</h2>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- /menu profile quick info -->
		<br>
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section active">
				@component('comps.menus', ["menus" => Auth::user()->Role->Menus()->where("parent", null)->orderBy("sort", "asc")->get(), "class" => "nav side-menu"])@endcomponent
			</div>
		</div>
		<div class="sidebar-footer hidden-small">
			@if (Auth::user()->dev)			
			<a data-toggle="tooltip" data-placement="top" title="" style="width: 50%" href="{{ url('menus') }}" data-original-title="Edit Menu">
				<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			</a>
			@endif
			<a data-toggle="tooltip" data-placement="top" title="" style="width: {{Auth::user()->dev ? '50' : '100'}}%" href="{{ route('logout') }}" data-original-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
	</div>
</div>