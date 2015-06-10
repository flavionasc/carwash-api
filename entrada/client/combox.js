$(document).ready(function(){
  $.ajax({
     type: "POST",
     url: "entrada/server/combox.php",
     data: {txtCliente: $("#txtCliente").val()},
     dataType: "json",
     success: function(json){
        var options = "";
        $.each(json, function(key, value){
           options += '<option value="' + key + '">' + value + '</option>';
        });
        $("#txtCliente").html(options);
     }
  });
});