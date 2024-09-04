<!DOCTYPE html>
<html lang="en"> <!-- Added lang attribute for better accessibility and SEO -->

<head>
    @include('home.css') <!-- Include CSS styles -->
   
    <meta charset="UTF-8"> <!-- Added charset for proper text rendering -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive meta tag -->

    <style>
        .div_center
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;

        }

        table
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th 
        {
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }
        td
        {
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        {{-- Header Section --}}
        @include('home.header')
        {{-- Header section ends here --}}
        
       
        
     <div class="div_center">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>

            @foreach ($order as $order )
                
            
            <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <img height="200" width="300" src="products/{{$order->product->image}}">
                </td>
            </tr>

            @endforeach
        </table>

     </div>
        
        <!-- Info Section -->
        @include('home.footer')
        <!-- Info section ends here -->
    </div>
</body>

</html>
