@extends('admin.copy')
@section('title')
    Category
@endsection

<style type="text/css">
    .form-sty {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;

    }

    input[type='text'] {
        width: 400px;
        height: 50px;
    }

    .tab-sty {
        text-align: center;
        width: 600px;
        margin: 50px auto ;
    }

    th {
        background-color: #DB6574;
        font-size: large;
        padding: 15px;
        font-weight: bold;
        color: white;
    }

    td {
        color: white;
        padding: 10px;

    }
</style>
@section('content-header')
    <h1 style="color: white">ADD Categories</h1>
    <div class="form-sty">
        <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
                <input type="text" name="category">
                @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input class="btn btn-primary" type="submit" value="Add category">
            </div>
        </form>
    </div>
@endsection
@section('body-content')
    <table class="tab-sty table-hover table-bordered">
        <tr>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($data as $data)

            <tr>
                <td>{{$data->category_name}}</td>
                <td>
                    <a href="{{url('edit_category',$data->id)}}" class="btn btn-success" >Edit</a>
                </td>
                <td>
                    <a href="{{url('delete_category',$data->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
<script type="text/javascript">
    function confirmation(ev){
        ev.preventDefault()
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title:"Are you sure to delete this",
            test:"this delete will be permanent",
            icon:"warning",
            buttons:true,
            dangerMode:true
        })
            .then((willCancel)=>{
                if (willCancel){
                    window.location.href=urlToRedirect;
                }
            })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
