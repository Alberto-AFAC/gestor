function vergenercerf() {
    var id_persona = document.getElementById('idinsevc1').value; //ID DE LA PERSONA
    var id_codigocurso = document.getElementById('id_cursoc').value; //ID DE LA PERSONA
    var listregis = $('input[id=check2c]:checked').val(); // LISTA DE REGISTRO
    var lisasisten = $('input[id=check3c]:checked').val(); // LISTA DE ASISTENCIA
    var listreportein = $('input[id=check4c]:checked').val(); // REPORTES DE INCIDENCIAS
    var cartdescrip = $('input[id=check5c]:checked').val(); // CARTAS DESCRIPTIVAS
    var regponde = $('input[id=check7c]:checked').val(); // REGISTRO DE PONDERACIÓN
    var infinal = $('input[id=check8c]:checked').val(); // INFORME FINAL
    var evreaccion = $('input[id=check9c]:checked').val(); // EVALUACIÓN DE REACCIÓN
    var nom1 = document.getElementById('evaNombrc'); //che1  evaNombrc;
    var copias = document.getElementById('copnum'); //che1  evaNombrc;

    datos = 'id_persona=' + id_persona + '&id_codigocurso=' + id_codigocurso + '&listregis=' + listregis + '&lisasisten=' + lisasisten + '&listreportein=' + listreportein + '&cartdescrip=' + cartdescrip + '&regponde=' + regponde + '&infinal=' + infinal + '&evreaccion=' + evreaccion + '&copias=' + copias + '&opcion=alrcertific';
    // alert(datos);
    if (nom1 == '') {
        $('#ceravisos').toggle('toggle');
        setTimeout(function() {
            $('#ceravisos').toggle('toggle');
        }, 2000);
        return;

    } else {

        $.ajax({
            url: '../php/gecerticados.php',
            type: 'POST',
            async: true,
            data: datos
        }).done(function(respuesta) {
            //console.log(respuesta);
            if (respuesta == 0) {
                Swal.fire({ //ALERTA DE SE GUARDO CORRECTAMENTE
                    type: 'success',
                    title: 'GUARDADO CON ÉXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,

                    backdrop: `
                        rgba(100, 100, 100, 0.4)
                    `
                });
                $('#modal-acreditacion').modal('hide'); // CIERRA EL MODAL
            } else {
                $('#cerdangerev').toggle('toggle');
                setTimeout(function() {
                    $('#cerdangerev').toggle('toggle');
                }, 2000);
            }
        });
    }
}
const Buscares = () => {
    const trs = document.querySelectorAll('#reacc tr:not(.header)');
    const filter = document.querySelector('#buscador').value;
    const regex = new RegExp(filter, 'i');
    const isFoundInTds = (td) => regex.test(td.innerHTML);
    const isFound = (childrenArr) => childrenArr.some(isFoundInTds);
    const setTrStyleDisplay = ({ style, children }) => {
        style.display = isFound([...children]) ? '' : 'none';
    };

    trs.forEach(setTrStyleDisplay);
};

function imprimir() {

    gstIdlsc = document.getElementById('gstIdlstc').value;
    gstTitulo = document.getElementById('gstTitulo').value;

    $.ajax({
        url: '../php/listapdf.php',
        type: 'POST',
        data: 'gstIdlsc=' + gstIdlsc + '&gstTitulo=' + gstTitulo
    }).done(function(data) {
        //alert(data);
        /*Swal.fire({
            type: 'success',
            title: 'ENVIADO CON ÉXITO',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 2000,
            backdrop: `
                rgba(100, 100, 100, 0.4)
            `
        });
        setTimeout("location.href = '../php/listapdf.php';", 1000);  */
    });



}
//TODO EVALUACIN
function evaluar() {
    //alert("fkeofkef")
    var idcursoen = document.getElementById('idcursoen').value; //ID CURSO 
    var preg1 = $('input[name=preg1]:checked').val(); //-
    var preg2 = $('input[name=preg2]:checked').val(); // -
    var preg3 = $('input[name=preg3]:checked').val(); //  -
    var preg4 = $('input[name=preg4]:checked').val(); //   -
    var preg5 = $('input[name=preg5]:checked').val(); //    -
    var preg6 = $('input[name=preg6]:checked').val(); //     -
    var preg7 = $('input[name=preg7]:checked').val(); //      - 
    var preg8 = $('input[name=preg8]:checked').val(); //       -
    var preg9 = $('input[name=preg9]:checked').val(); //        -
    var preg10 = $('input[name=preg10]:checked').val(); //       -
    var preg11 = $('input[name=preg11]:checked').val(); //        -    
    var preg12 = $('input[name=preg12]:checked').val(); //         -   PREGUNTAS RADIO
    var preg13 = $('input[name=preg13]:checked').val(); //         -
    var preg14 = $('input[name=preg14]:checked').val(); //        -
    var preg15 = $('input[name=preg15]:checked').val(); //       -
    var preg16 = $('input[name=preg16]:checked').val(); //      -
    var preg17 = $('input[name=preg17]:checked').val(); //     -
    var preg18 = $('input[name=preg18]:checked').val(); //    -
    var preg19 = $('input[name=preg19]:checked').val(); //   -
    var preg20 = $('input[name=preg20]:checked').val(); //  -
    var preg21 = $('input[name=preg21]:checked').val(); // -
    var preg22 = $('input[name=preg22]:checked').val(); //-
    var preg23 = $('input[name=preg23]:checked').val(); //-


    var preg24 = document.getElementById('preg24').value; //PREGUNTA ABIERTA 
    var preg25 = document.getElementById('preg25').value; //PREGUNTA ABIERTA 



    var preg26 = $('input[name=preg26]:checked').val(); //PREGUNTAS RADIO 
    if ($('input[name=preg26]:checked').val() == 'OTROS') {

        preg14 = document.getElementById('otro').value;

    }

    var preg27 = document.getElementById('preg27').value; //PREGUNTA ABIERTA (comentarios)

    var id_instruct = document.getElementById('id_instruct').value; //PREGUNTA ABIERTA (comentarios)

    //var preg15 = $('input[name=preg15]:checked').val(); //PREGUNTAS RADIO



    datos = 'idcursoen=' + idcursoen + '&preg1=' + preg1 + '&preg2=' + preg2 + '&preg3=' + preg3 + '&preg4=' + preg4 + '&preg5=' + preg5 + '&preg6=' + preg6 + '&preg7=' + preg7 + '&preg8=' + preg8 + '&preg9=' + preg9 + '&preg10=' + preg10 + '&preg11=' + preg11 + '&preg12=' + preg12 + '&preg13=' + preg13 + '&preg14=' + preg14 + '&preg15=' + preg15 + '&preg16=' + preg16 + '&preg17=' + preg17 + '&preg18=' + preg18 + '&preg19=' + preg19 + '&preg20=' + preg20 + '&preg21=' + preg21 + '&preg22=' + preg22 + '&preg23=' + preg23 + '&preg24=' + preg24 + '&preg25=' + preg25 + '&preg26=' + preg26 + '&preg27=' + preg27 + '&id_instruct=' + id_instruct + '&opcion=agreaccion';


    if (idcursoen == '' || !document.querySelector('input[name=preg1]:checked') || !document.querySelector('input[name=preg2]:checked') || !document.querySelector('input[name=preg3]:checked') || !document.querySelector('input[name=preg4]:checked') || !document.querySelector('input[name=preg5]:checked') || !document.querySelector('input[name=preg6]:checked') || !document.querySelector('input[name=preg7]:checked') || !document.querySelector('input[name=preg8]:checked') || !document.querySelector('input[name=preg9]:checked') || !document.querySelector('input[name=preg10]:checked') || !document.querySelector('input[name=preg11]:checked') || !document.querySelector('input[name=preg12]:checked') || !document.querySelector('input[name=preg13]:checked') || !document.querySelector('input[name=preg14]:checked') || !document.querySelector('input[name=preg15]:checked') || !document.querySelector('input[name=preg16]:checked') || !document.querySelector('input[name=preg17]:checked') || !document.querySelector('input[name=preg18]:checked') || !document.querySelector('input[name=preg19]:checked') || !document.querySelector('input[name=preg20]:checked') || !document.querySelector('input[name=preg21]:checked') || !document.querySelector('input[name=preg22]:checked') || !document.querySelector('input[name=preg23]:checked') || preg24 == '' || preg25 == '' || !document.querySelector('input[name=preg26]:checked') || preg27 == '') {

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
        if (preg13 == '') { $('#span13').show('toggle'); } else { $('#span13').hide('toggle'); }
        if (!document.querySelector('input[name=preg14]:checked')) { $('#span14').show('toggle'); } else { $('#span14').hide('toggle'); }
        if (!document.querySelector('input[name=preg15]:checked')) { $('#span15').show('toggle'); } else { $('#span15').hide('toggle'); }
        if (preg16 == '') { $('#span16').show('toggle'); } else { $('#span16').hide('toggle'); }

        $('#pregunta').toggle('toggle');
        setTimeout(function() { $('#pregunta').toggle('toggle'); }, 2000);




    } else {

        $.ajax({
            url: '../php/reaccion.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {


                // $('#enviadoexito').toggle('toggle');
                // setTimeout(function() {
                //     $('#enviadoexito').toggle('toggle');
                // }, 2000);

                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SE EVALUO CON EXITO EL CURSO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'inspector';", 3000);

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
//CERTIFICADO
function certificado() {
    var pdf = new jsPDF("landscape");
    pdf.setFontSize(10)
        // pdf.setFontType('bold')
        // pdf.text(15, 20, 'LISTA TECNICA DE PARTICIPANTES')
        // pdf.text(15, 35, 'CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACION CIVIL'
    var logo = new Image();
    logo.src = '../dist/img/certificado.png';
    pdf.addImage(logo, 'PNG', 0, 0, 300, 210);

    /* FUNCIÓN PARA CREAR EL PIE DE PAGINA*/
    const pageCount = pdf.internal.getNumberOfPages();
    for (var i = 1; i <= pageCount; i++) {
        pdf.setFontSize(8)
        pdf.setPage(i);
        pdf.text('Página ' + String(i) + ' de ' + String(pageCount), 220 - 20, 320 - 30, null, null,
            "right");
    }


    window.open(pdf.output('bloburl'))

}

function openCurso() {
    $("#detCurso").toggle(250); //Muestra contenedor 
    $("#listCurso").toggle("fast"); //Oculta lista

}

function closeCurso() {
    $("#listCurso").toggle(250); //Muestra lista  
    $("#detCurso").toggle("fast"); //Oculta contenedor


}

function agrPartc() {

    idinsp = document.getElementById('idinsp').value;
    gstIdlsc = document.getElementById('gstIdlsc').value;

    idcord = document.getElementById('idcord').value;
    finicio = document.getElementById('finicio').value;
    finalf = document.getElementById('finalf').value;
    hrcurs = document.getElementById('hrcurs').value;
    sede = document.getElementById('sede').value;
    modalidad = document.getElementById('modalidad').value;
    link = document.getElementById('linke').value;
    acodigos = document.getElementById('acodigos').value;
    contracur = document.getElementById('contracur').value;
    classroom = document.getElementById('classroom').value;
    datos = 'idinsp=' + idinsp + '&acodigos=' + acodigos + '&gstIdlsc=' + gstIdlsc + '&idcord=' + idcord + '&finicio=' + finicio + '&finalf=' + finalf + '&hrcurs=' + hrcurs + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&contracur=' + contracur + '&classroom=' + classroom + '&opcion=participante';
    //alert(datos);
    if (idcord == '' || acodigos == '' || idinsp == '' || gstIdlsc == '' || hrcurs == '' || finalf == '' || sede == '' || modalidad == '' || link == '' || finalf == '' || contracur == '' || classromcur == '') {

        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            //alert(respuesta);
            console.log(respuesta);

            if (respuesta == 0) {
                $('#succe').toggle('toggle');
                setTimeout(function() {
                    $('#succe').toggle('toggle');
                }, 2000);

            } else {
                $('#danger').toggle('toggle');
                setTimeout(function() {
                    $('#danger').toggle('toggle');
                }, 2000);
            }
        });
    }

}

function eliminar(cursos) {

    var d = cursos.split("*");

    $("#modal-eliminar #gstIdlsc").val(d[0]);
    $("#modal-eliminar #gstTitlo").val(d[1]);

}


//CANCELAR DE CURSOS PROGRAMADOS
function canCurso() {

    var codigos = document.getElementById('codigos').value;

    //alert(codigos);
    if (codigos == '') {

        $('#emptyy').toggle('toggle');
        setTimeout(function() {
            $('#emptyy').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regCurso.php',
            type: 'POST',
            data: 'codigos=' + codigos + '&opcion=canCurso'
        }).done(function(respuesta) {
            // alert(respuesta);
            if (respuesta == 0) {
                $('#succes').toggle('toggle');
                setTimeout(function() {
                    $('#succes').toggle('toggle');
                    location.href = 'lisCurso';
                }, 1500);
            } else {
                $('#dangere').toggle('toggle');
                setTimeout(function() {
                    $('#dangere').toggle('toggle');
                }, 2000);
            }
        });
    }
}
////////////ELIMINAR INSPECTOR////////////////

function elInspt() {

    idInsp = document.getElementById('idInspt').value;
    codInsp = document.getElementById('codInsp').value;

    if (codInsp == '' || idInsp == '') {

        $('#emptyy1').toggle('toggle');
        setTimeout(function() {
            $('#emptyy1').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regCurso.php',
            type: 'POST',
            data: 'idInsp=' + idInsp + '&opcion=eliInsp'
        }).done(function(respuesta) {
            // alert(respuesta);
            if (respuesta == 0) {
                $('#succes1').toggle('toggle');
                setTimeout(function() {
                    $('#succes1').toggle('toggle');
                    //location.href = 'lisCurso';
                }, 1500);
                idcurso(codInsp);
            } else {
                $('#dangere1').toggle('toggle');
                setTimeout(function() {
                    $('#dangere1').toggle('toggle');
                }, 2000);
            }
        });
    }
}

//ELIMINAR DE CATALOGO DE CURSOS
function eliCurso() {

    var EgstIdlsc = document.getElementById('EgstIdlsc').value;

    //alert(EgstIdlsc);
    if (EgstIdlsc == '') {

        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regCurso.php',
            type: 'POST',
            data: 'gstIdlsc=' + gstIdlsc + '&opcion=eliCurso'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#succe').toggle('toggle');
                setTimeout(function() {
                    $('#succe').toggle('toggle');
                    location.href = 'lisCurso';
                }, 1500);
            } else {
                $('#danger').toggle('toggle');
                setTimeout(function() {
                    $('#danger').toggle('toggle');
                }, 2000);
            }
        });
    }
}
//RESULTADO DE LA EVALUACIÓN INSPECTOR
function cambiartexto() {
    costOfTicket = document.getElementById("NOE");
    selectedStand = document.getElementById("SIe");
    pendiente = document.getElementById("PE");

    valor2 = document.getElementById('validoev').value; //VALIDACIÓN DE RESULTADO
    if (((valor2) >= 80) && ((valor2) <= 100)) {
        selectedStand.style.display = '';
        costOfTicket.style.display = 'none';
        pendiente.style.display = 'none';
    }
    if (((valor2) < 80) && ((valor2) >= 1)) { //REPROBADO 
        costOfTicket.style.display = '';
        selectedStand.style.display = 'none';
        pendiente.style.display = 'none';

    }
    if (valor2 <= 0) { //PENDIENTE 
        pendiente.style.display = '';
        costOfTicket.style.display = 'none';
        selectedStand.style.display = 'none';

    }
}

function gencerti(cursos) {
    var cer = cursos.split("*");

    //alert(cer[22]);
    $("#evaNombrc").val(cer[14] + " " + cer[15]); //NOMBRE COMPLETO
    $("#idperonc").val(cer[1]); //NOMBRE DEL CURSO
    $("#id_cursoc").val(cer[21]); //ID DEL CURSO
    $("#idinsevc1").val(cer[22]); //ID DEL LA PERSONA

    $.ajax({
        url: '../php/conCurcons.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (K = 0; K < res.length; K++) {

            if (obj.data[K].gstIdper == cer[22] && obj.data[K].id_codigocurso == cer[21]) {
                //   alert(cer[22]);


                if (((cer[17]) >= 80) && ((cer[17]) <= 100)) {
                    document.getElementById("che6").className = "fa fa-check";
                    document.getElementById("che6").style = "color:green; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                } else {
                    document.getElementById("che6").className = "fa fa-clock-o";
                    document.getElementById("che6").style = "color:#CD8704; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }

                if (((cer[17]) < 80) && ((cer[17]) > 0)) {
                    document.getElementById("che6").className = "fa fa-times";
                    document.getElementById("che6").style = "color:#C52808; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }
                if (cer[20] == "CONFIRMADO") {
                    //che1.style.display = '';
                    document.getElementById("che1").className = "fa fa-check";
                    document.getElementById("che1").style = "color:green; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                } else {
                    //che1.style.display = 'none';
                    document.getElementById("che1").className = "fa fa-clock-o";
                    document.getElementById("che1").style = "color:#CD8704; font-size: 16pt";
                    document.getElementById("guaacredit").disabled = false;
                }
                if (obj.data[K].listregis == 'SI') {
                    document.getElementById("check2c").className = "fa fa-check";
                    document.getElementById("check2c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check2c").className = "fa fa-clock-o";
                    document.getElementById("check2c").style = "color:#CD8704; font-size: 16pt";

                }
                if (obj.data[K].lisasisten == 'SI') {
                    document.getElementById("check3c").className = "fa fa-check";
                    document.getElementById("check3c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check3c").className = "fa fa-clock-o";
                    document.getElementById("check3c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].listreportein == 'SI') {
                    document.getElementById("check4c").className = "fa fa-check";
                    document.getElementById("check4c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check4c").className = "fa fa-clock-o";
                    document.getElementById("check4c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].cartdescrip == 'SI') {
                    document.getElementById("check5c").className = "fa fa-check";
                    document.getElementById("check5c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check5c").className = "fa fa-clock-o";
                    document.getElementById("check5c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].regponde == 'SI') {
                    document.getElementById("check7c").className = "fa fa-check";
                    document.getElementById("check7c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check7c").className = "fa fa-clock-o";
                    document.getElementById("check7c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].infinal == 'SI') {
                    document.getElementById("check8c").className = "fa fa-check";
                    document.getElementById("check8c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check8c").className = "fa fa-clock-o";
                    document.getElementById("check8c").style = "color:#CD8704; font-size: 16pt";
                }
                if (obj.data[K].evreaccion == 'SI') {
                    document.getElementById("check9c").className = "fa fa-check";
                    document.getElementById("check9c").style = "color:green; font-size: 16pt";
                } else {
                    document.getElementById("check9c").className = "fa fa-clock-o";
                    document.getElementById("check9c").style = "color:#CD8704; font-size: 16pt";
                }
            }
        }
    })

}
//MOSTRAR LOS DATOS EN EVALUACIÓN INSPECTOR
function evaluarins(cursos) {
    var d = cursos.split("*");
    //alert(d[23]);
    $("#avaluacion #evaNombr").val(d[14] + " " + d[15]); //NOMBRE COMPLETO
    $("#avaluacion #idperon").val(d[1]); //NOMBRE DEL CURSO
    $("#avaluacion #id_curso").val(d[19]); //ID DEL CURSO
    $("#avaluacion #validoev").val(d[17]); //EVALUACIÓN
    $("#avaluacion #idinsev").val(d[18]); //EVALUACIÓN

    $("#avaluacion #ogidoc").val(d[21]); //EVALUACIÓN

    valor2 = document.getElementById('validoev').value; //VALIDACIÓN DE RESULTADO
    costOfTicket = document.getElementById("NOE");
    selectedStand = document.getElementById("SIe");
    pendiente = document.getElementById("PE");
    //  statusev = document.getElementById("resuleval"); //resultado texto
    //if(valor2 >= 80){ //APROBADO
    if (((valor2) >= 80) && ((valor2) <= 100)) {
        selectedStand.style.display = '';
        costOfTicket.style.display = 'none';
        pendiente.style.display = 'none';
        //     statusev.value = "APROBADO"
    }

    if (((valor2) < 80) && ((valor2) >= 1)) { //REPROBADO 
        costOfTicket.style.display = '';
        selectedStand.style.display = 'none';
        pendiente.style.display = 'none';
        //  statusev.value = "REPROBADO"
    }
    if (valor2 <= 0) { //PENDIENTE 
        pendiente.style.display = '';
        costOfTicket.style.display = 'none';
        selectedStand.style.display = 'none';
        //    statusev.value = "PENDIENTE"
    }
}



function inspeval(cursos) {

    var d = cursos.split("*");
    $("#cursoc").html(d[1]);
    $("#folioc").html(d[21]);

    $.ajax({
        url: '../php/conProgra.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        var hoy = new Date();
        var fecha_actual = hoy.getDate() + '/' + (hoy.getMonth() + 1) + '/' + hoy.getFullYear();

        //alert(fecha_actual);
        html = '<table id="reacc" class="table table-hover"><tr><th colspan="5">CURSO: <label>' + d[1] + '</label></th><th colspan="2">FOLIO: <label>' + d[21] + ' <input type="hidden" name="idcod" id="idcod" value=' + d[21] + '></label></th></tr><tr style="font-size: 12px;"><th></th><th>ID</th><th>PARTICIPANTE</th><th>RESULTADO</th><th>ESTATUS</th><th style="width:150px;">FECHA EVALUACIÓN </th> </tr>';
        for (G = 0; G < res.length; G++) {

            fhoyd = obj.data[G].fnotif.substring(8, 10);
            fhoym = obj.data[G].fnotif.substring(5, 7);
            fhoyy = obj.data[G].fnotif.substring(0, 4);

            fnotif = fhoyd + '/' + fhoym + '/' + fhoyy;

            if (obj.data[G].codigo == d[21]) {
                x++;


                if (obj.data[G].confirmar == 'CONFIRMADO') {
                    if (obj.data[G].evaluacion == 0) {
                        html += "<tr><td><input type='hidden' id='idperon' name='idperon' value='" + obj.data[G].id_curso + "'></td><td>" + x + "</td><td>" + obj.data[G].gstNombr + "</td><td><input type='number'  max='99999' maxlength='3' title='el numero no debe ser superior a 100' name='cantidad' min='0' class='evaluacion disabled' id='validoev'></td><td><span class='label label-primary'id='PE'>PENDIENTE</span></td><td>" + fecha_actual + "</td></tr>";
                    } else {
                        if (obj.data[G].evaluacion >= 80) {
                            html += "<tr><td></td><td>" + x + "</td><td>" + obj.data[G].gstNombr + "</td><td>" + obj.data[G].evaluacion + "</td><td><span class='label label-success' style='font-size:13px; padding-right:0.8em; padding-left:0.8em;'>APROBADO</span></td><td>" + fnotif + "</td></tr>";
                        } else if (obj.data[G].evaluacion < 80) {
                            html += "<tr><td></td><td>" + x + "</td><td>" + obj.data[G].gstNombr + "</td><td>" + obj.data[G].evaluacion + "</td><td><span class='label label-danger' style='font-size:13px;'>REPROBADO</span></td><td>" + fnotif + "</td></tr>";
                        }
                    }
                }



            }
        }
        html += '</table>';
        $("#evaluacion").html(html);
    })
}

function evalresult() {

    var idperon = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="idperon"]').each(function(element) {
        var item = {};
        item.idperon = this.value;
        idperon.push(item);
    });

    var evaluacion = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="cantidad"]').each(function(element) {
        var item = {};
        item.evaluacion = this.value;
        evaluacion.push(item);
    });

    var array1 = JSON.stringify(idperon);
    var array2 = JSON.stringify(evaluacion);
    var hoy = new Date();
    var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
    var array3 = fecha;

    datos = 'array1=' + array1 + '&array2=' + array2 + '&array3=' + array3 + '&opcion=evaluaciones';

    $.ajax({
        url: '../php/proCurso.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {

        if (respuesta == 0) {
            $('#exito1').toggle('toggle');
            setTimeout(function() {
                $('#exito1').toggle('toggle');
            }, 2000);
        } else {
            $('#danger1').toggle('toggle');
            setTimeout(function() {
                $('#danger1').toggle('toggle');
            }, 2000);
        }
    });

}

function generacion(cursos) { //abre el modal de generacion de constancias 

    var d = cursos.split("*");
    $("#cursoc").html(d[1]);
    $("#folioc").html(d[21]);



    $.ajax({
            url: '../php/conInsp.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            html = '<table id="reacc" class="table table-hover"><tr><th colspan="10">CURSO: <label>' + d[1] + '</label></th><th colspan="2">FOLIO: <label>' + d[21] + ' <input type="hidden" name="idcod" id="idcod" value=' + d[21] + '></label></th></tr><tr style="font-size: 12px;"><th>ID<input title="Marcar todo" type="checkbox" onclick="marcar(this)" name="fullc" id="fullc" /></th><th>PARTICIPANTE</th><th>CONVOCATORIA Y CONFIRMACIÓN</th><th>LISTA DE REGISTRO</th><th>LISTA DE ASISTENCIA </th><th>REPORTES DE INCIDENCIAS</th><th>CARTAS DESCRIPTIVAS</th><th>EVALUACIÓN PARTICIPANTE</th><th>REGISTRO DE PONDERACIÓN</th><th>INFORME FINAL</th><th>EVALUACIÓN DE REACCIÓN</th> </tr>';
            for (G = 0; G < res.length; G++) {

                //if(obj.data[E].gstCatga == gstIDCat){

                //if(obj.data[E].gstOrden==1){
                // <input type='hidden' name='gstIdprm[]' id='gstIdprm' value='" + obj.data[G].gstIdprm + "'/>
                if (obj.data[G].id_codigocurso == d[21]) {
                    x++;

                    // alert(d[21]);08/10/2021

                    evalreac1 = "<i class='fa fa-clock-o' id='reac1' disabled style='color:rgb(205, 135, 4); font-size: 16pt'>"
                    confirmaasis1 = "<i class='fa fa-clock-o' id='cov1' disabled style='color:rgb(205, 135, 4); font-size: 16pt'></i>";
                    lista1 = "<input type='checkbox' id='listregis' style='width:17px; height:17px;' name='listregis' value='" + obj.data[G].id + "'/> ";
                    asistencia1 = "<input type='checkbox' style='width:17px; height:17px;' name='lisasisten' id='lisasisten' />"
                    lisreport1 = "<input type='checkbox' style='width:17px; height:17px;' name='listreportein' id='listreportein'/>"
                    cartdescrip1 = "<input type='checkbox' style='width:17px; height:17px;' name='cartdescrip' id='cartdescrip'/>"
                    regponde1 = "<input type='checkbox' style='width:17px; height:17px;' name='regponde' id='regponde'/>"
                    infinal1 = "<input type='checkbox' style='width:17px; height:17px;' name='infinal' id='infinal'/>"
                    evreaccion1 = "<input type='checkbox' style='width:17px; height:17px;' name='evreaccion' id='evreaccion' />"
                    fullselect = "<input type='checkbox' onclick='fullchange()' name='fullc1' id='fullc1' />"

                    //if (((d[17]) >= 80) && ((d[17]) <= 100)) {
                    // evalreac1="<i class='fa fa-check' id='reac1' disabled style='color:blue; font-size: 16pt'>"  
                    //}

                    //      if (((d[17]) < 80) && ((d[17]) <= 100)) {
                    //       evalreac1="<i class='fa fa-check' id='reac1' disabled style='color:blue; font-size: 16pt'>"  
                    //  }

                    //    if (obj.data[G].listregis=='SI'){ // columna1
                    //   lista1 = "<input type='checkbox' id='listregis' style='width:17px; height:17px;' checked='true' name='listregis' value='"+obj.data[G].id+"'/> "
                    //     }        

                    if (obj.data[G].listregis == 'SI') { // columna1
                        lista1 = "<input type='checkbox' id='listregis' style='width:17px; height:17px;' checked='true' name='listregis' value='" + obj.data[G].id + "'/> "
                    }

                    if (obj.data[G].lisasisten == 'SI') { // columna2    
                        asistencia1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='lisasisten' id='lisasisten' /> "
                    }

                    if (obj.data[G].listreportein == 'SI') { // columna3    
                        lisreport1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='listreportein' id='listreportein'/> "
                    }

                    if (obj.data[G].cartdescrip == 'SI') { // columna4    
                        cartdescrip1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='cartdescrip' id='cartdescrip'/> "
                    }

                    if (obj.data[G].regponde == 'SI') { // columna5    
                        regponde1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='regponde' id='regponde'/> "
                    }

                    if (obj.data[G].infinal == 'SI') { // columna6   
                        infinal1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='infinal' id='infinal'/>"
                    }

                    if (obj.data[G].evreaccion == 'SI') { // columna7   
                        evreaccion1 = "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='evreaccion' id='evreaccion' />"
                    }

                    if (obj.data[G].listregis == 'SI' && obj.data[G].lisasisten == 'SI' && obj.data[G].listreportein == 'SI' && obj.data[G].cartdescrip == 'SI' && obj.data[G].regponde == 'SI' && obj.data[G].infinal == 'SI' && obj.data[G].evreaccion == 'SI') { // columna7   
                        fullselect = "<input title='prueba de todos' type='checkbox' onclick='fullchange()' name='fullc1' id='fullc1' checked />"
                    }

                    if (obj.data[G].confirmar == 'CONFIRMADO') { // columna4    
                        confirmaasis1 = "<i class='fa fa-check' id='cov1' disabled style='color:green; font-size: 16pt'></i>";
                    }

                    if (obj.data[G].confirmar == 'ENFERMEDAD') { // columna4    
                        confirmaasis1 = "<i class='fa fa-times' id='cov1' disabled style='color:red; font-size: 16pt'></i>";
                    }

                    if (obj.data[G].confirmar == 'TRABAJO') { // columna4    
                        confirmaasis1 = "<i class='fa fa-times' id='cov1' disabled style='color:red; font-size: 16pt'></i>";
                    }

                    if (obj.data[G].confirmar == 'OTROS') { // columna4    
                        confirmaasis1 = "<i class='fa fa-times' id='cov1' disabled style='color:red; font-size: 16pt'></i>";
                    }

                    if (obj.data[G].evaluacion >= 80 && obj.data[G].evaluacion <= 100) { // columna4    
                        evalreac1 = "<i class='fa fa-check' id='reac1' disabled style='color:green; font-size: 16pt'>"
                    }

                    if (obj.data[G].evaluacion < 80 && obj.data[G].evaluacion >= 1) { // columna4    
                        evalreac1 = "<i class='fa fa-times id='reac1' disabled style='color:red; font-size: 16pt'>"
                    }

                    html += "<tr><td>" + x + fullselect + "</td><td>" + obj.data[G].gstNombr + " " + obj.data[G].gstApell + "</td><td>" + confirmaasis1 + "</td><td>" + lista1 + "</td><td><form id='form2'>" + asistencia1 + "</td><td>" + lisreport1 + "</td><td>" + cartdescrip1 + "</td><td>" + evalreac1 + "</i></span></td><td>" + regponde1 + "</td><td>" + infinal1 + "</td><td>" + evreaccion1 + "</td></form></tr>";
                    //  html += "<tr><td>" + x + "</td><td>" + obj.data[G].gstNombr + "</td><td>"+confirmaasis1+"</td><td><input type='checkbox' id='listregis' name='listregis' value='"+obj.data[G].id+"'/> </td><td><input type='checkbox' name='lisasisten' id='lisasisten' /></td><td><input type='checkbox' name='listreportein' id='listreportein'/></td><td><input type='checkbox' name='cartdescrip' id='cartdescrip'/></td><td><i class='fa fa-check' id='reac1' disabled style='color:green; font-size: 16pt'></i></span></td><td><input type='checkbox' name='regponde' id='regponde'/></td><td><input type='checkbox' name='infinal' id='infinal'/></td><td><input type='checkbox' name='evreaccion' id='evreaccion' /></td></tr>";

                }


                // <td>" + obj.data[G].gstApell + "</td><td style='text-align: center;'> <input type='checkbox' value='SI' name='actual[]' /> </td> <td style='text-align: center;'> <input type='checkbox' value='NO' name='actual[]' /></td></tr>";
                //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                //}<td><input id='comntr' name='comntr[]'> </td>
                //}
            }
            html += '</table>';
            $("#generacion").html(html);
        })
        // 32132123123
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#reacc tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


}

function fullchange(curso) {
    //alert("entra")
    if (document.getElementById('fullc1').checked) {
        document.getElementById('listregis').checked = true;
        document.getElementById('lisasisten').checked = true;
        document.getElementById('listreportein').checked = true;
        document.getElementById('cartdescrip').checked = true;
        document.getElementById('cartdescrip').checked = true;
        document.getElementById('regponde').checked = true;
        document.getElementById('infinal').checked = true;
        document.getElementById('evreaccion').checked = true;

    } else {
        document.getElementById('listregis').checked = false;
        document.getElementById('lisasisten').checked = false;
        document.getElementById('listreportein').checked = false;
        document.getElementById('cartdescrip').checked = false;
        document.getElementById('regponde').checked = false;
        document.getElementById('infinal').checked = false;
        document.getElementById('evreaccion').checked = false;
    }

}

function marcar(source) {
    checkboxes = document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}


function generar() {

    var cgstInspr = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="listregis"]').each(function(element) {
        var item = {};
        item.cgstInspr = this.value;
        item.listregis = this.checked;
        cgstInspr.push(item);
    });

    var lisasisten = new Array();
    /*Agrupamos todos los input con name=cbxEstudiante*/
    $('input[name="lisasisten"]').each(function(element) {
        var item = {};
        item.lisasisten = this.checked;
        lisasisten.push(item);
    });


    var listreportein = new Array();
    $('input[name="listreportein"]').each(function(element) {
        var item = {};
        item.listreportein = this.checked;
        listreportein.push(item);
    });


    var cartdescrip = new Array();
    $('input[name="cartdescrip"]').each(function(element) {
        var item = {};
        item.cartdescrip = this.checked;
        cartdescrip.push(item);
    });

    var regponde = new Array();
    $('input[name="regponde"]').each(function(element) {
        var item = {};
        item.regponde = this.checked;
        regponde.push(item);
    });

    var infinal = new Array();
    $('input[name="infinal"]').each(function(element) {
        var item = {};
        item.infinal = this.checked;
        infinal.push(item);
    });

    var evreaccion = new Array();
    $('input[name="evreaccion"]').each(function(element) {
        var item = {};
        item.evreaccion = this.checked;
        evreaccion.push(item);
    });


    /*Creamos un objeto para enviarlo al servidor*/
    var array1 = JSON.stringify(cgstInspr);
    var array2 = JSON.stringify(lisasisten);
    var array3 = JSON.stringify(listreportein);
    var array4 = JSON.stringify(cartdescrip);
    var array5 = JSON.stringify(regponde);
    var array6 = JSON.stringify(infinal);
    var array7 = JSON.stringify(evreaccion);

    datos = 'valor=' + array1 + '&array2=' + array2 + '&array3=' + array3 + '&array4=' + array4 + '&array5=' + array5 + '&array6=' + array6 + '&array7=' + array7 + '&opcion=constancia';

    $.ajax({
        url: '../php/reaccion.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        //alert(respuesta); 13092021
        if (respuesta == 0) {
            Swal.fire({
                type: 'success',
                // title: 'AFAC INFORMA',
                text: 'SE GUARDO CON EXITO',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 3000
            });

        } else {
            // $('#dange').toggle('toggle');
            // setTimeout(function() {
            // $('#dange').toggle('toggle');
            // }, 2000);
        }
    });



}

//EDICIÓN DEL CURSO
function editcurso() {
    document.getElementById('cerrareditc').style.display = ''; //muestra boton cerrar edición
    document.getElementById('editcurs').style.display = 'none'; //muestra boton cerrar edición
    //document.getElementById('cerrarc').style.display ='none'; //oculta boton cerrar
    document.getElementById('buttonfin').style.display = 'none'; // oculta boton finalazar curso
    document.getElementById('buttongcambios').style.display = ''; //muestra botton
    //Habilita los campos para edición
    document.getElementById('fcurso').disabled = false;
    document.getElementById('hcurso').disabled = false;
    document.getElementById('fechaf').disabled = false;
    // document.getElementById('idinst').disabled = false;
    document.getElementById('sede').disabled = false;
    document.getElementById('modalidads').disabled = false;
    document.getElementById('linkcur').disabled = false;
    document.getElementById('contracur').disabled = false;
    document.getElementById('classromcur').disabled = false;

}

//FIN DE LA EDICIÓN DEL CURSO
function cereditcurso() {
    document.getElementById('cerrareditc').style.display = 'none'; //muestra boton cerrar edición
    document.getElementById('editcurs').style.display = ''; //muestra boton cerrar edición
    //document.getElementById('cerrarc').style.display ='none'; //oculta boton cerrar
    document.getElementById('buttonfin').style.display = ''; // oculta boton finalazar curso
    document.getElementById('buttongcambios').style.display = 'none'; //muestra botton
    //Habilita los campos para edición
    document.getElementById('fcurso').disabled = true;
    document.getElementById('hcurso').disabled = true;
    document.getElementById('fechaf').disabled = true;
    // document.getElementById('idinst').disabled = true;
    document.getElementById('sede').disabled = true;
    document.getElementById('modalidads').disabled = true;
    document.getElementById('linkcur').disabled = true;
    document.getElementById('contracur').disabled = true;
    document.getElementById('classromcur').disabled = true;

}

//ACTUALIZACIÓN DE LA EVALUACIÓN INSPECTOR  Y ACEPTAR
function cerrareval() {

    costOfTicket = document.getElementById("NOE");
    selectedStand = document.getElementById("SIe");
    pendiente = document.getElementById("PE");
    valor2 = document.getElementById('validoev').value;
    // validación de curso
    var validoev = document.getElementById("validoev").value;
    var fechaev = document.getElementById("fechaev").value;
    var pendiente = document.getElementById("PE");
    idinsp = document.getElementById('idinsev').value;
    id_curso = document.getElementById('id_curso').value;
    codigo = document.getElementById('ogidoc').value;

    datos = 'idinsp=' + idinsp + '&id_curso=' + id_curso + '&evaluacion=' + valor2 + '&opcion=actualizarevalu'

    if (validoev == '') {
        pendiente.style.display = '';
        costOfTicket.style.display = 'none';
        selectedStand.style.display = 'none';
        $('#emptyev').toggle('toggle');
        setTimeout(function() {
            $('#emptyev').toggle('toggle');
        }, 2000);
        return;
    }
    if (fechaev == '') {
        $('#emptyev1').toggle('toggle');
        setTimeout(function() {
            $('#emptyev1').toggle('toggle');
        }, 2000);
        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {

            // alert(respuesta);
            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    title: 'EVALUADO CON ÉXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
                        rgba(100, 100, 100, 0.4)`
                });
                $("#refreshDivID").load("#refreshDivID .reloaded-divs > *");
                $('#modal-evaluar').modal('hide'); // CIERRA EL MODAL
                idcurso(codigo);

            } else {
                Swal.fire({
                    type: 'success',
                    title: 'ERRO AL EVALUAR',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
                        rgba(100, 100, 100, 0.4)
                    `
                });
            }

        });
        //inhanilita los campos EVALUACIÓN INSPECTOR
        div1 = document.getElementById('abrirev');
        div1.style.display = '';
        div1 = document.getElementById('cerrareval');
        div1.style.display = 'none';
        document.getElementById('fechaev').disabled = true; // FECHA
        document.getElementById('validoev').disabled = true; // PUNTUACIÓN OBTENIDA
        document.getElementById('comeneva').disabled = true; // COMENTARIOS  


    }
}

//fecha actual  EVALUACIÓN INSPECTOR
window.onload = function() {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes //agrega cero si el menor de 10
        //    document.getElementById('fechaev').value = ano + "-" + mes + "-" + dia;
}

//ABRIR EDICIÓN DE EVALUACIÓN INSPECTOR
function openEditeva() {
    // alert("prueba2!"); 
    div = document.getElementById('cerrareval');
    div.style.display = '';
    div = document.getElementById('abrirev');
    div.style.display = 'none';
    //Habilita los campos INICIO
    document.getElementById('fechaev').disabled = false; // FECHA
    document.getElementById('validoev').disabled = false; // PUNTUACIÓN OBTENIDA
    document.getElementById('comeneva').disabled = false; // COMENTARIOS 
}
//CERRAR EDICIÓN DE EVALUACIÓN INSPECTOR
function cerrarEditeva() {
    // alert("prueba2!"); 
    div1 = document.getElementById('abrirev');
    div1.style.display = '';
    div1 = document.getElementById('cerrareval');
    div1.style.display = 'none';
    //inhanilita los campos EVALUACIÓN INSPECTOR
    document.getElementById('fechaev').disabled = true; // FECHA
    document.getElementById('validoev').disabled = true; // PUNTUACIÓN OBTENIDA
    document.getElementById('comeneva').disabled = true; // COMENTARIOS 
}

function cursoeval(idcurso) {
    //COPEAR
    $.ajax({
        url: '../php/curConfir.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        cod = obj.data[i].codigo;
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].id_curso == idcurso) {

                $("#idcursoen").val(obj.data[i].id_curso); //ID DEL CURSO
                $("#nomcursoen").val(obj.data[i].gstTitlo); //NOMBRE DEL CURSO
                $("#codigo").val(obj.data[i].codigo);

            }
            //TRAE AL INSTRUCTOR DEL CURSO
            if (obj.data[i].gstCargo == 'INSTRUCTOR' && obj.data[i].codigo == cod) {
                $("#id_instruct").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);

            }

        }
    })

}



//EVALUACIÓN CURSO
function evalucurs(cursos) {


    var d = cursos.split("*");
    //alert(d[11]);
    $("#nomcursoen").val(d[1]); //NOMBRE DEL CURSO
    $("#idcursoen").val(d[19]); //ID DEL CURSO
}

// function enviar1() {

//     Swal.fire({
//         title: 'ATENCIÓN',
//         type: 'info',
//         text: 'Recuerda que antes de enviar verifica que los datos de asistencia sean correctos',
//         showDenyButton: true,
//         showCancelButton: true,
//         customClass: 'swal-wide',
//         confirmButtonText: `<i class="fa fa-envelope-open" aria-hidden="true"></i> Enviar`,
//         denyButtonText: `Cerrar`,
//     }).then((result) => {
//         /* Read more about isConfirmed, isDenied below */
//         if (result.isConfirmed) {
//             Swal.fire('Enviar!', '', 'success')
//         } else if (result.isDenied) {
//             Swal.fire('Changes are not saved', '', 'info')
//         }
//     })
// }
function enviarMail() {

    gstIdlsc = document.getElementById('gstIdlstc').value;
    codigoCurso = document.getElementById('codigoCurso').value;
    correoResponsable = document.getElementById('correoResponsable').value;
    // alert(correoResponsable);

    Swal.fire({
        html: 'Espera un momento...', // add html attribute if you want or remove
        allowOutsideClick: false,
        customClass: 'swal-wide',
        onBeforeOpen: () => {
            Swal.showLoading()
        },
    });
    $.ajax({
        url: '../admin/enviarMail.php',
        type: 'POST',
        data: 'gstIdlsc=' + gstIdlsc + '&codigoCurso=' + codigoCurso + '&correoResponsable=' + correoResponsable
    }).done(function(html) {

        Swal.fire({
            type: 'success',
            text: 'ENVIADO CON ÉXITO',
            showSpinner: true,
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 2000,
            backdrop: `
                rgba(100, 100, 100, 0.4)
            `
        });

    });


}

function finalizar() {

    codigo = document.getElementById('codigo').value;
    proceso = document.getElementById('proceso').value;

    if (proceso == 'FINALIZADO') {

        Swal.fire({
            type: 'error',
            // title: 'AFAC INFORMA',
            text: 'EL CURSO YA ESTÁ FINALIZADO',
            //text: 'Curso vencido, no puedes finalizar',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 3000,
            backdrop: `rgba(22, 57, 37, 0.4)`
        });

    } else {

        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: 'codigo=' + codigo + '&opcion=finalizac'

        }).done(function(respuesta) {

            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'CURSO FINALIZADO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
            rgba(100, 100, 100, 0.4)
        `
                });
                setTimeout("location.href = 'lisCurso';", 1000);
            }

        });

    }
}


function cursoAct() {

    var codigo = document.getElementById('codigo').value;
    var fcurso = document.getElementById('fcurso').value;
    var hcurso = document.getElementById('hcurso').value;
    var fechaf = document.getElementById('fechaf').value;
    var sede = document.getElementById('sede').value;
    var modalidads = document.getElementById('modalidads').value;
    var reprogramar = document.getElementById('reprogramar').value;


    if (modalidads == 'PRESENCIAL') {
        var linkcur = '0';
        var contracur = '0';
        var classromcur = '0';
    } else {
        var linkcur = document.getElementById('linkcur').value;
        var contracur = document.getElementById('contracur').value;
        var classromcur = document.getElementById('classromcur').value;

    }

    datos = 'codigo=' + codigo + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&fechaf=' + fechaf + '&sede=' + sede + '&modalidads=' + modalidads + '&linkcur=' + linkcur + '&contracur=' + contracur + '&classromcur=' + classromcur + '&reprogramar=' + reprogramar + '&opcion=cursoAct';

    if (codigo == '' || fcurso == '' || hcurso == '' || fechaf == '' || sede == '' || modalidads == '' || linkcur == '' || contracur == '' || reprogramar == '') {

        Swal.fire({
            type: 'warning',
            // title: 'AFAC INFORMA',
            text: 'SELECCIONE UNA OPCIÓN PARA CONTINUAR',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 3000
        });

    } else {

        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: datos

        }).done(function(respuesta) {

            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'CURSO REPROGRAMADO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
                setTimeout("location.href = 'lisCurso';", 2000);
            }

        });

    }

}

function modalidades() {

    var seleccion = document.getElementById('modalidads');
    valor = seleccion.options[seleccion.selectedIndex].value;

    if (valor == 'PRESENCIAL') {
        $("#dismod").hide();
        $("#disocl").show();

    } else {
        $("#disocl").hide();
        $("#dismod").show();
    }
}

var inputQuantity = [];
$(function() {
    $(".evaluacion").on("keyup", function(e) {
        var $field = $(this),
            val = this.value,
            $thisIndex = parseInt($field.data("idx"), 10);
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid")) {
            this.value = inputQuantity[$thisIndex];
            return;
        }
        if (val.length > Number($field.attr("maxlength"))) {
            val = val.slice(0, 3);
            $field.val(val);
        }
        inputQuantity[$thisIndex] = val;
    });
});