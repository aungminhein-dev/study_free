@extends('auth.layout.app')
@section('title', 'Settings')
@section('content')

    <div class="flex-wrap py-4 d-flex justify-content-between flex-md-nowrap align-items-center">

        <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start">
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                    <path fill-rule="evenodd"
                        d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Products
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                    </path>
                </svg>
                Customers
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd"></path>
                </svg>
                Orders
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                        clip-rule="evenodd"></path>
                </svg>
                Console
            </a>
            <div role="separator" class="my-1 dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="text-gray-800 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd"></path>
                </svg>
                All Reports
            </a>
        </div>
    </div>
    </div>
    <div class="mb-4 border-0 shadow card card-body mb-xl-0">
        <h2 class="mb-4 h5">Alerts & Notifications</h2>
        <ul class="list-group list-group-flush">
            <li class="px-0 list-group-item d-flex align-items-center justify-content-between border-bottom">
                <div>
                    <h3 class="mb-1 h6">Company News</h3>
                    <p class="small pe-4">Get Rocket news, announcements, and product updates</p>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="user-notification-1">
                        <label class="form-check-label" for="user-notification-1"></label>
                    </div>
                </div>
            </li>
            <li class="px-0 list-group-item d-flex align-items-center justify-content-between border-bottom">
                <div>
                    <h3 class="mb-1 h6">Account Activity</h3>
                    <p class="small pe-4">Get important notifications about you or activity you've missed
                    </p>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="user-notification-2" checked>
                        <label class="form-check-label" for="user-notification-2"></label>
                    </div>
                </div>
            </li>
            <li class="px-0 list-group-item d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-1 h6">Meetups Near You</h3>
                    <p class="small pe-4">Get an email when a Dribbble Meetup is posted close to my location
                    </p>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="user-notification-3" checked>
                        <label class="form-check-label" for="user-notification-3"></label>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    </div>

@endsection
@section('scripts')
@endsection
