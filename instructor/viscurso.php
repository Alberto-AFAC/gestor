


  <!-- Main content -->


  <div class="row" id="detCurso" style="display: none;">

  <!-- /.col -->
  <div class="col-md-12">
  <div class="box-tools pull-right">
  <button type="button" class="btn btn-box-tool" data-widget="remove">
  <a href='javascript:closeCurso()'><i class='fa fa-times'></i></a>
  </button>
  </div>            
  <div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
  <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DE CURSOS</a></li>
  <li><a href="#timeline" data-toggle="tab">PARTICIPANTES</a></li>
  </ul>
  <div class="tab-content">
  <div class="active tab-pane" id="activity">
  <!-- Post -->
  <div class="post">

  <form class="form-horizontal" action="" method="POST" id="Dtall" >

  <div class="form-group">
  <div class="col-sm-4">
  <label>NOMBRE</label>
  <input type="text" style="text-transform:uppercase;" class="form-control disabled" id="gstTitlo" name="gstTitlo" disabled="">
  </div>

  <div class="col-sm-4">
  <label>TIPO</label>
  <select type="text" class="form-control disabled" id="gstTipo" name="gstTipo" disabled="">

  <option value="CURSOS BÁSICOS">CURSOS BÁSICOS</option>
  <option value="CURSOS RECURRENTE">CURSOS RECURRENTES</option>
  <option value="CURSOS ESPECÍFICOS">CURSOS ESPECÍFICOS</option>
  </select>
  </div>

  <div class="col-sm-4">
  <label>PERFIL A QUIEN VA DIRIGIDO</label>
  <input type="text" style="text-transform:uppercase;" class="form-control disabled" id="gstPrfil" name="gstPrfil" disabled="">
  </div>

  <div class="col-sm-4">
  <label>DOCUMENTO QUE EMITE</label>
  <input type="text" style="text-transform:uppercase;" class="form-control disabled" id="gstCntnc" name="gstCntnc" disabled="">
  </div>
  <div class="col-sm-4">
  <label>DURACIÓN</label>
  <input type="text" class="form-control disabled" id="gstDrcin" name="gstDrcin" disabled="">
  </div>

  <div class="col-sm-4">
  <label>PERIODO DE VIGENCIA</label>                         
  <select type="text" class="form-control disabled" id="gstVignc" name="gstVignc" disabled="">
  <option>SELECCIONE VIGENCIA</option>
  <option value="1 AÑO">1 AÑO</option>
  <option value="2 AÑOS">2 AÑOS</option>
  <option value="3 AÑOS">3 AÑOS</option>
  <option value="4 AÑOS">4 AÑOS</option>
  <option value="5 AÑOS">5 AÑOS</option>
  <option value="6 AÑOS">6 AÑOS</option>
  <option value="7 AÑOS">7 AÑOS</option>
  <option value="8 AÑOS">8 AÑOS</option>
  <option value="9 AÑOS">9 AÑOS</option>
  <option value="10 AÑOS">10 AÑOS</option>
  </select>
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-12">
  <label>OBJETIVO</label>
  <textarea name="gstObjtv" id="gstObjtv"  placeholder="Escribir el Objetivo" style="text-transform:uppercase;" class="form-control disabled" rows="5" cols="50" disabled=""></textarea>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-4">
  <label>FECHA INICIO</label>
  <input type="date" class="form-control disabled" id="fcurso" name="fcurso" disabled="">
  </div>

  <div class="col-sm-4">
  <label>HORA</label>
  <input type="time" class="form-control disabled" id="hcurso" name="hcurso" disabled="">
  </select>
  </div>

  <div class="col-sm-4">
  <label>FECHA CONCLUCIÓN</label>
  <input type="date" class="form-control disabled" id="fechaf" name="fechaf" disabled="">
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-4">
  <label>COORDINADOR</label>
  <select style="width: 100%" class="form-control" class="selectpicker" id="idinst" name="idinst" type="text" data-live-search="true" disabled="">
  <?php while($instructors = mysqli_fetch_row($instructor)):?>

  <option value="<?php echo $instructors[0]?>"><?php echo $instructors[1].' '.$instructors[2]?></option>
  <?php endwhile; ?>
  </select>
  </div>


  <div class="col-sm-4">
  <label>SEDE DEL CURSO</label>
  <select type="text" class="form-control disabled" id="sede" name="sede" disabled="">
  <option value="AGENCIA FEDERAL DE AVIACIÓN CIVIL">AGENCIA FEDERAL DE AVIACIÓN CIVIL</option>
  <option value="CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACIÓN CIVIL">CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACIÓN CIVIL</option>
  </select>
  </div>
  <div class="col-sm-4">
  <label>MODALIDAD</label>
  <select type="text" class="form-control" id="modalidads" name="modalidads">
  <option value="A DISTANCIA">A DISTANCIA</option>
  <option value="PRESENCIAL">PRESENCIAL</option>
  </select>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-4">
  <label>LINK DE ACCESO</label>
  <input type="url" class="form-control" id="link" name="link" placeholder="URL ">

  </div>
  </div>
  </form>

  </div>

  <!-- Post -->
  <div class="post">
  <!-- /.user-block -->

  <!-- /.row -->
  <ul class="list-inline">
  </ul>

  </div>
  <!-- /.post -->
  </div>
  <!-- /.tab-pane 2do panel-->
  <div class="tab-pane" id="timeline">
  <!-- The timeline -->



  <div class="row">
  <div class="col-xs-12">

  <div class="box">
  <br>

<span style="font-size: 13px; cursor: pointer; float: right;" class="custom-btn btn-5" onclick="imprimir()"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>IMPRIMIR LISTA</span>
  <div class="box-body">
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
  </div>
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



