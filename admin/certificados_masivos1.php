<?php ob_start();

include ("../conexion/conexion.php");
require '../dist/phpqrcode/qrlib.php';

$datos1 = $_POST['idlistap'];
$codigo = $_POST['foliop'];

if($_POST['inic']=='' && $_POST['finc']==''){
    $ini = 0;
    $fin = 100;
}else{
    $ini = $_POST['inic'];
    $fin = $_POST['finc'];
}

$query = "SELECT * FROM masivo_certificados1 WHERE codigo = '$codigo'";
$resultado = mysqli_query($conexion, $query);
$count = 0;
while($data = mysqli_fetch_array($resultado)){ 

    $count++;

    $idperson = $data['idinsp'];
    $idmstr = $data['idmstr'];
    $idcuro = $data['id_curso'];
    $codigo = $data['codigo'];
    $id_reac = $data['id_reac'];
    $fec_reac = $data['reaccion'];
    $idlist = $data['gstIdlsc'];
    $titulo = $data['gstTitlo'];
    $constancia = $data['codigo'];
    $id_persona = $data['gstIdper'];

    $query = "SELECT * FROM comparativo WHERE gstIdper = $idperson AND gstIdlsc = $datos1 AND codigo= '$codigo'";
    $const = mysqli_query($conexion, $query);

    $dia = array("cero","uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece","catorce","quince", "dieciseis","diecisiete","dieciocho","diecinueve", "veinte","veintiuno","veintidós","veintitres","veinticuatro","veinticinco","veintiseis","veintisiete","veintiocho","veintinueve","treinta","treinta y uno");
    $fecha2= $dia[date('d')];
    setlocale(LC_TIME, "spanish");
    $mesactual = strftime("%B");
    $tituloPrueba = "INDUCCIÓN A LA SCT";

    $mes = array("0","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $hoy= date('d').' de '.$mes[date('n')].' del año '.date('Y');
// $qrFecha = $dateF[date("F j, Y")];    
    if($con = mysqli_fetch_array($const)){

        $conteoStr = strlen($con['gstTitlo']);
        $nombre = $con['gstNombr'];
        $apellido = $con['gstApell'];
        $documento = $con['gstCntnc'];
        $curso = $con['gstTitlo'];
        $dateF = $con['fcurso'];
        $dateFinal = $con['fechaf'];
        $registro = $con['codigo'];
        $EvaluacionF = $con['evaluacion'];
// $temario = $con['titulo'];
        $idc = $con['gstIdlsc'];
        $llave = base64_encode($con['gstNombr']." ".$con['gstApell']." ".$con['codigo']);
        $nombresCompletos = $con['gstNombr']." ".$con['gstApell'];

        $dir = 'temp/';

        if(!file_exists($dir))
            mkdir($dir);
        if($con['gstCntnc'] == "CONSTANCIA"){
            $UN = "UNA";
        }else{
            $UN = "UN";
        }
        $filename = $dir.'QR.png';

        $tamanio = 5;
        $level = 'H';
        $frameSize = 1;
        $contenido = "INSTITUCIÓN: CENTRO INTERNACIONAL DE AVIACIÓN CIVIL, OTORGÓ A:". " " .$nombre. " " .$apellido. " " ."$UN $documento POR HABER PARTICIPADO EN EL CURSO: $curso CON FOLIO". " " .$registro. " ". "El DIA"." ".$dateFinal;

        QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Certficate</title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,700&display=swap"
            rel="stylesheet">
            <link rel="stylesheet" href="../dist/css/constancias.css">
        </head>

        <body>
            <?php

            if( $ini < $count && $count <= $fin){

                $path = '../dist/img/header.jpg';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
                <div id="watermark">
                    <img  src="../dist/img/back-image.jpg" height="95%" width="95%" />
                </div>
                <img src="<?php echo $base64 ?>" style="margin-top:-3em; margin-left:-2.9em; height:170px; width:109%;" />
                <?php
                if($con['gstCntnc'] == 'CONSTANCIA1' && $conteoStr >= 100){
                    echo "<div style='text-align: center;'>
                    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
                    <p class='otorga'>Otorga la presente4</p>
                    <p class='titulo-certificado'>{$con['gstCntnc']}</p>
                    <p class='nombre-persona'>Al C:. <span
                    class='nombre-pConstancia'>{$nombresCompletos}</span></p>
                    <p class='otorga'>Por haber aprobado satisfactoriamente el curso:</p>
                    <p class='nombre-Constancia'>{$con['gstTitlo']}</p> 
                    <p class='nombre-grupo-max'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
                    </p><span class='p-2'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
                    al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['gstDrcin']}.</span><br><br>

                    <div class='caja'>
                    <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
                    <center><img src='../dist/img/firmas/directora.jpg' style='margin-top: 0.4em; width: 400px; position: absolute; right: 45%;'></center>
                    </div>
                    <div style='padding-top: 9px; text-align: center;'>
                    <div class='row'>
                    <div class='column left'>
                    </div>
                    <div class='column middle'>
                    <br><br><br><br>
                    <span style='font-size: 11px; font-weight: bold; color: #996633;'
                    class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span><br>
                    <span style='font-weight: bold;' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
                    </div>
                    <div class='column right'>
                    </div>
                    </div>
                    </div>
                    <p class='codigo-curso' style='margin-top:-1.1em;'>Código del curso: {$con['codigo']}</p>
                    <p class='p-3'>Este <span style='font-weight: bold;'><u>certificado</u></span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:
                    {$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a
                    continuación se enlistan:</p>
                    </div>
                    <div class='footer-constancia-gold'>
                    <span style='padding-top: 120px; font-size: 11px; font-weight: bold; color: #996633;'
                    class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span>
                    </div>
                    <div class='footer-constancia'>
                    <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 222px; width: 300px; position: absolute; left: 13%;'>
                    <div class='caja1'><span>Lic. Viridiana Montserrat Hernández Piña<br>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos<br>
                    Centro Internacional de Adiestramiento de Aviación Civil</span></div>
                    <p style='font-size: 18px; text-align: right;' class='p-2'>Cadena de Seguridad: {$llave}</p>
                    </div>";
                }else if($con['gstCntnc'] == 'CONSTANCIA1' && $conteoStr <= 99){

                    echo "<div style='text-align: center;'>
                    <p class='CIAAC'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
                    <p class='otorga'>Otorga la presente</p>
                    <p class='titulo-certificado'>{$con['gstCntnc']}</p>
                    <p class='nombre-persona'>Al C:. <span
                    class='nombre-Constancia-Min'>{$nombresCompletos}</span></p>
                    <p class='otorga'>Por haber participado satisfactoriamente el curso:</p>
                    <p class='nombre-Curso-Min'>{$con['gstTitlo']}</p> 
                    <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
                    </p><span class='p-2'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
                    al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['gstDrcin']}.</span><br><br>
                    <div class='caja'>
                    <p style='margin-bottom: -70px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
                    <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width: 400px; position: absolute; right: 45%;'></center>
                    </div>
                    <div style='padding-top: 9px; text-align: center;'>
                    <div class='row'>
                    <div class='column left'>
                    </div>
                    <div class='column middle'>
                    <br><br><br><br><br>
                    <span style='font-size: 13px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px '
                    class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil–Centro Internacional de
                    Adiestramiento de
                    Aviación Civil / SCT-AFAC-CIAAC</span> <br>
                    <span style='font-weight: bold;' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
                    </div>
                    <div class='column right'>
                    </div>
                    </div>
                    </div>
                    <p style='padding-top:-6%;' class='codigo-curso'>Código del curso: {$con['codigo']}</p>
                    <p class='p-3'>Este <span style='font-weight: bold;'><u>certificado</u></span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:
                    {$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a
                    continuación se enlistan:</p>
                    </div>
                    <div class='footer-constancia-gold'>
                    <img src='../dist/img/firmas/Viridiana.jpg' style='margin-top:-35%; bottom: 242px; width: 300px; margin-left: 1%;'>
                    <p style='margin-top:-25%; padding-top:-25%; font-size: 12px; font-weight: bold; color: #996633;'
                    class=''>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro</p>
                    <p style='margin-top:-25%; padding-top:-40%; font-size: 12px; font-weight: bold; color: #996633;'
                    class=''>Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
                    </div>
                    <div class='footer-constancia'>
                    <div class='caja1'><span>Lic. Viridiana Montserrat Hernández Piña<br>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos<br>
                    Centro Internacional de Adiestramiento de Aviación Civil</span></div>
                    <p style='font-size: 18px; text-align: right;' class='p-2'>Cadena de Seguirdad: {$llave}</p>
                    </div>
                    ";
                }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
        al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br><br>";
        
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez
        echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
        }
        
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
        echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
        }
        
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:20px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
            
        </div>";
                }else if($con['gstCntnc'] == 'CERTIFICADO' && $conteoStr <= 99 && $con['comparativo']=='DIFERENTE' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "
        <div style='text-align: center;'>
            <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
            <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga el presente</p>
            <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
            <p style='padding-top:-22px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
            <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
            <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']} al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span>";
           
            if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez
            echo"<div class='caja'>
                <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
                <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
                </div>
                <div style='padding-top: 9px; text-align: center;'>
                    <div class='row'>
                        <div class='column left'></div>
                        <div class='column middle'>
                           <br><br><br><br>
                           <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                            Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                           <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
                        </div>
                    </div>";
            }
            if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
            echo"<div class='caja'>
                <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
                <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
                </div>
                <div style='padding-top: 9px; text-align: center;'>
                    <div class='row'>
                        <div class='column left'></div>
                        <div class='column middle'>
                           <br><br><br><br>
                           <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                            Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                           <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
                        </div>
                    </div>";
            }
        
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
        </div>";
                }else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
        al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";
        
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez
         echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
        </div>";
         }
         
         if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
         echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
         }
        
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>reconocimiento</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 360px; width: 300px; position: absolute; left: 16%;'>
            
        </div>";

                }else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr <= 99 && $con['comparativo']=='DIFERENTE' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-33px;font-size:30px'>Otorga el presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-20px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
        <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']} al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";
            
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez
            echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
            </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
            echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
            </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
     
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 335px; width: 300px; position: absolute; left: 16%;'>
        </div>";

//----------------------------------DESDE AQUI--------------------------------
                }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='IGUAL' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, el {$con['dia']} de {$con['mesnombre']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br><br>";
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez
            echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
             <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
            </div>";
        }
        
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
         echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
             <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
            </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:20px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
            
        </div>";
                }else if($con['gstCntnc'] == 'CERTIFICADO' && $conteoStr <= 99 && $con['comparativo']=='IGUAL' && $con['modalidad']<> 'AUTOGESTIVO'){
                   echo "
        <div style='text-align: center;'>
            <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
            <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga el presente</p>
            <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
            <p style='padding-top:-22px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
            <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
            <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, el {$con['dia']} de {$con['mesnombre']} del presente año, con una duración de {$con['duracion']} hora(s).";
            
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
            echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
        </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
        echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
        
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
        </div>";
                }else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr >= 100 && $con['comparativo']=='IGUAL' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, el {$con['dia']} de {$con['mesnombre']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";

        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
            echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
            </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
         echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
            </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>reconocimiento</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 360px; width: 300px; position: absolute; left: 16%;'>
            
        </div>";

                }else if($con['gstCntnc'] == 'DIPLOMA' && $conteoStr <= 99 && $con['comparativo']=='IGUAL' && $con['modalidad']<> 'AUTOGESTIVO'){
                    echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-33px;font-size:30px'>Otorga el presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-20px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
        <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, el {$con['dia']} de {$con['mesnombre']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";
        
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
        echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
            </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
        echo"<div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
            <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
            </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
     
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 335px; width: 300px; position: absolute; left: 16%;'>
        </div>";
                //----------------------------------------AUTOGESTIVO-----------------------------------------------------------------------------
    }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']== 'AUTOGESTIVO'||$con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='IGUAL'){
       echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
        al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br><br>";

       if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
        echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
        </div>";
       }
       
       if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
       echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
       }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:20px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
            
        </div>";
    }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']== 'AUTOGESTIVO'||$con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='IGUAL'){
        echo "
        <div style='text-align: center;'>
            <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
            <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga el presente</p>
            <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>C E R T I F I C A D O</b></p>
            <p style='padding-top:-22px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
            <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
            <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']} al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).";
        
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
           echo" <div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
           <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
             </div>";
        
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
         echo" <div class='caja'>
            <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
            </div>
           <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
             </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>certificado</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='padding-top:65%; width: 300px; position: absolute; left: 16%;'>
        </div>";
    }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']== 'AUTOGESTIVO'||$con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='IGUAL'){
       echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-35px;font-size:30px'>Otorga la presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-30px;' class='nombre-persona'>A:<span class='nombre-pConstancia'>{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-34px;'>Por haber aprobado satisfactoriamente el curso:</p>
        <p style='padding-top:-30px;' class='nombre-Constancia'>{$con['gstTitlo']}</p> 
        <p class='nombre-grupo-Min'style='padding-top:10px;'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
        </p><span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']}
        al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";
        
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez    
        echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
        </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
         echo"<div class='caja'>
            <p style='margin-bottom: -40px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
        }
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
        <p class='p-3' style='font-family: Montserrat-Light'>Este <span style='font-weight: bold;'>reconocimiento</span> ampara los temas visto en el <span style='font-weight: bold;'>Curso:{$con['gstTitlo']}</span>, Grupo: {$con['grupo']}, que a continuación se enlistan:</p>
        
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 360px; width: 300px; position: absolute; left: 16%;'>
            
        </div>";

    }else if($con['gstCntnc'] == 'CERTIFICADO'  && $conteoStr >= 100 && $con['comparativo']=='DIFERENTE' && $con['modalidad']== 'AUTOGESTIVO'||$con['gstCntnc'] == 'CONSTANCIA' && $con['modalidad']=='AUTOGESTIVO' && $con['comparativo']=='IGUAL'){
       echo "<div style='text-align: center;'>
        <p class='CIAAC' style='font-family: Montserrat-Light'>El Centro Internacional de Adiestramiento de Aviación Civil</p>
        <p class='' style='text-align:center;padding-top:-33px;font-size:30px'>Otorga el presente</p>
        <p style='padding-bottom: 0px;font-family: Montserrat;font-size:45px;padding-top:-35px;' class='titulo-certificado'><b>R E C O N O C I M I E N T O</b></p>
        <p style='padding-top:-20px;' class='nombre-persona'>A:<span class='nombre-Constancia-Min' >{$nombresCompletos}</span></p>
        <p class='otorga' style='font-family: Montserrat-Light;padding-top:-40px;'>Por haber aprobado el curso de:</p>
        <p class='nombre-Curso-Min' style='padding-top:-36px;'>{$con['gstTitlo']}</p>
            <p class='nombre-grupo-Min'><span style='color:black;'>Grupo:</span>{$con['grupo']}</p>
            <span class='p-2' style='font-family: Montserrat-Light'>Impartido por el Centro Internacional de Adiestramiento de Aviación Civil, en el marco del Programa de Capacitación de la Autoridad Aeronáutica, del {$con['dia']} de {$con['mesnombre']} al {$con['diafinal']} de {$con['mesfinales']} del presente año, con una duración de {$con['duracion']} hora(s).</span><br>";
       
        if($con['fcurso'] <= '2022-11-30'){ //Jessica Berenice Castañeda Gutierrez 
        echo"<div class='caja'>
        <p style='margin-bottom: -20px;' class='p-2'>Encargada del Despacho del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/directora.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Mtra. Jessica Berenice Castañeda Gutierrez</span><br>
            </div>
        </div>";
        }
        if($con['fcurso'] >= '2022-12-01'){ //Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz
        echo"<div class='caja'>
        <p style='margin-bottom: -20px;' class='p-2'>Director del CIAAC:</p></div>
            <center><img src='../dist/img/firmas/firma_victor_islas1.jpg' style='margin-top:-10px; width:400px; position: absolute; right: 45%;'></center>
        </div>
        <div style='padding-top: 9px; text-align: center;'>
            <div class='row'>
                <div class='column left'>
                </div>
            <div class='column middle'>
                <br><br><br><br><br>
                <span style='font-size: 10px; font-weight: bold; color: #996633;padding-left: -50px;margin-top:-10px' class='p-2'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de
                Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</span><br>
                <span style='font-family: Montserrat-Light;text-align:center' class='p-2'>Gral. Gpo. P.A. D.E.M.A. Ret. Víctor Islas Díaz</span><br>
            </div>
        </div>";
        }
        
        echo"<p class='codigo-curso' style='margin-top:20px;position:absolute'>Código del curso: {$con['codigo']}</p>
        <p class='codigo-curso' style='margin-top:24px;position:absolute; color:gray'>F- CIAAC - CDPPA - 07 – R02</p>
        </div>
        <div style='page-break-before:always;'></div>
     
        <div>
            <p style='font-size:7px; font-weight: bold; color: #996633;position: absolute;padding-top:83%;font-family: Montserrat'>Secretaría de Infraestructura, Comunicaciones y Transportes - Agencia Federal de Aviación Civil– Centro Internacional de Adiestramiento de Aviación Civil / SCT-AFAC-CIAAC</p>
            <p style='font-size:18px;position: absolute;padding-top:82%;left:13%;font-family:Montserrat;'>Lic. Viridiana Montserrat Hernández Piña</p>
            <p style='font-size:18px;position: absolute;padding-top:84%;left:6%;font-family: Montserrat-Light'>Coordinadora de Diseño Pedagógico de Programas Aeronáuticos</p>
            <p style='font-size:18px;position: absolute;padding-top:86%;left:8%;font-family: Montserrat-Light'>Centro Internacional de Adiestramiento de Aviación Civil</p>
            <img src='../dist/img/firmas/Viridiana.jpg' style='bottom: 335px; width: 300px; position: absolute; left: 16%;'>
        </div>";
        
        //----------------------------------FIN AUTOGESTIVO--------------------------------
    }

                ?>
                <div>
                    <?php 
                    $datos = $_GET['data'];
                    $queryTemario = "SELECT idtem, titulo,idcurso FROM temario WHERE idcurso = $idc";
                    $const = mysqli_query($conexion, $queryTemario);
                    $contador = 0;
                    while($consulta2 = mysqli_fetch_array($const)){
                        $contador ++;
                        $temario = $contador."-. ".$consulta2['titulo'];
                        ?>
                        <?php
                        if($con['gstCntnc'] == 'CONSTANCIA1'){
                            echo "<p class='p-2' style='font-size:15px; margin-top:-5px'>{$temario}</p>";
                        }else if($con['gstCntnc'] == 'CERTIFICADO'){
                            echo "<p class='p-2' style='font-size:15px; margin-top:-5px'>{$temario}</p>";
                        }else {
                            echo "";
                        }
                        ?>
                    <?php } ?>
                    <p class="p-3">Promedio de aprovechamiento: <strong><?php echo $EvaluacionF ?> %</strong></p>
                </div>
                <!-- <br><br> -->
                <div class="p-3">
                    <!-- <span>Registrado bajo el No.<?php echo $con['id'];?> a fojas #  del Libro de <br>Control de Constancias, Certificados,<br> Reconocimientos y Diplomas de Capacitación<br> No. 1</span> -->

                    <span class="fecha-emision" style="font-family: Montserrat-Light">Fecha de emisión: <?php echo $hoy ?> </span>
                    <p style='font-size: 18px;text-align:right;padding-top:95% ;position: absolute;margin-left:20%' class='p-2'>Cadena de Seguridad:<?php echo $llave ?></p>
                    <p class='codigo-curso' style='padding-top:93%;position:absolute; color:gray;margin-left:-31%'>F- CIAAC - CDPPA - 07 – R02</p>
                </div>

                <div style="page-break-after:always;"></div>
                <?php
            }
        }    
    }
// require_once 'dompdf/autoload.inc.php';
    require_once '../dist/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4', 'landscape');
    $dompdf->load_html(ob_get_clean());
// $dompdf->set_option('enable_font_subsetting', true);
    $dompdf->render();
    $dompdf->stream('certificados', array("Attachment" => 0));
    $pdf = $dompdf->output();
    $filename = "certificados/certificate-CIAAC.pdf";
    file_put_contents($filename, $pdf);
    $dompdf->stream($filename);
    ?>
</body>

</html>