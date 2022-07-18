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
    <title>Capacitación AFAC | Instructores/Coordinadores OJT</title>
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
                                <h3 class="box-title">INSTRUCTORES / COORDINADORES OJT</h3>
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
                                            <!-- <ul class="nav nav-tabs" id="myNavTabs">
                                                <li class="active"><a href="#navtabs1" data-toggle="tab">PERSONAL
                                                        AFAC</a>
                                                <li><a href="#navtabs2" data-toggle="tab">INSTRUCTORES EXTERNOS</a>
                                            </ul> -->
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

<!-- inio modal de instructor y coordinador cursos coordinados y inpartidos -->
<div class="modal fade" id='modal-cursinstru'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h3><label>DETALLE DE TAREAS</label></h3>
            </div>
            <div class="modal-body">
                <form id="Dtall" class="form-horizontal" action="" method="POST" >
                         <div class="form-group">
                            <div class="col-sm-8">
                                <form action="instructor.php" method="get">
                                 <input type="hidden" class="form-control disabled inputalta" name="insperco" id="insperco" value="" >
                                </form>
                                 <input type="" class="form-control disabled inputalta" name="gstnomebre" id="gstnomebre" disabled="">
                            </div>
                            <div class="col-sm-4">
                                 <input type="" class="form-control disabled inputalta" name="cargoinsco" id="cargoinsco" disabled="">
                            </div>
                        </div>    
                    <div class="tabbable-line">
					    <ul class="nav nav-tabs ">
						    <li class="active">
						        <a href="#tab_default_1" data-toggle="tab">CURSOS IMPARTIDOS</a>
						    </li>
						    <li>
							    <a href="#tab_default_2" data-toggle="tab" type="hidden" name="coordinados" id="coordinados">CURSOS COORDINADOS</a>
						    </li>
                        </ul>
                        <div class="tab-content">
						    <div class="tab-pane active" id="tab_default_1">
                                <div id="cursinstructor"></div>
                            </div>   

                            <div class="tab-pane" id="tab_default_2">
                                <div id="curscoord"></div>   
                            </div>  
                        </div>  

                    </div>  
                </form>                         
            </div>            
        </div>   
    </div> 
    </div>  
</div>          
<!--fin modal de instructor y coordinador cursos coordinados y inpartidos -->

<!-------------------------------------------MODAL------------------------------------------------------>
<form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modal-eliminariojt">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">CONFIRMAR!</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_inscorojt" id="id_inscorojt">
                            <input type="hidden" name="id_tipo" id="id_tipo">
                                <div class="form-group">
                                    <div style="text-align:center" class="col-sm-12" >
                                        <p style="font-size:16px;"> ¿ESTÁ SEGURO DE ELIMINAR ESTE REGISTRO? <br> <br> <label name="regelim" id="regelim" style="font-size:18px" for=""></label>
                                        <br>
                                        <span id="cgstTarea"></span>
                                        </p>
                                    </div>
                                    <div class="col-sm-3">
                                        <button id="detare" title="Dar clic para eliminar" type="button" class="btn btn-block btn-primary" onclick="confdelreg()">ACEPTAR</button>
                                    </div>
                                    <b>
                                    <p class="alert alert-warning text-center padding error" name="dangedere" id="dangedere">Error al eliminar contacta a soporte tecnico</p>
                                    </b>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
        <!-------------------------------------------MODAL FIN------------------------------------------------------>

        <!-------------------------------------------MODAL EDITAR------------------------------------------------------>
        <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
            <div class="modal fade" id="editarinoj" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h7 style="font-size: 16px;" class="modal-title" id="editarAccesosLabel">ACTUALIZAR INFORMACIÓN</h7>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <br>
                        </div>
                        <div style="text-align:center">
                            <h4 name="idojtt" id="idojtt" for=""></h4>
                            </div>
                        <div class="modal-body">
                        <input type="hidden" name="id_insoj1" id="id_insoj1">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label2">*TIPO DE INSTRUCTOR</label>
                                        <select type="text" class="form-control inputalta" id="editipo" name="editipo">
                                            <option value="0" selected>ELEGIR UNA OPCIÓN</option>
                                            <option value="COORDINADOR OJT">COORDINADOR OJT</option>
                                            <option value="INSTRUCTOR PRINCIPAL OJT">INSTRUCTOR PRINCIPAL OJT</option>
                                            <option value="INSTRUCTOR OJT">INSTRUCTOR OJT</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>OBJETIVO</label>
                                    <textarea type="text" onkeyup="mayus(this);" class="form-control" id="objeinsojt" name="objeinsojt"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="saveedithin()" class="btn btn-primary">GUARDAR CAMBIOS</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-------------------------------------------MODAL EDITAR FIN ------------------------------------------------------>

        <!-------------------------------------------MODAL EVALUACIÓN------------------------------------------------------>

        <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal fade" id="modal-evaperinsoj1">
                <div class="modal-dialog width" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>
                            <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">CHECK LIST DE PERFIL</h4>
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idtarpre" name="idtarpre">
                                <div class="col-sm-7">
                                    <label>PERSONA:</label>
                                    <input type="text" name="nompoj1" id="nompoj1" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-5">
                                    <label>TIPO:</label>
                                    <input type="text" name="tipooj1" id="tipooj1" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                        <thead>
                                            <tr>
                                                <th>PARAMETROS</th>
                                                <th>ESTATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>HABER CURSADO Y APROBADO EL CURSO DE INSTRUCTOR OJT</td>
                                                <td><i class="fa fa-check" id="che6" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>EXPERIENCIA TÉCNICA EN LAS TAREAS ESPECÍFICAS RELACIONADAS CON LA CAPACITACIÓN A SER IMPARTIDO PARA LA HABILITACIÓN DE UN INSPECTOR POR MEDIO DEL OJT.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <td><i class="fa fa-check" id="check2c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                           </tr>
                                           <tr>
                                               <td>EXPERIENCIA Y CONOCIMIENTOS CON LOS MÓDULOS DE CAPACITACIÓN ESPECÍFICO CON LOS CUALES SE ADELANTA EL OJT.</td>
                                               <!-- <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <td><i class="fa fa-check" id="check3c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>HABER REALIZADO LOS OJT CORRESPONDIENTES A LAS TAREAS QUE SERÁN IMPARTIDAS A TRAVÉS DE LA CAPACITACIÓN OJT.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check4c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check4c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>HABILIDADES INTERPERSONALES, DE COMUNICACIÓN, DE ESCUCHA, DE PACIENCIA Y ACCESIBILIDAD.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check5c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>INTERÉS EN PARTICIPAR EN LOS PROCESOS DE ADIESTRAMIENTO OJT.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check6c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check6c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>RESPETO POR SUS COMPAÑEROS.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check7c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check7c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>BUENA DISPOSICIÓN PARA SEGUIR LAS DIRECTRICES DEL ADIESTRAMIENTO OJT.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check8c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check8c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>HABER SIDO DESIGNADO POR LA DIRECCIÓN DE ÁREA, COMANDANCIA REGIONAL, AICM Y AIFA, POR MEDIO DE UN OFICIO.</td>
                                                <!-- <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="actual[]" /> <span></span></td> -->
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                                <td><i class="fa fa-check" id="check9c" disabled="" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>      

<!--fin modal evaluaciónn -->

<!--modal de instructor y coordinador informacion -->
<div class="modal fade" id='modal-infocoinsojt'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4><label>INFORMACIÓN</label></h4>
                </div>
                <div class="modal-body">
                    <form id="Dtall" class="form-horizontal" action="" method="POST" >
                    <input type="hidden" id="idinfoojt" name="idinfoojt">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">NOMBRE(S)</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtnombre" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">APELLIDOS</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtapellido" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <h4><i class="fa  ion-android-pin"></i>
                                    <label> INFORMACIÓN DE ADSCRIPCIÓN</label>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">DIRECCIÓN EJECUTIVA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojdirejec" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">DIRECCIÓN DE ADSCRIPCIÓN</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtdiradisc" disabled="">
                            </div>
                        </div>
                        <div class="form-group" disabled="" type="hidden" name="nacional" id="nacional">
                            <div class="col-sm-6">
                                <label class="label2">SUBDIRECCIÓN</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojsubdire" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">DEPARTAMENTO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtdepart" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">COMANDANCIA</label>
                                <!-- <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtcomanda" disabled=""> -->
                                <select disabled="" class="form-control" class="selectpicker" id="ojtcomanda" name="ojtcomanda" type="text" data-live-search="true" style="width: 100%" >
			                        <option value="0">SIN COMANDANCIA ASIGANADA</option> 
			                        <?php while($idcoman = mysqli_fetch_row($coman)):?>                      
			                            <option value="<?php echo $idcoman[0]?>"><?php echo $idcoman[2]?></option>
			                        <?php endwhile; ?>
			                    </select>               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">AEROPUERTO</label>
                                <!-- <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtaerpuerto" disabled="">                                                -->
                                <select disabled="" class="form-control" class="selectpicker" id="ojtaerpuerto" name="ojtaerpuerto" type="text" data-live-search="true" style="width: 100%" >
			                        <option value="0">SIN AEROPUESTO ASIGNADO</option> 
			                        <?php while($idaero = mysqli_fetch_row($aero)):?>                      
			                            <option value="<?php echo $idaero[0]?>"><?php echo $idaero[2]?></option>
			                        <?php endwhile; ?>
			                    </select>         
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2">UBICACIÓN CENTRAL</label>               
                                <select style="width: 100%" disabled="" class="form-control" class="selectpicker" id="ojtubicacion" name="ojtubicacion" type="text" data-live-search="true">
                                <option value="0">SIN ASIGNAR UBICACIÓN CENTRAL</option>    
                                <option value="AICM T1">AICM T1</option>
                                <option value="AICM T2">AICM T2</option>
                                <option value="HANGAR 8">HANGAR 8</option>
                                <option value="CIACC">CIACC</option>
                                <option value="LICENCIAS">LICENCIAS</option>
                                <option value="FLORESM1">LAS FLORES M1</option>
                                <option value="FLORESM2">LAS FLORES M2</option>
                                <option value="FLORESP1">LAS FLORES PISO 1</option>
                                <option value="FLORESP2">LAS FLORES PISO 2</option>
                                <option value="FLORESP3">LAS FLORES PISO 3</option>
                                <option value="FLORESP4">LAS FLORES PISO 4</option>
                                <option value="FLORESP5">LAS FLORES PISO 5</option>
                                <option value="FLORESP6">LAS FLORES PISO 6</option>
                                <option value="FLORESP7">LAS FLORES PISO 7</option>
                                <option value="FLORESP8">LAS FLORES PISO 8</option>
                                <option value="FLORESPH">LAS FLORES PH</option>
                                <option value="NO APLICA<">NO APLICA</option>
                            </select>
                            
                            </div>
                        </div>
                       <div class="form-group">
                       <div class="col-sm-4">
                            <div class="input-group">
                                <h4><i class="fa   fa-dot-circle-o"></i>
                                <label>CONTACTO</label>
                                </h4>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">TELEFONO TRABAJO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojteltrab" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">EXTENSION</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtext" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">CASA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtcasa" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">CELULAR</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtcelular" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">CORREO INSTITUCIONAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtcorreo" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">CORREO PERSONAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="ojtalternativo" disabled="">
                            </div>
                        </div>  

                    </form>                         
                </div>            
            </div>
        </div>       
    </div>   
</div>          

<!--fin modal de instructor y coordinador informacion -->
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

// TABLA INSPECTORES EXTERNOS//
var dataSet = [
    <?php 
$query = "SELECT * FROM instcoord_ojt 
INNER JOIN personal on instcoord_ojt.id_pers=personal.gstIdper 
INNER JOIN area on personal.gstIDara=area.id_area
WHERE instcoord_ojt.estado = 0 ORDER BY instcoord_ojt.id_inscorojt ASC";
$resultado = mysqli_query($conexion, $query);
$x = 0;

while($data = mysqli_fetch_array($resultado)){ 
    $idpe=$data['id_pers'];
    $id=$data['id_inscorojt'];
$x++;
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $data['id_inscorojt'];?>", "<?php echo  $data['gstNombr'];?>", "<?php echo $data['gstApell']?>","<?php echo $data['adscripcion']?>","<?php echo $data['tipo']?>","<?php echo "<a href='#' title='Ver perfil' onclick='infinsojt($idpe)' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modal-infocoinsojt'><i class='glyphicon glyphicon-user text-success'></i></a> <a href='' title='Ver evaluación de perfil' onclick='editoinsojt()' class='btn btn-default' data-toggle='modal' data-target='#editarinoj'><i class='fa ion-compose text-info'></i></a> <a href='' title='Ver evaluación de perfil' onclick='foevalu()' class='btn btn-default' data-toggle='modal' data-target='#modal-evaperinsoj1'><i class='fa ion-android-clipboard'></i></a> <a href='#' title='Eliminar' onclick='labeespc()' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modal-eliminariojt'><i class='fa fa-trash-o text-danger'></i></a>"; ?>",""

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
            title: "ÁREA DE ADSCRIPCIÓN"
        }, 
        {
            title: "TIPO"
        },
        {
            title: "ACCIONES"
        },
    ],
});

$(document).ready(function() {
  
});

function labeespc(){
    //alert("eliminar")
    $("#data-table-instructores tr").on('click', function() {
      var nombre = "";
      var apellido = "";
      var id = "";
      var tipo = "";
      id += $(this).find('td:eq(0)').html(); //Toma el id 
      nombre += $(this).find('td:eq(1)').html(); //Toma el nombre
      apellido += $(this).find('td:eq(2)').html(); //Toma el apellido
      tipo += $(this).find('td:eq(4)').html(); //Toma el tipo
      document.getElementById('regelim').innerHTML=nombre + ' ' + apellido;
      document.getElementById('id_inscorojt').value=id;
      document.getElementById('id_tipo').value=tipo;
      //alert(id_tarprin);
    }) 
}

function confdelreg(){
    //alert("entro eliminar")
    var id_inscorojt = document.getElementById('id_inscorojt').value;
    var tipo = document.getElementById('id_tipo').value;
    var nombre =document.getElementById('regelim').innerHTML;
    $.ajax({
        data: 'id_inscorojt=' + id_inscorojt + '&tipo=' + tipo + '&nombre=' + nombre + '&opcion=deletereg',
        url: '../php/insertarPersonal.php',
        type: 'post',
        beforeSend: function() {
            //
        },
        success: function(response) {
            if (response == 0) {
              Swal.fire({
                type: 'success',
                text: 'SE ELIMINO DE FORMA CORRECTA',
                showConfirmButton: false,
                timer: 3200,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
            setTimeout("location.href = 'coorinsoj.php';", 1500);

            } else {
                $('#dangedere').toggle('toggle');
                setTimeout(function() {
                    $('#dangedere').toggle('toggle');
                }, 2000);
            }
        }
    }); 
}

function foevalu(){
    //alert("eliminar")
    $("#data-table-instructores tr").on('click', function() {
      var nombre = "";
      var apellido = "";
      var tipo = "";
      nombre += $(this).find('td:eq(1)').html(); //Toma el nombre
      apellido += $(this).find('td:eq(2)').html(); //Toma el apellido
      tipo += $(this).find('td:eq(4)').html(); //Toma el tipo
      document.getElementById('nompoj1').value=nombre + ' ' + apellido;
      document.getElementById('tipooj1').value=tipo;
      //alert(id_tarprin);
    }) 
}

function dateinsedith(){
    //alert("eliminar")
    $("#data-table-instructores tr").on('click', function() {
      var id = "";
      id += $(this).find('td:eq(0)').html(); //Toma el id 
      document.getElementById('id_tipo').value=tipo;
      //alert(id_tarprin);
    }) 
}
//funcion que trae el objetivo del inspect y coordinarj
function editoinsojt(){
    //alert("eliminar")
    $("#data-table-instructores tr").on('click', function() {
      var id = "";
      var nombre = "";
      var apell = "";
      id += $(this).find('td:eq(0)').html(); //Toma el id 
      nombre += $(this).find('td:eq(1)').html(); //Toma el id 
      apell += $(this).find('td:eq(2)').html(); //Toma el id 
      document.getElementById('id_insoj1').value=id;
      document.getElementById('idojtt').innerHTML=nombre + ' ' + apell ;
      //alert(id);
      $.ajax({
          url: '../php/coninsoj.php',
          type: 'POST'
      }).done(function(respuesta) {
          obj = JSON.parse(respuesta);
          var res = obj.data;
          var x = 0;
          for (U = 0; U < res.length; U++) { 
              if (obj.data[U].id_inscorojt == id){
                  datos = 
                  obj.data[U].objetivo + '*' +
                  obj.data[U].tipo ;   
                  var d = datos.split("*");   
                  $("#objeinsojt").val(d[0]);
                  $("#editipo").val(d[1]);
              }
          }
      });
  })    
}
//guardar información
function saveedithin(){
    //alert("entro eliminar")
    var id_inscorojt = document.getElementById('id_insoj1').value;
    var tipo = document.getElementById('editipo').value;
    var objetivo =document.getElementById('objeinsojt').value;
    var nombre =document.getElementById('idojtt').innerHTML;
    //alert(id_inscorojt)
    $.ajax({
        data: 'id_inscorojt=' + id_inscorojt + '&tipo=' + tipo + '&objetivo=' + objetivo + '&nombre=' + nombre + '&opcion=updateins',
        url: '../php/insertarPersonal.php',
        type: 'post',
        beforeSend: function() {
            //
        },
        success: function(response) {
            if (response == 0) {
              Swal.fire({
                type: 'success',
                text: 'SE ACTUALIZO DE FORMA CORRECTA',
                showConfirmButton: false,
                timer: 3200,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
            setTimeout("location.href = 'coorinsoj.php';", 1500);

            } else {
                $('#dangedere').toggle('toggle');
                setTimeout(function() {
                    $('#dangedere').toggle('toggle');
                }, 2000);
            }
        }
    }); 
}

function infinsojt(idpe){
   // alert("entra datos del perfil");
    //alert(idpe);
    //trae la información
    $.ajax({
          url: '../php/conDatosPersonal.php',
          type: 'POST'
      }).done(function(respuesta) {
          obj = JSON.parse(respuesta);
          var res = obj.data;
          var x = 0;
          for (U = 0; U < res.length; U++) { 
              if (obj.data[U].gstIdper == idpe){
                  datos = 
                  obj.data[U].gstNombr + '*' + //nombre
                  obj.data[U].gstApell + '*' + //apellifo

                  obj.data[U].gstAreje + '*' + //direccion ejecutiva
                  obj.data[U].adscripcion + '*' + //direccion de adscripción
                  obj.data[U].descripsub + '*' + //subdirección
                  obj.data[U].descripdep + '*' + //departamento

                  obj.data[U].gstComnd + '*' + //comandancia
                  obj.data[U].gstIDuni + '*' + //aeropuerto

                  obj.data[U].gstNucrt + '*' + //ubicacion
                  obj.data[U].objetivo + '*' + //teltrabajo
                  obj.data[U].gstExTel + '*' + //extension
                  obj.data[U].gstCasa + '*' + //tel casa
                  obj.data[U].gstClulr + '*' + //tel celular
                  obj.data[U].gstCorro + '*' + //correo institucional
                  obj.data[U].gstCinst ;   
                  var d = datos.split("*");   
                  $("#ojtnombre").val(d[0]);
                  $("#ojtapellido").val(d[1]);
                  $("#ojdirejec").val(d[2]);
                  $("#ojtdiradisc").val(d[3]);
                  $("#ojsubdire").val(d[4]);
                  $("#ojtdepart").val(d[5]);
                  $("#ojtcomanda").val(d[6]);
                  $("#ojtaerpuerto").val(d[7]);
                  $("#ojtubicacion").val(d[8]);
                  $("#ojteltrab").val(d[9]);
                  $("#ojtext").val(d[10]);
                  $("#ojtcasa").val(d[11]);
                  $("#ojtcelular").val(d[12]);
                  $("#ojtcorreo").val(d[13]);
                  $("#ojtalternativo").val(d[14]);
              }
          }
      });

    
    
}
</script>
