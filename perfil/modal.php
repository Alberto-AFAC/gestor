
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


                    
<!--          <div class="was-validated">
          <div class="col-md-13">
          <label for="validationTextarea">Observaciones.</label>
          <textarea style="font-size: 18px;" id="obser" name="obser" class="form-control is-invalid" id="validationTextarea" rows="3" required></textarea>
          </div>
          </div> -->                      

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
<!-- !-- FIN DETALLE DE EXPERIENCIA PROFESIONAL --> 




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




<!------------------PASSWORD------------------------>


<!-- <div class="modal fade" id='modal-actualizar'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal2" style="width: 1100px;">
  
  <div id="success-icon">
    <div>
      <span style="font-size: 100px; color: white;" class="fa fa-lock"></span>
    </div>
  </div>
  <h1 class="modaltitle" style="color:gray"><strong>ACTUALIZAR CONTRASEÑA</strong></h1>

</div>
</div> -->




<!-- <div class="modal fade" id='modal-actualizar'>
<div tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">


      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ACTUALIZAR CONTRASEÑA</h3>
            </div>
 -->            <!-- /.box-header -->
            <!-- form start -->
<!-- <form class="form-horizontal">
<div class="box-body">

<div class="form-group">
<input type="hidden" name="idper" id="idper" value="<?php echo $id?>">
<label>Correo</label>
<div class="input-group col-md-12">
<div class="input-group-addon">
<span class="glyphicon glyphicon-envelope"></span></div>
<input type="email" name="usu" id="usu" class="form-control" pattern="[0-9]{1,7}" value="<?php echo $usu?>" disabled/>
</div>
</div>

<div class="form-group">
<label>Password</label>
<div class="input-group">
<div class="input-group col-md-12">
<input type="password" class="form-control" name="contra" id="contra" value="<?php echo $pass?>"
autocomplete="new-password" minlength="6">
<div class="input-group-addon input-group-append toggle-password">
<i style="cursor: pointer;" class="fa fa-eye toggle-password">
</i>
</div>
</div>
</div>
</div>


</div>
<div class="box-footer">
<button type="button" class="btn btn-info" onclick="actContr();">Actualizar</button>
<button type="submit" class="btn btn-default">Cancelar</button>

<b><p class="alert alert-danger text-center padding error" id="falla">Error al registrar datos</p></b>

<b><p class="alert alert-success text-center padding exito" id="exito">¡Se registraron los datos con éxito!</p></b>

<b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>
</div>
</form> -->
       

<!-- 
</div>

</div>


</div>
</div>
</div>
</div>
 -->


        <div class="modal fade" id="modal-actualizar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ACTUALIZAR CONTRASEÑA</h4>
              </div>
              <div class="modal-body">
       
<div class="form-group">
<input type="hidden" name="idper" id="idper" value="<?php echo $id?>">
<label>Usuario</label>

<div class="input-group col-md-12">

<input type="email" name="usu" id="usu" class="form-control" pattern="[0-9]{1,7}" value="<?php echo $usu?>" disabled/>


<div class="input-group-addon">

<span class="glyphicon glyphicon-user"></span>
</div>
</div>
</div>

<div class="form-group">
<label>Contraseña</label>
<div class="input-group col-md-12">
<div class="input-group">
<input type="password" class="form-control" name="password" id="password" autocomplete="new-password" >
<div class="input-group-addon input-group-append toggle-password">
<i style="cursor: pointer;" class="fa fa-eye toggle-password">
</i>
</div>
</div>
</div>
</div>

<div class="form-group">
<label>Nueva contraseña</label>
<div class="input-group col-md-12">
<div class="input-group">
<input type="password" class="form-control" name="pass" id="pass" autocomplete="new-password" >
<div class="input-group-addon input-group-append toggle-password">
<i style="cursor: pointer;" class="fa fa-eye toggle-password">
</i>
</div>
</div>
</div>
</div>

<div class="form-group">
<label>Confirmar contraseña</label>
<div class="input-group col-md-12">
<div class="input-group">
<input type="password" class="form-control" name="pass2" id="pass2" autocomplete="new-password" >
<div class="input-group-addon input-group-append toggle-password">
<i style="cursor: pointer;" class="fa fa-eye toggle-password">
</i>
</div>
</div>
</div>
</div>
</div>

              <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left"  onclick="actContr();">Aceptar</button>
 
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

              <div class="alert alert-success text-center" style="color: #FFF;" id="echo">
              <p>Contraseña actualizada</p>
              </div>

              <div class="alert alert-info text-center" style="color: #FFF;" id="invalida">
              <p>Las contraseñas no coinciden</p>
              </div>

              <div class="alert alert-danger text-center" style="color: #FFF;" id="falso">
              <p>Contraseña incorrecta</p>
              </div>

              <div class="alert alert-warning text-center" style="color: #FFF;" id="vacios">
              <p>Llene campos vacíos</p>
              </div>

              <div class="alert alert-danger text-center" style="color: #FFF;" id="error">
              <p>Datos no actualizados</p>
              </div>


              </div>



            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script>

</script>