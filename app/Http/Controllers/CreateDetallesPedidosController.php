<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use\App\CreateDetallesPedidos;

class CreateDetallesPedidosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function crearDetalles ($idCli, $pedid, $carrito, $metodo, $lugar, $total){
        $detPedido = new CreateDetallesPedidos();
        $detPedido -> clientes_id = $idCli;
        $detPedido -> pedidos_id = $pedid;
        $detPedido -> productos = $carrito;
        $detPedido -> metodoEntrega = $metodo;
        $detPedido -> lugarEntrega = $lugar;
        $detPedido -> total = $total;
        $detPedido->save();
    }

    public function viewDetalles ($idPedido=null) {
        if(!is_null($idPedido)) {
            $pedidos = CreateDetallesPedidos::all();
            $pedido = $pedidos -> firstWhere('pedidos_id', '=', $idPedido);
            return response ($pedido);
        } else
        return redirect('/pedidos');
    }
}
