<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print PDF</title>
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
            text-align: center;
            font-weight: bold;


        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <h1>{{$data->name}} Order</h1>
    <h3>Customer name: {{$data->name}}</h3>
    <h3>Customer Address: {{$data->rec_address}}</h3>
    <h3>Customer phone: {{$data->phone}}</h3>
    <h3>Product title : {{$data->product->title}}</h3>
    <h2>Product price : {{$data->product->price}}$</h2>
    @if($data->status =="in progress" )
        <span style="color:#dfc52b ">Status : {{$data->status}}</span>
    @elseif($data->status =="On the way")
        <span style="color:#c61d2c ">Status : {{$data->status}}</span>
    @else
        <span style="color:#03ca2f ">Status : {{$data->status}}</span>
    @endif
    <br>
    <br>
    <img width="400px" height="200px" src="products/{{$data->product->image}}" alt="noImage"
         srcset="">
</div>

</body>
</html>
