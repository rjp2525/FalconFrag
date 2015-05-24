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

    {!! HTML::style(elixir("css/admin.css")) !!}
    {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}
</head>
<body class="page-body">
    <div class="page-container">
        @include('layout.partial.admin.navigation.sidebar')

        <div class="main-content">
            @include('layout.partial.admin.navigation.topbar')
            @yield('content')
        </div>
    </div>
    <div class="page-loading-overlay">
        <div class="arc">
            <div class="arc-cube"></div>
        </div>
    </div>
    {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') !!}
    {!! HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') !!}
    {!! HTML::script('js/core.js') !!}
    {!! Analytics::render() !!}
    <!--<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '{{ env("GOOGLE_ANALYTICS_ID", "UA-00000000-0") }}', 'auto');
        @if(Auth::check())
        ga('set', '&uid', '{{ Auth::id() }}');
        @endif
        ga('send', 'pageview');
    </script>-->
</body>
</html>
