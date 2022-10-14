<script type="text/javascript">
var dataSet = [
<?php 


$queri = "SELECT *,DATE_FORMAT(iCurse, '%d/%m/%Y') as inicio,DATE_FORMAT(fCurse, '%d/%m/%Y') as final,file FROM historyc WHERE id_inspector = $datos[0] ";
$result = mysqli_query($conexion, $queri);

$x =0;
while($datas = mysqli_fetch_array($result)){ 
$x++;
$query = 
"
SELECT 
DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,
idinsp,
proceso,
evaluacion,
idmstr,
confirmar, 
gstTitlo,
gstVignc
FROM listacursos 
INNER JOIN cursos ON gstIdlsc = idmstr 
WHERE gstIdlsc = ".$datas['nCurse']."";
$resultado = mysqli_query($conexion, $query);
if($fecs = mysqli_fetch_row($resultado)){ 

$fecs[0];
$fecs[1];
//$per[0];

$pro = "<div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p>ÚNICO</div>";

$fechav = date("d-m-Y",strtotime($fecs[0]."+ ".$fecs[7]." year"));

if($fecs[7]==101){
$pro;

}else{
$pro = $fechav;     
}     

$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
ini_set('date.timezone','America/Mexico_City');
$actual= date("d-m-Y"); 

$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);

if($fecs[7]==101){  

$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center> <div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p>REALIZADO</div>";      

?>

["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],

<?php  
//}

}else 

//////////////////////////////////
if($f3>=$f1){
//$fech = 'vencido';
$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color:silver;'>REALIZADO</div>";
//#AC2925
?>



["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>",
"<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
],

<?php
}else if($f3 <= $f2 && $fecs[3] >= 80 ){ //$fech = 'vigente'; 
$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fechav' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #398439;'>VIGENTE</div>";
?>

["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>",
"<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #398439;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
],


<?php }

else 

if($f3 <= $f2 && $fecs[3] < 80 && $idcurso == $fecs[4] && $fecs[2]=='FINALIZADO'){ 



if($fecs[5] == 'CONFIRMADO'){
$conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>*</p>POR REALIZAR</td>";
}else{
$conf = "<td style='color: #333; background-color: #F4F4F4;'><p style='color:red;float:left; '>#</p>POR REALIZAR</td>";  
}

?>

["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],




<?php

}else if($f3 >= $f2){   //$fech = 'por vencer';   

$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='$fecs[0]' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #D58512;'>POR VENCER</div>";
?>

["<?php echo $x?>", "<?php echo $fecs[6]?>", "<?php echo $datas['tCurse']?>", "<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>",
"<div style='cursor:pointer; width:100%; text-align:center; color: white; background-color: #D58512;'>  <p style='color:red;float:left; '></p><?php echo $pro?></div>"
],

<?php
}  

}else if($datas['nCurse'] == 0){  

$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='Historial' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'><p style='color:red;float:left; '></p>REALIZADO</div>";  
?>

["<?php echo $x?>", "<?php echo $datas['nameOther']?>", "<?php echo $datas['tCurse']?>",
"<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],
<?php 

}else{  

$pro = "<div href='{$datas['file']}' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'>  <p style='color:red;float:left; '></p>ÚNICO</div>";

$conf = "<center><a href='{$datas['file']}' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center><div title='Historial' style='cursor:pointer; width:100%; text-align:center; color: white; background-color: silver;'><p style='color:red;float:left; '></p>REALIZADO</div>";  
?>

["<?php echo $x?>", "<?php echo $datas['nCurse']?>", "<?php echo $datas['tCurse']?>",
"<?php echo $datas['inicio']?>",
"<?php echo $datas['final']?>", "<?php echo $conf?>", "<?php echo $pro?>"],
<?php 

}


}


?>
];


var tableGenerarReporte = $('#data-table-historial').DataTable({
"language": {
"searchPlaceholder": "Buscar datos...",
"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
},
data: dataSet,
columns: [{
title: "ITEM"
}, {
title: "CURSO"
},
{
title: "TIPO"
},
{
title: "INICIO"
}, {

title: "TERMINO"
},
{
title: "ESTATUS"
},
{
title: "PRONOSTICO"
}
],
});


function cambio() {
$("#otro").toggle('toggle');
$("#curso").toggle('toggle');
}

function btnguardar() {

var paqueteDeDatos = new FormData();
paqueteDeDatos.append('fileDoc', $('#fileDoc')[0].files[0]);
paqueteDeDatos.append('tCurse', $("#tCurse").prop('value'));
paqueteDeDatos.append('iCurse', $("#iCurse").prop('value'));
paqueteDeDatos.append('fCurse', $("#fCurse").prop('value'));
paqueteDeDatos.append('mCurse', $("#mCurse").prop('value'));
paqueteDeDatos.append('sCurse', $("#sCurse").prop('value'));
paqueteDeDatos.append('idinsp', $("#idinsp").prop('value'));
paqueteDeDatos.append('nCurse', $('#nCurse').prop('value'));
paqueteDeDatos.append('nameOther', $('#nameOther').prop('value'));
paqueteDeDatos.append('nEmpl', $('#nEmpl').prop('value'));
$.ajax({
url: '../php/insertHistory.php',
data: paqueteDeDatos,
type: "POST",
contentType: false,
processData: false,
success: function(r) {
// alert(r);
if (r == 8) {
$('#vacio').toggle('toggle');
setTimeout(function() {
$('#vacio').toggle('toggle');
}, 4000);

} else if (r == 0) {
$('#exito').toggle('toggle');
setTimeout(function() {
$('#exito').toggle('toggle');
}, 4000);
setTimeout("location.href = 'history';", 2000);
$('#vacia').show('slow');
$('#agrega').hide();

} else if (r == 1) {
$('#falla').toggle('toggle');
setTimeout(function() {
$('#falla').toggle('toggle');
}, 4000);
} else if (r == 2) {
$('#error').toggle('toggle');
setTimeout(function() {
$('#error').toggle('toggle');
}, 4000);
} else if (r == 3) {
$('#renom').toggle('toggle');
setTimeout(function() {
$('#renom').toggle('toggle');
}, 4000);
} else if (r == 4) {
$('#forn').toggle('toggle');
setTimeout(function() {
$('#forn').toggle('toggle');
}, 4000);
} else if (r == 6) {
$('#adjunta').toggle('toggle');
setTimeout(function() {
$('#adjunta').toggle('toggle');
}, 4000);
} else if (r == 7) {
$('#repetido').toggle('toggle');
setTimeout(function() {
$('#repetido').toggle('toggle');
}, 4000);
}
}
});

// swal.showLoading();
// if (nCurse == '' || tCurse == '' || iCurse == '' || fCurse == '' || mCurse == '' || sCurse ==
// '') {
// Swal.fire({
// type: 'info',
// title: 'Notificaciones AFAC',
// text: 'Llene los campos que se solicitan',
// timer: 2000,
// customClass: 'swal-wide',
// showConfirmButton: false,
// });
// } else {
// $.ajax({
// type: "POST",
// url: "../php/insertHistory.php",
// data: {
// paqueteDeDatos: paqueteDeDatos,
// },
// success: function(data) {
// Swal.fire({
// type: 'success',
// title: 'AFAC INFORMA',
// text: 'Sus datos fueron guardados correctamente',
// showConfirmButton: false,
// timer: 2900,
// customClass: 'swal-wide',
// showConfirmButton: false,
// });
// setTimeout("location.href = 'history';", 2000);
// }
// });
// }

// return false;

}

// });
// });

// SELECT CONFIGURATION SEARCH
$(document).ready(function() {
$('select').selectize({
sortField: 'text'
});
});
</script>