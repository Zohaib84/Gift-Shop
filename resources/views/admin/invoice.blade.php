<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box h2, .invoice-box h3 {
            margin: 0;
        }
        .invoice-box h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .invoice-box h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .invoice-box img {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <center>
            <h2>Invoice</h2>
            <h3>Customer Name: {{$data->name}}</h3>
            <h3>Customer Address: {{$data->rec_address}}</h3>
            <h3>Customer Phone: {{$data->phone}}</h3>
            <h3>Product Title: {{$data->product->title}}</h3>
            <h3>Product Price: ${{$data->product->price}}</h3>
            <img height="250" width="300" src="products/{{$data->product->image}}">
        </center>
    </div>
</body>
</html>
