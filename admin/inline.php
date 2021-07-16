<?php include ("../conexion/conexion.php");?>
<div class="row">
  <div class="col-xs-12">
    <!-- jQuery Knob -->
    <div class="box box-solid">
      <div class="box-header">
        <i class="fa fa-bar-chart-o"></i>

        <h3 class="box-title"></h3>

        <div class="box-tools pull-center">
          <button type="button" title="Indicadores" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="display: none;">
        <div class="row">
        <?php 
                                $query ="SELECT
                                'total',
                                COUNT( CASE WHEN gstIDCat = '1' THEN 1 END ) AS IVALICENCIAS,
                                COUNT( CASE WHEN gstIDCat = '6' THEN 1 END ) AS IVANAVEGACIONA,
                                COUNT( CASE WHEN gstIDCat = '8' THEN 1 END ) AS SISOPERA,
                                COUNT( CASE WHEN gstIDCat = '7' THEN 1 END ) AS AERODROMOS,
                                COUNT( CASE WHEN gstIDCat = '2' THEN 1 END ) AS OPERACIONES,
                                COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS INSPECTOR,
                                COUNT( CASE WHEN gstIDCat = '1' THEN 1 END ) * 100 / COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS IVALICENCIASP, /*PORCENTAJE*/
                                COUNT( CASE WHEN gstIDCat = '6' THEN 1 END ) * 100 / COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS IVANAVEGACIONAP, /*PORCENTAJE*/
                                COUNT( CASE WHEN gstIDCat = '8' THEN 1 END ) * 100 / COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS SISOPERAP, /*PORCENTAJE*/
                                COUNT( CASE WHEN gstIDCat = '7' THEN 1 END ) * 100 / COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS AERODROMOSP, /*PORCENTAJE*/
                                COUNT( CASE WHEN gstIDCat = '2' THEN 1 END ) * 100 / COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS OPERACIONESP /*PORCENTAJE*/
                            FROM
                                personal";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                        

                        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">IVA DE LICENCIAS</span>
                    <span class="progress-number"><b><?php echo $row['IVALICENCIAS'] ?></b>/<?php echo $row['INSPECTOR'] ?></span>
                  <div class="progress sm">
                        <div class="progress-bar progress-bar-blue" style="width: <?php echo $row['IVALICENCIASP'] ?>%"></div>
                        </div>
                  </div>
            </div>  
        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">IVA DE NAVEGACIÓN AÉREA</span>
                    <span class="progress-number"><b><?php echo $row['IVANAVEGACIONA'] ?></b>/<?php echo $row['INSPECTOR'] ?></span>
                  <div class="progress sm">
                        <div class="progress-bar progress-bar-blue" style="width: <?php echo $row['IVANAVEGACIONAP'] ?>%"></div>
                        </div>
                  </div>
            </div>  
        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">IVA EN SIS. DE GESTIÓN DE SEG. OPERACIONAL</span>
                    <span class="progress-number"><b><?php echo $row['SISOPERA'] ?></b>/<?php echo $row['INSPECTOR'] ?></span>
                  <div class="progress sm">
                        <div class="progress-bar progress-bar-blue" style="width: <?php echo $row['SISOPERAP'] ?>%"></div>
                        </div>
                  </div>
            </div>  
            
        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">IVA DE AERÓDROMOS</span>
                    <span class="progress-number"><b><?php echo $row['AERODROMOS'] ?></b>/<?php echo $row['INSPECTOR'] ?></span>
                  <div class="progress sm">
                        <div class="progress-bar progress-bar-blue" style="width: <?php echo $row['AERODROMOSP'] ?>%"></div>
                        </div>
                  </div>
            </div>  
        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">IVA DE OPERACIONES</span>
                    <span class="progress-number"><b><?php echo $row['OPERACIONES'] ?></b>/<?php echo $row['INSPECTOR'] ?></span>
                  <div class="progress sm">
                        <div class="progress-bar progress-bar-blue" style="width: <?php echo $row['OPERACIONESP'] ?>%"></div>
                        </div>
                  </div>
            </div>  
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
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
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
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
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function () {
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
