<?php session_start();
  
  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
					}

switch ($id) {
  case "1":?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="NO RECONOCE DISPOSITIVO">NO RECONOCE DISPOSITIVO</option>
  <option value="COLOR DE IMPRESIÓN BAJO">COLOR DE IMPRESIÓN BAJO</option>
  <option value="IMPRESIÓN BORROSA">IMPRESIÓN BORROSA</option>
  <option value="IMPRIME MUY CLARO">IMPRIME MUY CLARO</option>
  <option value="IMPRIME MANCHADO">IMPRIME MANCHADO</option>
  <option value="ATASCO DE PAPEL">ATASCO DE PAPEL</option>
  <option value="INSTALACIÓN">INSTALACIÓN</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>

<?php break;
  case "2":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="NO RESPONDE">NO RESPONDE</option>
  <option value="ESTA LENTO">ESTA LENTO</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>
 
 
<?php break;
  case "3":

if($desc == 'MONITOR'){
  ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="PANTALLA DE AZUL">PANTALLA DE AZUL</option>
  <option value="PANTALLA NEGRA">PANTALLA NEGRA</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="SE BLOQUEO">SE BLOQUEO</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>
<?php }elseif($desc=='TECLADO' || $desc=='MOUSE'){ ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="SE BLOQUEO">SE BLOQUEO</option>
  <option value="NO PRENDE">NO PRENDE</option>
  <option value="NO DA CLIC">NO DA CLIC</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>

<?php }elseif($desc=='CPU'){ ?>
  
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="VENTILADOR ACELERADO">VENTILADOR ACELERADO</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="HACE RUIDO">HACE RUIDO</option>
  <option value="NO PRENDE">NO PRENDE</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>

<?php }
 break;
 case "4":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="NO PUEDO ACCEDER">NO PUEDO ACCEDER</option>
  <option value="NO RESPONDE">NO RESPONDE</option>
  <option value="ESTA LENTO">ESTA LENTO</option>  
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>
 
<?php break;
  case "5":if($desc == 'TELEFONÍA'){
  ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="FALLA CONEXIÓN">FALLA CONEXIÓN</option>
  <option value="FALLA PANTALLA">FALLA PANTALLA</option>
  <option value="FALLA BOTÓN">FALLA BOTÓN</option>
  <option value="FALLA BOCINA">FALLA BOCINA</option>
  <option value="FALLA CABLE">FALLA CABLE</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>

<?php }elseif($desc=='INTERNET'){ ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true">
  <option value="0">DESCRIPCIÓN</option>
  <option value="FALLA CONEXIÓN">FALLA CONEXIÓN</option>
  <option value="OTROS">OTROS</option>
  </option>
  </select>
  </div>
 

<?php }
  break;
  default: }

}else{ ?>
<div class="col-sm-offset-0 col-sm-4"><select  id="rptDscrp" class="form-control" class="selectpicker" name="rptDscrp" type="text" data-live-search="true" disabled=""><option value="0">DESCRIPCIÓN</option></select></div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function(){
      $('#rptDscrp').select2();
    });
  </script>
  