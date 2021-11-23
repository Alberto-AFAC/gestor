<!DOCTYPE html><?php 
include ("../conexion/conexion.php");
session_start(); 
unset($_SESSION['consulta']);
?>
<html>
<head>
<link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Capacitación AFAC | Alta de persona</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <script src="../dist/js/sweetalert2.all.min.js"></script>
  <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
   .swal-wide{
    width: 500px !important;
    font-size: 16px !important;
}
.a-alert {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

.a-alert:link {
  color: white;
}

.a-alert:visited {
  color: white;
}
</style>
      </head>
      <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

<div class="wrapper">

<?php
include('header.php');
?> 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

   <section class="content-header">
      <h1> 
      <i class="fa  ion-android-person"></i>
            ALTA / PERSONAL   
      </h1>
    </section>
<?php
 
$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
$cat = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
$sub1 = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdCom,gstCSigl,gstNombr,gstNocrt,gstRgion FROM comandancia WHERE estado = 0";
$uni = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
$ejec = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpus,gstNpsto FROM puesto WHERE estado = 0";
$psto = mysqli_query($conexion,$sql);
?>

    <section class="content">

      <div class="row">
    
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active "><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
              <li><a href="#timeline" data-toggle="tab" id="puestos01">DATOS DEL PUESTO</a></li>
            </ul>
           <!-- /.col -->
           <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
        <form id="Dtall" class="form-horizontal" action="" method="POST" >
                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">NOMBRE(S)</label>
                       <input type="text"onkeyup="mayus(this);"class="form-control inputalta" id="gstNombr" name="gstNombr">
                    </div>
                    <div class="col-sm-4">
                       <label class="label2">APELLIDO(S)</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta " id="gstApell" name="gstApell">
                    </div>

                    <div class="col-sm-4">
                     <label class="label2">LUGAR DE NACIMIENTO</label>
                     <select type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstLunac" name="gstLunac">
                         <option value="">LUGAR DE NACIMIENTO</option>
                         <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                         <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                         <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                         <option value="CAMPECHE">CAMPECHE</option>
                         <option value="COAHUILA">COAHUILA</option>
                         <option value="COLIMA">COLIMA</option>
                         <option value="CHIAPAS">CHIAPAS</option>
                         <option value="CHIHUAHUA">CHIHUAHUA</option>
                         <option value="DISTRITO FEDERAL">CUIDAD DE MÉXICO</option>
                         <option value="DURANGO">DURANGO</option>
                         <option value="GUANAJUATO">GUANAJUATO</option>
                         <option value="GUERRERO">GUERRERO</option>
                         <option value="HIDALGO">HIDALGO</option>
                         <option value="JALISCO">JALISCO</option>
                         <option value="MÉXICO">MÉXICO</option>
                         <option value="MICHOACÁN">MICHOACÁN</option>
                         <option value="MORELOS">MORELOS</option>
                         <option value="NAYARIT">NAYARIT</option>
                         <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                         <option value="OAXACA">OAXACA</option>
                         <option value="PUEBLA">PUEBLA</option>
                         <option value="QUERÉTARO">QUERÉTARO</option>
                         <option value="QUINTANA ROO">QUINTANA ROO</option>
                         <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                         <option value="SINALOA">SINALOA</option>
                         <option value="SONORA">SONORA</option>
                         <option value="TABASCO">TABASCO</option>
                         <option value="TAMAULIPAS">TAMAULIPAS</option>
                         <option value="TLAXCALA">TLAXCALA</option>
                         <option value="VERACRUZ">VERACRUZ</option>
                         <option value="YUCATÁN">YUCATÁN</option>
                         <option value="ZACATECAS">ZACATECAS</option>
                         <option value="EN OTRO PAÍS">EN OTRO PAÍS</option>
                         <option value="NO ESPECIFICADO">NO ESPECIFICADO</option>
                     </select>
                     </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">FECHA DE NACIMIENTO</label>
                       <input type="date" class="form-control inputalta" id="gstFenac" name="gstFenac" >
                    </div>


                    <div class="col-sm-4">
                      <label class="label2">SEXO</label>
                      <select type="text" class="form-control inputalta" id="gstSexo" name="gstSexo">
                          <option value="">ELEGIR SEXO</option>
                         <option value="MUJER">MUJER</option>
                         <option value="HOMBRE">HOMBRE</option>
                      </select>
                    </div>


                    <div class="col-sm-4">
                      <label class="label2">ESTADO CIVIL</label>
                      <select type="text" class="form-control inputalta" id="gstStcvl" name="gstStcvl">
                          <option value="">ESTADO CIVIL</option>
                         <option value="CASADO">CASADO</option>
                         <option value="SOLTERO">SOLTERO</option>
                         <option value="SOLTERO">OTROS</option>
                      </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">CURP</label>
      
                       <input type="tex" oninput="validarInput(this)" onkeyup="mayus(this);" class="form-control inputalta form-control inputPadding" id="gstCurp" name="gstCurp" minlength="18" maxlength="18">

                    </div>

                    <div class="col-sm-4">
                       <label class="label2">RFC</label>
                       <input type="tex" maxlength="12" oninput="validarInputRF(this)" onkeyup="mayus(this);" class="form-control inputalta form-control inputPadding" id="gstRfc" name="gstRfc" > 
                       <!-- <label id="resultado1"></label>  -->
                    </div>

                    <div class="col-sm-4">
                       <label class="label2">PASAPORTE NO.</label>
                       <input type="number" onkeyup="mayus(this);" class="form-control inputalta" id="gstNpspr" name="gstNpspr">
                    </div>

                </div>
                <div class="form-group">

                    <div class="col-sm-4">
                       <label class="label2">PASAPORTE VIGENCIA</label>
                       <input type="date" class="form-control inputalta" id="gstPsvig" name="gstPsvig">
                    </div>
                                      
                    <div class="col-sm-4">
                       <label class="label2">VISA PAIS</label>
                       <input type="text" class="form-control inputalta" id="gstVisa" name="gstVisa">
                    </div>

                    <div class="col-sm-4">
                       <label class="label2">VISA VIGENCIA</label>
                       <input type="date" class="form-control inputalta" id="gstVignt" name="gstVignt">
                    </div>

                    <div class="col-sm-4">
                      <!--  <label>NÚMERO DE CARTILLA</label> -->
                       <input type="hidden" value="0" class="form-control" id="gstNucrt" name="gstNucrt">
                    </div> 
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                      <div class="input-group">
                         <H4><i style=color:#333 class="fa  ion-android-pin"></i>
                         <label style=color:#333> DOMICILIO</label></H4>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">CALLE</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstCalle" name="gstCalle">
                    </div>

                    <div class="col-sm-4">
                       <label class="label2">NÚMERO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstNumro" name="gstNumro">
                    </div>

                    <div class="col-sm-4">
                       <label class="label2">COLONIA</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstClnia" name="gstClnia">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">CÓDIGO POSTAL</label>
                       <input type="number" onkeyup="mayus(this);" class="form-control inputalta" id="gstCpstl" name="gstCpstl" maxlength="5" >
                    </div>
                     
                    <div class="col-sm-4">
                       <label class="label2">CIUDAD</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstCiuda" name="gstCiuda">
                    </div>

                    <div class="col-sm-4">
                       <label class="label2">ESTADO</label>
                       <select type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstStado" name="gstStado">
                         <option value="">SELECCIONA EL ESTADO</option>
                         <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                         <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                         <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                         <option value="CAMPECHE">CAMPECHE</option>
                         <option value="COAHUILA">COAHUILA</option>
                         <option value="COLIMA">COLIMA</option>
                         <option value="CHIAPAS">CHIAPAS</option>
                         <option value="CHIHUAHUA">CHIHUAHUA</option>
                         <option value="DISTRITO FEDERAL">CUIDAD DE MÉXICO</option>
                         <option value="DURANGO">DURANGO</option>
                         <option value="GUANAJUATO">GUANAJUATO</option>
                         <option value="GUERRERO">GUERRERO</option>
                         <option value="HIDALGO">HIDALGO</option>
                         <option value="JALISCO">JALISCO</option>
                         <option value="MÉXICO">MÉXICO</option>
                         <option value="MICHOACÁN">MICHOACÁN</option>
                         <option value="MORELOS">MORELOS</option>
                         <option value="NAYARIT">NAYARIT</option>
                         <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                         <option value="OAXACA">OAXACA</option>
                         <option value="PUEBLA">PUEBLA</option>
                         <option value="QUERÉTARO">QUERÉTARO</option>
                         <option value="QUINTANA ROO">QUINTANA ROO</option>
                         <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                         <option value="SINALOA">SINALOA</option>
                         <option value="SONORA">SONORA</option>
                         <option value="TABASCO">TABASCO</option>
                         <option value="TAMAULIPAS">TAMAULIPAS</option>
                         <option value="TLAXCALA">TLAXCALA</option>
                         <option value="VERACRUZ">VERACRUZ</option>
                         <option value="YUCATÁN">YUCATÁN</option>
                         <option value="ZACATECAS">ZACATECAS</option>
                         <option value="EN OTRO PAÍS">EN OTRO PAÍS</option>
                         <option value="NO ESPECIFICADO">NO ESPECIFICADO</option>
                     </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i style=color:#333 class="fa   fa-dot-circle-o"></i>
                          <label style=color:#333> CONTACTO</label></H4>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">CASA</label>
                       <div class="input-group">
                          <div class="input-group-addon">
                             <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" class="form-control inputalta" id="gstCasa" name="gstCasa" placeholder="(55) 5555-5555" autocomplete="off">
                       </div>     
                    </div> 
                    <div class="col-sm-4">
                       <label class="label2">CELULAR</label>
                       <div class="input-group">
                          <div class="input-group-addon">
                             <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" class="form-control inputalta" id="gstClulr" name="gstClulr" placeholder="(52) 55-5555-5555" autocomplete="off">
                       </div>     
                    </div>
                    <div class="col-sm-4">
                        <label class="label2">EXTENSION Ó NÚMERO TELEFONICO</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control inputalta" id="gstExTel" name="gstExTel" placeholder="(55)-5555-5555 x55555" autocomplete="off">
                        </div>
                    </div>
                    </div>
                   
                    <div class="form-group">
                    <div class="col-sm-4 text-container">
                         <label class="label2">CORREO PERSONAL </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <i class="ion-ios-checkmark iconoInput" id="labelvalidcor"  style="display:none;"></i>
                            <i class="ion-ios-close iconoInput" id="labelinvarfcor"  style=" color: #F10C25; display:none;"></i>
                            <input type="text" class="form-control inputalta" placeholder="correo@correo.com" id="gstCorro" name="gstCorro">
                            
                           </div>
                    </div>
                    <div class="col-sm-4 ">
                         <label class="label2">CORREO INSTITUCIONAL</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control inputalta" placeholder="correo@sct.gob.mx" id="gstCinst" name="gstCinst">
                          </div>
                    </div>
                    <div class="col-sm-4 ">
                         <label class="label2">CORREO ALTERNATIVO</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control inputalta" placeholder="correo@correo.com" id="gstSpcID" name="gstSpcID">
                          </div>
                    </div>
                   <br> <br> <br> <br> 
                   <div class="form-group">
                    <div class="col-sm-10">
                        <div class="col-sm-offset-0 col-sm-2">
                                 <button type="button" title="ir a la siguiente pestaña" class="btn btn-block btn-primary botonnet" onclick="focusScrollMethod()"><span class="fa fa-share"></span> <a style="color: #fff;" href="#timeline" data-toggle="tab">SIGUIENTE</a></button>
                        </div>
                        </div>
                        </div>
                </form>
                <br> 
              </script>
            </div>
            <div class="post">
   
              <!-- /.user-block -->
             
              <!-- /.row -->

              <ul class="list-inline">

              </ul>

         
            </div>
            <!-- /.post -->
          </div>
          </div>
          
      <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <form id="puesto" class="form-horizontal" action="" method="POST" >             
                <div class="form-group">
                      <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa fa-briefcase"></i>
                          <label>DATOS DEL PUESTO</label></H4>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">NÚMERO DE EMPLEADO</label>
                       <input type="number" class="form-control inputalta" id="gstNmpld" name="gstNmpld">
                    </div>
                    <div class="col-sm-3">
                       <label class="label2">FECHA INGRESO A LA AFAC</label>
                       <input type="date" class="form-control inputalta" id="gstFeing" name="gstFeing">
                    </div>  
                    <div class="col-sm-5">
                    <label class="label2">OBSERVACIONES</label>
                    <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstSigID" name="gstSigID">
                    </div>  
                    </div>
                    <div class="form-group">
          <div class="col-sm-4">
          <label class="label2">CÓDIGO PRESUPUESTAL</label>
          <div id="buscador"></div>                            
          </div>
          <div id="select1"></div> 
          </div>

         <div class="form-group">
            <div class="col-sm-12">
               <label class="label2">NOMBRE DEL PUESTO</label>
               <select style="width: 100%" class="form-control inputalta selectpicker" name="gstPstID" id="gstPstID" type="text" data-live-search="true">
               <option value="0">SELECCIONA EL PUESTO</option>
               <?php while($pust = mysqli_fetch_row($psto)):?>                      
               <option value="<?php echo $pust[0]?>"><?php echo $pust[1]?></option>
               <?php endwhile; ?>
               </select>
            </div> 
            <input type="hidden" name="gstSpcID" id="gstSpcID" value="0">
<!--             <div id="oaci"></div>
            <div id="siglas"></div> -->                                
         </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa fa-dot-circle-o"></i>
                          <label>INFORMACIÓN DE ADSCRIPCIÓN</label></H4>
                        </div>
                      </div>
                </div>

                    <!-- <div class="form-group">
                    <div class="col-sm-6">
                   <label class="label2">DIRECCIÓN EJECUTIVA </label>         
                      <select style="width: 100%"  class="selectpicker inputalta" name="gstAreID" id="gstAreID" type="text" data-live-search="true">
                      <option value="0">SELECCIONA EL ÁREA</option>
                      <?php while($ejct = mysqli_fetch_row($ejec)):?>                      
                      <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                      <?php endwhile; ?>
                      </select>
                    </div> -->

                    <div class="form-group">
                          <div class="col-sm-6">
                            <label class="label2">DIRECCIÓN EJECUTIVA</label>
                             <div id="gstAreID1"></div>                            
                          </div>
                    

                  <div class="col-sm-6">

                      <input type="hidden" id="gstCargo" name="gstCargo" value="NUEVO INGRESO">

                      <label style="color:grey">DIRECCIÓN DE ADSCRIPCIÓN </label>                    

                      <div id="gstIDara1"></div> 
                    
                      </div>  
                  </div>    

           <input type="hidden" class="form-control inputalta" id="gstIDCat" name="gstIDCat" value="0">
           <input type="hidden" class="form-control inputalta" id="gstIDSub" name="gstIDSub" value="0">                   
           <input type="hidden" class="form-control inputalta" id="gstAcReg" name="gstAcReg" value="0">
           <input type="hidden" class="form-control inputalta" id="gstIDuni" name="gstIDuni" value="0">

   
                <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-2">
                    <button type="button" id="button" title="AGREGAR REGISTRO" style="font-size:18px" class="btn btn-block btn-primary altaboton"  onclick="registrarH();">ACEPTAR</button>
                    </div>
                    
                    <b><p class="alert alert-danger text-center padding error" id="danger">Error al agregar datos</p></b>
                    
                    <b><p class="alert alert-info text-center padding error" id="succe">Los datos ya están agregados </p></b>

                   <!--  <b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p></b> -->

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

                </form>            
</section>  
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b>    <?php 
                                $query ="SELECT 
                                        *
                                        FROM
                                        controlvers";
                                $resultado = mysqli_query($conexion, $query);

                                $row = mysqli_fetch_assoc($resultado);
                                if(!$resultado) {
                                    var_dump(mysqli_error($conexion));
                                    exit;
                                }
                                ?>
                    <?php echo $row['version']?>
    </div>

    <strong>AFAC &copy; 2021 <a style="color:#3c8dbc"  href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados DDE
.
  </footer>

<?php include('panel.html');?>

<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<script type="text/javascript" src="../js/datos.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script src="../js/global.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="../../js/valida.js"></script>
 
</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#gstAreID').select2();
$('#gstIDara').select2();
$('#gstPstID').select2();
$('#buscador').load('select/buscar.php');
$('#select1').load('select/tabla.php');
$('#gstAreID1').load('select/buscardirec.php');
$('#gstIDara1').load('select/tabladirec.php');
// $('#oaci').load('select/oaci.php');
// $('#siglas').load('select/siglas.php');
});

</script>
<script src="../js/select2.js"></script>