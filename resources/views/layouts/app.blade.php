<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Task List App</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg ">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
       @if(session() ->has('success') )
        <p >{{ session('success') }}</p>
       @endif 
        @yield('content')
    </div>
</body>
</html>
