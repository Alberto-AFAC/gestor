<?php
 
$sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0";
$cat = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdsub,gstSubcat,gstSigls FROM subcategorias WHERE estado = 0";
$sub1 = mysqli_query($conexion,$sql);

$sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
$are = mysqli_query($conexion,$sql);

$sql = "SELECT  gstIdCom,gstCSigl,gstNombr,gstNocrt,gstRgion FROM comandancia WHERE estado = 0";
$uni = mysqli_query($conexion,$sql);


?>
<!-- NUEVA DISEÑO DE PRESENTACION -->
<div class="col-md-12" >
          <div class="nav-tabs-custom">
<div class="conteiner" style="background: #fbfbfb" > <!-- Encabezado --> 
        <div class="card-container"  style="background: #fbfbfb" >
          
        
        <!-- /.col -->
         <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <br>
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
               <h3><input type="text" style="font-size: 18px;  background:transparent" name="nombrecompleto" id="nombrecompleto" class="datas" disabled=""></h3>
            
            </div>
            <div class="widget-user-image">
               <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
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
    
<div  class="col-sm-offset-0 col-sm-9" style="background: #fbfbfb">
  
    <p class="text-center">
       <strong>   </strong>
    </p><br><br>
<div  class="col-sm-offset-1 col-md-10">
    <div class="progress-group">
          <span class="progress-text">CURSOS COMPLETADOS</span>
          <span class="progress-number"><b>160</b>/500</span>
        <div class="progress sm">
            <div class="progress-bar progress-bar-green" style="width: 30%"></div>
            </div>
        </div>
    </div>
              <!-- /.progress-group -->
<div  class="col-sm-offset-1 col-md-10">
    <div class="progress-group">
            <span class="progress-text">CURSOS PROGRAMADOS</span>
            <span class="progress-number"><b>310</b>/400</span>
          <div class="progress sm">
                <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                </div>
          </div>
    </div>  
              <!-- /.progress-group -->
<div  class="col-sm-offset-1 col-md-10">  
    <div class="progress-group">
                <span class="progress-text">CURSOS CANCELADOS</span>
                <span class="progress-number"><b>200</b>/400</span>
            <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: 50%"></div>
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
          <a href='javascript:closeDtlls()'><i class='fa fa-times'></i></a>
          </button>
          </div>  
       </div>
       </div>
       </div>
       </div>
       </div>
          <!-- /.widget-user -->
        
        
<!-- /FIN DE NUEVO DISEÑO -->

           <!-- DISEÑO ANTIGUO/.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">

           <!-- DISEÑO ANTIGUO/.col -->


<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse">
<a href='javascript:openEdit()' style="font-size: 18px"> <i class="fa fa-edit"></i> </a>
</button>
<!--<button type="button" class="btn btn-box-tool" data-widget="remove">
<a onclick="location.href='./'"><i class='fa fa-times'></i></a>
</button>-->
</div>

            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">DATOS PERSONALES</a></li>
              <li><a href="#puesto" data-toggle="tab">DATOS DEL PUESTO</a></li>
              <li><a href="#estudios" data-toggle="tab">HISTORIAL ACADEMICO</a></li>
              <li><a href="#experiencia" data-toggle="tab">EXPERIENCIA PROFESIONAL</a></li>  
              <li><a href="#curso" data-toggle="tab" id="ocultar">CURSOS</a></li>            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                  <div class="post">
            <form id="Dtall" class="form-horizontal" action="" method="POST" >
              <input type="hidden" name="gstIdper" id="gstIdper">
                  <div class="form-group">
                      <div class="col-sm-4">
                        <label>NOMBRE(S)</label>
                        <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstNombr" name="gstNombr">
                      </div>
                      <div class="col-sm-4">
                        <label>APELLIDO(S)</label>
                        <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstApell" name="gstApell">
                      </div>
                      <div class="col-sm-4">
                        <label>LUGAR DE NACIMIENTO</label>
                        <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstLunac" name="gstLunac">
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
                          <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control" id="gstCurp" name="gstCurp">
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                         <label>RFC</label>
                         <input type="tex" disabled="" style="text-transform:uppercase;" class="form-control" id="gstRfc" name="gstRfc">
                      </div>

                      <div class="col-sm-4">
                        <label>PASAPORTE NO.</label>
                        <input type="number" disabled="" style="text-transform:uppercase;" class="form-control" id="gstNpspr" name="gstNpspr">
                      </div>

                      <div class="col-sm-4">
                        <label>PASAPORTE VIGENCIA</label>
                        <input type="date" disabled="" class="form-control" id="gstPsvig" name="gstPsvig">
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                       <label>VISA PAIS</label>
                       <input type="text" disabled=""  class="form-control" id="gstVisa" name="gstVisa">
                    </div>
                    <div class="col-sm-4">
                       <label>VISA VIGENCIA</label>
                       <input type="date" disabled=""  class="form-control" id="gstVignt" name="gstVignt">
                    </div>
                    <div class="col-sm-4">
                       <label>NÚMERO DE CARTILLA</label>
                       <input type="text" disabled=""  style="text-transform:uppercase" class="form-control" id="gstNucrt" name="gstNucrt">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <div class="input-group">
                         <H4><i class="fa  ion-android-pin"></i>
                         <label> DOMICILIO</label></H4>
                      </div>
                    </div>
                </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                        <label>CALLE</label>
                        <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstCalle" name="gstCalle">
                      </div>
                    <div class="col-sm-4">
                       <label>NÚMERO</label>
                       <input type="number" disabled="" style="text-transform:uppercase;" class="form-control" id="gstNumro" name="gstNumro">
                    </div>
                    <div class="col-sm-4">
                       <label>COLONIA</label>
                       <input type="text" disabled="" style="text-transform:uppercase" class="form-control" id="gstClnia" name="gstClnia">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                         <label>CODIGO POSTAL</label>
                         <input type="number" disabled="" style="text-transform:uppercase;" class="form-control" id="gstCpstl" name="gstCpstl">
                      </div>
                     
                    <div class="col-sm-4">
                        <label>CIUDAD</label>
                        <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstCiuda" name="gstCiuda">
                    </div>

                    <div class="col-sm-4">
                       <label>ESTADO</label>
                       <input type="text" disabled="" style="text-transform:uppercase" class="form-control" id="gstStado" name="gstStado">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                        <div class="input-group">
                          <H4><i class="fa   fa-dot-circle-o"></i>
                          <label> CONTACTO</label></H4>
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
                          <input disabled="" type="tel" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask id="gstCasa" name="gstCasa">
                       </div>     
                    </div> 
                    <div class="col-sm-4">
                       <label>CELULAR</label>
                       <div class="input-group">
                          <div class="input-group-addon">
                             <i class="fa fa-phone"></i>
                          </div>
                          <input disabled="" type="tel" class="form-control" data-inputmask='"mask": "(99) 999-9999"'  data-mask id="gstClulr" name="gstClulr">
                       </div>     
                    </div>
                    <div class="col-sm-4">
                        <label>EXTENSION Ó NÚMERO TELEFONICO</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                               <i class="fa fa-phone"></i>
                          </div>
                          <input disabled="" type="text" class="form-control"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask id="gstExTel" name="gstExTel">
                        </div>
                    </div>
                </div>


                    <div class="form-group" id="buton" style="display: none;"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="actDatos();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger">Error al actualizar datos </p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se actualizaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

                    </form>  
                  </div>
              </div>

<!--------------------DATOS DEL PUESTO------------------------------->              
           <div class="tab-pane" id="puesto">

            <form id="Pusto" class="form-horizontal" action="" method="POST" >
              <input type="hidden" name="pstIdper" id="pstIdper">
                <div class="form-group">
                    <div class="col-sm-4">
                       <label>NÚMERO DE EMPLEADO</label>
                       <input type="number" disabled="" class="form-control" id="gstNmpld" name="gstNmpld">
                    </div>

                    <!--<div class="col-sm-4">
                       <label>ID PUESTO (NIVEL TABULAR)</label>
                       <input type="text" disabled="" style="text-transform:uppercase;" class="form-control" id="gstIdpst" name="gstIdpst">
                    </div>-->
                    <div class="col-sm-4">
                    <label>CODIGO PRESUPUESTAL</label>
                    <div id="actualiza"></div>                             
                    </div>

                    <div class="col-sm-4">
                    <label>CARGO</label>
                    <select type="text" disabled="" class="form-control" id="gstCargo" name="gstCargo">
                         <option value="">SELECCIONA EL CARGO</option>
                         <option value="INSPECTOR">INSPECTOR</option>
                         <option value="INSTRUCTOR">INSTRUCTOR</option>
                      </select>
                    </div>
                </div>

<div id="select1"></div> 

               <div class="form-group">
                    <div class="col-sm-6">
                        <label>CATEGORIA</label>
                        <select style="width: 100%" class="form-control" disabled="" class="selectpicker" name="gstIDCat" id="gstIDCat" type="text" data-live-search="true">
                         <?php while($idcat = mysqli_fetch_row($cat)):?>                      
                         <option value="<?php echo $idcat[0]?>"><?php echo $idcat[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                                         
                    <div class="col-sm-6">
                       <label>SUB CATEGORIA</label>
                       <select style="width: 100%" disabled="" class="form-control" class="selectpicker" name="gstIDSub" id="gstIDSub" type="text" data-live-search="true">
                         <?php while($idsub1 = mysqli_fetch_row($sub1)):?>                      
                         <option value="<?php echo $idsub1[0]?>"><?php echo $idsub1[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                         <label>CORREO PERSONAL</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input disabled=""  type="email" class="form-control" placeholder="Correo" id="gstCorro" name="gstCorro">
                          </div>
                    </div>
                    <div class="col-sm-4">
                         <label>CORREO INSTITUCIONAL</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input disabled=""  type="email" class="form-control" placeholder="Correo" id="gstCinst" name="gstCinst">
                          </div>
                    </div>

                    <div class="col-sm-4">
                       <label>FECHA INGRESO A LA AFAC</label>
                       <input disabled=""  type="date" class="form-control" id="gstFeing" name="gstFeing">
                    </div>
            
                </div>
            
          
                <div class="form-group">
                  <div class="col-sm-offset-0 col-sm-12">
                        <label>UNIDAD ADMINISTRATIVA</label>
                        <select disabled=""  style="width: 100%" disabled="" class="form-control" class="selectpicker" id="gstIDuni" name="gstIDuni"type="text" data-live-search="true">
                         <?php while($iduni = mysqli_fetch_row($uni)):?>                      
                         <option value="<?php echo $iduni[0]?>"><?php echo $iduni[1].' > '.$iduni[2]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                  </div>
                    <div class="form-group" id="butons" style="display: none;"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="actPuesto();">ACEPTAR</button>
                    </div>
                   <b><p class="alert alert-danger text-center padding error" id="danger1">Error al actualizar datos </p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe1">¡Se actualizaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar los datos que se solicitan </p></b>
                    </div>
              
              </form>  

      
              </div>
             <div class="tab-pane" id="estudios">
                      

            <form class="form-horizontal">
              
              <div class="form-group">
                <div class="col-sm-4">
                    <H4>
                     <label>ULTIMO GRADO DE ESTUDIOS </label></H4>
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

              <div class="tab-pane" id="curso">

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cursos</h3>
            </div>
        <div class="form-group">
            
        <div class="col-sm-2">
            <input type="radio" id="finalizado" name="finalizado" value="finalizado">
            <label for="finalizado">FINALIZADO</label><br>
            </div>

            <div class="col-sm-2">
              <input type="radio" id="programados" name="programados" value="programados">
              <label for="programados">PROGRAMADOS</label><br>
              </div>

               <div class="col-sm-2">
                  <input type="radio" id="cancelados" name="cancelados" value="cancelados">
                  <label for="cancelados">CANCELADOS</label><br>
              </div>

        </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php include('../html/gesCurso.html');?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

