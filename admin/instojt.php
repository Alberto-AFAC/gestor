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
      <link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
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
                    <i class="fa  ion-android-person"></i>   ALTA DE COORDINADORES / INSTRUCTORES OJT
                </h1>
            </section>
            <?php
 
 $sql = "SELECT gstIdper, gstNombr, gstApell FROM personal WHERE estado = 0 ORDER BY gstNombr, gstApell desc";
 $instructor = mysqli_query($conexion,$sql);



?>

            <section class="content">

                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myNavTabs">
                                <!-- <li class="active"><a href="#tablaExterno" data-toggle="tab">INSTRUCTORES</a> -->
                                <!-- <li><a href="#altaExterno" data-toggle="tab">ALTA</a> -->
                            </ul>
                            <!-- /.col -->
                            <div class="tab-content">
                                <!-- <div class="tab-pane" id="tablaExterno"> <br>
                                    <table style="width: 100%;" id="data-table-instructoresExt"
                                        class="table table-striped table-hover"></table>
                                </div> -->
                                <br><br>
                                <div class="tab-pane fade in active" id="altaExterno">
                                    <!-- Post -->
                                    <div class="post">
                                        <form id="personal-ext" class="form-horizontal" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="label2">*PERSONA</label>
                                                    <select id="instojpri" name="instojpri" onchange="llenad()" class="form-control" data-placeholder="SELECCIONE A LA PERSONA">
                                                        <option value="">SELECCIONE A LA PERSONA</option>
                                                        <?php while($instructors = mysqli_fetch_row($instructor)):?>
                                                        <option value="<?php echo $instructors[0]?>">
                                                            <?php echo $instructors[1].' '.$instructors[2]?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="label2">*TIPO DE INSTRUCTOR</label>
                                                    <select type="text" class="form-control inputalta" id="gsttipoins" name="gsttipoins">
                                                        <option value="0" selected>ELEGIR UNA OPCIÓN</option>
                                                        <option value="COORDINADOR OJT">COORDINADOR OJT</option>
                                                        <option value="INSTRUCTOR PRINCIPAL OJT">INSTRUCTOR PRINCIPAL OJT</option>
                                                        <option value="INSTRUCTOR OJT">INSTRUCTOR OJT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                        <div class="hidden col-sm-12">
                                            <label class="label2">OBJETIVO</label>
                                            <textarea onkeyup="mayus(this);" rows="3" class="form-control" name="insobjet" id="insobjet" placeholder="Ingresa el objetivo">0</textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="hidden"
                                                id="gstIDCat" name="gstIDCat" value="33">
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
                                                        <input type="text" disabled="" class="form-control inputalta" id="gstCasaojt" name="gstCasaojt" placeholder="(55) 5555-5555" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="label2">CELULAR</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" class="form-control inputalta" id="gstClulrojt" name="gstClulrojt" placeholder="(52) 55-5555-5555" autocomplete="off" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-container">
                                                    <label class="label2">CORREO INSTITUCIONAL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <i class="ion-ios-checkmark iconoInput" id="labelvalidcor" style="display:none;"></i>
                                                        <i class="ion-ios-close iconoInput" id="labelinvarfcor" style=" color: #F10C25; display:none;"></i>
                                                        <input onkeyup="mayus(this);" disabled="" type="text" class="form-control inputalta" placeholder="correo@correo.com" id="gstCorroojt" name="gstCorroojt">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 ">
                                                    <label class="label2">CORREO PERSONAL / ALTERNATIVO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input onkeyup="mayus(this);" type="email" disabled="" class="form-control inputalta" placeholder="correo@correo.com" id="gstinstojt" name="gstinstojt">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-2 ">
                                                    <a class="btn btn-block btn-primary btn-lm"  id="btnperfil" onclick="infperfi()" style="display:none;" data-toggle='modal' data-target='#modal-evaperinsoj' title="Dar clic para evaluar" href="" style=""><i class="fa fa-check"></i> VALIDAR PERFIL</a>
                                                        <!-- <button type="button" title="AGREGAR PERSONA EXTERNA" style="display:;" class="btn btn-block btn-primary" onclick=""><a style="color: #fff;" data-toggle="tab">VALIDAR PERFIL</a></button> -->
                                                </div>
                                                <br> <br> <br> <br>
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-offset-0 col-sm-2">
                                                            <button type="button" title="Dar clic para agregar" id="inserperfil" style="display:none;" class="btn btn-block btn-primary botonnet" onclick="saveinsoj()"><a style="color: #fff;" data-toggle="tab">ACEPTAR</a></button>
                                                        </div>
                                                    </div>
                                                    <b>
                                                        <p class="alert alert-danger text-center padding error" id="danger2oj">Error al agregar</p></b>
                                                    <b>
                                                        <p class="alert alert-warning text-center padding aviso" id="succe2oj">¡La persona ya esta asigana con ese cargo!</p>
                                                    </b>
                                                    <b>
                                                        <p class="alert alert-warning text-center padding aviso" id="empty2oj">Es necesario llenar todos los campos</p>
                                                    </b>
                                                </div>
                                        </form>
                                        <br>
                                        </script>
                                    </div>
                                    <div class="post">
                                        <ul class="list-inline">
                                        </ul>
                                    </div>
                                    <!-- /.post -->
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

                             <!-------------------------------------------MODAL EDITAR------------------------------------------------------>

        <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
        <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal fade" id="modal-evaperinsoj">
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
                                <div class="col-sm-2">
                                    <label>ID:</label>
                                    <input type="text" name="id_percum" id="id_percum" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-7">
                                    <label>PERSONA:</label>
                                    <input type="text" name="nompoj" id="nompoj" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label>TIPO:</label>
                                    <input type="text" name="tipooj" id="tipooj" style="text-transform:uppercase;" class="form-control disabled" disabled="">
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
                                                <td><i class="" id="che1OJ" style="color:green; font-size: 16pt"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td>EXPERIENCIA TÉCNICA EN LAS TAREAS ESPECÍFICAS RELACIONADAS CON LA CAPACITACIÓN A SER IMPARTIDO PARA LA HABILITACIÓN DE UN INSPECTOR POR MEDIO DEL OJT.</td>
                                                <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check2c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                           </tr>
                                           <tr>
                                               <td>EXPERIENCIA Y CONOCIMIENTOS CON LOS MÓDULOS DE CAPACITACIÓN ESPECÍFICO CON LOS CUALES SE ADELANTA EL OJT.</td>
                                               <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check3c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>HABER REALIZADO LOS OJT CORRESPONDIENTES A LAS TAREAS QUE SERÁN IMPARTIDAS A TRAVÉS DE LA CAPACITACIÓN OJT.</td>
                                                <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check4c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>HABILIDADES INTERPERSONALES, DE COMUNICACIÓN, DE ESCUCHA, DE PACIENCIA Y ACCESIBILIDAD.</td>
                                                <td><input style="width:16px; height:16px;" value="SI" type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>INTERÉS EN PARTICIPAR EN LOS PROCESOS DE ADIESTRAMIENTO OJT.</td>
                                                <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>RESPETO POR SUS COMPAÑEROS.</td>
                                                <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>BUENA DISPOSICIÓN PARA SEGUIR LAS DIRECTRICES DEL ADIESTRAMIENTO OJT.</td>
                                                <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                            <tr>
                                                <td>HABER SIDO DESIGNADO POR LA DIRECCIÓN DE ÁREA, COMANDANCIA REGIONAL, AICM Y AIFA, POR MEDIO DE UN OFICIO.</td>
                                                <td><input style="width:16px; height:16px;" value="SI"  type="checkbox" name="cap[]" /> <span></span></td>
                                                <!-- <td><i class="" id="check5c" disabled style="color:green; font-size: 16pt"></i></span></td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                            <button type="button" id="btnevalur" style="" onclick="evalincoojt()" class="btn btn-primary">ACEPTAR</button>
                        </div>
                        <br>
                        <b>
                            <p class="alert alert-danger text-center padding error" id="dangerevoj">Error al agregar</p></b>
                        <b>
                            <p class="alert alert-warning text-center padding aviso" id="succeevoj">¡La persona ya esta asigana con ese cargo!</p>
                        </b>
                        <b>
                            <p class="alert alert-warning text-center padding aviso" id="emptyevoj">Es necesario llenar todos los campos</p>
                        </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

                            
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#instojpri').select2();
        });
        
    </script>
    <script type="text/javascript">
        function llenad(){
          //  alert("entra")
            var indiscoord = document.getElementById('instojpri').value; 
            var bten = document.getElementById('btnperfil').style.display = '';
            $.ajax({
                url: '../php/conPerson.php',
                type: 'POST'
            }).done(function(respuesta) {
                obj = JSON.parse(respuesta);
            var res = obj.data;
            var x = 0;
            for (D = 0; D < res.length; D++) { 
                if (obj.data[D].gstIdper == indiscoord){
                 // alert(indiscoord);
                  datos = 
                  obj.data[D].gstCasa + '*' +
                  obj.data[D].gstClulr + '*' +
                  obj.data[D].gstCinst + '*' +
                  obj.data[D].gstCorro;    
                  var o = datos.split("*");   
                  $("#gstCasaojt").val(o[0]);   
                  $("#gstClulrojt").val(o[1]);
                  $("#gstCorroojt").val(o[2]);
                  $("#gstinstojt").val(o[3]); 
                }
            }
            });
        }
        //LLENA LA INFORMACIÓN DEL MODAL EVALIAR PERFIL
        function infperfi(){
          //  alert("entra")
            var indiscoord = document.getElementById('instojpri').value; 
            document.getElementById('id_percum').value = indiscoord
            document.getElementById('tipooj').value = document.getElementById('gsttipoins').value

            $.ajax({
                url: '../php/conPerson.php',
                type: 'POST'
            }).done(function(respuesta) {
                obj = JSON.parse(respuesta);
            var res = obj.data;
            var x = 0;
            for (D = 0; D < res.length; D++) { 
                if (obj.data[D].gstIdper == indiscoord){
                 // alert(id_persona);
                  datos = 
                  obj.data[D].gstNombr + '*' +
                  obj.data[D].gstApell;    
                  var o = datos.split("*");   
                  $("#nompoj").val(o[0] + o[1] );   
                }
            }
            });
        }
        //guarda el instructor externos
        function saveinsoj(){
            //alert("entra guardar instructor externo");
            var id_pers = document.getElementById('instojpri').value; 
            var tipo = document.getElementById('gsttipoins').value;
            var objetivo = document.getElementById('insobjet').value;
            if (id_pers == '' || tipo == '') {
                $('#empty2oj').toggle('toggle');
                setTimeout(function() {
                    $('#empty2oj').toggle('toggle');
                }, 2000);
                return;
            }else{
            $.ajax({
                data: 'id_pers=' + id_pers + '&tipo=' + tipo + '&objetivo=' + objetivo + '&opcion=insinpojt',
                url: '../php/insertarPersonal.php',
                type: 'post',
                beforeSend: function() {
                },
                success: function(response) {
                    if (response == 0) {
                        Swal.fire({
                            type: 'success',
                            text: 'SE AGREGO DE FORMA EXITOSA',
                            showCloseButton: false,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonColor: "#1774D8",
                    customClass: 'swal-wide',
                    confirmButtonText: '<span style="color: white;"><a class="a-alert" href="instojt">¿Deseas agregar otro registro?</a></span>',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<a  class="a-alert" href="coorinsoj.php"><span style="color: white;">Cerrar</span></a>',
                    cancelButtonAriaLabel: 'Thumbs down'
                        });
                        //setTimeout("location.href = 'tareas.php';", 1500);
                    }else if(response == 2){
                        $('#succe2oj').toggle('toggle');
                            setTimeout(function() {
                                $('#succe2oj').toggle('toggle');
                            }, 2000);
                    }else{
                        $('#danger2oj').toggle('toggle');
                            setTimeout(function() {
                                $('#danger2oj').toggle('toggle');
                            }, 2000);
                        
                    }
                }
            }); 
        }
    }
    //Funcion para evaluar al inctructor o cordinador de OJT
    function evalincoojt() {
        var suma = 0;
        var los_cboxes = document.getElementsByName('cap[]'); 
        for (var i = 0, j = los_cboxes.length; i < j; i++) {  
            if(los_cboxes[i].checked == true){
                suma++;
            }
        }
        if(suma < 8){
            //alert('debe seleccionar todas las casilla');
            $('#emptyevoj').toggle('toggle');
            setTimeout(function() {
                $('#emptyevoj').toggle('toggle');
            }, 1500);
            return false;
        }else{
            //alert(suma);
            var indiscoord = document.getElementById('inserperfil').style.display = '';
            //alerta de actualización
            Swal.fire({
                type: 'success',
                text: 'SE EVALUO CORRECTAMENTE',
                showConfirmButton: false,
                timer: 1200,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
            $('#modal-evaperinsoj').modal('hide');

        } 
    }
    

    

    function geneveal(cursos) {
    // var cer = cursos.split("*");

    //alert(cursos);

    $.ajax({
        url: '../php/conCurcons.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (K = 0; K < res.length; K++) {

            codigoC = obj.data[K].id_codigocurso.substr(2);

            if (obj.data[K].gstIdper + '.' + codigoC == cursos) {
                //   alert(cer[22]);


                // //alert(cer[22]);
                $("#evaNombrc").val(obj.data[K].gstNombr + " " + obj.data[K].gstApell); //NOMBRE COMPLETO
                //$("#idperonc").val(obj.data[K].gstTitlo); //NOMBRE DEL CURSO
                $("#id_cursoc").val(obj.data[K].codigo); //ID DEL CURSO
                // $("#idinsevc1").val(cer[22]); //ID DEL LA PERSONA

                //alert(obj.data[K].gstTitlo);

                if (((obj.data[K].evaluacion) >= 80) && ((obj.data[K].evaluacion) <= 100)) {
                    document.getElementById("che6").className = "fa fa-check";
                    document.getElementById("che6").style = "color:green; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                } else {
                    document.getElementById("che6").className = "fa fa-clock-o";
                    document.getElementById("che6").style = "color:#CD8704; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }

                if (((obj.data[K].evaluacion) < 80) && ((obj.data[K].evaluacion) > 0)) {
                    document.getElementById("che6").className = "fa fa-times";
                    document.getElementById("che6").style = "color:#C52808; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }
                if (obj.data[K].confirmar == "CONFIRMADO") {
                    //che1.style.display = '';
                    document.getElementById("che1").className = "fa fa-check";
                    document.getElementById("che1").style = "color:green; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                } else {
                    //che1.style.display = 'none';
                    document.getElementById("che1").className = "fa fa-clock-o";
                    document.getElementById("che1").style = "color:#CD8704; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }
                if (obj.data[K].listregis == 'SI') {
                    document.getElementById("check2c").className = "fa fa-check";
                    document.getElementById("check2c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check2c").className = "fa fa-clock-o";
                    document.getElementById("check2c").style = "color:#CD8704; font-size: 16pt";

                }
                if (obj.data[K].lisasisten == 'SI') {
                    document.getElementById("check3c").className = "fa fa-check";
                    document.getElementById("check3c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check3c").className = "fa fa-clock-o";
                    document.getElementById("check3c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].listreportein == 'SI') {
                    document.getElementById("check4c").className = "fa fa-check";
                    document.getElementById("check4c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check4c").className = "fa fa-clock-o";
                    document.getElementById("check4c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].cartdescrip == 'SI') {
                    document.getElementById("check5c").className = "fa fa-check";
                    document.getElementById("check5c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check5c").className = "fa fa-clock-o";
                    document.getElementById("check5c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].regponde == 'SI') {
                    document.getElementById("check7c").className = "fa fa-check";
                    document.getElementById("check7c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check7c").className = "fa fa-clock-o";
                    document.getElementById("check7c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].infinal == 'SI') {
                    document.getElementById("check8c").className = "fa fa-check";
                    document.getElementById("check8c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check8c").className = "fa fa-clock-o";
                    document.getElementById("check8c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].evreaccion == 'SI') {
                    document.getElementById("check9c").className = "fa fa-check";
                    document.getElementById("check9c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check9c").className = "fa fa-clock-o";
                    document.getElementById("check9c").style = "color:#CD8704; font-size: 16pt";
                }
            }
        }
    })

}
    </script>
</body>

</html>