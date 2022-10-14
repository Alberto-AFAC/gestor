<?php
ob_start();

?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMATO DE EVALUACION NIVEL 1</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
.cuadroemmisor{
    box-sizing: border-box;
    position: absolute;
    width: 310px;
    height: 188px;
    border: 1px solid #000000;
    padding-left: 15%
    
}
.cuadrocomprobante{
    box-sizing: border-box;
    position: absolute;
    width: 555px;
    height: 188px;
    border: 1px solid #000000;
margin-left: 35.2%
}
.titulgrey{
    box-sizing: border-box;
    position: absolute;
    width: 310px;
    height: 20px;
    color: #E0E3E3;
    
}
.marlogo{
padding-left: 1%;
       padding-top: 5%;
}
    </style>
</head>
   <img class="marlogo" src="../dist/img/logoafac.png" width="23%" height="23%" alt="">
   <div class="cuadroemmisor"><div class="titulgrey"></div></div>
   
   <div class="cuadrocomprobante"></div>
   
</table>

   
    <?php
            require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('letter', 'landscape');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("Evaluación de Nivel I", array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>
</body>

</html>