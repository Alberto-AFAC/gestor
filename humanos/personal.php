<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestor inspectores | Alta de persona</title>
  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
include('header.php');
?> 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

   <section class="content-header">
      <h1>
        ALTA PERSONAL       
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
              <li class="active"><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
              <li><a href="#timeline" data-toggle="tab">DATOS DEL PUESTO</a></li>
            </ul>
           <!-- /.col -->
           <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">


        <form id="Dtall" class="form-horizontal" action="" method="POST" >
            <div class="form-group">
                <div class="col-sm-4">
                    <div class="input-group">
                       <H4><i class="fa  ion-android-person"></i>
                       <label>DATOS PERSONALES</label></H4>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>NOMBRE(S)</label>
                       <input type="text"onkeyup="mayus(this);"class="form-control" id="gstNombr" name="gstNombr">
                    </div>
                    <div class="col-sm-4">
                       <label>APELLIDO(S)</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstApell" name="gstApell">
                    </div>

                    <div class="col-sm-4">
                       <label>LUGAR DE NACIMIENTO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstLunac" name="gstLunac">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>FECHA DE NACIMIENTO</label>
                       <input type="date" class="form-control" id="gstFenac" name="gstFenac" >
                    </div>

                    <div class="col-sm-4">
                      <label>ESTADO CIVIL</label>
                      <select type="text" class="form-control" id="gstStcvl" name="gstStcvl">
                          <option value="">ESTADO CIVIL</option>
                         <option value="CASADO">CASADO</option>
                         <option value="SOLTERO">SOLTERO</option>
                         <option value="SOLTERO">OTROS</option>
                      </select>
                    </div>

                    <div class="col-sm-4">
                       <label>CURP</label>
                       <input type="tex" oninput="validarInput(this)" onkeyup="mayus(this);" class="form-control" id="gstCurp" name="gstCurp" minlength="18" maxlength="18">
                       <label id="resultado"></label> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                       <label>RFC</label>
                       <input type="tex" oninput="validarInput1(this)" onkeyup="mayus(this);" class="form-control" id="gstRfc" name="gstRfc" > 
                       <label id="resul1"></label> 
                    </div>

                    <div class="col-sm-4">
                       <label>PASAPORTE NO.</label>
                       <input type="number" onkeyup="mayus(this);" class="form-control" id="gstNpspr" name="gstNpspr">
                    </div>

                    <div class="col-sm-4">
                       <label>PASAPORTE VIGENCIA</label>
                       <input type="date" class="form-control" id="gstPsvig" name="gstPsvig">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>VISA PAIS</label>
                       <input type="text" class="form-control" id="gstVisa" name="gstVisa">
                    </div>

                    <div class="col-sm-4">
                       <label>VISA VIGENCIA</label>
                       <input type="date" class="form-control" id="gstVignt" name="gstVignt">
                    </div>

                     <div class="col-sm-4">
                      <!--  <label>NÚMERO DE CARTILLA</label> -->
                       <input type="hidden" value="0" class="form-control" id="gstNucrt" name="gstNucrt">
                    </div> 
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                      <div class="input-group">
                         <H4><i class="fa  ion-android-pin"></i>
                         <label> DOMICILIO</label></H4>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>CALLE</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCalle" name="gstCalle">
                    </div>

                    <div class="col-sm-4">
                       <label>NÚMERO</label>
                       <input type="number" onkeyup="mayus(this);" class="form-control" id="gstNumro" name="gstNumro">
                    </div>

                    <div class="col-sm-4">
                       <label>COLONIA</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstClnia" name="gstClnia">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>CÓDIGO POSTAL</label>
                       <input type="number" onkeyup="mayus(this);" class="form-control" id="gstCpstl" name="gstCpstl" min="5" max="5" >
                    </div>
                     
                    <div class="col-sm-4">
                       <label>CIUDAD</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCiuda" name="gstCiuda">
                    </div>

                    <div class="col-sm-4">
                       <label>ESTADO</label>
                       <input type="text" style="text-transform:uppercase" class="form-control" id="gstStado" name="gstStado">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa   fa-dot-circle-o"></i>
                          <label> CONTACTO</label></H4>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>CASA</label>
                       <div class="input-group">
                          <div class="input-group-addon">
                             <i class="fa fa-phone"></i>
                          </div>
                          <input type="tel" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask id="gstCasa" name="gstCasa">
                       </div>     
                    </div> 

                    <div class="col-sm-4">
                       <label>CELULAR</label>
                       <div class="input-group">
                          <div class="input-group-addon">
                             <i class="fa fa-phone"></i>
                          </div>
                          <input type="tel" class="form-control" data-inputmask='"mask": "(99) 999-9999"'  data-mask id="gstClulr" name="gstClulr">
                       </div>     
                    </div>

                    <div class="col-sm-4">
                        <label>EXTENSION Ó NÚMERO TELEFONICO</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask id="gstExTel" name="gstExTel">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                         <label>CORREO PERSONAL</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Correo" id="gstCorro" name="gstCorro">
                          </div>
                    </div>
                    <div class="col-sm-4">
                         <label>CORREO INSTITUCIONAL</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Correo" id="gstCinst" name="gstCinst">
                          </div>
                    </div>
                    
      
                   <br> <br> <br> <br> 
                   <div class="form-group">
                    <div class="col-sm-10">
                        <div class="col-sm-offset-0 col-sm-2">
                                 <button type="button"  class="btn btn-block btn-primary"  ><span class="fa fa-share"></span> <a style="color: #fff;" href="#timeline" data-toggle="tab">SIGUIENTE</a></button>
                        </div>
                        </div>
                        </div>
                </form>

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
                       <label>NÚMERO DE EMPLEADO</label>
                       <input type="number" class="form-control" id="gstNmpld" name="gstNmpld">
                    </div>
                    <div class="col-sm-3">
                       <label>FECHA INGRESO A LA AFAC</label>
                       <input type="date" class="form-control" id="gstFeing" name="gstFeing">
                    </div>  
                    <div class="col-sm-5">
                    <label>ESTATUS ALTA PERSONAL</label>
                    <input type="text" class="form-control" id="siglasoaci" name="siglasoaci">
                    </div>  
                    </div>
                    <div class="form-group">
          <div class="col-sm-4">
          <label>CÓDIGO PRESUPUESTAL</label>
          <div id="buscador"></div>                            
          </div>
          <div id="select1"></div> 
          </div>

         <div class="form-group">
            <div class="col-sm-5">
               <label>NOMBRE DEL PUESTO</label>
               <select style="width: 100%" class="form-control" class="selectpicker" name="gstPstID" id="gstPstID" type="text" data-live-search="true">
               <option value="0">SELECCIONA EL PUESTO</option>
               <?php while($pust = mysqli_fetch_row($psto)):?>                      
               <option value="<?php echo $pust[0]?>"><?php echo $pust[1]?></option>
               <?php endwhile; ?>
               </select>
            </div> 

            <div id="oaci"></div>
            <div id="siglas"></div>                                
         </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa fa-dot-circle-o"></i>
                          <label>INFORMACIÓN DE ADSCRIPCIÓN</label></H4>
                        </div>
                      </div>
                </div>

                    <div class="form-group">

                    <div class="col-sm-6">
                   <label>DIRECCIÓN EJECUTIVA </label>         
                      <select style="width: 100%" class="form-control" class="selectpicker" name="gstAreID" id="gstAreID" type="text" data-live-search="true">
                      <option value="0">SELECCIONA EL ÁREA</option>
                      <?php while($ejct = mysqli_fetch_row($ejec)):?>                      
                      <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                      <?php endwhile; ?>
                      </select>
                    </div>
                  <div class="col-sm-6">
                  <label>DIRECCIÓN DE ADSCRIPCIÓN </label>
                    <input type="hidden" id="gstCargo" name="gstCargo" value="NUEVO INGRESO">
                        <label style="color: white">.</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara" id="gstIDara" type="text" data-live-search="true">
                         <option value="">SELECCIONE ÁREA ADSCRIPCIÓN</option> 
                         <?php while($rea = mysqli_fetch_row($are)):?>                      
                         <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>                  
                  </div>    
         

            
         
           <input type="hidden" class="form-control" id="gstIDCat" name="gstIDCat" value="0">
           <input type="hidden" class="form-control" id="gstIDSub" name="gstIDSub" value="0">                   
           <input type="hidden" class="form-control" id="gstAcReg" name="gstAcReg" value="0">
           <input type="hidden" class="form-control" id="gstIDuni" name="gstIDuni" value="0">

                <div class="form-group">
                    

                    
            
                </div>
                <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-2">
                    <button type="button" id="button" class="btn btn-block btn-primary" onclick="registrar();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger">Los datos ya están agregados </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se agregaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>
                </form>            

</section>  
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.2
    </div>

    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
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
<script src="../../plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>
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
$('#oaci').load('select/oaci.php');
$('#siglas').load('select/siglas.php');
});

</script>
<script src="../js/select2.js"></script>