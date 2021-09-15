<?php ob_start();
include('generating.php');
require '../dist/phpqrcode/qrlib.php';
$dir = 'temp/';

if(!file_exists($dir))
    mkdir($dir);

$filename = $dir.'test.png';

$tamanio = 5;
$level = 'H';
$frameSize = 1;
// $contenido = $nombre . "FECHA DE SALIDA"  . $data['fecha_salida'] . "AEROLINEA" . $data['aerolinea'];
$contenido = "INSTITUCIÓN: CENTRO INTERNACIONAL DE AVIACIÓN CIVIL, OTORGÓ A:". " " .$nombre. " " .$apellido. " " ."UN CERTIFICADO POR HABER PARTICIPADO EN EL CURSO CON FOLIO". " " .$registro. " ". "El DIA"." ".$dateFinal;

QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="../css/constancias.css">

<?php
            $path = '../dist/img/header.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
<div id="watermark">
    <img src="../dist/img/back-image.jpg" height="100%" width="100%" />
</div>
<img src="<?php echo $base64 ?>" width="95%" height="113" />
<div style="text-align: center;">
    <p>El Centro Internacional de Adiestramiento de Aviación Civil</p>
    <p class="p-2">Otorga el presente</p>
</div>
<p class="titulo">Certificado</p>
<p class="people">A : <span
        style="font-size: 60px; font-family: 'Montserrat', sans-serif; font-weight: bold; color: #BE0202;"><?php echo $con['gstNombr']." ".$con['gstApell'] ?></span>
</p>
<div style="text-align: center;">
    <span style="line-height:10px;" class="p-2">Por haber participado en el curso: </span>
    <p class="titulo"><?php echo $con['gstTitlo']?></p>
    <span class="p-2">Impartido del <?php echo $con['dia']?> de <?php echo $con['mesnombre']?> al
        <?php echo $con['diafinal']?> de <?php echo $con['mesfinales']?> del <?php echo $con['ano']?>, en la modalidad
        <?php echo $con['modalidad']?>, con un total de <?php echo $con['gstDrcin']?> horas, obteniendo una calificación
        de <?php echo $con['evaluacion']?>/100</span><br>
    <span style="font-size: 22px; font-style: italic;" class="p-2">La presente se extiende a los <?php echo $fecha2?>
        dias del mes de <?php echo $mesactual ?> de dos mil veintiuno.</span>

</div>
<div style="padding-top: 25px; text-align: center;">
    <span class="p-2">Director del CIAAC:</span><br><br><br><br>
    <span style="padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;" class="p-2">Secretaria de
        Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de
        Aviación Civil / SCT-AFAC-CIAAC</span><br>
    <span class="p-2">Benjamín Romero Fuentes</span><br>
    <span style="line-height:14px;" class="p-2">Gral. de División P.A. DEMA en Ret.</span>
    <?php 
        	echo '<img style="float: right; width: 10%;" src="'.$filename.'" />';
        ?>
</div><br>
<div style="padding-top: 25px;" class="container">
    <p class="temario">Este certificado ampara los temas visto en el Diplomado de Medicina Aeroespacial (01/2021), que a
        continuación se enlistan:</p>
       <?php 
       $datos = $_GET['data'];
       $queryTemario = "SELECT idtem, titulo,idcurso FROM temario WHERE idcurso = $idc";
                          $const = mysqli_query($conexion, $queryTemario);
                          $contador = 0;
                          while($consulta2 = mysqli_fetch_array($const)){
                          $contador ++;
                          $temario = $consulta2['titulo'];
       ?>
        <p class="temario"><?php echo $contador?>.- <?php echo $temario?></p>
        <?php } ?>
        <div style="padding-top: 10%; text-align: center;">
        <span class="p-2">Registrado bajo el No XX a fojas X del libro de registro de Certificados y Constancias de capacitación No. 1 cursos en línea.</span>
    </div>
    <div style="text-align: center;">
        <span class="p-2">Lic. Rebeca Morales Reyes Subdirectora de Diseño Pedagógico de Programas Aeronáuticos</span>
    </div>
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
            $dompdf->stream("certificate-CIAAC", array("Attachment" => true));
            // $pdf = $dompdf->output();
            $filename = "certificate-CIAAC.pdf";
            file_put_contents($filename, $dompdf);
            $dompdf->stream($filename);
        ?>