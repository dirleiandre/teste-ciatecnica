@extends('layouts.template')
@section('title','Minha Frase')

@section('content')
<script>
  function validar()
  {
      if(confirm("Tem certeza que deseja excluir esse registro?"))
        return true;
      else
         return false;  
  }
</script>

<div class="panel panel-default">
  <div class="panel-heading">Listagem de Cliente</div>
  <div class="panel-body">

            <p align="right">
                <a href="/cadastro/create" class="btn btn-success">Novo Cliente</a>
            </p>

            <!-- grid para exibição do ciente -->
            <table class="table table-striped">
                <tr>
                    <td>Nome</td>
                    <td>TIPO</td>
                    <td>UF</td>
                    <td>Cidade</td>
                     <td width="200">Ações</td>
                </tr>

            @forelse($clientes as $cli)
                @php
                    if($cli->nome != "")
                      $nome = $cli->nome;
                    else
                      $nome = $cli->razaosocial; 

                    if($cli->tipocliente == 1)
                      $tipo = "Pessoal Fisica";
                    else
                      $tipo = "Pessoal Juridica";                         
                @endphp
                <tr>
                    <td>{{$nome}}</td>
                    <td>{{$tipo}}</td>
                    <td>{{$cli->uf}}</td>
                    <td>{{$cli->cidade}}</td>
                    <td>
                        {{Form::open(['route'=>['cadastro.destroy',$cli->id],'method'=>'DELETE', 'onsubmit'=>'return validar(this)'])}}
                            <a href="/cadastro/{{$cli->id}}/edit" class="btn btn-info btn-xs">Editar</a>
                            {{Form::submit('Excluir',['class'=>'btn-danger btn-xs'])}}
                        {{Form::close()}}

                    </td>
                </tr>
            @empty
                <tr>    
                    <td colspan="4" style="color:#ff0000">Nenhum Cliente</td>
                </tr>    
            @endforelse
            </table>
            <!-- fim do grid -->
  
  </div>
</div> 
<p align="right">
   <a href="/" class="btn btn-warning">Voltar para a Home</a>
</p>


@endsection