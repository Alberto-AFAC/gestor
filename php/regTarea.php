<?php
include("../conexion/conexion.php");
session_start();

if (isset($_SESSION['usuario']['id_usu']) && !empty($_SESSION['usuario']['id_usu'])) {
    $id = $_SESSION['usuario']['id_usu'];
}

$opcion = $_POST["opcion"];
$informacion = [];

if ($opcion === 'tareAgr') {
    $idcur = $_POST['idcur'];
    $titulo1 = $_POST['titulo1'];
    $dateR = $_POST['dateR'];
    // $descrip1 = $_POST['descrip1'];
    $idsubt = $_POST['idsubt'];
    //   $fechaA = $_POST['fechaA'];
    //   $fechaT = $_POST['fechaT']; 
    $idcur = $_POST['idcur'];
    $idarea = $_POST['idarea'];


    
    if ($idsubt == '') {
        $idsubt = 0;
    }
    //  accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion);
    if (Tareas($idcur,$titulo1,$idsubt,$dateR,$idarea,$conexion)) {
        //$realizo = 'ASIGNO AL USUARIO';
        //historial($id,$realizo,$gstIdper,$conexion);
        $valor = conIDtar($conexion);
        echo $valor;
    } else {
        echo 0;
    }
    $valors = $_POST['array'];
    $varray1 = json_decode($valors, true);
    $valor = count($varray1);

    for ($i = 0; $i < $valor; $i++) {
        $titulo = $varray1[$i]['tareauno'];
        $numsubt = 1;
        if ($titulo == '' && $numsubt == 1) {
        } else {
            if (tarea1($titulo, $numsubt, $conexion)) {
                //echo "0";
            } else {
                echo "1";
            }
        }
    }
    $valors2 = $_POST['array2'];
    $varray2 = json_decode($valors2, true);
    $valor2 = count($varray2);
    for ($i = 0; $i < $valor2; $i++) {
        $titulo = $varray2[$i]['tareados'];
        $numsubt = 2;
        if ($titulo == '' && $numsubt == 2) {
        } else {
            if (tarea1($titulo, $numsubt, $conexion)) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }
    $valors3 = $_POST['array3'];
    $varray3 = json_decode($valors3, true);
    $valor3 = count($varray3);
    for ($i = 0; $i < $valor3; $i++) {
        $titulo = $varray3[$i]['tareatre'];
        $numsubt = 3;
        if ($titulo == '' && $numsubt == 3) {
        } else {
            if (tarea1($titulo, $numsubt, $conexion)) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }
} else if ($opcion === 'agrIVA') {
    $idinsp = $_POST['idinsp'];
    if (agrIvas($idinsp, $conexion)) {
        echo "1";
    } else {
        echo "0";
    }
} else if ($opcion === 'ntfccn') {
    $valor = $_POST['array1'];
    $varray1 = json_decode($valor, true);
    $valor = count($varray1);
    $array2 = $_POST['array2'];
    $array2 = json_decode($array2, true);
    $array3 = $_POST['array3'];
    $array3 = json_decode($array3, true);
    for ($i = 0; $i < $valor; $i++) {
        $idtar = $varray1[$i]["id_tarea"];
        //$listreg = $varray1[$i]["listregis"];
        $evalsi = $array2[$i]["evalsi"];
        $evalno = $array3[$i]["evalno"];
        if ($evalsi != '' || $evalno != '') {
            if ($evalsi == 1) {
                $eval = 'SI';
            } else if ($evalno == 1) {
                $eval = 'NO';
            } else if ($evalsi == '') {
                $eval = '0';
            } else if ($evalno == '') {
                $eval = '0';
            }
            if (evaluarinspector($idtar, $eval, $conexion)) {
                //if($i==1){
                echo "0";
                //}
            } else {
                echo "1";
            }
        } else {
            if ($i == 1) {
                echo "2";
            }
        }
    }
} else if ($opcion === 'agregaojt') {

    $idojt = $_POST['idojt'];
    $subtarea = $_POST['subtarea'];
    //  $id = $_POST['idcur'];
    if (actualizarojt($idojt, $subtarea, $conexion)) {
        echo "0";
        // $realizo = 'ACTUALIZO TEMARIO '.$titulo;
        // historialT($idp,$realizo,$id,$conexion);
    } else {
        echo "1";
    }
} else if ($opcion === 'eliminartem') {

    $idojt = $_POST['idojt'];
    //$idsub = $_POST['idsub'];

    // $realizo = 'ELIMINO REG.'.$idcurso.' TEMARIO';
    // $id = $cursoid;
    // historialT($idp,$realizo,$id,$conexion);

    //      $ok = eliminarojt($idcurso,$cursoid,$conexion);
    if (eliminarojt($idojt, $conexion)) {
        echo '0';
    } else {
        echo '1';
    }
} else if ($opcion === 'deleojprincipal') {
    $id_spc = $_POST['id_spc'];

    if (deleojprincipal($id_spc, $conexion)) {
        echo '0';
		condeojt($id_spc, $conexion);
        histdelete($id, $id_spc, $conexion);
    } else {
        echo '1';
    }
} else if ($opcion === 'deletarprin') {
    $id_ojt = $_POST['id_ojt'];

    if (deltarprinc($id_ojt,$conexion)) {
        echo '0';
		deletarprin($id_ojt, $conexion);
		histdeltarp($id, $id_ojt,$conexion);

    } else {
        echo '1';
    }
}else if ($opcion === 'actarpri') {
    $id_ojt = $_POST['id_ojt'];
    $ojt_principal = $_POST['ojt_principal'];

    if (actutprin($id_ojt,$ojt_principal,$conexion)) {
        echo '0';
		histactp($id, $id_ojt,$conexion);

    } else {
        echo '1';
    }
}else if ($opcion === 'tareAgredith') {
    $idsutarea = $_POST['idsutarea'];
    $valors = $_POST['array'];
    $varray1 = json_decode($valors, true);
    $valor = count($varray1);
    for ($i = 0; $i < $valor; $i++) {
        $idsutarea = $_POST['idsutarea'];
        $titulo = $varray1[$i]['addsubojt1'];
        $numsubt = 1;
        if ($titulo == '' && $numsubt == 1) {
        } else {
            if (tarea1edith($idsutarea,$titulo, $numsubt, $conexion)) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }
    $valors2 = $_POST['array2'];
    $varray2 = json_decode($valors2, true);
    $valor2 = count($varray2);
    for ($i = 0; $i < $valor2; $i++) {
        $idsutarea = $_POST['idsutarea'];
        $titulo = $varray2[$i]['addsubojt2'];
        $numsubt = 2;
        if ($titulo == '' && $numsubt == 2) {
        } else {
            if (tarea1edith($idsutarea,$titulo, $numsubt, $conexion)) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }
    $valors3 = $_POST['array3'];
    $varray3 = json_decode($valors3, true);
    $valor3 = count($varray3);
    for ($i = 0; $i < $valor3; $i++) {
        $idsutarea = $_POST['idsutarea'];
        $titulo = $varray3[$i]['addsubojt3'];
        $numsubt = 3;
        if ($titulo == '' && $numsubt == 3) {
        } else {
            if (tarea1edith($idsutarea,$titulo, $numsubt, $conexion)) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }
}


function conIDtar($conexion)
{

    $query = "SELECT id_tar FROM tareas WHERE estado = 0 ORDER BY id_tar DESC LIMIT 1";
    $resultado = mysqli_query($conexion, $query);
    if ($resultado->num_rows == 0) {
        return '0';
    } else {
        $res = mysqli_fetch_row($resultado);

        return $res[0];
    }
    $this->conexion->cerrar();
}

// function accesos($gstIdper,$gstNombr,$gstNmpld,$AgstCargo,$conexion){

// $query="SELECT * FROM accesos WHERE password='$gstNmpld' AND usuario='$gstNombr' AND baja = 0 ";
//          $resultado= mysqli_query($conexion,$query);
//          $query="INSERT INTO accesos VALUES(0,'$gstIdper','$gstNombr','$gstNmpld','$AgstCargo',0,0);";
//      if($resultado->num_rows==0){
//              if(mysqli_query($conexion,$query)){

//                  return true;

//              }else{

//                  return false;
//              }
//              $this->conexion->cerrar();
//      }else{

//      }

// }

// function obligatorio($gstIdper,$gstObli,$conexion){
//  $query="INSERT INTO especialidadcat VALUES(0,'$gstIdper','$gstObli','NO',0);";
//      if(mysqli_query($conexion,$query)){
//          return true;
//      }else{
//          return false;
//      }
//      $this->conexion->cerrar();
// }

function Tareas($idcur,$titulo1,$idsubt,$dateR,$idarea,$conexion)
{

    // ini_set('date.timezone','America/Mexico_City');
    // $factual = date('Y').'/'.date('m').'/'.date('d');

    $query = "INSERT INTO ojts VALUES(0,'$idcur','$titulo1','$idsubt','$dateR',0,'$idarea');";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function tarea1($titulo, $numsubt, $conexion)
{

    $query = "INSERT INTO ojts_subs(idtarea,ojt_subtarea,numsubt,estado) 
            SELECT id_ojt,'$titulo',$numsubt,0 FROM ojts ORDER BY id_ojt DESC LIMIT 1";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function tarea1edith($idsutarea,$titulo,$numsubt,$conexion){
    $query = "INSERT INTO ojts_subs VALUES(0,'$idsutarea','$titulo','$numsubt',0)";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function agrIvas($idinsp, $conexion)
{

    $query = "INSERT INTO tarearealizar(idtarea,idiva,estado) SELECT id_tar,$idinsp,0 FROM tareas ORDER BY id_tar DESC LIMIT 1";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function actualizarojt($idojt, $subtarea, $conexion)
{
    $query = "UPDATE ojts_subs SET ojt_subtarea = '$subtarea' WHERE id_subojt = $idojt ";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function eliminarojt($idojt, $conexion)
{
    $query = "UPDATE ojts_subs SET estado = 1 WHERE id_subojt = $idojt";
    if (mysqli_query($conexion, $query)) {

        $res = mysqli_fetch_row($result);
        //  return $res[4]; 
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

//FUNCION QUE SIRVE PARA ELIMINAR TODOS LO OJT
function deleojprincipal($id_spc, $conexion)
{
   $query = "UPDATE ojts INNER JOIN ojts_subs ON ojts.id_ojt = ojts_subs.idtarea SET ojts.estado = 1 , ojts_subs.estado = 1 WHERE ojts.id_spc = '$id_spc'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function condeojt($id_spc, $conexion)
{
    $query = "UPDATE ojts SET estado = '1' WHERE id_spc='$id_spc'";
   //$query = "UPDATE ojts INNER JOIN ojts_subs ON ojts.id_ojt = ojts_subs.idtarea SET ojts.estado = 1 , ojts_subs.estado = 1 WHERE ojts.id_spc = '$id_spc'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}
//FUNCION QUE ELIMINA DE TAREA PRINCIPAL
function deltarprinc($id_ojt, $conexion)
{
    $query = "UPDATE ojts SET estado = '1' WHERE id_ojt='$id_ojt'";

    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function deletarprin($id_ojt, $conexion)
{
   $query = "UPDATE ojts INNER JOIN ojts_subs ON ojts.id_ojt = ojts_subs.idtarea SET ojts.estado = 1 , ojts_subs.estado = 1 WHERE ojts.id_ojt = '$id_ojt'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function actutprin($id_ojt,$ojt_principal,$conexion)
{
   $query = "UPDATE ojts SET ojt_principal = '$ojt_principal' WHERE id_ojt='$id_ojt'";
   //$query = "UPDATE ojts INNER JOIN ojts_subs ON ojts.id_ojt = ojts_subs.idtarea SET ojts.estado = 1 , ojts_subs.estado = 1 WHERE ojts.id_ojt = '$id_ojt'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function histdelete($id, $id_spc, $conexion)
{
    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('Y') . '/' . date('m') . '/' . date('d') . ' ' . date('H:i:s'); //fecha de realización
    // $query = "INSERT INTO historial VALUES (0,'$id', 'ELIMINACIÓN DE TODAS LAS TAREAS, SUB-TAREAS SUB-SUBTAREAS', 'PRUEBAS' ,'$fecha')";
    $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ELIMINACIÓN DE TODAS LAS TAREAS SUB-TAREAS SUB-SUBTAREA',concat(`gstCatgr`,' ',`gstCsigl`),'$fecha' FROM categorias WHERE gstIdcat= $id_spc";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}
//funcion para actualizar la tarea principal-----
function histactp($id, $id_ojt, $conexion)
{
    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('Y') . '/' . date('m') . '/' . date('d') . ' ' . date('H:i:s'); //fecha de realización
    // $query = "INSERT INTO historial VALUES (0,'$id', 'ELIMINACIÓN DE TODAS LAS TAREAS, SUB-TAREAS SUB-SUBTAREAS', 'PRUEBAS' ,'$fecha')";
    $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ACTUALIZA LA TAREA PRINCIPAL',concat(`ojt_principal`,' ','/ ID REGISTRO:',`id_ojt`),'$fecha' FROM ojts WHERE id_ojt= $id_ojt";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}

function histdeltarp($id, $id_ojt, $conexion)
{
    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('Y') . '/' . date('m') . '/' . date('d') . ' ' . date('H:i:s'); //fecha de realización
    // $query = "INSERT INTO historial VALUES (0,'$id', 'ELIMINACIÓN DE TODAS LAS TAREAS, SUB-TAREAS SUB-SUBTAREAS', 'PRUEBAS' ,'$fecha')";
    $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'ELIMINA TAREA PRINCIPAL',concat(`ojt_principal`,' ',`id_ojt`),'$fecha' FROM ojts WHERE id_ojt= $id_ojt";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    $this->conexion->cerrar();
}
//EVALUAR INSPECTOR CON FECHA 
function evaluarinspector($idtar, $eval, $conexion)
{

    $query = "UPDATE tarearealizar SET evalua = '$eval' WHERE id_tare='$idtar'";
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
    cerrar($conexion);
}

function cerrar($conexion)
{

    mysqli_close($conexion);
}