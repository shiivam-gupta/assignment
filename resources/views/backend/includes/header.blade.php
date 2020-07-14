<div class="app-header header py-1 d-flex">
	<div class="container-fluid">
		<div class="d-flex">
			<a class="header-brand" href="{{ route('admin.dashboard') }}">
				Cricket
			</a>
			<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
			<div class="d-flex order-lg-2 ml-auto">
			    <div class="mt-2">
					<div class="searching mt-2 ml-2 mr-3">
						<a href="javascript:void(0)" class="search-open mt-3">
							<i class="fa fa-search text-dark"></i>
						</a>
						<div class="search-inline">
							<form>
								<input type="text" class="form-control" placeholder="Search here">
								<button type="submit">
									<i class="fa fa-search"></i>
								</button>
								<a href="javascript:void(0)" class="search-close">
									<i class="fa fa-times"></i>
								</a>
							</form>
						</div>
					</div>
				</div>
				<div class="dropdown d-none d-md-flex " >
					<a  class="nav-link icon full-screen-link">
						<i class="mdi mdi-arrow-expand-all"  id="fullscreen-button"></i>
					</a>
				</div>
				<div class="dropdown">
					<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
						<span class="avatar avatar-md brround"><img src="{{ asset('assets/images/faces/male/40.jpg') }}" alt="Profile-img" class="avatar avatar-md brround"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
						<div class="text-center">
							<a href="#" class="dropdown-item text-center font-weight-sembold user">{{ auth()->user()->fullname }}</a>
							<div class="dropdown-divider"></div>
						</div>
						<form action="{{ route('logout') }}" method="POST" >
							@csrf
							<button type="submit" class="dropdown-item">
								<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>