<?php

if ( ! isset( $_POST ) || empty( $_POST ) ) {
    exit;
}

foreach ( $_POST as $chave => $valor ) {
    $$chave = $valor;
}

include('../../db_connect/pdo.php');

//CONSULTA O ESTADO DO ORÇAMENTO
$consulta = $conexao_pdo->prepare("SELECT estado FROM orcamento WHERE numero = ".$txtNum);
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

if ($result['estado'] == 1){
    $atualiza = $conexao_pdo->prepare("UPDATE orcamento SET estado = '.$txtOpc.' WHERE numero = ".$txtNum);
    $atualiza->execute();   
}

echo $result['estado'];
exit;

?>
