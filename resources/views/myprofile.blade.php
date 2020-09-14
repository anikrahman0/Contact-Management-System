@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>profile</title>
    <link rel="stylesheet" href="{{asset('profile_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('profile_assets')}}/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('profile_assets')}}/css/styles.css">
</head>

<body>
    <div style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
                    <a href="{{route('user.upload-profile-image-get', Auth::user()->id)}}"><p class="text-center" style="background-image: url(&quot;{{asset('profile_assets')}}/img/thumb-1920-1019905.jpg&quot;);background-size: cover;background-repeat: no-repeat;background-position: 100%;padding:40px;"><img class="rounded-circle" src="{{asset('images/profile_images')}}/{{Auth::user()->profile_image}}" width="200" style="padding: 10px;"></p></a>
                    <p class="text-center" style="font-size: 20px;"><strong><span style="text-decoration: underline;;"> {{ ucfirst(Auth::user()->name) }}'s Profile</span></strong></p>
                </div>
            </div>
        </div>
    </div>
    <br>

@if(Session::has('success2'))      

 <div style="margin-top:10px" class="form-group text-center">  
  <center>         
 <span style="background-color:red;border:1px solid red;border-radius:5px;text-shadow:0px 0px 3px white;box-shadow:0px 0px 3px red;padding:14px;color:white;font-size:16px;width:400px;"  class="form-text ">{{Session::get('success2')}}</span>
 <div style="margin-top:10px;"><a href="{{route('user.delete',Auth::user()->id)}}" style="text-decoration:none;font-size:16px;color:white;background-color:black;border-radius:4px;padding:8px;">Confirm</a>&nbsp;<a href="{{route('user.myprofile')}}" style="text-decoration:none;font-size:16px;color:black;background-color:#C5D36E;border-radius:4px;padding:8px;">Cancle</a></div>
 </center>
 </div>

 @endif
 @if(Session::has('success'))      
 <center>
 <div style="" class="form-group ">           
 <span style="background-color:black;border-radius:5px;width:400px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif

    <div style="margin-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                   <a style="color:black;" href="{{route('user.edit',Auth::user()->id)}}"> <p class="float-right"><i class="fas fa-edit"></i></p></a>
                    <p class="float-left"><i class="fas fa-user"></i><strong>&nbsp;Account Details</strong></p>
                </div>
                <hr>
                <div class="col-md-12">
                    <p class="float-right" style="font-size:16px;"><i class="fas fa-envelope"></i> Email: {{Auth::user()->email }}</p>
                    <p class="float-left" style="font-size:16px;"><i class="fas fa-user-circle"></i> Name: {{Auth::user()->name }}</p>
                </div>
                <div class="col-md-12">
                @if(Auth::user()->gender == '') 
                <p class="float-right" style="font-size:16px;"><i style="font-size:20px;" class="fas fa-male"></i> Gender :   </p>
                @else
                    @if(Auth::user()->gender == 'male') 
                    <p class="float-right" style="font-size:16px;"><i style="font-size:20px;" class="fas fa-male"></i> Gender: Male</p>
                    @else
                    <p class="float-right" style="font-size:16px;"><i class="fas fa-female"></i> Gender: Female</p>
                    @endif
                @endif
                    <p class="float-left" style="font-size:16px;"><i class="fas fa-phone"></i> Phone No: {{Auth::user()->phone }}</p>
                </div>
                <div class="col-md-12">
                    <p class="float-left" style="font-size:16px;"> <i class="fas fa-address-book"></i> Address: {{Auth::user()->address }}</p>
                    <p class="float-right" style="font-size:16px;"> <i class="fas fa-birthday-cake"></i> Date of Birth: {{Auth::user()->date_of_birth }}</p>

                </div>
                 
            </div>
        </div>
    </div>
    <div style="margin: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <p class="float-right"></p>
                    <p class="float-left"><i class="fas fa-cog"></i><strong>&nbsp;Settings</strong></p>
                </div>
                <div class="col-md-12">
                    <a style="color:black;" href="{{route('delete_confirm')}}"><p class="float-right" style="font-size:16px;"><i class="fas fa-trash-alt"></i> Delete Account</p></a>
                    <a style="color:black;" href="{{route('change_password')}}"><p class="float-left" style="font-size:16px;"><i class="fas fa-exchange-alt"></i> Change Password</p></a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('profile_assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('profile_assets')}}/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
@endsection