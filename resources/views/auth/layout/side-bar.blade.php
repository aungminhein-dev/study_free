<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{ asset('admin_ui/assets/img/team/profile-picture-3.jpg') }}"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, Jane</h2>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                    <span id="logout" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                        <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Sign Out
                    </span>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
                    {{-- <span class="sidebar-icon">
                        <img src="../../assets/img/brand/light.svg" height="20" width="20"
                            alt="Volt Logo">
                    </span> --}}

                    @role('admin')
                        <span class="mt-1 ms-1 sidebar-text">Hello {{ Str::before(Auth::user()->name, ' ') }}</span>
                    @endrole
                    @role('teacher')
                        <span class="mt-1 ms-1 sidebar-text">Hello Teacher</span>
                    @endrole
                    @role('user')
                        <span class="mt-1 ms-1 sidebar-text">Hello {{ Auth::user()->name }}</span>
                    @endrole
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://demo.themesberg.com/volt-pro/pages/kanban.html" target="_blank"
                    class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Kanban</span>
                    </span>
                    <span>
                        <span class="badge badge-sm bg-secondary ms-1 text-gray-800">Pro</span>
                    </span>
                </a>
            </li>



            <li class="nav-item  {{ request()->routeIs('settings') ? 'active' : '' }}">
                <a href="{{ route('settings', Auth::user()->id) }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Settings</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="https://demo.themesberg.com/volt-pro/pages/calendar.html" target="_blank"
                    class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Calendar</span>
                    </span>
                    <span>
                        <span class="badge badge-sm bg-secondary ms-1 text-gray-800">Pro</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://demo.themesberg.com/volt-pro/pages/map.html" target="_blank"
                    class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Map</span>
                    </span>
                    <span>
                        <span class="badge badge-sm bg-secondary ms-1 text-gray-800">Pro</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-app">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Tables</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
                                <span class="sidebar-text">Bootstrap Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}


            {{-- <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li> --}}


            <li class="nav-item {{ request()->is('education-types/*') ? 'active' : '' }}">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-edu-types">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Education Type</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                <div class="multi-level collapse" role="list" id="submenu-edu-types" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ request()->routeIs('education-types.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('education-types.index') }}">
                                <span class="sidebar-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('education-types.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('education-types.create') }}">
                                <span class="sidebar-text">Create a Type</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('subjects/*') ? 'active' : '' }}">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-subjects">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd"></path>
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Subjects</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-subjects" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ request()->routeIs('subjects.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('subjects.create') }}">
                                <span class="sidebar-text">Add Subject</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('subjects.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('subjects.index') }}">
                                <span class="sidebar-text">Subject List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @can('view users')
                <li class="nav-item {{ request()->is('users/*') ? 'active' : '' }}">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-users">
                        <span>
                            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                    </path>
                                </svg> </span>
                            <span class="sidebar-text">Users</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list" id="submenu-users" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item {{ request()->routeIs('admin.users.list') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.users-list') }}">
                                    <span class="sidebar-text">List</span>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('admin.create-user') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.create-user') }}">
                                    <span class="sidebar-text">Create New User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @hasrole('admin')
                <li class="nav-item {{ request()->is('manage-roles/*') ? 'active' : '' }}">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-roles">
                        <span>
                            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                    </path>
                                </svg> </span>
                            <span class="sidebar-text">Manage Roles</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list" id="submenu-roles" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item {{ request()->routeIs('manage-roles.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('manage-roles.index') }}">
                                    <span class="sidebar-text">List</span>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('manage-roles.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('manage-roles.create') }}">
                                    <span class="sidebar-text">Create New Role</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endhasrole



            {{-- <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-components">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Components</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-components" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" target="_blank"
                                href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/accordions/">
                                <span class="sidebar-text">All Components</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">
                                <span class="sidebar-text">Buttons</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">
                                <span class="sidebar-text">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../pages/components/forms.html">
                                <span class="sidebar-text">Forms</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">
                                <span class="sidebar-text">Modals</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">
                                <span class="sidebar-text">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            <li class="nav-item">
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/"
                    target="_blank" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Documentation <span
                            class="badge badge-sm bg-secondary ms-1 text-gray-800">v1.4</span></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">

                    </span>
                    <span class="sidebar-text">Themesberg</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../pages/upgrade-to-pro.html"
                    class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                    <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">

                    </span>
                    <span>Upgrade to Pro</span>
                </a>
            </li>  --}}
        </ul>
    </div>
</nav>
