<!--------------------------------checkbox simultaneos en javascript-------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<form>
<table>
<input type='checkbox' value='1'>
<input type="checkbox" value='2'>
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
