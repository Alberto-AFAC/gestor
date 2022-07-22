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
        #buton{
            background: green; 
            color: white; 
            float: left; 
            border-radius: 10px;  
            border-right: 4px solid white;
            border-left: 4px solid white;
            border-top: 4px solid white;
            border-bottom: 4px solid white;
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
                            <h5 style="font-size: 20px;float: left;" class="modal-title" id="editarAccesosLabel">ACTUALIZAR CREDENCIALES DE ACCESO</h5>
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
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                    <option value="COORDINADOR">COORDINADOR</option>
                                    <option value="DIRECTOR_CIAAC">DIRECTOR_CIAAC</option>
                                    <option value="DIRECTOR">DIRECTOR</option>
                                    <option value="EJECUTIVO">EJECUTIVO</option>
                                    <option value="HUMANOS">HUMANOS</option>    
                                    <option value="INSTRUCTOR">INSTRUCTOR</option>
                                    <option value="INSPECTOR">INSPECTOR</option>                
                                    <option value="SUPER_ADMIN">SUPER ADMINISTRADOR</option>
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
<!--                     onclick="window.location.href='accesospriv'"
-->                    
<h4 style="float: left;"><span class="bg-default">:  Inicio (Dashboard)</span></h4>
<button type="button" class="close" onclick="vaciar()" data-dismiss="modal" aria-label="Close" >
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
        <li id="5"><a href="#cuarto"  onclick="cin()" data-toggle="tab">OJT</a></li>                  
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

                                        <span id="sin_altapersonl" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                        <span id="con_altapersonl" class="label label-default" style="color:green;" >ACCESO</span>

                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td  colspan="2"><li>Alta de personal Externo</li></td>
                                    <td>
                                        <span id="aaltapersonlxtrn" class="label label-success"><a href="#" onclick="accesosg('baltapersonlxtrn*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                        <span id="baltapersonlxtrn" class="label label-warning"><a href="#" onclick="accesosg('aaltapersonlxtrn*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                        <span id="sin_altapersonlxtrn" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                        <span id="con_altapersonlxtrn" class="label label-default" style="color:green;" >ACCESO</span>


                                    </td>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2"><li>Alta de Instructores Externos</li></td>
                                <td>
                                    <span id="aaltainstrucxtrn" class="label label-success"><a href="#" onclick="accesosg('baltainstrucxtrn*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                    <span id="baltainstrucxtrn" class="label label-warning"><a href="#" onclick="accesosg('aaltainstrucxtrn*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                    <span id="sin_altainstrucxtrn" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                    <span id="con_altainstrucxtrn" class="label label-default" style="color:green;" >ACCESO</span>
                                </td>
                            </td>
                            <td></td>
                        </tr>


                        <tr>
                            <td colspan="2"><li>Nuevo ingreso</li></td>
                            <td>
                                <span id="anuevoingreso" class="label label-success"><a href="#" onclick="accesosg('bnuevoingreso*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>

                                <span id="bnuevoingreso" class="label label-warning"><a href="#" onclick="accesosg('anuevoingreso*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                <span id="sin_nuevoingreso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                <span id="con_nuevoingreso" class="label label-default" style="color:green;" >ACCESO</span>

                            </td>
                            <td></td>
                        </tr>



                        <tr>
                            <td colspan="2"><li>Lista de personal</li></td>
                            <td>
                                <span id="alistapersonl" class="label label-success"><a href="#" onclick="accesosg('blistapersonl*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                <span id="blistapersonl" class="label label-warning"><a href="#" onclick="accesosg('alistapersonl*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                <span id="sin_listapersonl" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                <span id="con_listapersonl" class="label label-default" style="color:green;" >ACCESO</span>                        
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">  > Asignación de puesto</td>
                            <td>
                                <span id="con_asignacionpuesto" class="label label-default" style="color:green;" >ACCESO</span>
                                <span id="sin_asignacionpuesto" class="label label-default" style="color:red;" >SIN ACCESO</span>
                            </td>


                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <button type="button" onclick="conteiner1()" id="buton"> + </button>
                                <li style="list-style: none; margin-top: 0.2em; "> Procesos del Perfil</li>  </td>

                                <td>
                                    <span id="aeditausu" class="label label-success"><a href="#" onclick="accesosg('beditausu*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                    <span id="beditausu" class="label label-warning"><a href="#" onclick="accesosg('aeditausu*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                    <span id="sin_editausu" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                    <span id="con_editausu" class="label label-default" style="color:green;" >ACCESO</span> 

                                </td>

                                <td></td>
                            </tr>

                            <tr><td><p id="conteiner1" style="display: none; margin-left: 1em;">
                                > Añadir grado de estudios <br>
                                > Añadir experiencia profesional<br>
                                > Editar usuario<br>
                                > Eliminar usuario
                            </p></td></tr>
                            <tr>
                                <td colspan="2"><li>Lista inspectores</li></td>
                                <td>
                                    <span id="alistainspctr" class="label label-success"><a href="#" onclick="accesosg('blistainspctr*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                    <span id="blistainspctr" class="label label-warning"><a href="#" onclick="accesosg('alistainspctr*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                    <span id="sin_listainspctr" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                    <span id="con_listainspctr" class="label label-default" style="color:green;" >ACCESO</span>                         
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">  > Evaluar inspectores</td>
                                <td>
                                    <span id="aevalinspctor" class="label label-success"><a href="#" onclick="accesosg('bevalinspctor*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                    <span id="bevalinspctor" class="label label-warning"><a href="#" onclick="accesosg('aevalinspctor*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>
                                    <span id="sin_evalinspctor" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                    <span id="con_evalinspctor" class="label label-default" style="color:green;" >ACCESO</span>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2"> > Consultar apéndice E </td>
                                <td>
                                    <span id="aapendice" class="label label-success"><a href="#" onclick="accesosg('bapendice*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                    <span id="bapendice" class="label label-warning"><a href="#" onclick="accesosg('aapendice*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                    <span id="sin_apendice" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                    <span id="con_apendice" class="label label-default" style="color:green;" >ACCESO</span>

                                </td>
                                <td></td>
                            </tr>
                            <tr>



                                <tr>
                                    <td colspan="2"> 
                                        <button type="button" onclick="conteiner2()" id="buton"> + </button>
                                        <li style="list-style: none; margin-top: 0.2em; "> Procesos del inspector</li>  </td>

                                        <td>
                                            <span id="aditarinspctr" class="label label-success"><a href="#" onclick="accesosg('bditarinspctr*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bditarinspctr" class="label label-warning"><a href="#" onclick="accesosg('aditarinspctr*PERSONAL')" style="color: white" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_ditarinspctr" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_ditarinspctr" class="label label-default" style="color:green;" >ACCESO</span>
                                        </td>

                                        <td></td>
                                    </tr>


                                    <tr><td><p id="conteiner2" style="display: none; margin-left: 1em;">
                                        > Editar perfil<br>
                                        > Añadir grado de estudios<br>
                                        > Agregar experiencia profesional
                                    </p></td></tr>
                                </tr>
                                <tr>
                                    <td colspan="2"><li>Lista de instructores</li></td>
                                    <td>
                                        <span id="alistainstc" class="label label-success"><a href="#" onclick="accesosg('blistainstc*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                        <span id="blistainstc" class="label label-warning"><a href="#" onclick="accesosg('alistainstc*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                        <span id="sin_listainstc" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                        <span id="con_listainstc" class="label label-default" style="color:green;" >ACCESO</span>

                                    </td>
                                    <td></td>
                                </tr>
                                <tr >
                                    <td colspan="2"><button type="button" onclick="conteiner3()" id="buton"> + </button>
                                        <li style="list-style: none; margin-top: 0.2em; ">Lista de accesos</li></td>
                                        <td>
                                            <span id="aacceso1" class="label label-success"><a href="#" onclick="accesosg('bacceso1*PERSONAL')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bacceso1" class="label label-warning"><a href="#" onclick="accesosg('aacceso1*PERSONAL')" style="color:white;" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_acceso1" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_acceso1" class="label label-default" style="color:green;" >ACCESO</span>                    
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr><td><p id="conteiner3" style="display: none; margin-left: 1em;">
                                        > Editar contraseña<br>
                                        > Editar privilegios
                                    </p></td></tr>                 


                                </tbody>
                            </table>

                        </div>
                    </div>
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

                                    <tr>
                                        <td colspan="2"><button type="button" onclick="conteiner4()" id="buton"> + </button> <li style="list-style: none;margin-top: 0.2em;"> OJT MASIVO</li></td>

                                        <td>
                                            <span id="aojtalt" class="label label-success"><a href="#" onclick="accesosg('bojtalt*INSPECTOR')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bojtalt" class="label label-warning"><a href="#" onclick="accesosg('aojtalt*INSPECTOR')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_ojtalt" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_ojtalt" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>

                                        <tr><td><p id="conteiner4" style="display: none; margin-left: 1em;">
                                            > Consulta OJT <br>
                                            > Alta OJT<br>
                                            > Editar OJT<br>
                                            > Eliminar OJT
                                        </p></td></tr>

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
                                            <span id="aaltacurso" class="label label-success"><a href="#" onclick="accesosg('baltacurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="baltacurso" class="label label-warning"><a href="#" onclick="accesosg('aaltacurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_altacurso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_altacurso" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td  colspan="2"><li>Catálogo de cursos</li></td>
                                        <td>
                                            <span id="acatalogo" class="label label-success"><a href="#" onclick="accesosg('bcatalogo*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bcatalogo" class="label label-warning"><a href="#" onclick="accesosg('acatalogo*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_catalogo" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_catalogo" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>


                                    <tr>
                                        <td colspan="2"> <button type="button" onclick="conteiner5()" id="buton"> + </button> <li style="list-style: none;margin-top: 0.2em;"> Procesos del curso </li></td>
                                        <td>
                                            <span id="aeditacurso" class="label label-success"><a href="#" onclick="accesosg('beditacurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="beditacurso" class="label label-warning"><a href="#" onclick="accesosg('aeditacurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_editacurso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_editacurso" class="label label-default" style="color:green;" >ACCESO</span>


                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr><td><p id="conteiner5" style="display: none; margin-left: 1em;">
                                        > Editar cursos <br>
                                        > Eliminar cursos<br>
                                        > Añadir temario<br>
                                        > editar temario<br>
                                        > eliminar temario<br>
                                    </p></td></tr>

                                    <tr>
                                        <td colspan="2"><li>Programación de cursos </li></td>
                                        <td>
                                            <span id="aprocurso" class="label label-success"><a href="#" onclick="accesosg('bprocurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bprocurso" class="label label-warning"><a href="#" onclick="accesosg('aprocurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_procurso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_procurso" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>


                                    <tr>
                                        <td colspan="2"><li>Cursos programados </li></td>
                                        <td>
                                            <span id="aprogramados" class="label label-success"><a href="#" onclick="accesosg('bprogramados*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bprogramados" class="label label-warning"><a href="#" onclick="accesosg('aprogramados*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                            <span id="sin_programados" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_programados" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> <button type="button" onclick="conteiner6()" id="buton"> + </button> <li style="list-style: none;margin-top: 0.2em;"> Procesos del curso programado</li></td>
                                        <td>
                                            <span id="adetallecurso" class="label label-success"><a href="#" onclick="accesosg('bdetallecurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bdetallecurso" class="label label-warning"><a href="#" onclick="accesosg('adetallecurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                            <span id="sin_detallecurso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_detallecurso" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr><td><p id="conteiner6" style="display: none; margin-left: 1em;">
                                        > Detalles del curso<br>
                                        > Agregar participantes<br>
                                        > Eliminar cursos<br>
                                        > Notificar convocatoria
                                    </p></td></tr>


                                    <tr>
                                        <td colspan="2"><li>Pronóstico de cursos </li></td>
                                        <td>
                                            <span id="apronostcurso" class="label label-success"><a href="#" onclick="accesosg('bpronostcurso*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bpronostcurso" class="label label-warning"><a href="#" onclick="accesosg('apronostcurso*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_pronostcurso" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_pronostcurso" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><li>Cursos vencidos </li></td>
                                        <td>
                                            <span id="acursosvincids" class="label label-success"><a href="#" onclick="accesosg('bcursosvincids*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bcursosvincids" class="label label-warning"><a href="#" onclick="accesosg('acursosvincids*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_cursosvincids" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_cursosvincids" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>



                                    <tr>
                                        <td colspan="2"><li>Nivel de satisfacción </li></td>
                                        <td>
                                            <span id="anivelsatisf" class="label label-success"><a href="#" onclick="accesosg('bnivelsatisf*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bnivelsatisf" class="label label-warning"><a href="#" onclick="accesosg('anivelsatisf*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                            <span id="sin_nivelsatisf" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_nivelsatisf" class="label label-default" style="color:green;" >ACCESO</span>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> > Modificar ponderación de satisfacción</td>
                                        <td>
                                            <span id="amodifipondersat" class="label label-success"><a href="#" onclick="accesosg('bmodifipondersat*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bmodifipondersat" class="label label-warning"><a href="#" onclick="accesosg('amodifipondersat*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_modifipondersat" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_modifipondersat" class="label label-default" style="color:green;" >ACCESO</span>


                                        </td>
                                        <td></td>
                                    </tr>                  

                                    <tr>
                                        <td colspan="2"><li>Historial de constancias </li></td>
                                        <td>
                                            <span id="ahistoriaconstanc" class="label label-success"><a href="#" onclick="accesosg('bhistoriaconstanc*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bhistoriaconstanc" class="label label-warning"><a href="#" onclick="accesosg('ahistoriaconstanc*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>

                                            <span id="sin_historiaconstanc" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_historiaconstanc" class="label label-default" style="color:green;" >ACCESO</span>

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

                                            <span id="sin_calendario" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_calendario" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td  colspan="2"><li>Gantt </li></td>
                                        <td>
                                            <span id="agantt" class="label label-success"><a href="#" onclick="accesosg('bgantt*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bgantt" class="label label-warning"><a href="#" onclick="accesosg('agantt*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_gantt" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_gantt" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> <li> Historial y monitoreo de cambios </li></td>
                                        <td>
                                            <span id="amonitoreo" class="label label-success"><a href="#" onclick="accesosg('bmonitoreo*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bmonitoreo" class="label label-warning"><a href="#" onclick="accesosg('amonitoreo*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_monitoreo" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_monitoreo" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><li>Manual de Usuario </li></td>
                                        <td>
                                            <span id="sin_manual" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_manual" class="label label-default" style="color:green;" >ACCESO</span>
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

            <div id="cinco">

                <div class="box box-info" id="otro">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>OJT</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="2"><li>OJT Principal </li></td>
                                        <td>
                                            <span id="aojtprincipal" class="label label-success"><a href="#" onclick="accesosg('bojtprincipal*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>

                                            <span id="bojtprincipal" class="label label-warning"><a href="#" onclick="accesosg('aojtprincipal*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_ojtprincipal" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_ojtprincipal" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> <button type="button" onclick="conteiner7()" id="buton"> + </button> <li style="list-style: none;margin-top: 0.2em;"> Procesos OJT pricipal</li></td>
                                        <td>
                                            <span id="aprocesoojtprin" class="label label-success"><a href="#" onclick="accesosg('bprocesoojtprin*CURSO')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bprocesoojtprin" class="label label-warning"><a href="#" onclick="accesosg('aprocesoojtprin*CURSO')" style="color:white;" title="PROPORCIONAR ACCESO">SIN ACCESO</a></span>
                                            <span id="sin_procesoojtprin" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_procesoojtprin" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr><td><p id="conteiner7" style="display: none; margin-left: 1em;">
                                        > Agregar tarea<br>
                                        > Editar tarea<br>
                                        > Eliminar editar<br>
                                        > Agregar sub tarea<br>
                                        > Editar sub tarea<br>
                                        > Eliminar sub tarea<br>
                                        > Catalogo
                                    </p></td></tr>

                                    <tr>
                                        <td colspan="2"> <li> Programación OJT </li></td>
                                        <td>
                                            <span id="aprograojt" class="label label-success"><a href="#" onclick="accesosg('bprograojt*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bprograojt" class="label label-warning"><a href="#" onclick="accesosg('aprograojt*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_prograojt" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_prograojt" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> <li> OJT Programados</li></td>
                                        <td>
                                            <span id="aojtprogramds" class="label label-success"><a href="#" onclick="accesosg('bojtprogramds*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="bojtprogramds" class="label label-warning"><a href="#" onclick="accesosg('aojtprogramds*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_ojtprogramds" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_ojtprogramds" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <li> Alta de Coordinadores / Instructores OJT</li></td>
                                        <td>
                                            <span id="aaltacorinst" class="label label-success"><a href="#" onclick="accesosg('baltacorinst*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="baltacorinst" class="label label-warning"><a href="#" onclick="accesosg('aaltacorinst*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_altacorinst" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_altacorinst" class="label label-default" style="color:green;" >ACCESO</span>

                                        </td>
                                        <td></td>
                                    </tr> 

                                    <tr>
                                        <td colspan="2"> <li> Lista de Coordinadores / Instructores OJT </li></td>
                                        <td>
                                            <span id="alistacorinst" class="label label-success"><a href="#" onclick="accesosg('blistacorinst*OTROS')" style="color: white" title="QUITAR ACCESO">ACCESO</a></span>
                                            <span id="blistacorinst" class="label label-warning"><a href="#" onclick="accesosg('alistacorinst*OTROS')" style="color: white" title="PROPORCIONAR ACCESO" >SIN ACCESO</a></span>

                                            <span id="sin_listacorinst" class="label label-default" style="color:red;" > SIN ACCESO</span>

                                            <span id="con_listacorinst" class="label label-default" style="color:green;" >ACCESO</span>

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
            <div class="form-group" id="otra">
                <div class="col-sm-offset-0 col-sm-2">

                    <button type="button"  style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" class="close" onclick="vaciar()" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">SALIR</span>
                    </button>

                </div>
            </div>

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
       $(document).ready(function() {
        $.fn.dataTableExt.errMode = 'ignore';   
    var dataSet = [
    <?php 
    $query = "SELECT * FROM accesos
    INNER JOIN personal ON id_usu = gstIdper";
    $resultado = mysqli_query($conexion, $query);
    while($data = mysqli_fetch_array($resultado)){ 
        $id = $data['id_usu'];
        $acceso = $data['id_accesos'] ?>
        // 1 SUPER_ADMIN
        // 2 ADMINISTRADOR
        // 3 EJECUTIVO
        // 4 DIRECTOR
        // 5 HUMANOS
        // 6 ADMINISTRATIVO
        // 7 INSPECTOR
        // 8 INSTRUCTOR
        // 9 NUEVO INGRESO
["<?php echo $data[1]?>", "<?php echo $data[9]." ".$data[10]?>", "<?php echo $data[32]?>","<?php echo $data[2]?>","<?php echo $data[41]?>", "<?php echo $data[4]?>",

<?php if($data[4]=='SUPER_ADMIN'){ ?>       
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(1.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
<?php }else if($data[4]=='ADMINISTRADOR' || $data[4]=='DIRECTOR_CIAAC'){ ?>
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(2.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
<?php }else if($data[4]=='EJECUTIVO' || $data[4]=='DIRECTOR'){ ?>
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(3.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
<?php }else if($data[4]=='HUMANOS'){ ?>
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(4.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
<?php }else if($data[4]=='ADMINISTRATIVO' || $data[4]=='INSPECTOR' || $data[4]=='NUEVO INGRESO'){ ?>
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(5.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
<?php }else if($data[4]=='INSTRUCTOR' || $data[4]=='COORDINADOR'){ ?>    
    "<?php echo "<a title='Editar técnico' onclick='mostrar_datos(6.{$data[32]})' type='button' data-toggle='modal' data-target='#mostrarPriv' class='editar btn btn-default'><i class='fa fa-list-alt text-info'></i></a>"?>"
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
        title: "CARGO"
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
                
                   if(obj.data[i].privilegios=='COORDINADOR' || obj.data[i].privilegios=='INSTRUCTOR'){
                    // $('#privilegios').prop('disabled', true);
                    if(obj.data[i].privilegios=='INSTRUCTOR'){
                    $("#inst1").show();
                    $("#inst2").hide();                        
                    }else{
                    $("#inst1").hide();    
                    $("#inst2").show();
                    }
                    $("#opc1").hide();
                    $("#opc2").hide();
                    $("#opc3").hide();
                    $("#opc4").hide();
                    $("#opc5").hide();
                    $("#opc6").hide();
                    $("#opc7").hide();
                    $("#opc8").hide();
                   }else{
                    // $('#privilegios').prop('disabled', false);
                    $("#inst1").hide();
                    $("#inst2").hide();
                    $("#opc1").show();
                    $("#opc2").show();
                    $("#opc3").show();
                    $("#opc4").show();
                    $("#opc5").show();
                    $("#opc6").show();
                    $("#opc7").show();
                    $("#opc8").show();
                   }

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

function conteiner1(){
    $("#conteiner1").toggle();   
}
function conteiner2(){
    $("#conteiner2").toggle();
}
function conteiner3(){
    $("#conteiner3").toggle();   
}
function conteiner4(){
    $("#conteiner4").toggle();   
}
function conteiner5(){
    $("#conteiner5").toggle();   
}
function conteiner6(){
    $("#conteiner6").toggle();   
}
function conteiner7(){
    $("#conteiner7").toggle();   
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
        rgba(100, 100, 100, 0.4)`
        });
        setTimeout("location.href = 'accesos';", 2000);
        }else{
        Swal.fire({
        type: 'warning',
        text: 'SELECCIONE PRIVILEGIOS',
        showConfirmButton: false,
        customClass: 'swal-wide',
        timer: 2000,
        backdrop: `
        rgba(100, 100, 100, 0.4)`
        });           
        }
    });
}

function uno(){
    $("#primera").show();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").hide();
    $("#cinco").hide();
}
function dos(){
    $("#primera").hide();
    $("#segunda").show();
    $("#tercera").hide();
    $("#cuarto").hide();
    $("#cinco").hide();
}
function tre(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").show();
    $("#cuarto").hide();    
    $("#cinco").hide();
}
function cua(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").show();
    $("#cinco").hide();
}
function cin(){
    $("#primera").hide();
    $("#segunda").hide();
    $("#tercera").hide();
    $("#cuarto").hide();
    $("#cinco").show();
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

    if (respuesta == 0) {
    }
});

}

$("#aaltapersonl").hide();
$("#baltapersonl").hide();
$("#sin_altapersonl").hide();
$("#con_altapersonl").hide();

$("#aaltapersonlxtrn").hide();
$("#baltapersonlxtrn").hide();
$("#sin_altapersonlxtrn").hide();
$("#con_altapersonlxtrn").hide();

$("#aaltainstrucxtrn").hide();
$("#baltainstrucxtrn").hide();
$("#sin_altainstrucxtrn").hide();
$("#con_altainstrucxtrn").hide();

$("#anuevoingreso").hide();
$("#bnuevoingreso").hide();
$("#sin_nuevoingreso").hide();
$("#con_nuevoingreso").hide();

$("#alistapersonl").hide();
$("#blistapersonl").hide();
$("#sin_listapersonl").hide();
$("#con_listapersonl").hide();

$("#con_asignacionpuesto").hide();
$("#sin_asignacionpuesto").hide();

$("#aeditausu").hide();
$("#beditausu").hide();
$("#con_editausu").hide();
$("#sin_editausu").hide();

$("#alistainspctr").hide();
$("#blistainspctr").hide();
$("#con_listainspctr").hide();
$("#sin_listainspctr").hide();

$("#aevalinspctor").hide();
$("#bevalinspctor").hide();
$("#con_evalinspctor").hide();
$("#sin_evalinspctor").hide();

$("#aapendice").hide();
$("#bapendice").hide();
$("#con_apendice").hide();
$("#sin_apendice").hide();

$("#aditarinspctr").hide();
$("#bditarinspctr").hide();
$("#con_ditarinspctr").hide();
$("#sin_ditarinspctr").hide();

$("#alistainstc").hide();
$("#blistainstc").hide();
$("#con_listainstc").hide();
$("#sin_listainstc").hide();

$("#aacceso1").hide();
$("#bacceso1").hide();
$("#con_acceso1").hide();
$("#sin_acceso1").hide();

//PEROSNAL
$("#aojtalt").hide();
$("#bojtalt").hide();
$("#con_ojtalt").hide();
$("#sin_ojtalt").hide();
//CURSOS

$("#aaltacurso").hide();
$("#baltacurso").hide();
$("#con_altacurso").hide();
$("#sin_altacurso").hide();

$("#acatalogo").hide();
$("#bcatalogo").hide();
$("#con_catalogo").hide();
$("#sin_catalogo").hide();

$("#aeditacurso").hide();
$("#beditacurso").hide();
$("#con_editacurso").hide();
$("#sin_editacurso").hide();

$("#aprocurso").hide();
$("#bprocurso").hide();
$("#con_procurso").hide();
$("#sin_procurso").hide();

$("#aprogramados").hide();
$("#bprogramados").hide();
$("#con_programados").hide();
$("#sin_programados").hide();

$("#adetallecurso").hide();
$("#bdetallecurso").hide();
$("#con_detallecurso").hide();
$("#sin_detallecurso").hide();

$("#apronostcurso").hide();
$("#bpronostcurso").hide();
$("#con_pronostcurso").hide();
$("#sin_pronostcurso").hide();

$("#acursosvincids").hide();
$("#bcursosvincids").hide();
$("#con_cursosvincids").hide();
$("#sin_cursosvincids").hide();

$("#anivelsatisf").hide();
$("#bnivelsatisf").hide();
$("#con_nivelsatisf").hide();
$("#sin_nivelsatisf").hide();

$("#amodifipondersat").hide();
$("#bmodifipondersat").hide();
$("#con_modifipondersat").hide();
$("#sin_modifipondersat").hide();

$("#ahistoriaconstanc").hide();
$("#bhistoriaconstanc").hide();
$("#con_historiaconstanc").hide();
$("#sin_historiaconstanc").hide();

//APARTADOS
$("#acalendario").hide();
$("#bcalendario").hide();
$("#con_calendario").hide();
$("#sin_calendario").hide();

$("#agantt").hide();
$("#bgantt").hide();
$("#con_gantt").hide();
$("#sin_gantt").hide();

$("#amonitoreo").hide();
$("#bmonitoreo").hide();
$("#con_monitoreo").hide();
$("#sin_monitoreo").hide();

$("#con_manual").hide();
$("#sin_manual").hide();
//OJT
$("#aojtprincipal").hide();
$("#bojtprincipal").hide();
$("#con_ojtprincipal").hide();
$("#sin_ojtprincipal").hide();

$("#aprocesoojtprin").hide();
$("#bprocesoojtprin").hide();
$("#con_procesoojtprin").hide();
$("#sin_procesoojtprin").hide();

$("#aprograojt").hide();
$("#bprograojt").hide();
$("#con_prograojt").hide();
$("#sin_prograojt").hide();

$("#aojtprogramds").hide();
$("#bojtprogramds").hide();
$("#con_ojtprogramds").hide();
$("#sin_ojtprogramds").hide();

$("#aaltacorinst").hide();
$("#baltacorinst").hide();
$("#con_altacorinst").hide();
$("#sin_altacorinst").hide();

$("#alistacorinst").hide();
$("#blistacorinst").hide();
$("#con_listacorinst").hide();
$("#sin_listacorinst").hide();

function vaciar(){
    $("#aaltapersonl").hide();
    $("#baltapersonl").hide();
    $("#sin_altapersonl").hide();
    $("#con_altapersonl").hide();

    $("#aaltapersonlxtrn").hide();
    $("#baltapersonlxtrn").hide();
    $("#sin_altapersonlxtrn").hide();
    $("#con_altapersonlxtrn").hide();

    $("#aaltainstrucxtrn").hide();
    $("#baltainstrucxtrn").hide();
    $("#sin_altainstrucxtrn").hide();
    $("#con_altainstrucxtrn").hide();

    $("#anuevoingreso").hide();
    $("#bnuevoingreso").hide();
    $("#sin_nuevoingreso").hide();
    $("#con_nuevoingreso").hide();

    $("#alistapersonl").hide();
    $("#blistapersonl").hide();
    $("#sin_listapersonl").hide();
    $("#con_listapersonl").hide();

    $("#con_asignacionpuesto").hide();
    $("#sin_asignacionpuesto").hide();

    $("#aeditausu").hide();
    $("#beditausu").hide();
    $("#con_editausu").hide();
    $("#sin_editausu").hide();

    $("#alistainspctr").hide();
    $("#blistainspctr").hide();
    $("#con_listainspctr").hide();
    $("#sin_listainspctr").hide();

    $("#aevalinspctor").hide();
    $("#bevalinspctor").hide();
    $("#con_evalinspctor").hide();
    $("#sin_evalinspctor").hide();

    $("#aapendice").hide();
    $("#bapendice").hide();
    $("#con_apendice").hide();
    $("#sin_apendice").hide();

    $("#aditarinspctr").hide();
    $("#bditarinspctr").hide();
    $("#con_ditarinspctr").hide();
    $("#sin_ditarinspctr").hide();

    $("#alistainstc").hide();
    $("#blistainstc").hide();
    $("#con_listainstc").hide();
    $("#sin_listainstc").hide();

    $("#aacceso1").hide();
    $("#bacceso1").hide();
    $("#con_acceso1").hide();
    $("#sin_acceso1").hide();
//PEROSNAL
$("#aojtalt").hide();
$("#bojtalt").hide();
$("#con_ojtalt").hide();
$("#sin_ojtalt").hide();
//CURSOS
$("#aaltacurso").hide();
$("#baltacurso").hide();
$("#con_altacurso").hide();
$("#sin_altacurso").hide();

$("#acatalogo").hide();
$("#bcatalogo").hide();
$("#con_catalogo").hide();
$("#sin_catalogo").hide();

$("#aeditacurso").hide();
$("#beditacurso").hide();
$("#con_editacurso").hide();
$("#sin_editacurso").hide();

$("#aprocurso").hide();
$("#bprocurso").hide();
$("#con_procurso").hide();
$("#sin_procurso").hide();

$("#aprogramados").hide();
$("#bprogramados").hide();
$("#con_programados").hide();
$("#sin_programados").hide();

$("#adetallecurso").hide();
$("#bdetallecurso").hide();
$("#con_detallecurso").hide();
$("#sin_detallecurso").hide();

$("#apronostcurso").hide();
$("#bpronostcurso").hide();
$("#con_pronostcurso").hide();
$("#sin_pronostcurso").hide();

$("#acursosvincids").hide();
$("#bcursosvincids").hide();
$("#con_cursosvincids").hide();
$("#sin_cursosvincids").hide();

$("#anivelsatisf").hide();
$("#bnivelsatisf").hide();
$("#con_nivelsatisf").hide();
$("#sin_nivelsatisf").hide();

$("#amodifipondersat").hide();
$("#bmodifipondersat").hide();
$("#con_modifipondersat").hide();
$("#sin_modifipondersat").hide();

$("#ahistoriaconstanc").hide();
$("#bhistoriaconstanc").hide();
$("#con_historiaconstanc").hide();
$("#sin_historiaconstanc").hide();

//APARTADOS
$("#acalendario").hide();
$("#bcalendario").hide();
$("#con_calendario").hide();
$("#sin_calendario").hide();

$("#agantt").hide();
$("#bgantt").hide();
$("#con_gantt").hide();
$("#sin_gantt").hide();

$("#amonitoreo").hide();
$("#bmonitoreo").hide();
$("#con_monitoreo").hide();
$("#sin_monitoreo").hide();

$("#con_manual").hide();
$("#sin_manual").hide();

//OJT
$("#aojtprincipal").hide();
$("#bojtprincipal").hide();
$("#con_ojtprincipal").hide();
$("#sin_ojtprincipal").hide();

$("#aprocesoojtprin").hide();
$("#bprocesoojtprin").hide();
$("#con_procesoojtprin").hide();
$("#sin_procesoojtprin").hide();

$("#aprograojt").hide();
$("#bprograojt").hide();
$("#con_prograojt").hide();
$("#sin_prograojt").hide();

$("#aojtprogramds").hide();
$("#bojtprogramds").hide();
$("#con_ojtprogramds").hide();
$("#sin_ojtprogramds").hide();

$("#aaltacorinst").hide();
$("#baltacorinst").hide();
$("#con_altacorinst").hide();
$("#sin_altacorinst").hide();

$("#alistacorinst").hide();
$("#blistacorinst").hide();
$("#con_listacorinst").hide();
$("#sin_listacorinst").hide();
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


if(privilegio==1){// 1 SUPER_ADMIN
//PERSONAL
$("#con_altapersonl").show();
$("#con_altapersonlxtrn").show();
$("#con_altainstrucxtrn").show();
$("#con_nuevoingreso").show();
$("#con_listapersonl").show();
$("#con_asignacionpuesto").show();
$("#con_editausu").show();
$("#con_listainspctr").show();
$("#con_evalinspctor").show();
$("#con_apendice").show();
$("#con_listainstc").show();
$("#con_acceso1").show();
$("#con_ditarinspctr").show();
//INSPECTOR
$("#con_ojtalt").show();
//APARTADO
$("#con_calendario").show();
$("#con_gantt").show();
$("#con_monitoreo").show();        
$("#con_manual").show();
//CURSO
$("#con_altacurso").show();
$("#con_catalogo").show();
$("#con_editacurso").show();
$("#con_procurso").show();
$("#con_programados").show();
$("#con_detallecurso").show();
$("#con_pronostcurso").show();
$("#con_cursosvincids").show();    
$("#con_nivelsatisf").show();
$("#con_modifipondersat").show();
$("#con_historiaconstanc").show();
//OJT
$("#con_ojtprincipal").show();
$("#con_procesoojtprin").show();
$("#con_prograojt").show();
$("#con_ojtprogramds").show();
$("#con_altacorinst").show();
$("#con_listacorinst").show();

/////////
$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#5").removeClass('active');

$("#1").show('active');
$("#2").show('active');
$("#3").show('active');
$("#4").show('active');
$("#5").show('active');

$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide();  
$("#cinco").hide();  


}else
if(privilegio==2){ // 2 ADMINISTRADOR

//PERSONAL
$("#aaltapersonl").show();
$("#aaltapersonlxtrn").show();
$("#aaltainstrucxtrn").show();
$("#anuevoingreso").show();
$("#con_listapersonl").show();
$("#con_asignacionpuesto").show();
$("#aeditausu").show();
$("#con_listainspctr").show();
$("#con_evalinspctor").show();
$("#con_apendice").show();
$("#alistainstc").show();
$("#sin_acceso1").show();
$("#aditarinspctr").show();
//INSPECTOR
$("#con_ojtalt").show();
//APARTADO
$("#con_calendario").show();
$("#con_gantt").show();
$("#con_monitoreo").show();    
$("#con_manual").show();

//CURSO
$("#con_altacurso").show();
$("#con_catalogo").show();
$("#con_editacurso").show();
$("#con_procurso").show();
$("#con_programados").show();
$("#con_detallecurso").show();
$("#con_pronostcurso").show();
$("#con_cursosvincids").show();            
$("#con_nivelsatisf").show();
$("#con_modifipondersat").show();
$("#con_historiaconstanc").show();
//OJT
$("#con_ojtprincipal").show();
$("#con_procesoojtprin").show();
$("#con_prograojt").show();
$("#con_ojtprogramds").show();
$("#con_altacorinst").show();
$("#con_listacorinst").show();

////////////
$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#5").removeClass('active');       

$("#1").show('active');
$("#2").show('active');
$("#3").show('active');
$("#4").show('active');
$("#5").show('active');

$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide(); 
$("#cinco").hide(); 


}else

if(privilegio==3){// EJECUTIVO, DIRECTOR

//PERSONAL
$("#sin_altapersonl").show();
$("#sin_altapersonlxtrn").show();
$("#sin_altainstrucxtrn").show();
$("#con_nuevoingreso").show();
$("#con_listapersonl").show();
$("#con_asignacionpuesto").show();
$("#sin_editausu").show();
$("#con_listainspctr").show();
$("#con_evalinspctor").show();
$("#con_apendice").show();
$("#con_listainstc").show();
$("#sin_acceso1").show();
$("#sin_ditarinspctr").show();
//INSPECTOR
$("#con_ojtalt").show();
//APARTADO
$("#con_calendario").show();
$("#con_gantt").show();
$("#sin_monitoreo").show(); 
$("#con_manual").show();

//CURSO
$("#sin_altacurso").show();
$("#con_catalogo").show();
$("#sin_editacurso").show();
$("#sin_procurso").show();
$("#con_programados").show();
$("#sin_detallecurso").show();
$("#con_pronostcurso").show();
$("#con_cursosvincids").show();        
$("#sin_nivelsatisf").show();
$("#sin_modifipondersat").show();
$("#sin_historiaconstanc").show();
//OJT
$("#con_ojtprincipal").show();
$("#con_procesoojtprin").show();
$("#con_prograojt").show();
$("#con_ojtprogramds").show();
$("#con_altacorinst").show();
$("#con_listacorinst").show();

/////// 
$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#5").hide('active');

$("#1").show('active');
$("#2").show('active');
$("#3").show('active');
$("#4").show('active');
$("#5").hide('active');

$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide();     
$("#cinco").hide();     

}else
if(privilegio==4){ //  HUMANOS

//PERSONAL
$("#con_altapersonl").show();
$("#sin_altapersonlxtrn").show();
$("#sin_altainstrucxtrn").show();
$("#sin_nuevoingreso").show();
$("#con_listapersonl").show();
$("#sin_asignacionpuesto").show();
$("#con_editausu").show();

$("#sin_listainspctr").show();
$("#sin_evalinspctor").show();
$("#sin_apendice").show();
$("#sin_listainstc").show();
$("#sin_acceso1").show();
$("#sin_ditarinspctr").show();
//INSPECTOR
$("#sin_ojtalt").show();
//APARTADO
$("#con_calendario").show();
$("#con_gantt").show();
$("#sin_monitoreo").show(); 
$("#con_manual").show();
//CURSO
$("#con_altacurso").show();
$("#con_catalogo").show();
$("#con_editacurso").show();
$("#con_procurso").show();
$("#con_programados").show();
$("#con_detallecurso").show();
$("#sin_pronostcurso").show();
$("#sin_cursosvincids").show();        
$("#con_nivelsatisf").show();
$("#con_modifipondersat").show();
$("#sin_historiaconstanc").show();

$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#5").hide('active');

$("#1").show('active');
$("#2").show('active');
$("#3").show('active');
$("#4").show('active');
$("#5").hide('active');

$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide();
$("#cinco").hide();    
}else

if(privilegio==5){ //  ADMINISTRATIVO, INSPECTOR y NUEVO INGRESO

//INSPECTOR
$("#bojtalt").show();

//APARTADO
$("#con_calendario").show();
$("#sin_gantt").show();
$("#sin_monitoreo").show(); 
$("#con_manual").show();

$("#1").hide('active');
$("#2").addClass('active');
$("#3").hide('active');
$("#4").removeClass('active');
$("#5").hide('active');

$("#segunda").addClass('active tab-pane');
$("#primera").hide();
$("#segunda").show();
$("#tercera").hide();
$("#cuarto").hide();   
$("#cinco").hide();   
}else

if(privilegio==6){//  INSTRUCTOR

//PERSONAL
$("#sin_altapersonl").show();
$("#con_altapersonlxtrn").show();
$("#con_altainstrucxtrn").show();
$("#sin_nuevoingreso").show();
$("#con_listapersonl").show();
$("#sin_asignacionpuesto").show();
$("#sin_editausu").show();
$("#con_listainspctr").show();
$("#sin_evalinspctor").show();
$("#con_apendice").show();
$("#con_listainstc").show();
$("#sin_acceso1").show();
$("#sin_ditarinspctr").show();
//INSPECTOR
$("#con_ojtalt").show();
//CURSO
$("#con_altacurso").show();
$("#con_catalogo").show();
$("#con_editacurso").show();
$("#con_procurso").show();
$("#con_programados").show();
$("#con_detallecurso").show();
$("#con_pronostcurso").show();
$("#con_nivelsatisf").show();
$("#con_modifipondersat").show();
$("#con_historiaconstanc").show();

//APARTADO
$("#con_calendario").show();
$("#con_gantt").show();
$("#sin_monitoreo").show();
$("#con_manual").show();

$("#1").addClass('active');
$("#2").removeClass('active');
$("#3").removeClass('active');
$("#4").removeClass('active');
$("#5").removeClass('active');

$("#1").show('active');
$("#2").show('active');
$("#3").show('active');
$("#4").show('active');
$("#5").hide('active');

$("#primera").addClass('active tab-pane');
$("#primera").show();
$("#segunda").hide();
$("#tercera").hide();
$("#cuarto").hide();    
$("#cinco").hide();    

}


$.ajax({
    url: '../php/privilegios.php',
    type: 'POST',
    data: 'datos='+datos
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    for (i = 0; i < res.length; i++) {

        str = obj.data[i].acceso;
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