function salvar(){  
    $('.form_entrada').submit(function() {
        $.ajax({
            url: 'entrada/server/envia_orcamento.php',
            type: 'POST',
            data: $('.form_entrada').serialize(),
            async: false,
            success: function(data) {
                alert ('Orçamento Cadastrado com Sucesso!');
            }
        });
        return true;
    }); 
}