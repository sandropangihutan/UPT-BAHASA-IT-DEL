<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="javascript:;">
                    <span class="brand-logo">
                        <img src="{{ asset('img/Logo.jpg') }}"></span>
                    <h2 class="brand-text">UPT Bahasa</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Home</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('background') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Background</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('staff') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Staff</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('galleries.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-image">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Gallery</span>
                </a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <span class="menu-title text-truncate">Our service</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('class') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">English class</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('toefl') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">TOEFL</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('translate') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">Translation</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('request-inventories.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">Request Inventory</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('request-rooms.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">Request Room</span>
                        </a>
                    </li>

                </ul>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('inventories.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Raise Support">Inventory</span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('conversations.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-mail">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Conversation</span>
                </a>
            </li>
            @can('Admin')
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Users</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>