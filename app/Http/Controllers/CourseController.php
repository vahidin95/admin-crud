<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Gate;

class CourseController extends Controller
{

    public function index()
    {
        if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        $courses = Course::latest()->paginate(5);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'course_name' => 'required',
        ]);

        $course = Course::create($request->all());
        $courses = Course::latest()->paginate(5);
        session()->flash('success', "You successfully created course $course->course_name");
        return view('courses.index', compact('course', 'courses'));

    }

    public function edit($id)
    {
        $cource = Course::findOrFail($id);
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {

      $this->validate($request, [
        'course_name' => 'required',
      ]);

      $course = Course::findOrFail($request->course_name_id);
      $course->update($request->all());
      $courses = Course::latest()->paginate(5);
      session()->flash('success', "You successfully updated course $course->course_name");
      return view('courses.index', compact('course', 'courses'));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        $courses = Course::latest()->paginate(5);
        session()->flash('warning', "You successfully remove cource $course->course_name");
        return view('courses.index', compact('course', 'courses'));
    }
}
