<!DOCTYPE html>
<?php include ("../conexion/conexion.php");

//$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM especialidadcat WHERE estado = 0 AND gstIDper=$datos[0]";
$sql = "SELECT gstIdspc,categorias.gstIdcat,gstCsigl,gstCatgr,especialidadcat.gstIDper,gstIDeva,categorias.gstIDcat 
FROM personal 
INNER JOIN especialidadcat ON personal.gstIdper = especialidadcat.gstIDper 
INNER JOIN categorias ON categorias.gstIdcat = especialidadcat.gstIDcat 
WHERE especialidadcat.estado=0 AND categorias.gstIdcat != 24 AND categorias.gstIdcat != 25 AND categorias.gstIdcat != 26 AND categorias.gstIdcat != 29 AND categorias.gstIdcat != 31 AND personal.gstIdper='1045' ORDER BY especialidadcat.gstIdspc ASC
";



$cat = mysqli_query($conexion,$sql);


?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Capacitación AFAC | Resumen de OJT</title>
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

        <?php include('header.php');?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-blue-active">
                                <h3 class="" style="text-align: center; font-size: 18px;  background:transparent">
                                    <?php echo $datos[1]?> <?php echo $datos[2]?> </h3>
                            </div>
                            <div class="widget-user-image">
                                <?php if($datos[1] == 'CARLOS ANTONIO' && $datos[2] == 'RODRIGUEZ MUNGUIA'){
                                        echo "<img class='profile-user-img img-responsive img-circle' src='../dist/img/general.jpeg'
                                        alt='User profile picture'>";
                                }else if($datos[1] == 'JACOB' && $datos[2] == 'GONZALEZ MACIAS'){
                                    echo "<img class='profile-user-img img-responsive img-circle' src='../dist/img/JACOB_DDE.png'
                                    alt='User profile picture'>";
                                }else{
                                    echo "<img class='profile-user-img img-responsive img-circle' src='../dist/img/perfil.png'
                                    alt='User profile picture'>";
                                }        
                            ?>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12 border-right">
                                        <br>
                                        <h4 class="widget-user-desc">AVANCE OJT</h4>
                                        <div class="description-block">
                                            <div id="seleces"></div>
                                            <label for="">Seleccione la especialidad</label>
                                            <select class="form-control" data-placeholder="SELECCIONE A LA ESPECIALIDAD"
                                                name="" id="">
                                                <?php while($puesto = mysqli_fetch_row($cat)):?>
                                                <option value="<?php echo $puesto[1]?>"><?php echo $puesto[3]?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <a href="ojtprogramados">RESUMEN DE PROGRAMACIÓN OJT</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <div class="col-md-9">

                        <div class="nav-tabs-custom">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- jQuery Knob -->
                                    <div class="box box-solid">
                                        <div class="box-header">
                                            <i class="fa fa-bar-chart-o"></i>
                                            <h3 class="box-title"></h3>
                                            <div class="box-tools pull-center">
                                                <button type="button" title="Indicadores" class="btn btn-default btn-sm"
                                                    data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.SE SACA LA SUMA Y LOS PPORCENTAJES DE CADA CURSO -->
                                        <div class="box-body" style="display: ;">
                                            <div class="row">
                                                <?php 
                                $query ="SELECT  COUNT(id_proojt) AS TOTAL,COUNT( CASE WHEN estatus = 'FINALIZADO' AND confirojt='CONFIRMADO' OR estatus = 'PENDIENTE' AND confirojt='CONFIRMADO' THEN 1 END ) AS COMPLETADOS, ROUND(COUNT(CASE WHEN estatus = 'FINALIZADO' AND confirojt='CONFIRMADO'  THEN 1 END )* 100 / COUNT( id_proojt ),2) AS PORCENTAJE FROM prog_ojt WHERE id_pers = ' $datos[0]'";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                                                <div class="col-sm-offset-1 col-md-10">
                                                    <div class="progress-group">
                                                        <span class="progress-text">TOTAL DE TAREAS
                                                            COMPLETADOS</span>
                                                        <span class="progress-number"><b><?php echo $row['COMPLETADOS']?></b>/
                                                            <?php echo $row['COMPLETADOS']?></span>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: <?php echo $row['PORCENTAJE'] ?>%"
                                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <?php echo $row['PORCENTAJE'] ?>%</div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">

                                            <br>
                                            <h4>EVALUACIÓN DEL ENTRENAMIENTO EN EL PUESTO DE TRABAJO (OJT) </h4>
                                            <button type="button" style="float: right;" class="btn btn-primary"
                                                onclick="">FORMATO DE EVALUACIÓN</button>
                                        </div>
                                        <div
                                            class="col-md-12 dataTables_wrapper form-inline dt-bootstrap rounded table-responsive">

                                            <br>
                                            <table style="width: 100%;" id="data-table-avanceOJT"
                                                class="table display table-striped table-bordered">
                                                <thead>
                                                    <tr style="background-color:#D5D5D5">
                                                        <!-- COLUMNAS PRINCIPALES -->
                                                        <th Colspan="2">TAREAS PROGRAMADAS</th>
                                                        <th Colspan="2">NIVEL 1</th>
                                                        <th Colspan="2">NIVEL 2</th>
                                                        <th Colspan="2">NIVEL 3</th>
                                                    </tr>
                                                    <!-- SUBCOLUMNAS -->
                                                    <tr>
                                                        <td class="checker">TAREA</td>
                                                        <td class="checker">SUBTAREA</td>
                                                        <td class="checker">EVALUADOR</td>
                                                        <td class="checker">EVALUADO</td>
                                                        <td class="checker">EVALUADOR</td>
                                                        <td class="checker">EVALUADO</td>
                                                        <td class="checker">EVALUADOR</td>
                                                        <td class="checker">EVALUADO</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                    </div>
                    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
                    <!-- Bootstrap 3.3.7 -->
                    <script src="../bower_components/jquery-knob/js/jquery.knob.js"></script>

                    <script>
                    $(".knob").knob({

                        draw: function() {

                            // "tron" case
                            if (this.$.data('skin') == 'tron') {

                                var a = this.angle(this.cv) // Angle
                                    ,
                                    sa = this.startAngle // Previous start angle
                                    ,
                                    sat = this.startAngle // Start angle
                                    ,
                                    ea // Previous end angle
                                    , eat = sat + a // End angle
                                    ,
                                    r = true;

                                this.g.lineWidth = this.lineWidth;

                                this.o.cursor &&
                                    (sat = eat - 0.3) &&
                                    (eat = eat + 0.3);

                                if (this.o.displayPrevious) {
                                    ea = this.startAngle + this.angle(this.value);
                                    this.o.cursor &&
                                        (sa = ea - 0.3) &&
                                        (ea = ea + 0.3);
                                    this.g.beginPath();
                                    this.g.strokeStyle = this.previousColor;
                                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea,
                                        false);
                                    this.g.stroke();
                                }

                                this.g.beginPath();
                                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                                this.g.stroke();

                                this.g.lineWidth = 2;
                                this.g.beginPath();
                                this.g.strokeStyle = this.o.fgColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this
                                    .lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                                this.g.stroke();

                                return false;
                            }
                        }
                    });
                    /* END JQUERY KNOB */
                    //INITIALIZE SPARKLINE CHARTS
                    $(".sparkline").each(function() {
                        var $this = $(this);
                        $this.sparkline('html', $this.data());
                    });
                    /**
                     ** Draw the little mouse speed animated graph
                     ** This just attaches a handler to the mousemove event to see
                     ** (roughly) how far the mouse has moved
                     ** and then updates the display a couple of times a second via
                     ** setTimeout()
                     **/
                    </script>
</body>

</html>






<div class="tab-pane" id="ojt">
    <section class="content">
    </section>

</div>
</div>



</section>
</div>

<!-- EVALUACIÓN CURSO -------------------------------------------------------------------------------------------->
<style type="text/css">
#modal-evalcurso span {
    color: red;
    font-size: 1.5em;
    display: none;
}
</style>


<?php include('../perfil/ojtreaction.php');?>
<?php include('../perfil/ojtreport.php');?>

<!-- /.tab-pane -->
</div>
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- MODAL PARA ENTREGAR TAREA -->



<form id="tareas" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
    <div class="modal fade" id="pendiente" tabindex="-1" role="dialog" aria-labelledby="pendiente" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id_tare" name="id_tare">
                    <input type="hidden" id="opcion" name="opcion" value="modificar">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-title" id="myModalLabel"><span style="font-size: 15px;" id="titulo"></span>
                    </div>
                </div>
                <div class="modal-body">
                    <span>¿DESEAS CONCLUIR CON LAS ACTIVIDADES ASIGNADAS PARA OJT?</span><br><br>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="container">SI
                                <input type="radio" value="1" name="entrega">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label class="container">NO
                                <input type="radio" name="entrega" value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                    <button type="button" onclick="modificar();" class="btn btn-primary">GUARDAR</button>
                </div>
            </div>
        </div>

    </div>
</form>


<script type="text/javascript" src="../js/encuestadatos.js"></script>
<?php include('../perfil/modal.php');?>
<!-- /.tab-pane -->


<!-- /.content -->

<!-- MODAL PARA ENTREGAR TAREA -->
<form id="tareas" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
    <div class="modal fade" id="pendiente" tabindex="-1" role="dialog" aria-labelledby="pendiente" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id_tare" name="id_tare">
                    <input type="hidden" id="opcion" name="opcion" value="modificar">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-title" id="myModalLabel"><span style="font-size: 15px;" id="titulo"></span>
                    </div>
                </div>
                <div class="modal-body">
                    <span>¿DESEAS CONCLUIR CON LAS ACTIVIDADES ASIGNADAS PARA OJT?</span><br><br>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="container">SI
                                <input type="radio" value="1" name="entrega">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label class="container">NO
                                <input type="radio" name="entrega" value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                    <button type="button" onclick="modificar();" class="btn btn-primary">GUARDAR</button>
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
</div>
<!--  -->
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
<script src="../js/lisCurso.js"></script>
<script src="../js/ojt.js"></script>
<script src="../js/notificacion.js"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script>

</script>
</body>

</html>
<?php include('../perfil/ojtp.php'); ?>