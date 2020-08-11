<?php require "pages/header.php" ?>
	<h1>Você escolheu o X-Salada, aonde ele está recheado com os seguintes igredientes:</h1>
	<ul>
	<img class = "carrossel" src = "img\X-Salada\1.jpg">
	<img class = "carrossel" src = "img\X-Salada\2.jpg">
	<img class = "carrossel" src = "img\X-Salada\3.jpg">
	<img class = "carrossel" src = "img\X-Salada\4.jpg">
	<script>
		var myIndex = 0;
		carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("carrossel");
					for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
													}
					myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
					x[myIndex-1].style.display = "block";  
					setTimeout(carousel, 1000); // Change image every 2 seconds
}

</script>
		<li>Pão Caseiro</li>
		<li>Hamburguer Artesanal</li>
		<li>Salada livre de agrotóxicos</li>
		<li>Queijo</li>
		<li>Presunto</li>
	</ul>
<?php require "pages/footer.php"?>