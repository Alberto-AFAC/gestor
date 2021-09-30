<?php ob_start();
$nombre = $_POST['evalu_nombre'];
$apellido = $_POST['apellido'];
$comentario = $_POST['gstComnt'];
$espec = $_POST['especialidad'];
$espec1 = $_POST['siglas'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVALUACIÓN INSPECTOR</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <!-- SIN LIBRERIAS -->
    <style>
    table,
    td,
    th {
        border: 1px  gray;
    }
    table{
        border-collapse: collapse;
    }

  

    .titulo {
        font-size: 25px;
        font-family: 'Montserrat', sans-serif;
    }

    .oficio {
        font-size: 20px;
        font-family: 'Montserrat', sans-serif;

    }

    .persona {
        font-size: 17px;
        font-family: 'Montserrat', sans-serif;
        color: gray;

    }

    .persona2 {
        font-size: 19px;
        font-family: 'Montserrat', sans-serif;

    }

    /* ESTE ES DEL CERTIFICADO */
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
        font-size: 24px;
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
        font-size: 60px;
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
        font-size: 44px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    .nombre-cursor {
        font-family: 'Montserrat', sans-serif;
        font-size: 35px;
        font-weight: bold;
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    #watermark {
        position: fixed;
        bottom: 10cm;
        left: 3.7cm;
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
        padding-left: 10%;
        width: 30%;
    }

    .middle {
        width: 34%;
    }

    .right {
        width: 30%;
    }

    /* Set additional styling options for the columns */
    .column2 {
        float: left;
    }

    /* Set width length for the left, right and middle columns */
    .left2 {
        padding-left: 5%;
        width: 30%;
    }

    .middle2 {
        width: 40%;
    }

    .right2 {
        width: 10%;
    }

    .column-tabla {
        float: left;
    }

    /* Set width length for the left, right and middle columns */
    .left-tabla {
        width: 80%;
    }

    .middle-tabla {
        width: 50%;
    }

    .right-tabla {
        width: 30%;
    }

    .column-firma {
        float: left;
        padding-top: 30%;
    }

    /* Set width length for the left, right and middle columns */
    .left-firma {
        padding-left: 5%;
        width: 40%;
    }

    .middle-firma {
        width: 12%;
    }

    .right-firma {
        width: 40%;
    }


    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
</head>

<body>
    <!-- <?php
            $path = '../dist/img/header.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?> -->
    <div id="watermark">
        <img src="../dist/img/afac-degradado.png" height="97%" width="70%" />
    </div>
    <!-- <img src="<?php echo $base64 ?>" width="95%" height="113%" /> -->
    <div style="text-align: center;" class="container">
        <span class="titulo">Apéndice E</span><br>
        <span class="titulo">Cédula de Evaluación de Capacidades</span>
    </div><br>
    <div style="text-align: right;" class="container">
        <span class="oficio">Folio/Oficio No.</span>
    </div><br>
    <div style="text-align: center;" class="container">
        <span class="oficio">La Agencia Federal de Aviación Civil, identifica y evalúa a:</span><br><br><br>
    </div>
    <div class="row">
        <div class="column left">
           
            <span class="persona">Apellido Paterno</span><br><br>
        </div>
        <div class="column middle">
        <span style="center;" class="persona"><?php echo $apellido ?></span><br>
            <span class="persona">Apellido Materno</span><br><br>
        </div>
        <div class="column right">
        <span style="center;" class="persona"><?php echo $nombre ?></span><br>
            <span  style="center;" class="persona">Nombre(s)</span><br><br>
        </div>
    </div><br>
    <div style="line-height: 40%;" class="row">
        <div class="column2 left2">
            <p class="persona2">Especialidad: <?php echo $espec1 ?></p>
            <p class="persona2">Escolaridad: </p>
            <p class="persona2">Licencia No.</p>
            <p class="persona2">Horas de vuelo:</p><br>
        </div>
        <div class="column2 middle2">
            <span class="persona2">Adscripción:</span><br><br>
        </div>
        <div class="column2 right2">
            <span class="persona2">Área:</span><br><br>
        </div>
    </div>
    <div style="text-align: justify;" class="container">
        <span class="oficio">Perfil del Inspector PEL:</span><br><br>
        <span class="oficio">Con fundamento en la CP AV 13-10/R8 que establece perfil, funciones, responsabilidades y
            política de Capacitación
            del inspector verificador aeronáutico, inspectores investigadores de accidentes e inspectores de búsqueda y
            salvamentos
            adscritos a la Agencia Federal de Aviación Civil, y de conformidad con lo indicado en el numeral 2.2. El
            inspector Verificador Aeronáutio de Licencias
            (IVA-L) deberá contar con la siguiente experiencia profesional:
        </span>
    </div><br><br>
    <div class="row">
        <div class="column-tabla left-tabla">
            <p class="persona2">1. EXPERIENCIA DE 5 AÑOS EN TRASPORTE AÉREO</p>
            <p class="persona2">2. EXPERIENCIA CON LA GESTIÓN U OPERACIÓN DE AÉRONAVES COMERCIALES</p>
            <p class="persona2">3. CONOCIMIENTOS Y EXPERIENCIA EN METEOROLOGÍA</p>
            <p class="persona2">4. CUALIDADES DE INICITAIVA, TACTO, TOLERANCIA Y PACÍENCIA</p><br>
        </div>
        <div class="column-tabla right-tabla">
            <table>
                <tr class="persona2">
                    <th>Cumple</th>
                    <th>No Cumple</th>
                </tr>
                <tr>
                    <td>SI</td>
                    <td>NO</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="line-height: 28%;">
        <p style="color:red; " class="persona2">Nota: En caso de no cumplir, anexar la documentación probatoria dentro del expediente del inspector</p>
        <p class="persona2"><span style="font-weight: bold;">Observaciones:</span> En caso de ser necesario, indicar los cursos de capacitación requeridos para cumplir con el perfil.</p><br>
        <p class="persona2"><?php echo $comentario ?></span>
</div>
<div class="row">
        <div class="column-firma left-firma">
            <p style="text-align: center;" class="persona2">Firma del Director General de AFAC., Por consideraciones especiales (con fecha).</p>
        </div>
        <div class="column-firma middle-firma">
        <!-- <p style="text-align: center;" class="persona2">Validación de Evaluación por el director del área (con fecha)</p> -->

        </div>
        <div class="column-firma right-firma">
        <p style="text-align: center;" class="persona2">Validación de Evaluación por el director del área (con fecha)</p>
        </div>
    </div>
    <?php
        // require_once 'dompdf/autoload.inc.php';
        require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'portratoit');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("EVALUACIÓN-INSPECTOR", array("Attachment" => 0));
            $pdf = $dompdf->output();
            $filename = "listas/evaluacion.pdf";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename);
        ?>
</body>

</html>