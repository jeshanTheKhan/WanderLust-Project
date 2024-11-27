<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="public/user/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="public/user/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="public/user/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
  </head>
  <body>
  
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
@include('layouts.user.sidebar')
        <!-- partial -->
        @yield('content')
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="public/user/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src={{ asset('public/user/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('public/user/js/off-canvas.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html>