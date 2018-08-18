<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function index(Cliente $cliente){
        //traz os dados da tabela
        $clientes = $cliente->all();
        
        return view('painel.cliente.index', compact('clientes'));
    }

    public function cadastrar(Request $request){
        //pega todos os dados do formulaio para cadasrtar
        $dadosCliente = $request->all();

        $insert = $this->insert($dadosCliente);
        if($insert)
            return redirect()->route('cliente.index');
        else redirect()->back();


    }
}
