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
            <button style="display: none;" id="btn__iniciarsesion"><span class="glyphicon glyphicon-user"></span>
            Iniciar como usuario</button>
            <br>
            <button id="btn__tecnicosesion"><span class="glyphicon glyphicon-user"></span>
            Iniciar sesión</button>
        </div>
<!-- <p style="border: 1px solid red; height: 70px;"></p>-->       
        <div class="caja__trasera-register">
            <h3>Aun no tengo una cuenta?</h3>
            <p>¡Regístrate para solicitar tu reporte, gracias!</p>
            <button id="btn__registrar"><span class="glyphicon glyphicon-list-alt"></span>
            Registrarse</button>
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
		<b>Sistema de reporte informático</b> 
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

	<!--Formulario de usuarios-->
	<form action=""  id="form" autocomplete="off" class="formulario__login">        				
		<div class="form-header">
			<h3 class="form-title">
				<a href="indexx.php"><span class="glyphicon glyphicon-plane"></span></a>
					<b>Sistema de reporte informático</b> 
			</h3>					
		</div>
			<div class="row">                  
				<div class="form-body">
					<div class="form-group" >
						<label>Ingrese número de trabajador</label>
						<div class="input-group col-md-12">
							<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span></div>
							<input type="text" name="usua" id="usua" class="form-control" pattern="[0-9]{1,7}" required/>
						</div>
						<div >

						</div>
						                   
						<span class="help-block" id="error"></span>
						<p><span  class="error">Corrobore su número de trabajador</span></p>
					</div>
				</div>
				<div class="form-footer">
				<input type="submit" class="botton" value="Iniciar Sesion" />
				</div>
			</div>
	</form>


	<link rel="stylesheet" type="text/css" href="boots/bootstrap/css/select2.css">
	<script src="js/jquery-1.12.3.min.js"></script>
    <?php

    $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
    $are = mysqli_query($conexion,$sql);

    $sql = "SELECT id_cargo, cargo FROM cargo WHERE estado = 0";
    $cargo = mysqli_query($conexion,$sql);
    ?>

<!--Formulario registro--> 
	<form id="formusu" action="" method ="POST" class="formulario__registro" onsubmit="return registrarse(this)" >
	    
	   <div class="modal-header" style="padding: 0;">
	   
	        <h4 class="modal-title" id="exampleModalLabel" style="padding:0;"><b>Registrarse</b>
				<b><p class="alert text-right" style="padding:0;width:70%;font-size:14px;color:#a94442;float:right;margin:0; display: none;" id="danger">Ya esta registrado <span class="glyphicon glyphicon-ban-circle"></span> </p></b>
				<b><p class="alert text-right" style="padding:0;width:70%;font-size:14px;color:green;float:right;right;margin:0;display:none;" id="exito">Se registro con exitoso <span class="glyphicon glyphicon-ok-circle"></p></b>
				<b><p class="alert text-right" style="padding:0;width:70%;font-size:14px;color:#a94442;float:right;margin:0;display:none;"id="aviso_vacio">Llene campos vacíos <span class="glyphicon glyphicon-alert"></span></p></b>
	    	</h4>
	    </div>

	    <div class="modal-body">

	    <input type="hidden" id="opcion" name="opcion" value="registrar">
	        
	    <div class="form-group">
	    <div class="col-sm-offset-0 col-sm-12">
	    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" onkeyup="mayus(this);">
	    <!--<span class="help-block" id="error"></span>-->
	    </div>
		</div>

		<div class="form-group">
	    <div class="col-sm-offset-0 col-sm-12">
	    <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos" onkeyup="mayus(this);">
	    </div>
	    </div>

	    <div class="form-group">
	    <div class="col-sm-offset-0 col-sm-12">
	   <select  class="form-control" class="selectpicker" name="id_cargo" id="id_cargo" type="text" data-live-search="true">
	    <option selected>Seleccione cargo</option> 
	    <?php while($caresp = mysqli_fetch_row($cargo)):?>
	      <option value="<?php echo $caresp[0]?>"><?php echo $caresp[1]?></option>
	    <?php endwhile; ?>
	    </select>
	    </div>
	    </div>

		<div class="form-group">
		<div class="col-sm-offset-0 col-sm-12">
		<input id="correo" name="correo" type="text" class="form-control" placeholder="Correo">
		</div>
		</div>

	    <div class="form-group">
	    <div class="col-sm-offset-0 col-sm-12">
	   <select style="width: 100%" class="form-control" class="selectpicker" name="id_area" id="id_area" type="text" data-live-search="true">
	    <option selected>Seleccione area adscripción</option> 
	    <?php while($rea = mysqli_fetch_row($are)):?>
	      <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
	    <?php endwhile; ?>
	    </select>
	    </div>
	    </div>

	    <div class="form-group">
	    <div class="col-sm-offset-0 col-sm-12">
	    <input id="extension" name="extension" type="text" class="form-control" placeholder="Extension">
	    </div>
		</div>
	    <div class="form-group">
		<div class="col-sm-offset-0 col-sm-12">
		<select  class="form-control" class="selectpicker" name="ubicacion" id="ubicacion" type="text" data-live-search="true">
		<option selected>Seleciones ubicación</option> 
		<option value="Piso m2">Piso m2</option>
		<option value="Piso 1">Piso 1</option>
		<option value="Piso 2">Piso 2</option>
		<option value="Piso 3">Piso 3</option>
		<option value="Piso 4">Piso 4</option>
		<option value="Piso 7">Piso 7</option>
		</select>
		</div>
	    </div>
	    <div class="form-group">
		<div class="col-sm-offset-0 col-sm-12">
		<input id="n_empleado" name="n_empleado" type="text" class="form-control" placeholder="N° empleado">
	    <span class="help-block" id="error"></span>
		</div>
		</div>
	    
	    <div class="form-group"><br>
	    <div class="col-sm-offset-0 col-sm-12" style="margin-top: 1em">
	    <button type="button" class="btn btn-primary" onclick="registrarse();">Guardar</button>
	    <button type="reset" class="btn btn-primary" id="boton">Vaciar</button>
	    </div>
	    </div>
	    </div>
	</form>
	</div>
    </main>

<script type="text/javascript">
    $(document).ready(function(){
            $('#id_area').select2();
    }); 
</script>

	<script src="login/js/sript.js"></script>
	<script src="css/bootstrap/js/bootstrap.min.js"></script>
	<script src="css/assets/jquery-1.11.2.min.js"></script>
	<script src="css/assets/jquery.validate.min.js"></script>
	<script src="css/assets/validations.js"></script>
	<script type="text/javascript" src="js/usuarios.js"></script>

	<script src="js/select2.js"></script>	
</body>
























