<?php 

$contrasena = "";
$usuario = "root";
$nombre_bd = "registro-alumnos";

try{
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exeption $e){
	echo "Problema con la conexion: ".$e->getMessage();
}














?>