@extends('auth.layout.app')
@section('title', 'Create New Subject')
@section('content')
    <div class="py-4">

        <div class="flex-wrap d-flex justify-content-between w-100">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Create New Question Group</h1>
                <p class="mb-0">Create more Question Groups with multiple to get more dynamics!
                </p>
            </div>
            <div>
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/"
                    class="btn btn-outline-gray"><i class="far fa-plus me-1"></i> Forms Docs</a>
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
                        @csrf
                        <!-- Form -->
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="email">Question Group Name
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                            clip-rule="evenodd"></path>
                                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control @error('questionGroupName') is-invalid @enderror"
                                    placeholder="Physics, Chemistry, etc" value="{{ old('questionGroupName') }}"
                                    name="questionGroupName" id="name" autofocus>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="gender">Education Type</label>
                            <select class="mb-0 form-select" name="typeId" id="education-type">
                                <option disabled>Select Education Type</option>
                                @foreach ($educationTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="gender">Academic Level</label>
                            <select class="mb-0 form-select" name="typeId" id="related-academic-levels">
                                <option disabled>Select Academic Level</option>
                            </select>
                        </div>
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="gender">Related Subject</label>
                            <select class="mb-0 form-select" name="subjectId" id="related-subjects">
                                <option disabled>Select related subject</option>

                            </select>
                        </div>
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="gender">Chapter</label>
                            <select class="mb-0 form-select" name="typeId" id="related-chapters">
                                <option disabled>Select Chapter</option>

                            </select>
                        </div>
                        <div class="mb-4 form-group col-12 col-sm-4">
                            <label for="publishStatus">Publish Status</label>
                            <div class="input-group">
                                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault">
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
            $('#education-type').change(function() {
                let educationTypeId = $(this).val();
                loadAcademicLevel(educationTypeId);
            });
            $('#related-academic-levels').change(function() {
                let academicLevelId = $(this).val();
                loadSubject(academicLevelId);
            });
            $('#related-subjects').change(function() {
                let subjectId = $(this).val();
                loadChapter(subjectId);
            });
        });
        loadAcademicLevel = (educationTypeId) => {
            $('#related-academic-levels').html(
                `<option disabled>Loading...</option>`
            );

            // Force the dropdown to close and reopen
            $('#related-academic-levels').blur().focus();

            $.ajax({
                url: '/related-academic-levels/list',
                method: "POST",
                data: {
                    educationTypeId: educationTypeId,
                },
                success(response) {
                    $('#related-academic-levels').empty();
                    let academicLevels = response;
                    if (academicLevels.length != 0) {
                        academicLevels.forEach(element => {
                            $('#related-academic-levels').append(
                                `<option value="${element.id}">${element.academic_level}</option>`
                            )
                        });
                    } else {
                        $('#related-academic-levels').append(
                            `<option disabled>No level for this education type.</option>`
                        )
                    }
                },
                error(response) {
                    console.log(response);
                    $('#related-academic-levels').empty().append(
                        `<option disabled>Error loading levels.</option>`
                    );
                }
            });
        }
        loadSubject = (academicLevelId) => {
            $('#related-subjects').html(
                `<option disabled>Loading...</option>`
            );

            // Force the dropdown to close and reopen
            $('#related-subjects').blur().focus();

            $.ajax({
                url: '/related-subjects/list',
                method: "POST",
                data: {
                    academicLevelId: academicLevelId,
                },
                success(response) {
                    $('#related-subjects').empty();
                    let subjects = response;
                    if (subjects.length != 0) {
                        subjects.forEach(element => {
                            $('#related-subjects').append(
                                `<option value="${element.id}">${element.name}</option>`
                            )
                        });
                    } else {
                        $('#related-subjects').append(
                            `<option disabled>No subjects for this academic level.</option>`
                        )
                    }
                },
                error(response) {
                    console.log(response);
                    $('#related-subjects').empty().append(
                        `<option disabled>Error loading levels.</option>`
                    );
                }
            });
        }
        loadChapter = (subjectId) => {
            $('#related-chapters').html(
                `<option disabled>Loading...</option>`
            );

            // Force the dropdown to close and reopen
            $('#related-chapters').blur().focus();

            $.ajax({
                url: '/related-chapters/list',
                method: "POST",
                data: {
                    subjectId: subjectId,
                },
                success(response) {
                    $('#related-chapters').empty();
                    let chapter = response;
                    if (chapter.length != 0) {
                        chapter.forEach(element => {
                            $('#related-chapter').append(
                                `<option value="${element.id}">${element.name}</option>`
                            )
                        });
                    } else {
                        $('#related-chapters').append(
                            `<option disabled>No chapter for this academic level.</option>`
                        )
                    }
                },
                error(response) {
                    console.log(response);
                    $('#related-chapters').empty().append(
                        `<option disabled>Error loading levels.</option>`
                    );
                }
            });
        }
    </script>
@endsection
