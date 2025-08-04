@extends('frontend.layout.app')
@section('content')  

    <!-- --------------- -->
    @php 
    $ban = DB::table('aboutus')->where('type', 'ABOUTUS')->first()
    @endphp
    <br>
    <br>
    <br>
    
    <div class="container-fluid px-md-5 py-md-4 py-3">
      <div
        class="about-counter-container" data-aos="flip-up"
        data-aos-duration="1500"
        style="
                background-image: url('{{ url("/") }}/public/aboutus/{{$ban->banner}}');
                background-size: cover;
                background-position: center;
                position: relative;
                padding: 4rem 0;
                text-align: center;
                color: #fff;
                border-radius: 15px;
              ">
        <!-- Overlay for dark effect -->
        <div
          class="overlay"
          style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  background-color: rgba(0, 0, 0, 0.6);
                  border-radius: 15px;
                "></div>

        <!-- Content Section -->
        <div style="position: relative; z-index: 2;">
          <h5 class="fw-normal" style="font-size: 1rem; letter-spacing: 1px;">
            {{$ban->title}}
          </h5>
          <h2 style="font-size: 2rem; margin-bottom: 1rem;">
            
            {{$ban->subtitle}}
          </h2>

          <!-- Counter Section -->
          <div
            class="counter-section"
            style="
                    display: flex;
                    justify-content: center;
                    gap: 2rem;
                  ">
            <!-- Counter Box 1 -->
            <div class="counter-box">
              <h3 style="font-size: 2rem; font-weight: bold;">
                {{$ban->experience}}+
              </h3>
              <p>Years of Experience</p>
            </div>

            <!-- Counter Box 2 -->
            <div class="counter-box">
              <h3 style="font-size: 2rem; font-weight: bold;">
               {{$ban->completed}}+
              </h3>
              <p>Projects Completed</p>
            </div>

            <!-- Counter Box 3 -->
            <div class="counter-box">
              <h3 style="font-size: 2rem; font-weight: bold;">
               {{$ban->ongoing}} +
              </h3>
              <p>Ongoing Projects</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- --------------- End -->
 
    <!-- -------------- -->
    <!-- Our Story -->
    @foreach(DB::table('aboutus')->where('type', 'STORY')->get() as $row)
    <div class="container-fluid px-md-5 py-md-4 py-2">
      <div class="row">
        <div class="col-md-4" data-aos="fade-right"
          data-aos-duration="1500">
          <h6 class="section-subtitle">{{$row->subtitle}}</h6>
          <h2 class="section-title">{{$row->title}}</h2>
        </div>
        <div class="col-md-8" data-aos="fade-left"
          data-aos-duration="1500"> 
          <?php printf("%s", $row->message ) ?>
        </div>
      </div>
    </div>
 <!-- Our Story End -->
@php $i = 0; @endphp

@foreach(DB::table('aboutus')->where('type', 'DIRECTOR')->get() as $row)
    @php
        $isEven = $i % 2 == 0; // Even index → Image Left, Odd index → Image Right
        $flexDirection = $isEven ? 'row' : 'row-reverse'; // Bootstrap ke flex classes
    @endphp

    <!-- Director Section -->
    <div class="container-fluid px-md-5 py-md-4 py-2">
        <div class="text-white rounded-4 p-4" style="background: rgba(7, 35, 102, 1);">
            <div class="row d-flex align-items-center flex-md-{{ $flexDirection }}">
                
                <!-- Image Section -->
                <div class="col-md-3" data-aos="zoom-in" data-aos-duration="1500">
                    <img src="{{ url('/') }}/public/director/{{$row->image}}" 
                        alt="Director" class="img-fluid rounded-3" width="500px" />
                </div>

                <!-- Text Section -->
                <div class="col-md-9" data-aos="fade-left" data-aos-duration="1500">
                    <div class="mb-4">
                        <h6 class="section-subtitle text-uppercase">{{ $row->subtitle }}</h6>
                        <h2 class="section-title">{{ $row->title }}</h2>
                    </div>
                    <div class="mb-5">
                        {!! $row->message !!}
                    </div>
                   <style>
                      .social-icon {
                          display: flex;
                          /* justify-content: center; */
                          gap: 20px;
                      }

                      .social-icon a {
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          width: 50px;
                          height: 50px;
                          background-color: white;
                          border-radius: 50%;
                          text-decoration: none;
                          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                      }

                      .social-icon a i {
                          font-size: 24px;
                          color: #0A1931; /* Dark Blue */
                      }

                      .social-icon a:hover i {
                          color: #021025;
                      }
                  </style>

                  <div class="mt-4">
                      <div class="social-icon">
                          <a href="{{ $row->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                          <a href="{{ $row->linkedin }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                          <a href="{{ $row->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                      </div>
                  </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Director Section End -->

    @php $i++; @endphp
@endforeach

<!-- Mission Section -->
@foreach(DB::table('aboutus')->where('type', 'MISSION')->get() as $row)
    <!-- Yahan tum jo Mission ka UI chahte ho use likho -->
@endforeach

    <!-- Our Mission -->
    
    <div class="container-fluid px-md-5 py-md-4 py-2">
      <div class="row">
        <div class="col-md-4" data-aos="fade-right"
          data-aos-duration="1500">
          <h6 class="section-subtitle">{{$row->subtitle}}</h6>
          <h2 class="section-title">{{$row->title}}</h2>
        </div>
        <div class="col-md-8" data-aos="fade-left"
          data-aos-duration="1500">
          <?php printf("%s", $row->message ) ?>
        </div>
      </div>
    </div>
    @endforeach
    <!-- Our Mission End -->
     @foreach(DB::table('aboutus')->where('type', 'VISION')->get() as $row)
    <!-- Our Mission -->
    
    <div class="container-fluid px-md-5 py-md-4 py-2">
      <div class="row">
        <div class="col-md-4" data-aos="fade-right"
          data-aos-duration="1500">
          <h6 class="section-subtitle">{{$row->subtitle}}</h6>
          <h2 class="section-title">{{$row->title}}</h2>
        </div>
        <div class="col-md-8" data-aos="fade-left"
          data-aos-duration="1500">
          <?php printf("%s", $row->message ) ?>
        </div>
      </div>
    </div>
    @endforeach
    <!-- -------------- --> 
 