<?php

namespace App\Http\Controllers;

use App\Imports\QuestionsImport;
use App\Models\Question;
use App\Models\QuestionGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($questionGroupId)
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
        $questionGroupId = $questionGroupId;

        $questions = Question::where('question_group_id', $questionGroupId)->get();

        return view('auth.question.index', compact('questions', 'questionGroupName', 'subjectName', 'academicLevel', 'educationType', 'chapterName', 'questionGroupId'));
    }

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
        $questionGroupId = $questionGroupId;

        return view('auth.question.create', compact('questionGroupName', 'subjectName', 'academicLevel', 'educationType', 'chapterName', 'questionGroupId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'questionGroupId' => 'required|exists:question_groups,id',
            'questionText' => 'required|string',
            'type' => 'required|in:mcq,true_false,fill_in_the_blank',
            'answerA' => 'required_if:type,mcq|string|nullable',
            'answerB' => 'required_if:type,mcq|string|nullable',
            'answerC' => 'required_if:type,mcq|string|nullable',
            'answerD' => 'required_if:type,mcq|string|nullable',
            'blankAnswer' => 'required_if:type,blank|string|nullable',
        ]);

        $data = [
            'question_group_id' => $request->questionGroupId,
            'question_text' => $request->questionText,
            'type' => $request->type,
        ];

        if ($request->type == 'mcq') {
            $data['options'] = json_encode([
                'A' => $request->answerA,
                'B' => $request->answerB,
                'C' => $request->answerC,
                'D' => $request->answerD,
            ]);
            $data['answer'] = $request->correctAnswer;

        } elseif ($request->type == 'tf') {
            $data['options'] = json_encode(['True', 'False']);
            $data['answer'] = $request->correctAnswer;

        } else {
            $data['answer'] = $request->blankAnswer;
            $data['answer'] = $request->blankAnswer;

        }
        Question::create($data);

        return back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'questionsFile' => 'required|mimes:xlsx,xls,csv',
        ]);
        Excel::import(new QuestionsImport, $request->file('questionsFile'));

        return back()->with('success', 'Questions imported successfully!');
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
