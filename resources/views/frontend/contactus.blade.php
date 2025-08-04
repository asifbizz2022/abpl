@extends('frontend.layout.app')
@section('content') 
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css"/>
<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
   <!-- Contact Section -->
        <div class="container py-5">
         
            
            <div data-aos="zoom-in"
                data-aos-duration="1500">
                <h6 class="text-center text-secondary">CONTACT US</h6>
                <h2 class="text-center mb-5">Get in Touch</h2>
            </div>

            <div class="contactus">
                <div class="row d-flex align-items-stretch">
                    <!-- Contact Information -->
                    <div class="col-md-4" data-aos="fade-right"
                        data-aos-duration="1500">
                        <div
                            class="text-white p-4 rounded h-100 d-flex flex-column justify-content-between"
                            style="background: rgba(4, 23, 69, 1);">
                            <div>
                                <h5>Contact Information</h5>
                                <p class="text-secondary">Say something to start
                                    a
                                    live chat!</p>
                            </div>
                            <div>
                                <p class="d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6397 17.3273C19.0224 19.2033 16.6038 20.1392 14.8759 19.9832C12.516 19.7699 9.94804 18.518 7.99878 17.1393C5.13355 15.1127 2.44964 11.9782 0.885697 8.65164C-0.219597 6.30105 -0.467588 3.41049 1.17635 1.2679C1.78433 0.475927 2.44298 0.0532752 3.42961 0.00394359C4.80022 -0.0627207 4.99222 0.721251 5.46287 1.94254C5.81352 2.85584 6.28151 3.78781 6.54283 4.73444C7.03215 6.50105 5.32154 6.57438 5.10555 8.01832C4.97222 8.92896 6.07485 10.1502 6.57349 10.7996C7.53464 12.0641 8.71183 13.1488 10.0507 14.0034C10.8107 14.4821 12.0346 15.3447 12.9039 14.8687C14.2426 14.1354 14.1172 11.8782 15.9878 12.6422C16.9571 13.0368 17.8958 13.6061 18.8211 14.1048C20.2517 14.8741 20.185 15.6714 19.6397 17.3273C20.0477 16.09 19.2317 18.5646 19.6397 17.3273Z" fill="#FDFDFD"/>
                                    </svg> +91 8871955549
                                </p>
                                <p class="d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                    <path d="M8.62808 11.1601L13.4742 6.31397M18.4316 3.35645L14.341 16.651C13.9744 17.8425 13.7909 18.4385 13.4748 18.636C13.2005 18.8074 12.8609 18.836 12.5623 18.7121C12.2178 18.5692 11.9383 18.0111 11.3807 16.8958L8.7897 11.7139C8.7012 11.5369 8.65691 11.4488 8.5978 11.3721C8.54535 11.304 8.48481 11.2427 8.41676 11.1903C8.34182 11.1325 8.25517 11.0892 8.08608 11.0046L2.89224 8.40772C1.77693 7.85006 1.21923 7.57098 1.07632 7.22656C0.95238 6.92787 0.980645 6.588 1.152 6.31375C1.34959 5.99751 1.94555 5.8138 3.13735 5.44709L16.4319 1.35645C17.3689 1.06815 17.8376 0.924119 18.154 1.0403C18.4297 1.1415 18.647 1.35861 18.7482 1.63428C18.8644 1.9506 18.7202 2.41904 18.4322 3.35506L18.4316 3.35645Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    info@alokbuildtech.com</p>
                                <p class="d-flex gap-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="14" height="20" viewBox="0 0 14 20" fill="none">
                                        <path d="M7 0C3.135 0 0 3.135 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.135 10.865 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z" fill="#FDFDFD"/>
                                        </svg>
                                    Alok Buildtech Private Limited, Durg,
                                    Chhattisgarh, India — 491001
                                </p>
                            </div>
                            <div class="d-flex mt-4">
                                <i class="fab fa-twitter me-3"></i>
                                <i class="fab fa-linkedin me-3"></i>
                                <i class="fab fa-facebook"></i>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Contact Form -->
                    <div class="col-md-8" data-aos="fade-left"
                        data-aos-duration="1500">
                        <form method="post" action="{{ route('feedback') }}">@csrf
                        	<div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    placeholder="Your name" name="name" value="{{old('name')}}" />
                                     
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control"
                                    placeholder="you@company.com" name="company_email"  value="{{old('company_email')}}"  />
                                    
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control"
                                    placeholder="Email address"  name="email"  value="{{old('email')}}"  />
                                    
                            </div>
                            <div class="col-md-6"> 
                                 <input type="text"  class="form-control" name="contact" value="{{ old('contact') }}" id="phone" aria-describedby="emailHelp" placeholder="Enter your phone number" min="10" maxlength="10"  >
                            </div>
                            
                            <div class="col-12">
                                <textarea class="form-control" rows="5"
                                    placeholder="Drop your message.." name="message"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger w-100">Send
                                    Message</button>
                            </div>
                        	</div>
                        </form> 
                        <!-- Google Map -->
                        <div class="mt-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28904.647444305093!2d81.27540101885474!3d21.190449618227323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28e1d49c962df3%3A0x3e1b3bf6b8c6a96e!2sDurg%2C%20Chhattisgarh%2C%20India!5e0!3m2!1sen!2sin!4v1644595622987!5m2!1sen!2sin"
                                width="100%"
                                height="300"
                                style="border:0;"
                                allowfullscreen
                                loading="lazy"
                                title="Google Maps"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section End -->

<script type="text/javascript">


</script>  

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

 