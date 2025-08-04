@extends('frontend.layout.app')
@section('content')
  <!-- Section -->
    <div class="container-fluid px-md-5 py-md-5 py-2">
      <div class="events-container">

        <!-- Section Title -->
        <div class="mb-md-5 mb-3 text-center" data-aos="zoom-in"
          data-aos-duration="2000">
          <h6 class="section-subtitle">Featured Projects</h6>
          <h2 class="fw-semibold">Our Landmark Projects</h2>
        </div>

        <!-- Tabs -->
       
        <div class=" d-sm-flex align-items-center justify-content-between">
          <div>
          	
            <ul class="nav nav-pills mb-5 gap-4 justify-content-start"
              id="projectTabs"
              role="tablist">
               @foreach($category as $cat)
              <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-5 active" id="tab1-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#tab1" type="button" role="tab"
                  aria-controls="tab1" aria-selected="true">
                  Roads & Highways
                </button>
              </li>
              
               @endforeach
            </ul>
            
          </div>
          <div>
            <button
              class="btn rounded mb-5 px-3 d-flex align-items-center gap-3"
              type="button" style="border:1px solid rgba(221, 221, 221, 1)">
              Completed Projects <i class="fa fa-angle-down mt-2"></i>
            </button> 
          </div>
        </div>
       

        <!-- Tab Content -->
        <div class="tab-content" id="projectTabsContent">
      
          <!-- tab1 Projects Tab -->
          <div class="tab-pane fade show active" id="tab1" role="tabpanel"
            aria-labelledby="tab1-tab">
            <div class="row gy-4">
            @foreach($data as $row)
              <!-- Project Card -->
              <div class="col-md-3 col-sm-6" data-aos="flip-left"
                data-aos-duration="1500">
                <div class="position-relative">
                	@foreach(DB::table('project_images')->where('project_id', $row->id)->get() as $img) 
					<div>  
					<img src="{{url('/')}}/public/projects/{{$img->image}}" alt="highway"
                    class="event-image rounded-4"
                    style="width: 100%; height: 250px; object-fit: cover;">
					</div>
					@endforeach
                 
                </div>
                <div class="event-info p-3">
                  <span class="px-2 rounded py-1 fw-semibold"
                    style="color: rgba(5, 184, 118, 1); background-color: rgba(5, 184, 118, 0.234);">
                   {{$row->is_completed}}
                	</span>
                  <h4 class="fw-bold mt-2">{{$row->title}}</h4>
                  <div class="mt-2">

                    <p
                      class="small my-3 text-muted d-flex align-items-center gap-2">
                      <img src="{{url('/')}}/public/assets/images/map.png" alt="km"
                        style="width: 15px;"> {{$row->location}}
                    </p>
                    <p
                      class="small my-3 text-muted d-flex align-items-center gap-2">
                      <img src="{{url('/')}}/public/assets/images/scale.png" alt="km"
                        style="width: 15px;"> 75 KM
                    </p>
                    <p
                      class="small my-3 text-muted d-flex align-items-center gap-2">
                      <img src="{{url('/')}}/public/assets/images/calendar.png" alt="km"
                        style="width: 15px;"> {{$row->duration}}
                    </p>
                  </div>
                  <div>
                    <a href="{{ route('project.details', $row->id) }}"
                      class="event-link d-flex justify-content-end text-danger fw-bold">
                      Know more →
                    </a>
                  </div>
                </div>
              </div>
              <!-- Project Card Ends -->
               @endforeach  
            </div>
          </div>
       
           

        </div>

         <!-- pagination  -->
         <div id="custom-pagination" class="mt-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-between align-items-center">
              <!-- Previous Button -->
              <li class="page-item">
                <a class="page-link prev-link shadow-none" href="#"
                  aria-label="Previous">
                  &larr; Previous
                </a>
              </li>

              <div class="d-flex align-items-center">
                <li class="page-item  active"><a class="page-link"
                    href="#">1</a></li>
                <li class="page-item "><a class="page-link shadow-none"
                    href="#">2</a></li>
                <li class="page-item "><a class="page-link shadow-none"
                    href="#">3</a></li>
                <li class="page-item  disabled"><a class="page-link shadow-none"
                    href="#">...</a></li>
                <li class="page-item "><a class="page-link shadow-none"
                    href="#">8</a></li>
                <li class="page-item "><a class="page-link shadow-none"
                    href="#">9</a></li>
                <li class="page-item "><a class="page-link shadow-none"
                    href="#">10</a></li>
              </div>

              <!-- Next Button -->
              <li class="page-item">
                <a class="page-link next-link shadow-none" href="#"
                  aria-label="Next">
                  Next &rarr;
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- pagination End -->
      </div>
    </div>
    <!-- Landmark Projects Section End -->

@endsection
  