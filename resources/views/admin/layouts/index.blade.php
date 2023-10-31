<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель адміністратора</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="shortcut icon" href="{{asset("storage/images/processing_tab_logo.png")}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    @vite([
    "resources/js/plugins/select2/css/select2.min.css",
    "resources/js/plugins/fontawesome-free/css/all.min.css",
    "resources/js/dist/css/adminlte.min.css",
    "resources/js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
    "resources/js/plugins/daterangepicker/daterangepicker.css",

    ])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-gradient-blue">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img src="{{asset('storage/images/processing_logo.svg')}}" alt="icon">
    </div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-gradient-dark">
        <!-- Sidebar -->
        <div class="sidebar bg-gradient-dark">
            @include("admin.includes.sidebar")
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    @yield("content")

    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@vite([
    "resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js",
    "resources/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
    "resources/js/dist/js/adminlte.js",
    "resources/js/plugins/select2/js/select2.full.min.js",
    "resources/js/plugins/summernote/summernote-bs4.min.js",
    "resources/js/plugins/summernote/summernote-bs4.min.css",
    "resources/js/plugins/daterangepicker/daterangepicker.js",
    "resources/js/plugins/moment/moment.min.js",
    ])

<script type="text/javascript">
    $(document).ready(function () {
        $("#summernote").summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'help']]
            ]
        });
    });
</script>

@livewireScripts
</body>
</html>
