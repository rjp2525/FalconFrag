<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="XL21ThPIdHEt73LbUAr4sLa6tZmXgFUeTwoMnkNS0G8">

        <title>{{ trans('general.site.title') }}</title>

        <meta name="description" content="{{ trans('general.site.description') }}">
        <meta name="keywords" content="{{ trans('general.site.keywords') }}">

        {!! HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css') !!}
        {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}
        <style type="text/css">
            body {
                padding-top: 50px;
            }
        </style>
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ trans('general.site.title') }}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') !!}
        {!! HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') !!}
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-41551742-3', 'auto');
            @if(Auth::check())
            ga('set', '&uid', {{ Auth::id() }});
            @endif
            ga('send', 'pageview');
        </script>

    </body>
</html>
