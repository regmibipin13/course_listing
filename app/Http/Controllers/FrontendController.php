<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $courses = Course::filter($request->search)->paginate(20);
        return view('welcome', compact('courses'));
    }

    public function courseDetails(Course $course)
    {
        $course->load(['instructor']);
        return view('courseDetails', compact('course'));
    }
}
