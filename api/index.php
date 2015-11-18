<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
 
    echo "teste ok";
    
});

$app->delete('/delete/:id', function($id) use ( $app ) {
 
    include('../db_connect/pdo.php');
    
    $excluirOrcamentos = $conexao_pdo->prepare("DELETE FROM `carwashdb`.`orcamento` WHERE `orcamento`.`cliente` = ".$id);
    $excluirOrcamentos->execute();

    $excluirCliente = $conexao_pdo->prepare("DELETE FROM `carwashdb`.`cliente` WHERE `cliente`.`id` = ".$id);
    
    $verifica = $excluirCliente->execute();
    
    if ($verifica) {
        echo 'Cliente excluído.';
        exit;
    } else {
        echo 'Erro ao enviar dados.';
        exit;
    } 
    
});

$app->run();
?>
