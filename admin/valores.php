<?php

$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$pais = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpais,gstPais FROM pais WHERE estado = 0";
$paises = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
$categ = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
$categs = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdeje,gstAreje FROM ejecutiva WHERE estado = 0";
$ejec = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdCom,gstCSigl,gstNombr,gstNocrt,gstRgion FROM comandancia WHERE estado = 0";
$uni = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpus,gstNpsto FROM puesto WHERE estado = 0";
$psto = mysqli_query($conexion,$sql);

$sql = "SELECT id_sub,descripsub,id_2_sub FROM subdireccion WHERE estado = 0";
$subdirec = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc = mysqli_query($conexion,$sql);


// $sql = "SELECT DISTINCT id_departamentos,descripdep,id_3_dep FROM departamentos";
// $depart = mysqli_query($conexion,$sql);

?>
<!-- NUEVA DISEÑO DE PRESENTACION -->

<script type="text/javascript" src="../js/accesos.js"></script>

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <div class="conteiner" style="background: #fbfbfb">
            <!-- Encabezado -->
            <div class="card-container" style="background: #fbfbfb">


                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <br>
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3><input type="text" style="font-size: 18px;  background:transparent"
                                    name="nombrecompleto" id="nombrecompleto" class="datas" disabled=""></h3>

                        </div>
                        <div class="widget-user-image">
                           <div id="foto"></div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <span class="description-text"></span>
                                        <h5><input type="text" name="cargopersonal" id="cargopersonal" class="datas disabled" disabled=""></h5>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-offset-0 col-sm-9" style="background: #fbfbfb">

                    <p class="text-center">
                        <strong> </strong>
                    </p><br><br>
                    <div class="col-sm-offset-1 col-md-10">
                        <div class="progress-group">
                            <span class="progress-text">CURSOS COMPLETADOS </span>
                            <span class="progress-number">
                                <div id="FINALIZADO"></div>
                            </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-green" id='porcentaje11' role="progressbar"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="">
                                    0% </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="col-sm-offset-1 col-md-10">
                        <div class="progress-group">
                            <span class="progress-text">CURSOS PROGRAMADOS EN PROCESO</span>
                            <span class="progress-number">
                                <div id="programado"></div>
                            </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-yellow" id='porcentaje12' role="progressbar"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="">
                                    0% </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="col-sm-offset-1 col-md-10">
                        <div class="progress-group">
                            <span class="progress-text">CURSOS DECLINADOS</span>
                            <span class="progress-number">
                                <div id="CANCELADO"></div>
                            </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-red" id='porcentaje13' role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="">
                                    0% </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <!-- /.progress-group -->
                </div>


                <div class="box-header" id="perosnas" style="display: none;">
                    <h1 class="box-title"></h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <a href='persona' style="font-size: 22px"><i class='fa fa-times'></i></a>
                        </button>
                    </div>
                </div>

                <div class="box-header" id="perosnasciaac" style="display: none;">
                    <h1 class="box-title"></h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <a href='personaciaac' style="font-size: 22px"><i class='fa fa-times'></i></a>
                        </button>
                    </div>
                </div>

                <div class="box-header" id="instructor" style="display: none;">
                    <h1 class="box-title"></h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <a href='instructor' style="font-size: 22px"><i class='fa fa-times'></i></a>
                        </button>
                    </div>
                </div>                                

            </div>
        </div>
    </div>
</div>

<!-- /FIN DE NUEVO DISEÑO -->
<div class="col-xs-12">
          <div class="box box-solid">
            <div id="check" class="box-header">
               <i class="fa fa fa-list"></i>

               <h3 class="box-title">Check list</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
                   </button>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body" style="display: none;">
            <div class="row">

                <!-- ./col -->


                <div id="perdoc"></div>

<!----------------------------------------------------------------->






              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<!-- DETALLE DECLINA CONVOCATORIA -->
<div class="modal fade" id='modal-declinado' tabindex="-1" role="dialog" aria-labelledby="basicModal"
                aria-hidden="true">
                <div class="modal1">

                    <div id="success-icon">
                        <div>
                            <img class="img-circle1" src="../dist/img/declinado.png">
                        </div>
                    </div>
                    <h1 class="modaltitle" style="color:gray"><strong>DETALLES</strong></h1>
                    <label id="cursdeclina" style="font-size: 16px; color:gray" for=""></label>
                    <label id="declindet" style="font-size: 18px; color:gray; font-weight: normal;"
                        class="points">Declina la convocatoria del curso:</label>
                    <label id="nombredeclin" style="font-size: 18px; color:gray; font-weight: normal;" for=""></label>
                    <br>
                    <label id="motivod" style="font-size: 18px; color:#2B2B2B; font-weight: blod;" for=""></label>
                    <hr>
                    <a id="declinpdf" class="btn btn-block btn-social btn-linkedin" href="" id="pdfdeclin"
                        style="text-align: center;"> <i class="fa fa-file-pdf-o"></i> VISUALIZAR EL PDF ADJUNTO</a>
                    <label readonly id="otrosd" name="textarea"
                        style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3"
                        cols="50"></label>
                </div>
                <script>

                </script>
            </div>
<!--FIN DETALLE DECLINA CONVOCATORIA -->

<!-- DISEÑO ANTIGUO/.col -->
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <!-- DISEÑO ANTIGUO/.col -->
        <div class="box-tools pull-right">
            <button id="editarperfil" type="button" class="btn btn-box-tool" data-widget="collapse">
                <a href='javascript:openEdit()' id="cerrar" style="font-size:22px"> <i class="fa fa-edit"></i> </a>
                <a href='javascript:cerrarEdit()' id="cerrar1" style="display:none; font-size: 22px"> <i
                        class="fa fa-ban"></i> </a>
            </button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove">
<a onclick="location.href='./'"><i class='fa fa-times'></i></a>
</button> -->
        </div>
        <ul class="nav nav-tabs" style="font-size: 14px;">
            <li class="active"><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
            <li><a href="#puesto" data-toggle="tab">DATOS DEL PUESTO</a></li>
            <li><a href="#estudios" data-toggle="tab">HISTORIAL ACADEMICO</a></li>
            <li><a href="#experiencia" data-toggle="tab">EXPERIENCIA PROFESIONAL</a></li>
            <li><a href="#obligatorio" data-toggle="tab" id="ocultar1">CURSOS OBLIGATORIOS </a></li>
            <li><a href="#curso" data-toggle="tab" id="ocultar2">CURSOS PROGRAMADOS</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                    <form id="Dtall" class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="gstIdper" id="gstIdper">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>NOMBRE(S)</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstNombr" name="gstNombr">
                            </div>
                            <div class="col-sm-4">
                                <label>APELLIDO(S)</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstApell" name="gstApell">
                            </div>
                            <div class="col-sm-4">
                                <label>LUGAR DE NACIMIENTO</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstLunac" name="gstLunac">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>FECHA DE NACIMIENTO</label>
                                <input type="date" disabled="" class="form-control" id="gstFenac" name="gstFenac">
                            </div>

                            <div class="col-sm-4">
                              <label class="label2">SEXO</label>
                              <select type="text" class="form-control inputalta" id="gstSexo" name="gstSexo" disabled="">
                                  <option value="">ELEGIR SEXO</option>
                                 <option value="MUJER">MUJER</option>
                                 <option value="HOMBRE">HOMBRE</option>
                              </select>
                            </div>

                            <div class="col-sm-4">
                                <label>ESTADO CIVIL</label>
                                <select type="text" disabled="" class="form-control" id="gstStcvl" name="gstStcvl">
                                    <option value="">ESTADO CIVIL</option>
                                    <option value="CASADO">CASADO</option>
                                    <option value="SOLTERO">SOLTERO</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            
                            <div class="col-sm-4">
                                <label>CURP</label>
                                <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstCurp" name="gstCurp">
                            </div>

                            <div class="col-sm-4">
                                <label>RFC</label>
                                <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstRfc" name="gstRfc">
                            </div>

                            <div class="col-sm-4">
                               <label class="label2">NÚMERO DE ISSSTE</label>
                               <input type="type" class="form-control" id="gstisst" name="gstisst" disabled="">
                            </div>

                        </div>
                        <div class="form-group">

                            <div class="col-sm-3">
                                <label>PASAPORTE NO.</label>
                                <input type="number" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstNpspr" name="gstNpspr">
                            </div>

                            <div class="col-sm-3">
                                <label>PASAPORTE VIGENCIA</label>
                                <input type="date" disabled="" class="form-control" id="gstPsvig" name="gstPsvig">
                            </div>                            <div class="col-sm-3">
                                <label>VISA PAIS</label>
                                <input type="text" disabled="" class="form-control" id="gstVisa" name="gstVisa">
                            </div>
                            <div class="col-sm-3">
                                <label>VISA VIGENCIA</label>
                                <input type="date" disabled="" class="form-control" id="gstVignt" name="gstVignt">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <H4><i class="fa  ion-android-pin"></i>
                                        <label> DOMICILIO</label>
                                    </H4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CALLE</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstCalle" name="gstCalle">
                            </div>
                            <div class="col-sm-4">
                                <label>NÚMERO</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstNumro" name="gstNumro">
                            </div>
                            <div class="col-sm-4">
                                <label>COLONIA</label>
                                <input type="text" disabled="" style="text-transform:uppercase" class="form-control"
                                    id="gstClnia" name="gstClnia">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CÓDIGO POSTAL</label>
                                <input type="number" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstCpstl" name="gstCpstl">
                            </div>

                            <div class="col-sm-4">
                                <label>CIUDAD</label>
                                <input type="text" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstCiuda" name="gstCiuda">
                            </div>

                            <div class="col-sm-4">
                                <label>ESTADO</label>
                                <input type="text" disabled="" style="text-transform:uppercase" class="form-control"
                                    id="gstStado" name="gstStado">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <H4><i class="fa   fa-dot-circle-o"></i>
                                        <label> CONTACTO</label>
                                    </H4>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CASA</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input disabled="" type="tel" class="form-control"
                                        data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                        data-mask id="gstCasa" name="gstCasa">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>CELULAR</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input disabled="" type="tel" class="form-control"
                                        data-inputmask='"mask": "(99) 999-9999"' data-mask id="gstClulr"
                                        name="gstClulr">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>EXTENSION Ó NÚMERO TELEFONICO</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input disabled="" type="text" class="form-control"
                                        data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                        data-mask id="gstExTel" name="gstExTel">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CORREO PERSONAL</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input disabled="" type="email" class="form-control" placeholder="Correo"
                                        id="gstCorro" name="gstCorro">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>CORREO INSTITUCIONAL</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input disabled="" type="email" class="form-control" placeholder="Correo"
                                        id="gstCinst" name="gstCinst">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>CORREO ALTERNATIVO</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input disabled="" type="email" class="form-control" placeholder="Correo"
                                        id="gstSpcID" name="gstSpcID">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="buton" style="display: none;"><br>
                            <div class="col-sm-offset-0 col-sm-2">
                                <button type="button" id="button" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="actDatos();"> 
                                    ACTUALIZAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="danger">Error al actualizar
                                    datos </p>
                            </b>
                            <b>
                                <p class="alert alert-success text-center padding exito" id="succe">¡Se actualizaron los
                                    datos con éxito!</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar
                                    los datos que se solicitan </p>
                            </b>
                        </div>

                    </form>
                </div>
            </div>
<!--------------------DATOS DEL PUESTO------------------------------->

            <div class="tab-pane" id="puesto">

                <form id="Pusto" class="form-horizontal" action="" method="POST">
                    <input type="hidden" name="pstIdper" id="pstIdper">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label>NÚMERO DE EMPLEADO</label>
                            <input type="number" disabled="" class="form-control" id="gstNmpld" name="gstNmpld">
                        </div>

                        <div class="col-sm-4">
                            <label>FECHA INGRESO A LA SCT</label>
                            <input disabled="" type="date" class="form-control" id="gstFeing" name="gstFeing">
                        </div>

                        <div class="col-sm-4">
                            <label class="label2">OBSERVACIONES</label>
                            <input disabled="" type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstSigID" name="gstSigID">
                        </div>

                    </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label class="label2">CODIGO RHnet</label>
                       <input type="text" class="form-control inputalta" id="sgtCrhnt" name="sgtCrhnt" onkeyup="mayus(this);" disabled="">
                    </div>
                    <div class="col-sm-4">
                       <label class="label2">ID RUSP</label>
                       <input type="text" class="form-control inputalta" id="gstRusp" name="gstRusp" onkeyup="mayus(this);" disabled="">
                    </div>  
                    <div class="col-sm-4">
                    <label class="label2">ID DE PLAZA</label>
                    <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstPlaza" name="gstPlaza" disabled="">
                    </div>  
                    </div>                    

                    <p id="codigo" style="display: none; cursor: pointer;"><a onclick="codigo();"> EDITAR CÓDIGO
                            PRESUPUESTAL <i class="fa fa-edit"></i></a></p>

                    <div id="codigo1">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CÓDIGO PRESUPUESTAL</label>
                                <input type="text" class="form-control" name="Codig" id="Codig" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label>ID PUESTO (NIVEL TABULAR)</label>
                                <input type="text" class="form-control" name="Nivel" id="Nivel" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label>NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span> (GENERICO)</label>
                                <input type="text" class="form-control" name="Gnric" id="Gnric" disabled="">
                            </div>
                        </div>
                    </div>


                    <div id="codigo2" style="display: none;">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>CÓDIGO PRESUPUESTAL</label>
                                <div id="actualiza"></div>
                            </div>
                            <div id="select1"></div>
                        </div>
                    </div>

                    <p id="nompusto" style="display: none; cursor: pointer;"><a onclick="nompusto();"> EDITAR NOMBRE DEL
                            PUESTO <i class="fa fa-edit"></i></a>

                    </p>

                    <div class="form-group">

                        <div class="col-sm-12" id="nompusto1">
                            <label>NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span></label>
                            <input type="text" class="form-control" name="nompuesto" id="nompuesto" disabled="">
                        </div>

                        <div class="col-sm-12" id="nompusto2" style="display: none;">
                            <label>NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span></label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstPstID"
                                id="gstPstID" type="text" data-live-search="true">
                                <option>SELECCIONE NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span></option>
                                <?php while($pust = mysqli_fetch_row($psto)):?>
                                <option value="<?php echo $pust[0]?>"><?php echo $pust[1]?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div id="spcialidad1">
                            <div class="col-sm-4">
                                <input type="hidden" class="form-control" id="spcialidad" name="spcialidad" value="0">
                            </div>
                            <div class="col-sm-3">
                                <input type="hidden" class="form-control" id="sigla" name="sigla" value="0">
                            </div>
                        </div>
                        <div id="spcialidad2" style="display: none;">
                            <div id="actoaci"></div>
                            <div id="siglas"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <H4><i class="fa   fa-dot-circle-o"></i>
                                    <label> INFORMACIÓN DE ADSCRIPCIÓN </label>
                                </H4>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <p id="ejecutiva" style="display: none; cursor: pointer;"><a onclick="ejecutiva();">EDITAR
                                    DIRECCIÓN EJECUTIVA / DIRECCIÓN DE ÁREA <i class="fa fa-edit"></i></a></p>
                            <p id="ejecutiva1">
                                <label>DIRECCIÓN EJECUTIVA / DIRECCIÓN DE ÁREA </label>
                                <input type="text" name="ejcutiva" id="ejcutiva" class="form-control" disabled="">
                            </p>
                            <p id="ejecutiva2" style="display: none;">
                                <label>DIRECCIÓN EJECUTIVA / DIRECCIÓN DE ÁREA </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstAreID"
                                     id="gstAreID" type="text" data-live-search="true">
                                    <option>SELECCIONE DIRECCIÓN EJECUTIVA / DIRECCIÓN DE ÁREA</option>
                                    <?php while($ejct = mysqli_fetch_row($ejec)):?>
                                    <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                                    <?php endwhile; ?>
                                </select>
                            </p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                            <p id="adscrip" style="display: none; cursor: pointer;"><a onclick="adscripcion();">EDITAR
                                    DIRECCIÓN DE ÁREA <i class="fa fa-edit"></i></a></p>
                            <p id="adscrip1">
                                <label>DIRECCIÓN DE ÁREA </label>
                                <input type="text" name="adscripcion" id="adscripcion" class="form-control" disabled="">
                            </p>
                            <p id="adscrip2" style="display: none;">
                                <label>DIRECCIÓN DE ÁREA </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara"
                                     id="gstIDara" type="text" data-live-search="true">
                                    <option>SELECCIONE DIRECCIÓN DE ÁREA</option>
                                    <?php while($ccion = mysqli_fetch_row($direc)):?>                      
                    <option value="<?php echo $ccion[0]?>"><?php echo $ccion[1]?></option>
                    <?php endwhile; ?>
                    </select>
                            </p>
                        </div>

                    </div>
     

                    

                    <div class="form-group">
                    <div class="col-sm-12">
                            <p id="subdirec1" style="display: none; cursor: pointer;"><a onclick="subdireccion();">EDITAR
                            ÁREA, SUBDIRECCIÓN Y/O AEROPUERTO <i class="fa fa-edit"></i></a></p>
                            <div id="subdirec2">
                        <label>ÁREA, SUBDIRECCIÓN Y/O AEROPUERTO </label>
                        <input type="text" name="subdir1" id="subdir1" class="form-control" disabled="">

                        <label>DEPARTAMENTO </label>
                        <input type="text" name="departam" id="departam" class="form-control" disabled="">

                            </div>
                            <div id="subdirec3" style="display: none;">


                        <div class="form-group">
                        <div class="col-sm-12">
                        <label class="label2">ÁREA, SUBDIRECCIÓN Y/O AEROPUERTO</label>
                        <div id="subdireact"></div>                            
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-12">
                        <label class="label2">DEPARTAMENTO</label>
                        <div id="departact"></div> 
                        </div>   
                        </div>
                         </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <H4><i class="fa   fa-suitcase"></i>
                                    <label> FUNCIÓN DEL EMPLEADO</label>
                                </H4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>ESPECIALIDAD</label>     
                            <div id="especialidades"></div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>CARGO</label>
                            <select type="text" disabled="" class="form-control" id="gstCargo" name="gstCargo">
                                <option value="">SELECCIONA EL CARGO</option>
                                <option value="NUEVO INGRESO">NUEVO INGRESO</option>
                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                <option value="COORDINADOR">COORDINADOR</option>
                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="INSTRUCTOR">INSTRUCTOR</option>
                                <option value="COMISIONADO">COMISIONADO</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label2">UBICACIÓN CENTRAL</label> 
                            <select style="width: 100%" disabled="" class="form-control" class="selectpicker" id="gstNucrt" name="gstNucrt"type="text" data-live-search="true">  
                                <option value="0">SELECCIONE LA UBICACIÓN CENTRAL</option>
                                <option value="AICM T1">AICM T1</option>
                                <option value="AICM T2">AICM T2</option>
                                <option value="HANGAR 8">HANGAR 8</option>
                                <option value="CIACC">CIACC</option>
                                <option value="LICENCIAS">LICENCIAS</option>
                                <option value="FLORESM1">LAS FLORES M1</option>
                                <option value="FLORESM2">LAS FLORES M2</option>
                                <option value="FLORESP1">LAS FLORES PISO 1</option>
                                <option value="FLORESP2">LAS FLORES PISO 2</option>
                                <option value="FLORESP3">LAS FLORES PISO 3</option>
                                <option value="FLORESP4">LAS FLORES PISO 4</option>
                                <option value="FLORESP5">LAS FLORES PISO 5</option>
                                <option value="FLORESP6">LAS FLORES PISO 6</option>
                                <option value="FLORESP7">LAS FLORES PISO 7</option>
                                <option value="FLORESP8">LAS FLORES PISO 8</option>
                                <option value="FLORESPH">LAS FLORES PH</option>
                                <option value="NO APLICA<">NO APLICA</option>
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="gstComnd" id="gstComnd">
                    <input type="hidden" name="gstIDuni" id="gstIDuni">

                    <div class="form-group">
                        <input type="hidden" name="gstIDCat" id="gstIDCat" value="0">
<!-- 
                        <input type="hidden" name="gstIDSub" id="gstIDSub" value="0"> -->


                    </div>
                    <div class="form-group">

                    </div>

                        <div class="form-group" id="butons" style="display: none;"><br>
                        <div class="col-sm-offset-0 col-sm-2">
                            <button type="button" id="button" title="Dar click para guardar los cambios" style="background-color:#052E64; border-radius:10px;" class="btn btn-block btn-primary" onclick="actPuesto();">ACTUALIZAR</button>
                        </div>
                        <b>
                            <p class="alert alert-danger text-center padding error" id="danger1">Error al actualizar
                                datos </p>
                        </b>
                        <b>
                            <p class="alert alert-success text-center padding exito" id="succe1">¡Se actualizaron los
                                datos con éxito!</p>
                        </b>

                        <b>
                            <p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar
                                los datos que se solicitan </p>
                        </b>
                    </div>
                </form>
            </div>
<!----------------------------------------------------------------------------->            
            <div class="tab-pane" id="estudios">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <H4>
                                <label>ULTIMO GRADO DE ESTUDIOS </label>
                            </H4>
                        </div>
                    </div>
                    <div id="studios"></div>
                </form>
            </div>
            <div class="tab-pane" id="experiencia">
                <form class="form-horizontal">
                    <div id="profsions"></div>
                </form>
            </div>

            <!------------------------------------------->
            <div class="tab-pane" id="obligatorio">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cursos obligatorios</h3>
                                </div>
                                <div class="box-body">
                                    <div id="cursosObligados"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!---------------------------------------------------------------------------------------------------------------->
            <div class="tab-pane" id="curso">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">CURSOS PROGRAMADOS</h3>
                                    <input id="fecomp1" style='display:none' type="text">
                                </div>
                                <table class="display table table-striped table-bordered dataTable"
                                        id="data-table-cursosProgramados2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>FOLIO</th>
                                                <th>TÍTULO</th>
                                                <th>TIPO</th>
                                                <th>INICIO</th>
                                                <th>HORA</th>
                                                <th>FINAL</th>
                                                <th>ASISTENCIA</th>
                                                <th>VIGENCIA</th>
                                                <th>PROCESO</th>
                                            </tr>
                                        </thead>
                                </table>
                                <div class="box-body">
                                    <?php include('../html/gesCurso.html');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
            <script>
                            window.onload = function() {
                            var fecha = new Date(); //Fecha actual
                            var mes = fecha.getMonth() + 1; //obteniendo mes
                            var dia = fecha.getDate(); //obteniendo dia
                            var ano = fecha.getFullYear(); //obteniendo año
                            if (dia < 10)
                                dia = '0' + dia; //agrega cero si el menor de 10
                            if (mes < 10)
                                mes = '0' + mes //agrega cero si el menor de 10
                            document.getElementById('fecomp1').value = ano + "-" + mes + "-" + dia;
                        }
            </script>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#gstIDara').select2();
    //$('#gstIDCat').select2();
    //$('#gstIDSub').select2();
    //$('#gstIDuni').select2();
    $('#gstAreID').select2();
    $('#AgstPstID').select2();
    $('#gstIDpai').select2();
    $('#AgstIDpai').select2();
    $('#actualiza').load('select/actualiza.php');
    $('#select1').load('select/tabla.php');
    $('#actoaci').load('select/actoaci.php');
    $('#siglas').load('select/siglas.php');
    $('#comandancia').load('select/actbuscacom.php');
    $('#select2').load('select/acttablacom.php');
    $('#subdireact').load('select/buscardepartact.php'); //Subdirección
    $('#departact').load('select/tabladepact.php'); //departamento



});
</script>
<script src="../js/select2.js"></script>