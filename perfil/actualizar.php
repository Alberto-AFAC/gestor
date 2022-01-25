<script src="dist/js/sweetalert2.all.min.js"></script>
<link href="dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
<script src="../dist/js/sweetalert2.all.min.js"></script>
<style>
    .swal-wide {
        width: 500px !important;
        font-size: 16px !important;
    }
</style>
<div class="modal fade" id="modal-actualizar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ACTUALIZAR CONTRASEÑA</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="idper" id="idper" value="<?php echo $id?>">
                    <label>Usuario</label>
                    <div class="input-group col-md-12">
                        <input type="email" name="usu" id="usu" class="form-control" pattern="[0-9]{1,7}" value="<?php echo $usu?>" disabled/>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <div class="input-group col-md-12">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" >
                            <div class="input-group-addon input-group-append toggle-password">
                                <i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nueva contraseña</label>
                    <div class="input-group col-md-12">
                        <div class="input-group">
                           <input type="password" class="form-control" name="pass" id="pass" autocomplete="new-password" >
                            <div class="input-group-addon input-group-append toggle-password">
                               <i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Confirmar contraseña</label>
                    <div class="input-group col-md-12">
                        <div class="input-group">
                            <input type="password" class="form-control" name="pass2" id="pass2" autocomplete="new-password" >
                                <div class="input-group-addon input-group-append toggle-password">
                                    <i style="cursor: pointer;" class="fa fa-eye toggle-password"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left"  onclick="actContr();">Aceptar</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <div class="alert alert-success text-center" style="color: #FFF;" id="echo">
                            <p>Contraseña actualizada</p>
                        </div>
                        <div class="alert alert-info text-center" style="color: #FFF;" id="invalida">
                            <p>Las contraseñas no coinciden</p>
                        </div>
                        <div class="alert alert-danger text-center" style="color: #FFF;" id="falso">
                            <p>Contraseña incorrecta</p>
                        </div>
                        <div class="alert alert-warning text-center" style="color: #FFF;" id="vacios">
                           <p>Llene campos vacíos</p>
                        </div>
                        <div class="alert alert-danger text-center" style="color: #FFF;" id="error">
                           <p>Datos no actualizados</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.MODAL DE CAMBIO OBLIGATORIO DE CONTRASEÑA -->
<div class="modal fade" id='modal-obligatorio' data-keyboard="false" data-backdrop="static">
    <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog width" role="document" >
            <div class="modal-content">
                <form id="" class="form-horizontal" action="" method="POST" >
                    <div id="login-box">
                        <div class="left">
                            <label for="" class="h1">Actualización de contraseña</label>
                            <input type="hidden" name="idact" id="idact" value="<?php echo $id?>">
                            <input class="pru" type="text" id="usuarioobl" name="usuarioobl" placeholder="Username" disabled=""/>
                            <input class="pru" type="text" id="usuarcontraseio" name="usuarcontraseio" placeholder="Contraseña Actual" />
                            <input class="pru" type="password" name="password1" id="password1" placeholder="Nueva Contraseña" onchange="contraseña()"/>
                            <input class="pru" disabled type="password" name="password2" id="password2" placeholder="Confirmar contraseña"/>
                            <div class="form-group">
                                <div class="input-group col-md-12">
                                <!-- <p>
                                    <input type="checkbox" id="test1"/>
                                    <label for="test1">Aceptar</label>
                                    <a data-toggle="modal" data-target="#modal-aviso-priva" style="margin-bottom: 1.4em; font-size: 17px; color: #4184f3; text-decoration: underline;cursor: pointer">Aviso de Privacidad </a>
                                </p> -->
                                </div>
                                <div class="input-group col-md-12">
                                    <!-- <label for="" style="color:#ff0000; font-size: 14px;">*Debe aceptar el Aviso de Privacidad</label> -->
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary pull-left submit" onclick="actControbli();">Aceptar</button>     
                        </div>        
                        <div class="right">
                            <img src="../dist/img/contra.jpg" style="width: 355px; height: 273px; display: block; margin: auto;">
                        </div>
                        
                    </div>
                    <div class="input-group col-md-12">
                                <div class="alert alert-warning text-center" style="color: #FFF; display:none" id="validcarac">
                                    <p style="color: #FEFEFE; font-size: 16px;">Su contraseña, debe tener almenos 8 letras conformadas por una mayuscula y un numero</p>
                                </div>
                                <div class="alert alert-warning text-center" style="color: #FFF; display:none" id="caractmin">
                                    <p style="color: #FEFEFE; font-size: 16px;">Su contraseña, debe tener almenos 8 letras conformadas por una mayuscula y un numero</p>
                                </div>
                                <div class="alert alert-warning text-center" style="color: #FFF; display:none" id="caratesp">
                                    <p style="color: #FEFEFE; font-size: 16px;">Su contraseña, debe tener almenos Una mayuscula y un numero</p>
                                </div>
                                <div class="alert alert-success text-center" style="color: #FFF; display:none" id="contraexit">
                                    <p style="color: #FEFEFE; font-size: 16px;">Su contraseña, a sido aprobado favor de confirmarla</p>
                                </div>
                        </div>
                </form>                         
             </div>            
        </div>   
    </div> 
</div> 

<div class="modal fade" id="modal-aviso-priva">
    <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span></button> -->
                <h2 class="modal-title" style="color:#0050BD">AVISO DE PRIVACIDAD</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                     <div class="input-group col-md-12">
                     <div style="font-size: 17px;">
                        <label for="">Datos del Responsable.</label>
                    </div>
                    <div style="font-size: 17px;">
                        Agencia Federal de Aviación Civil (AFAC).
                    </div>
                    <div style="font-size: 17px;">
                        <label for="">Domicilio de la AFAC.</label>
                    </div>
                    <div style="font-size: 17px;">
                        Boulevard Adolfo López Mateos, número 1990, piso 1, Colonia los Alpes, demarcación territorial Álvaro Obregón, Ciudad de México, código postal 01010. Sitio web:<a href="https://ts.sct.gob.mx/transporte-y-medicina-preventiva/aeronautica-civil/inicio/">https://ts.sct.gob.mx/transporte-y-medicina-preventiva/aeronautica-civil/inicio/</a>
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        La Agencia federal de Aviación Civil define su Política de Seguridad de la Información y Uso de las TIC, elaborando las directrices y principios que garanticen un uso adecuado y eficaz de los mecanismos tecnológicos, dentro de un entorno seguro para la información. La política y sus directrices se rigen por los principios de concienciación social, cooperación, integridad, transparencia, legalidad y buena fe de la entidad y de todo el personal que la integran, (se consideran tales, directivos y empleados), sobre la base de su Código Ético.
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        En la Agencia federal de Aviación Civil se reconoce expresamente la importancia de los Sistemas de Información, así como la necesidad de su protección, con el objeto de evitar pérdidas de datos y/o uso no autorizado o ilícito de los mismos que pudieran causar daños importantes a los clientes, empleados, y/o a la propia entidad y su imagen en la sociedad. A tal efecto, se define la presente Política con el propósito de adoptar cuantas medidas de índole técnica y organizativa sean necesarias para garantizar la integridad, disponibilidad y confidencialidad de los datos y los sistemas de información que los soportan. El compromiso de la Agencia Federal de Aviación Civil se concreta en los siguientes puntos:
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        •Inversión constante y responsabilidad de la seguridad de la información. Se establecerán los medios necesarios y adecuados para proteger y garantizar la seguridad de los datos, personas, programas, equipos, instalaciones, documentación y otros soportes que configuran los sistemas informáticos y tecnológicos de AFAC con el fin de evitar la alteración, copia, pérdida, tratamiento o acceso no autorizados de la información que contienen. Al mismo tiempo corresponderá a todos los empleados de la entidad conocer y respetar los mecanismos de seguridad adoptados por la Agencia. 
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        •Desarrollo y adaptación continua a los avances de la técnica. La presente política se especificará y desarrollará a través de normas, guías, estándares, circulares, manuales y procedimientos, que se irán actualizando cuando sea necesario en función de las nuevas exigencias impuestas por los avances de la tecnología.
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        •Difusión de la información y formación. Se fomentará la difusión de la información y la formación a todos los Profesionales y a consultores, agentes o terceros contratados, previniendo la comisión de errores, omisiones, fraudes o delitos, y tratando de detectar su posible existencia lo antes posible.
                    </div>
                    <br>
                    <div style="font-size: 17px;">
                        •Control de riesgos. Se establecerán controles adecuados y razonables, 3 preventivos, de detección y correctivos frente a posibles conductas delictivas y a aquellos riesgos que puedan influir en que la información no sea exacta, completa o no esté disponible dentro del tiempo fijado. Estos controles serán proporcionados y adecuados a la criticidad de los activos a proteger y a su clasificación. Asimismo, dichos controles serán auditables en base a las Normas y Procedimientos aplicables y siempre de acuerdo con la legalidad vigente.
                    </div>
                    <br>
                    <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">ÁMBITO DE APLICACIÓN</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  La presente Política de Seguridad de la Información y Uso de las TIC es de obligado cumplimiento para todos los usuarios de los sistemas de información y comunicaciones de la Agencia federal de Aviación Civil. A estos efectos, se considerarán usuarios a los directivos, técnicos, administrativos, inspectores y a todos aquéllos a quienes se les facilite el acceso a los mecanismos y recursos informáticos y tecnológicos de la entidad. 
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  A través de los diferentes canales de comunicación disponibles (telefónico, presencial, correo electrónico: jesus.beltran@afac.com.mx y dirección postal del domicilio social) se atenderá y resolverá cualquier pregunta, duda o incertidumbre sobre la aplicación de esta política en cada caso concreto.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">DIRECTRICES EN EL ÁMBITO DE LA SEGURIDAD DE LA INFORMACIÓN Y DEL USO DE LAS TIC</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Junto al compromiso de la Agencia Federal de Aviación Civil en la creación, desarrollo, mantenimiento y control de los sistemas más eficaces y robustos de tecnologías de la comunicación y de la información, es esencial mantener un conjunto de directrices en la seguridad de la información y los usos de la tecnología.
                  </div>
                   <br>
                   <div style="font-size: 17px;">
                   La presente Política recoge las directrices esenciales relacionadas con la seguridad de la información y con las TIC, con la finalidad de que todos los esfuerzos de la organización confluyan en los siguientes objetivos primordiales: salvaguardar la seguridad de los sistemas tecnológicos de la entidad y de la información que éstos contienen, así como garantizar el correcto desarrollo de nuestra actividad.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">PUNTOS CLAVE A TENER EN CUENTA</label>
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   El compromiso de la Agencia Federal de Aviación Civil con el cumplimiento de las leyes y los principios en que se inspiran es absoluto en todos y cada uno de sus ámbitos de actividad y forma parte esencial del desarrollo de su actividad bajo los principios de ética y excelencia.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   En relación con las tecnologías de la información y la comunicación, las leyes mexicanas prohíben y castigan, entre otras, las siguientes conductas:
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • El uso, la tenencia o la difusión de programas informáticos y archivos protegidos por derechos de propiedad intelectual o industrial, para los que se carezca de autorización o licencia de uso.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • Borrar, deteriorar, alterar, suprimir o hacer inaccesibles programas informáticos o documentos electrónicos, o por los mismos medios impedir el normal funcionamiento de un sistema informático.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • Invadir la esfera de intimidad de otro mediante la interceptación de sus correos electrónicos o la sustracción de sus documentos o imágenes, así como su posterior difusión.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • El descubrimiento, apoderamiento o interceptación, por cualquier medio, de datos o información empresarial de carácter restringido, secreto o confidencial, así como su posterior difusión.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • La modificación, el apoderamiento o la utilización de datos reservados ajenos, así como su posterior difusión.
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   • El acoso
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  <i>“Las anteriores conductas pueden ser castigadas con penas graves tanto para la persona física (hasta 5 años de prisión en algunos casos y multa) como para la empresa en nombre de la cual esa persona física eventualmente actúe (multas, suspensión de actividades, etc.).”</i>
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   Con la finalidad de analizar incidentes de seguridad y asegurar que el uso de las tecnologías de la información y la comunicación se realiza de conformidad con esta política, la Agencia dispone de mecanismos de monitorización y registro de los sistemas informáticos puestos a disposición de sus profesionales. Esto incluye, entre otros, el uso de Internet y del correo electrónico corporativo, así como el uso de los equipos informáticos fijos y portátiles como estaciones de trabajo, dispositivos móviles, dispositivos de almacenamiento de datos, etc.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">DIRECTRICES EN EL ÁMBITO DE SEGURIDAD DE LA INFORMACIÓN</label>
                  </div>
                  <br>
                   <div style="font-size: 17px;">
                   Las siguientes directrices responden a los principios éticos y de seguridad en el desarrollo de la actividad de la Agencia Federal de Aviación Civil y, se dirigen a salvaguardar la integridad y la seguridad de la información puesta a disposición de los usuarios para el óptimo desempeño de sus funciones, y se complementan con las directrices específicas de uso de las TIC.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Primera-</label><label for="" style="font-size: 17px; color:#5899C6">Seguridad del Personal </label>
                  </div>
                   <div style="font-size: 17px;">
                   Todo usuario de los recursos tecnológicos que tenga acceso a los Activos de Información de la entidad, deberá observar el principio de confidencialidad que prohíbe la revelación de información sensible a terceros de dentro o fuera de la Organización sin autorización expresa.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Segunda-</label><label for="" style="font-size: 17px; color:#5899C6">Privacidad</label>
                  </div>
                   <div style="font-size: 17px;">
                   Se observará el estricto cumplimiento de la regulación relacionada con la protección de datos de carácter personal.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Tercera-</label><label for="" style="font-size: 17px; color:#5899C6">Control de Accesos a los Activos de Información</label>
                  </div>
                   <div style="font-size: 17px;">
                   Las contraseñas son estrictamente confidenciales y personales, y, por tanto, se deberá hacer un uso responsable y diligente de las mismas.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Cuarta-</label><label for="" style="font-size: 17px; color:#5899C6">Responsabilidad del Usuario</label>
                  </div>
                   <div style="font-size: 17px;">
                   Todos los usuarios de recursos tecnológicos que tengan acceso a los Activos de Información de Agencia Federal de Aviación Civil deberán adherirse a las Normas y Procedimientos que se desprendan de esta Política para la protección de los Activos de Información.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Quinta-</label><label for="" style="font-size: 17px; color:#5899C6">Seguridad de Acceso de Colaboradores Externos</label>
                  </div>
                   <div style="font-size: 17px;">
                   El acceso de colaboradores externos (instructores o terceros contratados) a las comunicaciones o a los recursos informáticos de la Agencia Federal de Aviación Civil se hará de forma restringida y debidamente autorizada.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Sexta-</label><label for="" style="font-size: 17px; color:#5899C6">Evaluación de Activos de Información y protección de los mismos</label>
                  </div>
                   <div style="font-size: 17px;">
                   Toda la información de la Agencia Federal de Aviación Civil será clasificada y su valor establecido para asegurar que se le otorga la protección adecuada a la información durante su ciclo vital.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Séptima-</label><label for="" style="font-size: 17px; color:#5899C6">Seguridad de Control de Acceso de Entrada</label>
                  </div>
                   <div style="font-size: 17px;">
                   Se protegerá el acceso a todas aquellas instalaciones que contengan Activos de Información que precisen ser protegidos.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  <label for="" style="font-size: 20px; color:#0050BD">DIRECTRICES DE USO DE LAS TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN (TIC)</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Las siguientes directrices responden a los principios éticos y de seguridad en el desarrollo de la actividad de la Agencia Federal de Aviación Civil y, particularmente, en el uso de las tecnologías de la información y la comunicación puestos a disposición de los usuarios para el óptimo desempeño de sus funciones. Asimismo, estas directrices se desarrollan y concretan en las Normas y Procedimientos vigentes sobre Seguridad de la Información y TIC, disponibles en la Intranet.
                  </div>
                  <br>
                  <div style="font-size: 30px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Primera</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  <label for="" style="font-size: 17px; color:#5899C6">La información, los recursos y las herramientas TIC profesionales son propiedad de la Agencia Federal de Aviación Civil.</label>
                  </div>
                  <div style="font-size: 17px;">
                  Todos los recursos y herramientas informáticas y de comunicaciones puestas a disposición por la Agencia Federal de Aviación Civil a sus empleados son de su propiedad y se suministran para su exclusivo uso en el desempeño profesional, para aumentar la productividad y mejorar el entorno laboral. El usuario de estos recursos informáticos deberá hacer un uso responsable y diligente.
                  </div>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Toda la información contenida en soportes físicos (archivos, papel, etc.) o en soporte electrónico (intranet, equipos informáticos y dispositivos electrónicos de la Sociedad) es parte del conocimiento y valor de la empresa y, por lo tanto, propiedad de la Agencia Federal de Aviación Civil.
                  </div>
                  <br>
                  <div style="font-size: 30px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Segunda</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  <label for="" style="font-size: 17px; color:#5899C6">Uso profesional de los dispositivos y sistemas</label>
                  </div>
                  <div style="font-size: 17px;">
                  Los dispositivos y sistemas puestos a disposición de sus empleados por la Agencia Federal de Aviación Civil se emplearán exclusivamente para las funciones que se desprendan del cargo ocupado.
                  </div>
                  </div>
                  <div style="font-size: 17px;">
                  Cada usuario respetará los privilegios que le han sido atribuidos y actuará en concordancia con los principios éticos y de conducta recogidos en el Código Ético.
                  </div>
                  <br>
                  <div style="font-size: 30px;">
                  <label for="" style="font-size: 17px; color:#9E9E9E">Tercera</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  <label for="" style="font-size: 17px; color:#5899C6">Usos no permitidos de los dispositivos y sistemas</label>
                  </div>
                  <div style="font-size: 17px;">
                  Se considera no permitido cualquier uso de los dispositivos y sistemas contrario a la ley, a la presente Política y a los principios de actuación establecidos en el Código Ético. En particular los que puedan afectar a los principios de integridad, disponibilidad y confidencialidad de los datos, la protección de la propiedad intelectual, el respeto a las personas y su intimidad, y la prevención del descubrimiento o revelación de secretos empresariales.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Cada usuario respetará los privilegios que le han sido atribuidos y actuará en concordancia con los principios éticos y de conducta recogidos en el Código Ético.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">CONTROL Y SUPERVISIÓN</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  La Agencia Federal de Aviación Civil vela por la seguridad de la información y por el uso de las TIC conforme a los principios establecidos en la presente Política a través de los mecanismos de supervisión adecuados.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  En todo caso, la entidad establecerá los mecanismos necesarios para monitorizar la utilización de sus sistemas informáticos, incluyendo entre otros, los servicios de Internet y correo electrónico corporativos, con independencia de la ubicación y dispositivo utilizado.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Los sistemas de control y de seguridad se auditarán periódicamente para garantizar su fiabilidad y eficacia aplicando las normas y procedimientos adecuados que se establecerán a tal fin. De igual modo se auditará periódicamente el seguimiento por parte de los usuarios de las Normas y Procedimientos de seguridad.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Los mecanismos de control referidos en los párrafos precedentes se utilizarán en controles automáticos, periódicos o cuando concurra alguno de los supuestos siguientes:
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  • existencia de indicios de que un usuario está realizando alguna de las conductas prohibidas por esta Política;
                  </div>
                  <div style="font-size: 17px;">
                  • existencia de indicios razonables de que se puedan estar cometiendo ilícitos penales o de cualquier naturaleza (administrativos, laborales, etc.) a través de los medios TIC de la Agencia Federal de Aviación Civil; 
                  </div>
                  <div style="font-size: 17px;">
                  • existencia de indicios razonables de una situación de acoso o de cualquier otra conducta en el uso de los medios TIC de la entidad que pueda causar perjuicios.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  En estos supuestos, la Agencia Federal de Aviación Civil podrá investigar el correspondiente incumplimiento, dentro de los límites y garantías legalmente procedentes.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">RESPONSABILIDAD</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  El incumplimiento de lo dispuesto en esta Política, las directrices de actuación que contiene o las Normas y Procedimientos de desarrollo acarreará sanciones disciplinarias que, en su caso, pueden conllevar la terminación de la relación laboral o mercantil que el infractor mantenga con la Agencia Federal de Aviación Civil, según la legislación y la normativa convencional que resulte de aplicación, así como la iniciación de las acciones legales oportunas por parte de la Agencia.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  En caso de extinción del contrato de trabajo, se seguirán los procedimientos descritos en las Normas y Procedimientos vigentes.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">REPORTE DE INCUMPLIMIENTOS</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Cualquier persona de la Agencia Federal de Aviación Civil que tenga conocimiento de una actuación que infrinja esta Política o constituya un incumplimiento de alguna de sus directrices deberá ponerlo en conocimiento a través del Canal de Comunicación Interno establecido a estos efectos, remitiéndolo a la dirección postal del domicilio social o al correo electrónico jesus.beltran@afac.gob.mx
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Se tendrán en cuenta, y se investigarán adecuadamente, todas las notificaciones sobre incumplimientos de esta política y sus directrices.
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Esta notificación, siempre y cuando se produzca de buena fe, estará amparada por la confidencialidad (de modo que la identidad de la persona que la realiza no será revelada sin su consentimiento).
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  Asimismo, la Agencia Federal de Aviación Civil garantiza que, bajo ninguna circunstancia, podrá derivarse represalia o consecuencia perjudicial alguna para la persona que realice esta notificación de buena fe o para aquellas personas de la Sociedad que presten su colaboración en la investigación de un incumplimiento de esta política.
                  </div>
                  <br>
                  <div style="font-size: 20px;">
                  <label for="" style="font-size: 17px; color:#0050BD">COMUNICACIÓN DE ESTA POLÍTICA</label>
                  </div>
                  <br>
                  <div style="font-size: 17px;">
                  La presente Política de Seguridad de la Información y Uso de las TIC será objeto de comunicación a la totalidad de los empleados de la Agencia Federal de Aviación Civil, así como de acciones periódicas de concienciación y recordatorio de su existencia.
                  </div>
                  <div style="font-size: 17px;">
                  Aquellos instructores o terceros contratados a quienes se les facilite temporalmente acceso a los recursos informáticos y tecnológicos de la Agencia Federal de Aviación Civil deberán adherirse con carácter previo a la presente Política de Seguridad de la Información y Uso de las TIC, de forma que queden vinculados por sus directrices de actuación. 
                  </div>
                  <br>
                  Agencia Federal de Aviación Civil (AFAC)
                </div>
            </div>
        </div>
    </div>
        
<script type="text/javascript">
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});	
</script>
<style>

</style>
