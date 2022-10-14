<!DOCTYPE html>
<?php include ("../conexion/conexion.php");
session_start();

    if (isset($_SESSION['usuario'])) {


    }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
         //   header('Location: ../');
        }

        $id = $_SESSION['usuario']['id_usu'];
        $query="SELECT * FROM privilegio WHERE n_empleado = $id AND estado = 0";
        $resultado= mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
        // header('Location: ../');

        }else{  
        }

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Asignación de Accesos</title>
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
    <script src="dist/js/sweetalert2.all.min.js"></script>
    <link href="dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <style>
        .swal-wide {
            width: 500px !important;
            font-size: 16px !important;
        }
        #buton{
            background: green; 
            color: white; 
            float: left; 
            border-radius: 10px;  
            border-right: 4px solid white;
            border-left: 4px solid white;
            border-top: 4px solid white;
            border-bottom: 4px solid white;
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
                    <?php include('../admin/valores.php'); ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <section class="content" id="lista">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">ASIGNACIÓN DE ACCESOS</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="./" class="btn btn-default btn-sm"><i
                                            class="fa fa-refresh"></i></a>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                </div>


                                <div class="box-body">
                                    <table style="width: 100%;" id="data-table-instructores"
                                    class="table table-striped table-hover"></table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>

            <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">

                <div class="modal fade" id="editarAccesos" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-size: 20px;float: left;" class="modal-title" id="editarAccesosLabel">ACTUALIZAR CREDENCIALES DE ACCESO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idAccesos" name="idAccesos">
                                <input type="hidden" id="idUser" name="idUser">
                                <input type="hidden" id="opcion" name="opcion" value="acceso">
                                
                                <div class="col-sm-6">
                                    <label>NOMBRE COMPLETO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nombUser"
                                    name="nombUser" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>NUMERO DE EMPLEADO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nEmpleado"
                                    name="nEmpleado" disabled="">
                                </div>

                                <div class="col-sm-6"><br>
                                    <label>USUARIO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="usuario"
                                    name="usuario">
                                </div>
                                <div class="col-sm-6"><br>
                                    <label>PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="new-password" minlength="6">
                                        <div class="input-group-addon input-group-append toggle-password">
                                            <i class="fa fa-eye toggle-password">
                                            </i>
                                        </div>
                                    </div>
                                </div>
<!--                                 <div class="col-sm-6"><br>
                                    <label>SELECCIONE PRIVILEGIOS</label>
                                    <select style="width: 100%" class="form-control" class="selectpicker"
                                    name="privilegios" id="privilegios" type="text" data-live-search="true">
                                    <option value="0" selected>SELECCIONE...</option>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                    <option value="COORDINADOR">COORDINADOR</option>
                                    <option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
                                    <option value="DIRECTOR">DIRECTOR</option>
                                    <option value="EJECUTIVO">EJECUTIVO</option>
                                    <option value="HUMANOS">HUMANOS</option>    
                                    <option value="INSTRUCTOR">INSTRUCTOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>                
                                    <option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" onclick="modificar();" class="btn btn-primary">ACEPTAR</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    <?php //include('panel.html');?>
    <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<form id="EditAcceso" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">

    <div class="modal fade" id="mostrarPriv" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 style="font-size: 20px;" class="modal-title" id="editarAccesosLabel">PRIVILEGIOS DE ACCESO</h5> -->
<!--                     onclick="window.location.href='accesospriv'"
-->                    
<h4 style="float: left;"><span class="bg-default">PRIVILEGIOS DE ACCESO</span></h4>
<button type="button" class="close" onclick="vaciar()" data-dismiss="modal" aria-label="Close" >
    <span aria-hidden="true">&times;</span>
</button>
<input type="hidden" name="id_usua" id="id_usua">
<input type="hidden" name="opcion" id="opcion" value="agr_acceso">
</div>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li id="1"><a href="#primera" onclick="uno()" data-toggle="tab">GESTOR</a></li>
        <li id="2"><a href="#segunda" onclick="dos()" data-toggle="tab">LINGÜISTICA</a></li>
        <li id="3"><a href="#tercera" onclick="tre()" data-toggle="tab">MESA DE AYUDA</a></li>
        <li id="4"><a href="#cuarto" onclick="cua()" data-toggle="tab">ACCESOS</a></li>        
    </ul>
    <div class="tab-content">
        <div id="primera" >
            <!-- Post -->
            <div class="box box-info">

                <!-- /.box-header -->
                <div class="box-body" id="uno">
                    <div class="col-sm-12"><br>
                    <label>SELECCIONE PRIVILEGIOS</label>
                    <select class="form-control" class="selectpicker"
                    name="privi_gestor" id="privi_gestor" type="text" data-live-search="true">
                    <option value="0" selected>SELECCIONE...</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                    <option value="COORDINADOR">COORDINADOR</option>
                    <option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
                    <option value="DIRECTOR">DIRECTOR</option>
                    <option value="EJECUTIVO">EJECUTIVO</option>
                    <option value="HUMANOS">HUMANOS</option>    
                    <option value="INSTRUCTOR">INSTRUCTOR</option>
                    <option value="INSPECTOR">INSPECTOR</option>                
                    <option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.tab-pane -->
            <div id="segunda">
                <!-- The timeline -->
                <!-- timeline time label LINGÜÍSTICA-->
                <div class="box box-info">
                <div class="box-body" id="dos">
                <div class="col-sm-12"><br>
                <label>SELECCIONE PRIVILEGIOS</label>
                <select style="width: 100%" class="form-control" class="selectpicker"
                name="privi_lingui" id="privi_lingui" type="text" data-live-search="true">
                <option value="x" selected>SIN ACCESO</option>
                <option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="EVALUADOR">EVALUADOR</option>
                <option value="LICENCIAS">LICENCIAS</option>
                </select>
                </div>
                </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div id="tercera">
                <div class="box box-info">
                    <div class="box-body" id="tres">
                        <div class="col-sm-12"><br>
                        <label>SELECCIONE PRIVILEGIOS</label>
                        <select style="width: 100%" class="form-control" class="selectpicker"
                        name="privi_mesa" id="privi_mesa" type="text" data-live-search="true">
                        <option value="0" selected>SELECCIONE...</option>
                        <option value="super_admin">SUPER ADMINISTRADOR</option>
                        <option value="admin">ADMINISTRADOR</option>                        
                        <option value="tecnico">TÉCNICO</option>
                        <option value="x">USUARIO</option>

                        </select>
                        </div>
                    </div>                
                </div>            
            </div>

            <div id="cuarto">
                <div class="box box-info">
                    <div class="box-body" id="cuatro">
                        <div class="col-sm-12"><br>
                        <label>SELECCIONE PRIVILEGIOS</label>
                        <select style="width: 100%" class="form-control" class="selectpicker"
                        name="privi_acces" id="privi_acces" type="text" data-live-search="true">
                        <option value="x" selected>SIN ACCESO</option>
                        <option value="super_admin">SUPER ADMINISTRADOR</option>
                        </select>
                        </div>
                    </div>                
                </div>            
            </div>
            <!-- /.tab-pane -->
        <div class="modal-footer">
        <button type="button" onclick="vaciar()" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" onclick="acceso()" class="btn btn-primary">ACEPTAR</button>
        </div>


<!--             <div class="col-sm-2">
                <button type="button" onclick="modificar();" class="btn btn-primary">ACEPTAR</button>
            </div> -->
<!--                 <div class="col-sm-2">
                <button type="button"  style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" class="close" onclick="vaciar()" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">SALIR</span>
                </button>

                </div> -->

        </div>
        <!-- /.tab-content -->
    </div>
</div>
</div>
</div>
</form>
<!-- ./wrapper -->
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
       $(document).ready(function() {
        $.fn.dataTableExt.errMode = 'ignore';   
    var dataSet = [
    <?php 
    $query = "SELECT * FROM accesos
    INNER JOIN personal ON id_usu = gstIdper WHERE personal.estado = 0";
    $resultado = mysqli_query($conexion, $query);
    while($data = mysqli_fetch_array($resultado)){ 
        $id = $data['id_usu'];
        $acceso = $data['id_accesos'] ?>
        // 1 SUPER_ADMIN
        // 2 ADMINISTRADOR
        // 3 EJECUTIVO
        // 4 DIRECTOR
        // 5 HUMANOS
        // 6 ADMINISTRATIVO
        // 7 INSPECTOR
        // 8 INSTRUCTOR
        // 9 NUEVO INGRESO
["<?php echo $data[1]?>", "<?php echo $data[10]." ".$data[11]?>", "<?php echo $data[33]?>","<?php echo $data[2]?>",

    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos({$data[1]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"

,
"<?php echo "<a title='Editar técnico' onclick='datos_editar({$acceso})' type='button' data-toggle='modal' data-target='#editarAccesos' class='editar btn btn-default'><i class='fa fa-lock text-success'></i></a>"?>"
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
        title: "NOMBRE"
    },
    {
        title: "# EMPLEADO"
    },
    {
        title: "USUARIO"
    },
    {
        title: "PRIVILEGIOS"
    },        
    {
        title: "ACCIÓN"
    }
    ],
});
});

// FUNCTION PARA EDITAR
function datos_editar(acceso) {

     $("#Editar").slideDown("slow");
    $("#cuadro1").hide("slow");

    $.ajax({
        url: '../php/accesos-list.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_accesos == acceso) {               

                var
                id_usu = $("#editarAccesos #idAccesos").val(obj.data[i].id_accesos),
                id_usu = $("#editarAccesos #idUser").val(obj.data[i].id_usu),
                privilg = $("#editarAccesos #nombUser").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell),
                mEmpleado = $("#editarAccesos #nEmpleado").val(obj.data[i].gstNmpld),
                password = $("#editarAccesos #password").val(obj.data[i].password),
                usuario = $("#editarAccesos #usuario").val(obj.data[i].usuario),
                password = $("#editarAccesos #privilegios").val(obj.data[i].privilegios);
                // opcion = $("#editarAccesos #opcion").val("modificar");
            }
        }
    })
}

//Funcion de acceso
function acceso(){
    var frmAcc = $("#EditAcceso").serialize();
    $.ajax({
        url: "../php/accesos-update.php",
        type: 'POST',
        data: frmAcc 
    }).done(function(respuesta) {

            if (respuesta == 0) {
            Swal.fire({
                    type: 'success',
                    text: 'PRIVILEGIOS ACTUALIZADOS CORRECTAMENTE',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
                    rgba(100, 100, 100, 0.4)`
            });
            setTimeout("location.href = './';", 2000);
                }else{
                    Swal.fire({
                            type: 'warning',
                            text: 'ERROR DE EJECUCIÓN '+respuesta,
                            showConfirmButton: false,
                            customClass: 'swal-wide',
                            timer: 2000,
                            backdrop: `
                            rgba(100, 100, 100, 0.4)`
                    });           
            }
    });
}

function modificar() {
//alert("pruebas modificacion")
var frm = $("#Editar").serialize();
// alert(frm);
$.ajax({
   url: "../php/accesos-update.php",
    type: 'POST',
    data: frm 
}).done(function(respuesta) {

        if (respuesta == 0) {
        Swal.fire({
        type: 'success',
        text: 'CREDENCIALES ACTUALIZADAS CORRECTAMENTE',
        showConfirmButton: false,
        customClass: 'swal-wide',
        timer: 2000,
        backdrop: `
        rgba(100, 100, 100, 0.4)`
        });
        setTimeout("location.href = './';", 2000);
        }else{
        Swal.fire({
        type: 'warning',
        text: 'SELECCIONE PRIVILEGIOS',
        showConfirmButton: false,
        customClass: 'swal-wide',
        timer: 2000,
        backdrop: `
        rgba(100, 100, 100, 0.4)`
        });           
        }
    });
}
function uno(){
    $("#primera").show();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").hide();    
}
function dos(){
    $("#primera").hide();
    $("#segunda").show();
    $("#tercera").hide();
    $("#cuarto").hide();    
}
function tre(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").show();
    $("#cuarto").hide();    
}
function cua(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").show();        
}
// FUNCTION PARA EMOSTRAR DATOS
function mostrar_datos(datos) {

$("#id_usua").val(datos);
$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#1").show('active');
$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide();    
    // alert('ES: '+datos);

$.ajax({
    url: '../php/control-accesos.php',
    type: 'POST',
    data: 'datos='+datos
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    for (i = 0; i < res.length; i++) {

    $("#privi_gestor").val(obj.data[i].privi_gestor);    
    $("#privi_lingui").val(obj.data[i].privi_lingui);
    $("#privi_mesa").val(obj.data[i].privi_mesa);    
    $("#privi_acces").val(obj.data[i].privi_acces);    

    }
})
}

// SHOW PASSWORD
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
</script>