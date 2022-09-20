@extends('layouts.app')

@section('contenido')
<style>
    #letrero {
        margin-left: 12%;
    }
</style>

<div class="container">
    <table class="table w-75 m-auto">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>ID Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Opciones Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            @if ($pedido->estado != 3)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->clientes_id}}</td>
                <td>{{$pedido->total}}</td>
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
                <td>{{$pedido->created_at->toDateString()}}</td>
                <td>
                    <div class="m-auto text-center">
                        <button class="btn btn-warning btn-sm" value="2" data-toggle="tooltip" data-placement="bottom" title="Pago Pendiente" onclick="location.href='/pPendiente/{{$pedido->id}}'"><ion-icon name="cash-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="1" data-toggle="tooltip" data-placement="bottom" title="Autorizar" onclick="location.href='/autorizado/{{$pedido->id}}'"><ion-icon name="bag-check-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="4" data-toggle="tooltip" data-placement="bottom" title="Enviado" onclick="location.href='/enviado/{{$pedido->id}}'"><ion-icon name="airplane-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="5" data-toggle="tooltip" data-placement="bottom" title="Entregado" onclick="location.href='/entregado/{{$pedido->id}}'"><ion-icon name="checkmark-circle-outline"></ion-icon></button>
                        <button class="btn btn-danger btn-sm" value="3" data-toggle="tooltip" data-placement="bottom" title="Cancelar" onclick="location.href='/cancelado/{{$pedido->id}}'"><ion-icon name="close-circle-outline"></ion-icon></button>
                        <br>
                        <input type="button" value="Revisar detalles de Pedido" id=<?php echo $pedido->id; ?>   class="btn btn-primary detalles my-3"> 
                    </div>            
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    <br><br>
    <h5 class="ml-4" id="letrero">Pedidos Cancelados</h5>
    <table class="table w-75 m-auto">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>ID Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Opciones Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            @if ($pedido->estado == 3)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->clientes_id}}</td>
                <td>{{$pedido->total}}</td>
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
                <td>{{$pedido->created_at->toDateString()}}</td>
                <td>
                    <div class="m-auto text-center">
                        <button class="btn btn-warning btn-sm" value="2" data-toggle="tooltip" data-placement="bottom" title="Pago Pendiente" onclick="location.href='/pPendiente/{{$pedido->id}}'"><ion-icon name="cash-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="1" data-toggle="tooltip" data-placement="bottom" title="Autorizar" onclick="location.href='/autorizado/{{$pedido->id}}'"><ion-icon name="bag-check-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="4" data-toggle="tooltip" data-placement="bottom" title="Enviado" onclick="location.href='/enviado/{{$pedido->id}}'"><ion-icon name="airplane-outline"></ion-icon></button>
                        <button class="btn btn-success btn-sm" value="5" data-toggle="tooltip" data-placement="bottom" title="Entregado" onclick="location.href='/entregado/{{$pedido->id}}'"><ion-icon name="checkmark-circle-outline"></ion-icon></button>
                        <button class="btn btn-danger btn-sm" value="3" data-toggle="tooltip" data-placement="bottom" title="Cancelar" onclick="location.href='/cancelado/{{$pedido->id}}'"><ion-icon name="close-circle-outline"></ion-icon></button>
                        <br>
                        <input type="button" value="Revisar detalles de Pedido" id=<?php echo $pedido->id; ?>   class="btn btn-primary detalles my-3"> 
                    </div>            
                </td>
            </tr>
            @endif
            @endforeach
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


