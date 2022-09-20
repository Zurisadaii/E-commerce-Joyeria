<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\CreateCatalogo;

class CreateViewCatalogoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

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

    public function cart () {
        return view('cart');
    }

    public function addToCart ($id=null) {
        $producto = CreateCatalogo::find($id);
        if ($producto->disponibilidad == 1) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['cantidad']++;
            } else {
                $cart[$id] = [
                    'identificador' => $producto -> id,
                    'nombre' => $producto -> nombreProducto,
                    'precio' => $producto -> precio,
                    'cantidad' => 1,
                    'imagen' => $producto -> imagen,
                ];
            }

            session()->put('cart', $cart);
        }
        
    return redirect() ->back();
    }

    public function update (Request $request) {
        if ($request->id && $request->cantidad) {
            $cart = session()->get('cart');
            $cart[$request->id]['cantidad'] = $request->cantidad;
            session()->put('cart', $cart);
            session()->flash('success', 'Carrito actualizado');
        }
    }

    public function remove (Request $request) {
        if($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function clearCarrito(Request $request) {
        $request->session()->forget('cart');
    }
    public function buscarProductos(Request $request) {
        $search = $request->input('search');
        $productos = CreateCatalogo::query()->where('nombreProducto', 'LIKE', "%{$search}%")->orWhere('descripcion', 'LIKE', "%{$search}%")->get();
        if ($productos->isEmpty()) {
            $productos=CreateCatalogo::all();
        }
        return view('productosCli')->with('productos', $productos);
    }

    public function producto ($id) {
        $producto=CreateCatalogo::find($id);
        return view('detalleProducto')->with('producto', $producto);
    }
}
