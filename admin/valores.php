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

 
// $sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
// $cat = mysqli_query($conexion,$sql);

// $sql = "SELECT  gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
// $sub1 = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdCom,gstCSigl,gstNombr,gstNocrt,gstRgion FROM comandancia WHERE estado = 0";
$uni = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpus,gstNpsto FROM puesto WHERE estado = 0";
$psto = mysqli_query($conexion,$sql);

?>
<!-- NUEVA DISEÑO DE PRESENTACION -->
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
                            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <span class="description-text"></span>
                                        <h5><input type="text" name="cargopersonal" id="cargopersonal"
                                                class="datas disabled" disabled=""></h5>
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
                <div class="box-header">
                    <h1 class="box-title"></h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <a href='persona.php' style="font-size: 22px"><i class='fa fa-times'></i></a>
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
            <div class="box-header">
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
<div style="padding-top: 5px;" class="col-md-12">
    <div class="nav-tabs-custom">
            <form id="Dtall" class="form-horizontal" action="" method="POST">
                <input type="hidden" name="gstIdper" id="gstIdper">
                <table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" style="width:300px;">DOCUMENTO</th>
                            <th scope="col" style="width:150px;">ESTATUS</th> 
                            <th scope="col">ACCIONES</th> 
                            <th scope="col">DOCUMENTO ADJUNTO</th>
                            <th scope="col">FECHA DE ACTUALIZACION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1)</th>
                            <td>ACTA DE NACIMIENTO</td>
                            <td><img src="../dist/img/advertir.svg" alt="YES" width="25px;"></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            
                        </td>
                            <td></td>
                            
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2)</th>
                            <td>RFC</td>
                            <td><div id="rfc1"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr> 
                            <th scope="row">3)</th>
                            <td>CURP</td>
                            <td><div id="curp1"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4)</th>
                            <td>CARTILLA MILITAR Y HOJA DE LIBERACIÓN </td>
                            <td><div id="cartilla"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5)</th>
                            <td>COMPROBANTE DE DOMICILIO</td>
                            <td><div id="domicilio"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                           <th scope="row">6)</th>
                            <td>CLABE INTERBANCARIA</td>
                            <td><div id="claverh"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">7)</th>
                            <td>CONSTANCIA ACADÉMICA</td>
                            <td><div id="estudios1"></div></td>
                            <td><div id="Bfecha"></div></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">8)</th>
                            <td>CURRICULUM VITAE</td>
                            <td><div id="curriculum1"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">9)</th>
                            <td>CONSTANCIAS LABORALES</td>
                            <td><div id="specifico"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">10)</th>
                            <td>CERTIFICADO MÉDICO</td>
                            <td><div id="cmedico"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">11)</th>
                            <td>3 FOTOGRAFÍAS TAMAÑO INFANTIL A COLOR</td>
                            <td><div id="fotos"></div></td>
                            <td><a type="button" class="asiste btn btn-default" title="Subir documento" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload text-info"></i></a><a type="button" title="Actualizar documento" onclick="adjunuevo();" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    </table>
            </form>
           
</div>
</div>




              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<!-- DETALLE DECLINA CONVOCATORIA -->
<div class="modal fade" id='modal-declinadop'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal1">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/declinado.png">
    </div>
  </div>
  <h1 class="modaltitlep" style="color:gray"><strong>DETALLES</strong></h1>
  <label id="cursdeclinap" style="font-size: 16px; color:gray"  for=""></label>
  <label id="declindetp" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declina la convocatoria del curso:</label>
  <label id="nombredeclinp" style="font-size: 18px; color:gray; font-weight: normal;"  for=""></label>
  <br>
  <label id="motivodp" style="font-size: 18px; color:#2B2B2B; font-weight: blod;"  for=""></label>
  <hr>
  <a id="declinpdfp" class="btn btn-block btn-social btn-linkedin" href="" id="pdfdeclinp" style="text-align: center;"> <i class="fa fa-file-pdf-o"></i> VISUALIZAR EL PDF ADJUNTO</a>
  <label readonly id="otrosdp" name="textarea" style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>
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
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
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
                                <label>ESTADO CIVIL</label>
                                <select type="text" disabled="" class="form-control" id="gstStcvl" name="gstStcvl">
                                    <option value="">ESTADO CIVIL</option>
                                    <option value="CASADO">CASADO</option>
                                    <option value="SOLTERO">SOLTERO</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>CURP</label>
                                <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstCurp" name="gstCurp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>RFC</label>
                                <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstRfc" name="gstRfc">
                            </div>

                            <div class="col-sm-4">
                                <label>PASAPORTE NO.</label>
                                <input type="number" disabled="" style="text-transform:uppercase;" class="form-control"
                                    id="gstNpspr" name="gstNpspr">
                            </div>

                            <div class="col-sm-4">
                                <label>PASAPORTE VIGENCIA</label>
                                <input type="date" disabled="" class="form-control" id="gstPsvig" name="gstPsvig">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>VISA PAIS</label>
                                <input type="text" disabled="" class="form-control" id="gstVisa" name="gstVisa">
                            </div>
                            <div class="col-sm-4">
                                <label>VISA VIGENCIA</label>
                                <input type="date" disabled="" class="form-control" id="gstVignt" name="gstVignt">
                            </div>
<!--                             <div class="col-sm-4">
                                <label>NÚMERO DE CARTILLA</label>
                                <input type="text" disabled="" style="text-transform:uppercase" class="form-control"
                                    id="gstNucrt" name="gstNucrt">
                            </div> -->
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
                                <input type="number" disabled="" style="text-transform:uppercase;" class="form-control"
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
                            <div class="col-sm-offset-0 col-sm-5">
                                <button type="button" id="button" class="btn btn-info btn-lg" onclick="actDatos();">
                                    ACEPTAR</button>
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
                            <label>FECHA INGRESO A LA AFAC</label>
                            <input disabled="" type="date" class="form-control" id="gstFeing" name="gstFeing">
                        </div>

                        <div class="col-sm-4">
                            <label class="label2">ESTATUS ALTA PERSONAL</label>
                            <input disabled="" type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstSigID" name="gstSigID">
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
                                <label>NOMBRE DEL PUESTO (GENERICO)</label>
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
                        <!-- <b style="margin-left: 19em;"></b> -->
                        <!-- <a onclick="especialidads();">EDITAR ESPECIALIDAD OACI PERSONAL TÉCNICO <i
                                class="fa fa-edit"></i></a> -->
                    </p>

                    <div class="form-group">

                        <div class="col-sm-12" id="nompusto1">
                            <label>NOMBRE DEL PUESTO</label>
                            <input type="text" class="form-control" name="nompuesto" id="nompuesto" disabled="">
                        </div>

                        <div class="col-sm-12" id="nompusto2" style="display: none;">
                            <label>NOMBRE DEL PUESTO</label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstPstID"
                                id="gstPstID" type="text" data-live-search="true" disabled="">
                                <option>SELECCIONE NOMBRE DEL PUESTO</option>
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



                    <!-- <div class="form-group">

<div id="oaci"></div>
<div id="siglas"></div>                                
</div> -->
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
                                    DIRECCIÓN EJECUTIVA <i class="fa fa-edit"></i></a></p>
                            <p id="ejecutiva1">
                                <label>DIRECCIÓN EJECUTIVA </label>
                                <input type="text" name="ejcutiva" id="ejcutiva" class="form-control" disabled="">
                            </p>
                            <p id="ejecutiva2" style="display: none;">
                                <label>DIRECCIÓN EJECUTIVA </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstAreID"
                                    disabled="" id="gstAreID" type="text" data-live-search="true">
                                    <option>SELECCIONE DIRECCIÓN EJECUTIVA</option>
                                    <?php while($ejct = mysqli_fetch_row($ejec)):?>
                                    <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
                                    <?php endwhile; ?>
                                </select>
                            </p>
                        </div>

                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                            <p id="adscrip" style="display: none; cursor: pointer;"><a onclick="ejecutiva();">EDITAR
                                    DIRECCIÓN DE ADSCRIPCIÓN <i class="fa fa-edit"></i></a></p>
                            <p id="adscrip1">
                                <label>DIRECCIÓN DE ADSCRIPCIÓN </label>
                                <input type="text" name="adscripción" id="adscripción" class="form-control" disabled="">
                            </p>
                            <p id="adscrip2" style="display: none;">
                                <label>DIRECCIÓN DE ADSCRIPCIÓN </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara"
                                    disabled="" id="gstIDara" type="text" data-live-search="true">
                                    <option>SELECCIONE DIRECCIÓN DE ADSCRIPCIÓN</option>
                                    <?php while($ejct = mysqli_fetch_row($ejec)):?>
                                        <option value="<?php echo $ccion[0]?>"><?php echo $ccion[1]?></option>
                                    <?php endwhile; ?>
                                    </select>
                            </p>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-12">
                            <label>SUBDIRECCIÓN</label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstsundireccion"
                                id="gstsundireccion" type="text" data-live-search="true" disabled="">
                                <option value="">SELECCIONE LA SUBDIRECCIÓN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-12">
                            <label>DEPARTAMENTO</label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara"
                                id="gstIDara" type="text" data-live-search="true" disabled="">
                                <option value="">SELECCIONE EL DEPARTAMENTO</option>
                                <?php while($rea = mysqli_fetch_row($are)):?>
                                <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <H4><i class="fa   fa-suitcase"></i>
                                    <label> FUNCIÓN DEL EMPLEADO </label>
                                </H4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>CARGO</label>
                            <select type="text" disabled="" class="form-control" id="gstCargo" name="gstCargo">
                                <option value="INSTRUCTOR">INSTRUCTOR</option>
                                <option value="COORDINADOR">COORDINADOR</option>
                                <option value="NUEVO INGRESO">NUEVO INGRESO</option>
                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                            </select>
                        </div>
                      
                        <div class="col-sm-6">
                            <label class="label2">UBICACIÓN CENTRAL</label> 
                            <select style="width: 100%" disabled="" class="form-control" class="selectpicker" id="gstNucrt" name="gstNucrt"type="text" data-live-search="true">
                               <option value="CIAAC">CIAAC</option> 
                               <option value="LAS FLORES">LAS FLORES</option> 
                               <option value="ANGAR 8">ANGAR 8</option> 
                               <option value="LICENCIA">LICENCIAS</option>
                            </select>
                        </div>

                    </div>



                    <div class="form-group">
                        <input type="hidden" name="gstIDCat" id="gstIDCat" value="0">
                        <!--          <div class="col-sm-6">
             <label>CATEGORIA</label>
             <select style="width: 100%" class="form-control" disabled="" class="selectpicker" name="gstIDCat" id="gstIDCat" type="text" data-live-search="true">
                 <?php //while($idcat = mysqli_fetch_row($cat)):?>                      
                 <option value="<?php //echo $idcat[0]?>"><?php//echo $idcat[1];?></option>
                 <?php //endwhile; ?>
            </select>
         </div> -->
                        <input type="hidden" name="gstIDSub" id="gstIDSub" value="0">
                        <!-- <div class="col-sm-6">
            <label>SUB CATEGORIA</label>
            <select style="width: 100%" disabled="" class="form-control" class="selectpicker" name="gstIDSub" id="gstIDSub" type="text" data-live-search="true">
              <option value="">SELECCIONA LA SUB CATEGORÍA</option>
              <option value="0">NO APLICA</option>
              <?php //while($idsub1 = mysqli_fetch_row($sub1)):?>                      
              <option value="<?php //echo $idsub1[0]?>"><?php //echo $idsub1[1];?></option>
              <?php //endwhile; ?>
            </select>
         </div> -->

                    </div>
                    <div class="form-group">
                        <!--      <div class="col-sm-12">
        <label>ESPECIALIDAD</label>         
           <select style="width: 100%" class="form-control" class="selectpicker" name="gstespecialidad" disabled="" id="gstespecialidad" type="text" data-live-search="true" >
           <option value="">SELECCIONA LA ESPECIALIDAD</option>
           </select>
         </div>  -->
                    </div>

                    <input type="hidden" name="gstAcReg" id="gstAcReg">

                    <!-- <div class="form-group">
<div class="col-sm-4">
<label>SELECCIONE COMANDANCIA</label>
<div id="comandancia"></div>                            
</div>
<div class="col-sm-8">
<label>SELECCIONE AEROPUERTOS</label>
<div id="select2"></div> 
</div>
</div>   -->
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
                                    <div id="obligados"></div>
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
                                    <h3 class="box-title">Cursos programados</h3>
                                    <input id="fecomp1" style='display:none' type="text">
                                </div>
<!--                                 <div class="form-group">
                                    <div class="col-sm-2">
                                        <input type="radio" id="finalizado" name="cursinfoinsp" value="finalizado">
                                        <label for="finalizado">FINALIZADO</label><br>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" id="programados" name="cursinfoinsp" value="programados">
                                        <label for="programados">PROGRAMADOS</label><br>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" id="cancelados" name="cursinfoinsp" value="cancelados">
                                        <label for="cancelados">CANCELADOS</label><br>
                                    </div>
                                </div> -->
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
    $('#gstIDuni').select2();
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
});
</script>
<script src="../js/select2.js"></script>