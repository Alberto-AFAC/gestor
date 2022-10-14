<!-- MODAL PERSONAL EXTERNO PERFLI -->

<div class="modal fade" id='modal-perexterno'>
            <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-size:19px; color: #000000;">DATOS DEL PERSONAL EXTERNOS</h4>
                            <div class="form-group">
                                <button type="button" class="btn btn-box-tool" style="float:right" data-widget="collapse">
                                    <a href='javascript:opediext()' id="openedth" style="font-size:22px;float:right"> <i class="fa fa-edit"></i></a>
                                    <a href='javascript:closext()' id="cerreth" style="display:none;font-size: 22px;float:right"> <i class="fa fa-ban"></i></a>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form id="perexterna1" class="form-horizontal" action="" method="POST">
                                <input type="hidden" name="gstIdper1" id="gstIdper1">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="label2">*NOMBRE(S)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstNombr1" name='gstNombr1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">*APELLIDO(S)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstApell1" name='gstApell1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">*TIPO DE PERSONA</label>
                                        <select type="text" class="form-control inputalta" id="gstLunac1" name="gstLunac1" disabled="">
                                            <option value="">SELECCIONA EL CARGO</option>
                                            <option value="NACIONAL">NACIONAL</option>
                                            <option value="INTERNACIONAL">INTERNACIONAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="nacional" name="nacional">
                                    <div class="col-sm-4">
                                        <label class="label2">CURP</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstCurp1" name='gstCurp1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">RFC</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstRfc1" name='gstRfc1' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ESTADO</label>
                                        <select type="text" class="form-control inputalta" id="gstStado1" name="gstStado1" disabled="">
                                            <option value="">SELECCIONA EL ESTADO</option>
                                            <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                                            <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                                            <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                                            <option value="CAMPECHE">CAMPECHE</option>
                                            <option value="COAHUILA">COAHUILA</option>
                                            <option value="COLIMA">COLIMA</option>
                                            <option value="CHIAPAS">CHIAPAS</option>
                                            <option value="CHIHUAHUA">CHIHUAHUA</option>
                                            <option value="DISTRITO FEDERAL">CIUDAD DE MÉXICO</option>
                                            <option value="DURANGO">DURANGO</option>
                                            <option value="GUANAJUATO">GUANAJUATO</option>
                                            <option value="GUERRERO">GUERRERO</option>
                                            <option value="HIDALGO">HIDALGO</option>
                                            <option value="JALISCO">JALISCO</option>
                                            <option value="MÉXICO">MÉXICO</option>
                                            <option value="MICHOACÁN">MICHOACÁN</option>
                                            <option value="MORELOS">MORELOS</option>
                                            <option value="NAYARIT">NAYARIT</option>
                                            <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                                            <option value="OAXACA">OAXACA</option>
                                            <option value="PUEBLA">PUEBLA</option>
                                            <option value="QUERÉTARO">QUERÉTARO</option>
                                            <option value="QUINTANA ROO">QUINTANA ROO</option>
                                            <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                                            <option value="SINALOA">SINALOA</option>
                                            <option value="SONORA">SONORA</option>
                                            <option value="TABASCO">TABASCO</option>
                                            <option value="TAMAULIPAS">TAMAULIPAS</option>
                                            <option value="TLAXCALA">TLAXCALA</option>
                                            <option value="VERACRUZ">VERACRUZ</option>
                                            <option value="YUCATÁN">YUCATÁN</option>
                                            <option value="ZACATECAS">ZACATECAS</option>
                                            <option value="EN OTRO PAÍS">EN OTRO PAÍS</option>
                                            <option value="NO ESPECIFICADO">NO ESPECIFICADO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="label2">*SEXO</label>
                                        <select type="text" class="form-control inputalta" id="gstSexo1" name="gstSexo1" disabled="">
                                            <option value="">ELIGIR EL SEXO</option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ORGANIZACIÓN (INSTITUCIÓN)</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="sgtCrhnt2" name='sgtCrhnt2' disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">ÁERA DE ADSCRIPCIÓN</label>
                                        <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta" id="gstRusp2" name='gstRusp2' disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>*ESPECIALIDAD</label>
                                        <select data-placeholder="SELECCIONE A QUIEN VA DIRIGIDO" style="width: 100%;color: #000" class="form-control select2" type="text" class="form-control" id="gstIDCat1" name="gstIDCat1" disabled="">
                                        <option value="" selected>SELECCIONE ESPECIALIDAD</option><br>
                                            <?php while($cat = mysqli_fetch_row($categs)):?>
                                        <option value="<?php echo $cat[0]?>"><?php echo $cat[1]?> -
                                            <?php echo $cat[2]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>                                                
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <H4><i style=color:#333 class="fa fa-dot-circle-o"></i>
                                                <label style=color:#333> CONTACTO</label>
                                            </H4>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="label2">CASA</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control inputalta" id="gstCasa1" name="gstCasa1" placeholder="(55) 5555-5555"  autocomplete="off" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label2">CELULAR</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control inputalta" id="gstClulr1" name="gstClulr1" placeholder="(52) 55-5555-5555" autocomplete="off" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-container">
                                        <label class="label2">*CORREO PERSONAL </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> <i class="ion-ios-checkmark iconoInput" id="labelvalidcor" style="display:none;" disabled=""></i>                              
                                                <i class="ion-ios-checkmark iconoInput" id="labelvalidcor" style="display:none;"></i>         
                                                <i class="ion-ios-close iconoInput" id="labelinvarfcor" style=" color: #F10C25; display:none;"></i>
                                                <input onkeyup="mayus(this);" type="text" class="form-control inputalta" placeholder="correo@correo.com" id="gstCorro1" name="gstCorro1" disabled="">
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 ">
                                        <label class="label2">CORREO ALTERNATIVO</label>
                                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input onkeyup="mayus(this);" type="email" class="form-control inputalta" placeholder="correo@correo.com" id="gstSpcID1" name="gstSpcID1" disabled="">
                                        </div>
                                    </div>
                                </div>                    
                                <!-- ----------------------------------------------------fin funcion del empleado-------------------- -->
                                <div class="form-group"><br>
                                    <div class="col-sm-offset-0 col-sm-5">
                                        <button type="button" id="button1" style="font-size:18px; width:120px; height:40px; display:none;" class="btn btn-block btn-primary altaboton" onclick="edithperext()">ACEPTAR</button>     
                                    </div>
                                    <b>
                                        <p class="alert alert-danger text-center padding error" id="dangeractu">Error al guardar los cambios</p>
                                    </b>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal fade" id="modal-bajaex">
        <form class="form-horizontal" action="" method="POST">
          <div class="modal-dialog">
              <div class="modal-content">
              
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">BAJA DE PERSONAL EXTERNO</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="bajaIdex" id="bajaIdex"> 
                    <!-- <input type="text" name="documen" id="documen"> -->
                      <div class="form-group">
                          <div class="col-sm-12">
                           <label class="label2" id="titledoc" for=""></label>
                              <p>¿ESTAS SEGURO DE DAR DE BAJA AL USUARIO?<span id=""></span> </p>
                          </div>
                          <div class="col-sm-12">
                          <input type="text" name="bajaIdperex" class="form-control inputalta" id="bajaIdperex" disabled=""> 
                          <br>
                          </div>
                          <br>
                          
                          <div class="col-sm-5">
                              <button type="button" id="baja" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="borrarperext()">ACEPTAR</button>
                          </div>
                          <b>
                              <p class="alert alert-warning text-center padding error" id="dangerdeext">Error
                                  al dar de baja al usuario</p>
                          </b>
                          <b>
                              <p class="alert alert-success text-center padding exito" id="succe11">¡Se dio de baja con éxito!</p>
                          </b>

                      </div>
                  </div>
              </div>
          </div>
        </form> 
      </div>
<!-- inio modal de cursos -->
<div class="modal fade" id='modal-curexten'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4><label>CURSOS PROGRAMADOS</label></h4>
            </div>
            <div class="modal-body">
              <form id="Dtall" class="form-horizontal" action="" method="POST" >
                <div class="form-group">
                  <div class="col-sm-8">
                    <form action="instructor.php" method="get">
                        <input type="hidden" class="form-control disabled inputalta" name="insperext" id="insperext" value="" >
                    </form>
                    <input type="" class="form-control disabled inputalta" name="inexnomebre" id="inexnomebre" disabled="">
                    </div>

                  </div>    
                  <div class="tabbable-line">
					        <!-- <ul class="nav nav-tabs ">
						        <li class="active">
						          <a href="#tab_default_1" data-toggle="tab">CURSOS IMPARTIDOS</a>
						        </li>
                  </ul> -->
                  <div class="tab-content">
						      <div class="tab-pane active" id="tab_default_1">
                    <div id="cursextern"></div>
                  </div>              
                </div>  
            </div>  
              </form>                         
          </div>            
        </div>   
      </div> 
    </div>  
</div>          
<!--fin modal de instructor y coordinador cursos coordinados y inpartidos -->