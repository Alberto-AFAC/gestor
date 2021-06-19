<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GESTOR DE INSPECTORES |ALTA CURSO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Left side column. contains the logo and sidebar -->
<?php include('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

      <div class="row">

      

      <section class="content" id="lista">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
            <div class="col-sm-3">
                    <div class="input-group">
                      <H4>
                          <!-- <i class="fa ion-android-plane"></i> -->
                      <label>CONSULTA DE CURSOS </label></H4>
                    </div>
            </div>

            </div>
            <!-- /INDICADORES -->



            <!-- /FIN DE INDICADORES -->
            <div class="box-body">
            <?php include('../html/conCurso.html');?>

            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <form class="form-horizontal" action="" method="POST"  >
      <div class="modal fade" id="modal-eliminar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ELIMINAR CURSO </h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="EgstIdlsc" id="EgstIdlsc">
               <div class="form-group">
                <div class="col-sm-12">
                  <p> CONFIRME ACEPTAR, PARA ELIMINAR: <input type="text" name="EgstTitlo" id="EgstTitlo" class="form-control disabled" disabled="" style="background: white;border: 1px solid white;"></p>
                </div>
                  <br>
                  <div class="col-sm-5">
                  <button type="button" class="btn btn-primary" onclick="eliCurso()">ACEPTAR</button>
                  </div>

                    <b><p class="alert alert-warning text-center padding error" id="danger">Error al eliminar curso</p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se elimino curso con éxito !</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Elija curso para eliminar </p></b>
                    </div>
                  </div>
                </div>    
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

    </section>



    <form class="form-horizontal" action="" method="POST"  >
<div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: black"  aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="exampleModalLabel">EDITAR CURSO </h4>  
</div>

<input type="hidden" class="form-control" id="AgstIdlsc" name="AgstIdlsc">
<div class="modal-body">

                  <div class="form-group">
                    <div class="col-sm-4">
                    <label>NOMBRE</label>
                    <input type="text" onkeyup="mayus(this);" class="form-control" id="AgstTitlo" name="AgstTitlo">
                    </div>

                     <div class="col-sm-4">
                      <label>TIPO</label>
                      <select type="text" class="form-control" id="AgstTipo" name="AgstTipo">
                        <option value="INDUCCIÓN">INDUCCIÓN</option>
                        <option value="BÁSICOS">BÁSICOS</option>
                        <option value="TRANSVERSALES">TRANSVERSALES</option>
                        <option value="RECURRENTES">RECURRENTES</option>
                        <option value="ESPECÍFICOS">ESPECÍFICOS</option>
                        <option value="OJT">OJT</option>
                      </select>
                      </div>

                  <div class="col-sm-4">
                    <label>PERFIL A QUIEN VA DIRIGIDO</label>                   
                      <select type="text" class="form-control" id="AgstPrfil" name="AgstPrfil">
                        <option value="IVA-L.l">IVA-L</option>
                        <option value="IVA-O">IVA-O</option>
                        <option value="IVA-NA">IVA-NA</option>
                        <option value="IVA-AE">IVA-AE</option>
                        <option value="IVA-SMS/SSP">IVA-SMS/SSP</option>
                        <option value="IVA- AVSEC">IVA- AVSEC</option>
                        <option value="AFAC">AFAC</option>
                        <option value="CIAAC">CIAAC</option>
                      </select>
                    </div>

                  </div>
                  <div class="form-group">
  
                     <div class="col-sm-4">
                      <label>DOCUMENTO QUE EMITE</label>
                      <!-- <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCntnc" name="gstCntnc"> -->
                      <select type="text" class="form-control" id="AgstCntnc" name="AgstCntnc">
                        <option value="DIPLOMA">DIPLOMA</option>
                        <option value="CONSTANCIA">CONSTANCIA</option>
                        <option value="CERTIFICADO">CERTIFICADO</option>
                      </select>
                      </div>


                     <div class="col-sm-1" style="padding-right: 0; width: 79px;">
                     <label>DURACION</label> 
                      <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                      <select  class="form-control" id="Ahr" name="Ahr">
                        <option value="00">00</option>
                      <?php for($h=1; $h<=24; $h++){
                         if($h<10){ ?>
                       <option value="<?php echo '0'.$h?>"><?php echo '0'.$h?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $h?>"><?php echo $h?></option>
                      <?php } }?>
                </select>
                    </div>

                      <div class="col-sm-1" style="padding: 0;">
               <label style="color: white">.</label>
                      <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                      <select  class="form-control" id="Amin" name="Amin">
                        <option value="00">00</option>
                      <?php for($m=1; $m<=59; $m++){

                        if($m<10){?>
                        <option value="<?php echo '0'.$m?>"><?php echo '0'.$m?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $m?>"><?php echo $m?></option>
                      <?php } }?>
                </select>
                    </div>
                    <div class="col-sm-1" style="padding: 0;">
               <label style="color: white">.</label>
                      <select  class="form-control" id="Atmp" name="Atmp">
                        <option value="HRS.">HRS.</option>
                        <option value="MIN.">MIN.</option>
                      </select>
                    </div>

                <div class="col-sm-offset-1 col-sm-3">
                         <label>PERIODO DE VIGENCIA</label>                         
                            <select type="text" class="form-control" id="AgstVignc" name="AgstVignc">
                            <option value="RECURRENTE">RECURRENTE</option>
                            <option value="NO APLICA">UNICA VEZ</option>
                            <option value="1 AÑO">1 AÑO</option>
                            <option value="2 AÑOS">2 AÑOS</option>
                            <option value="3 AÑOS">3 AÑOS</option>
                            <option value="4 AÑOS">4 AÑOS</option>
                            <option value="5 AÑOS">5 AÑOS</option>
                            <option value="6 AÑOS">6 AÑOS</option>
                            </select>
                      </div>
                      </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                    <label>OBJETIVO</label>
                    <textarea name="AgstObjtv" id="AgstObjtv"  placeholder="Escribir el Objetivo" onkeyup="mayus(this);" class="form-control" rows="5" cols="50"></textarea>
                    </div>
                  </div>
                 <div class="form-group">
                     <div class="col-sm-4">
                      <label>TEMARIO</label>

                   <input type="file" id="AgstTmrio" name="AgstTmrio" style="width: 410px; margin:0 auto;" required accept=".pdf,.doc" class="input-file" size="1450">


                      </div>
                  </div>  

<div class="form-group"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="button" class="btn btn-primary" onclick="actCurso();">ACEPTAR </button>
</div>
             <b><p class="alert alert-danger text-center padding error" id="afalla">Error al registrar curso o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="aexito">¡Se registro curso y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="avacio">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="arepetido">¡El curso ya está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="arenom">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="aadjunta">
                    Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="aerror">
                    Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="aforn">
                    Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="amax">
                    Supera el limite permitido</p></b>


</div>
</div>
</div>
</div>
</form>








    <!-- /.tab-pane -->
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1
    </div>
    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
  </footer>

  <!-- Control Sidebar -->
<?php include('panel.html');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../js/global.js"></script>
</body>
</html>
