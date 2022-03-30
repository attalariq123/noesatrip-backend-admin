<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #3252DF;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <i class="fas fa-campground fa-2x"></i>
        </div>
        <div class="brand-text mx-3" style="font-size: large;">NOESATRIP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(request()->routeIs('home')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span style="font-size: medium;">{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->routeIs('users.index')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span style="font-size: medium;">{{ __('Users') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('destination')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('destination') }}">
            <i class="fas fa-map-marker-alt"></i>
            <span style="font-size: medium;">{{ __('Destination') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('transactions')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('transactions') }}">
            <i class="fas fa-money-bill-alt"></i>
            <span style="font-size: medium;">{{ __('Transactions') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('settings')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('settings') }}">
            <i class="fas fa-cog"></i>
            <span style="font-size: medium;">{{ __('Settings') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('logout')) active @endif">
        <a class="nav-link fa-lg" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span style="font-size: medium;">{{ __('Logout') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="padding-top: inherit;">
            <i class="fas fa-fw fa-cog"></i>
            <span>Two-level menu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Child menu</a>
            </div>
        </div>
    </li> -->

    <!-- Sidebar Toggler (Sidebar)
    <div class="text-center d-none d-md-inline pt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>
<!-- End of Sidebar -->