$(document).ready(function(){

    $('.setpessoa').click(function() {
            var valor = $('input[name=rdbpessoa]:checked').val(); 
            if(valor == 1) //exibe pessoa fisica
            {
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
    
                //limpa
                $('#cnpj').val("");
                $('#razaosocial').val("");
                $('#nomefantasia').val("");
    
    
            }
            else //pessoa juridica
            {
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
    
                //limpa
                $('#cpf').val("");
                $('#nome').val("");
                $('#dtnascimento').val("");
                $('#sobrenome').val("");
    
    
            }
        
        });
    
        
        //define a mascara de cep
        $('#cep').mask('99.999-999');
    
    
     });