<!-- REACCION DE EVALUACIÓN OJT -->
<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modal-genreportOJT">
        <div class="modal-dialog width" role="document" style="/*margin-top: 10em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
                        FORMATO DE REPORTE DE CUMPLIMIENTO DE
                        NIVEL I Y II
                    </h3>
                    <br>
                    <h4>
                        PROGRAMA DE ENTRENAMIENTO EN EL PUESTO DE TRABAJO (OJT)
                    </h4>
                    <b>
                        <label1 style="font-size: 14px"></label1>
                    </b>
                    <br>
                    <section class="content">
                        <!----------INICIO-------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-tabs-custom">
                                    <div class="box-header with-border">
                                        <form action="" class="formulario1">
                                            <input type="hidden" name="idregevalOJT" id="idregevalOJT">

                                            <div class="radio">
                                                <div class="form-group ">
                                                    <div class="col-sm-4">
                                                        <label style="font-size:16px">COMISIÓN:</label>
                                                        <input class="col-sm-12" type="text" name="comisionOJTgen"
                                                            id="comisionOJTgen"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="font-size:16px">FECHA:</label>
                                                        <input class="col-sm-12" type="text" name="fecOJTgen"
                                                            id="fecOJTgen"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="font-size:16px">LUGAR:</label>
                                                        <input class="col-sm-12" type="text" name="lugOJTgen"
                                                            id="lugOJTgen"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>

                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">ESPECIALIDAD:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="col-sm-12" type="text" name="especOJTgen"
                                                            id="especOJTgen"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>

                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">NOMBRE DE LA TAREA:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <!-- <input class="col-sm-12" type="text" name="tareprinOJTrec"
                                                            id="tareprinOJTrec"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled=""> -->
                                                        <textarea disabled="" class="col-sm-12" name="tareprinOJTgen"
                                                            id="tareprinOJTgen" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">NOMBRE DE LA SUBTAREA:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <!-- <input class="col-sm-12" type="text" name="subtareOJtreac"
                                                            id="subtareOJtreac"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled=""> -->
                                                        <textarea disabled="" class="col-sm-12" name="subtareOJtgen"
                                                            id="subtareOJtgen" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label style="font-size:16px">INSTRUCTORE(S):</label>
                                                        <div id="id_instructOJ"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form1" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">ME EXPLICARON EN QUE CONSISTE LA TAREA Y SUBTAREA
                                                <span id="span1">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SI" id="ro5">
                                                        <label for="ro5">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO" id="ro4">
                                                        <label for="ro4">NO</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form2" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">REVISÉ, LEÍ Y ENTENDÍ EL MATERIAL QUE ME FUE PROPORCIONADO<span id="span2">*</span></h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="SI" id="ro6">
                                                        <label for="ro6">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="NO" id="ro7">
                                                        <label for="ro7">NO</label>
                                                    </div>
                                                </div>  
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form3" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LOGRÉ RESOLVER TODAS MIS DUDAS
                                                <span id="span3">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="SI" id="ro12">
                                                        <label for="ro12">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="NO"
                                                            id="ro13">
                                                        <label for="ro13">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form4" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">CONOCÍ LAS INSTALACIONES, ASÍ COMO SU UBICACIÓN
                                                <span id="span4">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="SI" id="ro18">
                                                        <label for="ro18">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="NO"
                                                            id="ro19">
                                                        <label for="ro19">NO</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form5" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">CONOCÍ A MIS COMPAÑEROS Y AL PERSONAL CON QUIEN VOY A TRABAJAR<span id="span5">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="SI" id="ro24">
                                                        <label for="ro24">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="NO"
                                                            id="ro25">
                                                        <label for="ro25">NO</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form6" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS HABILIDADES ADQUIRIDAS SON SUFICIENTE PARA CONOCER EL DESARROLLO DE LAS TAREAS<span
                                                    id="span6">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="SI" id="ro30">
                                                        <label for="ro30">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="NO"
                                                            id="ro31">
                                                        <label for="ro31">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form7" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">ME PROPORCIONARON EL MATERIAL CORRESPONDIENTE PARA LA TAREA Y SUBTAREA
                                                <span id="span7">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="SI" id="ro36">
                                                        <label for="ro36">SI</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="NO"
                                                            id="ro37">
                                                        <label for="ro37">NO</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form17" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">OBSERVACIONES:
                                                <span id="span17">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea class="col-sm-12" name="preg17" id="preg17" rows="5"
                                                            cols="40" onkeyup="mayus(this);"
                                                            style="font-size: 18px; border-radius: 5px; background-color: #E5E7EC"
                                                            placeholder="ESCRIBE AQUÍ TUS COMENTARIOS"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group"><br>
                                <div class="col-sm-offset-0 col-sm-5">
                                    <div class="col-sm-5">
                                        <button type="button" class="btn btn-primary"
                                            onclick="generareport()">ACEPTAR</button>
                                    </div>
                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="peligro">Error al
                                        agregar datos
                                    </p>
                                </b>
                                <b>
                                    <p class="alert alert-success text-center padding exito" id="enviadoexito">¡Su
                                        evaluación de reacción se
                                        realizó con éxito !</p>
                                </b>
                                <b>
                                    <p class="alert alert-info text-center padding error" id="aviso">Su evaluación de
                                        reacción fue
                                        realizada
                                    </p>
                                </b>
                                <b>
                                    <p class="alert alert-warning text-center padding error" id="pregunta">Pregunta
                                        obligatoria<strong style=";font-size: 1.7em"> *</strong>
                                    </p>
                                </b>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- REACCION DE EVALUACIÓN OJT -->




<!-- MODAL CONFIRMA CONVOCATORIA OJT  -->
<!-- MODAL CONFIRMA CONVOCATORIA OJT  -->
<div class="modal fade" id="confirOJT">
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="location.href='./ojtprogramados'" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">CONFIRMAR ASISTENCIA</h4>
                </div>
                <div class="modal-body">
                    <form id="ConfirmaOJ" class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="id_registro" id="id_registrooj1">
                        <input type="hidden" name="id_persona" id="id_personaoj1">
                        <table class="table table-bordered">
                            <tr>
                                <th>TAREA PRINCIPAL</th>
                                <th>SUBTAREA PROGRAMADA</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="ojtarea"></div>
                                </td>
                                <td>
                                    <div id="ojtsubtarea"></div>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>NIVEL</th>
                                <th>INICIO</th>
                                <th>FIN</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="ojnivel"></div>
                                </td>
                                <td>
                                    <div id="ojfecinic"></div>
                                </td>
                                <td>
                                    <div id="ojfecfin"></div>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <div class="col-sm-offset-0 col-sm-6">
                                        <h4 class="label2" style="color:#05001E; font-size: 18px; ">CONFIRMAR
                                            ASISTENCIA:</h4>
                                        <!--  <input type="text" name="confir" id="confir" value="SI ASISTIRÉ" disabled=""> -->
                                        <div class="switcher">
                                            <input type="radio" name="Opc" value="SI" id="SIOJT"
                                                class="switcher__input switcher__input--yin">
                                            <label for="SIOJT" class="switcher__label">SI</label>
                                            <input type="radio" name="Opc" value="NO" id="NOOJT"
                                                class="switcher__input switcher__input--yang">
                                            <label for="NOOJT" class="switcher__label">NO</label>
                                            <span class="switcher__toggle"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-0 col-sm-6">
                                        <br>
                                        <p id="confirasojt" style="width: 420px;">
                                            <i style="color: #D58512; font-size: 25px;"
                                                class="fa fa-exclamation-triangle"></i>
                                            <label style="font-size: 25px;">FAVOR DE CONFIRMAR ASISTENCIA </label>
                                            <input type="hidden" id="confojt" name="confojt">
                                        </p>
                                        <p id="asisteojt" style="display: none;">
                                            <i style="color: green; font-size: 25px;" class="icon fa fa-check"></i>
                                            <label id="confm1" style="font-size: 25px;">CONFIRMAS TU ASISTENCIA</label>
                                            <input type="hidden" id="confojt" name="confojt">
                                        </p>
                                        <p id="noasisojt" style="display:none;">
                                            <label class="label2" style="font-size: 16px;">MOTIVOS DE TU
                                                INASISTENCIA</label>
                                            <select style="width: 100%" class="form-control inputalta"
                                                class="selectpicker" type="text" data-live-search="true" id="confirojt"
                                                name="confirojt" onChange="justificacionojt()">
                                                <option value="0">SELECCIONE OPCIÓN </option>
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
                                        <input id="archivoojt" type="file" name="archivoojt"
                                            style="display: none; width: 410px;" required accept=".pdf,.doc"
                                            class="input-file" size="1450">
                                        <textarea style="display: none; font-size: 15px;" id="obserojt" name="obserojt"
                                            class="form-control is-invalid inputalta"
                                            placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2"
                                            required></textarea>
                                    </div>
                                </div>
                            </th>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div id="coorojt"></div>
                                <div id="instrucojt"></div>
                            </div>
                        </div>
                        <div class="form-group"><br>
                            <div class="col-sm-offset-0 col-sm-5">
                                <button type="button" id="button" class="btn btn-info altaboton" style=""
                                    onclick="confirasictojt();">ACEPTAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="falla">Error al registrar su
                                    asistencia</p>
                            </b>
                            <b>
                                <p class="alert alert-success text-center padding exito" id="exito">¡Se registraron la
                                    asistencia con éxito!</p>
                            </b>
                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar
                                    los datos que se solicitan </p>
                            </b>
                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="renom">Renombre su archivo
                                </p>
                            </b>
                            <b>
                                <p class="alert alert-warning text-center padding adjuto" id="adjunta">Debes adjuntar
                                    archivo</p>
                            </b>
                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="error">Ocurrio un error</p>
                            </b>
                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="forn">Formato no valido</p>
                            </b>
                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="max">Supera el limite
                                    permitido</p>
                            </b>
                        </div>
                        <!-- script para validar los lebel de confiam la asistencia -->
                        <script>
                        rad = document.getElementById('SIOJT')
                        lab1 = document.getElementById('asisteojt')
                        if (rad.checked) {
                            lab1.style.display = '';
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- REACCION DE EVALUACIÓN OJT -->