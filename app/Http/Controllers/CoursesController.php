<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\Courses\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(20);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::pluck('name', 'id');
        return view('courses.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());
        if ($request->has('image') && $request->image !== null) {
            $course->addMedia($request->image)->toMediaCollection();
        }
        return redirect()->route('courses.index')->with('success', 'Course Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['instructor']);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course->load(['instructor']);
        $instructors = Instructor::pluck('name', 'id');
        return view('courses.edit', compact('course', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        if ($request->has('image') && $request->image !== null) {
            $course->clearMediaCollection();
            $course->addMedia($request->image)->toMediaCollection();
        } else if ($request->has('remove_image') && $request->remove_image == "on") {
            $course->clearMediaCollection();
        }
        return redirect()->route('courses.index')->with('success', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('success', 'Course Deleted Successfully');
    }

    public function removeImage(Course $course)
    {
        $course->clearMediaCollection();
    }
}
