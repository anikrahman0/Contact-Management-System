@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html>

<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Upload</title>
        <link rel="stylesheet" href="{{asset('signup_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('signup_assets')}}/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="{{asset('signup_assets')}}/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Markazi+Text&display=swap" rel="stylesheet">

    <style type="text/css">
  .container {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
    </style>
</head>

<body style="margin-top: 40px;">
     

     
    <div style="margin-top: 120px;margin-bottom:60px;font-size:16px;">
        <div>
            
            <h5 class="text-center" style="margin-bottom: 20px;font-weight:bold;">{{Auth::user()->name}}'s Profile Image</h5>
           <div style="margin-top: 20px;text-align:center;" >
             <span style="font-size:16px;text-align:center;" class="text-danger">{{ $errors->first('profile_image') }}</span>
            </div>
        </div>
        <div class="text-center" style="margin-bottom: 20px;font-size:16px;">
            <figure class="figure"><img class="rounded-circle img-fluid figure-img" src=" {{asset('images/profile_images')}}/{{Auth::user()->profile_image }}" width="200" height="200" style="margin-top: 20px;">
                @if(Auth::user()->profile_image =='p.png')
                 <figcaption class="figure-caption" style="font-size: 18px;color: rgb(0,0,0);margin-top: 30px;font-weight: normal;">Upload Profile Image</figcaption>
                @else
                <figcaption class="figure-caption" style="font-size: 18px;color: rgb(0,0,0);margin-top: 30px;font-weight: normal;">Update Profile Image</figcaption>
                @endif
            </figure>
        </div>
        <div class="text-center">
        <form enctype="multipart/form-data" action="{{route('user.upload-profile-image',Auth::user()->id)}}"  method="POST">
        @csrf
        <input type="file"   accept='image/*' required  name="profile_image" style="width: 220px;">
        @if(Auth::user()->profile_image =='p.png')
        <button class="btn btn-sm text-center" type="submit" style="background-color: rgb(0,0,0);color: rgb(255,255,255);padding:4px;font-weight:none;text-decoration:none;border-radius:4px; text-transform:capitalize;">Upload</button>
        @else
        <button class="btn btn-sm text-center" type="submit" style="background-color: rgb(0,0,0);color: rgb(255,255,255);padding:4px;font-weight:none;text-decoration:none;border-radius:4px; text-transform:capitalize;">Update</button>
        @endif
        </form>
        </div>
    </div>

</body>

</html>
@endsection