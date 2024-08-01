<?php

namespace App\Http\Controllers;

use App\Models\EducationType;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('educationType')->get();
        return view('auth.subject.index',compact('subjects'));
    }


    public function create()
    {
        $educationTypes = EducationType::all();
        return view('auth.subject.create',compact('educationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'typeId' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'education_type_id' => $request->typeId
        ];
        Subject::create($data);
        return to_route('subjects.index');
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
