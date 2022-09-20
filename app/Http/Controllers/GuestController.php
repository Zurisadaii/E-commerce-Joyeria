<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\CreateCatalogo;

class GuestController extends Controller
{
    public function verProductos () {
        $productos=CreateCatalogo::all();
        return view('productosCli')->with('productos',$productos);
    }

    public function verProductosTipo ($tipo) {
        $productos=CreateCatalogo::all();
        switch ($tipo) {
            case "collares":
                $productos2=$productos->where('tipo', 'collar');
                break;
            case "aretes":
                $productos2=$productos->where('tipo', 'aretes');
                break;
            case "pulseras":
                $productos2=$productos->where('tipo', 'pulsera');
                break;
            case "anillos":
                $productos2=$productos->where('tipo', 'anillo');
                break;
            case "otros":
            default:
                $productos2=CreateCatalogo::all();
        }
        return view('productosCli')->with('productos',$productos2);
    }

    public function producto ($id) {
        $producto=CreateCatalogo::find($id);
        return view('detalleProducto')->with('producto', $producto);
    }
}