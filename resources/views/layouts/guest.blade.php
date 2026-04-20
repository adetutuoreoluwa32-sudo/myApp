<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'My Blog') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">

        <!-- Logo / Brand -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                My Blog
            </h1>
        </div>

        {{ $slot }}

    </div>

</body>
</html>