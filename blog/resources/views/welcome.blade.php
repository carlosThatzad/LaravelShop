
@extends('layouts.app')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <article>
        <div class="container ">
            <br>
            @foreach($publications as $publication)

                <div class="wrapper">

                    <div class="product">
                        <div class="title">
                            {{ $publication->nombre }}
                        </div>

                        <div class="text">
                            <div class="code">{{ $publication->categories->title }}</div>
                            <div class="description">
                              {{$publication->descripcion}}
                            </div>
                            <div class="review">
                                <span class="star-icon"></span>
                                <span class="star-icon"></span>
                                <span class="star-icon"></span>
                                <span class="star-icon"></span>
                                <span class="star-icon star-disable"></span>
                                <span class="star-reviews">84 reviews</span>
                            </div>
                            <div class="code"><b> Metros cuadrados:</b> {{$publication->metros}}</div>
                            <div class="code"><b> Fecha de creación:</b>{{$publication->created_at}}</div>
                            <div class="code"><b>Contacto: </b>{{$publication->contacto}}</div>
                            <div class="price">
                                {{$publication->precio}} €
                            </div>
                            <div class="shop-actions">
                                <button href="{{ route('contact-us')}}"><img  href="{{ route('contact-us')}}" src="https://cdn0.iconfinder.com/data/icons/typicons-2/24/shopping-cart-20.png" /> Add to Cart</button>


                            </div><br>
                            <a href="{{ route('articulo.show', [$publication->id])}}">
                            <div class="shop-actions" href="{{ route('articulo.show', [$publication->id])}}">
                            <button href="{{ route('articulo.show', [$publication->id])}}"><img  href="{{ route('articulo.show', [$publication->id])}}" src="" /> View More</button>
                        </div></a>


                        </div>
                        <div class="preview">
                            <svg class="svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">

                                <img class="image" src="{{ $publication->image }}" x="0" y="0" width="200px" height="180px"/>
                            </svg>
                        </div>

                    </div>

                </div>








            @endforeach
            <div class="mt-5">
                @if (count($publications))
                    {{ $publications->links() }}
                @endif
            </div>
        </div>
    </article>
<style>

    article {

        text-align: center;
        font-family: "Oswald";
    }
    .wrapper {
        margin: auto!important;
        width: unset!important;
    }
    .product {
        position: relative;
        width: 640px;
        background-color: #fff;
        margin: auto;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .product > div {
        position: relative;
        z-index: 10;
    }
    .product .title {
        background-color: #333;
        color: #fff;
        padding: 10px;
        font-size: 18px;
        z-index: 20;
    }
    .product .text {
        text-align: left;
        width: 49.5%;
        display: inline-block;
        vertical-align: middle;
        color: #333;
        font-weight: 300;
        padding: 20px 0;
    }
    .product .text .code {
        padding: 0 20px;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    .product .text .description {
        padding: 0 20px;
        margin-bottom: 10px;
        color: #757575;
    }
    .product .text .review {
        font-size: 12px;
        padding: 0 20px;
    }
    .product .text .review > span {
        vertical-align: middle;
    }
    .product .text .review > span.star-icon {
        width: 20px;
        height: 20px;
        display: inline-block;
    }
    .product .text .review .star-icon {
        background-image: url(https://cdn4.iconfinder.com/data/icons/small-n-flat/24/star-20.png);
    }
    .product .text .review .star-disable {
        opacity: 0.5;
    }
    .product .text .price {
        padding: 0 20px;
        font-size: 2.5em;
        margin-bottom: 10px;
    }
    .product .text .shop-actions {
        padding: 0 20px;
    }
    .product .text .shop-actions button {
        width: 100%;
        vertical-align: middle;
        background-color: #fd0;
        border: none;
        box-shadow: 0 5px 5px -2px rgba(0, 0, 0, 0.5);
        padding: 5px;
        font-size: 18px;
        font-family: "Oswald";
    }
    .product .preview {
        width: 49.5%;
        display: inline-block;
        vertical-align: middle;
        height: 240px;
    }
    .product .svg {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        height: 100%;
        z-index: 0;
    }
    .product .svg .circle {
        fill: #ccc;
        transform-origin: 50% 50%;
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
        -o-transform: scale(0.8);
        transform: scale(0.8);
        -webkit-transition: transform 300ms;
        -moz-transition: transform 300ms;
        -ms-transition: transform 300ms;
        -o-transition: transform 300ms;
        transition: transform 300ms;
    }
    .product .svg .image {
        transform-origin: 50% 50%;
        -webkit-transform: rotate(0);
        -moz-transform: rotate(0);
        -ms-transform: rotate(0);
        -o-transform: rotate(0);
        transform: rotate(0);
        -webkit-transition: transform 300ms;
        -moz-transition: transform 300ms;
        -ms-transition: transform 300ms;
        -o-transition: transform 300ms;
        transition: transform 300ms;
    }
    .product:hover .preview .image {
        -webkit-transform: rotate(20deg);
        -moz-transform: rotate(20deg);
        -ms-transform: rotate(20deg);
        -o-transform: rotate(20deg);
        transform: rotate(20deg);
    }
    .product:hover .preview .circle {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

</style>
@endsection

