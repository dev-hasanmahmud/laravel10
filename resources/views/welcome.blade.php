<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <h1>{{ $ap_nm }}</h1>
        <h3>For Dependency Injection and CSRF Protection Learn</h3>
        <form method="POST" action="{{url('users')}}">
            @csrf
            <input type="text" name="name" placeholder="Enter Name">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
