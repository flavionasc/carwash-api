<?php
session_start();

if(!isset($_SESSION['login']) and !isset($_SESSION['senha']) or $_SESSION['identificador'] != 9){
    $retorno = array(
        "validado"=> false,
        "urlRetorno"=>"user.html"
    );
}else{
     $retorno = array(
         "validado"=> TRUE
     );
}
echo json_encode($retorno);
?>