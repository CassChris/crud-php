<?php
//print_r($_POST);
	if(!isset($_POST['codigo'])){
		header('Location: principal-registro.php?mensaje=error');
	}

include 'model/conexion.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$edad = $_POST['edad'];
$ciclo = $_POST['ciclo'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$promedio = ceil(($nota1+$nota2+$nota3)/3);


$sentencia = $bd->prepare("UPDATE alumno SET nombre = ?, apellido = ?, edad = ?, ciclo = ?, nota1 = ?, nota2 = ?, nota3 = ?, promedio = ?  where idalumno = ?;
SET  @num := 0;
UPDATE alumno SET idalumno = @num := (@num+1);
ALTER TABLE alumno AUTO_INCREMENT =1;");

$resultado = $sentencia->execute([$nombre,$apellido,$edad,$ciclo,$nota1,$nota2,$nota3,$promedio,$codigo]);

if($resultado === TRUE){
	header('Location: principal-registro.php?mensaje=editado');
}else{
	header('Location: principal-registro.php?mensaje=error');
	exit();
}
?>