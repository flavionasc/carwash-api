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
      
      
      
?>