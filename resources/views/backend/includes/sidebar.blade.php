<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<div class="dropdown user-pro-body">
			<div>
				<img src="{{ asset('assets/images/faces/male/40.jpg')}}" alt="user-img" class="avatar avatar-xl brround mCS_img_loaded">
				<a href="javascript:void(0)" class="profile-img">
					<span class="fa fa-pencil" aria-hidden="true"></span>
				</a>
			</div>
			<div class="user-info mb-2">
				<h4 class="font-weight-semibold text-dark mb-1">{{ auth()->user()->fullname }}</h4>
			</div>
		</div>
	</div>
	<ul class="side-menu">
		<li>
			<a class="side-menu__item" href="{{ route('teams.index') }}"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Teams</span></a>
		</li>

		<li>
			<a class="side-menu__item" href="{{ route('matches.index') }}"><i class="side-menu__icon fa fa-window-maximize"></i><span class="side-menu__label">Matches</span></a>
		</li>

		<li>
			<a class="side-menu__item" href="{{ route('points.index') }}"><i class="side-menu__icon fa fa-map"></i><span class="side-menu__label">Points</span></a>
		</li>
	</ul>
</aside>