
@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
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

@endsection

