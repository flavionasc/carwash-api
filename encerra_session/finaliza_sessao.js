$('#logout').click(function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'encerra_session/finaliza_sessao.php',
        dataType:"Json",
        success: function(msg) {
             window.location=msg.urlRetorno;
        }
    });
});