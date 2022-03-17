<?php session_start();

require_once "../../conexion/conexion.php";


?>

<div id="scroll" style="width: 100%; height: 300px; overflow: scroll;">
    <div class="box-body">
        <input type="hidden" name="id_mstr" id="id_mstr" value="">

        <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">


        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group" role="group" aria-label="...">
                        <!-- <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-success btn-default">VIGENTE</button>
                        <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-warning btn-default">POR VENCER</button>
                        <button type="button" style="pointer-events: none; color: white;"
                            class="btn btn-danger btn-default">VENCIDO</button> -->
                    </div>
                    <input style="float: right;" id="myInput" type="text" placeholder="Búscar...">
                    <br><br>
                    <div class="table-responsive mailbox-messages">

                        <table class="table display table-striped table-bordered" role="grid"
                            aria-describedby="example_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 600px"><i></i>OJTS</th>
                                    <th><i></i> UBICACION</th>
                                    <th style="width: 200px"><i></i> ESTADO</th>
                                    <th><i></i> ACCIONES</th>
                                </tr>
                            </thead>
  <?php


        $sql = "SELECT * FROM ojts where estado ='0' ORDER BY id_ojt ASC";
          $person = mysqli_query($conexion,$sql);
            while ($per = mysqli_fetch_row($person)) {
            $categoria = $per[2];
            $id = $per[0];
	?>


                            



                            <tbody id="tableojs">
                              <td><?php echo $id?></td>
                              <td><?php echo $categoria?></td>
                              
                              <td>3</td>
                              <td>4</td>
                              <td><a title="Seleccionar las subtareas" class="label label-primary" data-toggle="modal" data-target="#detalleSub3" onclick="idsubTa()" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a></td>
                              

                            </tbody>
                            <?php		
	
}

?>

                        </table>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

// Use 'prop' instead of 'attr'
// 'attr' only work the first time, better use 'prop'

// add multiple select/unselect functionality
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
// Buscador de tabla
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
// REMOVE ROWS IN REGISTER
var arr = $("#test tr");

$.each(arr, function(i, item) {
    var currIndex = $("#test tr").eq(i);
    var matchText = currIndex.find('td:nth-child(3)').text();
    $(this).nextAll().each(function(i, inItem) {
        if(matchText===$(this).find('td:nth-child(3)').text()) {
            $(this).remove();
        }
    });
});
</script>







