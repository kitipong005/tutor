<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" />
    

    <!-- Animation library for notifications   -->
    <link href="admin/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="admin/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="admin/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
        <div class="wrapper">
            @include('admin.layouts.sidebar')
            <div class="main-panel">
                @include('admin.layouts.navbar')
                @yield('dashbord-content')
            </div>
        </div>




     <!--   Core JS Files   -->
     <script src="admin/js/jquery.3.2.1.min.js" type="text/javascript"></script>
     <script src="admin/js/bootstrap.min.js" type="text/javascript"></script>
 
     <!--  Charts Plugin -->
     <script src="admin/js/chartist.min.js"></script>
 
     <!--  Notifications Plugin    -->
     <script src="admin/js/bootstrap-notify.js"></script>
 
     <!--  Google Maps Plugin    -->
     <script type="admin/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 
     <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
     <script src="admin/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
 
</body>
</html>