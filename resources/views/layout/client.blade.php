<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Falcon Frag Networks')</title>

    <meta name="description" content="">

    {!! HTML::style(elixir('css/style.css')) !!}
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="header-top">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-md-offset-6 text-right">
                      <ul class="header-top-links">
                          <li><a href="#">Network Status</a></li>
                          <li><a href="#">Support</a></li>
                          <li><a href="#">Client Portal</a></li>
                          <li><a href="#">Partners</a></li>
                          <li><a href="#">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('client.index') }}" class="navbar-brand">{{ trans('titles.navbar.brand') }}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('default.home') }}">Home</a>
                    </li>
                @if(Auth::user())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->first_name.' '.Auth::user()->last_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">{{ trans('client.navbar.update') }}</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">{{ trans('client.navbar.login') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ trans('client.navbar.register') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    {!! HTML::script(elixir('js/application.js')) !!}
</body>
</html>
