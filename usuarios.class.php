<?php 

	class Usuarios {

		private $pdo;
		private $id;
		private $permissoes; //será um array

		public function __construct($pdo){

			$this->pdo = $pdo;

		}

	public function fazerLogin($email, $senha){

		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			$_SESSION['logado'] = $sql['id'];
			return true;
		}else{
			return false;
		}
	}		

	public function setUsuario($id){
		$this->id = $id;

		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

		$this->permissoes = explode(',', $sql['permissoes']);

		}

	}

	public function getPermissoes(){
		return $this->permissoes;
	}

	public function temPermissao($p){

		$this->setUsuario($this->id);

		if(in_array($p, $this->getPermissoes())){

			return true;

		}else{

			return false;
				
		}

	}


	public function cadastrarUsuario($email, $senha, $permissoes){

		$consulta = "SELECT * FROM usuarios WHERE email = :email";
		$consulta = $this->pdo->prepare($consulta);
		$consulta->bindValue(':email', $email);
		$consulta->execute();

		if($consulta->rowCount() > 0){
			return false;
		}else{

		$sql = "INSERT INTO usuarios(email, senha, permissoes) VALUES(:email, :senha, :permissoes);";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':permissoes', $permissoes);
		if($sql->execute()){
			return true;
		}else{
			return false;
		}


	}

}

	public function getAll(){

		$sql = "SELECT * FROM usuarios";

		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();

		}




	}

	public function getInfo($id){
			$sql = "SELECT * FROM usuarios WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){

				return $sql->fetch();

			}else{

				return array();

			}
		}

		public function editar($id, $email, $senha, $permissoes){
				$sql = "UPDATE usuarios SET email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':email', $email);
				$sql->bindValue(':senha', $senha);
				$sql->bindValue(':permissoes', $permissoes);
				$sql->bindValue(':id', $id);
				$sql->execute();
		}


	public function excluir($id){
		$sql = 'DELETE FROM usuarios WHERE id = :id';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		if($sql->execute()){

			return 'ok';

		}else{

			return 'erro';
		}

	}	


	public function emailLogado($id){

		$sql = "SELECT email FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}else
		return false;

	}






}