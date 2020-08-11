<?php

	class Lanche{

	private $pdo;

	public function __construct($pdo){
				$this->pdo = $pdo;
		}	



	public function cadastrarLanche($nome, $imagem, $descricao, $valor){
		$existeCadastro = $this->vereficarLanche($nome);
		if(count($existeCadastro) == 0){
		$sql = 'INSERT INTO lanches VALUES(DEFAULT, :nome, :imagem, :descricao, :valor)';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':imagem', $imagem);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':valor', $valor);

		if ($sql->execute()) {

        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $this->pdo->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'c:/xampp/htdocs/dashboard/Ilarica_andre/imagens/' . $ultimo_id.'/';

        //Criar a pasta de foto 
        mkdir($diretorio, 0755);
       
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
            header("Location: index.php");
        }        
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index.php");
}
	

}


	public function deletarLanche($id){
		$sql = 'DELETE FROM lanches WHERE id = :id';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		if($sql->execute()){

			return 'ok';

		}else{

			return 'erro';
		}

	}


	public function vereficarLanche($nome){
		$sql = 'SELECT nome FROM lanches WHERE nome = :nome';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->execute();

		if($sql->rowCount() > 0 ){
		
			$array = $sql->fetch();

		}else{
		
			$array = array();
		
		}

		return $array;
	}


	public function getAll(){
		$sql = 'SELECT * FROM lanches';
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();

		}
	}



	public function cadastrarPedido($email, $nome, $opcao){

		$sql = 'INSERT INTO pedidos VALUES(DEFAULT, :nome, :email, :opcao, "aberto")';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':opcao', $opcao);
		$sql->execute();
	}

	public function selecionarPedidos(){
		$sql = 'SELECT id_pedido as "id", nome, email, lanche  FROM pedidos WHERE situacao = "aberto" ';
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();

		}
	}


	public function finalizarPedido($id){
		
		$sql = 'UPDATE pedidos set situacao = "fechado" WHERE id_pedido = :id';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		if($sql->execute()){

			return TRUE;

		}else{

			return FALSE;

		}

	}	

	public function getInfo($id){
			$sql = "SELECT * FROM lanches WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){

				return $sql->fetch();

			}else{

				return array();

			}
		}

	public function editar($nome, $valor, $id){
				$sql = "UPDATE lanches SET nome = :nome, valor = :valor WHERE id = :id";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':nome', $nome);
				$sql->bindValue(':valor', $valor);
				$sql->bindValue(':id', $id);
				$sql->execute();
		}	


	public function buscarLanche($valor){
		$sql = "SELECT * FROM lanches WHERE (nome LIKE :valor)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':valor', "%".$valor."%", PDO::PARAM_STR);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		}else{
			return array();

		}
	}


	public function analisarLanches(){
		$sql = "SELECT lanche, COUNT(id_pedido) AS `TOTAL` FROM PEDIDOS 
		GROUP BY LANCHE ORDER BY `TOTAL` DESC";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();
			
		}

	}


	public function totalizarPedido(){
		$sql = "SELECT b.id AS `cliente`, a.*, COUNT(a.lanche) AS `total` FROM pedidos a INNER JOIN clientes b ON a.email = b.email GROUP BY nome ORDER BY `total`";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();

		}
	}

	public function resumirPedido(){
		$sql = "SELECT b.id AS `cliente`, a.*, COUNT(a.lanche) AS `total` FROM pedidos a INNER JOIN clientes b ON a.email = b.email GROUP BY cliente, lanche ORDER BY `total`";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0){

			return $sql->fetchAll();

		}else{

			return array();

		}
	}

	

}
