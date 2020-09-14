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
    <form action="{{route('contact.update', $contact->id)}}" method="post" style="background-color:#7565AC;">
        @csrf
            <h2 class="text-center" style="color:white;">Edit Contact</h2>
            <div class="form-group"><input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{ $contact->name }}" type="text" name="name" placeholder="Name"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('name') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ $contact->email}}" type="email" name="email" placeholder="Email"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('email') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" value="{{ $contact->phone}}" type="text" name="phone" placeholder="Phone No"><small class="form-text text-white" style="background-color:red;">{{ $errors->first('phone') }}</small></div>
            <div class="form-group"><input class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" type="text" value="{{ $contact->address }}" name="address" placeholder="Address(Optional)"><small class="form-text text-white bg-red">{{ $errors->first('address') }}</small>
            </div>
           <select name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : ''}}">
          <option style="font-weight:bold;" disabled   selected>Choose your gender</option>
          <option value="male" {{ $contact->gender == 'male' ? 'selected' : '' }} >Male</option>
         <option value="female" {{ $contact->gender == 'female' ? 'selected' : '' }}>Female</option>

           </select>
      <small class="form-text text-white" style="background-color:red;">{{ $errors->first('gender') }}</small><br>
<div class="form-group"><button  class="btn  btn-block" style="background-color:rgb(190,210,112);color:black;" type="submit">Update Contact</button></div>
    </form>
    </div>
 </div>
 <br>
    <script src="edit_contact_assets/js/jquery.min.js"></script>
    <script src="edit_contact_assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
@endsection