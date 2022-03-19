<!-- <script type="text/javascript" src="script.js"></script> -->
<?php session_start();

require_once "../../conexion/conexion.php";


      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
           
            $idper=$_SESSION['consulta'];
            
            //$f = explode(',', $idper);
            $titulo = $idper;//CATEGORIA
           //  $inicial = intval($f[2]);//SIGLAS
          

?>
<div class="col-md-12">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#primeract" data-toggle="tab">POR REALIZAR </a></li>
<li><a href="#timeline" data-toggle="tab">REALIZADO</a></li>
</ul>

<div class="tab-content">
<!--PRIMERA DIVISIÓN-->
<div class="active tab-pane" id="primeract">

<?php include('consultCurso.php'); ?>

</div><!--FINALIZA PRIMERA DIVISIÓN-->

<!--SEGUNDA DIVISIÓN-->
<div class="tab-pane" id="timeline">
<?php include('consultProgr.php'); ?>
</div><!--FINALIZA SEGUNDADIVISIÓN-->


</div><!-- /.tab-content -->

</div><!-- /.nav-tabs-custom -->
</div>

<?php    } ?>




<?php   }else{   ?>
<input type="hidden" name="id_mstr" id="id_mstr" value="0">
<?php } ?>


<script type="text/javascript">
    // Buscador de tabla
$(document).ready(function(){
  $("#myBusqd").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


    // Buscador de tabla
$(document).ready(function(){
  $("#myInpute").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$("#selectall").on("click", function() {
  $(".idinsp").prop("checked", this.checked);
});

// if all checkbox are selected, check the selectall checkbox and viceversa
$(".idinsp").on("click", function() {
  if ($(".idinsp").length == $(".idinsp:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

// REMOVE ROWS IN REGISTER
// var arr = $("#test tr");

// $.each(arr, function(i, item) {
//     var currIndex = $("#test tr").eq(i);
//     var matchText = currIndex.find('td:nth-child(3)').text();
//     $(this).nextAll().each(function(i, inItem) {
//         if(matchText===$(this).find('td:nth-child(3)').text()) {
//             $(this).remove();
//         }
//     });
// });

</script>