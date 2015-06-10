<?php
session_start();

if($_SESSION['identificador'] == 9){
    $retorno = array(
        "validado"=> true,
        "urlRetorno"=>"adm.html"
    );
}else{
     $retorno = array(
         "validado"=> false
     );
}
echo json_encode($retorno);
?>