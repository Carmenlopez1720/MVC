<?php

#para treaerme la informacion en ek formulario
#pregunto si viene una variable get id

#me voy a traer el usuario a traves de la variable usuario e instanciandolo
#nececito dos parametros item y valor, esos valores debo agregarlos en 

if(isset($_GET["id"])){

	$item = "id";#que me busque coincidencia en la columna id
	$valor = $_GET["id"];#que ese valor sea igual en lo que venga la variable get

	$usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
	

}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Escriba su nombre" id="nombre" name="actualizarNombre">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Escriba su email" id="email" name="actualizarEmail">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>

				<input type="password" class="form-control" placeholder="Escriba su contraseña" id="pwd" name="actualizarPassword">

				<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
				<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

			</div>

		</div>

		<?php
		#lo que yo modifique quiero que me lo reciba el controador en el siguiente metodo

		$actualizar = ControladorFormularios::ctrActualizarRegistro();

		if($actualizar == "ok"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=inicio";

				},3000);

			</script>

			';

		}

		?>
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>