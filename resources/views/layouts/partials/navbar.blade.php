        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="navbar-collapse collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('home') }}"
                                        id="topnav-dashboard" role="button">
                                        <i data-feather="home"></i><span data-key="t-dashboards">Dashboard</span>
                                    </a>
                                </li>

                                @if (Auth::user()->role === 'mahasiswa')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('pengajuan.index') }}"
                                            id="topnav-dashboard" role="button">
                                            <i data-feather="arrow-up"></i><span data-key="t-dashboards">Pengajuan</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('progress') }}"
                                            id="topnav-dashboard" role="button">
                                            <i data-feather="book"></i><span data-key="t-dashboards">Progress Belajar</span>
                                        </a>
                                    </li>
                                @endif

                                @if (Auth::user()->role === 'dosen')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="{{ route('daftar-pengajuan.index') }}" id="topnav-dashboard"
                                            role="button">
                                            <i data-feather="arrow-up"></i><span data-key="t-dashboards">Daftar
                                                Pengajuan</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="{{ route('progressbelajarmhs') }}" id="topnav-dashboard" role="button">
                                            <i data-feather="book"></i><span data-key="t-dashboards">Progress Belajar</span>
                                        </a>
                                    </li>
                                @endif


                            @endauth




                        </ul>
                    </div>
                </nav>
            </div>
        </div>
