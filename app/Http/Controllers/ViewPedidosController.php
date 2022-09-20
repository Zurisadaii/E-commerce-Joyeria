<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use\App\CreatePedidos;
use App\Http\Controllers\CreateDetallesPedidosController;
use Auth;

class ViewPedidosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }


    public function verPedidos() {
        $pedidos = CreatePedidos::all();
        return view('pedidosAdmin')->with('pedidos', $pedidos);
        // echo $pedidos;
    }
}
