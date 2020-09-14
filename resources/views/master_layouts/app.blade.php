<html>
<head>
        <title> @yield('title')</title>


</head>
<body style="background-color:white;">
@include('master_layouts.header')


@yield('content1')



@include('master_layouts.footer')
</body>
</html>