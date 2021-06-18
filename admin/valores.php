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

           <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">



          <div class="conteiner"> <!-- Encabezado --> 
        <div class="card-container">
          <div class="header1">

            <a href= "#">
              <img src="../dist/img/perfile.png" class="img" alt="User Image">
            </a>      
                  <h3><input type="text" name="nombrecompleto" id="nombrecompleto" class="datas disabled" disabled=""></h3>
                  <h5><input type="text" name="cargopersonal" id="cargopersonal" class="datas disabled" disabled=""></h5>
          </div>
       <br>
     <div  class="col-sm-offset-0 col-md-12" style="background: #fbfbfb">

      <div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="remove">
<a href='javascript:closeDtlls()'><i class='fa fa-times'></i></a>
</button>
</div>
                  
                  <p class="text-center">
                    <strong>   </strong>
                  </p><br><br><br>
               <div  class="col-sm-offset-1 col-md-10">
                  <div class="progress-group">
                   <span class="progress-text">CURSOS COMPLETADOS</span>
                    <span class="progress-number"><b>0</b>/0</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 0%"></div>
                    </div>
                  </div>
                </div>
                  <!-- /.progress-group -->
                <div  class="col-sm-offset-1 col-md-10">
                  <div class="progress-group">
                    <span class="progress-text">CURSOS PROGRAMADOS</span>
                    <span class="progress-number"><b>0</b>/0</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 0%"></div>
                    </div>
                  </div>
                </div>  
                  <!-- /.progress-group -->
                <div  class="col-sm-offset-1 col-md-10">  
                  <div class="progress-group">
                    <span class="progress-text">CURSOS CANCELADOS</span>
                    <span class="progress-number"><b>0</b>/0</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 0%"></div>
                    </div>
                  </div>
                </div>  
                  <!-- /.progress-group -->
                  <!-- /.progress-group -->
                </div>
      </div>
            
            <div class="box-header">
              <h1 class="box-title"></h1>
              <div class="imagen">
          
        </div>
        </div>
        </div>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse">
<a href='javascript:openEdit()' style="font-size: 18px"> <i class="fa fa-edit"></i> </a>
</button>
<!--<button type="button" class="btn btn-box-tool" data-widget="remove">
<a onclick="location.href='./'"><i class='fa fa-times'></i></a>
</button>-->
</div>

            <ul class="nav nav-tabs">

              <li class="active"><a href="#activity" data-toggle="tab">EVALUACION</a></li>
              <li><a href="#datos" data-toggle="tab">DATOS PERSONALES</a></li> 
              <li><a href="#puesto" data-toggle="tab">DATOS DEL PUESTO</a></li>
              <li><a href="#estudios" data-toggle="tab">HISTORIAL ACADEMICO</a></li>
              <li><a href="#experiencia" data-toggle="tab">EXPERIENCIA PROFESIONAL</a></li>  
                         
            </ul>
            <div class="tab-content">
             
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                  <div class="post">
            

<!--<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
<form>
<div id="evlacns"></div>
<div class="form-group" id="buton"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="button" class="btn btn-info" onclick="evaluar();">ACEPTAR</button>
</div>
<b><p class="alert alert-success text-center padding exito" id="succe1">¡Se ha evaluado con éxito!</p></b>
<b><p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar los datos que se solicitan </p></b>
</div>
</form>
</div>
</div>
</div>
</div>
</section>-->






                  </div>
              </div>


<!--------------------------DATOS PERSONALES----------------------------------------->
       <div class="tab-pane" id="datos">

<form id="Dtall" class="form-horizontal" action="" method="POST" >
              <input type="hidden" name="gstIdper" id="gstIdper">
                  <div class="form-group">
                      <div class="col-sm-4">
                        <label>NOMBRE(S)</label>
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="gstNombr" name="gstNombr">
                      </div>
                      <div class="col-sm-4">
                        <label>APELLIDO(S)</label>
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="gstApell" name="gstApell">
                      </div>
                      <div class="col-sm-4">
                        <label>LUGAR DE NACIMIENTO</label>
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="gstLunac" name="gstLunac">
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                        <label>FECHA DE NACIMIENTO</label>
                        <input type="date" class="form-control" id="gstFenac" name="gstFenac">
                      </div>
                      <div class="col-sm-4">
                        <label>ESTADO CIVIL</label>
                        <select type="text" class="form-control" id="gstStcvl" name="gstStcvl">
                           <option value="">ESTADO CIVIL</option>
                           <option value="CASADO">CASADO</option>
                           <option value="SOLTERO">SOLTERO</option>
                        </select>
                      </div>
                      <div class="col-sm-4">
                          <label>CURP</label>
                          <input type="tex" style="text-transform:uppercase;" class="form-control" id="gstCurp" name="gstCurp">
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                         <label>RFC</label>
                         <input type="tex" style="text-transform:uppercase;" class="form-control" id="gstRfc" name="gstRfc">
                      </div>

                      <div class="col-sm-4">
                        <label>PASAPORTE NO.</label>
                        <input type="number" style="text-transform:uppercase;" class="form-control" id="gstNpspr" name="gstNpspr">
                      </div>

                      <div class="col-sm-4">
                        <label>PASAPORTE VIGENCIA</label>
                        <input type="date" class="form-control" id="gstPsvig" name="gstPsvig">
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                       <label>VISA PAIS</label>
                       <input type="text" class="form-control" id="gstVisa" name="gstVisa">
                    </div>
                    <div class="col-sm-4">
                       <label>VISA VIGENCIA</label>
                       <input type="date" class="form-control" id="gstVignt" name="gstVignt">
                    </div>
                    <div class="col-sm-4">
                       <label>NÚMERO DE CARTILLA</label>
                       <input type="text" style="text-transform:uppercase" class="form-control" id="gstNucrt" name="gstNucrt">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                        <H4>
                          <label>* DOMICILIO</label></H4>
                      </div>
                  </div> 

                  <div class="form-group">
                      <div class="col-sm-4">
                        <label>CALLE</label>
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="gstCalle" name="gstCalle">
                      </div>
                    <div class="col-sm-4">
                       <label>NÚMERO</label>
                       <input type="number" style="text-transform:uppercase;" class="form-control" id="gstNumro" name="gstNumro">
                    </div>
                    <div class="col-sm-4">
                       <label>COLONIA</label>
                       <input type="text" style="text-transform:uppercase" class="form-control" id="gstClnia" name="gstClnia">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                         <label>CODIGO POSTAL</label>
                         <input type="number" style="text-transform:uppercase;" class="form-control" id="gstCpstl" name="gstCpstl">
                      </div>
                     
                    <div class="col-sm-4">
                        <label>CUIDAD</label>
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="gstCiuda" name="gstCiuda">
                    </div>

                    <div class="col-sm-4">
                       <label>ESTADO</label>
                       <input type="text" style="text-transform:uppercase" class="form-control" id="gstStado" name="gstStado">
                    </div>
                  </div>

                  <div class="form-group">
                     <div class="col-sm-4">
                        <H4>
                          <label>* CONTACTO</label></H4>
                     </div>
                  </div>

                <div class="form-group">
                    <div class="col-sm-4">
                       <label>CASA</label>
                       <input type="tel" style="text-transform:uppercase;" class="form-control" id="gstCasa" name="gstCasa">
                    </div>

                    <div class="col-sm-4">
                       <label>CELULAR</label>
                       <input type="text" style="text-transform:uppercase;" class="form-control" id="gstClulr" name="gstClulr">
                    </div>

                    <div class="col-sm-4">
                       <label>EXTENSION Ó NUMERO TELEFONICO</label>
                       <input type="tel" class="form-control" id="gstExTel" name="gstExTel">
                    </div>
                </div>


                    <div class="form-group" id="buton" style="display: none;"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="actDatos();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se actualizaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

      </form>  
    
             
    
             <!-- <form class="form-horizontal">
              <H4>
                     <label>PERFIL DEL INSPECTOR DE OPERACIONES </label></H4>
                  
                     <div class="row">
                     <div class="col-xs-12">
                     <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">EVALUACIÓN</h3>   
                    </div>
            </div>
     
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>PARAMETROS</th>
                  <th>OBJETIVO</th>
                  <th>ACTUAL</th>
                  <th>CUMPLIO</th>
                  <th>COMENTARIOS</th>
                  <th>EVALUADOR</th>
                </tr>
                <tr>
                  <td>EXPERIENCIA EN TRASPORTE AÉREO</td>
                  <td>5</td>
                  <td>7</td>
                  <td><span class="label label-success">CUMPLIO</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>EXPERIENCIA CON LA GESTIÓN U OPERACIÓN DE AÉRONAVES COMERCIALES</td>
                  <td>SI</td>
                  <td>SI</td>
                  <td><span class="label label-success">CUMPLIO</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>CONOCIMIENTOS Y EXPERIENCIA EN METEOROLOGÍA</td>
                  <td>SI</td>
                  <td></td>
                  <td><span class="label label-warning">PENDIENTE</span></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>CUALIDADES DE INICITAIVA, TACTO, TOLERANCIA Y PACÍENCIA</td>
                  <td>SI</td>
                  <td>NO</td>
                  <td><span class="label label-danger">NO CUMPLE</span></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
            </div>

    </div>
    </form> -->
              <!-- /.tab-pane -->
            </div>
<!--------------------DATOS DEL PUESTO------------------------------->              
           <div class="tab-pane" id="puesto">

            <form id="Pusto" class="form-horizontal" action="" method="POST" >
              
                <div class="form-group">
                    <div class="col-sm-4">
                       <label>NÚMERO DE EMPLEADO</label>
                       <input type="number" class="form-control" id="gstNmpld" name="gstNmpld">
                    </div>

                    <div class="col-sm-4">
                       <label>ID PUESTO</label>
                       <input type="text" style="text-transform:uppercase;" class="form-control" id="gstIdpst" name="gstIdpst">
                    </div>

                    <div class="col-sm-4">
                    <label>CARGO</label>
                    <select type="text" class="form-control" id="gstCargo" name="gstCargo">
                         <option value="">SELECCIONA EL CARGO</option>
                         <option value="INSPECTOR">INSPECTOR</option>
                         <option value="INSTRUCTOR">INSTRUCTOR</option>
                      </select>
                    </div>
                </div>


               <div class="form-group">
                    <div class="col-sm-6">
                        <label>CATEGORIA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDCat" id="gstIDCat" type="text" data-live-search="true"  onchange="seleccionado()">
                         <option value="">SELECCIONA LA CATEGORÍA</option>
                         <?php while($idcat = mysqli_fetch_row($cat)):?>                      
                         <option value="<?php echo $idcat[0]?>"><?php echo $idcat[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                                         
                    <div class="col-sm-6">
                       <label>SUB CATEGORIA</label>
                       <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDSub" id="gstIDSub" type="text" data-live-search="true">
                         <option value="">SELECCIONA LA SUB CATEGORÍA</option>
                         <option value="0">NO APLICA</option>
                         <?php while($idsub1 = mysqli_fetch_row($sub1)):?>                      
                         <option value="<?php echo $idsub1[0]?>"><?php echo $idsub1[1];?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                  </div>

                 <div class="form-group">

                    <div class="col-sm-3">
                         <label>CORREO</label>
                         <input type="email" class="form-control" id="gstCorro" name="gstCorro">
                    </div>                  
                    <div class="col-sm-offset-0 col-sm-9">
                        <label>ÁREA ADSCRIPCIÓN</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" name="gstIDara" id="gstIDara" type="text" data-live-search="true">
                         <option value="">SELECCIONE ÁREA ADSCRIPCIÓN</option> 
                         <?php while($rea = mysqli_fetch_row($are)):?>
                      
                         <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                </div>
          
                <div class="form-group">
                  <div class="col-sm-offset-0 col-sm-12">
                        <label>UNIDAD ADMINISTRATIVA</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="gstIDuni" name="gstIDuni"type="text" data-live-search="true">
                         <option value="">SELECCIONE UNIDAD ADMINISTRATIVA</option> 
                         <?php while($iduni = mysqli_fetch_row($uni)):?>                      
                         <option value="<?php echo $iduni[0]?>"><?php echo $iduni[1].' > '.$iduni[2]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>
                  </div>
                    <div class="form-group" id="butons" style="display: none;"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-info btn-lg" onclick="actDatos();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-success text-center padding exito" id="succe">¡Se actualizaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
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

              <!--<div class="form-group">
                <div class="col-sm-6">
                  <label>NOMBRE DE LA INSTITUCIÓN</label>
                  <input type="text" style="text-transform:uppercase;" class="form-control" id="institucion" name="institucion">
                </div>

                <div class="col-sm-6">
                       <label>CUIDAD</label>
                       <input type="text" style="text-transform:uppercase;" class="form-control" id="cuidadh" name="cuidadh">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label>PERIODO</label>
                  <input type="text" style="text-transform:uppercase;" class="form-control" id="periodo" name="periodo">
                </div>

                <div class="col-sm-6">
                      <label>DOCUMENTO</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="documento" name="documento">
                </div>  
              </div>-->
              <div id="studios"></div>
            </form>   

              </div>
  
      

             <div class="tab-pane" id="experiencia">
              <form class="form-horizontal">
                  
              <!--<div class="form-group">
                  <div class="col-sm-6">
                    <label>PUESTO</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="puesto" name="puesto">
                  </div>

                  <div class="col-sm-6">
                       <label>EMPRESA</label>
                       <input type="text" style="text-transform:uppercase;" class="form-control" id="empresa" name="empresa">
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-6">
                      <label>PAIS</label>
                      <select type="text" class="form-control" id="cargo" name="cargo">
                         <option value="">SELECCIONA EL PAIS</option>
                      </select>
                  </div>

                  <div class="col-sm-6">
                      <label>CUIDAD</label>
                      <input type="text" style="text-transform:uppercase;" class="form-control" id="empresa" name="empresa">
              
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                     <label>ACTIVIDADES</label>
                     <textarea name="ACTIVIDADES" id="ACTIVIDADES"  placeholder="BREVE DESCRIPCIÓN DE LAS FUNCIONES DESEMPEÑADAS" style="text-transform:uppercase;" class="form-control" rows="5" cols="50"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-6">
                     <label>FECHA DE ENTRADA</label>
                     <input type="date" class="form-control" >
                  </div>
                  <div class="col-sm-6">
                     <label>FECHA DE SALIDA</label>
                     <input type="date" class="form-control">
                  </div>  
              </div>-->
              <div id="profsions"></div>             
              </form> 
              </div>



            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>


</div>