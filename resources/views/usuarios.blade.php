@extends('layouts.app')

@section('contenido')

<style>
    #cuadro{
        width:95%;
        border-color: #000;
        height: auto;
        margin-bottom: 25px;
    }

    #letrero{
        margin-bottom: 5px;
        font-size: 17px;
    }

    #boton {
        margin-top: 5px;
        border-radius: 7px;
        background-color: #ce9d78;
        color: #fff;
        border: 1px solid;
        height: 35px;
    }

    #boton:hover {
        background-color: #FFFFFF;
        color: #9B74C9;
    }

    #contenedor {
        border-color: #f9f3ee;
        padding: 6%;
        border-radius: 10px;
        height: 80%;
    }

    #titulo {
        padding-bottom: 5px;
        margin-top: -10px;
    }
    
    #opciones{
        margin-left: 10px;
    }
</style>
<div class="container" id="cuadro">
    <h4>Usuarios Registrados</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Email</th>
                <th scope="col">Método Contacto</th>
                <th scope="col">Usuario Contacto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Editar Usuario</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
        @if($usuario->tipo == 1)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->apellidoP}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->metodoContacto}}</td>
                <td>{{$usuario->usuarioContacto}}</td>
                <td>{{$usuario->tipo}}</td>
                <td>
                    <button class="btn btn-primary" onclick="location.href=href='/hacerAdmin/{{$usuario->id}}'">Cambiar a Admin</button>
                <br><br>
                <button class="btn btn-primary" onclick="location.href=href=''">Eliminar</button>
                </td>
            </tr>
        @endif
        @endforeach
        </tbody>
    </table>
    <br>
    <h4>Administradores</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Email</th>
                <th scope="col">Método Contacto</th>
                <th scope="col">Usuario Contacto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Editar Usuario</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
        @if($usuario->tipo == 0)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->apellidoP}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->metodoContacto}}</td>
                <td>{{$usuario->usuarioContacto}}</td>
                <td>{{$usuario->tipo}}</td>
                <td>
                    <button class="btn btn-primary" onclick="location.href=href='/quitarAdmin/{{$usuario->id}}'">Cambiar a Usuario</button>
                <br><br>
                <button class="btn btn-primary" onclick="location.href=''">Eliminar</button>
                </td>
            </tr>
        @endif
        @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection


