@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="d-flex">
            <div class="btn-group mt-4 ml-5 align-items-center">
                <a href="{{ route('admin.articulo.create') }}" class="btn btn-info" >Añadir Publicación</a>
            </div>
            <div class="btn-group mt-4 ml-5 align-items-center">
                <a href="{{ route('admin.tablehome') }}" class="btn btn-info" >Vista en tabla</a>

            </div>
            <div class="mt-4   " style="margin-left: 620px;">
                @if (count($publications))
                    {{ $publications->links() }}
                @endif
            </div>
        </div>
        @foreach($publications as $publication)







                <div class="row articulo mt-5 ">
                    <div class="col-md-6 d-flex flex-column align-items-center mt-2  " >
                        <p class="line mb-1" >Nombre: {{ $publication->nombre }}</p>
                        <br>
                        <p>Categoría: {{ $publication->categories->title }}</p>
                        <div class="col-md-6  text-justify">
                            <img  class="col rounded h-25 col-md-3 ml-lg-5 ml-md-2 ml-sm-1" src="{{ $publication->image }}" alt="">
                            <p class="col col-lg-5 ml-lg-5 ml-md-2 ml-sm-1">Descripción: {{$publication->descripcion}}</p>
                            <p class="ml-lg-3 ml-md-0 ml-sm-0 text-center ">Fecha de creación:<br><b>{{$publication->created_at}}</b></p>
                        </div>
                        <div class="btn btn-info bt1  mb-5"> <a href="{{ route('admin.articulo.edit',[$publication->id ])}}">Edit</a>
                        </div>
                    </div>


            </div>
    @endforeach


@endsection