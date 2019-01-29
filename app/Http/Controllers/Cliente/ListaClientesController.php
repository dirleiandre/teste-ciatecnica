<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;

class ListaClientesController extends Controller
{
    public function index(){
        return Response()->json(Cliente::orderBy('id','desc')->get(), 200);
        
        /*
        $clientes = array(
            array('nome'=>'Dirlei','cidade'=>'Rio das Pedras'),
            array('nome'=>'Dirlei','cidade'=>'Rio das Pedras'),
            array('nome'=>'Dirlei','cidade'=>'Rio das Pedras'),
            array('nome'=>'Dirlei','cidade'=>'Rio das Pedras')
        );
        return Response()->json($clientes, 200);*/

    }
        
}
