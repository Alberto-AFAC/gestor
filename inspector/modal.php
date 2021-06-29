

<div class="modal fade" id='modal-confirma'>
<div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">CONFIRMAR ASISTENCIA</h4>
</div>

<div class="modal-body">
<form id="Confirma" class="form-horizontal" action="" method="POST" >
<input type="hidden" name="id_curso" id="id_curso">
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
<th>CONFIRMAR ASISTENCIA: <label for="SI"> SI </label> <input name="rptEvalu" type="radio" value="si" id="SI" /> <label for="NO"> NO </label> <input name="rptEvalu" type="radio" value="no" id="NO" />
</th>
</tr>
<tr>
<td><textarea style="font-size: 15px;display:none;" id="obser" name="obser" class="form-control is-invalid" placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2" required></textarea></td>
</tr>
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
<b><p class="alert alert-danger text-center padding error" id="danger2">Error al asignar</p></b>

<b><p class="alert alert-success text-center padding exito" id="succe2">¡Se asignó con éxito!</p></b>

<b><p class="alert alert-warning text-center padding aviso" id="empty2">Es necesario llenar todos los campos</p></b>
</div>
</form>    
</div>
</div>
</div>
</div>
</div>