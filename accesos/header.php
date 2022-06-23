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



  <header class="main-header">
    <!-- Logo -->



<a href="../menu" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 12px"><b>A</b>FAC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ACCESOS AFAC</b></span>
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
            <ul class="dropdown-menu">
              <li class="header"><div id="notif"></div></li>
              <li>
                <ul class="menu">
                  <li id="ocucnfir">
                    <a href="#">
                      <div id="confirmar"></div>
                    </a>
                  </li>
                  <li id="ocuvncr">
                    <a href="#">
                      <div id="notvencer"></div>
                    </a>
                  </li>
                  <li id="ocuvncd">
                    <a href="#">
                      <div id="notvencdo"></div>
                    </a>
                  </li>                  
                  <li id="ocuxvnc">
                    <a href="pendientes">
                      <div id="notxvncer"></div>
                    </a>
                  </li> 
                  <li id="ocucnfrm">
                    <a href="nuevoingreso">
                      <div id="notconfirma"></div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="dropdown notifications-menu">

 

<a style="cursor: pointer;" data-toggle='modal' data-target='#modal-actualizar'>
    <i class="fa fa-lock"></i><span class="label label-warning"></span>
</a> 
</li>         
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <!-- <img src="../dist/img/perfil.png" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $datos[1].' '.$datos[2]?></span>
            </a>
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
            <li class="header"><a href="../menu">Menú principal</a></li>

            <li class="active">
                <a href="./">
                    <i class="glyphicon glyphicon-user"></i> <span>ACCESOS</span>
                    <span class='pull-right-container'>
                    </span>
                </a>
            </li>

         
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

