<?php include ("../../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {

      if($_SESSION['usuario']['privilegios'] == 'ADMINISTRATIVO'){
        $_SESSION['usuario']['privilegios'] = "INSPECTOR";
      }
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "INSPECTOR"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
      $id = $_SESSION['usuario']['id_usu'];
      $usu = $_SESSION['usuario']['usuario'];
      $pass = $_SESSION['usuario']['password'];


      $sql = 
     "SELECT personal.gstIdper,gstNombr,gstApell,gstCargo,gstNmpld FROM personal 
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ";
    $persona = mysqli_query($conexion,$sql);
    $datos = mysqli_fetch_row($persona);

      $datos[1];
      $datos[2];
      $datos[3];


      $sqli = 
     "SELECT gstInstt,gstMpres FROM personal 
       INNER JOIN estudios ON estudios.gstIDper = personal.gstIdper 
      INNER JOIN profesion ON profesion.gstIDper = personal.gstIdper 
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ORDER BY estudios.gstIdstd,profesion.gstIdpro DESC
      ";

      $persona = mysqli_query($conexion,$sql);
      $datos = mysqli_fetch_row($persona);

  
  if (!empty($dato[4]) || !empty($dato[5])) {
      $dato[4];
      $dato[5];
  }else{
      $dato[4]="";
      $dato[5]="";
  }

      $sql2 =
      "SELECT * FROM cursos 
      INNER JOIN listacursos ON gstIdlsc = idmstr  
      WHERE modalidad = 'E-LEARNNING' AND idinsp = $id";
      $query = mysqli_query($conexion,$sql2);
      $datos2 = mysqli_fetch_assoc($query);
  
      $datos[0];
      $sql = "SELECT * FROM listacursos WHERE estado = 0 ORDER BY gstIdlsc asc";
      $cursos = mysqli_query($conexion,$sql);
?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
  <header class="main-header">
    <!-- Logo -->
    <a href="../profile" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 12px"><b>C</b>AFAC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Capacitación AFAC</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->     
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/perfil.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $datos[1].' '.$datos[2]?></span>
            </a>
            <ul class="dropdown-menu" style="width: 50px;min-width: 5px;">
              <!-- User image -->
     
              <!-- Menu Body -->
   
              <!-- Menu Footer-->
       
            
                <div class="pull-right">
                  <a href="../conexion/cerrar_session.php" class="btn btn-primary btn-flat">Cerrar sesión</a>

                </div>
            
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
                <a href="../../conexion/cerrar_session.php">
                        <i class="fa fa-sign-out" title="Cerrrar sesión"></i>
                      
                    </a>
                    <!-- <img href="../../conexion/cerrar_session.php" src="../../dist/img/AFAC.png" ALIGN=RIGHT class="img"
                        alt="User Image" style="width: 60px; cursor: pointer;padding-right:  0.5em; padding-bottom: 0.1em;"> -->
                </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
   
      <!-- search form -->
 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <!--<li class="active treeview">
          <a href="./">
            <i class="fa ion-android-plane"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="./"><i class="fa ion-pie-graph"></i> Dashboard</a></li>
            
          </ul>
        </li>-->

        <li class="active">
          <a href="../inspector">
            <i class="fa ion-android-plane"></i> <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>        
             <?php if( isset($datos2['modalidad']) == "E-LEARNNING"){ ?>
              <li>
              <a href='../e-learnning'>
              <i class='fa fa-internet-explorer'></i> <span>E-learnning</span>
                <span class='pull-right-container'>
                  <small class='label pull-right bg-red'></small>
                  <small class='label pull-right bg-blue'></small>
                </span>
              </a>
            </li>
            <?php }?>
        <li>
          <a href="calendar">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
              <small class="label pull-right bg-blue"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="../history">
            <i class="fa fa-archive"></i> <span>Historial</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
              <small class="label pull-right bg-blue"></small>
            </span>
          </a>
        </li>

        <!--  -->
        
        <!--  -->
        <!--  -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
