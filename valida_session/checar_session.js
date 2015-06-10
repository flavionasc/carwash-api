$( document ).ready(function() { 
     $.ajax({
        type: 'POST',
        url: 'valida_session/checar_session.php',
        dataType:"Json",
        success: function(msg) {
            if(msg.validado==false)
                window.location=msg.urlRetorno;
        }
    });
});