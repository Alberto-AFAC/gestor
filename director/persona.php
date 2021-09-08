<!DOCTYPE html><?php include ("../conexion/conexion.php");?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <title>Capacitación AFAC | Personal</title>

  <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <script src="../dist/js/sweetalert2.all.min.js"></script>
  <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
  
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

$sql = "SELECT gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
$ejecut = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc = mysqli_query($conexion,$sql);

if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){
unset($_SESSION['consulta']);

}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
include('header.php');
?>

<div class="content-wrapper" >

<section class="content" id="detalles" style="display: none;">
<div class="row">
<?php include('valores.php'); ?>
<!-- /.col -->
</div>
<!-- /.row -->
</section>  
<!-- Content Header (Page header) -->
<section class="content" id="lista">

<div class="row">
   <div class="col-xs-12">
     <div class="box">
       <div class="box-header">

       <H4>
                      <label style="font-size: 20px;">LISTA | PERSONAL</label></H4>
             <div class="pull-right">
               <div class="btn-group">
               <a type="button" href="persona.php" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
               </div>
             </div>
</div>
<div class="box-body">
  <div id="refresh">
<table style="width: 100%;" id="data-table-reportes" class="table display table-striped table-bordered"></table>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
  <div class="modal fade" id='modal-asignar'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size:19px; color: #000000;">ASIGANCIÓN DEL PUESTO</h4>
          </div>

          <div class="modal-body">
              <form id="Dtall" class="form-horizontal" action="" method="POST" >
                <input type="hidden" name="gstIdper" id="gstIdper">
                <input type="hidden" name="gstANmpld" id="gstANmpld">
                
                    <div class="form-group">
                      <div class="col-sm-4">
                        <label class="label2">NOMBRE(S)</label>
                        <input type="text"onkeyup="mayus(this);"class="form-control disabled inputalta" id="gstNombr" disabled="">
                      </div>
                      <div class="col-sm-4">
                        <label class="label2">APELLIDO(S)</label>
                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstApell" disabled="">
                      </div>
                      <div class="col-sm-4">
                        <label class="label2">CARGO</label>
                        <select type="text" class="form-control inputalta" id="AgstCargo" name="AgstCargo"  onchange="asiginspec()">
                          <option value="">SELECCIONA EL CARGO</option>
                          <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                          <option value="COORDINADOR">COORDINADOR</option>
                          <option value="INSPECTOR">INSPECTOR</option>
                          <option value="INSTRUCTOR">INSTRUCTOR</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa fa-dot-circle-o"></i><label> INFORMACIÓN DE ADSCRIPCIÓN </label>
                          </H4>
                        </div>
                      </div>
                    </div>
                   
                    <div class="form-group"  >
                      <div class="col-sm-12">
                            <label class="label2">DIRECCIÓN EJECUTIVA</label>

                    <select style="width: 100%"  class="selectpicker inputalta" name="gstAreIDasig" id="gstAreIDasig" type="text" data-live-search="true" disabled="">
                    <?php while($ejct = mysqli_fetch_row($ejecut)):?>                      
                    <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                    <?php endwhile; ?>
                    </select>
                     </div>  
          
                    </div>
                    <div class="form-group">
                          <div class="col-sm-12">
                            <label class="label2">DIRECCIÓN DE ADSCRIPCIÓN</label>

                    <select style="width: 100%" class="selectpicker inputalta" id="gstIDara" name="gstIDara" type="text" data-live-search="true" disabled="">
                    <?php while($ccion = mysqli_fetch_row($direc)):?>                      
                    <option value="<?php echo $ccion[0]?>"><?php echo $ccion[1]?></option>
                    <?php endwhile; ?>
                    </select>

                        </div>
                        </div>
                    <div class="form-group">
                          <div class="col-sm-12">
                            <label class="label2">SUB DIRECCIÓN</label>
                            <select type="text" class="form-control inputalta" id="gssubdireccion" name="gssubdireccion">
                                <option value="value1">SELECCIONA LA SUB DIRECCIÓN</option>
                                <option value="value2">SUBDIRECCIÓN DE SEGURIDAD AÉREA</option>
                                <option value="value3">SUBDIRECCIÓN DE NORMAS</option>
                            </select>
                          </div>
                        </div>
                    <div class="form-group">
                     <div class="col-sm-offset-0 col-sm-12">
                        <label class="label2">DEPARTAMENTO</label>
                        <select style="width: 100%" class="form-control" class="selectpicker inputalta" name="" id="" type="text" data-live-search="true">
                         <option value="">SELECCIONE EL DEPARTAMENTO</option> 
                         <option value="">DEPARTAMENTO DE INSPECCIÓN</option>
                       </select>
                    </div>                  
                </div>   
<!------------------------------------------------------ fucion del empleado-------------------------------------------------------------- -->
                  <div class="box" id="funcionemp" style="display: none" >
                        <div class="form-group">
                          <div class="col-sm-4" >
                            <div class="input-group">
                              <H4><i class="fa   fa-suitcase"></i>
                              <label> FUNCIÓN DEL EMPLEADO </label></H4>
                            </div>
                          </div>
                        </div>
                        <div class="form-group" style="display: none">
                          <div class="col-sm-12">
                            <label>ESPECIALIDAD PRINCIPAL B</label>
                            <div  id="subcategoria"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label class="label2">ESPECIALIDAD PRINCIPAL</label>
                          <div id="categoria"></div>
                        </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-4">
                            <label class="label2">SELECCIONE COMANDANCIA</label>
                         <div id="comandan"></div>                            
                        </div>
                          <div class="col-sm-8">
                            <label class="label2">SELECCIONE AEROPUERTOS</label>
                              <div id="select3"></div> 
                              </div>
                          </div>

                  </div>

                <div class="form-group">
                <div class="col-sm-offset-0 col-sm-12">
                <label class="label2">UBICACIÓN CENTRAL EN ASIGNACIÓN</label> 
                <select style="width: 100%" class="form-control" class="selectpicker" id="AgstNucrt" name="AgstNucrt"type="text" data-live-search="true">
                <option value="">SELECCIONE LA UBICACIÓN CENTRAL</option> 
                <option value="CIAAC">CIAAC</option> 
                <option value="LAS FLORES">LAS FLORES</option> 
                <option value="ANGAR 8">ANGAR 8</option> 
                <option value="LICENCIA">LICENCIAS</option>
                </select>
                </div>
                </div>
<!-- ----------------------------------------------------fin funcion del empleado-------------------- -->
                        <div class="form-group"><br>
                          <div class="col-sm-offset-0 col-sm-5">
                            <button type="button" id="button" style="font-size:18px; width:120px; height:40px" class="btn btn-block btn-primary altaboton"  onclick="asignar();">ACEPTAR</button>
                          </div>
                             <b><p class="alert alert-danger text-center padding error" id="danger2">Error al asignar</p></b>

                             <b><p class="alert alert-success text-center padding exito" id="succe2">¡Se asignó con éxito!</p></b>

                             <b><p class="alert alert-warning text-center padding aviso" id="empty2">Es necesario llenar todos los campos</p></b>
                          </div>
              </form>    
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('agrStdPro.php');?>



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

<strong>AFAC &copy; 2021 <a style="color:#3c8dbc" href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
</footer>

 <?php include('panel.html');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


</div>

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
<script src="../js/datos.json"></script>

</body>
</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
// $('#gsdirec').select2();
$('#gstPrfil').select2();
$('#gstAreID').select2(); 
$('#gstPstID').select2();
$('#gstIDpai').select2();
$('#AgstIDpai').select2();
$('#AgstIDCat').select2();
$('#AgstIDuni').select2();
$('#AgstIDSub').select2();
 $('#comandan').load('select/buscacom.php');
 $('#select3').load('select/tablacom.php');
 $('#categoria').load('select/buscatego.php');
 $('#subcategoria').load('select/tabsubcat.php');
}); 
</script>
<script src="../js/select2.js"></script> 



<script type="text/javascript">

var dataSet = [
<?php 
$Direje= $datos[1];
$query = "SELECT * FROM personal 
INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
WHERE 
gstCargo = 'INSTRUCTOR' 
AND gstAreID  = $Direje 
AND personal.estado = 0
OR 
gstCargo = 'COORDINADOR' 
AND gstAreID  = $Direje 
AND personal.estado = 0 
OR 
gstCargo = 'ADMINISTRATIVO' 
AND gstAreID  = $Direje 
AND personal.estado = 0 
OR 
gstCargo = 'INSPECTOR' 
AND gstAreID  = $Direje 
AND personal.estado = 0 
ORDER BY gstIdper DESC";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
      if($data['gstCargo']== '0'){
        $datosCargo = "SIN ASIGNAR";
      } else {
        $datosCargo = $data['gstCargo'];
      }
      $gstIdper = $data['gstIdper'];
      ?>




["<?php echo  $data['gstNmpld'];?>","<?php echo $data['gstNombr']?>","<?php echo $data['gstApell']?>","<?php echo $data['gstCatgr']?>","<?php echo $data['gstCargo']?>",

 "<?php echo "<a href='javascript:openDtlls()' title='Perfil' onclick='perfil({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a>"; ?>"
],


<?php } ?>
];

var tableGenerarReporte = $('#data-table-reportes').DataTable({
  "order": [[ 3, "desc" ]],
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
{title: "ID"},
{title: "NOMBRES(S)"},
{title: "APELLIDO(S)"},
{title: "CATEGORIA"},
{title: "CARGO"},
{title: "ACCIÓN"}
    ],
    });

</script>
