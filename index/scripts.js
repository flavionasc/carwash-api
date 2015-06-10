function fazer_login(){  
    $('.form-log').submit(function() {
        $.ajax({
            url: 'index/login.php',
            type: 'POST',
            data: $('.form-log').serialize(),
            success: function(data) {  
                alert (data);
            }
        });
        return false;
    }); 
}

//Inicio
//document.login_form.entrar.onclick = scripts.fazer_login;