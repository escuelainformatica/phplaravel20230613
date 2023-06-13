<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   public function __construct(public Request $request) {
    
   }

    public function listar() {
        $productos=Producto::all();
        return view("producto.listar",['productos'=>$productos]);
    }
    public function insertar() {

    }
}
