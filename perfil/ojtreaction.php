<!-- REACCION DE EVALUACIÓN OJT -->
<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modal-evaluOJT">
        <div class="modal-dialog width" role="document" style="/*margin-top: 10em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
                        CÉDULA DE EVALUACIÓN DE LA REACCIÓN
                    </h3>
                    <br>
                    <h4>
                        PROGRAMA DE ENTRENAMIENTO EN EL PUESTO DE TRABAJO (OJT)
                    </h4>
                    <b>
                        <label1 style="font-size: 14px">EL OBJETIVO DE ESTA EVALUACIÓN,
                            ES CONOCER LA OPINIÓN ACERCA
                            DE LA EFICACIA DEL OJT Y SU DESARROLLO, LO QUE PERMITE
                            ESTABLECER ACCIONES DE MEJORA
                            CONTINUA HACIA LA CAPACITACIÓN.</label1>
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
                                                        <input class="col-sm-12" type="text" name="comisionOJTrec"
                                                            id="comisionOJTrec"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="font-size:16px">FECHA:</label>
                                                        <input class="col-sm-12" type="text" name="fecOJTreac"
                                                            id="fecOJTreac"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="font-size:16px">LUGAR:</label>
                                                        <input class="col-sm-12" type="text" name="lugOJTreac"
                                                            id="lugOJTreac"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>

                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">ESPECIALIDAD:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="col-sm-12" type="text" name="especOJTreac"
                                                            id="especOJTreac"
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
                                                        <textarea disabled="" class="col-sm-12" name="tareprinOJTrec"
                                                            id="tareprinOJTrec" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">NOMBRE DE LA SUBTAREA:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <!-- <input class="col-sm-12" type="text" name="subtareOJtreac"
                                                            id="subtareOJtreac"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled=""> -->
                                                        <textarea disabled="" class="col-sm-12" name="subtareOJtreac"
                                                            id="subtareOJtreac" cols="30" rows="4"></textarea>
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
                        <p>
                        <h3 style="COLOR:#08308A" for="">I. INSTRUCTOR/A</h3>
                        </p>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form1" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">ESPECIFICÓ LOS OBJETIVOS AL INICIO DEL ENTRENAMIENTO,
                                                EN FORMA CLARA Y COMPRENSIBLE
                                                <span id="span1">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro5">
                                                        <label for="ro5">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO" id="ro4">
                                                        <label for="ro4">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro3">
                                                        <label for="ro3">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro2">
                                                        <label for="ro2">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro1"
                                                            required>
                                                        <label for="ro1">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="r0"
                                                            required>
                                                        <label for="r0">NO APLICA</label>
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
                                            <h3 class="box-title">DEMOSTRÓ DOMINIO
                                                ADECUADO DEL TEMA?<span id="span2">*</span></h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="EXCELENTE" id="ro6">
                                                        <label for="ro6">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="SATISFACTORIO" id="ro7">
                                                        <label for="ro7">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="REGULAR" id="ro8">
                                                        <label for="ro8">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="NO SATISFACTORIO"
                                                            id="ro9">
                                                        <label for="ro9">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="DEFICIENTE" id="ro10"
                                                            required>
                                                        <label for="ro10">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg2" value="NOAPLICA" id="ro11"
                                                            required>
                                                        <label for="ro11">NO APLICA</label>
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
                                            <h3 class="box-title">UTILIZÓ UN LENGUAJE SENCILLO Y COMPRENSIBLE DURANTE EL
                                                ENTRENAMIENTO.
                                                <span id="span3">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="EXCELENTE" id="ro12">
                                                        <label for="ro12">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="SATISFACTORIO"
                                                            id="ro13">
                                                        <label for="ro13">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="REGULAR" id="ro14">
                                                        <label for="ro14">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="NO SATISFACTORIO"
                                                            id="ro15">
                                                        <label for="ro15">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="DEFICIENTE" id="ro16"
                                                            required>
                                                        <label for="ro16">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg3" value="NOAPLICA" id="ro17"
                                                            required>
                                                        <label for="ro17">NO APLICA</label>
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
                                            <h3 class="box-title">ATENDIÓ CLARA Y OPORTUNAMENTE LAS DUDAS Y REACTIVOS DE
                                                LOS PARTICIPANTES?
                                                <span id="span4">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="EXCELENTE" id="ro18">
                                                        <label for="ro18">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="SATISFACTORIO"
                                                            id="ro19">
                                                        <label for="ro19">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="REGULAR" id="ro20">
                                                        <label for="ro20">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="NO SATISFACTORIO"
                                                            id="ro21">
                                                        <label for="ro21">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="DEFICIENTE" id="ro22"
                                                            required>
                                                        <label for="ro22">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg4" value="NOAPLICA" id="ro23"
                                                            required>
                                                        <label for="ro23">NO APLICA</label>
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
                                            <h3 class="box-title">PLANEÓ Y DIRIGIÓ
                                                ADECUADAMENTE LA SESIÓN?<span id="span5">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="EXCELENTE" id="ro24">
                                                        <label for="ro24">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="SATISFACTORIO"
                                                            id="ro25">
                                                        <label for="ro25">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="REGULAR" id="ro26">
                                                        <label for="ro26">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="NO SATISFACTORIO"
                                                            id="ro27">
                                                        <label for="ro27">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="DEFICIENTE" id="ro28"
                                                            required>
                                                        <label for="ro28">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg5" value="NOAPLICA" id="ro29"
                                                            required>
                                                        <label for="ro29">NO APLICA</label>
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
                                            <h3 class="box-title">FUE PUNTUAL DURANTE EL ENTRENAMIENTO?<span
                                                    id="span6">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="EXCELENTE" id="ro30">
                                                        <label for="ro30">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="SATISFACTORIO"
                                                            id="ro31">
                                                        <label for="ro31">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="REGULAR" id="ro32">
                                                        <label for="ro32">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="NO SATISFACTORIO"
                                                            id="ro33">
                                                        <label for="ro33">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="DEFICIENTE" id="ro34"
                                                            required>
                                                        <label for="ro34">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg6" value="NOAPLICA" id="ro35"
                                                            required>
                                                        <label for="ro35">NO APLICA</label>
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
                                            <h3 class="box-title">PROPICIÓ UN CLIMA DE COLABORACIÓN Y RESPETO ENTRE LOS
                                                PARTICIPANTES?
                                                <span id="span7">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="EXCELENTE" id="ro36">
                                                        <label for="ro36">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="SATISFACTORIO"
                                                            id="ro37">
                                                        <label for="ro37">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="REGULAR" id="ro38">
                                                        <label for="ro38">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="NO SATISFACTORIO"
                                                            id="ro39">
                                                        <label for="ro39">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="DEFICIENTE" id="ro40"
                                                            required>
                                                        <label for="ro40">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg7" value="NOAPLICA" id="ro41"
                                                            required>
                                                        <label for="ro41">NO APLICA</label>
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
                                <form name="form8" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">EXPLICÓ CON CLARIDAD LAS INSTRUCCIONES DE LAS
                                                ACTIVIDADES REALIZADAS?<span id="span8">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="EXCELENTE" id="ro42">
                                                        <label for="ro42">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="SATISFACTORIO"
                                                            id="ro43">
                                                        <label for="ro43">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="REGULAR" id="ro44">
                                                        <label for="ro44">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="NO SATISFACTORIO"
                                                            id="ro45">
                                                        <label for="ro45">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="DEFICIENTE" id="ro46"
                                                            required>
                                                        <label for="ro46">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg8" value="NOAPLICA" id="ro47"
                                                            required>
                                                        <label for="ro47">NO APLICA</label>
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
                                <form name="form9" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">TUVO UN CONTROL ADECUADO DURANTE EL
                                                ENTRENAMIENTO?<span id="span9">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="EXCELENTE" id="ro48">
                                                        <label for="ro48">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="SATISFACTORIO"
                                                            id="ro49">
                                                        <label for="ro49">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="REGULAR" id="ro50">
                                                        <label for="ro50">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="NO SATISFACTORIO"
                                                            id="ro51">
                                                        <label for="ro51">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="DEFICIENTE" id="ro52"
                                                            required>
                                                        <label for="ro52">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg9" value="NOAPLICA" id="ro53"
                                                            required>
                                                        <label for="ro53">NO APLICA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3 style="COLOR:#08308A" for="">II.CONTENIDO</h3>
                        </b>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form10" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS HABILIDADES ADQUIRIDAS SON APLICABLES PARA EL
                                                DESARROLLO DE LA TAREA Y SUBTAREAS, MOTIVO DEL ENTRENAMIENTO<span
                                                    id="span10">*</span></h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="EXCELENTE" id="ro54">
                                                        <label for="ro54">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="SATISFACTORIO"
                                                            id="ro55">
                                                        <label for="ro55">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="REGULAR" id="ro56">
                                                        <label for="ro56">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="NO SATISFACTORIO"
                                                            id="ro57">
                                                        <label for="ro57">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="DEFICIENTE" id="ro58"
                                                            required>
                                                        <label for="ro58">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg10" value="NOAPLICA" id="ro59"
                                                            required>
                                                        <label for="ro59">NO APLICA</label>
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
                                <form name="form11" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS HABILIDADES ADQUIRIDAS EN EL ENTRENAMIENTO SON
                                                SUFICIENTES.
                                                <span id="span11">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="EXCELENTE" id="ro60">
                                                        <label for="ro60">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="SATISFACTORIO"
                                                            id="ro61">
                                                        <label for="ro61">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="REGULAR" id="ro62">
                                                        <label for="ro62">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="NO SATISFACTORIO"
                                                            id="ro63">
                                                        <label for="ro63">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="DEFICIENTE" id="ro64"
                                                            required>
                                                        <label for="ro64">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg11" value="NOAPLICA" id="ro65"
                                                            required>
                                                        <label for="ro65">NO APLICA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3 style="COLOR:#08308A" for="">III.COORDINACIÓN </h3>
                        </b>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form12" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LA DISPONIBILIDAD PARA RESPONDER DUDAS DURANTE EL
                                                ENTRENAMIENTO FUE ADECUADA.
                                                <span id="span12">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="EXCELENTE" id="ro66">
                                                        <label for="ro66">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="SATISFACTORIO"
                                                            id="ro67">
                                                        <label for="ro67">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="REGULAR" id="ro68">
                                                        <label for="ro68">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="NO SATISFACTORIO"
                                                            id="ro69">
                                                        <label for="ro69">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="DEFICIENTE" id="ro70"
                                                            required>
                                                        <label for="ro70">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg12" value="NOAPLICA" id="ro71"
                                                            required>
                                                        <label for="ro71">NO APLICA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3 style="COLOR:#08308A" for="">IV.INSTALACIONES Y MATERIAL
                        </h3>
                        </b>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form13 " action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">FUE PROPORCIONADO EL MATERIAL PARA EL DESARROLLO DEL
                                                ENTRENAMIENTO (MANUALES, PROCESOS, PROCEDIMIENTOS, HERRAMIENTAS,
                                                FORMATOS, INSTRUCTIVOS, ETC).
                                                <span id="span13">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="EXCELENTE" id="ro72">
                                                        <label for="ro72">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="SATISFACTORIO"
                                                            id="ro73">
                                                        <label for="ro73">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="REGULAR" id="ro74">
                                                        <label for="ro74">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="NO SATISFACTORIO"
                                                            id="ro75">
                                                        <label for="ro75">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="DEFICIENTE" id="ro76"
                                                            required>
                                                        <label for="ro76">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg13" value="NOAPLICA" id="ro77"
                                                            required>
                                                        <label for="ro77">NO APLICA</label>
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
                                <form name="form14" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS CONDICIONES FISICAS DEL LUGAR, PERMITIERON
                                                DESARROLLAR EL ENTRENAMIENTO (LUZ, VENTILACIÓN, LIMPIEZA,
                                                COMODIDAD,ETC.).
                                                <span id="span14">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="EXCELENTE" id="ro78">
                                                        <label for="ro78">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="SATISFACTORIO"
                                                            id="ro79">
                                                        <label for="ro79">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="REGULAR" id="ro80">
                                                        <label for="ro80">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="NO SATISFACTORIO"
                                                            id="ro81">
                                                        <label for="ro81">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="DEFICIENTE" id="ro82"
                                                            required>
                                                        <label for="ro82">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg14" value="NOAPLICA" id="ro83"
                                                            required>
                                                        <label for="ro83">NO APLICA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3 style="COLOR:#08308A" for="">V.COMENTARIOS Y SUGERENCIAS
                        </h3>
                        </b>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <form name="form15" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">MENCIONA ALGUNOS DE
                                                LOS APRENDIZAJES ADQUIRIDOS EN ESTA
                                                ACCIÓN DE CAPACITACIÓN Y SUS BENEFICIOS
                                                <span id="span15">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="preg15" id="preg15" class="col-sm-12"
                                                            onkeyup="mayus(this);" placeholder="TU RESPUESTA"
                                                            style="background-color: #E5E7EC; border: 0; outline: none">
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
                                <form name="form16" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">MENCIONA ALGUNA MEJORA
                                                QUE SE PUDIERA REALIZAR A ESTE PROCESO
                                                DE APRENDIZAJE <span id="span16">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="preg16" id="preg16" class="col-sm-12"
                                                            onkeyup="mayus(this);" placeholder="TU RESPUESTA"
                                                            style="background-color: #E5E7EC; border: 0; outline: none">
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
                                            <h3 class="box-title">COMENTARIOS:
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
                                            onclick="evaluarOJT1()">ACEPTAR</button>
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