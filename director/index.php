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
    <link href="css/loader.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Montserrat;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .img-servicios {
            display: block;
            margin: auto;
        }
        
        .card {
            width: 230px;
            height: 320px;
            background: linear-gradient(45deg, #3268fc 0%, #0056c7 100%);
            margin: 40px 30px;
            padding: 5px;
            position: relative;
            transition: 0.5s;
        }
        
        .card:hover {
            transform: translatey(-20px);
        }
        
        .card::before {
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            background: inherit;
            top: 0;
            left: 0;
            filter: blur(30px);
        }
        
        .card:nth-child(1)::before,
        .card:nth-child(1) {
            background: linear-gradient(45deg, #0011ff 0%, #0093b8 100%);
        }
        
        .card:nth-child(2)::before,
        .card:nth-child(2) {
            background: linear-gradient(45deg, #000fda 0%, #007d9c 100%);
        }
        
        .card:nth-child(3)::before,
        .card:nth-child(3) {
            background: linear-gradient(45deg, #1f2eff 0%, #1bd0fd 100%);
        }
        
        .card span {
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            background: rgba(0, 0, 0, 0.5);
            /* pointer-events: none; */
        }
        
        .content {
            background: linear-gradient( 90deg, rgba(255, 255, 255, 0.1) 50%, rgba(0, 0, 0, 0.05) 50%);
            width: 100%;
            height: 100%;
            position: relative;
            /* z-index: 2; */
            color: #fff;
            padding: 40px 20px;
        }
        
        .content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .content p {
            margin-bottom: 20px;
        }
        
        .content a {
            display: inline-block;
            text-decoration: none;
            text-align: center;
            background: #fff;
            color: #121214;
            padding: 10px 5px;
            font-weight: 600;
        }
    </style>
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
                    <img alt="sphere" src="images/afac.png">
                </div>
            </li>
            <li class="layer" data-depth="0.30">
                <div class="hero">
                    <div class="container">
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>GESTOR DE INSPECTORES</h3>
                                <img class="img-servicios" src="images/piloto.svg" width="75%;" alt="piloto"><br><br>
                                <a href="director.php">Iniciar</a>
                            </div>
                        </div>
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>MESA DE AYUDA</h3><br>
                                <img class="img-servicios" src="images/ingenieria.svg" width="75%;" alt="tecnico"><br><br>
                                <a href="#">Iniciar</a>
                            </div>
                        </div>
                        <div class="card">
                            <span></span>
                            <div class="content">
                                <h3>COCODÍ</h3>
                                <img class="img-servicios" src="images/cocodi.svg" width="75%;" alt="tecnico"><br><br>
                                <a href="#">Iniciar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
          <li  data-depth="0.40">
                <div class="depth-1 flake1">
                    <img style="z-index: -9999;" alt="flake" src="images/flakes/depth1/flakes1.png">
                </div>

                  <div class="depth-1 flake2">
                    <img alt="flake" src="images/flakes/depth1/flakes2.png">
                </div>

             <div class="depth-1 flake3">
                    <img alt="flake" src="images/flakes/depth1/flakes3.png">
                </div>

                 <div class="depth-1 flake4">
                    <img alt="flake" src="images/flakes/depth1/flakes4.png">
                </div>
            </li> 

            <li class="" data-depth="0.50">
                <!-- <div class="depth-2 flake1">
                    <img alt="flake" src="images/flakes/depth2/flakes1.png">
                </div> -->

                <div class="depth-2 flake2">
                    <img alt="flake" src="images/flakes/depth2/flakes2.png">
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

            <li class="" data-depth="1.00">
                <div class="depth-5">
                    <img alt="flake" src="images/flakes/depth5/flakes.png">
                </div>
            </li>
        </ul>
    </div>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>