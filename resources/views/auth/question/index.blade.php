@extends('auth.layout.app')
@section('title', 'Questions')
@section('content')
    <div class="flex-wrap py-4 d-flex justify-content-between flex-md-nowrap align-items-center">

        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Questions</h1>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="mb-0 breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item active" aria-current="page">{{ $educationType->name }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $academicLevel->academic_level }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subjectName }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $chapterName }}</li>
                    <li class="breadcrumb-item"><a href="#">{{ $questionGroupName }}</a></li>

                </ol>
            </nav>
        </div>
        <div>
            <button type="button" class="btn btn-gray-800 d-inline-flex align-items-center me-2">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <button class="btn btn-gray-800 d-inline-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd"></path>
                </svg>
                Reports
                <svg class="icon icon-xs ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start">
                <a data-bs-toggle="modal" data-bs-target="#modal-excelfile" class="dropdown-item d-flex align-items-center"
                    href="#"><svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                        </path>
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                    </svg> Upload Excel File
                </a>
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
    <div class="border-0 shadow card card-body table-wrapper table-responsive">
        <div class="mb-3 d-flex"><select class="form-select fmxw-200" aria-label="Message select example">
                <option selected="selected">Select</option>
                <option value="2">MCQ</option>
                <option value="1">True/False</option>
                <option value="3">Blank</option>
            </select> <button class="px-3 btn btn-sm btn-secondary ms-3">Apply</button></div>
        <table class="table user-table table-hover align-items-center">
            <thead>
                <tr>
                    <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value
                                id="userCheck55"> <label class="form-check-label" for="userCheck55"></label></div>
                    </th>
                    <th class="border-bottom">#</th>
                    <th class="border-bottom">Question</th>
                    <th class="border-bottom">Type</th>
                    <th class="border-bottom">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($questions as $question)
                        <td>
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value
                                    id="userCheck1"> <label class="form-check-label" for="userCheck1"></label>
                            </div>
                        </td>
                        <td><a href="#" class="d-flex align-items-center">
                                <div class="d-block"><span class="fw-bold">{{ $loop->iteration }}</span>
                                </div>
                            </a>
                        </td>

                        <td>
                            {!! $question->question_text !!}
                        </td>
                        <td>
                            @switch($question->type)
                                @case('mcq')
                                    <span class="text-muted">MCQ</span>
                                @break

                                @case('true_false')
                                    <span class="text-muted">T/F</span>
                                @break

                                @default
                                    <span class="text-muted">Blank</span>
                            @endswitch
                        </td>
                        <td>
                            <div class="btn-group"><button
                                    class="p-0 m-0 btn btn-link text-dark dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                        class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                                <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start">
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('education-types.unpublish', $question->id) }}"><svg
                                            class="text-gray-400 dropdown-icon me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                                clip-rule="evenodd"></path>
                                        </svg> Unpublish </a><a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('education-types.edit', $question->id) }}"><svg
                                            class="text-gray-400 dropdown-icon me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg> Edit</a><a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('education-types.destroy', $question->id) }}"><svg
                                            class="dropdown-icon text-danger me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
                                            </path>
                                        </svg>Delete</a>
                                </div>
                            </div>
                            <form action="{{ route('education-types.destroy', $question->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-0 m-0 align-baseline btn btn-link" title="Delete"
                                    data-bs-toggle="tooltip">
                                    <svg class="icon icon-xs text-danger ms-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <x-modal.questions-import-modal />
@endsection
