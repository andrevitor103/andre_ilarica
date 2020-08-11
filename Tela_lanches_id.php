<?php require 'pages/header.php'; ?>

<?php
	
	include 'Config.php';

	include 'lanches.class.php';
	
	$lanches = new Lanche($pdo);

?>

<?php 
	
	if(!empty($_POST['valor'])){

	$lista = $lanches->buscarLanche($_POST['valor']);

	}

 ?>
	
 <div class="row">	
 <div class="col">	
 <?php foreach( $lista as $item ): ?>
 </div>
 <div class="col-2">
<div class="card" style="width: 16rem; padding: 10px; margin-left: 60px;">
  <img class="card-img-top" style="width: 200px; margin: 0px;" src="img/X-Salada/<?php echo $item['id'] ?>.jpg" alt="Imagem de capa do card">
  	<div class="card-body">
    <h5 class="card-title"><?php echo $item['nome']; ?></h5>
    <p class="card-text" style="position: relative;"><?php echo $item['descricao']; ?>  </p>
    <a href="#" class="btn btn-primary">Visitar</a>
	</div>
	</div>
	<?php endforeach; ?>
  </div>
</div>
</div>