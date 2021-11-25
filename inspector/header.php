<?php include ("../conexion/conexion.php"); session_start();
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

      include("../perfil/index.php");

?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
  
    <?php include('../perfil/notificar.php');?>

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


        <li class="active">
          <a href="inspector">
            <i class="glyphicon glyphicon-user"></i> <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>        
             <?php if( isset($datos2['modalidad']) == "E-LEARNNING"){ ?>
              <li>
              <a href='e-learnning'>
              <i class='fa fa-internet-explorer'></i> <span>E-learnning</span>
                <span class='pull-right-container'>
                  <small class='label pull-right bg-red'></small>
                  <small class='label pull-right bg-blue'></small>
                </span>
              </a>
            </li>
            <?php }?>
        <li>
          <a href="calendar/calendar">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
              <small class="label pull-right bg-blue"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="history">
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
