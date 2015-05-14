<?php

// Verifica se existe a variável txtnome
if (isset($_GET["txtnome"])) {
    $nome = $_GET["txtnome"];

    // Conexao com o banco de dados
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "carwashdb";

    $conexao = mysql_connect($server, $user, $senha) or die("Erro na conexão!");
    mysql_select_db($base);

    $data=date("Ymd");
    //$sql = "SELECT numero, servico, data, valor FROM orcamento WHERE estado = 1 AND data = ".$data;
    $sql = "SELECT O.NUMERO AS num, O.PLACA AS placa, C.NOME AS cliente, V.NOME AS veiculo, O.SERVICO AS servico, O.VALOR AS valor
	FROM ORCAMENTO O INNER JOIN VEICULO V ON O.VEICULO = V.ID INNER JOIN CLIENTE C ON C.ID = O.CLIENTE";
    
    
    sleep(1);

    $result = mysql_query($sql);
    $cont = mysql_affected_rows($conexao);

    // Verifica se a consulta retornou linhas 
    if ($cont > 0) {

        // Atribui o código HTML para montar uma tabela
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

        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysql_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["num"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["placa"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["cliente"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["veiculo"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["servico"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["valor"]) . "</td>";
            $return.= "</tr>";
        }

        echo $return.="</tbody></table>";
    } else {

        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>
