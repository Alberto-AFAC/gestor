
<?php session_start();

require_once "../../conexion/conexion.php";


      if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

        if($_SESSION['consulta'] > 0){
           
            $idper=$_SESSION['consulta'];
        
        $sql="SELECT listacursos.gstIdlsc,listacursos.gstTitlo FROM listacursobliga 
			   INNER JOIN listacursos ON listacursobliga.gstIDlsc = listacursos.gstIdlsc
			   WHERE listacursobliga.gstIcatg = '$idper' AND listacursos.estado = 0 ORDER BY listacursos.gstIdlsc ASC";
        }

    
      $result=mysqli_query($conexion,$sql);
	?>
		<select class="form-control" class="selectpicker" id="idlist" name="idlist" type="text" data-live-search="true" style="width: 100%" >
		<option value="0">CURSOS</option> 
		<?php while($valor = mysqli_fetch_row($result)):?>                      
		<option value="<?php echo $valor[0].','.$idper;?>"><?php echo $valor[1]?></option>
		<?php endwhile; ?>
		</select>
              

<script type="text/javascript">
	$(document).ready(function(){
		$('#idlist').select2();

		$('#idlist').change(function(){
			$.ajax({
				type:"post",
				data:'valor=' + $('#idlist').val(),
				url:'session/',
				success:function(r){
					$('#partici').load('select/tablaoblig.php');
				}
			});
		});
	});


	$.ajax({
	type:"post",
	data:'valor=' + $('#idlist').val(),
	url:'session/',
	success:function(r){
	$('#partici').load('select/tablaoblig.php');
	}
	});

</script> 

	
<?php   }else{   ?>

<script type="text/javascript">
		$.ajax({
	type:"post",
	data:'valor=0',
	url:'session/',
	success:function(r){
	$('#partici').load('select/tablaoblig.php');
	}
	});
</script>

<?php } ?>
