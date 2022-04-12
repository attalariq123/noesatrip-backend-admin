<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #3252DF;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
        <div class="brand-icon">
            <i class="fas fa-campground fa-2x"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NOESATRIP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(request()->routeIs('home')) active @endif">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item @if(request()->routeIs('users.*')) active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Users') }}</span></a>
    </li>

    <!-- Nav Item - Destinations -->
    <li class="nav-item @if(request()->routeIs('destinations.*')) active @endif">
        <a class="nav-link" href="{{ route('destinations.index') }}">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>{{ __('Destinations') }}</span></a>
    </li>

    <!-- Nav Item - Events -->
    <li class="nav-item @if(request()->routeIs('events.*')) active @endif">
        <a class="nav-link" href="{{ route('events.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>{{ __('Events') }}</span></a>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item @if(request()->routeIs('orders.*')) active @endif">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>{{ __('Orders') }}</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Transactions -->
    <li class="nav-item @if(request()->routeIs('transactions')) active @endif">
        <a class="nav-link" href="{{ route('transactions') }}">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>{{ __('Transactions') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('settings')) active @endif">
        <a class="nav-link" href="{{ route('settings') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('Settings') }}</span></a>
    </li>

    <li class="nav-item @if(request()->routeIs('logout')) active @endif">
        <a class="nav-link" href="{{ route('home') }}" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>{{ __('Logout') }}</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->