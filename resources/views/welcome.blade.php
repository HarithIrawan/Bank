<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
        <title>Bank Sampah</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


{{-- <link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="{{ asset('vendorHome/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/animate.css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/icofont/icofont.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/boxicons/css/boxicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/venobox/venobox.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/owl.carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendorHome/aos/aos.css') }}">

<!-- Template Main CSS File -->
<link rel="stylesheet" href="{{ asset('vendorHome/css/style.css') }}">

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top header-transparent">
            <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href=""><span>Bank Sampah</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            @if (Route::has('login'))
                <nav class="nav-menu float-right d-none d-lg-block hidden fixed">
                    <ul>
                        @auth
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li class="active"><a href="{{ route('logout1') }}">Logout</a>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </nav><!-- .nav-menu -->
            @endif

        </div>

        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex justify-cntent-center align-items-center">
            <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Bank Sampah</span></h2>
                    <p class="animate__animated animate__fadeInUp">Bank Sampah merupakan sebuah wadah yang mewadahi para masyarakat untuk menukarkan barang yang bisa didaur ulang menjadi uang.</p>
                    {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a> --}}
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Bank Sampah Gresik</h2>
                    <p class="animate__animated animate__fadeInUp">Alamat : Jl. Veteran No.1, Gresik, Jawa Timur 66666. No. Telepon : 0811-1111-1111</p>
                    <p class="animate__animated animate__fadeInUp">Buka setiap hari jam 06.00-12.30, 16.00-21.00</p>
                    {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a> --}}
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        </section><!-- End Hero -->

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('vendorHome/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendorHome/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendorHome/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('vendorHome/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('vendorHome/venobox/venobox.min.js') }}"></script>
        <script src="{{ asset('vendorHome/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendorHome/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('vendorHome/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendorHome/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendorHome/aos/aos.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('vendorHome/js/main.js') }}"></script>

    </body>

</html>
