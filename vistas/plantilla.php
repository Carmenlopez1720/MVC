<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo MVC</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>
<body>
	<!--=====================================
	LOGOTIPO
	======================================-->
	<div  class="container-fluid">
		<h3 class="text-center py-3">LOGO</h3>
	</div>




	<!--=====================================
	BARRA DE BOTONES para navegar
	======================================-->


	 	<!--=====================================
	CONTENEDOR
	======================================-->
	<div class="container-fluid  bg-light">
		
		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">

				<?php if (isset($_GET["pagina"])): ?>

					<!--=====================================
	si viene la variable GET 
	======================================-->

					
     <!--=====================================
   si esa variable get es igual a Registro
=====================================-->
					<?php if($_GET['pagina'] == "registro"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=registro">Registro</a>
						</li>
					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=registro">Registro</a>
						</li>
				    <?php endif ?>

				     <?php if($_GET['pagina'] == "inicio"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
						</li>
					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
						</li>
				    <?php endif ?>


				    <?php else: ?>
  
					<!-- GET: $_GET["variable"] Variables que se pasan como parámetros Vía URL ( También conocido como cadena de consulta a través de la URL) 
				Cuando es la primera variable se separa con ?
				las que siguen a continuación se separan con &
				-->

					<!--=====================================
si no vienen variables get es por que estanos en inicio
	======================================-->

					


				<li class="nav-item">
					<a class="nav-link active" href="index.php?pagina=registro">Registro</a>
				</li>

				<li class="nav-item">
					<a class="nav-link " href="index.php?pagina=inicio">Inicio</a>
				</li>




				<?php endif ?>




				

			</ul>

		</div>

	</div>

<!--=====================================
	CONTENIDO
	======================================-->

	<div class="container-fluid">

		<div class="container p-4" >


				<!--=====================================
	#ISSET: isset() determina si una variable Get esta definida y no es NULl
	======================================-->

					
     <!--=====================================
   si la variable get pagina es = regitro  || es = o
=====================================-->
			<?php

			if(isset($_GET['pagina'])){



				if($_GET['pagina'] == "registro"||
					$_GET['pagina'] == "editar"||
					$_GET['pagina'] == "inicio"){

					#nececito que me incluya la pagina de acuerdo a la variable GET

					include"paginas/".$_GET['pagina'].".php"; #con . concatenamos la variable





				}else{
					#si la variable no se encuentra en las defininas mandamos un error 404
					include"paginas/error404.php";

				}


			}else{
				include"paginas/registro.php";

			}

			

			?>
		</div>
	</div>


	





	
</body>
</html>