@extends('frontend.layout.app')
@section('content')   
    <!-- Events Section -->
    <div class="container-fluid px-md-5 py-md-5 py-2">
      <div class="events-container">
        <!-- Heading -->
        <div class="mb-md-5 mb-3 text-center" data-aos="zoom-in"
          data-aos-duration="2000">
          <h6 class="section-subtitle">NEWS & UPDATES</h6>
          <h2>Stay updated with our latest achievements & events.</h2>
        </div>

        <!-- Events Cards -->
        <div class="row gy-4">
          <!-- Event Card 1 -->
          @foreach($data as $event)
          <div class="col-md-3" data-aos="flip-left"
            data-aos-duration="1500">
            @php
            $image = ($event->image_url) ? "events/$event->image_url" : "error.jpg";
            @endphp 
              <img src="{{ url('/') }}/public/{{$image}}" class="event-image rounded-top-2" />   
            <div class="event-info">
              <p class="event-date">
                @php 
                $originalDate = $event->event_date;
                $formattedDate = date('d M Y', strtotime($originalDate));
                echo $formattedDate;
                @endphp
              </p>
              <h6>{{$event->title}}</h6>
              <div style="height: 3cm ; overflow: hidden;  text-overflow: ellipsis;  ">
                <?php echo printf("%s", $event->description); ?>
               
              </div>
              <a href="{{ route('event.details', $event->id) }}"
                class="event-link d-flex justify-content-end">
                Know more →
              </a>
            </div>
          </div>
          @endforeach
         
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
    <!-- Events Section End -->

@endsection