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
          $priv = $_SESSION['usuario']['privilegios'];

      include("../perfil/index.php");

?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../dist/css/contra.css">
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

            <?php 
            if($datos[1] == 'MIRIAM' || $datos[2] == 'CALDERON VAZQUEZ' || $datos[1] == 'GUSTAVO' || $datos[2] == 'FELIPE ROSALINO' || $datos[1] == 'DIEGO ISAAC' || $datos[2] == 'RIVERA OCHOA'){
                echo "<li class='treeview'>
                <a href='#'>
                    <i class='fa fa-file-text'></i>
                    <span>OJT</span>
                    <span class='pull-right-container'>
                        <i class='fa fa-angle-left pull-right'></i>
                    </span>
                </a>
                <ul class='treeview-menu'>
                    <li><a href='tareas'><i class='fa fa-file-text'></i> OJT Principal</a></li>
                    <li><a href='proOJT'><i class='fa fa-file-text'></i> Programa OJT</a></li>
                    <li><a style='pointer-events: none;' onclick='return false;' href='catalogoOJT'><i class='fa fa-file-text'></i> OJT Programados</a></li>
                </ul>
            </li>
            ";
            }else{
                echo "";
            }
            ?>
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

<?php if(
$datos[4] == 6370777 || $datos[4] == 6470394 || $datos[4] == 7132490 || $datos[4] == 7131237 || $datos[4] == 3100869 || $datos[4] == 7132075 || $datos[4] == 3100789 || $datos[4] == 7137630 || $datos[4] == 7134065 || $datos[4] == 6420278 || $datos[4] == 7141460 || $datos[4] == 7141551 || $datos[4] == 7134248 || $datos[4] == 7141776 || $datos[4] == 3100516 || $datos[4]== 7135352){ ?>
      <li>
      <a href="inspecion">
      <i class="fa fa-users"></i> <span>Lista de inspectores</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"></small>
      <small class="label pull-right bg-blue"></small>
      </span>
      </a>
      </li>
<?php } ?>

        <!--  -->
        
        <!--  -->
        <!--  -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php

include('../perfil/actualizar.php');

?>