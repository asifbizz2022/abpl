@extends('frontend.layout.app')
@section('content')   
 
    <!-- Navbar End -->
  
   <div class="container-fluid px-md-5 mt-5">
    
      <div class="row">
        <div class="col-md-5">
          @foreach(DB::table('project_images')->where('project_id', $data->id)->take(1)->get() as $a)
          <img src="{{ url('/') }}/public/projects/{{$a->image}}" class="img-fluid rounded"
            alt="Main Road Image" style="width: 100%;">
           
          @endforeach
          <div class="row mt-3">
             @foreach(DB::table('project_images')->where('project_id', $data->id)->take(3)->get() as $b)
              <div class="col-4">
                <img src="{{ url('/') }}/public/projects/{{$b->image}}" class="img-fluid rounded"
                  alt="Thumbnail 1" height="300" width="300" style="width: fit-content; height: 100%;">
              </div> 
            @endforeach
          </div>
        </div>
        <div class="col-md-7">
          <h6 class="text-uppercase text-muted">Project Details</h6>
          <h1>{{$data->title}}</h1>
          <p class="m-0 d-flex align-items-center gap-2">
             
            <img src="{{ url('/') }}/public/assets/images/map.png" alt="map" style="width: 16px;">
          
            {{$data->location}}</p>
          <hr>
          <div class="row mt-4">
            <div class="col-2">
              <strong>{{$data->type}}</strong>
              <p class="text-muted">Type</p>
            </div>
            <div class="col-2">
              <strong>{{$data->duration}}</strong>
              <p class="text-muted">Duration</p>
            </div>
            <div class="col-2">
              <strong>{{$data->completion_year}}</strong>
              <p class="text-muted">Completion Year</p>
            </div>
            <div class="col-2">
              <strong>{{$data->is_completed}}</strong>
              <p class="text-muted">Status</p>
            </div>
          </div>
          <?php echo printf("%s", $data->description) ?> 
      </div>
      
    </div>
     <div class="my-5 ">
      <div class="row d-flex"> 
        @foreach(DB::table('project_images')->where('project_id', $data->id)->take(2)->get() as $a)
          <img src="{{ url('/') }}/public/projects/{{$a->image}}" class="img-fluid rounded w-25" alt="Main Road Image" style="width: 100%; height: 100%;">
        @endforeach 
      </div> 
    </div>
    <div class="my-5">
      <div class="d-flex"> 
        @foreach(DB::table('project_images')->where('project_id', $data->id)->take(3)->get() as $a) 
              <img src="{{ url('/') }}/public/projects/{{$a->image}}" class="img-fluid rounded w-25 px-1" alt="Main Road Image" style="width: 100%; height: 100%;"> 
        @endforeach 
      </div> 
    </div>

    <div class="my-5">
      <div class="row d-flex "> 
        <div class="col-12">
          <h4>Similar Projects</h4>
        </div>
          
        <!-- Project Card -->
        <div class="col-md-3 col-sm-6" data-aos="flip-left"
          data-aos-duration="1500">
          <div class="position-relative"> 
            @foreach(DB::table('project_images')->where('project_id', $data->id)->take(1)->get() as $img) 
              <img src="{{ url('/') }}/public/projects/{{$img->image}}" alt="highway"
              class="event-image rounded-4"
              style="width: 100%; height: 250px; object-fit: cover;">
            @endforeach 
          </div>
          <div class="event-info p-3">
            @if($data->is_completed == 'completed')
             <span class="px-2 rounded py-1 fw-semibold text-light  bg-success">{{$data->is_completed}}</span>
             @elseif($data->is_completed == 'not completed') 
             <span class="px-2 rounded py-1 fw-semibold  text-light bg-danger">{{$data->is_completed}}</span>
             @endif
            <h4 class="fw-bold mt-2">{{$data->title}}</h4>
            <div class="mt-2">
              <p
                class="small my-3 text-muted d-flex align-items-center gap-2">
                <img src="{{ url('/') }}/public/assets/images/map.png" alt="km"
                  style="width: 15px;"> {{$data->location}}
              </p>
              <p
                class="small my-3 text-muted d-flex align-items-center gap-2">
                <img src="{{ url('/') }}/public/assets/images/scale.png" alt="km"
                  style="width: 15px;"> {{$data->type}}
              </p>
              <p
                class="small my-3 text-muted d-flex align-items-center gap-2">
                <img src="{{ url('/') }}/public/assets/images/calendar.png" alt="km"
                  style="width: 15px;"> {{$data->duration}}
              </p>
            </div>
            <div>
              <a href="{{ route('project.details', $data->id) }}"
                class="event-link d-flex justify-content-end text-danger fw-bold">
                Know more →
              </a>
            </div>
          </div>
        </div>
        
        <!-- Project Card Ends -->  
      </div>
    </div>

@endsection