<!DOCTYPE html>
<?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo, estado FROM personal WHERE	gstCargo = 'INSTRUCTOR' OR 	gstCargo = 'INSPECTOR' OR gstCargo = 'ADMINISTRATIVO' OR gstCargo = 'NUEVO INGRESO' OR gstCargo = 'COORDINADOR' AND estado = 0 || estado = 3 ";
$inspector = mysqli_query($conexion,$sql);

?>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Cursos Vencidos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/skins/card.css">
    <script src="../dist/jspdf/dist/jspdf.debug.js"></script>
    <script src="../dist/js/jspdf.plugin.autotable.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../dist/css/input-correos.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- <link rel="stylesheet" type="text/css" href="../datas/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <script type="text/javascript" async="" src="../datas/ga.js"></script>
    <script type="text/javascript" src="../datas/site.js"></script>
    <script type="text/javascript" src="../datas/dynamic.php" async=""></script>
    <script type="text/javascript" language="javascript" src="../datas/jquery-3.js"></script>
    <script type="text/javascript" language="javascript" src="../datas/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../datas/dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../datas/demo.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
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
            <i class="glyphicon glyphicon-user"></i>  
                    PERSONAL CON CURSOS VENCIDOS
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">

                            <!--<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">PROGRAMACIÓN DEL CURSO</a></li>
<li><a href="#timeline" data-toggle="tab">LISTA DE PROGRAMACIÓN</a></li>
</ul>-->
                            <div class="tab-content">

                                <div class="box-body" id="listCurso">

                                    <!-- Datatables-->
                                    <!--SEGUNDA TABLA OPTIMIZADA-->
                                    <table class="display table table-striped table-bordered dataTable" id="example"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%;">ID</th>
                                                <th>FOLIO CURSO</th>
                                                <th style="width:18%;">INSPECTOR</th>
                                                <!-- <th style="width:18%;">ESPECIALIDAD</th> -->
                                                <th style="width:18%;">CURSO</th>
                                                <th>TIPO</th>
                                                <th>TERMINO</th>
                                                <th>VIGENCIA</th>
                                                <th>ESTATUS</th>
                                                <!-- <th style="width:15%; display: none;">ACCIÓN</th> -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            
                            </div>
                            <!-- MODAL PENDIENTE  -->
                            <div class="modal fade" id="modal-participnt">
                                <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" onclick="location.href='lisCurso'" class="close"
                                                    data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">AGREGAR PARTICIPANTE</h4>
                                            </div>
                                            <?php include ('../php/modalpart.php')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <h4 class="modal-title">CANCELAR CURSO </h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="codigos" id="codigos">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p> ¿ESTÁ SEGURO DE CANCELAR EL CURSO: <span id="cgstTitlo"></span>
                                                    <!-- +'?'<input type="text" name="cgstTitlo"
+'?'                                       id="cgstTitlo" class="form-c+'?'ontrol disabled" disabled=""
style="background: white;border: 1px solid white;"> -->
                                                </p>
                                            </div>
                                            <br>
                                            <div class="col-sm-5">
                                                <button id="elimina" type="button" class="btn btn-primary"
                                                    onclick="canCurso()">ACEPTAR</button>
                                            </div>
                                            <b>
                                                <p class="alert alert-warning text-center padding error" id="dangerr">
                                                    Error
                                                    al cancelar curso</p>
                                            </b>
                                            <b>
                                                <p class="alert alert-success text-center padding exito" id="succes">¡Se
                                                    cancelo curso con éxito !</p>
                                            </b>
                                            <b>
                                                <p class="alert alert-warning text-center padding aviso" id="emptyy">
                                                    Elija
                                                    curso para cancelar </p>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            </section>
        </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- fin del chechk list para copletar iun certificado -->
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> <?php 
            $query ="SELECT * FROM controlvers"; $resultado = mysqli_query($conexion, $query);
            $row = mysqli_fetch_assoc($resultado);
            if(!$resultado) {
                var_dump(mysqli_error($conexion));
                exit;
            }
        ?>
            <?php echo $row['version']?>
        </div>
        <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>Todos los derechos Reservados DDE.
    </footer>


    <div class="control-sidebar-bg"></div>
    </div>
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
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <script src="../js/global.js"></script>
</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#id_mstr').select2();
    $('#idinst').select2();
    $('#idinsp').select2();
});
</script>
<script src="../js/select2.js"></script>
<!-- // AQUÍ VA LA TABLA MÁS OPTIMIZADA -->
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({

        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "order": [
            [7, "DESC"]
        ],
        "ajax": "../php/curvencidos.php",
        "columnDefs": [{
          //  "targets": -1,
           // "data": null,
            //"defaultContent": ""

        }]
    });

    detalles("#example tbody", table);

    agrinspctor("#example tbody", table);


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
        // alert( "Es el ID: "+ data );
        $.ajax({
            url: '../php/lisCurso.php',
            type: 'POST'
        }).done(function(resp) {


            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            for (i = 0; i < res.length; i++) {
                if (obj.data[i].id_curso == data[8]) {
                    cursos =
                        obj.data[i].gstIdlsc +
                        "*" + obj.data[i].gstTitlo +
                        "*" + obj.data[i].gstTipo +
                        "*" + obj.data[i].gstPrfil +
                        "*" + obj.data[i].gstCntnc +
                        "*" + obj.data[i].gstDrcin +
                        "*" + obj.data[i].gstVignc +
                        "*" + obj.data[i].gstObjtv +
                        "*" + obj.data[i].hcurso +
                        "*" + obj.data[i].fcurso +
                        "*" + obj.data[i].fechaf +
                        "*" + obj.data[i].idinst +
                        "*" + obj.data[i].sede +
                        "*" + obj.data[i].link +
                        "*" + obj.data[i].modalidad +
                        "*" + obj.data[i].codigo +
                        "*" + obj.data[i].proceso +
                        "*" + obj.data[i].idinsp +
                        "*" + obj.data[i].contracur +
                        "*" + obj.data[i].classroom;

                    var d = cursos.split("*");

                    gstIdlsc = d[0];
                    $("#impri #codigoCurso").val(d[15]);
                    $("#impri #gstIdlstc").val(d[0]);
                    $("#impri #gstTitulo").val(d[1]);

                    $("#idperonc").val(d[1]);
                    $("#id_cursoc").val(d[15]);
                    $("#avaluacion #idperon").val(d[1]);

                    $("#Dtall #gstTitlo").val(d[1]);
                    $("#Dtall #gstTipo").val(d[2]);
                    $("#Dtall #gstPrfil").val(d[3]);
                    $("#Dtall #gstCntnc").val(d[4]);
                    $("#Dtall #gstDrcin").val(d[5]);
                    $("#Dtall #gstVignc").val(d[6]);
                    $("#Dtall #gstObjtv").val(d[7]);
                    $("#Dtall #hcurso").val(d[8]);
                    $("#Dtall #fcurso").val(d[9]);
                    $("#Dtall #fechaf").val(d[10]);
                    $("#Dtall #idinst").val(d[11]);
                    $("#Dtall #sede").val(d[12]);
                    $("#Dtall #modalidads").val(d[14]);
                    if (d[13] == '0') {
                        $("#Dtall #linkcur").val(d[13]);
                        $("#Dtall #contracur").val(d[18]);
                        $("#dismod").hide();
                        $("#disocl").show();
                    } else {
                        $("#Dtall #linkcur").val(d[13]);
                        $("#Dtall #contracur").val(d[18]);
                        $("#dismod").show();
                        $("#disocl").hide();
                    }

                    $("#Dtall #codigo").val(d[15]);
                    $("#Dtall #proceso").val(data[18]);
                    $("#Dtall #codigoIDCuro").val(d[15]);

                    codigo = d[15];

                    idcurso(codigo);
                    if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
                        $("#buttonfin").hide();
                        $("#editcurs").hide();
                        $("#notiocu").hide();
                        $("#notiocus").hide();
                    } else {
                        $("#buttonfin").show();
                        $("#editcurs").show();
                        $("#notiocu").show();
                        $("#notiocus").show();
                    }
                    $("#Dtall #classromcur").val(d[19]);
                }
            }
        })


        modalidadcur = document.getElementById('modalidads').value; //variable para declara la modalidad
        dismod = document.getElementById(
            "dismod"); //variable para el contenedor de el link y la contraseña

        if (modalidadcur == "A DISTANCIA") { //se visualiza el link y contraseña 
            dismod.style.display = '';
        }
        if (modalidadcur == "HIBRIDO") { //se visualiza el link y contraseña 
            linidismodnpu.style.display = '';
        }
        if (modalidadcur == "PRESENCIAL") { //se oculta el link y la contraseña
            dismod.style.display = 'none';
        }

    });

});

function idcurso(codigo) {

    var id = codigo

    var tableCursosProgramados = $('#data-table-cursosProgramados').DataTable({
        "order": [
            [3, "asc"]
        ],
        "ajax": {
            "url": "../php/cursosProgramados.php",
            "type": "GET",
            "data": function(d) {
                d.id = id;
            }
        },


        "language": {

            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },

    });

}


function id_cursos(idp) {
//alert(idp);
$.ajax({
        url: '../php/conscursospro.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_curso == idp) {
                //DETALLES CURSOS DECLINADOS
                var toma1 = "",
                    toma2 = "",
                    toma3 = "",
                    toma4 = ""; //declaramos las columnas NOMBRE DEL CURSO
                toma1 += obj.data[i].gstNombr; //NOMBRE
                toma2 += obj.data[i].gstApell; //APELLIDO
                toma3 += obj.data[i].confirmar; //CONFIRMAR 
                toma4 += obj.data[i].justifi; //JUSTIFICACION  
                $("#nomdeclina1").text(toma1 + " " + toma2); // Label esta en valor.php
                $("#declinpdf1").attr('href', toma2); // Label esta en valor.php
                $("#motivod1").text('Motivo:' + toma3); // Label esta en valor.php
                $("#otrosd1").text(toma4); // Label esta en valor.php
                $("#declinpdf1").attr('href', toma4); // Label esta en valor.php

                if (toma3 == 'OTROS') {
                    document.getElementById('otrosd1').style.display = '';
                    document.getElementById('declinpdf1').style.display = 'none';
                }else if(toma3 == 'TRABAJO') {
                    document.getElementById('otrosd1').style.display = 'none';
                    document.getElementById('declinpdf1').style.display = '';
                }else if (toma3 == 'ENFERMEDAD') {
                    document.getElementById('otrosd1').style.display = 'none';
                    document.getElementById('declinpdf1').style.display = '';
                }
            }
        }
    })
}


function detalles(tbody, table) {

    $(tbody).on("click", "a.eliminar", function() {
        var data = table.row($(this).parents("tr")).data();

        //var gstIdlsc = $().val(data.gstIdlsc);
        $("#modal-eliminar #codigos").val(data[9]);
        $("#modal-eliminar #cgstTitlo").html(data[1] + '?');

        if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
            $("#elimina").hide();
        } else {
            $("#elimina").show();
        }

    });
}
</script>
<script type="text/javascript" src="../js/lisCurso.js"></script>
<style>
#example input {
    width: 50% !important;
}
</style>
<!-- <script src="../dist/js/multiples-correos.js"></script> -->