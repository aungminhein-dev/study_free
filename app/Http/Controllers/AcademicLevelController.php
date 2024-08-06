<?php

namespace App\Http\Controllers;

use App\Models\AcademicLevel;
use App\Models\EducationType;
use Illuminate\Http\Request;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = AcademicLevel::with('educationType')->get();
        return view('academic-level.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educationTypes = EducationType::all();
        return view('auth.academic-level.create',compact('educationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'levelName' => 'required',
            'typeId'=> 'required'
        ]);
        $data = [
            'academic_level' => $request->levelName,
            'education_type_id' => $request->typeId
        ];
        AcademicLevel::create($data);
        return to_route('academic-levels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = AcademicLevel::where('id',$id)->first();
        return view('auth.academic-level.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = AcademicLevel::where('id',$id)->first();
        $educationTypes = EducationType::all();
        return view('auth.academic-level.edit',compact('data','educationTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'levelName' => 'required',
            'educationTypeId'=> 'required'
        ]);
        $data = [
            'academic_level' => $request->name,
            'education_type_id' => $request->educationTypeId
        ];
        $data = AcademicLevel::where('id',$id)->first();
        $data->update($data);
        return to_route('academic-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = AcademicLevel::where('id',$id)->first();
        $data->delete();
        return to_route('academic-levels.index');
    }
}
