<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/logo1.png') }}">
    <title>Petugas RS Aisyiyah Muntilan</title>
    <link href="{{ asset('backend/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('layouts.petugasLayout.petugas_header')
        @include('layouts.petugasLayout.petugas_sidebar')
        <div class="page-wrapper">

            <div class="container-fluid">
            @yield('content')
            </div>

            @include('layouts.petugasLayout.petugas_footer')
        </div>
    </div>
 
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{asset('backend/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{asset('backend/dist/js/pages/chart/chart-page-init.js') }}"></script>
    <script src="{{asset('backend/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{asset('backend/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{asset('backend/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <script type="application/javascript">
      function isNumberKeyTrue(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 65)
                return false;         
             return true;
          }
    </script>
    <script>
        $('#zero_config').DataTable();
    </script>

@yield('extra-js')
</body>

</html>