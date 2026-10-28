@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
    <h1>Add Students</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @include('students._form')
    </form>
@endsection
