<!DOCTYPE html><?php include ("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City');?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Instructores y Coordinadores</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <style>
    .swal-wide {
        width: 500px !important;
        font-size: 16px !important;
    }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php
include('header.php');
?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content" id="detalles" style="display: none;">
                <div class="row">
                    <?php include('valores.php'); ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <section class="content" id="lista">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">INSTRUCTORES Y COORDINADORES</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="instructor.php" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>

                            <!-- AQUI VA EL SECTION -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="padding-top: 10px;" class="container box box-solid">
                                            <ul class="nav nav-tabs" id="myNavTabs">
                                                <li class="active"><a href="#navtabs1" data-toggle="tab">PERSONAL
                                                        AFAC</a>
                                                <li><a href="#navtabs2" data-toggle="tab">INSTRUCTORES EXTERNOS</a>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="navtabs1"> <br>
                                                    <table style="width: 100%;" id="data-table-instructores"
                                                        class="table table-striped table-hover"></table>
                                                </div>
                                                <div class="tab-pane fade" id="navtabs2"><br><br>
                                                    <form id="inspectores-ext" method="POST">
                                                        <input type="date" name="alta" id="alta"
                                                            value="<?php echo date('Y-m-d'); ?>" hidden>
                                                        <div class="form-group">

                                                            <div class="col-sm-4">
                                                                <label>NOMBRE(S)</label>
                                                                <input type="text" onkeyup="mayus(this);"
                                                                    class="form-control" id="nombre" name="nombre">
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <label>APELLIDO(S)</label>
                                                                <input type="text" onkeyup="mayus(this);"
                                                                    class="form-control" id="apellido" name="apellido">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>CARGO</label>
                                                                <input type="text" onkeyup="mayus(this);"
                                                                    class="form-control" id="cargo" name="cargo" value="INSTRUCTOR" disabled>
                                                                    <input type="hidden" onkeyup="mayus(this);"
                                                                    class="form-control" id="detalle" name="detalle" value="EXTERNO">
                                                                <br><button class="btn btn-primary"
                                                                    id="btnguardar">GUARDAR</button>
                                                            </div>

                                                        </div>



                                                    </form>

                                                    <table style="width: 100%;" id="data-table-instructoresExt"
                                                        class="table table-striped table-hover"></table>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.box -->
                                    </div>
                            </section>
                            <!-- AQUI TERMINA EL SECTION -->


                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
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

        <!-- Control Sidebar -->
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
$(document).ready(function() {
    $('#id_area').select2();
});
</script>
<script src="../js/select2.js"></script>
<script type="text/javascript">
var dataSet = [
    <?php 
$query = "SELECT * FROM personal 
INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
WHERE personal.estado = 0 AND gstCargo = 'INSTRUCTOR' OR personal.estado = 0 AND gstCargo = 'COORDINADOR'  ORDER BY gstIdper DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

    // if($data['gstCatgr'] == "CURSO"){
    //     $categoriaInsp = "SIN ASIGNAR";
    
    //   } else{
    //     $categoriaInsp = $data['gstCatgr'];
    //   }


        $gstIdper = $data['gstIdper'];

        $queri = "SELECT *,GROUP_CONCAT(gstCatgr) AS spcialidds 
        FROM especialidadcat 
        INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
        WHERE categorias.gstIdcat != 24 
        AND categorias.gstIdcat != 25 
        AND categorias.gstIdcat != 26 
        AND categorias.gstIdcat != 29 
        AND categorias.gstIdcat != 31
        AND especialidadcat.gstIDper = $gstIdper";
        $resul = mysqli_query($conexion, $queri); 

        if($res = mysqli_fetch_array($resul)){
        $categoria = $res['spcialidds'];

        if($res['spcialidds']==''){ $categoria = 'POR ASIGNAR'; }

        }else{
        $categoria = 'POR ASIGNAR';
        }

// $gstIdper = $data['gstIdper'];
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo  $data['gstNmpld'];?>", "<?php echo $data['gstNombr']?>", "<?php echo $data['gstApell']?>",
        "<?php echo $categoria ?>", "<?php echo $data['gstCargo']?>",

        "<?php echo "<a href='javascript:openDtlls()' title='Perfil' onclick='perfil({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a>"; ?>"
    ],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-instructores').DataTable({
    responsive: true,


    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [

        {
            title: "ID"
        },
        {
            title: "NOMBRES(S)"
        },
        {
            title: "APELLIDO(S)"
        },
        {
            title: "CATEGORIA"
        },
        {
            title: "CARGO"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

// TABLA INSPECTORES EXTERNOS//
var dataSet = [
    <?php 
$query = "SELECT *, DATE_FORMAT(alta,'%d/%m/%Y')as alta FROM insexternos 
WHERE estado = 0";
$resultado = mysqli_query($conexion, $query);
$x = 0;

while($data = mysqli_fetch_array($resultado)){ 
$x++;
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $x ?>", "<?php echo  $data['nombre'];?>", "<?php echo $data['apellido']?>","<?php echo $data['alta']?>","<?php echo $data['cargo']?>",""

    ],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-instructoresExt').DataTable({
    responsive: true,


    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [

        {
            title: "ID"
        },
        {
            title: "NOMBRES(S)"
        },
        {
            title: "APELLIDO(S)"
        },
        {
            title: "FECHA ALTA"
        },
        {
            title: "CARGO"
        },
        // {
        //     title: "ACCIÓN"
        // }
    ],
});


$(document).ready(function() {
    $('#btnguardar').click(function() {
        var alta = $("#alta").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var cargo = $("#cargo").val();
        var detalle = $("#detalle").val();
        // alert(detalle)
        swal.showLoading();
        if (nombre == '' || apellido == '' || cargo == '') {
            Swal.fire({
                type: 'warning',
                text: 'Llene campos vacios!',
                timer: 2500,
                showConfirmButton: false,
                customClass: 'swal-wide'
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../php/insExt.php",
                data: {
                    alta: alta,
                    nombre: nombre,
                    apellido: apellido,
                    cargo: cargo,
                    detalle: detalle

                },
                success: function(data) {
                    document.getElementById("inspectores-ext").reset();
                    Swal.fire({
                        type: 'success',
                        text: 'SE HA REGISTRADO EXITOSAMENTE',
                        showConfirmButton: false,
                        timer: 2900,
                        showConfirmButton: false,
                        customClass: 'swal-wide'
                    });
                }
            });
        }

        return false;
    });
});
</script>