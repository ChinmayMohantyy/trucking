<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="assets/img/logo.png" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#login"
                                class="crs_yuo12 w-auto text-white theme-bg">
                                <span class="embos_45"><i class="fas fa-sign-in-alt mr-1"></i>Log In</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">

                @if (Auth::check())
                    <ul class="nav-menu">

                        <li class="active"><a href="/find-load">Find Loads<span class="submenu-indicator"></span></a>

                        </li>

                        <li><a href="/truck-profile">Post TrucksProfile<span class="submenu-indicator"></span></a>

                        </li>

                        <li><a href="/my-loade">My Loads<span class="submenu-indicator"></span></a>

                        </li>

                        <li><a href="/tool-service">Tool & Services</a></li>

                    </ul>
                @endif

                <ul class="nav-menu nav-menu-social align-to-right">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    RTD
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/my-profile"> My Profile</a>
                                    <a class="dropdown-item" href="#"> Payments</a>
                                    <a class="dropdown-item" href="#"> Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>

                            </li>
                        @else
                            <li>
                                @if (Route::has('login'))
                                    <a href="{{ url('/login') }}" class="alio_green">
                                        <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Log In</span>
                                    </a>
                                @endif
                            </li>
                            <li class="add-listing theme-bg">
                                @if (Route::has('register'))
                                    <a href="{{ url('register') }}" class="text-white">SIGN UP</a>
                                @endif
                            </li>
                        @endauth
                    @endif


                </ul>
            </div>
        </nav>
    </div>
</div>
