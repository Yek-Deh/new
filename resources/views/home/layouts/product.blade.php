<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($data as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$product->title}}</h6>
                            <h6>Price<span>${{$product->price}}</span></h6>
                        </div>
                        <div style="padding: 15px; ">
                            <a href="{{url('product_details',$product->id)}}" class="btn btn-outline-info rounded">
                                Details
                            </a>
                            <a href="{{url('add_to_cart',$product->id)}}" class="btn btn-outline-warning rounded">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
