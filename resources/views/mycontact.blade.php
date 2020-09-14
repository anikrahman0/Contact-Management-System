
@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>newview</title>
    <link rel="stylesheet" href="view_contact_assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view_contact_assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="view_contact_assets/css/styles.css">
    <style type="text/css">
    
    </style>
</head>

<body>
<br><br>  <br><br>  <br><br>
    <div class="text-center" style="">
        <div class="container">
            <div class="row" >
                <div class="col-md-6 text-left">
                  <form action="{{route('search')}}" method="get">
                 @csrf
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Search Contact</span></div><input name="query" required value="{{request()->input('query')}}" class="form-control" type="text">
                        <div class="input-group-append"><button class="btn btn-primary" type="submit" style="border-top-right-radius:4px;border-bottom-right-radius:4px;background-color:#7664A8;" type="button"><i class="fas fa-search"></i></button></div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                    <p class="text-right"><a href="{{route('user.newcontact')}}"><button class="btn btn-primary text-right" type="button" style="border:none;border-radius:4px;background-color:#7664A8;font-size:15px;">Add New Contact&nbsp;<i class="fas fa-plus-circle"></i>&nbsp;</button></a></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if(Session::has('success'))      
 <center>
 <div style="" class="form-group ">           
 <span style="background-color:black;border-radius:5px;width:400px;text-shadow:0px 0px 5px #DAF7A6;padding:15px;color:#DAF7A6;font-size:17px;"  class="form-text ">{{Session::get('success')}}</span>
 </div>
</center>
 @endif
  <br>
    <div class="table-responsive" style="padding:20px;">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left">Profile</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Share</th>
                </tr>
            </thead>
            <tbody>
             @if($contact->count() > 0 )
             @foreach( $contact as $con)
                <tr>
                    <td>&nbsp;<a href="{{route('upload-contact-image-get',$con->id)}}"><img src="{{asset('images/contact_images')}}/{{$con->profile_image }}" width="100"></a></td>
                    <td>
                        <p style="margin-top: 35px;font-size:16px;">{{ $con->name }}<br></p>
                    </td>
                    <td>
                        <p style="margin-top: 35px;font-size:16px;">{{ $con->phone }}<br></p>
                    </td>
                    <td>
                        <p style="margin-top: 35px;font-size:16px;">{{ $con->email }}<br></p>
                    </td>
                    <td>
                        <p style="margin-top: 35px;font-size:16px;">{{ $con->address }}<br></p>
                    </td>
                    <td>
                        <p class="text-center" style="margin-top: 35px;font-size:16px;">{{ $con->gender }}<br></p>
                    </td>
                    <td>&nbsp;
                        <a href="{{ route('contact.edit',$con->id) }}"><p class="text-center"><i title="edit contact" class="fas fa-edit" style="margin-top: 20px;font-size:14px;color: rgb(76,145,34);"></i></p></a>
                    </td>
                    <td>&nbsp; &nbsp;
                        <a  href="{{ route('contact.destroy',$con->id) }}"><p class="text-center" style="margin-top: 20px;font-size:14px;"><i title="remove contact" class="fas fa-trash-alt" style="color: rgb(200,36,36);"></i></p></a>
                    </td>

                     <td>&nbsp; &nbsp;
                        <a  href="{{ route('share-contact',$con->id) }}"><p class="text-center" style="margin-top: 2px;font-size:8px;"><i title="share contact" class="fa fa-share-alt" style="color:#59B7ED;" aria-hidden="true"></i></p></a>
                    </td>
                </tr>
            @endforeach
            @else
          
             <tr>
                <td></td>
                <td></td>
                <td></td>
                <td >
                  <center>
                <p style="margin-top:50px;">The Contact List is Empty.</p>
                 </center>
                </td>
                <td></td>
                <td></td>
                <td></td>
             </tr>
            
             @endif
          
            </tbody>
        </table>
    </div>
    <script src="view_contact_assets/js/jquery.min.js"></script>
    <script src="view_contact_assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
