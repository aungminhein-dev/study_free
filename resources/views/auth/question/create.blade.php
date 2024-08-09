@extends('auth.layout.app')
@section('title', 'Create New Question')
@section('content')
    <style>
        .note-editor {
            width: 100% !important;
        }

        /* Ensure the container (textarea) is also 100% */
        #questionText {
            width: 100%;
        }
    </style>
    <div class="py-4">
        <div class="flex-wrap d-flex justify-content-between w-100">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Create New Question</h1>
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
            <div class="dropdown"><button class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="icon icon-xs me-2"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>Actions</button>
                <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                            </path>
                        </svg> Add Widget
                    </a>

                    <a class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="text-gray-400 dropdown-icon me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                        </svg> Upload Excel File
                    </a>

                    <div role="separator" class="my-1 dropdown-divider"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-4 col-12">
            <div class="border-0 shadow card components-section">
                <div class="card-body">
                    <form action="" class="mt-4 mb-4 row" method="post">
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
                        <!-- Question Type -->
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="question-types">Question Type</label>
                            <select class="mb-0 form-select" name="question_type" id="question-types">
                                <option value="mcq" selected>Multiple Choice Question</option>
                                <option value="tf">True/False</option>
                                <option value="blank">Fill in the blank</option>
                            </select>
                        </div>

                        <!-- Question Text -->
                        <div class="mb-4 form-group col-12">
                            <label for="questionText">Question Text</label>
                            <div class="input-group">
                                <textarea name="questionText" id="questionText" class="form-control @error('questionText') is-invalid @enderror"
                                    cols="30" rows="10">{{ old('questionText') }}</textarea>
                            </div>
                            @error('questionText')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Multiple Choice Question (MCQ) Answers --}}
                        <div id="mcq-answers" class="row">
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <div class="mb-4 form-group col-12 col-sm-3">
                                    <label for="answer{{ $option }}">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="correctAnswer"
                                                value="answer{{ $option }}" id="{{ $option }}">
                                            <label class="form-check-label" for="answer{{ $option }}">
                                                Option {{ $option }}
                                            </label>
                                        </div>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ $option }}</span>
                                        <input type="text"
                                            class="form-control @error('answer' . $option) is-invalid @enderror"
                                            placeholder="Answer" value="{{ old('answer' . $option) }}"
                                            name="answer{{ $option }}" autofocus>
                                    </div>
                                    @error('answer' . $option)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        {{-- True/False Answers --}}
                        <div id="true-false-answers" class="row" style="display: none">
                            <div class="mb-4 form-group col-12 col-sm-3">
                                <label for="trueType">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer" value="True"
                                            id="trueType">
                                        <label class="form-check-label" for="trueType">True</label>
                                    </div>
                                </label>

                                @error('trueType')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 form-group col-12 col-sm-3">
                                <label for="falseType">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer"
                                            value="False" id="falseType">
                                        <label class="form-check-label" for="falseType">False</label>
                                    </div>
                                </label>

                                @error('falseType')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Fill in the Blank Answer --}}
                        <div id="blank-answers" class="row" style="display: none">
                            <div class="mb-4 form-group col-12 col-sm-6">
                                <label for="blankAnswer">Answer</label>
                                <div class="input-group">
                                    <span class="input-group-text">Answer</span>
                                    <input type="text" class="form-control @error('blankAnswer') is-invalid @enderror"
                                        placeholder="Answer" value="{{ old('blankAnswer') }}" name="blankAnswer"
                                        autofocus>
                                </div>
                                @error('blankAnswer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#questionText').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],

                height: 300, // Set editor height
                minHeight: null, // Set minimum height of editor
                maxHeight: null, // Set maximum height of editor
                focus: true // Set focus to editable area after initializing summernote
            });

            $('#question-types').change(function() {
                let type = $(this).val();
                changeInputBoxes(type);
            });

            function changeInputBoxes(type) {
                switch (type) {
                    case "mcq":
                        $('#mcq-answers').show();
                        $('#true-false-answers').find('input, textarea, select').prop('disabled', true);
                        $('#true-false-answers').hide();
                        $('#blank-answers').find('input, textarea, select').prop('disabled', true);
                        $('#blank-answers').hide();
                        $('#mcq-answers').find('input, textarea, select').prop('disabled', false);
                        break;

                    case "tf":
                        $('#mcq-answers').find('input, textarea, select').prop('disabled', true);
                        $('#mcq-answers').hide();
                        $('#true-false-answers').show();
                        $('#true-false-answers').find('input, textarea, select').prop('disabled', false);
                        $('#blank-answers').find('input, textarea, select').prop('disabled', true);
                        $('#blank-answers').hide();
                        break;

                    case "blank":
                        $('#mcq-answers').find('input, textarea, select').prop('disabled', true);
                        $('#mcq-answers').hide();
                        $('#true-false-answers').find('input, textarea, select').prop('disabled', true);
                        $('#true-false-answers').hide();
                        $('#blank-answers').show();
                        $('#blank-answers').find('input, textarea, select').prop('disabled', false);
                        break;

                    default:
                        $('#mcq-answers').show();
                        $('#mcq-answers').find('input, textarea, select').prop('disabled', false);
                        $('#true-false-answers').find('input, textarea, select').prop('disabled', true);
                        $('#true-false-answers').hide();
                        $('#blank-answers').find('input, textarea, select').prop('disabled', true);
                        $('#blank-answers').hide();
                        break;
                }
            }

            // Initial state
            changeInputBoxes($('#question-types').val());
        });
    </script>
@endsection
