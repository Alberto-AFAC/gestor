<?php ob_start();
    ini_set('date.timezone','America/Mexico_City');
    include('../conexion/conexion.php');
    $datos = $_GET['data'];
    $query = "SELECT id, id_persona, id_codigocurso, personal.gstNombr, personal.gstApell, gstTitlo ,fcurso, YEAR(fechaf) AS ano, gstDrcin, cursos.evaluacion, DAY(fcurso) AS dia, 	MONTH(fcurso) AS MES, DAY(fechaf) AS diafinal, MONTH(fechaf) AS mesfinal, cursos.modalidad, CASE WHEN MONTH ( fcurso ) = 1 THEN
    'enero' 
    WHEN MONTH ( fcurso ) = 2 THEN
    'febrero' 
    WHEN MONTH ( fcurso ) = 3 THEN
    'marzo' 
    WHEN MONTH ( fcurso ) = 4 THEN
    'abril' 
    WHEN MONTH ( fcurso ) = 5 THEN
    'mayo' 
    WHEN MONTH ( fcurso ) = 6 THEN
    'junio' 
    WHEN MONTH ( fcurso ) = 7 THEN
    'julio' 
    WHEN MONTH ( fcurso ) = 8 THEN
    'agosto' 
    WHEN MONTH ( fcurso ) = 9 THEN
    'septiembre' 
    WHEN MONTH ( fcurso ) = 10 THEN
    'octubre' 
    WHEN MONTH ( fcurso ) = 11 THEN
    'noviembre' 
    WHEN MONTH ( fcurso ) = 12 THEN
    'diciembre' ELSE 'novalido' END AS mesnombre,
    CASE
		WHEN MONTH ( fechaf ) = 1 THEN
		'enero' 
		WHEN MONTH ( fechaf ) = 2 THEN
		'febrero' 
		WHEN MONTH ( fechaf ) = 3 THEN
		'marzo' 
		WHEN MONTH ( fechaf ) = 4 THEN
		'abril' 
		WHEN MONTH ( fechaf ) = 5 THEN
		'mayo' 
		WHEN MONTH ( fechaf ) = 6 THEN
		'junio' 
		WHEN MONTH ( fechaf ) = 7 THEN
		'julio' 
		WHEN MONTH ( fechaf ) = 8 THEN
		'agosto' 
		WHEN MONTH ( fechaf ) = 9 THEN
		'septiembre' 
		WHEN MONTH ( fechaf ) = 10 THEN
		'octubre' 
		WHEN MONTH ( fechaf ) = 11 THEN
		'noviembre' 
		WHEN MONTH ( fechaf ) = 12 THEN
		'diciembre' ELSE 'MES NO VALIDO' 
	END AS mesfinales FROM constancias INNER JOIN personal ON personal.gstIdper = constancias.id_persona INNER JOIN cursos ON id_codigocurso = codigo INNER JOIN listacursos ON idmstr = gstIdlsc
    WHERE id = $datos";
    $const = mysqli_query($conexion, $query);
    $con = mysqli_fetch_array($const);
    $dia = array("cero","uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece","catorce","quince", "dieciseis","diecisiete","dieciocho","diecinueve", "veinte","veintiuno","veintidós","veintitres","veinticuatro","veinticinco","veintiseis","veintisiete","veintiocho","veintinueve","treinta","treinta y uno");
    $fecha2= $dia[date('d')];
    setlocale(LC_TIME, "spanish");
    $mesactual = strftime("%B");
    


?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap" rel="stylesheet">
<style>
        p {
            font-family: 'Montserrat', sans-serif;
            font-size: 35px;
        }
        .temario{
            font-family: 'Montserrat', sans-serif;
            font-size: 25px;
        }
        .p-2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
        }
        .people {
            font-family: 'Montserrat', sans-serif;
            font-size: 40px;
            text-align: center;
        }
        .titulo {
            font-family: 'Montserrat', sans-serif;
            font-size: 40px;
            font-weight: bold;
            letter-spacing: 5px;
            text-align: center;
            text-transform: uppercase;
        }
        #watermark {
                position: fixed;

                /** 
                    Set a position in the page for your image
                    This should center it vertically
                **/
                bottom:   5cm;
                left:     5.5cm;

                /** Change image dimensions**/
                width:    16cm;
                height:   9cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }
</style>

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
<p class="people">A : <span style="font-size: 60px; font-family: 'Montserrat', sans-serif; font-weight: bold; color: #BE0202;"><?php echo $con['gstNombr']." ".$con['gstApell'] ?></span></p>
<div style="text-align: center;">
    <span style="line-height:10px;" class="p-2">Por haber participado en el: </span>
    <p class="titulo"><?php echo $con['gstTitlo']?></p>
    <span class="p-2">Impartido del <?php echo $con['dia']?> de <?php echo $con['mesnombre']?> al <?php echo $con['diafinal']?> de <?php echo $con['mesfinales']?> del <?php echo $con['ano']?>, en la modalidad <?php echo $con['modalidad']?>, con un total de <?php echo $con['gstDrcin']?> horas, obteniendo una calificación de <?php echo $con['evaluacion']?>/100</span><br>
    <span style="font-size: 22px; font-style: italic;" class="p-2">La presente se extiende a los <?php echo $fecha2?> dias del mes de <?php echo $mesactual ?> de dos mil veintiuno.</span>

</div>
<div style="padding-top: 25px; text-align: center;">
    <span class="p-2">Director del CIAAC:</span><br><br><br><br>
    <span style="padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;" class="p-2">Secretaria de Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
    <span class="p-2">Benjamín Romero Fuentes</span><br>
    <span style="line-height:14px;" class="p-2">Gral. de División P.A. DEMA en Ret.</span>
</div><br>
<div class="container">
    <p class="temario">Este certificado ampara los temas visto en el Diplomado de Medicina Aeroespacial (01/2021), que a continuación se enlistan:</p>
    <div style="padding-top: 25px; text-align: center;">
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