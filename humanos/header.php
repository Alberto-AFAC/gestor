<?php include ("../conexion/conexion.php"); session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "HUMANOS"){
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

  unset($_SESSION['consulta']);

?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php include("../perfil/notificar.php");?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú</li>

            <li class="active">
                <a href="inspector">
                    <i><img src="../dist/img/perfil.png" class="user-image" alt="User Image" style="
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;"></i> <span>PERFIL</span>
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
                    <li><a href="programa"><i class="fa ion-compose"></i> Programar Curso</a></li>
                    <li><a href="lisCurso"><i class="fa ion-compose"></i> Cursos Programados</a></li>
                    <!-- <li><a href="estadisticas.php"><i class="fa fa-pie-chart"></i> Estadisticas Generales</a></li> -->
                    <li><a href="niveldesatis"><i class="fa fa-line-chart"></i>Nivel de satisfacción</a></li>
                    <!--                         <li><a href="constancias"><i class="fa fa-certificate"></i>Constancias</a></li> -->
                </ul>
            </li>
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