@extends('admin.copy')
@section('title')
    Add Product
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
    <h1 style="color: white">Add Product</h1>

@endsection
@section('body-content')
    <div class="fm_sty">
        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input_sty">
                <label>Product Title</label>
                <input  type="text" name="title" class="@error('title') is-invalid @enderror">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Product Description</label>
                <textarea name="description" class="@error('description') is-invalid @enderror"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Price</label>
                <input type="text" name="price" class="@error('price') is-invalid @enderror" >
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Quantity</label>
                <input type="number" name="quantity"  min="1" class="@error('quantity') is-invalid @enderror">
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input_sty">
                <label>Product Category</label>

                <select name="category">
                    <option disabled>Select an Option</option>
                    @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input_sty">
                <label>Product Image</label>
                <input type="file" name="image" class="@error('image') is-invalid @enderror">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <input class="btn btn-success " type="submit" value="Add Product">
        </form>
    </div>

@endsection
