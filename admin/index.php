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
            <li class="layer" data-depth="0.20">
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
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>CAPACITACIÓN AFAC</h3>
                                <img class="img-servicios" src="../models/menu/images/piloto.svg" width="75%;" alt="piloto"><br><br>
                                <a href="inicio">Iniciar</a>
                            </div>
                        </div>
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>MESA DE AYUDA</h3><br>
                                <img class="img-servicios" src="../models/menu/images/ingenieria.svg" width="75%;" alt="tecnico"><br><br>
                                <a href="#">Iniciar</a>
                            </div>
                        </div>
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>COCODI</h3>
                                <img class="img-servicios" src="../models/menu/images/cocodi.svg" width="75%;" alt="tecnico"><br><br>
                                <a href="#">Iniciar</a>
                            </div>
                        </div>

                        <div class="card">
                            <span></span>
                  
                            <div class="content">
                                <h3>COMPETENCIA LINGÜÍSTICA</h3> 
                                <img class="img-servicios" src="../dist/img/linguistica.png" width="75%;" alt="participante"><br><br>
                                <a href="../../linguistica">Iniciar</a>
                     
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
 <!--  
            <li class="layer" data-depth="0.60">
                <div class="depth-3 flake1">
                    <img alt="flake" src="images/flakes/depth3/flakes1.png">
                </div>

                <div class="depth-3 flake2">
                    <img alt="flake" src="images/flakes/depth3/flakes2.png">
                </div>

                <div class="depth-3 flake3">
                    <img alt="flake" src="images/flakes/depth3/flakes3.png">
                </div>

                <div class="depth-3 flake4">
                    <img alt="flake" src="images/flakes/depth3/flakes4.png">
                </div>
            </li> 

             <li class="layer" data-depth="0.80">
                <div class="depth-4">
                    <img alt="flake" src="images/flakes/depth4/flakes.png">
                </div>
            </li>  -->

  <!--           <li class="" data-depth="1.00">
                <div class="depth-5">
                    <img alt="flake" src="../models/menu/images/flakes/depth5/flakes.png">
                </div>
            </li> -->
        </ul>
    </div>
    <script src="../js/menu/js/jquery.js"></script>
    <script src="../js/menu/js/main.js"></script>
</body>

</html>