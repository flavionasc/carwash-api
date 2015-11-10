function excluir(){  
    $('.form_clientes').submit(function() {
        $.ajax({
            url: 'clientes/server/excluir_clientes.php',
            type: 'POST',
            data: $('.form_clientes').serialize(),
            async: false,
            success: function(data) {
                alert ('Cliente excluído com sucesso!');
            }
        });
        return true;
    }); 
}