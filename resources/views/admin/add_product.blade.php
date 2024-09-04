<!DOCTYPE html>
<html>
<head> 
  <!-- Including the CSS file for admin styles -->
  @include('admin.css')

  <!-- Inline CSS for styling the form elements -->
  <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }

    h1 {
        color: white;
    }

    label {
        display: inline-block;
        width: 200px;
        font-size: 18px!important;
        color: white!important;
    }

    input[type='text'] {
        width: 300px;
        height: 35px;
    }
    
    textarea {
        width: 450px;
        height: 65px;
    }
  </style>
</head>
<body>

<!-- Including the header and sidebar for the admin layout -->
@include('admin.header')
@include('admin.sidebar')

<!-- Main content area -->
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <!-- Heading for the Add Product form -->
      <h1>Add Product</h1>
      <div class="div_deg">
        <!-- Form to add a new product -->
        <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Input field for Product Title -->
          <div>
            <label>Product Title</label>
            <input type="text" name="title" required>
          </div>

          <!-- Textarea for Product Description -->
          <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
          </div>

          <!-- Input field for Product Price -->
          <div>
            <label>Price</label>
            <input type="text" name="price">
          </div>
          
          <!-- Input field for Product Quantity -->
          <div>
            <label>Quantity</label>
            <input type="text" name="qty">
          </div>

          <!-- Dropdown to select Product Category -->
          <div>
            <label>Product Category</label>
            <select name="category" required>
              <option>Select Option</option>
              @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Input field for Product Image -->
          <div>
            <label>Product Image</label>
            <input type="file" name="image">
          </div>

          <!-- Submit button for the form -->
          <div class="input_deg">
            <input class="btn btn-success" type="submit" value="Add Product">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript files -->
<script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>
