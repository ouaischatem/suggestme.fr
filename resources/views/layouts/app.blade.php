<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SuggestMe</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-black">
<div>
    @component('components.navbar')
    @endcomponent

    <main>
        @yield('content')
    </main>

    @component('components.footer')
    @endcomponent
</div>
</body>
</html>
