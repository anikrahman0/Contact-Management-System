@extends('master_layouts.app')
@section('content1')

  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="{{asset('home_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet" href="{{asset('home_assets')}}/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('home_assets')}}/fonts/simple-line-icons.min.css">
</head>
    

    <section id="features" class="features bg-white">
        <div class="container ">
            <div class="section-heading text-center">
                <h2>Unlimited Features, Unlimited Fun</h2>
                <p class="text-muted" style="color:white;">Check out what you can do with this app theme!</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 my-auto">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device" style="background-image:url('{{asset('home_assets')}}/img/iphone_6_plus_white_port.png');">
                                <div class="screen"><img class="img-fluid" src="{{asset('home_assets')}}/img/demo-screen-1.jpg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item"><i class="icon-screen-smartphone text-primary"></i>
                                    <h3>Device Mockups</h3>
                                    <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item"><i class="icon-camera text-primary"></i>
                                    <h3>Flexible Use</h3>
                                    <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item"><i class="icon-present text-primary"></i>
                                    <h3>Free to Use</h3>
                                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item"><i class="icon-lock-open text-primary"></i>
                                    <h3>Open Source</h3>
                                    <p class="text-muted">Since this theme is MIT licensed, you can use it commercially!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta" style="background-image:url('{{asset('home_assets')}}/img/bg-cta.jpg');">
        <div class="cta-content">
            <div class="container">
                <h2>Stop waiting.<br>Start building.<br></h2><a class="btn btn-outline-warning btn-xl js-scroll-trigger" role="button" href="{{route('user.signup')}}">Let's Get Started!</a></div>
        </div>
        <div class="overlay"></div>
    </section>

<script src="{{asset('home_assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('home_assets')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{asset('home_assets')}}/js/new-age.js"></script>
</body>

</html>
@endsection