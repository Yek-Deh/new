@extends('admin.copy')
@section('title')
    Edit Product
@endsection

<style type="text/css">
    .fm_sty {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;

    }

    label {
        display: inline-block;
        width: 200px;
        font-size: 18px !important;
        color: white !important;
    }

    input[type='text'] {
        width: 350px;
        height: 50px;
    }

    textarea {
        width: 450px;
        height: 80px;
    }

    .input_sty {
        padding: 15px;
    }


</style>
@section('content-header')
    <h1 style="color: white">Update Product</h1>

@endsection
@section('body-content')
    <div class="fm_sty">
        <form action="{{url('update_product',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="input_sty">
                <label>Product Title</label>
                <input  type="text" name="title" value="{{$data->title}}" class="@error('title') is-invalid @enderror">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Product Description</label>
                <textarea name="description"  class="@error('description') is-invalid @enderror">{{$data->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}" class="@error('price') is-invalid @enderror" >
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Quantity</label>
                <input type="number" name="quantity" value="{{$data->quantity}}" min="1" class="@error('quantity') is-invalid @enderror">
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Product Category</label>

                <select name="category">
                    <option disabled>your is:{{$data->category}}</option>
                    @foreach($categories as $category)
                        <option value="{{$data->category}}">{{$category->category_name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="input_sty">
                <label>Current Image</label>
                <img height="200px" src="/products/{{$data->image}}">
            </div>
            <div class="input_sty">
                <label>New Image</label>
                <input type="file" name="image" class="@error('image') is-invalid @enderror">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <input class="btn btn-success " type="submit" value="Update Product">
        </form>
    </div>

@endsection
