<html>
    <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

        <title>Wetterstation</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/header-default.css">
        <link rel="stylesheet" href="/css/footer-default.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/line-icons.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/page_pricing.css">
        <link rel="stylesheet" href="/css/dark.css">
        <link rel="stylesheet" href="/css/custom.css">

    </head>
    <body>

        <div class="wrapper">


        <div class="container content">
            <div class="row">
                <!-- Begin Sidebar Menu -->
                <div class="col-md-3">
                    <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
                        <!-- System -->
                        <li class="list-group-item list-toggle collapse">
                            <a data-parent="#sidebar-nav">System</a>
                            <ul id="collapse-typography" class="collapse in">
                                <li><a href="{{route('admin.index')}}">User</a></li>
                                <li><a href="{{route('admin.index')}}">Layout</a></li>
                            </ul>
                        </li>
                        <!-- End System -->

                        <!-- Affiliate -->
                        <li class="list-group-item list-toggle collapse">
                            <a data-parent="#sidebar-nav">Affiliate</a>
                            <ul id="collapse-typography" class="collapse in">
                                <li><a href="{{route('admin.index')}}">Topics</a></li>
                                <li>
                                    <a href="{{route('admin.index')}}"></i>Features</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Affiliate -->


                    </ul>
                </div>
                <!-- End Sidebar Menu -->

                <!-- Begin Content -->
                <div class="col-md-9">
                    @yield('content')
                </div>
                <!-- End Content -->




        </div><!--/wrapper-->

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/back-to-top.js"></script>
    <script type="text/javascript" src="/js/smoothScroll.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
        });
    </script>
    </body>
</html>
