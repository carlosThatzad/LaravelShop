
@extends('layouts.admin')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div style="height: auto;">

        <div class="btn-group mt-5 ml-5 mb-4">
            <a href="{{ route('admin.user.create') }}" class="btn btn-info" >Añadir Usuario</a>
        </div>
        <div class="btn-group mt-4 ml-5 align-items-center">
            <a href="{{ route('admin.tablehome') }}" class="btn btn-info" >Administrador Publicaciones</a>

        </div>
        <table col="8" class="table table-striped table-dark" align="center" style=" width: 80%;">

            <thead >
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>
            <tbody >
            @foreach($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <?php $rol=\App\Models\UserRoles::select ('name')->where('id','=',$user->role_id)->first();?>
                    <td>{{ $rol->name }}</td>
                    <td>{{$user->telephone}}</td>

                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.user.edit',[$user->id ])}}">
                            <button type="button" class="btn btn-default btn-lg" href="{{ route('admin.user.edit',[$user->id ])}}" style="padding: 11px 16px;font-size: 11px;line-height: 1.3333333;border-radius: 6px;" >

                                <span class="glyphicon glyphicon-pencil" href="{{ route('admin.user.edit',[$user->id ])}}"></span>
                        </a>
                        </button>
                    </td>
                    <td>
                        <a class="delete btn btn-small btn-danger" href="{{ route('admin.user.delete',[$user->id ])}}">

                            <span class="glyphicon glyphicon-trash" href="{{ route('admin.user.delete',[$user->id ])}}"></span>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

@endsection