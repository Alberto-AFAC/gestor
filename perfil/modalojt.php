<!-- inio modal de instructor y coordinador cursos coordinados y inpartidos -->
<div class="modal fade" id='modal-proojt'>
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3><label>DETALLE DE PROGRAMACIÓN OJT</label></h3>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button> -->

                </div>
                <div class="modal-body">
                    <form id="Dtall" class="form-horizontal" action="" method="POST">
                        <input type="hidden" id="idinfregistro" name="idinfregistro">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">INSPECTOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infojnombre"
                                    id="infojnombre" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="label2" for="">COMISIÓN:</label>
                                <input type="" class="form-control disabled inputalta" name="infcomision"
                                    id="infcomision" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">INICIO:</label>
                                <input type="" class="form-control disabled inputalta" name="infiniciocom"
                                    id="infiniciocom" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">FIN:</label>
                                <input type="" class="form-control disabled inputalta" name="infincomi" id="infincomi"
                                    disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2" for="">COORDINADOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infocoordojt"
                                    id="infocoordojt" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label class="label2" for="">INSTRUCTOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infinstrojt"
                                    id="infinstrojt" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="label2" for="">INICIO:</label>
                                <input type="" class="form-control disabled inputalta" name="infinicioojt"
                                    id="infinicioojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">FIN:</label>
                                <input type="" class="form-control disabled inputalta" name="inffinojt" id="inffinojt"
                                    disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">NIVEL:</label>
                                <input type="" class="form-control disabled inputalta" name="infnivelojt"
                                    id="infnivelojt" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">TAREA PROGRAMADA:</label>
                                <textarea type="" cols="30" rows="3" class="form-control disabled inputalta"
                                    name="inftarepromojt" id="inftarepromojt" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">SUBTAREA PROGRAMADA:</label>
                                <textarea type="" cols="30" rows="3" class="form-control disabled inputalta"
                                    name="infsubtareojt" id="infsubtareojt" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">ESPECIALIDAD:</label>
                                <!-- <input class="form-control disabled inputalta" name="infespeojt" id="infespeojt" disabled=""> -->
                                <select id="infespeojt" name="infespeojt" class="form-control"
                                    placeholder="Seleccione..." disabled="">
                                    <option value="0">Seleccione...</option>
                                    <?php while($data = mysqli_fetch_row($especialidad)):?>
                                    <option value="<?php echo $data[0]?>">
                                        <?php echo $data[1]?> -
                                        <?php echo $data[2]?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="label2" for="">TIPO:</label>
                                <input type="" class="form-control disabled inputalta" name="inftipojt" id="inftipojt"
                                    disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">LUGAR:</label>
                                <input type="" class="form-control disabled inputalta" name="influgarojt"
                                    id="influgarojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">SEDE:</label>
                                <input type="" class="form-control disabled inputalta" name="infsedeojt" id="infsedeojt"
                                    disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <button type="button" onclick="endojt()" name="buttofnojt" id="buttofnojt"
                                    title="Finalizar OJT" class="btn btn-block btn-success btn-sm" onclick="">FINALIZAR
                                    OJT PROGRAMADA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fin modal de instructor y coordinador cursos coordinados y inpartidos -->

<!-- CONFIRMACIÓN ENVIÓ DE INVITACIÓN A OJT-->
<form id="enviarOjt" action="" method="POST">
    <div class="modal fade" id='notificarConv' tabindex="-1" role="dialog" aria-labelledby="notificarConv"
        aria-hidden="true">
        <div class="modal1">

            <div id="success-icon">
                <div>
                    <img class="img-circle1" src="../dist/img/email.png">
                </div>
            </div>
            <h1 class="modaltitle"><strong>ENVIÓ DE NOTIFICACIÓN OJT</strong></h1>
            <p class="points">Favor de verificar los datos del la programación
                antes de enviar el correo.</p>

            <hr>

            <button type="button" id="cerrarres" style="font-size:18px" class="btn btn-block btn-primary"
                onclick="enviarMailOjt(<?php echo $perona ?>)" data-dismiss="modal">ENVIAR</button>
            <button type="button" id="agregarres" style="font-size:18px" class="btn btn-block btn-default btn-sm"
                data-dismiss="modal">CERRAR</button>
        </div>
    </div>
</form>

<!----------------------------------------------------MODAL EVALUACIÓN NIVEL 1------------------------------------------------------>

<form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
    <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal fade" id="modal-evaluarojt">
            <div class="modal-dialog width" style="width: 80%;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>
                        <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL
                            I</h4>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-2">

                            </div>
                        </div>
                        <div class="form-group">
                            <input style="" type="hidden" id="idtarpre" name="idtarpre">
                            <div class="col-sm-6">
                                <label>INSPECTOR:</label>
                                <form action="pdfprubas.php" method="post">
                                    <input style="display:none;" type="text" id="idinspo" name="idinspo">

                                </form>
                                <input type="text" name="nompoj1" id="nompoj1" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label>INSTRUCTOR:</label>
                                <input type="hidden" id="idintucco" name="idintucco">
                                <input type="text" name="tipooj1" id="tipooj1" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>ESPECILIDAD:</label>
                                <input type="text" name="espoj1" id="espoj1" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>TAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="taroj" id="taroj"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>SUBTAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="suboj" id="suboj"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div style="float:right;" class="col-sm-1">
                            <a id="editarevalojt" name="editarevalojt" onclick="openojteth()" title="Editar Evaluación"
                                style="font-size:22px; display:none;float:right;"> <i class="fa fa-edit"></i> </a>
                            <a id="editarevalojtclose" name="editarevalojtclose" onclick="cerrarojeva()"
                                title="Editar Evaluación" style="font-size:22px; display:none;float:right;"> <i
                                    class="fa fa-ban"></i> </a>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                    <thead style="background-color:#FFFFFF; color:black">
                                        <tr>
                                            <th>#</th>
                                            <th>PARAMETROS</th>
                                            <th colspan="2">INACEPTABLES</th>
                                            <th colspan="2">ACEPTABLE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>El aprendiz identifica apropiadamente los materiales asociados con la
                                                tarea (reglas, órdenes, formas, equipamiento, etc.)</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test1" name="preg1"
                                                        value="0" /><label class="radio-custom-label" for="test1">No
                                                        identifica los materiales.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test2" name="preg1"
                                                        value="10" /><label class="radio-custom-label"
                                                        for="test2">Identifica algunos materiales.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test3" name="preg1"
                                                        value="15" /><label class="radio-custom-label"
                                                        for="test3">Identifica casi todos los materiales.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test4" name="preg1"
                                                        value="20" /><label class="radio-custom-label"
                                                        for="test4">Identifica todos los materiales.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>El aprendiz entiende los términos y definiciones clave asociados con la
                                                tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test5" name="preg2"
                                                        value="0" /><label class="radio-custom-label" for="test5">No
                                                        entiende los términos.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test6" name="preg2"
                                                        value="10" /><label class="radio-custom-label"
                                                        for="test6">Entiende algunos términos.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test7" name="preg2"
                                                        value="15" /><label class="radio-custom-label"
                                                        for="test7">Entiende casi todos los términos.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test8" name="preg2"
                                                        value="20" /><label class="radio-custom-label"
                                                        for="test8">Entiende todos los términos.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>El aprendiz explica cómo se inicia la tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test9" name="preg3"
                                                        value="0" /><label class="radio-custom-label" for="test9">No
                                                        explica los recursos para iniciar la tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test10" name="preg3"
                                                        value="10" /><label class="radio-custom-label"
                                                        for="test10">Explica algunos recursos para iniciar la
                                                        tarea</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test11" name="preg3"
                                                        value="15" /><label class="radio-custom-label"
                                                        for="test11">Explica la mayoría de los recursos para iniciar la
                                                        tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test12" name="preg3"
                                                        value="20" /><label class="radio-custom-label"
                                                        for="test12">Explica todos los recursos para iniciar la
                                                        tarea.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>El aprendiz explica los resultados de la tarea (ej. Emisión de
                                                Certificados y/o Especificaciones de Operaciones,
                                                aprobaciones/desaprobaciones).</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test13" name="preg4"
                                                        value="0" /><label class="radio-custom-label" for="test13">No
                                                        explica los resultados de la tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test14" name="preg4"
                                                        value="10" /><label class="radio-custom-label"
                                                        for="test14">Explica algunos posibles resultados de la
                                                        tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test15" name="preg4"
                                                        value="15" /><label class="radio-custom-label"
                                                        for="test15">Explica la mayoría de los posibles resultados de la
                                                        tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test16" name="preg4"
                                                        value="20" /><label class="radio-custom-label"
                                                        for="test16">Explica todos los posibles resultados de la
                                                        tarea.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>El aprendiz describe como se cierra la tarea y documentarla en el
                                                registro del seguimiento del programa en el puesto de trabajo.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test18" name="preg5"
                                                        value="0" /><label class="radio-custom-label" for="test18">No
                                                        describe la documentación de la tarea.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test19" name="preg5"
                                                        value="10" /><label class="radio-custom-label"
                                                        for="test19">Describe algunos de los documentos de la
                                                        tarea.</label></div>
                            </div>
                            </td>
                            <td>
                                <div><input class="radio-custom" type="radio" id="test20" name="preg5"
                                        value="15" /><label class="radio-custom-label" for="test20">Describe algunos
                                        métodos o formas de documentación.</label></div>
                            </td>
                            <td><input class="radio-custom" type="radio" id="test21" name="preg5" value="20" /><label
                                    class="radio-custom-label" for="test21">Describe todos los métodos o formas de
                                    documentación.</label>
                        </div>
                        </td>
                        </td>
                        </tr>

                        </tbody>
                        </table>
                        <!-- <br>
                        <table id="evalinscooj3" class="table table-striped table-bordered dataTable">
                            <thead style="background-color:#001C6E; color:white">
                                <tr>
                                    <th>Hallazgo</th>
                                    <th>SI</th>
                                    <th>NO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>Habilidades del aprendiz</td>
                                    <td><input value="SI" type="radio" class="option-input radio" name="pregunt20"
                                            id="si1II" /><label for="si1II"></label></td>
                                    <td><input value="NO" type="radio" name="pregunt20" id="no1II" /><label
                                            for="no1II"></label></td>
                                </tr>
                                <tr>
                                    <td>Debilidades del aprendiz</td>
                                    <td><input value="SI" type="radio" name="pregunt21" id="si2II" /><label
                                            for="si2II"></label></td>
                                    <td><input value="NO" type="radio" name="pregunt21" id="no2II" /><label
                                            for="no2II"></label></td>
                                </tr>
                                <tr>
                                    <td>Problemas de desempeño</td>
                                    <td><input value="SI" type="radio" name="pregunt22" id="si3II" /><label
                                            for="si3II"></label></td>
                                    <td><input value="NO" type="radio" name="pregunt22" id="no3II" /><label
                                            for="no3II"></label></td>
                                </tr>
                                <tr>
                                    <td>Problemas de actitud</td>
                                    <td><input value="SI" type="radio" name="pregunt23" id="si4II" /><label
                                            for="si4II"></label></td>
                                    <td><input value="NO" type="radio" name="pregunt23" id="no4II" /><label
                                            for="no4II"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-12">
                        <h4 for="">Informe de calificación / Instructor OJT</h4>
                        <table id="evalinscooj2" class="table table-striped table-bordered dataTable">
                            <thead style="background-color:#001C6E; color:white">
                                <tr>
                                    <th>Hallazgo</th>
                                    <th>Resumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Acciones correctivas recomendadas</td>
                                    <td><textarea onkeyup="mayus(this);" name="" id="" cols="120" rows="3"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Observaciones y/o comentarios</td>
                                    <td><textarea onkeyup="mayus(this);" name="" id="" cols="120" rows="3"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                        <div name="resultadonI" id="resultadonI" class="form-group" style="display:none;">
                            <div class="col-sm-6">
                                <label>RESUlTADOS DE LA EVALUACIÓN:</label>
                                <input type="text" name="resulnI" id="resulnI" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label>ESTATUS:</label>
                                <input type="text" name="estatusnI" id="estatusnI" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                                <a id="evalucI" name="evalucI" type="button" onclick="evalnivelI()"
                                    title="Agregar Evaluación" class="btn btn-block btn-primary" onclick="">EVALUAR</a>
                                <a id="atuevalI" name="atuevalI" type="button" onclick="udateevalI()"
                                    title="Agregar Evaluación" style="display:none;" class="btn btn-block btn-primary"
                                    onclick="">ACTUALIZAR</a>
                            </div>
                            <div style="float:right;" class="col-sm-2">
                                <a id="descargapdfI" name="descargapdfI"
                                    style="display:none;" onclick="nivel1()" title="Descargar el PDF" type="button"
                                    class="btn btn-block btn-primary">Imprimir PDF</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</form>

<!----------------------------------------------------MODAL EVALUACIÓN NIVEL 2------------------------------------------------------>

<form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
    <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal fade" id="modal-evaluarojtII">
            <div class="modal-dialog width" style="width: 80%;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>
                        <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL
                            II</h4>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="idtarpreII" name="idtarpreII">
                            <div class="col-sm-6">
                                <label>INSPECTOR:</label>
                                <input type="hidden" id="idinspoII" name="idinspoII">
                                <input type="text" name="nompoj1II" id="nompoj1II" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label>INSTRUCTOR:</label>
                                <input type="hidden" id="idintuccoII" name="idintuccoII">
                                <input type="text" name="tipooj1II" id="tipooj1II" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>ESPECILIDAD:</label>
                                <input type="text" name="espoj2" id="espoj2" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>TAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="tarojII" id="tarojII"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>SUBTAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="subojII" id="subojII"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div style="float:right;" class="col-sm-1">
                            <a id="editarevalojtII" name="editarevalojtII" onclick="openojtethII()"
                                title="Editar Evaluación" style="font-size:22px; display:none;float:right;"> <i
                                    class="fa fa-edit"></i> </a>
                            <a id="editarevalojtcloseII" name="editarevalojtcloseII" onclick="cerrarojevaII()"
                                title="Editar Evaluación" style="font-size:22px; display:none;float:right;"> <i
                                    class="fa fa-ban"></i> </a>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                    <thead style="background-color:#FFFFFF; color:black">
                                        <tr>
                                            <th>#</th>
                                            <th>PARAMETROS</th>
                                            <th colspan="2">INACEPTABLES</th>
                                            <th colspan="2">ACEPTABLE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>El aprendiz puede describir la secuencia de pasos para completar la
                                                tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test1II"
                                                        name="preg1II" value="0" /><label class="radio-custom-label"
                                                        for="test1II">No puede describir la secuencia de pasos.</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test2II"
                                                        name="preg1II" value="10" /><label class="radio-custom-label"
                                                        for="test2II">Describe algunos pasos de la secuencia.</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test3II"
                                                        name="preg1II" value="15" /><label class="radio-custom-label"
                                                        for="test3II">Describe la mayoría de pasos de la
                                                        secuencia.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test4II"
                                                        name="preg1II" value="20" /><label class="radio-custom-label"
                                                        for="test4II">Describe la secuencia de pasos
                                                        adecuadamente.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>El aprendiz puede describir apropiadamente los materiales como formas y
                                                equipamiento usados durante la realización de la tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test5II"
                                                        name="preg2II" value="0" /><label class="radio-custom-label"
                                                        for="test5II">No puede describir el uso de los
                                                        materiales.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test6II"
                                                        name="preg2II" value="10" /><label class="radio-custom-label"
                                                        for="test6II">Describe algunos usos de materiales.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test7II"
                                                        name="preg2II" value="15" /><label class="radio-custom-label"
                                                        for="test7II">Describe la mayoría de usos de materiales.</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test8II"
                                                        name="preg2II" value="20" /><label class="radio-custom-label"
                                                        for="test8II">Describe adecuadamente el adecuado uso de los
                                                        materiales.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>El aprendiz puede describir las interacciones con otro personal de la
                                                autoridad requerido para completar la tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test9II"
                                                        name="preg3II" value="0" /><label class="radio-custom-label"
                                                        for="test9II">No puede describir las interacciones entre el
                                                        personal de la autoridad.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test10II"
                                                        name="preg3II" value="10" /><label class="radio-custom-label"
                                                        for="test10II">Describe algunas interacciones
                                                        adecuadamente.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test11II"
                                                        name="preg3II" value="15" /><label class="radio-custom-label"
                                                        for="test11II">Describe la mayoría de interacciones
                                                        adecuadamente.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test12II"
                                                        name="preg3II" value="20" /><label class="radio-custom-label"
                                                        for="test12II">Describe todas las posibles interacciones
                                                        adecuadamente.</label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>El aprendiz puede describir la coordinación con el operador que es
                                                necesario para completar la tarea.</td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test13II"
                                                        name="preg4II" value="0" /><label class="radio-custom-label"
                                                        for="test13II">No puede describir las actividades de
                                                        coordinación con el operador.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test14II"
                                                        name="preg4II" value="10" /><label class="radio-custom-label"
                                                        for="test14II">Explica algunas actividades de coordinación con
                                                        el operador.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test15II"
                                                        name="preg4II" value="15" /><label class="radio-custom-label"
                                                        for="test15II">Explica la mayoría de actividades de coordinación
                                                        con el operador.</label></div>
                                            </td>
                                            <td>
                                                <div><input class="radio-custom" type="radio" id="test16II"
                                                        name="preg4II" value="20" /><label class="radio-custom-label"
                                                        for="test16II">Explica todas las actividades de coordinación con
                                                        el operador adecuadamente.</label></div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                                
                                <div name="resultadonII" id="resultadonII" class="form-group" style="display:none;">
                                    <div class="col-sm-6">
                                        <label>RESUlTADOS DE LA EVALUACIÓN:</label>
                                        <input type="text" name="resulnII" id="resulnII"
                                            style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ESTATUS:</label>
                                        <input type="text" name="estatusnII" id="estatusnII"
                                            style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                                        <a id="evalucII" name="evalucII" type="button" onclick="evalnivelII()"
                                            title="Agregar Evaluación" class="btn btn-block btn-primary"
                                            onclick="">EVALUAR</a>
                                        <a id="atuevalII" name="atuevalII" type="button" onclick="udateevalII()"
                                            title="Agregar Evaluación" style="display:none;"
                                            class="btn btn-block btn-primary" onclick="">ACTUALIZAR</a>
                                    </div>
                                    <div style="float:right;" class="col-sm-2">
                                        <!-- <a href="../evaluacion/PDF_evaluacion_nivel_II.php" target="_blank"
                                            id="descargapdfII" name="descargapdfII" style="display:none;"
                                            onclick="nivel1()" title="Descargar el PDF" type="button"
                                            class="btn btn-block btn-primary">Imprimir PDF</a> -->

                                            <a id="descargapdfII" name="descargapdfII"
                                    style="display:none;" onclick="nivel2()" title="Descargar el PDF" type="button"
                                    class="btn btn-block btn-primary">Imprimir PDF</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

<!----------------------------------------------------MODAL EVALUACIÓN NIVEL 3------------------------------------------------------>

<form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
    <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal fade" id="modal-evaluarojtIII">
            <div class="modal-dialog width" style="width: 80%;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>
                        <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL
                            III</h4>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="idtarpreII3" name="idtarpreII3">
                            <div class="col-sm-6">
                                <label>INSPECTOR:</label>
                                <input type="hidden" id="idinspoII3" name="idinspoII3">
                                <input type="text" name="nompoj1II3" id="nompoj1II3" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label>INSTRUCTOR:</label>
                                <input type="hidden" id="idintuccoII3" name="idintuccoII3">
                                <input type="text" name="tipooj1II3" id="tipooj1II3" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>ESPECILIDAD:</label>
                                <input type="text" name="espoj3" id="espoj3" style="text-transform:uppercase;"
                                    class="form-control disabled" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>TAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="tarojII3" id="tarojII3"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>SUBTAREA:</label>
                                <textarea type="text" cols="30" rows="2" name="subojII3" id="subojII3"
                                    style="text-transform:uppercase;" class="form-control disabled"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div style="float:right;" class="col-sm-1">
                            <a id="editarevalojtIII" name="editarevalojtIII" onclick="openojtethIII()"
                                title="Editar Evaluación" style="font-size:22px; display:none;float:right;"> <i
                                    class="fa fa-edit"></i> </a>
                            <a id="editarevalojtcloseIII" name="editarevalojtcloseIII" onclick="cerrarojevaIII()"
                                title="Editar Evaluación" style="font-size:22px; display:none;float:right;"> <i
                                    class="fa fa-ban"></i> </a>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                    <thead style="background-color:#FFFFFF; color:black">
                                        <tr>
                                            <th>#</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>SI</th>
                                            <th>NO</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>¿Demostró el aprendiz suficiente conocimiento para completar con
                                                precisión la tarea?</td>
                                            <td><input class="radio-custom" type="radio" id="si1III" value="20"
                                                    name="preg1III" /><label class="radio-custom-label"
                                                    for="si1III"></label></td>
                                            <td><input class="radio-custom" type="radio" id="no1III" value="5"
                                                    name="preg1III" /><label class="radio-custom-label"
                                                    for="no1III"></label></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>¿Demostró el aprendiz todos los pasos necesarios para completar la tarea
                                                de manera competente?</td>
                                            <td><input class="radio-custom" type="radio" value="20" id="si2III"
                                                    name="preg2III" /><label class="radio-custom-label"
                                                    for="si2III"></label></td>
                                            <td><input class="radio-custom" type="radio" value="5" id="no2III"
                                                    name="preg2III" /><label class="radio-custom-label"
                                                    for="no2III"></label></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>¿Se completaron los pasos en el orden adecuado?</td>
                                            <td><input class="radio-custom" value="20" type="radio" id="si3III"
                                                    name="preg3III" /><label class="radio-custom-label"
                                                    for="si3III"></label></td>
                                            <td><input class="radio-custom" value="5" type="radio" id="no3III"
                                                    name="preg3III" /><label class="radio-custom-label"
                                                    for="no3III"></label></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>¿El aprendiz realizó la tarea de manera oportuna y sin ayuda?</td>
                                            <td><input class="radio-custom" value="20" type="radio" id="si4III"
                                                    name="preg4III" /><label class="radio-custom-label"
                                                    for="si4III"></label></td>
                                            <td><input class="radio-custom" value="5" type="radio" id="no4III"
                                                    name="preg4III" /><label class="radio-custom-label"
                                                    for="no4III"></label></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>¿El aprendiz juzgó adecuadamente el resultado de la tarea y lo cerró de
                                                la manera correcta?</td>
                                            <td><input class="radio-custom" value="20" type="radio" id="si5III"
                                                    name="preg5III" /><label class="radio-custom-label"
                                                    for="si5III"></label></td>
                                            <td><input class="radio-custom" value="5" type="radio" id="no6III"
                                                    name="preg5III" /><label class="radio-custom-label"
                                                    for="no6III"></label></td>
                                        </tr>
                                    </tbody>
                                </table>


                                <!-- <table id="evalinscooj3" class="table table-striped table-bordered dataTable">
                                    <thead style="background-color:#001C6E; color:white">
                                        <tr>
                                            <th>Hallazgo</th>
                                            <th>SI</th>
                                            <th>NO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Habilidades del aprendiz</td>
                                            <td><input value="SI" type="radio" name="pregunII28" id="si1II" /><label
                                                    for="si1II"></label></td>
                                            <td><input value="NO" type="radio" name="pregunII28" id="no1II" /><label
                                                    for="no1II"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Debilidades del aprendiz</td>
                                            <td><input value="SI" type="radio" name="pregunII29" id="si2II" /><label
                                                    for="si2II"></label></td>
                                            <td><input value="NO" type="radio" name="pregunII29" id="no2II" /><label
                                                    for="no2II"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Problemas de desempeño</td>
                                            <td><input value="SI" type="radio" name="pregunII30" id="si3II" /><label
                                                    for="si3II"></label></td>
                                            <td><input value="NO" type="radio" name="pregunII30" id="no3II" /><label
                                                    for="no3II"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Problemas de actitud</td>
                                            <td><input value="SI" type="radio" name="pregunII31" id="si4II" /><label
                                                    for="si4II"></label></td>
                                            <td><input value="NO" type="radio" name="pregunII31" id="no4II" /><label
                                                    for="no4II"></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-12">
                                <h4 for="">Informe de calificación / Instructor OJT</h4>
                                <table id="evalinscooj2" class="table table-striped table-bordered dataTable">
                                    <thead style="background-color:#001C6E; color:white">
                                        <tr>
                                            <th>Hallazgo</th>
                                            <th>Resumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Acciones correctivas recomendadas</td>
                                            <td><textarea onkeyup="mayus(this);" name="" id="" cols="100"
                                                    rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Observaciones y/o comentarios</td>
                                            <td><textarea onkeyup="mayus(this);" name="" id="" cols="100"
                                                    rows="3"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table> -->

                                <!-- </div> -->
                                <div name="resultadonIII" id="resultadonIII" class="form-group" style="display:none;">
                                    <div class="col-sm-6">
                                        <label>RESUlTADOS DE LA EVALUACIÓN:</label>
                                        <input type="text" name="resulnIII" id="resulnIII"
                                            style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>ESTATUS:</label>
                                        <input type="text" name="estatusnIII" id="estatusnIII"
                                            style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                                        <a id="evalucIII" name="evalucIII" type="button" onclick="evalnivelIII()"
                                            title="Agregar Evaluación" class="btn btn-block btn-primary"
                                            onclick="">EVALUAR</a>
                                            <a id="atuevalIII" name="atuevalIII" type="button" onclick="udateevalIII()"
                                            title="Agregar Evaluación" style="display:none;"
                                            class="btn btn-block btn-primary" onclick="">ACTUALIZAR</a>
                                    </div>
                                    <div style="float:right;" class="col-sm-2">
                                        <!-- <a href="../evaluacion/PDF_evaluacion_nivel_III.php" onclick=""
                                            title="Descargar el PDF" type="button" target="_blank" id="descargapdfIII"
                                            name="descargapdfIII" style="display:none;"
                                            class="btn btn-block btn-primary">Imprimir PDF</a> -->

                                            <a id="descargapdfIII" name="descargapdfIII"
                                    style="display:none;" onclick="nivel3()" title="Descargar el PDF" type="button"
                                    class="btn btn-block btn-primary">Imprimir PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

<!-- DETALLE DECLINA CONVOCATORIA OJT -->
<div class="modal fade" id='modal-declinadoOJT' tabindex="-1" role="dialog" aria-labelledby="basicModal"
    aria-hidden="true">
    <div class="modal1">
        <div id="success-icon">
            <div>
                <img class="img-circle1" src="../dist/img/declinado.png">
            </div>
        </div>
        <h1 class="modaltitle" style="color:gray"><strong>DETALLES</strong></h1>
        <label id="cursdeclinaOJT" style="font-size: 16px; color:gray" for=""></label>
        <label id="declindetOJT" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declinas la
            convocatoria OJT:</label>
        <label id="nombredeclinOJT" style="font-size: 18px; color:gray; font-weight: normal;" for=""></label>
        <label id="subtars1OJT" style="font-size: 18px; color:gray; font-weight: normal;" for=""></label>
        <br>
        <label id="motivodOJT" style="font-size: 18px; color:#2B2B2B; font-weight: bold;" for=""></label>
        <hr>
        <div id="arcpdfOJT"></div>
        <label readonly id="otrosdpOJT" name="otrosdpOJT"
            style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>

    </div>
</div>

<script>

</script>