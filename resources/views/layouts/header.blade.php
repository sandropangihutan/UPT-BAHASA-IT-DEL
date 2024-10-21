<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ Auth::user()->username }}</span>
                        <span class="user-status">{{ Auth::user()->role->name }}</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset('img/User.png') }}" alt="avatar" height="40"width="40">
                        </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fa fa-power-off"></i>
                        <i class="me-50"data-feather="power"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>