<!-- inio modal de instructor y coordinador cursos coordinados y inpartidos -->
<div class="modal fade" id='modal-proojt'>
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                    <form id="Dtall" class="form-horizontal" action="" method="POST" >
                    <input type="hidden" id="idinfregistro" name="idinfregistro">
                       <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">INSPECTOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infojnombre" id="infojnombre" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="label2" for="">COORDINADOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infocoordojt" id="infocoordojt" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label class="label2" for="">INSTRUCTOR:</label>
                                <input type="" class="form-control disabled inputalta" name="infinstrojt" id="infinstrojt" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="label2" for="">INICIO:</label>
                                <input type="" class="form-control disabled inputalta" name="infinicioojt" id="infinicioojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">FIN:</label>
                                <input type="" class="form-control disabled inputalta" name="inffinojt" id="inffinojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">NIVEL:</label>
                                <input type="" class="form-control disabled inputalta" name="infnivelojt" id="infnivelojt" disabled="">
                            </div>
                        </div>     
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">TAREA PROGRAMADA:</label>
                                <textarea type="" cols="30" rows="3" class="form-control disabled inputalta" name="inftarepromojt" id="inftarepromojt" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">SUBTAREA PROGRAMADA:</label>
                                <textarea type="" cols="30" rows="3" class="form-control disabled inputalta" name="infsubtareojt" id="infsubtareojt" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label2" for="">ESPECIALIDAD:</label>
                                <!-- <input class="form-control disabled inputalta" name="infespeojt" id="infespeojt" disabled=""> -->
                                <select id="infespeojt" name="infespeojt" class="form-control" placeholder="Seleccione..." disabled="">
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
                                <input type="" class="form-control disabled inputalta" name="inftipojt" id="inftipojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">LUGAR:</label>
                                <input type="" class="form-control disabled inputalta" name="influgarojt" id="influgarojt" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label class="label2" for="">SEDE:</label>
                                <input type="" class="form-control disabled inputalta" name="infsedeojt" id="infsedeojt" disabled="">
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class="col-sm-4">
                                <button type="button" onclick="endojt()" name="buttofnojt" id="buttofnojt" title="Finalizar OJT" class="btn btn-block btn-success btn-sm" onclick="">FINALIZAR OJT PROGRAMADA</button> 
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
                            <form id="correo" action="" method="POST">
                                <div class="modal fade" id='notificarConv' tabindex="-1" role="dialog"
                                    aria-labelledby="notificarConv" aria-hidden="true">
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

                                        <button type="button" id="cerrarres" style="font-size:18px"
                                            class="btn btn-block btn-primary" onclick="enviarMail()"
                                            data-dismiss="modal">ENVIAR</button>
                                        <button type="button" id="agregarres" style="font-size:18px"
                                            class="btn btn-block btn-default btn-sm"
                                            data-dismiss="modal">CERRAR</button>
                                    </div>
                                </div>
                            </form>

    <!----------------------------------------------------MODAL EVALUACIÓN NIVEL 1------------------------------------------------------>

    <form id="Editar" class="form-horizontal" action="" method="POST" style="text-transform: uppercase;">
        <div class="col-xs-20 .col-md-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal fade" id="modal-evaluarojt">
                <div class="modal-dialog width" style="width: 80%;"role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>
                            <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL I</h4>
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idtarpre" name="idtarpre">
                                <div class="col-sm-6">
                                    <label>INSPECTOR:</label>
                                    <input type="hidden" id="idinspo" name="idinspo">
                                    <input type="text" name="nompoj1" id="nompoj1" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>INSTRUCTOR:</label>
                                    <input type="hidden" id="idintucco" name="idintucco">
                                    <input type="text" name="tipooj1" id="tipooj1" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>TAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="taroj" id="taroj" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>SUBTAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="suboj" id="suboj" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                        <thead style="background-color:#001C6E; color:white">
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
                                                <td >El aprendiz puede identificar apropiadamente los materiales asociados con la tarea (reglas, órdenes, formas, equipamiento, etc.</td>
                                                <td><div><input type="checkbox" id="test1"/><label for="test1">No puede identificar los materiales</label></div></td>
                                                <td><div><input type="checkbox" id="test2"/><label for="test2">Identifica algunos materiales</label></div></td>
                                                <td><div><input type="checkbox" id="test3"/><label for="test3">Identifica casi todos los materiales</label></div></td>            
                                                <td><div><input type="checkbox" id="test4"/><label for="test4">Identifica todos los materiales</label></div></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>El aprendiz puede definir los términos y definiciones clave asociados con la tarea.</td>
                                                <td><div><input type="checkbox" id="test5"/><label for="test5">No puede definir los términos</label></div></td>
                                                <td><div><input type="checkbox" id="test6"/><label for="test6">Define algunos términos</label></div></td>
                                                <td><div><input type="checkbox" id="test7"/><label for="test7">Define casi todos los términos</label></div></td>
                                                <td><div><input type="checkbox" id="test8"/><label for="test8">Define todos los términos</label></div></td>
                                           </tr>
                                           <tr>
                                                <td>3</td>
                                                <td>El aprendiz puede explicar cómo se inicia la tarea..</td>
                                                <td><div><input type="checkbox" id="test9"/><label for="test9">No puede explicar los recursos para iniciar la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test10"/><label for="test10">Explica algunos recursos para iniciar la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test11"/><label for="test11">Explica la mayoría de los recursos para iniciar la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test12"/><label for="test12">Explica todos los recursos para iniciar la tarea</label></div></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>El aprendiz puede explicar los resultados de la tarea (ej. Emisión de Certificados y/o Especificaciones de Operaciones, aprobaciones/desaprobaciones.</td>
                                                <td><div><input type="checkbox" id="test13"/><label for="test13">No puede explicar los resultados de la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test14"/><label for="test14">No puede explicar los resultados de la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test15"/><label for="test15">Explica la mayoría de los posibles resultados de la tarea</label></div></td>
                                                <td><div><input type="checkbox" id="test16"/><label for="test16">Explica todos los posibles resultados de la tarea</label></div></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>El aprendiz puede describir como se cierra la tarea y documentarla en el registro del seguimiento del trabajo, archivo del operador, etc.</td>
                                                <td><div><input type="checkbox" id="test18"/><label for="test18">No puede explicar la documentación de la tarea.</label></div></td>
                                                <td><div></div></td>
                                                <td><div><input type="checkbox" id="test19"/><label for="test19">Describe algunos métodos o formas de documentación.</label></div></td>
                                                <td><input type="checkbox" id="test20"/><label for="test20">DESCRIBE TODOS LOS MÉTODOS O FORMAS DE DOCUMENTACIÓN.</label></div></td>
                                            </td>
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
                                                <th>SI</th>
                                                <th>NO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Habilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si1"/><label for="si1"></label></td>
                                                <td><input value="NO" type="checkbox" id="no1"/><label for="no1"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Debilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si2"/><label for="si2"></label></td>
                                                <td><input value="NO" type="checkbox" id="no2"/><label for="no2"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de desempeño</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si3"/><label for="si3"></label></td>
                                                <td><input value="NO" type="checkbox" id="no3"/><label for="no3"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de actitud</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si4"/><label for="si4"></label></td>
                                                <td><input value="NO" type="checkbox" id="no4"/><label for="no4"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Acciones correctivas recomendadas</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si5"/><label for="si5"></label></td>
                                                <td><input value="NO" type="checkbox" id="no5"/><label for="no5"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Observaciones y/o comentarios</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si6"/><label for="si6"></label></td>
                                                <td><input value="NO" type="checkbox" id="no6"/><label for="no6"></label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-2">
                            <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                            <button type="button" title="Agregar Evaluación" class="btn btn-block btn-primary" onclick="">EVALUAR</button>
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
                <div class="modal-dialog width" style="width: 80%;"role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>
                            <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL II</h4>
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idtarpreII" name="idtarpreII">
                                <div class="col-sm-6">
                                    <label>INSPECTOR:</label>
                                    <input type="hidden" id="idinspoII" name="idinspoII">
                                    <input type="text" name="nompoj1II" id="nompoj1II" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>INSTRUCTOR:</label>
                                    <input type="hidden" id="idintuccoII" name="idintuccoII">
                                    <input type="text" name="tipooj1II" id="tipooj1II" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>TAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="tarojII" id="tarojII" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>SUBTAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="subojII" id="subojII" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                        <thead style="background-color:#001C6E; color:white">
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
                                                <td >El aprendiz puede describir la secuencia de pasos para completar la tarea.</td>
                                                <td><div><input type="checkbox" id="test1II"/><label for="test1II">No puede describir la secuencia de pasos</label></div></td>
                                                <td><div><input type="checkbox" id="test2II"/><label for="test2II">Describe algunos pasos de la secuencia</label></div></td>
                                                <td><div><input type="checkbox" id="test3II"/><label for="test3II">Describe la mayoría de pasos de la secuencia</label></div></td>            
                                                <td><div><input type="checkbox" id="test4II"/><label for="test4II">Describe la secuencia de pasos adecuadamente</label></div></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>El aprendiz puede describir apropiadamente los materiales como formas y equipamiento usados durante la realización de la tarea.</td>
                                                <td><div><input type="checkbox" id="test5II"/><label for="test5II">No puede describir el uso de los materiales</label></div></td>
                                                <td><div><input type="checkbox" id="test6II"/><label for="test6II">Describe algunos usos de materiales</label></div></td>
                                                <td><div><input type="checkbox" id="test7II"/><label for="test7II">Describe la mayoría de usos de materiales</label></div></td>
                                                <td><div><input type="checkbox" id="test8II"/><label for="test8II">Describe adecuadamente el adecuado uso de los materiales</label></div></td>
                                           </tr>
                                           <tr>
                                                <td>3</td>
                                                <td>El aprendiz puede describir las interacciones con otro personal de la autoridad requerido para completar la tarea.</td>
                                                <td><div><input type="checkbox" id="test9II"/><label for="test9II">No puede describir las interacciones entre el personal de la autoridad</label></div></td>
                                                <td><div><input type="checkbox" id="test10II"/><label for="test10II">Describe algunas interacciones adecuadamente</label></div></td>
                                                <td><div><input type="checkbox" id="test11II"/><label for="test11II">Describe la mayoría de interacciones adecuadamente</label></div></td>
                                                <td><div><input type="checkbox" id="test12II"/><label for="test12II">Describe todas las posibles interacciones adecuadamente</label></div></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>El aprendiz puede describir la coordinación con el operador que es necesario para completar la tarea.</td>
                                                <td><div><input type="checkbox" id="test13II"/><label for="test13II">No puede describir las actividades de coordinación con el operador</label></div></td>
                                                <td><div><input type="checkbox" id="test14II"/><label for="test14II">Explica algunas actividades de coordinación con el operador</label></div></td>
                                                <td><div><input type="checkbox" id="test15II"/><label for="test15II">Explica la mayoría de actividades de coordinación con el operador</label></div></td>
                                                <td><div><input type="checkbox" id="test16II"/><label for="test16II">Explica todas las actividades de coordinación con el operador adecuadamente</label></div></td>
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
                                                <th>SI</th>
                                                <th>NO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Habilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si1II"/><label for="si1II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no1II"/><label for="no1II"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Debilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si2II"/><label for="si2II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no2II"/><label for="no2II"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de desempeño</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si3II"/><label for="si3II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no3II"/><label for="no3II"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de actitud</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si4II"/><label for="si4II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no4II"/><label for="no4II"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Acciones correctivas recomendadas</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si5II"/><label for="si5II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no5II"/><label for="no5II"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Observaciones y/o comentarios</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si6II"/><label for="si6II"></label></td>
                                                <td><input value="NO" type="checkbox" id="no6II"/><label for="no6II"></label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="col-sm-2">
                            <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                            <button type="button" title="Agregar Evaluación" class="btn btn-block btn-primary" onclick="">EVALUAR</button>
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
                <div class="modal-dialog width" style="width: 80%;"role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>
                            <h4 style="text-align:Center;" class="modal-title" id="editarAccesosLabel">EVALUACIÓN OJT NIVEL III</h4>
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="idtarpreII3" name="idtarpreII3">
                                <div class="col-sm-6">
                                    <label>INSPECTOR:</label>
                                    <input type="hidden" id="idinspoII3" name="idinspoII3">
                                    <input type="text" name="nompoj1II3" id="nompoj1II3" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>INSTRUCTOR:</label>
                                    <input type="hidden" id="idintuccoII3" name="idintuccoII3">
                                    <input type="text" name="tipooj1II3" id="tipooj1II3" style="text-transform:uppercase;" class="form-control disabled" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>TAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="tarojII3" id="tarojII3" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>SUBTAREA:</label>
                                    <textarea type="text" cols="30" rows="2" name="subojII3" id="subojII3" style="text-transform:uppercase;" class="form-control disabled" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <table id="evalinscooj" class="table table-striped table-bordered dataTable">
                                        <thead style="background-color:#001C6E; color:white">
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
                                                <td >¿Demostró el aprendiz suficiente conocimiento para completar con precisión la tarea?</td>
                                                <td><input value="SI" type="checkbox" id="si1III"/><label for="si1III"></label></td>
                                                <td><input value="NO" type="checkbox" id="no1III"/><label for="no1III"></label></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td >¿Demostró el aprendiz todos los pasos necesarios para completar la tarea de manera competente?</td>
                                                <td><input value="SI" type="checkbox" id="si2III"/><label for="si2III"></label></td>
                                                <td><input value="NO" type="checkbox" id="no2III"/><label for="no2III"></label></td>
                                           </tr>
                                           <tr>
                                                <td>3</td>
                                                <td >¿Se completaron los pasos en el orden adecuado?</td>
                                                <td><input value="SI" type="checkbox" id="si3III"/><label for="si3III"></label></td>
                                                <td><input value="NO" type="checkbox" id="no3III"/><label for="no3III"></label></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td >¿El aprendiz realizó la tarea de manera oportuna y sin ayuda?</td>
                                                <td><input value="SI" type="checkbox" id="si4III"/><label for="si4III"></label></td>
                                                <td><input value="NO" type="checkbox" id="no4III"/><label for="no4III"></label></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td >¿El aprendiz juzgó adecuadamente el resultado de la tarea y lo cerró de la manera correcta?</td>
                                                <td><input value="SI" type="checkbox" id="si5III"/><label for="si5III"></label></td>
                                                <td><input value="NO" type="checkbox" id="no6III"/><label for="no6III"></label></td>
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
                                                <th>SI</th>
                                                <th>NO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Habilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si13"/><label for="si13"></label></td>
                                                <td><input value="NO" type="checkbox" id="no13"/><label for="no13"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Debilidades del aprendiz</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si23"/><label for="si23"></label></td>
                                                <td><input value="NO" type="checkbox" id="no23"/><label for="no23"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de desempeño</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si33"/><label for="si33"></label></td>
                                                <td><input value="NO" type="checkbox" id="no33"/><label for="no33"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Problemas de actitud</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si43"/><label for="si43"></label></td>
                                                <td><input value="NO" type="checkbox" id="no43"/><label for="no43"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Acciones correctivas recomendadas</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si53"/><label for="si53"></label></td>
                                                <td><input value="NO" type="checkbox" id="no53"/><label for="no53"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Observaciones y/o comentarios</td>
                                                <td><textarea onkeyup="mayus(this);" name="" id="" cols="100" rows="3"></textarea></td>
                                                <td><input value="SI" type="checkbox" id="si63"/><label for="si63"></label></td>
                                                <td><input value="NO" type="checkbox" id="no63"/><label for="no63"></label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="col-sm-2">
                            <!-- <button type="button" id="button" title="AGREGAR EVALUACIÓN" style="font-size:14px" class="btn btn-block btn-primary altaboton" onclick="">ACEPTAR</button> -->
                            <button type="button" title="Agregar Evaluación" onclick="endojt()" class="btn btn-block btn-primary" onclick="">EVALUAR</button>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>          