<?php 
include ("../conexion/conexion.php");

session_start();

$sql = "SELECT id_ojt, tarea, subtarea FROM ojt WHERE estado = 0";
$tareas = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subtarea FROM ojt WHERE estado = 0";
$subtarea = mysqli_query($conexion,$sql);

$sql = "SELECT id_ojt, subsubtarea FROM ojt WHERE estado = 0";
$subsubtarea = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0 OR  gstCargo = 'COORDINADOR' AND estado = 0 ";
$instructor  = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'COORDINADOR' AND estado = 0 ";
$cordinador  = mysqli_query($conexion,$sql);

unset($_SESSION['consulta']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Alta Curso</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
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
  <link rel="stylesheet" href="../dist/css/alertas.css">

  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">


        <!-- Left side column. contains the logo and sidebar -->
        <?php include('header.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    PRONÓSTICO DE CURSOS
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post"><br><br>

<table style="width: 100%;" id="table-pronosticos" class="table display table-striped table-bordered table-hover table-responsive">
<!-- 
                                        <table id="table-pronosticos" class="display" style="width:100%"> -->
                                            <thead>
                                                <tr>
                                                    <th>IVA</th>
                                                    <th>INSPECTOR</th>
                                                    <th>CURSO</th>
                                                    <th>TIPO</th>
                                                    <th>INICIO</th>
                                                    <th>TERMINO</th>
                                                    <th>PRONÓSTICO</th>
                                                </tr>
                                                <tr>
                                                    <th class="filterhead">IVA</th>
                                                    <th class="filterhead">INSPECTOR</th>
                                                    <th class="filterhead">CURSO</th>
                                                    <th class="filterhead">TIPO</th>
                                                    <th class="filterhead">INICIO</th>
                                                    <th class="filterhead">TERMINO</th>
                                                    <th class="filterhead">PRONÓSTICO</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->

                                    <!-- /.post -->

                                    <!-- Post -->

                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane 2do panel-->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?php 
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
            <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
            Todos los derechos Reservados DDE
            .
        </footer>

        <?php include('panel.html');?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
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
        <script src="../js/gesInstr.js"></script>
        <script src="../js/global.js"></script>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $('#table-pronosticos').DataTable({
        columnDefs:[{
            width: 220, targets: 3,
            targets: "_all",
            sortable: false
        }],
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "ajax": '../php/data-pronostico.php',
        orderCellsTop: true,
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select><option value="">Seleccióne...</option></select>')
                    .appendTo($(column.header()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }

    });
});
</script>