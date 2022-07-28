<?php 
	//print_r($_POST);
	if(empty($_POST['oculto']) || empty($_POST['txtnombre']) || empty($_POST['txtapellido']) || empty($_POST['edad']) || empty($_POST['ciclo']) || empty($_POST['nota1']) || empty($_POST['nota2']) || empty($_POST['nota3'])){
		header('Location: principal-registro.php?mensaje=falta');
		exit();
	}

	include_once 'model/conexion.php';

	$nombre = $_POST['txtnombre'];
	$apellido = $_POST['txtapellido'];
	$edad = $_POST['edad'];
	$ciclo = $_POST['ciclo'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];
	$nota3 = $_POST['nota3'];
	$promedio = ceil(($nota1+$nota2+$nota3)/3);
	


	$sentencia = $bd->prepare("INSERT INTO alumno(nombre,apellido,edad,ciclo,nota1,nota2,nota3,promedio) VALUES (?,?,?,?,?,?,?,?);
	SET  @num := 0;
	UPDATE alumno SET idalumno = @num := (@num+1);
	ALTER TABLE alumno AUTO_INCREMENT =1;");
	$resultado = $sentencia->execute([$nombre,$apellido,$edad,$ciclo,$nota1,$nota2,$nota3,$promedio]);

	if($resultado === TRUE){
		header('Location: principal-registro.php?mensaje=registrado');
	}else{	
		header('Location: principal-registro.php?mensaje=error');
		exit();
	}
?>



