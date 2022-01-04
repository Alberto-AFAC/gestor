<?php include ("../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "DIRECTOR" && $_SESSION['usuario']['privilegios'] != "DIRECTOR_CIAAC" && $_SESSION['usuario']['privilegios'] != "EJECUTIVO"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
// $id = $_SESSION['usuario']['id_usu'];
// $sql = 
// "SELECT gstIdper,gstAreID,gstNombr,gstApell FROM personal 
// INNER JOIN accesos ON id_usu = gstIdper
// WHERE personal.gstIdper = '".$id."' && personal.estado = 0";

// $persona = mysqli_query($conexion,$sql);
// $datos = mysqli_fetch_row($persona);


      $id = $_SESSION['usuario']['id_usu'];
      $usu = $_SESSION['usuario']['usuario'];
      $pass = $_SESSION['usuario']['password'];

      include("../perfil/index.php");

?>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../js/notificacion.js" ></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/cursos.js"></script>
  
  <?php include("../perfil/notificar.php");?>

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

          <li class="active">
          <a href="inspector">        
          <i class="glyphicon glyphicon-user"></i> <span>PERFIL</span>
          <span class='pull-right-container'>
          </span>
          </a>
          </li>

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
           <li><a href="nuevoingreso"><i class="fa ion-document-text"></i> Lista nuevo ingreso</a></li>            
            
            <li><a href="inspecion"><i class="fa ion-document-text"></i> Lista de inspectores</a></li>
    
           <li><a href="persona"><i class="fa ion-document-text"></i> Lista de personal</a></li>
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
            <!-- <li><a href="altacurso.php"><i class="fa ion-ios-plus"></i> Alta de cursos</a></li> -->
            <li><a href="conCursos"><i class="fa fa-search"></i> Catálogos de cursos</a></li>
            <li><a href="programa"><i class="fa ion-compose"></i> Programar curso</a></li>
            <li><a href="lisCurso"><i class="fa ion-compose"></i> Cursos Programados</a></li>
            <li><a href="pronostico"><i class="fa fa-hourglass-half"></i> Pronostico de Cursos</a></li>
            <!-- <li><a href="estadisticas.php"><i class="fa fa-pie-chart"></i> Estadisticas Generales</a></li> -->
            <!-- <li><a href="niveldesatis"><i class="fa fa-line-chart"></i>Nivel de satisfacción</a></li> -->
          </ul>
        </li>
        <?php 
            if($datos[1] == 'LEONARDO' || $datos[2] == 'MARTINEZ BAUTISTA'){
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
            
        <!--  -->
        <!-- -->
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
          <a href="cursosgantt">
          <i class="fa fa-area-chart"></i> <span>Gantt Cursos programados</span>
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
<?php

include('../perfil/actualizar.php');

?>