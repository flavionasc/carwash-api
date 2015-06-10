function salvar(){  
    if(document.getElementById("txtNum").value == ""){
        alert ("Existem Campos em Branco!"); 
    }
    else {
        decisao = confirm("Deseja Continuar?");
        if (decisao){
            $('.form_finaliza').submit(function() {
                $.ajax({
                    url: 'saida/server/finaliza.php',
                    type: 'POST',
                    data: $('.form_finaliza').serialize(),
                    async: false,   //Esse parâmetro junto com o return true cancelam o loop dos alert's
                    success: function(data) {
                        switch (data) {
                            case '1':
                                alert ("Atualizado com Sucesso!"); 
                                break;
                            case '2':
                                alert ("O orçamento está Cancelado!"); 
                                break;
                            case '3':
                                alert ("O orçamento está Fechado!"); 
                                break;
                            default:
                                alert ("Orçamento não Encontrado!"); 
                        }
                    }
                });
                return true;
            }); 
        }
    }    
}