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
        $gstNmpld=$_POST['gstNmpld'];
        
        if(registrar($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$gstNmpld,$conexion)){
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
}else if($opcion === 'insinpojt'){
    $id_pers=$_POST['id_pers'];
    $tipo=$_POST['tipo'];
    $objetivo=$_POST['objetivo'];

    if(comprojt($id_pers,$tipo,$conexion)){
        $objetivo=$_POST['objetivo'];
        
        if(regisojt($id_pers,$tipo,$objetivo,$conexion)){
            echo "0";
		    histojt($id,$id_pers,$tipo,$conexion);       
        }else{
	    	echo "1";
	    }
    }else{
		echo "2";
    }
}else if($opcion === 'deletereg'){
    $id_inscorojt=$_POST['id_inscorojt'];
    $tipo=$_POST['tipo'];
    $nombre=$_POST['nombre'];

    if (delregistro($id_inscorojt,$conexion)){
    echo "0";
    histdelreg($id,$id_inscorojt,$tipo,$nombre,$conexion);
    }else{
        echo "1";
    }
 //funcion que edita el objetivo de los instructores y coordinadores
}else if($opcion === 'updateins'){
    $id_inscorojt=$_POST['id_inscorojt'];
    $tipo=$_POST['tipo'];
    $objetivo=$_POST['objetivo'];
    $nombre=$_POST['nombre'];

    if (edithinoj($id_inscorojt,$tipo,$objetivo,$conexion)){
    echo "0";
    histupinsoj($id,$id_inscorojt,$tipo,$nombre,$objetivo,$conexion);
    }else{
        echo "1";
    }
}
        
//FUNCIONES-----------------------------------------------------------------------------------

    //funcion de comprobación para ver si la persona ya se encuentra registrada
    function comprobacion ($gstNombr,$gstApell,$conexion){
        $query="SELECT * FROM personal WHERE gstNombr = '$gstNombr' AND gstApell = '$gstApell' AND estado = 3 or gstNombr = '$gstNombr' AND gstApell = '$gstApell' AND estado = 0";
        $resultado= mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
        return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //funcion para guardar el registro
    function registrar($gstNombr,$gstApell,$gstLunac,$gstCurp,$gstRfc,$gstSexo,$gstIDCat,$gstCasa,$gstClulr,$gstCorro,$gstSpcID,$gstStado,$sgtCrhnt,$gstRusp,$gstNmpld,$conexion){
        $query="INSERT INTO personal VALUES(0,'$gstNombr','$gstApell','$gstLunac','0','$gstSexo','0','$gstCurp','$gstRfc','0','0','0','0','0','0','0','0','0','0','0','$gstStado','$gstCasa','$gstClulr','0','$gstNmpld','$sgtCrhnt','$gstRusp','0','0','0','0','$gstSpcID','0','INSPECTOR EXTERNO','$gstIDCat','0','$gstCorro','0','0','0','0','0','0','NO',0,'0',3)";
        if(mysqli_query($conexion,$query)){
        $queri = "INSERT INTO accesos(id_usu,usuario,password,privilegios,activo,baja,cambio) SELECT gstIdper,'$gstNombr','$gstNmpld','EXTERNO','0','0','0' FROM personal WHERE gstNombr='$gstNombr' AND gstApell='$gstApell' AND gstCargo='INSPECTOR EXTERNO'";
        mysqli_query($conexion,$queri);
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
            $queri ="UPDATE accesos SET estado='1' WHERE baja = '$gstIdper'";
            mysqli_query($conexion,$queri);
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
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ELIMINA PERSONA EXTERNA',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
//-----------------------------------------------------------------ALTA INSTRUCTOR OJT------------------------------------------------//

    //funcion de comprobación para ver si el inspector o coordinado OJ ya esta en la lista
    function comprojt ($id_pers,$tipo,$conexion){
        $query="SELECT * FROM instcoord_ojt WHERE id_pers = '$id_pers' AND tipo = '$tipo' AND estado = 0";
        $resultado= mysqli_query($conexion,$query);
        if($resultado->num_rows==0){
        return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //funcion para guardar el instructor o coordinador ojt
    function regisojt ($id_pers,$tipo,$objetivo,$conexion){
        $query="INSERT INTO instcoord_ojt VALUES(0,'$id_pers','$tipo','$objetivo',0)";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //funcion que guarda el historial de la persona
    function histojt($id,$id_pers,$tipo,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'SE AGREGA ' '$tipo',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal WHERE gstIdper=$id_pers";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
    //funcion para eliminar al instructor o coordinador ojt
    function delregistro ($id_inscorojt,$conexion){
        $query="UPDATE instcoord_ojt SET estado='1' WHERE id_inscorojt = '$id_inscorojt'";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //guarda el movimiento de eliminar registro de instrucotres y coodinadores ojt
    function histdelreg($id,$id_inscorojt,$tipo,$nombre,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial VALUES (0,$id,'ELIMINA ' '$tipo','$nombre','$fecha')";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
    }
    //funcion para editar al instructor o coordinador ojt
    function edithinoj ($id_inscorojt,$tipo,$objetivo,$conexion){
        $query="UPDATE instcoord_ojt SET tipo='$tipo', objetivo='$objetivo' WHERE id_inscorojt = '$id_inscorojt'";
        if(mysqli_query($conexion,$query)){
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }
    //guarda el movimiento de eliminar registro de instrucotres y coodinadores ojt
    function histupinsoj($id,$id_inscorojt,$tipo,$nombre,$objetivo,$conexion){
        ini_set('date.timezone','America/Mexico_City');
        $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
        $query = "INSERT INTO historial VALUES (0,$id,'ACTUALIZA INFORMACIÓN ', '$nombre' ' TIPO:' '$tipo' ' OBJETIVO:' '$objetivo' ' ID REGISTRO:' ' $id_inscorojt' ,'$fecha')";
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