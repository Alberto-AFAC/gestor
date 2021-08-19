

<div class="row">
  <div class="col-xs-12">
    <!-- jQuery Knob -->
    <div class="box box-solid">
      <div class="box-header">
        <i class="fa fa-bar-chart-o"></i>

        <h3 class="box-title"></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" >
        <div class="row">


        <div class="col-sm-offset-0 col-md-3 text-center">
                  <input type="text" class="knob" value=<?php echo porcentajedef($totalfulldef, $totaldeficiente,0)."%"?> data-width="90" data-height="90" data-fgColor="#154360" data-readonly="true">

                  <div class="knob-label" style="font-size:15px; font-weight: bold;">DEFICIENTE %</div>
                </div>
          <!-- ./col -->
          <div class="col-xs-0 col-md-3 text-center">
            <input type="text" class="knob" value=<?php echo porcentaje2($totalfullnosa, $totaldnosatisf,0)."%"?> data-width="90" data-height="90" data-fgColor="#5499C7" data-readonly="true">

            <div class="knob-label" style="font-size:15px; font-weight: bold;">NO SATISFACTORIO %</div>
          </div>

          <!-- ./col -->
          <div class="col-xs-0 col-md-3 text-center">
            <input type="text" class="knob" value=<?php echo porcentaje3($totalfullsatis, $totalsatis,0)."%"?> data-width="90" data-height="90" data-fgColor="#1ABC9C" data-readonly="true">

            <div class="knob-label" style="font-size:15px; font-weight: bold;">SATISFACTORIO %</div>
          </div>
        <!-- ./col -->
          <div class="col-xs-0 col-md-3 text-center">
            <input type="text" class="knob" value=<?php echo porcentaje4($totalfullexc, $totalexc,0)."%"?> data-width="90" data-height="90" data-fgColor="#1ABC9C" data-readonly="true">

            <div class="knob-label" style="font-size:15px; font-weight: bold;">EXCELENTE %</div>
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
