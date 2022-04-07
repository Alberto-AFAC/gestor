<?php
include ('../conexion/conexion.php');

session_start();
    if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
        $id = $_SESSION['usuario']['id_usu'];
    }

    $opcion = $_POST["opcion"];
    $informacion = [];

    //CONDICIONES------------------------------------------------------------------------------

    //Condición donde registra al usuario
    if($opcion === 'registraroj'){
        //se pone los valores que se van a comparar
         $isSpc = $_POST['isSpc'];
         $idInspct = $_POST['idInspct'];
         $idsubtarea = $_POST['idsubtarea'];
         $comision = $_POST['comision'];
        
        if (comprobacion ($comision,$idsubtarea,$idInspct,$isSpc,$conexion)){
            $fechaInicio = $_POST['fechaInicio'];
            $fechaTermino = $_POST['fechaTermino'];
            $coordinador = $_POST['coordinador'];
            $instructor = $_POST['instructor'];
            $nivel = $_POST['nivel'];
            $ubicacion = $_POST['ubicacion'];
            $lugar = $_POST['lugar'];
            $sede = $_POST['sede'];
            $idtarea = $_POST['idtarea'];
            $fecincicomi = $_POST['fecincicomi'];
            $fecfincomi = $_POST['fecfincomi'];

            if (registrar($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion)){
                echo "0";
                
                historial($id,$isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion);
            }else{
                echo "1";
            }
        }else{

            echo "2";
        }
    //CONDICIÓN  A FINALIZAR LA TAREA
    }else if ($opcion === 'finalizarojt') {
        $id_proojt = $_POST['id_proojt'];

        if (finalojt($id_proojt, $conexion)) {
            echo "0";
            historialOJT($id,$id_proojt,$conexion);
        } else {
            echo "1";
        }
        //OJT INSERTARDA EN TABLA TEMPORAL
    }else if ($opcion === 'regisojtemp'){
        //se pone los valores que se van a comparar
         $isSpc = $_POST['isSpc'];
         $idInspct = $_POST['idInspct'];
         $arr = $_POST['arr'];
         //$valor = $_POST['array1'];
         $comision = $_POST['comision'];
         $tareaprin = $_POST['tareaprin'];
         //$varray1 = json_decode($valor, true);
         //$valor = count($varray1);
         $valor = explode(",", $arr);
         $val = count($valor);
         $n = 0;
         $var= 0;
         $enc = 0;
         $var;
         foreach ($valor as $idinsps) {
             $n++;
            if (comprobaciontem ($comision,$idinsps,$idInspct,$isSpc,$tareaprin,$conexion)){
            $fechaInicio = $_POST['fechaInicio'];
            $fechaTermino = $_POST['fechaTermino'];
            $coordinador = $_POST['coordinador'];
            $instructor = $_POST['instructor'];
            $nivel = $_POST['nivel'];
            $ubicacion = $_POST['ubicacion'];
            $lugar = $_POST['lugar'];
            $sede = $_POST['sede'];
            $fecincicomi = $_POST['fecincicomi'];
            $fecfincomi = $_POST['fecfincomi'];
            
            if (registrarpru($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$tareaprin,$idinsps,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion)){
                echo "0";
                
                historial($id,$isSpc,$idInspct,$idinsps,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion);
            }else{
                echo "1";
            }
        }else{
            echo "2";
        }
    }
}else if($opcion === 'registraroj1'){
    //se pone los valores que se van a comparar
     $isSpc = $_POST['isSpc'];
     $idInspct = $_POST['idInspct'];
     $idsubtarea = $_POST['idsubtarea'];
     $comision = $_POST['comision'];
    
    if (comprobacion ($comision,$idsubtarea,$idInspct,$isSpc,$conexion)){
        $fechaInicio = $_POST['fechaInicio'];
        $fechaTermino = $_POST['fechaTermino'];
        $coordinador = $_POST['coordinador'];
        $instructor = $_POST['instructor'];
        $nivel = $_POST['nivel'];
        $ubicacion = $_POST['ubicacion'];
        $lugar = $_POST['lugar'];
        $sede = $_POST['sede'];
        $idtarea = $_POST['idtarea'];
        $fecincicomi = $_POST['fecincicomi'];
        $fecfincomi = $_POST['fecfincomi'];

        if (registrarsub($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion)){
            echo "0";
            
            historial($id,$isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion);
        }else{
            echo "1";
        }
    }else{

        echo "2";
    }
//CONDICIÓN  A FINALIZAR LA TAREA
}else if($opcion === 'finojtpro1'){
    //se pone los valores que se van a comparar
     $isSpc = $_POST['isSpc'];
     $idInspct = $_POST['idInspct'];
     $idsubtarea = $_POST['idsubtarea'];
     $comision = $_POST['comision'];
     $fecincicomi = $_POST['fecincicomi'];
     $fecfincomi = $_POST['fecfincomi'];
    
    if (disponibilidad ($comision,$idsubtarea,$idInspct,$isSpc,$fecincicomi,$fecfincomi,$conexion)){
        $fechaInicio = $_POST['fechaInicio'];
        $fechaTermino = $_POST['fechaTermino'];
        $coordinador = $_POST['coordinador'];
        $instructor = $_POST['instructor'];
        $nivel = $_POST['nivel'];
        $ubicacion = $_POST['ubicacion'];
        $lugar = $_POST['lugar'];
        $sede = $_POST['sede'];
        $idtarea = $_POST['idtarea'];
    
        if (llenado($comision,$idInspct,$coordinador,$instructor,$conexion)){
            echo "0";
            finalizar($comision,$conexion);
            historial($id,$isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion);
            borrorojt($comision,$conexion);
        }else{
            echo "1";
        }
    }else{

        echo "2";
    }
//CONDICIÓN  A FINALIZAR LA TAREA
}

//FUNCIONES-----------------------------------------------------------------------------------

//FUNCION PARA COMPROBRAR SI EL ISNPECTOR YA SE ENCUENTRA PROGRAMADA EN ESA COMISION
function comprobacion ($comision,$idsubtarea,$idInspct,$isSpc,$conexion){
    $query="SELECT * FROM prog_ojt WHERE id_pers = '$idInspct' AND id_esp = '$isSpc' AND id_subtarea= '$idsubtarea' AND estado = 0 AND comision='$comision' ";
    $resultado= mysqli_query($conexion,$query);
    if($resultado->num_rows==0){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}
//FUNCION QUE HACE EL COMPRATIVO EN LA TABLA DE CURSOS PARA VER SI SE ENCUENTRA DISPONNIBLE ESA FECHA
function disponibilidad ($comision,$idsubtarea,$idInspct,$isSpc,$fecincicomi,$fecfincomi,$conexion){
    $query="SELECT * FROM cursos WHERE idinsp = '$idInspct' AND fcurso BETWEEN '$fecincicomi' and '$fecfincomi' or idinsp = '$idInspct' and fechaf BETWEEN '$fecincicomi' and '$fecfincomi'";
    $resultado= mysqli_query($conexion,$query);
    if($resultado->num_rows==0){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion de comprobación para ver si la persona ya se encuentra con acceso
function comprobaciontem ($comision,$idinsps,$idInspct,$isSpc,$tareaprin,$conexion){
    $query="SELECT * FROM tem_progojt WHERE id_esp = '$isSpc' AND id_subtarea= '$idinsps' AND estado = 0 AND comision='$comision' ";
    $resultado= mysqli_query($conexion,$query);
    if($resultado->num_rows==0){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion para guardar PROGRAMACIÓN
function registrar ($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion){
    $query="INSERT INTO prog_ojt VALUES(0,'$idInspct','$isSpc','$comision','$fecincicomi','$fecfincomi','$ubicacion','$fechaInicio','$fechaTermino', '$coordinador','$instructor','$nivel','$lugar','$sede','0',$idtarea,'$idsubtarea','PENDIENTE',0,'PENDIENTE',0)";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion para guardar PROGRAMACIÓN
function registrarsub ($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion){
    $query="INSERT INTO tem_progojt VALUES(0,'$idInspct','$isSpc','$comision','$fecincicomi','$fecfincomi','$ubicacion','$fechaInicio','$fechaTermino', '$coordinador','$instructor','$nivel','$lugar','$sede','0',$idtarea,'$idsubtarea','PENDIENTE',0,'PENDIENTE',0)";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}



//FUNCION PARA FINALIZAR LA PROGRAMACIÓN
function llenado($comision,$idInspct,$coordinador,$instructor,$conexion){
    $query="UPDATE tem_progojt SET id_pers='$idInspct',id_coorojt='$coordinador',id_insojt='$instructor' WHERE comision ='$comision' ";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//FUNCION PARA FINALIZAR LA PROGRAMACIÓN
function finalizar ($comision,$conexion){
    $query="INSERT INTO prog_ojt SELECT * FROM tem_progojt WHERE comision='$comision' ";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//FUNCION PARA FINALIZAR LA PROGRAMACIÓN
function borrorojt ($comision,$conexion){
    $query="DELETE FROM tem_progojt WHERE comision='$comision' ";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}


//funcion para guardar PROGRAMACIÓN TEMPORAL
function registrarpru ($isSpc,$fecfincomi,$fecincicomi,$comision,$idInspct,$tareaprin,$idinsps,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion){
    $query="INSERT INTO tem_progojt VALUES(0,'$idInspct','$isSpc','$comision','$fecincicomi','$fecfincomi','$ubicacion','$fechaInicio','$fechaTermino', '$coordinador','$instructor','$nivel','$lugar','$sede','0','$tareaprin','$idinsps','PENDIENTE',0,'PENDIENTE',0)";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion para finalizar
function finalojt ($id_proojt, $conexion){
    $query="UPDATE prog_ojt SET estatus='FINALIZADO' WHERE id_proojt ='$id_proojt' ";
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion para registra cambios
function historial($id,$isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$conexion){
    ini_set('date.timezone','America/Mexico_City');
    $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
   // $query = "INSERT INTO historial VALUES (0,'$id','PROGRAMA UNA SUBTAREA OJ',' PERSONA CON ID:' '$idInspct','$fecha')";
   $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'PROGRAMA UNA SUBTAREA OJ',concat(`gstNombr`,' ',`gstApell`,' / SUBTAREA: ',(select ojt_subtarea from ojts_subs where id_subojt =  $idsubtarea)),'$fecha' FROM personal WHERE gstIdper=$idInspct";

    
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
}

//funcion para registra cambios
function historialOJT($id,$id_proojt,$conexion){
    ini_set('date.timezone','America/Mexico_City');
    $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
   // $query = "INSERT INTO historial VALUES (0,'$id','PROGRAMA UNA SUBTAREA OJ',' PERSONA CON ID:' '$idInspct','$fecha')";
   $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'FINALIZA PROGRAMACIÓN OJT',concat(`id_pers`,' ',`id_esp`),'$fecha' FROM prog_ojt WHERE id_proojt=$id_proojt";

    
    if(mysqli_query($conexion,$query)){
        return true;
    }else{
        return false;
    }
}

?>