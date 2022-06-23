<?php
include ("../conexion/conexion.php"); 
session_start();

if (isset($_SESSION['usuario'])) 
    { }else{ header('Location: ../'); }

$id_usu = $_SESSION['usuario']['id_usu'];

//ACCESOS ADMINISTRADORES     
if($_SESSION['usuario']['privilegios'] == "SUPER_ADMIN" || 
  $_SESSION['usuario']['privilegios'] == "ADMINISTRADOR"){
   $acceso = 'admin/inicio';
//COORDINADOR e INSTRUCTOR
}elseif ($_SESSION['usuario']['privilegios'] == "COORDINADOR" ||
    $_SESSION['usuario']['privilegios'] == "INSTRUCTOR") {
    $acceso = 'coordinador/inicio';
//INSPECTOR Y ADMINISTRADOR    
}elseif ($_SESSION['usuario']['privilegios'] == "INSPECTOR" ||
    $_SESSION['usuario']['privilegios'] == "ADMINISTRATIVO") {
    $acceso = 'inspector/profile';
//DIRECTOR, DIRECTOR_CIAAC Y EJECUTIVO
}elseif ($_SESSION['usuario']['privilegios'] == "DIRECTOR" ||
    $_SESSION['usuario']['privilegios'] == "DIRECTOR_CIAAC" || $_SESSION['usuario']['privilegios'] == "EJECUTIVO") {
    $acceso = 'director/director';
//HUMANOS    
}elseif ($_SESSION['usuario']['privilegios'] == "HUMANOS") {
    $acceso = 'humanos/humanos';
}
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>

    <meta charset="utf-8">
    <title>
        Dashboard
    </title>
    
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="images/afac.png" rel="shortcut icon" type="image/png">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'>
    <link href="../models/menu/css/loader.css" rel="stylesheet" type="text/css">
    <link href="../models/menu/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../models/menu/css/font-awesome.min.css">
    <link href="../models/menu/css/style.css" rel="stylesheet" type="text/css">
    <link href="../models/menu/css/cards.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
</head>

<body>
    <div class="preloader">
        <div class="loading">
            <h2>
                Cargando...
            </h2>
            <span class="progress"></span>
        </div>
    </div>


    <div class="wrapper">
        <ul class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" id="scene">
            <li class="layer" data-depth="0.00">
            </li>
            <li class="layer" data-depth="0.10">
                <div class="background">
                </div>
            </li>
            <li id="tema" class="layer" data-depth="0.20">
                <div class="title">
                    <h3 style="color: black; font-size: 24px;">
                        AGENCIA FEDERAL DE AVIACIÓN CIVIL
                    </h3>
                    <span class="line"></span>
                </div>
            </li>

            <li class="layer" data-depth="0.25">
                <div class="sphere">
                    <img alt="sphere" src="../models/menu/images/afac.png">
                </div>
            </li>
            <li class="layer" data-depth="0.30">
                <div class="hero">
                    <div class="container">
                        <div class="card" id="gestor">
                            <span></span>
                            <div class="content">
                                <h3>CAPACITACIÓN AFAC</h3>
                                <img class="img-servicios" src="../models/menu/images/piloto.svg" width="75%;" alt="piloto"><br><br>
                                <a href="../<?php echo $acceso ?>">Iniciar</a>
                            </div>
                        </div>
                        <div class="card" id="mesa">
                            <span></span>
                            <div class="content">
                                <h3>MESA DE AYUDA</h3><br>
                                <img class="img-servicios" src="../models/menu/images/ingenieria.svg" width="75%;" alt="tecnico"><br><br>
                                <a href="../../Mesa-Ayuda/php/acceso.php">Iniciar</a>
                          <!--       <button onclick="acceso(<?php echo $id_usu ?>);">BUTON</button> -->
                            </div>
                        </div>

                        <div class="card" id="linguistica">
                            <span></span>
                  
                            <div class="content">
                                <h3>COMPETENCIA LINGÜÍSTICA</h3> 
                                <img class="img-servicios" src="../dist/img/linguistica.png" width="75%;" alt="participante"><br><br>
                                <a href="../../linguistica">Iniciar</a>
                     
                            </div>
                        </div>

                        <div class="card" id="accesos">
                            <span></span>
                            <div class="content">
                                <h3>ACCESOS</h3> 
                                <img class="img-servicios" src="../dist/img/accesos.png" width="75%;" alt="ACCESO"><br><br>
                                <a href="../accesos/">Iniciar</a>                    
                            </div>
                        </div>     

                        
                        <div class="card" style="background: silver" id="detyca">
                            <span></span>
                            <div class="content">
                                <h3>DETyCA</h3>
                                <img class="img-servicios" src="../models/menu/images/cocodi.svg" width="75%;" alt="tecnico"><br><br>
                                <!-- <a href="#">Iniciar</a> -->
                            </div>
                        </div>                          

                    </div>
                </div>
            </li>
          <li  data-depth="0.40">
                <div class="depth-1 flake1">
                    <img style="z-index: -9999;" alt="flake" src="../models/menu/images/flakes/depth1/flakes1.png">
                </div>

                  <div class="depth-1 flake2">
                    <img alt="flake" src="../models/menu/images/flakes/depth1/flakes2.png">
                </div>

             <div class="depth-1 flake3">
                    <img alt="flake" src="../models/menu/images/flakes/depth1/flakes3.png">
                </div>

                 <div class="depth-1 flake4">
                    <img alt="flake" src="../models/menu/images/flakes/depth1/flakes4.png">
                </div>
            </li> 

            <li class="" data-depth="0.50">
                <!-- <div class="depth-2 flake1">
                    <img alt="flake" src="images/flakes/depth2/flakes1.png">
                </div> -->

                <div class="depth-2 flake2">
                    <img alt="flake" src="../models/menu/images/flakes/depth2/flakes2.png">
                </div>
            </li>
 
        </ul>
    </div>

    <input type="text" name="id_usua" id="id_usua" value="<?php echo $id_usu ?>">

    <script src="../js/menu/js/jquery.js"></script>
    <script src="../js/menu/js/main.js"></script>

    <script src="../../Mesa-Ayuda/val/acceso.js"></script>

</body>

</html>

<script type="text/javascript">
    

var datos = document.getElementById('id_usua').value;
    
$.ajax({
    url: '../php/control-accesos.php',
    type: 'POST',
    data: 'datos='+datos
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    for (i = 0; i < res.length; i++) {

         // alert(obj.data[i].privi_mesa);

        if(obj.data[i].privi_gestor=='SUPER_ADMIN'){

            $("#gestor").show();
            $("#mesa").show();
            $("#accesos").show();
            $("#detyca").show();

        }else{
            $("#accesos").hide();            
            $("#detyca").hide();
        }

        if(obj.data[i].privi_lingui==0){
            $("#linguistica").hide();
        }else{
            $("#linguistica").show();
        }

    }
})

</script>