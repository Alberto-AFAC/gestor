<?php include ("../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "inspector"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
      $id = $_SESSION['usuario']['id_usu'];
      $sql = 
     "SELECT personal.gstIdper,gstNombr,gstApell,gstCargo,gstInstt,gstMpres FROM personal 
      INNER JOIN estudios ON estudios.gstIDper = personal.gstIdper 
      INNER JOIN profesion ON profesion.gstIDper = personal.gstIdper 
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0 ORDER BY estudios.gstIdstd,profesion.gstIdpro DESC
      ";

      $persona = mysqli_query($conexion,$sql);
      $datos = mysqli_fetch_row($persona);

?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>DI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gestión de inspección</b></span>
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
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><div id="noti"></div></span>
            </a>

 <!-- LOGO DE LA AFAC-->


            <ul class="dropdown-menu">
              <li class="header"><div id="notif"></div></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
<!--                   <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li> -->
                  <li>
                    <a href="#">
                      <div id="confirmar"></div>
                    </a>
                  </li>
<!--                   <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li> -->
<!--                   <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li> -->
<!--                   <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li> -->
                </ul>
              </li>
              <!-- - -->
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/perfil.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $datos[1]?></span>
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
             <img href="#" data-toggle="control-sidebar" src="../dist/img/AFAC.png" ALIGN=RIGHT class="img" alt="User Image" style="cursor: pointer;padding-right:  0.5em;">
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
          <a href="./">
            <i class="fa ion-android-plane"></i> <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>        
        <!-- -->
        <!----> 
        <!--  -->
        <!-- -->
        <li>
          <a href="calendar.php">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
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
