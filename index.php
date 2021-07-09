<?php include('session_start.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gestores</title>
	<link rel="stylesheet" type="text/css" href="css/icono/iconos/style.css">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="login/css/master.css"> <!--ligamos la carpeta-->
	<link rel="stylesheet" href="css/assets/signup-form.css" type="text/css" />
	<script type="text/javascript" src="val/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="val/validacion.js"></script>
	<script type="text/javascript" src="val/valida.js"></script>

</head>
<body>

    <main>
<!--contenedor de botones-->
<div class="contenedor__todo" >
    <div class="caja__trasera">        
       



        <div class="caja__trase-Login">
            <h3>Ya tienes una cuenta?</h3>           
            <button id="btn__tecnicosesion"><span class="glyphicon glyphicon-user"></span>
            Iniciar sesión</button>
        </div>



     
        <div class="caja__trasera-register">
            <h3>¿Olvidaste tu contraseña? </h3>
            <p>¡Envía correo para restablecer tu contraseña!</p>
            <button id="btn__registrar"><span class="glyphicon glyphicon-envelope"></span>
            Restablecer contraseña</button>
        </div>




        </div>
    </div>

<!--Formulario de Login y registro-->
<div class="contenedor__login-register">

<!--Formulario tecnicos-->
	<form action="" id="formtec" class="formulario__tecnico">				         
		<div class="form-header">
		<h3 class="form-title">
		<span class="glyphicon glyphicon-plane"></span>
		<b>Gestión de inspección </b> 
		</h3>
		</div>
			<div class="rowadmin">                  
				<div class="form-body">
					<div class="form-group">
					<label>Usuario</label>
						<div class="input-group col-md-12">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
						<input type="text" class="form-control" name="tecn" pattern="[A-Z,a-z,0-9,_-,ñ,Ñ]{1,15}" required/>
						</div>
					<span class="help-block" id="error"></span>
					</div>
						<div class="form-group">
							<label>Contraseña</label> 
							<div class="input-group col-md-12">                       
								<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
								<input type="password" name="pass" class="form-control" pattern="[A-Z,a-z,0-9,_-ñÑ]{1,15}" required />
							</div> 
							<span class="help-block" id="error"></span>                     
						</div>                                  
				</div>
				<p><span class="errortec">Usuario o contraseña incorrecto, intente de nuevo</span></p>
				<span class="help-block" id="error"></span>
			    <div class="form-footer">
				<input type="submit" class="botton" value="Iniciar Sesion" />
				</div>
			</div>
	</form>

	<link rel="stylesheet" type="text/css" href="boots/bootstrap/css/select2.css">
	<script src="js/jquery-1.12.3.min.js"></script>





<!--Formulario registro--> 
	<form id="form" action="" method ="POST" class="formulario__registro" onsubmit="return registrarse(this)" >
	    
		<div class="form-header">
			<h3 class="form-title">
				<span class="glyphicon glyphicon-plane"></span>
					<b>Gestión de inspección</b>
			</h3>					
		</div>
			<div class="row">                  
				<div class="form-body">
					<div class="form-group" >
						<label>Ingrese correo electrónico</label>
						<div class="input-group col-md-12">
							<div class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span></div>
							<input type="email" name="correo" id="correo" class="form-control" pattern="[0-9]{1,7}" required/>
						</div>
						<div >

						</div>
						                   
						<span class="help-block" id="error"></span>
						<p><span  class="error">Corrobore su número de trabajador</span></p>
					</div>
				</div>
				<div class="form-footer">
				<input type="submit" class="botton" value="Enviar" />
				</div>
			</div>
	</form>












	</div>
    </main>
	<script src="login/js/sript.js"></script>
	<script src="css/bootstrap/js/bootstrap.min.js"></script>
	<script src="css/assets/jquery-1.11.2.min.js"></script>
	<script src="css/assets/jquery.validate.min.js"></script>
	<script src="css/assets/validations.js"></script>
	<script type="text/javascript" src="js/usuarios.js"></script>
	<script src="js/select2.js"></script>	
</body>
























