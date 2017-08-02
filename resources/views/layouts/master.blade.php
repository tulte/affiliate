<html>
    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="@yield('title')">
        <meta name="twitter:description" content="@yield('description')">
        <meta name="twitter:image" content="{{url()->current()}}/{{$site->meta_image}}">

        <!-- Open Graph data -->
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url()->current()}}/{{$site->meta_image}}" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:site_name" content="Vergleiche und Informationen" />


        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/header-default.css">
        <link rel="stylesheet" href="/css/footer-default.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/line-icons.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/site.css">
        <link rel="stylesheet" href="/css/topic.css">
        <link rel="stylesheet" href="/css/dark.css">
        <link rel="stylesheet" href="/css/custom.css">

    </head>
    <body>

        <div class="wrapper">


<!--=== Header v1 ===-->
        <div class="header-v1">


            <!-- Navbar -->
            <div class="navbar navbar-default mega-menu" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                            <img id="logo-header" src="/{{$site->meta_image}}" alt="Logo">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                        <ul class="nav navbar-nav nav-main">
                            @foreach($site->topics as $topic)
                                <li>
                                    <a href="{{route('affiliate.topic', [$topic->name])}}" >{{$topic->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div><!--/navbar-collapse-->
                </div>
            </div>
            <!-- End Navbar -->
        </div>
        <!--=== End Header v1 ===-->

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
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" target="blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?hashtags={{env('APP_TAGS')}}&original_referer=https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button&ref_src=twsrc%5Etfw&related=twitterapi%2Ctwitter&text=@yield('description')&tw_p=tweetbutton&url={{env('APP_URL')}}" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
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

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-103840132-1', 'auto');
      ga('set', 'anonymizeIp', true);
      ga('send', 'pageview');

    </script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
        });
    </script>
    </body>
</html>
