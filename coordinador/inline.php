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
           
           <div class=" sm">
                 </div> <canvas id="piechart-licencias"></canvas>
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
<script>
                     <?php 
                         $query ="SELECT
                         'total',
                           COUNT( CASE WHEN gstIDCat = '1' THEN 1 END ) AS LICENCIAS,
                           COUNT( CASE WHEN gstIDCat = '2' THEN 1 END ) AS ESCUELAS,
                           COUNT( CASE WHEN gstIDCat = '3' THEN 1 END ) AS EXAMENES,
                           COUNT( CASE WHEN gstIDCat = '4' THEN 1 END ) AS CERTIFICACION,
                           COUNT( CASE WHEN gstIDCat = '5' THEN 1 END ) AS OPERACIONES,
                           COUNT( CASE WHEN gstIDCat = '6' THEN 1 END ) AS PELIGROSAS,
                           COUNT( CASE WHEN gstIDCat = '7' THEN 1 END ) AS VUELO,
                           COUNT( CASE WHEN gstIDCat = '8' THEN 1 END ) AS CABINA,
                           COUNT( CASE WHEN gstIDCat = '9' THEN 1 END ) AS AERODROMOS,
                           COUNT( CASE WHEN gstIDCat = '10' THEN 1 END ) AS AVSEC,
                           COUNT( CASE WHEN gstIDCat = '11' THEN 1 END ) AS SMSSSP,
                           COUNT( CASE WHEN gstIDCat = '12' THEN 1 END ) AS INVACCIDENTES,
                           COUNT( CASE WHEN gstIDCat = '13' THEN 1 END ) AS AUXACCIDENTES,
                           COUNT( CASE WHEN gstIDCat = '14' THEN 1 END ) AS SALVAMENTO,
                           COUNT( CASE WHEN gstIDCat = '15' THEN 1 END ) AS AERONAVEGABILIDAD,
                           COUNT( CASE WHEN gstIDCat = '16' THEN 1 END ) AS PRODUCCION,
                           COUNT( CASE WHEN gstIDCat = '17' THEN 1 END ) AS NAVEGACIONAV,
                           COUNT( CASE WHEN gstIDCat = '18' THEN 1 END ) AS AERONAUTICA,
                           COUNT( CASE WHEN gstIDCat = '19' THEN 1 END ) AS VIGILANCIA,
                           COUNT( CASE WHEN gstIDCat = '20' THEN 1 END ) AS AEREO,
                           COUNT( CASE WHEN gstIDCat = '21' THEN 1 END ) AS SERVNAVAEREA,
                           COUNT( CASE WHEN gstIDCat = '22' THEN 1 END ) AS METEOROLOGO,
                           COUNT( CASE WHEN gstIDCat = '23' THEN 1 END ) AS CARTOGRAFIA,
                           COUNT( CASE WHEN gstCargo = 'INSPECTOR' THEN 1 END ) AS INSPECTOR 
                     FROM
                         personal";
                         $resultado = mysqli_query($conexion, $query);
                         ?>
var piechar = new Chart(document.getElementById("piechart-licencias"), {
type: 'bar',
data: {
<?php  while($data = mysqli_fetch_array($resultado)){ ?>
 labels: ["IVA-L","IVA-ES","IVA-EX","IVA-C","IVA-O","IVA-ODG","IVA-OV","IVA-OC","IVA-AE", "IVA-AVSEC","IVA-SMS-SSP","IIA","IAA","ISAR","IVA-AER","IVA-ING","IVA-NA","IVA-AIS","IVA-CNS","IVA-ATS","IVA-PANS-OPS","IVA-MET","IVA-CARTAS"
 ],
 datasets: [{
     label: "INSPECTORES", 
     backgroundColor: ["#337ab7","#095892"],
     borderWidth: 0,
     data: ["<?php echo $data['LICENCIAS']?>","<?php echo $data['ESCUELAS']?>","<?php echo $data['EXAMENES']?>","<?php echo $data['CERTIFICACION']?>","<?php echo $data['OPERACIONES']?>","<?php echo $data['PELIGROSAS']?>","<?php echo $data['VUELO']?>","<?php echo $data['CABINA']?>","<?php echo $data['AERODROMOS']?>","<?php echo $data['AVSEC']?>","<?php echo $data['SMSSSP']?>","<?php echo $data['INVACCIDENTES']?>","<?php echo $data['AUXACCIDENTES']?>","<?php echo $data['SALVAMENTO']?>","<?php echo $data['AERONAVEGABILIDAD']?>","<?php echo $data['PRODUCCION']?>","<?php echo $data['NAVEGACIONAV']?>","<?php echo $data['AERONAUTICA']?>","<?php echo $data['VIGILANCIA']?>","<?php echo $data['AEREO']?>","<?php echo $data['SERVNAVAEREA']?>","<?php echo $data['METEOROLOGO']?>","<?php echo $data['CARTOGRAFIA']?>"] 
 },      
]
 <?php } ?>
 
},
options: {
responsive: true,
plugins: {
// legend: {
//   position: 'top',
// },
title: {
 display: true,
 // text: 'Aqui va el titulo'
}
},
scales: {
y: {
 beginAtZero: true
}
}
},
});
</script>
</body>

</html>