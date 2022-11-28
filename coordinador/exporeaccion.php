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
                                                <th>FECHA DE EVALUACIÓN</th>
                                                <th>El curso fue impartido por  (CIAAC / EXTERNO)</th>
                                                <th>Nombre de participante</th>
                                                <th>Apellidos de participante</th>
                                                <th># EMPLEADO</th>
                                                <th>ESPECIALIDAD</th>
                                                <th>AREA DE ADSCRIPCION</th>
                                                <!-- <th>CODIGO</th>-->
                                                <th>Evalúe el desempeño del INSTRUCTOR [Especificó los objetivos al inicio de la sesión, en forma clara y comprensible]</th> 
                                                <th>Evalúe el desempeño del INSTRUCTOR [Demostró dominio adecuado del tema]</th>   
                                                <th>Evalúe el desempeño del INSTRUCTOR [Se apegó al temario]</th>
                                                <th>Evalúe el desempeño del INSTRUCTOR [Utilizó un lenguaje sencillo y comprensible durante la sesión]</th>
                                                <th>Evalúe el desempeño del INSTRUCTOR [Atendió clara y oportunamente las dudas y reactivos de los participantes]</th> 
                                                <th>Evalúe el desempeño del INSTRUCTOR [Planeó y dirigió adecuadamente la sesión]</th>  
                                                <th>Evalúe el desempeño del INSTRUCTOR [Despertó el interés del grupo con respecto a los contenidos]</th>
                                                <th>Evalúe el desempeño del INSTRUCTOR [Fue puntual durante la sesión]</th>  
                                                <th>Evalúe el desempeño del INSTRUCTOR [Propició un clima de colaboración y respeto entre los participantes]</th>     
                                                <th>Evalúe el desempeño del INSTRUCTOR [Explicó con claridad las instrucciones de las actividades realizadas]</th>
                                                <th>Evalúe el desempeño del INSTRUCTOR [Tuvo un control adecuado del grupo]</th>
                                                <th>Evalúe el desempeño del INSTRUCTOR [Al inicio del curso, explicó los criterios de evaluación del curso]</th>
                                                <th>Evalúe el CONTENIDO del curso [Los conocimientos expuestos en el curso son aplicables a las actividades que realiza en su puesto de trabajo]</th>
                                                <th>Evalúe el CONTENIDO del curso [Considera que el contenido del curso fue suficiente para cumplir con el objetivo de aprendizaje]</th>
                                                <th>Evalúe el CONTENIDO del curso [El curso cubrió sus expectativas]</th>
                                                <th>Evalúe el CONTENIDO del curso [El contenido aumentó sus conocimientos y comprensión del tema expuesto]</th>
                                                <th>Evalúe el CONTENIDO del curso [El contenido del curso se apega a los programas seleccionados por la Autoridad Aeronáutica]</th>
                                                <th>Evalúe el CONTENIDO del curso [La duración de la o las sesiones fue suficiente para cumplir el objetivo de aprendizaje]</th>
                                                <th>Evalúe el desempeño del COORDINADOR [El  tiempo con el que recibió la información (invitación, temario, etc.) del curso fue adecuado]</th>
                                                <th>Evalúe el desempeño del COORDINADOR [La Autoridad Aeronáutica proporcionó los medios necesarios para la asistencia al curso]</th>
                                                <th>Evalúe el desempeño del COORDINADOR [¿Cómo fue el servicio de café proporcionado?]</th>
                                                <th>Evalúe el desempeño del COORDINADOR [La disponibilidad del coordinador para responder dudas sobre el servicio fue adecuada]</th>
                                                <th>Evalúe las INSTALACIONES Y MATERIAL [¿Cómo fue el material didáctico (manual, rotafolios, audiovisuales, presentación) utilizado?]</th>
                                                <th>Evalúe las INSTALACIONES Y MATERIAL [El material de la sesión se entregó en tiempo]</th>
                                                <th>Evalúe las INSTALACIONES Y MATERIAL [¿Cómo fueron las condiciones del aula para la impartición de la sesión (luz, ventilación, limpieza, comodidad, etc.) ?]</th> 
                                                <th>Mencione algunos de los aprendizajes adquiridos en esta acción de capacitación y sus beneficios</th>
                                                <th>Mencione alguna mejora que se pudiera realizar a este proceso de aprendizaje</th>
                                                <th>Si recibió capacitación en un Centro de Capacitación Nacional o Internacional, usted recomienda dicho centro para continuar como proveedor de la Autoridad Aeronáutica Mexicana.</th>
                                                <th>Comentarios u observaciones generales del curso</th>
                                                <th>Nombre del curso:</th>
                                                <th>Grupo del curso:</th>
                                                <th>Fecha de inicio del curso</th>
                                                <th>Fecha de término del curso:</th>
                                                <th>Nombre de la/el coordinador(a):</th>
                                                <th>Nombre de el/la instructor(a):</th>
                                                <th>Evalúe las INSTALACIONES Y MATERIAL [La conexión de internet fue la adecuada para comprender la información transmitida durante la o las sesiones en linea ]</th>
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
                    columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Generar PDF',
                messageTop: 'BASE DE DATOS INSPECTORES',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]
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
                    columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]
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