<div class="col-xs-12 col-sm-{{$sm or '4'}} col-md-{{$md or '4'}} col-lg-{{$lg or '4'}} x_panel_container">
	<div class="x_panel">
		<div class="x_title">
			<h2>{{$title or ''}}</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a class="close-link pull-right">
						<i class="fa fa-close"></i>
					</a>
				</li>
				<li>
					<a class="collapse-link pull-right">
						<i class="fa fa-chevron-up"></i>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			{{$content or ''}}
		</div>
	</div>
</div>