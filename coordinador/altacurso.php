<?php 
include ("../conexion/conexion.php");

      $sql = "SELECT gstIdcat, gstCsigl,gstCatgr FROM categorias WHERE estado = 0";
      $categs = mysqli_query($conexion,$sql);
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
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .swal-wide {
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

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">


        <!-- Left side column. contains the logo and sidebar -->
        <?php include('header.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    REGISTRAR CURSO
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
                                    <div class="post">

                                        <form id="addcurse" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label>NOMBRE DEL CURSO</label>
                                                    <input type="text" onkeyup="mayus(this);" class="form-control"
                                                        id="gstTitlo" name="gstTitlo">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>TIPO DE CAPACITACIÓN</label>
                                                    <select type="text" class="form-control" id="gstTipo"
                                                        name="gstTipo">
                                                        <option value="0">ELEGIR UNA OPCIÓN</option>
                                                        <option value="INDUCCIÓN">INDUCCIÓN</option>
                                                        <option value="BÁSICOS">BÁSICO/INICIAL</option>
                                                        <option value="TRANSVERSALES">TRANSVERSALE</option>
                                                        <option value="RECURRENTES">RECURRENTE</option>
                                                        <option value="ESPECÍFICOS">ESPECÍFICO</option>
                                                        <option value="OJT">OJT</option>
                                                    </select>
                                                </div>

                                                <link rel="stylesheet" type="text/css" href="advanced.php">

                                                <div style="text-transform: uppercase;" class="col-md-4">
                                                    <label>PERFIL A QUIEN VA DIRIGIDO</label>
                                                    <select multiple="multiple"
                                                        data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO"
                                                        style="width: 100%;color: #000" class="form-control select2"
                                                        type="text" class="form-control" id="gstPrfil"
                                                        name="gstPrfil[]">
                                                        <?php while($cat = mysqli_fetch_row($categs)):?>
                                                        <option value="<?php echo $cat[1]?>"><?php echo $cat[1]?> -
                                                            <?php echo $cat[2]?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">

                                            <div class="col-sm-2">
                                                    <label>DOCUMENTO QUE EMITE</label>
                                                    <!-- <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCntnc" name="gstCntnc"> -->
                                                    <select type="text" class="form-control" id="gstCntnc"
                                                        name="gstCntnc">
                                                        <option value="0">ELEGIR UNA OPCIÓN</option>
                                                        <option value="DIPLOMA">DIPLOMA</option>
                                                        <option value="CONSTANCIA">CONSTANCIA</option>
                                                        <option value="CERTIFICADO">CERTIFICADO</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>CÓDIGO DEL CURSO</label>
                                                    <!-- <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCntnc" name="gstCntnc"> -->
                                                    <input type="text" onkeyup="mayus(this);" class="form-control"
                                                        id="codigoCrso" name="codigoCrso">
                                                </div>


                                                <div class="col-sm-1" style="padding-right: 0;">
                                                    <label>DURACIÓN</label>
                                                    <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                                                    <select class="form-control" id="hr" name="hr">
                                                        <option value="00">00</option>
                                                        <?php for($h=1; $h<=456; $h++){
                         if($h<10){ ?>
                                                        <option value="<?php echo '0'.$h?>"><?php echo '0'.$h?></option>
                                                        <?php }else{ ?>
                                                        <option value="<?php echo $h?>"><?php echo $h?></option>
                                                        <?php } }?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-1" style="padding: 0;">
                                                    <label style="color: white">.</label>
                                                    <input type="text" class="form-control" id="tmp1" name="tmp1"
                                                        value="HRS." readonly>
                                                </div>

                                                <div class="col-sm-1" style="padding: 0;">
                                                    <label style="color: white">.</label>
                                                    <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                                                    <select class="form-control" id="min" name="min">
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
                                                    <input type="text" class="form-control" id="tmp2" name="tmp2"
                                                        value="MIN." readonly>

                                                </div>



                                                <div class="col-sm-offset-0 col-sm-3">
                                                    <label>PERIODO DE VIGENCIA</label>
                                                    <select type="text" class="form-control" id="gstVignc"
                                                        name="gstVignc">
                                                        <option value="">SELECCIONE VIGENCIA</option>
                                                        <!-- <option value="100">RECURRENTE</option> -->
                                                        <option value="101">UNICA VEZ</option>
                                                        <option value="1">1 AÑO</option>
                                                        <option value="2">2 AÑOS</option>
                                                        <option value="3">3 AÑOS</option>
                                                        <option value="4">4 AÑOS</option>
                                                        <option value="5">5 AÑOS</option>
                                                        <option value="6">6 AÑOS</option>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label>TIPO DE CURSO</label>
                                                    <select type="text" class="form-control" id="gstProvd"
                                                        name="gstProvd">
                                                        <option value="0">ELEGIR UNA OPCIÓN</option>
                                                        <option value="INTERNO (AFAC)">INTERNO (AFAC)</option>
                                                        <option value="INTERNO (NACIONAL)">INTERNO (NACIONAL)</option>
                                                        <option value="EXTERNO (INTERNACIONAL)">EXTERNO (INTERNACIONAL)
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>CENTRO DE INSTRUCCIÓN</label>
                                                    <input type="text" onkeyup="mayus(this);" class="form-control"
                                                        id="gstCntro" name="gstCntro">
                                                </div>

                                                <div style="padding-top: 25px;" class="col-sm-4">
                                                    <button style="width: 100%;" type="button" id="diploma"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-info" disabled>AGREGAR TEMARIO</button>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>OBJETIVO</label>
                                                    <textarea name="gstObjtv" id="gstObjtv"
                                                        placeholder="Escribir el Objetivo" onkeyup="mayus(this);"
                                                        class="form-control" rows="5" cols="50"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <!-- <label>TEMARIO</label><br> -->
                                                    <!-- <input type="button" id="add_field" value="adicionar"> -->
                                                    <br>
                                                    <!-- <div id="listas">
                          <div><input class="form-control" placeholder="Ingresa tema" type="text" name="campo[]"></div><img id="add_field" src="../dist/img/add.svg" width="30px;">
                      </div> -->
                                                    <!-- <input type="file" id="gstTmrio" name="gstTmrio" style="width: 410px; margin:0 auto;" required accept=".pdf,.doc" class="input-file" size="1450"> -->
                                                </div>
                                            </div>
                                            <!-- MODAL PARA DAR DE ALTA EL CURSO -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-size: 20px;" class="modal-title"
                                                                id="exampleModalLabel">AGREGA TEMARIO SEGÚN EL CASO</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="listas">
                                                                <div><input onkeyup="mayus(this);" class="form-control"
                                                                        placeholder="INGRESA TEMA" type="text"
                                                                        name="campo[]"></div><span id="add_field"
                                                                    style="color: blue;">Añadir</span>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info"
                                                                data-dismiss="modal">GUARDAR</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><br>
                                                <div class="col-sm-offset-0 col-sm-5">
                                                    <button type="button" id="button" class="btn btn-primary"
                                                        onclick="regCurso();">ACEPTAR </button>
                                                </div>
                                                <b>
                                                    <p class="alert alert-danger text-center padding error" id="falla">
                                                        Error al registrar curso o al adjuntar archivo</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-success text-center padding exito" id="exito">
                                                        ¡Se registro curso y archivo con éxito!</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding aviso" id="vacio">
                                                        Es necesario agregar los datos que se solicitan </p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding aviso"
                                                        id="repetido">¡El curso ya está registrado!</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-danger text-center padding adjuto" id="renom">
                                                        Renombre su archivo</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-warning text-center padding adjuto"
                                                        id="adjunta">
                                                        Debes adjuntar archivo</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-danger text-center padding adjuto" id="error">
                                                        Ocurrio un error</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-danger text-center padding adjuto" id="forn">
                                                        Formato no valido</p>
                                                </b>

                                                <b>
                                                    <p class="alert alert-danger text-center padding adjuto" id="max">
                                                        Supera el limite permitido</p>
                                                </b>

                                            </div>

                                        </form>

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
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#gstPrfil').select2();

});

var campos_max = 30;
var x = 0;
$('#add_field').click(function(e) {
    e.preventDefault(); //chups
    if (x < campos_max) {
        $('#listas').append('<div>\
                                <br><input placeholder="Ingresa tema" class="form-control" type="text" name="campo[]">\
                                <a href="#" style="color: red;" class="remover_campo">Remover</a>\
                                </div>');
        x++;
    }
});
// Remover o div anterior
$('#listas').on("click", ".remover_campo", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
});
</script>
<script src="../js/select2.js"></script>