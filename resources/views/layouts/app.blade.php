<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Student Directory')</title>
</head>
<body>
    <header>
        <a href="{{ route('students.index') }}">Student Directory</a>
    </header>

    <main>
        @if (session('success'))
            <p role="status">{{ session('success') }}</p>
        @endif

        @yield('content')
    </main>
</body>
</html>
