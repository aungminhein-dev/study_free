{{-- <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary pt-4 navbar-dark">
    <div class="container position-relative">
        <div class="navbar-collapse collapse me-auto" id="navbar_global">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="{{ asset('admin_ui/assets/img/brand/light.svg') }}" alt="Volt logo">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                <li class="nav-item me-2">
                    <a href="./pages/dashboard/dashboard.html" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item me-2">
                    <a href="./pages/examples/sign-in.html" class="nav-link">Login</a>
                </li>
                <li class="nav-item me-2">
                    <a href="./pages/examples/sign-up.html" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="./pages/examples/lock.html" class="nav-link">Lock</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center ms-auto">
            <a href="./pages/upgrade-to-pro.html" class="btn btn-outline-white d-inline-flex align-items-center me-md-3">
                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
                Download
            </a>
        </div>
    </div>
</nav> --}}
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="../../index.html">
        <img class="navbar-brand-dark" src="{{ asset('admin_ui/assets/img/brand/light.svg')}}" alt="Volt logo" /> <img
            class="navbar-brand-light" src="{{ asset('admin_ui/assets/img/brand/dark.svg')}}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
