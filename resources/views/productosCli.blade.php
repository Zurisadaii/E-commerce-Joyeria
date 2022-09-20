@extends('layouts.app')

@section('contenido')

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: auto;
        padding-top: 10px;
        text-align: center;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .precio {
        color: grey;
        font-size: 18px;
    }

    #menu2 {
        width: 250px;
        margin-right: 25px;
        border: 10px;
        margin-top: 2%;
        height: 250px;;
        align-items: flex-start;
    }

    #nombre {
        margin-top: 15px;
        font-size: 18px;
        cursor: pointer;
    }

    #productos {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    #producto {
        width: 270px;
        max-height: 385px;
    }

    #catalogo {
        padding: 20px;
        width: 100%;
    }

    #titulo {
        margin-left: 45px;
        width: 55%;
    }

    #lista {
        margin: auto;
        width: 90%;
    }

    #sideMenu {
        color: #434343;
        min-width: 100%;
        background-color: white;
        border: none;
        margin: 4%;
    }
    #sideMenu:hover {
        color: #434343;
        background-color: #E0E0E0;
    }
    #dividir {
        margin: 0%;
    }

    #foto {
        cursor: pointer;
    }

    #addCarrito{
        background-color: #ce9d78;
        color: white;
        font-size: 12px;
        width:130px;
        border: none;
        border-radius: 5px;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    #addCarrito:link, #addCarrito:visited {
        background-color: #ce9d78;
        color: white;
        font-size: 12px;
        width:130px;
        border: none;
        border-radius: 5px;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    #addCarrito:hover, #addCarrito:active {
        background-color: #BD9475;
        color: white;
    }

    #addCarrito:disabled {
        background-color: #A78469;
    }
</style>

<div class="row" id="titulo">
    <br>
</div>
<div class="row" id="catalogo">
    <div id="menu2" class="col card col-lg-2">
        <ul class="list-group list-group-flush" id="lista">
            @guest
            <button id="sideMenu" onclick="location.href='/productosG'">Todos</button>
            @else
            <button id="sideMenu" onclick="location.href='/productos'">Todos</button>
            @endguest
            <hr class="solid" id="dividir">
            <button id="sideMenu" onclick="location.href='/productos/anillos'">Anillos</button>
            <hr class="solid" id="dividir">
            <button id="sideMenu" onclick="location.href='/productos/pulseras'">Pulseras</button>
            <hr class="solid" id="dividir">
            <button id="sideMenu" onclick="location.href='/productos/collares'">Collares</button>
            <hr class="solid" id="dividir">
            <button id="sideMenu" onclick="location.href='/productos/aretes'">Aretes</button>
            <!-- <li class="list-group-item" href="{{ url('/') }}" id="catego"><a id="sideMenu" href="{{ url('/') }}">Todos</a></li>
            <li class="list-group-item" id="catego"><a id="sideMenu" href="{{ url('/') }}">Anillos</a></li>
            <li class="list-group-item" id="catego"><a id="sideMenu" href="{{ url('/') }}">Pulseras</a></li>
            <li class="list-group-item" id="catego"><a id="sideMenu" href="{{ url('/') }}">Collares</a></li>
            <li class="list-group-item" id="catego"><a id="sideMenu" href="{{ url('/') }}">Aretes</a></li> -->
        </ul>
    </div>
    @if ($productos->isEmpty())

    @else
    <div id = "productos" class="col">
        <div class="row" id = "productos" >
        @foreach ($productos as $p)
            @if($p->borrado == 0)
                @if($p->disponibilidad == 1)
                <div class="card" id="producto">
                    <img src="{{asset('/storage/img/'.$p->imagen)}}" id="foto" onclick="location.href='/producto/{{$p->id}}'" alt="{{$p->image_alt}}" style="width:100%, height: 250px;">
                    <h5 id="nombre" onclick="location.href='/producto/{{$p->id}}'">{{$p->nombreProducto}}</h5>
                    <p class="precio">${{$p->precio}}</p>
                    <!-- <p>{{$p->descripcion}}</p> -->
                    @guest
                    @else
                    <p><button onclick="location.href='{{ route('add.to.cart', $p->id) }}'" id="addCarrito">Agregar a Carrito</button></p>
                    @endguest
                    <!-- <button href="{{ route('add.to.cart', $p->id) }}" >Add to Cart</button> -->
                </div>
                @elseif ($p->disponibilidad == 2)
                <div class="card" id="producto">
                    <img src="{{asset('/storage/img/'.$p->imagen)}}" id="foto" onclick="location.href='/producto/{{$p->id}}'" alt="{{$p->image_alt}}" style="width:100%, height 250px;">
                    <h5 id="nombre" onclick="location.href='{{ route('add.to.cart', $p->id) }}'">{{$p->nombreProducto}}</h5>
                    <p class="precio">No Disponible</p>
                    <!-- <p>{{$p->descripcion}}</p> -->
                    @guest
                    @else
                    <p><button href="{{ route('add.to.cart', $p->id) }} " id="addCarrito" disabled>Agregar a Carrito</button></p>
                    @endguest
                    <!-- <button href="{{ route('add.to.cart', $p->id) }}" >Add to Cart</button> -->
                </div>
                @elseif ($p->disponibilidad == 3)
                <div class="card" id="producto">
                    <img src="{{asset('/storage/img/'.$p->imagen)}}" id="foto" alt="{{$p->image_alt}}" style="width:100%, height 250px;">
                    <h5 id="nombre">{{$p->nombreProducto}}</h5>
                    <p class="precio">Proximamente</p>
                    <!-- <p>{{$p->descripcion}}</p> -->
                    @guest
                    @else
                    <p><button id="addCarrito" disabled>Agregar a Carrito</button></p>
                    @endguest
                    <!-- <button href="{{ route('add.to.cart', $p->id) }}" >Add to Cart</button> -->
                </div>
                @endif
            @endif
        @endforeach
        </div>
    </div>
    @endif
</div>

@endsection