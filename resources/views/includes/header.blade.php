<div class="top_nav" style="width: 100%; float: left;">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle" class="visible-xs"><i class="fa fa-bars"></i></a>
                <h3 style="margin: 0; line-height: 58px; padding: 0 15px;">@yield('title')</h3>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ (Auth::user()->avatar_url ? Auth::user()->avatar_url['thumbnail'] : '/images/user.png' ) }}" alt="">{{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        </li>
                        <li>
                            <a href="{{ url('panel/profile') }}">Perfil</a>
                        </li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> SAIR</a>
                        </li>
                    </ul>
                </li>

                {{--<li role="presentation" class="dropdown">
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                        <li>
                            <a>
                                <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>--}}
            </ul>
        </nav>
    </div>

</div>