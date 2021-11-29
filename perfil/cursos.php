<?php 

ini_set('date.timezone','America/Mexico_City');
$datos[0];?>


<script type="text/javascript">
var dataSet = [
    <?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,cursos.fechaf AS fin  
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];
$modalidad = $data['modalidad'];
$fcurso = $data['inicial'];
$fechaf = $data['final'];
$fin = $data['fin'];

$actual= date("Y-m-d"); 
$hactual = date('H:i:s');

$fin = date("d-m-Y",strtotime($data["fin"]));     
// $f3 = strtotime($actual.''.$hactual);
// $f2 = strtotime($fin.''.$data['hcurso']); 
$f3 = strtotime($actual);
$f2 = strtotime($fin); 


if($f3<=$f2){
?>

    //console.log('<?php echo $id_curso ?>');

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<a type='button' title='Confirmar asistencia' onclick='confirmar(<?php echo $id_curso ?>)' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>CONFIRMAR</a>"

        //"<a title='Evaluación' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a>"

    ],
    <?php }

}?>
]

var tableGenerarReporte = $('#data-table-confirmar').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIA"
        },
        {
            title: "HORA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ACCIÓN"
        }
    ],
});


var dataSet = [
    <?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,cursos.fechaf AS fin 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'PENDIENTE' AND cursos.estado = 0 || idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final']; 
$fin = $data['fin'];

$actual= date("Y-m-d"); 
$hactual = date('H:i:s');

$fin = date("d-m-Y",strtotime($data["fin"]));     
// $f3 = strtotime($actual.''.$hactual);
// $f2 = strtotime($fin.''.$data['hcurso']); 
$f3 = strtotime($actual);
$f2 = strtotime($fin); 

if($f3<=$f2){

if($data['confirmar']=='CONFIRMAR'){
$valor="<span title='Pendiente por ' style='background-color: grey; font-size: 13px;' class='badge'>PENDIENTE</span>";

?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<?php echo $valor ?>", "<?php echo $data['confirmar']?>"

        //aquies

    ],
    <?php }else if($data['confirmar']=='CONFIRMADO'){ 
$valor="<span  onclick='confirmar1($id_curso)'  style='background-color:green; font-size: 13px; cursor:pointer;' data-toggle='modal' data-target='#modal-detalle' class='badge' title='Ver detalles del curso'>CONFIRMADO</span>"; //23112021
?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<?php echo $valor ?>", "<?php echo $data['confirmar']?>"

        //aquies

    ],

    <?php }
}
}?>
]

var tableGenerarReporte = $('#data-table-programado').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIA"
        },
        {
            title: "HORA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ASISTENCIA"
        },
        {
            title: "CONFIR",
            "visible": false
        }
    ],
});

// CURSOS PROGRAMADOS
var dataSet = [
    <?php 


$query = "SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial,evaluacion,gstTipo,DATE_FORMAT(fechaf, '%d-%m-%Y') AS fechaf,gstVignc,evaluacion,idmstr,gstIdlsc,id_curso 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND proceso = 'FINALIZADO' AND cursos.estado = 0 AND confirmar='CONFIRMADO' OR idinsp = $datos[0] AND cursos.estado = 2 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);
$cont = 0;
while($data = mysqli_fetch_array($resultado)){ 

$fechav = date("d-m-Y",strtotime($data['fechaf']."+ ".$data['gstVignc']." year"));     
$vencer = date("d-m-Y",strtotime($fechav."- 3 month"));
ini_set('date.timezone','America/Mexico_City');
$actual= date("d-m-Y"); 
$f1 = strtotime($fechav);
$f2 = strtotime($vencer);
$f3 = strtotime($actual);



$id_curso = $data['id_curso'];
$fcurso = $data['inicial'];
$fechaf = $data['final'];

$valor=$data['confirmar'];;  

if($data['evaluacion'] == ''){
$Evaluacion = "FALTA EVALUAR";

} else {
$Evaluacion = "EVALUADO";
}

if($f3>=$f1){ //VENCIDO?
$vigencia = "<center><span class='badge' style='background-color: silver;'>REALIZADO</span></center>";
}else if($f3 <= $f2 && $data['evaluacion'] >= 80){ //VIGENTE 
$vigencia = "<center><span class='badge' style='background-color: green;'>VIGENTE</span></center>";
}else if($f3 >= $f2){ //POR VENCER
$vigencia = "<center><span class='badge' style='background-color: #D58512;'>POR VENCER</span></center>";
}else{
    $vigencia = "<center><span class='badge' style='background-color: silver;'>POR EVALUAR</span></center>";
}





$queri = "
SELECT * FROM reaccion WHERE id_curso = $id_curso AND estado = 0 ORDER BY id_curso DESC";
$resul = mysqli_query($conexion, $queri);


if($res = mysqli_fetch_array($resul)){
//if($res != 0){

$query = "SELECT * FROM constancias WHERE id_persona = $datos[0] AND id_codigocurso = '".$data['codigo']."' AND estado_cer = 0";
$const = mysqli_query($conexion, $query);
if($con = mysqli_fetch_array($const)){


if($con[3]=='SI' && $con[4]=='SI' && $con[5]=='SI' && $con[6]=='SI' && $con[7]=='SI' && $con[8]=='SI' && $con[9]=='SI'){
    $id = base64_encode($con[0]);
if($con[10]==0){
$accion = "<center><a title='Descarga Constancia' type='button' id='myCertificate' href='../admin/constancia.php?data={$id}' target='_blank' onclick='desactivar({$con[0]});' class='datos btn' style='background:white; font-size:18px;'><i class='fa fa-file-pdf-o text-danger'></i></a></center><center><span class='badge' style='background-color: green;'>EVALUADO</span><center>";
}else{

$accion = "<center><a  type='button' id='myCertificate' target='_blank'    class='datos btn btn-default'>archivo descargado</a></center><center><span class='badge' style='background-color: green;'>EVALUADO</span><center>";
}
    }else{

$accion = "<center><b style='color:silver;' title='Pendiente' onclick='pdf()' ><i class='fa fa-file-pdf-o'></i></b></center><center><span class='badge' style='background-color: green;'>EVALUADO</span><center>";
}
?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
        <?php if($data['gstVignc']!=101){ ?> "<span class='badge' style='background-color: green; font-size: 14px;'><?php //echo $valor?></span><?php echo $vigencia?>",
        <?php }else{ ?> "<center><span class='badge' style='background-color: silver;'>REALIZADO</span></center>",
        // "<span class='badge' style='background-color: silver; font-size: 14px;'>REALIZADO</span>",

        <?php }?>



        <?php if($data['evaluacion']<80){?>

        "<center><b style='color:red;' title='Pendiente' onclick='pdf()' ><span class='badge' style='background-color: #BB2303; font-size: 14px;'>NO ACREDITADO</span></b></center>"
        <?php }else{?>

        "<?php echo $accion?>"

        <?php 
}
?>
    ],
    <?php    }else{  


$accion = "<span class='badge' style='background-color: green;'>EVALUADO</span>";  ?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
        "<span class='badge' style='background-color: green; font-size: 14px;'><?php echo $valor?></span>",
        "<?php echo $accion?>"],

    <?php } 



}else{ ?>

    <?php if($data['confirmar'] == 'TRABAJO' || $data['confirmar'] == 'ENFERMEDAD' || $data['confirmar'] == 'OTROS'){ ?>




    <?php }else{ 

if($data['codigo']=='X' AND $data['gstVignc']!=101){


if($f3>=$f1){ //VENCIDO?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",
        "<span class='badge' style='background-color: silver;'><?php echo 'REALIZADO' ?></span>",


        "<center><a href='<?php echo $data['justifi']?>' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center>"

    ],

    <?php }else if($f3 <= $f2 && $data['evaluacion'] >= 80){ //VIGENTE ?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: green;'><?php echo 'VIGENTE'?></span>",

        "<center><a href='<?php echo $data['justifi']?>' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center>"

    ],

    <?php }else if($f3 >= $f2){ //POR VENCER?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
        "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: #D58512;'><?php echo 'POR VENCER'?></span>",

        "<center><a href='<?php echo $data['justifi']?>' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center>"

    ],

    <?php }
?>


    <?php }else if($data['codigo']=='X'){ ?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>",
        "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: silver    ;'><?php echo'REALIZADO'?></span>",

        "<center><a href='<?php echo $data['justifi']?>' style='text-align: center; font-size:20px;color:red; ' target='_blanck'> <i class='fa fa-file-pdf-o'></i></a></center>"

    ],

    <?php }else{ ?>


    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: green;'><?php echo $valor?></span>",

        "<a type='button' style='background-color:' title='Evaluación Curso' data-toggle='modal' data-target='#modal-evalcurso' onclick='cursoeval(<?php echo $id_curso ?>)' class='btn btn-primary '>EVALUAR</a>"

    ],

    <?php 
} 
}

} 
}?>
];

var tableGenerarReporte = $('#data-table-completo').DataTable({
    "order": [
        [5, "desc"]
    ],
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },

    data: dataSet,
    columns: [{
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIA"
        },
        {
            title: "HORA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "DETALLES"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

var dataSet = [
    <?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial 
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];

if($data['confirmar']=='ENFERMEDAD'){
$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>";


?>["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        // "<a type='button' title='Evaluación' onclick='asignacion(<?php //echo $id_curso ?>)' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>CANCELADO </a>"
        // "<span class='badge' style='background-color: red;'>CANCELADO</span>"
        "<?php echo $valor ?>"
    ],

    <?php }else if($data['confirmar']=='TRABAJO'){ 

$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>"; ?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<?php echo $valor ?>"
    ],

    <?php }else if($data['confirmar']=='OTROS'){
$valor ="<span style='background-color:#BB2303; font-size: 13px; cursor: pointer;' class='badge' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' onclick='confirmar($id_curso)'>DECLINADO</span>";?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo  $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<?php echo $valor ?>"
    ],



    <?php } 
}?>
];
var tableGenerarReporte = $('#data-table-cancelado').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIA"
        },
        {
            title: "HORA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ACCIÓN"
        }
    ],
});


var dataSet = [
    <?php 
$query = "
SELECT *,DATE_FORMAT(cursos.fechaf, '%d/%m/%Y') as final,DATE_FORMAT(cursos.fcurso, '%d/%m/%Y') as inicial, cursos.fechaf AS fin,evaluacion
FROM cursos 
INNER JOIN listacursos ON idmstr = gstIdlsc
WHERE idinsp = $datos[0] AND confirmar = 'CONFIRMAR' AND cursos.estado = 0 ORDER BY id_curso DESC";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id_curso = $data['id_curso'];

$fcurso = $data['inicial'];
$fechaf = $data['final'];
$eva = $data['evaluacion'];

$fin = $data['fin'];

$valor = 'FECHA';

$actual = date("Y-m-d"); 
$hactual = date('H:i:s');
//strtotime($actual.''.$hcurso)

// $f3 = strtotime($actual.''.$hactual);
// $f2 = strtotime($fin.''.$data['hcurso']); 
        $fin = date("d-m-Y",strtotime($data["fin"])); 

$f3 = strtotime($actual);
$f2 = strtotime($fin); 

if($f3>$f2 && $data['proceso']=='PENDIENTE' || $f3> $f2 && $data['proceso']=='FINALIZADO'){   ?>

    ["<?php echo $data['gstTitlo']?>", "<?php echo $data['gstTipo']?>", "<?php echo $fcurso?>",
        "<?php echo $data['hcurso']?>", "<?php echo $fechaf?>",

        "<span class='badge' style='background-color: red; font-size: 14px;'>VENCIDO</span> ",
        "<?php echo $data['confirmar']?>"
    ],
    <?php }

}?>
]

var tableGenerarReporte = $('#data-table-vencidos').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [{
            title: "CURSO"
        },
        {
            title: "TIPO"
        },
        {
            title: "INICIA"
        },
        {
            title: "HORA"
        },
        {
            title: "FINALIZA"
        },
        {
            title: "ACCIÓN"
        }
    ],
});


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
</script>