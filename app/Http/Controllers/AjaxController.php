<?php

namespace App\Http\Controllers;

use App\Models\AcademicLevel;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function loadAcademicLevelsViaEducationType(Request $request)
    {
        $educationTypeId = $request->educationTypeId;
        $academicLevels = AcademicLevel::where('education_type_id', $educationTypeId)
            ->select('id', 'academic_level')
            ->get();

        return response()->json($academicLevels, 200);
    }

    public function loadSubjectsViaEducationType(Request $request)
    {
        $subjects = Subject::where('academic_level_id', $request->academicLevelId)
            ->select('id', 'name')
            ->get();

        return response()->json($subjects, 200);
    }

    public function loadChaptersViaEducationType(Request $request)
    {
        $chapters = Chapter::where('subject_id', $request->subjectId)
            ->select('id', 'name')
            ->get();

        return response()->json($chapters, 200);
    }
}
