<!DOCTYPE html>
<html>

<head>
   @include('home.layouts.css')
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.layouts.header')
    <!-- end header section -->

</div>
<!-- end hero area -->
@yield('content')

<!-- info section -->

@include('home.layouts.footer')

<!-- end info section -->
@yield('confirm')

</body>

</html>
