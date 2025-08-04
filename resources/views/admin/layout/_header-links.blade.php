<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
  @php

if(count($favicon = DB::table('favicon')->get())){
    $icon = $favicon[0]->favicon;
}
else{
    $icon = '';
}

if(count($seo = DB::table('seo')->get())){
    $description = $seo[0]->description; 
    $keyword = $seo[0]->title;
}
else {
    $description= '';
    $keyword = '';
}

@endphp
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/public/favicon/{{$icon}}">
	<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/feathericon.min.css">
        	<link rel="stylesheet" href="{{ url('/') }}/public/assets/plugins/morris/morris.css">
	<!-- Datatables CSS -->
	<link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/plugins/datatables/datatables.min.css">
	<!-- Main CSS -->
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/select2.min.css">

        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/style.css">

	<link rel="shortcut icon" type="image/x-icon" href="#"> 

	<script src="{{ url('/') }}/public/assets/js/respond.min.js"></script>
		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />	

<style type="text/css">
	.sidebar-menu {
  padding: 1px;

}
.sidebar-menu > ul > li > a {
  color: #f1f1f1;
  font-size: 15px;
}
}
.sidebar-menu li a {
  color: #fff;
  display: block;
  font-size: 16px;
  height: auto;
  padding: 0 20px;
   font-size: 15px;
}
</style>
</head>
