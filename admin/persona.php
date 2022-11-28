<!DOCTYPE html><?php include ("../conexion/conexion.php");?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Personal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
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
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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

<?php
$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$pais = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$paises = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
$ejecut = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc1 = mysqli_query($conexion,$sql);

// $sql = "SELECT gstIdcat, gstCsigl,gstCatgr FROM categorias WHERE estado = 0 OR estado = 2";
// $categs = mysqli_query($conexion,$sql);

if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){
unset($_SESSION['consulta']);
}
?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php
include('header.php');
?>

        <div class="content-wrapper">

            <section class="content" id="detalles" style="display: none;">
                <div class="row">
                    <?php include('valores.php'); ?>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
            </section>
            <!-- Content Header (Page header) -->
            <section class="content" id="lista">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">

                                <H4>
                                    <label style="font-size: 20px;">LISTA | PERSONAL</label>
                                </H4>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a type="button" href="persona" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div id="refresh">
                                    <table style="width: 100%;" id="data-table-reportes"
                                        class="table display table-striped table-bordered"></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id='modal-asignar'>
            <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-size:19px; color: #000000;">ASIGANCIÓN DEL PUESTO</h4>
                        </div>
                        <div class="modal-body">
                            <form id="Dtall" class="form-horizontal" action="" method="POST">
                                <input type="hidden" name="gstIdper" id="gstIdper">
                                <input type="hidden" name="gstANmpld" id="gstANmpld">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="label2">NOMBRE(S)</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="gstNombr" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">APELLIDO(S)</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="gstApell" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CARGO</label>
                                        <select type="text" class="form-control inputalta" id="AgstCargo"
                                            name="AgstCargo" onchange="asiginspec()">
                                            <option value="">SELECCIONA EL CARGO</option>
                                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                            <option value="COORDINADOR">COORDINADOR</option>
                                            <option value="INSPECTOR">INSPECTOR</option>
                                            <option value="INSTRUCTOR">INSTRUCTOR</option>
                                            <option value="COMISIONADO">COMISIONADO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <H4><i class="fa fa-dot-circle-o"></i><label> INFORMACIÓN DE ADSCRIPCIÓN
                                                </label>
                                            </H4>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label2">DIRECCIÓN EJECUTIVA</label>

                                        <select style="width: 100%" class="form-control"
                                            class="selectpicker disabled inputalta" name="gstAreIDasig"
                                            id="gstAreIDasig" type="text" data-live-search="true" disabled="">
                                            <?php while($ejct = mysqli_fetch_row($ejecut)):?>
                                            <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label2">DIRECCIÓN DE ADSCRIPCIÓN</label>
                                        <select style="width: 100%" class="form-control" class="selectpicker inputalta"
                                            id="gstIDara1" name="gstIDara1" type="text" data-live-search="true"
                                            disabled="">
                                            <?php while($ccion1 = mysqli_fetch_row($direc1)):?>
                                            <option value="<?php echo $ccion1[0]?>"><?php echo $ccion1[1]?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label2">SUBDIRECCIÓN</label>
                                        <div id="subdirect"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label2">DEPARTAMENTO</label>
                                        <div id="departos1"></div>
                                    </div>

                                </div>
                                <!------------------------------------------------------ fucion del empleado-------------------------------------------------------------- -->
                                <div class="box" id="funcionemp" style="display: none">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <H4><i class="fa   fa-suitcase"></i>
                                                    <label> FUNCIÓN DEL EMPLEADO </label>
                                                </H4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: none">
                                        <div class="col-sm-12">
                                            <label>ESPECIALIDAD PRINCIPAL B</label>
                                            <div id="subcategoria"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="label2">ESPECIALIDAD PRINCIPAL</label>
                                            <div id="categoria"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="label2">SELECCIONE COMANDANCIA</label>
                                            <div id="comandancia"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="label2">SELECCIONE AEROPUERTOS</label>
                                            <div id="unidad"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-0 col-sm-12">
                                        <label class="label2">UBICACIÓN CENTRAL EN ASIGNACIÓN</label>
                                        <select style="width: 100%" class="form-control" class="selectpicker"
                                            id="AgstNucrt" name="AgstNucrt" type="text" data-live-search="true">
                                            <option value="">SELECCIONE LA UBICACIÓN CENTRAL</option>
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
                                <!-- ----------------------------------------------------fin funcion del empleado-------------------- -->
                                <div class="form-group"><br>
                                    <div class="col-sm-offset-0 col-sm-5">
                                        <button type="button" id="button"
                                            style="font-size:18px; width:120px; height:40px"
                                            class="btn btn-block btn-primary altaboton"
                                            onclick="asignar();">ACEPTAR</button>
                                    </div>
                                    <b>
                                        <p class="alert alert-danger text-center padding error" id="danger2">Error al
                                            asignar</p>
                                    </b>

                                    <b>
                                        <p class="alert alert-success text-center padding exito" id="succe2">¡Se asignó
                                            con éxito!</p>
                                    </b>

                                    <b>
                                        <p class="alert alert-warning text-center padding aviso" id="empty2">Es
                                            necesario llenar todos los campos</p>
                                    </b>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


<!-- MODAL PERSONAL EXTERNO PERFLI -->

   <div class="modal fade" id='modal-perexterno'>
            <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-size:19px; color: #000000;">DATOS DEL PERSONAL EXTERNOS</h4>
                            <div class="form-group">
                                <button type="button" class="btn btn-box-tool" style="float:right" data-widget="collapse">
                                    <a href='javascript:opediext()' id="openedth" style="font-size:22px;float:right"> <i class="fa fa-edit"></i></a>
                                    <a href='javascript:closext()' id="cerreth" style="display:none;font-size: 22px;float:right"> <i class="fa fa-ban"></i></a>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form id="perexterna1" class="form-horizontal" action="" method="POST">
                                <input type="hidden" name="gstIdper1" id="gstIdper1">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="label2">*NOMBRE(S)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstNombr1" name='gstNombr1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">*APELLIDO(S)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstApell1" name='gstApell1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">*TIPO DE PERSONA</label>
                                        <select type="text" class="form-control inputalta" id="gstLunac1" name="gstLunac1" disabled="">
                                            <option value="">SELECCIONA EL CARGO</option>
                                            <option value="NACIONAL">NACIONAL</option>
                                            <option value="INTERNACIONAL">INTERNACIONAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="nacional" name="nacional">
                                    <div class="col-sm-4">
                                        <label class="label2">CURP</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstCurp1" name='gstCurp1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">RFC</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstRfc1" name='gstRfc1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ESTADO</label>
                                        <select type="text" class="form-control inputalta" id="gstStado1" name="gstStado1" disabled="">
                                            <option value="">SELECCIONA EL ESTADO</option>
                                            <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                                            <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                                            <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                                            <option value="CAMPECHE">CAMPECHE</option>
                                            <option value="COAHUILA">COAHUILA</option>
                                            <option value="COLIMA">COLIMA</option>
                                            <option value="CHIAPAS">CHIAPAS</option>
                                            <option value="CHIHUAHUA">CHIHUAHUA</option>
                                            <option value="DISTRITO FEDERAL">CIUDAD DE MÉXICO</option>
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
                                        <select type="text" class="form-control inputalta" id="gstSexo1" name="gstSexo1" disabled="">
                                            <option value="">ELIGIR EL SEXO</option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ORGANIZACIÓN (INSTITUCIÓN)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="sgtCrhnt2" name='sgtCrhnt2' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ÁERA DE ADSCRIPCIÓN</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstRusp2" name='gstRusp2' disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>*PERFIL</label>
                                        <input type="text" class="form-control" value="EXTERNO" disabled="">
                                        <input type="hidden" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstIDCat1" name='gstIDCat1'>                                        
                                        <!-- <select data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO" style="width: 100%;color: #000" class="form-control select2" type="text" class="form-control" id="gstIDCat1" name="gstIDCat1" disabled="">
                                        <option value="" selected>SELECCIONE ESPECIALIDAD</option><br>
                                            <?php //while($cat = mysqli_fetch_row($categs)):?>
                                        <option value="<?php //echo $cat[0]?>"><?php //echo $cat[1]?> -
                                            <?php //echo $cat[2]?></option>
                                            <?php// endwhile; ?>
                                        </select> -->
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
                                            <input type="text" class="form-control inputalta" id="gstCasa1" name="gstCasa1" placeholder="(55) 5555-5555"  autocomplete="off" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CELULAR</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control inputalta" id="gstClulr1" name="gstClulr1" placeholder="(52) 55-5555-5555" autocomplete="off" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-container">
                                        <label class="label2">*CORREO PERSONAL </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> <i class="ion-ios-checkmark iconoInput" id="labelvalidcor" style="display:none;" disabled=""></i>                              
                                                <i class="ion-ios-checkmark iconoInput" id="labelvalidcor" style="display:none;"></i>         
                                                <i class="ion-ios-close iconoInput" id="labelinvarfcor" style=" color: #F10C25; display:none;"></i>
                                                <input onkeyup="mayus(this);" type="text" class="form-control inputalta" placeholder="correo@correo.com" id="gstCorro1" name="gstCorro1" disabled="">
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 ">
                                        <label class="label2">CORREO ALTERNATIVO</label>
                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input onkeyup="mayus(this);" type="email" class="form-control inputalta" placeholder="correo@correo.com" id="gstSpcID1" name="gstSpcID1" disabled="">
                                        </div>
                                    </div>
                                </div>                    
                                <!-- ----------------------------------------------------fin funcion del empleado-------------------- -->
                                <div class="form-group"><br>
                                    <div class="col-sm-offset-0 col-sm-5">
                                        <button type="button" id="button1" style="font-size:18px; width:120px; height:40px; display:none;" class="btn btn-block btn-primary altaboton" onclick="edithperext()">ACEPTAR</button>     
                                    </div>
                                    <b>
                                        <p class="alert alert-danger text-center padding error" id="dangeractu">Error al guardar los cambios</p>
                                    </b>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php include('agrStdPro.php');?>

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

            <strong>AFAC &copy; 2021 <a style="color:#3c8dbc" href="https://www.gob.mx/afac">Agencia Federal de Aviación
                    Cilvil</a>.</strong> Todos los derechos Reservados DDE
            .
        </footer>

        <?php include('panel.html');?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>


    </div>

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
    <script src="../js/datos.json"></script>

</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    // $('#gsdirec').select2();
    $('#gstPrfil').select2();
    $('#gstAreID').select2();
    $('#gstPstID').select2();
    $('#gstIDpai').select2();
    $('#AgstIDpai').select2();
    $('#AgstIDCat').select2();
    $('#AgstIDuni').select2();
    $('#AgstIDSub').select2();
    $('#comandancia').load('select/buscacomandancia.php'); //Comandancia actualizar
    $('#unidad').load('select/tablaunidad.php')

    $('#comandan').load('select/buscacom.php');
    $('#select3').load('select/tablacom.php');
    $('#categoria').load('select/buscatego.php');
    $('#subcategoria').load('select/tabsubcat.php');
    $('#subdirect').load('select/buscardepart.php'); //Subdirección
    $('#departos1').load('select/tabladep.php'); //departamento



});
</script>
<script src="../js/select2.js"></script>
<?php $id = $_GET['data']; ?>
<script type="text/javascript">
    <?php echo "var jsvar ='$id';"; ?>
    usuarios(jsvar);
    function usuarios(jsvar){
        if(jsvar!=''){
            perfil(jsvar);
            openDtlls();        
        }
    }

</script>

<script type="text/javascript">
    $("#perosnas").show();
var dataSet = [
    <?php 
$query = "SELECT * FROM personal WHERE estado = 0 OR estado = 3 ORDER BY gstIdper DESC";
$resultado = mysqli_query($conexion, $query);

      while($data = mysqli_fetch_array($resultado)){ 
      if($data['gstCargo']== '0'){
        $datosCargo = "SIN ASIGNAR";
      } else {
        $datosCargo = $data['gstCargo'];
      }
      if($data['estado'] == 0){
        $estado = "INTERNO"; 
    }else if($data['estado'] == 3){
        $estado = "EXTERNO";
    }
    if($data['gstNmpld'] == 0){
      $empleado = "S/N"; 
  }else{
      $empleado = $data['gstNmpld'];
  }
      $gstIdper = $data['gstIdper'];
      $gstNmpld = $data['gstNmpld'];
      

if($data['estado'] == 0){ ?>["<?php echo $empleado?>", "<?php echo  $data['gstNombr']?>",
        "<?php echo $data['gstApell']?>", "<?php echo $datosCargo ?>", "<?php echo $estado ?>",
        <?php if($data['gstCargo']=='NUEVO INGRESO'){?> "<a type='button' title='Asignar' onclick='asignacion(<?php echo $gstIdper ?>)' class='btn btn-warning' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR </a> <a href='javascript:openDtlls()' title='Perfil' onclick='perfil(<?php echo $gstIdper ?>)' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio(<?php echo $gstIdper.'.'.$gstNmpld ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion(<?php echo $gstIdper.'.'.$gstNmpld ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a> <a type='button' title='Baja de usuario' onclick='bajaUsu(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-baja'><i class='fa fa-user-times text-red'></i></a>"
        <?php }else{?>
        //"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"
        " <a class='label label-success' style='font-weight: bold; height: 50px; font-size: 13px;'> ASIGNADO</a> <a href='javascript:openDtlls()' title='Perfil' onclick='perfil(<?php echo $gstIdper ?>)' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio(<?php echo $gstIdper.'.'.$gstNmpld ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion(<?php echo $gstIdper.'.'.$gstNmpld ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a> <a type='button' title='Baja de usuario' onclick='bajaUsu(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-baja'><i class='fa fa-user-times text-red'></i></a>"

        <?php } ?>

    ],
    <?php } else if($data['estado'] == 3){ ?>["<?php echo $empleado?>", "<?php echo  $data['gstNombr']?>",
        "<?php echo $data['gstApell']?>", "<?php echo $datosCargo ?>", "<?php echo $estado ?>", "<a href='' title='Ver perfil' onclick='perperexter(<?php echo $gstIdper ?>)' class='datos btn btn-default' data-toggle='modal' data-target='#modal-perexterno'><i class='glyphicon glyphicon-user text-success'></i></a>  <a href='' title='Ver detalle de cursos' onclick='perexterna(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-curexten'><i class='fa fa ion-easel text-info'></i></a>  <a type='button' title='Eliminar' onclick='deletexter(<?php echo $gstIdper ?>)' class='btn btn-default' data-toggle='modal' data-target='#modal-bajaex'><i class='fa fa-user-times text-red'></i></a>"
    ],



    // <a href="#" onclick="borrararc(&quot;130*1345*ESCULA PRUEBA*MEX*BNOSE*../documento/123456/Estudio/PRUEBA5.pdf*130&quot;);" type="button" style="margin-left:2px" title="Borrar documento" class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminardoc"><i class="fa fa-trash-o text-danger"></i></a>
    <?php } ?>
    <?php } ?>
];

var tableGenerarReporte = $('#data-table-reportes').DataTable({
    "order": [
        [3, "desc"]
    ],
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "ID"
        },
        {
            title: "NOMBRE(S)"
        },
        {
            title: "APELLIDO(S)"
        },
        {
            title: "CARGO"
        },
        {
            title: "PERSONAL"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

function perexterna(gstIdper) {

var idpersona1 = document.getElementById('insperext').value =gstIdper;

        $.ajax({
            url: '../php/infopersext.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            //alert(idpersona1)
            var n = 0;
            for (R = 0; R < res.length; R++){
                if (obj.data[R].gstIdper == gstIdper){
                $("#inexnomebre").val(obj.data[R].gstNombr + "  " + obj.data[R].gstApell);
                }
            }
        });
//TABLA DE CURSOS COMO INSTRUCTOR

    $.ajax({
        url: '../php/curosperext.php',  
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cursextper" class="table table-bordered table-striped" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CODIGO</th><th><i></i>CURSO</th><th><i></i>INICIO</th><th><i></i>FIN</th><th><i></i>ESTATUS</th></tr></thead><tbody>';
        for (V = 0; V < res.length; V++) {   
            if (obj.data[V].idinsp == idpersona1) {   
                x++;
                html += "<tr><td>" + x + "</td><td>" + obj.data[V].codigo + "</td><td>" + obj.data[V].gstTitlo + "</td><td>" + obj.data[V].fcurso + "</td><td>" + obj.data[V].fechaf + "</td><td>" + obj.data[V].proceso + "</td></td></tr>";
            } else {}
        }
        html += '</tbody></table></div></div></div>';
        $("#cursextern").html(html);
        $('#cursextper').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior",
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"         
            },
        },
    });            
})
}
</script>