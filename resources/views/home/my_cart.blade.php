@extends('home.copy2')
@section('title')
    MY Cart
@endsection
<style type="text/css">
    .tab-sty {
        text-align: center;
        width: 600px;
        margin: 20px auto;
    }

    th {
        background-color: #DB6574;
        font-size: large;
        padding: 15px;
        font-weight: bold;
        color: white;
    }

    td {
        padding: 10px;
    }


</style>
@section('content')
    <?php
    $value = 0;
    ?>
    <div style="margin:15px auto;width:fit-content;">
        <div class="text-center">
            @foreach($carts as $cart)
                    <?php
                    $value = $value + $cart->product->price
                    ?>
            @endforeach
            <h3>Total value in Your Cart is: <span style="color:#a71d2a;font-weight: bold">{{$value}}$</span></h3>
            <form action="{{url('confirm_order')}}" method="get">
                @csrf
                <input type="submit" class="btn btn-outline-primary" value="Cash On Delivery">
            </form>
            <form action="{{url('stripe',$value)}}" method="get">
                @csrf
                @method('post')
                <input type="submit" class="btn btn-outline-success" value="Pay Using Card">
            </form>
        </div>
        <table id="myTable" class="tab-sty table-hover table-bordered">
            <thead>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove form Cart</th>
            </tr>
            </thead>
            <tbody>

            @foreach($carts as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>{{$cart->product->price}}</td>
                    <td>
                        <img height="200px" width="400px" src="products/{{$cart->product->image}}" alt="none">
                    </td>

                    <td>
                        <form action="{{url('remove_from_cart',$cart->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-remove">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div style="text-align: center">
        <h3>Total value in Your Cart is: <span style="color:#a71d2a;font-weight: bold">{{$value}}$</span></h3>
    </div>
@endsection

@section('confirm')
    <script type="text/javascript">
        $(".btn-remove").click(function (e) {
            e.preventDefault();
            var form = $(this).parents("form")
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })

    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
