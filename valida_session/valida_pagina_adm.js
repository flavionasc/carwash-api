$( document ).ready(function() { 
     $.ajax({
        type: 'POST',
        url: 'valida_session/valida_pagina_adm.php',
        dataType:"Json",
        success: function(msg) {
            if(msg.validado==false)
                window.location=msg.urlRetorno;
        }
    });
});