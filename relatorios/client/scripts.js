$(function(){
	$('.form_relatorio').submit(function(){
		var obj = this;
		var form = $(obj);
		var submit_btn = $('.form_relatorio :submit');
		var dados = new FormData(obj);
        $("#tabela").html('<img src="lavagem/client/progress.gif"/>');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: dados,
            processData: false,
            cache: false,
            contentType: false,
            success: function( data ) {	
                $("#tabela").html(data);
            },
        });
		return false;
	});
});