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
        <!--=== Header ===-->
        <div class="header">
            <div class="container">
                <!-- Logo -->
                <a class="logo" href="index.html">

                </a>
                <!-- End Logo -->



                <!-- Toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <!-- End Toggle -->
            </div><!--/end container-->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                <div class="container">
                    <ul class="nav navbar-nav">
                        @foreach($topics as $topic)
                            <li>
                                <a href="route('affiliate.topic.compare', [$topic->name])" >{{$topic->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div><!--/end container-->
            </div><!--/navbar-collapse-->
        </div>

        @yield('content')

      <!--=== Footer Version 1 ===-->
        <div class="footer-v1">


            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                2017 &copy; Copyright
                                <a href="/datenschutz">Datenschutz</a> | <a href="/impressum">Impressum</a>
                            </p>
                        </div>

                        <!-- Social Links -->
                        <div class="col-md-6">
                            <ul class="footer-socials list-inline">
                                <li>
                                    <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social Links -->
                    </div>
                </div>
            </div><!--/copyright-->
        </div>
        <!--=== End Footer Version 1 ===-->
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
