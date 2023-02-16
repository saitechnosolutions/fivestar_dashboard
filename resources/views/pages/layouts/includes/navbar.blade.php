<div class="sidebar-wrapper" data-simplebar="true" style="background-color:##0073af">
    <div class="sidebar-header">
        <div>
            {{-- <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon"> --}}
        </div>
        <div>
            <h4 class="logo-text">Five Star </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu" style="background-color:#00235a">
        <li>
            <a href="/dashboard" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li class="menu-label">Menus</li>
        {{-- @dd(Request::path()); --}}




        <li>
            <a href="/events">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Events</div>
            </a>
        </li>





    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown dropdown-large">

                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count"></span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications </p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>


                        </div>
                    </li> --}}

                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/images/avatars/user.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0 text-white">{{auth()->user()->name}}</p>
                        {{-- <p class="designattion mb-0 text-white">
                            @if(auth()->user()->role == 1)
                                Admin
                                @elseif (auth()->user()->role == 2)
                                Office Staff
                                @elseif (auth()->user()->role == 3)
                                Broker
                            @endif
                        </p> --}}
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">

                    <li><a class="dropdown-item" href="logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
