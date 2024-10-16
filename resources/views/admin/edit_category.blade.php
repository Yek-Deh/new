@extends('admin.copy')
@section('title')
    Edit Category
@endsection

<style type="text/css">
   .fm_sty{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;

    }

    input[type='text'] {
        width: 400px;
        height: 50px;
    }

</style>
@section('content-header')
    <h1 style="color: white">Update</h1>

@endsection
@section('body-content')
    <div class="fm_sty">
    <form action="{{url('update_category',$data->id)}}" method="post">
        @csrf
        <input type="text" name="category" value="{{$data->category_name}}">
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input class="btn btn-primary" type="submit" value="Edit Category">
    </form>
    </div>

@endsection
