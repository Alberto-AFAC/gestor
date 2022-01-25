<?php 
	include ('../conexion/conexion.php');

session_start();
    if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
        $id = $_SESSION['usuario']['id_usu'];
    }

    $opcion = $_POST["opcion"];
    $informacion = [];
//CONDICIONES------------------------------------------------------------------------------
if($opcion === 'registrar'){
    $gstNombr=$_POST['gstNombr'];
    $gstApell=$_POST['gstApell'];

    if(comprobacion($gstNombr,$gstApell,$conexion)){
        $gstLunac=$_POST['gstLunac'];
        $gstCurp=$_POST['gstCurp'];
        $gstRfc=$_POST['gstRfc'];
        $gstSexo=$_POST['gstSexo'];
        $gstIDCat=$_POST['gstIDCat'];
        $gstCasa=$_POST['gstCasa'];
        $gstClulr=$_POST['gstClulr'];
        $gstCorro=$_POST['gstCorro'];
        $gstSpcID=$_POST['gstSpcID'];
        $gstStado=$_POST['gstStado'];
        $sgtCrhnt=$_POST['sgtCrhnt'];
        $gstRusp=$_POST['gstRusp'];
        
        if(registrar($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$conexion)){
            echo "0";
		    historia($id,$conexion);       
        }else{
	    	echo "1";
	    }
    }else{
		echo "2";
    }
    
}else if($opcion === 'actualizar'){
        $gstNombr=$_POST['gstNombr'];
        $gstApell=$_POST['gstApell'];
        $gstLunac=$_POST['gstLunac'];
        $gstCurp=$_POST['gstCurp'];
        $gstRfc=$_POST['gstRfc'];
        $gstSexo=$_POST['gstSexo'];
        $gstIDCat=$_POST['gstIDCat'];
        $gstCasa=$_POST['gstCasa'];
        $gstClulr=$_POST['gstClulr'];
        $gstCorro=$_POST['gstCorro'];
        $gstSpcID=$_POST['gstSpcID'];
        $gstStado=$_POST['gstStado'];
        $sgtCrhnt=$_POST['sgtCrhnt'];
        $gstRusp=$_POST['gstRusp'];
        $gstIdper=$_POST['gstIdper'];

    if (actualizar($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$gstIdper,$conexion)){
        echo "0";
        histedith($id,$conexion);
    }else{
        echo "1";
    }
    
}else if($opcion === 'eliminar'){
    $gstIdper=$_POST['gstIdper'];

    if (eliminar($gstIdper,$conexion)){
    echo "0";
    histborrar($id,$conexion);
    }else{
        echo "1";
    }
}
        
//FUNCIONES-----------------------------------------------------------------------------------

    //funcion de comprobación para ver si la persona ya se encuentra registrada
    function comprobacion ($gstNombr,$gstApell,$conexion){
        $query="SELECT * FROM personal WHERE gstNombr = '$gstNombr' AND gstApell = '$gstApell' AND estado = 3";
        $resultado= mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
        return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //funcion para guardar el registro
    function registrar ($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$conexion){
        $query="INSERT INTO personal VALUES(0,'$gstNombr','$gstApell','$gstLunac','0','$gstSexo','0','$gstCurp','$gstRfc','0','0','0','0','0','0','0','0','0','0','0','$gstStado','$gstCasa','$gstClulr','0','0','$sgtCrhnt','$gstRusp','0','0','0','0','$gstSpcID','0','INSPECTOR','$gstIDCat','0','$gstCorro','0','0','0','0','0','0','NO',0,'0',3)";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //funcion para editar el registro
    function actualizar ($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$gstIdper,$conexion){
        $query="UPDATE personal SET gstNombr='$gstNombr', gstApell='$gstApell', gstLunac='$gstLunac', gstCurp='$gstCurp', gstRfc='$gstRfc', gstSexo='$gstSexo', gstIDCat='$gstIDCat', gstCasa='$gstCasa', gstClulr='$gstClulr', gstCorro='$gstCorro', gstSpcID='$gstSpcID', gstStado='$gstStado', sgtCrhnt='$sgtCrhnt', gstRusp='$gstRusp' WHERE gstIdper= '$gstIdper'";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        cerrar($conexion);
    }
    //funcion para eliminar el registro
    function eliminar ($gstIdper,$conexion){
        $query="UPDATE personal SET estado='1' WHERE gstIdper= '$gstIdper'";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        cerrar($conexion);
    }
     //funciones para guardar el historico
     function historia($id,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'AGREGO PERSONAL EXTERNO',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
    function histedith($id,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'SE ACTUALIZA DAT. PERSONAL EXTERNO',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
    function histborrar($id,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'SE BORRAR PERSONA EXTERNA',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
    function cerrar($conexion){
        mysqli_close($conexion);
    }
 ?>