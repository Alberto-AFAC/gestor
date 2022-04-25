//FIN DE RESUMEN DE OJT
$.ajax({
    url: '../php/ojtinf.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var programados = 0;
    var completos = 0;
    var cancelados = 0;
    var confirmar = 0;
    var conteo = 0;
    var fecha = 0;
    var ffin = 0;
    for (O = 0; O < res.length; O++) {

        confirmaOJT = obj.data[O].confirmar;
        programadosOJT = obj.data[O].proceso;
        venciOJT = obj.data[O].vencido;
        canceladosOJT = obj.data[O].declina;
        completoOJT = obj.data[O].finalizado;
        sumaOJT = obj.data[O].finalizado + obj.data[O].confirmar +obj.data[O].proceso +obj.data[O].vencido+ obj.data[O].declina;
    }

    $("#confirmaOJT").html(confirmaOJT);
    $("#programadosOJT").html(programadosOJT);
    $("#canceladosOJT").html(canceladosOJT);
    $("#completosOJT").html(completoOJT);
    $("#notiOJT").html(confirmaOJT);
    $("#notpendOJT").html(confirmaOJT);
    $("#vencidosOJT").html(venciOJT);
    $("#sumacurOJT").html(sumaOJT);
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirma + ' notificaciones.</b>';
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' cursos que confirmar.';

});

function evaojt(ideval){
    
    $.ajax({
        url:'../php/conproojt.php',
        type:'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var a = 0;
        for (A = 0; A < res.length; A++) { 
            if (obj.data[A].id_proojt == ideval){
                //alert(ideval);
                datos = 
                obj.data[A].gstCatgr + '*' +
                obj.data[A].comision + '*' +
                obj.data[A].ojt_principal    + '*' +
                obj.data[A].feini_comision    + '*' +
                obj.data[A].lugar  + '*' +
                obj.data[A].id_proojt  + '*' +
                obj.data[A].ojt_subtarea;    
                var d = datos.split("*");   
                $("#modal-evaluOJT #especOJTreac").val(d[0]);   
                $("#modal-evaluOJT #comisionOJTrec").val(d[1]);            
                $("#modal-evaluOJT #tareprinOJTrec").val(d[2]);
                $("#modal-evaluOJT #fecOJTreac").val(d[3]);
                $("#modal-evaluOJT #lugOJTreac").val(d[4]);
                $("#modal-evaluOJT #idregevalOJT").val(d[5]);
                $("#modal-evaluOJT #subtareOJtreac").val(d[6]);

                html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th><label style="font-size:16px">NOMBRE DE LAS/LOS INSTRUCTORAS/ES:</label></th>';
                
                   
                html += '</table>';
                $("#id_instructOJ").html(html);
            }
        }
    });
    //LLENADO DE TABLA DE INSTRUCTOR Y COORDINADOR
}

//TODO EVALUACIÓN OJT 
function evaluarOJT1(idojt) {
    var idojt = document.getElementById('idregevalOJT').value; //ID OJT 
    //alert(idojt);
    var preg1 = $('input[name=preg1]:checked').val(); //  -
    var preg2 = $('input[name=preg2]:checked').val(); //    -
    var preg3 = $('input[name=preg3]:checked').val(); //      -
    var preg4 = $('input[name=preg4]:checked').val(); //        -
    var preg5 = $('input[name=preg5]:checked').val(); //          -
    var preg6 = $('input[name=preg6]:checked').val(); //            -
    var preg7 = $('input[name=preg7]:checked').val(); //             - PREGUNTAS RADIO
    var preg8 = $('input[name=preg8]:checked').val(); //            -
    var preg9 = $('input[name=preg9]:checked').val(); //          -
    var preg10 = $('input[name=preg10]:checked').val(); //      -
    var preg11 = $('input[name=preg11]:checked').val(); //     -    
    var preg12 = $('input[name=preg12]:checked').val(); //   -   
    var preg13 = $('input[name=preg13]:checked').val(); //  -
    var preg14 = $('input[name=preg14]:checked').val(); //-
    
    var preg15 = document.getElementById('preg15').value; //PREGUNTA ABIERTA 
    var preg16 = document.getElementById('preg16').value; //PREGUNTA ABIERTA 
    var preg17 = document.getElementById('preg17').value; //PREGUNTA ABIERTA 
    var comision = document.getElementById('comisionOJTrec').value; //PREGUNTA ABIERTA 

    datos = 'idojt=' + idojt + '&preg1=' + preg1 + '&preg2=' + preg2 + '&preg3=' + preg3 + '&preg4=' + preg4 + '&preg5=' + preg5 + '&preg6=' + preg6 + '&preg7=' + preg7 + '&preg8=' + preg8 + '&preg9=' + preg9 + '&preg10=' + preg10 + '&preg11=' + preg11 + '&preg12=' + preg12 + '&preg13=' + preg13 + '&preg14=' + preg14 + '&preg15=' + preg15 + '&preg16=' + preg16 + '&preg17=' + preg17 + '&comision=' + comision + '&opcion=addevalojt';

    if (idojt == '' || !document.querySelector('input[name=preg1]:checked') || !document.querySelector('input[name=preg2]:checked') || !document.querySelector('input[name=preg3]:checked') || !document.querySelector('input[name=preg4]:checked') || !document.querySelector('input[name=preg5]:checked') || !document.querySelector('input[name=preg6]:checked') || !document.querySelector('input[name=preg7]:checked') || !document.querySelector('input[name=preg8]:checked') || !document.querySelector('input[name=preg9]:checked') || !document.querySelector('input[name=preg10]:checked') || !document.querySelector('input[name=preg11]:checked') || !document.querySelector('input[name=preg12]:checked') || !document.querySelector('input[name=preg13]:checked') || !document.querySelector('input[name=preg14]:checked') || preg15 == '' || preg16 == '' || preg17 == '') {

        if (!document.querySelector('input[name=preg1]:checked')) { $('#span1').show('toggle'); } else { $('#span1').hide('toggle'); }
        if (!document.querySelector('input[name=preg2]:checked')) { $('#span2').show('toggle'); } else { $('#span2').hide('toggle'); }
        if (!document.querySelector('input[name=preg3]:checked')) { $('#span3').show('toggle'); } else { $('#span3').hide('toggle'); }
        if (!document.querySelector('input[name=preg4]:checked')) { $('#span4').show('toggle'); } else { $('#span4').hide('toggle'); }
        if (!document.querySelector('input[name=preg5]:checked')) { $('#span5').show('toggle'); } else { $('#span5').hide('toggle'); }
        if (!document.querySelector('input[name=preg6]:checked')) { $('#span6').show('toggle'); } else { $('#span6').hide('toggle'); }
        if (!document.querySelector('input[name=preg7]:checked')) { $('#span7').show('toggle'); } else { $('#span7').hide('toggle'); }
        if (!document.querySelector('input[name=preg8]:checked')) { $('#span8').show('toggle'); } else { $('#span8').hide('toggle'); }
        if (!document.querySelector('input[name=preg9]:checked')) { $('#span9').show('toggle'); } else { $('#span9').hide('toggle'); }
        if (!document.querySelector('input[name=preg10]:checked')) { $('#span10').show('toggle'); } else { $('#span10').hide('toggle'); }
        if (!document.querySelector('input[name=preg11]:checked')) { $('#span11').show('toggle'); } else { $('#span11').hide('toggle'); }
        if (!document.querySelector('input[name=preg12]:checked')) { $('#span12').show('toggle'); } else { $('#span12').hide('toggle'); }
        if (!document.querySelector('input[name=preg13]:checked')) { $('#span13').show('toggle'); } else { $('#span13').hide('toggle'); }
        if (!document.querySelector('input[name=preg14]:checked')) { $('#span14').show('toggle'); } else { $('#span14').hide('toggle'); }
        if (preg15 == '') { $('#span13').show('toggle'); } else { $('#span15').hide('toggle'); }
        if (preg16 == '') { $('#span16').show('toggle'); } else { $('#span16').hide('toggle'); }
        if (preg17 == '') { $('#span17').show('toggle'); } else { $('#span17').hide('toggle'); }

        $('#pregunta').toggle('toggle');
        setTimeout(function() { $('#pregunta').toggle('toggle'); }, 2000);
    }else{

        $.ajax({
            url: '../php/reaccion.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    text: 'SE EVALUO CON EXITO EL ENTRENAMIENTO OJT',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'ojtprogramados';", 3000);

            } else if (respuesta == 2) {
                $('#aviso').toggle('toggle');
                setTimeout(function() {
                    $('#aviso').toggle('toggle');
                }, 2000);
            } else {

                $('#peligro').toggle('toggle');
                setTimeout(function() {
                    $('#peligro').toggle('toggle');
                }, 2000);
            }
        });
    }
}

function confirmarojt(idprogram) {
//alert(idprogram)
    $("#data-table-confirmarojt tr").on('click', function() {
        var id_tare = "";
        var id_subtarea = "";
        id_tare += $(this).find('td:eq(0)').html(); //Toma el id de la persona 
        id_subtarea += $(this).find('td:eq(1)').html(); //Toma el id de la persona 
        document.getElementById('ojtarea').innerHTML=id_tare
        document.getElementById('ojtsubtarea').innerHTML=id_subtarea
    }) 
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_proojt == idprogram) {
                var id_coordojtdd=obj.data[i].id_coorojt;
                var id_insojt1=obj.data[i].id_insojt;
                $("#ojnivel").html(obj.data[i].nivel);
                $("#ojfecinic").html(obj.data[i].fec_inioj);
                $("#ojfecfin").html(obj.data[i].fec_finoj);
                $("#id_registrooj1").val(obj.data[i].id_proojt);
                $("#id_personaoj1").val(obj.data[i].id_pers);
               // $("#nombredeclin").html(obj.data[i].gstTitlo);
               // $("#motivod").html('MOTIVO:' + obj.data[i].confirmar);
               // if (obj.data[i].confirmar == 'OTROS') {
                 //   $("#arcpdf").html("<p style='text-align: center;font-size:20px;'>" + obj.data[i].justifi + "</p>");
                //} else {
                  //  $("#arcpdf").html("<a class='btn btn-block btn-social btn-linkedin' href='" + obj.data[i].justifi + "' style='text-align: center;' target='_blanck'> <i class='fa fa-file-pdf-o'></i> VISUALIZAR EL PDF ADJUNTO</a>");
               // }
            }
        }
        html = '<table class="table table-bordered"><tr>';
        x = 0;
        $.ajax({
            url: '../php/conDatosPersonal.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj = JSON.parse(respuesta);
            var res = obj.data;
            var y = 0;
            for (D = 0; D < res.length; D++) { 
                if (obj.data[D].gstIdper == id_coordojt){
                    // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
                    y++;
                    var nombrecoord=obj.data[D].gstNombr;
                    var apellido=obj.data[D].gstApell;
                    html += "<tr><td>" + y + "</td><td>" + nombrecoord + ' ' + apellido + "</td><td>" + 'COORDINADOR' + "</td></tr>";
                }
            }
        html += '</table>';
        $("#coorojt").html(html);
        });
        html1 = '<table class="table table-bordered"><tr>';
        x = 0;   
        $.ajax({
            url: '../php/conDatosPersonal.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj = JSON.parse(respuesta);
            var res = obj.data;
            var a = 0;
            for (A = 0; A < res.length; A++) { 
                if (obj.data[A].gstIdper == id_insojt1){
                    // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
                    a++;
                    var nombreinsoj=obj.data[A].gstNombr;
                    var apellidoins=obj.data[A].gstApell;
                    
                    html1 += "<tr><td>" + a + "</td><td>" + nombreinsoj + ' ' + apellidoins + "</td><td>" + 'INSTRUCTOR' + "</td></tr>";
                }
            
            }
        html1 += '</table>';
        $("#instrucojt").html(html1);
        });
    })
}

$(document).ready(function() {
    $("input[type=radio]").click(function(event) {
        var valor = $(event.target).val();
        if (valor == "NO") {
            $("#noasisojt").show();
            $("#asisteojt").hide();
            $("#confirasojt").hide();
            limCampos();
        } else if (valor == "SI") {
            $("#asisteojt").show();
            $("#confojt").val('CONFIRMADO');
            $("#noasisojt").hide();
            $("#obserojt").hide();
            $("#archivoojt").hide();
            $("#confirasojt").hide();
        }
    });
});

function justificacionojt() {
    var seleccion = document.getElementById('confirojt');
    valor = seleccion.options[seleccion.selectedIndex].value;
    if (valor == 'TRABAJO' || valor == 'ENFERMEDAD') {

        $("#archivoojt").show();
        $("#obserojt").hide();
    } else
    if (valor == 'OTROS') {
        $("#obserojt").show();
        $("#archivoojt").hide();
    }

}
function limCampos() {
    $("#obser").val('');
    $("#archivo").val('');
    $("#conf").val('0');
}
//FUNCION PARA GUARDAR
function confirasictojt() {
  //alert(id_curso);
    var id_curso = document.getElementById('id_registrooj1').value
    var idinsp = document.getElementById('id_personaoj1').value;
    var conf = document.getElementById('confojt').value;

    if (conf == 0) {
        var confir = document.getElementById('confirojt').value;
        if (confir == 'OTROS') {
            var justifi = document.getElementById('obserojt').value;
        } else {
            var justifi = document.getElementById('archivoojt').value;
        }
    } else if (conf != 0) {
        var id_curso = document.getElementById('id_registrooj1').value;
        var confir = conf;
        var justifi = 0;
    }
    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('archivo', $('#archivoojt')[0].files[0]);
    paqueteDeDatos.append('confir', confir);
    paqueteDeDatos.append('justifi', justifi);
    paqueteDeDatos.append('id_curso', id_curso);
    paqueteDeDatos.append('idinsp', idinsp);

    $.ajax({
        url: '../php/confirmojt.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            console.log(r);
            if (r == 8) {
                $('#vacio').toggle('toggle');
                setTimeout(function() {
                    $('#vacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SU RESPUESTA FUE ENVIADA CON EXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'ojtprogramados';", 2000);        

                $('#vacia').show('slow');
                $('#agrega').hide();

            } else if (r == 1) {
                $('#falla').toggle('toggle');
                setTimeout(function() {
                    $('#falla').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error').toggle('toggle');
                setTimeout(function() {
                    $('#error').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom').toggle('toggle');
                setTimeout(function() {
                    $('#renom').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn').toggle('toggle');
                setTimeout(function() {
                    $('#forn').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido').toggle('toggle');
                setTimeout(function() {
                    $('#repetido').toggle('toggle');
                }, 4000);
            }
        }
    });
}
//FUNCIÓN PARA TRAER EL DETALLE DEL ENTRENAMOENTO OJT
function inforenojt(idresgistro){

    var asistencia = document.getElementById('asisdetalleojt');
    //alert(idresgistro);
    $.ajax({
        url:'../php/conproojt.php',
        type:'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var a = 0;
        for (A = 0; A < res.length; A++) { 
            if (obj.data[A].id_proojt == idresgistro){
                //alert(ideval);
                datos = 
                obj.data[A].comision + '*' +
                obj.data[A].feini_comision + '*' +
                obj.data[A].ojt_principal + '*' +
                obj.data[A].ojt_subtarea + '*' +
                obj.data[A].lugar + '*' +
                obj.data[A].id_proojt + '*' +
                obj.data[A].ojt_subtarea + '*' +
                obj.data[A].fec_inioj + '*' +
                obj.data[A].fec_finoj + '*' +
                obj.data[A].fecfin_comision;    
                var d = datos.split("*");   
                $("#modal-detalleojt #gstcomision").html(d[0]);   
                $("#modal-detalleojt #fcurso1ojt").html(d[1]);               
                $("#modal-detalleojt #tareprinOJTinf").val(d[2]);
                $("#modal-detalleojt #subtareOJtreacinf").val(d[3]);
                $("#modal-detalleojt #lugOJTreac").val(d[4]);
                $("#modal-detalleojt #idregevalOJT").val(d[5]);
                $("#modal-detalleojt #subtareOJtreac").val(d[6]);
                $("#modal-detalleojt #finiojttar").html(d[7]);
                $("#modal-detalleojt #fifinojttar").html(d[8]);
                $("#modal-detalleojt #fin1ojt").html(d[9]);

                if (obj.data[A].confirojt == 'CONFIRMADO'){
                    asistencia.style.display='';
                }             
            }
        }
    });
}
//FUNCION DE MARCAR TODOS LOS INPUTS DE SUBTAREAS
function marcarojt(source) {
    checkboxes = document.getElementsByName('ojtname[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }  
}
//FUNCION PARA GUARDAR TEMPORALMENTE LAS SUBTAREAS
function insersubt() {
    //alert("entraguaradar");
    var arr = new Array();
    $("input[name='ojtname[]']:checked").each(function() {
        arr.push($(this).val());
    });
   // alert(arr);
    var isSpc = document.getElementById('isSpc').value;
    var idInspct = document.getElementById('idInspct').value;
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var coordinador = document.getElementById('coordinador').value;
    var instructor = document.getElementById('instructor').value;
    var nivel = document.getElementById('idnivel').value;
    var ubicacion = document.getElementById('uboj').value;
    var lugar = document.getElementById('addubic').value;
    var sede = document.getElementById('addsede').value;
    var comision = document.getElementById('comision').value;
    var fecincicomi = document.getElementById('comfecini').value;
    var fecfincomi = document.getElementById('comfecfin').value;
    var tareaprin = document.getElementById('tareaprin').value;
    //var idsubtarea = id_subojt;
    var idtarea = '1';
    var datos = 'isSpc=' + isSpc + '&idInspct=' + idInspct + '&fechaInicio=' + fechaInicio +
    '&fechaTermino=' + fechaTermino + '&coordinador=' + coordinador + '&instructor=' + instructor + '&nivel=' +
    nivel + '&ubicacion=' + ubicacion + '&lugar=' + lugar + '&sede=' + sede + '&comision=' + comision +
    '&fecincicomi=' + fecincicomi + '&fecfincomi=' + fecfincomi + '&tareaprin=' + tareaprin + '&arr=' + arr +
    '&opcion=regisojtemp';
    
    if (nivel == ''||fecincicomi == ''||fecfincomi == ''||isSpc==''||ubicacion==''||comision =='') {
        Swal.fire({
        type: 'info',
        text: 'LLENE LOS CAMPOS OBLIGATORIOS(*)',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
    return;
}else{
    //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
    $.ajax({
        type: "POST",
        url: "../php/insertOJT.php",
        data: datos
    }).done(function(respuesta) {
    if (respuesta == 0) {
        //SE MUESTRA EL BOTON DE VALIDACIÓN  
        Swal.fire({
            type: 'success',
            text: 'SE GUARDO CON EXITO LA PROGRAMACIÓN',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 3000
        });
        $('#detalleSub3').modal('hide');
    }else if (respuesta == 2) {
        Swal.fire({
        type: 'info',
        text: 'YA SE ENCUENTRA PROGRAMADA ESTA SUBTAREA A ESTE INSPECTOR',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
}else{
    alert("error");
    Swal.fire({
        type: 'info',
        text: 'YA SE ENCUENTRA PROGRAMADA ALGUNA SUBTAREA SI PERCISTE CONTACTAR A SOPORTE TECNICO',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
    
}
}); //FIN DE AJAX
}

}

function insersubt2(){
    //alert("pruebsass");
    var isSpc = document.getElementById('isSpc').value;
    var idInspct = document.getElementById('idInspct').value;
    var fecincicomi = document.getElementById('comfecini').value;
    var fecfincomi = document.getElementById('comfecfin').value;
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var coordinador = document.getElementById('coordinador').value;
    var instructor = document.getElementById('instructor').value;
    var nivel = document.getElementById('idnivel').value;
    var ubicacion = document.getElementById('uboj').value;
    var lugar = document.getElementById('addubic').value;
    var sede = document.getElementById('addsede').value;
    var comision = document.getElementById('comision').value;
    var idtarea = document.getElementById('tareaprinhora').value;
    var idsubtarea = document.getElementById('subtarehora').value;
    var datos = 'isSpc=' + isSpc + '&idtarea=' + idtarea + '&idInspct=' + idInspct + '&fechaInicio=' + fechaInicio +
    '&fechaTermino=' + fechaTermino + '&coordinador=' + coordinador + '&instructor=' + instructor + '&nivel=' +
    nivel + '&ubicacion=' + ubicacion + '&lugar=' + lugar + '&sede=' + sede + '&comision=' + comision +
    '&fecincicomi=' + fecincicomi + '&fecfincomi=' + fecfincomi + '&idsubtarea=' + idsubtarea +
    '&opcion=registraroj1';
        if (fecincicomi == ''||fecfincomi == ''||comision == ''||nivel == '') {
            Swal.fire({
                type: 'info',
                text: 'LLENE LOS CAMPOS OBLIGATORIOS(*)',
                timer: 2000,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
            return;
        }else{
            //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
            $.ajax({
                type: "POST",
                url: "../php/insertOJT.php",
                data: datos
            }).done(function(respuesta) {
                if (respuesta == 0) {
                    Swal.fire({
                        type: 'success',
                        text: 'SE GUARDO CON EXITO LA PROGRAMACIÓN',
                        showConfirmButton: false,
                        customClass: 'swal-wide',
                        timer: 3000
                    });
                   // $('#detalleSub3').modal('hide');
                }else if (respuesta == 2) {
                    Swal.fire({
                        type: 'info',
                        text: 'YA SE ENCUENTRA PROGRAMADA ESTA SUBTAREA A ESTE INSPECTOR',
                        timer: 2000,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                    });
                }else{
                    alert("error");
                    Swal.fire({
                        type: 'info',
                        text: 'YA SE ENCUENTRA PROGRAMADA ALGUNA SUBTAREA SI PERCISTE CONTACTAR A SOPORTE TECNICO',
                        timer: 2000,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                    });
                }
            }); //FIN DE AJAX
        }
}
//FUNCION BOTÓN FINALIZAR
function regOjtfin(){ 
    //alert("pruebsass");
    var tinst = ''

    var selectObject = document.getElementById("instructor");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            tinst += ',' + selectObject.options[i].value;

        }
    }
    var campo = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="campo[]"]').each(function(element) {
        var item = {};
        item.campo = this.value;
        campo.push(item);
    });

    var array = JSON.stringify(campo);

    gstinstruojt = tinst.substr(1);

    var instructor = gstinstruojt;
alert(instructor);

    var isSpc = document.getElementById('isSpc').value;
    var idInspct = document.getElementById('idInspct').value;
    var fecincicomi = document.getElementById('comfecini').value;
    var fecfincomi = document.getElementById('comfecfin').value;
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var coordinador = document.getElementById('coordinador').value;
    //var instructor = document.getElementById('instructor').value;
    var nivel = document.getElementById('idnivel').value;
    var ubicacion = document.getElementById('uboj').value;
    var lugar = document.getElementById('addubic').value;
    var sede = document.getElementById('addsede').value;
    var comision = document.getElementById('comision').value;
    var idtarea = document.getElementById('tareaprinhora').value;
    var idsubtarea = document.getElementById('subtarehora').value;
    var datos = 'isSpc=' + isSpc + '&idtarea=' + idtarea + '&idInspct=' + idInspct + '&fechaInicio=' + fechaInicio +
    '&fechaTermino=' + fechaTermino + '&coordinador=' + coordinador + '&instructor=' + instructor + '&nivel=' +
    nivel + '&ubicacion=' + ubicacion + '&lugar=' + lugar + '&sede=' + sede + '&comision=' + comision +
    '&fecincicomi=' + fecincicomi + '&fecfincomi=' + fecfincomi + '&idsubtarea=' + idsubtarea +
    '&opcion=finojtpro1';
    //alert(datos);
    if (fecincicomi == ''||fecfincomi == ''||comision == ''||nivel == ''||coordinador == ''||instructor == ''||idInspct == '') {
        Swal.fire({
        type: 'info',
        text: 'LLENE LOS CAMPOS OBLIGATORIOS(*)',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
    return;
}else{
    //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
    $.ajax({
        type: "POST",
        url: "../php/insertOJT.php",
        data: datos
    }).done(function(respuesta) {
    if (respuesta == 0) {
        //SE MUESTRA EL BOTON DE VALIDACIÓN  
        Swal.fire({
            type: 'success',
            text: 'SE GUARDO CON EXITO LA PROGRAMACIÓN',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 3000
        });
        setTimeout("location.href = 'catalogoOJT';", 2000);
    }else if (respuesta == 2) {
        Swal.fire({
        type: 'info',
        text: 'EL INSPECTOR YA SE ENCUENTRA PROGRAMADO EN UN CURSO CON ESTE PERIODO DE FECHA',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
}else{
    //alert("error");
    Swal.fire({
        type: 'info',
        text: 'ERROR CONTACTAR A SOPORTE TECNICO',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
}
}); //FIN DE AJAX
}
    
}

//NUEVA FUNCION PARA 
function prohorario(datos){
    //alert(datos);
    var a = datos.split("*");
    id_tarea = a[0];
    id_subojt = a[1];
    id_namesub = a[2];
    document.getElementById('tareaprinhora').value=id_tarea;
    document.getElementById('subtarehora').value=id_subojt;
    document.getElementById('namesubtare').value=id_namesub;
}


//función para que
function ageg2(dato) {
    // alert(dato);
    var a = dato.split("*");
    id_subojt = a[1];
    id_tarea = a[0];
    //alert(id_tarea);
    var isSpc = document.getElementById('isSpc').value;
    var idInspct = document.getElementById('idInspct').value;
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var coordinador = document.getElementById('coordinador').value;
    var instructor = document.getElementById('instructor').value;
    var nivel = document.getElementById('idnivel').value;
    var ubicacion = document.getElementById('uboj').value;
    var lugar = document.getElementById('addubic').value;
    var sede = document.getElementById('addsede').value;
    var comision = document.getElementById('comision').value;
    var fecincicomi = document.getElementById('comfecini').value;
    var fecfincomi = document.getElementById('comfecfin').value;
    var idsubtarea = id_subojt;
    var idtarea = id_tarea;
    var datos = 'isSpc=' + isSpc + '&idtarea=' + idtarea + '&idInspct=' + idInspct + '&fechaInicio=' + fechaInicio +
    '&fechaTermino=' + fechaTermino + '&coordinador=' + coordinador + '&instructor=' + instructor + '&nivel=' +
    nivel + '&ubicacion=' + ubicacion + '&lugar=' + lugar + '&sede=' + sede + '&comision=' + comision +
    '&fecincicomi=' + fecincicomi + '&fecfincomi=' + fecfincomi + '&idsubtarea=' + idsubtarea +
    '&opcion=registraroj';
    //alert(datos)
    //VALIDA QUE LOS CAMPOS D   EBEN DE ESTAR LLENOS PARA AGREGAR LA TAREA
    if (isSpc == '' || idInspct == '' || fechaInicio == '' || fechaTermino == '' || coordinador == '' || instructor ==
    '' || nivel == '') {
        Swal.fire({
        type: 'info',
        text: 'LLENE LOS CAMPOS OBLIGATORIOS(*)',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
    return;
}else{
    //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
    $.ajax({
        type: "POST",
        url: "../php/insertOJT.php",
        data: datos
    }).done(function(respuesta) {
    if (respuesta == 0) {
        //SE MUESTRA EL BOTON DE VALIDACIÓN  
        $("#" + id_subojt + "ocultar").hide();
        $("#" + id_subojt + "mostrar").show();
        document.getElementById(id_subojt).disabled = false;
    }else if (respuesta == 2) {
        Swal.fire({
        type: 'info',
        text: 'YA SE ENCUENTRA PROGRAMADA ESTA SUBTAREA A ESTE INSPECTOR',
        timer: 2000,
        customClass: 'swal-wide',
        showConfirmButton: false,
    });
}else{}
}); //FIN DE AJAX
}
}
//FUNCION PARA BLOQUEAR FECHA DE FIN DE COMISION
function bloqueoojt(){
    var fechamin=document.getElementById('comfecini').value;
    let mindate= document.getElementById('comfecfin');
    mindate.min = fechamin;
}

function closeojtmod(){
    $('#detalleSub3').modal('hide');

}
//FUNCION PARA BLOQUEAR PERIODO DE TIEMPO DE A TAREA EN BASE A LA COMISION
function blodatetarea(){
    //alert("kmdkc");
    var fecmintarea=document.getElementById('comfecini').value;
    var fecmaxtarea=document.getElementById('comfecfin').value;
    //FECHA INICIO TAREA
    let mindatetarea= document.getElementById('fechaInicio');
    mindatetarea.min = fecmintarea + 'T08:30';
    mindatetarea.max = fecmaxtarea + 'T08:30';
    //FECHA FIN TAREA
    let findaetarea= document.getElementById('fechaTermino');
    findaetarea.min = fecmintarea + 'T08:30';
    findaetarea.max = fecmaxtarea + 'T08:30';
}
//FUNCION QUE BLOQUEA EL PEDIO DE TIEMPO DE LAS TAREAS CON BASE A LA COMISION
function traerdatos(){
    //alert("kmdkc");
    var fecmintarea=document.getElementById('comfecini').value;
    var fecmaxtarea=document.getElementById('comfecfin').value;
    //FECHA INICIO TAREA
    let mindatetarea= document.getElementById('fechaInicio');
    mindatetarea.min = fecmintarea + 'T08:30';
    mindatetarea.max = fecmaxtarea + 'T08:30';
    //FECHA FIN TAREA
    let findaetarea= document.getElementById('fechaTermino');
    findaetarea.min = fecmintarea + 'T08:30';
    findaetarea.max = fecmaxtarea + 'T08:30';
}
//FUNCION QUE TRAE EL DETALLE DE UN ENTRENAMIENTO OJT DECLINADO
function infdecOJT(iddelinaojt){
   // alert(iddelinaojt);
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].id_proojt == iddelinaojt){
                datos = 
                obj.data[U].ojt_principal + '*' +
                obj.data[U].ojt_subtarea + '*' +
                obj.data[U].confirojt;    
                var d = datos.split("*");   
                //$("#modal-nosurtido #arsurvof").val(d[0]);   
                $("#nombredeclinOJT").html('TAREA: ' + d[0]);        
                $("#subtars1OJT").html('SUBTAREA: ' + d[1]);    
                $("#modal-declinadoOJT #motivodOJT").html('MOTIVO: ' + d[2]);

                if (obj.data[U].confirojt == 'OTROS') {
                    $("#arcpdfOJT").html("<p style='text-align: center;font-size:20px;'>" + obj.data[U].justifojt + "</p>");
                } else {
                    $("#arcpdfOJT").html("<a class='btn btn-block btn-social btn-linkedin' href='" + obj.data[U].justifojt + "' style='text-align: center;' target='_blanck'> <i class='fa fa-file-pdf-o'></i> VISUALIZAR EL PDF ADJUNTO</a>");
                }

            }
        }
    });
}







