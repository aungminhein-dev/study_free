@extends('auth.layout.app')
@section('title', 'Create New Education Type')
@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Education Type</h1>
                <p class="mb-0">Edit more types with multiple to get more dynamics!
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
                    <form action="{{ route('education-types.store') }}" class="row mb-4 mt-4" method="post">
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
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for="email"> Name
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="(igcse, ged, grade-12) or Anything u want" id="username"
                                    value="{{ old('name',$data->name) }}" name="name">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-12 col-sm-4">
                            <label for=""> Publish?
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" @checked($data->publish_status) name="status">
                            </div>
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
