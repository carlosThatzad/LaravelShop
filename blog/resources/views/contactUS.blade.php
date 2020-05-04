@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <h1>Que nos tienes que decir?</h1>

    <form id="form" class="topBefore">

        <input id="name" type="text" placeholder="NAME">
        <input id="email" type="text" placeholder="E-MAIL">
        <textarea id="message" type="text" placeholder="MESSAGE"></textarea>
        <br><br>
        <input id="submit" type="submit" href="/" value="SEND!">

    </form>
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400);
    section.homebase {
        background: url(/images/wallp.jpg)!important;
        /* Nuestra imagen de fondo */
        background-repeat: no-repeat!important;
        /* Indicamos que no se repetira */
        background-size: cover!important;
        /* Encajamos la imagen al 100% del ancho */
        background-attachment: fixed!important;
        /* Establecemos una posicion fija para la imagen */
        opacity: 0.9;
        width: 100%;
        height: 100%;
    }
    input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
        color: #aca49c;
        font-size: 0.875em;
    }

    input:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder {
        color: #bbb5af;
    }

    input::-moz-placeholder, textarea::-moz-placeholder {
        color: #aca49c;
        font-size: 0.875em;
    }

    input:focus::-moz-placeholder, textarea:focus::-moz-placeholder {
        color: #bbb5af;
    }

    input::placeholder, textarea::placeholder {
        color: #aca49c;
        font-size: 0.875em;
    }

    input:focus::placeholder, textarea::focus:placeholder {
        color: #bbb5af;
    }

    input::-ms-placeholder, textarea::-ms-placeholder {
        color: #aca49c;
        font-size: 0.875em;
    }

    input:focus::-ms-placeholder, textarea:focus::-ms-placeholder {
        color: #bbb5af;
    }

    /* on hover placeholder */

    input:hover::-webkit-input-placeholder, textarea:hover::-webkit-input-placeholder {
        color: #e2dedb;
        font-size: 0.875em;
    }

    input:hover:focus::-webkit-input-placeholder, textarea:hover:focus::-webkit-input-placeholder {
        color: #cbc6c1;
    }

    input:hover::-moz-placeholder, textarea:hover::-moz-placeholder {
        color: #e2dedb;
        font-size: 0.875em;
    }

    input:hover:focus::-moz-placeholder, textarea:hover:focus::-moz-placeholder {
        color: #cbc6c1;
    }

    input:hover::placeholder, textarea:hover::placeholder {
        color: #e2dedb;
        font-size: 0.875em;
    }

    input:hover:focus::placeholder, textarea:hover:focus::placeholder {
        color: #cbc6c1;
    }

    input:hover::placeholder, textarea:hover::placeholder {
        color: #e2dedb;
        font-size: 0.875em;
    }

    input:hover:focus::-ms-placeholder, textarea:hover::focus:-ms-placeholder {
        color: #cbc6c1;
    }





    #form {
        position: relative;
        width: 500px;
        margin: 50px auto 100px auto;
    }

    input {
        font-family: 'Lato', sans-serif;
        font-size: 0.875em;
        width: 470px;
        height: 50px;
        padding: 0px 15px 0px 15px;

        background: transparent;
        outline: none;
        color: #726659;

        border: solid 1px #b3aca7;
        border-bottom: none;

        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
    }

    input:hover {
        background: #b3aca7;
        color: #e2dedb;
    }
h1{
    color: #e2dedb;
    text-align: center;
}
    textarea {
        width: 470px;
        max-width: 470px;
        height: 110px;
        max-height: 110px;
        padding: 15px;

        background: transparent;
        outline: none;

        color: #726659;
        font-family: 'Lato', sans-serif;
        font-size: 0.875em;

        border: solid 1px #b3aca7;

        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
    }

    textarea:hover {
        background: #b3aca7;
        color: #e2dedb;
    }

    #submit {
        width: 502px;

        padding: 0;
        margin: -5px 0px 0px 0px;

        font-family: 'Lato', sans-serif;
        font-size: 0.875em;
        color: #b3aca7;

        outline:none;
        cursor: pointer;

        border: solid 1px #b3aca7;
        border-top: none;
    }

    #submit:hover {
        color: #e2dedb;
    }




</style>
@endsection