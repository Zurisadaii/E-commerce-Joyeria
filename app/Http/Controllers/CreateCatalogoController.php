<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\CreateCatalogo;

class CreateCatalogoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }
    public function guardaProducto(Request $request) {
        if(isset($request->identificador)) {
            $prod=CreateCatalogo::find($request->identificador);
        } else 
            $prod=new CreateCatalogo();
            
        $prod->nombreProducto=$request->nombreProducto;
        $prod->descripcion=$request->descripcion;
        $prod->precio=$request->precio;
        $prod->disponibilidad=$request->disponibilidad;
        $prod->stock=$request->stock;
        $prod->tipo=$request->tipo;
        if ($request->has(['imagen'])) {
            $imagenNom = $request->file('imagen')->getClientOriginalName();
            $path = $request->file('imagen')->storeAs('img', $imagenNom, 'public');
            $prod->imagen=$imagenNom;
        }
        $prod->image_alt=$request->image_alt;
        $prod->save();

            if(isset($request->identificador)) {
                return redirect('/ver-catalogo');
            }
            return redirect('/ver-catalogo');

    }

    public function verCatalogo () {
        $productos=CreateCatalogo::all();
        if($productos->isEmpty()) {
            return redirect('addProd');
        } else {
            return view('verCatalogo')->with('productos',$productos);
        }
    }

    public function verProductos () {
        $productos=CreateCatalogo::all();
        return view('productosCli')->with('productos',$productos);
    }

    public function verAddProd() {
        return view('addProd');
    }

    // public function editar ($id=null) {
    //     if(!is_null($id)) {
    //         $producto = CreateCatalogo::find($id);
    //         return view("editCatalogo")->with('producto', $producto);
    //     } else
    //     return redirect('/ver-catalogo');
    // }

    public function editar ($id=null) {
        if(!is_null($id)) {
            $producto = CreateCatalogo::find($id);
            return response ($producto);
        } else
        return redirect('/ver-catalogo');
    }

    public function eliminar ($id) {
        $producto=CreateCatalogo::find($id);
        $producto->borrado = 1;
        $producto->save();
        return redirect('/ver-catalogo');
    }
    
    public function reestablecer ($id) {
        $producto=CreateCatalogo::find($id);
        $producto->borrado = 0;
        $producto->save();
        return redirect('/ver-catalogo');
    }

    public function buscarProductos(Request $request) {
        $search = $request->input('search');
        $productos = CreateCatalogo::query()->where('nombreProducto', 'LIKE', "%{$search}%")->orWhere('descripcion', 'LIKE', "%{$search}%")->get();
        if ($productos->isEmpty()) {
            $productos=CreateCatalogo::all();
        }
        return view('verCatalogo')->with('productos', $productos);
    }
}
