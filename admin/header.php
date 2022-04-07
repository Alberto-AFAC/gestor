<?php include ("../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "SUPER_ADMIN" && $_SESSION['usuario']['privilegios'] != "ADMINISTRADOR"){
         //   y se redirecciona al directorio que le corresponde
           header("Location: ../");
           }        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
       // echo $_SESSION['usuario']['privilegios'];


      $id = $_SESSION['usuario']['id_usu'];
      $usu = $_SESSION['usuario']['usuario'];
      $pass = $_SESSION['usuario']['password'];

        include('../perfil/index.php');

      $sql2 =
      "SELECT * FROM cursos WHERE modalidad = 'E-LEARNNING'";
      $query = mysqli_query($conexion,$sql2);
      $datos2 = mysqli_fetch_assoc($query);


    
//session_start(); 
unset($_SESSION['consulta']);

ini_set('date.timezone','America/Mexico_City');
?>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../js/notificacion.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/cursos.js"></script>

<?php include('../perfil/notificar.php'); ?>

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

            <?php  if($datos[1] == 'LEONARDO' || $datos[2] == 'MARTINEZ BAUTISTA'){ ?>
            <li class="active">
                <a href="inspector">
                    <i class="glyphicon glyphicon-user"></i> <span>PERFIL</span>
                    <span class='pull-right-container'>
                    </span>
                </a>
            </li>
            <?php }else{ ?>
            <li class="active">
                <a href="profile">
                    <i class="glyphicon glyphicon-user"></i> <span>PERFIL</span>
                    <span class='pull-right-container'>
                    </span>
                </a>
            </li>
            <?php } ?>

            <li class="treeview">
                <a href="#">
                    <i class="ion-ios-person"></i>
                    <span> Personal</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li id="aaltapersonl1"><a href="personal"><i class="fa ion-android-person-add"></i> Alta de Personal</a></li>


                    <li id="aaltapersonlxtrn1"><a href="Externo"><i class="fa fa-users"></i> Alta de Personal Ext.</a></li>

                    <li id="aaltainstrucxtrn1"><a href="personalExt"><i class="fa fa-users"></i> Alta Instructores Ext.</a></li>

 

                    <li id="alistapersonl1"><a href="persona"><i class="fa ion-document-text"></i> Lista de Personal</a></li>

                    <li id="beditausu1"><a href="personaciaac"><i class="fa ion-document-text"></i> Lista de Personal</a></li>


                    <li id="alistainspctr1" ><a href="inspecion"><i class="fa ion-document-text"></i> Lista de Inspectores</a></li>

                    <li id="bditarinspctr1" ><a href="inspecionciaac"><i class="fa ion-document-text"></i> Lista de Inspectores</a></li>


                    <li id="alistainstc1" ><a href="instructor"><i class="fa ion-document-text"></i> Lista de Instructores</a></li>


                    <?php if($_SESSION['usuario']['privilegios'] == "SUPER_ADMIN"){?>
                    <li><a href="accesos"><i class="fa ion-document-text"></i> Lista de Accesos</a></li>
                    <?php }?>

                     <!-- <li><a href="accesoInstr"><i class="fa ion-document-text"></i> Por definir</a></li> -->

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
                    <!-- <li><a href="tareas" style="pointer-events: none;" onclick="return false;"><i class="fa fa-tasks"></i> Catálogos de tareas</a></li> -->
                    <!-- <li><a href="tareas"><i class="fa fa-tasks"></i> Catálogos de tareas</a></li> -->
                    <li><a href="programa"><i class="fa ion-compose"></i> Programar curso</a></li>
                    <li><a href="lisCurso"><i class="fa ion-compose"></i> Cursos Programados</a></li>
                    <li><a href="pronostico"><i class="fa fa-hourglass-half"></i> Pronostico de Cursos</a></li>
                    <!-- <li><a href="vencidos"><i class="fa ion-easel"></i> Cursos vencidos</a></li> -->
                    <li><a href="seguimiento"><i class="fa ion-easel"></i> Seguimiento y control</a></li>
                    <li><a href="niveldesatis"><i class="fa fa-line-chart"></i>Nivel de satisfacción</a></li>
                    <li><a title="Historial de Constancias, Certificados y Diplomas" href="constancias"><i class="fa fa-certificate"></i>Historial Constancias...</a></li>
                </ul>
            </li>
            <!--  -->
            <!-- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>OJT</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="tareas"><i class="fa fa-file-text"></i> OJT Principal</a></li>
                    <li><a href="proOJT"><i class="fa fa-file-text"></i> Programa OJT</a></li>
                    <!-- <li><a style="pointer-events: none;" onclick="return false;" href="catalogoOJT"><i class="fa fa-file-text"></i> OJT Programados</a></li> -->
                    <li><a href="catalogoOJT"><i class="fa fa-file-text"></i> OJT Programados</a></li>
                    <li><a href="instojt"><i class="fa fa-plus"></i>Alta Coord/Instr OJT</a></li>
                    <li><a href="coorinsoj"><i class="fa fa-file-text"></i>Lista Coord/Instr</a></li>
                </ul>
            </li>
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
            <?php if($_SESSION['usuario']['privilegios'] == "SUPER_ADMIN"){?>
            <li>
                <a href="soporte">
                    <i class="fa fa-history"></i> <span>Historial de Cambios</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        <small class="label pull-right bg-blue"></small>
                    </span>
                </a>
            </li>
  <?php } ?>
            <li>
                <a href="../dist/img/pdf/MANUAL DE USUARIO DE CAPACITACION AFAC.pdf" target="_blank">
                    <i class="fa fa-book"></i> <span>Manual</span>
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
            <!--               <li>
              <a href='e-learnning'>
              <i class='fa fa-internet-explorer'></i> <span>e-learnning</span>
                <span class='pull-right-container'>
                  <small class='label pull-right bg-red'></small>
                  <small class='label pull-right bg-blue'></small>
                </span>
              </a>
            </li> -->
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

<?php

include('../perfil/actualizar.php');

?>

<script type="text/javascript" src="../js/accesos.js"></script>
<script type="text/javascript">
administrador();
</script>

