@extends('layouts.app')

@section('contenido')
<style>
    #cuadro{
        width:45%;
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
        padding: auto;
        align-self: right;
    }

    #boton:hover {
        color: #FFFFFF;
        background-color: #b57170;
    }

    #contenedor {
        border-color: #f9f3ee;
        padding: 8%;
        border-radius: 10px;
    }

    #titulo {
        padding-bottom: 5px;
        margin-top: -10px;
    }
    #opciones{
        margin-left: 10px;
    }

    #formulario {
        margin: auto;
        width: 100%;
    }

    #disclaimer, #disclaimer2{
        font-size: 12px;
        color: red;
        margin-left: 5px;
    }
    #total {
        width: 83%;
        margin: auto;
        text-align: right;
    }
    #total2 {
        font-size: 18px;
    }
    #botones2 {
        margin: auto;
        text-align: right;
    }
</style>
    
<div class="container" id="cuadro">
    <div class="row align-items-center">
        <div class="col">
            <div class="card border-3" id="contenedor">
                <h4 id="titulo">Realizar Pedido</h4>
                <form action="/hacerPedido" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="clientes_id" value="{{Auth::user()->id}}">
                    <div class="my-1">
                        <div class="form-group my-1">
                            <div class="row">
                                <label for="" id="letrero">Metodo de entrega:</label>
                                <div class="form-check col my-2" id="opciones">
                                    <input type="radio" class="form-check-input" id="Personal" name="metodoEntrega" value="Personal" required>
                                    <label class="form-check-label" for="Personal">Personal</label>
                                </div>
                                <div class="form-check col my-2" id="opciones">
                                    <input type="radio" class="form-check-input" id="Paquetería" name="metodoEntrega" value="Paquetería" required>
                                    <label class="form-check-label" for="Paquetería">Paquetería</label>
                                </div>
                            </div>
                            <div class="my-1" id="lugar"></div>
                            <div id="productos-compra">
                                <table id="cart" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:35%">Producto</th>
                                            <th style="width:15%">Precio</th>
                                            <th style="width:13%">Cantidad</th>
                                            <th style="width:27%" class="text-center">Subtotal</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['precio'] * $details['cantidad'] @endphp
                                                <tr data-id="{{ $id }}">
                                                    <input type="hidden" name="cantidad"  value="{{ $details['cantidad'] }}">
                                                    <input type="hidden" name="precio" value="{{ $details['precio'] * $details['cantidad'] }}">
                                                    <td data-th="Producto">{{ $details['nombre'] }}</td>
                                                    <td data-th="Precio">${{ $details['precio'] }}</td>
                                                    <td data-th="Cantidad">{{ $details['cantidad'] }}</td>
                                                    <td data-th="Subtotal" class="text-center">${{ $details['precio'] * $details['cantidad'] }}</td>
                                                    <td class="actions" data-th="">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table> 
                                <div class="row text-right" id="total">
                                    <div class="col-8" id="total">
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <h5><strong id="total2" name="total "class="text-right">Total:      ${{ $total }}</strong></h5>
                                    </div>
                                </div>
                            </div>
                            <div id="botones2">
                                @if(empty (Session :: get ('cart')))
                                <button type="submit" id="boton" class="btn btn-primary m-2" disabled>Continuar</button>
                                @else
                                <button type="submit" id="boton" class="btn btn-primary m-2 ">Continuar</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  


<script type="text/javascript">
    var showT = false;
    var showM = false;
    $(document).ready(function() {  
        $('input[name="metodoEntrega"]').click(function() {
            if (!$("input[id='Personal']").is(":checked")) {
                $('#per').remove();
                $('#per2').remove();
                $('#disclaimer2').remove();
                showM = false;
            } else
             if ($("input[id='Personal']").is(":checked") && !showM) {
                $('#lugar').append("<label id='per' class='col-4 mb-2' for='per'>Lugar de Entrega:</label>")
                $('#lugar').append("<select id='per2' class='form-control' name='lugarEntrega' required><option value='PSL'>Plaza San Luis</option><option value='PT'>Plaza Tangamanga</option><option value='PC'>Plaza Citadella</option><option value='ZU'>Zona Universitaria</option></select>")
                $('#lugar').append("<p id='disclaimer2'>*  El vendedor se contactará con usted para definir la hora de entrega</p>");
                showM = true;
            }
            if (!$("input[id='Paquetería']").is(":checked")) {
                $('#pa').remove();
                $('#pa2').remove();
                $('#disclaimer').remove();
                showT = false;
            } else 
            if ($("input[id='Paquetería']").is(":checked")  && !showT) {
                $('#lugar').append("<label id='pa' class='col-4 mb-2' for='pa'>Lugar de Entrega:</label>")
                $('#lugar').append("<input id='pa2' class='form-control' name='lugarEntrega' type= 'text' placeholder='Ingrese localización de entrega...  *'  name='lugarEntrega' value='' required>")
                $('#lugar').append("<p id='disclaimer'>*  El vendedor se contactará con usted para cotizar el precio de envío</p>");
                showT = true;
            }
        });
    });
    $(".forget-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('clearCarrito.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
</script>
@endsection