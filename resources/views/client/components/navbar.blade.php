 <!-- Topbar Start -->
 <div class="container-fluid py-2 border-bottom d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body ps-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Medinova</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{url("/")}}" class="nav-item nav-link active">Home</a>
                    <a href="{{url("/doctor")}}" class="nav-item nav-link">Find Doctor</a>
                    <a href="{{url("/appointment")}}" class="nav-item nav-link">Appointment</a>
                    <a href="{{url("/about")}}" class="nav-item nav-link">About</a>
                    <a href="{{url("/contact")}}" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->