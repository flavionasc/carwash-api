<?php

include('../db_connect/pdo.php');

//Comando SQL de verificação de autenticação 
$consulta = $conexao_pdo->prepare("SELECT identificador FROM `usuario` WHERE `usuario` LIKE ? AND `senha` LIKE ?");
$consulta->bindParam(1, $_POST['login'], PDO::PARAM_STR, 12);
$consulta->bindParam(2, $_POST['senha'], PDO::PARAM_STR, 12);

$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

//Caso consiga logar cria a sessão
if ($result['identificador'] == 1) {
    session_start();
     
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['identificador'] = 1;
    
    header('location:../user.html');
} 
else if ($result['identificador'] == 9) {
    session_start();
     
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['identificador'] = 9;
    
    header('location:../adm.html');
}
else {
    header('location:../index.html');
}

?>