<!DOCTYPE html><?php 
include ("../conexion/conexion.php");
session_start(); 
unset($_SESSION['consulta']);
?>
<html>

<head>
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Capacitación AFAC | Alta de persona</title>
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
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/alertas.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php
include('header.php');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    <i class="fa  ion-android-person"></i>
                    ALTA / PERSONAL EXTERNO
                </h1>
            </section>
            <?php
 
 $sql = "SELECT gstIdcat, gstCsigl,gstCatgr FROM categorias WHERE estado = 0";
 $categs = mysqli_query($conexion,$sql);

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
                                <li class="active "><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
                            </ul>
                            <!-- /.col -->
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <form id="personal-ext" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="label2">NOMBRE(S)</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta" id="nombreExt" name="nombreExt">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">APELLIDO(S)</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta " id="apellidoExt"
                                                        name="apellidoExt">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">CURP</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta " id="curpExt" name="curpExt">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="label2">RFC</label>
                                                    <input onkeyup="mayus(this);" type="text"
                                                        class="form-control inputalta" id="rfcExt" name="rfcExt">
                                                </div>


                                                <div class="col-sm-4">
                                                    <label class="label2">SEXO</label>
                                                    <select type="text" class="form-control inputalta" id="sexoExt"
                                                        name="sexoExt">
                                                        <option value="">ELEGIR SEXO</option>
                                                        <option value="MUJER">MUJER</option>
                                                        <option value="HOMBRE">HOMBRE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>ESPECIALIDAD</label>
                                                    <select 
                                                        data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO"
                                                        style="width: 100%;color: #000" class="form-control select2"
                                                        type="text" class="form-control" id="id_espc"
                                                        name="id_espc">
                                                        <option value="" selected>SELECCIONE ESPECIALIDAD</option><br>
                                                        <?php while($cat = mysqli_fetch_row($categs)):?>
                                                        <option value="<?php echo $cat[0]?>"><?php echo $cat[1]?> -
                                                            <?php echo $cat[2]?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <H4><i style=color:#333 class="fa   fa-dot-circle-o"></i>
                                                            <label style=color:#333> CONTACTO</label>
                                                        </H4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="label2">CASA</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" class="form-control inputalta" id="phoneHom"
                                                            name="phoneHom" placeholder="(55) 5555-5555"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">CELULAR</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" class="form-control inputalta" id="phone"
                                                            name="phone" placeholder="(52) 55-5555-5555"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-container">
                                                    <label class="label2">CORREO PERSONAL </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <i class="ion-ios-checkmark iconoInput" id="labelvalidcor"
                                                            style="display:none;"></i>
                                                        <i class="ion-ios-close iconoInput" id="labelinvarfcor"
                                                            style=" color: #F10C25; display:none;"></i>
                                                        <input type="text" class="form-control inputalta"
                                                            placeholder="correo@correo.com" id="emailPer"
                                                            name="emailPer">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 ">
                                                    <label class="label2">CORREO ALTERNATIVO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <input type="email" class="form-control inputalta"
                                                            placeholder="correo@sct.gob.mx" id="emailAlt"
                                                            name="emailAlt">
                                                    </div>
                                                </div>

                                                <br> <br> <br> <br>
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-offset-0 col-sm-2">
                                                            <button type="button" title="AGREGAR PERSONA EXTERNA"
                                                                class="btn btn-block btn-primary botonnet"
                                                                onclick="addPerson()"><a style="color: #fff;"
                                                                    data-toggle="tab">ACEPTAR</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                        <br>
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

                                <strong>AFAC &copy; 2021 <a style="color:#3c8dbc" href="https://www.gob.mx/afac">Agencia
                                        Federal de Aviación
                                        Cilvil</a>.</strong> Todos los derechos Reservados DDE
                                .
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
                        <script src="../js/select2.js"></script>
                        <!-- InputMask -->


                        <script src="../../js/valida.js"></script>
                        <script>
$(document).ready(function() {
    $('#id_espc').select2();

});
                   


                        function addPerson() {

                            var nombreExt = $("#nombreExt").val();
                            var apellidoExt = $("#apellidoExt").val();
                            var curpExt = $("#curpExt").val();
                            var rfcExt = $("#rfcExt").val();
                            var sexoExt = $("#sexoExt").val();
                            var id_espc = $("#id_espc").val();
                            var phoneHom = $("#phoneHom").val();
                            var phone = $("#phone").val();
                            var emailPer = $("#emailPer").val();
                            var emailAlt = $("#emailAlt").val();
                            alert(id_espc);
                            swal.showLoading();
                            if (nombreExt == '' || apellidoExt == '' || curpExt == '' || rfcExt == '' || sexoExt == '' || id_espc == '' || phoneHom == '' || phone == '' || emailPer == '' || emailAlt == '') {
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
                                    url: "../php/insPerExt.php",
                                    data: {
                                        nombreExt: nombreExt,
                                        apellidoExt: apellidoExt,
                                        curpExt: curpExt,
                                        rfcExt: rfcExt,
                                        sexoExt: sexoExt,
                                        id_espc: id_espc,
                                        phoneHom: phoneHom,
                                        phone: phone,
                                        emailPer: emailPer,
                                        emailAlt: emailAlt


                                    },
                                    success: function(data) {
                                        document.getElementById("personal-ext").reset();
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
                        }
                        </script>

</body>

</html>