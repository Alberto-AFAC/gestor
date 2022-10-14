<?php
ob_start();

?>
 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMATO DE EVALUACION NIVEL II</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
    @font-face {
  font-family: 'Montserrat';
  src: url('fonts/OpenSans-Regular.ttf') format('truetype');
  font-style: bold;
  font-weight: normal;
}
@page {
	 border: 2px solid black;
	}
    .cuadradito{
       /* Rectangle 39 */
       content: "✔";
       width: 22px;
       height: 22px;
       margin-left: 80%;
       margin-top: 1%;
       border: 2px solid black;
       box-sizing: border-box;
    }
    .rectangulo1 {
        margin: 20px auto 40px auto;
        position: absolute;
        width: 350px;
        height: 48px;
        background: #101058;
        color:white;
        border-top:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .rectangulo2 {
        margin: 20px auto 40px auto;
        position: absolute;
        width: 370px;
        height: 48px;
        color:black;
        background: #FFFFFF;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .rectangulo3 {
        margin: 20px auto 40px auto;
        position: absolute;
        width: 180px;
        height: 48px;
        background: #101058;
        color:white;
        border-top:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .rectangulo4{
        margin: 20px auto 40px auto;
        position: absolute;
        width: 180px;
        height: 48px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .recfirmains{
        margin: 20px auto 40px auto;
        position: absolute;
        width: 538px;
        height: 200px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .firinspec{
      padding-left: 2%;
       padding-top: 0%;
    }
    .firma1{
      padding-left: 2%;
       padding-top: 12.5%;
    }
    .version{
      padding-left: 2%;
      padding-top: 9.5%;
    }
    .firma2{
      padding-left: 51%;
       padding-top: 12.5%;
    }
    .dento{
      padding-left: 2%;
       padding-top: 0%;
    }
    .recfirmaintr{
        margin: 20px auto 40px auto;
        position: absolute;
        width: 538px;
        height: 200px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .recfirma1{
         margin: 20px auto 40px auto;
        position: absolute;
        width: 538px;
        height: 40px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    
        
    .firinstruc{
      padding-left: 51.1%;
       padding-top: 0%;
    }
    .dento2{
      padding-left: 2%;
       padding-top:3.2%;
    }
    .dentoiz1{
        padding-left:33%;
       padding-top:0%;
    }
    .dentoiz2{
        padding-left:33%;
       padding-top:3.1%;
    }
    .dentoizfec{
    padding-left:66.7%;
    padding-top:0%;
    }
    .dentoizfec2{
        padding-left:66.7%;
    padding-top:3.2%;
    }
    .dentoizfec3{
        padding-left:83%;
    padding-top:0%;
    }
    .dentoizfec4{
    padding-left:83%;
    padding-top:3.1%;
    }
    .cuerpo {
       padding-left: 2%;
       padding-top: 4%;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        border-color: gray;
        width: 100%;
        border: black .5px solid;
    }
    tbody {
       border: black 1px solid;
    }
    tr {
       border: black 1px solid;
       width: 100px;
    }
    th {
        border: black 1px solid;
        text-align: left;
        padding: 9px;
        font-size: 25px;
        background-color: #101058;
        color:white;
        text-align:center;
    }
    td {
       border: black 1px solid;
        text-align: left;
        padding: 9px;
        font-size: 20px;
    }
     .imagen2{
      padding-left: 87%;
       padding-top: -5%;
    }
    </style>
</head>
<img src="../dist/img/comunicacion.png" style="opacity: 0.5;" width="300" height="50" alt="">
<div class="imagen2">
<img src="../dist/img/afaclogo.jpg" style="opacity: 0.5;" width="134.4" height="113.4" alt="">
</div>
<body>
    <p style="font-weight:bold; font-size:30px; text-align:center;">FORMATOS DE APOYO PARA LA EVALUACIÓN</p>
    <p style="font-weight:bold; font-size:30px; text-align:center; padding-top: -2%;">NIVEL II</p>
    <div class="dento">
        <div class="rectangulo1">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;">Nombre del Aprendiz</span>
        </div>
    </div>
    <div class="dento2">
        <div class="rectangulo1">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;">Nombre del Instructor</span>
        </div>
    </div>
    <div class="dentoiz1">
        <div class="rectangulo2">
            <span style="font-size:18px;font-size:16px; margin-top: 2%;"></span>
        </div>
    </div>
    <div class="dentoiz2">
        <div class="rectangulo2">
            <span style="font-size:18px;font-size:16px; margin-top: 2%;"></span>
        </div>
    </div>
    <div class="dentoizfec">
        <div class="rectangulo3">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;">Fecha</span>
        </div>
    </div>
    <div class="dentoizfec2">
        <div class="rectangulo3">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;">Especialidad</span>
        </div>
    </div>
    <div class="dentoizfec3">
        <div class="rectangulo4">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"></span>
        </div>
    </div>
    <div class="dentoizfec4">
        <div class="rectangulo4">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"></span>
        </div>
    </div>
    <br>
    <br>
<br>
     <div class="cuerpo">
         <table>
        <tr>
            <th>Descripción</th>
            <th Colspan="2">Inaceptable</th>
            <th Colspan="2">Aceptable</th>
        </tr>
        <tr>
            <td height="50">El aprendiz puede describir la secuencia de pasos para completar la tarea.</td>
            <td height="16">No puede describir la secuencia de pasos.<div class="cuadradito"></div></td>
            <td height="16">Describe algunos pasos de la secuencia.<div class="cuadradito"></div></td>
            <td height="16">Describe la mayoría de pasos de la secuencia.<div class="cuadradito"></div></td>
            <td height="16">Describe la secuencia de pasos adecuadamente.<div class="cuadradito"></div></td>
        </tr>
        <tr>
           <td height="16">El aprendiz puede describir apropiadamente los materiales como formas y equipamiento usados durante la realización de la tarea.</td>
           <td height="16">No puede describir el uso de los materiales.<div class="cuadradito"></div></td>
           <td height="16">Describe algunos usos de materiales.<div class="cuadradito"></div></td>
           <td height="16">Describe la mayoría de usos de materiales.<div class="cuadradito"></div></td>
           <td height="16">Describe adecuadamente el adecuado uso de los materiales.<div class="cuadradito"></div></td>
        </tr>
        <tr>
            <td height="16">El aprendiz puede describir las interacciones con otro personal de la autoridad requerido para completar la tarea.</td>
            <td height="16">No puede describir las interacciones entre el personal de la autoridad.<div class="cuadradito"></div></td>
            <td height="16">Describe algunas interacciones adecuadamente.<div class="cuadradito"></div></td>
            <td height="16">Describe la mayoría de interacciones adecuadamente.<div class="cuadradito"></div></td>
            <td height="16">Describe todas las posibles interacciones adecuadamente.<div class="cuadradito"></div></td>
        </tr>
        <tr>
            <td height="16">El aprendiz puede describir la coordinación con el operador que es necesario para completar la tarea.</div></td>
            <td>No puede describir las actividades de coordinación con el operador.<div class="cuadradito"></div></td>
            <td>Explica algunas actividades de coordinación con el operador.<div class="cuadradito"></div></td>
            <td>Explica la mayoría de actividades de coordinación con el operador.<div class="cuadradito"></div></td>
            <td>Explica todas las actividades de coordinación con el operador adecuadamente.<div class="cuadradito"></div></td>
        </tr>
    </table>
    </div>
    <div class="firinspec">
        <div class="recfirmains">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"></span>
        </div>
    </div>
    <div class="firinstruc">
        <div class="recfirmaintr">
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"></span>
        </div>
    </div>
    <div class="firma1">
        <div class="recfirma1">
            <span style="font-size:18px;font-size:18px; margin-top: 2%;">NOMBRE Y FIRMA DEL IVA APRENDIZ</span>
        </div>
    </div>
    <div class="firma2">
        <div class="recfirma1">
            <span style="font-size:18px;font-size:17px; margin-top: 2%;">NOMBRE Y FIRMA DEL EVALUADOR (INSTRUCTOR OJT)</span>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   <table>
  <tr>
    <th style=" background-color: #FFFFFF;border:white 1px solid; color:blak; font-size:14px;text-align: left;">F – CIAAC - SEPT – 07 – R00</th>
  </tr>
</table>

   
    <?php
            require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'portrait');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("Evaluación de Nivel II".'_'.$datos['nombre_pta'], array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>
</body>

</html>