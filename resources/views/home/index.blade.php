<!DOCTYPE html>
<html lang="en"> <!-- Added lang attribute for better accessibility and SEO -->

<head>
    @include('home.css') <!-- Include CSS styles -->
    <title>Your Website Title</title> <!-- It's good practice to include a title -->
    <meta charset="UTF-8"> <!-- Added charset for proper text rendering -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive meta tag -->
</head>

<body>
    <div class="hero_area">
        {{-- Header Section --}}
        @include('home.header')
        {{-- Header section ends here --}}
        
        <!-- Slider Section -->
        @include('home.slider')
        <!-- Slider section ends here -->
        
        <!-- Shop Section -->
        @include('home.product')
        <!-- Shop section ends here -->
        

        
        <!-- Info Section -->
        @include('home.footer')
        <!-- Info section ends here -->
    </div>
</body>

</html>
