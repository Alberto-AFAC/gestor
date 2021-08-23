

<div class="modal fade" id='modal-confirma'>
<div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button> -->


<button type="button" onclick="location.href='./instructor.php'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


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
</table>


<table class="table table-bordered">
<tr>
<th>

<div class="col-sm-offset-0 col-sm-6">
	CONFIRMAR ASISTENCIA: <label for="SI"> SI </label> <input name="Opc" id="Opc" type="radio" value="SI" id="SI" /> <label for="NO"> NO </label> <input name="Opc" id="Opc" type="radio" value="NO" id="NO" />
<!-- 	<input type="text" name="confir" id="confir" value="SI ASISTIRÉ" disabled=""> -->
</div>
<div class="col-sm-offset-0 col-sm-6">

<p id="asiste" style="display: none;">
<input type="hidden" id="conf" name="conf" >	
</p>
<p id="noasis" style="display:none;">
<select style="width: 100%" class="form-control" class="selectpicker" type="text" data-live-search="true" id="confir" name="confir" onChange="justificacion()">
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

<textarea style="display: none; font-size: 15px;" id="obser" name="obser" class="form-control is-invalid" placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2" required></textarea>	
</div>
</div> 
</th>

</table>


                    
<!-- 					<div class="was-validated">
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
<button type="button" id="button" class="btn btn-info" onclick="confirma();">ACEPTAR</button>
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
</form>    
</div>
</div>
</div>
</div>
</div>
