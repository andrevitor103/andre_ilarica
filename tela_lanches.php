<?php require 'pages/header.php'; ?>

<?php
	
	include 'Config.php';

	include 'lanches.class.php';
	
	$lanches = new Lanche($pdo);

?>
<div class="row" style="margin-top: 4px">
<?php 

	$lista = $lanches->getAll();
	foreach( $lista as $item ):
		
 ?>

<div class="card" style="max-width: 16%; max-height: 100%; padding: 0px; margin-left: 10px; position: relative; left: 148px;">
	<div >
		<div class="imagem_auto">
  <img class="card-img-top" src="imagens/<?php echo $item['id'] ?>/<?php echo $item['imagem']; ?>" alt="Imagem de capa do card">
</div>
</div>
  <div class="card-body">
    <h5 class="card-title" style="position: relative; bottom: 10px;" ><?php echo $item['nome']; ?></h5>
    <p class="card-text" style="position: relative; bottom: 5px;"><?php echo $item['descricao']; ?>  </p>
    <a href="#" class="btn btn-primary" style="position: relative;bottom: 10px;"; >Visitar</a>
	</div>
	</div>
<?php endforeach; ?>
</div>