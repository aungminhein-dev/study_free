<?php

namespace App\Http\Controllers;

use App\Models\EducationType;
use Illuminate\Http\Request;
use Throwable;

class EducationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationTypes = EducationType::all();
        return view('auth.education-type.index', compact('educationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.education-type.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|string'
            ]);
            $status = $request->status === 'on';
            $data = [
                'name' => $request->name,
                'publish_status' => $status
            ];
            EducationType::create($data);
        } catch (Throwable $th) {
            return response()->json($th);
        }
        return to_route('education-types.index');
    }

    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = EducationType::findOrfail($id);
        return view('auth.education-type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|string'
            ]);
            $status = $request->status === 'on';
            $data = [
                'name' => $request->name,
                'publish_status' => $status
            ];
            EducationType::where('id', $id)->update($data);
        } catch (Throwable $th) {
            return response()->json($th);
        }
        return to_route('education-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EducationType::where('id', $id)->delete();
        return back();
    }

    public function unpublish($id)
    {
        EducationType::where('id', $id)->update(['publish_status' => false]);
        return back();
    }
}
