<!DOCTYPE html>
<html lang="en"> <!-- Added lang attribute for better accessibility and SEO -->

<head>
    @include('home.css') <!-- Include CSS styles -->
        <style>
            .div_center
            {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 30px;
            }
            
            .detail-box
            {
                padding: 5px;
            }
        </style>

    <title>Your Website Title</title> <!-- It's good practice to include a title -->
    <meta charset="UTF-8"> <!-- Added charset for proper text rendering -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive meta tag -->
</head>

<body>
    <div class="hero_area">
        {{-- Header Section --}}
        @include('home.header')
        {{-- Header section ends here --}}
        
        
        {{-- Product Details --}}

        <section class="shop_section layout_padding">
            <div class="container">
              <div class="heading_container heading_center">
                <h2>
                  Latest Products
                </h2>
              </div>
              <div class="row">
        
                               
                
                <div class=" col-md-12 ">
                  <div class="box">
                    
                      <div class="div_center" >
                        <img width="400" src="/products/{{$data->image}}" alt="">
                      </div>

                          <div class="detail-box">
                                <h6>{{$data->title}}</h6>
                            <h6> Price :
                                <span>{{$data->price}}</span>
                            </h6>
                          </div>
                     
                           <div class="detail-box">
                            <h6>Category : {{$data->category}}</h6>
                            <h6> Available Quantity :  
                            <span>{{$data->quantity}}</span>
                            </h6>
                           </div>

                           <div class="detail-box">
                            <p>{{$data->description}}</p>
                            
                           </div>

                           <div class="detail-box">
                            <a class="btn btn-primary" href="{{url('add_cart',$data->id)}}">Add to Cart</a>
                           </div>
                           
                           
                   
                  </div>
                </div>
        
               
        
              </div>
              
            </div>
          </section>

        {{-- Product Details End --}}
        
        <!-- Info Section -->
        @include('home.footer')
        <!-- Info section ends here -->
    </div>
</body>

</html>
