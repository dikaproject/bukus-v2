<!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{asset('assets/images/smktelkompwt-logore.png')}}" alt="" class="logo logo-lg" />
                    <img src="{{asset('assets/images/smktelkompwt-logore.png')}}" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="/dashboard" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @cancan('regulation-list', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('pasal.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-book"></i></span>
                            <span class="nxl-mtext">Pasal</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                    @cancan('student-list', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('students.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">Siswa</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                    @cancan('teacher-list', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admins.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">Admin / Guru</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                    @cancan('poins-list', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('poin.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-file"></i></span>
                            <span class="nxl-mtext">Data Poin</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            @cancan('reduction-list', 'web|admin')
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('reduces.index') }}">Reduce Settings</a></li>
                            @endcancan
                            @cancan('permission-list', 'web|admin')
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('permissions.index') }}">Permissions</a></li>
                            @endcancan
                            @cancan('role-list', 'web|admin')
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcancan
                            @cancan('student-list', 'web|admin')
                            <li class="nxl-item"><a class="nxl-link" href="{{route('settings.poins-prestasi')}}">Rekap Data Prestasi</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('settings.poins-berbintang') }}">Rekap Siswa Berbintang</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{route('settings.poins-pelanggaran')}}">Rekap Data Pelanggaran</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="">Rekap Data Siswa</a></li>
                            @endcancan
                        </ul>
                    </li>
                    @cancan('poins-approve', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('poin.confirm.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-triangle"></i></span>
                            <span class="nxl-mtext">Konfirmasi Poins</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                    @cancan('class-transfer', 'web|admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.pindahkelas.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-shuffle"></i></span>
                            <span class="nxl-mtext">Pindah Kelas</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    @endcancan
                </ul>
            </div>
        </div>
    </nav>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
