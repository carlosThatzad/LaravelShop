@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <h1 style="color:white">Que nos tienes que decir?</h1>

    <form id="form" class="topBefore">

        <input id="name" type="text" placeholder="NAME">
        <input id="email" type="text" placeholder="E-MAIL">
        <textarea id="message" type="text" placeholder="MESSAGE"></textarea>
        <br><br>
        <input id="submit" type="submit" href="/" value="SEND!">

    </form>
<style>


</style>
@endsection