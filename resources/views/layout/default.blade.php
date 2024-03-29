<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Falcon Frag Networks')</title>

    <meta name="description" content="">

    {!! HTML::style(elixir('css/style.css')) !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body {!! (if_route(['default.home']) ? 'class="homepage"' : ''); !!}>
  <nav class="navbar navbar-default navbar-fixed-top down" role="navigation">
      <div class="header-top">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-md-offset-6 text-right">
                      <ul class="header-top-links">
                          <li><a href="{{ route('default.network') }}">Network Status</a></li>
                          <li><a href="{{ route('help.index') }}">Support</a></li>
                          <li><a href="#">Client Portal</a></li>
                          <li><a href="#">Partners</a></li>
                          <li><a href="{{ route('help.index') }}">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="container navbar-relative-container">
          <div class="navbar-header">
              <button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="{{ route('default.home') }}" class="navbar-brand">
                <div class="nav-logo"></div>
                <p class="sr-only">Falcon Frag</p>
              </a>
          </div>
          <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                  <li {!! (if_route(['default.home']) ? 'class="active"' : ''); !!}>
                      <a href="{{ route('default.home') }}">Home</a>
                  </li>
                  <li {!! (if_route(['default.about']) ? 'class="active"' : ''); !!}>
                      <a href="{{ route('default.about') }}">About</a>
                  </li>
                  <li class="dropdown {!! (if_route(['product.index', 'product.category', 'product.detail']) ? 'class="active"' : ''); !!}">
                      <a href="{{ route('product.index') }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                          Hosting Services <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        @forelse($product_categories as $product_category)
                          <li>
                            <a href="{{ route('product.category', $product_category->slug) }}">{{ $product_category->title }}</a>
                          </li>
                        @empty
                          <li>
                            <a>No services</a>
                          </li>
                        @endforelse
                      </ul>
                  </li>
                  <li {!! (if_route(['default.network']) ? 'class="active"' : ''); !!}>
                      <a href="{{ route('default.network') }}">Network</a>
                  </li>
                  <li {!! (if_route(['help.index']) ? 'class="active"' : ''); !!}>
                      <a href="{{ route('help.index') }}">Support</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  @yield('content')

  <footer>
    <div class="footer-content">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <h3 class="section-title">About Falcon Frag</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur ac velit sed laoreet. Duis pulvinar in ante at ornare. Nulla porta lobortis sodales. Nam a est nibh. Nam vehicula pulvinar hendrerit. Duis tellus lacus, lacinia sit amet euismod.</p>
          </div>
          <div class="col-md-3 col-sm-6">
            <h3 class="section-title">Quick Navigation</h3>
            <ul class="footer-menu">
              <li>
                <a href="#">Client Portal</a>
              </li>
              <li>
                <a href="#">Community Forum</a>
              </li>
              <li>
                <a href="#">Content &amp; Support</a>
              </li>
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              <li>
                <a href="{{ route('default.legal.tos') }}">Terms of Service</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h3 class="section-title">Latest Updates</h3>
            <ul class="footer-menu twitter">
              <li>
                <div class="tweet">
                  Happy New Year! We have some great plans for our 2015 opening, so stay tuned :)
                  <span>7 Months Ago</span>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h3 class="section-title">Contact</h3>
            <ul class="footer-menu contact">
              <li>
                <i class="mi mi-phone"></i>
                <span>+1-800-555-1234</span>
              </li>
              <li>
                <i class="mi mi-globe"></i>
                <span>Open a ticket</span>
              </li>
              <li>
                <i class="mi mi-email"></i>
                <span>support@falconfrag.com</span>
              </li>
            </ul>
            <ul class="list-inline social">
              <li>
                <a href="#" class="facebook" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                  <i class="mi mi-facebook mi-fw"></i>
                </a>
              </li>
              <li>
                <a href="#" class="twitter" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                  <i class="mi mi-twitter mi-fw"></i>
                </a>
              </li>
              <li>
                <a href="#" class="google-plus" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+">
                  <i class="mi mi-google-plus mi-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-legal">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <span>Copyright &copy; 2013-2016 <a href="{{ route('default.home') }}">Falcon Frag</a>. All Rights Reserved.</span>
          </div>
          <div class="col-md-6 col-sm-12">
            <ul class="legal-links">
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              <li>
                <a href="{{ route('default.legal.tos') }}">Terms of Service</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {!! HTML::script(elixir('js/application.js')) !!}
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-41551742-3', 'auto');
    ga('send', 'pageview');
  </script>
</body>
</html>
