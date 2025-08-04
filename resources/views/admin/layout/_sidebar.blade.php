<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title">
					<span class="text-warning">Main</span>
				</li>
				<li class="{{ request()->routeIs('home') ? 'active' : ''}}">
					<a href="{{ route('admin.home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
					<li class="{{ request()->routeIs('banners') || request()->routeIs('add.banner')  ? 'active' : ''}}">
					<a href="{{ route('banners') }}"><i class="fe fe-document"></i> <span>Banners</span></a>
				</li>
				<li class="{{ request()->routeIs('project.category') || request()->routeIs('add.category') ? 'active' : ''}}">
					<a href="{{ route('project.category') }}"><i class="fe fe-document"></i> <span>Category</span></a>
				</li>
				<li class="{{ request()->routeIs('project') || request()->routeIs('add.project') ? 'active' : ''}}">
					<a href="{{ route('project') }}"><i class="fe fe-document"></i> <span>Projects</span></a>
				</li>
				<li class="{{ request()->routeIs('about.us') || request()->routeIs('add.about.us')  ? 'active' : ''}}">
					<a href="{{ route('about.us') }}"><i class="fe fe-document"></i> <span>About Us</span></a>
				</li>
				<!-- <li class="submenu {{ request()->routeIs('project') || request()->routeIs('project.category') ? 'subdrop' : ''}}" >

					<a href="" class=""><i class="fe fe-document"></i> <span> Projects </span> <span class="menu-arrow"></span></a>
					<ul class="{{ request()->routeIs('project') || request()->routeIs('project.category') || request()->routeIs('add.category') || request()->routeIs('add.project') ? 'd-block' : ''}}">

						<li class="{{ request()->routeIs('project.category') || request()->routeIs('add.category') ? 'active' : ''}}"><a href="{{ route('project.category') }}">Categories</a></li>
						<li class="{{ request()->routeIs('project') || request()->routeIs('add.project') ? 'active' : ''}}"><a href="{{ route('project') }}">Projects</a></li>
						 
					</ul>
				</li> -->
				<li class="submenu {{ @$page =='jobs' ? 'subdrop' : ''}}">
					<a href="#"><i class="fe fe-document"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
					<ul class="{{ request()->routeIs('jobs') || request()->routeIs('job.application') ? 'd-block' : ''}}">
						<li class="{{ request()->routeIs('jobs')   ? 'active' : ''}}" ><a href="{{route('jobs')}}">Jobs List</a></li>
						<li class="{{ request()->routeIs('job.application') ? 'active' : ''}}" ><a href="{{route('job.application')}}">Job Application</a></li>
						 
					</ul>
				</li>
				<!-- <li class="submenu {{ request()->routeIs('mission') ||  request()->routeIs('add.mission') || request()->routeIs('vision') ||  request()->routeIs('vision') || request()->routeIs('history') ||  request()->routeIs('add.history') ? 'subdrop' : ''}}">
					<a href="#"><i class="fe fe-document"></i> <span>Company Details</span> <span class="menu-arrow"></span></a>
					<ul class="{{ request()->routeIs('mission') ||  request()->routeIs('add.mission') || request()->routeIs('vision') ||  request()->routeIs('add.vision') || request()->routeIs('history') ||  request()->routeIs('add.history') ? 'd-block' : ''}}">
						<li class="{{ request()->routeIs('mission') || request()->routeIs('add.mission') ? 'active' : ''}}"><a href="{{route('mission')}}">Mission</a></li>
						 
						 
					</ul>
				</li> -->
				<li class="{{ request()->routeIs('awards') || request()->routeIs('add.award')  ? 'active' : ''}}">
					<a href="{{ route('awards') }}"><i class="fe fe-document"></i> <span>Awards</span></a>
				</li>
				<li class="{{ request()->routeIs('events') || request()->routeIs('add.event') ? 'active' : ''}}">
					<a href="{{ route('events') }}"><i class="fe fe-document"></i> <span>Events</span></a>
				</li>

				<li class="{{ request()->routeIs('vision') || request()->routeIs('add.vision') ? 'active' : ''}}">
					<a href="{{ route('vision') }}"><i class="fe fe-document"></i> <span>Vision</span></a>
				</li>
				<li class="{{ request()->routeIs('mission') || request()->routeIs('add.mission') ? 'active' : ''}}">
					<a href="{{ route('mission') }}"><i class="fe fe-document"></i> <span>Mission</span></a>
				</li>
				<li class="{{ request()->routeIs('story') || request()->routeIs('add.story') ? 'active' : ''}}">
					<a href="{{ route('story') }}"><i class="fe fe-document"></i> <span>Story</span></a>
				</li>
				<li class="{{ request()->routeIs('director') || request()->routeIs('add.director') ? 'active' : ''}}">
					<a href="{{ route('director') }}"><i class="fe fe-document"></i> <span>Director</span></a>
				</li>

				<li class="{{ request()->routeIs('newsletter') ? 'active' : ''}}">
					<a href="{{ route('newsletter') }}"><i class="fe fe-document"></i> <span>Subscription</span></a>
				</li>
				
				
				<li class="{{ request()->routeIs('contact.us')    ? 'active' : ''}}">
					<a href="{{ route('contact.us') }}"><i class="fe fe-document"></i> <span>Feedback</span></a>
				</li>
				<li class="{{ request()->routeIs('gallery')  || request()->routeIs('add.gallery')   ? 'active' : ''}}">
					<a href="{{ route('gallery') }}"><i class="fe fe-document"></i> <span>Gallery</span></a>
				</li>
				<li class="{{ request()->routeIs('seo')    ? 'active' : ''}}">
					<a href="{{ route('seo') }}"><i class="fe fe-document"></i> <span>Seo</span></a>
				</li>
				    
				<li class="mt-5">
					<a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out " class="text-danger text-sm"></i> <span>logout</span></a>
				</li> 
			</ul>
		</div>
		 
    </div>
</div>
