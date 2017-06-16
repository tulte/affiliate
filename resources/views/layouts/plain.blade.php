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
        <link rel="stylesheet" href="/css/dark.css">
        <link rel="stylesheet" href="/css/custom.css">

    </head>
    <body>

        <div class="wrapper">


        @yield('content')


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
