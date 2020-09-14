
@extends('master_layouts.app')
@section('content1')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Markazi+Text&display=swap" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="view_contact_assets/fonts/fontawesome-all.min.css">
    <style type="text/css">
  #btn{

    border:none;
    background-color:#7664A8;
    color:white;
    padding-left:20px;
     padding-right:20px;
     border-top-right-radius:5px;
     border-bottom-right-radius:5px;
     outline:0;
  }
  #btn:hover{
background-color:#FFC300;
color:black;

  }


  #btn-2{
background-color:#FFC300;
color: black;
border-radius:4px;
font-size:13px;
padding:6px;
border:none;
}
  

#btn-2:hover{
background-color:black;
color:#FFC300;
transition:.3s all;
  }
  </style>
</head>
<body>




    <div class="container">

    <div">
    <div style="margin-top:150px;margin-bottom:50px;" class="container ">

     
  <form action="{{route('search')}}" method="get">
   @csrf
    <div class="input-group mb-3">
  
      <input required style="padding:25px;" type="text" class="form-control " value="{{request()->input('query')}}" placeholder="Search Contact"  name="query">
    
     <button id="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="input-group-append">
            
      </div>
    </div>
    
  </form>
</div>
        
    <h3 style="text-align:center; font-weight:bold;">Search Results</h3>
     <p style="text-align:center;">{{ $contacts->count()}} result for {{ request()->input('query') }}</p>
         
        
            <div class="row" style="padding: 50px;">
            @foreach($contacts as $contact) 
           
                <div  class="col-md-4">
                    <div class="card" style="margin-bottom: 50px;" >
                        <div style="box-shadow:0px 0px 4px  black;" class="card-body">
                            <div class="text-center"><img style="border-radius:50%;" class="img-fluid" width="150" height="150" src="{{asset('images/contact_images')}}/{{$contact->profile_image}}"></div>
                           <br>
                            <h4 style="font-size:18px;font-weight:bold;margin-bottom:22px;" class="text-center card-title">{{$contact->name}}   
                            &nbsp;&nbsp;&nbsp; <a href="{{ route('contact.edit',$contact->id)}}"><i style="color:#7FA246;" class="fas fa-edit"></i></a>
                            <!-- @if($contact->gender=='male')
                           <i title="male" class="fa fa-male"></i>
                            @else
                            <i title="female" class="fas fa-female"></i>
                            @endif</h4> -->
                             <h6  class="text-center card-text" style="font-size: 16px;font-weight: bold;margin-bottom:25px;"><i class="fas fa-address-card"></i> {{$contact->address}}<br></h6>
                            <h6 style="font-size:15px;margin-top:20px;font-weight:bold;color:black;" class="text-center card-text"> <i class="fas fa-phone"></i> {{$contact->phone}}<br><br></h6>
                            <h6  class="text-center card-text" style="font-size: 16px;font-weight: bold;margin-bottom:25px;"><i class="fas fa-envelope"></i> {{$contact->email}}<br></h6>
                              
                             <a  href="{{ route('contact.destroy',$contact->id) }}"><h6  class="text-center card-text" style="font-size: 16px;font-weight: bold;margin-bottom:25px;"><button class="btn" style="background-color:red;border:none;outline:none;color:white;" >Remove</button></a>&nbsp;<a  href="{{ route('share-contact',$contact->id) }}"><button class="btn" style="background-color:#49B6EA;border:none;outline:none;color:white;" >Share</button></a></h6><br>
                             
  

                        </div>
                    </div>
                </div>
            @endforeach    
            </div>
         

        </div>
    </div>



</body>
</html>


@endsection