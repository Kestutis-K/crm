@if (Auth::guest())

@else
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>SB CRM</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Labas,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Pagrindinis meniu</h3>
                <ul class="nav side-menu">
                    <li><a href="/"><i class="fa fa-home"></i> Pradžia </a>
                    </li>
                    <li><a><i class="fa fa-users"></i> Klientai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/clients">Visi klientai</a></li>
                            <li><a href="/clients/create">Sukurti klientą</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-users"></i> Užsakymai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/orders">Visi užsakymai</a></li>
                            <li><a href="/orders/create">Sukurti užsakymą</a></li>
                        </ul>
                    </li>

                    @if (! Gate::allows('admin'))
                    @else
                    <li><a><i class="fa fa-gears"></i>Valdymas <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('users.index')}}">Vartotojai</a></li>
                            <li><a href="{{route('companies.edit', 1)}}">Įmonės nustatymai</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Atsijungti" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
@endif