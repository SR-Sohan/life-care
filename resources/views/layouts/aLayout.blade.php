<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/admin') }}/"
  data-template="vertical-menu-template"
>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard-Life Care</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/dataTables.min.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{url("https://cdn.jsdelivr.net/npm/sweetalert2@11")}}"></script>
    <script src="{{url("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js")}}" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{url("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js")}}"></script>
    <script src="{{ asset('assets/admin') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/admin') }}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/admin') }}/js/config.js"></script>
    <script src="{{ asset('assets/admin') }}/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/custom.js"></script>
    
    <script>        
      $(document).ready(function () {      
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
      });
      
  </script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
            @include('admin.components.aside')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('admin.components.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div id="admin_content" class="container-xxl flex-grow-1 container-p-y">
                @yield('acontent')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('admin.components.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script>
    showLoading();
    </script>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/admin') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('assets/admin') }}/vendor/libs/hammer/hammer.js"></script>

    <script src="{{ asset('assets/admin') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('assets/admin') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/admin') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/admin') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/admin') }}/js/dashboards-analytics.js"></script>
  </body>
</html>
