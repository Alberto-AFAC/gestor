<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Asignación de Accesos</title>
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
                                <h3 class="box-title">ASIGNACIÓN DE ACCESOS</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="accesos" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>


                            <div class="box-body">
                                <table style="width: 100%;" id="data-table-instructores"
                                    class="table table-striped table-hover"></table>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>

        <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">

            <div class="modal fade" id="editarAccesos" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-size: 20px;" class="modal-title" id="editarAccesosLabel">ACTUALIZAR
                                CREDENCIALES DE ACCESO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idAccesos" name="idAccesos">
                                <input type="hidden" id="opcion" name="opcion" value="modificar">
                                <div class="col-sm-6">
                                    <label>NOMBRE COMPLETO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nombUser"
                                        name="nombUser" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>NUMERO DE EMPLEADO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nEmpleado"
                                        name="nEmpleado" disabled="">
                                </div>
                                <div class="col-sm-6"><br>
                                    <label>PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            autocomplete="new-password" minlength="6">
                                        <div class="input-group-addon input-group-append toggle-password">
                                            <i class="fa fa-eye toggle-password">
                                            </i>
                                        </div>
                                    </div>
                                </div>
<div class="col-sm-6"><br>
<label>SELECCIONE PRIVILEGIOS</label>
<select style="width: 100%" class="form-control" class="selectpicker"
name="privilegios" id="privilegios" type="text" data-live-search="true">
<option value="0" selected>SELECCIONE...</option>
<option value="ADMINISTRADOR">ADMINISTRADOR</option>
<option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
<option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
<option value="EJECUTIVO">EJECUTIVO</option>
<option value="DIRECTOR">DIRECTOR</option>
<option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
<option value="INSPECTOR">INSPECTOR</option>
</select>
</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" onclick="modificar();" class="btn btn-primary">ACEPTAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




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
            Todos los derechos Reservados AJ.
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
$query = "SELECT * FROM accesos
INNER JOIN personal ON id_usu = gstIdper";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id = $data['id_usu'];
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $data[1]?>", "<?php echo $data[8]." ".$data[9]?>", "<?php echo $data[29]?>",
        "<?php echo $data[2]?>", "<?php echo base64_encode($data[3])?>",
        "<?php echo $data[4]?>",
        "<?php echo "<a title='Editar técnico' onclick='datos_editar({$id})' type='button' data-toggle='modal' data-target='#editarAccesos' class='editar btn btn-default'><i class='fa fa-lock text-success'></i></a>"?>"
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
            title: "NOMBRE"
        },
        {
            title: "# EMPLEADO"
        },
        {
            title: "USUARIO"
        },
        {
            title: "PASSWORD"
        },
        {
            title: "PRIVILEGIOS"
        },
        {
            title: "ACCIÓN"
        }
    ],
});


// FUNCTION PARA EDITAR
function datos_editar(id) {

    $("#Editar").slideDown("slow");
    $("#cuadro1").hide("slow");
    $.ajax({
        url: '../php/accesos-list.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_accesos == id) {
                var
                    id_accesos = $("#editarAccesos #idAccesos").val(obj.data[i].id_accesos),
                    id_usu = $("#editarAccesos #idUser").val(obj.data[i].id_usu),
                    privilg = $("#editarAccesos #nombUser").val(obj.data[i].gstNombr + ' ' + obj.data[i]
                        .gstApell),
                    mEmpleado = $("#editarAccesos #nEmpleado").val(obj.data[i].gstNmpld),
                    password = $("#editarAccesos #password").val(obj.data[i].password),
                    password = $("#editarAccesos #privilegios").val(obj.data[i].privilegios),
                    opcion = $("#editarAccesos #opcion").val("modificar");
            }
        }
    })
}

function modificar() {
    var frm = $("#Editar").serialize();
    $.ajax({
        url: "../php/accesos-update.php",
        type: 'POST',
        data: frm + "&opcion=modificar"
    }).done(function(respuesta) {
        if (respuesta == 0) {
            Swal.fire({
                type: 'success',
                title: 'ÉXITO',
                text: 'Credenciales actualizadas correctamente',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
                    rgba(100, 100, 100, 0.4)
                `
            });
            setTimeout("location.href = 'accesos';", 2000);
        }
     
    });
}



// SHOW PASSWORD
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
</script>