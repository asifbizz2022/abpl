@extends('frontend.layout.app')
@section('content')
  <!-- Section -->
    <div class="container-fluid px-md-5 py-md-5 py-2">
      <div class="events-container">

        <!-- Section Title -->
        <div class="mb-md-5 mb-3 text-center" data-aos="zoom-in"
          data-aos-duration="2000">
          <h6 class="section-subtitle"> </h6>
          <h2 class="fw-semibold">Our Gallery</h2>
        </div>

        <!-- Tabs -->
       
        <div class=" d-sm-flex align-items-center justify-content-center">
          <div>
        
            <ul class="nav nav-pills mb-5 gap-4 justify-content-center"
              id="projectTabs"
              role="tablist">
              @if(count(DB::table('project_categories')->get()))

              @foreach(DB::table('project_categories')->get() as $cat)
                <li class="nav-item" role="presentation">
                  <form method="post" action="{{ route('photo.gallery') }}">@csrf
                    <input type="hidden" name="id" value="{{ $cat->name }}">
                    <button type="submit" class="nav-link rounded-pill px-5 {{ $name == $cat->name ? 'active': '' }} text-uppercase" id="tab1-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#tab1" type="submit" role="tab"
                      aria-controls="tab1" aria-selected="true">
                      {{$cat->name}}
                    </button>
                  </form> 
                </li>
              @endforeach
               <form method="post" action="{{ route('photo.gallery') }}">@csrf
                    <input type="hidden" name="id" value="all">
                    <button type="submit" class="nav-link rounded-pill px-5 {{ $name == 'all' ? 'active': '' }} text-uppercase" id="tab1-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#tab1" type="submit" role="tab"
                      aria-controls="tab1" aria-selected="true">
                      Get All Photos
                    </button>
                  </form>
              @else
            <!--   <li class="nav-item" role="presentation">
                  
                  
                    <button type="submit" class="nav-link rounded-pill px-5 " id="tab1-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#tab1" type="submit" role="tab"
                      aria-controls="tab1" aria-selected="true">
                      
                    </button>
                  
                </li> -->
              @endif
             
            </ul>
            
          </div>
         <!--  <div>
            <button
              class="btn rounded mb-5 px-3 d-flex align-items-center gap-3"
              type="button" style="border:1px solid rgba(221, 221, 221, 1)">
              Completed Projects <i class="fa fa-angle-down mt-2"></i>
            </button> 
          </div> -->
        </div>
       

        <!-- Tab Content -->
        <div class="tab-content" id="projectTabsContent">
      
          <!-- tab1 Projects Tab -->
          <div class="tab-pane fade show active" id="tab1" role="tabpanel"
            aria-labelledby="tab1-tab">
            <div class="row gy-4">
              @if(count($data))
               @foreach($data as $row)
              <!-- Project Card -->
              <div class="col-md-3 col-sm-6" data-aos="flip-left"
                data-aos-duration="1500">
                <div class="position-relative">
                  @php

                  $imgpath = ($row->image) ?  "gallery/$row->image" : "error.jpg";
                  @endphp 
                  <div>  
                  <img src="{{ url('/') }}/public/{{$imgpath}}" alt="highway" class="event-image rounded-4" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                   
                </div>
             
              </div>

              <!-- Project Card Ends -->
              @endforeach  
              @else
              <div class="text-center p-5      rounded">
                <img src="{{ url('/') }}/public/error.jpg">
                  <br>
                  <small>No Image Uploaded</small>
              </div>
              @endif
           
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
                  
                </a>
              </li>

              <div class="d-flex align-items-center">
              {{$data->links()}}
              </div>

              <!-- Next Button -->
              <li class="page-item">
                <a class="page-link next-link shadow-none" href="#"
                  aria-label="Next">
                  
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
  