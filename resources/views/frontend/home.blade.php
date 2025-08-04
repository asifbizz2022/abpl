@extends('frontend.layout.app')
@section('content')
  <!-- HomeSlider -->
  <div class="p-2">
        <video width="100%" height="100%" id="myVideo" preload="metadata"
                  
                   autoplay
                   playsinline 
                     webkit-playsinline
                    loop
                   x-webkit-airplay="allow"  >
            <source src="{{ url('/')}}/public/video.mp4"  >
               
            </video> 
                <!-- <video
                  width="1500"
                  height="700"
                  src="{{ url('/')}}/public/video.mp4"
                  title="10 Second Timer"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen
                ></video>
   -->
  </div>
    <div class="container-fluid px-md-5 my-3">
        <div id="homeSlideMain" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner rounded-4">
                @foreach($banners as $b)
                <!-- ✅ Slide 1 -->
               <!--  <div class="carousel-item active position-relative" data-bs-interval="2000"
                    style="background-image: url('{{ url("/")  }}/public/banners/{{$b->banner}}'); background-size: cover; background-repeat: no-repeat;">
                    <div class="position-absolute top-0 start-0 h-100 w-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
                    <div class="carousel-caption text-start w-50" style="left: 40px; top:40px">
                        <h1 class="text-white">{{$b->title}}</h1>
                        <h5 class="text-white">{{$b->subtitle}}</h5>
                    </div>
                    <div class="carousel-caption text-start" style="left: 40px; bottom:20px">
                        <a href="{{ route('category.list') }}" class="btn btn-danger mt-5 px-5 py-2">See Our Road Projects</a>
                    </div>
                </div> -->
                @endforeach 
                
                </div>

            <!-- ✅ Progress Bar -->
           <!--  <div id="progressBarContainer">
                <div id="progressBar"></div>
            </div> -->
        </div>
      
        </div>
    <!-- HomeSlider End-->



    <!-- Slider -->
    <div id="multiCardSlider" class="container-fluid px-md-5 py-3">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h5 class="m-0">Building Tomorrow’s Infrastructure with
                Precision & Trust</h5>
                <a href="{{route('project.list')}}" class="text-decoration-none text-danger">See all
                Projects →</a>
        </div>



        <div class="multiCardSlider">
            @foreach($category as $c)
            <div class="position-relative">
                @if($c->image_url)
                 <img src="{{ url('/') }}/public/category/{{$c->image_url}}" alt="{{$c->name}}" />
                 @else 
                  <img src="{{ url('/') }}/public/error.jpg" alt="{{$c->name}}" />
                @endif
                
                <div class="position-absolute bottom-0 ms-2 mb-2 text-white">
                    <spap class="m-0 fw-semibold">{{$c->name}}</spap>
                <p class="m-0" style="font-size: 14px;">Paving Paths to Progress</p>
                </div>
            </div>
            
            @endforeach
        </div>

        <!-- Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
    </div>
    <!-- ======================== -->
    </div>

    <!-- Slider End -->

    <!-- About Section -->
    @php 
    $ban = DB::table('aboutus')->first()
    @endphp
     <!-- About Section -->
    <div class="container-fluid px-md-5 py-5">
        <div class="row align-items-center">
          <div class="col-lg-8 col-md-8 col-sm-12" data-aos="fade-right" data-aos-duration="1000">
                <p class="text-uppercase text-secondary mb-1 fw-semibold">ABOUT
                    US</p>
                <h2 class="fw-semibold">{{$ban->title}}</h2>
                <p class="text-muted text-justified  " style="text-overflow: ellipsis;">
               {{$ban->message}}
                </p>
            </div>
               <div class="col-lg-4 col-md-8 col-sm-12" data-aos="fade-left" data-aos-duration="1000">
                <div class="row text-center">
                    <div class="col-12 d-flex justify-content-end mb-5">
                        <a href="{{ route('front.about') }}" class="btn btn-outline-danger mt-3">
                            learn more about us →
                        </a>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold">{{$ban->experience}}+</h3>
                        <p class="text-muted small">Years of Experience</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold">{{$ban->completed}}+</h3>
                        <p class="text-muted small">Projects Completed</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold">{{$ban->ongoing}}+</h3>
                        <p class="text-muted small">Ongoing Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
 
    <!-- --  -->
  
   <div id="ourService" class="container-fluid px-md-5 py-4">
        <div class="row g-4">
            <div class="col-12" data-aos="fade-right" data-aos-duration="1000">
                <p class="text-uppercase text-secondary mb-1 fw-semibold">Our Services</p>
                <h2 class="fw-semibold">Across Land, Steel, and Concrete — ABPL Builds It All</h2>
            </div>

            @php $i = 0; @endphp
            @foreach($category as $c)
                @php
                    $bgColors = ['#0a2a66', '#d7261d']; // Blue & Red alternating
                    $rowIndex = floor($i / 2); // Determines row number
                    $colIndex = $i % 2; // Determines left or right column

                    // Alternating colors like the provided image
                    $bgColor = ($rowIndex % 2 == 0) ? $bgColors[$colIndex] : $bgColors[1 - $colIndex];

                    // Alignment Logic: First row (Left: Image, Right: Text), Second row (Left: Text, Right: Image)
                    $flexDirection = ($rowIndex % 2 == 0)
                        ? ($colIndex == 0 ? 'row' : 'row-reverse') // First row: (Left Image, Right Text) & (Right Image, Left Text)
                        : ($colIndex == 0 ? 'row-reverse' : 'row'); // Second row: (Left Text, Right Image) & (Right Text, Left Image)

                    // Limit description to 15 words
                    $words = explode(' ', strip_tags($c->description));
                    $shortDescription = implode(' ', array_slice($words, 0, 15)) . (count($words) > 15 ? '...' : '');
                @endphp

                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <div style="display: flex; align-items: center; justify-content: space-between; 
                                background-color: {{ $bgColor }}; color: white; border-radius: 15px; 
                                overflow: hidden; flex-direction: {{ $flexDirection }}; height: auto;">
                        

                        <!-- Image Section -->
                        @if($c->image_url)
                        <img src="{{ url('/') }}/public/category/{{$c->image_url}}"  alt="{{ $c->name }}" 
                            style="width: 35%; height: 100%; object-fit: cover; border-radius: 0px;" />
                        @else 
                        <img src="{{ url('/') }}/public/error.jpg" alt="{{$c->name}}"   style="width: 35%; height: 100%; object-fit: cover; border-radius: 0px;" />
                        @endif

                        <!-- Text Section -->
                        <div style="padding: 20px;">
                            <h4 style="color:#FFFFFF; font-size:24px; font-weight: 600;">{{ $c->name }}</h4>
                            <p style="font-size: 18px;">{!! $shortDescription !!}</p>
                        </div>
                    </div>
                </div>

                @php $i++; @endphp
            @endforeach
           
        </div>
    </div>
    <!-- -- End -->

    <!-- Landmark Projects Section -->
    <div id="landMark" class="container-fluid px-md-5 py-5">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-3" data-aos="fade-right" data-aos-duration="1000">
                <p class="text-uppercase text-secondary fw-bold mb-2">
                    Featured Projects
                </p>
                <h2 class="fw-semibold mb-4">Our Landmark Projects</h2>
                <div class="d-flex flex-column gap-2">
                    @foreach($category as $c)
                    <a href="{{ route('front.home', $c->id) }}" class="rounded-pill w-75 btn {{ ($id == $c->id ) ? 'btn-primary active' : 'btn-light'}} ">{{$c->name}}</a>
                    @endforeach
                    
                </div>
                <div class="my-4">
                    <a href="{{ route('project.details') }}">
                        <button class="btn btn-danger w-75">Explore all projects
                            →</button>
                    </a>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-9" data-aos="fade-left" data-aos-duration="1000">
                <div class="row">
                    @foreach($projects as $p)
                    <!-- Project Card 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            @foreach(DB::table('project_images')->where('project_id', $p->id)->get() as $img) 
                            
                            @if($img->image)
                            <img src="{{ url('/') }}/public/projects/{{$img->image}}" alt="Project" class="card-img-top" />
                            @else
                            <img src="{{ url('/') }}/public/error.jpg" alt="Project" class="card-img-top" />
                            @endif
                            <?php break; ?>
                            @endforeach
                            <div class="card-body">
                               @if($p->is_completed == 'completed')
                               <span class="badge mb-2 bg-success">{{$p->is_completed}}</span>
                               @elseif($p->is_completed == 'not completed') 
                               <span class="badge mb-2 bg-danger">{{$p->is_completed}}</span>
                               @endif
                                
                                <h5 class="fw-bold">{{$p->title}}</h5>

                                    <p
                                    class="small my-3 text-muted d-flex align-items-center gap-2">
                                    <img src="{{ url('/') }}/public/assets/images/map.png" alt="km"
                                      style="width: 15px;"> {{$p->location}}
                                  </p>
                                  <p
                                    class="small my-3 text-muted d-flex align-items-center gap-2">
                                    <img src="{{ url('/') }}/public/assets/images/scale.png" alt="km"
                                      style="width: 15px;"> {{$p->type}}
                                  </p>
                                  <p
                                    class="small my-3 text-muted d-flex align-items-center gap-2">
                                    <img src="{{ url('/') }}/public/assets/images/calendar.png" alt="km"
                                      style="width: 15px;"> {{$p->duration}}
                                  </p>
                                <a href="{{ route('project.details', $p->id) }}" class="text-danger fw-bold">Know more
                                    →</a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Landmark Projects Section End --> 
    <!-- Awards Section -->
    <div class="container-fluid px-md-5 py-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="rounded text-white py-5" style="background-color: #0a2a66 !important;">
            <div class="row g-4 justify-content-center">
                <!-- Award 1 -->
                @foreach($awards as $a)
                <div class="col-md-3 text-center" data-aos="zoom-in" data-aos-duration="2000" style="cursor:pointer;"  onclick="window.location.href='{{ url("award/details") }}/{{$a->id}}'">
                    <img src="{{ url('/') }}/public/assets/images/awards.png" alt="Excellence in Highway Construction" class="mb-3"
                        style="width: 150px; height: 150px; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.2));" />
                    <h6 class="fw-bold">{{$a->title}}</h6>
                    <p class="mb-0 text-center mx-auto" style="font-size: 0.875rem;
                        color: #ddd; height: 1cm ; width: 3cm; overflow: hidden;  text-overflow: ellipsis;">
                        
                    </p>
                </div>
                @endforeach 
                </div>
            </div>
    </div>
    <!-- Awards Section End --> 
    <!-- Events Section -->
    <div class="container-fluid px-md-5 py-md-5 py-2">
        <div class="events-container">
            <!-- Heading -->
            <div class="mb-md-5 mb-3 text-center" data-aos="zoom-in" data-aos-duration="2000">
                <h6 class="section-subtitle">NEWS & UPDATES</h6>
                <h2 class="fw-semibold">Stay updated with our latest achievements & events.</h2>
            </div> 
            <!-- Events Cards -->
            <div class="row gy-4">
                   @foreach($events as $event)
                      <div class="col-md-3" data-aos="flip-left"
                        data-aos-duration="1500">
                        @if($event->image_url)
                           <img
                          src="{{ url('/') }}/public/events/{{$event->image_url}}"
                          alt="event"
                          class="event-image rounded-top-2" />
                        @else
                           <img
                          src="{{ url('/') }}/public/error.jpg"
                          alt="event"
                          class="event-image rounded-top-2" />
                        @endif
                     
                        <div class="event-info">
                          <p class="event-date">
                            @php 
                            $originalDate = $event->event_date;
                            $formattedDate = date('d M Y', strtotime($originalDate));
                            echo $formattedDate;
                            @endphp
                          </p>
                          <h6>{{$event->title}}</h6>
                          <p style="height: 3cm ; overflow: hidden;  text-overflow: ellipsis;">
                            <?php echo printf("%s", $event->description); ?>
                           
                          </p>
                          <a href="{{ route('front.event') }}"
                            class="event-link d-flex justify-content-end">
                            Know more →
                          </a>
                        </div>
                      </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!-- Events Section End -->

@endsection
@section('js')
<script type="text/javascript">
    
$(document).ready(function(){
    console.log(document.getElementById('myVideo'));
      document.getElementById("myVideo").play();
     
});

</script>
@endsection