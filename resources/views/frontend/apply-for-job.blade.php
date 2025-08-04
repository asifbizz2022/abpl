@extends('frontend.layout.app')
@section('content')
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css"/>
<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
 <!-- Apply Section -->
    <div id="landMark" class="container-fluid px-md-5 py-5">
     
      <div class="row justify-content-between">
        @foreach($data as $row)
       @php $title = $row->title @endphp
        <!-- Left Section -->
        <div class="col-md-6" data-aos="fade-right"
          data-aos-duration="1000">
          <p class="text-uppercase text-secondary fw-semibold mb-2">
            Job openings
          </p>
          <h1 class="fw-semibold mb-4">{{$row->title}}</h1>

          <div class="my-3">
            <p
              class="small my-3  d-flex align-items-center gap-2">
              <img src="{{ url('/') }}/public/assets/images/map.png" alt="km"
                style="width: 15px;"> {{$row->location}}
            </p>
            <p
              class="small my-3  d-flex align-items-center gap-2">
              <img src="{{ url('/') }}/public/assets/images/d.png" alt="km"
                style="width: 18px;"> {{$row->job_type}}
            </p>
            <p
              class="small my-3  d-flex align-items-center gap-2">
              <img src="{{ url('/') }}/public/assets/images/exp.png" alt="km"
                style="width: 18px;"> {{$row->experience}}
            </p>
            <p
              class="small my-3  d-flex align-items-center gap-2">
              <img src="{{ url('/') }}/public/assets/images/users.png" alt="km"
                style="width: 18px;"> {{$row->seats}}
            </p>
          </div>
          <div class="col-12 my-3">
            <?php 
              printf("%s", $row->description)
            ?>
          </div>
        </div>
        @endforeach
        <!-- Right Section -->
        <div class="col-md-6" data-aos="fade-left"
          data-aos-duration="1000">
          <div class="px-md-5">
            <form method="POST" action="{{ route('apply') }}" enctype="multipart/form-data">@csrf
            <div class="row gy-4">
              <div class="col-12">
                <h1 class="fw-semibold mb-4 text-center">{{$title}}</h1>
              </div>
              <!-- -->
              <div class="col-md-6" data-aos="fade-up"
                data-aos-duration="1500">
                <input type="text" placeholder="First name" name="firstname" 
                  class="form-control p-2 shadow-none border border-secondary-subtle" value="{{ old('firstname') }}">
               
              </div>
              <!-- End  -->
              <!-- -->
              <div class="col-md-6" data-aos="fade-up"
                data-aos-duration="1500">
                <input type="text" placeholder="Last name" name="lastname" 
                  class="form-control p-2 shadow-none border border-secondary-subtle" value="{{ old('lastname') }}">
                  
              </div>
              <!-- End  -->
              <!-- -->
              <div class="col-md-6" data-aos="fade-up"
                data-aos-duration="1500">
                <input type="email" placeholder="Email address" name="email" 
                  class="form-control p-2 shadow-none border border-secondary-subtle" value="{{ old('email') }}">
                  
              </div>
              <!-- End  -->
              <!-- -->
              <div class="col-12 col-md-6 " data-aos="fade-up">
                <div class="input-group">
                    <div class="row g-0 col-12 col-md-12">
                        <!-- Country Code Select -->
                        
                        <!-- Phone Number Input -->
                        <div class=" ">
                            <input type="text" class="form-control" name="contact"   id="phone" aria-describedby="emailHelp" placeholder="Enter your phone number" min="10" maxlength="10" style="width:  385px; !important; z-index: ;" value="{{ old('contact') }}">
                               
                        </div>
                    </div>
                </div>
            </div>
              <!-- End  -->
              <!-- -->
              <div class="col-md-6 " data-aos="fade-up"
                data-aos-duration="1500">
                <div class=" border border-secondary-subtle rounded">
                  <div
                    class="d-flex align-items-center   justify-content-between-">
                    <input type="text" placeholder="Total Experience" name="experience" 
                      class="form-control   p-2 shadow-none border-0 border-secondary-subtle" value="{{ old('experience') }}">
                      <span
                      class="text-muted  text-end w-100 pe-3">Years</span>

                  </div> 
                 
                </div>

              </div>

              <!-- End  -->

              <!-- -->
              <div class="col-md-6" data-aos="fade-up"
                data-aos-duration="1500">
                <select
                  class="p-2 w-100 text-muted rounded shadow-none border border-secondary-subtle"
                  name="qualification" required>
                   
                    <option >Diploma</option>
                    <option >Bachelor</option>
                    <option >Master Degree</option>
                   
                </select>
              </div>
              <!-- End  -->
              <!-- -->
              <div class="col-md-12 my-3" data-aos="fade-up"
                data-aos-duration="1500">
                <input type="text" placeholder="Current Location" name="location" 
                  class="form-control p-2 shadow-none border border-secondary-subtle">
                  
              </div>
              <!-- End  -->

              <div class="col-12">
                <div id="upload-container" class="border">
                  <div class="text-start mb-4">
                    <h5>Upload Resume</h5>
                    <p class="text-muted" style="font-size: 14px;">Please upload
                      files in pdf, docx or doc format and make
                      sure
                      the file size is under 5 MB.</p>
                  </div>

                  <div id=" "
                    >
                    <input type="file"   
                       name="resume" required value="{{ old('resume') }}">
                      
                    
                    <p class="text-black mb-0 mt-1">Drop file or Browse</p>
                    <span class="fw-normal"
                      style="font-size: 13px;">Format: pdf, docx, doc & Max file
                      size: 5 MB</span>
                  </div>
                   
                  

                  <p id="selected-file"></p>
                </div>
              </div>
               
              <!-- ---  -->
              <div class="col-12 my-3">
                <textarea name id cols="30" rows="5"
                  class="form-control border-secondary-subtle shadow-none"
                  placeholder="Cover Letter/Message (Optional)" name="coverletter"></textarea>
              </div>
              <!-- ---  -->

              <!-- -- -->
              <div class="mt-2 col-12">
                <input type="checkbox" required >
                <span class="fw-normal"
                  style="font-size: 13px;">I confirm that all provided
                  information
                  is accurate and I consent to ABPL processing my data for
                  recruitment purposes.</span>
              </div>
              <!-- Button  -->
              <div class="my-5">
                <button type="submit" 
                  class="btn btn-danger text-white py-2 px-3 w-100 ">Submit
                  Application</button>
              </div>
              <!-- Button eND -->
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- News Section End -->
@endsection

@section('js')
<script type="text/javascript">
    var input = document.querySelector("#phone");
window.intlTelInput(input, {
  separateDialCode: true
});
</script>
<script>

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false, 
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  @if(Session::has('success'))
      toastr.success("{{ strtoupper(Session::get('success')) }}");
  @endif

  @if(Session::has('error'))
          toastr.error("{{ strtoupper(Session::get('error')) }}");
  @endif
 
  @foreach($errors->all() as $error)
      toastr.error("{{ $error }}")
  @endforeach
</script>
@endsection