<!DOCTYPE html><?php 
include ("../conexion/conexion.php");
session_start(); 
unset($_SESSION['consulta']);
if (isset($_SESSION['usuario'])) {

  }else{

      header('Location: ../../');
  }

  $id = $_SESSION['usuario']['id_usu'];
$sql = 
 "SELECT gstIdper,gstAreID,gstNombr,gstApell FROM personal 
INNER JOIN accesos ON id_usu = gstIdper
WHERE personal.gstIdper = '".$id."' && personal.estado = 0";

$persona = mysqli_query($conexion,$sql);
$datos = mysqli_fetch_row($persona);
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Capacitación AFAC | Resultados de importación</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
  <script src="../dist/js/sweetalert2.all.min.js"></script>
  <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="inicio" class="navbar-brand"><b>Capacitación AFAC</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
          

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">0</span>
              </a>
            </li>
           
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                                if($datos[2] == 'LEONARDO' || $datos[3] == 'MARTINEZ BAUTISTA'){
                                    echo "<img class='user-image' src='../../dist/img/profile-leonardoR.jpeg' 
                                    alt='User profile picture'>";
                                } else{
                                    echo "<img class='user-image' src='../dist/img/perfil.png'
                                    alt='User profile picture'>";
                                }
                                ?>
                        <!--  <span class="hidden-xs">ADMINISTRADOR</span> -->
                        <span class="hidden-xs"><?php echo $datos[2].' '.$datos[3]?></span>
                    </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">

                </li>
                <!-- Menu Body -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Resultados de la importación
        </h1>
        <ol class="breadcrumb">
          <li><a href="inicio">Dashboard</a></li>
          <li><a href="persona">lista de personas</a></li>
          <li class="active">Resultados</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
            <table class="table table-striped">
                <tr>
                  <th>PERSONA</th>
                  <th style="width:300px">PROGRESO</th>
                  <th >ESTATUS</th>
                  <th >OBSERVACIONES</th>
                </tr>
                <?php
                require('../conexion/conexion.php');
                    if(isset($_SESSION['usuario']['id_usu'])&&!empty($_SESSION['usuario']['id_usu'])){
                        $id = $_SESSION['usuario']['id_usu'];
                    }
                    $informacion = [];
                //CONDICIONES------------------------------------------------------------------------------    
                $tipo       = $_FILES['dataCliente']['type'];
                $tamanio    = $_FILES['dataCliente']['size'];
                $archivotmp = $_FILES['dataCliente']['tmp_name'];    
                $lineas     = file($archivotmp);
                
                $i = 0;
                
                foreach ($lineas as $linea) {
                    $cantidad_registros = count($lineas);
                    $cantidad_regist_agregados =  ($cantidad_registros - 1);
                
                    if ($i != 0) {
                
                        $datos = explode(",", $linea);
                        $nombre                = !empty($datos[0])  ? ($datos[0]) : '';
                        $apellido              = !empty($datos[1])  ? ($datos[1]) : '';
                        $gstLunac              = !empty($datos[2])  ? ($datos[2]) : '';
                        $gstFenac              = !empty($datos[3])  ? ($datos[3]) : '';
                        $gstSexo               = !empty($datos[4])  ? ($datos[4]) : '';
                        $gstStcvl              = !empty($datos[5])  ? ($datos[5]) : '';
                        $gstCurp               = !empty($datos[6])  ? ($datos[6]) : '';
                        $gstRfc                = !empty($datos[7])  ? ($datos[7]) : '';
                        $gstisst               = !empty($datos[8])  ? ($datos[8]) : '';
                        $gstNpspr1             = !empty($datos[9])  ? ($datos[9]) : '';
                        $gstPsvig              = !empty($datos[10])  ? ($datos[10]) : '';
                        $gstVisa               = !empty($datos[11])  ? ($datos[11]) : '';
                        $gstVignt              = !empty($datos[12])  ? ($datos[12]) : '';
                        $gstCalle              = !empty($datos[13])  ? ($datos[13]) : '';
                        $gstNumro              = !empty($datos[14])  ? ($datos[14]) : '';
                        $gstClnia              = !empty($datos[15])  ? ($datos[15]) : '';
                        $gstCpstl              = !empty($datos[16])  ? ($datos[16]) : '';
                        $gstCiuda              = !empty($datos[17])  ? ($datos[17]) : '';
                        $gstStado              = !empty($datos[18])  ? ($datos[18]) : '';
                        $gstCasa               = !empty($datos[19])  ? ($datos[19]) : '';
                        $gstClulr              = !empty($datos[20])  ? ($datos[20]) : '';
                        $gstExTel              = !empty($datos[21])  ? ($datos[21]) : '';
                        $gstNmpld              = !empty($datos[22])  ? ($datos[22]) : '';
                        $sgtCrhnt              = !empty($datos[23])  ? ($datos[23]) : '';
                        $gstRusp               = !empty($datos[24])  ? ($datos[24]) : '';
                        $gstPlaza              = !empty($datos[25])  ? ($datos[25]) : '';
                        $gstIdpst              = !empty($datos[26])  ? ($datos[26]) : '';
                        $gstPstID              = !empty($datos[27])  ? ($datos[27]) : '';
                        $gstCinst              = !empty($datos[28])  ? ($datos[28]) : '';
                        $gstCorro              = !empty($datos[29])  ? ($datos[29]) : '';
                        $gstSpcID              = !empty($datos[30])  ? ($datos[30]) : '';
                        $gstFeing              = !empty($datos[31])  ? ($datos[31]) : '';
                        $gstAreID              = !empty($datos[32])  ? ($datos[32]) : '';
                        $gstIDara              = !empty($datos[33])  ? ($datos[33]) : '';
                        $gstAcReg              = !empty($datos[34])  ? ($datos[34]) : '';
                        $gstIDSub              = !empty($datos[35])  ? ($datos[35]) : '';
                        $gstNucrt              = !empty($datos[36])  ? ($datos[36]) : '';
                        
                
                if( !empty($nombre) && !empty($apellido) && !empty($gstNmpld) ){
                    $checkemail_duplicidad = ("SELECT gstNombr FROM personal WHERE gstNombr='$nombre' AND gstApell='$apellido' AND gstNmpld='$gstNmpld'");
                    $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
                }   
                
                //No existe Registros Duplicados
                if ( $ca_dupli->num_rows == 0 ) {
                  
                  $insertarData = "INSERT INTO personal VALUES(0,'$nombre','$apellido','$gstLunac','$gstFenac','$gstSexo','$gstStcvl','$gstCurp','$gstRfc','$gstisst','$gstNpspr1','$gstPsvig','$gstVisa','$gstVignt','$gstNucrt','$gstCalle','$gstNumro','$gstClnia','$gstCpstl','$gstCiuda','$gstStado','$gstCasa','$gstClulr','$gstExTel','$gstNmpld','$sgtCrhnt','$gstRusp','$gstPlaza','$gstIdpst','$gstAreID','$gstPstID','$gstSpcID','0','NUEVO INGRESO',0,'$gstIDSub','$gstCorro','$gstCinst','$gstFeing','0000-00-00','$gstIDara','$gstAcReg','78','NO','8','0',0)";
                  mysqli_query($conexion, $insertarData);
                  
                  
                
                  ini_set('date.timezone','America/Mexico_City');
                  $fecha = date('Y').'/'.date('m').'/'.date('d').' '.date('H:i:s'); //fecha de realización
                  //inserta en historia
                  $query = "INSERT INTO historial(id_usu,proceso,registro,fecha) SELECT $id,'INSERTA MASIVAMENTE',concat(`gstNombr`,' ',`gstApell`),'$fecha' FROM personal ORDER BY `gstIdper` DESC LIMIT 1";
                  mysqli_query($conexion,$query);
                  print "
                  <tr>
                    <td>$nombre  $apellido</td>
                    <td>
                      <div class='progress progress-xs progress-striped active'>
                        <div class='progress-bar progress-bar-success' style='width: 100%'></div>
                      </div>
                    </td>
                    <td><span class='badge bg-green'><i class='fa fa-check'></i></span></td>
                    <td>SE IMPORTA DE FORMA CORRECTA</td>
                  </tr>
                ";
                  //echo "<div class='callout callout-success'><h4>$nombre $apellido</h4><p>SE IMPORTAN DE FORMA.</p></div>";
                  
                  //redirecciona
                  //$url ="./implaoyut.php";
                  //$tiempo_espera = 1; // segundos hasta la actualización.
                  //header("refresh: $tiempo_espera; url=$url");
                } 
                
                /**Caso Contrario actualizo el o los Registros ya existentes*/
                else{
                  print "
                  <tr>
                    <td>$nombre  $apellido</td>
                    <td>
                      <div class='progress progress-xs progress-striped active'>
                        <div class='progress-bar progress-bar-danger' style='width: 100%'></div>
                      </div>
                    </td>
                    <td><span class='badge bg-red'><i class='fa fa-times'></i></span></td>
                    <td>VERIFICAR / EL USUARIO YA ESTA INGRESADO</td>
                  </tr>
                ";
                     
                    } 
                    
                }
                
                 $i++;
                }
                
                
                ?>
                </table>
          <!-- /.box-bdedededddddddddddddddddddddddddddody -->
        </div>
        <!-- /.box -->
      </section>

      <div class="col-md-2">
      <a type="button" href="./implaoyut.php" class="btn btn-block btn-primary">REGRESAR</a>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>AFAC &copy; 2021 <a style="color:#3c8dbc"  href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados DDE.
    </div>
    <!-- /.container -->
  </footer>
  <?php include('panel.html');?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->



</body>
</html>
