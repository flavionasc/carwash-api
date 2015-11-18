<?php

if ( ! isset( $_POST ) || empty( $_POST ) ) {
    exit;
}

foreach ( $_POST as $chave => $valor ) {
    $$chave = $valor;
}
//excluir todos os dados do cliente.
include('../../db_connect/pdo.php');
    
$excluirOrcamentos = $conexao_pdo->prepare("DELETE FROM `carwashdb`.`orcamento` WHERE `orcamento`.`cliente` = ".$txtCliente);
$excluirOrcamentos->execute();

$excluirCliente = $conexao_pdo->prepare("DELETE FROM `carwashdb`.`cliente` WHERE `cliente`.`id` = ".$txtCliente);

$verifica = $excluirCliente->execute();

if ($verifica) {
	exit;
} else {
	echo 'Erro ao enviar dados.';
	exit;
}

?>