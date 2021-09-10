<?php ob_start();
    include('../conexion/conexion.php');
    $datos = $_GET['data'];
    $query = "SELECT * FROM constancias WHERE id = $datos";
    $const = mysqli_query($conexion, $query);
    $con = mysqli_fetch_array($const);




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
<p class="people">A : <span style="  font-family: 'Montserrat', sans-serif; font-weight: bold; color: #BE0202;"><!--MONDRAGON ESCAMILLA JORGE ALBERTO--></span></p>
<div style="text-align: center;">
    <span style="line-height:10px;" class="p-2">Por haber participado en el: <?php echo $con[0]?></span>
    <p class="titulo">Nombre del curso</p>
    <span class="p-2">Impartido del <!--X--> de MES al <!--XX--> de MES del <!--2021-->, en la modalidad e-learning por, con un total de <!--XXX--> horas, obteniendo una calificación de <!--XX-->/<!--XXX--></span><br><br>
    <span style="font-size: 22px; font-style: italic;" class="p-2">La presente se extiende a los <!--XXXXXXXX--> del mes de <!--XXXX--> de dos mil veintiuno.</span>

</div>
<div style="padding-top: 45px; text-align: center;">
    <span class="p-2">Director del CIAAC:</span><br><br><br><br>
    <span style="padding-top: 120px; font-size: 8px; font-weight: bold; color: #996633;" class="p-2">Secretaria de Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
    <span class="p-2">Benjamín Romero Fuentes</span><br>
    <span style="line-height:14px;" class="p-2">Gral. de División P.A. DEMA en Ret.</span>
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