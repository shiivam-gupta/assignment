@extends('backend.layouts.master')

@section('content')

	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Dashboard</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">IT Dashboard</li>
			</ol>
		</div>

		<div class="row row-cards">
			<div class="col-sm-12 col-lg-6 col-md-6 col-xl-3 ">
				<div class="card card-img-holder">
				    <div class="card-body">
						<p class="card-text text-muted font-weight-semibold mb-1">Total Projects</p>
						<div class="clearfix">
							<div class="float-left  mt-2">
								<h1>6,525</h1>
							</div>
							<div class="float-right text-right">
								<span class="pie" data-peity='{ "fill": ["#ff685c", "#f2f2f2"]}'>226,134</span>
							</div>
						</div>
						<div class="progress progress-md mt-1 h-2">
							<div class="progress-bar  bg-gradient-primary w-70"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
@endsection