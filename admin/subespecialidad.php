<!DOCTYPE html><?php include ("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City'); 

$sql = "SELECT gstIdCom,gstRgion,gstNombr FROM comandancia WHERE estado = 0";
$coman = mysqli_query($conexion,$sql);

$sql2 = "SELECT gstIdAir,gstUnid1,gstUnid2 FROM aeropuertos WHERE estado = 0";
$aero = mysqli_query($conexion,$sql2);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Subespecialidad</title>
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
</head>
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

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">
        <?php include('header.php');?>
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
                                <h3 class="box-title">ESPECIALIDAD / SUB-ESPECIALIDAD</h3>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a type="button" href="subespecialidad.php" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>
                            <!-- AQUI VA EL SECTION -->
                            <section class="content">
                                <a class="btn btn-primary text-white" data-toggle="modal"
                                    data-target="#modal-altaespecial" onclick="" style="float:left; cursor:pointer"> <i
                                        class="fa fa-plus mg-r-10"></i> Agregar
                                    especialidad</a>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="padding-top: 10px;" class="container box box-solid">
                                            <div class="table-wrapper rounded table-responsive">
                                                <table class="table display dataTable no-footer"
                                                    id="data-subespecialidad" name="data-subespecialidad"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:5%;">ID</th>
                                                            <th>ESPECIALIDAD</th>
                                                            <th>SIGLAS</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.box -->
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
            Todos los derechos Reservados DDE.
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
    <script src="../js/ojt.js"></script>
    <!--modal de instructor y coordinador informacion -->
    <div class="modal fade" id='modal-altaespecial'>
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="cerraraddsub()" aria-hidden="true">&times;</span></button>
                        <h4><label>ESPECIALIDAD</label></h4>
                        <div id="divaddsup1" name="divaddsup1" class="col-sm-12">
                            <label for="addespecial" style="font-size: 16px;">Ingresa la
                                especialidad</label>
                            <input name="addespecial" onkeyup="mayus(this);" id="addespecial" class="form-control inputalta"
                                type="text">
                            <label for="siglasespe" style="font-size: 16px;">Ingresa las siglas</label>
                            <input name="siglasespe" style="font-size: 20px;" onkeyup="mayus(this);" id="siglasespe"
                                class="form-control inputalta" type="text">
                            <div>
                                <br>
                                <a class="ml-md-auto btn btn-primary text-white" onclick="saveaddespec()"
                                    style="float:right; cursor:pointer">Guardar</a>
                                    
                                <a type="button" onclick="cerrarespcil()" style="float:right; cursor:pointer"
                                    class="ml-md-auto btn btn-default">CERRAR</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal de instructor y coordinador informacion -->
    <div class="modal fade" id='modal-detallespecial'>
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="cerraraddsub()" aria-hidden="true">&times;</span></button>
                        <label id="espnameadd" name="espnameadd"></label>
                        <h4><label>SUBESPECIALIDAD</label></h4>
                        <a class="btn btn-primary text-white" name="subespaddd" id="subespaddd" onclick="visualadd()"
                            style="float:left; cursor:pointer"> <i class="fa fa-plus mg-r-10"></i> Agregar
                            sub-especialidad</a>
                        <br>
                        <br>
                        <div id="divaddsup" name="divaddsup" class="hidden col-sm-12">
                            <label for="addsupess" style="color:blue; font-size: 18px;"> + Ingresa la
                                sub-especialidad</label>
                            <input name="addsupess" onkeyup="mayus(this);" id="addsupess" class="form-control inputalta"
                                type="text">
                            <div>
                                <br>
                                <a class="ml-md-auto btn btn-primary text-white" onclick="saveaddsupe()"
                                    style="float:right; cursor:pointer">Guardar</a> <a type="button"
                                    onclick="cerraraddsub()" style="float:right; cursor:pointer"
                                    class="ml-md-auto btn btn-default">CERRAR</a>
                            </div>
                        </div>

                    </div>
                    <div class="modal-body">
                        <form id="Dtall" class="form-horizontal" action="" method="POST">
                            <input type="hidden" id="idinfoojt" name="idinfoojt">
                            <div name="lissubesp" id="lissubesp"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL DE SELECCION DE HORARIO -->
    <form class="form-horizontal" action="" method="POST">
        <div class="modal fade" data-backdrop="static" id="edithsub" tabindex="-1" data-keyboard="false" role="dialog"
            aria-labelledby="detalleSub3" aria-hidden="true">
            <div class="modal-dialog" style="width: 60%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">EDICIÓN DE SUB-ESPECIALIDAD</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info" style="font-size:16px">
                            <strong>Información!</strong> Al editar se cambiara de forma automatica las tareas ligadas a
                            esta SUB-CATEGORIA.
                        </div>
                        <textarea type="text" onkeyup="mayus(this);" cols="2" rows="2" class="form-control inputalta"
                            id="namesubtare" name="namesubtare"></textarea>
                        <br>
                        <div class="form-group">
                            <input style="display: none;" id="categoriaedth" type="text">
                            <input style="display: none;" id="subcatedth" type="text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                            <button type="button" onclick="updatesubind();" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- MODAL DE SELECCION DE HORARIO -->
    <form class="form-horizontal" action="" method="POST">
        <div class="modal fade" data-backdrop="static" id="edithespecial" tabindex="-1" data-keyboard="false" role="dialog"
            aria-labelledby="detalleSub3" aria-hidden="true">
            <div class="modal-dialog" style="width: 60%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">EDICIÓN DE ESPECIALIDAD</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info" style="font-size:16px">
                            <strong>Información!</strong> Al editar se cambiara de forma automatica las tareas ligadas a
                            esta SUB-CATEGORIA.
                        </div>
                        <textarea type="text" onkeyup="mayus(this);" cols="2" rows="2" class="form-control inputalta"
                            id="namesubtare" name="namesubtare"></textarea>
                        <br>
                        <div class="form-group">
                            <input style="display: none;" id="categoriaedth" type="text">
                            <input style="display: none;" id="subcatedth" type="text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                            <button type="button" onclick="updatesubind();" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--fin modal de instructor y coordinador informacion -->




</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
//FUNCION PARA ABRIR UN MODAL SOBRE OTRO
$(document).on({
    'show.bs.modal': function() {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass(
                'modal-stack');
        }, 0);
    },
    'hidden.bs.modal': function() {
        if ($('.modal:visible').length > 0) {
            // restore the modal-open class to the body element, so that scrolling works
            // properly after de-stacking a modal.
            setTimeout(function() {
                $(document.body).addClass('modal-open');
            }, 0);
        }
    }
}, '.modal');
//FIN PARA LA FUNCION PARA ABRIR UN MODAL SOBRE OTRO
$(document).ready(function() {
    $('#id_area').select2();
});
opensubesp();
</script>
<script src="../js/select2.js"></script>
<script type="text/javascript">
// TABLA INSPECTORES EXTERNOS//
</script>