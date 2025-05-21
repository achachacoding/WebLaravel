<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Web Laravel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('pengunjung/img/favicon.png')}}" rel="icon">
  <link href="{{asset('pengunjung/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('pengunjung/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('pengunjung/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('pengunjung/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('partial.header')
  <!-- End Header -->


  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('partial.footer')
 <!-- End Footer -->
 

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('pengunjung/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('pengunjung/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('pengunjung/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('pengunjung/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('pengunjung/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('pengunjung/js/main.js')}}"></script>

</body>

</html>