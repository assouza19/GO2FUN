<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/')}}" class="site_title"><i class="fa fa-location-arrow"></i> <span>GO2FUN</span></a>
        </div>
        <div class="clearfix"></div>

        <div class="profile">
            <div class="profile_pic">
                <img src="/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bem vindo(a),</span>
                <h2> {{ Auth::user()->nome }} </h2>
            </div>
        </div>

        <br />

        <!-- Barra lateral -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Eventos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ url('/') }}">Geral</a>
                            </li>
                            <li><a href="{{ url('panel/confirmed') }}">Confirmados</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('panel/profile') }}"><i class="fa fa-edit"></i> Meu Perfil</a></li>
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Sair</a>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>