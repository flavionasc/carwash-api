<?php
session_start();

if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
    $retorno = array(
        "validado"=> false,
        "urlRetorno"=>"index.html"
    );
}else{
     $retorno = array(
         "validado"=> TRUE
     );
}
echo json_encode($retorno);
?>