<?php
include ("conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');
$idu = base64_decode($_GET['data']);
$sql = "SELECT id_usu,token,usuario,password FROM accesos WHERE id_usu=$idu";
$usu = mysqli_query($conexion,$sql);
$idusu = mysqli_fetch_row($usu);

$id = base64_encode($idusu[0]);
$token = base64_encode($idusu[1]);

$descid = base64_decode($id);
$desctoken = base64_decode($token);
// $desctoken = '2022-09-12 13:10:00';
$mifecha= date($desctoken); 
$NuevaFecha = strtotime ( '+10 minute' , strtotime ($mifecha) ) ; 
$NuevaFecha = date ( 'Y-m-d H:i' , $NuevaFecha); 

// echo '1--->'.$fcdb = strtotime($desctoken) * 1000;
$fcend = strtotime($NuevaFecha) * 1000;
$FehaActual = date('Y-m-d H:i');
$fcact = strtotime($FehaActual) * 1000;
?>
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="bower_components/morris.js/morris.css">
<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
	.swal-wide {
		width: 500px !important;
		font-size: 16px !important;
	}
	#nmrcrctr{
		padding: 0.5em;
		margin: 0;
		width: 480px;
		float: right;
		display: none;
	}
</style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<div class="wrapper">
		<?php //include('header.php'); ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<!--                     Dashboard -->
					<small> <?php //echo $_SESSION['usuario']['privilegios'] ?></small>
				</h1>
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Small boxes (Stat box) -->
				<?php if($fcend<$fcact){ ?>

					<p style="text-align: center; font-size: 18px;"><b>EL TIEMPO PARA ESTABLECER LA CONTRASEÑA HA EXPIRADO. LE SOLICITAMOS VOLVER A INICIAR EL PROCESO.</b></p>

				<?php }else{ 


					if($id==$_GET['data'] AND $token==$_GET['token']){

						?> 

						<div class="modal-dialog" id="show1">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"></span></button>
										<h4 class="modal-title">RESTABLEZCA SU CONTRASEÑA</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<input type="hidden" name="idact" id="idact" value="<?php echo $descid?>">
											<label>Usuario</label>
											<div class="input-group col-md-12">
												<input type="email" name="usuarioobl" id="usuarioobl" class="form-control" pattern="[0-9]{1,7}" value="<?php echo $idusu[2]?>" disabled/>
												<div class="input-group-addon">
													<span class="glyphicon glyphicon-user"></span>
												</div>
											</div>
										</div>
										<div style="display: none;" class="form-group">
											<label>Contraseña</label>
											<div class="input-group col-md-12">
												<div class="input-group">
													<input type="hidden" class="form-control" name="usuarcontraseio" id="usuarcontraseio" autocomplete="new-password" value="<?php echo $idusu[3];?>">
													<div class="input-group-addon input-group-append toggle-password">
														<i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Nueva contraseña</label>
											<div class="input-group col-md-12">
												<div class="input-group">
													<input type="password" class="form-control" name="password1" id="password1" autocomplete="new-password" >
													<div class="input-group-addon input-group-append toggle-password" onchange="contraseña()">
														<i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
													</div>
												</div>
											</div>
											<!-- <label for="" style="color:#ff0000; font-size: 14px;">*Debe aceptar el Aviso de Privacidad</label> -->
											<label for="" style="color:#165da0; font-size: 14px;">*Su contraseña, debe tener almenos 8 letras conformadas por una mayuscula y un numero</label>
										</div>

										<div class="form-group">
											<label>Confirmar contraseña</label>
											<div class="input-group col-md-12">
												<div class="input-group">
													<input type="password" class="form-control" name="password2" id="password2" autocomplete="new-password" >
													<div class="input-group-addon input-group-append toggle-password" >
														<i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary pull-left"  onclick="actContr();">Aceptar</button>


										<div class="alert alert-warning text-center" style="color: #FFF; display:none" id="validcarac">
											<p style="color: #FEFEFE; font-size: 16px;">Su contraseña, debe tener almenos 8 letras conformadas por una mayuscula y un numero</p>
										</div>


										<div class="alert alert-info text-center" style="color: #FFF;" id="invalida">
											<p>Las contraseñas no coinciden</p>
										</div>
										<div class="alert alert-danger text-center" style="color: #FFF;" id="falso">
											<p>Contraseña ya fue restablecida</p>
										</div>
										<div class="alert alert-warning text-center" style="color: #FFF;" id="vacios">
											<p>Llene campos vacíos</p>
										</div>
										<div class="alert alert-danger text-center" style="color: #FFF;" id="error">
											<p>Datos no actualizados</p>
										</div>

										<div class="alert alert-info text-center" style="color: #FFF;" id="nmrcrctr">
											<p>Su contraseña, debe tener almenos 8 letras conformadas por una mayuscula y un numero</p>
										</div>

									</div>
								</div>
							</div>
							<!----------CONTENEDOR REDIRECCIONAR ---------->
							<div class="modal-dialog" id="show2" style="display: none;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true"></span></button>
											<h4 class="modal-title">SU CONTRASEÑA FUE RESTABLECIDA CON ÉXITO.</h4>
										</div>
										<div class="modal-body">
											<div class="modal-footer">
												<a href="#" onclick="redireccion();">Capacitación AFAC</a>
											</div>
										</div>
									</div>
								</div>
								<!-------------------->
							<?php }else{ ?>
								<p style="text-align: center; font-size: 18px;"><b>LA PÁGINA PARA RESTABLECER SU CONTRASEÑA A VENCIDO</b></p>
							<?php }	}?>

						</section>
					</div>
					<footer class="main-footer">
						<strong>AFAC &copy; 2021 <a style="color:#3c8dbc"  href="https://www.gob.mx/afac">Agencia Federal de Aviación Civil</a>.</strong> Todos los derechos Reservados DDE.
					</footer>
				</div>

				<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

			</body>

			</html>
			<script type="text/javascript">
				$('.toggle-password').click(function() {
					$(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
					let input = $(this).prev();
					input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
				});	


				function contraseña() {
					var nMay = 0,
					nMin = 0,
					nNum = 0
					var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
					var t2 = "abcdefghijklmnopqrstuvwxyz"
					var t3 = "0123456789"
					var password1 = document.getElementById('password1').value;
					if (password1.length < 8) {

						return 1;
					} else {
						for (i = 0; i < password1.length; i++) {
							if (t1.indexOf(password1.charAt(i)) != -1) { nMay++ }
								if (t2.indexOf(password1.charAt(i)) != -1) { nMin++ }
									if (t3.indexOf(password1.charAt(i)) != -1) { nNum++ }
								}
							if (nMay > 0 && nMin > 0 && nNum > 0) {

								return 0;
							} else {

								return 2;
							}
						}
					}
// 
function actContr() {

	idper = document.getElementById('idact').value;
	usu = document.getElementById('usuarioobl').value;
	password = document.getElementById('usuarcontraseio').value;
	pass = document.getElementById('password1').value;
	pass2 = document.getElementById('password2').value;

	dato = 'idper=' + idper + '&usu=' + usu + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&opcion=restorePas';

	if(password != '' && pass != '' && pass2 != '' && usu !=''){
// restore password
retur = contraseña();

if(retur==1 || retur==2){

	$('#nmrcrctr').toggle('toggle');
	setTimeout(function() {
		$('#nmrcrctr').toggle('toggle');
	}, 10000);
}else{
	$.ajax({
		url: 'php/actContra.php',
		type: 'POST',
		data: dato
	}).done(function(respuesta) {
		if (respuesta == 7) {
		$("#show1").hide();
		$("#show2").show();
	} else if (respuesta == 2) {
		$('#invalida').toggle('toggle');
		setTimeout(function() {
			$('#invalida').toggle('toggle');
		}, 3000);
	} else if (respuesta == 3) {
		$('#falso').toggle('toggle');
		setTimeout(function() {
			$('#falso').toggle('toggle');
		}, 3000);
	} else if (respuesta == 1) {
		$('#error').toggle('toggle');
		setTimeout(function() {
			$('#error').toggle('toggle');
		}, 3000);
	}
});
}
}else{

	$('#vacios').toggle('toggle');
	setTimeout(function() {
		$('#vacios').toggle('toggle');
	}, 3000);
}
}


function redireccion(){

	location.reload();
	setTimeout("location.href = 'https://afac-avciv.com/';", 2);
}

</script>
