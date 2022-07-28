	<?php include "template/header.php" ?>
	<div class="container">

	
	
	<div class="text-center mt-1">
		<h1 class="h1 text-dark font-weight-bold">
			INICIAR SESIÓN
		</h1>
	</div>
		<form action="verificar-usuario.php" class="container col-md-5 shadow p-3 mb-5 bg-white rounded  border border-secondary border-1  h6" method="post">
	
	<div class="row">
		<div class="col text-center">
			<img src="assets/talent-requirements.svg" class="img-fluid  w-75" alt="">
			
			<input type="text" name="txtusuario" placeholder="Usuario: superadmin" class="form-control mb-3" required>
			
			<input type="password" name="txtclave" placeholder="Clave: 123" class="form-control mb-3" required>
			
			<hr>
			
			<input type="submit" class="form-control btn btn-primary" name="btnenviar" value="Ingresar">
		</div>
		</div>
	
	
	</form>
			</div>

<?php include "template/footer.php"?>

	