<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use Illuminate\Http\Request;
use Gate;
use Form;
use DB;

class StudentController extends Controller
{

    public function index()
    {
       if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        $students = Student::latest()->paginate(5);
        $courses = Course::get()->pluck('id');
        return view('students.index', compact('students', 'courses'));
    }


    public function create()
    {
        if (!Gate::denies('isUser')) {
        session()->flash('error', 'You are not allowed to access this page');
        return view('errors.401');
         }
        $courses = Course::pluck('course_name', 'id');
        return view('students.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $student = new Student;

        $student->name = $request->name;
        $student->email = $request->email;
        $student->place = $request->place;


         $student->save();
         $student->courses()->sync($request->courses , false);
         $students = Student::latest()->paginate(5);
         session()->flash('success', "You successfully create student $request->name");
         return view('students.index', compact('student', 'students'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::pluck('course_name', 'id');
        return view('students.edit',compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
      $student->name = $request->name;
      $student->email = $request->email;
      $student->place = $request->place;


       $student->save();
       $student->courses()->sync($request->courses);
       $students = Student::latest()->paginate(5);
       session()->flash('success', "You successfully update a student .$request->name");
       return view('students.index', compact('student', 'students'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->courses()->detach();
      $student->delete();
      session()->flash('warning', "You successfully deleted student $student->name");
      return redirect()->back();
    }
}
