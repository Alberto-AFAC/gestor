<!DOCTYPE html><?php include ("../conexion/conexion.php");
ini_set('date.timezone','America/Mexico_City'); ?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Instructores y Coordinadores</title>
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
                                <h3 class="box-title">INSTRUCTORES Y COORDINADORES</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="accesoInstr" class="btn btn-info btn-sm"><i
                                        ></i> CAMBIO O MODIFICACIÓN DE COORDINADOR E INSTRUCTOR</a>  
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
                <h3><label>DETALLE DE CURSOS</label></h3>
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

<!--modal de instructor y coordinador informacion -->
<div class="modal fade" id='modal-infoexterno'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h3><label>INFORMACIÓN</label></h3>
                </div>
                <div class="modal-body">
                    <form id="Dtall" class="form-horizontal" action="" method="POST" >
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">NOMBRE(S)</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extnombre" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">APELLIDOS</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extapellido" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">TIPO DE INSTRUCTOR</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extipo" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">SEXO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extsexo" disabled="">
                            </div>
                        </div>
                        <div class="form-group" disabled="" type="hidden" name="nacional" id="nacional">
                            <div class="col-sm-6">
                                <label class="label2">CURP</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extcurp" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">RFC</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extrfc" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2">NOMBRE DE PROVEEDOR / INSTRUCTOR</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extproveedor" disabled="">               
                            </div>
                        </div>
                       <div class="form-group">
                            <div class="col-sm-12">
                                <p><span style="font-size:16px" class="label label-primary">CONTACTO</span></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">CASA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extcasa" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">CELULAR</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extcelular" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2">CORREO PERSONAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extcorreo" disabled="">               
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">CORREO ALTERNATIVO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta " id="extalternativo" disabled="">
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
    $("#instructor").show();
// $query = "SELECT
// * 
// FROM
// personal
// INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat 
// WHERE
// gstCargo = 'INSTRUCTOR' 
// OR gstCargo = 'COORDINADOR' 
// AND personal.estado = 0 
// OR personal.estado = 2 
// ORDER BY
// gstIdper DESC";
var dataSet = [
    <?php 
        $query = "SELECT
        * 
        FROM
        personal
        INNER JOIN categorias ON categorias.gstIdcat = personal.gstIDCat 
        WHERE
        personal.estado = 0 OR 
        personal.estado = 2 
        ORDER BY
        gstIdper DESC";
        $resultado = mysqli_query($conexion, $query);

        while($data = mysqli_fetch_array($resultado)){ 

    // if($data['gstCatgr'] == "CURSO"){
    //     $categoriaInsp = "SIN ASIGNAR";
    
    //   } else{
    //     $categoriaInsp = $data['gstCatgr'];
    //   }

        $gstIdper = $data['gstIdper'];
        $quacc = "SELECT * FROM instruacceso WHERE idper = $gstIdper AND estado = 0";
        $result = mysqli_query($conexion, $quacc);
        if($rest = mysqli_fetch_array($result)){    
        $cargo = $rest['cargo'];  
        }else{
         $cargo = '';
         }


        $gstIdper = $data['gstIdper'];

        $queri = "SELECT *,GROUP_CONCAT(gstCatgr) AS spcialidds 
        FROM especialidadcat 
        INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
        WHERE categorias.gstIdcat != 24 
        AND categorias.gstIdcat != 25 
        AND categorias.gstIdcat != 26 
        AND categorias.gstIdcat != 29 
        AND categorias.gstIdcat != 31
        AND especialidadcat.gstIDper = $gstIdper";
        $resul = mysqli_query($conexion, $queri); 

        if($res = mysqli_fetch_array($resul)){
        $categoria = $res['spcialidds'];

        if($res['spcialidds']==''){ $categoria = 'SIN CATEGORÍA'; }

        }else{
        $categoria = 'SIN CATEGORÍA';
        }
        if($data['gstNmpld'] == 0){
            $empleado = "S/N"; 
        }else{
            $empleado = $data['gstNmpld'];
        }
        if($data['estado'] == 0){
            $estado = "INTERNO"; 
        }else if($data['estado'] == 2){
            $estado = "EXTERNO";
        }
$gstId5 = $data['gstIdper'];


 if($cargo == 'INSTRUCTOR' || $cargo == 'COORDINADOR' || $cargo == 'COORDINADOR_A'){ ?>

    ["<?php echo  $empleado;?>", "<?php echo $data['gstNombr']?>", "<?php echo $data['gstApell']?>",
        "<?php echo $categoria ?>", "<?php echo $cargo ?>","<?php echo $estado?>",

        "<?php echo "<a href='javascript:openDtlls()' title='Perfil' onclick='perfil({$gstIdper})' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a><a href='' title='Ver detalle de cursos' onclick='perinscoord({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-cursinstru'><i class='fa fa ion-easel text-muted'></i></a>";?>"
    ],

<?php } else if($data['estado'] == 2){ ?>
    ["<?php echo  $empleado;?>", "<?php echo $data['gstNombr']?>", "<?php echo $data['gstApell']?>",
    "<?php echo $categoria ?>", "<?php echo $data['gstCargo']?>","<?php echo $estado?>",

    "<?php echo "<a  title='Perfil' onclick='perinscoord({$gstIdper})' class='datos btn btn-default' data-toggle='modal' data-target='#modal-infoexterno'><i class='glyphicon glyphicon-user text-success'></i></a><a href='' title='Ver detalle de cursos' onclick='perinscoord({$gstIdper})' class='btn btn-default' data-toggle='modal' data-target='#modal-cursinstru'><i class='fa fa ion-easel text-muted'></i></a>"; ?>"
    ],
<?php } ?>
   


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
            title: "CATEGORIA",
            width: "450px"
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

// TABLA INSPECTORES EXTERNOS//
var dataSet = [
    <?php 
$query = "SELECT *, DATE_FORMAT(alta,'%d/%m/%Y')as alta FROM insexternos 
WHERE estado = 0";
$resultado = mysqli_query($conexion, $query);
$x = 0;

while($data = mysqli_fetch_array($resultado)){ 
$x++;
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $x ?>", "<?php echo  $data['nombre'];?>", "<?php echo $data['apellido']?>","<?php echo $data['alta']?>","<?php echo $data['cargo']?>",""

    ],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-instructoresExt').DataTable({
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
            title: "FECHA ALTA"
        },
        {
            title: "CARGO"
        },
        // {
        //     title: "ACCIÓN"
        // }
    ],
});



function perinscoord(gstIdper) {
    //FUNCION PARA SABER LOS CURSO PROGRAMADOS Y LOS IMPARTIDOS
    var idpersona1 = document.getElementById('insperco').value =gstIdper;
        $.ajax({
            url: '../php/infopersext.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
//alert(idpersona1)
            var n = 0;
            for (R = 0; R < res.length; R++) { //RASTREAR EL ID DE LA PERSONA
                if (obj.data[R].gstIdper == gstIdper) {
                    $("#gstnomebre").val(obj.data[R].gstNombr + "  " + obj.data[R].gstApell);
                    $("#cargoinsco").val(obj.data[R].gstCargo);
                    $("#extnombre").val(obj.data[R].gstNombr);
                    $("#extapellido").val(obj.data[R].gstApell);
                    $("#extsexo").val(obj.data[R].gstSexo);
                    $("#extcurp").val(obj.data[R].gstCurp);
                    $("#extrfc").val(obj.data[R].gstRfc);
                    $("#extipo").val(obj.data[R].gstLunac);
                    $("#extproveedor").val(obj.data[R].gstNucrt);
                    $("#extcasa").val(obj.data[R].gstCasa);
                    $("#extcelular").val(obj.data[R].gstClulr);
                    $("#extcorreo").val(obj.data[R].gstCorro);
                    $("#extalternativo").val(obj.data[R].gstSpcID);
                   // alert(obj.data[R].gstLunac)
                    if (obj.data[R].gstLunac == "INTERNACIONAL") {
                        $("#nacional").hide();
                    }
                    if (obj.data[R].gstCargo == "INSTRUCTOR") {
                        $("#coordinados").hide();
                    }
                    if (obj.data[R].gstCargo == "COORDINADOR") {
                        $("#coordinados").show();
                    }

                }
            }

        })
        //TABLA DE CURSOS COMO INSTRUCTOR
        $.ajax({
            url: '../php/instruc_curs.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cursoinstuc" class="table table-bordered table-striped" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CODIGO</th><th style="width:350px"><i></i>CURSO</th><th><i></i>FECHA DE INICIO</th><th><i></i>FECHA FIN</th></tr></thead><tbody>';
            for (V = 0; V < res.length; V++) {
    
                if (obj.data[V].idinst == idpersona1) {
                    x++;
                    html += "<tr><td>" + x + "</td><td>" + obj.data[V].codigo + "</td><td>" + obj.data[V].gstTitlo + "</td><td>" + obj.data[V].fcurso + "</td><td>" + obj.data[V].fechaf + "</td></tr>";
    
                } else {}
            }
            html += '</tbody></table></div></div></div>';
            $("#cursinstructor").html(html);
            $('#cursoinstuc').DataTable({
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
        //alert('pruebas')
    //TABLA DE CURSOS COMO INSTRUCTOR
    $.ajax({
            url: '../php/coord_curs.php',
            type: 'POST'
    }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cursco" class="table table-bordered table-striped" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CODIGO</th><th style="width:350px"><i></i>CURSO</th><th><i></i>FECHA DE INICIO</th><th><i></i>FECHA FIN</th></tr></thead><tbody>';
            for (O = 0; O < res.length; O++) {
    
                if (obj.data[O].idcoor == idpersona1) {
                    x++;
                    html += "<tr><td>" + x + "</td><td>" + obj.data[O].codigo + "</td><td>" + obj.data[O].gstTitlo + "</td><td>" + obj.data[O].fcurso + "</td><td>" + obj.data[O].fechaf + "</td></tr>";
    
                } else {}
            }
            html += '</tbody></table></div></div></div>';
            $("#curscoord").html(html);
            $('#cursco').DataTable({
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

$(document).ready(function() {
    $('#btnguardar').click(function() {
        var alta = $("#alta").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var cargo = $("#cargo").val();
        var detalle = $("#detalle").val();
        // alert(detalle)
        swal.showLoading();
        if (nombre == '' || apellido == '' || cargo == '') {
            Swal.fire({
                type: 'warning',
                text: 'Llene campos vacios!',
                timer: 2500,
                showConfirmButton: false,
                customClass: 'swal-wide'
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../php/insExt.php",
                data: {
                    alta: alta,
                    nombre: nombre,
                    apellido: apellido,
                    cargo: cargo,
                    detalle: detalle

                },
                success: function(data) {
                    document.getElementById("inspectores-ext").reset();
                    Swal.fire({
                        type: 'success',
                        text: 'SE HA REGISTRADO EXITOSAMENTE',
                        showConfirmButton: false,
                        timer: 2900,
                        showConfirmButton: false,
                        customClass: 'swal-wide'
                    });
                }
            });
        }

        return false;
    });
});

</script>
