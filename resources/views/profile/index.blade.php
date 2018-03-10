@extends('layouts.default', ["title" => "Profile"])
@section('styles')

@endsection
@section('content')
@parent
<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>User Report
						<small>Activity report</small>
					</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li>
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="fa fa-wrench"></i>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#">Settings 1</a>
								</li>
								<li>
									<a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="close-link">
								<i class="fa fa-close"></i>
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
								<!-- Current avatar -->
								<img class="img-responsive avatar-view" src="{{ asset($user->profile_avatar) }}" alt="Avatar" title="Change the avatar">
							</div>
						</div>
						<a class="btn btn-success">
							<i class="fa fa-edit m-right-xs"></i>Change Profile Picture
						</a>
						<h3>{{ $user->full_name }}</h3>

						<ul class="list-unstyled user_data">
							<li>
								<i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
							</li>

							<li>
								<i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
							</li>

							<li class="m-top-xs">
								<i class="fa fa-external-link user-profile-icon"></i>
								<a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
							</li>
						</ul>
						<br/>

						<!-- start skills -->
						<h4>Skills</h4>
						<ul class="list-unstyled user_data">
							<li>
								<p>Web Applications</p>
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
								</div>
							</li>
							<li>
								<p>Website Design</p>
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
								</div>
							</li>
							<li>
								<p>Automation & Testing</p>
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
								</div>
							</li>
							<li>
								<p>UI / UX</p>
								<div class="progress progress_sm">
									<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
								</div>
							</li>
						</ul>
						<!-- end of skills -->

					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_profile" role="home-tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
								</li>
								<li role="presentation">
									<a href="#tab_activity" id="tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane active fade in" id="tab_profile" aria-labelledby="profile-tab">
									<p>
										xxFood truck fixie locavore, accusamus mcsweeneys marfa nulla single-origin coffee squid. Exercitation +1 labore
										velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
										Qui photo booth letterpress, commodo enim craft beer mlkshk 
									</p>
								</div>
								<div role="tabpanel" class="tab-pane fade in" id="tab_activity" aria-labelledby="home-tab">
									<!-- start recent activity -->
									<ul class="messages">
										@component('comps.activity')@endcomponent
										@component('comps.activity')@endcomponent
										@component('comps.activity')@endcomponent
										@component('comps.activity')@endcomponent
										@component('comps.activity')@endcomponent
										@component('comps.activity')@endcomponent
									</ul>
									<!-- end recent activity -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script>
		
	</script>
@endsection