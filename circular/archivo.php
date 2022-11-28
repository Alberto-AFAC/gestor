<?php

if( isset($_POST['nombre']) || isset($_POST['comentario']) || isset($_POST['archivo']) || isset($_POST['correo']) || isset($_POST['persona']) || isset($_POST['fechacom'])){

if($_POST['nombre']=='' || $_POST['comentario']=='' || $_POST['archivo']=='' || $_POST['correo']=='' || $_POST['persona']=='0' || $_POST['fechacom']==''){

  echo "es necesario llenar los campos";
}else{

ini_set('date.timezone','America/Mexico_City');
$hora= date('H:i:s');  

//$fecha = $_POST['fechacom'].' a las '.$hora.utf8_decode(' Se realiz¨® el comentario');
$fecha = $_POST['fechacom'].' a las '.$hora.' Se comento:';

  $archivo=fopen('archivo/'.$_POST['archivo'].'.txt',"a") or die("No se pudo crear el archivo");
  $comentar = utf8_decode($_POST['comentario']);

//  fwrite($archivo,'Fecha: ');
  fwrite($archivo,$fecha);
  fwrite($archivo,"\n");
  fwrite($archivo,'Persona ');
  fwrite($archivo,$_POST['persona']);
  fwrite($archivo,"\n");
  fwrite($archivo,'Nombre archivo: ');
  fwrite($archivo,$_POST['archivo']);
  fwrite($archivo,"\n");  
  fwrite($archivo,'Nombre usuario: ');
  fwrite($archivo,$_POST['nombre']);
  fwrite($archivo,"\n");
  fwrite($archivo,'Correo usuario: ');
  fwrite($archivo,$_POST['correo']);
  fwrite($archivo,"\n");
  fwrite($archivo,'Comentario:');  
  fwrite($archivo,$comentar);
  fwrite($archivo,"\n");
  fwrite($archivo,'_____________________________');  
  fwrite($archivo,"\n");
  fclose($archivo);  
  }
}


?>