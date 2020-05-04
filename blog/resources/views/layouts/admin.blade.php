<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Admin</title>
    <style>


    </style></head>
<body style="background-color: #c1bdba">
@include('layouts.complements.header')

<section class="homebase-admin">
    @yield('content')
</section>
</body>
</html>