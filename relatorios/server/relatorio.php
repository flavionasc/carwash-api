<?php

switch ($_POST['opcRelatorio']){
    case 1:
        relatorioClientesCadastrados();
        die();
    case 2:
        relatorioVendasPorData();   
        die();
    case 3:
        relatorioServicosCancelados();   
        die();
    case 4:
        relatorioServicosFinalizados();   
        die();
    default:
        die();
    
}

function relatorioServicosFinalizados(){
    include('../../db_connect/pdo.php');
    $consulta = $conexao_pdo->prepare("SELECT O.NUMERO AS num, O.DATA AS data, C.NOME AS cliente, 
                                      V.NOME AS veiculo, O.SERVICO AS servico, O.VALOR AS valor
                                            FROM ORCAMENTO O INNER JOIN VEICULO V
                                            ON O.VEICULO = V.ID INNER JOIN CLIENTE C
                                            ON C.ID = O.CLIENTE WHERE O.estado = 3 ORDER BY data");
    $consulta->execute();
    $result = $consulta;
    sleep(1);
    
    $tabela = "<table>
            <thead>
                <tr>
                    <th>NUM</th>
                    <th>DATA</th>
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
        $return.= "<td>" . ($linha["data"]) . "</td>";
        $return.= "<td>" . ($linha["cliente"]) . "</td>";
        $return.= "<td>" . ($linha["veiculo"]) . "</td>";
        $return.= "<td>" . ($linha["servico"]) . "</td>";
        $return.= "<td>" . ($linha["valor"]) . "</td>";
        $return.= "</tr>";
    }

    echo $return.="</tbody></table>";
}

function relatorioServicosCancelados(){
    include('../../db_connect/pdo.php');
    $consulta = $conexao_pdo->prepare("SELECT O.NUMERO AS num, O.DATA AS data, C.NOME AS cliente, 
                                      V.NOME AS veiculo, O.SERVICO AS servico, O.VALOR AS valor
                                            FROM ORCAMENTO O INNER JOIN VEICULO V
                                            ON O.VEICULO = V.ID INNER JOIN CLIENTE C
                                            ON C.ID = O.CLIENTE WHERE O.estado = 2 ORDER BY data");
    $consulta->execute();
    $result = $consulta;
    sleep(1);
    
    $tabela = "<table>
                <thead>
                    <tr>
                        <th>NUM</th>
                        <th>DATA</th>
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
        $return.= "<td>" . ($linha["data"]) . "</td>";
        $return.= "<td>" . ($linha["cliente"]) . "</td>";
        $return.= "<td>" . ($linha["veiculo"]) . "</td>";
        $return.= "<td>" . ($linha["servico"]) . "</td>";
        $return.= "<td>" . ($linha["valor"]) . "</td>";
        $return.= "</tr>";
    }

    echo $return.="</tbody></table>";
}

function relatorioVendasPorData(){
    include('../../db_connect/pdo.php');
    $consulta = $conexao_pdo->prepare("SELECT SUM(valor) as total, data FROM orcamento GROUP BY data");
    $consulta->execute();
    $result = $consulta;
    sleep(1);
    
    $tabela = "<table>
                <thead>
                    <tr>
                        <th>TOTAL</th>
                        <th>DATA</th>
                    </tr>
                </thead>
                <tbody>
                <tr>";
    $return = "$tabela";
    while ($linha = $result->fetch(PDO::FETCH_ASSOC)) {
        $return.= "<td>" . ($linha["total"]) . "</td>";
        $return.= "<td>" . ($linha["data"]) . "</td>";
        $return.= "</tr>";
    }

    echo $return.="</tbody></table>";
}


function relatorioClientesCadastrados(){
    include('../../db_connect/pdo.php');
    $consulta = $conexao_pdo->prepare("SELECT C.nome, C.endereco, C.email, C.telefone, C.cpf, C.cidade FROM cliente C ORDER BY nome");
    $consulta->execute();
    $result = $consulta;
    sleep(1);
    
    $tabela = "<table>
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>ENDEREÇO</th>
                        <th>E-MAIL</th>
                        <th>TELEFONE</th>
                        <th>CPF</th>
                        <th>CIDADE</th>
                    </tr>
                </thead>
                <tbody>
                <tr>";
    $return = "$tabela";
    while ($linha = $result->fetch(PDO::FETCH_ASSOC)) {
        $return.= "<td>" . utf8_encode($linha["nome"]) . "</td>";
        $return.= "<td>" . utf8_encode($linha["endereco"]) . "</td>";
        $return.= "<td>" . utf8_encode($linha["email"]) . "</td>";
        $return.= "<td>" . utf8_encode($linha["telefone"]) . "</td>";
        $return.= "<td>" . utf8_encode($linha["cpf"]) . "</td>";
        $return.= "<td>" . utf8_encode($linha["cidade"]) . "</td>";
        $return.= "</tr>";
    }
    echo $return.="</tbody></table>";
}
?>
