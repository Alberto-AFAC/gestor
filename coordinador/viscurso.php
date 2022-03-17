<!-- Main content -->

<div class="row" id="detCurso" style="display: none;">

    <!-- /.col -->
    <div class="col-md-12">
        <div class="box-tools pull-right">
            <button type="button" title="Cerrar" id="cerrarc" class="btn btn-box-tool" style="font-size:18px"
                data-widget="remove">
                <a href="lisCurso"><i class='fa fa-times'></i></a>
            </button>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

                <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DEL CURSO</a></li>

                <li><a href="#timeline" data-toggle="tab">PARTICIPANTES</a></li>
            </ul>

            <div class="tab-content">

                <div class="active tab-pane" id="activity">
                    <!-- Post -->

                    <div class="post">

                        <form class="form-horizontal" action="" method="POST" id="Dtall">

                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="label2">NOMBRE</label>
                                    <input type="text" style="text-transform:uppercase;"
                                        class="form-control disabled inputalta" id="gstTitlo" name="gstTitlo"
                                        disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="label2">TIPO DE CAPACITACIÓN</label>
                                    <select type="text" class="form-control inputalta" id="gstTipo" name="gstTipo"
                                        disabled="">
                                        <option value="0">ELEGIR UNA OPCIÓN</option>
                                        <option value="INDUCCIÓN">INDUCCIÓN</option>
                                        <option value="BÁSICOS/INICIAL">BÁSICOS/INICIAL</option>
                                        <option value="TRANSVERSALES">TRANSVERSALES</option>
                                        <option value="RECURRENTES">RECURRENTES</option>
                                        <option value="ESPECÍFICOS">ESPECÍFICOS</option>
                                        <option value="FORTALECIMIENTO DEL DESEMPEÑO">FORTALECIMIENTO DEL DESEMPEÑO
                                        </option>
                                        <option value="SENSIBILIZACIÓN">SENSIBILIZACIÓN</option>
                                        <option value="CERTIFICACIÓN">CERTIFICACIÓN</option>
                                        <option value="ACTUALIZACIÓN Y DESARROLLO">ACTUALIZACIÓN Y DESARROLLO</option>
                                        <option value="OJT">OJT</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="label2">PERFIL A QUIEN VA DIRIGIDO</label>
                                    <input type="text" style="text-transform:uppercase;" class="form-control inputalta"
                                        id="gstPrfil" name="gstPrfil" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="label2">DOCUMENTO QUE EMITE</label>
                                    <input type="text" style="text-transform:uppercase;" class="form-control inputalta"
                                        id="gstCntnc" name="gstCntnc" disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="label2">DURACIÓN</label>
                                    <input type="text" class="form-control inputalta" id="gstDrcin" name="gstDrcin"
                                        disabled="">
                                </div>
                                <div class="col-sm-offset-0 col-sm-3">
                                    <label class="label2">PERIODO DE VIGENCIA</label>
                                    <select type="text" class="form-control inputalta" id="gstVignc" name="gstVignc"
                                        disabled="">
                                        <option value="0">SELECCIONE VIGENCIA</option>
                                        <option value="101">UNICA VEZ</option>
                                        <option value="1">1 AÑO</option>
                                        <option value="2">2 AÑOS</option>
                                        <option value="3">3 AÑOS</option>
                                        <option value="4">4 AÑOS</option>
                                        <option value="5">5 AÑOS</option>
                                        <option value="6">6 AÑOS</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <label class="label2">CODIGO</label>
                                    <input type="text" name="codigoIDCuro" id="codigoIDCuro" type="text"
                                        style="text-transform:uppercase;" class="form-control inputalta" disabled="">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label2">OBJETIVO</label>
                                    <textarea name="gstObjtv" id="gstObjtv" placeholder="Escribir el Objetivo"
                                        style="text-transform:uppercase;" class="form-control disabled inputalta"
                                        rows="5" cols="50" disabled=""></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for=""></label>
                                <button type="button" title="Editar Curso" class="btn btn-box-tool"
                                    data-widget="collapse">
                                    <a href='javascript:editcurso()' id="editcurs"
                                        style="font-size:20px; padding-left: 0.5em;"> <i class="fa fa-edit"></i>
                                        REPROGRAMAR CURSO</a>
                                    <a href='javascript:cereditcurso()' title="Cerrar edición" id="cerrareditc"
                                        style="display:none; font-size:20px;padding-left: 0.5em;"> <i
                                            class="fa fa-ban"></i> REPROGRAMAR CURSO</a>
                                </button>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="label2">FECHA INICIO</label>
                                    <input type="date" class="form-control disabled inputalta" id="fcurso" name="fcurso" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="label2">HORA DE INCIO</label>
                                    <input type="time" class="form-control disabled inputalta" id="hcurso" name="hcurso" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label2">FECHA CONCLUSIÓN</label>
                                    <input type="date" class="form-control disabled inputalta" id="fechaf" name="fechaf" disabled="">
                                    
                                </div>
                                <!-- <div class="col-sm-3">
                                    <label class="label2">HORA DE FINALIZACIÓN</label>
                                    <input type="time" class="form-control disabled inputalta" id="hcursof" name="hcursof" disabled="">
                                </div> -->
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button type='button' title='Días Hábiles' onclick='diasEditar()' class='btn btn-info' data-toggle='modal' data-target='#diahabil-modal' id="modalMost" disabled='disabled'>DÍAS HÁBILES </button>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label class="label2">SEDE DEL CURSO</label>
                                    <input onkeyup="mayus(this);" type="text" class="form-control inputalta" id="sede"
                                        name="sede" disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label class="label2">MODALIDAD</label>
                                    <select type="text" class="form-control inputalta" id="modalidads" name="modalidads"
                                        onChange="modalidades()" disabled="">
                                        <option value="0">ELEGIR UNA OPCIÓN</option>
                                        <option value="A DISTANCIA">A DISTANCIA</option>
                                        <option value="AUTOAPRENDIZAJE">AUTOAPRENDIZAJE</option>
                                        <option value="AUTOGESTIVO">AUTOGESTIVO</option>
                                        <option value="E-LEARNNING">E-LEARNNING</option>
                                        <option value="HIBRIDO">HIBRIDO</option>
                                        <option value="PRESENCIAL">PRESENCIAL</option>
                                    </select>
                                </div>

                                <div id="dismod">
                                    <div class="col-sm-3">
                                        <label class="label2">LINK DE ACCESO</label>
                                        <input type="url" class="form-control inputalta" id="linkcur" name="linkcur"
                                            placeholder="URL" disabled="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="label2">CONTRASEÑA DE ACCESO</label>
                                        <input type="url" class="form-control inputalta" id="contracur" name="contracur"
                                            placeholder="Contraseña de acceso" disabled="">
                                    </div>
                                    <div class="col-sm-3"><br>
                                        <label class="label2">CLASSROOM</label>
                                        <input type="url" class="form-control inputalta" id="classromcur"
                                            name="classromcur" placeholder="CLASSROM" disabled="">
                                    </div>
                                </div>
                            </div>

                            <div id="disocl" style="display: none;" class="form-group">
                                <input type="hidden" name="linkcur" id="linkcur">
                                <input type="hidden" name="contracur" id="contracur">
                                <input type="hidden" name="classromcur" id="classromcur">

                            </div>

                            <input type="hidden" name="codigo" id="codigo">
                            <input type="hidden" name="proceso" id="proceso">

                            <button type="button" id="buttonfin" title="Finalizar Curso"
                                style="font-size:15px; width:150px; height:35px;" class="btn btn-block btn-success"
                                onclick="finalizar();">FINALIZAR CURSO</button>

                            <div id="buttonfin"></div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="error">Error al finalizar el
                                    curso </p>
                            </b>
                            <b>
                                <p class="alert alert-success text-center padding exito" id="exito">¡Se finalizo con
                                    éxito!</p>
                            </b>
                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario
                                    finalizar los procesos</p>
                            </b>
                            <!-- boton finaliza edición -->
                            <div class="form-group" id="buttongcambios" style="display:none;"><br>
                                <div class="col-sm-offset-0 col-sm-5">
                                    <button type="button"
                                        style="font-size:15px; width:150px; height:35px; background: #0F3F87;"
                                        class="btn btn-block btn-info" data-toggle="modal"
                                        data-target="#basicModal">REPROGRAMAR</button>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog"
                                    aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">REPROGRAMACIÓN DE CURSO</h4>
                                            </div>
                                            <div class="modal-body">
                                                <!-- <h5>NO OLVIDES QUE EXISTE UN LIMITE MAXIMO PARA REPROGRAMAR EL CURSO
</h5> -->
                                                <label>¿DESEAS CONFIRMAR ESTA ACCIÓN</label>
                                                <select type="text" class="form-control" id="reprogramar"
                                                    name="reprogramar">
                                                    <option value="" selected>SELECCIONE UNA OPCIÓN</option>
                                                    <option value="0">NO</option>
                                                    <option value="1">SI</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="button"
                                                    style="font-size:15px; width:150px; height:35px; background: #0F3F87;"
                                                    onclick="cursoAct();"
                                                    class="btn btn-block btn-info">CONFIRMAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="error">Error al agregar
                                        curso </p>
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="exito">¡Se agrego el
                                        curso con éxito!</p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario
                                        agregar los datos que se solicitan </p>
                                </b>
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

                            <br>

                            <form id="impri" action="" method="POST">
                                <input type="hidden" class="form-control" id="gstIdlstc" name="gstIdlstc">
                                <input type="hidden" name="gstTitulo" id="gstTitulo">
                                <input type="hidden" name="codigoCurso" id="codigoCurso" />
                                <!-- notiocu -->
                                <span id="notiocu" data-toggle="modal" data-target="#notificarConv"
                                    style="font-size:12px; width:280px; height:30px "
                                    class="btn btn-info btn-sm altaboton"><i class="fa fa-envelope-open"
                                        aria-hidden="true"></i> NOTIFICAR CONVOCATORIA A PARTICIPANTES</span>

                                <span id="notiocus" data-toggle="modal" data-target="#notificarRespon"
                                    style="font-size:12px; width:280px; height:30px "
                                    class="btn btn-info btn-sm altaboton"><i class="fa fa-graduation-cap"
                                        aria-hidden="true"></i> NOTIFICAR CONVOCATORIA A RESPONSABLES</span>

                            </form>
                            <!-- CONFIRMACIÓN ENVIÓ DE INVITACIÓN A PARTICIPANTES-->
                            <form id="correo" action="" method="POST">
                                <div class="modal fade" id='notificarConv' tabindex="-1" role="dialog"
                                    aria-labelledby="notificarConv" aria-hidden="true">
                                    <div class="modal1">

                                        <div id="success-icon">
                                            <div>
                                                <img class="img-circle1" src="../dist/img/email.png">
                                            </div>
                                        </div>
                                        <h1 class="modaltitle"><strong>ENVIÓ DE CONVOCATORIA</strong></h1>
                                        <p class="points">Favor de verificar los datos del curso y de los
                                            participantes
                                            antes de enviar el correo.</p>

                                        <hr>

                                        <button type="button" id="cerrarres" style="font-size:18px"
                                            class="btn btn-block btn-primary" onclick="enviarMail()"
                                            data-dismiss="modal">ENVIAR</button>
                                        <button type="button" id="agregarres" style="font-size:18px"
                                            class="btn btn-block btn-default btn-sm"
                                            data-dismiss="modal">CERRAR</button>
                                    </div>
                                </div>
                            </form>

                            <!-- CONFIRMACIÓN ENVIO DE CONVOCATORIA A RESPONSABLES -->
                            <form id="correo" action="" id="googlesecurity" method="POST">
                                <div class="modal fade" id='notificarRespon' tabindex="-1" role="dialog"
                                    aria-labelledby="notificarConv" aria-hidden="true">
                                    <div class="modal1">

                                        <div id="success-icon">
                                            <div>
                                                <img class="img-circle1" src="../dist/img/email.png">
                                            </div>
                                        </div>
                                        <h1 class="modaltitle"><strong>ENVIÓ DE CONVOCATORIA</strong></h1>
                                        <p class="points">Favor de verificar los datos del curso y de los
                                            participantes
                                            antes de enviar el correo.</p>
                                        <div class="field-wrapper">
                                            <div id="message-wrap">
                                                <span></span>
                                            </div>
                                        </div>

                                        <hr>
                                        <label>NOTIFICAR A RESPONSABLE</label>
                                        <div class="field-wrapper">
                                            <input type="text" class="form-checkfield form-control" id="correoResponsable"
                                                name="correoResponsable"
                                                placeholder="Correo electronico del responsable">
                                        </div>
                                        <br>
                                        <div class="field-wrapper">
                                            <div id="google_recaptcha"></div>
                                        </div>
                                        <button type="button" id="enviar-mail-responsable" style="font-size:18px"
                                            class="btn btn-block btn-primary">ENVIAR</button>
                                        <button type="button" id="agregarres" style="font-size:18px"
                                            class="btn btn-block btn-default btn-sm"
                                            data-dismiss="modal">CERRAR</button>
                                    </div>
                                </div>
                            </form>
                            <!--FIN DE CONFIRMACIÓN ENVIÓ -->

                            <!-- CONFIRMACIÓN DE COONVOCATORIA -->
                            <div class="modal fade" id='modal-declinado1' tabindex="-1" role="dialog"
                                aria-labelledby="basicModal" aria-hidden="true">
                                <div class="modal1">

                                    <div id="success-icon">
                                        <div>
                                            <img class="img-circle1" src="../dist/img/declinado.png">
                                        </div>
                                    </div>
                                    <!-- <input id="pruebadec" type="text"> -->
                                    <h1 class="modaltitle1" style="color:gray"><strong>DETALLES</strong></h1>
                                    <label id="nomdeclina1" style="font-size: 16px; color:gray" for=""></label>
                                    <label id="cursdeclina1" style="font-size: 16px; color:gray" for=""></label>
                                    <label id="declindet1" style="font-size: 18px; color:gray; font-weight: normal;"
                                        class="points">Declina la convocatoria del curso:</label>
                                    <label id="motivod1" style="font-size: 18px; color:#2B2B2B; font-weight: blod;"
                                        for=""></label>
                                    <hr>
                                    <a id="declinpdf1" class="btn btn-block btn-social btn-linkedin" href=""
                                        id="pdfdeclin" style="text-align: center;" target="_blak"> <i
                                            class="fa fa-file-pdf-o"></i>
                                        VISUALIZAR EL PDF ADJUNTO</a>
                                    <label readonly id="otrosd1" name="textarea"
                                        style="font-size: 16px; color:#615B5B; font-weight: normal; display:none"
                                        rows="3" cols="50"></label>
                                </div>
                            </div>
                            <!--FIN DE CONFIRMACIÓN DE COONVOCATORIA -->

                            <div class="box-body">
                                <br>
                                <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
                                <!-- <div id="proCursos"></div> -->
                                <table class="display table table-striped table-bordered dataTable"
                                    id="data-table-cursosProgramados" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE(S)</th>
                                            <th>APELLIDO(S)</th>
                                            <th>ESPECIALIDAD</th>
                                            <th>ASISTENCIA</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>

                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <form class="form-horizontal" action="" method="POST">
                        <div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span style="color: black"
                                                aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLabel">TÍTULO </h4>
                                    </div>
                                    <input type="hidden" class="form-control" id="idmstra" name="idmstra">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label>NOMBRE</label>
                                                <input type="text" style="text-transform:uppercase;"
                                                    class="form-control" id="titulos" name="titulos">
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
                                                <select type="text" class="form-control" id="modalidads"
                                                    name="modalidads">
                                                    <option value="null">ELEGIR UNA OPCIÓN</option>
                                                    <option value="A DISTANCIA">A DISTANCIA</option>
                                                    <option value="PRESENCIAL">PRESENCIAL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label>PERFIL A QUIEN VA DIRIGIDO</label>
                                                <input type="text" style="text-transform:uppercase;"
                                                    class="form-control" id="perfils" name="perfils">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>DOCUMENTO QUE EMITE</label>
                                                <input type="text" style="text-transform:uppercase;"
                                                    class="form-control" id="constancias" name="constancias">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>DURACIÓN</label>
                                                <input type="time" class="form-control" id="duracions" name="duracions">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <label>OBJETIVO</label>
                                                <textarea name="objetivos" id="objetivos"
                                                    placeholder="Escribir el Objetivo" style="text-transform:uppercase;"
                                                    class="form-control" rows="5" cols="50"></textarea>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>TEMARIO</label>
                                                <input id="adjuntos" type="file" name="adjuntos"
                                                    style="width: 410px; margin:0 auto;" required accept=".pdf,.doc"
                                                    class="input-file" size="1450">
                                            </div>
                                        </div>
                                        <div class="form-group"><br>
                                            <div class="col-sm-offset-0 col-sm-5">

                                            </div>
                                            <b>
                                                <p class="alert alert-danger text-center padding error" id="error">Error
                                                    al agregar curso </p>
                                            </b>

                                            <b>
                                                <p class="alert alert-success text-center padding exito" id="exito">¡Se
                                                    agrego el curso con éxito!</p>
                                            </b>

                                            <b>
                                                <p class="alert alert-warning text-center padding aviso" id="vacio">Es
                                                    necesario agregar los datos que se solicitan </p>
                                            </b>
                                        </div><b>
                                            <p class="alert alert-danger text-center padding error" id="error">Error al
                                                agregar curso </p>
                                        </b>

                                        <b>
                                            <p class="alert alert-success text-center padding exito" id="exito">¡Se
                                                agrego el curso con éxito!</p>
                                        </b>

                                        <b>
                                            <p class="alert alert-warning text-center padding aviso" id="vacio">Es
                                                necesario agregar los datos que se solicitan </p>
                                        </b>
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