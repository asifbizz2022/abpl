<!DOCTYPE html>
<html lang="en">
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keyword}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/public/favicon/{{$icon}}">
    <!-- Css  -->
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/css/style.css">

    <!-- Bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css" />

    <!-- AOS Animated CDN -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- AOS Animated CDV  -->
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>