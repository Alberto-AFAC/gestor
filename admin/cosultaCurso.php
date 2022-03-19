<!DOCTYPE html>
<?php include ("../conexion/conexion.php");


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
                    PERSONAL CON CURSOS
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">



                        <div class="nav-tabs-custom">
                <!-- 
                <?php //include('select/buscarCursos.php'); ?> -->

                            <div class="tab-content">

<div class="tab-content">
<div class="active tab-pane" id="activity">
<div class="post">
<form class="form-horizontal">
<input type="hidden" name="idper" id="idper" value="<?php echo $id ?>">
<div class="form-group">
<div class="col-sm-12">
<label class="label2">SELECCIONE CURSO
<!-----------APARTADO DE LOS 3 CURSOS OBLIGATORIS---------> 
<!--    / <a href="programo">OBLIGATORIOS DE INDUCCIÓN</a> -->
</label>
<div id="selcurso"></div>
</div>
</div>
<!-- <div id="partici"></div>  -->
<div class="form-group">
<div class="col-sm-12">
<div id="tabcurso"></div>
</div></div>
</form>
</div>
</div></div>


<!--                                 <div class="box-body" id="listCurso">
                                    <table class="display table table-striped table-bordered dataTable" id="example"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%;">ID</th>
                                                <th>NOMBRE</th>
                                                <th style="width:18%;">APELLIDOS</th>
                                                <th>ESPECIALIDAD</th>
                                                <th>ESTADO</th>
                                                <th>DETALLE</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div> -->
                            </div>

                            <!-- MODAL PENDIENTE  -->
  
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
</div>
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
  $(document).ready(function(){
  //$('#id_mstr').select2();
  $('#idinst').select2();
  $("#idcord").select2();
   $('#selcurso').load('select/buscarCursos.php');
   $('#tabcurso').load('select/tablaCurso.php');
   //$('#partici').load('select/tablaoblig.php')
  }); 
  </script>
  <script src="../js/global.js"></script>
  <script src="../js/select2.js"></script> 
<script type="text/javascript">
// $(document).ready(function() {
//     var table = $('#example').DataTable({

//         "language": {
//             "searchPlaceholder": "Buscar datos...",
//             "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
//         },
//         "order": [
//             [5, "DESC"]
//         ],
//         "ajax": "../php/consultCurso.php",
//         "columnDefs": [{
//           //  "targets": -1,
//            // "data": null,
//             //"defaultContent": ""

//         }]
//     });

//     detalles("#example tbody", table);

//     agrinspctor("#example tbody", table);


//     $('#example thead tr').clone(true).appendTo('#example thead');

//     $('#example thead tr:eq(1) th').each(function(i) {
//         var title = $(this).text(); //es el nombre de la columna
//         $(this).html('<input type="text"  placeholder="Buscar" />');

//         $('input', this).on('keyup change', function() {
//             if (table.column(i).search() !== this.value) {
//                 table
//                     .column(i)
//                     .search(this.value)
//                     .draw();
//             }
//         });
//     });


//     $('#example tbody').on('click', 'a', function() {
//         var data = table.row($(this).parents('tr')).data();
//     });

// });





</script>
<script type="text/javascript" src="../js/lisCurso.js"></script>
<style>
#example input {
    width: 50% !important;
}
</style>
<!-- <script src="../dist/js/multiples-correos.js"></script> -->