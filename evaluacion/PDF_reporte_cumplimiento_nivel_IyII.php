<?php
ob_start();
$Idevalua = $_GET['data'];
include("../conexion/conexion.php");
$query = "SELECT p.*,o.*,s.*,c.*,e.*, a.gstNombr, a.gstApell, i.gstNombr as instructor FROM prog_ojt p, ojts o, ojts_subs s, categorias c, personal i, evaluacion_ojt e, personal a where p.id_tarea=o.id_ojt and p.id_subtarea=s.id_subojt and p.id_esp=c.gstIdcat and i.gstIdper=p.id_insojt and a.gstIdper=p.id_pers and e.id_ojt=p.id_proojt and e.id_ojt='$Idevalua'";
	$resultado = mysqli_query($conexion, $query);
    $data = mysqli_fetch_array($resultado);
    
    $query2 = "SELECT *,SUM(pregunta1)+(pregunta2)+(pregunta3)+(pregunta4)+(pregunta5) as suma  FROM evaluacion_ojt where id_ojt='$Idevalua'";
    $resultado2 = mysqli_query($conexion, $query2);
    $data2 = mysqli_fetch_array($resultado2);
    
    $fechaActual = date('d-m-Y');
    
    if($data['pregunta1'] ==20 ){
        $pregunta20 ='X';
    }else if ($data['pregunta1'] ==5 ){
        $pregunta5 ='X';
    }
    
    if($data['pregunta2'] ==20 ){
        $preguntaII20 ='X';
    }else if ($data['pregunta2'] ==5 ){
        $preguntaII15 ='X';
    }
    
    if($data['pregunta3'] ==20 ){
        $preguntaIII20 ='X';
    }else if ($data['pregunta3'] ==5 ){
        $preguntaIII15 ='X';
    }
    
    if($data['pregunta4'] ==20 ){
        $preguntaIV20 ='X';
    }else if ($data['pregunta4'] ==5 ){
        $preguntaIV15 ='X';
    }
    
    if($data['pregunta5'] ==20 ){
        $preguntaV20 ='X';
    }else if ($data['pregunta5'] ==5 ){
        $preguntaV15 ='X';
    }
    
    if($data2['suma'] >=80 ){
        $preguntasip ='X';
    }else if ($data2['suma'] < 80 ){
        $preguntanop ='X';
    }

?>
 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE DE CUMPLIMIENTO NIVEL I Y II</title>
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
       margin-left: 25%;
       margin-top: 0%;
       border: 2px solid black;
       box-sizing: border-box;
    }
     .cuadraditop2{
       /* Rectangle 39 */
       width: 22px;
       height: 22px;
       margin-left: 80%;
       margin-top: 0%;
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
    .palomita{
        line-height:6px;
        font-size:45px;
    }
    .palomita2{
        line-height:28px;
        font-size:35px;
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
    footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size:15px;
            }
    </style>
</head>
 <div id="header">
    <img src="../dist/img/afaclogo.jpg" style="opacity: 0.5;" width="134.4" height="113.4" alt="">
    <div class="imagen2">
        <img src="../dist/img/ciaa_logo.jpg" style="opacity: 0.5; padding: -3%;" width="140" height="" alt="134.4">
    </div>
    <p style="opacity: 0.5; padding: -8%; padding-left:28.5% font-blod">AGENCIA FEDERAL DE AVIACIÓN CIVIL</p>
    <p style="opacity: 0.5; padding: -5.7%; padding-left:26%; font-size: 22px">CENTRO INTERNACIONAL DE ADIESTRAMIENTO</p>
    <p style="opacity: 0.5; padding: -3.7%; padding-left:42%; font-size: 22px">DE AVIACIÓN CIVIL</p>
    <p style="opacity: 0.5; padding: -1.7%; padding-left:48%; font-size: 22px">(CIAAC)</p>
 </div>
<body>
    <p style="font-weight:bold; font-size:30px; text-align:center;">FORMATO DE REPORTE DE CUMPLIMIENTO DE</p>
    <p style="font-weight:bold; font-size:30px; text-align:center; padding-top: -2%;">NIVEL I Y II</p>
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
            <span style="font-size:18px;font-size:22px; margin-top: 2%;"><?php echo $fechaActual?></span>
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
            <th>Si</th>
            <th>No</th>
        </tr>
        <tr>
            <td height="30" style="font-size:25px">Me explicaron en que consiste la tarea y subtarea.</td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $pregunta20?></div></td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $pregunta5?></div></td>
        </tr>
        <tr>
           <td height="30" style="font-size:25px">Revisé, leí y entendí el material que me fue proporcionado.</td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaII20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaII5?></div></td>
        </tr>
        <tr>
           <td height="30" style="font-size:25px">Logré resolver todas mis dudas.</td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaIII20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaIII5?></div></td>
        </tr>
        <tr>
            <td height="30"  style="font-size:25px">Conocí las instalaciones, así como su ubicación.</div></td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaIV20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaIV5?></div></td>
        </tr>
        <tr>
            <td height="30" style="font-size:25px">Conocí a mis compañeros y al personal con quien voy a  trabajar.</div></td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV5?></div></td>
        </tr>
        <tr>
            <td height="30" style="font-size:25px">Las habilidades adquiridas son suficiente para conocer el desarrollo de las tareas.</div></td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV5?></div></td>
        </tr>
        <tr>
            <td height="30" style="font-size:25px">Me proporcionaron el material correspondiente para la tarea               y subtarea.</div></td>
            <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV20?></div></td>
           <td height="30"><div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $preguntaV5?></div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">Lista de materiales:</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">1.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">2.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">3.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">4.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">5.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">6.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">7.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">8.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3"  style="font-size:25px">9.</div></td>
        </tr>
        <tr>
            <td height="30" colspan="3" style="font-size:25px">10.</div></td>
        </tr>
        <tr>
            <td height="120" colspan="3"  style="font-size:25px;text-align:left;padding-top:-3%">¿Cuáles son tus comentarios y observaciones sobre el entrenamiento recibido?</div></td>
        </tr>
    </table>
    </div>

    <p style="font-weight:bold;text-align:center;">Por tal motivo, manifiesto que es de mi entera satisfacción el entrenamiento que  recibí para el nivel I y II de OJT.</p>
    <div style="padding-left:2%;padding-top:2%">
       <table>
            <tr>
                <th height="110" style="background:white;"></th>
                <th height="110" style="background:white;"></th>
            </tr>
            <tr>
               <td width="50%" style="text-align:center;">NOMBRE Y FIRMA DEL IVA APRENDIZ</td>
               <td width="50%" style="text-align:center;">NOMBRE Y FIRMA DEL EVALUADOR <br>(INSTRUCTOR OJT)</td>
            </tr>
       </table>
    </div>
    <footer>
            CIAAC - SEPT – 07 – R00 
        </footer>

<?php
            require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF();
            $dompdf->set_paper('A4', 'portrait');
            $dompdf->load_html(ob_get_clean());
            // $dompdf->set_option('enable_font_subsetting', true);
            $dompdf->render();
            $dompdf->stream("REPORTE DE CUMPLIMIENTO NIVEL I Y II".'_'.$datos['nombre_pta'], array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>

   
    
</body>

</html>