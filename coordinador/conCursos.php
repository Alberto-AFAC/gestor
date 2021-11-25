<!DOCTYPE html><?php include ("../conexion/conexion.php");

      $sql = "SELECT gstIdcat, gstCsigl FROM categorias WHERE estado = 0";
      $categs = mysqli_query($conexion,$sql);

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Catálogo Cursos</title>
    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
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

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php include('header.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content-header">
                <h1>
                    CONSULTA DE CURSOS
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">


                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a type="button" href="conCursos.php" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>

                            </div>
                            <!-- /INDICADORES -->

                            <section class="content">
                                <div class="tab-content">
                                    <!-- /FIN DE INDICADORES -->
                                    <div class="box-body">
                                        <?php include('cursosprogramados.php'); ?>
                                        <!--  <table style="width: 100%;" id="data-table-concurso"
                                            class="table display table-striped table-bordered"></table> -->

                                        <table class="display table table-striped table-bordered dataTable" id="example"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>CÓDIGO
</th>
                                                    <th>TÍTULO</th>
                                                    <th>TIPO</th>
                                                    <th>PERFIL.</th>
                                                    <th>DURACIÓN</th>
                                                    <th>DOCUMENTO</th>
                                                    <th>VIGENCIA</th>
                                                    <th>TEMARIO</th>
                                                    <th>ACCIÓN</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->

        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modal-eliminar">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ELIMINAR CURSO DE CATALOGO </h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="EgstIdlsc" id="EgstIdlsc">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> ¿ESTÁS SEGURO DE ELIMINAR ESTE CURSO? <input type="text" name="EgstTitlo"
                                            id="EgstTitlo" class="form-control disabled" disabled=""
                                            style="background: white;border: 1px solid white;"></p>
                                </div>
                                <br>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" onclick="eliCurso()">ACEPTAR</button>
                                </div>

                                <b>
                                    <p class="alert alert-warning text-center padding error" id="danger">Error
                                        al eliminar curso</p>
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="succe">¡Se
                                        elimino curso con éxito !</p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="empty">Elija
                                        curso para eliminar </p>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<!-- MODAL PARA AÑADIR UN NUEVO CURSO -->
<form id="add" class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modal-añadir">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 style="font-size: 20px;" class="modal-title" id="exampleModalLabel">AGREGA TEMARIO SEGÚN EL CASO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <input type="hidden" name="idcurtem" id="idcurtem">
                      <div class="modal-body">
                        <span id="add_field" style="color: green;font-size: 20px;cursor: pointer;" class="fa fa-plus-square"></span>
                      <div id="listas">
                          <div><input class="form-control" onkeyup="mayus(this);" placeholder="INGRESA TEMA" type="text" name="campo[]"></div>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" onclick="agregarMas();" data-dismiss="modal">GUARDAR</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
            </div>
        </form>
        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modal-evaluar">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">EVALUACIÓN</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="evgstIdlsc" id="evgstIdlsc">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> CONFIRME ACEPTAR, PARA EVALUAR <input type="text" name="evgstTitlo"
                                            id="evgstTitlo" class="form-control disabled" disabled=""
                                            style="background: white;border: 1px solid white;"></p>
                                </div>
                                <br>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary">ACEPTAR</button>
                                </div>

                                <b>
                                    <p class="alert alert-warning text-center padding error" id="danger">Error
                                        al eliminar curso</p>
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="succe">¡Se
                                        elimino curso con éxito !</p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="empty">Elija
                                        curso para eliminar </p>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    style="color: black" aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">EDITAR CURSO </h4>
                        </div>

                        <input type="hidden" class="form-control" id="AgstIdlsc" name="AgstIdlsc">
                        <div class="modal-body">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="label2">NOMBRE</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control inputalta"
                                        id="AgstTitlo" name="AgstTitlo">
                                </div>

                                <div class="col-sm-4">
                                    <label class="label2">TIPO DE CAPACITACIÓN</label>
                                    <select type="text" class="form-control inputalta" id="AgstTipo" name="AgstTipo">
                                        <option value="INDUCCIÓN">INDUCCIÓN</option>
                                        <option value="BÁSICOS/INICIAL">BÁSICOS/INICIAL</option>
                                        <option value="TRANSVERSALES">TRANSVERSALES</option>
                                        <option value="RECURRENTES">RECURRENTES</option>
                                        <option value="ESPECÍFICOS">ESPECÍFICOS</option>
                                        <option value="OJT">OJT</option>
                                    </select>
                                </div>

                                <link rel="stylesheet" type="text/css" href="advanced.php">

                                <p>PERFIL A QUIEN VA DIRIGIDO - SELECCIONE</p>
                                <div class="col-md-2">
                                    <p id="gstPrfil"></p>
                                </div>

                                <link rel="stylesheet" type="text/css" href="advanced.php">
                                <div class="col-md-2">
                                    <select multiple="multiple" data-placeholder="SELECCIONE"
                                        style="width: 100%;color: #000" class="form-control select2" type="text"
                                        class="form-control inputalta" id="AgstPrfil" name="AgstPrfil[]">

                                        <?php while($cat = mysqli_fetch_row($categs)):?>
                                        <option value="<?php echo $cat[1]?>"><?php echo $cat[1]?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label class="label2">DOCUMENTO QUE EMITE</label>
                                    <!-- <input type="text" onkeyup="mayus(this);" class="form-control" id="gstCntnc" name="gstCntnc"> -->
                                    <select type="text" class="form-control inputalta" id="AgstCntnc" name="AgstCntnc">
                                        <option value="DIPLOMA">DIPLOMA</option>
                                        <option value="CONSTANCIA">CONSTANCIA</option>
                                        <option value="CERTIFICADO">CERTIFICADO</option>
                                    </select>
                                </div>

                                <div class="col-sm-1" style="padding-right: 0; width: 85px;">
                                    <label class="label2">DURACION</label>
                                    <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                                    <select class="form-control inputalta" id="Ahr" name="Ahr">
                                        <option value="00">00</option>
                                        <?php for($h=1; $h<=100; $h++){
                         if($h<10){ ?>
                                        <option value="<?php echo '0'.$h?>"><?php echo '0'.$h?></option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $h?>"><?php echo $h?></option>
                                        <?php } }?>
                                    </select>
                                </div>
                                <div class="col-sm-1" style="padding: 0;">
                                    <label class="label2" style="color: white">.</label>
                                    <input type="text" class="form-control inputalta" id="Atmp1" name="Atmp1"
                                        value="HRS.">
                                </div>
                                <div class="col-sm-1" style="padding: 0;">
                                    <label class="label2" style="color: white">.</label>
                                    <!--<input type="time" class="form-control" id="gstDrcin" name="gstDrcin">-->
                                    <select class="form-control inputalta" id="Amin" name="Amin">
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
                                    <label class="label2" style="color: white">.</label>
                                    <input type="text" class="form-control inputalta" id="Atmp2" name="Atmp2"
                                        value="MIN.">

                                </div>


                                <div class="col-sm-offset-0 col-sm-3">
                                    <label class="label2">PERIODO DE VIGENCIA</label>
                                    <select type="text" class="form-control inputalta" id="AgstVignc" name="AgstVignc">
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
                                    <label class="label2">TIPO DE CURSO</label>
                                    <select type="text" class="form-control inputalta" id="AgstProvd" name="AgstProvd">
                                        <option value="INTERNO (AFAC)">INTERNO (AFAC)</option>
                                        <option value="INTERNO (NACIONAL)">INTERNO (NACIONAL)</option>
                                        <option value="EXTERNO (NACIONAL)">EXTERNO (NACIONAL)</option>
                                        <option value="EXTERNO (INTERNACIONAL)">EXTERNO (INTERNACIONAL)</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="label2">CENTRO DE INSTRUCCIÓN</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control"
                                        id="AgstCntro" name="AgstCntro">
                                </div>

                                <div class="col-sm-4">
                                    <label class="label2">CÓDIGO DE CURSO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control"
                                        id="codigoCrso" name="codigoCrso">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label2">OBJETIVO</label>
                                    <textarea name="AgstObjtv" id="AgstObjtv" placeholder="Escribir el Objetivo"
                                        onkeyup="mayus(this);" class="form-control inputalta" rows="5"
                                        cols="50"></textarea>
                                </div>
                            </div>

                            <div class="form-group"><br>
                                <div class="col-sm-offset-0 col-sm-5">
                                    <button type="button" id="button" class="btn btn-primary"
                                        onclick="actCurso();">ACEPTAR </button>
                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="afalla">Error al
                                        actualizar curso o al adjuntar archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-success text-center padding exito" id="aexito">¡Se
                                        actualizo curso y archivo con éxito!</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="avacio">Es
                                        necesario agregar los datos que se solicitan </p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="arepetido">¡El
                                        curso ya está registrado!</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="arenom">
                                        Renombre su archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding adjuto" id="aadjunta">
                                        Debes adjuntar archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="aerror">
                                        Ocurrio un error</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="aforn">
                                        Formato no valido</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="amax">
                                        Supera el limite permitido</p>
                                </b>


                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- MODAL PARA ACTUALIZAR PDFS -->
        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modalUpdate" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    style="color: black" aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR TEMARIO </h4>
                        </div>

                        <input type="hidden" class="form-control" id="Idlsc" name="Idlsc">
                        <div class="modal-body">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>NOMBRE</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="AgstTitlo"
                                        name="AgstTitlo" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>TEMARIO</label>

                                    <input type="file" id="AgstTmrio" name="AgstTmrio"
                                        style="width: 410px; margin:0 auto;" required accept=".pdf,.doc"
                                        class="input-file" size="1450">


                                </div>
                                <!-- <input type="file" id="myPdf" /><br>
                      <canvas id="pdfViewer"></canvas> -->
                            </div>

                            <div class="form-group"><br>
                                <div class="col-sm-offset-0 col-sm-5">
                                    <button type="button" id="button" class="btn btn-primary"
                                        onclick="updatePDF();">ACEPTAR </button>
                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="afalla">Error al
                                        actualizar curso o al adjuntar archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-success text-center padding exito" id="aexito">¡Se actualizo
                                        curso y archivo con éxito!</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="avacio">Es necesario
                                        agregar los datos que se solicitan </p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="arepetido">¡El curso ya
                                        está registrado!</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="arenom">
                                        Renombre su archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding adjuto" id="aadjunta">
                                        Debes adjuntar archivo</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="aerror">
                                        Ocurrio un error</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="aforn">
                                        Formato no valido</p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding adjuto" id="amax">
                                        Supera el limite permitido</p>
                                </b>


                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </section>
        <!-- /.content -->
    </div>
    </div>




    <!-- <img data-toggle='modal' data-target='#exampleModal{$data['gstIdlsc']}' src='../dist/img/pdf.svg' alt='PDF' width='30px;' cursor: pointer;'> -->
    <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content' style="width: 100%;">
                <div class='modal-header'>
                    <h5 style='font-size: 28px;' class='modal-title col-11 text-center'><span
                            style='font-weight: bold;'>TEMARIO</span><br>
                        
                </div>
                <div class='modal-body'><div id="elimino" style="display: none; text-align: center;font-size: 14px; color: red">SU REGISTRO FUE ELIMINADO</div><div id="actualizo" style="display: none;text-align: center;font-size: 14px; color: green">SE ACTUALIZO REGISTRO CON ÉXITO</div>


<div id="temario"></div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal'>CERRAR</button>
                </div>
            </div>
        </div>
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
</body>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
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
<script src="../js/gesInstr.js"></script>

<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#AgstPrfil').select2();

});
</script>
<script src="../js/select2.js"></script>

</html>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({

        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "order": [
            [0, "desc"]
        ],
        "ajax": "../php/consdaTable.php",
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<a href='#' title='Editar Curso' onclick='dato({$gstIdlsc})' type='button' class='btn btn-default' data-toggle='modal' data-target='#modalVal'><i class='fa ion-compose text-info'></i></a>  <a href='#' onclick='eliminar({$gstIdlsc})' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a> <a href='#' type='button' class='temario btn btn-default' data-toggle='modal' onclick='agrtemario({$gstIdlsc})' data-target='#modal-añadir'><i class='fa fa-plus-circle text-info' title='Añadir Temario'></i></a> "



//<a href='#'  type='button' class='temario btn btn-default' data-toggle='modal' data-target='#modal-temario'><i class='fa fa-trash-o text-danger'></i></a>            



        }]
    });

    detalles("#example tbody", table);
    agrtemario("#example tbody", table);


    $('#example thead tr').clone(true).appendTo('#example thead');

    $('#example thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text"  placeholder="Buscar" />');

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });



    $('#example tbody').on('click', 'a', function() {
        var data = table.row($(this).parents('tr')).data();
        //alert( "Es el ID: "+ data[0] );

        gstIdlsc = data[0];

        $.ajax({
            url: '../php/conCurso.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            for (i = 0; i < res.length; i++) {
                if (obj.data[i].gstIdlsc == gstIdlsc) {

                datos = 
                obj.data[i].gstIdlsc + '*' +
                obj.data[i].gstTitlo + '*' +
                obj.data[i].gstTipo + '*' +
                obj.data[i].gstPrfil + '*' +
                obj.data[i].gstCntnc + '*' +
                obj.data[i].gstDrcin + '*' +
                obj.data[i].gstVignc + '*' + 
                obj.data[i].gstObjtv + '*' +
                obj.data[i].gstTmrio + '*' + 
                obj.data[i].gstProvd + '*' + 
                obj.data[i].gstCntro + '*' +
                obj.data[i].codigoCrso;                  

                    var d = datos.split("*");   
                    $("#modalVal #codigoCrso").val(d[11]);   
                     $("#modalVal #AgstCntro").val(d[10]);            
                    $("#modalVal #AgstIdlsc").val(d[0]);
                    $("#AgstIdlsc #AgstIdlsc").val(d[0]);
                    $("#modalUpdate #Idlsc").val(d[0]);
                    $("#modalVal #AgstTitlo").val(d[1]);
                    $("#modalUpdate #AgstTitlo").val(d[1]);
                    $("#modalVal #AgstTipo").val(d[2]);
                    $("#gstPrfil").html(d[3]);
                    $("#modalVal #AgstCntnc").val(d[4]);

                    Ahr = d[5].substr(0, 2);
                    Amin = d[5].substr(8, 2);

                    $("#modalVal #Ahr").val(Ahr);
                    $("#modalVal #Amin").val(Amin);
                    $("#modalVal #AgstVignc").val(d[6]);
                    $("#modalVal #AgstObjtv").val(d[7]);
                    $("#modalVal #AgstTmrio").val(d[8]);
                    $("#modalUpdate #AgstTmrio").val(d[8]);
                    $("#modalVal #AgstProvd").val(d[9]);
                    
                }
            }
        })


    });

});

function detalles(tbody, table) {

    $(tbody).on("click", "a.eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        //var gstIdlsc = $().val(data.gstIdlsc);
        $("#modal-eliminar #EgstIdlsc").val(data[0]);

    });
}

function agrtemario(tbody, table) {

$(tbody).on("click", "a.temario", function() {
    var data = table.row($(this).parents("tr")).data();
        //alert(data[0]);
    $("#modal-añadir #idcurtem").val(data[0]);
});
}


function temario(gstIdlsc) {

    $.ajax({
        url: '../php/temario.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;



        html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>TITULO</th><th>ACCIONES</th>';

        var x = 0;

        for (i = 0; i < res.length; i++) {
 
            if (obj.data[i].idcurso == gstIdlsc) {

                //alert(obj.data[i].idcurso);
                dato = obj.data[i].idtem+'*'+obj.data[i].idcurso+'*'+obj.data[i].titulo;

            x++;               
        html += "<tr><td>" + x + "</td><td><input class='form-control' id='"+obj.data[i].idtem+"' name='"+obj.data[i].idtem+"' value='"+obj.data[i].titulo+"' disabled></td><td><a id='"+obj.data[i].idtem+"mostrar' type='button' title='Agregar registro' class='btn btn-default' data-toggle='modal' style='display:none;a margin-left:2px' onclick='temagregar(" + '"' + dato + '"' + ");' data-target='#modal-actualizardoc'><i class='fa fa-save text-success'></i></a><a id='"+obj.data[i].idtem+"ocultar' type='button' title='Actualizar documento' class='asiste btn btn-default' data-toggle='modal' style='margin-left:2px' onclick='temact(" + '"' + dato + '"' + ");' data-target='#modal-actualizardoc'><i class='fa ion-compose text-info'></i></a> <a onclick='temborrar(" + '"' + dato + '"' + ");' type='button' style='margin-left:2px' title='Borrar documento'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminararchi'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
            }
        }
        html += '</table>';

        $("#temario").html(html);
    })

}
///////EDITAR////////

    function temact(dato){
    var d = dato.split("*");
    idcurso = d[0];
    document.getElementById(idcurso).disabled = false;
    $("#"+idcurso+"ocultar").hide();
    $("#"+idcurso+"mostrar").show();

    }

function temagregar(dato){

    // alert(dato);
    var d = dato.split("*");
    idcurso = d[0];
    var titulo = document.getElementById(idcurso).value;
    var idcur = d[1];

    $.ajax({
        data: 'idcurso='+idcurso+'&titulo='+titulo+'&idcur='+idcur+'&opcion=agregartem',
        url:'../php/docCursos.php',
        type: 'post',
        beforeSend: function () {
            //
        },
        success: function (response) {   
            if(response==0){      

                $('#actualizo').toggle('toggle');
                setTimeout(function() {
                $('#actualizo').toggle('toggle');
                }, 2000);

            $("#"+idcurso+"ocultar").show();
            $("#"+idcurso+"mostrar").hide();
            document.getElementById(idcurso).disabled = true;
            //temario(gstIdlsc);            
            }else{
                // $('#actualizo').toggle('toggle');
                // setTimeout(function() {
                // $('#actualizo').toggle('toggle');
                // }, 2000);            
            // $('#temario').hide();
            }
        }
    });
}


///BORRAR REGISTRO////
function temborrar(dato){
    
    var d = dato.split("*");

    idcurso = d[0];
    cursoid = d[1];

$.ajax({
    data: 'idcurso='+idcurso+'&cursoid='+cursoid+'&opcion=eliminartem',
    url:'../php/docCursos.php',
    type: 'post',
    beforeSend: function () {
        //
    },
    success: function (response) {   
        if(response!=1){      

            $('#elimino').toggle('toggle');
            setTimeout(function() {
            $('#elimino').toggle('toggle');
            }, 2000);

        temario(gstIdlsc);            
        }else{
            $('#elimino').toggle('toggle');
            setTimeout(function() {
            $('#elimino').toggle('toggle');
            }, 2000);            
        $('#temario').hide();
        setTimeout("location.href = 'conCursos.php';", 2100);
        }
    }
});

}

// FUNCION PARA AÑADIR

// AÑADIR TEMARIO N NUMERO DE REGISTROS
var campos_max = 30;   
        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();    //chups
                if (x < campos_max) {
                        $('#listas').append('<div>\
                                <br><input style="text-transform: uppercase; "placeholder="Ingresa tema" class="form-control" type="text" name="campo[]">\
                                <a href="#" style="color: red; font-size:20px; cursor:pointer;" class="remover_campo"><span class="fa fa-minus-square"></span></a>\
                                </div>');
                        x++;
                }
        });
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x;
        });
</script>
<style>
#example input {
    width: 75% !important;
}
</style>

<?php



?>