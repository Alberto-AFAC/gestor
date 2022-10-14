<div class="modal fade" id='modal-diahabil'>
<div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" style="font-size:19px; color: #000000;"> <div id="titulos"></div> 
</h4>

<div class="form-group" id="vacio" style="display: none;">
<div class="col-sm-12">
  <label class="label2">¡FAVOR DE AGREGAR FECHA!</label>
 </div> 
</div>

<div class="form-group" id="avisof" style="display: none;">
<div class="col-sm-12">
  <label class="label2" class="alert alert-info text-center padding aviso">¡FECHA CONCLUSIÓN ES MENOR A FECHA INICIO!</label>
 </div> 
</div>

</div>
<div class="modal-body">
<form id="Dtall" class="form-horizontal" action="" method="POST">
<input type="hidden" name="perid" id="perid" value="<?php echo $id?>">
<input type="hidden" name="opcion" id="opcion" class="opcion1" value="prodias">
<input type="hidden" name="opcion" id="opcion" class="opcion2" value="edidias" style="display: none;">

<div class="form-group" id="horario"><br>
<div class="col-sm-4">
<label class="label2">HORA DE INICIO</label>
<input type="time" class="form-control inputalta" id="hora_ini" name="hora_ini">
</div>
<div class="col-sm-4">
<label class="label2">HORA DE CONCLUCIÓN</label>
<input type="time" class="form-control inputalta" id="hora_fin" name="hora_fin">
</div>
<div>
<label class="label2">¿EL CURSO VA SER DIARIO?
<input type="checkbox" name="allselect" id="allselect">
</label>  
</div>
</div>

<div id="diaHabil"></div>

<!------------------------------------------------------ fucion del empleado-------------------------------------------------------------- -->
<!-- ----------------------------------------------------fin funcion del empleado-------------------- -->
<div class="form-group" ><br>
<div class="col-sm-offset-0 col-sm-5">
<button type="button" id="ocubotn"
style="font-size:18px; width:120px; height:40px"
class="btn btn-block btn-primary altaboton"
onclick="agregarDias();">ACEPTAR</button>

<button type="button" id="mosbotn"
style="display: none; font-size:18px; width:120px; height:40px"
class="btn btn-block btn-primary altaboton"
onclick="agregarDias();">EDITAR</button>

</div>
<!-- <b><p class="alert alert-danger text-center padding error" id="danger2">Error al asignar</p></b>-->
<b><p class="alert alert-success text-center padding exito" id="succed">¡Se guardó fecha con éxito!</p></b>
<b><p class="alert alert-warning text-center padding aviso" id="avisoh">Seleccione hora</p></b> 

</div>

</form>
</div>
</div>
</div>

</div>
</div>


<script type="text/javascript">
	
</script>