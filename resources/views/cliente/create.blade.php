@extends('layouts.template')
@section('title','Cadastro de Cliente')

@section('content')

{{Html::script('js/manipula_pessoa_fisica_juridica.js')}}
{{Html::script('js/carregar_endereco_ws.js')}}

<div class="panel panel-default">
  <div class="panel-heading">Novo de Cliente</div>
  <div class="panel-body">

  {{Form::open(['action'=>'Cliente\ClienteController@store'])}}

    <!-- seleciona o tipo de pessoa -->
    <div class="panel panel-default">
      <div class="panel-body">
          <h4>Escolha o tipo de Pessoa</h4>
          <div class="row">
              <div class="col-sm-2">
              {{Form::radio('rdbpessoa','1',true,['class'=>'setpessoa'])}}Fisica
              </div>
              <div class="col-sm-2">
              {{Form::radio('rdbpessoa','2',false,['class'=>'setpessoa'])}}Juridica
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
            {{Form::text('cpf','', ['class'=>'form-control','placeholder'=>'Informe o cpf', 'maxlength'=>'14'])}}              
          </div>
    </div>
    <div class="col-sm-9">
          <div class="form-group">
          {{Form::label('nome','NOME')}}
          {{Form::text('nome','', ['class'=>'form-control','placeholder'=>'Informe o Nome', 'maxlength'=>'50'])}}           
          </div>
    </div>
</div> 

<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('dtnascimento','DATA DE NASCIMENTO')}}
          {{Form::date('dtnascimento','', ['class'=>'form-control','placeholder'=>'Informe a data'])}}             
          </div>
    </div>
    <div class="col-sm-9">
          <div class="form-group">
          {{Form::label('sobrenome','SOBRENOME')}}
          {{Form::text('sobrenome','', ['class'=>'form-control','placeholder'=>'Informe o sobrenome', 'maxlength'=>'15'])}}           
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
          {{Form::text('cnpj','', ['class'=>'form-control','placeholder'=>'Informe o cnpj'])}}          
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('razaosocial','RAZÃO SOCIAL')}}
          {{Form::text('razaosocial','', ['class'=>'form-control','placeholder'=>'Informe a razão social', 'maxlength'=>'50'])}}           
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('nomefantasia','NOME FANTASIA')}}
          {{Form::text('nomefantasia','', ['class'=>'form-control','placeholder'=>'Informe o nome fantasia', 'maxlength'=>'50'])}}           
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
          {{Form::text('cep','', ['class'=>'form-control','placeholder'=>'Informe o cep', 'maxlength'=>'10','required'])}}            
          </div>
    </div>
    <div class="col-sm-6">
          <div class="form-group">
          {{Form::label('logradouro','LOGRADOURO')}}
          {{Form::text('logradouro','', ['class'=>'form-control','placeholder'=>'Informe o logradouro', 'maxlength'=>'50','required'])}}          
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('numero','NUMERO')}}
          {{Form::text('numero','', ['class'=>'form-control','placeholder'=>'Informe o numero','maxlength'=>'4','required'])}}         
          </div>
    </div>    
</div> 


<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('complemento','COMPLEMENTO')}}
          {{Form::text('complemento','', ['class'=>'form-control','placeholder'=>'Informe o complemento','maxlength'=>'50'])}}            
          </div>
    </div>
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('bairro','BAIRRO')}}
          {{Form::text('bairro','', ['class'=>'form-control','placeholder'=>'Informe o bairro', 'maxlength'=>'50','required'])}}          
          </div>
    </div>
</div> 


<div class="row">
    <div class="col-sm-3">
          <div class="form-group">
          {{Form::label('cidade','CIDADE')}}
          {{Form::text('cidade','', ['class'=>'form-control','placeholder'=>'Informe a cidade', 'maxlength'=>'50','required'])}}        
          </div>
    </div>  
    <div class="col-sm-3">
          <div class="form-group">
            {{Form::label('uf','UF')}}
            {{Form::text('uf','', ['class'=>'form-control','placeholder'=>'Informe o estado', 'maxlength'=>'8','required'])}}       
          </div>
    </div>      
</div> 


  <br>
  {{Form::submit('Salvar Registro',['class'=>'btn btn-success'])}}
  {{Form::close()}}
  
</div>
<!-- final do bloco de campos comum aos dois tipo -->

</div> 
<p align="right">
  <a href="/cadastro" class="btn btn-warning">Voltar ao Cadastro</a>
</p>


<script>
$(document).ready(function(){

  //define a mascara de entrada ao carregar
  $('#cpf').mask('999.999.999-99');

  //torna obrigatorio os campos da pessoa fisica após o carregamento
  $('#cpf').attr('required',true);
  $('#nome').attr('required',true);
  $('#dtnascimento').attr('required',true);
  $('#sobrenome').attr('required',true);

});

</script>

@endsection