<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .contact_section {
            padding: 60px 0;
            background-color: #ffffff;
        }

        .heading_container {
            text-align: center;
            margin-bottom: 40px;
        }

        .heading_container h2 {
            font-size: 36px;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .heading_container h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background-color: #007bff;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .container-bg {
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .map_container {
            border-radius: 8px;
            overflow: hidden;
        }

        .map_container iframe {
            border: none;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        form input[type="text"],
        form input[type="email"],
        form .message-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form .message-box {
            height: 100px;
        }

        form button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .d-flex {
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .container-bg {
                padding: 15px;
            }

            form {
                padding: 15px;
            }

            form .message-box {
                height: 80px;
            }
        }
    </style>
</head>

<body>
  <div class="hero_area">
    {{-- Header Section --}}
    @include('home.header')
    {{-- Header section ends here --}}
    
    <section class="contact_section">
        <div class="container px-0">
            <div class="heading_container">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                    width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" required />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" required />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" required />
                        </div>
                        <div class="d-flex">
                            <button type="submit">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
