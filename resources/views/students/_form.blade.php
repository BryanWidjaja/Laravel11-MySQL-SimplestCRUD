<div class="">
    <label for="student_number">Student Number (10 Digits)</label>
    <input
        type="text"
        name="student_number"
        id="student_number"
        inputmode="numeric"
        maxlength="10"
        required
        value="{{ old('student_number', $student->student_number ?? '') }}"
    >
    @error('student_number')
        <p role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="">
    <label for="name">Name</label>
    <input
        type="text"
        name="name"
        id="name"
        maxlength="100"
        required
        value="{{ old('name', $student->name ?? '') }}"
    >
    @error('name')
        <p role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="">
    <label for="email">Email</label>
    <input
        type="email"
        name="email"
        id="email"
        maxlength="255"
        required
        value="{{ old('email', $student->email ?? '') }}"
    >
    @error('email')
        <p role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="">
    <label for="program_id">Program</label>
    <select name="program_id" id="program_id" required>
        <option value="">Choose a Program</option>
        @foreach ($programs as $program)
            <option
                value="{{ $program->id }}"
                @selected((string) old('program_id', $student->program_id ?? '') === (string) $program->id)
            >
                {{ $program->name }}
            </option>
        @endforeach
    </select>
    @error('program_id')
        <p role="alert">{{ $message }}</p>
    @enderror
</div>

<div class="">
    <label for="score">Score (0-100)</label>
    <input
        type="number"
        name="score"
        id="score"
        min="0"
        max="100"
        step="1"
        required
        value="{{ old('score', $student->score ?? '') }}"
    >
    @error('score')
        <p role="alert">{{ $message }}</p>
    @enderror
</div>

<button type="submit">Save</button>

<a href="{{ route('students.index') }}">Cancel</a>
