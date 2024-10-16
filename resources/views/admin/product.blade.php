@extends('admin.copy')
@section('title')
    Product
@endsection


<style type="text/css">
    .tab-sty {
        text-align: center;
        width: 900px;
        margin: 10px auto;
    }
    th {
        background-color: #DB6574;
        font-size: large;
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
    <h1 style="color: white">Products</h1>

@endsection
@section('body-content')
    <div class="tab-sty">

        <table class="table-hover table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $data)
                <tr>
                    <td>{{$data->title}}</td>
                    {{--                <td>{!!Str::limit($data->description,50)!!}</td>--}}
                    {{--                <td>{{Str::words($data->description,5)}}</td>--}}
                    <td>{{Str::limit($data->description,50)}}</td>
                    <td>{{$data->category}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>
                        <img height="200px" width="400px" src="products/{{$data->image}}" alt="none">
                    </td>
                    <td>
                        <a href="{{url('edit_product',$data->slug)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{url('delete_product',$data->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-delete mt-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('confirm')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(".btn-delete").click(function (e) {
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


