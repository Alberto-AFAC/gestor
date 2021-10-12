
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


<button type="button" onclick="location.href='./inspector.php'" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


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
    
  <h4 class="label2" style="color:#05001E; font-size: 18px; ">CONFIRMAR ASISTENCIA:</H4> 
    
<!--  <input type="text" name="confir" id="confir" value="SI ASISTIRÉ" disabled=""> -->
<div class="switcher">
      <input type="radio" name="Opc" value="SI" id="SI" class="switcher__input switcher__input--yin" checked="">
      <label for="SI" class="switcher__label">SI</label>
      
      <input type="radio" name="Opc" value="NO" id="NO" class="switcher__input switcher__input--yang">
      <label for="NO" class="switcher__label">NO</label>
      
      <span class="switcher__toggle"></span>
    </div>
</div>

<div class="col-sm-offset-0 col-sm-6">
    <br>
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
<!--FIN DETALLE DECLINA CONVOCATORIA -->
