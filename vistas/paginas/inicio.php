
<?php
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
# crear un objeto que le haga una peticion al controlador.formularios
#ejecutamos ctrSelecccionarRegistro
?>





<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

	
#hacemos un recorrido por usuarios 
	

	<?php foreach ($usuarios as $key => $value): ?>

		<tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo $value["nombre"]; ?></td>
			<td><?php echo $value["email"]; ?></td>
			<td><?php echo $value["fecha"]; ?></td>
			<td>

			<div class="btn-group">

				<div class="px-1">
				
				<a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

				</div>

				<form method="post">

					<input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
					
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

					<?php

					#formulario le hara una peticion al controlador a travez de un metodo no estatico

						$eliminar = new ControladorFormularios();
						$eliminar -> ctrEliminarRegistro();

					?>

				</form>			

			</div>
				

			</td>
		</tr>
		
	<?php endforeach ?>	
	
	</tbody>
</table>