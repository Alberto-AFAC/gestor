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

// $correo = 'angel.canseco@sct.gob.mx';

// echo $v = conCorreo($correo,$conexion);

// ---  resultado($res1,$res2);
    
// --    $res = $res2;
  
// --echo $res;
      //--echo $res[1];
// $nombre = explode('.',$v);
// echo '<br>'.$c = intval($nombre[1]);

//  function conCorreo($correo,$conexion){

// $query="SELECT * FROM personal 
//     WHERE gstCorro = '$correo' AND estado = 0 
//     OR gstCinst = '$correo' AND estado = 0
//     OR gstSpcID = '$correo' AND estado = 0
//     ";
// $resultado= mysqli_query($conexion,$query);
//     if($resultado->num_rows==0){
//     return '0';
//     }else{
//        $res = mysqli_fetch_row($resultado);

//         return $res[1].''.$res[2].'.'.$res[22];
//     }
//     $this->conexion->cerrar();
// } 




//$query3 = "SELECT * FROM cursos WHERE idinsp  = $per[0] AND proceso = 'FINALIZADO'";



    $sql = "SELECT * FROM cursos";        
        $person = mysqli_query($conexion,$sql);
        while ($per = mysqli_fetch_row($person)) {

$query3 = "SELECT gstNombr,gstApell FROM cursos INNER JOIN personal ON idinsp = personal.gstIdper WHERE '2021-11-27' > fechaf AND `idinsp` = 1046 AND proceso = 'PENDIENTE'";

//FUERA DEL RANGO
// SELECT gstNombr,gstApell FROM cursos INNER JOIN personal ON idinsp = personal.gstIdper WHERE fechaf NOT BETWEEN '2021-11-23' AND '2021-11-29' AND `idinsp` = 1046
//DENTRO DEL RANGO
// SELECT gstNombr,gstApell FROM cursos INNER JOIN personal ON idinsp = personal.gstIdper WHERE fechaf BETWEEN '2021-11-23' AND '2021-11-29' AND `idinsp` = 1046
$resultado = mysqli_query($conexion, $query3);
if($curs = mysqli_fetch_row($resultado)){ 

//    echo '<br>'.$curs[0].' '.$curs[1];
//echo '<br>'.$enCurso = '0';

}else{
//echo '<br>no hay';
}
}



    // $actual = date("2021-11-27"); 
    // $hactual = date('H:i:s');
    // $fechap = '2021-11-24';
    // $hrs = '10:00:00';
    // $fin = date("d-m-Y",strtotime($fechap."+ 2 days")); 

    // $f3 = strtotime($actual);
    // $f2 = strtotime($fin); 

    // if ($f3>$f2){

    //   echo "caducado";

    // }else{
    //   echo "no caducado";
    // }








$query3 = "SELECT `idinsp`,`idmstr`,`idinst`,`codigo` FROM cursos 
           WHERE `idinsp` = 1046 AND `idmstr` = 1 
           UNION SELECT `idinsp`,`idmstr`,`idinst`,`codigo` FROM cursos 
           WHERE `idinsp` = 1046 AND `idmstr` = 2 
           UNION SELECT `idinsp`,`idmstr`,`idinst`,`codigo` FROM cursos 
           WHERE `idinsp` = 1046 AND `idmstr` = 7 ";
$resultado = mysqli_query($conexion, $query3);
$total = 0;
while($curs = mysqli_fetch_row($resultado)){ 

   echo '<br>'.$curs[0].' '.$curs[1];
   $total++;
}
echo "<br>";
echo $total;

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

<script type="text/javascript">
  
  // function idcurso(codigo) {

//     $.ajax({
//         url: '../php/curLista.php',
//         type: 'POST'
//     }).done(function(resp) {
//         obj = JSON.parse(resp);
//         var res = obj.data;
//         var x = 0;
//         //
//         //TODO AQUI ES
//         html =
//             '<table id="lstcurs" class="table display table-striped table-bordered" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i>ESPECIALIDAD</th><th><i></i>ASISTENCIA</th><th style="width:18%"><i></i>ACCIONES</th><th style="display:none;"><i></i>MOTIVO</th><th style="display:none;"><i></i>justifi</th></tr></thead><tbody id="myTable">';


//         //TRAE LOS DATOS DE LA TABLA CELDA RECURRENTE
//         $(document).ready(function() {
//             $("#lstcurs tr").on('click', function() {


//                 var toma1 = "",
//                     toma2 = "",
//                     toma3 = "",
//                     toma4 = ""; //declaramos las columnas NOMBRE DEL CURSO
//                 toma1 += $(this).find('td:eq(1) ').html(); //NOMBRE DEL CURSO  
//                 toma2 += $(this).find('td:eq(2)').html(); //PDF
//                 toma3 += $(this).find('td:eq(6)').html(); //PDF 
//                 toma4 += $(this).find('td:eq(7)').html(); //PDF  

//                 $("#nomdeclina1").text(toma1 + " " + toma2); // Label esta en valor.php
//                 $("#declinpdf1").attr('href', toma2); // Label esta en valor.php
//                 $("#motivod1").text('Motivo:' + toma3); // Label esta en valor.php
//                 //  $("#nombredeclin").text(toma4); // Label esta en valor.php
//                 $("#otrosd1").text(toma4); // Label esta en valor.php
//                 $("#declinpdf1").attr('href', toma4); // Label esta en valor.php


//                 if (toma3 == 'OTROS') {
//                     document.getElementById('otrosd1').style.display = '';
//                     document.getElementById('declinpdf1').style.display = 'none';
//                 }
//                 if (toma3 == 'TRABAJO') {
//                     document.getElementById('otrosd1').style.display = 'none';
//                     document.getElementById('declinpdf1').style.display = '';
//                 }
//                 if (toma3 == 'ENFERMEDAD') {
//                     document.getElementById('otrosd1').style.display = 'none';
//                     document.getElementById('declinpdf1').style.display = '';
//                 }

//             });
//             //020920211
//         });

//         for (i = 0; i < res.length; i++) {
//             x++;

//             year = obj.data[i].fcurso.substring(0, 4);
//             month = obj.data[i].fcurso.substring(5, 7);
//             day = obj.data[i].fcurso.substring(8, 10);
//             Finicio = day + '/' + month + '/' + year;
//             year = obj.data[i].fechaf.substring(0, 4);
//             month = obj.data[i].fechaf.substring(5, 7);
//             day = obj.data[i].fechaf.substring(8, 10);
//             Finaliza = day + '/' + month + '/' + year;

//             cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj
//                 .data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i]
//                 .gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso +
//                 "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i]
//                 .link + "*" + obj.data[i].gstNombr + "*" + obj.data[i].gstApell + "*" + obj.data[i].idmstr +
//                 "*" + obj.data[i].evaluacion + "*" + obj.data[i].idinsp + "*" + obj.data[i].id_curso + "*" + obj
//                 .data[i].confirmar + "*" + obj.data[i].codigo + '*' + obj.data[i].idinsp;

//             if (obj.data[i].gstCargo == 'ADMINISTRATIVO') {
//                 cargo = obj.data[i].gstCargo;
//             } else {
//                 cargo = obj.data[i].gstCatgr;
//             }
//             //--------------BASE DE VISTA DETALLE CURSO------------------------//
//             confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' +
//                 obj.data[i].id_curso + '"' +
//                 ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
//             evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' +
//                 cursos + '"' +
//                 ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
//             evalcurso =
//                 "<a type='button' style='margin-left:2px' title='Curso por evaluar' onclick='evalucurs(" + '"' +
//                 cursos + '"' +
//                 ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
//             listcer =
//                 "<a type='button' style='margin-left:2px' title='Generar Certificado' onclick='gencerti(" +
//                 '"' + cursos + '"' +
//                 ") ' class='btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:15px;'></i></a>";

//             // vista cuando se confirma "DETALLE DEL CURSO"
//             if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
//                 confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
//                     '"' + obj.data[i].id_curso + '"' +
//                     ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
//             }
//             // vista cuando se confirma "DETALLE DEL CURSO" CON EVALUACIÓN
//             if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO' && ((obj.data[i]
//                     .reaccion) == 'SI EXISTE')) {
//                 confirmar = "<a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
//                     '"' + obj.data[i].id_curso + '"' +
//                     ")' class='circular-button check green transition' ><i class='fa ion-android-done'  style='font-size:15px;'></i></a>";
//                 evalcurso =
//                     "<a type='button' style='margin-left:2px' title='Curso por evaluar' onclick='evalucurs(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
//             }
//             // vista cuando se DECLINA POR TRABAJO "DETALLE DEL CURSO"
//             if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'TRABAJO') {
//                 confirmar = "<a type='button' title='Declina la convocatoria' style= 'red' onclick='agregar(" +
//                     '"' + obj.data[i].id_curso + '"' +
//                     ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
//                 evaluacion = "";
//                 evalcurso = "";
//                 listcer = "";
//             }
//             // vista cuando se DECLINA POR ENFERMEDAD "DETALLE DEL CURSO"
//             if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'ENFERMEDAD') {
//                 confirmar = "<a type='button' title='Declina la convocatoria' style= 'red' onclick='agregar(" +
//                     '"' + obj.data[i].id_curso + '"' +
//                     ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
//                 evaluacion = "";
//                 evalcurso = "";
//                 listcer = "";
//             }
//             // vista cuando se DECLINA POR OTROS "DETALLE DEL CURSO"
//             if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'OTROS') {
//                 confirmar =
//                     "<a type='button' title='Declina la convocatoria otros' style= 'red' onclick='agregar(" +
//                     '"' + obj.data[i].id_curso + '"' +
//                     ")' class='circular-button declin transition pend1' data-toggle='modal' data-target='#modal-declinado1'></a>";
//                 evaluacion = "";
//                 evalcurso = "";
//                 listcer = "";
//             }
//             // vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
//             if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100) && ((obj.data[i]
//                     .reaccion) == 'SI EXISTE')) {
//                 evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:16px;'></i></a>";
//                 evalcurso =
//                     "<a type='button' style='margin-left:2px' title='Curso Evaluado' onclick='evalucurs(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
//             }
//             // vista cuando se APRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
//             if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100) && ((obj.data[i]
//                     .reaccion) == 'NO EXISTE')) {
//                 evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
//             }
//             // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" SIN EVALUACIÓN
//             if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1) && ((obj.data[i].reaccion) ==
//                     'NO EXISTE')) {
//                 evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
//             }
//             // vista cuando se REPRUEBA AL INSPECTOR "DETALLE DEL CURSO" CON EVALUACIÓN
//             if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1) && ((obj.data[i].reaccion) ==
//                     'SI EXISTE')) {
//                 evaluacion = "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>";
//                 evalcurso =
//                     "<a type='button' style='margin-left:2px' title='Curso Evaluado' onclick='evalucurs(" +
//                     '"' + cursos + '"' +
//                     ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:15px;'></i></a>";
//             }

//             //FIN BASE DE VISTA DETALLE CURSO

//             //---------------VISTA PRINCIPAL DE LA TABLA DETALLE INSPECTOR CURSO---------------//
//             if (obj.data[i].codigo == codigo) {

//                 data = obj.data[i].codigo + '*' + obj.data[i].id_curso + '*' + obj.data[i].gstNombr + '*' + obj
//                     .data[i].gstApell;

//                 if (obj.data[i].gstCargo == 'INSPECTOR' || obj.data[i].gstCargo == 'DIRECTOR' || obj.data[i]
//                     .gstCargo == 'ADMINISTRATIVO') {

//                     if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR') {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + cargo +
//                             "</td><td> <a type='button' title='Pendiente por confirmar asistencia' style= 'red' onclick='agregar(" +
//                             '"' + obj.data[i].id_curso + '"' +
//                             ")' class='circular-button right transition pend'><i class='fa ion-android-time'  style='font-size:18px;'></i>" +
//                             "</td><td>" +
//                             "</a> <a type='button' title='Generar Certificado' onclick='gencerti(" + '"' +
//                             cursos + '"' +
//                             ") ' class='datos btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa-list-ul' style='font-size:14px; color:#060248' ></i></a><a type='button' title='Eliminar inspector' onclick='eliNsp(" +
//                             '"' + data + '"' +
//                             ")' class='asiste btn btn-default' data-toggle='modal' style='margin-left:3px' data-target='#eliminar-modal'><i class='fa fa-trash-o text-danger' style='font-size:15px; margin-left:2px'></i></a><td style='display:none;'>" +
//                             obj.data[i].confirmar + "</td><td style='display:none;'>" + obj.data[i].justifi +
//                             "</td></td></tr>";

//                     } else {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + cargo + "</td><td> " + confirmar + "</td><td>" +
//                             evaluacion + evalcurso + listcer +
//                             "<a type='button' title='Eliminar' onclick='eliNsp(" + '"' + data + '"' +
//                             ")' class='btn btn-default' data-toggle='modal' style='margin-left:2px' data-target='#eliminar-modal'><i class='fa fa-trash-o text-danger' style='font-size:15px;'></i></a><td style='display:none;'>" +
//                             obj.data[i].confirmar + "</td><td style='display:none;'>" + obj.data[i].justifi +
//                             "</td></td></tr>";
//                     }


//                     //---------------VISTA PRINCIPAL DE LA TABLA DETALLE CURSO CORDINADOR (TOMA EL CURSO)---------------//
//                 } else if (obj.data[i].gstCargo == 'COORDINADOR') {

//                     if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR' && obj.data[i]
//                         .codigo == codigo && obj.data[i].idinst != obj.data[i].idinsp) {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + obj.data[i].gstCargo +
//                             "</td><td> <a type='button' title='Pendiente por confirmar asistencia' style= 'red' onclick='agregar(" +
//                             '"' + obj.data[i].id_curso + '"' +
//                             ")' class='circular-button right transition pend'><i class='fa ion-android-time'  style='font-size:18px;'></i>" +
//                             "</td><td>" +
//                             "</a> <a type='button' title='Generar Certificado' onclick='gencerti(" + '"' +
//                             cursos + '"' +
//                             ") ' class='datos btn btn-default' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa-list-ul' style='font-size:14px; color:#060248' ></i></a><td style='display:none;'>" +
//                             obj.data[i].confirmar + "</td><td style='display:none;'>" + obj.data[i].justifi +
//                             "</td></td></tr>";

//                     } else if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO' && obj.data[
//                             i].codigo == codigo && obj.data[i].idinst != obj.data[i].idinsp) {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> " + confirmar +
//                             "</td><td>" + evaluacion + evalcurso + listcer +
//                             "<td style='display:none;'>" +
//                             obj.data[i].confirmar + "</td><td style='display:none;'>" + obj.data[i].justifi +
//                             "</td></td></tr>";
//                     }
//                 }

//                 //---------------VISTA PRINCIPAL DE LA TABLA DETALLE DEL CURSO INSTRUCTOR---------------//

//                 if (obj.data[i].gstCargo == 'INSTRUCTOR' && obj.data[i].codigo == codigo) {
//                     html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                         .gstApell + "</td><td>" + cargo +
//                         "</td><td><center><img src='../dist/img/inspector.svg' alt='Inspector' title='Instructor' width='50px;'></center></td>" +
//                         "<td><a type='button' id='ev' title='Evaluación Inspector' onclick='inspeval(" + '"' +
//                         cursos + '"' +
//                         ")' class='btn btn-primary' data-toggle='modal' data-target='#modal-evalua'><i class='fa ion-clipboard' style='font-size:15px;'></i></a>  <a type='button' id='ev' title='Generación de constancias de participantes' onclick='generacion(" +
//                         '"' + cursos + '"' +
//                         ")' class='btn btn-primary' data-toggle='modal' data-target='#modal-masiva' ><i class='fa fa fa fa-list-ul' style='font-size:15px;'></i></a> </td></tr>";
//                 }

//                 //---------------VISTA PRINCIPAL DE LA TABLA DETALLE DEL CURSO COORDINADOR (PRINCIPAL)---------------//
//                 if (obj.data[i].gstCargo == 'COORDINADOR' && obj.data[i].codigo == codigo && obj.data[i]
//                     .idinst == obj.data[i].idinsp) {
//                     html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                         .gstApell + "</td><td>" + obj.data[i].gstCargo +
//                         "</td><td><center><img src='../dist/img/coordinador.svg' alt='Coordinador' title='Coordinador' width='50px;'></center></td>" +
//                         "<td>  </td></tr>";
//                 }

//             } else if (obj.data[i].codigo == codigo && obj.data[i].proceso == 'FINALIZADO') {

//                 if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {

//                     if (obj.data[i].gstCargo == 'COORDINADOR') {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + obj.data[i].gstCargo +
//                             "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
//                             '"' + obj.data[i].id_curso + '"' +
//                             ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
//                             "</td><td>" +
//                             "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' +
//                             cursos + '"' +
//                             ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
//                             '"' + cursos + '"' +
//                             ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" +
//                             '"' + cursos + '"' +
//                             ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a></td></tr>";
//                     } else {
//                         html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                             .gstApell + "</td><td>" + cargo +
//                             "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
//                             '"' + obj.data[i].id_curso + '"' +
//                             ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
//                             "</td><td>" +
//                             "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' +
//                             cursos + '"' +
//                             ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
//                             '"' + cursos + '"' +
//                             ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" +
//                             '"' + cursos + '"' +
//                             ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a></td></tr>";

//                     }

//                 }
//                 if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
//                     html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                         .gstApell + "</td><td>" + cargo +
//                         "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" +
//                         '"' + obj.data[i].id_curso + '"' +
//                         ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
//                         "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" +
//                         '"' + cursos + '"' +
//                         ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
//                         '"' + cursos + '"' +
//                         ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" +
//                         '"' + cursos + '"' +
//                         ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a></td></tr>";
//                 }
//                 if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
//                     html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i]
//                         .gstApell + "</td><td>" + cargo +
//                         "</td><td> <a type='button' title='Confirma asistencia'style= 'red' onclick='agregar(" +
//                         '"' + obj.data[i].id_curso + '"' +
//                         ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" +
//                         "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" +
//                         '"' + cursos + '"' +
//                         ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" +
//                         '"' + cursos + '"' +
//                         ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a></td></tr>";
//                 }
//             }

//         }

//         html += '</tbody></table>';
//         $("#proCursos").html(html);
//         // Buscador de tabla
//         $(document).ready(function() {
//             $("#myInput").on("keyup", function() {
//                 var value = $(this).val().toLowerCase();
//                 $("#myTable tr").filter(function() {
//                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//                 });
//             });
//         });
//     })
// }TODO

</script>


<!-- <?php

//echo'<br>';
//echo'<br>';
//echo'<br>';

//$codigo = 'FO89';
//echo $codigos = substr($codigo, 2); 


?>


<a href="https://www.campusmvp.es/recursos/" title="Al blog de recursos de campusMVP">
  <img src="/recursos/image.axd?picture=/2017/4T/enlaces-imagenes-campusmvp.png" alt="Enlace con imagen usando el logo de campusMVP" />
</a> -->





 <?php 

// $data = '123';

//  echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data})' style='width:100%; font-size:12px;'>FALTA QUE CONFIRME</a>";


// function detalle($data){

//   echo $data;

// }



    // $actual = date("2021-11-27"); 
    // $hactual = date('H:i:s');
    // $fechap = '2021-11-24';
    // $hrs = '10:00:00';
    // $fin = date("d-m-Y",strtotime($fechap."+ 2 days")); 

    // $f3 = strtotime($actual);
    // $f2 = strtotime($fin); 

    // if ($f3>$f2){

    //   echo "caducado";

    // }else{
    //   echo "no caducado";
    // }


// $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");    
//     $d = date('d');
//     $m = $meses[date('n')-1];
//     $y = date('Y');


// $semana = array("LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO","DOMINGO");
//     echo $actual = date("20-01-2022");
//     echo "<br>";
//     echo $semana[date("N")-1];
//     echo "<br>";
  
// echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");

// echo "<br>";
// $date='2022-01-19';
// echo date('l-d', strtotime($date));

// ini_set('date.timezone','America/Mexico_City');

// definimos 2 array uno para los nombre de los dias y otro para los nombres de los meses
// $nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );
// $nombresMeses = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

// // establecemos la fecha de inicio
// $inicio =  DateTime::createFromFormat('Y-m-d', '2022-01-19');
// // establecemos la fecha final (fecha de inicio + dias que queramos)
// $fin =  DateTime::createFromFormat('Y-m-d', '2022-01-24');
// $fin->modify( '+1 day' );

// // creamos el periodo de fechas
// //$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// $periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// // recorremos las dechas del periodo
// foreach($periodo as $date){
//     // definimos la variables para verlo mejor
//     $nombreDia = $nombresDias[$date->format("w")];
//     $nombreMes = $nombresMeses[$date->format("n")];
//     $numeroDia = $date->format("j");
//     $anyo = $date->format("Y");
//     // mostramos los datos
//     echo $nombreDia.' '.$numeroDia.' de '.$nombreMes.' de '.$anyo.'<br>';
// }


?>

<!-- <script type="text/javascript">
  let mes = document.createElement("DIV");
  mes.className = "mes";
document.body.appendChild(mes);

let tabla_mes = document.createElement("TABLE");
tabla_mes.className = "tabla_mes";
mes.appendChild(tabla_mes);

let titulo = document.createElement("CAPTION");
titulo.className = "titulo";
titulo.innerText = "Enero";
tabla_mes.appendChild(titulo);

var mes_text = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

function estructurar() {
   for (m = 0; m <= 11; m++) {
       //Título
       titulo.innerText = mes_text[m];
    }
}
let cabecera = document.createElement("THEAD");
tabla_mes.appendChild(cabecera);

let fila = document.createElement("TR");
cabecera.appendChild(fila);

var dia_text = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];

for (d = 0; d < 7; d++) {
    let dia = document.createElement("TH");
    dia.innerText = dia_text[d];
    fila.appendChild(dia);
}

let cuerpo = document.createElement("TBODY");
tabla_mes.appendChild(cuerpo);

for (f = 0; f < 6; f++) {
    let fila = document.createElement("TR");
    cuerpo.appendChild(fila);
    for (d = 0; d < 7; d++) {
        let dia = document.createElement("TD");
        dia.innerText = "1";
        fila.appendChild(dia);
    } 
}

function fechaPorDia(año, dia) {
  var date = new Date(año, 0);
  return new Date(date.setDate(dia));
}

numerar();

function numerar() {
    for (i = 1; i < 366; i++) {
        let fecha = fechaPorDia(2022, i);
    }
}

 let mes = fecha.getMonth();

let select_tabla = document.getElementsByClassName('tabla_mes')[mes];

let dia = fecha.getDate();
let dia_semana = fecha.getDay();

select_tabla.children[1].children[sem].children[dia_semana].innerText = dia;

if (dia == 1) {var sem = 0;}
if (dia_semana == 6) { sem = sem + 1;}

let dia = document.createElement("TD");
dia.innerText = "";


 // for (m = 0; m == 2; m++) {

 //  alert(m);
 // }

</script>
 -->






<?php

//$fcurso = '';
//$fechaf = '';

//function encurso($fcurso,$fechaf,$idinsps,$conexion){

// $sql = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
// INNER JOIN personal ON idinsp = personal.gstIdper WHERE proceso = 'PENDIENTE' AND idinsp = $idinsps ";        
// $person = mysqli_query($conexion,$sql);
// while ($per = mysqli_fetch_row($person)) {

// $query3 = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
// INNER JOIN personal ON idinsp = personal.gstIdper 
// WHERE '$fcurso' > fechaf AND idinsp = $idinsps";
// // '2021-11-24' > fcurso AND fechaf < '2021-11-27'

// $resultado = mysqli_query($conexion, $query3);
// if($curs = mysqli_fetch_row($resultado)){ 

// return false;
// //echo '<br>'.$enCurso = '0';

// }else{
// return $per[1].' '.$per[2].',';
// }
// }
///}


  // $query = "SELECT idinsp,Id_program,id_per,semanal.id_curso,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin FROM semanal INNER JOIN cursos ON codigo = semanal.id_curso WHERE idinsp = 1046";
  // $resultado = mysqli_query($conexion, $query);

  // if(!$resultado){
  //   die("error");
  // }else{
  //   while($data = mysqli_fetch_assoc($resultado)){

  //     $folio = $data['id_curso'];

  //     $data['folio'] = $folio;
  //     $arreglo["data"][] = $data; 
  //   }
  //   if(isset($arreglo)&&!empty($arreglo)){

  //     echo json_encode($arreglo);
  //   }else{

  //     echo $arreglo='0';
  //   }
  // }

echo "<br>---------------------------------------------------------------------------------------------------------------";
echo "<br>";
$id = '1046,1045';



$valor = explode(",", $id);
$val = count($valor);


foreach ($valor as $idinsps) {

// for($i=1; $i<=$val; $i++){
// }
  $prtcpnt = $idinsps;
  //mostrar($prtcpnt, $conexion);
mostrarDias($prtcpnt, $conexion);


}
// function mostrar($prtcpnt, $conexion){
//   $query = "SELECT dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin  FROM semanal WHERE id_curso = '0' AND habil = 'SI'";
//   $resultado = mysqli_query($conexion, $query);

//   if(!$resultado){
//     die("error");
//   }else{
//     while($data = mysqli_fetch_assoc($resultado)){


//       $data['prtcpnt'] = $prtcpnt;
//       $dia = $data['dia_semana'];
//       $mes = $data['num_mes'];
//       $hini = $data['hora_ini'];
//       $hfin = $data['hora_fin'];
 

//   $prtcpn = $data['prtcpnt'];
      
//   $queri = "SELECT idinsp,Id_program,id_per,semanal.id_curso AS codigos ,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,prtcpnt,gstNombr,gstApell 
//   FROM semanal 
//   INNER JOIN cursos ON codigo = semanal.id_curso
//   INNER JOIN personal ON gstIdper = id_per 
//   WHERE 
//   idinsp = $prtcpn AND 
//   dia_semana = $dia AND 
//   num_mes = $mes AND
//   habil = 'SI' AND 
//   prtcpnt = 'SI' 
//   -- AND FORMAT(hora_ini, 'hh:mm') BETWEEN '$hini' AND '$hfin'
//   ";
//   $resul = mysqli_query($conexion, $queri);

//   if($res = mysqli_fetch_array($resul)){
      
// $hrinipro = strtotime( $res['hora_ini'] ); 
// $hrfinpro = strtotime( $res['hora_fin'] );

// $hrinicom = strtotime( $hini ); 
// $hrfincom = strtotime( $hfin ); 

// if($hrinicom<$hrinipro && $hrinipro<$hrfincom || $hrinicom<$hrfinpro && $hrfinpro<$hrfincom){
      
//       $data['nombre'] = $res['gstNombr'].' '.$res['gstApell'];
//       $data['idinsp'] = $res['idinsp'];      
//       $data['prtcpnt'] = 'Existe';
//        $arreglo["data"][] = $data; 
// }else{
     
// }
//   }else{

//       $data['prtcpnt'] = 'NO ex';
//   }

//       if($data['prtcpnt']=='NO ex'){
//       }
      

//     }
//     if(isset($arreglo)&&!empty($arreglo)){

//       echo json_encode($arreglo);
//     }else{

//       echo $arreglo='0';
//     }
//   }

// }



function mostrarDias($prtcpnt, $conexion){

  $query = "SELECT dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin  FROM semanal WHERE id_curso = '0' AND habil = 'SI'";
  $resultado = mysqli_query($conexion, $query);

  if(!$resultado){
    die("error");
  }else{
    while($data = mysqli_fetch_assoc($resultado)){

      //$data['prtcpnt'] = $prtcpn;
      $prtcpn = $prtcpnt;
      $dia = $data['dia_semana'];
      $mes = $data['num_mes'];
      $hini = $data['hora_ini'];
      $hfin = $data['hora_fin'];
      $prtcpn;

          // echo $nombreDia = $nombresDias[$date->format("w")];

       mostrarEncurso($dia,$mes,$prtcpn,$hini,$hfin,$conexion);
        
  // }

    }

  }

}



function mostrarEncurso($dia,$mes,$prtcpn,$hini,$hfin, $conexion){

  $query = "SELECT idinsp,Id_program,id_per,semanal.id_curso AS codigos ,dia_semana,num_mes,habil,fec_inico,fec_fin,hora_ini,hora_fin,prtcpnt,gstNombr,gstApell,anio 
  FROM semanal 
  INNER JOIN cursos ON codigo = semanal.id_curso
  INNER JOIN personal ON gstIdper = $prtcpn 
  WHERE 
  idinsp = $prtcpn AND 
  dia_semana = $dia AND 
  num_mes = $mes AND
  habil = 'SI' AND 
  prtcpnt = 'SI'";

  $resultado = mysqli_query($conexion, $query);

  if(!$resultado){
    die("error");
  }else{
    
    while($data = mysqli_fetch_assoc($resultado)){

$hrinipro = strtotime( $data['hora_ini'] ); 
$hrfinpro = strtotime( $data['hora_fin'] );

$hrinicom = strtotime( $hini ); 
$hrfincom = strtotime( $hfin ); 
$n=0;
 if($hrinicom<=$hrinipro && $hrinipro<=$hrfincom || $hrinicom<=$hrfinpro && $hrfinpro<=$hrfincom){
      
  
  $n++;
  echo $n;

  $datos = $data['nombre'] = $data['gstNombr'].' '.$data['gstApell'].'=>'.$data['dia_semana'].'-'.$data['num_mes'].'-'.$data['anio'].' DE '.$data['hora_ini'].' A '.$data['hora_fin'];

       $arreglo[] = $datos; 
      


 }else{
     
 }

 
    }
    if(isset($arreglo)&&!empty($arreglo)){

      echo json_encode($arreglo);
    }else{

      echo $arreglo='0';
    }
  }

}


// function encurso($fcurso,$fechaf,$idinsps,$conexion){

// $sql = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
// INNER JOIN personal ON idinsp = personal.gstIdper WHERE proceso = 'PENDIENTE' AND idinsp = $idinsps ";        
// $person = mysqli_query($conexion,$sql);
// while ($per = mysqli_fetch_row($person)) {

// $query3 = "SELECT gstIdper,gstNombr,gstApell FROM cursos 
// INNER JOIN personal ON idinsp = personal.gstIdper 
// WHERE '$fcurso' > fechaf AND idinsp = $idinsps";
// // '2021-11-24' > fcurso AND fechaf < '2021-11-27'

// $resultado = mysqli_query($conexion, $query3);
// if($curs = mysqli_fetch_row($resultado)){ 

// return false;
// //echo '<br>'.$enCurso = '0';

// }else{
// return $per[1].' '.$per[2].',';
// }
// }
// }
// FORMAT(fechahora, 'dd/MM/yyyy hh:mm:ss tt') >= '2015-03-24 01:29:21.000'

// SELECT idtiempo,
// FORMAT(fecha, 'dd/MM/yyyy') Fecha, 
// Convert(Char(8), hora, 108) Hora, --108
// FORMAT(fechahora, 'dd/MM/yyyy hh:mm:ss tt') 'Fecha y Hora'
// FROM tiempos t
// WHERE FORMAT(fechahora, 'dd/MM/yyyy hh:mm:ss tt') >= '2015-03-24 01:29:21.000'
// AND FORMAT(fechahora, 'dd/MM/yyyy hh:mm:ss tt') <= '2015-12-25 11:29:59.000'


// select *
// from T
// where time_column between cast(getdate() as time) and cast(dateadd(hour, 16, getdate()) as time);


// $hinip = strtotime("11:00");
// $hfinp = strtotime("12:00");

// $hinia = strtotime("9:00");
// $hfina = strtotime("10:00");

// if($hinia<$hinip){
//   echo "ok";
// }else{
//   echo "no pasa";
// }

// $salario = 300000;
// // Observa los signos de agrupación. Son muy importantes para fijar las condiciones
// if( ($salario >= 0) && ($salario <= 500000) ) {
//     echo "SI PERTENECE AL RANGO";
// } else {
//     echo "NO PERTENECE AL RANGO"; 
// }





// $fecha_actual = date("11:30:00");
// //sumo una hora
// echo '<br>'.date("H:i",strtotime($fecha_actual."+ 0 hour")); 
// //resto una hora

// if($horario_ini_2<=$hora_compara && $hora_compara<=$horario_fin_2){
//       echo "La hora está en el horario 2";
//       return;
//     }  

// // Create two new DateTime-objects...
// $date1 = new DateTime('11:00:00');
// $date2 = new DateTime('13:30:00');

// // The diff-methods returns a new DateInterval-object...
// $diff = $date2->diff($date1);

// // Call the format method on the DateInterval-object
// echo '<br>'.$diff->format('%h:%i hours');  


// $horario_ini_1 = strtotime( "13:00:00" ); 
// $horario_fin_1 = strtotime( "14:00:00" );

// $horario_ini_2 = strtotime( "13:30:00" ); 
// $horario_fin_2 = strtotime( "14:00:00" ); 

// if($horario_ini_2<$horario_ini_1 && $horario_ini_1<$horario_fin_2 || $horario_ini_2<$horario_fin_1 && $horario_fin_1<$horario_fin_2){
//       echo "<br>La hora está en el horario 1";
//     }else{
//     echo "<br>La hora no está en ningún horario";
//     }

// $nombresDias = array("0","Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" );

// // establecemos la fecha de inicio
// $inicio =  DateTime::createFromFormat('Y-m-d', '2022-02-01');
// // establecemos la fecha final (fecha de inicio + dias que queramos)
// $fin =  DateTime::createFromFormat('Y-m-d', '2022-02-05');
// // creamos el periodo de fechas
// //$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// $periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// // recorremos las fechas del periodo
// $n=1; 
// foreach($periodo as $date){
//     // definimos la variables para verlo mejor
// $nombreDia = $nombresDias[$date->format("w")];
//   }



echo '<br>';
echo '<br>';
echo '<br>';

// $feini = '2022-02-01';
// $fefin = '2022-02-05';

// $nombresDias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" );

// // establecemos la fecha de inicio
// $inicio =  DateTime::createFromFormat('Y-m-d', $feini);
// // establecemos la fecha final (fecha de inicio + dias que queramos)
// $fin =  DateTime::createFromFormat('Y-m-d', $fefin);
// $fin->modify( '+1 day' );
// // creamos el periodo de fechas
// //$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// $periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);
// // recorremos las fechas del periodo
// $n=1; 

//  foreach($periodo as $date){
//     // definimos la variables para verlo mejor
// echo "<br>";
// echo "----------------";
//  echo $date->format("w");
// $anyo = $date->format("Y");
// }
// //echo $dia;
// echo "<br>";
// echo $anio = $anyo;


?>