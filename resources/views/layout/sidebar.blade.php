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

                <li class="menu-title">
                    <span>Organization</span>
                </li>

                <li class="{{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <a href="{{ route('departments.index') }}" class="">
                        <span class="nav-icon uil uil-building"></span>
                        <span class="menu-text">Departments</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('job-titles.*') ? 'active' : '' }}">
                    <a href="{{ route('job-titles.index') }}" class="">
                        <span class="nav-icon uil uil-briefcase"></span>
                        <span class="menu-text">Job Titles</span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Human Resources</span>
                </li>

                <li class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <a href="{{ route('employees.index') }}" class="">
                        <span class="nav-icon uil uil-users-alt"></span>
                        <span class="menu-text">Employees</span>
                    </a>
                </li>





            </ul>
        </div>
    </div>
</div>
