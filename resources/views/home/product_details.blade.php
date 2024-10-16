@section('title')
    Product Details
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

</div>


<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row ">

                <div class="col-md-9 m-auto text-center">
                    <div class="box">
                        <div class="img-box">
                            <img width="300px" src="/products/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$product->title}}</h6>
                            <h6>Available Quantity: <span>{{$product->quantity}}</span></h6>

                        </div>
                        <div class="detail-box">

                            <h6>Category : {{$product->category}}</h6>
                            <h6>Price<span>${{$product->price}}</span></h6>
                        </div>
                        <div class="detail-box">
                            <p  >{{$product->description}}</p>
                        </div>
                        <div class="detail-box" style="text-align: center">
                            <a href="{{url('add_to_cart',$product->id)}}" class="btn btn-warning rounded">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>

    </div>
</section>



<!-- info section -->

@include('home.layouts.footer')

<!-- end info section -->



</body>

</html>
