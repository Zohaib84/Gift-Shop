<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse; /* Merges borders for a cleaner look */
        margin: 20px 0; /* Adds space above and below the table */
    }

    th {
        background-color: #87CEFA; /* Light sky blue */
        color: #000; /* Black text for better contrast */
        padding: 12px; /* Adds padding for better spacing */
        font-size: 16px; /* Slightly larger font size for headers */
        font-weight: bold; /* Makes header text bold */
        text-align: center; /* Centers the text */
    }

    td {
        background-color: #f9f9f9; /* Light gray for table cells */
        color: #333; /* Dark gray text for readability */
        padding: 10px; /* Consistent padding */
        border: 1px solid #ddd; /* Light gray border for cells */
        text-align: center; /* Centers the text */
    }

    .table_center {
        display: flex;
        justify-content: center; /* Center-aligns the table horizontally */
        align-items: center; /* Center-aligns the table vertically if it has a set height */
        margin: 20px; /* Adds margin around the table */
    }
</style>

  </head>
  <body>
    
@include('admin.header')

@include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h3>All Orders</h3>
            <br>
            <br>
          <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                    <th>Payment Status</th>
                </tr>
               @foreach($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>
                        <img width="150" src="products/{{$data->product->image}}" >
                    </td>

                    <td>{{$data->payment_method}}</td>
                    <td>
                        @if ($data->status == 'in progress')
                        <span style="Color:red">{{$data->status}}</span>
                        @elseif($data->status == 'On the way' )
                        <span style="color:skyblue">{{$data->status}}</span>
                        @else
                        <span style="color:Black">{{$data->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                        <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                    </td>
                    <td >
                        <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                    </td>
                </tr>
                @endforeach
            </table>
          </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>