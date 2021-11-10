<!--------------------------------checkbox simultaneos en javascript-------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<form>
<table>
<?php for($i=0; $i<3; $i++){?>
<input type='checkbox' value='1'>
<input type="checkbox" value='2'>
<?php }?>

</table>  
<button type="button" onclick="mostrar()">enviar</button>
</form>
<script type="text/javascript">
function mostrar(){
var actual = new Array();
$("input:checkbox:checked").each(function() {
actual.push($(this).val());
});
//muestra vlores
alert(actual);
//conteo de valores que muestra      
console.log(actual.length);
}     
</script>
<!-----------------------------Select inteligente Individual------------------------------------------>
<br>
<div class="col-sm-offset-0 col-sm-4">
<select  id="selec" name="selec"  class="form-control" class="selectpicker" type="text" data-live-search="true">
<option value="x">TIPODE SERVICIO</option>
<option value="1IMPRESORA/MULTIFUNCIONALES">IMPRESORA/MULTIFUNCIONALES</option>
<option value="2SISTEMAS_APLICATIVOS">SISTEMAS APLICATIVOS</option>
<option value="3EQUIPO DE CÓMPUTO">EQUIPO DE CÓMPUTO </option>
<option value="4SISTEMAS">SISTEMAS</option>
<option value="5RED">RED</option>
<option value="6OTROS">OTROS</option>
</select>
</div>


<!-----------------------------Doble select------------------------------------------>
<br><br>
<div class="form-group">
<div class="col-sm-4">
<label>SELECCIONE COMANDANCIA</label>
<div id="comandan"></div>                            
</div>
<div class="col-sm-8">
<label>SELECCIONE AEROPUERTOS</label>
<div id="select3"></div> 
</div>
</div>

<link rel="stylesheet" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
// <!-----------------------------Select inteligente Individual------------------------------------------>
$('#selec').select2(); 
// <!-----------------------------Doble select------------------------------------------>
//crear crpeta llamada (select) con archivo .php select de busqueda 
$('#comandan').load('select/buscacom.php');
//crear archivo donde se muestra la tabla derivada de la busqueda 
$('#select3').load('select/tablacom.php');
}); 
</script>
<script src="../js/select2.js"></script> 
<!-- //////////////////////////////////////////////////////////////////////////// -->



<?php
include ("../conexion/conexion.php");



// $idcat = '1,7,9';

// $valor = explode(",", $idcat);

// foreach ($valor as $id) {
// 		echo $id;
// 		echo '<br>';	



// $sql = "SELECT gstIdper, gstNombr,gstApell,gstIDCat FROM personal WHERE gstIDCat = $id AND estado = 0";
// $person = mysqli_query($conexion,$sql);

// while ($per = mysqli_fetch_row($person)) {
// 		// if($per[3]!=0){
// 		 echo $per[1];
// 		 echo '<br>';
// 		// }		
// }

// 	}









?>


<script type="text/javascript">
	


//fcurso = '2021/07/26';
//gstVignc = 1 * 12;
//vence = gstVignc - 6;

//var termino = new Date(fcurso);
//var finaliza = new Date(termino.getFullYear(),termino.getMonth(),termino.getDate()); 
//finaliza.setMonth(finaliza.getMonth() + gstVignc);
//alert(finaliza);

//oi = '2022/07/28';
//var hoy = new Date(oi);
//var factual = new Date(hoy.getFullYear(),hoy.getMonth(),hoy.getDate());
//alert(factual);

// if(factual <= finaliza){
//termino.setMonth(termino.getMonth() + vence);
//termino.setDate(termino.getDate() + 1);

//var ftermino = new Date(termino.getFullYear(),termino.getMonth(),termino.getDate());
//alert(ftermino);

//  if(factual >= finaliza){
//  	alert('VENCIDO');
//  }else 
// if(factual <= ftermino){
// alert('VIGENTE');
//  }
// else 
// if(factual >= ftermino){
// 	alert('POR VENCER');	
// }


// }else{
// 	alert('VENCIDO');	
// }


</script>


<!-- 

<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<table class="table is-striped">
  <theader>
    <th>Nombre</th>
    <th>Estatus</th>
  </theader>
  <tbody>
    <tr>
      <td>Pedro</td>
      <td>
        <input type="checkbox" name="cbxEstudiante" value="1" /></td>
    </tr>
    <tr>
      <td>Santiago</td>
      <td>
        <input type="checkbox" name="cbxEstudiante" value="2" /></td>
    </tr>
    <tr>
      <td>María</td>
      <td>
        <input type="checkbox" name="cbxEstudiante" value="3" /></td>
    </tr>
    <tr>
      <td>Juan</td>
      <td>
        <input type="checkbox" name="cbxEstudiante" value="4" /></td>
    </tr>
    </tbody>
    </table>
    <a class="button is-primary" onclick="btnEnviar();">Enviar</a>

    <script type="text/javascript"> -->


  	
 </script>


<pre>
<?php 
   // echo '<strong>$matriz_numeros</strong><br>'; // Mostramos literal con  el nombre del array 
   // print_r($matriz_numeros); //  Imprimir estructura y contenido del array
//



//   $query="SELECT gstIdlsc FROM listacursos ORDER BY gstIdlsc DESC LIMIT 1";  
  
// $result = mysqli_query($conexion,$query);

// $res = mysqli_fetch_row($result);

//   echo $res[0];

// $gstIdperEli = 1321;
// $idcurs = 1064;
// echo $valor = documentos($idcurs,$conexion);

// function documentos($idcurs,$conexion){

// $query = "SELECT *,count(*) AS total FROM temario WHERE idcurso = $idcurs";
//   $result = mysqli_query($conexion,$query);

// if($result->num_rows==0){

// return 'no hay';

// }else{
//   $res = mysqli_fetch_row($result);

//   return $res[4];
// }

// }



// $fecha = '10-14-2021';
// $date = date_create($fecha);

// echo '<br>';
//   ini_set('date.timezone','America/Mexico_City');
// echo $newDate = date("Y-m-d", strtotime($fecha));


// echo date_format($date, 'Y-m-d');

$correo = 'angel.canseco@sct.gob.mx';

echo $v = conCorreo($correo,$conexion);

//   resultado($res1,$res2);
    
//     $res = $res2;
  
// echo $res;
      //echo $res[1];
$nombre = explode('.',$v);
echo '<br>'.$c = intval($nombre[1]);

 function conCorreo($correo,$conexion){

$query="SELECT * FROM personal 
    WHERE gstCorro = '$correo' AND estado = 0 
    OR gstCinst = '$correo' AND estado = 0
    OR gstSpcID = '$correo' AND estado = 0
    ";
$resultado= mysqli_query($conexion,$query);
    if($resultado->num_rows==0){
    return '0';
    }else{
       $res = mysqli_fetch_row($resultado);

        return $res[1].''.$res[2].'.'.$res[22];
    }
    $this->conexion->cerrar();
} 




?>
</pre>

<input name="checkbox" type="checkbox" id="checkbox" onchange="javascript:hazalgo();" value="1" />


<script type="text/javascript">
  

function hazalgo() {
    if(document.getElementById('checkbox').checked){
        objeto1 = document.getElementById('c2');
        objeto1.style.display='none';
        objeto2 = document.getElementById('cuota');
        objeto2.value='30';
    }else{
        objeto1 = document.getElementById('c2');
        objeto1.style.display='';
        objeto2 = document.getElementById('cuota');
        objeto2.value='20';
    }
    //
    //alert(' - '+document.getElementById('checkbox').value);
}
</script>   
</script>

