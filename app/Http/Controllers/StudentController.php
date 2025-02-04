<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('school')->get();
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'surname' => 'required',
            'dob' => 'required|date',
            'gpa' => 'required|numeric|between:0,4',
            'school_id' => 'required|exists:schools,school_id',
        ]);
    
        Student::create($validated);
    
        return redirect()->route('students.index');
    }
    
    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }
    
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'dob' => 'required|date',
            'gpa' => 'required|numeric|between:0,4',
            'school_id' => 'required|exists:schools,school_id',
        ]);
    
        $student->update($validated);
    
        return redirect()->route('students.index');
    }
    
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('students.index');
    }
}
