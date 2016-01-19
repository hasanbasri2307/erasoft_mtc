<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Erasoft Maintenance System - @yield("title")</title>
		

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		@yield("meta")

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}" />
		

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
		@yield("css_script")

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('assets/js/ace-extra.js') }}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Erasoft
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>
				
				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifikasi
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{ asset('assets/images/icon-user-default.png') }}" alt="{{ Auth::user()->nama }}" />
								<span class="user-info">
									<small>Selamat Datang,</small>
									{{ Auth::user()->nama }}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a href="{{ route('user.profile') }}">
										<i class="ace-icon fa fa-user"></i>
										Profil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{ route('logout') }}">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			
			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive">

				@yield("sidebar_menu")

			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						
						@yield("breadcrumbs")

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					@yield("content")
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">PT Erasoft</span>
							Maintenance Application &copy; {{ date("Y") }}
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.js') }}'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.js') }}'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('assets/js/bootstrap.js') }}"></script>

		<!-- page specific plugin scripts -->
		@yield("js_script")
		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="{{ asset('assets/js/jquery-ui.custom.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.ui.touch-punch.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.easypiechart.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.sparkline.js') }}"></script>
		<script src="{{ asset('assets/js/flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('assets/js/flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('assets/js/flot/jquery.flot.resize.js') }}"></script>

		<!-- ace scripts -->
		<script src="{{ asset('assets/js/ace/elements.scroller.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.colorpicker.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.fileinput.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.typeahead.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.wysiwyg.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.spinner.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.treeview.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.wizard.js') }}"></script>
		<script src="{{ asset('assets/js/ace/elements.aside.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.ajax-content.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.touch-drag.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.sidebar.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.sidebar-scroll-1.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.submenu-hover.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.widget-box.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.settings.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.settings-rtl.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.settings-skin.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.widget-on-reload.js') }}"></script>
		<script src="{{ asset('assets/js/ace/ace.searchbox-autocomplete.js') }}"></script>
		

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

			
			})
		</script>
	</body>
</html>
