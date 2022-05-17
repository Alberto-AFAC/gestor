<?php
ob_start();

$Idevalua = $_GET['data'];
include("../conexion/conexion.php");
$query = "SELECT p.*,o.*,s.*,c.*,e.*, a.gstNombr, a.gstApell, i.gstNombr as instructor FROM prog_ojt p, ojts o, ojts_subs s, categorias c, personal i, evaluacion_ojt e, personal a where p.id_tarea=o.id_ojt and p.id_subtarea=s.id_subojt and p.id_esp=c.gstIdcat and i.gstIdper=p.id_insojt and a.gstIdper=p.id_pers and e.id_ojt=p.id_proojt and e.id_ojt='$Idevalua'";


	$resultado = mysqli_query($conexion, $query);
    $data = mysqli_fetch_array($resultado);


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
    .palomita{
        line-height: 5px;
        font-size:35px;
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
       padding-top:3.2%;
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
    <input type="text" id="idpreg1" name="idpreg1" style="display:none" value="<?php echo $data['pregunta1']?>">
    <input type="text" id="idpreg2" name="idpreg2" style="display:none" value="<?php echo $data['pregunta2']?>">
    <input type="text" id="idpreg3" name="idpreg3" style="display:none" value="<?php echo $data['pregunta3']?>">
    <input type="text" id="idpreg4" name="idpreg4" style="display:none" value="<?php echo $data['pregunta4']?>">
    <input type="text" id="idpreg5" name="idpreg5" style="display:none" value="<?php echo $data['pregunta5']?>">
    <p style="font-weight:bold; font-size:30px; text-align:center;">FORMATOS DE APOYO PARA LA EVALUACIÓN</p>
    <p style="font-weight:bold; font-size:30px; text-align:center; padding-top: -2%;">NIVEL I </p>
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
            <span style="font-size:18px;font-size:16px; margin-top: 2%;"><?php echo $data['gstNombr']?> <?php echo $data['gstApell']?></span>
        </div>
    </div>
    <div class="dentoiz2">
        <div class="rectangulo2">
            <span style="font-size:18px;font-size:16px; margin-top: 2%;"><?php echo $data['instructor']?></span>
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
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"><?php echo $data['gstCsigl']?></span>
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
            <td height="50">El aprendiz identifica apropiadamente los materiales asociados con la tarea (reglas, órdenes, formas, equipamiento, etc.)</td>
            <td height="16">No identifica los materiales.<div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span></div></td>
            <td height="16">Identifica algunos materiales.<div class="cuadradito"><span id="idprguI10" name="idprguI10" class="palomita"></span></div></td>
            <td height="16">Identifica casi todos los materiales.<div class="cuadradito"><span id="idprguI15" name="idprguI15" class="palomita"></span></div></td>
            <td height="16">Identifica todos los materiales.<div class="cuadradito"><span id="idprguI20" name="idprguI20" class="palomita"></span></div></td>
        </tr>
        <tr>
           <td height="16">El aprendiz entiende los términos y definiciones clave asociados con la tarea.</td>
           <td height="16">No entiende los términos.<div class="cuadradito"><span id="idprguII5" name="idprguII5" class="palomita"></span></div></td>
           <td height="16">Entiende algunos términos.<div class="cuadradito"><span id="idprguII10" name="idprguII10" class="palomita"></span></div></td>
           <td height="16">Entiende casi todos los términos.<div class="cuadradito"><span id="idprguII15" name="idprguII15" class="palomita"></span></div></td>
           <td height="16">Entiende todos los términos.<div class="cuadradito"><span id="idprguII20" name="idprguII20" class="palomita"></span></div></td>
        </tr>
        <tr>
            <td height="16">El aprendiz explica cómo se inicia la tarea</td>
            <td height="16">No explica los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII5" name="idprguIII5" class="palomita"></span></div></td>
            <td height="16">Explica algunos recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIIII10" name="idprguIIII10" class="palomita"></span></div></td>
            <td height="16">Explica la mayoría de los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII15" name="idprguIII15" class="palomita"></span></div></td>
            <td height="16">Explica todos los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII20" name="idprguIII20" class="palomita"></span></div></td>
        </tr>
        <tr>
            <td height="16">El aprendiz explica los resultados de la tarea (ej. Emisión de Certificados y/o Especificaciones de Operaciones, aprobaciones/desaprobaciones).</div></td>
            <td>No explica los resultados de la tarea.<div class="cuadradito"><span id="idprguIV5" name="idprguIV5" class="palomita"></span></div></td>
            <td>Explica algunos posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV10" name="idprguIV10" class="palomita"></span></div></td>
            <td>Explica la mayoría de los posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV15" name="idprguIV15" class="palomita"></span></div></td>
            <td>Explica todos los posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV20" name="idprguIV20" class="palomita"></span></div></td>
            
        </tr>
        <tr>
            <td height="16">El aprendiz describe como se cierra la tarea y documentarla en el registro del seguimiento del programa en el puesto de trabajo.</td>
            <td>No describe la documentación de la tarea.<div class="cuadradito"><span id="idprguV5" name="idprguV5" class="palomita"></span></div></td>
            <td>Describe algunos de los documentos de la tarea<div class="cuadradito"><span id="idprguV10" name="idprguV10" class="palomita"></span></div></td>
            <td>Describe algunos métodos o formas de documentación<div class="cuadradito"><span id="idprguV15" name="idprguV15" class="palomita"></span></div></td>
            <td>Describe todos los métodos o formas de documentación<div class="cuadradito"><span id="idprguV20" name="idprguV20" class="palomita"></span></div></td>
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
            $dompdf->stream("Evaluación de Nivel I", array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>
<script>
    //pregunta 1
   var idpreg=document.getElementById('idpreg1').value;
   //alert(idpreg);
   if (idpreg=="0"){
    document.getElementById('idprguI5').innerHTML ="✓";
   }else if (idpreg=="10"){
    document.getElementById('idprguI10').innerHTML ="✓";
   }else if (idpreg=="15"){
    document.getElementById('idprguI15').innerHTML ="✓";
   }else if (idpreg=="20"){
    document.getElementById('idprguI20').innerHTML ="✓";
   }
   //pregunta 2
   var idpreg2=document.getElementById('idpreg2').value;
   //alert(idpreg2);
   if (idpreg2=="0"){
    document.getElementById('idprguII5').innerHTML ="✓";
   }else if (idpreg2=="10"){
    document.getElementById('idprguII10').innerHTML ="✓";
   }else if (idpreg2=="15"){
    document.getElementById('idprguII15').innerHTML ="✓";
   }else if (idpreg2=="20"){
    document.getElementById('idprguII20').innerHTML ="✓";
   }
    //pregunta 3
    var idpreg3=document.getElementById('idpreg3').value;
   //alert(idpreg3);
   if (idpreg3=="0"){
    document.getElementById('idprguIII5').innerHTML ="✓";
   }else if (idpreg3=="10"){
    document.getElementById('idprguIII10').innerHTML ="✓";
   }else if (idpreg3=="15"){
    document.getElementById('idprguIII15').innerHTML ="✓";
   }else if (idpreg3=="20"){
    document.getElementById('idprguIII20').innerHTML ="✓";
   }
     //pregunta 4
    var idpreg4=document.getElementById('idpreg4').value;
   if (idpreg4=="0"){
    document.getElementById('idprguIV5').innerHTML ="✓";
   }else if (idpreg4=="10"){
    document.getElementById('idprguIV10').innerHTML ="✓";
   }else if (idpreg4=="15"){
    document.getElementById('idprguIV15').innerHTML ="✓";
   }else if (idpreg4=="20"){
    document.getElementById('idprguIV20').innerHTML ="✓";
   }

    //pregunta 5
    var idpreg5=document.getElementById('idpreg5').value;
   if (idpreg5=="0"){
    document.getElementById('idprguV5').innerHTML ="✓";
   }else if (idpreg5=="10"){
    document.getElementById('idprguV10').innerHTML ="✓";
   }else if (idpreg5=="15"){
    document.getElementById('idprguV15').innerHTML ="✓";
   }else if (idpreg5=="20"){
    document.getElementById('idprguV20').innerHTML ="✓";
   }


</script>
   

</body>

</html>