@extends('auth.layout.app')
@section('title', 'Users')
@section('content')
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">User List</h1>
                <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
            </div>
            <div><a href="{{ route('admin.create-user') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>Create New User
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive p-4">
            <table class="table table-flush" id="datatable">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Start date</th>
                        <th>Birthday</th>
                        <th>Actions</th> <!-- Add actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a class="text-primary" href="{{ route('admin.details-user',['encodedId' => base64_encode($user->id)]) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                            <td>{{ $user->created_at->format('j-F-Y') }}</td>
                            <td>{{ $user->birthday }}</td>
                            <td>
                                <a href="{{ route('admin.edit-user', ['encodedId' => base64_encode($user->id)]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.details-user', ['encodedId' => base64_encode($user->id)]) }}" class="btn btn-sm btn-primary">Details</a>
                                @if ($user->id != 1)
                                    <form action="{{ route('admin.destroy-user', ['encodedId' => base64_encode($user->id)]) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
