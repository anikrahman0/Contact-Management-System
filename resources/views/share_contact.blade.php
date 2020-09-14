@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{asset('edit_contact_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('edit_contact_assets')}}/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="{{asset('edit_contact_assets')}}/css/styles.css">
</head>

<body>
  <div class="container">
      <br><br>
    <div  class="contact-clean">
    <form action="{{route('share-contact-send')}}" method="post" style="background-color:#7565AC;">
        @csrf
            <div class="text-center text-white" style="font-size:25px;"><i title="share contact" class="fa fa-share-alt" style="color:white;font-size:28px;" aria-hidden="true"></i>Share Contact</div>
           <br><br>
            <div class="form-group"><input class="form-control {{ $errors->has('share_email') ? 'is-invalid' : ''}}" value="" type="email" name="share_email" value="{{ old('share_email') }}"  placeholder="Share With Email"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('share_email') }}</small></div>
            <br>
            <div class="form-group"><button  class="btn  btn-block" style="background-color:rgb(190,210,112);color:black;" type="submit">Share Contact</button></div>
            <div class="form-group"><input class="form-control {{ $errors->has('sender_name') ? 'is-invalid' : ''}}" value="{{ $contact->user->name }}" type="hidden" name="sender_name"  placeholder="Name"><small class="form-text text-white"  style="background-color:red;">{{ $errors->first('sender_name') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : ''}}" value="{{ $contact->name }}" type="hidden" name="contact_name"  placeholder="Name"><small class="form-text text-white"  style="background-color:red;">{{ $errors->first('contact_name') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : ''}}" value="{{ $contact->email}}" type="hidden" name="contact_email" placeholder="Email"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('contact_email') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" value="{{ $contact->phone}}" type="hidden"  name="phone" placeholder="Phone No"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('phone') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('contact_address') ? 'is-invalid' : ''}}" type="hidden" value="{{ $contact->address }}"  name="contact_address" placeholder="Address(Optional)"><small class="form-text text-white bg-red">{{ $errors->first('contact_address') }}</small><br>
            </div>
         </form>
    </div>
 </div>
 <br>
    <script src="edit_contact_assets/js/jquery.min.js"></script>
    <script src="edit_contact_assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
@endsection