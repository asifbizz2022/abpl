@extends('admin.layout._main')
@section('title')  @endsection
@section('content')
<section>
	<div class="px-4 py-2 bg-white mb-1">
		<h5>
			Logo
		</h5>
	</div>
	<div class="row">

		<div class="col-xl-4 col-sm-12 col-md-4">
			
			<div class="card">
				<div class="card-header">
									<h6 class="card-title">Header Logo</h6> 
								</div>
				<div class="card-body">
					 <form method="post" action="{{ route('upload.header.logo') }}" enctype="multipart/form-data">@csrf
					 	<div class="form-group"> 
					 			
					 		<div class="my-1">
					 			<p>Existing Logo</p>
					 			 @foreach(DB::table('logo')->get() as $logo) 
					 		 	<img src="{{ url('/') }}/public/header_logo/{{$logo->header_logo}}" width="150" >
					 		 	 @endforeach
					 			 <div>
                                    <img id="image-preview"   alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                                </div>
					 		</div>
					 		<div class="custom-file"> 
								<input type="file" name="logo" class="custom-file-input" id="image-upload" required>
								<small class="text-danger fw-bold">Dimension : 150 X 88</small>
								@error('logo')
								<small class="text-danger fw-bold">{{$message}}</small>
								@enderror
								<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
								<div class="invalid-feedback">Example invalid custom file feedback</div>
							</div>
					 	</div>
					 	<div class="form-group">
					 		<button type="submit" class="btn btn-info">Save</button>
					 	</div>
					 </form>	
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-12 col-md-4">
			<div class="card">
				<div class="card-header">
									<h6 class="card-title">Footer Logo</h6> 
								</div>
				<div class="card-body">
					 <form method="post" enctype="multipart/form-data" action="{{ route('upload.footer.logo') }}">@csrf
					 	<div class="form-group">
					 		 
					 		<div> 
					 			<div class="my-1">
					 			<p>Existing Logo</p>
					 			@foreach(DB::table('footer_logo')->get() as $row)
					 		 	<img src="{{ url('/') }}/public/footer_logo/{{$row->footer_logo}}" width="150">
					 		 	@endforeach
					 			 <div>
                                    <img id="image-preview-footer"   alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                                </div>
					 		</div>
					 		</div>
					 		<div class="custom-file"> 
								<input type="file" name="logo" class="custom-file-input" id="image-upload-footer" required>
								<small class="text-danger fw-bold">Dimension : 150 X 88</small>
								@error('logo')
								<small class="text-danger fw-bold">{{$message}}</small>
								@enderror
								<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
								<div class="invalid-feedback">Example invalid custom file feedback</div>
							</div>
					 	</div>
					 	<div class="form-group">
					 		<button type="submit" class="btn btn-info">Save</button>
					 	</div>
					 </form>	
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-12 col-md-4">
			<div class="card">
				<div class="card-header">
									<h6 class="card-title">Favicon</h6> 
								</div>
				<div class="card-body">
					 <form method="post" enctype="multipart/form-data" action="{{ route('upload.favicon') }}">@csrf
					 	<div class="form-group">
					 		 
					 		<div> 
					 			<div class="my-1">
					 			<p>Existing Logo</p>
					 			@foreach(DB::table('favicon')->get() as $row)
					 		 	<img src="{{ url('/') }}/public/favicon/{{$row->favicon}}" width="150">
					 		 	@endforeach
					 			 <div>
                                    <img id="image-preview-favicon"  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                                </div>
					 		</div>
					 		</div>
					 		<div class="custom-file">
					 			 
								<input type="file" name="logo" class="custom-file-input" id="image-upload-favicon" required>
									<small class="text-danger fw-bold">Dimension : 16 X 16</small>
								@error('logo')
								<small class="text-danger fw-bold">{{$message}}</small>
								@enderror
								<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
								<div class="invalid-feedback">Example invalid custom file feedback</div>
							</div>
					 	</div>
					 	<div class="form-group">
					 		<button type="submit" class="btn btn-info">Save</button>
					 	</div>
					 </form>	
				</div>
			</div>
		</div>
	</div>
	
</section>
<div class="row"> 
	<div class="col-sm-12 col-md-6 col-lg-6"> 
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Seo</h6> 
			</div>
			<div class="card-body px-5">
 				<form method="post" action="{{ route('add.seo') }}">@csrf
 					<div class="form-group">
 						<label>Keyword</label>
 						<input type="" name="title" class="form-control"  value="{{ old('title') }}">
 						@error('title')
 						<small class="text-danger">
 							{{$message}}
 						</small>
 						@enderror
 					</div>
 					 
 					<div class="form-group">
 						<label>Description</label>
 						<input type="" name="description"  class="form-control" value="{{ old('description') }}">
 						@error('description')
 						<small class="text-danger">
 							{{$message}}
 						</small>
 						@enderror
 					</div>
 					<div class="form-group">
 						<button type="submit" class="btn   btn-info"> Save</button>
 					</div>
 				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
    
    </script>	
    <script>
        // JavaScript to display the selected image
        document.getElementById('image-upload-footer').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            const preview = document.getElementById('image-preview-footer');

            if (file) {
                const reader = new FileReader(); // Create a FileReader to read the file

                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the image source to the file's data URL
                    preview.style.display = 'block'; // Show the image preview
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the image preview if no file is selected
            }
        });
    </script>					 
    <script>
        // JavaScript to display the selected image
        document.getElementById('image-upload-favicon').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            const preview = document.getElementById('image-preview-favicon');

            if (file) {
                const reader = new FileReader(); // Create a FileReader to read the file

                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the image source to the file's data URL
                    preview.style.display = 'block'; // Show the image preview
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the image preview if no file is selected
            }
        });
    </script>	
@endsection