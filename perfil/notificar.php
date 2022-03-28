

  <header class="main-header">
    <!-- Logo -->

<?php if($_SESSION['usuario']['privilegios'] == 'INSPECTOR'){ ?>
<a href="profile" class="logo">
<?php }else if($_SESSION['usuario']['privilegios'] == "DIRECTOR" || $_SESSION['usuario']['privilegios'] == "DIRECTOR_CIAAC" || $_SESSION['usuario']['privilegios'] == "EJECUTIVO"){ ?>
<a href="director" class="logo">
<?php }else if($_SESSION['usuario']['privilegios'] == "SUPER_ADMIN" || $_SESSION['usuario']['privilegios'] == "ADMINISTRADOR"){ ?>
<a href="inicio" class="logo">  
<?php }else if($_SESSION['usuario']['privilegios'] == 'HUMANOS'){ ?>      
<a href="humanos" class="logo">
<?php }else{ ?>
<a href="inicio" class="logo">
<?php } ?>

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
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i><span class="label label-warning"><div id="noti"></div></span>
            </a>
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
              <?php
              if($datos[1] == 'LEONARDO' || $datos[2] == 'MARTINEZ BAUTISTA'){ ?>
              <img class='user-image' src='../dist/img/profile-leonardoR.jpeg' 
              alt='User profile picture'>
              <?php } else if($datos[1] == 'CARLOS ANTONIO' && $datos[2] == 'RODRIGUEZ MUNGUIA'){ ?>
              <img class='user-image' src='../dist/img/general.jpeg'
              alt='User profile picture'>
              
              <?php } else if($datos[1] == 'JACOB' && $datos[2] == 'GONZALEZ MACIAS'){ ?>
              <img class='user-image' src='../dist/img/JACOB_DDE.png'
              alt='User profile picture'>

              <?php }else{ ?>
                  <img class='user-image' src='../dist/img/perfil.png'
              alt='User profile picture'>


                
                <?php } ?>

              <!-- <img src="../dist/img/perfil.png" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $datos[1].' '.$datos[2]?></span>
            </a>
            <ul class="dropdown-menu" style="width: 50px;min-width: 5px;">           
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

