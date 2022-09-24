
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons/icomoon/styles.css" rel="stylesheet')}}" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}} " rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">

	{{-- new  --}}
	<link rel="stylesheet" type="text/css"href="https://loadboard.doft.com/assets/css/pages/driver/post-truck.css?v=3.1.1654968406976" />
    {{-- <link rel="stylesheet" type="text/css" href="https://loadboard.doft.com/assets/css/vendors.css?v=3.1.1654968406976"> --}}
    <script src="https://loadboard.doft.com/assets/vendors/js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://loadboard.doft.com/assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" type="text/css" href="https://loadboard.doft.com/assets/css/plugins/forms/address-autocomplete.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
	{{-- <script type="text/javascript" src="{{asset('assets/js/pages/dashboard.js')}}"></script> --}}

	<script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="{{asset('assets/images/logo_light.png')}}" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="breadcrumb-elements but-sizeData">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						RTD
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-lock"></i>My Profile</a></li>
						<li><a href="#"><i class="icon-statistics"></i>Payments</a></li>
						<li><a href="#"><i class="icon-accessibility"></i> Setting</a></li>
						<li class="divider"></li>
						           
						      
						<li>
							<a href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="icon-gear"></i>Logout
							</a>
							
							<form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			</ul>
			
		</div>
		
			  
		</div>
		
	
	</div>
	

	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			
			@include('admin.layout.sidebar')
          
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

					</div>

					
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">


					<!-- Dashboard content -->
					<div class="row">
						
						@yield('content')
						
					</div>
					<!-- /dashboard content -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
		<script src="{{asset('assets/js/bootstrap-4.1.3.min.js')}}"></script>
		<script type="text/javascript"src="{{asset('assets/js/parsley.min.js')}}"></script>
		{{-- <script type="text/javascript" src="{{asset('assets/js/doft_helpers.js')}}"></script> --}}
		<script src="{{asset('assets/js/addr_autocomplete.js')}}"></script>
		{{-- <script src="{{asset('assets/js/post-truck.js')}}"></script> --}}
		<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap-multiselect.js')}}"></script>
		<script src="{{asset('assets/js/moment.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
		<script src="{{asset('assets/js/form-inputmask.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap-tagsinput.min.js')}}"></script>
	</div>
	<!-- /page container -->
@yield('scripts')
</body>
</html>
