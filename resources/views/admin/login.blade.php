<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Login</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/epublic/admin/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/font-awesome.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/style.css">
        	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!--[if lt IE 9]>
			<script src="{{ url('/') }}/public/admin/assets/js/html5shiv.min.js"></script>
			<script src="{{ url('/') }}/public/admin/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
		<div class="main-wrapper login-body">
            <div class="login-wrapper"> 
            	<div class="container">
            		<div class="text-center mb-5">
            			<img class="img-fluid" src="{{ url('/') }}/public/admin/assets/img/logo.jpg" alt="Logo" width="100">
            		</div>
                	<div class="col-sm-12 col-md-6 col-lg-6 mx-auto bg-white border"> 
                      <div class="login-right">
												<div class=" p-5  ">
													<h3 class="text-center">Admin Login</h3>
													<p class="account-subtitle"> </p> 
													<!-- Form -->
													<form action="{{ route('admin.login') }}" method="post" >@csrf
														<div class="form-group">
															<input class="form-control email" name="email" value="{{ old('email') }}" type="email" placeholder="Email">
															<small class="text-danger">
															 
															</small>
														</div>
														<div class="form-group">
															<input class="form-control password" name="password" type="password" placeholder="Password">
															<small class="text-danger">
															 
															</small>
														</div>
														<div class="form-group">
															<button class="btn btn-primary btn-block button" type="submit">Login</button>
														</div>
													</form>
													 
												</div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		<!-- jQuery -->
        <script src="{{ url('/') }}/public/admin/assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="{{ url('/') }}/public/admin/assets/js/popper.min.js"></script>
        <script src="{{ url('/') }}/public/admin/assets/js/bootstrap.min.js"></script>
		<!-- Custom JS -->
		<script src="{{ url('/') }}/public/admin/assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    	@foreach($errors->all() as $error)
    				toastr.error("{{ $error }}")
    			@endforeach
			    toastr.options = {
			      "closeButton": true,
			      "debug": false,
			      "newestOnTop": false,
			      "progressBar": false,
			      "positionClass": "toast-top-full-width",
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
    				toastr.success("{{ Session::get('success') }}");
    			@endif

    			@if(Session::has('error'))
    					toastr.error("{{ Session::get('error') }}");
    			@endif

    			
    </script>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#oginForm').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.login") }}',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    // Show loading spinner or disable button
                    $('#loginForm button').prop('disabled', true);
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('#errorMessage').text(response.message).show();
                        $('#loginForm button').prop('disabled', false);
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'An error occurred';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    $('#errorMessage').text(errorMessage).show();
                    $('#loginForm button').prop('disabled', false);
                }
            });
        });
    });
    </script>
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>
