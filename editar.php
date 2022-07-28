<?php include "template/header.php" ?>

<?php
	if(!isset($_GET['codigo'])){
		header('Location: principal-registro.php?mensaje=error');
		exit();
	}

	include_once 'model/conexion.php';
	$codigo = $_GET['codigo'];
	
	$sentencia = $bd->prepare("select * from alumno where idalumno = ?;");
	$sentencia->execute([$codigo]);
	$alumno = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($alumno)

	

?>

<!--FORMULARIO -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Ingresar Datos: 
				</div>
				<form action="editar-proceso.php" class="p-4" method="POST">
					<div class="mb-3">
						<label  class="form-label">
						Nombre: 
						</label>
						<input type="text" name="txtnombre" class="form-control" autofocus required value="<?php echo $alumno->nombre;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Apellido: 
						</label>
						<input type="text" name="txtapellido" class="form-control" autofocus required value="<?php echo $alumno->apellido;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Edad: 
						</label>
						<input type="text" name="edad" class="form-control" autofocus required value="<?php echo $alumno->edad;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Ciclo: 
						</label>
						<select class="form-select" name="ciclo" aria-label="Default select example" value="<?php echo $alumno->ciclo;?>" required>
							<option value="<?php echo $alumno->ciclo;?>"><?php echo $alumno->ciclo;?></option>
  							<option value="I">I</option>
  							<option value="II">II</option>
  							<option value="III">III</option>
  							<option value="IV">IV</option>
  							<option value="V">V</option>
  							<option value="VI">VI</option>
						</select>
						
						
	
					</div>
					
					
					<div class="mb-3">
						<label  class="form-label">
						Nota 1: 
						</label>
						<input type="text" name="nota1" class="form-control" autofocus value="<?php echo $alumno->nota1;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Nota 2: 
						</label>
						<input type="text" name="nota2" class="form-control" autofocus required value="<?php echo $alumno->nota2;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Nota 3: 
						</label>
						<input type="text" name="nota3" class="form-control" autofocus required value="<?php echo $alumno->nota3;?>">
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Promedio: 
						</label>
						<input type="text" name="promedio" class="form-control" autofocus value="<?php echo $alumno->promedio;?>">
					</div>
					
					<div class="d-grid">
						<input type="hidden" name="codigo" value="<?php echo $alumno->idalumno;?>">
						<input type="submit" class="btn btn-primary" value="Editar">
						<a href="principal-registro.php" class="btn btn-danger mt-2">Descartar</a>
					</div>
					
				</form>
			</div>
			
		</div>
	</div>
</div>




<?php include "template/footer.php"?>

	