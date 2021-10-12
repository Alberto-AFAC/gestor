<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <title>Capacitación AFAC | Inspectores</title>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js" integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg==" crossorigin="anonymous"></script> 
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>  -->
  <!--   <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
  <!-- Theme style -->

<!--   <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> -->
  <!-- <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <script src="../dist/js/sweetalert2.all.min.js"></script>
  <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

<?php

      $sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
      $pais = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
      $paises = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
      $categ = mysqli_query($conexion,$sql);

      $sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
      $categs = mysqli_query($conexion,$sql);

      $sql = "SELECT  gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
      $ejec = mysqli_query($conexion,$sql);

?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

<?php
    include('header.php');
?>

 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

    <section class="content" id="lista">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
            <div class="col-sm-3">
                    <div class="input-group">
                      <H4><i class="fa ion-android-plane"></i>
                      <label>INSPECTORES</label></H4>
                    </div>
            </div>
             <div class="pull-right">
                  <div class="btn-group">
                    <a type="button" href="inspecion.php" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                  </div>
                  <!-- /.btn-group -->
                </div>
            </div>
            <!-- /INDICADORES -->
           
    <!-- Main content -->
    <section class="content">

<!-- row -->
  <?php include('inline.php'); ?> <!-- aquii le dddddddddddddddddddddddddddddddddcambiaste-->

            <!-- /FIN DE INDICADORES -->
            <div class="box-body">
            <?php //include('../html/consultar.html');?>
  <table style="width: 100%;" id="data-table-inspectores" class="table display table-striped table-bordered"></table>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.col -->

      <section class="content" id="detalles" style="display: none;">
      <div class="row">
      <?php include('valor.php'); ?>
      <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>


<?php //include('evaluar.php');?>
<!-- modal evaluar -->
<div class="modal fade" id="modal-evaluar">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" onclick="location.href='inspecion.php'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">EVALUAR</h4>
              </div>
              <div class="modal-body">
              <form id="Evalua">
              <div class="row">  
              <div class="form-group">
                  <div class="col-sm-5">
                    <label class="label2">NOMBRE</label>
                      <input type="text" class="form-control" id="evalu_nombre" name="evalu_nombre" disabled="">
                  </div>

                    <div class="col-sm-offset-0 col-sm-7">
                      <label class="label2">CATEGORÍA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="gstIDCate" name="gstIDCate"type="text" data-live-search="true" disabled="">
                         <?php while($oira = mysqli_fetch_row($categ)):?>                      
                         <option value="<?php echo $oira[0]?>"><?php echo $oira[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

              </div>

              <div id="evlacns"></div>

             
                <input type="hidden" id='evla' name='evla' value='<?php echo $datos[0];?>'> 

                 <div class="form-group" >
                    <div class="col-sm-12" style=" margin-bottom: 1em">
                    <label class="label2">COMENTARIOS</label>
                    <textarea name="comntr" id="comntr" onkeyup="mayus(this);" class="form-control inputalta" rows="2" cols="50"></textarea>
                    </div>
                  </div>

 

            <div class="form-group">
              <div class="col-sm-7">
              <button type="button" id="button" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" onclick="evaluar();">ACEPTAR</button>
              </div>
              <b><p class="alert alert-success text-center padding exito" id="succe0">¡Se ha evaluado con éxito!</p></b>
              <b><p class="alert alert-info text-center padding error" id="danger0">El inspector ya esta evaluado </p></b>
              <b><p class="alert alert-warning text-center padding aviso" id="empty0">Es necesario agregar los datos que se solicitan </p></b>
              </div>
             </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal-resultado">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">RESULTADO</h4>
              </div>
              <div class="modal-body">
              <form id="Result" action="lista" target="_blank" method="POST">
              <input type="hidden" class="form-control" id="pdfIdper" name="pdfIdper">
              <input type="hidden" class="form-control" id="evalu_nombre" name="evalu_nombre">
              <input type="hidden" class="form-control" id="apellido" name="apellido">
              <input type="hidden" class="form-control" id="gstComnt" name="gstComnt">
              <input type="hidden" class="form-control" id="especialidad" name="especialidad">
              <input type="hidden" class="form-control" id="siglas" name="siglas">
              <input type="hidden" class="form-control" id="adscripcion" name="adscripcion">
              <input type="hidden" class="form-control" id="departamento" name="departamento">
        

              <input type="submit" style="float: right;" class="btn btn-info" value="CONSULTAR APÉNDICE E"><br><br>

              <div class="row">  
              <div class="form-group">
                  <div class="col-sm-5">
                    <label>NOMBRE</label>
                      <input type="text" class="form-control" id="evalu_nombre" name="evalu_nombre" disabled="">
                  </div>
                    <div class="col-sm-offset-0 col-sm-7">
                      <label>CATEGORÍA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="IDCat" name="IDCat" type="text" data-live-search="true" disabled="">
                         <?php while($oiras = mysqli_fetch_row($categs)):?>                      
                         <option value="<?php echo $oiras[0]?>"><?php echo $oiras[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

              </div>

              <div id="rsltad"></div>

                 <div class="form-group">
                    <div class="col-sm-12">
                    <label>COMENTARIOS</label>
                    <textarea name="gstComnt" id="gstComnt" onkeyup="mayus(this);" class="form-control" rows="2" cols="50" readonly></textarea>
                    </div>
                  </div>

             </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include('agrStdPro.php'); ?>
 
  </div>
  <!-- /.content-wrapper -->
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

    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
  </footer>

 <?php include('panel.html');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
<!-- page script -->
<script src="../js/global.js"></script>
<script src="../js/datos.js"></script>


</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#gstIDara').select2();
$('#gstIDCat').select2();
//$('#gstIDSub').select2();
//$('#gstIDuni').select2();
$('#gstAreID').select2();
$('#gstPstID').select2();
$('#gstIDpai').select2();
$('#AgstIDpai').select2();
$('#actualiza').load('select/actualiza.php');
$('#select1').load('select/tabla.php');
$('#actoaci').load('select/actoaci.php');
$('#siglas').load('select/siglas.php');  
$('#comandancia').load('select/actbuscacom.php');
$('#select2').load('select/acttablacom.php');
}); 
</script>
<script src="../js/select2.js"></script> 

<script type="text/javascript">

var dataSet = [
<?php 
$query = "SELECT *, DATE_FORMAT(personal.gstFeing, '%d/%m/%Y') as Ingreso FROM personal 
          INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
          WHERE personal.gstCargo = 'INSPECTOR' AND  personal.estado = 0 OR personal.gstCargo = 'DIRECTOR' AND  personal.estado = 0 ORDER BY gstIdper DESC";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
        $fechaActual = date_create(date('d-m-Y')); 
		    $FechaIngreso = date_create($data['gstFeing']); 
		    $interval = date_diff($FechaIngreso, $fechaActual,false);  
		    $antiguedad = intval($interval->format('%R%a')); 

      $gstIdper = $data['gstIdper'];
      $result = $data['gstIdper'];


      ?>

["<?php echo  $data['gstNmpld']?>","<?php echo  $data['gstNombr']?>","<?php echo $data['gstApell']?>","<?php echo $data['gstCatgr']?>","<?php echo $data['Ingreso']?>","<?php 
							if($antiguedad <=30){
								echo "<span style='font-weight: bold; height: 50px; color: green;'>Nuevo ingreso</span>";
							}else {
								echo "<span style='font-weight: bold; height: 50px; color: #3C8DBC;'>Personal antiguo</span>";
							}
							?>","<?php


                if($data['gstEvalu'] == 'NO'){
                
                // echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%'>Pendiente</a>";

                echo "<a type='button' title='Por evaluación' onclick='inspector({$gstIdper})' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";

                    }else if($data['gstEvalu'] == 'SI') {
                echo "<a type='button' title='Evaluado' onclick='resultado({$result})' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a>";

                    }?>"],


<?php } ?>
];

var tableGenerarReporte = $('#data-table-inspectores').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [[5,'asc']],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
    {title: "ID"},
    {title: "NOMBRE(S)"},
    {title: "APELLIDO(S)"},
    {title: "CATEGORÍA"},
    {title: "FECHA DE INGRESO"},
    {title: "DETALLES"},
    {title: "ACCIÓN"}
    ],
    });

</script>
