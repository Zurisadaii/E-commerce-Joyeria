<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use\App\CreatePedidos;
use App\Http\Controllers\CreateDetallesPedidosController;
use Auth;

class CreatePedidosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function Pedido () {
        return view('realizarPedido');
    }

    public function realizarPedido(Request $request) {
        $pedido = new CreatePedidos();
        $cart = $request->session()->get('cart');
        $pedido->clientes_id = $request->clientes_id;
        $pedido->total = $request->total;
        $pedido-> save();
        $request->session()->forget('cart');
        $detalles_pedido = new CreateDetallesPedidosController;
        $detalles_pedido ->crearDetalles($request->clientes_id, $pedido->id, json_encode($cart), $request->metodoEntrega, $request->lugarEntrega, $request->total);
        return redirect('/productos');
    }

    public function verPedidos() {
        $clientes_id = Auth::user()->id;
        $pedidos = CreatePedidos::query()->where('clientes_id', '=', $clientes_id)->get();
        return view('pedidosCliente')->with('pedidos', $pedidos);
        // echo $pedidos;
    }
}
