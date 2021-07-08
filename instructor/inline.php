<?php include ("../conexion/conexion.php");?>
<div class="row">
    <div class="col-xs-12">
        <!-- jQuery Knob -->
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title"></h3>

                <div class="box-tools pull-center">
                    <button type="button" title="Indicadores" class="btn btn-default btn-sm" data-widget="collapse"><i
                            class="fa fa-plus"></i>
                    </button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <div class="row">
                  
        <div class="zoom col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="../dist/img/licencia.svg" width="60px" alt="IVA-LICENCIAS" class="img-fluid">
                        </div>
                        <?php 
                                $query ="SELECT
                                'total',
                                COUNT( CASE WHEN gstIDCat = '1' THEN 1 END ) AS IVALICENCIAS,
                                COUNT( CASE WHEN gstIDCat = '6' THEN 1 END ) AS IVANAVEGACIONA,
                                COUNT( CASE WHEN gstIDCat = '8' THEN 1 END ) AS SISOPERA,
                                COUNT( CASE WHEN gstIDCat = '7' THEN 1 END ) AS AERODROMOS,
                                COUNT( CASE WHEN gstIDCat = '2' THEN 1 END ) AS OPERACIONES
                                
                            FROM
                                personal";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                        <div class="col-xs-9 text-right text-primary">
                            <div class="huge"><?php echo $row['IVALICENCIAS'] ?></div>
                            <div>IVA DE LICENCIAS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zoom col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <img src="../dist/img/avion.svg" width="60px" alt="IVA-LICENCIAS" class="img-fluid">
                        </div>
                        <div class="col-xs-9 text-right text-primary">
                            <div class="huge"><?php echo $row['IVANAVEGACIONA'] ?></div>
                            <div>IVA DE NAVEGACIÓN AÉREA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zoom col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <img src="../dist/img/gestion.svg" width="60px" alt="IVA-LICENCIAS" class="img-fluid">
                        </div>
                        <div class="col-xs-9 text-right text-primary">
                            <div class="huge"><?php echo $row['SISOPERA'] ?></div>
                            <div>IVA EN SIS. DE GESTIÓN DE SEG. OPERACIONAL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="zoom col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <img src="../dist/img/aerodromo.svg" width="60px" alt="IVA-LICENCIAS" class="img-fluid">
                        </div>
                        <div class="col-xs-9 text-right text-primary">
                            <div class="huge"><?php echo $row['AERODROMOS'] ?></div>
                            <div>IVA DE AERÓDROMOS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zoom col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <img src="../dist/img/operaciones.svg" width="60px" alt="IVA-LICENCIAS" class="img-fluid">
                        </div>
                        <div class="col-xs-9 text-right text-primary">
                            <div class="huge"><?php echo $row['OPERACIONES'] ?></div>
                            <div>IVA DE OPERACIONES</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
                    <div class="col-sm-offset-1 col-md-2 text-center">
                        <input type="text" class="knob" value="20" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
                        <div class="knob-label">IVA DE LICENCIAS.</div>
                    </div>
                    <div class="col-xs-0 col-md-2 text-center">
                        <input type="text" class="knob" value="40" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
                        <div class="knob-label">IVA DE NAVEGACIÓN AÉREA</div>
                    </div>
                    <div class="col-xs-0 col-md-2 text-center">
                        <input type="text" class="knob" value="60" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                        <div class="knob-label">IVA EN SIS. DE GESTIÓN DE SEG. OPERACIONAL</div>
                    </div>

                    <div class="col-xs-0 col-md-2 text-center">
                        <input type="text" class="knob" value="80" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                        <div class="knob-label">IVA DE AERÓDROMOS</div>
                    </div>
                    <div class="col-xs-0 col-md-2 text-center">
                        <input type="text" class="knob" value="100" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                        <div class="knob-label">IVA DE OPERACIONES</div>
                    </div>
                </div> -->
    </div>
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<!-- SlimScroll -->

<!-- AdminLTE for demo purposes -->

<!-- jQuery Knob -->
<script src="../bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- Sparkline -->
<!-- page script -->
<script>
$(".knob").knob({
    /*change : function (value) {
     //console.log("change : " + value);
     },
     release : function (value) {
     console.log("release : " + value);
     },
     cancel : function () {
     console.log("cancel : " + this.value);
     },*/
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
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                this.g.stroke();
            }

            this.g.beginPath();
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
            this.g.stroke();

            this.g.lineWidth = 2;
            this.g.beginPath();
            this.g.strokeStyle = this.o.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 *
                Math.PI, false);
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