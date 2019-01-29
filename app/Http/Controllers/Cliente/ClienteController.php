<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use Session;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::all();
                
        return view('cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recupera todos os campos

        $cliente = new Cliente();

        $tipoPessoa = $request->input('rdbpessoa');

        //limpa caracteres cpf
        $cpf = $request->input('cpf');
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        
        //limpa caracteres cnpj
        $cnpj = $request->input('cnpj');
        $cnpj = str_replace('.','',$cnpj);
        $cnpj = str_replace('-','',$cnpj);
        $cnpj = str_replace('/','',$cnpj);
        
        //limpa caracteres cep
        $cep = $request->input('cep');
        $cep = str_replace('.','',$cep);
        $cep = str_replace('-','',$cep);

        //verifica quantos anos a pessoa tem
        if($tipoPessoa == 1) //se tipo for pessoa fisica
        {
            list($ano, $mes, $dia) = explode('-', $request->input('dtnascimento'));

            // data atual
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            if($idade < 19)
            {
                Session::flash('men_erro','Você deve possuir no minimo 19 anos para esse cadastro');
                return redirect()->back();  
            }
        }



        $cliente->tipocliente = $request->input('rdbpessoa');
        $cliente->cpf = $cpf;
        $cliente->nome = $request->input('nome');
        $cliente->dtnascimento = $request->input('dtnascimento');
        $cliente->sobrenome = $request->input('sobrenome');
        $cliente->cnpj = $cnpj;
        $cliente->razaosocial = $request->input('razaosocial');
        $cliente->nomefantasia = $request->input('nomefantasia');
        $cliente->cep = $cep;
        $cliente->logradouro = $request->input('logradouro');
        $cliente->numero = $request->input('numero');
        $cliente->complemento = $request->input('complemento');
        $cliente->bairro = $request->input('bairro');
        $cliente->cidade = $request->input('cidade');
        $cliente->uf =  $request->input('uf');
               
        //dd($cliente);

        //se salvou com sucesso
        if($cliente->save())
        {
            Session::flash('men_sucesso','Registro inserido com sucesso!');  //gera mensagem de sucesso e redireciona para a view de listagem
            return redirect('cadastro');  
        }
        else
        {
            Session::flash('men_erro','Não foi possível inserir esse registro'); // senao gera a mensagem de erro e retorna para a propria view 
            return redirect()->back();  
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Não utilizamos o metodo show para exibir os detalhes do registro.
        //Para isso utilizo a view edit
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //recupera os dados 
        $cliente = Cliente::find($id);

        return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $tipoPessoa = $request->input('rdbpessoa');

        //limpa caracteres cpf
        $cpf = $request->input('cpf');
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        
        //limpa caracteres cnpj
        $cnpj = $request->input('cnpj');
        $cnpj = str_replace('.','',$cnpj);
        $cnpj = str_replace('-','',$cnpj);
        $cnpj = str_replace('/','',$cnpj);
        
        //limpa caracteres cep
        $cep = $request->input('cep');
        $cep = str_replace('.','',$cep);
        $cep = str_replace('-','',$cep);

        //verifica quantos anos a pessoa tem
        if($tipoPessoa == 1) //se tipo for pessoa fisica
        {
            list($ano, $mes, $dia) = explode('-', $request->input('dtnascimento'));

            // data atual
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            if($idade < 19)
            {
                Session::flash('men_erro','Você deve possuir no minimo 19 anos para esse cadastro');
                return redirect()->back();  
            }
        }



        $cliente->tipocliente = $request->input('rdbpessoa');
        $cliente->cpf = $cpf;
        $cliente->nome = $request->input('nome');
        $cliente->dtnascimento = $request->input('dtnascimento');
        $cliente->sobrenome = $request->input('sobrenome');
        $cliente->cnpj = $cnpj;
        $cliente->razaosocial = $request->input('razaosocial');
        $cliente->nomefantasia = $request->input('nomefantasia');
        $cliente->cep = $cep;
        $cliente->logradouro = $request->input('logradouro');
        $cliente->numero = $request->input('numero');
        $cliente->complemento = $request->input('complemento');
        $cliente->bairro = $request->input('bairro');
        $cliente->cidade = $request->input('cidade');
        $cliente->uf =  $request->input('uf');
               

        //se salvou com sucesso
        if($cliente->save())
        {
            Session::flash('men_sucesso','Registro atualizado com sucesso!');  //gera mensagem de sucesso e redireciona para a view de listagem
            return redirect('cadastro');  
        }
        else
        {
            Session::flash('men_erro','Não foi possível atualizar esse registro'); // senao gera a mensagem de erro e retorna para a propria view 
            return redirect()->back();  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back();
    }
}
