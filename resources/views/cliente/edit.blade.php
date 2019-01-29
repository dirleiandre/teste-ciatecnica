@extends('layouts.template')
@section('title','Editar Cliente')

@section('content')

{{Html::script('js/manipula_pessoa_fisica_juridica.js')}}
{{Html::script('js/carregar_endereco_ws.js')}}

<div class="panel panel-default">
  <div class="panel-heading">Editar de Cliente</div>
  <div class="panel-body">

  {{Form::open(['route'=>['cadastro.update',$cliente->id],'method'=>'PUT'])}}

    <!-- seleciona o tipo de pessoa -->
    <div class="panel panel-default">
      <div class="panel-body">
          <h4>Escolha o tipo de Pessoa</h4>
          <div class="row">
              <div class="col-sm-2">

                @php
                  if($cliente->tipocliente == 1)
                  {
                     $fisica = true;
                     $juridica = false; 
                  }
                  else
                  {
                    $fisica = false;
                    $juridica = true; 
                  }
                @endphp
              {{Form::radio('rdbpessoa','1',$fisica,['class'=>'setpessoa'])}}Fisica
              </div>
              <div class="col-sm-2">
              {{Form::radio('rdbpessoa','2',$juridica,['class'=>'setpessoa'])}}Juridica
              </div>
          </div> 
      </div>
    </div>
    <!-- final tipo de pessoa -->




<!-- escreve o tipo de pessoa -->
<h3 id="identificapessoa">Pessoa Fisica</h3>
<br>
<!-- final escreve tipo pessoa -->





@if(Session::has('men_sucesso'))
<div class="alert alert-success">
  {{Session::get('men_sucesso')}}
</div>
@endif

@if(Session::has('men_erro'))
<div class="alert alert-danger">
  {{Session::get('men_erro')}}
</div>
@endif




<!-- bloco de campos para pessoa fisica -->
<div id="pessoafisica" style="display:block">
<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
            {{Form::label('cpf','CPF')}}
            {{Form::text('cpf',$cliente->cpf, ['class'=>'form-control','placeholder'=>'Informe o cpf', 'maxlength'=>'14'])}}              
          </div>
    </div>
    <div class="col-sm-9">
          <div class="form-group">
          {{Form::label('nome','NOME')}}
          {{Form::text('nome',$cliente->nome, ['class'=>'form-control','placeholder'=>'Informe o Nome', 'maxlength'=>'50'])}}           
          </div>
    </div>
</div> 

<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('dtnascimento','DATA DE NASCIMENTO')}}
          {{Form::date('dtnascimento',$cliente->dtnascimento, ['class'=>'form-control','placeholder'=>'Informe a data'])}}             
          </div>
    </div>
    <div class="col-sm-9">
          <div class="form-group">
          {{Form::label('sobrenome','SOBRENOME')}}
          {{Form::text('sobrenome',$cliente->sobrenome, ['class'=>'form-control','placeholder'=>'Informe o sobrenome', 'maxlength'=>'15'])}}           
          </div>
    </div>
</div> 
</div>
<!-- final bloco pessoa fisica-->






<!-- bloco de campos para pessoa juridica -->
<div id="pessoajuridica" style="display:none">
<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('cnpj','CNPJ')}}
          {{Form::text('cnpj',$cliente->cnpj, ['class'=>'form-control','placeholder'=>'Informe o cnpj'])}}          
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('razaosocial','RAZÃO SOCIAL')}}
          {{Form::text('razaosocial',$cliente->razaosocial, ['class'=>'form-control','placeholder'=>'Informe a razão social', 'maxlength'=>'50'])}}           
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('nomefantasia','NOME FANTASIA')}}
          {{Form::text('nomefantasia',$cliente->nomefantasia, ['class'=>'form-control','placeholder'=>'Informe o nome fantasia', 'maxlength'=>'50'])}}           
          </div>
    </div>

</div> 
</div>
<!-- final bloco pessoa juridica-->





<!-- bloco de campos comum aos dois tipo -->
<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('cep','CEP')}}
          {{Form::text('cep',$cliente->cep, ['class'=>'form-control','placeholder'=>'Informe o cep', 'maxlength'=>'10','required'])}}            
          </div>
    </div>
    <div class="col-sm-6">
          <div class="form-group">
          {{Form::label('logradouro','LOGRADOURO')}}
          {{Form::text('logradouro',$cliente->logradouro, ['class'=>'form-control','placeholder'=>'Informe o logradouro', 'maxlength'=>'50','required'])}}          
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('numero','NUMERO')}}
          {{Form::text('numero',$cliente->numero, ['class'=>'form-control','placeholder'=>'Informe o numero','maxlength'=>'4','required'])}}         
          </div>
    </div>    
</div> 


<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('complemento','COMPLEMENTO')}}
          {{Form::text('complemento',$cliente->complemento, ['class'=>'form-control','placeholder'=>'Informe o complemento','maxlength'=>'50'])}}            
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('bairro','BAIRRO')}}
          {{Form::text('bairro',$cliente->bairro, ['class'=>'form-control','placeholder'=>'Informe o bairro', 'maxlength'=>'50','required'])}}          
          </div>
    </div>
</div> 


<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('cidade','CIDADE')}}
          {{Form::text('cidade',$cliente->cidade, ['class'=>'form-control','placeholder'=>'Informe a cidade', 'maxlength'=>'50','required'])}}        
          </div>
    </div>  
    <div class="col-sm-3">
          <div class="form-group">
            {{Form::label('uf','UF')}}
            {{Form::text('uf',$cliente->uf, ['class'=>'form-control','placeholder'=>'Informe o estado', 'maxlength'=>'8','required'])}}       
          </div>
    </div>      
</div> 


  <br>
  {{Form::submit('Salvar Registro',['class'=>'btn btn-success'])}}
  <a href="/cadastro" class="btn btn-warning">Cancelar</a>
  {{Form::close()}}
  
</div>
<!-- final do bloco de campos comum aos dois tipo -->

</div> 
<p align="right">
  <a href="/cadastro" class="btn btn-warning">Voltar ao Cadastro</a>
</p>


<script>
$(document).ready(function(){

  @if($cliente->tipocliente == 1)

  $('#pessoafisica').css('display','block');
  $('#pessoajuridica').css('display','none');
  $('#identificapessoa').html('Pessoa Fisica');

  $('#cpf').mask('999.999.999-99');

    //torna obrigatorio os campos da pessoa fisica
    $('#cpf').attr('required',true);
    $('#nome').attr('required',true);
    $('#dtnascimento').attr('required',true);
    $('#sobrenome').attr('required',true);

    //não é mais obrigatorio
    $('#cnpj').attr('required',false);
    $('#razaosocial').attr('required',false);
    $('#nomefantasia').attr('required',false);

    

    @else
  $('#pessoafisica').css('display','none');
  $('#pessoajuridica').css('display','block');
  $('#identificapessoa').html('Pessoa Juridica');

  $('#cnpj').mask('99.999.999/9999-99');

  //torna obrigatorio  
  $('#cnpj').attr('required',true);
  $('#razaosocial').attr('required',true);
  $('#nomefantasia').attr('required',true);

    //nao é mais obrigatorio
    $('#cpf').attr('required',false);
    $('#nome').attr('required',false);
    $('#dtnascimento').attr('required',false);
    $('#sobrenome').attr('required',false);


  @endif

});

</script>

@endsection