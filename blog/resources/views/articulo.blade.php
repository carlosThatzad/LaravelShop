@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center mt-5  ">
            <div class="col-lg-8 d-flex flex-column align-items-center articulo ">
                <h3 class=" mt-3 mb-1 line" >{{ $articulo->nombre }}</h3>
                <h4 class="mt-2">{{ $articulo->categories->title }}</h4>

                <div id="boximg" class="col-lg-6">
                    <img class="img-fluid mb-2" src="{{ $articulo->image }}" alt="">
                </div>
                <p>{{$articulo->descripcion}}</p>

            </div>

        </div>


@endsection