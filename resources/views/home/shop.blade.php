@section('title')
    Shop
    @endsection
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
        <!-- slider section -->
        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->

    @include('home.layouts.product')

    <!-- end shop section -->


    <!-- contact section -->


    {{--@include('home.layouts.contact')--}}

    <!-- end contact section -->


    <!-- info section -->

    @include('home.layouts.footer')

    <!-- end info section -->


    </body>

    </html>
