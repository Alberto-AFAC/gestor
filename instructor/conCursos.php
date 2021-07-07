<!DOCTYPE html><?php include ("../conexion/conexion.php");

      $sql = "SELECT gstIdcat, gstCsigl FROM categorias WHERE estado = 0";
      $categs = mysqli_query($conexion,$sql);

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestor inspectores |Alta Curso</title>

  <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
<link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
<?php include('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <section class="content-header">
      <h1>
      CONSULTA DE CURSOS
      </h1>
    </section>
    <!-- Main content -->
<section class="content">
<div class="row">
<!-- /.col -->
<div class="col-md-12">
        <div class="box">
            <div class="box-header">
            

            <div class="pull-right">
                  <div class="btn-group">
                    <a type="button" href="conCursos.php" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                  </div>
                  <!-- /.btn-group -->
            </div>

            </div>
            <!-- /INDICADORES -->



            <!-- /FIN DE INDICADORES -->
            <div class="box-body">
             <?php //include('../html/conCurso.html');?> 
  <table style="width: 100%;" id="data-table-concurso" class="table display table-striped table-bordered"></table>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
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
                <h4 class="modal-title">ELIMINAR CURSO DE CATALOGO </h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="EgstIdlsc" id="EgstIdlsc">
               <div class="form-group">
                <div class="col-sm-12">
                  <p> ¿ESTÁS SEGURO DE ELIMINAR ESTE CURSO? <input type="text" name="EgstTitlo" id="EgstTitlo" class="form-control disabled" disabled="" style="background: white;border: 1px solid white;"></p>
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
      </form>






   <form class="form-horizontal" action="" method="POST"  >
      <div class="modal fade" id="modal-evaluar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EVALUACIÓN</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="evgstIdlsc" id="evgstIdlsc">
               <div class="form-group">
                <div class="col-sm-12">
                  <p> CONFIRME ACEPTAR, PARA EVALUAR <input type="text" name="evgstTitlo" id="evgstTitlo" class="form-control disabled" disabled="" style="background: white;border: 1px solid white;"></p>
                </div>
                  <br>
                  <div class="col-sm-5">
                  <button type="button" class="btn btn-primary">ACEPTAR</button>
                  </div>

                    <b><p class="alert alert-warning text-center padding error" id="danger">Error al eliminar curso</p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se elimino curso con éxito !</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Elija curso para eliminar </p></b>
                    </div>
                  </div>
                </div>    
              </div>
            </div>
      </form>



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

                <link rel="stylesheet" type="text/css" href="advanced.php">

                <p>PERFIL A QUIEN VA DIRIGIDO - SELECCIONE</p>
                <div class="col-md-2">
                <p id="gstPrfil"></p>   
                </div>

                <link rel="stylesheet" type="text/css" href="advanced.php">
                <div class="col-md-2">
                <select multiple="multiple" data-placeholder="SELECCIONE"
                style="width: 100%;color: #000" class="form-control select2" type="text" class="form-control" id="AgstPrfil" name="AgstPrfil[]">

                <?php while($cat = mysqli_fetch_row($categs)):?>                      
                <option value="<?php echo $cat[1]?>"><?php echo $cat[1]?></option>
                <?php endwhile; ?>                
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
                     <div class="col-sm-4">
                      <label>PROVEEDOR DEL CURSO</label>
                      <select type="text" class="form-control" id="AgstProvd" name="AgstProvd">
                        <option value="INTERNO">INTERNO</option>
                        <option value="EXTERNO">EXTERNO</option>
                      </select>
                      </div>

                  <div class="col-sm-4">
                    <label>CENTRO DE INSTRUCCIÓN</label>                   
                      <select type="text" class="form-control" id="AgstCntro" name="AgstCntro">
                        <option value="EN EL EXTRANJERO">EN EL EXTRANJERO</option>
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
             <b><p class="alert alert-danger text-center padding error" id="afalla">Error al actualizar curso o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="aexito">¡Se actualizo curso y archivo con éxito!</p></b>

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
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->
</body>
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
<script src="../js/gesInstr.js"></script>

<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
$('#AgstPrfil').select2();

}); 
</script>
<script src="../js/select2.js"></script> 
</html>
<script type="text/javascript">

var dataSet = [
<?php 
$query = "SELECT * FROM listacursos 
          WHERE estado = 0
          ORDER BY gstIdlsc DESC";
$resultado = mysqli_query($conexion, $query);
  $n=0;
      while($data = mysqli_fetch_array($resultado)){ 
$n++;

$gstIdlsc = $data['gstIdlsc'];
//print_r($data['gstTitlo']);
//,"<?php //echo  $data['gstTitlo']
      ?>

["<?php echo  $n?>",'<?php echo  $data['gstTitlo']?>',"<?php echo $data['gstTipo']?>","<?php echo $data['gstPrfil']?>","<?php echo $data['gstDrcin']?>","<?php echo $data['gstCntnc']?>","<?php echo $data['gstVignc']?>","<?php echo "<a href='{$data['gstTmrio']}' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; font-size:22px;  cursor: pointer;' ></span></a> " ?>","<?php echo "<a href='#' onclick='dato({$gstIdlsc})' type='button' class='btn btn-default' data-toggle='modal' data-target='#modalVal'><i class='fa ion-compose text-info'></i></a><a href='#' onclick='eliminar({$gstIdlsc})' type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a>"?>"],


<?php } ?>
];

var tableGenerarReporte = $('#data-table-concurso').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
    {title: "ID"},
    {title: "TÍTULO"},
    {title: "TIPO"},
    {title: "PERFIL"},
    {title: "DURACIÓN"},
    {title: "DOCUMENTO"},
    {title: "VIGENCIA"},
    {title: "TEMARIO"},
    {title: "ACCIÓN"}

    ],
    });
</script>