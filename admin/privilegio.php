<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Asignación de Accesos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
    <script src="dist/js/sweetalert2.all.min.js"></script>
  <link href="dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <style>
	.swal-wide {
        width: 500px !important;
        font-size: 16px !important;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php
include('header.php');
?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content" id="detalles" style="display: none;">
                <div class="row">
                    <?php include('valores.php'); ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <section class="content" id="lista">

<!-- <section class="content-header"> -->
<!--<h1>: Inicio (Dashboard)</h1>-->
<!-- <section class="content">
<div class="row">
<div class="col-md-12">
<ul class="timeline">
<li class="time-label">
<span class="bg-default">
:  Inicio (Dashboard)
</span>
</li>
<li>
<i class="fa fa-user bg-aqua"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i></span>
<h3 class="timeline-header"><a href="#">Personal</a></h3>
<div class="timeline-body"><i class="fa fa-angle-double-right"></i>   Alta de personal 
<br>
<i class="fa fa-angle-double-right"></i>  Alta de personal Externo
<br>
<i class="fa fa-angle-double-right"></i>  Alta de Instructores Externos
<br>
<i class="fa fa-angle-double-right"></i>  Lista de personal
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Asignación de puesto</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Editar Perfiles </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Añadir grado de estudios </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Agregar Experiencia profesional </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Eliminar usuarios </p>
<i class="fa fa-angle-double-right"></i>  Lista inspectores
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Evaluar inspectores</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Consultar apéndice E</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Editar Perfiles </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Añadir grado de estudios </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Agregar Experiencia profesional </p>
<i class="fa fa-angle-double-right"></i>  Lista de instructores
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar perfil </p>
<i class="fa fa-angle-double-right"></i>  Lista de accesos
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar contraseña </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar privilegios </p>
</div>
</div>
</li>
<li>
<i class="fa fa-user bg-blue"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header"><a href="#">Inspector  </a> </h3>
<div class="timeline-body">
<i class="fa fa-angle-double-right"></i>Consulta educación
<br>
<i class="fa fa-angle-double-right"></i>Consulta experiencia laboral 
<br>
<i class="fa fa-angle-double-right"></i>Curso por confirmar 
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Confirmar curso</p>
<i class="fa fa-angle-double-right"></i>  Curso en proceso 
<br>
<i class="fa fa-angle-double-right"></i>  Cursos completados
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Evaluación de reacción</p>
<i class="fa fa-angle-double-right"></i>Cursos declinados
<br>
<i class="fa fa-angle-double-right"></i>Cursos vencidos
<br>
<i class="fa fa-angle-double-right"></i>Historial cursos
<br>
<i class="fa fa-angle-double-right"></i>Cursos Obligatorios
<br>
<i class="fa fa-angle-double-right"></i>OJT
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Alta OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Consulta OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Editar OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Eliminar OJT</p>
<i class="fa fa-angle-double-right"></i>Manual de Usuario
</div>
</div>
</li>            
<li>
<i class="fa ion-easel bg-yellow"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Cursos  </a></h3>
<div class="timeline-body"><i class="fa fa-angle-double-right"></i>   Alta de cursos 
<br>
<i class="fa fa-angle-double-right"></i>  Catálogo de cursos
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Editar cursos</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Añadir temario </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Eliminar cursos </p>
<i class="fa fa-angle-double-right"></i>  Programación de cursos
<br>
<i class="fa fa-angle-double-right"></i>  Cursos programados
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Detalles del cursos</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Agregar participantes</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Eliminar cursos </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Notificar convocatoria </p>
<i class="fa fa-angle-double-right"></i>  Pronóstico de cursos
<br>
<i class="fa fa-angle-double-right"></i>  Nivel de satisfacción
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Modificar ponderación de satisfacción </p>
<i class="fa fa-angle-double-right"></i>   Historial de constancias
</div>
</div>
</li>
<li>
<i class="fa fa-calendar bg-purple"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Calendario  </a></h3>
</div>
</li>
<li>
<i class="fa fa-area-chart bg-maroon"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Gantt  </a></h3>
</div>
</li>
<li>
<i class="fa fa-history bg-silver"></i>
<div class="timeline-item">
<span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Historial y monitoreo de cambios   </a></h3>
</div>
</li>                        
</ul>
</div>
</div>
</section>
</section> -->

                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">PERFILES DE USUARIOS</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="accesos" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <table style="width: 100%;" id="data-table-instructores"
                                    class="table table-striped table-hover"></table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
        </div>

        <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">

            <div class="modal fade" id="editarAccesos" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-size: 20px;" class="modal-title" id="editarAccesosLabel">ACTUALIZAR CREDENCIALES DE ACCESO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idAccesos" name="idAccesos">
                                <input type="hidden" id="idUser" name="idUser">
                                <input type="hidden" id="opcion" name="opcion" value="modificar">
                                <div class="col-sm-6">
                                    <label>NOMBRE COMPLETO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nombUser"
                                        name="nombUser" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>USUARIO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="usuario"
                                        name="usuario">
                                </div>
                                <div class="col-sm-6"><br>
                                    <label>NUMERO DE EMPLEADO</label>
                                    <input type="text" onkeyup="mayus(this);" class="form-control" id="nEmpleado"
                                        name="nEmpleado" disabled="">
                                </div>
                                <div class="col-sm-6"><br>
                                    <label>PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            autocomplete="new-password" minlength="6">
                                        <div class="input-group-addon input-group-append toggle-password">
                                            <i class="fa fa-eye toggle-password">
                                            </i>
                                        </div>
                                    </div>
                                </div>
<div class="col-sm-6"><br>
<label>SELECCIONE PRIVILEGIOS</label>
<select style="width: 100%" class="form-control" class="selectpicker"
name="privilegios" id="privilegios" type="text" data-live-search="true">
<option value="0" selected>SELECCIONE...</option>
<option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
<option value="ADMINISTRADOR">ADMINISTRADOR</option>
<option value="DIRECTOR">DIRECTOR</option>
<option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
<option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
<option value="EJECUTIVO">EJECUTIVO</option>
<option value="INSTRUCTOR">COORDINADOR/INSTRUCTOR</option>
<option value="INSPECTOR">INSPECTOR</option>
<option value="HUMANOS">HUMANOS</option>
</select>
</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" onclick="modificar();" class="btn btn-primary">ACEPTAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




<form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">

<div class="modal fade" id="mostrarPriv" tabindex="-1" role="dialog" aria-labelledby="editarAccesosLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<!-- <h5 style="font-size: 20px;" class="modal-title" id="editarAccesosLabel">PRIVILEGIOS DE ACCESO</h5> -->
<h4 style="float: left;"><span class="bg-default">:  Inicio (Dashboard)</span></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="row">
<div class="col-md-12">
<ul class="timeline">
<!-- <li class="time-label"><span class="bg-default">:  Inicio (Dashboard)</span></li> -->





 
    <!-- jQuery Knob -->
<!-- <div class="box box-solid">
<div class="box-header">
<h3 class="box-title"></h3>

<div class="box-tools pull-center">
<button type="button" title="Indicadores" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
</button>

</div>
</div>
<div class="box-body">
<div class="row">
<p>123333333333333333333333546666666666</p>

<div  class="col-sm-offset-1 col-md-10">
</div>  
</div>
</div>
</div> -->



<!-----------PRIMERA SESSION---------------->


<div class="box box-info" id="personal">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-user bg-aqua"></i> Personal</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
</button>
</div>
</div>


<div class="box-body">
<div class="table-responsive">
<li>
<!-- <i class="fa fa-user bg-aqua"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i></span> -->
<!-- <h3 class="timeline-header"><a href="#">Personal</a></h3> -->
<div class="timeline-body"><i class="fa fa-angle-double-right"></i>   Alta de personal 
<br>
<i class="fa fa-angle-double-right"></i>  Alta de personal Externo
<br>
<i class="fa fa-angle-double-right"></i>  Alta de Instructores Externos
<br>
<i class="fa fa-angle-double-right"></i>  Lista de personal
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Asignación de puesto</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Editar Perfiles </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Añadir grado de estudios </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Agregar Experiencia profesional </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Eliminar usuarios </p>
<i class="fa fa-angle-double-right"></i>  Lista inspectores
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Evaluar inspectores</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Consultar apéndice E</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Editar Perfiles </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Añadir grado de estudios </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Agregar Experiencia profesional </p>
<i class="fa fa-angle-double-right"></i>  Lista de instructores
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar perfil </p>
<i class="fa fa-angle-double-right"></i>  Lista de accesos
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar contraseña </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Editar privilegios </p>
</div>
</div>
</li>
</div>
</div>
</div>




<!-----------SEGUNDA SESSION---------------->
<div class="box box-info" id="inspector">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-user bg-blue"></i> Inspector </h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
</div>
</div>
<div class="box-body">
<div class="table-responsive">

<li>
<!-- <i class="fa fa-user bg-blue"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header"><a href="#">Inspector  </a> </h3> -->
<div class="timeline-body">
<i class="fa fa-angle-double-right"></i>Consulta educación
<br>
<i class="fa fa-angle-double-right"></i>Consulta experiencia laboral 
<br>
<i class="fa fa-angle-double-right"></i>Curso por confirmar 
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Confirmar curso</p>
<i class="fa fa-angle-double-right"></i>  Curso en proceso 
<br>
<i class="fa fa-angle-double-right"></i>  Cursos completados
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Evaluación de reacción</p>
<i class="fa fa-angle-double-right"></i>Cursos declinados
<br>
<i class="fa fa-angle-double-right"></i>Cursos vencidos
<br>
<i class="fa fa-angle-double-right"></i>Historial cursos
<br>
<i class="fa fa-angle-double-right"></i>Cursos Obligatorios
<br>
<i class="fa fa-angle-double-right"></i>OJT
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Alta OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Consulta OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Editar OJT</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Eliminar OJT</p>
<i class="fa fa-angle-double-right"></i>Manual de Usuario
</div>
</div>
</li>   
</div></div></div>


<!-----------TERCERA SESSION---------------->
<div class="box box-info" id="mcursos">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa ion-easel bg-yellow"></i> Cursos</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
</div>
</div>
<div class="box-body">
<div class="table-responsive">

<li>
<!-- <i class="fa ion-easel bg-yellow"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Cursos  </a></h3> -->
<div class="timeline-body"><i class="fa fa-angle-double-right"></i>   Alta de cursos 
<br>
<i class="fa fa-angle-double-right"></i>  Catálogo de cursos
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Editar cursos</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Añadir temario </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>  Eliminar cursos </p>
<i class="fa fa-angle-double-right"></i>  Programación de cursos
<br>
<i class="fa fa-angle-double-right"></i>  Cursos programados
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Detalles del cursos</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Agregar participantes</p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Eliminar cursos </p>
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i> Notificar convocatoria </p>
<i class="fa fa-angle-double-right"></i>  Pronóstico de cursos
<br>
<i class="fa fa-angle-double-right"></i>  Nivel de satisfacción
<p style="padding-left: 3em; margin: 0;border:"><i class="fa fa-angle-right"></i>Modificar ponderación de satisfacción </p>
<i class="fa fa-angle-double-right"></i>   Historial de constancias
</div>
</div>
</li>

</div></div></div>

<!-----------CUARTA SESSION---------------->
<div class="box box-info" id="calendario">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-calendar bg-purple"></i> Calendario </h3>

<div class="box-tools pull-right">
<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button> -->
</div>
</div>
<div class="box-body">
<div class="table-responsive">
<li>
<!-- <i class="fa fa-calendar bg-purple"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Calendario  </a></h3> -->
</div>
</li>
</div></div></div>


<!-----------QUINTA SESSION---------------->
<div class="box box-info" id="gentt">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-area-chart bg-maroon"></i> Gantt</h3>

<div class="box-tools pull-right">
<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button> -->
</div>
</div>
<div class="box-body">
<div class="table-responsive">

<li>
<!-- <i class="fa fa-area-chart bg-maroon"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Gantt  </a></h3> -->
</div>
</li>
</div></div></div>

<!---------------ULTIMA SECCIÓN------------------------>

<div class="box box-info" id="historial">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-history bg-silver"></i> Historial y monitoreo de cambios</h3>

<div class="box-tools pull-right">
<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button> -->
</div>
</div>
<div class="box-body">
<div class="table-responsive">
<li>
<!-- <i class="fa fa-history bg-silver"></i> -->
<div class="timeline-item">
<!-- <span class="time"><i class="fa fa-clock-o"></i> ----</span>
<h3 class="timeline-header no-border"><a href="#">Historial y monitoreo de cambios   </a></h3> -->
</div>
</li>   
</div></div></div>


</ul>
</div>
</div>
<!-- <div class="modal-body">
<div class="form-group">
<input type="hidden" id="idAccesos" name="idAccesos">
<input type="hidden" id="idUser" name="idUser">
<input type="hidden" id="opcion" name="opcion" value="modificar">
<div class="col-sm-6">
<label>NOMBRE COMPLETO</label>
<input type="text" onkeyup="mayus(this);" class="form-control" id="nombUser"
name="nombUser" disabled="">
</div>
<div class="col-sm-6">
<label>USUARIO</label>
<input type="text" onkeyup="mayus(this);" class="form-control" id="usuario"
name="usuario">
</div>
<div class="col-sm-6"><br>
<label>NUMERO DE EMPLEADO</label>
<input type="text" onkeyup="mayus(this);" class="form-control" id="nEmpleado"
name="nEmpleado" disabled="">
</div>
<div class="col-sm-6"><br>
<label>PASSWORD</label>
<div class="input-group">
<input type="password" class="form-control" id="password" name="password"
autocomplete="new-password" minlength="6">
<div class="input-group-addon input-group-append toggle-password">
<i class="fa fa-eye toggle-password">
</i>
</div>
</div>
</div>
<div class="col-sm-6"><br>
<label>SELECCIONE PRIVILEGIOS</label>
<select style="width: 100%" class="form-control" class="selectpicker"
name="privilegios" id="privilegios" type="text" data-live-search="true">
<option value="0" selected>SELECCIONE...</option>
<option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
<option value="ADMINISTRADOR">ADMINISTRADOR</option>
<option value="DIRECTOR">DIRECTOR</option>
<option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
<option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
<option value="EJECUTIVO">EJECUTIVO</option>
<option value="INSTRUCTOR">COORDINADOR/INSTRUCTOR</option>
<option value="INSPECTOR">INSPECTOR</option>
<option value="HUMANOS">HUMANOS</option>
</select>
</div>
</div>
</div> -->
<!-- <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
<button type="button" onclick="modificar();" class="btn btn-primary">ACEPTAR</button>
</div> -->
</div>
</div>
</div>
</form>



        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?php 
                                $query ="SELECT 
                                        *
                                        FROM
                                        controlvers";
                                $resultado = mysqli_query($conexion, $query);

                                $row = mysqli_fetch_assoc($resultado);
                                if(!$resultado) {
                                    var_dump(mysqli_error($conexion));
                                    exit;
                                }
                                ?>
                <?php echo $row['version']?>
            </div>

            <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
            Todos los derechos Reservados DDE
.
        </footer>

        <!-- Control Sidebar -->
        <?php include('panel.html');?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script src="../js/global.js"></script>
    <script src="../js/datos.js"></script>

</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#id_area').select2();
});
</script>
<script src="../js/select2.js"></script>
<script type="text/javascript">
var dataSet = [
    <?php 
$query = "SELECT idpriv,gstNombr,gstApell,n_empleado,perfil,modulo,acceso FROM privilegio
INNER JOIN personal ON n_empleado = gstNmpld";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id = $data['n_empleado'];
$acceso = $data['idpriv']
?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $data[0]?>", "<?php echo $data[1]." ".$data[2]?>", "<?php echo $data[3]?>",
        "<?php echo $data[4]?>", 

 <?php if($data[4]=='ADMINISTRADOR'){ ?>       

        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos({$data[3]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"

<?php } ?>

        ,"<?php echo $data[6]?>",
        "<?php echo "<a title='Editar técnico' onclick='datos_editar({$acceso})' type='button' data-toggle='modal' data-target='#editarAccesos' class='editar btn btn-default'><i class='fa fa-lock text-success'></i></a>"?>"
    ],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-instructores').DataTable({
    responsive: true,


    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [

        {
            title: "ID"
        },
        {
            title: "NOMBRE"
        },
        {
            title: "#EMPLEADO"
        },
        {
            title: "PRIVILEGIOS"
        },
        {
            title: "MÓDULOS"
        },
        {
            title: "ACCESO"
        },
        {
            title: "ACCIÓN"
        }
    ],
});


// FUNCTION PARA EDITAR
function datos_editar(acceso) {

    $("#Editar").slideDown("slow");
    $("#cuadro1").hide("slow");
    $.ajax({
        url: '../php/accesos-list.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_accesos == acceso) {
                var
                    id_usu = $("#editarAccesos #idAccesos").val(obj.data[i].id_accesos),
                    id_usu = $("#editarAccesos #idUser").val(obj.data[i].id_usu),
                    privilg = $("#editarAccesos #nombUser").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell),
                    mEmpleado = $("#editarAccesos #nEmpleado").val(obj.data[i].gstNmpld),
                    password = $("#editarAccesos #password").val(obj.data[i].password),
                    usuario = $("#editarAccesos #usuario").val(obj.data[i].usuario),
                    password = $("#editarAccesos #privilegios").val(obj.data[i].privilegios),
                    opcion = $("#editarAccesos #opcion").val("modificar");
            }
        }
    })
}


// FUNCTION PARA EMOSTRAR DATOS
function mostrar_datos(datos) {

    alert(datos);

    if(datos==1){

        // $("#personal").hide();
        // $("#mcursos").hide();
    }
    // $("#Editar").slideDown("slow");
    // $("#cuadro1").hide("slow");
    $.ajax({
        url: '../php/accesos-list.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_accesos == acceso) {
                




                    // id_usu = $("#editarAccesos #idAccesos").val(obj.data[i].id_accesos),
                    // id_usu = $("#editarAccesos #idUser").val(obj.data[i].id_usu),
                    // privilg = $("#editarAccesos #nombUser").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell),
                    // mEmpleado = $("#editarAccesos #nEmpleado").val(obj.data[i].gstNmpld),
                    // password = $("#editarAccesos #password").val(obj.data[i].password),
                    // usuario = $("#editarAccesos #usuario").val(obj.data[i].usuario),
                    // password = $("#editarAccesos #privilegios").val(obj.data[i].privilegios),
                    // opcion = $("#editarAccesos #opcion").val("modificar");
            }
        }
    })
}

function modificar() {
    //alert("pruebas modificacion")
    var frm = $("#Editar").serialize();
        $.ajax({
            url: "../php/accesos-update.php",
            type: 'POST',
            data: frm + "&opcion=modificar"
        }).done(function(respuesta) {
            if (respuesta == 0) {
                Swal.fire({
                type: 'success',
                text: 'CREDENCIALES ACTUALIZADAS CORRECTAMENTE',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
                    rgba(100, 100, 100, 0.4)
                `
            });
                setTimeout("location.href = 'accesos';", 2000);
            }
        });
}



// SHOW PASSWORD
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
</script>