<?php
require 'vendor/autoload.php';
require 'database/ConnectionFactory.php';
require 'clientes/ClienteService.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
 
    echo "teste ok";
    
});
//adcionar cliente.
$app->post('/adcionaCliente/', function() use ( $app ) {
    
    $clienteJson = $app->request()->getBody();
    $newcliente = json_decode($clienteJson, true);
    if($newCliente) {
        $cliente = ClienteService::add($newCliente);
        $app->response()->header('Content-Type', 'application/json');
        $app->response()->setStatus(200);
        echo json_encode($cliente);
    }
    else {
        $app->response->setStatus(400);
        echo "Malformat JSON";
    }
});

$app->delete('/delete/:id', function($id) use ( $app ) {
 
    include('../db_connect/pdo.php');
    
    $excluirOrcamentos = $conexao_pdo->prepare("DELETE FROM `u927522891_cwash`.`orcamento` WHERE `orcamento`.`cliente` = ".$id);
    $excluirOrcamentos->execute();

    $excluirCliente = $conexao_pdo->prepare("DELETE FROM `u927522891_cwash`.`cliente` WHERE `cliente`.`id` = ".$id);
    
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
