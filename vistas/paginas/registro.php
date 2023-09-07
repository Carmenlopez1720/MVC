<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<label for="nombre">Nombre:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" id="nombre" name="registroNombre">

			</div>
			
		</div>

		<div class="form-group">

			<label for="email">Correo electrónico:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="email" class="form-control" id="email" name="registroEmail">
			
			</div>
			
		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>

				<input type="password" class="form-control" id="pwd" name="registroPassword">

			</div>

		</div>

		<?php 

	
	
		
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO

		#para conectar la vista con el controlador necesito ejecutar el metodo que se encuentra en el controlador 
		#instanciamos la clase y ejecutamos el metodo ctrRegistro
		=============================================*/

		$registro = ControladorFormularios::ctrRegistro();

		if($registro == "ok"){

			/*=============================================
		Si el navegador tiene informacion en su historico
		con los dos parametros nulos y el tercero que me devuelva donde estoy en ese momento

		scrip java, si yo no lo tengo almacena cuantas veces recargue, como si las tuviera en cuenta, por eso limpio el storash
		=============================================*/

			echo '<script>



				if ( window.history.replaceState ) { 

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		
		}

		?>
		
		<button type="submit" class="btn btn-primary">Enviar</button>

	</form>

</div>