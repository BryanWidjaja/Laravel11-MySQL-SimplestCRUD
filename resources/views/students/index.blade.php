@extends('layouts.app')
@section('title', 'Students')
@section('content')
    <h1>Students</h1>

    <a href="{{ route('students.create') }}">Add Student</a>

    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Program</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->student_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->program->name }}</td>
                    <td>{{ $student->score }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}">Edit</a>

                        <form
                            action="{{ route('students.destroy', $student) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this Student?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Students yet...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
