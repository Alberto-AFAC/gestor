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
    <link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
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
                                                    <th>CÓDIGO</th>
                                                    <th>TÍTULO</th>
                                                    <th>TIPO</th>
                                                    <th>PERFIL.</th>
                                                    <th>DURACIÓN</th>
                                                    <th>DOCUMENTO</th>
                                                    <th>VIGENCIA</th>
                                                    <th>TEMARIO</th>
     
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
                                                        <option value="FORTALECIMIENTO DEL DESEMPEÑO">FORTALECIMIENTO DEL DESEMPEÑO</option>
                                                        <option value="SENSIBILIZACIÓN">SENSIBILIZACIÓN</option>
                                                        <option value="CERTIFICACIÓN">CERTIFICACIÓN</option>
                                                        <option value="ACTUALIZACIÓN">ACTUALIZACIÓN</option>
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
                                        <?php for($h=1; $h<=24; $h++){
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
                                    <option value="0">ELEGIR UNA OPCIÓN</option>
                                                        <option value="INTERNO">INTERNO</option>
                                                        <option value="EXTERNO">EXTERNO</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="label2">CENTRO DE INSTRUCCIÓN</label>
                                    <select type="text" class="form-control inputalta" id="AgstCntro" name="AgstCntro">
                                        <option value="EN EL EXTRANJERO">EN EL EXTRANJERO</option>
                                    </select>
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
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="label2">TEMARIO</label>

                                    <input type="file" id="AgstTmrio" name="AgstTmrio"
                                        style="width: 410px; margin:0 auto;" required accept=".pdf,.doc"
                                        class="input-file inputalta" size="1450">


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
<script src="../js/datos.js"></script>
<script src="../js/gesInstr.js"></script>

<script src="../js/lisCurso.js"></script>
    <script src="../js/global.js"></script>
<script src="../js/datos.js"></script>
<script type="text/javascript" src="../js/director.js"></script>

<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#AgstPrfil').select2();

});
</script>
<script src="../js/select2.js"></script>

</html>
<script type="text/javascript">

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
    //FIN DE ACTUALIZACION
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
            "targets": -1

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

});

function temario(gstIdlsc) {

    $.ajax({
        url: '../php/temario.php',
        type: 'POST'
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;

        html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>TITULO</th>';

        var x = 0;

        for (i = 0; i < res.length; i++) {
 
            if (obj.data[i].idcurso == gstIdlsc) {

                //alert(obj.data[i].idcurso);
                dato = obj.data[i].idtem+'*'+obj.data[i].idcurso+'*'+obj.data[i].titulo;

            x++;               
            html += "<tr><td>" + x + "</td><td><input class='form-control' id='"+obj.data[i].idtem+"' name='"+obj.data[i].idtem+"' value='"+obj.data[i].titulo+"' disabled></td></tr>";
            }
        }
        html += '</table>';

        $("#temario").html(html);
    })

}



// FUNCION PARA AÑADIR

// AÑADIR TEMARIO N NUMERO DE REGISTROS
var campos_max = 30;   
        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();    //chups
                if (x < campos_max) {
                        $('#listas').append('<div>\
                                <br><input style="text-transform: uppercase;" placeholder="Ingresa tema" class="form-control" type="text" name="campo[]">\
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