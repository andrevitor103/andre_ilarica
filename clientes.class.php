<?php

	class Cliente {

	private $pdo;

	public function __construct($pdo){
				$this->pdo = $pdo;
		}	

	
	public function adicionarCliente($email, $nome, $sobrenome, $endereco){
		$emailexistente = $this->existeEmail($email);

		if(count($emailexistente) == 0){
			$sql = "INSERT INTO clientes VALUES(DEFAULT,:sobrenome, :nome, :email, :endereco)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':sobrenome', $sobrenome);
			$sql->bindValue(':endereco', $endereco);
			$sql->execute();

			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function existeEmail($email){
		$sql = "SELECT id FROM clientes WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email',$email);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}

		return $array;

	}


	public function getAll(){
		$sql = "SELECT * FROM CLIENTES";
		$sql = $this->pdo->query($sql);
		
		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		}else{

			return array();
		}

	}

	public function deletarCliente($id){
		$sql = 'DELETE FROM clientes WHERE id = :id';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		if($sql->execute()){
			return 'ok';
		}else{
			return 'erro';
		}
	}

	public function getInfo($id){
			$sql = "SELECT * FROM clientes WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){

				return $sql->fetch();

			}else{

				return array();

			}
		}

	public function editar($nome, $email, $sobrenome, $endereco, $id){
				$sql = "UPDATE clientes SET nome = :nome, email = :email, sobrenome = :sobrenome, endereco = :endereco WHERE id = :id";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':nome', $nome);
				$sql->bindValue(':email', $email);
				$sql->bindValue(':sobrenome', $sobrenome);
				$sql->bindValue(':endereco', $endereco);
				$sql->bindValue(':id', $id);
				$sql->execute();
		}



		public function buscarEmail($nome){
		$sql = "SELECT id, email FROM clientes WHERE nome = :nome";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome',$nome);
		$sql->execute();

		if($sql->rowCount() > 0){

			$array = $sql->fetch();

		}else{

			$array = array();

		}

		return $array;

	}

	public function buscarCadastro($id){
		$sql = "SELECT id, email FROM clientes WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0){

			$array = $sql->fetch();

		}else{

			$array = array();

		}

		return $array;

	}

}