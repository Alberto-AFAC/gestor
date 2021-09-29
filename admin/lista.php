<?php ob_start();
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
    <!-- SIN LIBRERIAS -->
    <style>
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
            $path = '../dist/img/header.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
    <div id="watermark">
        <img src="../dist/img/back-image.jpg" height="95%" width="95%" />
    </div>
    <img src="<?php echo $base64 ?>" width="95%" height="113%" />
   
   
   
    <?php
        // require_once 'dompdf/autoload.inc.php';
        require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'landscape');
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