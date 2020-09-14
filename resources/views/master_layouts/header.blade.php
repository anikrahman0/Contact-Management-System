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
    <style type="text/css">
     a{
         font-size:16px;
     }
    </style>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top " style="background-color:#7565AC;" id="mainNav">
                
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="/" style="color: white;font-size: 25px;">Contact Management System</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler float-right" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                 @if (Auth::check())
                 <?php 
                         
                if( Auth::user()->avatar=='p.png')
                $title="Upload profile image";
                else
                $title="Update profile image";
                ?>
                      <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('user.mycontact')}}">MyContact</a></li>
                 <li style="color:white;text-shdaow:0px 0px 7px white;" class="nav-item" role="presentation"><a href="{{route('user.myprofile', Auth::user()->id)}}" class="nav-link js-scroll-trigger">{{{ substr((Auth::user()->name), 0,26)?substr((Auth::user()->name), 0,26) : substr((Auth::user()->email), 0,26) }}}</a></li>
                 <li><a href="{{route('user.upload-profile-image-get',Auth::user()->id)}}"><img width="32" height="32" title="{{$title}}"  style="border-radius:50%;" src="{{asset('images/profile_images')}}/{{Auth::user()->profile_image}}"></a></li>
                             <li style="vertical-align:middle;" class="nav-item" role="presentation"><a href="{{route('user.logout')}}"><img style="margin-top:5px;margin-left:8px;" title="logout" src="{{asset('images')}}/20.png"></a></li>

                 @else
                    <li class="nav-item" role=""><a class="nav-link " href="{{route('user.signup')}}">Sign up</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('user.signin')}}">sign In</a></li>
                 @endif
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>