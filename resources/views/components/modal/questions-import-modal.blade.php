<div class="col-lg-4">
    <!-- Button Modal -->
    <button type="button" class="mb-3 btn btn-block btn-gray-800" data-bs-toggle="modal"
        data-bs-target="#modal-excelfile">Import Excel File</button>
    <!-- Modal Content -->
    <div class="modal fade" id="modal-excelfile" tabindex="-1" role="dialog" aria-labelledby="modal-excelfile"
        aria-hidden="true">
        <div class="modal-dialog modal-info modal-dialog-centered" role="document">
            <div class="modal-content bg-primary">
                <button type="button" class="btn-close theme-settings-close fs-6 ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-header">
                    <p class="text-gray-200 modal-title" id="modal-title-notification">Save your
                        time for faster uploading questions
                    </p>
                </div>
                <form action="{{ route('questions.import') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="text-white modal-body">
                        <div class="py-3 text-center">
                            <span class="modal-icon">
                                <svg class="text-gray-200 icon icon-xl" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                    </path>
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                    </path>
                                </svg>
                            </span>
                            <h2 class="my-3 h4 modal-title">Select Excel File</h2>
                            <input type="file" name="questionsFile" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->
</div>
