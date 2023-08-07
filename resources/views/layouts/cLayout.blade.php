<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDINOVA - Hospital Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{asset("https://fonts.gstatic.com")}}">
    <link href="{{asset("https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap")}}" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("assets/client/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/client/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css")}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("assets/client/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("assets/client/css/style.css")}}" rel="stylesheet">
</head>

<body>
   

    @include('client.components.navbar')

    <div class="" id="client_content">
        @yield('content')
    </div>   

    @include('client.components.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{asset("https://code.jquery.com/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/easing/easing.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/waypoints/waypoints.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/owlcarousel/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/tempusdominus/js/moment.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/tempusdominus/js/moment-timezone.min.js")}}"></script>
    <script src="{{asset("assets/client/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js")}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset("assets/client/js/main.js")}}"></script>
</body>

</html>