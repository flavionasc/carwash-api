<?php
header('Content-type: text/json');

include('../../db_connect/pdo.php');

$consulta = $conexao_pdo->prepare("SELECT id, nome FROM cliente ORDER BY nome");
$consulta->execute();
$result = $consulta->fetchAll(PDO::FETCH_ASSOC);

function pdo2array($result){
	$new=array();
	foreach ( $result as $val )
	{
		$keys = array_keys($val);
		$new[$val[$keys[0]]] = $val[$keys[1]];
	}
	return $new;
}

$var = array();
$var = pdo2array($result);

echo json_encode($var);
?>