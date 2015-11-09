<?php

      // Se não postar nada
      if ( ! isset( $_POST ) || empty( $_POST ) ) {
	
	  // Mensagem para o usuário
	  echo 'Digite e escolha usuario para Excluir!';
	
	  // Mata o script
	  exit;
      }
      include ('../../db_connect/pdo.php');
      session_start();            
      
      $id_cliente = $_POST['id_cliente'];
 
      $sql = $conexao_pdo->prepare("DELETE FROM bd_cliente WHERE ID='{$id_cliente}'");
      $verifica = $sql->execute();
      if($verifica){
            print 'true';
      }else{
            print 'false';
      }
      
?>