<?php
 
$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
$cat = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
$sub1 = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdCom,gstRgion,gstNombr FROM comandancia WHERE estado = 0";
$unidad = mysqli_query($conexion,$sql);

$sql="SELECT gstIdAir,gstCSigl,gstUnid1,gstUnid2,gstRgion FROM aeropuertos";
$resulta=mysqli_query($conexion,$sql);



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
                                        <span class="description-text"></span>
                                        <h3><input type="text" style="font-size: 18px;  background:transparent"
                                                name="insparea" id="insparea" class="datas" disabled=""></h3>
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
                            <div class="progress-bar progress-bar-green" id='porcentaje11' role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="">
                                0% </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="col-sm-offset-1 col-md-10">
                        <div class="progress-group">
                            <span class="progress-text">CURSOS PROGRAMADOS</span>
                            <span class="progress-number">
                                <div id="programado"></div>
                            </span>
                            <div class="progress">
                            <div class="progress-bar progress-bar-yellow" id='porcentaje12' role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="">
                             0% </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="col-sm-offset-1 col-md-10">
                        <div class="progress-group">
                            <span class="progress-text">CURSOS CANCELADOS</span>
                            <span class="progress-number">
                            <div id="CANCELADO"></div>
                            </span>
                            <div class="progress">
                            <div class="progress-bar" id='porcentaje13' role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="">
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
                            <a href='inspecion.php' style="font-size: 22px"><i class='fa fa-times'></i></a>
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
                   <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <div class="row">

                <!-- ./col -->
<div style="padding-top: 5px;" class="col-md-12">
    <div class="nav-tabs-custom">
            <form id="Dtall" class="form-horizontal" action="" method="POST">
                <input type="hidden" name="gstIdper" id="gstIdper">
                <table style="width: 100%;" class="table table-striped table-hover center" >
                    <thead>
                        <tr>
                            <th scope="col">INCISO</th>
                            <th scope="col" style="width: 600px;">DOCUMENTO</th>
                            <th scope="col">CUMPLE</th> 
                            <th scope="col">FECHA DE REVISIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">A)</th>
                            <td>HOJA DE REGISTRO DEL INSTITUTO FEDERAL DE ACCESO A LA INFORMACIÓN PUBLICA (IFAI)</td>
                            <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td></td>

                        </tr>
                        <tr>
                            <th scope="row">B)</th>
                            <td>CÉDULA DE EVALUACIÓN DE CAPACIDAD</td>
                            <td><div id="evaluaciones"></div></td>
                            <td></td>

                        </tr>
                        <tr>
                            <th scope="row">C)</th>
                            <td>CURRICULUM VITAE. (requisitado y firmado)</td>
                            <td><div id="profesions"></div></td>
                            <td></td>


                        </tr>
                        <tr>
                            <th scope="row">D)</th>
                            <td>CONSTANCIA ACADÉMICA (a.Licenciatura o ingeniería, b.Licencia técnica aeronautica)</td>
                            <td><div id="estudios"></div></td>
                            <td></td>

                        </tr>
                        <tr>
                            <th scope="row">F)</th>
                            <td>FORMATO DE EVALUACIÓN DEL ENTRENAMIENTO EN EL PUESTO DE TRABAJO (OJT)</td>
                            <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">G)</th>
                            <td>COPIA DE LOS CERTIFICADOS DE ENTRENAMIENTO RECIBIDO POR PARTE DE LA AFAC</td>
                            <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td><div id="ccfecha"></div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>BÁSICO</td>
                            <td><div id="bscos"></div></td>
                            <td><div id="Bfecha"></div></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>RECURRENTE</td>
                            <td><div id="recurnt"></div></td>
                            <td><div id="Rfecha"></div></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>ESPECIFICOS</td>
                            <td><div id="specifico"></div></td>
                            <td><div id="Efecha"></div></td>
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


<!-- DISEÑO ANTIGUO/.col -->
<div style="padding-top: 15px;" class="col-md-12">
    <div class="nav-tabs-custom">
        <div class="box-tools pull-right">
<!--             <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <a href='javascript:openEdit()' id="cerrar" style="font-size:22px"> <i class="fa fa-edit"></i> </a>
                <a href='javascript:cerrarEdit()' id="cerrar1" style="display:none; font-size: 22px"> <i
                        class="fa fa-ban"></i> </a>
            </button> -->
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove">
<a onclick="location.href='./'"><i class='fa fa-times'></i></a>
</button> -->
        </div>

        <ul class="nav nav-tabs" style="font-size: 14px;">
            <li class="active"><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
            <li><a href="#puesto" data-toggle="tab">DATOS DEL PUESTO</a></li>
            <li><a href="#lisestudios" data-toggle="tab">HISTORIAL ACADEMICO</a></li>
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
                                        data-inputmask="' ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                        data-mask id="gstExTel" name="gstExTel">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label>CORREO PERSONAL</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input disabled="" type="email" class="form-control" placeholder="Correo"
                                        id="gstCorro" name="gstCorro">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>CORREO INSTITUCIONAL</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input disabled="" type="email" class="form-control" placeholder="Correo"
                                        id="gstCinst" name="gstCinst">
                                </div>
                            </div>
                        </div>


                        <div class="form-group" id="buton" style="display: none;"><br>
                            <div class="col-sm-offset-0 col-sm-5">
                                <button type="button" id="button" class="btn btn-info btn-lg"
                                    onclick="actDatos();">ACEPTAR</button>
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


<!--                         <div class="col-sm-4">
                            <label>CARGO</label>
                            <select type="text" disabled="" class="form-control" id="gstCargo" name="gstCargo">

                                <option value="INSPECTOR">INSPECTOR</option>
                                <option value="INSTRUCTOR">INSTRUCTOR</option>
                            </select>
                        </div> -->
                    </div>

<!--                     <div class="form-group">
                        <div class="col-sm-4">
                            <label>CÓDIGO PRESUPUESTAL</label>
                            <div id="actualiza"></div>
                        </div>
                        <div id="select1"></div>
                    </div> -->


<p id="codigo" style="display: none; cursor: pointer;"><a onclick="codigo();"> EDITAR CÓDIGO PRESUPUESTAL <i class="fa fa-edit"></i></a></p>

<div id="codigo1">
<div class="form-group">
<div class="col-sm-4">
<label>CÓDIGO PRESUPUESTAL</label>
<input type="text" class="form-control" name="Codig" id="Codig" disabled="" >
</div>
<div class="col-sm-4">
<label>ID PUESTO (NIVEL TABULAR)</label>  
<input type="text" class="form-control" name="Nivel" id="Nivel" disabled="" >
</div>
<div class="col-sm-4">
<label>NOMBRE DEL PUESTO (GENERICO)</label>  
<input type="text" class="form-control" name="Gnric" id="Gnric" disabled="" >
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

<p id="nompusto" style="display: none; cursor: pointer;"><a onclick="nompusto();"> EDITAR NOMBRE DEL PUESTO <i class="fa fa-edit"></i></a>
<b style="margin-left: 19em;"></b>
<a onclick="especialidads();">EDITAR ESPECIALIDAD OACI PERSONAL TÉCNICO <i class="fa fa-edit"></i></a></p>  

<div class="form-group">

<div class="col-sm-5" id="nompusto1">
<label>NOMBRE DEL PUESTO</label>
<input type="text" class="form-control" name="nompuesto" id="nompuesto" disabled="" >
</div>

<div class="col-sm-5" id="nompusto2" style="display: none;">
<label>NOMBRE DEL PUESTO</label>
<select style="width: 100%" class="form-control" class="selectpicker" name="gstPstID" id="gstPstID" type="text" data-live-search="true" disabled="" >
  <option>SELECCIONE NOMBRE DEL PUESTO</option>
<?php while($pust = mysqli_fetch_row($psto)):?>                      
<option value="<?php echo $pust[0]?>"><?php echo $pust[1]?></option>
<?php endwhile; ?>
</select>
</div> 

<div id="spcialidad1">
<div class="col-sm-4">
<label>ESPECIALIDAD OACI PERSONAL TÉCNICO</label>
<input type="text" class="form-control" id="spcialidad" name="spcialidad" disabled="" >
</div>
<div class="col-sm-3">
<label>SIGLAS OACI</label>
<input type="text" class="form-control" id="sigla" name="sigla" disabled="" >
</div>
</div>

<div id="spcialidad2" style="display: none;">
<div id="actoaci"></div>
<div id="siglas"></div>
</div>
</div>


<!--                     <div class="form-group">
                        <div class="col-sm-5">
                            <label>NOMBRE DEL PUESTO</label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstPstID"
                                id="gstPstID" type="text" data-live-search="true" disabled="">
                                <?php //while($pust = mysqli_fetch_row($psto)):?>
                                <option value="<?php //echo $pust[0]?>"><?php //echo $pust[1]?></option>
                                <?php //endwhile; ?>
                            </select>
                        </div>

                        <div id="actoaci"></div>
                        <div id="siglas"></div>
                    </div> -->


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



<!--                     <div class="form-group">
                        <div class="col-sm-12">
                            <label>DIRECCIÓN </label>
                            <select style="width: 100%" class="form-control" class="selectpicker" name="gstdirección"
                                disabled="" id="gstdirección" type="text" data-live-search="true">
                                <option value="">SELECCIONE LA DIRECCIÓN</option>
                            </select>
                        </div>
                    </div>
 -->

        <div class="form-group">
        <div class="col-sm-12">
       
        <p id="ejecutiva" style="display: none; cursor: pointer;"><a onclick="ejecutiva();">EDITAR DIRECCIÓN EJECUTIVA <i class="fa fa-edit"></i></a></p>  

        <p id="ejecutiva1">
        <label>DIRECCIÓN EJECUTIVA </label> 
        <input type="text" name="ejcutiva" id="ejcutiva" class="form-control" disabled="">
        </p>

        <p id="ejecutiva2" style="display: none;">
        <label>DIRECCIÓN EJECUTIVA </label>         
        <select style="width: 100%" class="form-control" class="selectpicker" name="gstAreID" disabled="" id="gstAreID" type="text" data-live-search="true" >
        <option>SELECCIONE DIRECCIÓN EJECUTIVA</option>
        <?php while($ejct = mysqli_fetch_row($ejec)):?>                      
        <option value="<?php echo $ejct[0]?>"><?php echo $ejct[1]?></option>
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
     <div class="col-sm-4">
         <label>CARGO</label>
         <select type="text" disabled="" class="form-control" id="gstCargo" name="gstCargo">
             
              <option value="INSPECTOR">INSPECTOR</option>
              <option value="INSTRUCTOR">INSTRUCTOR</option>
              <option value="COORDINADOR">COORDINADOR</option>
              <option value="SIN ASIGNAR">SIN ASIGNAR</option>
              <option value="NUEVO INGRESO">NUEVO INGRESO</option>

           </select>
         </div>
     </div>





       <div class="form-group">
    
     <div class="col-sm-12">
        <label>ESPECIALIDAD</label>     
              <div id="especialidades"></div>    

         </div>          
     </div>


<!-- <div class="col-sm-6">
<label>CATEGORIA</label>
<select style="width: 100%" class="form-control" disabled="" class="selectpicker"
name="gstIDCat" id="gstIDCat" type="text" data-live-search="true">
<?php //while($idcat = mysqli_fetch_row($cat)):?>
<option value="<?php //echo $idcat[0]?>"><?php //echo $idcat[1];?></option>
<?php //endwhile; ?>
</select>
</div> -->

<!-- <div class="col-sm-6">
<label>SUB CATEGORIA</label>
<select style="width: 100%" disabled="" class="form-control" class="selectpicker"
name="gstIDSub" id="gstIDSub" type="text" data-live-search="true">
<option value="">SELECCIONA LA SUB CATEGORÍA</option>
<option value="0">NO APLICA</option>
<?php //while($idsub1 = mysqli_fetch_row($sub1)):?>
<option value="<?php //echo $idsub1[0]?>"><?php //echo $idsub1[1];?></option>
<?php //endwhile; ?>
</select>
</div> -->




<div class="form-group">

<p id="comandancias" style="display: none; cursor: pointer;margin-left:1em;"><a onclick="comandancias();">EDITAR COMANDANCIA <i class="fa fa-edit"></i></a></p>      

<div id="comandancias1">
<div class="col-sm-3">

<label>COMANDANCIA</label>
                  
<select style="width: 100%" class="form-control" disabled="" class="selectpicker" name="AcReg" id="AcReg" type="text" data-live-search="true">
<?php while($unidads = mysqli_fetch_row($unidad)):?>                      
<option value="<?php echo $unidads[0]?>"><?php echo $unidads[1].' > '.$unidads[2]?></option>
<?php endwhile; ?>
</select>

</div>
<div class="col-sm-6">
<label>AEROPUERTOS</label>
  <select  id="IDuni" class="form-control" class="selectpicker" name="IDuni" type="text" data-live-search="true" style="width: 100%" disabled="">
      <?php while($valor = mysqli_fetch_row($resulta)):?>                      
      <option value="<?php echo $valor[0]?>"><?php echo $valor[1].' > '.$valor[2]?></option>
      <?php endwhile; ?>
      </select>
</div>
</div>



<div id="comandancias2" style="display: none;">
<div class="col-sm-3">
 

<label>SELECCIONE COMANDANCIA</label>
<div id="comandancia"></div>                            
</div>
<div class="col-sm-6">
<label>SELECCIONE AEROPUERTOS</label>
<div id="select2"></div> 
</div>
</div>

<div class="col-sm-3">

<label class="label2">UBICACIÓN CENTRAL</label> 
<select style="width: 100%" disabled="" class="form-control" class="selectpicker" id="gstNucrt" name="gstNucrt"type="text" data-live-search="true">
<option value="CIAAC">CIAAC</option> 
<option value="LAS FLORES">LAS FLORES</option> 
<option value="ANGAR 8">ANGAR 8</option> 
<option value="LICENCIA">LICENCIAS</option>
</select>
</div>

</div>  
                    
                    <div class="form-group" id="butons" style="display: none;"><br>
                        <div class="col-sm-offset-0 col-sm-5">
                            <button type="button" id="button" class="btn btn-info btn-lg"
                                onclick="actPuesto();">ACEPTAR</button>
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
            <div class="tab-pane" id="lisestudios">
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
            <!-------------------------------------------->
            <div class="tab-pane" id="curso">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cursos programados</h3>
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
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>