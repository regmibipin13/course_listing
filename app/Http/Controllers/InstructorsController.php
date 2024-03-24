<?php

namespace App\Http\Controllers;

use App\Http\Requests\Instructors\StoreInstructorRequest;
use App\Http\Requests\Instructors\UpdateInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::paginate(5);
        return view('instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructorRequest $request)
    {
        Instructor::create($request->all());
        return redirect()->route('instructors.index')->with('success', 'Instructor Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->all());
        return redirect()->route('instructors.index')->with('success', 'Instructor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->back()->with('success', 'Instructor Deleted Successfully');
    }
}
