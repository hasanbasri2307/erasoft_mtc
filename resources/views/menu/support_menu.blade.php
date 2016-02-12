<ul class="nav nav-list">
					<li @if(Route::is('dashboard')) class="active" @endif>
						<a href="{{ url('dashboard') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li @if(Route::is('software') || Route::is('software.show') || Route::is('software.create') || Route::is('software.edit') || Route::is('bugs') || Route::is('bugs.show') || Route::is('bugs.create') || Route::is('bugs.edit')) class="active open" @endif>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Software & Bugs
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li @if(Route::is('software') || Route::is('software.show') || Route::is('software.create') || Route::is('software.edit')) class="active" @endif>
								<a href="{{ url('software') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Software
								</a>

								<b class="arrow"></b>
							</li>

							<li @if(Route::is('bugs') || Route::is('bugs.show') || Route::is('bugs.create') || Route::is('bugs.edit')) class="active" @endif>
								<a href="{{ url('bugs') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Bugs
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li @if(Route::is('tiket') || Route::is('tiket.create') || Route::is('tiket.edit') || Route::is('tiket.show')) class="active" @endif >
				        <a href="{{ route('tiket') }}">
				            <i class="menu-icon glyphicon glyphicon-pencil"></i>
				            <span class="menu-text"> Tiket </span>
				        </a>

				        <b class="arrow"></b>
				    </li>
				    <li @if(Route::is('action.maintenance') || Route::is('action.maintenance.create') || Route::is('action.maintenance.edit') || Route::is('action.maintenance.show')) class="active" @endif >
				        <a href="{{ route('action.maintenance') }}">
				            <i class="menu-icon fa fa-list-alt"></i>
				            <span class="menu-text"> Act. Maintenance </span>
				        </a>

				        <b class="arrow"></b>
				    </li>
					<li @if(Route::is('rencana.kunjungan') || Route::is('rencana.kunjungan.show') || Route::is('rencana.kunjungan.create') || Route::is('rencana.kunjungan.edit') || Route::is('server.maintenance') || Route::is('server.maintenance.show') || Route::is('server.maintenance.create') || Route::is('server.maintenance.edit')) class="active open" @endif>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Maintenance </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li @if(Route::is('rencana.kunjungan') || Route::is('rencana.kunjungan.show') || Route::is('rencana.kunjungan.create') || Route::is('rencana.kunjungan.edit')) class="active" @endif>
								<a href="{{ url('rencana-kunjungan') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Rencana Kunjungan
								</a>

								<b class="arrow"></b>
							</li>

							<li @if(Route::is('server.maintenance') || Route::is('server.maintenance.show') || Route::is('server.maintenance.create') || Route::is('server.maintenance.edit')) class="active" @endif>
								<a href="{{ url('server-maintenance') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Server Maintenance
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Laporan </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="profile.html">
									<i class="menu-icon fa fa-caret-right"></i>
									User Profile
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Inbox
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="pricing.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Pricing Tables
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="invoice.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Invoice
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="timeline.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Timeline
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="email.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Email Templates
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="login.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Login &amp; Register
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Other Pages

								<!-- #section:basics/sidebar.layout.badge -->
								<span class="badge badge-primary">5</span>

								<!-- /section:basics/sidebar.layout.badge -->
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="faq.html">
									<i class="menu-icon fa fa-caret-right"></i>
									FAQ
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-404.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 404
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-500.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 500
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="grid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Grid
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="blank.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Blank Page
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->