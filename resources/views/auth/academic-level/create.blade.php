@extends('auth.layout.app')
@section('title', 'Create New Education Type')
@section('content')
    <div class="py-4">

        <div class="flex-wrap d-flex justify-content-between w-100">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Create New Academic Level</h1>
                <p class="mb-0">Create more Academic Level with multiple to get more dynamics!
                </p>
            </div>
            <div>
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/"
                    class="btn btn-outline-gray"><i class="far fa-question-circle me-1"></i> Forms Docs</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-4 col-12">
            <div class="border-0 shadow card components-section">
                <div class="card-body">
                    <form action="{{ route('academic-levels.store') }}" class="mt-4 mb-4 row" method="post">
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
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="email"> Academic Level
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('levelName') is-invalid @enderror"
                                    placeholder="(Grade 1, Year 1, ... etc) or Anything u want" id="username"
                                    value="{{ old('levelName') }}" name="levelName">
                            </div>
                            @error('levelName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="gender">Education Type</label>
                            <select class="mb-0 form-select" name="typeId" id="">
                                <option disabled>Select Education Type</option>
                                @foreach ($educationTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
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
