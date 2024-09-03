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
                <li class="nxl-item">
                    <a href="/siswa" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Home</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('student.pasal') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-book"></i></span>
                        <span class="nxl-mtext">Pasal</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="/pasalll" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-book"></i></span>
                        <span class="nxl-mtext">Tentang</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                {{-- @if (auth()->user() &&
                        auth()->user()->hasAnyRole(['admin', 'teacher']))
                    <li class="nxl-item {{ request()->is('admin/admin') ? ' active' : '' }}">
                        <a href="{{ route('admin.admin.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-cast"></i></span>
                            <span class="nxl-mtext">Admin</span>
                        </a>
                    </li>
                @endif --}}
            </ul>
        </div>
    </div>
</nav>
<!--! ================================================================ !-->
<!--! [End]  Navigation Manu !-->
<!--! ================================================================ !-->
