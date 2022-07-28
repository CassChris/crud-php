
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

	
	<?php 
	
	
	$usuario = $_POST['txtusuario'];
	$clave = $_POST['txtclave'];
	
	
	if($usuario== "superadmin" && $clave== "123"){
		header('location: principal-registro.php');
	}else{
		header('location: acceso-denegado.php');
	}
	
	
	
	
	
	
	
	
	
	?>
	
		
	</body>
	</html>