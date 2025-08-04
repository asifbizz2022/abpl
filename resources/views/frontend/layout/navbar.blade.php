 <nav class="navbar fixed-top navbar-expand-lg bg-white border-bottom">
        <div class="container-fluid px-md-5">
          <a href="{{ url('/') }}" class="navbar-brand" href="/">
            <img src="{{ url('/') }}/public/assets/images/logo.png" alt="ABPL Logo"
              width="100" />
          </a>
          <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <!-- Projects Dropdown -->
              <!-- <li class="nav-item dropdown"
                id="projectsDropdownContainer">
                <a class="nav-link dropdown-toggle" href="#"
                  id="projectsDropdown" role="button">
                  Projects
                </a>
                <ul class="dropdown-menu"
                  id="custom-projects-dropdown"
                  aria-labelledby="projectsDropdown">
                  <li>
                    <div class="dropdown-item">
                      <h6>Road & Highways</h6>
                      <p>Delivering smooth, durable highways
                        and roads that connect cities,
                        industries & communities.</p>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-item">
                      <h6>Bridges</h6>
                      <p>Constructing reliable bridges that
                        enhance connectivity and withstand
                        the test of time.</p>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-item">
                      <h6>Tolls</h6>
                      <p>Developing advanced toll plazas with
                        efficient collection systems for
                        faster travel.</p>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-item">
                      <h6>Steel & Mining</h6>
                      <p>Providing essential infrastructure to
                        support mining operations and steel
                        plant growth.</p>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-item">
                      <h6>Buildings</h6>
                      <p>Creating industrial, agricultural &
                        commercial buildings built to
                        perform and last.</p>
                    </div>
                  </li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.home') || request()->routeIs('home') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('front.home')}}">Home</a></li>
  				<li class="nav-item"><a class="nav-link {{ request()->routeIs('project.details') || request()->routeIs('category.list') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('project.list')}}">Projects</a></li>
              <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.event') || request()->routeIs('event.details') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('front.event')}}">Events</a></li>
              <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.career') || request()->routeIs('apply.*') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('front.career')}}">Career</a></li>
              <li class="nav-item"><a class=" nav-link {{ request()->routeIs('front.about') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('front.about')}}">About Us</a></li>
              <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.contactus') ? 'text-danger fw-bold active': '' }}"
                  href="{{route('front.contactus')}}">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="mt-5 pt-5"></div>