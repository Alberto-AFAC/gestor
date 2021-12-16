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

<script type="text/javascript">
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});	
</script>