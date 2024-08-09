<?php

namespace App\Http\Controllers;

use App\Models\QuestionGroup;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create($questionGroupId)
    {
        // Eager load the related models
        $questionGroup = QuestionGroup::with('chapter.subject.academicLevel.educationType')
            ->findOrFail($questionGroupId);

        $questionGroupName = $questionGroup->name;
        $chapterName = $questionGroup->chapter->name;
        $subject = $questionGroup->subject;
        $subjectName = $subject->name;
        $academicLevel = $subject->academicLevel;
        $educationType = $academicLevel->educationType;

        return view('auth.question.create', compact('questionGroupName', 'subjectName', 'academicLevel', 'educationType', 'chapterName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
