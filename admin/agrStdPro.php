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

                  <input id="gstDocmt" type="file" name="gstDocmt" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">

                  </div>
            </div>
                <div class="form-group">
                <div class="col-sm-5">

                <button type="button" id="agrega" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" onclick="agrStudio();">ACEPTAR</button>
                  <button type="reset" id="vacia" onclick="mosEtdio();" class="btn btn-primary " style="display: none; background: #2F5D8C; border-radius: 6px;">AÑADIR OTRO GRADO DE ESTUDIO</button>
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

            <input type="hidden" name="EIdper" id="EIdper">
            <input type="hidden" name="Nmplea" id="Nmplea">
            <input type="hidden" class="form-control" id="EgstIDper" name="EgstIDper">
        
              <div id="gstpdf"></div>

            <div class="form-group">
                  <div class="col-sm-6">
                    <label>NOMBRE DE LA INSTITUCIÓN</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="EgstInstt" name="EgstInstt">
                  </div>

                  <div class="col-sm-6">
                       <label>CIUDAD</label>
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

                <button type="button" id="button" class="btn btn-info" onclick="actStudio();">ACTUALIZAR </button>

                </div>
              
                   <b><p class="alert alert-danger text-center padding error" id="falla1">Error al registrar datos o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito1">¡Se actualizaron los datos y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio1">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido1">¡El grado de estudio ya está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom1">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-success text-center padding adjuto" id="adjunta1">¡Se actualizaron los datos con éxito!</p></b>

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
                        <select style="width: 100%" class="form-control inputalta" class="selectpicker" id="gstIDpai" name="gstIDpai" type="text" data-live-search="true">
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
                <div class="col-sm-6">
                <label class="label2">DOCUMENTO</label>
                <input id="gstDocep" type="file" name="gstDocep" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
                </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="agregar" class="btn btn-info altaboton" style="font-size:16px; width:110px; height:35px" onclick="agrProfsn();">ACEPTAR</button>
                    <button type="reset" id="vaciar" onclick="mostrar();" class="btn btn-primary" style="display: none;">AÑADIR OTRA EXPERIENCIA PROFESIONAL</button>
                  </div>

                   <b><p class="alert alert-danger text-center padding error" id="falla2">Error al registrar datos o al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito2">¡Se registraron los datos y archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio2">Es necesario agregar los datos que se solicitan </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido2">¡El grado de estudio ya está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom2">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta2">
                    Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error2">
                    Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn2">
                    Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max2">
                    Supera el limite permitido</p></b>

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
                <input type="hidden" class="form-control" id="ActIdpro" name="ActIdpro">
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

    <!-----------------------------EXPERIENCIA PROFESIONAL--------------------------------->

      <div class="modal fade" id="modaldocprofesion">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">REMPLAZAR DOCUMENTO</h4>
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal">
                <input type="hidden" class="form-control" id="DgstNemp" name="DgstNemp">
                 <input type="hidden" class="form-control" id="DgstIDper" name="DgstIDper">
                <input type="hidden" class="form-control" id="DgstIdpro" name="DgstIdpro">
                  
              <div class="form-group">
                  <div class="col-sm-6">
                    <label>PUESTO</label>
                      <input type="text" onkeyup="mayus(this);" class="form-control" id="DgstPusto" name="DgstPusto" disabled="">
                  </div>

                  <div class="col-sm-6">
                       <label>EMPRESA</label>
                       <input type="text" onkeyup="mayus(this);" class="form-control" id="DgstMpres" name="DgstMpres" disabled="">
                  </div>
              </div>

            <div class="form-group">
              <div class="col-sm-6">
              <label class="label2">DOCUMENTO</label>
              <input id="DgstDocep" type="file" name="DgstDocep" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
              </div>
            </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button" class="btn btn-info altaboton" style="font-size:14px; width:110px; height:35px" onclick="docProfsn();">ACTUALIZAR</button>
                  </div>
                   <b><p class="alert alert-danger text-center padding error" id="falla3">Error al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito3">¡Se adjunto archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio3">Es necesario adjuntar archivo</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido3">¡El archivo adjunto está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom3">
                    Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta3">
                    Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error3">
                    Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn3">
                    Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max3">
                    Supera el limite permitido</p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>

<!---------------------------------AGREGAR ARCHIVO---------------------------------------->


    <div class="modal fade" id="modal-agregardoc">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">AGREGAR DOCUMENTO</h4>
                
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal" id="agregardoc">
                 

            <div class="form-group">
              <div class="col-sm-12">              
              <label class="label2"  for=""></label>
              <input type="hidden" name="gstNemple" id="gstNemple">
              <input type="hidden" name="gstIdperArc" id="gstIdperArc">
              <input type="hidden" name="docadjunto" id="docadjunto">
              <div class="col-sm-6">
               <input id="DgsAgra" type="file" name="DgsAgra" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
              </div>
            </div>
            </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button1" class="btn btn-info altaboton" style="font-size:14px; width:110px; height:35px" onclick="adjuntar();">ADJUNTAR</button>
                  </div>
                   <b><p class="alert alert-danger text-center padding error" id="falla5">Error al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito5">¡Se adjunto archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio5">Es necesario adjuntar archivo</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido5">¡El archivo adjunto está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom5">Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta5">Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error5">Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn5">Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max5">Supera el limite permitido</p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-----------------------------ACTUALIZAR EL ARCHIVO CHECK LIST--------------------------------->
    <div class="modal fade" id="modal-actualizardoc">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">REMPLAZAR DOCUMENTO</h4>
                
              </div>
              <div class="modal-body" id="actForpro">
              <form class="form-horizontal" id="actualizardoc">
                 

            <div class="form-group">
              <div class="col-sm-12">
              <input type="hidden" name="actNemple" id="actNemple">
              <input type="hidden" name="gstIdperAct" id="gstIdperAct">
              <input type="hidden" name="docactuali" id="docactuali">
              <label class="label2" id="docadjunto" for=""></label>

              <div class="col-sm-6">
              <input id="DgstActul" type="file" name="DgstActul" style="width: 410px; margin:0 auto; " required accept=".pdf,.doc" class="input-file" size="1450">
              </div>
            </div>
            </div>

              <div class="form-group">
                  <div class="col-sm-5">
                    <button type="button" id="button1" class="btn btn-info altaboton" style="font-size:14px; width:110px; height:35px" onclick="adjuactual();">ACTUALIZAR</button>
                  </div>
                   <b><p class="alert alert-danger text-center padding error" id="falla6">Error al adjuntar archivo</p></b>

                    <b><p class="alert alert-success text-center padding exito" id="exito6">¡Se adjunto archivo con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="vacio6">Es necesario adjuntar archivo</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="repetido6">¡El archivo adjunto está registrado!</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="renom6">Renombre su archivo</p></b>

                    <b><p class="alert alert-warning text-center padding adjuto" id="adjunta6">Debes adjuntar archivo</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="error6">Ocurrio un error</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="forn6">Formato no valido</p></b>

                    <b><p class="alert alert-danger text-center padding adjuto" id="max6">Supera el limite permitido</p></b>
                    </div>
                </form>  
            </div>
          </div>
        </div>
      </div>
    </div>

<!-------------------------------- ELIMINAR ARCHIVO----------------------------------------------- -->
<form class="form-horizontal" action="" method="POST">
      <div class="modal fade" id="eliminararchi">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ELIMINAR ARCHIVO</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="gstIdperEli" id="gstIdperEli">
                    <input type="hidden" name="doceliminar" id="doceliminar">
                      <div class="form-group">
                          <div class="col-sm-12">
                           <label class="label2" id="titledoc" for=""></label>
                              <p>¿ESTÁ SEGURO DE ELIMINAR EL ARCHIVO?<span id=""></span> </p>
                          </div>
                          <br>
                          <div class="col-sm-5">
                              <button type="button" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="borrardoc()">ACEPTAR</button>
                          </div>
                          <b>
                              <p class="alert alert-warning text-center padding error" id="danger7">Error
                                  al eliminar archivo</p>
                          </b>
                          <b>
                              <p class="alert alert-success text-center padding exito" id="succe7">¡Se
                                  elimino archivo con éxito !</p>
                          </b>
                          <b>
                              <p class="alert alert-danger text-center padding aviso" id="aviso7">Error
                                  archivo para eliminar </p>
                          </b>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</form>
<!---------------------------BORRAR DOC. ESTUDIOS-------------------------------->

<form class="form-horizontal" action="" method="POST">
      <div class="modal fade" id="eliminardoc">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ELIMINAR ARCHIVO</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="arcIdperEli" id="arcIdperEli"> 
                    <input type="hidden" name="arceliminar" id="arceliminar">
                    <!-- <input type="text" name="documen" id="documen"> -->
                      <div class="form-group">
                          <div class="col-sm-12">
                           <label class="label2" id="titledoc" for=""></label>
                              <p>¿ESTÁ SEGURO DE ELIMINAR EL ARCHIVO?<span id=""></span> </p>
                          </div>
                          <br>
                          <div class="col-sm-5">
                              <button type="button" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="archiborrar()">ACEPTAR</button>
                          </div>
                          <b>
                              <p class="alert alert-warning text-center padding error" id="danger8">Error
                                  al eliminar archivo</p>
                          </b>
                          <b>
                              <p class="alert alert-success text-center padding exito" id="succe8">¡Se
                                  elimino archivo con éxito !</p>
                          </b>
                          <b>
                              <p class="alert alert-danger text-center padding aviso" id="aviso8">Error
                                  archivo para eliminar </p>
                          </b>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</form>    

<!-----------------------BORRAR DOC. PROFESION------------------------------>

<form class="form-horizontal" action="" method="POST">
      <div class="modal fade" id="eliminarpro">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ELIMINAR ARCHIVO</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="proIdperEli" id="proIdperEli"> 
                    <input type="hidden" name="proliminar" id="proliminar">
                    <!-- <input type="text" name="documen" id="documen"> -->
                      <div class="form-group">
                          <div class="col-sm-12">
                           <label class="label2" id="titledoc" for=""></label>
                              <p>¿ESTÁ SEGURO DE ELIMINAR EL ARCHIVO?<span id=""></span> </p>
                          </div>
                          <br>
                          <div class="col-sm-5">
                              <button type="button" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="proborrar()">ACEPTAR</button>
                          </div>
                          <b>
                              <p class="alert alert-warning text-center padding error" id="danger9">Error
                                  al eliminar archivo</p>
                          </b>
                          <b>
                              <p class="alert alert-success text-center padding exito" id="succe9">¡Se
                                  elimino archivo con éxito !</p>
                          </b>
                          <b>
                              <p class="alert alert-danger text-center padding aviso" id="aviso9">Error
                                  archivo para eliminar </p>
                          </b>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</form>    