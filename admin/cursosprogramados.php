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
                                COUNT( gstIdlsc ) AS COMPLETADOS,
                                COUNT( CASE WHEN gstTipo = 'INDUCCIÓN' THEN 1 END ) AS INDUCCION,
                                COUNT( CASE WHEN gstTipo = 'RECURRENTES' THEN 1 END ) AS RECURRENTES,
                                COUNT( CASE WHEN gstTipo = 'BÁSICOS' THEN 1 END ) AS BÁSICOS,
                                COUNT( CASE WHEN gstTipo = 'ESPECÍFICOS' THEN 1 END ) AS ESPECÍFICOS,
                                COUNT( CASE WHEN gstTipo = 'OJT' THEN 1 END ) AS OJT,
                                COUNT( CASE WHEN gstTipo = 'BÁSICOS/INICIAL' THEN 1 END ) AS BINICIAS,
                                COUNT( CASE WHEN gstTipo = 'INDUCCIÓN' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS INDUCCIÓNP,
                                COUNT( CASE WHEN gstTipo = 'RECURRENTES' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS RECURRENTESP,
                                COUNT( CASE WHEN gstTipo = 'BÁSICOS' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS BASICOSP,
                                COUNT( CASE WHEN gstTipo = 'ESPECÍFICOS' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS ESPECÍFICOSP,
                                COUNT( CASE WHEN gstTipo = 'OJT' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS OJTP,
                                COUNT( CASE WHEN gstTipo = 'BÁSICOS/INICIAL' THEN 1 END ) * 100 / COUNT( gstIdlsc ) AS BINICIASP 
                            FROM
                            listacursos";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                       <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS DE INDUCCIÓN</span>
                    <span class="progress-number"><b><?php echo $row['INDUCCION']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?php echo $row['INDUCCIÓNP'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $row['INDUCCIÓNP'] ?>%</div>
            </div>
                  </div>
            </div>  
        <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS RECURRENTES</span>
                    <span class="progress-number"><b><?php echo $row['RECURRENTES']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $row['RECURRENTESP'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $row['RECURRENTESP'] ?>%</div>
          </div>
                  </div>
            </div>  
            <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS BÁSICOS</span>
                    <span class="progress-number"><b><?php echo $row['BÁSICOS']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $row['BASICOSP'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $row['BASICOSP'] ?>%</div>
          </div>
                  </div>
            </div>  
            <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS ESPECÍFICOS</span>
                    <span class="progress-number"><b><?php echo $row['ESPECÍFICOS']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $row['ESPECÍFICOSP'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $row['ESPECÍFICOSP'] ?>%</div>
          </div>
                  </div>
            </div>  
            <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS OJT</span>
                    <span class="progress-number"><b><?php echo $row['OJT']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $row['OJTP'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $row['OJTP'] ?>%</div>
          </div>
                  </div>
            </div>  
            <div  class="col-sm-offset-1 col-md-10">
            <div class="progress-group">
                    <span class="progress-text">TOTAL CURSOS BÁSICOS/INICIAL</span>
                    <span class="progress-number"><b><?php echo $row['BINICIAS']?></b>/ <?php echo $row['COMPLETADOS']?></span>
                    <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $row['BINICIASP'] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $row['BINICIASP'] ?>%</div>
          </div>
                  </div>
            </div>  
          <!-- ./col -->
        </div>
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
