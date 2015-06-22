<?php
include('../../db_connect/pdo.php');

$data=date("Y-m-d");
$consulta = $conexao_pdo->prepare("SELECT O.numero AS num, O.placa AS placa, C.nome AS cliente, V.nome AS veiculo, O.servico AS servico, O.valor AS                 valor
            FROM orcamento O INNER JOIN veiculo V
            ON O.veiculo = V.id INNER JOIN cliente C
            ON C.id = O.cliente WHERE O.estado = 1 ORDER BY num");
$consulta->execute();
$result = $consulta;

sleep(1);

$tabela = "<table>
            <thead>
                <tr>
                    <th>NUM</th>
                    <th>PLACA</th>
                    <th>CLIENTE</th>
                    <th>VEÍCULO</th>
                    <th>SERVIÇO</th>
                    <th>VALOR</th>
                </tr>
            </thead>
            <tbody>
            <tr>";
$return = "$tabela";

while ($linha = $result->fetch(PDO::FETCH_ASSOC)) {
    $return.= "<td>" . ($linha["num"]) . "</td>";
    $return.= "<td>" . ($linha["placa"]) . "</td>";
    $return.= "<td>" . ($linha["cliente"]) . "</td>";
    $return.= "<td>" . ($linha["veiculo"]) . "</td>";
    $return.= "<td>" . ($linha["servico"]) . "</td>";
    $return.= "<td>" . ($linha["valor"]) . "</td>";
    $return.= "</tr>";
}
echo $return.="</tbody></table>";
?>
