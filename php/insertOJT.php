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
        
        if (comprobacion ($idsubtarea,$idInspct,$isSpc,$conexion)){
            $fechaInicio = $_POST['fechaInicio'];
            $fechaTermino = $_POST['fechaTermino'];
            $coordinador = $_POST['coordinador'];
            $instructor = $_POST['instructor'];
            $nivel = $_POST['nivel'];
            $ubicacion = $_POST['ubicacion'];
            $lugar = $_POST['lugar'];
            $sede = $_POST['sede'];
            $idtarea = $_POST['idtarea'];

            if (registrar($isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion)){
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
    }

//FUNCIONES-----------------------------------------------------------------------------------

//funcion de comprobación para ver si la persona ya se encuentra con acceso
function comprobacion ($idsubtarea,$idInspct,$isSpc,$conexion){
    $query="SELECT * FROM prog_ojt WHERE id_pers = '$idInspct' AND id_esp = '$isSpc' AND id_subtarea= '$idsubtarea' AND estado = 0";
    $resultado= mysqli_query($conexion,$query);
    if($resultado->num_rows==0){
        return true;
    }else{
        return false;
    }
    $this->conexion->cerrar();
}

//funcion para guardar articulo
function registrar ($isSpc,$idInspct,$idsubtarea,$fechaInicio,$fechaTermino,$coordinador,$instructor,$nivel,$ubicacion,$lugar,$sede,$idtarea,$conexion){
    $query="INSERT INTO prog_ojt VALUES(0,'$idInspct','$isSpc','$ubicacion','$fechaInicio','$fechaTermino', '$coordinador','$instructor','$nivel','$lugar','$sede','0',$idtarea,'$idsubtarea','PENDIENTE',0,'PENDIENTE',0)";
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