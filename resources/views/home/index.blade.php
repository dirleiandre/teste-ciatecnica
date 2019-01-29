<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela de Cadastro</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>

<style>
.resposta{
    font-size:12px;
    color:#0000ff;
}
</style>
</head>
<body>
<br>
<div class="container">

    <div style="text-align:center">
        <img src='img/logo.png' width='200'>
        <h3>Teste para Desenvolvedores - Linguagem PHP OO (Laravel)</h3>
    </div>

    <div>
    <ul>
        <li>Todos os campos devem ser de preenchimento obrigatório, exceto o campo
        complemento.
        <br><span class="resposta"><b>Resposta:</b>OK, a validação foi realizada utilizando o atributo required do HTML5</span>
        </li>

        <li>Colocar a máscara de formatação nos campos CPF e CNPJ.
        <br><span class="resposta"><b>Resposta:</b> OK, Foi utilizado a lib MASKEDINPUT para essa função.</span>
        </li>

        <li>A idade permitida para cadastro de uma pessoa física deverá ser no mínimo de 19
        anos.
        <br><span class="resposta"><b>Resposta:</b> OK, Poderia ter criado uma função para isso, mas, nesse código a validação esta direto no método do controller. </span>
        </li>

        <li>Ao preencher o CEP implementar a busca com alguma API (de utilização gratuita e
        livre) para preencher os demais dados relacionados ao endereço.
        <br><span class="resposta"><b>Resposta:</b> OK, O evento esta no ONBLUR do CEP, aguarde o carregamento dos campos dependendo da velocidade da internet. Foi utilizada a API da viacep.com.br para essa finalidade!</span>
        </li>

        <li>A tela para o cadastro deverá ser única.
        <br><span class="resposta"><b>Resposta:</b> OK</span>
        </li>

        <li>Porém, quando selecionado pessoa física deverão ser exibidos somente os campos
        relacionados à pessoa física, e quando selecionado pessoa jurídica deverão ser
        exibidos somente os campos de pessoa jurídica.
        <br><span class="resposta"><b>Resposta:</b> OK, basta escolher o tipo de pessoa no botão de radio.</span>
        </li>

        <li>Disponibilizar uma API de consulta com todos os clientes cadastrados com saída JSON,
        via GET.
        <br><span class="resposta"><b>Resposta:</b> OK, o acesso a API esta publico ou seja, não há necessidade de autenticação.</span>
        </li>
    </ul>

    <h3>Outras Informações Importantes</h3>
  Para esse cadastro existem diversas formas de realiza o mesmo. Poderiamos usar mais recursos de JQUERY e AJAX para uma melhor experiencia do usuário.
  <br><br>
  Poderiamos também usar alguns recursos visuais nos inputs como por exemplo no <b>input type="date"</b> foi utilizado o nativo do HTML5. Para essa finalidade existem diversos <b>Calendários</b> par IU.
  <br><br>
   <span style="color:#ff0000">Executar as migrations para criação das tabelas</span>
  <br><br>
  <h3>Ferramentas Utilizadas</h3>
  <ul>
    <li>Laravel 5.7</li>
    <li>MySQL 8</li>
    <li>Editor VSCode</li>
    <li><b>BootStrap para interface gráfica(CDN)</b></li>
    <li><b>JQUERY(CDN)</b></li>
  </ul>
    </div>


    <div style="margin:0px auto; max-width:300px; text-align:center">
        <a href="/cadastro" class="btn btn-success">Acesso ao Cadastro</a>
        <a href="/api/listaclientes" class="btn btn-success">Acesso a API</a>
    </div>



</div> 

</body>
</html>
