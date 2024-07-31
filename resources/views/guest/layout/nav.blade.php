<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('guest_ui/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                                                    href="/">Home</a></li>
                                            <li class="{{ request()->routeIs('courses') ? 'active' : '' }}"><a
                                                    href=" {{ route('courses') }}">Courses</a></li>
                                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a
                                                    href="{{ route('about') }}">About</a></li>
                                            <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}"><a
                                                    href="{{ route('blogs') }}">Blogs</a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul> --}}
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <!-- Button -->

                                            @auth
                                                <li class="button-header margin-left "><a href="{{ route('dashboard') }}"
                                                        class="btn">Dashborad</a></li>
                                                <li class="button-header" onclick="logout()"><a href="#"
                                                        class="btn btn3">Log
                                                        out</a></li>

                                                <form action="{{ route('logout') }}" id="logoutForm" method="post">
                                                    @csrf
                                                </form>
                                            @else
                                                <li class="button-header margin-left "><a href="#"
                                                        class="btn">Join</a></li>
                                                <li class="button-header"><a href="{{ route('login') }}"
                                                        class="btn btn3">Log
                                                        in</a></li>
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
