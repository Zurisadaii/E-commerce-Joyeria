<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use\App\CreateDetallesPedidos;
use\App\CreatePedidos;

use Auth;

class ViewDetallesPedidosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

        public function verPedidos () {
        $pedidos = CreateDetallesPedidos::all();
        return view ('pedidosAdmin')->with('pedidos', $pedidos);
    }

    public function autorizadoP ($id) {
        $pedido=CreatePedidos::find($id);
        $pedido->estado = 1;
        $pedido->save();
        return redirect('/pedidosAdmin');
    }
    public function pendienteP ($id) {
        $pedido=CreatePedidos::find($id);
        $pedido->estado = 2;
        $pedido->save();
        return redirect('/pedidosAdmin');
    }
    public function canceladoP ($id) {
        $pedido=CreatePedidos::find($id);
        $pedido->estado = 3;
        $pedido->save();
        return redirect('/pedidosAdmin');
    }
    public function enviadoP ($id) {
        $pedido=CreatePedidos::find($id);
        $pedido->estado = 4;
        $pedido->save();
        return redirect('/pedidosAdmin');
    }
    public function entregadoP ($id) {
        $pedido=CreatePedidos::find($id);
        $pedido->estado = 5;
        $pedido->save();
        return redirect('/pedidosAdmin');
    }
}
