<?php

class ControladorFormularios{

	/*=============================================
	Registro, creamos el metodo registro
	=============================================*/

	static public function ctrRegistro(){

#pregunto si vienen variables post, con una se si estoy enviando informacion a ese formulario.
#a travez del formulario agrego el atributo name="" nombre de la variables post y el contenido sera lo que coloque en el formulrio
#defino el formulario con el metodo post para enviarlas


		if(isset($_POST["registroNombre"])){

			# genero variable tabla con el nombre de la tabla
			#a travez de un array enviare los datos

			$tabla = "registro";

			$datos = array("nombre" => $_POST["registroNombre"],
				           "email" => $_POST["registroEmail"],
				           "password" => $_POST["registroPassword"]);

            #los voy a pasar instanciando el metodo estatico del modelo
            #esta esperando dos parametros y se los paso
			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);



			return $respuesta;

		}

	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor){
#necesito enviar al modelo el parametro de la tabla

		$tabla = "registro";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,$item, $valor);

		#lo que me traiga el modelo se lo voy a devolver a la vista.

		return $respuesta;

	}


	/*=============================================
	Actualizar Registro
	=============================================*/
	static public function ctrActualizarRegistro(){

		if(isset($_POST["actualizarNombre"])){

			if($_POST["actualizarPassword"] != ""){			

				$password = $_POST["actualizarPassword"];

			}else{

				$password = $_POST["passwordActual"];
			}

			$tabla = "registro";

			$datos = array("id" => $_POST["idUsuario"],
							"nombre" => $_POST["actualizarNombre"],
				           "email" => $_POST["actualizarEmail"],
				           "password" => $password);

			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			return $respuesta;

		}


	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	public function ctrEliminarRegistro(){

		#si viene una variable post eliminarRegistro le voy a pedir una respuesta al modelo

		if(isset($_POST["eliminarRegistro"])){

			$tabla = "registro";
			$valor = $_POST["eliminarRegistro"];#valor del id

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicio";

				</script>';

			}

		}

	}


}