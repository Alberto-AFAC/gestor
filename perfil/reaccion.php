<form class="form-horizontal" action="" method="POST">

<div class="modal fade" id="modal-evalcurso">
<div class="modal-dialog width" role="document" style="/*margin-top: 10em;*/">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
            EVALUACIÓN DE REACCIÓN
        </h3>
        <br>
        <b>
            <label1 style="font-size: 14px">EL OBJETIVO DE ESTA EVALUACIÓN,
                ES CONOCER LA OPINIÓN ACERCA
                DE LA EFICACIA DEL CURSO Y SU DESARROLLO, LO QUE PERMITE
                ESTABLECER ACCIONES DE MEJORA
                CONTINUA HACIA LA CAPACITACIÓN.</label1>
        </b>
        <br>
        <section class="content">
<!----------INICIO-------->

            <div class="row">
                <!-- <img src="../dist/img/AFAC2.png" alt="Descripción de la imagen"> -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <div class="box-header with-border">
                            <form action="" class="formulario1">
                                <input type="hidden" name="idcursoen"
                                    id="idcursoen">

                                <div class="radio">
                                    <div class="form-group ">
                                        <div class="col-sm-8">
                                            <label
                                                style="font-size:16px">FOLIO
                                                DEL CURSO:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="col-sm-2"
                                                type="text" name="codigo"
                                                id="codigo"
                                                style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                disabled="">
                                        </div>
                                        <div class="col-sm-8">
                                            <label
                                                style="font-size:16px">NOMBRE
                                                DEL CURSO:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="col-sm-12"
                                                type="text"
                                                name="nomcursoen"
                                                id="nomcursoen"
                                                style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                disabled="">
                                        </div>
                                        <div class="col-sm-8">
                                            <label
                                                style="font-size:16px">NOMBRE
                                                DE LAS/LOS
                                                INSTRUCTORAS/ES:</label>
                                        </div>
                                        <div class="col-sm-12">
<!--                                             <input class="col-sm-12"
                                                type="text"
                                                name="id_instruct"
                                                id="id_instruct"
                                                style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                disabled="">
 -->
                                              <div id="id_instruct"></div>                          
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
                                <h3 class="box-title">SE ESPECIFICÓ LOS
                                    OBJETIVOS AL INICIO DEL CURSO, EN FORMA
                                    CLARA Y COMPRENSIBLE? <span
                                        id="span1">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg1"
                                                value="DEFICIENTE" id="r1"
                                                required>
                                            <label
                                                for="r1">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg1"
                                                value="NO SATISFACTORIO"
                                                id="r2">
                                            <label for="r2">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg1"
                                                value="REGULAR" id="r3">
                                            <label for="r3">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg1"
                                                value="SATISFACTORIO"
                                                id="r4">
                                            <label
                                                for="r4">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg1"
                                                value="EXCELENTE" id="r5">
                                            <label
                                                for="r5">EXCELENTE</label>
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
                                    ADECUADO DEL TEMA?<span
                                        id="span2">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg2"
                                                value="DEFICIENTE" id="r6">
                                            <label
                                                for="r6">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg2"
                                                value="NO SATISFACTORIO"
                                                id="r7">
                                            <label for="r7">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg2"
                                                value="REGULAR" id="r8">
                                            <label for="r8">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg2"
                                                value="SATISFACTORIO"
                                                id="r9">
                                            <label
                                                for="r9">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg2"
                                                value="EXCELENTE" id="r10">
                                            <label
                                                for="r10">EXCELENTE</label>
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
                    <form name="form3" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">SE APEGÓ AL
                                    TEMARIO?<span id="span3">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg3"
                                                value="DEFICIENTE" id="r11">
                                            <label
                                                for="r11">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg3"
                                                value="NO SATISFACTORIO"
                                                id="r12">
                                            <label for="r12">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg3"
                                                value="REGULAR" id="r13">
                                            <label for="r13">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg3"
                                                value="SATISFACTORIO"
                                                id="r14">
                                            <label
                                                for="r14">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg3"
                                                value="EXCELENTE" id="r15">
                                            <label
                                                for="r15">EXCELENTE</label>
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
                                <h3 class="box-title">UTILIZÓ UN LENGUAJE
                                    SENCILLO Y COMPRENSIBLE DURANTE LA
                                    SESIÓN?<span id="span4">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg4"
                                                value="DEFICIENTE" id="r16">
                                            <label
                                                for="r16">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg4"
                                                value="NO SATISFACTORIO"
                                                id="r17">
                                            <label for="r17">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg4"
                                                value="REGULAR" id="r18">
                                            <label for="r18">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg4"
                                                value="SATISFACTORIO"
                                                id="r19">
                                            <label
                                                for="r19">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg4"
                                                value="EXCELENTE" id="r20">
                                            <label
                                                for="r20">EXCELENTE</label>
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
                                <h3 class="box-title">ATENDIÓ CLARA Y
                                    OPORTUNAMENTE LAS DUDAS Y REACTIVOS DE
                                    LOS PARTICIPANTES?<span
                                        id="span5">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg5"
                                                value="DEFICIENTE" id="r21">
                                            <label
                                                for="r21">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg5"
                                                value="NO SATISFACTORIO"
                                                id="r22">
                                            <label for="r22">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg5"
                                                value="REGULAR" id="r23">
                                            <label for="r23">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg5"
                                                value="SATISFACTORIO"
                                                id="r24">
                                            <label
                                                for="r24">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg5"
                                                value="EXCELENTE" id="r25">
                                            <label
                                                for="r25">EXCELENTE</label>
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
                                <h3 class="box-title">PLANEÓ Y DIRIGIÓ
                                    ADECUADAMENTE LA SESIÓN?<span
                                        id="span6">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg6"
                                                value="DEFICIENTE" id="r26">
                                            <label
                                                for="r26">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg6"
                                                value="NO SATISFACTORIO"
                                                id="r27">
                                            <label for="r27">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg6"
                                                value="REGULAR" id="r28">
                                            <label for="r28">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg6"
                                                value="SATISFACTORIO"
                                                id="r29">
                                            <label
                                                for="r29">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg6"
                                                value="EXCELENTE" id="r30">
                                            <label
                                                for="r30">EXCELENTE</label>
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
                                <h3 class="box-title">DESPERTÓ EL INTERÉS
                                    DEL GRUPO CON RESPECTO A LOS CONTENIDOS?
                                    <span id="span7">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg7"
                                                value="DEFICIENTE" id="r31">
                                            <label
                                                for="r31">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg7"
                                                value="NO SATISFACTORIO"
                                                id="r32">
                                            <label for="r32">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg7"
                                                value="REGULAR" id="r33">
                                            <label for="r33">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg7"
                                                value="SATISFACTORIO"
                                                id="r34">
                                            <label
                                                for="r34">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg7"
                                                value="EXCELENTE" id="r35">
                                            <label
                                                for="r35">EXCELENTE</label>
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
                                <h3 class="box-title">FUE PUNTUAL DURANTE LA
                                    SESIÓN?<span id="span8">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg8"
                                                value="DEFICIENTE" id="r36">
                                            <label
                                                for="r36">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg8"
                                                value="NO SATISFACTORIO"
                                                id="r37">
                                            <label for="r37">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg8"
                                                value="REGULAR" id="r38">
                                            <label for="r38">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg8"
                                                value="SATISFACTORIO"
                                                id="r39">
                                            <label
                                                for="r39">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg8"
                                                value="EXCELENTE" id="r40">
                                            <label
                                                for="r40">EXCELENTE</label>
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
                                <h3 class="box-title">PROPICIÓ UN CLIMA DE
                                    COLABORACIÓN Y RESPETO ENTRE LOS
                                    PARTICIPANTES?<span id="span9">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg9"
                                                value="DEFICIENTE" id="r41">
                                            <label
                                                for="r41">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg9"
                                                value="NO SATISFACTORIO"
                                                id="r42">
                                            <label for="r42">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg9"
                                                value="REGULAR" id="r43">
                                            <label for="r43">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg9"
                                                value="SATISFACTORIO"
                                                id="r44">
                                            <label
                                                for="r44">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio" name="preg9"
                                                value="EXCELENTE" id="r45">
                                            <label
                                                for="r45">EXCELENTE</label>
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
                    <form name="form10" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">EXPLICÓ CON CLARIDAD
                                    LAS INSTRUCCIONES DE LAS ACTIVIDADES
                                    REALIZADAS?<span id="span10">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg10"
                                                value="DEFICIENTE" id="r46">
                                            <label
                                                for="r46">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg10"
                                                value="NO SATISFACTORIO"
                                                id="r47">
                                            <label for="r47">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg10"
                                                value="REGULAR" id="r48">
                                            <label for="r48">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg10"
                                                value="REGULAR" id="r49">
                                            <label
                                                for="r49">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg10"
                                                value="EXCELENTE" id="r50">
                                            <label
                                                for="r50">EXCELENTE</label>
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
                                <h3 class="box-title">TUVO UN CONTROL
                                    ADECUADO DEL GRUPO?<span
                                        id="span11">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg11"
                                                value="DEFICIENTE" id="r51">
                                            <label
                                                for="r51">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg11"
                                                value="NO SATISFACTORIO"
                                                id="r52">
                                            <label for="r52">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg11"
                                                value="REGULAR" id="r53">
                                            <label for="r53">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg11"
                                                value="SATISFACTORIO"
                                                id="r54">
                                            <label
                                                for="r54">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg11"
                                                value="EXCELENTE" id="r55">
                                            <label
                                                for="r55">EXCELENTE</label>
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
                    <form name="form12" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">EXPLICÓ LOS CRITERIOS
                                    DE EVALUACIÓN DE LA SESIÓN?<span
                                        id="span12">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg12"
                                                value="DEFICIENTE" id="r56">
                                            <label
                                                for="r56">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg12"
                                                value="NO SATISFACTORIO"
                                                id="r57">
                                            <label for="r57">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg12"
                                                value="REGULAR" id="r58">
                                            <label for="r58">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg12"
                                                value="SATISFACTORIO"
                                                id="r59">
                                            <label
                                                for="r59">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg12"
                                                value="EXCELENTE" id="r60">
                                            <label
                                                for="r60">EXCELENTE</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <b>
                <h3 style="COLOR:#08308A" for="">II.CONTENIDO</h3>
            </b>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form name="form13" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">LOS CONOCIMIENTOS
                                    ADQUIRIDOS SON APLICABLES A TU PUESTO DE
                                    TRABAJO? <span id="span13">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg13"
                                                value="DEFICIENTE" id="r61">
                                            <label
                                                for="r61">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg13"
                                                value="NO SATISFACTORIO"
                                                id="r62">
                                            <label for="r62">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg13"
                                                value="REGULAR" id="r63">
                                            <label for="r63">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg13"
                                                value="SATISFACTORIO"
                                                id="r64">
                                            <label
                                                for="r64">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg13"
                                                value="EXCELENTE" id="r65">
                                            <label
                                                for="r65">EXCELENTE</label>
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
                                <h3 class="box-title">CONSIDERAS QUE EL
                                    CONTENIDO DEL CURSO FUE
                                    SUFICIENTE? <span id="span14">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg14"
                                                value="DEFICIENTE" id="r66">
                                            <label
                                                for="r66">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg14"
                                                value="NO SATISFACTORIO"
                                                id="r67">
                                            <label for="r67">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg14"
                                                value="REGULAR" id="r68">
                                            <label for="r68">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg14"
                                                value="SATISFACTORIO"
                                                id="r69">
                                            <label
                                                for="r69">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg14"
                                                value="EXCELENTE" id="r70">
                                            <label
                                                for="r70">EXCELENTE</label>
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
                    <form name="form15" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">LA SESIÓN CUBRIÓ TUS
                                    EXPECTATIVAS? <span id="span15">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg15"
                                                value="DEFICIENTE" id="r71">
                                            <label
                                                for="r71">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg15"
                                                value="NO SATISFACTORIO"
                                                id="r72">
                                            <label for="r72">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg15"
                                                value="REGULAR" id="r73">
                                            <label for="r73">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg15"
                                                value="SATISFACTORIO"
                                                id="r74">
                                            <label
                                                for="r74">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg15"
                                                value="EXCELENTE" id="r75">
                                            <label
                                                for="r75">EXCELENTE</label>
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
                                <h3 class="box-title">EL CONTENIDO AUMENTÓ
                                    MIS CONOCIMIENTOS Y COMPRENSIÓN DEL TEMA
                                    EXPUESTO? <span id="span16">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg16"
                                                value="DEFICIENTE" id="r76">
                                            <label
                                                for="r76">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg16"
                                                value="NO SATISFACTORIO"
                                                id="r77">
                                            <label for="r77">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg16"
                                                value="REGULAR" id="r78">
                                            <label for="r78">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg16"
                                                value="SATISFACTORIO"
                                                id="r79">
                                            <label
                                                for="r79">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg16"
                                                value="EXCELENTE" id="r80">
                                            <label
                                                for="r80">EXCELENTE</label>
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
                                <h3 class="box-title">LA DURACIÓN DE LA
                                    SESIÓN FUE LA MÁS APROPIADA PARA CUMPLIR
                                    EL OBJETIVO? <span id="span17">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg17"
                                                value="DEFICIENTE" id="r81">
                                            <label
                                                for="r81">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg17"
                                                value="NO SATISFACTORIO"
                                                id="r82">
                                            <label for="r82">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg17"
                                                value="REGULAR" id="r83">
                                            <label for="r83">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg17"
                                                value="SATISFACTORIO"
                                                id="r84">
                                            <label
                                                for="r84">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg17"
                                                value="EXCELENTE" id="r85">
                                            <label
                                                for="r85">EXCELENTE</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <b>
                <h3 style="COLOR:#08308A" for="">III.COORDINACIÓN </h3>
            </b>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form name="form18" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">EL TIEMPO CON EL QUE
                                    RECIBIÓ LA INFORMACIÓN (INVITACIÓN,
                                    TEMARIO, ETC.) A LA SESIÓN FUE
                                    ADECUADO?<span id="span18">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg18"
                                                value="DEFICIENTE" id="r86">
                                            <label
                                                for="r86">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg18"
                                                value="NO SATISFACTORIO"
                                                id="r87">
                                            <label for="r87">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg18"
                                                value="REGULAR" id="r88">
                                            <label for="r88">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg18"
                                                value="SATISFACTORIO"
                                                id="r89">
                                            <label
                                                for="r89">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg18"
                                                value="EXCELENTE" id="r90">
                                            <label
                                                for="r90">EXCELENTE</label>
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
                    <form name="form19" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">CÓMO FUE EL SERVICIO
                                    DE CAFÉ PROPORCIONADO?<span
                                        id="span19">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg19"
                                                value="DEFICIENTE" id="r91">
                                            <label
                                                for="r91">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg19"
                                                value="NO SATISFACTORIO"
                                                id="r92">
                                            <label for="r92">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg19"
                                                value="REGULAR" id="r93">
                                            <label for="r93">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg19"
                                                value="SATISFACTORIO"
                                                id="r94">
                                            <label
                                                for="r94">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg19"
                                                value="EXCELENTE" id="r95">
                                            <label
                                                for="r95">EXCELENTE</label>
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
                    <form name="form20" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">LA DISPONIBILIDAD
                                    DEL/A COORDINADOR/A PARA RESPONDER DUDAS
                                    SOBRE EL SERVICIO FUE ADECUADA?<span
                                        id="span20">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg20"
                                                value="DEFICIENTE" id="r96">
                                            <label
                                                for="r96">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg20"
                                                value="NO SATISFACTORIO"
                                                id="r97">
                                            <label for="r97">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg20"
                                                value="REGULAR" id="r98">
                                            <label for="r98">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg20"
                                                value="SATISFACTORIO"
                                                id="r99">
                                            <label
                                                for="r99">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg20"
                                                value="EXCELENTE" id="r100">
                                            <label
                                                for="r100">EXCELENTE</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <b>
                <h3 style="COLOR:#08308A" for="">IV.INSTALACIONES Y MATERIAL
                </h3>
            </b>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form name="form21" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">CÓMO FUE EL MATERIAL
                                    DIDÁCTICO (MANUAL, ROTAFOLIOS,
                                    AUDIOVISUALES, PRESENTACIÓN)
                                    UTILIZADO?<span id="span21">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg21"
                                                value="DEFICIENTE"
                                                id="r101">
                                            <label
                                                for="r101">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg21"
                                                value="NO SATISFACTORIO"
                                                id="r102">
                                            <label for="r102">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg21"
                                                value="REGULAR" id="r103">
                                            <label
                                                for="r103">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg21"
                                                value="SATISFACTORIO"
                                                id="r104">
                                            <label
                                                for="r104">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg21"
                                                value="EXCELENTE" id="r105">
                                            <label
                                                for="r105">EXCELENTE</label>
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
                    <form name="form22" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">SÍ EL MATERIAL DE LA
                                    SESIÓN SE ENTREGÓ EN TIEMPO?<span
                                        id="span22">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg22"
                                                value="DEFICIENTE"
                                                id="r106">
                                            <label
                                                for="r106">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg22"
                                                value="NO SATISFACTORIO"
                                                id="r107">
                                            <label for="r107">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg22"
                                                value="REGULAR" id="r108">
                                            <label
                                                for="r108">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg22"
                                                value="SATISFACTORIO"
                                                id="r109">
                                            <label
                                                for="r109">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg22"
                                                value="EXCELENTE" id="r110">
                                            <label
                                                for="r110">EXCELENTE</label>
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
                    <form name="form23" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">CÓMO FUERON LAS
                                    CONDICIONES DEL AULA PARA LA IMPARTICIÓN
                                    DE LA SESIÓN (LUZ, VENTILACIÓN,
                                    LIMPIEZA, COMODIDAD ETC.) ?<span
                                        id="span23">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg23"
                                                value="DEFICIENTE"
                                                id="r111">
                                            <label
                                                for="r111">DEFICIENTE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg23"
                                                value="NO SATISFACTORIO"
                                                id="r112">
                                            <label for="r112">NO
                                                SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg23"
                                                value="REGULAR" id="r113">
                                            <label
                                                for="r113">REGULAR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg23"
                                                value="SATISFACTORIO"
                                                id="r114">
                                            <label
                                                for="r114">SATISFACTORIO</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg23"
                                                value="EXCELENTE" id="r115">
                                            <label
                                                for="r115">EXCELENTE</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <b>
                <h3 style="COLOR:#08308A" for="">V.COMENTARIOS Y SUGERENCIAS
                </h3>
            </b>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form name="form24" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">MENCIONA ALGUNOS DE
                                    LOS APRENDIZAJES ADQUIRIDOS EN ESTA
                                    ACCIÓN DE CAPACITACIÓN Y SUS BENEFICIOS
                                    <span id="span24">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="preg24"
                                                id="preg24"
                                                class="col-sm-12"
                                                onkeyup="mayus(this);"
                                                placeholder="TU RESPUESTA"
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
                    <form name="form25" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">MENCIONA ALGUNA MEJORA
                                    QUE SE PUDIERA REALIZAR A ESTE PROCESO
                                    DE APRENDIZAJE <span
                                        id="span25">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="preg25"
                                                id="preg25"
                                                class="col-sm-12"
                                                onkeyup="mayus(this);"
                                                placeholder="TU RESPUESTA"
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
                    <form name="form26" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">DÓNDE REALIZASTE TU
                                    CURSO? <span id="span14">*</span></h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body" id=preg26>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg26"
                                                value="OFICINA" id="r116">
                                            <label
                                                for="r116">OFICINA</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg26" value="CASA"
                                                id="r117">
                                            <label for="r117">CASA</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg26"
                                                value="CAFÉ INTERNET"
                                                id="r118">
                                            <label for="r118">CAFÉ
                                                INTERNET</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="radio"
                                                name="preg26" value="OTROS"
                                                id="r119">
                                            <label for="r119">OTROS</label>
                                            <input type="text" name="otro"
                                                id="otro"
                                                onkeyup="mayus(this);"
                                                placeholder="TU RESPUESTA"
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
                    <form name="form27" action="" class="formulario1">
                        <div class="radio">
                            <div class="box-header with-border">
                                <h3 class="box-title">COMPARTE TUS
                                    COMENTARIOS, QUEJAS, SUGERENCIAS...
                                    <span id="span16">*</span>
                                </h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea class="col-sm-12"
                                                name="preg27" id="preg27"
                                                rows="5" cols="40"
                                                onkeyup="mayus(this);"
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

                        <!-- <form id="impri" action="" method="POST"  >
<input type="hidden" class="form-control" id="gstIdlstc" name="gstIdlstc">

<button type="button" class="btn btn-info btn-lg" onclick="enviar();">ENVIAR</button>
</form> -->
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-primary"
                                onclick="evaluar()">ACEPTAR</button>
                        </div>
                    </div>
                    <b>
                        <p class="alert alert-danger text-center padding error"
                            id="peligro">Error al agregar datos
                        </p>
                    </b>
                    <b>
                        <p class="alert alert-success text-center padding exito"
                            id="enviadoexito">¡Su evaluación de reacción se
                            realizó con éxito !</p>
                    </b>
                    <b>
                        <p class="alert alert-info text-center padding error"
                            id="aviso">Su evaluación de reacción fue
                            realizada
                        </p>
                    </b>
                    <b>
                        <p class="alert alert-warning text-center padding error"
                            id="pregunta">Pregunta obligatoria<strong
                                style=";font-size: 1.7em"> *</strong>
                        </p>
                    </b>

                </div>
            </div>
<!----------------FIN---------------------->
        </section>
    </div>
</div>
</div>
</div>
</form>
