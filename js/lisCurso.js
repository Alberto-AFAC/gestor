function lisCurso() {
    $.ajax({
        url: '../php/lisCurso.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;



        html = '<table id="lstcurs" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> INICIO</th><th><i></i> DURACIÓN</th><th><i></i> FINAL</th><th><i></i> PARTICIPANTES</th><th style="width:13%"><i></i> ACCIÓN</th></tr></thead><tfoot><tr></tr></tfoot><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;

            year = obj.data[i].fcurso.substring(0, 4);
            month = obj.data[i].fcurso.substring(5, 7);
            day = obj.data[i].fcurso.substring(8, 10);
            Finicio = day + '/' + month + '/' + year;

            year = obj.data[i].fechaf.substring(0, 4);
            month = obj.data[i].fechaf.substring(5, 7);
            day = obj.data[i].fechaf.substring(8, 10);
            Finaliza = day + '/' + month + '/' + year;

            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].modalidad;

            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
        }
        html += '</tbody></table>';
        $("#lstacurs").html(html);
    })
}

function curso(cursos) {

    var d = cursos.split("*");

    gstIdlsc = d[0];

    $("#Dtall #gstTitlo").val(d[1]);
    $("#Dtall #gstTipo").val(d[2]);
    $("#Dtall #gstPrfil").val(d[3]);
    $("#Dtall #gstCntnc").val(d[4]);
    $("#Dtall #gstDrcin").val(d[5]);
    $("#Dtall #gstVignc").val(d[6]);
    $("#Dtall #gstObjtv").val(d[7]);
    $("#Dtall #hcurso").val(d[8]);
    $("#Dtall #fcurso").val(d[9]);
    $("#Dtall #fechaf").val(d[10]);
    $("#Dtall #idinst").val(d[11]);
    $("#Dtall #sede").val(d[12]);

    if (d[13] != 0) {
        //$("#Dtall #link").val(d[13]);
        // $("#link").show();
    } else {
        //$("#link").hide();    
    }


    $.ajax({
            url: '../php/curLista.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;
            //TODO AQUI ES
            html = '<table id="lstcurs" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i>CATEGORÍA</th><th><i></i>ASISTENCIA</th><th style="width:18%"><i></i>ACCIONES</th></tr></thead><tbody>';
            for (i = 0; i < res.length; i++) {
                x++;

                year = obj.data[i].fcurso.substring(0, 4);
                month = obj.data[i].fcurso.substring(5, 7);
                day = obj.data[i].fcurso.substring(8, 10);
                Finicio = day + '/' + month + '/' + year;
                year = obj.data[i].fechaf.substring(0, 4);
                month = obj.data[i].fechaf.substring(5, 7);
                day = obj.data[i].fechaf.substring(8, 10);
                Finaliza = day + '/' + month + '/' + year;
               
                cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].gstNombr + "*" + obj.data[i].gstApell + "*" + obj.data[i].idmstr + "*" + obj.data[i].evaluacion + "*" + obj.data[i].idinsp + "*" + obj.data[i].id_curso;
            

                if (obj.data[i].idmstr == gstIdlsc && obj.data[i].proceso == 'PENDIENTE') {

                    if (obj.data[i].gstCargo == 'INSPECTOR' || obj.data[i].gstCargo == 'DIRECTOR') {

                        if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i></a> <a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a> <a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a> <a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";


                        } else if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn-sm btn btn-success' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i></a> <a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a> <a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a> <a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";

                        }
                        if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn-sm btn btn-success' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i></a> <a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a> <a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a> <a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }
                        if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn-sm btn btn-success' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i></a> <a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a> <a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn-sm btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a> <a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }

                    } else {}

                    //ISPECTOR
                    if (obj.data[i].gstCargo == 'INSTRUCTOR' || obj.data[i].gstCargo == 'COORDINADOR') {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td></td>" + "<td> <a type='button' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-info' data-toggle='modal' data-target='#modal-agregar'>" + obj.data[i].gstCargo + "</a> <a type='button' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                    }

                } //else if(obj.data[i].idmstr==gstIdlsc && obj.data[i].proceso=='CONFIRMADO'){
                //           html +="<tr><td>"+obj.data[i].idmstr+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td>"+obj.data[i].gstCatgr+"</td><td> <a type='button' onclick='agregar("+'"'+obj.data[i].id_curso+'"'+")' class='btn btn-success' data-toggle='modal' data-target='#modal-agregar'>"+obj.data[i].proceso+"</a><a type='button' onclick='eliminar("+'"'+obj.data[i].id_curso+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>"; 
                //
                //            }
            }
            html += '</tbody></table>';
            $("#proCursos").html(html);

        })
        // alert(cursos);
}

function imprimir() {
    var pdf = new jsPDF("landscape");
    pdf.setFontSize(10)
        // pdf.setFontType('bold')
        // pdf.text(15, 20, 'LISTA TECNICA DE PARTICIPANTES')
        // pdf.text(15, 35, 'CENTRO INTERNACIONAL DE ADIESTRAMIENTO DE AVIACION CIVIL')

    $.ajax({
        url: '../php/curLista.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (i = 0; i < res.length; i++) {
            x++;

            if (obj.data[i].gstIdper == gstTitlo) {

                valor = obj.data[i].gstIdper;
                cargo = obj.data[i].gstCargo;
                nombre = obj.data[i].gstNombr;



            }

        }
    })
    var logo = new Image();
    logo.src = '../dist/img/AFACPDF.png';
    pdf.addImage(logo, 'PNG', 120, 5, 40, 30);
    pdf.setFontType('bold')
    pdf.text(15, 40, 'LISTA TECNICA DE PARTICIPANTES')

    pdf.text(15, 45, 'TEMA DEL CURSO:' + ' ' + document.getElementById('gstTitlo').value)

    var columns = ["N", "NOMBRE", "CARGO", "TEL.EXT.", "CORREO", "FIRMA"];
    var data = [
        [1, "NENFI REIBER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
        [2, "JUAN MANUEL", "INSPECTOR VERIFICADOR AERONÁUTICO DE OPERACIONES VUELO"],
        [3, "PEDRO JAVIER", "INSPECTOR VERIFICADOR AERONÁUTICO EN SMS-SSP"],
        [4, "NENFI REIBER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
        [5, "JUAN MANUEL", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
        [6, "PEDRO JAVIER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."]
    ];
    /* FUNCIÓN PARA CREAR EL PIE DE PAGINA*/
    const pageCount = pdf.internal.getNumberOfPages();
    for (var i = 1; i <= pageCount; i++) {
        pdf.setFontSize(8)
        pdf.setPage(i);
        pdf.text('Página ' + String(i) + ' de ' + String(pageCount), 220 - 20, 320 - 30, null, null,
            "right");
    }
    pdf.autoTable(columns, data, {
        margin: {
            top: 50,
            bottom: 15
        },
        styles: {

            overflow: 'linebreak',
            fontSize: 8
        },
        headStyles: {
            fillColor: [0, 0, 0],
            textColor: [0, 0, 0],
            fontSize: 8,
            padding: 0,
        },
        showHeader: 'everyPage',
        theme: 'grid'

    });

    window.open(pdf.output('bloburl'))

}

function openCurso() {
    $("#detCurso").toggle(250); //Muestra contenedor 
    $("#listCurso").toggle("fast"); //Oculta lista

    //document.getElementById('nombre').disabled='false';
}

function closeCurso() {
    $("#listCurso").toggle(250); //Muestra lista  
    $("#detCurso").toggle("fast"); //Oculta contenedor
}

function agrPart(cursos) {
    var d = cursos.split("*");

    $("#Prtcpnt #gstIdlsc").val(d[0]);
    $("#Prtcpnt #gstTitlo").val(d[1]);
    $("#Prtcpnt #finicio").val(d[9]);
    $("#Prtcpnt #gstDrcin").val(d[5]);

    $("#Prtcpnt #hrcurs").val(d[8]);
    $("#Prtcpnt #finalf").val(d[10]);
    //Solo ID coordinadores 
    $("#Prtcpnt #idcord").val(d[11]);
    $("#Prtcpnt #sede").val(d[12]);
    $("#Prtcpnt #linke").val(d[13]);
    $("#Prtcpnt #modalidad").val(d[1]);

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

    datos = 'idinsp=' + idinsp + '&gstIdlsc=' + gstIdlsc + '&idcord=' + idcord + '&finicio=' + finicio + '&finalf=' + finalf + '&hrcurs=' + hrcurs + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&opcion=participante';

    //alert(datos);

    if (idcord == '' || idinsp == '' || gstIdlsc == '' || hrcurs == '' || finalf == '' || sede == '' || modalidad == '' || link == '' || finalf == '') {

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
                    location.href = 'lisCurso.php';
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
//MOSTRAR LOS DATOS EN EVALUACIÓN INSPECTOR
function evaluarins(cursos) {
    var d = cursos.split("*");
    //alert(d[11]);
    $("#avaluacion #evaNombr").val(d[14] + " " + d[15]); //NOMBRE COMPLETO
    $("#avaluacion #idperon").val(d[1]); //NOMBRE DEL CURSO
    $("#avaluacion #id_curso").val(d[19]); //ID DEL CURSO
    $("#avaluacion #validoev").val(d[17]); //EVALUACIÓN
    $("#avaluacion #idinsev").val(d[18]); //EVALUACIÓN

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

    datos = 'idinsp=' + idinsp + '&id_curso=' + id_curso + '&evaluacion=' + valor2 + '&opcion=actualizarevalu'

    //   alert(datos);

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
                $('#succeev').toggle('toggle');
                setTimeout(function() {
                    $('#succeev').toggle('toggle');
                }, 2000);
            } else {
                $('#dangerev').toggle('toggle');
                setTimeout(function() {
                    $('#dangerev').toggle('toggle');
                }, 2000);
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
    document.getElementById('fechaev').value = ano + "-" + mes + "-" + dia;
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

//EVALUACIÓN CURSO
function evalucurs(cursos) {
    var d = cursos.split("*");
    //alert(d[11]);
    $("#nomcursoen").val(d[1]); //NOMBRE DEL CURSO
    $("#idcursoen").val(d[19]); //ID DEL CURSO
}