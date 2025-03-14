<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Crud App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    @livewireStyles
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Crud App</a>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>


    <!-- Livewire Scripts -->
    @livewireScripts

    @stack('scripts')
</body>
</html>
