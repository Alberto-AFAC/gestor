<?php ob_start();
include('generating.php');
require '../dist/phpqrcode/qrlib.php';
$dir = 'temp/';

if(!file_exists($dir))
    mkdir($dir);
$filename = $dir.'QR.png';

$tamanio = 5;
$level = 'H';
$frameSize = 1;
// $contenido = $nombre . "FECHA DE SALIDA"  . $data['fecha_salida'] . "AEROLINEA" . $data['aerolinea'];
$contenido = "INSTITUCIÓN: CENTRO INTERNACIONAL DE AVIACIÓN CIVIL, OTORGÓ A:". " " .$nombre. " " .$apellido. " " ."UN CERTIFICADO POR HABER PARTICIPADO EN EL CURSO CON FOLIO". " " .$registro. " ". "El DIA"." ".$dateFinal;

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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap"
        rel="stylesheet">
    <!-- SIN LIBRERIAS -->
    <style>
    body {
        padding: .5in;
    }

    @page {

        margin: 0;
    }

    .page_break {
        page-break-before: always;
    }

    .CIAAC {
        font-family: 'Montserrat', sans-serif;
        font-size: 38px;
    }

    .otorga {
        font-family: 'Montserrat', sans-serif;
        font-size: 26px;
        /* padding-top: 50px;  */
    }

    p {
        font-family: 'Montserrat', sans-serif;
        font-size: 35px;
    }

    .temario {
        font-family: 'Montserrat', sans-serif;
        font-size: 25px;
    }

    .p-2 {
        font-family: 'Montserrat', sans-serif;
        font-size: 23px;
    }

    .p-3 {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
    }

    .nombre-persona {
        font-family: 'Montserrat', sans-serif;
        font-size: 40px;
        text-align: center;
    }

    .nombre-persona-c {
        font-size: 42px;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        color: #BE0202;
    }
    
    .nombre-pConstancia {
        font-size: 37px;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        color: #BE0202;
    }


    .titulo-certificador {
        font-family: 'Montserrat', sans-serif;
        font-size: 40px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    .titulo-certificador {
        font-family: 'Montserrat', sans-serif;
        font-size: 35px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    .nombre-curso {
        font-family: 'Montserrat', sans-serif;
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    .nombre-Constancia {
        font-family: 'Montserrat', sans-serif;
        font-size: 25px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    #watermark {
        position: fixed;
        bottom: 5cm;
        left: 5.5cm;
        width: 16cm;
        height: 9cm;
        z-index: -1000;
    }

    .footer2 {
        position: fixed;
        bottom: 120px;
        left: 80px;
        right: 40px;
        height: 50px;
        text-align: left;
        line-height: 35px;
    }

    .footer-constancia-gold {
        position: fixed;
        bottom: 195px;
        left: 80px;
        right: 40px;
        height: 50px;
        text-align: center;
        line-height: 35px;
    }

    .afojas1 {
        position: fixed;
        bottom: 300px;
        left: 80px;
        font-size: 20px;
        right: 40px;
        height: 50px;
        text-align: left;
        line-height: 35px;
        font-family: 'Montserrat', sans-serif;

    }

    .footer-constancia {
        position: fixed;
        bottom: 160px;
        left: 80px;
        font-size: 20px;
        right: 40px;
        height: 50px;
        text-align: center;
        line-height: 35px;
        font-family: 'Montserrat', sans-serif;

    }

    footer {
        position: fixed;
        bottom: -40px;
        left: 0px;
        right: 0px;
        height: 50px;
        text-align: center;
        line-height: 35px;
    }

        {
        box-sizing: border-box;
    }

    /* Set additional styling options for the columns */
    .column {
        float: left;
    }

    /* Set width length for the left, right and middle columns */
    .left {
        width: 20%;
    }

    .middle {
        width: 60%;
    }

    .right {
        width: 20%;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
</head>

<body>
    <?php
            $path = '../dist/img/header.jpg';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
    <div id="watermark">
        <img src="../dist/img/back-image.jpg" height="95%" width="95%" />
    </div>
    <img src="<?php echo $base64 ?>" width="95%" height="113%" />
    <?php
if($con['gstCntnc'] == 'CONSTANCIA'){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class='otorga'>Otorga la presente</p>
    <p class='titulo-certificado'>{$con['gstCntnc']}</p>
    <p class='nombre-persona'>Al C:. <span
    class='nombre-pConstancia '>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
    <p class='nombre-Constancia'>{$con['gstTitlo']}</p> 
    </p><span class='p-2'>Comprendido durante el periódo del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año, en la modalidad <span class='p-2' style='font-weight:bold;'>{$con['modalidad']}</span> impartido por el <span
        class='p-2' style='font-weight:bold;'>{$con['sede']}</span> con una duración de {$con['gstDrcin']}<br><span style='padding-top: 80px;' class='p-2'>Ciudad de México, a
        {$hoy}</span>
        <p class='p-2'>Director del CIAAC:</p></div>
        <div style='padding-top: 3px; text-align: center;'>
        <div class='row'>
            <div class='column left'>
            </div>
            <div class='column middle'>
                <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
                    class='p-2'>Secretaria de
                    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-weight: bold;' class='p-2'>Benjamín Romero Fuentes</span><br>
                <span style='font-weight: bold; line-height:22px;' class='p-2'>Gral. de División P.A. DEMA en
                    Ret.</span>
            </div>
            <div class='column right'>
            <img style='float: right; width: 35%;' src='{$filename}'/>
            </div>
        </div>
    </div>
    <div>
    <p class='p-2'>Esta <span style='font-weight: bold;'><u>constancia</u></span> ampara los temas visto en el <span style='font-weight: bold;'>CURSO:
           {$con['gstTitlo']}</span>, que a
        continuación se enlistan:</p>
    </div>
    <div class='footer-constancia-gold'>
    <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
    class='p-2'>Secretaria de
    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
    Adiestramiento de
    Aviación Civil / SCT-AFAC-CIAAC</span>
    </div>
    <div class='footer-constancia'>
    <span class='p-2'><span style='font-weight:bold;'>Lic. Rebeca Morales Reyes</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>";
} else if($con['gstCntnc'] == 'CERTIFICADO'){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <span class='otorga'>Otorga el presente</span>
    <p style='padding-bottom: 0px;' class='titulo-certificado'>{$con['gstCntnc']}</p>
    <p styleclass='nombre-persona'>Al C:. <span
    class='nombre-persona-c'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
            <p class='nombre-curso'>{$con['gstTitlo']}</p> 
    </p><span class='p-2'>Comprendido durante el periódo del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año, en la modalidad <span class='p-2' style='font-weight:bold;'>{$con['modalidad']}</span> impartido por el <span
        class='p-2' style='font-weight:bold;'>{$con['sede']}</span> con una duración de {$con['gstDrcin']}<br><span style='padding-top: 80px;' class='p-2'>Ciudad de México, a
        {$hoy}</span>
        <p class='p-2'>Director del CIAAC:</p></div>
        <div style='padding-top: 3px; text-align: center;'>
        <div class='row'>
            <div class='column left'>
            </div>
            <div class='column middle'>
                <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
                    class='p-2'>Secretaria de
                    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-weight: bold;' class='p-2'>Benjamín Romero Fuentes</span><br>
                <span style='font-weight: bold; line-height:22px;' class='p-2'>Gral. de División P.A. DEMA en
                    Ret.</span>
            </div>
            <div class='column right'>
            <img style='float: right; width: 35%;' src='{$filename}'/>
            </div>
        </div>
    </div>
    <div>
    <p class='p-2'>Este <span style='font-weight: bold;'><u>certificado</u></span> ampara los temas visto en el <span style='font-weight: bold;'>CURSO:
           {$con['gstTitlo']}</span>, que a
        continuación se enlistan:</p>
    </div>
    <div class='footer-constancia-gold'>
    <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
    class='p-2'>Secretaria de
    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
    Adiestramiento de
    Aviación Civil / SCT-AFAC-CIAAC</span>
    </div>
    <div class='footer-constancia'>
    <span class='p-2'><span style='font-weight:bold;'>Lic. Rebeca Morales Reyes</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
</div>";
}else {
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class='otorga'>Otorga el presente</p>
    <p class='titulo-certificador'>RECONOCOMIENTO</p>
    <p class='nombre-persona'>Al C:. <span
    class='nombre-pConstancia'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
     <p class='nombre-Constancia'>{$con['gstTitlo']}</p> 
    </p><span class='p-3'>Impartido del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año</span>
    <span class='p-3'>por la Escuela Militar de Graduados de Sanidad con lo establecido en el Convenio celebrado entre la Agencia Federal de Aviación Civil (AFAC), Dirección General de Protección y Medicina Preventiva (DGPyMPT) y la Secretaría de la Defensa Nacional (SEDENA).
    <span style='padding-bottom: 1px;' class='p-2'>Ciudad de México, a
        {$hoy}</span>
        <p style='padding-top: 1px;' class='p-2'>Director del CIAAC:</p></div>
        <div style='padding-top: 5px; text-align: center;'>
        <div class='row'>
            <div class='column left'>
            </div>
            <div class='column middle'>
                <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
                    class='p-2'>Secretaria de
                    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-weight: bold;' class='p-2'>Benjamín Romero Fuentes</span><br>
                <span style='font-weight: bold; line-height:22px;' class='p-2'>Gral. de División P.A. DEMA en
                    Ret.</span>
            </div>
            <div class='column right'>
            <img style='float: right; width: 35%;' src='{$filename}'/>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div class='page_break'>
    <div class='footer2'>
    <span style='padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;'
    class='p-2'>Secretaria de
    Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
    Adiestramiento de
    Aviación Civil / SCT-AFAC-CIAAC</span>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>
    </div>
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
        echo "<p class='p-2'>{$temario}</p>";
       }else if($con['gstCntnc'] == 'CERTIFICADO'){
        echo "<p class='p-2'>{$temario}</p>";
       }else {
           echo "";
       }
       ?>
        <?php } ?>
       <p class="p-2">PROMEDIO DE APROVECHAMIENTO <strong><?php echo $EvaluacionF ?> %</strong></p>
    </div>
    <div class="afojas1">
        <span>Registrado bajo el No.<?php echo $con['gstIdlsc'];?></span>
    </div>

    <?php
        // require_once 'dompdf/autoload.inc.php';
        require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'landscape');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("certificate-CIAAC", array("Attachment" => 0));
            $pdf = $dompdf->output();
            $filename = "certificados/certificate-CIAAC.pdf";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
        ?>
</body>

</html>