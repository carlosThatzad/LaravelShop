
@extends('layouts.admin')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div style="height: auto;">

        <div class="btn-group mt-5 ml-5 mb-4">
            <a href="{{ route('admin.articulo.create') }}" class="btn btn-info" >Añadir Articulo</a>
        </div>
        <div class="btn-group mt-4 ml-5 align-items-center">
            <a href="{{ route('admin.tableusers') }}" class="btn btn-info" >Administración de Usuarios</a>
        </div>
        <table col="8" class="table table-striped table-dark" align="center" style=" width: 80%;">

            <thead >
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Nombre categoria</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Status</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>
            <tbody >
            @foreach($publications as $publication)

                <tr>
                    <td>{{ $publication->nombre }}</td>
                    <td>{{ $publication->categories->title }}</td>
                    <td>{{$publication->descripcion}}</td>
                    <td>@if($publication->activo == 1)

                            <span style='font-size:30px;color:green'>&#10004;</span>
                        @else
                            <span style='font-size:30px;color:red'>&#10008;</span>
                        @endif
                       </td>
                    <td>{{$publication->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.articulo.edit',[$publication->id ])}}">
                        <button type="button" class="btn btn-default btn-lg" href="{{ route('admin.articulo.edit',[$publication->id ])}}" style="padding: 11px 16px;font-size: 11px;line-height: 1.3333333;border-radius: 6px;" >

                                <span class="glyphicon glyphicon-pencil" href="{{ route('admin.articulo.edit',[$publication->id ])}}"></span>
                            </a>
                        </button>
                    </td>
                    <td>
                        <a class="delete btn btn-small btn-danger" href="{{ route('admin.articulo.delete',[$publication->id ])}}">

                            <span class="glyphicon glyphicon-trash" href="{{ route('admin.articulo.delete',[$publication->id ])}}"></span>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

@endsection