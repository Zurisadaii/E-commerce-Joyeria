@extends('layouts.app')

@section('contenido')

<style>
    #cart {
        width: 80%;
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
    #regresar{
        max-width: 100px;
        background-color: #ce9d78;
        color: #fff;
        border: none;
        padding: 10px;
        text-decoration: none;
        border-radius:5px;
    }
    #regresar:hover, #regresar:active {
        background-color: #BD9475;
        color: white;
    }
</style>
    <div id="botones1" class="col">
        <a href="{{ url('/productos') }}" id="regresar">< Volver a Catálogo</a>
    </div>
<table id="cart" class="table table-condensed">
    <thead>
        <tr>
            <th style="width:45%">Producto</th>
            <th style="width:10%">Precio</th>
            <th style="width:8%">Cantidad</th>
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
                    <td data-th="Producto">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src='{{URL::to("/")}}/storage/img/{{ $details["imagen"] }}' width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 id="producto">{{ $details['nombre'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Precio">${{ $details['precio'] }}</td>
                    <td data-th="Cantidad">
                        <input type="number" min="0" oninput="validity.valid||(value='')" value="{{ $details['cantidad'] }}" class="form-control cantidad update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['precio'] * $details['cantidad'] }}</td>
                    <td data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><ion-icon name="trash-outline"></ion-icon></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table> 
<div class="row text-right" id="total">
    <div class="col-8" id="total">
        <h5 ><strong class="text-right">Total ${{ $total }}</strong></h5>
    </div>
    <div class="col" id="compra">
        
    </div>
</div>
<hr class="solid" id="dividir">
<div class="row"id="botones2">
    <div class="col"  >
        <button class="btn btn-success" onclick="location.href='/pedido'">Realizar Compra</button>
    </div>
</div>
                




<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        if($(this).val() == 0) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        } else {
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    cantidad: ele.parents("tr").find(".cantidad").val()
                },
                success: function (response) {
                window.location.reload();
                }
            });
        }
        
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
  
</script>

@endsection