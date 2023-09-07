<?php

class Conexion{

	#pdo encamsula la conexion y poder estanciar la clase y usarla en otro archivo

	#que me lo ejecute con la sintaxis utf8. ejecutamos los cracteres latinos con exec
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=curso_e",
		                "root",
		                 "");
		$link->exec("set names utf8");
		return $link;
	}
}