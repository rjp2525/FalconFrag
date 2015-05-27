<nav class="navbar user-info-navbar" role="navigation">
    <ul class="user-info-menu left-links list-inline list-unstyled">
        <li class="hidden-sm hidden-xs">
            <a href="#" id="sidebar-collapse-toggle">
                <i class="fa-bars"></i>
            </a>
        </li>
        <li class="dropdown hover-line">
            <a href="#" data-toggle="dropdown">
                <i class="fa-envelope-o"></i>
                <span class="badge badge-green">1</span>
            </a>
        </li>
        <li class="dropdown hover-line">
            <a href="#" data-toggle="dropdown">
                <i class="fa-bell-o"></i>
                <span class="badge badge-orange">6</span>
            </a>
        </li>
    </ul>
    <ul class="user-info-menu right-links list-inline list-unstyled">
        <li class="search-form">
            <form action="#" method="GET">
                <input type="text" name="s" class="form-control search-field" placeholder="Type to search...">
                <button type="submit" class="btn btn-link">
                    <i class="fa-search"></i>
                </button>
            </form>
        </li>
        <li class="dropdown user-profile">
            <a href="#" data-toggle="dropdown">
                <img src="https://placehold.it/32" alt="user-image" class="img-circle img-inline userpic-32" width="28">
                <span>
                    {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name[0]) }}.
                    <i class="fa-angle-down"></i>
                </span>
            </a>
            <ul class="dropdown-menu user-profile-menu list-unstyled">
                <li>
                    <a href="#settings">
                        <i class="fa-wrench"></i>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ action('AuthController@logout') }}">
                        <i class="fa-sign-out"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" data-toggle="chat">
                <i class="fa-comments-o"></i>
            </a>
        </li>
    </ul>
</nav>
