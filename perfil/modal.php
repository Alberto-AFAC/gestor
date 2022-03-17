

<link rel="stylesheet" type="text/css" href="../dist/css/card.css">
<script src="../dist/js/sweetalert2.all.min.js"></script>
  <link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
  
<style>
 .swal-wide{
    width: 500px !important;
    font-size: 16px !important;
}
.a-alert {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

.a-alert:link {
  color: white;
}

.a-alert:visited {
  color: white;
}
</style>

<div class="modal fade" id="modal-doc">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">AGREGAR <span id="ojtbit"></span></h4>
                
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal" id="agregardoc">
                 

            <div class="form-group">
              <div class="col-sm-12">              
              <label class="label2"  for=""></label>
              <input type="hidden" name="ojtNemple" id="ojtNemple" value="<?php echo $datos[4]?>">
              <input type="hidden" name="ojtIdper" id="ojtIdper" value="<?php echo $id?>">
              <input type="hidden" name="ojtdocadjunto" id="ojtdocadjunto">
              <div class="col-sm-6">
               <input id="OjtAgra" type="file" name="OjtAgra" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
              </div>
            </div>
            </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button1" class="btn btn-info altaboton" style="font-size:14px; width:110px; height:35px" onclick="adjuntarOjt();">ADJUNTAR</button>
                  </div>
                   <b><p class="alert alert-danger text-center padding error" id="fallajt">Error al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exitojt">¡Se adjunto archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vaciojt">Es necesario adjuntar archivo</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetidojt">¡El archivo adjunto está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renomjt">Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjuntajt">Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="errorjt">Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="fornjt">Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="maxjt">Supera el limite permitido</p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>


    <form class="form-horizontal" action="" method="POST">
      <div class="modal fade" id="eliminarojt">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ELIMINAR ARCHIVO</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="ojtIdperEli" id="ojtIdperEli">
                    <input type="hidden" name="ojtidperdoc" id="ojtidperdoc">
                      <div class="form-group">
                          <div class="col-sm-12">
                           <label class="label2" id="titledoc" for=""></label>
                              <p>¿ESTÁ SEGURO DE ELIMINAR EL ARCHIVO?<span id=""></span> </p>
                          </div>
                          <br>
                          <div class="col-sm-5">
                              <button type="button" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="borrarojt()">ACEPTAR</button>
                          </div>
                          <b>
                              <p class="alert alert-warning text-center padding error" id="dangeri">Error
                                  al eliminar archivo</p>
                          </b>
                          <b>
                              <p class="alert alert-success text-center padding exito" id="succei">¡Se
                                  elimino archivo con éxito !</p>
                          </b>
                          <b>
                              <p class="alert alert-danger text-center padding aviso" id="avisoi">Error
                                  archivo para eliminar </p>
                          </b>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </form>

<!-----------------ACTUALIZAR OJT--------------->

  <div class="modal fade" id="modal-docactualizar">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">REMPLAZAR DOCUMENTO</h4>
                
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal" id="actualizardoc">
                 

            <div class="form-group">
              <div class="col-sm-12">
              <input type="hidden" name="ojtNempleact" id="ojtNempleact" value="<?php echo $datos[4]?>" >
              <input type="hidden" name="ojtIdperact" id="ojtIdperact" value="<?php echo $id ?>">
              <input type="hidden" name="docactuali" id="docactuali">
              <input type="hidden" name="ojtdocadact" id="ojtdocadact">
              <label class="label2" id="docadjunto" for=""></label>

              <div class="col-sm-6">
              <input id="OjtAgraAct" type="file" name="OjtAgraAct" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
              </div>
            </div>
            </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button1" class="btn btn-info altaboton" style="font-size:14px; width:110px; height:35px" onclick="actualOjt();">ACTUALIZAR</button>
                  </div>
                   <b><p class="alert alert-danger text-center padding error" id="fallabit">Error al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exitobit">¡Se adjunto archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vaciobit">Es necesario adjuntar archivo</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetidobit">¡El archivo adjunto está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renombit">Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjuntabit">Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="errorbit">Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="fornbit">Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="maxbit">Supera el limite permitido</p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <!------------------------------------>

<div class="modal fade" id='modal-confirma'>
<div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button> -->

<button type="button" onclick="location.href='./inspector'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

<h4 class="modal-title">CONFIRMAR ASISTENCIA</h4>
</div>

<div class="modal-body">
<form id="Confirma" class="form-horizontal" action="" method="POST" >
<input type="hidden" name="id_curso" id="id_curso">
<input type="hidden" name="idinsp" id="idinsp">
<table class="table table-bordered">
<tr>
<th>CURSO</th>
<th>INCIO</th>
<th>HORA</th>
<th>FINALIZA</th>
</tr>
<tr>
<td><div id="gstTitlo"></div></td>
<td><div id="fcurso"></div></td>
<td><div id="hcurso"></div></td>
<td><div id="fechaf"></div></td>
</tr>
</table>

<table class="table table-bordered">
<tr>
<th>TIPO</th>
<th>SEDE DEL CURSO</th>
<th>MODALIDAD</th>
</tr>
<tr>
<td><div id="gstTipo"></div></td>
<td><div id="sede"></div></td>
<td><div id="modalidad"></div></td>
</tr>
<tr>
<th id="ocul1">LINK</th>
<th id="ocul2">CONTRASEÑA</th>
<th id="ocul3">CLASSROOM</th>
</tr>
<tr>
<td><div id="link"></td>
<td><div id="contracur"></div></td>
<td><div id="classroom"></div></td>
</tr>
</table>

<table class="table table-bordered">
<tr>
<th>

<div class="col-sm-offset-0 col-sm-6">
    
  <h4 class="label2" style="color:#05001E; font-size: 18px; ">CONFIRMAR ASISTENCIA:</h4>

<!--  <input type="text" name="confir" id="confir" value="SI ASISTIRÉ" disabled=""> -->
<div class="switcher">
      <input type="radio" name="Opc" value="SI" id="SI" class="switcher__input switcher__input--yin">
      <label for="SI" class="switcher__label">SI</label>
      
      <input type="radio" name="Opc" value="NO" id="NO" class="switcher__input switcher__input--yang">
      <label for="NO" class="switcher__label">NO</label>
      
      <span class="switcher__toggle"></span>
    </div>
</div>

<div class="col-sm-offset-0 col-sm-6">
    <br>


<p id="confiras" style="width: 420px;">  
<i style="color: #D58512; font-size: 25px;" class="fa fa-exclamation-triangle" ></i>
<label style="font-size: 25px;">FAVOR DE CONFIRMAR ASISTENCIA </label>
<input type="hidden" id="conf" name="conf" >  
</p>

<p id="asiste" style="display: none;">  
<i style="color: green; font-size: 25px;" class="icon fa fa-check" ></i>
<label  id="confm1" style="font-size: 25px;">CONFIRMAS TU ASISTENCIA</label>
<input type="hidden" id="conf" name="conf" >  
</p>

<p id="noasis" style="display:none;">
<label class="label2"  style="font-size: 16px;">MOTIVOS DE TU INASISTENCIA</label>
<select style="width: 100%" class="form-control inputalta" class="selectpicker" type="text" data-live-search="true" id="confir" name="confir" onChange="justificacion()">
<option value="0">SELECCIONE OPCIÓN  </option>
<option value="TRABAJO">TRABAJO</option>
<option value="ENFERMEDAD">ENFERMEDAD</option>
<option value="OTROS">OTROS</option>
</select>
</p>
</div>

</th>
</tr>

<th>
<div class="form-group">
<div class="col-sm-12">
<input id="archivo" type="file" name="archivo" style="display: none; width: 410px;" required accept=".pdf,.doc" class="input-file" size="1450"> 

<textarea style="display: none; font-size: 15px;" id="obser" name="obser" class="form-control is-invalid inputalta" placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2" required></textarea>  
</div>
</div> 
</th>

</table>


<div class="form-group">
<div class="col-sm-6">
<div id="instruc"></div>

</div>
</div>

<div class="form-group"><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="button" class="btn btn-info altaboton" style="" onclick="confirasict();">ACEPTAR</button>
</div>
   <b><p class="alert alert-danger text-center padding error" id="falla">Error al registrar datos</p></b>

    <b><p class="alert alert-success text-center padding exito" id="exito">¡Se registraron los datos con éxito!</p></b>

    <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>

    <b><p class="alert alert-danger text-center padding adjuto" id="renom">
    Renombre su archivo</p></b>

    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta">
    Debes adjuntar archivo</p></b>

    <b><p class="alert alert-danger text-center padding adjuto" id="error">
    Ocurrio un error</p></b>

    <b><p class="alert alert-danger text-center padding adjuto" id="forn">
    Formato no valido</p></b>

    <b><p class="alert alert-danger text-center padding adjuto" id="max">
    Supera el limite permitido</p></b>
</div>
<!-- script para validar los lebel de confiam la asistencia -->
<script>
    rad = document.getElementById('SI')
    lab1 = document.getElementById('asiste')
    if (rad.checked ) {
        lab1.style.display = '';
    }

</script>
</form>    
</div>
</div>
</div>
</div>
</div>

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
  <label id="declindet" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declinas la convocatoria del curso:</label>
  <label id="nombredeclin" style="font-size: 18px; color:gray; font-weight: normal;"  for=""></label>
  <br>
  <label id="motivod" style="font-size: 18px; color:#2B2B2B; font-weight: bold;"  for=""></label>
<hr>
<div id="arcpdf"></div>

<label readonly id="otrosdp" name="textarea" style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>

</div>

<script>

</script>
</div>

<!-- !-- DETALLE DE EDUCACION --> 
<div class="modal fade" id='modal-estud'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal2" style="width: 1100px;">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/estudios.png">
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>EDUCACIÓN</strong></h1>
  <div id="studios"></div>
</div>
<script>

</script>
</div>
<!-- !-- FIN DETALLE DE EDUCACION --> 

<!-- !-- DETALLE DE EXPERIENCIA PROFESIONAL --> 
<div class="modal fade" id='modal-exprofe'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal2" style="width: 1300px;">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/cv.png">
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>EXPERIENCIA LABORAL</strong></h1>
  <div id="profsions"></div>
</div>
<script>

</script>
</div>
<!-- FIN DETALLE DE EXPERIENCIA PROFESIONAL --> 

<!-- DETALLE DE INFORMACIÓN PERSONAL --> 
<div class="modal fade" id='modal-info'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal2" style="width: 1300px;">
            <div id="success-icon">
              <div>
                 <img class="img-circle1" src="../dist/img/info.png">
              </div>
            </div>
          <div>
          <div class="row">
   
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">Datos Personales</a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">Datos del puesto</a>
						</li>
            <li>
							<a href="#tab_default_3" id="inspescpecia" data-toggle="tab">Especialidad</a>
						</li>
	
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
            <p>
              
                                    <div class="col-sm-6">
                                        <label class="label2">NOMBRE(S)</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta " id="insnombre" disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label2">APELLIDOS</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insapellido" disabled="">
                                    </div>
             </p>
             <p>
                                    <div class="col-sm-4">
                                    
                                        <label class="label2">FECHA DE NACIMIENTO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insfecnac" disabled="">
                                    </div>
                                
                                    <div class="col-sm-4">
                                    
                                        <label class="label2">NÚMERO DE ISSSTE</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insiss" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                    
                                        <label class="label2">SEXO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insexo" disabled="">
                                    </div>
							</p>
             <p>
                                    <div class="col-sm-6">
                                        <label class="label2">RFC</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insrfc" disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label2">CURP</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscurp" disabled="">
                                    </div>
							</p>
              <label style="color:white" for="">-</label>
              <div class="col-sm-12">
              
              <p><span style="font-size: 14px" class="label label-primary">DOMICILIO</span></p>
              </div>
              <p>
                                    <div class="col-sm-4">
                                 
                                        <label class="label2">CALLE</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscalle" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                  
                                        <label class="label2">NÚMERO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insnum" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">COLONIA</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscol" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CÓDIGO POSTAL</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscp" disabled="">
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <label class="label2">CIUDAD</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insciud" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ESTADO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insest" disabled="">
                                    </div>
                                    </p>
                                    <label style="color:white" for="">-</label>
              <div class="col-sm-12">
              <p><span style="font-size: 14px" class="label label-primary">CONTACTO</span></p>
              </div>
              <p>
                                    <div class="col-sm-4">
                                        <label class="label2">CASA</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscasa" disabled="">
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <label class="label2">CELULAR</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscel" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">EXTENCIÓN</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insext" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CORREO PERSONAL</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscorreper" disabled="">
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <label class="label2">CORREO INSTITUCIONAL</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscorreins" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CORREO ALTERNATIVO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscorrealt" disabled="">
                                    </div>
                                    </p>
            </div>

						<div class="tab-pane" id="tab_default_2">
							<p>
                                    <div class="col-sm-4">
                                        <label class="label2">NÚMERO DE EMPLEADO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insnemple" disabled="">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="label2">FECHA INGRESO A LA AFAC</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insfecini" disabled="">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="label2">CÓDIGO PRESUPUESTAL</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inscodpre" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">PUESTO (GENERICO)</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inspues" disabled="">
                                    </div>
                                    
                                    <div class="col-sm-8">
                                        <label class="label2">NOMBRE DEL PUESTO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insnomp" disabled="">
                                    </div>
                                    <label style="color:white" for="">-</label>
              <div class="col-sm-12">
              <p><span style="font-size: 14px" class="label label-primary">INFORMACIÓN DE ADSCRIPCIÓN</span></p>
              </div>
                                    <div class="col-sm-12">
                                        <label class="label2">DIRECCIÓN EJECUTIVA</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insdirec" disabled="">
                                    </div>
                                    <div class="col-sm-12">
                                      <br>
                                        <label class="label2">DIRECCIÓN DE ADSCRIPCIÓN</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insdireca" disabled="">
                                    </div>
                                    <div class="col-sm-12">
                                    <br>
                                        <label class="label2">SUBDIRECCIÓN</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="inssub" disabled="">
                                    </div>
                                    <div class="col-sm-12">
                                    <br>
                                        <label class="label2">DEPARTAMENTO</label>
                                        <input type="text" onkeyup="mayus(this);"
                                            class="form-control disabled inputalta" id="insdep" disabled="">
                                    </div>
							</p>				
					</div>
          <div class="tab-pane" id="tab_default_3">
          <div id="insespecialidad"></div>
          </div>
				</div>
			</div>

   
  </div>
</div> 
</div>
</div> 
<script>

</script>

<!-- FIN DETALLE DE INFORMACIÓN PERSONAL  -->

<!-- DETALLE DECLINA CONVOCATORIA OJT -->
<div class="modal fade" id='modal-declinadoOJT'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal1">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/declinado.png">
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>DETALLES</strong></h1>
  <label id="cursdeclinaOJT" style="font-size: 16px; color:gray"  for=""></label>
  <label id="declindetOJT" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declinas la convocatoria OJT:</label>
  <label id="nombredeclinOJT" style="font-size: 18px; color:gray; font-weight: normal;"  for=""></label>
  <br>
  <label id="motivodOJT" style="font-size: 18px; color:#2B2B2B; font-weight: bold;"  for=""></label>
  <hr>
    <div id="arcpdfOJT"></div>
    <label readonly id="otrosdpOJT" name="otrosdpOJT" style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>

</div>

</div>

<!-- DETALLE DECLINA CONVOCATORIA OJT -->
<div class="modal fade" id='modal-evaluOJT'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal1">

  <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
            EVALUACIÓN DE REACCIÓN
        </h3>
  
  <!-- <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/declinado.png">
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>EVALUACION DE OJT</strong></h1>
  <label id="cursdeclinaOJT" style="font-size: 16px; color:gray"  for=""></label>
  <label id="declindetOJT" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declinas la convocatoria OJT:</label>
  <label id="nombredeclinOJT" style="font-size: 18px; color:gray; font-weight: normal;"  for=""></label>
  <br>
  <label id="motivodOJT" style="font-size: 18px; color:#2B2B2B; font-weight: bold;"  for=""></label>
  <hr>
    <div id="arcpdfOJT"></div>
    <label readonly id="otrosdpOJT" name="otrosdpOJT" style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label> -->

</div>

</div>

<!-- MODAL CONFIRMA CONVOCATORIA OJT  --> 
      <div class="modal fade" id="confirOJT">
        <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" onclick="location.href='./ojtprogramados'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">CONFIRMAR ASISTENCIA</h4>
              </div>
              <div class="modal-body">
                <form id="ConfirmaOJ" class="form-horizontal" action="" method="POST" >
                  <input type="hidden" name="id_registro" id="id_registrooj1">
                  <input type="hidden" name="id_persona" id="id_personaoj1">
                  <table class="table table-bordered">
                    <tr>
                      <th>TAREA PRINCIPAL</th>
                      <th>SUBTAREA PROGRAMADA</th>
                    </tr>
                    <tr>
                      <td><div id="ojtarea"></div></td>
                      <td><div id="ojtsubtarea"></div></td>
                    </tr>
                  </table>
                  <table class="table table-bordered">
                    <tr>
                      <th>NIVEL</th>
                      <th>INICIO</th>
                      <th>FIN</th>
                    </tr>
                    <tr>
                      <td><div id="ojnivel"></div></td>
                      <td><div id="ojfecinic"></div></td>
                      <td><div id="ojfecfin"></div></td>
                    </tr>
                  </table>
                  <table class="table table-bordered">
                    <tr>
                      <th>
                        <div class="col-sm-offset-0 col-sm-6">
                          <h4 class="label2" style="color:#05001E; font-size: 18px; ">CONFIRMAR ASISTENCIA:</h4>
                          <!--  <input type="text" name="confir" id="confir" value="SI ASISTIRÉ" disabled=""> -->
                          <div class="switcher">
                            <input type="radio" name="Opc" value="SI" id="SIOJT" class="switcher__input switcher__input--yin">
                            <label for="SIOJT" class="switcher__label">SI</label>
                            <input type="radio" name="Opc" value="NO" id="NOOJT" class="switcher__input switcher__input--yang">
                            <label for="NOOJT" class="switcher__label">NO</label>
                            <span class="switcher__toggle"></span>
                          </div>
                        </div>
                        <div class="col-sm-offset-0 col-sm-6">
                          <br>
                          <p id="confirasojt" style="width: 420px;">  
                            <i style="color: #D58512; font-size: 25px;" class="fa fa-exclamation-triangle" ></i>
                            <label style="font-size: 25px;">FAVOR DE CONFIRMAR ASISTENCIA </label>
                            <input type="hidden" id="confojt" name="confojt" >  
                          </p>
                          <p id="asisteojt" style="display: none;">  
                            <i style="color: green; font-size: 25px;" class="icon fa fa-check" ></i>
                            <label  id="confm1" style="font-size: 25px;">CONFIRMAS TU ASISTENCIA</label>
                            <input type="hidden" id="confojt" name="confojt" >  
                          </p>
                          <p id="noasisojt" style="display:none;">
                            <label class="label2"  style="font-size: 16px;">MOTIVOS DE TU INASISTENCIA</label>
                            <select style="width: 100%" class="form-control inputalta" class="selectpicker" type="text" data-live-search="true" id="confirojt" name="confirojt" onChange="justificacionojt()">
                              <option value="0">SELECCIONE OPCIÓN  </option>
                              <option value="TRABAJO">TRABAJO</option>
                              <option value="ENFERMEDAD">ENFERMEDAD</option>
                              <option value="OTROS">OTROS</option>
                            </select>
                          </p>
                        </div>
                      </th>
                    </tr>
                    <th>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <input id="archivoojt" type="file" name="archivoojt" style="display: none; width: 410px;" required accept=".pdf,.doc" class="input-file" size="1450"> 
                          <textarea style="display: none; font-size: 15px;" id="obserojt" name="obserojt" class="form-control is-invalid inputalta" placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2" required></textarea>  
                        </div>
                      </div> 
                    </th>
                  </table>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <div id="coorojt"></div>
                      <div id="instrucojt"></div>
                    </div>
                  </div>
                  <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                      <button type="button" id="button" class="btn btn-info altaboton" style="" onclick="confirasictojt();">ACEPTAR</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="falla">Error al registrar su asistencia</p></b>
                    <b><p class="alert alert-success text-center padding exito" id="exito">¡Se registraron la asistencia con éxito!</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>
                    <b><p class="alert alert-danger text-center padding adjuto" id="renom">Renombre su archivo</p></b>
                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta">Debes adjuntar archivo</p></b>
                    <b><p class="alert alert-danger text-center padding adjuto" id="error">Ocurrio un error</p></b>
                    <b><p class="alert alert-danger text-center padding adjuto" id="forn">Formato no valido</p></b>
                    <b><p class="alert alert-danger text-center padding adjuto" id="max">Supera el limite permitido</p></b>
                  </div>
                  <!-- script para validar los lebel de confiam la asistencia -->
                  <script>
                  rad = document.getElementById('SIOJT')
                  lab1 = document.getElementById('asisteojt')
                  if (rad.checked ) {
                    lab1.style.display = '';
                  }
                  </script>
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    


<!-----MODAL DE DETALLES------------------------------------>
  
<div class="modal fade" id='modal-detalle'>
<div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

<h4 class="modal-title">INFORMACIÓN DEL CURSO</h4>
</div>

<div class="modal-body">
<form id="Confirma1" class="form-horizontal" action="" method="POST" >
<input type="hidden" name="id_curso1" id="id_curso1">
<input type="hidden" name="idinsp1" id="idinsp1">
<table class="table table-bordered">
<tr>
<th>CURSO</th>
<th>INCIO</th>
<th>HORA</th>
<th>FINALIZA</th>
</tr>
<tr>
<td><div id="gstTitlo1"></div></td>
<td><div id="fcurso1"></div></td>
<td><div id="hcurso1"></div></td>
<td><div id="fechaf1"></div></td>
</tr>
</table>



<table class="table table-bordered">
<tr>
<th>TIPO</th>
<th>SEDE DEL CURSO</th>
<th>MODALIDAD</th>
</tr>
<tr>
<td><div id="gstTipo1"></div></td>
<td><div id="sede1"></div></td>
<td><div id="modalidad1"></div></td>
</tr>
<tr>
<th id="ocul11">LINK</th>
<th id="ocul22">CONTRASEÑA</th>
<th id="ocul33">CLASSROOM</th>
</tr>
<tr>
<td><div id="link1"></td>
<td><div id="contracur1"></div></td>
<td><div id="classroom1"></div></td>
</tr>

</table>
    
<div class="form-group">
<div class="col-sm-6">
<div id="instruc1"></div>

<div class="form-group">
<div class="col-sm-12">
<label id="asisdetalle" class="control-label" style="font-size:25px; display: none;" for="inputSuccess"><i class="fa fa-check" style="color: green;"></i>Se confirma la asistencia</label> <!-- 29/11/2021 -->

</div>
</div>



<!-- script para validar los lebel de confiam la asistencia -->
<script>
    rad = document.getElementById('SI')
    lab1 = document.getElementById('asiste')
    if (rad.checked ) {
        lab1.style.display = '';
    }

</script>
</form>    
</div>
</div>
</div>
</div>
</div>
