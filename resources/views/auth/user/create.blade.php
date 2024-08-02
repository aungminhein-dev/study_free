@extends('auth.layout.app')
@section('title', 'Create New User')
@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Create New User</h1>
                <p class="mb-0">Create more users with multiple to get more dynamics!
                </p>
            </div>
            <div>
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/"
                    class="btn btn-outline-gray"><i class="far fa-question-circle me-1"></i> Forms Docs</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('admin.store-user') }}" class="row mb-4 mt-4" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form -->
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="email">Your Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@company.com" value="{{ old('email') }}" name="email"
                                    id="email" autofocus>


                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End of Form -->

                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="email">Your Name
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input type="text" oninput="generateUsername()"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="John Doe"
                                    value="{{ old('name') }}" name="name" id="name" autofocus>


                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="email">User Name
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="(john_doe) or Anything u want" id="username" value="{{ old('username') }}"
                                    name="username">

                            </div>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="birthday">Birthday</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input data-datepicker="" name="birthday" class="form-control" id="birthday" type="text"
                                    placeholder="YYYY-MM-DD">
                            </div>

                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="gender">Gender</label>
                            <select class="form-select mb-0" name="gender" id="gender" aria-label="Select gender">
                                <option disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="secret">Secret</option>
                            </select>
                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="phone">Phone</label>
                            <input class="form-control" value="{{ Auth::user()->phone }}" id="phone" type="number"
                                placeholder="+12-345 678 910" name="phone">
                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="gender">Role</label>
                            <select class="form-select mb-0" name="roleId" id="gender" aria-label="Select gender">
                                <option disabled>Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <!-- Form -->
                            <label for="password">Your Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    id="password">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-gray-800">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
