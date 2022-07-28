<?php include "template/header.php" ?>


<?php 
	include_once "model/conexion.php";
	
	$sentencia = $bd ->query("select * from alumno");
	$alumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
	//print_r($alumno);
?>

<div class="container my-3">
	<div class="row justify-content-center">
		<!--inicio alerta FALTA-->
			<?php
				if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){	
				
			?>
			<!--inicio alerta -->
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<strong>Error! </strong>Rellena todos los campos.
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
				}
			?>
			<!--FIN ALERTA FALTA -->
		
			
			
			<!--inicio alerta EDITADO-->
		<?php
				if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){	
				
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>Editado!</strong> se realizo la actualización de datos.
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
				}
			?>
			
			
			<?php
				if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){	
				
			?>
			
			<!--FIN ALERTA EDITADO-->
			<!--inicio alerta  ERROR-->
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<strong>Error! </strong>Intentelo de nuevo.
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
				}
			?>
			
			<!--FIN ALERTA ERROR -->
		<!--inicio alerta ELIMINADO  -->
			<?php
				if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){	
				
			?>
			
			
			
			<div  class="alert alert-warning  alert-dismissible fade show" role="alert">
  				<strong>Eliminado! </strong> se elimino correctamente.
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
				}
			?>
			
			<!--fin alerta  ELIMINADO-->
			
	<!--inicio alerta REGISTRADO -->
			<?php
				if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){	
				
			?>
			
			
			<div class="alert alert-success alert-dismissible fade show"  role="alert">
  				<strong>Registrado ! </strong>Se agregaron los datos.
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
				}
			?>
			
			
			<!--FIN ALERTA REGISTRADO -->
		
		
		<!--FORMULARIO -->
		<div class="col-md-6 my-3 shadow p-3 mb-5 bg-body rounded border">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center fw-bold h5">
					Ingresar Datos:
				<div class="text-center">
					<a href="#lista" class="btn btn-success mb-1">Ver Registro de Alumnos</a>
			<a href="./index.php" class="btn btn-danger mb-1">Salir</a>
					</div>
			</div>
				</div>
				<form action="registrar.php" class="p-4" method="POST">
					<div class="mb-3">
						<label  class="form-label">
						Nombre: 
						</label>
						<input type="text" name="txtnombre" class="form-control" autofocus required>
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Apellido: 
						</label>
						<input type="text" name="txtapellido" class="form-control" autofocus required>
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Edad: 
						</label>
						<input type="text" name="edad" class="form-control" autofocus required>
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Ciclo: 
						</label>
						
						<select class="form-select" name="ciclo" aria-label="Default select example" required>
 				 			<option selected disabled>Seleccionar Ciclo</option>
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
						<input type="number" name="nota1" min="1" max="20" class="form-control" autofocus>
						
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Nota 2: 
						</label>
						<input type="number" name="nota2" min="1" max="20" class="form-control" autofocus required>
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Nota 3: 
						</label>
						<input type="number" name="nota3" min="1" max="20" class="form-control" autofocus required>
					</div>
					
					<div class="mb-3">
						<label  class="form-label">
						Promedio: 
						</label>
						<input type="text" name="promedio" class="form-control" autofocus placeholder="Promedio automatico" disabled>
					</div>
					
					<div class="d-grid">
						<input type="hidden" name="oculto" value="1">
						<input type="submit" class="btn btn-primary" value="Registrar">
					</div>
					
				</form>
			</div>
			
		</div>
		
	
	<!--TABLA -->
		<div class="col-md">
			
			<div class="card" id="lista">
				<div class="card-header h5 fw-bold bg-light">
					Registro de Notas - Computación e Informática
				</div>
				<div class="p-4">
					<div class="table-responsive-xxl">
					<table id="tabla" class="table align-middle table-hover border">
						<thead>
							<tr class="table-info align-middle">
								<th scope="col">#</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Edad</th>
								<th scope="col">Ciclo</th>
								<th scope="col">Nota 1</th>
								<th scope="col">Nota 2</th>
								<th scope="col">Nota 3</th>
								<th scope="col">Promedio</th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
							foreach($alumno as $dato){
								
							
							?>
							<tr class="">
								
								<td scope="row"><?php echo $dato->idalumno?></td>
								<td><?php echo $dato->nombre?></td>
								<td><?php echo $dato->apellido?></td>
								<td><?php echo $dato->edad?></td>
								<td><?php echo $dato->ciclo?></td>
								<td><?php echo $dato->nota1?></td>
								<td ><?php echo $dato->nota2?></td>
								<td><?php echo $dato->nota3?></td>
								<td class="bg-light fw-bold"><?php echo $dato->promedio?></td>
								<td><a  class="text-success" href="editar.php?codigo=<?php echo $dato->idalumno?>"><i class="bi bi-pencil-square"></i></a></td>
								<td><a onclick="return confirm('Estas seguro de deseas eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->idalumno?>"><i class="bi bi-trash3"></i></a></td>
							</tr>
							<?php
							}
							
							?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	
		
	</div>
</div>

<script>
	let tabla = document.querySelector('#tabla');
	
	let dataTable = new DataTable(tabla,{
		perPage:10,
		perPageSelect:[5,10,15,20],
		labels: {
    	placeholder: "Buscar:",
    	perPage: "{select} Registros por pagina",
    	noRows: "Registro no Encontrado",
    	info: "Mostrando registros del {start} al {end} de {rows} Registros"}
	});
</script>


<?php include "template/footer.php"?>;

	
	
	