<?php
 
$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
$cat = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
$sub1 = mysqli_query($conexion,$sql);


$sql = "SELECT gstIdCom,gstRgion,gstNombr FROM comandancia WHERE estado = 0";
$unidad = mysqli_query($conexion,$sql);

$sql="SELECT gstIdAir,gstCSigl,gstUnid1,gstUnid2,gstRgion FROM aeropuertos";
$resulta=mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdpus,gstNpsto FROM puesto WHERE estado = 0";
$psto = mysqli_query($conexion,$sql);

    $sqli = "SELECT gstIdcat,gstCatgr, gstCsigl FROM categorias WHERE estado = 0";
      $spcialidad = mysqli_query($conexion,$sqli);

      $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$direc = mysqli_query($conexion,$sql);

?>
<script type="text/javascript" src="../js/accesos.js"></script>
<script type="text/javascript">
    administraodr();
</script>

<div style="display: none;">

<div id="FINALIZADO" ></div>
<div id='porcentaje11' ></div>
<div id="programado" ></div>
<div id='porcentaje12' ></div>
<div id="CANCELADO"></div>    
<div id="inspecionciaac"></div>    
<div id='porcentaje13'></div>
<div id="evaluaciones"></div>
<div id="profesions"></div>
<div id="pro-pdf"> </div>
<div id="pro-fec"></div>
<div id="estudios"></div>
<div id="std-pdf"> </div>
<div id="std-fec"></div>
<div id="ojt"></div>
<div id="ojt-pdf"> </div>
<div id="ojt-fec"></div>
<div id="btcr"></div>
<div id="btcr-pdf"> </div>
<div id="btcr-fec"></div>
<div id="ccfecha"></div>
<div id="bscos"></div>
<div id="Bfecha"></div>
<div id="recurnt"></div>
<div id="Rfecha"></div>
<div id="specifico"></div>
<div id="Efecha"></div>           
</div>




<!-- NUEVA DISEÑO DE PRESENTACION -->
<div class="col-md-12">
<div class="box-tools pull-right">
<!-- <input style="" name="id_inspp" id="id_inspp" type="text"> -->
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <a href="inspecion2" style="font-size: 22px"><i class="fa fa-times"></i></a>
                        </button>
                    </div>
    <div class="nav-tabs-custom">
        <div class="conteiner" style="background: #fbfbfb">
            <!-- Encabezado -->
            <div class="col-md-4">
            <br>
            <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue-active">
                            <h3><input type="text" style="font-size: 18px;  background:transparent"
                                    name="nombrecompleto" id="nombrecompleto" class="datas" disabled=""></h3>
                                   

                        </div>
                        <div class="widget-user-image">
                           <div id="foto"></div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <!-- <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <span class="description-text"></span>
                                        <h4><input type="text" name="cargopersonal" id="cargopersonal" title="Cargo" class="datas disabled" disabled=""></h4>
                                        
                                    </div>
                                   
                                    
                                </div> -->
                                <div class="col-sm-12">
                                    <div class="description-block">
    
                                        <span class="description-text"></span>
                                        <div id="seleces"></div>
                                        <!-- <small name="insparea" id="insparea" for="" style="font-size:14px; display:block; text-align:left"></small> -->
                                        <!-- <input type="text" name="insparea" id="insparea" title="Cargo" class="datas disabled" style="text-align:center" disabled=""> -->
                                    </div>

                                    <!-- /.description-block -->
                                </div>
                                
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a class="font1" onclick="perinsp();" data-toggle='modal' data-target='#modal-dapersonales'>DATOS PERSONALES</a><span class="pull-right badge bg-red"></span></li>
                            <li><a class="font1" onclick="perinsp();" data-toggle='modal' data-target='#modal-puesto'>DATOS DEL PUESTO</a></li>
                            <li><a class="font1" onclick="constudios();" data-toggle='modal' data-target='#modal-hisacademico'>HISTORIAL ACADEMICO</a></li>
                            <li><a class="font1" onclick="conprofesion();" data-toggle='modal' data-target='#modal-hisprofes'>EXPERIENCIA PROFESIONAL</a></li>
                            <li><a class="font1" onclick="conprofesion();" data-toggle='modal' data-target='#modal-checklist'>CHECK LIST</a></li>
                            <li><a class="font1" onclick="conprofesion();" data-toggle='modal' data-target='#modal-cursospro'>CURSOS PROGRAMADOS</a></li>
                        </ul>
                    </div>
                    
                 </div>
        </div>
        
    </div>

    <div class="col-lg-8 col-xs-4">
                        <div class="box box-blue">
                            <div class="box-header with-border">
                                <h4 class="box-title">CURSO DE ESPECIALIDAD</h4>
                                <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <div id="cursoespecial"></div>
                            <!-- /.table-cursos obligatorios por especialidad -->
                        </div>

                    </div>

                   
                        <div class="box box-blue">
                            <div class="box-header with-border">
                                <h4 class="box-title">DETALLE DEL CURSO</h4>
                                <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

<input id="fecomp1" style='display:none' type="text">
                        <div class="box-body">
                                    <?php // include('../html/gesCurso.html');?>
                                    <div id="cursos"></div>
                                </div>

                            <!-- /.table-responsive -->
                        </div>

                   
</div>

<!-------------------------------------------------------- MODAL CHECK LIST --------------------------------------------------------------------->
        <div class="modal fade" id='modal-checklist'>
            <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/;width:1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3 class="box-title">Check list</h3>
                        </div>
                        <div class="modal-body">
                        <form id="Dtall" class="form-horizontal" action="" method="POST">
                <input type="hidden" name="gstIdper" id="gstIdper">
                <table style="width: 100%;" class="table table-striped table-hover center" >
                    <thead>
                        <tr>
                            <th scope="col">INCISO</th>
                            <th scope="col" style="width: 600px;">DOCUMENTO</th>
                            <th scope="col">CUMPLE</th> 
                            <th scope="col">ARCHIVO</th>
                            <th scope="col">FECHA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">A)</th>
                            <td>HOJA DE REGISTRO DEL INSTITUTO FEDERAL DE ACCESO A LA INFORMACIÓN PUBLICA (IFAI)</td>
                            <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td></td><td></td>



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
                            <td><div id="pro-pdf"> </div></td>
                            <td><div id="pro-fec"></div> </td>


                        </tr>
                        <tr>
                            <th scope="row">D)</th>
                            <td>CONSTANCIA ACADÉMICA (a.Licenciatura o ingeniería, b.Licencia técnica aeronautica)</td>
                            <td><div id="estudios"></div></td>
                            <td><div id="std-pdf"> </div></td>
                            <td><div id="std-fec"></div> </td>

                        </tr>
                        <tr>
                            <th scope="row">F)</th>
                            <td>FORMATO DE EVALUACIÓN DEL ENTRENAMIENTO EN EL PUESTO DE TRABAJO (OJT)</td>
                            <td><div id="ojt"></div></td>
                            <td><div id="ojt-pdf"> </div></td>
                            <td><div id="ojt-fec"></div> </td>                            
                            <!-- <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td></td> -->
                        </tr>
                        <tr>
                            <th scope="row">F)</th>
                            <td>FORMATO BITÁCORA</td>
                            <td><div id="btcr"></div></td>
                            <td><div id="btcr-pdf"> </div></td>
                            <td><div id="btcr-fec"></div> </td>                            
                            <!-- <td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td>
                            <td></td> -->
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
                            <td><div id="Bfecha"></div></td> <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>RECURRENTE</td>
                            <td><div id="recurnt"></div></td>
                            <td><div id="Rfecha"></div></td> <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>ESPECIFICOS</td>
                            <td><div id="specifico"></div></td>
                            <td><div id="Efecha"></div></td> <td></td>
                        </tr>
                    </tbody>
                    
                    </table>
            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<!-------------------------------------------------------- MODAL DATOS PERSONALES --------------------------------------------------------------------->

        <div class="modal fade" id='modal-dapersonales'>
            <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/;width:1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3 class="box-title">DATOS PERSONALES</h3>
                        </div>
                        <div class="modal-body">
                        <div class="box-tools pull-right">
                        <button id="editinsp" type="button" class="btn btn-box-tool" data-widget="collapse">
                            <a href='javascript:openEdit()' id="cerrar" style="font-size:22px"> <i class="fa fa-edit"></i> </a>
                            <a href='javascript:cerrarEdit()' id="cerrar1" style="display:none; font-size: 22px"> <i class="fa fa-ban"></i> </a>
                        </button>
                        </div>
                        <br>
                        <br>
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
                </div>

            </div>
        </div>
<!-------------------------------------------------------- MODAL DATOS DEL PUESTO --------------------------------------------------------------------->
        <div class="modal fade" id='modal-puesto'>
            <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/;width:1200px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3 class="box-title">DATOS DEL PUESTO</h3>
                        </div>
                        <div class="modal-body">
                        <div class="box-tools pull-right">
                        <button id="editinsp" type="button" class="btn btn-box-tool" data-widget="collapse">
                            <a href='javascript:openEdit()' id="cerrar" style="font-size:22px"> <i class="fa fa-edit"></i> </a>
                            <a href='javascript:cerrarEdit()' id="cerrar1" style="display:none; font-size: 22px"> <i class="fa fa-ban"></i> </a>
                        </button>
                        </div>
                        <br>
                        <br>
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
                                    DIRECCIÓN EJECUTIVA <i class="fa fa-edit"></i></a></p>
                            <p id="ejecutiva1">
                                <label>DIRECCIÓN EJECUTIVA </label>
                                <input type="text" name="ejcutiva" id="ejcutiva" class="form-control" disabled="">
                            </p>
                            <p id="ejecutiva2" style="display: none;">
                                <label>DIRECCIÓN EJECUTIVA </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstAreID"
                                     id="gstAreID" type="text" data-live-search="true">
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
                            <p id="adscrip" style="display: none; cursor: pointer;"><a onclick="adscripcion();">EDITAR
                                    DIRECCIÓN DE ADSCRIPCIÓN <i class="fa fa-edit"></i></a></p>
                            <p id="adscrip1">
                                <label>DIRECCIÓN DE ADSCRIPCIÓN </label>
                                <input type="text" name="adscripcion" id="adscripcion" class="form-control" disabled="">
                            </p>
                            <p id="adscrip2" style="display: none;">
                                <label>DIRECCIÓN DE ADSCRIPCIÓN </label>
                                <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara"
                                     id="gstIDara" type="text" data-live-search="true">
                                    <option>SELECCIONE DIRECCIÓN DE ADSCRIPCIÓN</option>
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
                            SUBDIRECCIÓN <i class="fa fa-edit"></i></a></p>
                            <div id="subdirec2">
                        <label>SUBDIRECCIÓN </label>
                        <input type="text" name="subdir1" id="subdir1" class="form-control" disabled="">

                        <label>DEPARTAMENTO </label>
                        <input type="text" name="departam" id="departam" class="form-control" disabled="">

                            </div>
                            <div id="subdirec3" style="display: none;">


                        <div class="form-group">
                        <div class="col-sm-12">
                        <label class="label2">SUBDIRECCIÓN</label>
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
                                    <label> FUNCIÓN DEL EMPLEADO </label>
                                </H4>
                            </div>
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
                            </select>
                        </div>
     </div>


<!--      <input type="hidden" name="gstIDuni" id="gstIDuni"> -->


       <div class="form-group">
    
     <div class="col-sm-12">
        <label>ESPECIALIDAD</label> <a type='button' title='Nueva especialidad' onclick='spcialidad()' class='datos btn btn-default' data-toggle='modal' data-target='#modal-especialidad' style='width:40px; height:35px;padding:0;margin:0;'><img width='25px' style='padding-top:0.3em;' src='../dist/img/anadir.svg'></a>     
              <div id="especialidades"></div>    

         </div>          
     </div>





<div class="form-group">
<div class="col-sm-6">

 <p><label>OJT   </label> ADJUNTAR DOCUMENTO <a type="button" class="asiste btn btn-default" title="Subir documento" onclick="adjunojt('OJT');" data-toggle="modal" data-target="#modal-doc"><i class="fa fa-cloud-upload text-info"></i></a></p>

<div>

 <div id="docInsp"></div>    

<!-- <td><a type="button" title="Actualizar documento" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="adjactual()" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a> -->
</div>                            
</div>
<div class="col-sm-6">
 <p><label>BITÁCORAS</label> ADJUNTAR DOCUMENTO <a type="button" class="asiste btn btn-default" title="Subir documento" onclick="adjunojt('BITACORA');" data-toggle="modal" data-target="#modal-doc"><i class="fa fa-cloud-upload text-info"></i></a></p>
<div> 
    <div id="docBita"></div>    
</div> 
</div>
</div>



<div class="form-group">

<p id="comandancias" style="display: none; cursor: pointer;margin-left:1em;"><a onclick="comandancias();">EDITAR COMANDANCIA <i class="fa fa-edit"></i></a></p>      

<div id="comandancias1">
<div class="col-sm-3">

<label>COMANDANCIA</label>
                  
<select style="width: 100%" class="form-control" disabled="" class="selectpicker" name="AcReg " id="AcReg" type="text" data-live-search="true">
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
                    </div>
                </div>

            </div>
        </div>
<!-------------------------------------------------------- MODAL HISTORIAL ACADEMICO--------------------------------------------------------------------->

<div class="modal fade" id='modal-hisacademico'>
            <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/;width:1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3 class="box-title">HISTORIAL ACADEMICO</h3>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal">
                    <div id="studios"></div>
                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<!-------------------------------------------------------- MODAL HISTORIAL PROFESIONAL--------------------------------------------------------------------->
<div class="modal fade" id='modal-hisprofes'>
            <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/;width:1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3 class="box-title">EXPERIENCIA PROFESIONAL</h3>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal">
                    <div id="profsions"></div>
                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<!-------------------------------------------------------- MODAL HISTORIAL CURSOS PROGRAMADOS--------------------------------------------------------------------->


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
        </div>





        
<!-- DISEÑO ANTIGUO/.col -->

   

 
        
           
<!--------------------DATOS DEL PUESTO------------------------------->
<!--------------------DATOS DEL PUESTO------------------------------->


            <!------------------------------------------->
            <!-- <div class="tab-pane" id="obligatorio">
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
            </div> -->
            <!-- modal evaluar -->
  <!-- DETALLE DECLINA CONVOCATORIA -->
  <div class="modal fade" id='modal-declinado'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal1">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/declinado.png">
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>DETALLES</strong></h1>
  <label id="cursdeclina" style="font-size: 16px; color:gray"  for=""></label>
  <label id="declindet" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declina la convocatoria del curso:</label>
  <label id="nombredeclin" style="font-size: 18px; color:gray; font-weight: normal;"  for=""></label>
  <br>
  <label id="motivod" style="font-size: 18px; color:#2B2B2B; font-weight: blod;"  for=""></label>
  <hr>
  <a id="declinpdf" class="btn btn-block btn-social btn-linkedin" href="" id="pdfdeclin" style="text-align: center;"> <i class="fa fa-file-pdf-o"></i> VISUALIZAR EL PDF ADJUNTO</a>
  <label readonly id="otrosd" name="textarea" style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>
</div>
<script>

</script>
</div>

<!--FIN DETALLE DECLINA CONVOCATORIA -->
            <!-------------------------------------------->
            <!-- <div class="tab-pane" id="curso">
                
            </div> -->
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
//cursos obligatorios



                        
</script>

<script>

    
</script>

            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
        
        <!-- /.tab-content -->
  
    <!-- /.nav-tabs-custom -->
