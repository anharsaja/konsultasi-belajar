        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('home') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo/logo-dark.png') }}" alt=""
                                    height="50"> <span {{-- class="logo-txt">Minia</span> --}} </span>
                        </a>

                        <a href="{{ route('home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo/logo-light.png') }}" alt=""
                                    height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo/logo-light.png') }}" alt=""
                                    height="50"> <span {{-- class="logo-txt">Minia</span> --}} </span>
                        </a>
                    </div>

                    <button type="button"
                        class="btn btn-sm font-size-16 d-lg-none header-item waves-effect waves-light px-3"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="btn btn-primary" type="button"><i
                                    class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>
                    <div class="dropdown d-none d-sm-inline-block flex">
                        <a href="{{ route('notification') }}" class="btn header-item flex"
                            style="display: flex; align-items:center;"><i data-feather="bell" class="icon-lg"></i><span
                                class="badge bg-danger"
                                style="height: 10px; width: 10px">{{ session('unread_notifications') ? ' ' : '' }}</span></a>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span class="d-none d-xl-inline-block fw-medium ms-1">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" style="min-width: 100%">
                            <!-- item-->
                            <form action="{{ route('logout') }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item">
                                    <i class="mdi mdi-logout font-size-16 me-1 align-middle"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
