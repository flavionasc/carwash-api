function excluir(){  
    var form = document.querySelector('form');
    decisao = confirm("Deseja Continuar?");
    if (decisao){
        $('.form_clientes').submit(function() {
            $.ajax({
                type: 'DELETE',
                url: 'api/index.php/delete/' + form.txtCliente.value,
                success: function(response) {
                }
            });
            alert ("Cliente Excluído!");
        }); 
    }   
}

