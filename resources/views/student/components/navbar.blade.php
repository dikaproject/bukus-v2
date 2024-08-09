<!--! ================================================================ !-->
<!--! [Start] Navigation Manu !-->
<!--! ================================================================ !-->
<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="assets/images/logo-full.png" alt="" class="logo logo-lg" />
                <img src="assets/images/logo-abbr.png" alt="" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item">
                    <a href="{{ route('student_dashboard') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
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
