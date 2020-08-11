<?php require 'pages/header.php' ?>

<?php
	
	include 'Config.php';

	include 'lanches.class.php';
	
	$lanches = new Lanche($pdo);
	$usuarios = new Usuarios($pdo);
	$usuarios->setUsuario($_SESSION['logado']);

	if(!isset($_SESSION['logado'])){
	header("Location: login.php");
	exit;
}


?>	
	<div style="background: transparent; width: 15%; position: relative; left: 400px; text-align: center; bottom: 160px;">
	<b> Email Logado: </b>
	<p> <?php echo $usuarios->emailLogado($_SESSION['logado'])['email'] ?> </p>

	<button class="btn btn-primary"><a href="logout.php" style="color: black;">LOGOUT</a></button>

	</div>

	<div style="background: transparent; width: 15%; position: relative; left: 600px; text-align: center; bottom: 200px;">

	<button class="btn btn-primary"><a href="analise_lanches.php" style="color: black;">Analise</a></button>

	</div>

	<div class="container destaque">
		<section class="busca">
			<h2>Buscar Pedido</h2>
			<form method="POST" action="Tela_lanches_id.php">
				<input type="search" name="valor">
				<a><button type="submit" name="botao">Buscar</button></a>
			</form>			
		</section>
		<!--Fim da busca-->
		<section class="menu_cardapio">
			<h2>Cardápio</h2>
			<nav>
				<ul>
					<li><a href="realizar_pedidos.php">Realizar pedido</a></li>
					<li><a href="#">X-ILarica</a></li>
					<li><a href="#">Hot Dog-ILarica</a></li>
					<li><a href="#">Pizza-ILarica</a></li>
					<li><a href="#">Porções-ILarica</a></li>
					<li><a href="#">Árabe-ILarica</a></li>
					<li><a href="#">Calzones-ILarica</a></li>
				</ul>
			</nav>
		</section>
		<!--Fim Cardápio-->
		<section class="destaque">
			<figure class="promo">
				<img src="img/38.png" alt="X-Larica Mais gostoso do momento">
			</figure>
		</section>
		<!--Fim destaque-->
	</div>
	<div class="container paineis">
		<!-- Inicio painel dos mais vendidos -->
		<section class="painel vendidos">
			<h2>Mais Vendidos</h2>
			<ol>



			<?php
				$msg = 0;				
			?>

			<script type="text/javascript">
	
			function FuncTeste(obj){

				alert("oii");
				var valores = ['Andre', 'Vitor'];
				
				var y = 0;

				while(y < valores.length){

				document.getElementById("txt").innerHTML += "<br>" + valores[y] + "<br>";
				document.getElementById("oi").innerHTML += valores[y] + "<br>";
				document.getElementById("txt").value += '<br>';

				y++;

				}

			}

				</script>
			 
				
			<div class="bot">

				<h2 id="oi"> Hi, my name is Bot ! </h2>	

				<input type="text" id="txt" name="txt" onblur="FuncTeste(this.value);">

			</div>
			

				<!-- lanches mais vendidos-->

				<li>
					<a href="1.php">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
				<li>
					<a href="1.php">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
				<li>
					<a href="1.php">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
				<li>
					<a href="1.php">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
				<li>
					<a href="#">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
				<li>
					<a href="#">
						<figure>
						<img src="img/duplo-quarterao-new.png">
						<figcaption>Duplo quarteirão à R$ 30,00</figcaption>
					</figure>
				</li>
			</ol>
		</section>
		<section class="painel combo">
			<h2>Combos</h2>
			<ol>
				<li>
					<a href="pages/informaçoes_Adicionais_X-salada.php">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
				<li>
					<a href="#">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
				<li>
					<a href="#">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
				<li>
					<a href="#">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
				<li>
					<a href="#">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
				<li>
					<a href="#">
						<figure>
							<img src="img/35.png" alt="Combo x y z">
							<figcaption>Combo de R$ 50,00</figcaption>
						</figure>
				</li>
			</ol>
			
		</section>
	</div>
<?php require 'pages/footer.php'?>