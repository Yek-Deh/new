@extends('admin.copy')
@section('title')
    Order
@endsection

<style type="text/css">
    input[type='text'] {
        width: 400px;
        height: 50px;
    }

    .tab-sty {
        text-align: center;
        width: fit-content;
        margin: 50px auto;
        color: #DB6574;

    }


    th {
        background-color: #DB6574;
        font-size: large;
        padding: 15px;
        font-weight: bold;
        color: white;

    }

    td {
        color: rgba(255, 255, 255, 0.85);
        text-align: center;
        font-weight: bold;
    }
</style>
@section('content-header')
    <h1 style="color: white">Orders</h1>
@endsection
@section('body-content')
    <div class="tab-sty">
        <table class="table-hover table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Customer</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}$</td>
                    <td>
                        <img width="400px" height="200px" src="/products/{{$data->product->image}}" alt="noImage"
                             srcset="">
                    </td>
                    <td>
                        @if($data->status =="in progress" )
                            <span style="color:#dfc52b ">{{$data->status}}</span>
                        @elseif($data->status =="On the way")
                            <span style="color:#c61d2c ">{{$data->status}}</span>
                        @else
                            <span style="color:#03ca2f ">{{$data->status}}</span>
                        @endif
                    </td>
                    <td>
                        @if($data->payment_status !="paid" )
                            <span style="color:#dfc52b ">{{$data->payment_status}}</span>
                        @else
                            <span style="color:#03ca2f ">{{$data->payment_status}}</span>
                        @endif
                    </td>
                    <td >
                        <a style="margin: 5px" href="{{url('on_the_way',$data->id)}}" class="btn btn-danger">On the Way</a>
                        <a href="{{url('delivered',$data->id)}}" class="btn btn-success">Delivered</a>
                    </td>
                    <td>
                        <a href="{{url('print_pdf',$data->id)}}" class="btn btn-outline-secondary">Print PDF</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('confirm')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection

