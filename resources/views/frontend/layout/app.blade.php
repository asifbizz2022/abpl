<!DOCTYPE html>
<html lang="en">

@include('frontend.layout.header-links')

<body>

@include('frontend.layout.navbar')

@yield('content')

@include('frontend.layout.footer')
@include('frontend.layout.footer-links')

</body>
@yield('js')
</html>