@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('signup_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('signup_assets')}}/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="{{asset('signup_assets')}}/css/styles.css">
   
    <title>Untitled</title>
</head>

<body>
    <br><br><br>
  @if(Session::has('success'))      
 <center>
 <div style="" class="form-group ">           
 <span style="background-color:black;border-radius:5px;width:400px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif
    <div class="register-photo" style="background-color:white;">
        <div class="form-container" >
            <div class="image-holder" style="background-image:url({{asset('signup_assets/img/meeting.jpg')}})"></div>
            <form action="{{route('user.signup')}}" method="post" style="background-color:#7565AC;">
                @csrf
                <h2 class="text-center" style="font-weight:bold;color:white;">Create an account.</h2>
                 <div class="form-group"><input class="form-control" value="{{ old('name') }}" type="text" name="name" placeholder="Name">
                <small class="form-text " style="background-color:red;color:white;">{{ $errors->first('name') }}</small>
                </div>
                  <div class="form-group"><input class="form-control" value="{{ old('email') }}" type="email"  name="email" placeholder="Email">
                <small class="form-text "style="background-color:red;color:white;">{{ $errors->first('email') }}</small>
                </div>
                <div class="form-group"><input class="form-control" type="text" value="{{ old('address') }}" name="address" placeholder="Address(Optional)">
                 <small class="form-text "style="background-color:red;color:white;">{{ $errors->first('address') }}</small>
               </div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
                <small class="form-text "style="background-color:red;color:white;">{{ $errors->first('password') }}</small>
               </div>
                <div class="form-group"><input class="form-control" type="password" name="confirm_password" placeholder="Password (repeat)">
                <small class="form-text "style="background-color:red;color:white;">{{ $errors->first('confirm_password') }}</small>
               </div>
             
                <div class="form-group"><button class="btn btn-primary btn-block" style="background-color:rgb(190,210,112);color:black;" type="submit">Sign Up</button></div><a class="already" style="color:white;" href="{{route('user.signin')}}">You already have an account? Login here.</a></form>
        </div>
    </div>
    <script src="{{asset('signup_assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('signup_assets')}}/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
@endsection