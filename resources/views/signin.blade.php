@extends('master_layouts.app')
@section('content1')

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="signin_assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="signin_assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="signin_assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="signin_assets/css/styles.css">
</head>

<body>
    <br><br>
    <div class="login-clean" style="background-color:white;">
        <form method="post" action="{{route('user.signin')}}" style="background-color:#7565AC;">
            @csrf

            <div>
                <p class="text-center" style="font-size: 20px;font-family: 'Open Sans', sans-serif;font-weight: bold;color:white;">Login</p>
                @if(Session::has('error'))
                <center>
                <p  style="font-size:14px;text-align:center;color:white;background-color:red;" >{{ Session::get('error')}}</p>
                </center>
                @endif
            </div>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i style="color:white;" class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"><span style="font-size:14px;color:white;background-color:red;" >{{ $errors->first('email') }}</span></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"><span style="font-size:14px;color:white;background-color:red;" >{{ $errors->first('password') }}</span></div>
            <div class="form-group"><button class="btn btn-primary btn-block" style="background-color:rgb(190,210,112);color:black;" type="submit">Log In</button></div></form>
    </div>
    <script src="signin_assets/js/jquery.min.js"></script>
    <script src="signin_assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

@endsection