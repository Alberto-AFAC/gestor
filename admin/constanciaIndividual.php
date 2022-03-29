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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap"
        rel="stylesheet">
<link rel="stylesheet" href="../dist/css/constancias.css">
</head>

<body>
    <?php
            $path = '../dist/img/header.jpg';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
    <div id="watermark">
        <img  src="../dist/img/back-image.jpg" height="95%" width="95%" />
    </div>
    <img src="<?php echo $base64 ?>" width="95%" height="113%" />
    <?php
if($con['gstCntnc'] == 'CONSTANCIA' && $conteoStr >= 100){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class='otorga'>Otorga la presente</p>
    <p class='titulo-certificado'>{$con['gstCntnc']}</p>
    <p class='nombre-persona'>Al C:. <span
    class='nombre-pConstancia'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
    <p class='nombre-Constancia'>{$con['gstTitlo']}</p> 
    </p><span class='p-2'>Comprendido durante el periódo del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año, en la modalidad <span class='p-2' style='font-weight:bold;'>{$con['modalidad']}</span> impartido por el <span
        class='p-2' style='font-weight:bold;'>{$con['sede']}</span> con una duración de {$con['gstDrcin']}<br><span style='padding-top: 80px;' class='p-2'>Ciudad de México, a
        {$hoy}</span><br><br>
        <div class='caja'>
        <p style='margin-bottom: -2px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>

<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
</div>


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
    <center><img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 242px; width: 200px; position: absolute; right: 45%;'></center>
    <div class='caja'><span class='p-2'><span style='font-weight:bold;'>Lic. Viridiana Monserrat Hernández Piña</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span></div>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>";
}else if($con['gstCntnc'] == 'CONSTANCIA' && $conteoStr <= 99){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class='otorga'>Otorga la presente</p>
    <p class='titulo-certificado'>{$con['gstCntnc']}</p>
    <p class='nombre-persona'>Al C:. <span
    class='nombre-Constancia-Min'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
    <p class='nombre-Curso-Min'>{$con['gstTitlo']}</p> 
    </p><span class='p-2'>Comprendido durante el periódo del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año, en la modalidad <span class='p-2' style='font-weight:bold;'>{$con['modalidad']}</span> impartido por el <span
        class='p-2' style='font-weight:bold;'>{$con['sede']}</span> con una duración de {$con['gstDrcin']}<br><span style='padding-top: 80px;' class='p-2'>Ciudad de México, a
        {$hoy}</span><br><br>
        <div class='caja'>
        <p style='margin-bottom: -2px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>

<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
</div>
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
    <center><img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 242px; width: 200px; position: absolute; right: 45%;'></center>
    <div class='caja'><span class='p-2'><span style='font-weight:bold;'>Lic. Viridiana Monserrat Hernández Piña</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span></div>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>";

}else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100){
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
        <div class='caja'>
        <p style='margin-bottom: -20px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>

<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
</div>
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
    <center><img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 242px; width: 200px; position: absolute; right: 45%;'></center>
    <div class='caja'><span class='p-2'><span style='font-weight:bold;'>Lic. Viridiana Monserrat Hernández Piña</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span></div>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>";
}else if($con['gstCntnc'] == 'CERTIFICADO' && $conteoStr <= 99){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <span class='otorga'>Otorga el presente</span>
    <p style='padding-bottom: 0px;' class='titulo-certificado'>{$con['gstCntnc']}</p>
    <p styleclass='nombre-persona'>Al C:. <span
    class='nombre-Constancia-Min'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
            <p class='nombre-Curso-Min'>{$con['gstTitlo']}</p> 
    </p><span class='p-2'>Comprendido durante el periódo del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año, en la modalidad <span class='p-2' style='font-weight:bold;'>{$con['modalidad']}</span> impartido por el <span
        class='p-2' style='font-weight:bold;'>{$con['sede']}</span> con una duración de {$con['gstDrcin']}<br><span style='padding-top: 80px;' class='p-2'>Ciudad de México, a
        {$hoy}</span>
        <div class='caja'>
        <p style='margin-bottom: -20px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>

<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
</div>
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
    <center><img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 242px; width: 200px; position: absolute; right: 45%;'></center>
    <div class='caja'><span class='p-2'><span style='font-weight:bold;'>Lic. Viridiana Monserrat Hernández Piña</span><br>Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span></div>
    <p style='font-size: 18px; text-align: right;' class='p-2'>{$llave}</p>
    </div>";
}else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr >= 100){
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
        <div class='caja'>
        <p style='margin-bottom: -2px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>
        
<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
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

}else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr <= 99){
    echo "<div style='text-align: center;'>
    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class='otorga'>Otorga el presente</p>
    <p class='titulo-certificador'>RECONOCOMIENTO</p>
    <p class='nombre-persona'>Al C:. <span
    class='nombre-Constancia-Min'>{$nombresCompletos}</span></p>
    <p class='otorga'>Por haber participado en el curso:</p>
     <p class='nombre-Curso-Min'>{$con['gstTitlo']}</p> 
    </p><span class='p-3'>Impartido del {$con['dia']} de {$con['mesnombre']}
    al {$con['diafinal']} de {$con['mesfinales']} del presente año</span>
    <span class='p-3'>por la Escuela Militar de Graduados de Sanidad con lo establecido en el Convenio celebrado entre la Agencia Federal de Aviación Civil (AFAC), Dirección General de Protección y Medicina Preventiva (DGPyMPT) y la Secretaría de la Defensa Nacional (SEDENA).
    <span style='padding-bottom: 1px;' class='p-2'>Ciudad de México, a
        {$hoy}</span>
        <div class='caja'>
        <p style='margin-bottom: -2px;' class='p-2'>Directora del CIAAC:</p></div>
        <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 320px; position: absolute; right: 45%;'></center>
</div>
      
<div style='padding-top: 9px; text-align: center;'>
<div class='row'>
    <div class='column left'>
    </div>
    <div class='column middle'>
        <br><br>
        <span style='font-size: 8px; font-weight: bold; color: #996633;'
            class='p-2'>Secretaria de
            Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
            Adiestramiento de
            Aviación Civil / SCT-AFAC-CIAAC</span><br>
        <span style='font-weight: bold;' class='p-2'>Lic. Martha León García</span><br>
    </div>
    <div class='column right'>
    <img style='margin-top: 40px; float: right; width: 35%;' src='{$filename}'/>
    </div>
</div>
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
        <span>Registrado bajo el No.<?php echo $con['id'];?></span>
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
            $dompdf->stream($nombre."-".$apellido, array("Attachment" => 0));
            $pdf = $dompdf->output();
            $filename = "certificados/certificate-CIAAC.pdf";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
        ?>
</body>

</html>