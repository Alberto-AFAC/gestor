<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | BASE DE DATOS EVALUACIÓN_REACCIÓN</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    #data-table-reacción input {
        width: 80% !important;
    }

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

        <?php
include('header.php');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content" id="lista">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <H4><i class="fa ion-android-plane"></i>
                                            <label>EXPORTAR EVALUACIÓN DE REACCIÓN</label>
                                        </H4>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a type="button" href="inspecion" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>
                            <!-- /INDICADORES -->
                            <section class="content">
                                <!-- /FIN DE INDICADORES -->
                                <div class="box-body">
                                    <table class="display table table-striped table-bordered dataTable"
                                        id="data-table-reacción" style="width:100%;width:100%; display:block; overflow-x:auto; white-space:nowrap;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>NOMBRE DEL CURSO</th>
                                                <th>COORDINADOR</th>
                                                <th>INSTRUCTOR</th>
                                                <th>ESPECIFICÓ LOS OBJETIVOS AL INICIO DE LA SESIÓN, EN FORMA CLARA Y COMPRENSIBLE?</th> 
                                                <th>DEMOSTRÓ DOMINIO ADECUADO DEL TEMA</th>   
                                                <th>SE APEGÓ AL TEMARIO</th>
                                                <th>UTILIZÓ UN LENGUAJE SENCILLO Y COMPRENSIBLE DURANTE LA SESIÓN</th>
                                                <th>ATENDIÓ CLARA Y OPORTUNAMENTE LAS DUDAS Y REACTIVOS DE LOS PARTICIPANTES</th> 
                                                <th>PLANEÓ Y DIRIGIÓ ADECUADAMENTE LA SESIÓN</th>  
                                                <th>DESPERTÓ EL INTERÉS DEL GRUPO CON RESPECTO A LOS CONTENIDOS</th>
                                                <th>FUE PUNTUAL DURANTE LA SESIÓN</th>  
                                                <th>PROPICIÓ UN CLIMA DE COLABORACIÓN Y RESPETO ENTRE LOS PARTICIPANTES</th>     
                                                <th>EXPLICÓ CON CLARIDAD LAS INSTRUCCIONES DE LAS ACTIVIDADES REALIZADAS</th>
                                                <th>TUVO UN CONTROL ADECUADO DEL GRUPO</th>
                                                <th>AL INICIO DEL CURSO, EXPLICÓ LOS CRITERIOS DE EVALUACIÓN DEL CURSO</th>
                                                <th>LOS CONOCIMIENTOS EXPUESTOS EN EL CURSO SON APLICABLES A LAS ACTIVIDADES QUE REALIZA EN SU PUESTO DE TRABAJO</th>
                                                <th>CONSIDERA QUE EL CONTENIDO DEL CURSO FUE SUFICIENTE PARA CUMPLIR CON EL OBJETIVO DE APRENDIZAJE</th>
                                                <th>EL CURSO CUBRIÓ SUS EXPECTATIVAS</th>
                                                <th>EL CONTENIDO AUMENTÓ SUS CONOCIMIENTOS Y COMPRENSIÓN DEL TEMA EXPUESTO</th>
                                                <th>EL CONTENIDO DEL CURSO SE APEGA A LOS PROGRAMAS SELECCIONADOS POR LA AUTORIDAD AERONÁUTICA</th>
                                                <th>LA DURACIÓN DE LA O LAS SESIONES FUE SUFICIENTE PARA CUMPLIR EL OBJETIVO DE APRENDIZAJE</th>
                                                <th>EL TIEMPO CON EL QUE RECIBIÓ LA INFORMACIÓN (INVITACIÓN, TEMARIO, ETC.) A LA SESIÓN FUE ADECUADO</th>
                                                <th>LA AUTORIDAD AERONÁUTICA PROPORCIONÓ LOS MEDIOS NECESARIOS PARA LA ASISTENCIA AL CURSO</th>
                                                <th>¿CÓMO FUE EL SERVICIO DE CAFÉ PROPORCIONADO?</th>
                                                <th>LA DURACIÓN DE LA O LAS SESIONES FUE SUFICIENTE PARA CUMPLIR EL OBJETIVO DE APRENDIZAJE</th>
                                                <th>CÓMO FUE EL MATERIAL DIDÁCTICO (MANUAL, ROTAFOLIOS, AUDIOVISUALES, PRESENTACIÓN) UTILIZADO?</th>
                                                <th>SÍ EL MATERIAL DE LA SESIÓN SE ENTREGÓ EN TIEMPO?</th>
                                                <th>CÓMO FUERON LAS CONDICIONES DEL AULA PARA LA IMPARTICIÓN DE LA SESIÓN (LUZ, VENTILACIÓN,LIMPIEZA, COMODIDAD ETC.) ?</th>
                                                <th>LA CONEXIÓN DE INTERNET FUE LA ADECUADA PARA COMPRENDER LA INFORMACIÓN TRANSMITIDA DURANTE LA O LAS SESIONES EN LÍNEA</th>
                                                <th>MENCIONA ALGUNOS DE LOS APRENDIZAJES ADQUIRIDOS EN ESTA ACCIÓN DE CAPACITACIÓN Y SUS BENEFICIOS</th>
                                                <th>MENCIONA ALGUNA MEJORA QUE SE PUDIERA REALIZAR A ESTE PROCESO DE APRENDIZAJE</th>
                                                <th>SI RECIBIÓ CAPACITACIÓN EN UN CENTRO DE CAPACITACIÓN NACIONAL O INTERNACIONAL, USTED RECOMIENDA DICHO CENTRO PARA CONTINUAR COMO PROVEEDOR DE LA AUTORIDAD AERONÁUTICA MEXICANA.</th>
                                                <th>COMPARTE TUS COMENTARIOS, QUEJAS, SUGERENCIAS...</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.col -->

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
    <script src="../js/global.js"></script>
    <script src="../js/datos.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {

    $('#comandancia').load('select/actbuscacom.php');
    $('#select2').load('select/acttablacom.php');
    $('#subdireact').load('select/buscardepartact.php'); //Subdirección
    $('#departact').load('select/tabladepact.php'); //departamento
});
</script>
<script src="../js/select2.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var currentdate = new Date();
    var datetime = "Fecha de Impresion: " + currentdate.getDate() + "/" +
        (currentdate.getMonth() + 1) + "/" +
        currentdate.getFullYear() + " - " +
        currentdate.getHours() + ":" +
        currentdate.getMinutes();

    var table = $('#data-table-reacción').DataTable({

        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Generar PDF',
                messageTop: 'BASE DE DATOS INSPECTORES',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
                download: 'open',
                header: true,
                title: '',
                customize: function(doc) {
                    doc.defaultStyle.fontSize = 8;
                    doc.styles.tableHeader.fontSize = 8;
                    doc['footer'] = (function(page, pages) {
                        return {
                            columns: [
                                datetime,
                                {
                                    alignment: 'right',
                                    text: [{
                                            text: page.toString(),
                                            italics: false
                                        },
                                        ' de ',
                                        {
                                            text: pages.toString(),
                                            italics: false
                                        }
                                    ]
                                }
                            ],
                            margin: [25, 0]
                        }
                    });


                }
            },
            {
                extend: 'excel',
                text: 'Generar Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }

        ],



        "language": {
            buttons: {
                copyTitle: 'Registros copiados',
                copySuccess: {
                    _: '%d registros copiados',
                    1: '1 registro copiado'
                }
            },
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        // "order": [
        //     [5, "asc"]
        // ],
        "ajax": "../php/data-reacc-exp.php",

    });


    // CON ESTO FUNCIONA EL MULTIFILTRO//
    $('#data-table-reacción thead tr').clone(true).appendTo('#data-table-reacción thead');

    $('#data-table-reacción thead tr:eq(1) th').each(function(i) {
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
    // CON ESTO FUNCIONA EL MULTIFILTRO//
});
</script>