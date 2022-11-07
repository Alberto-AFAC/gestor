<!DOCTYPE html><?php include ("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City'); 
$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE estado = 0";
$instructor = mysqli_query($conexion,$sql);
?>
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
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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

        <?php include('header.php'); ?>
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
                                        <a type="button" href="instructor" class="btn btn-default btn-sm"><i
                                                class="fa fa-close"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>
                            <!-- AQUI VA EL SECTION DENTRO VA APARTADO PARA AGREGAR CARGO -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="personal-ext" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="label2">*NOMBRE(S)</label>
                                                    <select id="idperson" name="idperson" class="form-control"
                                                        data-placeholder="SELECCIONE A LA PERSONA">
                                                        <option value="">SELECCIONE A LA PERSONA</option>
                                                        <?php while($instructors = mysqli_fetch_row($instructor)):?>
                                                        <option value="<?php echo $instructors[0]?>">
                                                            <?php echo $instructors[1].' '.$instructors[2]?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="destino col-sm-4">
                                                    <label class="label2">*CARGO</label>
                                                    <select type="text" class="form-control inputalta" id="cargos"
                                                        name="cargos">
                                                        <option value="" selected>ELEGIR UNA OPCIÓN</option>
                                                        <option value="INSTRUCTOR">INSTRUCTOR</option>
                                                        <option value="COORDINADOR">COORDINADOR</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">.</label>
                                                    <button type="button" title="AGREGAR PERSONA EXTERNA"
                                                        class="btn btn-block btn-primary botonnet"
                                                        onclick="addAcceso()"><a style="color: #fff;"
                                                            data-toggle="tab">AGREGAR</a></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div style="padding-top: 10px;" class="container box box-solid">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="navtabs1"> <br>
                                            <table style="width: 100%;" id="data-table-instructores"
                                                class="table table-striped table-hover"></table>
                                        </div>
                                    </div>
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
            Todos los derechos Reservados DDE .
        </footer>

        <!-- Control Sidebar -->
        <?php include('panel.html');?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>


    </div>
    <!-- ./wrapper -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
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

    <!-- MODAL PARA ELIMINAR CARGO -->
    <div class="modal fade" id='modal-cursinstru'>
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size:19px; color: #000000;">QUITAR CARGO</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="Forstd">
                            <input type="hidden" class="form-control disabled inputalta" name="insperco" id="insperco"
                                value="">
                            <input type="hidden" name="cargoacceso" id="cargoacceso">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="" class="form-control disabled inputalta" name="gstnomebre"
                                        id="gstnomebre" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="" class="form-control disabled inputalta" name="cargoinsco"
                                        id="cargoinsco" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="button" title="AGREGAR PERSONA EXTERNA"
                                        class="btn btn-block btn-primary botonnet" onclick="deleteAcceso()"><a
                                            style="color: #fff;" data-toggle="tab">ACEPTAR</a></button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL PARA ACTUALIZAR CARGO -->
    <div class="modal fade" id='modal-accesoact'>
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size:19px; color: #000000;">ACTUALIZAR CARGO</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="Forstd">
                            <input type="hidden" class="form-control disabled inputalta" name="idpersona" id="idpersona"
                                value="">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label class="label2">NOMBRE(S)</label>
                                    <input type="" class="form-control disabled inputalta" name="gstnomebres"
                                        id="gstnomebres" disabled="">
                                </div>
                                <div class="destino col-sm-4">
                                    <label class="label2">*CARGO</label>
                                    <select type="text" class="form-control inputalta" id="caract" name="caract">
                                        <option value="" selected>ELEGIR UNA OPCIÓN</option>
                                        <option value="INSTRUCTOR">INSTRUCTOR</option>
                                        <option value="COORDINADOR">COORDINADOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="button" title="AGREGAR PERSONA EXTERNA"
                                        class="btn btn-block btn-primary botonnet" onclick="updateAcceso()"><a
                                            style="color: #fff;" data-toggle="tab">ACEPTAR</a></button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#id_area').select2();
    $('#idperson').select2();
});
</script>
<script src="../js/select2.js"></script>
<script type="text/javascript">
var dataSet = [
    <?php 
        $query = "SELECT
        * 
        FROM
        personal
        INNER JOIN instruacceso ON instruacceso.idper = personal.gstIdper
        WHERE
        instruacceso.estado = 0
        ORDER BY
        gstIdper DESC";
        $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){ 
            $acceso = $data['cargo'];
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
                if($res['spcialidds']==''){ $categoria = 'SIN CATEGORÍA'; }
            }else{
                $categoria = 'SIN CATEGORÍA';
            }
            if($data['gstNmpld'] == 0){
                $empleado = "S/N"; 
            }else{
                $empleado = $data['gstNmpld'];
            }
            if($data['estado'] == 0){
                $estado = "INTERNO"; 
            }else if($data['estado'] == 2){
                $estado = "EXTERNO";
            }
            $gstId5 = $data['gstIdper'];
            ?>["<?php echo  $empleado;?>", "<?php echo $data['gstNombr']?>", "<?php echo $data['gstApell']?>",
        "<?php echo $categoria ?>", "<?php echo $acceso ?>",

        "<?php echo "<a href='' title='Ver detalles' onclick='perinscoord({$gstIdper})' class='btn btn-default text-red' data-toggle='modal' data-target='#modal-cursinstru'><i class='fa fa-times-circle-o'></i></a> <a href='' title='Actualizar cargos' onclick='percargo({$gstIdper})' class='btn btn-default text-info' data-toggle='modal' data-target='#modal-accesoact'><i class='fa fa-exchange'></i></a>";?>"
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
    columns: [{
            title: "ID"
        },
        {
            title: "NOMBRES(S)"
        },
        {
            title: "APELLIDO(S)"
        },
        {
            title: "CATEGORIA",
            width: "450px"
        },
        {
            title: "CARGO"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

function perinscoord(gstIdper) {
    var idpersona1 = document.getElementById('insperco').value = gstIdper;
    $.ajax({
        url: '../php/accInstruc.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert(idpersona1)
        var n = 0;
        for (R = 0; R < res.length; R++) { //RASTREAR EL ID DE LA PERSONA
            if (obj.data[R].gstIdper == gstIdper) {
                $("#gstnomebre").val(obj.data[R].gstNombr + "  " + obj.data[R].gstApell);
                $("#cargoinsco").val(obj.data[R].gstCargo);
                $("#cargoacceso").val(obj.data[R].cargo);
            }
        }
    })
}

function addAcceso() {
    var idperson = document.getElementById('idperson').value
    cargos = document.getElementById('cargos').value;
    if (idperson == '' || cargos == '') {
        Swal.fire({
            type: 'warning',
            text: 'SELECCIONE CAMPOS OBLIGATORIOS* !',
            timer: 2500,
            showConfirmButton: false,
            customClass: 'swal-wide'
        });
    } else {
        $.ajax({
            url: '../php/insertInstr.php',
            type: 'POST',
            data: 'idperson=' + idperson + '&cargos=' + cargos + '&opcion=registro'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    text: 'SE ASIGNO CARGO CON ÉXITO',
                    showConfirmButton: false,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
                setTimeout("location.href = 'accesoInstr';", 2000);
            } else {
                Swal.fire({
                    type: 'warning',
                    text: 'PERSONA YA FUE ASIGNADA',
                    showConfirmButton: false,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
            }
        });
    }
}

function deleteAcceso() {
    var insperco = document.getElementById('insperco').value
    cargoacceso = document.getElementById('cargoacceso').value
    cargoinsco = document.getElementById('cargoinsco').value;
    $.ajax({
        url: '../php/insertInstr.php',
        type: 'POST',
        data: 'insperco=' + insperco + '&cargoacceso=' + cargoacceso + '&cargoinsco=' + cargoinsco +
            '&opcion=eliminar'
    }).done(function(respuesta) {
        if (respuesta == 0) {
            Swal.fire({
                type: 'success',
                text: 'SE ELIMINO CARGO CON ÉXITO',
                showConfirmButton: false,
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000
            });
            setTimeout("location.href = 'accesoInstr';", 2000);
        } else {}
    });
}

function updateAcceso() {
    var idpersona = document.getElementById('idpersona').value
    caract = document.getElementById('caract').value;
    if (idpersona == '' || caract == '') {
        Swal.fire({
            type: 'warning',
            text: 'SELECCIONE CARGO* !',
            timer: 2500,
            showConfirmButton: false,
            customClass: 'swal-wide'
        });
    } else {
        $.ajax({
            url: '../php/insertInstr.php',
            type: 'POST',
            data: 'idpersona=' + idpersona + '&caract=' + caract + '&opcion=actualiza'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    text: 'SE ACTUALIZO CARGO CON ÉXITO',
                    showConfirmButton: false,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
                setTimeout("location.href = 'accesoInstr';", 2000);
            } else {}
        });
    }
}

function percargo(gstIdper) {
    //FUNCION PARA SABER LOS CURSO PROGRAMADOS Y LOS IMPARTIDOS
    var idpersona1 = document.getElementById('idpersona').value = gstIdper;
    $.ajax({
        url: '../php/accInstruc.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert(idpersona1)
        var n = 0;
        for (R = 0; R < res.length; R++) { //RASTREAR EL ID DE LA PERSONA
            if (obj.data[R].gstIdper == gstIdper) {
                $("#gstnomebres").val(obj.data[R].gstNombr + "  " + obj.data[R].gstApell);
                $("#caract").val(obj.data[R].cargo);
                // alert(obj.data[R].gstLunac)
            }
        }
    })
}
</script>