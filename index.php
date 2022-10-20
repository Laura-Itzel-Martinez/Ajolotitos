<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>

<head>
	<title>Login de usuario</title>
	<?php require_once "dependencias_registro.php"?>
</head>

<body style="background-color: gray">
	<div class="container text-center justify-content-center">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Los Ajolotitos Tecnológicos S.A de C.V</div>
					<div class="panel panel-body">
						<p>
							<img src="img/Ajolotitos .png" height="190" width="100%">
						</p>
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function () {
		$('#entrarSistema').click(function () {

			vacios = validarFormVacio('frmLogin');

			if (vacios > 0) {
				alertify.warning("Debes llenar todos los campos!!");
				return false;
			}

			datos = $('#frmLogin').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/regLogin/login.php",
				success: function (r) {

					if (r == 1) {
						alertify.alert()
							.setting({
								'label': 'Entrar',
								'message': 'Bienvenido ',
								'onok': function () {
									window.location = "vistas/ventas.php";
								}
							}).show();

					} else {
						alertify.alert("No se pudo acceder :(");
					}
				}
			});
		});
	});
</script>