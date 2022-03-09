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
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">ASIGNACIÓN DE ACCESOS</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="accesos" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>


                            <div class="box-body">
                                <table style="width: 100%;" id="data-table-instructores"
                                    class="table table-striped table-hover"></table>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
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


<form>

    <input type="hidden" name="nemp" id="nemp">

</form>

</div>

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li id="1"><a href="#primera" onclick="uno()" data-toggle="tab">PERSONAL</a></li>
              <li id="2"><a href="#segunda" onclick="dos()" data-toggle="tab">INSPECTOR</a></li>
              <li id="3"><a href="#tercera" onclick="tre()" data-toggle="tab">CURSO</a></li>
              <li id="4"><a href="#cuarto"  onclick="cua()" data-toggle="tab">APARTADOS</a></li>
            </ul>
            <div class="tab-content">
              <div id="primera" >
                <!-- Post -->
              <div class="box box-info">
 
            <!-- /.box-header -->
            <div class="box-body" id="uno">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Personal</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td colspan="2"><li>Alta de personal</li></td>
                   <td>
                        <span id="aaltapersonl" class="label label-success"><a href="#" onclick="accesosg('baltapersonl*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>                     
                        <span id="baltapersonl" class="label label-warning"><a href="#" onclick="accesosg('aaltapersonl*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td  colspan="2"><li>Alta de personal Externo</li></td>
                   <td>
                        <span id="aaltapersonlxtrn" class="label label-success"><a href="#" onclick="accesosg('baltapersonlxtrn*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="baltapersonlxtrn" class="label label-warning"><a href="#" onclick="accesosg('aaltapersonlxtrn*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><li>Alta de Instructores Externos</li></td>
                   <td>
                        <span id="aaltainstrucxtrn" class="label label-success"><a href="#" onclick="accesosg('baltainstrucxtrn*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="baltainstrucxtrn" class="label label-warning"><a href="#" onclick="accesosg('aaltainstrucxtrn*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><li>Lista de personal</li></td>
                   <td>
                        <span id="alistapersonl" class="label label-success"><a href="#" onclick="accesosg('blistapersonl*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="blistapersonl" class="label label-warning"><a href="#" onclick="accesosg('alistapersonl*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">  > Asignación de puesto</td>
                   <td>
                        <span id="aasigpuesto" class="label label-success"><a href="#" onclick="accesosg('basigpuesto*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="basigpuesto" class="label label-warning"><a href="#" onclick="accesosg('aasigpuesto*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Editar Perfiles  </td>
                   <td>
                        <span id="aeditausu" class="label label-success"><a href="#" onclick="accesosg('beditausu*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="beditausu" class="label label-warning"><a href="#" onclick="accesosg('aeditausu*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Añadir grado de estudios  </td>
                    <td>
                        <span id="aanadestudio" class="label label-success"><a href="#" onclick="accesosg('banadestudio*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="banadestudio" class="label label-warning"><a href="#" onclick="accesosg('aanadestudio*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Asignación de puesto </td>
                    <td>
                        <span id="aasignapuesto" class="label label-success"><a href="#" onclick="accesosg('basignapuesto*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="basignapuesto" class="label label-warning"><a href="#" onclick="accesosg('aasignapuesto*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Eliminar usuarios </td>
                    <td>
                        <span id="aeliminausu" class="label label-success"><a href="#" onclick="accesosg('beliminausu*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="beliminausu" class="label label-warning"><a href="#" onclick="accesosg('aeliminausu*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><li>Lista inspectores</li></td>
                    <td>
                        <span id="alistainspctr" class="label label-success"><a href="#" onclick="accesosg('blistainspctr*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="blistainspctr" class="label label-warning"><a href="#" onclick="accesosg('alistainspctr*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">  > Evaluar inspectores</td>
                    <td>
                        <span id="aevalinspctor" class="label label-success"><a href="#" onclick="accesosg('bevalinspctor*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bevalinspctor" class="label label-warning"><a href="#" onclick="accesosg('aevalinspctor*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Consultar apéndice E </td>
                    <td>
                        <span id="aapendice" class="label label-success"><a href="#" onclick="accesosg('bapendice*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bapendice" class="label label-warning"><a href="#" onclick="accesosg('aapendice*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Editar Perfiles </td>
                    <td>
                        <span id="aditarinspctr" class="label label-success"><a href="#" onclick="accesosg('bditarinspctr*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bditarinspctr" class="label label-warning"><a href="#" onclick="accesosg('aditarinspctr*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Añadir grado de estudios </td>
                    <td>
                        <span id="agradostudio" class="label label-success"><a href="#" onclick="accesosg('bgradostudio*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bgradostudio" class="label label-warning"><a href="#" onclick="accesosg('agradostudio*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> > Agregar Experiencia profesional </td>
                    <td>
                        <span id="axperienciapro" class="label label-success"><a href="#" onclick="accesosg('bxperienciapro*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bxperienciapro" class="label label-warning"><a href="#" onclick="accesosg('axperienciapro*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><li>Lista de instructores</li></td>
                    <td>
                        <span id="alistainstc" class="label label-success"><a href="#" onclick="accesosg('blistainstc*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="blistainstc" class="label label-warning"><a href="#" onclick="accesosg('alistainstc*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> >  Editar perfil  </td>
                    <td>
                        <span id="aeditaprfil1" class="label label-success"><a href="#" onclick="accesosg('beditaprfil1*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="beditaprfil1" class="label label-warning"><a href="#" onclick="accesosg('aeditaprfil1*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr >
                    <td colspan="2"><li>Lista de accesos</li></td>
                    <td>
                        <span id="aacceso1" class="label label-success"><a href="#" onclick="accesosg('bacceso1*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bacceso1" class="label label-warning"><a href="#" onclick="accesosg('aacceso1*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>                    
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"> >  Editar contraseña  </td>
                    <td>
                        <span id="aacceso2" class="label label-success"><a href="#" onclick="accesosg('bacceso2*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bacceso2" class="label label-warning"><a href="#" onclick="accesosg('aacceso2*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> >  Editar privilegios  </td>
                    <td>
                        <span id="aacceso3" class="label label-success"><a href="#" onclick="accesosg('bacceso3*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bacceso3" class="label label-warning"><a href="#" onclick="accesosg('aacceso3*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>                      
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
<!--             <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
                <!-- /.post -->
                <!-- Post -->  
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div id="segunda">
                <!-- The timeline -->
             
                  <!-- timeline time label -->
                  <div class="box box-info" id="dos">
                   <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Inspector</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td colspan="2"><li>Consulta educación</li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td  colspan="2"><li>Consulta experiencia laboral</li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Curso por confirmar</li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">  > Confirmar curso</td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Curso en proceso </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Cursos completados </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2">  > Evaluación de reacción</td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Cursos declinados </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>


                  <tr>
                    <td colspan="2"><li>Cursos vencidos </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Historial cursos </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>                  

                  <tr>
                    <td colspan="2"><li>Cursos Obligatorios </li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>OJT INDIVIDUAL</li></td>
                    <td><span class="label label-default" style="color:green;" >ACCESO</span></td>
                    <td></td>
                  </tr>
<!-- 
<td>
<span id="agradostudio" class="label label-success"><a href="#" onclick="accesosg('agradostudio*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
<span id="bgradostudio" class="label label-warning"><a href="#" onclick="accesosg('bgradostudio*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
</td> -->

                  <tr>
                    <td colspan="2"><button type="button" onclick="conteiner()" style="float: left;"> + </button> <li style="list-style: none;"> OJT MASIVO</li></td>
<!--                     <td>
                        <span id="aojt" class="label label-success"><a href="#" onclick="accesosg('bojt*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bojt" class="label label-warning"><a href="#" onclick="accesosg('aojt*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td> -->

                    <td>
                        <span id="aojtalt" class="label label-success"><a href="#" onclick="accesosg('bojtalt*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bojtalt" class="label label-warning"><a href="#" onclick="accesosg('aojtalt*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
               
                  <tr>
                  
                  <tr><td><p id="conteiner" style="display: none; margin-left: 1em;">
                      > Consulta OJT <br>
                      > Alta OJT<br>
                      > Editar OJT<br>
                      > Eliminar OJT
                  </p></td></tr>




<!--                     <td colspan="2"> >  Alta OJT  </td>
                    <td>
                        <span id="aojtalt" class="label label-success"><a href="#" onclick="accesosg('bojtalt*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bojtalt" class="label label-warning"><a href="#" onclick="accesosg('aojtalt*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td> 

                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> > Consulta OJT</td>
                    <td>
                    <span id="aojtcons" class="label label-success"><a href="#" onclick="accesosg('bojtcons*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>

                    <span id="bojtcons" class="label label-warning"><a href="#" onclick="accesosg('aojtcons*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> > Editar OJT  </td>
                    <td>
                    <span id="aojtedit" class="label label-success"><a href="#" onclick="accesosg('bojtedit*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                    <span id="bojtedit" class="label label-warning"><a href="#" onclick="accesosg('aojtedit*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> > Eliminar OJT  </td>
                    <td>
                        <span id="aojtelim" class="label label-success"><a href="#" onclick="accesosg('bojtelim*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bojtelim" class="label label-warning"><a href="#" onclick="accesosg('aojtelim*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
 -->










                   </tr>                      
   
                  <tr>
                    <td colspan="2"><li>Manual de Usuario </li></td>
                    <td><span class="label label-default" style="color:green;">ACCESO</span></td>
                    <td></td>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
     </div>

                
              </div>

              <!-- /.tab-pane -->

             <div id="tercera">
          
          <div class="box box-info" id="tres">
             <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Curso</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td colspan="2"><li>Alta de cursos </li></td>
                    <td>
                        <span id="altacurso" class="label label-success"><a href="#" onclick="accesosg('bltacurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bltacurso" class="label label-warning"><a href="#" onclick="accesosg('altacurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td  colspan="2"><li>Catálogo de cursos</li></td>
                    <td>
                        <span id="acatalogo" class="label label-success"><a href="#" onclick="accesosg('bcatalogo*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bcatalogo" class="label label-warning"><a href="#" onclick="accesosg('acatalogo*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> > Editar cursos </td>
                    <td>
                        <span id="aeditacurso" class="label label-success"><a href="#" onclick="accesosg('beditacurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="beditacurso" class="label label-warning"><a href="#" onclick="accesosg('aeditacurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">  > Añadir temario</td>
                    <td>
                        <span id="aguartmario" class="label label-success"><a href="#" onclick="accesosg('bguartmario*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bguartmario" class="label label-warning"><a href="#" onclick="accesosg('aguartmario*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">  > Eliminar cursos</td>
                    <td>
                        <span id="aeliminacurso" class="label label-success"><a href="#" onclick="accesosg('beliminacurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="beliminacurso" class="label label-warning"><a href="#" onclick="accesosg('aeliminacurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>


                  <tr>
                    <td colspan="2"><li>Programación de cursos </li></td>
                    <td>
                        <span id="aprocurso" class="label label-success"><a href="#" onclick="accesosg('bprocurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bprocurso" class="label label-warning"><a href="#" onclick="accesosg('aprocurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>


                  <tr>
                    <td colspan="2"><li>Cursos programados </li></td>
                    <td>
                        <span id="aprogramados" class="label label-success"><a href="#" onclick="accesosg('bprogramados*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bprogramados" class="label label-warning"><a href="#" onclick="accesosg('aprogramados*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2">  > Detalles del curso</td>
                    <td>
                        <span id="adetallecurso" class="label label-success"><a href="#" onclick="accesosg('bdetallecurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bdetallecurso" class="label label-warning"><a href="#" onclick="accesosg('adetallecurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>


                  <tr>
                    <td colspan="2">  > Agregar participantes</td>
                    <td>
                        <span id="aagregapartici" class="label label-success"><a href="#" onclick="accesosg('bagregapartici*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bagregapartici" class="label label-warning"><a href="#" onclick="accesosg('aagregapartici*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2">  > Eliminar cursos</td>
                     <td>
                        <span id="aelimincurso" class="label label-success"><a href="#" onclick="accesosg('belimincurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="belimincurso" class="label label-warning"><a href="#" onclick="accesosg('aelimincurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2">  > Notificar convocatoria</td>
                    <td>
                        <span id="anotconvocat" class="label label-success"><a href="#" onclick="accesosg('bnotconvocat*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bnotconvocat" class="label label-warning"><a href="#" onclick="accesosg('anotconvocat*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                 <tr>
                    <td colspan="2"><li>Pronóstico de cursos </li></td>
                    <td>
                        <span id="apronostcurso" class="label label-success"><a href="#" onclick="accesosg('bpronostcurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bpronostcurso" class="label label-warning"><a href="#" onclick="accesosg('apronostcurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"><li>Nivel de satisfacción </li></td>
                    <td>
                        <span id="anivelsatisf" class="label label-success"><a href="#" onclick="accesosg('bnivelsatisf*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bnivelsatisf" class="label label-warning"><a href="#" onclick="accesosg('anivelsatisf*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> > Modificar ponderación de satisfacción</td>
                    <td>
                        <span id="amodifipondersat" class="label label-success"><a href="#" onclick="accesosg('bmodifipondersat*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bmodifipondersat" class="label label-warning"><a href="#" onclick="accesosg('amodifipondersat*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>                  

                  <tr>
                    <td colspan="2"><li>Historial de constancias </li></td>
                    <td>
                        <span id="ahistoriaconstanc" class="label label-success"><a href="#" onclick="accesosg('bhistoriaconstanc*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bhistoriaconstanc" class="label label-warning"><a href="#" onclick="accesosg('ahistoriaconstanc*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
        </div>



<!--                     <td>
                        <span id="aojtelim" class="label label-success"><a href="#" onclick="accesosg('bojtelim*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bojtelim" class="label label-warning"><a href="#" onclick="accesosg('aojtelim*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td> -->




              </div>
             <div id="cuarto">

            <div class="box box-info" id="otro">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>OTROS APARTADDOS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td colspan="2"><li>Calendario </li></td>
                    <td>
                        <span id="acalendario" class="label label-success"><a href="#" onclick="accesosg('bcalendario*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        
                        <span id="bcalendario" class="label label-warning"><a href="#" onclick="accesosg('acalendario*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td  colspan="2"><li>Gantt </li></td>
                    <td>
                        <span id="agantt" class="label label-success"><a href="#" onclick="accesosg('bgantt*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bgantt" class="label label-warning"><a href="#" onclick="accesosg('agantt*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2"> <li> Historial y monitoreo de cambios </li></td>
                    <td>
                        <span id="amonitoreo" class="label label-success"><a href="#" onclick="accesosg('bmonitoreo*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                        <span id="bmonitoreo" class="label label-warning"><a href="#" onclick="accesosg('amonitoreo*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                    </td>
                    <td></td>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            </div>


              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

</div>
</div>
</div>
</form>

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
$query = "SELECT * FROM accesos
INNER JOIN personal ON id_usu = gstIdper";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

$id = $data['id_usu'];
$acceso = $data['id_accesos']
?>



// 1 SUPER_ADMIN
// 2 ADMINISTRADOR
// 3 EJECUTIVO
// 4 DIRECTOR
// 5 HUMANOS
// 6 ADMINISTRATIVO
// 7 INSPECTOR
// 8 INSTRUCTOR
// 9 NUEVO INGRESO


    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $data[1]?>", "<?php echo $data[9]." ".$data[10]?>", "<?php echo $data[32]?>",
        "<?php echo $data[2]?>", "<?php echo $data[4]?>",

        <?php if($data[4]=='SUPER_ADMIN'){ ?>       
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(1.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='ADMINISTRADOR'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(2.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='EJECUTIVO'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(3.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='DIRECTOR'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(4.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='HUMANOS'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(5.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='ADMINISTRATIVO'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(6.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='INSPECTOR'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(7.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='INSTRUCTOR'){ ?>    
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(8.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php }else if($data[4]=='NUEVO INGRESO'){ ?>
        "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(9.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
        <?php } ?>
        ,
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
            title: "# EMPLEADO"
        },
        {
            title: "USUARIO"
        },

        {
            title: "PRIVILEGIOS"
        },
        {
            title: "MODULOS"
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

function conteiner(){

    $("#conteiner").toggle();
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


$("#bacceso1").hide();
$("#aacceso1").hide();
$("#bacceso2").hide();
$("#aacceso2").hide();
$("#bacceso3").hide();
$("#aacceso3").hide();

$("#aeditaprfil1").hide();
$("#beditaprfil1").hide();

function uno(){
    $("#primera").show();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").hide();

}
function dos(){
    $("#primera").hide();
    $("#segunda").show();
    $("#tercera").hide();
    $("#cuarto").hide();
}
function tre(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").show();
    $("#cuarto").hide();    
}
function cua(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").show();
}

function accesosg(v){
     text = v.toString();
     nemp = document.getElementById('nemp').value;
     accesos = text.split("*")[0];
     perfil = text.split("*")[1];

    str = accesos;
    acces = str.slice(1)
    activo = str.substring(-1,1);
    if(activo=='a'){

    $("#"+activo+acces+"").show();
    acceso = 'b'+acces;
    $("#"+acceso+"").hide();

    }else 
    if(activo=='b'){
    $("#"+activo+acces+"").show();
    acceso = 'a'+acces;
    $("#"+acceso+"").hide();
    }

    // alert(accesos);
    $.ajax({
    url: "../php/privilegio-update.php",
    type: 'POST',
    data: 'nemp=' + nemp + '&perfil=' + perfil + '&accesos=' + accesos + "&opcion=modificar"
    }).done(function(respuesta) {

        //alert(respuesta);
    if (respuesta == 0) {
    // Swal.fire({
    // type: 'success',
    // text: 'CREDENCIALES ACTUALIZADAS CORRECTAMENTE',
    // showConfirmButton: false,
    // customClass: 'swal-wide',
    // timer: 2000,
    // backdrop: `
    // rgba(100, 100, 100, 0.4)
    // `
    // });
    // setTimeout("location.href = 'accesos';", 2000);
    }
    });

}

// FUNCTION PARA EMOSTRAR DATOS
function mostrar_datos(datos) {

     num = datos;
     text = num.toString();
     privilegio = text.split(".", 1);

        dato = text.split(".")[1]; 
        numeroPalabras = dato.length;
        if(numeroPalabras==6){            
        $("#nemp").val(dato+0);
        }else{
        $("#nemp").val(dato);
        }
    
// 1 SUPER_ADMIN
// 2 ADMINISTRADOR
// 3 EJECUTIVO
// 4 DIRECTOR
// 5 HUMANOS
// 6 ADMINISTRATIVO
// 7 INSPECTOR
// 8 INSTRUCTOR
// 9 NUEVO INGRESO
    
if(privilegio==1){
    // $("#uno").show();

//Alta de personal
    $("#aaltapersonl").show();
    $("#baltapersonl").hide();

//Alta de personal Externo
    $("#aaltapersonlxtrn").show();
    $("#baltapersonlxtrn").hide();

    //Alta de Instructores Externos
    $("#aaltainstrucxtrn").show();
    $("#baltainstrucxtrn").hide();

//Lista de personal
    $("#alistapersonl").show();
    $("#blistapersonl").hide();

//Asignación de puesto
    $("#aasigpuesto").show();
    $("#basigpuesto").hide();

//Editar Perfiles
    $("#aeditausu").show();
    $("#beditausu").hide();

    //Añadir grado de estudios 
    $("#aanadestudio").show();
    $("#banadestudio").hide();

//Asignación de puesto
    $("#aasignapuesto").show();
    $("#basignapuesto").hide();

//Eliminar usuarios
    $("#aeliminausu").show();
    $("#beliminausu").hide();

//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();

//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();

//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();

//Editar Perfiles
    $("#aditarinspctr").show();
    $("#bditarinspctr").hide();

//Añadir grado de estudios
    $("#agradostudio").show();
    $("#bgradostudio").hide();

    //Agregar Experiencia profesional
    $("#axperienciapro").show();
    $("#bxperienciapro").hide();

//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();

//EDITAR PERDIL
        $("#aeditaprfil1").show();
        $("#beditaprfil1").hide();    
//PERSONAL ACCESOS
        $("#bacceso1").hide();
        $("#bacceso2").hide();
        $("#bacceso3").hide();

        $("#aacceso1").show();
        $("#aacceso2").show();
        $("#aacceso3").show();
    
//CURSO
    //Alta de cursos
    $("#altacurso").show();
    $("#bltacurso").hide();
    //Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
    //Editar cursos
    $("#aeditacurso").show();
    $("#beditacurso").hide();
    //Añadir temario
    $("#aguartmario").show();
    $("#bguartmario").hide();
    //Eliminar cursos
    $("#aeliminacurso").show();
    $("#beliminacurso").hide();
    //Programación de cursos
    $("#aprocurso").show();
    $("#bprocurso").hide();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
    //Agregar participantes
    $("#aagregapartici").show();
    $("#bagregapartici").hide();
    //Eliminar cursos
    $("#aelimincurso").show();
    $("#belimincurso").hide();
    //Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
    //Pronóstico de cursos
    $("#apronostcurso").show();
    $("#bpronostcurso").hide();
    //Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").show();
    $("#bmodifipondersat").hide();
    //Historial de constancias
    $("#ahistoriaconstanc").show();
    $("#bhistoriaconstanc").hide();

//INSPECTOR apartado OJT
    $("#aojt").show();
    $("#bojt").hide();
    $("#aojtalt").show();
    $("#bojtalt").hide();
    $("#aojtcons").show();
    $("#bojtcons").hide();
    $("#aojtedit").show();
    $("#bojtedit").hide();
    $("#aojtelim").show();
    $("#bojtelim").hide();

//OTROS
//Calendario
    $("#acalendario").show();
    $("#bcalendario").hide();
//Gantt
    $("#agantt").show();
    $("#bgantt").hide();
//Historial y monitoreo de cambios
    $("#amonitoreo").show();
    $("#bmonitoreo").hide();

     $("#1").addClass('active');
     $("#2").removeClass('active');
     $("#3").removeClass('active');
     $("#4").removeClass('active');

       $("#1").show('active');
       $("#2").show('active');
       $("#3").show('active');
       $("#4").show('active');

    $("#primera").addClass('active tab-pane');
    $("#primera").show();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").hide();    
}else
if(privilegio==2){
//    $("#uno").show();

//Alta de personal
    $("#aaltapersonl").show();
    $("#baltapersonl").hide();

//Alta de personal Externo
    $("#aaltapersonlxtrn").show();
    $("#baltapersonlxtrn").hide();

    //Alta de Instructores Externos
    $("#aaltainstrucxtrn").show();
    $("#baltainstrucxtrn").hide();

//Lista de personal
    $("#alistapersonl").show();
    $("#blistapersonl").hide();

//Asignación de puesto
    $("#aasigpuesto").show();
    $("#basigpuesto").hide();

//Editar Perfiles
    $("#aeditausu").show();
    $("#beditausu").hide();

    //Añadir grado de estudios 
    $("#aanadestudio").show();
    $("#banadestudio").hide();

//Asignación de puesto
    $("#aasignapuesto").show();
    $("#basignapuesto").hide();

//Eliminar usuarios
    $("#aeliminausu").show();
    $("#beliminausu").hide();

//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();

//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();

//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();

//Editar Perfiles
    $("#aditarinspctr").show();
    $("#bditarinspctr").hide();

//Añadir grado de estudios
    $("#agradostudio").show();
    $("#bgradostudio").hide();

    //Agregar Experiencia profesional
    $("#axperienciapro").show();
    $("#bxperienciapro").hide();

//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();

//EDITAR PERDIL
        $("#aeditaprfil1").show();
        $("#beditaprfil1").hide();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
//Alta de cursos
    $("#altacurso").show();
    $("#bltacurso").hide();
//Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
//Editar cursos
    $("#aeditacurso").show();
    $("#beditacurso").hide();
//Añadir temario
    $("#aguartmario").show();
    $("#bguartmario").hide();
//Eliminar cursos
    $("#aeliminacurso").show();
    $("#beliminacurso").hide();
//Programación de cursos
    $("#aprocurso").show();
    $("#bprocurso").hide();
//Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
//Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
//Agregar participantes
    $("#aagregapartici").show();
    $("#bagregapartici").hide();
//Eliminar cursos
    $("#aelimincurso").show();
    $("#belimincurso").hide();
//Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
//Pronóstico de cursos
    $("#apronostcurso").show();
    $("#bpronostcurso").hide();
//Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
//Modificar ponderación de satisfacción
    $("#amodifipondersat").show();
    $("#bmodifipondersat").hide();
//Historial de constancias
    $("#ahistoriaconstanc").show();
    $("#bhistoriaconstanc").hide();

//INSPECTOR apartado OJT
    $("#aojt").show();
    $("#bojt").hide();
    $("#aojtalt").show();
    $("#bojtalt").hide();
    $("#aojtcons").show();
    $("#bojtcons").hide();
    $("#aojtedit").show();
    $("#bojtedit").hide();
    $("#aojtelim").show();
    $("#bojtelim").hide();
//OTROS
//Calendario
    $("#acalendario").show();
    $("#bcalendario").hide();
//Gantt
    $("#agantt").show();
    $("#bgantt").hide();
//Historial y monitoreo de cambios
    $("#amonitoreo").show();
    $("#bmonitoreo").hide();

       $("#1").addClass('active');
       $("#2").removeClass('active');
       $("#3").removeClass('active');
       $("#4").removeClass('active');

       $("#1").show('active');
       $("#2").show('active');
       $("#3").show('active');
       $("#4").show('active');
//    $("#primera").addClass('active tab-pane');
    // $("#primera").show();
    // $("#segunda").addClass('tab-pane');
    // $("#tercera").addClass('tab-pane');
    // $("#cuarto").addClass('tab-pane');    
        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").hide(); 



}else
if(privilegio==3){


//    $("#uno").show();

//Alta de personal
    $("#aaltapersonl").hide();
    $("#baltapersonl").show();

//Alta de personal Externo
    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").show();

    //Alta de Instructores Externos
    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").show();

//Lista de personal
    $("#alistapersonl").show();
    $("#blistapersonl").hide();

//Asignación de puesto
    $("#aasigpuesto").show();
    $("#basigpuesto").hide();

//Editar Perfiles
    $("#aeditausu").hide();
    $("#beditausu").show();

    //Añadir grado de estudios 
    $("#aanadestudio").hide();
    $("#banadestudio").show();

//Asignación de puesto
    $("#aasignapuesto").hide();
    $("#basignapuesto").show();

//Eliminar usuarios
    $("#aeliminausu").hide();
    $("#beliminausu").show();

//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();

//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();

//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();

//Editar Perfiles
    $("#aditarinspctr").hide();
    $("#bditarinspctr").show();

//Añadir grado de estudios
    $("#agradostudio").hide();
    $("#bgradostudio").show();

    //Agregar Experiencia profesional
    $("#axperienciapro").hide();
    $("#bxperienciapro").show();

//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();

//EDITAR PERDIL
        $("#aeditaprfil1").hide();
        $("#beditaprfil1").show();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
    //Alta de cursos
    $("#altacurso").hide();
    $("#bltacurso").show();
    //Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
    //Editar cursos
    $("#aeditacurso").hide();
    $("#beditacurso").show();
    //Añadir temario
    $("#aguartmario").hide();
    $("#bguartmario").show();
    //Eliminar cursos
    $("#aeliminacurso").hide();
    $("#beliminacurso").show();
    //Programación de cursos
    $("#aprocurso").hide();
    $("#bprocurso").show();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
    //Agregar participantes
    $("#aagregapartici").hide();
    $("#bagregapartici").show();
    //Eliminar cursos
    $("#aelimincurso").hide();
    $("#belimincurso").show();
    //Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
    //Pronóstico de cursos
    $("#apronostcurso").hide();
    $("#bpronostcurso").show();
    //Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").hide();
    $("#bmodifipondersat").show();
    //Historial de constancias
    $("#ahistoriaconstanc").hide();
    $("#bhistoriaconstanc").show();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").hide();
        $("#bojtcons").show();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();

    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").show();
        $("#bgantt").hide();
    //Historial y monitoreo de cambios
        $("#amonitoreo").show();
        $("#bmonitoreo").hide();

        $("#1").addClass('active');
        $("#2").removeClass('active');
        $("#3").removeClass('active');
        $("#4").removeClass('active');

        $("#1").show('active');
        $("#2").show('active');
        $("#3").show('active');
        $("#4").show('active');

        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").hide();     
}
if(privilegio==4){

//Alta de personal
    $("#aaltapersonl").hide();
    $("#baltapersonl").show();
//Alta de personal Externo
    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").show();
//Alta de Instructores Externos
    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").show();
//Lista de personal
    $("#alistapersonl").show();
    $("#blistapersonl").hide();
//Asignación de puesto
    $("#aasigpuesto").show();
    $("#basigpuesto").hide();
//Editar Perfiles
    $("#aeditausu").hide();
    $("#beditausu").show();
//Añadir grado de estudios 
    $("#aanadestudio").hide();
    $("#banadestudio").show();
//Asignación de puesto
    $("#aasignapuesto").hide();
    $("#basignapuesto").show();
//Eliminar usuarios
    $("#aeliminausu").hide();
    $("#beliminausu").show();
//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();
//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();
//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();
//Editar Perfiles
    $("#aditarinspctr").hide();
    $("#bditarinspctr").show();
//Añadir grado de estudios
    $("#agradostudio").hide();
    $("#bgradostudio").show();
//Agregar Experiencia profesional
    $("#axperienciapro").hide();
    $("#bxperienciapro").show();
//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();
//EDITAR PERDIL
        $("#aeditaprfil1").hide();
        $("#beditaprfil1").show();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
    //Alta de cursos
    $("#altacurso").hide();
    $("#bltacurso").show();
    //Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
    //Editar cursos
    $("#aeditacurso").hide();
    $("#beditacurso").show();
    //Añadir temario
    $("#aguartmario").hide();
    $("#bguartmario").show();
    //Eliminar cursos
    $("#aeliminacurso").hide();
    $("#beliminacurso").show();
    //Programación de cursos
    $("#aprocurso").hide();
    $("#bprocurso").show();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
    //Agregar participantes
    $("#aagregapartici").hide();
    $("#bagregapartici").show();
    //Eliminar cursos
    $("#aelimincurso").hide();
    $("#belimincurso").show();
    //Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
    //Pronóstico de cursos
    $("#apronostcurso").hide();
    $("#bpronostcurso").show();
    //Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").hide();
    $("#bmodifipondersat").show();
    //Historial de constancias
    $("#ahistoriaconstanc").hide();
    $("#bhistoriaconstanc").show();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").hide();
        $("#bojtcons").show();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();

    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").show();
        $("#bgantt").hide();
    //Historial y monitoreo de cambios
        $("#amonitoreo").show();
        $("#bmonitoreo").hide();

         $("#1").addClass('active');
         $("#2").removeClass('active');
         $("#3").removeClass('active');
         $("#4").removeClass('active');

           $("#1").show('active');
           $("#2").show('active');
           $("#3").show('active');
           $("#4").show('active');

        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").hide();    
}

if(privilegio==5){
//Alta de personal
    $("#aaltapersonl").show();
    $("#baltapersonl").hide();
//Alta de personal Externo
    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").show();
//Alta de Instructores Externos
    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").show();
//Lista de personal
    $("#alistapersonl").show();
    $("#blistapersonl").hide();
//Asignación de puesto
    $("#aasigpuesto").hide();
    $("#basigpuesto").show();
//Editar Perfiles
    $("#aeditausu").show();
    $("#beditausu").hide();
    //Añadir grado de estudios 
    $("#aanadestudio").show();
    $("#banadestudio").hide();
//Asignación de puesto
    $("#aasignapuesto").show();
    $("#basignapuesto").hide();
//Eliminar usuarios
    $("#aeliminausu").show();
    $("#beliminausu").hide();
//Lista inspectores
    $("#alistainspctr").hide();
    $("#blistainspctr").show();
//Evaluar inspectores
    $("#aevalinspctor").hide();
    $("#bevalinspctor").show();
//Consultar apéndice E
    $("#aapendice").hide();
    $("#bapendice").show();
//Editar Perfiles
    $("#aditarinspctr").show();
    $("#bditarinspctr").hide();
//Añadir grado de estudios
    $("#agradostudio").show();
    $("#bgradostudio").hide();
//Agregar Experiencia profesional
    $("#axperienciapro").show();
    $("#bxperienciapro").hide();
//Lista de instructores
    $("#alistainstc").hide();
    $("#blistainstc").show();
//EDITAR PERDIL
        $("#aeditaprfil1").hide();
        $("#beditaprfil1").show();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
    //Alta de cursos
    $("#altacurso").show();
    $("#bltacurso").hide();
    //Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
    //Editar cursos
    $("#aeditacurso").show();
    $("#beditacurso").hide();
    //Añadir temario
    $("#aguartmario").show();
    $("#bguartmario").hide();
    //Eliminar cursos
    $("#aeliminacurso").show();
    $("#beliminacurso").hide();
    //Programación de cursos
    $("#aprocurso").show();
    $("#bprocurso").hide();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
    //Agregar participantes
    $("#aagregapartici").show();
    $("#bagregapartici").hide();
    //Eliminar cursos
    $("#aelimincurso").show();
    $("#belimincurso").hide();
    //Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
    //Pronóstico de cursos
    $("#apronostcurso").hide();
    $("#bpronostcurso").show();
    //Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").show();
    $("#bmodifipondersat").hide();
    //Historial de constancias
    $("#ahistoriaconstanc").hide();
    $("#bhistoriaconstanc").show();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").hide();
        $("#bojtcons").show();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();
    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").show();
        $("#bgantt").hide();
    //Historial y monitoreo de cambios
        $("#amonitoreo").hide();
        $("#bmonitoreo").show();

        $("#1").addClass('active');
        $("#2").removeClass('active');
        $("#3").removeClass('active');
        $("#4").removeClass('active');

        $("#1").show('active');
        $("#2").show('active');
        $("#3").show('active');
        $("#4").show('active');

        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").hide();     
}
if(privilegio==6){

       $("#1").hide('active');
       $("#2").addClass('active');
       $("#3").removeClass('active');
       $("#4").removeClass('active');

//CURSO
    //Alta de cursos
    $("#altacurso").hide();
    $("#bltacurso").show();
    //Catálogo de cursos
    $("#acatalogo").hide();
    $("#bcatalogo").show();
    //Editar cursos
    $("#aeditacurso").hide();
    $("#beditacurso").show();
    //Añadir temario
    $("#aguartmario").hide();
    $("#bguartmario").show();
    //Eliminar cursos
    $("#aeliminacurso").hide();
    $("#beliminacurso").show();
    //Programación de cursos
    $("#aprocurso").hide();
    $("#bprocurso").show();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").hide();
    $("#bdetallecurso").show();
    //Agregar participantes
    $("#aagregapartici").hide();
    $("#bagregapartici").show();
    //Eliminar cursos
    $("#aelimincurso").hide();
    $("#belimincurso").show();
    //Notificar convocatoria
    $("#anotconvocat").hide();
    $("#bnotconvocat").show();
    //Pronóstico de cursos
    $("#apronostcurso").hide();
    $("#bpronostcurso").show();
    //Nivel de satisfacción
    $("#anivelsatisf").hide();
    $("#bnivelsatisf").show();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").hide();
    $("#bmodifipondersat").show();
    //Historial de constancias
    $("#ahistoriaconstanc").hide();
    $("#bhistoriaconstanc").show();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").show();
        $("#bojtcons").hide();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();
    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").hide();
        $("#bgantt").show();
    //Historial y monitoreo de cambios
        $("#amonitoreo").hide();
        $("#bmonitoreo").show();

        $("#segunda").addClass('active tab-pane');
        $("#primera").hide();
        $("#segunda").show();
        $("#tercera").hide();
        $("#cuarto").hide();   
}

if(privilegio==7){
       $("#1").hide('active');
       $("#2").addClass('active');
       $("#3").removeClass('active');
       $("#4").removeClass('active');

//CURSO
    //Alta de cursos
    $("#altacurso").hide();
    $("#bltacurso").show();
    //Catálogo de cursos
    $("#acatalogo").hide();
    $("#bcatalogo").show();
    //Editar cursos
    $("#aeditacurso").hide();
    $("#beditacurso").show();
    //Añadir temario
    $("#aguartmario").hide();
    $("#bguartmario").show();
    //Eliminar cursos
    $("#aeliminacurso").hide();
    $("#beliminacurso").show();
    //Programación de cursos
    $("#aprocurso").hide();
    $("#bprocurso").show();
    //Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
    //Detalles del curso
    $("#adetallecurso").hide();
    $("#bdetallecurso").show();
    //Agregar participantes
    $("#aagregapartici").hide();
    $("#bagregapartici").show();
    //Eliminar cursos
    $("#aelimincurso").hide();
    $("#belimincurso").show();
    //Notificar convocatoria
    $("#anotconvocat").hide();
    $("#bnotconvocat").show();
    //Pronóstico de cursos
    $("#apronostcurso").hide();
    $("#bpronostcurso").show();
    //Nivel de satisfacción
    $("#anivelsatisf").hide();
    $("#bnivelsatisf").show();
    //Modificar ponderación de satisfacción
    $("#amodifipondersat").hide();
    $("#bmodifipondersat").show();
    //Historial de constancias
    $("#ahistoriaconstanc").hide();
    $("#bhistoriaconstanc").show();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").show();
        $("#bojtcons").hide();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();
    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").hide();
        $("#bgantt").show();
    //Historial y monitoreo de cambios
        $("#amonitoreo").hide();
        $("#bmonitoreo").show();

        $("#segunda").addClass('active tab-pane');
        $("#primera").hide();
        $("#segunda").show();
        $("#tercera").hide();
        $("#cuarto").hide();   
}
if(privilegio==8){

//Alta de personal
    $("#aaltapersonl").hide();
    $("#baltapersonl").show();
//Alta de personal Externo
    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").show();
//Alta de Instructores Externos
    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").show();
//Lista de personal
    $("#alistapersonl").hide();
    $("#blistapersonl").show();
//Asignación de puesto
    $("#aasigpuesto").hide();
    $("#basigpuesto").show();
//Editar Perfiles
    $("#aeditausu").hide();
    $("#beditausu").show();
//Añadir grado de estudios 
    $("#aanadestudio").hide();
    $("#banadestudio").show();
//Asignación de puesto
    $("#aasignapuesto").hide();
    $("#basignapuesto").show();
//Eliminar usuarios
    $("#aeliminausu").hide();
    $("#beliminausu").show();
//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();
//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();
//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();
//Editar Perfiles
    $("#aditarinspctr").hide();
    $("#bditarinspctr").show();
//Añadir grado de estudios
    $("#agradostudio").hide();
    $("#bgradostudio").show();
//Agregar Experiencia profesional
    $("#axperienciapro").hide();
    $("#bxperienciapro").show();
//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();
//EDITAR PERDIL
        $("#aeditaprfil1").hide();
        $("#beditaprfil1").show();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
//Alta de cursos
    $("#altacurso").show();
    $("#bltacurso").hide();
//Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
//Editar cursos
    $("#aeditacurso").show();
    $("#beditacurso").hide();
//Añadir temario
    $("#aguartmario").show();
    $("#bguartmario").hide();
//Eliminar cursos
    $("#aeliminacurso").show();
    $("#beliminacurso").hide();
//Programación de cursos
    $("#aprocurso").show();
    $("#bprocurso").hide();
//Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
//Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
//Agregar participantes
    $("#aagregapartici").show();
    $("#bagregapartici").hide();
//Eliminar cursos
    $("#aelimincurso").show();
    $("#belimincurso").hide();
//Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
//Pronóstico de cursos
    $("#apronostcurso").show();
    $("#bpronostcurso").hide();
//Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
//Modificar ponderación de satisfacción
    $("#amodifipondersat").show();
    $("#bmodifipondersat").hide();
//Historial de constancias
    $("#ahistoriaconstanc").show();
    $("#bhistoriaconstanc").hide();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        
        $("#aojtalt").show();
        $("#bojtalt").hide();

        $("#aojtcons").show();
        $("#bojtcons").hide();
        
        $("#aojtedit").show();
        $("#bojtedit").hide();

        $("#aojtelim").show();
        $("#bojtelim").hide();    

//OTROS
//Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
//Gantt
        $("#agantt").show();
        $("#bgantt").hide();
//Historial y monitoreo de cambios
        $("#amonitoreo").hide();
        $("#bmonitoreo").show();

        $("#1").addClass('active');
        $("#2").removeClass('active');
        $("#3").removeClass('active');
        $("#4").removeClass('active');

        $("#1").show('active');
        $("#2").show('active');
        $("#3").show('active');
        $("#4").show('active');

        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").hide();    

}

if(privilegio==9){
//Alta de personal
    $("#aaltapersonl").hide();
    $("#baltapersonl").show();
//Alta de personal Externo
    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").show();
//Alta de Instructores Externos
    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").show();
//Lista de personal
    $("#alistapersonl").hide();
    $("#blistapersonl").show();
//Asignación de puesto
    $("#aasigpuesto").hide();
    $("#basigpuesto").show();
//Editar Perfiles
    $("#aeditausu").hide();
    $("#beditausu").show();
//Añadir grado de estudios 
    $("#aanadestudio").hide();
    $("#banadestudio").show();
//Asignación de puesto
    $("#aasignapuesto").hide();
    $("#basignapuesto").show();
//Eliminar usuarios
    $("#aeliminausu").hide();
    $("#beliminausu").show();
//Lista inspectores
    $("#alistainspctr").show();
    $("#blistainspctr").hide();
//Evaluar inspectores
    $("#aevalinspctor").show();
    $("#bevalinspctor").hide();
//Consultar apéndice E
    $("#aapendice").show();
    $("#bapendice").hide();
//Editar Perfiles
    $("#aditarinspctr").hide();
    $("#bditarinspctr").show();
//Añadir grado de estudios
    $("#agradostudio").hide();
    $("#bgradostudio").show();
//Agregar Experiencia profesional
    $("#axperienciapro").hide();
    $("#bxperienciapro").show();
//Lista de instructores
    $("#alistainstc").show();
    $("#blistainstc").hide();
//EDITAR PERDIL
        $("#aeditaprfil1").hide();
        $("#beditaprfil1").show();    
//PERSONAL ACCESOS
        $("#aacceso1").hide();
        $("#aacceso2").hide();
        $("#aacceso3").hide();

        $("#bacceso1").show();
        $("#bacceso2").show();
        $("#bacceso3").show();

//CURSO
//Alta de cursos
    $("#altacurso").show();
    $("#bltacurso").hide();
//Catálogo de cursos
    $("#acatalogo").show();
    $("#bcatalogo").hide();
//Editar cursos
    $("#aeditacurso").show();
    $("#beditacurso").hide();
//Añadir temario
    $("#aguartmario").show();
    $("#bguartmario").hide();
//Eliminar cursos
    $("#aeliminacurso").show();
    $("#beliminacurso").hide();
//Programación de cursos
    $("#aprocurso").show();
    $("#bprocurso").hide();
//Cursos programados
    $("#aprogramados").show();
    $("#bprogramados").hide();
//Detalles del curso
    $("#adetallecurso").show();
    $("#bdetallecurso").hide();
//Agregar participantes
    $("#aagregapartici").show();
    $("#bagregapartici").hide();
//Eliminar cursos
    $("#aelimincurso").show();
    $("#belimincurso").hide();
//Notificar convocatoria
    $("#anotconvocat").show();
    $("#bnotconvocat").hide();
//Pronóstico de cursos
    $("#apronostcurso").show();
    $("#bpronostcurso").hide();
//Nivel de satisfacción
    $("#anivelsatisf").show();
    $("#bnivelsatisf").hide();
//Modificar ponderación de satisfacción
    $("#amodifipondersat").show();
    $("#bmodifipondersat").hide();
//Historial de constancias
    $("#ahistoriaconstanc").show();
    $("#bhistoriaconstanc").hide();

//INSPECTOR apartado OJT
        $("#aojt").show();
        $("#bojt").hide();
        $("#aojtalt").hide();
        $("#bojtalt").show();
        $("#aojtcons").show();
        $("#bojtcons").hide();
        $("#aojtedit").hide();
        $("#bojtedit").show();
        $("#aojtelim").hide();
        $("#bojtelim").show();

    //OTROS
    //Calendario
        $("#acalendario").show();
        $("#bcalendario").hide();
    //Gantt
        $("#agantt").hide();
        $("#bgantt").show();
    //Historial y monitoreo de cambios
        $("#amonitoreo").hide();
        $("#bmonitoreo").show();

        $("#1").addClass('active');
        $("#2").removeClass('active');
        $("#3").removeClass('active');
        $("#4").removeClass('active');

        $("#1").show('active');
        $("#2").show('active');
        $("#3").show('active');
        $("#4").show('active');

        $("#primera").addClass('active tab-pane');
        $("#primera").show();
        $("#segunda").hide();
        $("#tercera").hide();
        $("#cuarto").show();     
}

    $.ajax({
        url: '../php/privilegios.php',
        type: 'POST',
        data: 'datos='+datos
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;


         //alert(resp);
         for (i = 0; i < res.length; i++) {

            // if(obj.data[i].acceso=='aaltainstrucxtrn'){

                str = obj.data[i].acceso;

                //console.log(obj.data[i].acceso);
                acces = str.slice(1)
                
                activo = str.substring(-1,1);


                if(activo=='a'){
                    
                $("#"+activo+acces+"").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"").hide();
 
                }else if(activo=='b'){
                $("#"+activo+acces+"").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"").hide();
                }

                //$("#baltainstrucxtrn").hide();
            // }else if(obj.data[i].perfil=='baltainstrucxtrn'){
            //     $("#aaltainstrucxtrn").show();
            //     $("#baltainstrucxtrn").hide();
            // // }
            // alert(obj.data[i].n_empleado);

            // if(obj.data[i].n_empleado==''){
                
            // }


        //     if (obj.data[i].n_empleado == datos) {
                
        //             // id_usu = $("#editarAccesos #idAccesos").val(obj.data[i].id_accesos),
        //             // id_usu = $("#editarAccesos #idUser").val(obj.data[i].id_usu),
        //             // privilg = $("#editarAccesos #nombUser").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell),
        //             // mEmpleado = $("#editarAccesos #nEmpleado").val(obj.data[i].gstNmpld),
        //             // password = $("#editarAccesos #password").val(obj.data[i].password),
        //             // usuario = $("#editarAccesos #usuario").val(obj.data[i].usuario),
        //             // password = $("#editarAccesos #privilegios").val(obj.data[i].privilegios),
        //             // opcion = $("#editarAccesos #opcion").val("modificar");
        //     }
         }
    })
}




// SHOW PASSWORD
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
</script>