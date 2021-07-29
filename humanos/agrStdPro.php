        <div class="modal fade" id="modal-estudio">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size:19px; color: #000000;">GRADOS DE ESTUDIOS</h4>
              </div>
              <div class="modal-body">
          <form class="form-horizontal" id="Forstd">

            <input type="hidden" class="form-control" id="gstIDper" name="gstIDper">
        
            <div class="form-group">
                  <div class="col-sm-6">
                    <label class="label2">NOMBRE DE LA INSTITUCIÓN</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstInstt" name="gstInstt">
                  </div>

                  <div class="col-sm-6">
                       <label class="label2">GRADO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstCiudad" name="gstCiudad">
                  </div>
            </div>

            <div class="form-group">
                  <div class="col-sm-6">
                       <label class="label2">PERIODO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstPriod" name="gstPriod">
                  </div>

                  <div class="col-sm-6">
                      <label class="label2">DOCUMENTO</label>
  <!--<input type="text" onkeyup="mayus(this);" class="form-control" id="gstDocmt" name="gstDocmt">-->

                  <input id="gstDocmt" type="file" name="gstDocmt" style="width: 410px; margin:0 auto;" required accept=".pdf,.doc" class="input-file" size="1450">

                  </div>
            </div>
                <div class="form-group">
                <div class="col-sm-5">

                <button type="button" id="agrega" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" onclick="agrStudio();">ACEPTAR</button>
                  <button type="reset" id="vacia" onclick="mosEtdio();" class="btn btn-primary" style="display: none; background: #2F5D8C; border-radius: 6px;">AÑADIR OTRO GRADO DE ESTUDIO</button>
                </div>
              
                   <b><p class="alert alert-danger text-center padding error" id="falla">Error al registrar datos o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito">¡Se registraron los datos y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido">¡El grado de estudio ya está registrado!</p></b>

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


<!-------------------------EDITAR ESTUDIO----------------------------------->


        <div class="modal fade" id="modalestudio">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">GRADO DE ESTUDIOS</h4>
              </div>
              <div class="modal-body">
          <form class="form-horizontal" id="Actuliza">

            <input type="hidden" class="form-control" id="EgstIDper" name="EgstIDper">
        
              <div id="gstpdf"></div>

            <div class="form-group">
                  <div class="col-sm-6">
                    <label>NOMBRE DE LA INSTITUCIÓN</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="EgstInstt" name="EgstInstt">
                  </div>

                  <div class="col-sm-6">
                       <label>GRADO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="EgstCiudad" name="EgstCiudad">
                  </div>
            </div>

            <div class="form-group">
                  <div class="col-sm-6">
                       <label>PERIODO</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="EgstPriod" name="EgstPriod">
                  </div>

                  <div class="col-sm-6">
                      <label>DOCUMENTO</label>
  <!--<input type="text" onkeyup="mayus(this);" class="form-control" id="gstDocmt" name="gstDocmt">-->

                  <input id="EgstDocmt" type="file" name="EgstDocmt" style="width: 410px; margin:0 auto;" required accept=".pdf,.doc" class="input-file" size="1450">

                  </div>
            </div>
                <div class="form-group">
                <div class="col-sm-5">

                <button type="button" id="button" class="btn btn-info" style="font-size:16px; width:110px; height:35px" onclick="actStudio();">ACTUALIZAR </button>

                </div>
              
                   <b><p class="alert alert-danger text-center padding error" id="falla1">Error al registrar datos o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito1">¡Se registraron los datos y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio1">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido1">¡El grado de estudio ya está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom1">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta1">
                    Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error1">
                    Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn1">
                    Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max1">
                    Supera el limite permitido</p></b>
                </div>
              </form>   
            </div>
          </div>
        </div>
      </div>
    </div>

<!-------------------------GUARDA PROFESION----------------------------------->

          <div class="modal fade" id="modal-profesion">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size:19px; color: #000000;">EXPERIENCIA PROFESIONAL</h4>
              </div>
              <div class="modal-body" id="Forpro">
              <form class="form-horizontal">
                <input type="hidden" class="form-control" id="AgstIDper" name="AgstIDper">
                  
              <div class="form-group">
                  <div class="col-sm-6">
                    <label class="label2">PUESTO</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstPusto" name="gstPusto">
                  </div>

                  <div class="col-sm-6">
                       <label class="label2">EMPRESA</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstMpres" name="gstMpres">
                  </div>
              </div>

              <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                      <label class="label2">PAIS</label>
                        <select style="width: 100%" class="form-control inputalta" class="selectpicker inputalta" id="gstIDpai" name="gstIDpai" type="text" data-live-search="true">
                         <option value="1">SELECCIONA EL PAIS</option>
                         <?php while($idpais = mysqli_fetch_row($pais)):?>                      
                         <option value="<?php echo $idpais[0]?>"><?php echo $idpais[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

                  <div class="col-sm-6">
                      <label class="label2">CIUDAD</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control inputalta" id="gstCidua" name="gstCidua">
              
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                     <label class="label2">ACTIVIDADES</label>
                     <textarea name="gstActiv" id="gstActiv"  placeholder="BREVE DESCRIPCIÓN DE LAS FUNCIONES DESEMPEÑADAS" onkeyup="mayus(this);" class="form-control inputalta" rows="5" cols="50"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-6">
                     <label class="label2">FECHA DE ENTRADA</label>
                     <input type="date" class="form-control inputalta" id="gstFntra" name="gstFntra">
                  </div>
                  <div class="col-sm-6">
                     <label class="label2">FECHA DE SALIDA</label>
                     <input type="date" class="form-control inputalta" id="gstFslda" name="gstFslda">
                  </div>  
              </div>
              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="agregar" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" onclick="agrProfsn();">ACEPTAR</button>
                    <button type="reset" id="vaciar" onclick="mostrar();" class="btn btn-primary" style="display: none; background: #2F5D8C; border-radius: 6px;">AÑADIR OTRA EXPERIENCIA PROFESIONAL</button>
                  </div>
                    <b><p class="alert alert-warning text-center padding error" id="danger3">Los datos ya están agregados </p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe3">¡Se agregaron los datos con éxito!</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty3">Es necesario agregar los datos que se solicitan </p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-------------------------EDITAR PROFESION----------------------------------->

  <div class="modal fade" id="modalprofesion">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EXPERIENCIA PROFESIONAL</h4>
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal">
                <input type="hidden" class="form-control" id="AgstIdpro" name="AgstIdpro">
                  
              <div class="form-group">
                  <div class="col-sm-6">
                    <label>PUESTO</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="AgstPusto" name="AgstPusto">
                  </div>

                  <div class="col-sm-6">
                       <label>EMPRESA</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="AgstMpres" name="AgstMpres">
                  </div>
              </div>

              <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                      <label>PAIS</label>
                        <select style="width: 100%" class="form-control" class="selectpicker" id="AgstIDpai" name="AgstIDpai" type="text" data-live-search="true">
                         <?php while($idpais = mysqli_fetch_row($paises)):?>                      
                         <option value="<?php echo $idpais[0]?>"><?php echo $idpais[1]?></option>
                         <?php endwhile; ?>
                       </select>
                    </div>

                  <div class="col-sm-6">
                      <label>CIUDAD</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="AgstCidua" name="AgstCidua">
              
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                     <label>ACTIVIDADES</label>
                     <textarea name="AgstActiv" id="AgstActiv"  placeholder="BREVE DESCRIPCIÓN DE LAS FUNCIONES DESEMPEÑADAS" onkeyup="mayus(this);" class="form-control" rows="5" cols="50"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-6">
                     <label>FECHA DE ENTRADA</label>
                     <input type="date" class="form-control" id="AgstFntra" name="AgstFntra">
                  </div>
                  <div class="col-sm-6">
                     <label>FECHA DE SALIDA</label>
                     <input type="date" class="form-control" id="AgstFslda" name="AgstFslda">
                  </div>  
              </div>
              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button" class="btn btn-info" onclick="actProfsn();">ACEPTAR</button>
                  </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger4">Error al actualizar datos </p></b>
                    <b><p class="alert alert-success text-center padding exito" id="succe4">¡Se actualizaron los datos con éxito!</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="empty4">Es necesario agregar los datos que se solicitan </p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>