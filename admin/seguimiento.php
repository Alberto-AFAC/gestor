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
    <title>Capacitación AFAC | Seguimiento y Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
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
                    SEGUIMIENTO Y CONTROL
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
                                                <th>ID</th>
                                                <th>FOLIO CURSO</th>
                                                <th>INSPECTOR</th>
                                                <th>CURSO</th>
                                                <th>TIPO</th>
                                                <th>ESPECIALIDAD</th>
                                                <th>TERMINO</th>
                                                <th>PRONOSTICO</th>
                                                <th>ESTATUS</th>
                                                <th>DETALLES</th>
                                                <th>ACCIONES</th>
                                            </tr>


                                            <tr>
                                                <th>ID</th>
                                                <th>FOLIO CURSO</th>
                                                <th>INSPECTOR</th>
                                                <th>CURSO</th>
                                                <th>TIPO</th>
                                                <th>ESPECIALIDAD</th>
                                                <th>TERMINO</th>
                                                <th>PRONOSTICO</th>
                                                <th>ESTATUS</th>
                                                <th>DETALLES</th>
                                                <th>ACCIONES</th>
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
            <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación
                    Cilvil</a>.</strong>Todos los derechos Reservados DDE.
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
    $('#id_mstr').select2();
    $('#idinst').select2();
    $('#idinsp').select2();
});
</script>
<script src="../js/select2.js"></script>
<!-- // AQUÍ VA LA TABLA MÁS OPTIMIZADA -->
<script type="text/javascript">
$(document).ready(function() {
    var currentdate = new Date();
    var datetime = "Fecha de Impresion: " + currentdate.getDate() + "/" +
        (currentdate.getMonth() + 1) + "/" +
        currentdate.getFullYear() + " - " +
        currentdate.getHours() + ":" +
        currentdate.getMinutes();
    var table = $('#example').DataTable({
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },


        "ajax": "../php/seguimiento.php",
        "pageLength": 10,
        "lengthMenu": [
            [5, 10, 25, 50],
            [5, 10, 25, 50]
        ],
        scrollX: true,
        "columnDefs": [{
            "width": "20%",
            "targets": [1, 2, 3]
        }],
        fixedColumns: true,
        // dom: 'Bfrtip',
        // buttons: [{
        //         extend: 'copy',
        //         exportOptions: {
        //             columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         text: 'Generar PDF',
        //         messageTop: 'SEGUIMIENTO Y CONTROL',
        //         exportOptions: {
        //             columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
        //         },
        //         download: 'open',
        //         header: true,
        //         title: '',
        //         customize: function(doc) {
        //             doc.defaultStyle.fontSize = 8;
        //             doc.styles.tableHeader.fontSize = 8;
        //             doc['footer'] = (function(page, pages) {
        //                 return {
        //                     columns: [
        //                         datetime,
        //                         {
        //                             alignment: 'right',
        //                             text: [{
        //                                     text: page.toString(),
        //                                     italics: false
        //                                 },
        //                                 ' de ',
        //                                 {
        //                                     text: pages.toString(),
        //                                     italics: false
        //                                 }
        //                             ]
        //                         }
        //                     ],
        //                     margin: [25, 0]
        //                 }
        //             });


        //         }
        //     },
        //     {
        //         extend: 'excel',
        //         text: 'Generar Excel',
        //         exportOptions: {
        //             columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
        //         }
        //     }

        // ],

        initComplete: function() {
            count = 0;
            this.api().columns().every(function() {
                var title = this.header();
                //replace spaces with dashes
                title = $(title).html().replace(/[\W]/g, '-');
                var column = this;
                var select = $('<select style="width: 80%;" class="select2" ></select>')
                    .appendTo($(column.header()).empty())
                    .on('change', function() {
                        //Get the "text" property from each selected data 
                        //regex escape the value and store in array
                        var data = $.map($(this).select2('data'), function(value, key) {
                            return value.text ? '^' + $.fn.dataTable.util
                                .escapeRegex(value.text) + '$' : null;
                        });

                        //if no data selected use ""
                        if (data.length === 0) {
                            data = [""];
                        }

                        //join array into string with regex or (|)
                        var val = data.join('|');

                        //search for the option(s) selected
                        column
                            .search(val ? val : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

                //use column title as selector and placeholder
                select.select2({
                    multiple: true,
                    closeOnSelect: false,
                    placeholder: "Selecciona..."
                });

                //initially clear select otherwise first option is selected
                select.val(null).trigger('change');
            });
        }
    });
    // $('#example').DataTable({
    //     // columnDefs: [{
    //     //     width: 220,
    //     //     targets: 3,
    //     //     targets: "_all",
    //     //     sortable: false
    //     // }],
    //     "language": {
    //         "searchPlaceholder": "Buscar datos...",
    //         "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    //     },
    //     "ajax": "../php/seguimiento.php",
    //     orderCellsTop: true,
    //     initComplete: function() {
    //         this.api().columns().every(function() {
    //             var column = this;
    //             var select = $('<select><option value="">Seleccióne...</option></select>')
    //                 .appendTo($(column.header()).empty())
    //                 .on('change', function() {
    //                     var val = $.fn.dataTable.util.escapeRegex(
    //                         $(this).val()
    //                     );

    //                     column
    //                         .search(val ? '^' + val + '$' : '', true, false)
    //                         .draw();
    //                 });

    //             column.data().unique().sort().each(function(d, j) {
    //                 select.append('<option value="' + d + '">' + d + '</option>')
    //             });
    //         });
    //     }

    // });
    // var table = $('#example').DataTable({

    //     "language": {
    //         "searchPlaceholder": "Buscar datos...",
    //         "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    //     },
    //     "order": [
    //         [7, "DESC"]
    //     ],
    //     "ajax": "../php/seguimiento.php",
    //     "columnDefs": [{
    //       //  "targets": -1,
    //        // "data": null,
    //         //"defaultContent": ""

    //     }]
    // });

    // $('#example thead tr:eq(1) th').each(function(i) {
    //     var title = $(this).text(); //es el nombre de la columna
    //     $(this).html('<input type="text"  placeholder="Buscar" />');

    //     $('input', this).on('keyup change', function() {
    //         if (table.column(i).search() !== this.value) {
    //             table
    //                 .column(i)
    //                 .search(this.value)
    //                 .draw();
    //         }
    //     });
    // });

});
</script>
<script type="text/javascript" src="../js/lisCurso.js"></script>
<style>
#example select {
    /* width: 30px !important; */
}
</style>
<!-- <script src="../dist/js/multiples-correos.js"></script> -->