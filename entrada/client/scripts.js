function salvar(){  
    $('.form_entrada').submit(function() {
        $.ajax({
            url: 'entrada/server/envia_orcamento.php',
            type: 'POST',
            data: $('.form_entrada').serialize(),
            async: false,   //Esse parâmetro junto com o return true cancelam o loop dos alert's
            success: function(data) {
                alert ('Orçamento Cadastrado com Sucesso!');
            }
        });
        return true;
    }); 
}