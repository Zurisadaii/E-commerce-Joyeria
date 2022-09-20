<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function mostrarUsusarios () {
        $usuarios=User::all();
        return view('usuarios')->with('usuarios',$usuarios);
    }

    public function hacerAdmin ($id) {
        $usuario=User::find($id);
        $usuario->tipo = 0;
        $usuario->save();
        return redirect('/usuarios');
    }

    public function quitarAdmin ($id) {
        $usuario=User::find($id);
        $usuario->tipo = 1;
        $usuario->save();
        return redirect('/usuarios');
    }

    public function eliminarUser ($id) {
        
    }
}
