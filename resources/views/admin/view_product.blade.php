<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style>
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px ;
    }
    .table_deg
    {
        border: 2px;
    }
    th
    {
        background-color: skyblue;
        color: white;
        font-size: 20px;
        font-weight: bold;
        padding: 15px;

    }
    td
    {
        border: 1px solid skyblue;
        text-align: center;
        color: white;

    }
    input[type='search']
    {
        width: 500px;
        height: 60px;
        margin-left: 50px;
    }
  </style>
  </head>
  <body>
    
@include('admin.header')

@include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
             
            <form action="{{ url('product_search') }}" method="GET">
                @csrf
                <input type="text" name="search" placeholder="Search for products...">
                <button type="submit">Search</button>
            </form>
            

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                        @foreach ($product as $products)
                            
                        
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,50)!!}</td>
                            <td>{{$products->price}}</td>   
                            <td>{{$products->category}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img height="120" width="120" src="products/{{$products->image}}" alt="">
                            </td>
                          
                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                 </div>
                    <div class="div_deg"> 
                    {{$product->links()}}
                    
                 </div>
                
          </div>
      </div>
    </div>
 
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>