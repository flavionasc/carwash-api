//VERIFICA SE O USUÁRIO É ADMINISTRADOR TODA VEZ QUE ELE RETORNAR DE UMA SUB-PÁGINA
//E O ENVIA PARA O MENU PRINCIPAL DO ADM
$( document ).ready(function() { 
     $.ajax({
        type: 'POST',
        url: 'valida_session/redir_adm.php',
        dataType:"Json",
        success: function(msg) {
            if(msg.validado==true)
                window.location=msg.urlRetorno;
        }
    });
});