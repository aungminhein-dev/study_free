<?php

namespace App\Http\Controllers;

use App\Models\EducationType;
use App\Models\QuestionGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class QuestionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionGroups = QuestionGroup::paginate(10);

        return view('auth.question-group.index', compact('questionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educationTypes = EducationType::with('academicLevels')->get();

        return view('auth.question-group.create', compact('educationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $request->status == 'on' ?? false;
        try {
            $request->validate([
                'questionGroupName' => 'required',
                'description' => 'string',
                'typeId' => 'required',
                'chapterId' => 'required',
            ]);
            $data = [
                'name' => $request->questionGroupName,
                'description' => $request->description,
                'chapter_id' => $request->typeId,
                'publish_status' => $status,
                'user_id' => Auth::user()->id,
            ];

            QuestionGroup::create($data);
        } catch (Throwable $th) {
            return $th;
        }

        return to_route('question-groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('auth.question-group.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('auth.question-group.edit');
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
