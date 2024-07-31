@extends('auth.layout.app')
@section('title', 'Roles')
@section('content')
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Role List</h1>
                <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
            </div>
            <div>
                <a href="{{ route('manage-roles.create') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create New Role
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
                        <th>Role Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a class="text-primary" href="{{ route('manage-roles.show', ['manage_role' => $role->id]) }}">
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>{{ $role->created_at->format('j-F-Y') }}</td>
                            <td>
                                <a href="{{ route('manage-roles.edit', ['manage_role' => $role->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('manage-roles.show', ['manage_role' => $role->id]) }}" class="btn btn-sm btn-info">Details</a>
                                @if ($role->id != 1)
                                    <form action="{{ route('manage-roles.destroy', ['manage_role' => $role->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
