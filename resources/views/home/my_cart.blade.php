<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css') <!-- Include CSS styles -->

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 60px auto;
            padding: 20px;
            max-width: 1000px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px 0;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #333;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px;
            text-align: center;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .cart_value {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .order_deg {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: inline-block;
            width: 150px;
            margin-right: 10px;
            font-weight: bold;
            color: #333;
        }

        .div_gap {
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header') <!-- Header Section -->

        <div class="div_deg">
            <div class="order_deg">
               
            </div>

            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                <?php $value = 0; ?>
                @foreach ($cart as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>${{$cart->product->price}}</td>
                    <td>
                        <img width="150" src="/products/{{$cart->product->image}}" alt="Product Image">
                    </td>
                </tr>
                <?php $value += (float) $cart->product->price; ?>
                @endforeach
            </table>
            <div class="cart_value">
                <h3>Total Value of Cart: ${{$value}}</h3>
            </div>
            <form action="{{url('confirm_order')}}" method="POST">
                @csrf
                <div class="div_gap">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>

                <div class="div_gap">
                    <label>Receiver Address</label>
                    <textarea name="address">{{Auth::user()->address}}</textarea>
                </div>

                <div class="div_gap">
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>

                <div class="div_gap">
                    <input class="btn btn-primary" type="submit" value="Cash On Delivery">
                    <a class="btn btn-success" href="{{url('stripe', $value)}}">Pay using card</a>
                </div>
            </form>
        </div>
        @include('home.footer') <!-- Footer Section -->
    </div>
</body>

</html>
