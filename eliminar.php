<?php

	if(!isset($_GET['codigo'])){
		header('Location: principal-registro.php?mensaje=error');
		exit();
	}

	include 'model/conexion.php';
	$codigo = $_GET['codigo'];

	$sentencia = $bd->prepare("DELETE FROM alumno where idalumno = ?;
	SET  @num := 0;
	UPDATE alumno SET idalumno = @num := (@num+1);
	ALTER TABLE alumno AUTO_INCREMENT =1;");
	$resultado = $sentencia->execute([$codigo]);

	if($resultado === TRUE){
		header('Location: principal-registro.php?mensaje=eliminado');
	}else{
		header('Location: principal-registro.php?mensaje=error');
	}

?>