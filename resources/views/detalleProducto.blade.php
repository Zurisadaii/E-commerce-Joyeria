@extends('layouts.app')

@section('contenido')

<style>
    #addCarrito{
        background-color: #ce9d78;
        color: white;
        font-size: 16px;
        width:170px;
        height: 35px;
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
        font-size: 15px;
        width:170px;
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

    #producto {
        width: 65%;
    }
    #dato {
        margin-top: 5%;
        margin-bottom: 0%;
        padding: 5%;
    }

    #titulo {
        margin-bottom: 8%;
    }
    #linea {
        border-left: 1px solid lightgray;
        padding-left: 30px;
    }
    #imagen {
        padding: 5%;
    }
    #botones{
        display: flex;
    }
    #desc{
        font-size: 20px;
    }
    #precio{
        font-size: 20px;
        font-weight: bold;
        color: #B57575;
    }
    #av{
        font-size: 20px;
    }
</style>
<div class="card shadow  m-auto" id="producto">
    <div class="container p-3">
        <div class="row">
            <div class="col-6">
                <div class="row" id="imagen">
                    <img src="{{asset('/storage/img/'.$producto->imagen)}}" alt="{{$producto->image_alt}}" style="width:425px, height: 425px,  margin: auto;">
                </div>
            </div>
            <div class="col-6" id="linea">
                <div class="row m-auto">
                    <div class="row" id="dato">
                        <div class="col w-100 col-lg-6 mb-5">
                            <div id="titulo">
                                <h3>{{$producto->nombreProducto}}</h3>
                            </div>
                            
                            <p id="desc">{{$producto->descripcion}}</p>
                            <p id="precio">$ {{$producto->precio}}</p>
                            @if ($producto->disponibilidad == 1)
                            <p id="av">Disponible</p>
                            @elseif ($producto->disponibilidad == 2)
                            <p id="av">No Disponible</p>
                            @endif
                        </div>
                        
                    </div>
                    <div class="row" id="botones">
                        <div class="col  mt-5 text-center">
                            <p><button class="m-auto" onclick="location.href='/productos'" id="addCarrito">< Volver</button></p>
                        </div>
                        <div class="col  mt-5 text-center">
                            @if($producto->disponibilidad == 1) 
                                <p><button onclick="location.href='{{ route('add.to.cart', $producto->id) }}'" id="addCarrito">Agregar a Carrito</button></p>
                            @elseif ($producto->disponibilidad == 2) 
                                <p><button onclick="location.href='{{ route('add.to.cart', $producto->id) }}'" id="addCarrito" disabled>Agregar a Carrito</button></p>
                            @endif
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection