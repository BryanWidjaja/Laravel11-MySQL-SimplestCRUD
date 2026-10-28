<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('program')->orderBy('name')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::orderBy('name')->get();

        return view('students.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $programs = Program::orderBy('name')->get();

        return view('students.edit', compact('student', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate($this->rules($student));

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Deleted!');
    }

    private function rules(?Student $student = null): array {
        return [
            'program_id' => [
                'required',
                'integer',
                Rule::exists('programs', 'id')
            ],
            'student_number' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('students', 'student_number')->ignore($student)
            ],
            'name' => [
                'required',
                'string',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student)
            ],
            'score' => [
                'required',
                'integer',
                'min:0',
                'max:100'
            ]
        ];
    }
}
