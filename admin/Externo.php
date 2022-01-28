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
    <link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
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
                    PERSONAL EXTERNO
                </h1>
            </section>
            <?php
 
 $sql = "SELECT gstIdcat, gstCsigl,gstCatgr FROM categorias WHERE estado = 0 OR estado = 2";
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
                            <ul class="nav nav-tabs" id="myNavTabs">
                                <!-- <li class="active"><a href="#tablaExterno" data-toggle="tab">LISTA PERSONAL</a> -->
                                <!-- <li><a href="#altaExterno" data-toggle="tab">ALTA</a> -->
                            </ul>
                            <!-- /.col --><br><br>
                            <div class="tab-content">
                                <div class="tab-pane" id="tablaExterno"> <br>
                                    <table style="width: 100%;" id="data-table-instructoresExt"
                                        class="table table-striped table-hover"></table>
                                </div>

                                <div class="tab-pane fade in active" id="altaExterno">
                                    <!-- Post -->
                                    <div class="post">
                                        <form id="personal-ext" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="label2">*NOMBRE(S)</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta" id="gstNombr" name="gstNombr">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">*APELLIDO(S)</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta " id="gstApell" name="gstApell">
                                                </div>
                                                <div class="destino col-sm-4">
                                                    <label class="label2">*TIPO DE PERSONA</label>
                                                    <select type="text" class="form-control inputalta" id="gstLunac"
                                                        name="gstLunac">
                                                        <option value="0" selected>ELEGIR UNA OPCIÓN</option>
                                                        <option value="NACIONAL">NACIONAL</option>
                                                        <option value="INTERNACIONAL">INTERNACIONAL</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="curp col-sm-4">
                                                    <label class="label2">CURP</label>
                                                    <input type="text" onkeyup="mayus(this);"
                                                        class="form-control inputalta " id="gstCurp" name="gstCurp">
                                                </div>
                                            
                                                <div class="rfc col-sm-4">
                                                    <label class="label2">RFC</label>
                                                    <input onkeyup="mayus(this);" type="text"
                                                        class="form-control inputalta" id="gstRfc" name="gstRfc">
                                                </div>


                                                <div class="rfc col-sm-4">
                                                    <label class="label2">ESTADO</label>
                                                    <select type="text" class="form-control inputalta" id="gstStado" name="gstStado">
                                                         <option value="">SELECCIONA EL ESTADO</option>
                                                         <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                                                         <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                                                         <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                                                         <option value="CAMPECHE">CAMPECHE</option>
                                                         <option value="COAHUILA">COAHUILA</option>
                                                         <option value="COLIMA">COLIMA</option>
                                                         <option value="CHIAPAS">CHIAPAS</option>
                                                         <option value="CHIHUAHUA">CHIHUAHUA</option>
                                                         <option value="DISTRITO FEDERAL">CUIDAD DE MÉXICO</option>
                                                         <option value="DURANGO">DURANGO</option>
                                                         <option value="GUANAJUATO">GUANAJUATO</option>
                                                         <option value="GUERRERO">GUERRERO</option>
                                                         <option value="HIDALGO">HIDALGO</option>
                                                         <option value="JALISCO">JALISCO</option>
                                                         <option value="MÉXICO">MÉXICO</option>
                                                         <option value="MICHOACÁN">MICHOACÁN</option>
                                                         <option value="MORELOS">MORELOS</option>
                                                         <option value="NAYARIT">NAYARIT</option>
                                                         <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                                                         <option value="OAXACA">OAXACA</option>
                                                         <option value="PUEBLA">PUEBLA</option>
                                                         <option value="QUERÉTARO">QUERÉTARO</option>
                                                         <option value="QUINTANA ROO">QUINTANA ROO</option>
                                                         <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                                                         <option value="SINALOA">SINALOA</option>
                                                         <option value="SONORA">SONORA</option>
                                                         <option value="TABASCO">TABASCO</option>
                                                         <option value="TAMAULIPAS">TAMAULIPAS</option>
                                                         <option value="TLAXCALA">TLAXCALA</option>
                                                         <option value="VERACRUZ">VERACRUZ</option>
                                                         <option value="YUCATÁN">YUCATÁN</option>
                                                         <option value="ZACATECAS">ZACATECAS</option>
                                                         <option value="EN OTRO PAÍS">EN OTRO PAÍS</option>
                                                         <option value="NO ESPECIFICADO">NO ESPECIFICADO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label class="label2">*SEXO</label>
                                                    <select type="text" class="form-control inputalta" id="gstSexo"
                                                        name="gstSexo">
                                                        <option value="">ELEGIR SEXO</option>
                                                        <option value="MUJER">MUJER</option>
                                                        <option value="HOMBRE">HOMBRE</option>
                                                    </select>
                                                </div>                                               
                                                <div class="col-sm-4">
                                                    <label class="label2">ORGANIZACIÓN (INSTITUCIÓN)</label>
                                                    <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="sgtCrhnt1" name="sgtCrhnt1">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">ÁERA DE ADSCRIPCIÓN</label>
                                                    <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstRusp1" name="gstRusp1">
                                                </div>  
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>*ESPECIALIDAD</label>
                                                    <select data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO"
                                                        style="width: 100%;color: #000" class="form-control select2"
                                                        type="text" class="form-control" id="gstIDCat" name="gstIDCat">
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
                                                        <H4><i style=color:#333 class="fa fa-dot-circle-o"></i>
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
                                                        <input type="text" class="form-control inputalta" id="gstCasa"
                                                            name="gstCasa" placeholder="(55) 5555-5555"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">CELULAR</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" class="form-control inputalta" id="gstClulr"
                                                            name="gstClulr" placeholder="(52) 55-5555-5555"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-container">
                                                    <label class="label2">*CORREO PERSONAL </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <i class="ion-ios-checkmark iconoInput" id="labelvalidcor"
                                                            style="display:none;"></i>
                                                        <i class="ion-ios-close iconoInput" id="labelinvarfcor"
                                                            style=" color: #F10C25; display:none;"></i>
                                                        <input onkeyup="mayus(this);" type="text"
                                                            class="form-control inputalta"
                                                            placeholder="correo@correo.com" id="gstCorro"
                                                            name="gstCorro">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 ">
                                                    <label class="label2">CORREO ALTERNATIVO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <input onkeyup="mayus(this);" type="email"
                                                            class="form-control inputalta"
                                                            placeholder="correo@correo.com" id="gstSpcID"
                                                            name="gstSpcID">
                                                    </div>
                                                </div>
                                            
                                                <br> <br> <br> <br>
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-offset-0 col-sm-2">
                                                            <button type="button" title="AGREGAR PERSONA EXTERNA" class="btn btn-block btn-primary botonnet" onclick="addPerson()"><a style="color: #fff;" data-toggle="tab">ACEPTAR</a></button>
                                                        </div>
                                                    </div>
                                                    <b><p class="alert alert-danger text-center padding error" id="exerr">Error al agregar datos contactar al soporte tecnico</p></b>
                                                    <b><p class="alert alert-info text-center padding error" id="exduplica">Los datos ya están agregados </p></b>
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
                            $('#gstIDCat').select2();

                        });

var accesopers = document.getElementById('idact').value; // SE RASTREA EL NUMERO DE EMPLEADO
    //alert(idpersona1);
    $.ajax({
            url: '../php/accesos-list.php',
            type: 'POST'
        }).done(function(resp) {    
            obj = JSON.parse(resp);
            var res = obj.data;

            //AQUI03
            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th><th><i></i>FECHA</th></tr></thead><tbody>';
            var n = 0;
            for (H = 0; H < res.length; H++) { //RASTREAR EL ID DE LA PERSONA
                //alert(obj.data[H].id_usu);
                if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '0' ) {
                    $('#modal-obligatorio').modal('show'); 
                    $("#usuarioobl").val(obj.data[H].gstNombr +" "+obj.data[H].gstApell  );
                }else if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '1' ) {
                    $('#modal-obligatorio').modal('hide');  
                }

        }
    })

                        function addPerson() {
                            var gstNombr = $("#gstNombr").val(); //NOMBRE
                            var gstApell = $("#gstApell").val(); //APELLIDO
                            var gstLunac = $("#gstLunac").val(); //TIPO DE PERSONA
                            var gstCurp = $("#gstCurp").val(); //CURP
                            var gstRfc = $("#gstRfc").val(); //RFC
                            var gstSexo = $("#gstSexo").val(); //SEXO
                            var gstIDCat = $("#gstIDCat").val(); //ESPECIALIDAD
                            var gstCasa = $("#gstCasa").val(); //TEL CASA
                            var gstClulr = $("#gstClulr").val(); //TEL CELULAR
                            var gstCorro = $("#gstCorro").val(); //CORREO PERSONAL
                            var gstSpcID = $("#gstSpcID").val(); //CORREO ALTERNATIVO
                            var gstStado = $("#gstStado").val(); //ESTADO
                            var sgtCrhnt = $("#sgtCrhnt1").val(); //ORGANIZACIÓN
                            var gstRusp = $("#gstRusp1").val(); //ÁREA DE ADSCRIPCIÓN
                           // swal.showLoading();
                            var datos= 'gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstSexo=' + gstSexo + '&gstIDCat=' + gstIDCat + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstCorro=' + gstCorro + '&gstSpcID=' + gstSpcID + '&gstStado=' + gstStado + '&sgtCrhnt=' + sgtCrhnt + '&gstRusp=' + gstRusp + '&opcion=registrar';
                            //alert(datos);

                            if (gstNombr == '' || gstApell == '' || gstSexo == '' || gstIDCat == '' || gstCorro == ''| gstLunac == '0') {
                                Swal.fire({
                                    type: 'warning',
                                    text: 'Llene campos obligatorios* !',
                                    timer: 2500,
                                    showConfirmButton: false,
                                    customClass: 'swal-wide'
                                });
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "../php/insertarPersonal.php",
                                    data:datos
                                }).done(function(respuesta) {
                                    if (respuesta==0){
                                            // document.getElementById("personal-ext").reset();
                                        setTimeout("location.href = 'Externo';", 2000);
                                        Swal.fire({
                                            type: 'success',
                                            text: 'SE HA REGISTRADO EXITOSAMENTE',
                                            showConfirmButton: false,
                                            timer: 2900,
                                            showConfirmButton: false,
                                            customClass: 'swal-wide'
                                        });
                                    }else if (respuesta == 2){
                                        $('#exduplica').toggle('toggle');
                                        setTimeout(function() {
                                           $('#exduplica').toggle('toggle');
                                        }, 2000);
                                    }else{
                                        $('#exerr').toggle('toggle');
                                        setTimeout(function() {
                                           $('#exerr').toggle('toggle');
                                        }, 2000);
                                    }
                                });
                            }
                        }

                        // TABLE INSTRUCTORS OUT
                        // TABLA INSPECTORES EXTERNOS//
                        var dataSet = [
                            <?php 
                                $query = "SELECT
                                            personal.gstNombr,
                                            personal.gstApell,
                                            personal.gstCorro,
                                            personal.gstSpcID,
                                            categorias.gstCatgr,
                                            personal.estado 
                                        FROM
                                            personal 
                                        INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat
                                        WHERE
                                            personal.estado = 3";
                                            $resultado = mysqli_query($conexion, $query);
                                            $x = 0;

                                while($data = mysqli_fetch_array($resultado)){ 
                                    if($data['gstCorro'] == ""){
                                        $correo = "<span class='badge' style='background-color: orange'>SIN CORREO PERSONAL</span>";
                                    }else if($data['gstCorro'] == "0"){
                                        $correo = "<span class='badge' style='background-color: orange'>SIN CORREO PERSONAL</span>";
                                    }else{
                                        $correo = $data['gstCorro'];
                                    }

                                    if($data['gstSpcID'] == ""){
                                        $correoAlt = "<span class='badge' style='background-color: orange'>SIN CORREO ALTERNATIVO</span>";
                                    }else if($data['gstSpcID'] == "0"){
                                        $correoAlt = "<span class='badge' style='background-color: orange'>SIN CORREO ALTERNATIVO</span>";
                                    }else{
                                        $correoAlt = $data['gstSpcID'];
                                    }
                                    
                                $x++;
?>

                            //console.log('<?php //echo $gstIdper ?>');

                            ["<?php echo $x ?>", "<?php echo  $data['gstNombr'];?>",
                                "<?php echo $data['gstApell']?>", "<?php echo $data['gstCatgr']?>",
                                "<?php echo $correo ?><p><?php echo $correoAlt ?>"


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
                                    title: "ESPECIALIDAD"
                                },
                                {
                                    title: "CORREO"
                                }
                            ],
                        });

                        if ($('#gstLunac').val() == 0) {
                            $(".curp").css("display", "none");
                            $(".rfc").css("display", "none");
                        };

                        $('#gstLunac').change(function() {
                            var gstCurp = document.getElementById('gstCurp');
                            var gstRfc = document.getElementById('gstRfc');
                            var gstStado = document.getElementById('gstStado');
                                    if ($('#gstLunac').val() == 0) {
                                        $(".curp").css("display", "none");
                                        $(".rfc").css("display", "none");
                                    };

                                    if ($('#gstLunac').val() == "NACIONAL") {
                                        $(".curp").css("display", "block");
                                        $(".rfc").css("display", "block");
                                    };
                                    if ($('#gstLunac').val() == "INTERNACIONAL") {
                                        $(".curp").css("display", "none");
                                        $(".rfc").css("display", "none");
                                        gstCurp.value = 0;
                                        gstRfc.value = 0;
                                        gstStado.value = "EN OTRO PAÍS";
                                    };
                                });
                        </script>
</body>
</html>