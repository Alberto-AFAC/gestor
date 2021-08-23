
  <!-- Main content -->
  <div class="row" id="detCurso" style="display: none;">
  <!-- /.col -->
  <div class="col-md-12">
  <div class="box-tools pull-right">
  <button type="button" title="Cerrar" id= "cerrarc" class="btn btn-box-tool" style="font-size:18px" data-widget="remove">
     <a href='javascript:closeCurso()'><i class='fa fa-times'></i></a>
  </button>
  </div>            
  <div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
  <div class="box-tools pull-right">

</div>
  <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DEL CURSO</a></li>
  
  <li><a href="#timeline" data-toggle="tab">PARTICIPANTES</a></li>
  </ul>
  
<div class="tab-content">
<div class="active tab-pane" id="activity">
  <!-- Post -->
<div class="post">
<div class="form-group">
  <label for=""></label>
  <button type="button" title="Editar Curso" style="float:right;" class="btn btn-box-tool" data-widget="collapse">
     <a href='javascript:editcurso()' id="editcurs" style="font-size:20px"> <i class="fa fa-edit"></i> </a>
     <a href='javascript:cereditcurso()' title="Cerrar edición" id="cerrareditc" style="display:none; font-size:20px"> <i class="fa fa-ban"></i> </a>
  </button>
</div>
<form class="form-horizontal" action="" method="POST" id="Dtall" >

  <div class="form-group">
      <div class="col-sm-4">
        <label class="label2">NOMBRE</label>
        <input type="text" style="text-transform:uppercase;" class="form-control disabled inputalta" id="gstTitlo" name="gstTitlo" disabled="">
      </div>
      <div class="col-sm-4">
        <label class="label2">TIPO DE CAPACITACIÓN</label>
        <select type="text" class="form-control inputalta" id="gstTipo" name="gstTipo" disabled="">
            <option value="0">ELEGIR UNA OPCIÓN</option>
            <option value="INDUCCIÓN">INDUCCIÓN</option>
            <option value="BÁSICOS">BÁSICO/INICIAL</option>
            <option value="TRANSVERSALES">TRANSVERSALE</option>
            <option value="RECURRENTES">RECURRENTE</option>
            <option value="ESPECÍFICOS">ESPECÍFICO</option>
            <option value="OJT">OJT</option>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="label2">PERFIL A QUIEN VA DIRIGIDO</label>
        <input type="text" style="text-transform:uppercase;" class="form-control inputalta" id="gstPrfil" name="gstPrfil" disabled="">
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-4">
        <label class="label2">DOCUMENTO QUE EMITE</label>
        <input type="text" style="text-transform:uppercase;" class="form-control inputalta" id="gstCntnc" name="gstCntnc" disabled="">
      </div>
      <div class="col-sm-4">
        <label class="label2">DURACIÓN</label>
        <input type="text" class="form-control inputalta" id="gstDrcin" name="gstDrcin" disabled="">
      </div>
      <div class="col-sm-offset-0 col-sm-4">
        <label class="label2">PERIODO DE VIGENCIA</label>                         
        <select type="text" class="form-control inputalta" id="gstVignc" name="gstVignc" disabled=""> 
            <option value="0">SELECCIONE VIGENCIA</option>
            <option value="RECURRENTE">RECURRENTE</option>
            <option value="NO APLICA">UNICA VEZ</option>
            <option value="1 AÑO">1 AÑO</option>
            <option value="2 AÑOS">2 AÑOS</option>
            <option value="3 AÑOS">3 AÑOS</option>
            <option value="4 AÑOS">4 AÑOS</option>
            <option value="5 AÑOS">5 AÑOS</option>
            <option value="6 AÑOS">6 AÑOS</option>
        </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-12">
        <label class="label2">OBJETIVO</label>
        <textarea name="gstObjtv" id="gstObjtv"  placeholder="Escribir el Objetivo" style="text-transform:uppercase;" class="form-control disabled inputalta" rows="5" cols="50" disabled=""></textarea>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-4">
        <label class="label2">FECHA INICIO</label>
        <input type="date" class="form-control disabled inputalta" id="fcurso" name="fcurso" disabled="">
      </div>
      <div class="col-sm-4">
        <label class="label2">HORA</label>
        <input type="time" class="form-control disabled inputalta" id="hcurso" name="hcurso" disabled="">
      </select>
      </div>
      <div class="col-sm-4">
        <label class="label2">FECHA CONCLUCIÓN</label>
        <input type="date" class="form-control disabled inputalta" id="fechaf" name="fechaf" disabled="">
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-4">
        <label class="label2">COORDINADOR</label>
        <select style="width: 100%" class="form-control inputalta" class="selectpicker" id="idinst" name="idinst" type="text" data-live-search="true" disabled="">
          <?php while($instructors = mysqli_fetch_row($instructor)):?>
          <option value="<?php echo $instructors[0]?>"><?php echo $instructors[1].' '.$instructors[2]?></option>
          <?php endwhile; ?>
       </select>
      </div>
      <div class="col-sm-4">
        <label class="label2">SEDE DEL CURSO</label>
        <input type="text" class="form-control inputalta" id="sede" name="sede" disabled="">
      </div>
      <div class="col-sm-4">
        <label class="label2">MODALIDAD</label>
        <select type="text" class="form-control inputalta" id="modalidads" name="modalidads" disabled="">
          <option value="0">ELEGIR UNA OPCIÓN</option>
          <option value="A DISTANCIA">A DISTANCIA</option>
          <option value="PRESENCIAL">PRESENCIAL</option>
          <option value="PRESENCIAL (SEMIPRESENCIAL)">MIXTA (SEMIPRESENCIAL)</option>
          <option value="AUTOGESTIVO">AUTOGESTIVO</option>
        </select>
      </div>
  </div>
  <div id= "dismod" style="display:none;" class="form-group">
      <div  class="col-sm-4">
        <label class="label2">LINK DE ACCESO</label>
        <input type="url" class="form-control inputalta" id="linkcur" name="linkcur" placeholder="URL" disabled="">
      </div>
      <div class="col-sm-4">
        <label class="label2" >CONTRASEÑA DE ACCESO</label>
        <input type="url" class="form-control inputalta" id="contracur" name="contracur" placeholder="Contraseña de acceso" disabled="">
      </div>
  </div>  
  <button type="button" id="buttonfin" title="Finalizar Curso" style="font-size:15px; width:150px; height:35px" class="btn btn-block btn-primary altaboton"  onclick="">FINALIZAR CURSO</button>
  </button>
  <b><p class="alert alert-danger text-center padding error" id="error">Error al finalizar el curso </p></b>
  <b><p class="alert alert-success text-center padding exito" id="exito">¡Se finalizo con éxito!</p></b>
  <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario finalizar los procesos</p></b>
<!-- boton finaliza edición -->
<div class="form-group" id="buttongcambios" style="display:none;"><br>
  <div class="col-sm-offset-0 col-sm-5">
  <button type="button" style="font-size:16px; width:170px; height:40px" id="button" class="btn btn-info btn-lg altaboton" onclick="actCurso();">GUARDAR CAMBIOS</button>
  </div>
  <b><p class="alert alert-danger text-center padding error" id="error">Error al agregar curso </p></b>
  <b><p class="alert alert-success text-center padding exito" id="exito">¡Se agrego el curso con éxito!</p></b>
  <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>
  </div>
</form>
</div>

  <!-- Post -->
  
  <!-- /.post -->
  </div>
  <!-- /.tab-pane 2do panel-->
  <div class="tab-pane" id="timeline">
  <!-- The timeline -->
  <div class="row">
  <div class="col-xs-12">
  <div class="box">
  <br>


  <form id="impri" action="" method="POST"  >
  <input type="hidden" class="form-control" id="gstIdlstc" name="gstIdlstc">
  <input type="hidden" name="gstTitulo" id="gstTitulo">
  <span data-toggle="modal" data-target="#basicModal" style="font-size:12px; width:180px; height:30px " class="btn btn-info btn-sm altaboton"><i class="fa fa-envelope-open" aria-hidden="true"></i>  NOTIFICAR CONVOCATORIA</span>
  <!-- <span style="font-size: 13px; cursor: pointer; float: right;" class="custom-btn btn-5" onclick="imprimir()"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> IMPRIMIR LISTA</span> -->
</form>


  <!-- CONFIRMACIÓN ENVIÓ DE INVITACIÓN -->
  <div class="modal fade" id='basicModal'  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal1">
  
  <div id="success-icon">
    <div>
    <img class="img-circle1" src="../dist/img/email.png">
    </div>
  </div>
  <h1 class="modaltitle"><strong>ENVIÓ DE CONVOCATORIA</strong></h1>
  <p class="points">Favor de verificar los datos del curso y de los participantes antes de enviar el correo.</p>
  <hr>
  <button type="button" id="cerrarres" style="font-size:18px" class="btn btn-block btn-primary" onclick="enviarMail()" data-dismiss="modal">ENVIAR</button>
  <button type="button" id="agregarres" style="font-size:18px" class="btn btn-block btn-default btn-sm" data-dismiss="modal">CERRAR</button>
</div>
</div>
  <div class="box-body">
  <br>
  <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
  <div id="proCursos"></div>
  </div>
  </div>
  <!-- /.box -->
  
  </div>
  <!-- /.col -->
  
  </div>
 
  <form class="form-horizontal" action="" method="POST"  >
  <div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: black"  aria-hidden="true">&times;</span>
  </button>
  <h4 class="modal-title" id="exampleModalLabel">TÍTULO </h4>  
  </div>
  <input type="hidden" class="form-control" id="idmstra" name="idmstra">
  <div class="modal-body">
  <div class="form-group">
  <div class="col-sm-4">
  <label>NOMBRE</label>
  <input type="text" style="text-transform:uppercase;" class="form-control" id="titulos" name="titulos">
  </div>
  <div class="col-sm-4">
  <label>TIPO</label>
  <select type="text" class="form-control" id="tipos" name="tipos">
  <option value="">ELEGIR UNA OPCIÓN</option>
  <option value="basicos">CURSOS BÁSICOS</option>
  <option value="recurrentes">CURSOS RECURRENTES</option>
  <option value="especificos">CURSOS ESPECÍFICOS</option>
  </select>
  </div>
  <div class="col-sm-4">
  <label>MODALIDAD</label>
  <select type="text" class="form-control" id="modalidads" name="modalidads">
  <option value="null">ELEGIR UNA OPCIÓN</option>
  <option value="A DISTANCIA">A DISTANCIA</option>
  <option value="PRESENCIAL">PRESENCIAL</option>
  </select>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-4">
  <label>PERFIL A QUIEN VA DIRIGIDO</label>
  <input type="text" style="text-transform:uppercase;" class="form-control" id="perfils" name="perfils">
  </div>
  <div class="col-sm-4">
  <label>DOCUMENTO QUE EMITE</label>
  <input type="text" style="text-transform:uppercase;" class="form-control" id="constancias" name="constancias">
  </div>
  <div class="col-sm-4">
  <label>DURACIÓN</label>
  <input type="time" class="form-control" id="duracions" name="duracions">
  </div>
  </div>      
  <div class="form-group">
  <div class="col-sm-8">
  <label>OBJETIVO</label>
  <textarea name="objetivos" id="objetivos"  placeholder="Escribir el Objetivo" style="text-transform:uppercase;" class="form-control" rows="5" cols="50"></textarea>
  </div>
  <div class="col-sm-4">
  <label>TEMARIO</label>  
  <input id="adjuntos" type="file" name="adjuntos" style="width: 410px; margin:0 auto;" required accept=".pdf,.doc" class="input-file" size="1450">
  </div>
  </div>   
  <div class="form-group"><br>
  <div class="col-sm-offset-0 col-sm-5">
  <button type="button" id="button" class="btn btn-info btn-lg" onclick="actCurso();">Aceptar</button>
  </div>
  <b><p class="alert alert-danger text-center padding error" id="error">Error al agregar curso </p></b>

  <b><p class="alert alert-success text-center padding exito" id="exito">¡Se agrego el curso con éxito!</p></b>

  <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>
  </div><b><p class="alert alert-danger text-center padding error" id="error">Error al agregar curso </p></b>

  <b><p class="alert alert-success text-center padding exito" id="exito">¡Se agrego el curso con éxito!</p></b>

  <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>
  </div>
  </div>
  </div>
  </form>
  </div>
  </div>
  <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->



