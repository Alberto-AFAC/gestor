<?php 

ini_set('date.timezone','America/Mexico_City');
$datos[0];?>

<script type="text/javascript">
//TABLA OJT PEDIENTES POR CONFIRMAR
var dataSet = [
    <?php $query = "
    SELECT *,DATE_FORMAT(prog_ojt.fec_finoj, '%d/%m/%Y') as final,DATE_FORMAT(prog_ojt.fec_inioj, '%d/%m/%Y') as inicial,prog_ojt.fec_finoj AS fin  
    FROM prog_ojt 
    WHERE id_pers =$datos[0] AND confirojt = 'PENDIENTE' AND prog_ojt.estado = 0 ORDER BY id_proojt DESC";
    $resultado = mysqli_query($conexion, $query);
    while($data = mysqli_fetch_array($resultado)){ 
        $id_proojt = $data['id_proojt'];
        //$modalidad = $data['modalidad'];
        $fcurso = $data['inicial'];
        $fechaf = $data['final'];
        $fin = $data['fin'];
        $actual= date("Y-m-d"); 
        $hactual = date('H:i:s');
        $fin = date("d-m-Y",strtotime($data["fin"]));     
        $f3 = strtotime($actual);
        $f2 = strtotime($fin); 
        $id_tarea = $data["id_tarea"];
        $id_subtarea = $data['id_subtarea'];
        if($f3<=$f2){

            // TAREAS OJT
			$queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
			$resul = mysqli_query($conexion, $queri); 
			if($res = mysqli_fetch_array($resul)){
				$tareapri = $res['ojt_principal'];
			}else{
				$tareapri = "NO TIENE TAREA PRINCIPAL";
			}

            // SUBTAREAS OJT
			$queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
			$result = mysqli_query($conexion, $queriy);
			$y= 0;
			if($rest = mysqli_fetch_array($result)){
                $y++;
				
				$nomsubta = $rest['ojt_subtarea'];
				if($rest['numsubt']== 1){
					$numsub = "SUBTAREA 1";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}else if($rest['numsubt']== 2){
					$numsub = "SUBTAREA 2 - ID";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}else if($rest['numsubt']== 3){
					$numsub = "SUBTAREA 3 - ID";
					$subtarea = $numsub. ' / '  .$nomsubta;
				}
                
			}else{
				$subtarea = "NO HAY SUBTAREAS LIGAS";
			}

?>
    ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
        "<?php echo $fcurso?>", "<?php echo $fechaf?>",

        "<a type='button' title='Confirmar asistencia' onclick='confirmarojt(<?php echo $id_proojt ?>)' class='btn btn-warning' data-toggle='modal' data-target='#confirOJT'>CONFIRMAR</a>"

        //"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"

    ],
<?php }

}?>
]

var tableGenerarReporte = $('#data-table-confirmarojt').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "TAREA PRINCIPAL"
        },
        {
            title: "SUBTAREA"
        },
        {
            title: "NIVEL"
        },
        {
            title: "INICIA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

//TABLA 2
var dataSet = [
    <?php 
    $query = "SELECT *,DATE_FORMAT(prog_ojt.fec_finoj, '%d/%m/%Y') as final,DATE_FORMAT(prog_ojt.fec_inioj, '%d/%m/%Y') as inicial,prog_ojt.fec_finoj AS fin  
    FROM prog_ojt 
    WHERE id_pers =$datos[0] AND prog_ojt.estatus = 'PENDIENTE' AND prog_ojt.estado = 0 || id_pers =$datos[0]  AND confirojt='PENDIENTE' AND prog_ojt.estado = 0 ORDER BY id_proojt DESC";
        $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){ 
            //$id_curso = $data['id_curso'];
            $id_proojt = $data['id_proojt'];
            $fcurso = $data['inicial'];
            $fechaf = $data['final']; 
            $fin = $data['fin'];
            $actual= date("Y-m-d"); 
            $hactual = date('H:i:s');
            $fin = date("d-m-Y",strtotime($data["fin"]));     
            $f3 = strtotime($actual);
            $f2 = strtotime($fin); 
            $id_tarea = $data["id_tarea"];
            $id_subtarea = $data['id_subtarea'];
            if($f3<=$f2){
                
            //AQUIIIIII
                // TAREAS OJT
			$queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
			$resul = mysqli_query($conexion, $queri); 
			    if($res = mysqli_fetch_array($resul)){
				    $tareapri = $res['ojt_principal'];
		        }else{
                    $tareapri = "NO TIENE TAREA PRINCIPAL";
                }
                // SUBTAREAS OJT
                $queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
                $result = mysqli_query($conexion, $queriy);
                $y= 0;
                if($rest = mysqli_fetch_array($result)){
                    $y++;
                    $nomsubta = $rest['ojt_subtarea'];
                    if($rest['numsubt']== 1){
                        $numsub = "SUBTAREA 1";
                        $subtarea = $numsub. ' / '  .$nomsubta;
                    }else if($rest['numsubt']== 2){
                        $numsub = "SUBTAREA 2 - ID";
                        $subtarea = $numsub. ' / '  .$nomsubta;
                    }else if($rest['numsubt']== 3){
                        $numsub = "SUBTAREA 3 - ID";
                        $subtarea = $numsub. ' / '  .$nomsubta;
                    }
                }else{
                    $subtarea = "NO HAY SUBTAREAS LIGAS";
                }
                if($data['confirojt']=='PENDIENTE'){
                    $valor="<span title='Pendiente por confirmar' style='background-color: grey; font-size: 13px;' class='badge'>PENDIENTE</span>";
?>
    ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
        "<?php echo $fcurso?>", "<?php echo $fechaf?>",
        "<?php echo $valor?>"
    ],
    <?php }else if($data['confirojt']=='CONFIRMADO'){ 
        $valor="<span  onclick='confirmar1($id_proojt)'  style='background-color:green; font-size: 13px; cursor:pointer;' data-toggle='modal' data-target='#modal-detalle' class='badge' title='Ver detalles del curso'>CONFIRMADO</span>"; //23112021

?>  ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
    "<?php echo $fcurso?>", "<?php echo $fechaf?>",
    "<?php echo $valor?>"
    ],

    <?php }
}
}?>
]

var tableGenerarReporte = $('#data-table-programadoojt').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "TAREA PRINCIPAL"
        },
        {
            title: "SUBTAREA"
        },
        {
            title: "NIVEL"
        },
        {
            title: "INICIA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ASISTENCIA"
            //"visible": false
        }
    ],
});

// OJT COMPLETADOS
var dataSet = [
    <?php $query = "SELECT *,DATE_FORMAT(prog_ojt.fec_finoj, '%d/%m/%Y') as final,DATE_FORMAT(prog_ojt.fec_inioj, '%d/%m/%Y') as inicial,prog_ojt.fec_finoj AS fin  
    FROM prog_ojt 
    WHERE id_pers =$datos[0] AND prog_ojt.estatus = 'FINALIZADO' AND prog_ojt.estado = 0 ORDER BY id_proojt DESC";
    $resultado = mysqli_query($conexion, $query);
    while($data = mysqli_fetch_array($resultado)){ 
        //$id_curso = $data['id_curso'];
        $id_proojt = $data['id_proojt'];
        $fcurso = $data['inicial'];
        $fechaf = $data['final']; 
        $fin = $data['fin'];
        $actual= date("Y-m-d"); 
        $hactual = date('H:i:s');
        $fin = date("d-m-Y",strtotime($data["fin"]));     
        $f3 = strtotime($actual);
        $f2 = strtotime($fin); 
        $id_tarea = $data["id_tarea"];
        $id_subtarea = $data['id_subtarea'];
        if($f3<=$f2){
            
        //AQUIIIIII
            // TAREAS OJT
        $queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
        $resul = mysqli_query($conexion, $queri); 
            if($res = mysqli_fetch_array($resul)){
                $tareapri = $res['ojt_principal'];
            }else{
                $tareapri = "NO TIENE TAREA PRINCIPAL";
            }
            // SUBTAREAS OJT
            $queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
            $result = mysqli_query($conexion, $queriy);
            $y= 0;
            if($rest = mysqli_fetch_array($result)){
                $y++;
                $nomsubta = $rest['ojt_subtarea'];
                if($rest['numsubt']== 1){
                    $numsub = "SUBTAREA 1";
                    $subtarea = $numsub. ' / '  .$nomsubta;
                }else if($rest['numsubt']== 2){
                    $numsub = "SUBTAREA 2 - ID";
                    $subtarea = $numsub. ' / '  .$nomsubta;
                }else if($rest['numsubt']== 3){
                    $numsub = "SUBTAREA 3 - ID";
                    $subtarea = $numsub. ' / '  .$nomsubta;
                }
            }else{
                $subtarea = "NO HAY SUBTAREAS LIGAS";
            }
            if($data['estatus']=='PENDIENTE'){
                $valor="<span title='Pendiente por confirmar' style='background-color: grey; font-size: 13px;' class='badge'>PENDIENTE</span>";
?>
["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
    "<?php echo $fcurso?>", "<?php echo $fechaf?>",
    "<?php echo $valor?>"
],
<?php }else if($data['estatus']=='FINALIZADO' && $data['evalu_ojt']=='SI'){ 
    $valor="<span  onclick='confirmar1($id_proojt)'  style='background-color:green; font-size: 13px; cursor:pointer;' data-toggle='modal' data-target='#modal-detalle' class='badge' title='Ver detalles del curso'>FINALIZADO</span>"; //23112021
    $detalles="<span title='Pendiente por confirmar' style='background-color: grey; font-size: 13px;' class='badge'>EVALUADO</span>";
?>  ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
"<?php echo $fcurso?>", "<?php echo $fechaf?>",
"<?php echo $valor?>","<?php echo $detalles?>"
],

<?php }else if($data['estatus']=='FINALIZADO' && $data['evalu_ojt']=='0'){ 
    $valor="<span  onclick='confirmar1($id_proojt)'  style='background-color:green; font-size: 13px; cursor:pointer;' data-toggle='modal' data-target='#modal-detalle' class='badge' title='Ver detalles del curso'>FINALIZADO</span> <span title='Pendiente por confirmar' style='background-color: grey; font-size: 13px;' class='badge'>EVALUACIÓN PENDIENTE</span>"; //23112021
    $detalles="<a type='button' style='background-color:' title='Evaluación de OJT' data-toggle='modal' data-target='#modal-evaluOJT' onclick='' class='btn btn-primary'>EVALUAR</a>";
?>  ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $data['nivel']?>",
"<?php echo $fcurso?>", "<?php echo $fechaf?>",
"<?php echo $valor?>","<?php echo $detalles?>"
],

<?php }
}
}?>
]
    var tableGenerarReporte = $('#data-table-completoOJT').DataTable({
        "order": [
            [5, "desc"]
        ],
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
    
        data: dataSet,
        columns: [{
                title: "TAREA"
            },
            {
                title: "SUBTAREA"
            },
            {
                title: "NIVEL"
            },
            {
                title: "INICIA"
            },
            {
                title: "FINALIZA"
            },
            {
                title: "DETALLES"
            },
            {
                title: "ACCIONES"
            }
        ],
});
    
//FUNCION DE CURSOS DECLINADOS
var dataSet = [
    <?php 
$query = "SELECT *,DATE_FORMAT(prog_ojt.fec_finoj, '%d/%m/%Y') as final,DATE_FORMAT(prog_ojt.fec_inioj, '%d/%m/%Y') as inicial,prog_ojt.fec_finoj AS fin  
    FROM prog_ojt 
    WHERE id_pers =$datos[0] AND prog_ojt.estado = 0 ORDER BY id_proojt DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_proojt'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];
$id_tarea = $data["id_tarea"];
$id_subtarea = $data['id_subtarea'];


//--------------------------------

// TAREAS OJT
$queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
$resul = mysqli_query($conexion, $queri); 
if($res = mysqli_fetch_array($resul)){
    $tareapri = $res['ojt_principal'];
}else{
    $tareapri = "NO TIENE TAREA PRINCIPAL";
}

// SUBTAREAS OJT
$queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
$result = mysqli_query($conexion, $queriy);
$y= 0;
if($rest = mysqli_fetch_array($result)){
    $y++;
    
    $nomsubta = $rest['ojt_subtarea'];
    if($rest['numsubt']== 1){
        $numsub = "SUBTAREA 1";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }else if($rest['numsubt']== 2){
        $numsub = "SUBTAREA 2 - ID";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }else if($rest['numsubt']== 3){
        $numsub = "SUBTAREA 3 - ID";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }
    
}else{
    $subtarea = "NO HAY SUBTAREAS LIGAS";
}

//-----------------------

if($data['confirojt']=='ENFERMEDAD'){
$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadoOJT' onclick='infdecOJT($id_curso)'>DECLINADO</span>";


?>["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo  $fcurso?>",
        "<?php echo $fechaf?>", "<?php echo $data['nivel']?>",
        "<?php echo $valor ?>"
    ],

    <?php }else if($data['confirojt']=='TRABAJO'){ 
        $valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadoOJT' onclick='infdecOJT($id_curso)'>DECLINADO</span>"; ?>

    ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo  $fcurso?>",
        "<?php echo $fechaf?>", "<?php echo $data['nivel']?>",
        "<?php echo $valor ?>"
    ],

    <?php }else if($data['confirojt']=='OTROS'){
        $valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadoOJT' onclick='infdecOJT($id_curso)'>DECLINADO</span>";?>

    ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo  $fcurso?>",
        "<?php echo $fechaf?>", "<?php echo $data['nivel']?>",
        "<?php echo $valor ?>"
    ],

    <?php } 
}?>
];
var tableGenerarReporte = $('#data-table-canceladoOJT').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "TAREA"
        },
        {
            title: "SUBTAREA"
        },
        {
            title: "INICIA"
        },
        {
            title: "FIN"
        },
        {
            title: "NIVEL"
        },
        {
            title: "DETALLES"
        }
    ],
});

//---------------------------------FUNCION DE CURSOS VENCIDOS DE CONVOCATORIA--------------------------------

var dataSet = [
    <?php 
$query = "SELECT *,DATE_FORMAT(prog_ojt.fec_finoj, '%d/%m/%Y') as final,DATE_FORMAT(prog_ojt.fec_inioj, '%d/%m/%Y') as inicial,prog_ojt.fec_finoj AS fin  
FROM prog_ojt 
WHERE id_pers =$datos[0] AND confirojt = 'PENDIENTE' AND prog_ojt.estado = 0 ORDER BY id_proojt DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_proojt = $data['id_proojt'];
$fcurso = $data['inicial'];
$fechaf = $data['final'];
//$eva = $data['evaluacion'];
$fin = $data['fin'];
$valor = 'FECHA';
$actual = date("Y-m-d"); 
$hactual = date('H:i:s');
$fin = date("d-m-Y",strtotime($data["fin"])); 
$f3 = strtotime($actual);
$f2 = strtotime($fin);
$id_tarea = $data["id_tarea"];
$id_subtarea = $data['id_subtarea'];

// TAREAS OJT---------------------------------------------------------------------
$queri = "SELECT * FROM ojts  WHERE id_ojt=$id_tarea ORDER BY id_ojt DESC";
$resul = mysqli_query($conexion, $queri); 
if($res = mysqli_fetch_array($resul)){
    $tareapri = $res['ojt_principal'];
}else{
    $tareapri = "NO TIENE TAREA PRINCIPAL";
}

// SUBTAREAS OJT
$queriy = "SELECT * FROM ojts_subs  WHERE id_subojt= $id_subtarea ORDER BY id_subojt  DESC";
$result = mysqli_query($conexion, $queriy);
$y= 0;
if($rest = mysqli_fetch_array($result)){
    $y++;
    
    $nomsubta = $rest['ojt_subtarea'];
    if($rest['numsubt']== 1){
        $numsub = "SUBTAREA 1";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }else if($rest['numsubt']== 2){
        $numsub = "SUBTAREA 2 - ID";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }else if($rest['numsubt']== 3){
        $numsub = "SUBTAREA 3 - ID";
        $subtarea = $numsub. ' / '  .$nomsubta;
    }
    
}else{
    $subtarea = "NO HAY SUBTAREAS LIGAS";
}

//-----------------------

if($f3>$f2 && $data['confirojt']=='PENDIENTE' || $f3>$f2 && $data['estatus']=='FINALIZADO'){   ?>

    ["<?php echo $tareapri?>", "<?php echo $subtarea?>", "<?php echo $fcurso?>",
        "<?php echo $fechaf?>", "<?php echo $data['nivel']?>",
        "<span  class='badge' style='background-color: red; font-size: 14px;'>VENCIDO</span><span title='No se envió respuesta de asistencia.' class='badge' style='background-color: orange; font-size: 14px;'>SIN RESPUESTA</span>"
    ],
    <?php }

}?>
]

var tableGenerarReporte = $('#data-table-vencidosOJT').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "TAREA"
        },
        {
            title: "SUBTAREA"
        },
        {
            title: "INICIA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "NIVEL"
        },
        {
            title: "DETALLES"
        }
    ],
});

//---------------------------------------------------------------------------------------------------------------
var counter = 0;

function desactivar() {

    descaraPDF(arguments[0]);

    if (counter < 1) {
        document.getElementById("myCertificate").enable = true;
        counter++;
    } else {
        document.getElementById("myCertificate").disabled = true;

    }
}

function descaraPDF(v) {

    $.ajax({
        url: '../php/proCurso.php',
        type: 'POST',
        data: 'v=' + v + '&opcion=PDF'

    }).done(function(respuesta) {

        if (respuesta == 0) {
            Swal.fire({
                type: 'success',
                // title: 'AFAC INFORMA',
                text: 'PDF DESCARGADO',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `rgba(100, 100, 100, 0.4)`
            });

            setTimeout("location.href = 'inspector';", 1000);
        }
    });

}
//DATATABLES OJT//
// var id = id;
// 
// $(document).ready(function() {

//     $('#data-table-ojt').DataTable({

//         "language": {
//         "searchPlaceholder": "Buscar datos...",
//         "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
//     },
//         "ajax": '../php/data-task-inspector.php'
//         // "type": 'GET',
//         //             "data": {
//         //                 id: +id
//         //             },
//     });
//     alert(id);
// });

var dataSet = [
    <?php
$id = $datos[0];
$query = "SELECT
id_tar,titulo,descripcion, fechaA, fechaT,
listacursos.gstTitlo,gstTipo,gstPrfil,
personal.gstNombr,gstApell,gstCargo,
tarearealizar.idiva,entrega,id_tare,evalua      
FROM
tareas
INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva
WHERE idiva = $id";
    $resultado = mysqli_query($conexion, $query);
   
    $contador = 0;

    while($data = mysqli_fetch_assoc($resultado)){
        $contador++;
        $responsables = $data["gstNombr"]." ".$data["gstApell"];
        $pendiente = "<img onclick='consultarDatos({$data["id_tare"]})' data-toggle='modal' data-target='#pendiente' src='../dist/img/tarea_pendiente.png' alt='Tarea-Pendiente' title='Sin entregar' style='width: 40px;'>";
        $cumplio = "<img src='../dist/img/cumplio.png' alt='Tarea-Pendiente' title='Tarea entregada' style='width: 40px;'>";

     if($data['entrega'] == 1 && $data['evalua'] == "SI"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $cumplio?> APROBADO"],
    <?php
}else if($data['entrega'] == 1 && $data['evalua'] == "0"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $cumplio?> Sin evaluar"],
    <?php

    
}else if($data['entrega'] == 1 && $data['evalua'] == "NO"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<center><?php echo $cumplio?><p class='badge'>NO ACRÉDITO</center> "],
    <?php

    
}else{
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $pendiente?>"],
    <?php

    
}
}?>
]

var tableGenerarReporte = $('#data-table-ojt').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "#"
        },
        {
            title: "CURSO"
        },
        {
            title: "TAREA"
        },
        {
            title: "DESCRIPCIÓN"
        },
        {
            title: "INICIO"
        },
        {
            title: "FINAL"
        },
        {
            title: "DETALLES"
        }
    ],
});


//VALIDAR DATOS//
// $(document).ready(function(){
//      $('#validar').click(function(){
//             var entrega  = $("#sientrega").val();
//             var noentrega  = $("#noentrega").val();
//             swal.showLoading();
//                 if(entrega == '' ){
//                 Swal.fire({
//                     type: 'info',
//                     title: 'ATENCIÓN!',
//                     text: 'No has confirmado entrega',
//                     showConfirmButton: false,
//                     customClass: 'swal-wide'
//                 });
//                 }else{
//          $.ajax({
//              type:"POST",
//              url:"",
//              data: {entrega:entrega,noentrega:noentrega},
//              success:function(data){
//                 Swal.fire({
//                   type: 'success',
//                   title: 'AFAC INFORMA',
//                   text: 'Guardado con éxito',
//                   showConfirmButton: false,
//                   timer: 2900,
//                   showConfirmButton: false,
//                   customClass: 'swal-wide'
//                 });
//              }
//          });
//         }

//          return false;
//      });
//  });


function consultarDatos(id) {
    $("#tareas").slideDown("slow");
    $.ajax({
        url: '../php/tareas-list.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_tare == id) {
                id_tare = $("#pendiente #id_tare").val(obj.data[i].id_tare),
                    titulo = $("#pendiente #titulo").html(obj.data[i].titulo),
                    entrega = $("#pendiente #entrega").val(obj.data[i].entrega),
                    opcion = $("#pendiente #opcion").val("modificar");
            }
        }
    })
}

function modificar() {
    var frm = $("#tareas").serialize();
    $.ajax({
        url: "../php/insert-task.php",
        type: 'POST',
        data: frm + "&opcion=modificar"
    }).done(function(respuesta) {
        if (respuesta == 0) {
            Swal.fire({
                type: 'success',
                title: 'FINALIZADO',
                // text: 'Credenciales actualizadas correctamente',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
rgba(100, 100, 100, 0.4)
`
            });
            setTimeout("location.href = 'inspector';", 2000);
        } else {
            Swal.fire({
                type: 'info',
                // title: 'ÉXITO',
                text: 'Necesitas confirmar la entrega de tu OJT',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
rgba(100, 100, 100, 0.4)
`
            });
        }

    });
}


var dataSet = [
    <?php 
         $query = "SELECT *,listacursos.gstIdlsc AS list FROM especialidadcat  
                   INNER JOIN categorias ON especialidadcat.gstIDcat = categorias.gstIdcat
                   INNER JOIN listacursos ON listacursos.gstPrfil = categorias.gstCsigl
                   INNER JOIN listacursobliga ON listacursobliga.gstIDlsc = listacursos.gstIdlsc 
                   WHERE especialidadcat.gstIDper = $datos[0] AND especialidadcat.estado = 0";
        $resultado = mysqli_query($conexion, $query);
      
    while($data = mysqli_fetch_array($resultado)){ 
         
            $lis = $data['list'];
		
            $queri = "
			SELECT * FROM cursos WHERE idinsp = $datos[0] AND idmstr = $lis AND idinsp!=idcoor AND idinsp!=idinst AND estado = 0 ORDER BY id_curso DESC";
			$resul = mysqli_query($conexion, $queri);
            
 
        if($res = mysqli_fetch_array($resul)){
            
        if($res['proceso']=='PENDIENTE' && $res['confirmar']=='CONFIRMADO'){
        ?>
            ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
            "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span></td> </tr>"
            ], <?php 
        }if($res['proceso']=='FINALIZADO' && $res['confirmar']=='CONFIRMADO' && $res['evaluacion']>=80 ){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td> <span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO</span></td> </tr>"
                ], <?php 
        }if($res['proceso']=='FINALIZADO' && $res['confirmar']=='CONFIRMADO' && $res['evaluacion']<80 ){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td> <span style='background-color:red; font-size: 14px;' class='badge'>REPROBO</span></td> </tr>"
                ], <?php 
        }if($res['proceso']=='PENDIENTE' && $res['confirmar']=='CONFIRMAR'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }if($res['proceso']=='PENDIENTE' && $res['confirmar']=='OTROS'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }if($res['proceso']=='PENDIENTE' && $res['confirmar']=='ENFERMEDAD'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }if($res['proceso']=='PENDIENTE' && $res['confirmar']=='TRABAJO'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }if($res['proceso']=='FINALIZADO' && $res['confirmar']=='TRABAJO'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }if($res['proceso']=='FINALIZADO' && $res['confirmar']=='ENFERMEDAD'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }
        if($res['proceso']=='FINALIZADO' && $res['confirmar']=='OTROS'){
            ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
        }
    }
    else{
        ?>
                ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
                "<?php echo $data['gstCsigl']?>", "<?php echo $data['gstDrcin']?>","</td><td><span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td></tr>"
                ], <?php 
    }

        }?>
]

var tableGenerarReporte = $('#data-table-obliga').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [
        {
            title: "TÍTULO"
        },
        {
            title: "TIPO"
        },
        {
            title: "PERFIL"
        },
        {
            title: "DURACIÓN"
        },
        {
            title: "PROCESO"
        }
    ],
});


///////////////////OJT

var dataSet = [
    <?php
$id = $datos[0];
$query = "SELECT
id_tar,titulo,descripcion, fechaA, fechaT,
listacursos.gstTitlo,gstTipo,gstPrfil,
personal.gstNombr,gstApell,gstCargo,
tarearealizar.idiva,entrega,id_tare,evalua      
FROM
tareas
INNER JOIN tarearealizar ON tarearealizar.idtarea = tareas.id_tar  
INNER JOIN listacursos ON listacursos.gstIdlsc = tareas.idcur
INNER JOIN personal ON personal.gstIdper = tarearealizar.idiva
WHERE idiva = $id";
    $resultado = mysqli_query($conexion, $query);
   
    $contador = 0;

    while($data = mysqli_fetch_assoc($resultado)){
        $contador++;
        $responsables = $data["gstNombr"]." ".$data["gstApell"];
        $pendiente = "<img onclick='consultarDatos({$data["id_tare"]})' data-toggle='modal' data-target='#pendiente' src='../dist/img/tarea_pendiente.png' alt='Tarea-Pendiente' title='Sin entregar' style='width: 40px;'>";
        $cumplio = "<img src='../dist/img/cumplio.png' alt='Tarea-Pendiente' title='Tarea entregada' style='width: 40px;'>";

     if($data['entrega'] == 1 && $data['evalua'] == "SI"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $cumplio?> APROBADO"],
    <?php
}else if($data['entrega'] == 1 && $data['evalua'] == "0"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $cumplio?> Sin evaluar"],
    <?php

    
}else if($data['entrega'] == 1 && $data['evalua'] == "NO"){
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<center><?php echo $cumplio?><p class='badge'>NO ACRÉDITO</center> "],
    <?php

    
}else{
    ?>["<?php echo $contador; ?>", "<?php echo $data["gstTitlo"];?>", "<?php echo $data["titulo"]?>",
        "<?php echo $data["descripcion"]?>", "<?php echo $data["fechaA"]?>", "<?php echo $data["fechaT"]?>",
        "<?php echo $pendiente?>"],
    <?php

    
}
}?>
]

var tableGenerarReporte = $('#data-table-ojtinsp').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "#"
        },
        {
            title: "CURSO"
        },
        {
            title: "TAREA"
        },
        {
            title: "DESCRIPCIÓN"
        },
        {
            title: "INICIO"
        },
        {
            title: "FINAL"
        },
        {
            title: "DETALLES"
        }
    ],
});
</script>