<?php 
	
	require 'clientes.class.php';
	require 'Config.php';


	$cliente = new Cliente($pdo);

	$dados = $cliente->getAll();

	$dados2 = (object)[
			'email',
			'nome'
		];	
	


	json_encode($dados);

	foreach ($dados as $item) {
		
		$dados2 = (object)[
			'email' => $item['email'],
			'nome' => $item['nome']
		];
	}

	//print_r($dados2);		
	header('Content-Type: application/json');
	
	$dados2 = json_encode($dados2);			
	

	echo $dados2;

?>