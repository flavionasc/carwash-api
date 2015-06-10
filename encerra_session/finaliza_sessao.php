<?php

session_start();
session_destroy();

$retorno = array(
    "urlRetorno"=>"index.html",
);
echo json_encode($retorno);

?>