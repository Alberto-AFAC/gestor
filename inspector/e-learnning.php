<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestor de Inspectores|Perfil Inspector</title>
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/skins/card.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css"
        integrity="sha512-rogivVAav89vN+wNObUwbrX9xIA8SxJBWMFu7jsHNlvo+fGevr0vACvMN+9Cog3LAQVFPlQPWEOYn8iGjBA71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.js"
        integrity="sha512-2sjxi4MoP9Gn7QE0NhJdxOFVMK/qYsZO6JnO6pngGvck8p5UPwFX2LV5AsAMOQYgvbzMmki6sIqJ90YO3STAnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        transition: 0.3s;
        margin: 6%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.8);
    }

    .card-body {
        padding: 8px;
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


            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../dist/img/perfil.png"
                                    alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $datos[1]?></h3>

                                <p class="text-muted text-center"><?php echo $datos[3]?></p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Cursos en Proceso</b> <a class="pull-right">
                                            <div id="programados"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos Completados</b> <a class="pull-right">
                                            <div id="completos"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos Declinados</b> <a class="pull-right">
                                            <div id="cancelados"></div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Cursos Vencidos</b> <a class="pull-right">
                                            <div id="vencidos"></div>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Competencia</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <a href="#">
                                    <strong><i class="fa fa-book margin-r-5"></i>Educación</strong>

                                </a>
                                <p class="text-muted">

                                    <?php echo $dato[4];?>
                                </p>


                                <a href="#">
                                    <strong><i class="ion-briefcase margin-r-5"></i>Experiencia Laboral</strong>
                                </a>

                                <p class="text-muted"><?php echo $dato[5]; ?></p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">




                            <?php 

$sql2 =
"SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final FROM cursos 
INNER JOIN listacursos ON gstIdlsc = idmstr  
WHERE modalidad = 'E-LEARNNING' AND idinsp = $id ORDER BY codigo DESC";
 $query = mysqli_query($conexion,$sql2);

while($datos2 = mysqli_fetch_assoc($query)){

$fcurso = $datos2['fechaf'];

$actual = date("Y-m-d"); 
$hactual = date('H:i:s');
//strtotime($actual.''.$hcurso)

$f3 = strtotime($actual.''.$hactual);
$f2 = strtotime($fcurso.''.$datos2['hcurso']); 

if($f3>=$f2 && $datos2['proceso']=='PENDIENTE' || $f3>= $f2 && $datos2['proceso']=='FINALIZADO'){

    $ven = "<span style='color: red;' title='".$datos2['final'].' a las '.$datos2['hcurso']."'>VENCIDO</pan>"; //29112021
}else{
    $ven = "<span style='color: green;'>".$datos2['final'].' a las '.$datos2['hcurso']."</span>";
}

    ?>

                            <!-- Default box -->
                            <div class="col-md-6 col-sm-0">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo $datos2['gstTitlo']?></h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="Collapsa">
                                                <i class="fa fa-minus"></i></button>

                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <?php echo $datos2['gstObjtv']?>
                                        <br><br>
                                        <?php
                                            if($f3>=$f2 && $datos2['proceso']=='PENDIENTE' || $f3>= $f2 && $datos2['proceso']=='FINALIZADO'){

                                                echo "<button class='btn btn-info btn-sm' style='float: right;' disabled>APRENDER
                                                MÁS...</button>";
                                            }else{
                                            echo "<button class='btn btn-info btn-sm' style='float: right;'>APRENDER
                                            MÁS...</button>";
                                            }?>
                                       
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                        <span style="color: gray;">FECHA DE VENCIMIENTO: <?php echo $ven?></span>

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                                <!-- /.box -->
                            </div>


                            <?php } ?>


                        </div>
                        <!--/row-->
                    </div>
                    <!--container-->


                    <!-- EVALUACIÓN CURSO -------------------------------------------------------------------------------------------->
                    <style type="text/css">
                    #modal-evalcurso span {
                        color: red;
                        font-size: 1.5em;
                        display: none;
                    }
                    </style>


                    <script type="text/javascript" src="../js/encuestadatos.js"></script>
                    <?php include('../perfil/modal.php');?>
                    <!-- /.tab-pane -->
                </div>

                <!-- /.nav-tabs-custom -->

            </section>
            <!-- /.content -->
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
        <?php include('../admin/panel.html');?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script type="text/javascript" src="../js/cursos.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="../js/lisCurso.js"></script>


</body>

</html>

<?php 

$datos[0];?>


<script type="text/javascript">

var counter = 0;

function desactivar() {
    if (counter < 1) {
        document.getElementById("myCertificate").enable = true;
        counter++;
    } else {
        document.getElementById("myCertificate").disabled = true;

    }
}
</script>