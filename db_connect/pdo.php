<?php

$base_dados = 'u927522891_cwash';
$usuario_bd = 'u927522891_root';
$senha_bd   = 'carwash';
$host_db    = 'localhost';
$charset_db = 'utf8';
$conexao_pdo = null;
 
$detalhes_pdo  = 'mysql:host=' . $host_db;
$detalhes_pdo .= ';dbname='. $base_dados;
$detalhes_pdo .= ';charset='. $charset_db;
 
try {
    $conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage() . "<br/>";
    die();
}
?>