@extends('frontend.layout.app')
@section('content')   
<!-- Career Section -->
    <div class="container py-5">
      <!-- Title Section -->
      <div class="text-center mb-5">
        <p class="text-uppercase text-danger fw-semibold">Career
          Opportunities</p>
        <h2 class="fw-bold display-6">Current Openings</h2>
      </div>

      <!-- Job Cards -->
      <div class="row">
        <!-- Job Card 1 -->
        @foreach($data as $row)
        <div class="col-md-6 col-lg-3 mb-4" data-aos="flip-left"
          data-aos-duration="1500">
          <div
            class="card shadow-sm border-0 rounded-4 overflow-hidden h-100 position-relative">
            <div class="card-body p-4">
              <!-- Job Title -->
              <div style="height: 1cm;">
                <h5 class="card-title fw-semibold mb-3" style="text-overflow:ellipsis;   ">{{$row->title}}</h5>
              </div>

              <div class="my-3">
                <p
                  class="small my-3  d-flex align-items-center gap-2">
                  <img src="{{ url('/') }}/public/assets/images/map.png" alt="km"
                    style="width: 15px;"> {{ $row->location }} (Site)
                </p>
                <p
                  class="small my-3  d-flex align-items-center gap-2">
                  <img src="{{ url('/') }}/public/assets/images/d.png" alt="km"
                    style="width: 18px;"> {{$row->job_type}}
                </p>
                <p
                  class="small my-3  d-flex align-items-center gap-2">
                  <img src="{{ url('/') }}/public/assets/images/exp.png" alt="km"
                    style="width: 18px;"> {{$row->experience }} Years of experience
                </p>
                <p
                  class="small my-3  d-flex align-items-center gap-2">
                  <img src="{{ url('/') }}/public/assets/images/users.png" alt="km"
                    style="width: 18px;"> {{$row->seats }} Positions
                </p>
              </div>

              <!-- Apply Button -->
              <a href="{{ route('apply.for.job', $row->id) }}" class="text-decoration-none">
                <button
                  class="btn btn-danger w-100 d-flex align-items-center justify-content-center fw-normal apply-btn">
                  Apply
                  <i class="fa fa-arrow-right ms-2"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
        @endforeach
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
    <!-- Career Section End -->
<script type="text/javascript"></script>
@endsection
