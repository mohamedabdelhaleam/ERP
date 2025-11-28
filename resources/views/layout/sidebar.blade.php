<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">{{ __('dashboard.dashboard') }}</span>
                        {{-- <span class="toggle-icon"></span> --}}
                    </a>
                </li>





            </ul>
        </div>
    </div>
</div>
