<?php

if ( ! isset( $_POST ) || empty( $_POST ) ) {
	exit;
}

foreach ( $_POST as $chave => $valor ) {
	$$chave = $valor;
}

include('../../db_connect/pdo.php');

$prepara = $conexao_pdo->prepare("
	INSERT INTO `u927522891_cwash`.`orcamento` (
		`cliente`,
		`veiculo`,
		`servico`,
		`placa`,
		`data`,
		`estado`,
        `valor`
	) 
	VALUES
	( ?, ?, ?, ?, ?, ?, ?)
");

//REALIZA A CONSULTA DO PREÇO DO SERVIÇO NO BANCO
$consulta = $conexao_pdo->prepare("SELECT ".$txtServico." AS valor FROM
                                       preco JOIN veiculo on preco.id = veiculo.id
                                       where veiculo.id = ".$txtVeiculo);
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

$data=date("Y-m-d");

//FORMATA O CAMPO TEXTO PARA INSERIR NO BANCO
$servico = "servico";
switch($txtServico){
    case 'ducha':
        $servico = "Ducha";
        break;
    case 'simples':
        $servico = "Lavagem Simples";
        break;
    case 'completa':
        $servico = "Lavagem Completa";
        break;
    case 'higienizacao':
        $servico = "Higienização";
        break;
}

//FAZ O INSERT DOS VALORES NA TABELA
$verifica = $prepara->execute(
	array(
		$txtCliente,
		$txtVeiculo,
		$servico,
        $txtPlaca,
		$data,
        '1',
        $result['valor']
	)
);

if ( $verifica ) {
	
	exit;
} else {
	echo 'Erro ao enviar dados.';
	
	exit;
}
?>