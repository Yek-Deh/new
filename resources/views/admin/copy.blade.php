<!DOCTYPE html>
<html>

<head>
    @include('admin.layouts.css')
</head>
<body>
@include('admin.layouts.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.layouts.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                @yield('header-content')
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
                @yield('content-header')
            </div>
        </div>
{{--         @include('admin.layouts.content') --}}
        @yield('body-content')
        @include('admin.layouts.footer')
    </div>
</div>
<!-- JavaScript files-->


<script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admincss/js/charts-home.js')}}"></script>
<script src="{{asset('admincss/js/front.js')}}"></script>
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>


@yield('confirm')

</body>
</html>
