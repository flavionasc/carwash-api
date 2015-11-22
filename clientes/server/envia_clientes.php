<?php
/* Se não postar nada
if ( ! isset( $_POST ) || empty( $_POST ) ) {
	
	// Mensagem para o usuário
	echo 'Nada a publicar!';
	
	// Mata o script
	exit;
}

// Verifica campos em branco
foreach ( $_POST as $chave => $valor ) {
	// Cria as variáveis dinamicamente
	$$chave = $valor;
	
	// Verifica campos em branco
	if ( empty( $valor ) ) {
		// Mensagem para o usuário
		echo 'Existem campos em branco.';
		
		// Mata o script
		exit;
	}
}

// Verifica se todas as variáveis estão definidas
if (  
	   ! isset( $txtNome      )  
	|| ! isset( $txtEndereco  ) 
	|| ! isset( $txtEmail     )
	|| ! isset( $txtTelefone  )
	|| ! isset( $txtCpf       ) 
	|| ! isset( $txtBairro    )
	|| ! isset( $txtCidade    )
	|| ! isset( $txtEstado    )
) {
	echo 'Existem variáveis não definidas.';

	exit;
}

include('../../db_connect/pdo.php');

$prepara = $conexao_pdo->prepare("
	INSERT INTO `u927522891_cwash`.`cliente` (
		`nome`,
		`endereco`,
		`email`,
		`telefone`,
		`cpf`,
		`bairro`,
		`cidade`,
		`estado`
	) 
	VALUES
	( ?, ?, ?, ?, ?, ?, ?, ? )
");

$verifica = $prepara->execute(
	array(
		$txtNome,
		$txtEndereco,
		$txtEmail,
		$txtTelefone,
		$txtCpf,
		$txtBairro,
		$txtCidade,
		$txtEstado
	)
);

if ( $verifica ) {
	
	exit;
} else {
	echo 'Erro ao enviar dados.';
	
	exit;*/
}