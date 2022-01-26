<!DOCTYPE html><?php include ("../conexion/conexion.php");?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <title>Capacitación AFAC | Lista Personal externo</title>
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

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc1 = mysqli_query($conexion,$sql);

if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){
unset($_SESSION['consulta']);
}
?>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

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
                      <label style="font-size: 20px;">LISTA | PERSONAL EXTERNO</label></H4>
             <div class="pull-right">
               <div class="btn-group">
               <a type="button" href="persona" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
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



<?php //include('agrStdPro.php');?>

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

<strong>AFAC &copy; 2021 <a style="color:#3c8dbc" href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados DDE
.
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
<?php include('modalex.php');?>

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
 $('#subdire').load('select/buscardepart.php'); //Subdirección
 $('#depart1').load('select/tabladep.php'); //departamento
}); 
</script>
<script src="../js/select2.js"></script> 



<script type="text/javascript">

var dataSet = [
<?php 
$query = "SELECT * FROM personal WHERE estado = 3 ORDER BY gstIdper DESC";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
        if($data['gstCargo']== '0'){
          $datosCargo = "SIN ASIGNAR";
        } else {
          $datosCargo = $data['gstCargo'];
        }
        if($data['estado'] == 0){
          $estado = "INTERNO"; 
      }else if($data['estado'] == 3){
          $estado = "EXTERNO";
      }
      if($data['gstNmpld'] == 0){
        $empleado = "S/N"; 
    }else{
        $empleado = $data['gstNmpld'];
    }
      $gstIdper = $data['gstIdper'];
      $gstNmpld = $data['gstNmpld'];
      ?>

//console.log('<?php echo $gstIdper ?>');

["<?php echo  $data['gstNmpld']?>","<?php echo  $data['gstNombr']?>","<?php echo $data['gstApell']?>","<?php echo $datosCargo ?>","<?php echo $estado ?>",
<?php if($data['gstCargo']=='NUEVO INGRESO'){?>
  "<center><a href='javascript:openDtlls()' title='Perfil' onclick='perfil(<?php echo $gstIdper ?>)' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a><div style='padding-top: 5px;'><span class='label label-warning' style='font-weight: bold; height: 50px; font-size: 13px;'> POR ASIGNAR</span></div></center>"
<?php }else{?>
//"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"
"<a href='' title='Ver perfil' onclick='perperexter(<?php echo $gstIdper ?>)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-perexterno'><i class='glyphicon glyphicon-user text-success'></i></a>  <a href='' title='Ver detalle de cursos' onclick='perexterna(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-curexten'><i class='fa fa ion-easel text-info'></i></a>  <a type='button' title='Eliminar' onclick='deletexter(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-bajaex'><i class='fa fa-user-times text-red'></i></a>"

<?php } ?>

],

// <a href="#" onclick="borrararc(&quot;130*1345*ESCULA PRUEBA*MEX*BNOSE*../documento/123456/Estudio/PRUEBA5.pdf*130&quot;);" type="button" style="margin-left:2px" title="Borrar documento" class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminardoc"><i class="fa fa-trash-o text-danger"></i></a>

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
    {title: "NOMBRE(S)"},
    {title: "APELLIDO(S)"},
    {title: "CARGO"},
    {title: "PERSONAL"},
    {title: "ACCIÓN"}
    ],
    });

    function perexterna(gstIdper) {

var idpersona1 = document.getElementById('insperext').value =gstIdper;
    $.ajax({
        url: '../php/infopersext.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert(idpersona1)
        var n = 0;
        for (R = 0; R < res.length; R++){
            if (obj.data[R].gstIdper == gstIdper){
            $("#inexnomebre").val(obj.data[R].gstNombr + "  " + obj.data[R].gstApell);
            }
        }
    });
//TABLA DE CURSOS COMO INSTRUCTOR

$.ajax({
    url: '../php/curosperext.php',  
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var x = 0;
    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cursextper" class="table table-bordered table-striped" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CODIGO</th><th><i></i>CURSO</th><th><i></i>INICIO</th><th><i></i>FIN</th><th><i></i>ESTATUS</th></tr></thead><tbody>';
    for (V = 0; V < res.length; V++) {   
        if (obj.data[V].idinsp == idpersona1) {   
            x++;
            html += "<tr><td>" + x + "</td><td>" + obj.data[V].codigo + "</td><td>" + obj.data[V].gstTitlo + "</td><td>" + obj.data[V].fcurso + "</td><td>" + obj.data[V].fechaf + "</td><td>" + obj.data[V].proceso + "</td></td></tr>";
        } else {}
    }
    html += '</tbody></table></div></div></div>';
    $("#cursextern").html(html);
    $('#cursextper').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior",
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"         
        },
    },
});            
})
}


</script>
