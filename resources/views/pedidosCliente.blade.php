@extends('layouts.app')

@section('contenido')

<style>
    #tablaPedidos {
        width: 70%;
        padding: 25px;
        margin: auto;
    }

    #producto {
        font-size: 18px;
    }
    #total {
        width: 80%;
        padding: 8px;
        margin: auto;
        text-align: right;
    }
    #botones1 {
        width: 80%;
        padding: 15px;
        margin: auto;
        text-align: left;
    }
    #botones2 {
        width: 80%;
        padding: 15px;
        margin: auto;
        text-align: right;
    }
    #compra {
        padding: 15px;
        margin: auto;
        text-align: center;
    }
    #dividir {
        width: 80%;
        margin: auto;
    }
    #detalles{
        max-width: 200px;
        background-color: #ce9d78;
        color: #fff;
        border: none;
        text-decoration: none;
        border-radius:5px;
    }
    #detalles:hover, #detalles:active {
        background-color: #BD9475;
        color: white;
    }
</style>

<div class="container" id="cuadro">
    <table id="tablaPedidos" class="table table-condensed">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cantidad total</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th style="width:20%">Detalles</th>
            </tr>
        </thead>
        <tbody>
        @if(!$pedidos->isEmpty())
            @foreach ($pedidos as $pedido)
                <tr>
                    <th scope="row">{{$pedido->id}}</th>
                    <td>{{$pedido->total}}</td>
                    <td id="fecha">{{$pedido->created_at->toDateString()}}</td>
                    @if ($pedido->estado == 0)
                    <td>Pendiente</td>
                    @elseif ($pedido->estado == 1)
                    <td>Autorizado</td>
                    @elseif ($pedido->estado == 2)
                    <td>Pago Pendiente</td>
                    @elseif ($pedido->estado == 3)
                    <td>Cancelado</td>
                    @elseif ($pedido->estado == 4)
                    <td>Enviado</td>
                    @elseif ($pedido->estado == 5)
                    <td>Entregado</td>
                    @endif
                    <td class="text-center"><input type="button" value="Revisar detalles de Pedido" id=<?php echo $pedido->id; ?>   class="btn btn-primary detalles"></td>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table> 
</div>

@if ($pedidos->isEmpty())

@else

<div class="modal fade" id="pedido-Modal" role="dialog" tabindex="-1" aria-labelledby="pedido-Modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size:22px" id="verPedidoLabel">Ver pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 for="" style="font-size:18px">ID de Pedido</h5>
                <p id="IDPedido"></p>
                <br>
                <h5 for="" style="font-size:18px">Productos</h5>
                <!-- <div id="productos"></div> -->
                <table class="m-auto">
                    <thead>
                        <tr>
                            <th style="width:45%">Nombre de Producto</th>
                            <th style="width:25%">Cantidad</th>
                            <th style="width:20%">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="productos">
                    </tbody>
                </table>
                <br>
                <h5 for="" style="font-size:18px">Precio Total</h5>
                <p id="pago"></p>
                <br>
                <h5 for="" style="font-size:18px">Método de Entrega</h5>
                <p id="metEntrega"></p>
                <br>
                <h5 for="" style="font-size:18px">Lugar de Entrega</h5>
                <p id="lugEntrega">

                </p>
                <br>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    $(document).ready(function() {
        $(document).on('click', '.detalles', function(){
        var pedido_id = $(this).attr('id');
        
        $.ajax({
            method:"GET",
            url:"/detallesPedido/"+pedido_id,
            //console.log(prod_id);
            success: function(response){
                $('#IDPedido').html(response.pedidos_id);
                const carrito = JSON.parse(response.productos);
                for (let x in carrito) {
                    $("#productos").append("<tr><td>"+carrito[x].nombre+"</td><td>"+ carrito[x].cantidad+"</td><td>"+ carrito[x].precio+"</td></tr>");
                }
                $('#pago').html('$'+response.total);
                $('#metEntrega').html(response.metodoEntrega);
                if (response.lugarEntrega == "ZU") {
                    $('#lugEntrega').html("Zona Universitaria");
                } else if (response.lugarEntrega == "PSL"){
                    $('#lugEntrega').html("Plaza San Luis");
                } else if (response.lugarEntrega == "PT") {
                    $('#lugEntrega').html("Plaza Tangamanga");
                } else if (response.lugarEntrega == "PC") {
                    $('#lugEntrega').html("Plaza Citadella");
                } else {
                    $('#lugEntrega').html(response.lugarEntrega);
                }
                $('#pedido-Modal').modal('show');
                },
            })
        })

        $("#pedido-Modal").on("hidden.bs.modal", () => {
            $("#productos").html("")
        });
    });
</script>
@endsection