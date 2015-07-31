<!DOCTYPE html>
<!--[if IE 9]><html class="ie9 no-focus"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-focus"><!--<![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Falcon Frag Networks</title>

    <meta name="description" content="">

    {!! HTML::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700') !!}
    {!! HTML::style(elixir('css/admin.css')) !!}
</head>
<body>
    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
        @include('layout.partials.admin.sidebar')
        @include('layout.partials.admin.header')
        <div id="main-container">
            @yield('content')
        </div>
    </div>
    {!! HTML::script(elixir('js/admin/application.js')) !!}
</body>
</html>
