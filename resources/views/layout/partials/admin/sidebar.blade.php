<nav id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <div class="side-header side-content bg-white-op">
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="gi gi-close"></i>
                </button>
                <a class="h5 text-white" href="#">
                    <i class="gi gi-fire"></i>
                    <span class="h4 sidebar-mini-hide">falcon frag</span>
                </a>
            </div>
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a href="#" class="active">
                            <i class="gi gi-view-dashboard gi-fw"></i>
                            <span class="sidebar-mini-hide">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">
                        <span class="sidebar-mini-hide">Clients</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="gi gi-accounts"></i>
                            <span class="sidebar-mini-hide">View Clients</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                            <i class="gi gi-format-list-bulleted"></i>
                            <span class="sidebar-mini-hide">Products &amp; Services</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">Service Addons</a>
                            </li>
                            <li>
                                <a href="#">Domain Registrations</a>
                            </li>
                            <li>
                                <a href="#">Cancellations</a>
                            </li>
                            <li>
                                <a href="#">Affiliates</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="gi gi-email"></i>
                            <span class="sidebar-mini-hide">Email Clients</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">
                        <span class="sidebar-mini-hide">Social Media</span>
                    </li>
                    <li>
                        <a href="{{ route('admin.social.twitter.index') }}">
                            <i class="gi gi-twitter"></i>
                            <span class="sidebar-mini-hide">Twitter</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
