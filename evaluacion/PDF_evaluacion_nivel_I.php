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
    }else if ($data['pregunta1'] ==15 ){
        $pregunta15 ='X';
    }else if ($data['pregunta1'] ==10 ){
        $pregunta10 ='X';
    }else if ($data['pregunta1'] ==0 ){
        $pregunta0 ='X';
    }
    
    if($data['pregunta2'] ==20 ){
        $preguntaII20 ='X';
    }else if ($data['pregunta2'] ==15 ){
        $preguntaII15 ='X';
    }else if ($data['pregunta2'] ==10 ){
        $preguntaII10 ='X';
    }else if ($data['pregunta2'] ==0 ){
        $preguntaII0 ='X';
    }
    
    if($data['pregunta3'] ==20 ){
        $preguntaIII20 ='X';
    }else if ($data['pregunta3'] ==15 ){
        $preguntaIII15 ='X';
    }else if ($data['pregunta3'] ==10 ){
        $preguntaIII10 ='X';
    }else if ($data['pregunta3'] ==0 ){
        $preguntaIII0 ='X';
    }
    
    if($data['pregunta4'] ==20 ){
        $preguntaIV20 ='X';
    }else if ($data['pregunta4'] ==15 ){
        $preguntaIV15 ='X';
    }else if ($data['pregunta4'] ==10 ){
        $preguntaIV10 ='X';
    }else if ($data['pregunta4'] ==0 ){
        $preguntaIV0 ='X';
    }
    
    if($data['pregunta5'] ==20 ){
        $preguntaV20 ='X';
    }else if ($data['pregunta5'] ==15 ){
        $preguntaV15 ='X';
    }else if ($data['pregunta5'] ==10 ){
        $preguntaV10 ='X';
    }else if ($data['pregunta5'] ==0 ){
        $preguntaV0 ='X';
    }
    
    if($data2['suma'] >=80 ){
        $preguntasip ='X';
    }else if ($data2['suma'] < 80 ){
        $preguntanop ='X';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    .cuadraditop2{
       /* Rectangle 39 */
       
       width: 22px;
       height: 22px;
       margin-left: 80%;
       margin-top: -1%;
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
        line-height:28px;
        font-size:35px;
    }
    .palomitap2{
        line-height:28px;
        font-size:35px;
         position: absolute;
    }

    .recfirmains{
        margin: 40px auto 80px auto;
        position: absolute;
        width: 538px;
        height: 200px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
        line-height: 38px;
    }
    .recfirmains2{
        margin-left: 0%;
        position: absolute;
        width: 1074px;
        height: 280px;
        background: #FFFFFF;
        color:black;
        border:1px solid black;
        text-align:center;
      
    }
    .recfirmains3{
        margin-left: 0%;
        position: absolute;
        width: 1074px;
        height: 25px;
        background: #101058;
        color:black;
        border:1px solid black;
      
    }
    .recfirmains4{
        margin-left: 0%;
        position: absolute;
        width: 1074px;
        height: 25px;
        background: #101058;
        color:black;
        border:1px solid black;
        text-align:center;
      
    }
    .firinspec{
      padding-left: 0%;
       padding-top: 50%;
    }
    .firinspec22{
      padding-left: 2%;
       padding-top: 2%;
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
       padding-top: 11%;
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
       padding-top: 50%;
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
    
    <p style="font-weight:bold;font-size:30px; text-align:center;padding-top: 2%;">FORMATOS DE APOYO PARA LA EVALUACIÓN</p>
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
            <th Colspan="2">Inaceptable</th>
            <th Colspan="2">Aceptable</th>
        </tr>
        <tr>
            <td height="50">El aprendiz identifica/describe los pasos asociados para completar la tarea.</td>
            <td height="16">No identifica los materiales.<div class="cuadradito"><span id="idprguI5" name="idprguI5" class="palomita"></span><?php echo $pregunta0?></div></td>
            <td height="16">Identifica algunos materiales.<div class="cuadradito"><span id="idprguI10" name="idprguI10" class="palomita"><?php echo $pregunta10?></span></div></td>
            <td height="16">Identifica casi todos los materiales.<div class="cuadradito"><span id="idprguI15" name="idprguI15" class="palomita"><?php echo $pregunta15?></span></div></td>
            <td height="16">Identifica todos los materiales.<div class="cuadradito"><span id="idprguI20" name="idprguI20" class="palomita"><?php echo $pregunta20?></span></div></td>
        </tr>
        <tr>
           <td height="16">El aprendiz entiende/explica los términos de forma apropiada, así como identifica/describe los materiales, como formas y equipamiento usados durante la realización de la tarea.</td>
           <td height="16">No entiende los términos.<div class="cuadradito"><span id="idprguII5" name="idprguII5" class="palomita"><?php echo $preguntaII0?></span></div></td>
           <td height="16">Entiende algunos términos.<div class="cuadradito"><span id="idprguII10" name="idprguII10" class="palomita"><?php echo $preguntaII10?></span></div></td>
           <td height="16">Entiende casi todos los términos.<div class="cuadradito"><span id="idprguII15" name="idprguII15" class="palomita"><?php echo $preguntaII15?></span></div></td>
           <td height="16">Entiende todos los términos.<div class="cuadradito"><span id="idprguII20" name="idprguII20" class="palomita"><?php echo $preguntaII20?></span></span></div></td>
        </tr>
        <tr>
            <td height="16">El aprendiz identifica/explica las interacciones con otro personal especialista de la autoridad requerido para completar la tarea.</td>
            <td height="16">No explica los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII5" name="idprguIII5" class="palomita"><?php echo $preguntaIII0?></span></div></td>
            <td height="16">Explica algunos recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIIII10" name="idprguIIII10" class="palomita"><?php echo $preguntaIII10?></span></div></td>
            <td height="16">Explica la mayoría de los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII15" name="idprguIII15" class="palomita"><?php echo $preguntaIII15?></span></div></td>
            <td height="16">Explica todos los recursos para iniciar la tarea.<div class="cuadradito"><span id="idprguIII20" name="idprguIII20" class="palomita"><?php echo $preguntaIII20?></span></div></td>
        </tr>
        <tr> 
            <td height="16">El aprendiz asimila/explica los resultados de la tarea (ej. Emisión de Certificados y/o Especificaciones de Operaciones, aprobaciones/desaprobaciones, cierre de la verificación, etc.).</div></td>
            <td>No explica los resultados de la tarea.<div class="cuadradito"><span id="idprguIV" name="idprguIV5" class="palomita"><?php echo $preguntaIV0?></span></div></td>
            <td>Explica algunos posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV10" name="idprguIV10" class="palomita"><?php echo $preguntaIV10?></span></div></td>
            <td>Explica la mayoría de los posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV15" name="idprguIV15" class="palomita"><?php echo $preguntaIV15?></span></div></td>
            <td>Explica todos los posibles resultados de la tarea.<div class="cuadradito"><span id="idprguIV20" name="idprguIV20" class="palomita"><?php echo $preguntaIV20?></span></div></td>
            
        </tr>
        <tr>
            <td height="16">El aprendiz describe/coadyuva en el cierre de la tarea y la documenta en el registro en los formatos del Programa de Entrenamiento en el Puesto de Trabajo (OJT).</td>
            <td>No describe la documentación de la tarea.<div class="cuadradito"><span id="idprguV5" name="idprguV5" class="palomita"><?php echo $preguntaV0?></span></div></td>
            <td>Describe algunos de los documentos de la tarea<div class="cuadradito"><span id="idprguV10" name="idprguV10" class="palomita"><?php echo $pregunta10?></span></div></td>
            <td>Describe algunos métodos o formas de documentación<div class="cuadradito"><span id="idprguV15" name="idprguV15" class="palomita"><?php echo $preguntaV15?></span></div></td>
            <td>Describe todos los métodos o formas de documentación<div class="cuadradito"><span id="idprguV20" name="idprguV20" class="palomita"><?php echo $preguntaV20?></span></div></td>
        </tr>
    </table>
    </div>
    <div class="firinspec22">
        <div class="recfirmains2"></div>
        <div class="recfirmains3" style="color:white;font-size:20px">OBSERVACIONES</div>
    </div>
    <footer>
            CIAAC - SEPT – 07 – R00 
        </footer>
    <div style="page-break-before: always;">
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
        
    <div style="padding-left:2%">
    <table>
        <tr>
            <th Colspan="5">EVALUACIÓN FINAL</th>
        </tr>
        <tr>
            <td height="5" width="80" style="background: #101058;color:white">PORCENTAJE TOTAL.</td>
             <td height="5" width="60" style="font-size:25px;text-align:center;"><?php echo $data2['suma']?>%</td>
             <td height="5" width="40" style="background: #101058;color:white">APROBACIÓN</td>
             <td  height="5" width="50">SI<div class="cuadraditop2"><span id="idprgusp" name="idprgusp" class="palomita"><?php echo $preguntasip?></span></div></td>
             <td height="5" width="50">NO<div class="cuadraditop2"><span id="idprgunop" name="idprgunop" class="palomita"><?php echo $preguntanop?></span></div></td>
        </tr>
        </table>
    </div>
    <p style="font-weight:bold;text-align:center;">NOTA: El porcentaje mínimo aprobatorio para el Nivel I es del 80 %</p>
    <div style="padding-left:2%">
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

</div>
<?php
            require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF('1.0', 'utf-8');
            $dompdf->set_paper('A4', 'portrait');
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $dompdf->stream("Evaluación de Nivel I", array("Attachment" => 0));
            $pdf = $dompdf->output();
            //$filename = "";
            //file_put_contents($filename, $pdf);
            //$dompdf->stream($filename);
        ?>
<script>



</script>
   

</body>

</html>