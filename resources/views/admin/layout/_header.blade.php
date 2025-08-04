
<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="{{ url('/') }}/public/admin/assets/img/logo.jpg" alt="Logo">
					</a>
					<a href="index.html" class="logo logo-small">
						<img src="{{ url('/') }}/public/admin/assets/img/logo.jpg" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				 
				 
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				 
				 
				<ul class="nav user-menu">
					<li class="nav-item dropdown noti-dropdown"> 
						<a href="{{ url('/') }}" class="  nav-link  text-info"  target="_blank">

							 Visit Website
						</a> 				
					</li>
					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
					@if(Auth::guard('web')->check())
						<a href="{{ route('admin.logout') }}" class="dropdown-toggle nav-link font-weight-bold text-danger text-uppercase" >
							 Logout
						</a>
					@endif									
					</li>
					 
				</ul>
				 
            </div>
			<!-- /Header -->