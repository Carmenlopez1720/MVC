<?php

require_once "conexion.php";

class ModeloFormularios{

	/*=============================================
	Registro recibir los datos del controlador atravez de parametros

	tabla y datos
	=============================================*/

	static public function mdlRegistro($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		#creo un objeto que me traiga la conexion de la base de datos

		#stmt voy hacer una declaracion sql, primero nececito instanciar la conexion Conexion::conectar()-> luego ->prepare la sentencia sql

		#los parametros se los paso de manera oculta con : = :nombre

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		#bindParam tiene 3 parametros el nombre del parametro oculto
		#segundo parametro valor que le voy a enlazar el parametro oculto
		#tipo de dat

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);


       #si la stmt se ejecuta respuesta boleana
		if($stmt->execute()){

			return "ok";#retorno un ok respueata que le voy a devolver al controlador.

		}else{

			#print_r donde aparezca el error si no se ejecuta

			print_r(Conexion::conectar()->errorInfo());

		}

     # si me devuelve el error la conexion queda abierrta la cierro y luego la pongo en nul
		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Actualizar Registro
	=============================================*/

	static public function mdlActualizarRegistro($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro($tabla, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}



}
