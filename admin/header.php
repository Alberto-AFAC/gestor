<?php include ("../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "ADMINISTRADOR"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
 
        $id = $_SESSION['usuario']['id_usu'];
      $sql = 
       "SELECT gstIdper,gstAreID,gstNombr,gstApell FROM personal 
      INNER JOIN accesos ON id_usu = gstIdper
      WHERE personal.gstIdper = '".$id."' && personal.estado = 0";

      $persona = mysqli_query($conexion,$sql);
      $datos = mysqli_fetch_row($persona);

      $sql2 =
      "SELECT * FROM cursos WHERE modalidad = 'E-LEARNNING'";
      $query = mysqli_query($conexion,$sql2);
      $datos2 = mysqli_fetch_assoc($query);
  

//session_start(); 
unset($_SESSION['consulta']);

ini_set('date.timezone','America/Mexico_City');
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="font-size: 12px"><b>C-</b>AFAC</span>
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
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">
                            <div id="noti"></div>
                        </span>
                    </a>

                    <!-- LOGO DE LA AFAC-->


                    <ul class="dropdown-menu">
                        <li class="header">
                            <div id="notif"></div>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div id="confirmar"></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="footer"><a href="#">View all</a></li> -->
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                                if($datos[2] == 'LEONARDO' || $datos[3] == 'MARTINEZ BAUTISTA'){
                                    echo "<img class='user-image' src='../dist/img/profile-leonardoR.jpeg' 
                                    alt='User profile picture'>";
                                } else{
                                    echo "<img class='user-image' src='../dist/img/perfil.png'
                                    alt='User profile picture'>";
                                }
                                ?>
                        <!--  <span class="hidden-xs">ADMINISTRADOR</span> -->
                        <span class="hidden-xs"><?php echo $datos[2].' '.$datos[3]?></span>
                    </a>
                    <ul class="dropdown-menu" style="width: 200px;">

                        <!-- Menu Footer-->
                        <li class="user-footer" style="padding: 0; background: #ECF0F5;">
                            <div class="pull-left">

                            </div>
                            <div class="pull-right">
                                <!-- <a href="#" class="btn btn-primary btn-flat">Perfil </a> -->
                                <a href="../conexion/cerrar_session.php" class="btn btn-primary btn-flat">Cerrar
                                    sesión</a>

                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <img href="#" data-toggle="control-sidebar" src="../dist/img/AFAC.png" ALIGN=RIGHT class="img"
                        alt="User Image" style="cursor: pointer;padding-right:  0.5em;">
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
        <!--       <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/perfil.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Angel Canseco</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
        </div>
      </div> -->
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
                    <i class="fa ion-android-plane"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <!-- -->
            <!---->
            <li class="treeview">
                <a href="#">
                    <i class="ion-ios-person"></i>
                    <span> Personal</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="personal"><i class="fa ion-android-person-add"></i> Alta de personal</a></li>
                    <li><a href="persona"><i class="fa ion-document-text"></i> Lista de personal</a></li>
                    <li><a href="inspecion"><i class="fa ion-document-text"></i> Lista de inspectores</a></li>
                    <li><a href="instructor"><i class="fa ion-document-text"></i> Lista de Instructores</a></li>
                    <li><a href="accesos"><i class="fa ion-document-text"></i> Lista de Accesos</a></li>

                    <!--<li><a href=""><i class="fa ion-android-remove"></i>Baja de Inspectores</a></li>
            <li><a href=""><i class="fa ion-document-text"></i>Lista de inspectores</a></li>-->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa ion-easel"></i>
                    <span>Cursos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="altacurso"><i class="fa ion-ios-plus"></i> Alta de cursos</a></li>
                    <li><a href="conCursos"><i class="fa fa-search"></i> Catálogos de cursos</a></li>
                    <li><a href="tareas" style="pointer-events: none;" onclick="return false;"><i class="fa fa-tasks"></i> Catálogos de tareas</a></li>
                    <li><a href="programa"><i class="fa ion-compose"></i> Programar curso</a></li>
                    <li><a href="lisCurso"><i class="fa ion-compose"></i> Cursos Programados</a></li>
                    <!-- <li><a href="estadisticas.php"><i class="fa fa-pie-chart"></i> Estadisticas Generales</a></li> -->
                    <li><a href="niveldesatis"><i class="fa fa-line-chart"></i>Nivel de satisfacción</a></li>
                    <li><a href="constancias"><i class="fa fa-certificate"></i>Constancias</a></li>
                </ul>
            </li>
            <!--  -->
            <!-- -->
            <li>
                <a href="calendar/calendar.php">
                    <i class="fa fa-calendar"></i> <span>Calendario</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        <small class="label pull-right bg-blue"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="cursosgantt">
                    <i class="fa fa-area-chart"></i> <span>Gantt Cursos programados</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        <small class="label pull-right bg-blue"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="soporte">
                    <i class="fa fa-history"></i> <span>Historial de Cambios</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        <small class="label pull-right bg-blue"></small>
                    </span>
                </a>
            </li>
            <!-- <li>
                <a href="soporte">
                    <i class="fa fa-cogs"></i> <span>Ayuda y Soporte</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        <small class="label pull-right bg-blue"></small>
                    </span>
                </a>
            </li> -->

             <?php if( isset($datos2['modalidad']) == "E-LEARNNING"){ ?>
              <li>
              <a href='e-learnning'>
              <i class='fa fa-internet-explorer'></i> <span>e-learnning</span>
                <span class='pull-right-container'>
                  <small class='label pull-right bg-red'></small>
                  <small class='label pull-right bg-blue'></small>
                </span>
              </a>
            </li>
            <?php }?>

            <!-- <li>
          <a href="gantt2.php">
            <i class="fa fa-calendar"></i> <span>Bitacora cursos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
              <small class="label pull-right bg-blue"></small>
            </span>
          </a>
        </li> -->
            <!--  -->

            <!--  -->
            <!--  -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>