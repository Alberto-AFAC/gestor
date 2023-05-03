<?php ob_start();
include('generatingIndividual.php');
require '../dist/phpqrcode/qrlib.php';
$dir = 'temp/';

if(!file_exists($dir))
    mkdir($dir);
if($con['gstCntnc'] == "CONSTANCIA"){
    $UN = "UNA";
}else{
    $UN = "UN";
}
$filename = $dir.'QR.png';

$tamanio = 5;
$level = 'H';
$frameSize = 1;
$contenido = "INSTITUCIÓN: CENTRO INTERNACIONAL DE AVIACIÓN CIVIL, OTORGÓ A:". " " .$nombre. " " .$apellido. " " ."$UN $documento POR HABER PARTICIPADO EN EL CURSO: $curso CON FOLIO". " " .$registro. " ". "El DIA"." ".$dateFinal;

QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Certficate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<style>
@page {
        margin: 0cm 0cm;
       
    }
    body {
    padding: .5in;
}
#watermark2 {
    position: fixed;
    bottom:12cm;
    left: 2cm;
    width: 17cm;
    height: 10cm;
    z-index: -1000;
}

@font-face {
      font-family: 'pruebas';
      font-style: normal;
      font-weight: 700;
      src:  url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap');
    }

</style>
<body>
     <?php
    $path = '../dist/img/header3.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <div id="watermark2">
        <img  src="../dist/img/back-image.jpg" style='padding-top:10%' height="95%" width="95%" />
    </div>
    <img src='<?php echo $base64 ?>' style='margin-top:-3em; margin-left:-2.9em; height:185px; width:115%;'/>
    <?php
    if($con['gstCntnc'] == 'CONSTANCIA' && $con['comparativo']=='DIFERENTE' && $con['modalidad']<>'AUTOGESTIVO'){
        echo "<p style='text-align:center;font-size:40px;font-family: Montserrat-Light' class='CIAAC'>El Centro Internacional de Adiestramiento</p>
        <p style='text-align:center;font-size:45px;padding-top:-3%;font-family: Montserrat-Light' class='CIAAC'>de Aviación Civil</p>
        <p style='text-align:center;font-size:26px;font-family: Montserrat-Light' class='CIAAC'>Otorga la presente</p>
        <p style='text-align:center;font-size:55px;padding-top:-1%;'>C O N S T A N C I A</p>
        <p style='text-align:center;font-size:40px;' class='CIAAC'>A: <span style='color:blue'>{$nombresCompletos}</span></p>
        <p style='text-align:center;font-size:28px;' class='CIAAC'>Por haber aprobado el curso de:</p>";
        
        if($conteoStr <= 157){ // titulo con menor o igual a 157 caracteres
        echo"<p style='text-align:center;font-size:33px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        if($conteoStr >= 158){ // titulo mayor 157 caracteres
        echo"<p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        
        echo"<p style='text-align:center;font-size:30px;padding-top:-1%;' class='CIAAC'>GRUPO: <span style='color:blue'>{$con['grupo']}</span></p>
        <p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'> Impartido del {$con['dia']} de {$con['mesnombre']}
        al {$con['diafinal']} de {$con['mesfinales']} del {$con['ano']}, con una duración de {$con['duracion']} hora(s)</p>";
        
        if($con['fcurso'] <= '2022-11-30'){ // Jessica Berenice Castañeda Gutierrez
        echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Encargada del Despacho del CIAAC:</p><center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Mtra. Jessica Berenice Castañeda Gutierrez</p>";
        }
        
        if($con['fcurso'] >= '2022-12-01'){ // Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz.
         echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Director del CIAAC:</p><center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</p>";
        }
        echo"<p style='font-size:18px;padding-top:4%;position:absolute'>FOLIO:{$con['codigo']}</p>
        <p style='font-size:18px;padding-top:6%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        <div style='page-break-before:always;'></div>
        <p style='font-size:20px;margin: 2px 5px 8px 10px;font-weight:bold;'class='CIAAC'>La presente <strong>Constancia<strong> ampara los temas vistos en el curso:<strong style='font-size:20px'> {$con['gstTitlo']}</strong>, Grupo {$con['grupo']} que a continuación se enlistan:</p>
        <div>
        <img src='../dist/img/firmas/Viridiana.jpg' style='width: 300px; position: absolute; left: 18%;padding-top:69%'>
            <p style='font-size:7px; font-weight: bold; color: #996633;position:absolute;padding-top:81%'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:22px; font-weight:bold;position:absolute;padding-top:80%;left:15%;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:20px;position:absolute;padding-top:82.5%;left:6%;'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:20px;position:absolute;padding-top:84%;left:8%;'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            
            
        <p style='font-size:18px;position: absolute;padding-top:97%;text-align: left'>Cadena de Seguridad: {$llave}</p>
        <p style='font-size:18px;padding-top:99%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        </div>";
    }else if($con['gstCntnc'] == 'CONSTANCIA' && $con['comparativo']=='IGUAL' && $con['modalidad']<>'AUTOGESTIVO'){
        echo "<p style='text-align:center;font-size:40px;font-family: Montserrat-Light' class='CIAAC'>El Centro Internacional de Adiestramiento</p>
        <p style='text-align:center;font-size:45px;padding-top:-3%;font-family: Montserrat-Light' class='CIAAC'>de Aviación Civil</p>
        <p style='text-align:center;font-size:26px;font-family: Montserrat-Light' class='CIAAC'>Otorga la presente</p>
        <p style='text-align:center;font-size:55px;padding-top:-1%;'>C O N S T A N C I A</p>
        <p style='text-align:center;font-size:40px;' class='CIAAC'>A: <span style='color:blue'>{$nombresCompletos}</span></p>
        <p style='text-align:center;font-size:28px;' class='CIAAC'>Por haber aprobado el curso de:</p>";
        
        if($conteoStr <= 157){ // titulo con menor o igual a 157 caracteres
        echo"<p style='text-align:center;font-size:33px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        if($conteoStr >= 158){ // titulo mayor 157 caracteres
        echo"<p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        
        
        echo"<p style='text-align:center;font-size:30px;padding-top:-1%;' class='CIAAC'>GRUPO: <span style='color:blue'>{$con['grupo']}</span></p>
        <p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'> Impartido el {$con['dia']} de {$con['mesnombre']}
        del {$con['ano']}, con una duración de {$con['duracion']} hora(s)</p>";
        
        
        if($con['fcurso'] <= '2022-11-30'){//Mtra. Jessica Berenice Castañeda Gutierrez
        echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Encargada del Despacho del CIAAC:</p><center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Mtra. Jessica Berenice Castañeda Gutierrez</p>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Lic. Martha León Garcia
         echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Director del CIAAC:</p><center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</p>";
        }
        
        echo"<p style='font-size:18px;padding-top:4%;position:absolute'>FOLIO:{$con['codigo']}</p>
        <p style='font-size:18px;padding-top:6%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        <div style='page-break-before:always;'></div>
        <p style='font-size:20px;margin: 2px 5px 8px 10px;font-weight:bold;'class='CIAAC'>La presente <strong>Constancia<strong> ampara los temas vistos en el curso:<strong style='font-size:20px'> {$con['gstTitlo']}</strong>, Grupo {$con['grupo']} que a continuación se enlistan:</p>
        <div>
        <img src='../dist/img/firmas/Viridiana.jpg' style='width: 300px; position: absolute; left: 18%;padding-top:69%'>
            <p style='font-size:7px; font-weight: bold; color: #996633;position:absolute;padding-top:81%'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:22px; font-weight:bold;position:absolute;padding-top:80%;left:15%;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:20px;position:absolute;padding-top:82.5%;left:6%;'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:20px;position:absolute;padding-top:84%;left:8%;'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            
            
        <p style='font-size:18px;position: absolute;padding-top:97%;text-align: left'>Cadena de Seguridad: {$llave}</p>
        <p style='font-size:18px;padding-top:99%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        </div>";
    }else if($con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='IGUAL'||$con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='DIFERENTE' ){
        echo "<p style='text-align:center;font-size:40px;font-family: Montserrat-Light' class='CIAAC'>El Centro Internacional de Adiestramiento</p>
        <p style='text-align:center;font-size:45px;padding-top:-3%;font-family: Montserrat-Light' class='CIAAC'>de Aviación Civil</p>
        <p style='text-align:center;font-size:26px;font-family: Montserrat-Light' class='CIAAC'>Otorga la presente</p>
        <p style='text-align:center;font-size:55px;padding-top:-1%;'>C O N S T A N C I A</p>
        <p style='text-align:center;font-size:40px;' class='CIAAC'>A: <span style='color:blue'>{$nombresCompletos}</span></p>
        <p style='text-align:center;font-size:28px;' class='CIAAC'>Por haber aprobado el curso de:</p>";
        
        if($conteoStr <= 157){ // titulo con menor o igual a 157 caracteres
        echo"<p style='text-align:center;font-size:33px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        if($conteoStr >= 158){ // titulo mayor 157 caracteres
        echo"<p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'>{$con['gstTitlo']}</p>";
        }
        
        echo"<p style='text-align:center;font-size:30px;padding-top:-1%;' class='CIAAC'>GRUPO: <span style='color:blue'>{$con['grupo']}</span></p>
        <p style='text-align:center;font-size:26px;padding-top:-1%;' class='CIAAC'> Impartido en {$con['mesnombre']}
        del {$con['ano']}, con una duración de {$con['duracion']} hora(s)</p>";
        
        
        if($con['fcurso'] <= '2022-11-30'){//Mtra. Jessica Berenice Castañeda Gutierrez
        echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Encargada del Despacho del CIAAC:</p><center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Mtra. Jessica Berenice Castañeda Gutierrez</p>";
        }
        if($con['fcurso'] >= '2022-12-01'){//Lic. Martha León Garcia
         echo"<p style='text-align:center;font-size:22px;' class='CIAAC'>Director del CIAAC:</p><center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-40px; width: 400px; position: absolute; right: 38%;'></center>
        <br><br><br><br><br>
        <p style='text-align:center;font-size:10px;color: #996633;padding-top:-1%' class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional deAdiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p> <br>
        <p style='text-align:center;font-size:22px;padding-top:-8%;'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</p>";
        }
        echo"<p style='font-size:18px;padding-top:4%;position:absolute'>FOLIO:{$con['codigo']}</p>
        <p style='font-size:18px;padding-top:6%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        <div style='page-break-before:always;'></div>
        <p style='font-size:20px;margin: 2px 5px 8px 10px;font-weight:bold;'class='CIAAC'>La presente <strong>Constancia<strong> ampara los temas vistos en el curso:<strong style='font-size:20px'> {$con['gstTitlo']}</strong>, Grupo {$con['grupo']} que a continuación se enlistan:</p>
        <div>
        <img src='../dist/img/firmas/Viridiana.jpg' style='width: 300px; position: absolute; left: 18%;padding-top:69%'>
            <p style='font-size:7px; font-weight: bold; color: #996633;position:absolute;padding-top:81%'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:22px; font-weight:bold;position:absolute;padding-top:80%;left:15%;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:20px;position:absolute;padding-top:82.5%;left:6%;'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:20px;position:absolute;padding-top:84%;left:8%;'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            
            
        <p style='font-size:18px;position: absolute;padding-top:97%;text-align: left'>Cadena de Seguridad: {$llave}</p>
        <p style='font-size:18px;padding-top:99%;position:absolute;color:gray'>F- CIAAC - CDPPA - 08 – R02</p>
        </div>";
    }
    ?>
    <div>
        <?php 
        $datos = $_GET['data'];
        $queryTemario = "SELECT idtem, titulo,idcurso FROM temario WHERE idcurso = $idc";
        $const = mysqli_query($conexion, $queryTemario);
        $contador = 0;
        while($consulta2 = mysqli_fetch_array($const)){
            $contador ++;
            $temario = $contador."-. ".$consulta2['titulo'];
            ?>
            <?php
            if($con['gstCntnc'] == 'CONSTANCIA'){
                echo "<p class='p-2' style='font-size:15px; margin-top:-5px'>{$temario}</p>";
            }else if($con['gstCntnc'] == 'CERTIFICADO'){
                echo "<p class='p-2' style='font-size:15px; margin-top:-5px'>{$temario}</p>";
            }else {
                echo "";
            }
            ?>
        <?php } ?>
        <p class="p-3">Promedio de aprovechamiento: <strong><?php echo $EvaluacionF ?> %</strong></p>
        <span class="fecha-emision" style="font-family: Montserrat-Light;font-size:19px">Fecha de descarga: <?php echo $hoy ?> </span>
    </div>
    <!-- <br><br> -->


   <?php
   
    require_once '../dist/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
    $dompdf->set_paper('letter', 'portrait');
    $dompdf->load_html(ob_get_clean());
    //$dompdf->set_option('enable_font_subsetting', true);
    $dompdf->render();
    $dompdf->stream($nombre."-".$apellido, array("Attachment" => 0));
    $pdf = $dompdf->output();
    $filename = "certificados/certificate-CIAAC.pdf";
    file_put_contents($filename, $pdf);
    $dompdf->stream($filename);
    ?>
</body>

</html>