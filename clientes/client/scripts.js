$(function(){

	var enviando_formulario = false;
	$('.form_clientes').submit(function(){
		
		var obj = this;
		var form = $(obj);
		var submit_btn = $('.form_clientes :submit');
		var submit_btn_text = submit_btn.val();
		var dados = new FormData(obj);
		
		function volta_submit() {
			submit_btn.removeAttr('disabled');
			submit_btn.val(submit_btn_text);
			enviando_formulario = false;
		}
		
		if ( ! enviando_formulario  ) {		
			$.ajax({
				beforeSend: function() {
					enviando_formulario = true;
					submit_btn.attr('disabled', true);
					submit_btn.val('Enviando...');
					$('.error').remove();
				}, 
				
				url: form.attr('action'),
				type: form.attr('method'),
				data: dados,
				processData: false,
				cache: false,
				contentType: false,
				
				success: function( data ) {	
					volta_submit();
					
					if ( data == 'OK' ) {
						alert('Dados enviados com sucesso');
					} else {
						submit_btn.before('<p class="error">' + data + '</p>');
					}
				},
				error: function (request, status, error) {
					volta_submit();
					
					alert(request.responseText);
				}
			});
		}
		return false;
	});
});