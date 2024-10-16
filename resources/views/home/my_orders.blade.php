@extends('home.copy2')
@section('title')
    MY Orders
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
            <table id="myTable" class="tab-sty table-hover table-bordered" id="mytable">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>
                        @if($order->status =="in progress" )
                            <span style="color:#dfc52b;font-weight: bold ">{{$order->status}}</span>
                        @elseif($order->status =="On the way")
                            <span style="color:#c61d2c;font-weight: bold ">{{$order->status}}</span>
                        @else
                            <span style="color:#03ca2f;font-weight: bold ">{{$order->status}}</span>
                        @endif
                        </td>
                        <td>
                            <img height="200px" width="400px" src="products/{{$order->product->image}}" alt="none">
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
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
