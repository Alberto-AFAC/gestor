<link rel="stylesheet" type="text/css" href="../dist/css/card.css">
<script src="../dist/js/sweetalert2.all.min.js"></script>
<link href="../dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">

<style>
.swal-wide {
    width: 500px !important;
    font-size: 16px !important;
}

.a-alert {
    outline: none;
    text-decoration: none;
    padding: 2px 1px 0;
}

.a-alert:link {
    color: white;
}

.a-alert:visited {
    color: white;
}
</style>

<div class="modal fade" id="modal-doc">
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">AGREGAR <span id="ojtbit"></span></h4>

                </div>
                <div class="modal-body" id="actForpro">
                    <form class="form-horizontal" id="agregardoc">


                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for=""></label>
                                <input type="hidden" name="ojtNemple" id="ojtNemple" value="<?php echo $datos[4]?>">
                                <input type="hidden" name="ojtIdper" id="ojtIdper" value="<?php echo $id?>">
                                <input type="hidden" name="ojtdocadjunto" id="ojtdocadjunto">
                                <div class="col-sm-6">
                                    <input id="OjtAgra" type="file" name="OjtAgra" style="width: 410px; margin:0 auto; "
                                        required accept=".pdf,.doc" class="input-file" size="1450">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="button" id="button1" class="btn btn-info altaboton"
                                    style="font-size:14px; width:110px; height:35px"
                                    onclick="adjuntarOjt();">ADJUNTAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="fallajt">Error al adjuntar
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-success text-center padding exito" id="exitojt">¡Se adjunto
                                    archivo con éxito!</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vaciojt">Es necesario
                                    adjuntar archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="repetidojt">¡El archivo
                                    adjunto está registrado!</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="renomjt">Renombre su
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding adjuto" id="adjuntajt">Debes adjuntar
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="errorjt">Ocurrio un error
                                </p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="fornjt">Formato no valido
                                </p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="maxjt">Supera el limite
                                    permitido</p>
                            </b>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="eliminarojt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">ELIMINAR ARCHIVO</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ojtIdperEli" id="ojtIdperEli">
                    <input type="hidden" name="ojtidperdoc" id="ojtidperdoc">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="label2" id="titledoc" for=""></label>
                            <p>¿ESTÁ SEGURO DE ELIMINAR EL ARCHIVO?<span id=""></span> </p>
                        </div>
                        <br>
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-primary altaboton"
                                style="font-size:14px; width:110px; height:35px" onclick="borrarojt()">ACEPTAR</button>
                        </div>
                        <b>
                            <p class="alert alert-warning text-center padding error" id="dangeri">Error
                                al eliminar archivo</p>
                        </b>
                        <b>
                            <p class="alert alert-success text-center padding exito" id="succei">¡Se
                                elimino archivo con éxito !</p>
                        </b>
                        <b>
                            <p class="alert alert-danger text-center padding aviso" id="avisoi">Error
                                archivo para eliminar </p>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-----------------ACTUALIZAR OJT--------------->

<div class="modal fade" id="modal-docactualizar">
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                                <input type="hidden" name="ojtNempleact" id="ojtNempleact"
                                    value="<?php echo $datos[4]?>">
                                <input type="hidden" name="ojtIdperact" id="ojtIdperact" value="<?php echo $id ?>">
                                <input type="hidden" name="docactuali" id="docactuali">
                                <input type="hidden" name="ojtdocadact" id="ojtdocadact">
                                <label class="label2" id="docadjunto" for=""></label>

                                <div class="col-sm-6">
                                    <input id="OjtAgraAct" type="file" name="OjtAgraAct"
                                        style="width: 410px; margin:0 auto; " required accept=".pdf,.doc"
                                        class="input-file" size="1450">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="button" id="button1" class="btn btn-info altaboton"
                                    style="font-size:14px; width:110px; height:35px"
                                    onclick="actualOjt();">ACTUALIZAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="fallabit">Error al adjuntar
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-success text-center padding exito" id="exitobit">¡Se adjunto
                                    archivo con éxito!</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vaciobit">Es necesario
                                    adjuntar archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="repetidobit">¡El archivo
                                    adjunto está registrado!</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="renombit">Renombre su
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding adjuto" id="adjuntabit">Debes adjuntar
                                    archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="errorbit">Ocurrio un error
                                </p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="fornbit">Formato no valido
                                </p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="maxbit">Supera el limite
                                    permitido</p>
                            </b>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------>

<div class="modal fade" id='modal-confirma'>
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button> -->

                    <button type="button" onclick="location.href='./inspector'" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">CONFIRMAR ASISTENCIA</h4>
                </div>

                <div class="modal-body">
                    <form id="Confirma" class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="id_curso" id="id_curso">
                        <input type="hidden" name="idinsp" id="idinsp">
                        <table class="table table-bordered">
                            <tr>
                                <th>CURSO</th>
                                <th>INCIO</th>
                                <th>HORA</th>
                                <th>FINALIZA</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="gstTitlo"></div>
                                </td>
                                <td>
                                    <div id="fcurso"></div>
                                </td>
                                <td>
                                    <div id="hcurso"></div>
                                </td>
                                <td>
                                    <div id="fechaf"></div>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            <tr>
                                <th>TIPO</th>
                                <th>SEDE DEL CURSO</th>
                                <th>MODALIDAD</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="gstTipo"></div>
                                </td>
                                <td>
                                    <div id="sede"></div>
                                </td>
                                <td>
                                    <div id="modalidad"></div>
                                </td>
                            </tr>
                            <tr>
                                <th id="ocul1">LINK</th>
                                <th id="ocul2">CONTRASEÑA</th>
                                <th id="ocul3">CLASSROOM</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="link">
                                </td>
                                <td>
                                    <div id="contracur"></div>
                                </td>
                                <td>
                                    <div id="classroom"></div>
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
                                            <input type="radio" name="Opc" value="SI" id="SI"
                                                class="switcher__input switcher__input--yin">
                                            <label for="SI" class="switcher__label">SI</label>

                                            <input type="radio" name="Opc" value="NO" id="NO"
                                                class="switcher__input switcher__input--yang">
                                            <label for="NO" class="switcher__label">NO</label>

                                            <span class="switcher__toggle"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-0 col-sm-6">
                                        <br>


                                        <p id="confiras" style="width: 420px;">
                                            <i style="color: #D58512; font-size: 25px;"
                                                class="fa fa-exclamation-triangle"></i>
                                            <label style="font-size: 25px;">FAVOR DE CONFIRMAR ASISTENCIA </label>
                                            <input type="hidden" id="conf" name="conf">
                                        </p>

                                        <p id="asiste" style="display: none;">
                                            <i style="color: green; font-size: 25px;" class="icon fa fa-check"></i>
                                            <label id="confm1" style="font-size: 25px;">CONFIRMAS TU ASISTENCIA</label>
                                            <input type="hidden" id="conf" name="conf">
                                        </p>

                                        <p id="noasis" style="display:none;">
                                            <label class="label2" style="font-size: 16px;">MOTIVOS DE TU
                                                INASISTENCIA</label>
                                            <select style="width: 100%" class="form-control inputalta"
                                                class="selectpicker" type="text" data-live-search="true" id="confir"
                                                name="confir" onChange="justificacion()">
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
                                        <input id="archivo" type="file" name="archivo"
                                            style="display: none; width: 410px;" required accept=".pdf,.doc"
                                            class="input-file" size="1450">

                                        <textarea style="display: none; font-size: 15px;" id="obser" name="obser"
                                            class="form-control is-invalid inputalta"
                                            placeholder="MOTIVO PORQUE NO VA ASISTIR AL CURSO" rows="2"
                                            required></textarea>
                                    </div>
                                </div>
                            </th>

                        </table>


                        <div class="form-group">
                            <div class="col-sm-6">
                                <div id="instruc"></div>

                            </div>
                        </div>

                        <div class="form-group"><br>
                            <div class="col-sm-offset-0 col-sm-5">
                                <button type="button" id="button" class="btn btn-info altaboton" style=""
                                    onclick="confirasict();">ACEPTAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="falla">Error al registrar
                                    datos</p>
                            </b>

                            <b>
                                <p class="alert alert-success text-center padding exito" id="exito">¡Se registraron los
                                    datos con éxito!</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario agregar
                                    los datos que se solicitan </p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="renom">
                                    Renombre su archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-warning text-center padding adjuto" id="adjunta">
                                    Debes adjuntar archivo</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="error">
                                    Ocurrio un error</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="forn">
                                    Formato no valido</p>
                            </b>

                            <b>
                                <p class="alert alert-danger text-center padding adjuto" id="max">
                                    Supera el limite permitido</p>
                            </b>
                        </div>
                        <!-- script para validar los lebel de confiam la asistencia -->
                        <script>
                        rad = document.getElementById('SI')
                        lab1 = document.getElementById('asiste')
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

<!-- DETALLE DECLINA CONVOCATORIA -->
<div class="modal fade" id='modal-declinado' tabindex="-1" role="dialog" aria-labelledby="basicModal"
    aria-hidden="true">
    <div class="modal1">

        <div id="success-icon">
            <div>
                <img class="img-circle1" src="../dist/img/declinado.png">
            </div>
        </div>
        <h1 class="modaltitle" style="color:gray"><strong>DETALLES</strong></h1>
        <label id="cursdeclina" style="font-size: 16px; color:gray" for=""></label>
        <label id="declindet" style="font-size: 18px; color:gray; font-weight: normal;" class="points">Declinas la
            convocatoria del curso:</label>
        <label id="nombredeclin" style="font-size: 18px; color:gray; font-weight: normal;" for=""></label>
        <br>
        <label id="motivod" style="font-size: 18px; color:#2B2B2B; font-weight: bold;" for=""></label>
        <hr>
        <div id="arcpdf"></div>

        <label readonly id="otrosdp" name="textarea"
            style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>

    </div>

    <script>

    </script>
</div>

<!-- !-- DETALLE DE EDUCACION -->
<div class="modal fade" id='modal-estud' tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal2" style="width: 1100px;">

        <div id="success-icon">
            <div>
                <img class="img-circle1" src="../dist/img/estudios.png">
            </div>
        </div>
        <h1 class="modaltitle" style="color:gray"><strong>EDUCACIÓN</strong></h1>
        <div id="studios"></div>
    </div>
    <script>

    </script>
</div>
<!-- !-- FIN DETALLE DE EDUCACION -->

<!-- !-- DETALLE DE EXPERIENCIA PROFESIONAL -->
<div class="modal fade" id='modal-exprofe' tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal2" style="width: 1300px;">

        <div id="success-icon">
            <div>
                <img class="img-circle1" src="../dist/img/cv.png">
            </div>
        </div>
        <h1 class="modaltitle" style="color:gray"><strong>EXPERIENCIA LABORAL</strong></h1>
        <div id="profsions"></div>
    </div>
    <script>

    </script>
</div>
<!-- FIN DETALLE DE EXPERIENCIA PROFESIONAL -->

<!-- DETALLE DE INFORMACIÓN PERSONAL -->
<div class="modal fade" id='modal-info' tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal2" style="width: 1300px;">
        <div id="success-icon">
            <div>
                <img class="img-circle1" src="../dist/img/info.png">
            </div>
        </div>
        <div>
            <div class="row">

                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab">Datos Personales</a>
                        </li>
                        <li>
                            <a href="#tab_default_2" data-toggle="tab">Datos del puesto</a>
                        </li>
                        <li>
                            <a href="#tab_default_3" id="inspescpecia" data-toggle="tab">Especialidad</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <p>

                            <div class="col-sm-6">
                                <label class="label2">NOMBRE(S)</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta "
                                    id="insnombre" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">APELLIDOS</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insapellido" disabled="">
                            </div>
                            </p>
                            <p>
                            <div class="col-sm-4">

                                <label class="label2">FECHA DE NACIMIENTO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insfecnac" disabled="">
                            </div>

                            <div class="col-sm-4">

                                <label class="label2">NÚMERO DE ISSSTE</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insiss" disabled="">
                            </div>
                            <div class="col-sm-4">

                                <label class="label2">SEXO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insexo" disabled="">
                            </div>
                            </p>
                            <p>
                            <div class="col-sm-6">
                                <label class="label2">RFC</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insrfc" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label class="label2">CURP</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscurp" disabled="">
                            </div>
                            </p>
                            <label style="color:white" for="">-</label>
                            <div class="col-sm-12">

                                <p><span style="font-size: 14px" class="label label-primary">DOMICILIO</span></p>
                            </div>
                            <p>
                            <div class="col-sm-4">

                                <label class="label2">CALLE</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscalle" disabled="">
                            </div>
                            <div class="col-sm-4">

                                <label class="label2">NÚMERO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insnum" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">COLONIA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscol" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">CÓDIGO POSTAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscp" disabled="">
                            </div>
                            <br>
                            <div class="col-sm-4">
                                <label class="label2">CIUDAD</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insciud" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">ESTADO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insest" disabled="">
                            </div>
                            </p>
                            <label style="color:white" for="">-</label>
                            <div class="col-sm-12">
                                <p><span style="font-size: 14px" class="label label-primary">CONTACTO</span></p>
                            </div>
                            <p>
                            <div class="col-sm-4">
                                <label class="label2">CASA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscasa" disabled="">
                            </div>
                            <br>
                            <div class="col-sm-4">
                                <label class="label2">CELULAR</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscel" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">EXTENCIÓN</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insext" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">CORREO PERSONAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscorreper" disabled="">
                            </div>
                            <br>
                            <div class="col-sm-4">
                                <label class="label2">CORREO INSTITUCIONAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscorreins" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">CORREO ALTERNATIVO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscorrealt" disabled="">
                            </div>
                            </p>
                        </div>

                        <div class="tab-pane" id="tab_default_2">
                            <p>
                            <div class="col-sm-4">
                                <label class="label2">NÚMERO DE EMPLEADO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insnemple" disabled="">
                            </div>

                            <div class="col-sm-4">
                                <label class="label2">FECHA INGRESO A LA SCT</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insfecini" disabled="">
                            </div>

                            <div class="col-sm-4">
                                <label class="label2">CÓDIGO PRESUPUESTAL</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inscodpre" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2">PUESTO (GENERICO)</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inspues" disabled="">
                            </div>

                            <div class="col-sm-8">
                                <label class="label2">NOMBRE DEL PUESTO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insnomp" disabled="">
                            </div>
                            <label style="color:white" for="">-</label>
                            <div class="col-sm-12">
                                <p><span style="font-size: 14px" class="label label-primary">INFORMACIÓN DE
                                        ADSCRIPCIÓN</span></p>
                            </div>
                            <div class="col-sm-12">
                                <label class="label2">DIRECCIÓN EJECUTIVA</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insdirec" disabled="">
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <label class="label2">DIRECCIÓN DE ADSCRIPCIÓN</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insdireca" disabled="">
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <label class="label2">SUBDIRECCIÓN</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="inssub" disabled="">
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <label class="label2">DEPARTAMENTO</label>
                                <input type="text" onkeyup="mayus(this);" class="form-control disabled inputalta"
                                    id="insdep" disabled="">
                            </div>
                            </p>
                        </div>
                        <div class="tab-pane" id="tab_default_3">
                            <div id="insespecialidad"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script>

</script>

<!-- FIN DETALLE DE INFORMACIÓN PERSONAL  -->

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
        <br>
        <label id="motivodOJT" style="font-size: 18px; color:#2B2B2B; font-weight: bold;" for=""></label>
        <hr>
        <div id="arcpdfOJT"></div>
        <label readonly id="otrosdpOJT" name="otrosdpOJT"
            style="font-size: 16px; color:#615B5B; font-weight: normal; display:none" rows="3" cols="50"></label>

    </div>

</div>

<!-- REACCION DE EVALUACIÓN OJT -->
<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modal-evaluOJT">
        <div class="modal-dialog width" role="document" style="/*margin-top: 10em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3><i class="fa fa-question-circle" style="color:#08308A"></i>
                        EVALUACIÓN DE REACCIÓN OJT
                    </h3>
                    <br>
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
                                            <input type="hidden" name="idcursoen" id="idcursoen">

                                            <div class="radio">
                                                <div class="form-group ">
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">ESPECIALIDAD:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="col-sm-12" type="text" name="especOJT"
                                                            id="especOJT"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">COMISIÓN:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="col-sm-12" type="text" name="comisionOJT"
                                                            id="comisionOJT"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label style="font-size:16px">NOMBRE
                                                            DEL CURSO:</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="col-sm-12" type="text" name="nomcursoen"
                                                            id="nomcursoen"
                                                            style="font-size:18px; background-color: #E5E7EC; border: 0; outline: none"
                                                            disabled="">
                                                    </div>
                                                    <div class="col-sm-12">
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro6">
                                                        <label for="ro6">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO" id="ro7">
                                                        <label for="ro7">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro8">
                                                        <label for="ro8">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro9">
                                                        <label for="ro9">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro10"
                                                            required>
                                                        <label for="ro10">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro11"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro12">
                                                        <label for="ro12">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro13">
                                                        <label for="ro13">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro14">
                                                        <label for="ro14">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro15">
                                                        <label for="ro15">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro16"
                                                            required>
                                                        <label for="ro16">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro17"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro18">
                                                        <label for="ro18">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro19">
                                                        <label for="ro19">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro20">
                                                        <label for="ro20">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro21">
                                                        <label for="ro21">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro22"
                                                            required>
                                                        <label for="ro22">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro23"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro24">
                                                        <label for="ro24">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro25">
                                                        <label for="ro25">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro26">
                                                        <label for="ro26">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro27">
                                                        <label for="ro27">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro28"
                                                            required>
                                                        <label for="ro28">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro29"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro30">
                                                        <label for="ro30">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro31">
                                                        <label for="ro31">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro32">
                                                        <label for="ro32">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro33">
                                                        <label for="ro33">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro34"
                                                            required>
                                                        <label for="ro34">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro35"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro36">
                                                        <label for="ro36">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro37">
                                                        <label for="ro37">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro38">
                                                        <label for="ro38">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro39">
                                                        <label for="ro39">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro40"
                                                            required>
                                                        <label for="ro40">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro41"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro42">
                                                        <label for="ro42">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro43">
                                                        <label for="ro43">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro44">
                                                        <label for="ro44">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro45">
                                                        <label for="ro45">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro46"
                                                            required>
                                                        <label for="ro46">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro47"
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
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro48">
                                                        <label for="ro48">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro49">
                                                        <label for="ro49">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro50">
                                                        <label for="ro50">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro51">
                                                        <label for="ro51">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro52"
                                                            required>
                                                        <label for="ro52">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro53"
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
                                <form name="form13" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS HABILIDADES ADQUIRIDAS SON APLICABLES PARA EL
                                                DESARROLLO DE LA TAREA Y SUBTAREAS, MOTIVO DEL ENTRENAMIENTO<span
                                                    id="span13">*</span></h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro54">
                                                        <label for="ro54">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro55">
                                                        <label for="ro55">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro56">
                                                        <label for="ro56">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro57">
                                                        <label for="ro57">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro58"
                                                            required>
                                                        <label for="ro58">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro59"
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
                                <form name="form14" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS HABILIDADES ADQUIRIDAS EN EL ENTRENAMIENTO SON
                                                SUFICIENTES.
                                                <span id="span14">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro60">
                                                        <label for="ro60">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro61">
                                                        <label for="ro61">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro62">
                                                        <label for="ro62">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro63">
                                                        <label for="ro63">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro64"
                                                            required>
                                                        <label for="ro64">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro65"
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
                                <form name="form18" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LA DISPONIBILIDAD PARA RESPONDER DUDAS DURANTE EL
                                                ENTRENAMIENTO FUE ADECUADA.
                                                <span id="span18">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro66">
                                                        <label for="ro66">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro67">
                                                        <label for="ro67">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro68">
                                                        <label for="ro68">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro69">
                                                        <label for="ro69">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro70"
                                                            required>
                                                        <label for="ro70">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro71"
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
                                <form name="form21" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">FUE PROPORCIONADO EL MATERIAL PARA EL DESARROLLO DEL
                                                ENTRENAMIENTO (MANUALES, PROCESOS, PROCEDIMIENTOS, HERRAMIENTAS,
                                                FORMATOS, INSTRUCTIVOS, ETC).
                                                <span id="span21">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro72">
                                                        <label for="ro72">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro73">
                                                        <label for="ro73">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro74">
                                                        <label for="ro74">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro75">
                                                        <label for="ro75">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro76"
                                                            required>
                                                        <label for="ro76">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro77"
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
                                <form name="form22" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">LAS CONDICIONES FISICAS DEL LUGAR, PERMITIERON
                                                DESARROLLAR EL ENTRENAMIENTO (LUZ, VENTILACIÓN, LIMPIEZA,
                                                COMODIDAD,ETC.).
                                                <span id="span22">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="EXCELENTE" id="ro78">
                                                        <label for="ro78">EXCELENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="SATISFACTORIO"
                                                            id="ro79">
                                                        <label for="ro79">SATISFACTORIO</label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="REGULAR" id="ro80">
                                                        <label for="ro80">REGULAR</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NO SATISFACTORIO"
                                                            id="ro81">
                                                        <label for="ro81">NO
                                                            SATISFACTORIO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="DEFICIENTE" id="ro82"
                                                            required>
                                                        <label for="ro82">DEFICIENTE</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="preg1" value="NOAPLICA" id="ro83"
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
                                                        <input type="text" name="preg24" id="preg24" class="col-sm-12"
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
                                <form name="form25" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">MENCIONA ALGUNA MEJORA
                                                QUE SE PUDIERA REALIZAR A ESTE PROCESO
                                                DE APRENDIZAJE <span id="span25">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="preg25" id="preg25" class="col-sm-12"
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
                                <form name="form27" action="" class="formulario1">
                                    <div class="radio">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">COMENTARIOS:
                                                <span id="span16">*</span>
                                            </h3>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea class="col-sm-12" name="preg27" id="preg27" rows="5"
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
                                            onclick="evaluar()">ACEPTAR</button>
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



<!-----MODAL DE DETALLES------------------------------------>

<div class="modal fade" id='modal-detalle'>
    <div class="col-xs-12 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">INFORMACIÓN DEL CURSO</h4>
                </div>

                <div class="modal-body">
                    <form id="Confirma1" class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="id_curso1" id="id_curso1">
                        <input type="hidden" name="idinsp1" id="idinsp1">
                        <table class="table table-bordered">
                            <tr>
                                <th>CURSO</th>
                                <th>INCIO</th>
                                <th>HORA</th>
                                <th>FINALIZA</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="gstTitlo1"></div>
                                </td>
                                <td>
                                    <div id="fcurso1"></div>
                                </td>
                                <td>
                                    <div id="hcurso1"></div>
                                </td>
                                <td>
                                    <div id="fechaf1"></div>
                                </td>
                            </tr>
                        </table>



                        <table class="table table-bordered">
                            <tr>
                                <th>TIPO</th>
                                <th>SEDE DEL CURSO</th>
                                <th>MODALIDAD</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="gstTipo1"></div>
                                </td>
                                <td>
                                    <div id="sede1"></div>
                                </td>
                                <td>
                                    <div id="modalidad1"></div>
                                </td>
                            </tr>
                            <tr>
                                <th id="ocul11">LINK</th>
                                <th id="ocul22">CONTRASEÑA</th>
                                <th id="ocul33">CLASSROOM</th>
                            </tr>
                            <tr>
                                <td>
                                    <div id="link1">
                                </td>
                                <td>
                                    <div id="contracur1"></div>
                                </td>
                                <td>
                                    <div id="classroom1"></div>
                                </td>
                            </tr>

                        </table>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div id="instruc1"></div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label id="asisdetalle" class="control-label"
                                            style="font-size:25px; display: none;" for="inputSuccess"><i
                                                class="fa fa-check" style="color: green;"></i>Se confirma la
                                            asistencia</label> <!-- 29/11/2021 -->

                                    </div>
                                </div>


                                <script src="../js/global.js"></script>
                                <!-- script para validar los lebel de confiam la asistencia -->
                                <script>
                                rad = document.getElementById('SI')
                                lab1 = document.getElementById('asiste')
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