function lisCurso() {

    $.ajax({
        url: '../php/lisCurso.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;


        html = '<table id="lstcurs" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> INICIO</th><th><i></i> DURACIÓN</th><th><i></i> FINAL</th><th><i></i> PARTICIPANTES</th><th><i></i>ESTATUS</th><th style="width:13%"><i></i> ACCIÓN</th></tr></thead><tfoot><tr></tr></tfoot><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;


            var hoy = new Date();
            var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

            var fcurso = new Date(obj.data[i].fcurso);
            var fcurso = new Date(fcurso.getFullYear(), fcurso.getMonth(), fcurso.getDate() + 1);

            year = obj.data[i].fcurso.substring(0, 4);
            month = obj.data[i].fcurso.substring(5, 7);
            day = obj.data[i].fcurso.substring(8, 10);
            Finicio = day + '/' + month + '/' + year;

            year = obj.data[i].fechaf.substring(0, 4);
            month = obj.data[i].fechaf.substring(5, 7);
            day = obj.data[i].fechaf.substring(8, 10);
            Finaliza = day + '/' + month + '/' + year;

            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].modalidad + "*" + obj.data[i].codigo + "*" + obj.data[i].idinsp;
            if (factual > fcurso && obj.data[i].proceso == "PENDIENTE") {
                proceso = "<span style='font-weight: bold; height: 50px; color:#D73925;'>VENCIDO</span>";
                //            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td><span style='font-weight: bold; height: 50px; color: #D73925;'>VENCIDO</span></td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";                                
            } else

            //CAMBIA EL COLOR DEL TEXTO DEL ESTATUS EN CURSOS PROGRAMADOS
            if (obj.data[i].proceso == "FINALIZADO") {
                proceso = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";
                //console.log(proceso);
            } else
            if (obj.data[i].proceso == "PENDIENTE") {
                proceso = "<span style='font-weight: bold; height: 50px; color: #F39403;'>PENDIENTE</span>";
            } else
            if (obj.data[i].proceso == "EN PROCESO") {
                proceso = "<span style='font-weight: bold; height: 50px; color: ##3C8DBC;'>EN PROCESO</span>";
            }

            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td>" + proceso + "</td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
        }
        html += '</tbody></table>';
        $("#lstacurs").html(html);
    })
}

//CURSOS ACREEDITADOS//
function lisAcreed() {
    $.ajax({
        url: '../php/lisAcred.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;



        html = '<table id="lstAcree" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> INICIO</th><th><i></i> DURACIÓN</th><th><i></i> FINAL</th><th><i></i> PARTICIPANTES</th><th><i></i>ESTATUS</th><th style="width:13%"><i></i> ACCIÓN</th></tr></thead><tfoot><tr></tr></tfoot><tbody>';
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

            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].modalidad + "*" + obj.data[i].codigo + "*" + obj.data[i].idinsp;

            //CAMBIA EL COLOR DEL TEXTO DEL ESTATUS EN CURSOS PROGRAMADOS
            if (obj.data[i].proceso == "FINALIZADO") {
                proceso = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";
                //console.log(proceso);
            } else
            if (obj.data[i].proceso == "PENDIENTE") {
                proceso = "<span style='font-weight: bold; height: 50px; color: #F39403;'>PENDIENTE</span>";
            } else
            if (obj.data[i].proceso == "EN PROCESO") {
                proceso = "<span style='font-weight: bold; height: 50px; color: ##3C8DBC;'>EN PROCESO</span>";
            }

            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td>" + proceso + "</td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
        }
        html += '</tbody></table>';
        $("#lstacreed").html(html);
    })
}
//CURSOS PENDIENTES//
function listPendient() {
    $.ajax({
        url: '../php/listPend.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;




        html = '<table id="lstPend" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> INICIO</th><th><i></i> DURACIÓN</th><th><i></i> FINAL</th><th><i></i> PARTICIPANTES</th><th><i></i>ESTATUS</th><th style="width:13%"><i></i> ACCIÓN</th></tr></thead><tfoot><tr></tr></tfoot><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;

            var hoy = new Date();
            var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());
            var termino = new Date(obj.data[i].fcurso);
            var finaliza = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());

            year = obj.data[i].fcurso.substring(0, 4);
            month = obj.data[i].fcurso.substring(5, 7);
            day = obj.data[i].fcurso.substring(8, 10);
            Finicio = day + '/' + month + '/' + year;

            year = obj.data[i].fechaf.substring(0, 4);
            month = obj.data[i].fechaf.substring(5, 7);
            day = obj.data[i].fechaf.substring(8, 10);
            Finaliza = day + '/' + month + '/' + year;



            //finaliza.setMonth(finaliza.getMonth() - 0);
            // alert(Finicio);

            // if (factual <= finaliza) {
            // vencer++;

            // }else 


            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].modalidad + "*" + obj.data[i].codigo + "*" + obj.data[i].idinsp;


            //CAMBIA EL COLOR DEL TEXTO DEL ESTATUS EN CURSOS PROGRAMADOS
            if (obj.data[i].proceso == "FINALIZADO") {
                proceso = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";
                //console.log(proceso);
            } else
            if (obj.data[i].proceso == "PENDIENTE") {
                proceso = "<span style='font-weight: bold; height: 50px; color: #F39403;'>PENDIENTE</span>";

            } else
            if (obj.data[i].proceso == "EN PROCESO") {
                proceso = "<span style='font-weight: bold; height: 50px; color: ##3C8DBC;'>EN PROCESO</span>";
            }

            if (factual <= finaliza) {
                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td>" + proceso + "</td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
            }

        }
        html += '</tbody></table>';
        $("#listaPend").html(html);
    })
}

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
    alert(datos);
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
            data: datos
        }).done(function(respuesta) {
            //console.log(respuesta);
            if (respuesta == 0) {
                alert("respuesta");
                $('#cersucceev').toggle('toggle');
                setTimeout(function() {
                    $('#cersucceev').toggle('toggle');
                    location.href = 'lisCurso.php';
                }, 1500);
            } else {
                $('#cerdangerev').toggle('toggle');
                setTimeout(function() {
                    $('#cerdangerev').toggle('toggle');
                }, 2000);
            }
        });
    }
}

//POR VENCER

function listPorvencer() {

    $.ajax({
        url: '../php/listPend.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;




        html = '<table id="lstVenc" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> INICIO</th><th><i></i> DURACIÓN</th><th><i></i> FINAL</th><th><i></i> PARTICIPANTES</th><th><i></i>ESTATUS</th><th style="width:13%"><i></i> ACCIÓN</th></tr></thead><tfoot><tr></tr></tfoot><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;

            var hoy = new Date();
            var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

            var fcurso = new Date(obj.data[i].fcurso);
            var fcurso = new Date(fcurso.getFullYear(), fcurso.getMonth(), fcurso.getDate() + 1);

            year = obj.data[i].fcurso.substring(0, 4);
            month = obj.data[i].fcurso.substring(5, 7);
            day = obj.data[i].fcurso.substring(8, 10);
            Finicio = day + '/' + month + '/' + year;

            year = obj.data[i].fechaf.substring(0, 4);
            month = obj.data[i].fechaf.substring(5, 7);
            day = obj.data[i].fechaf.substring(8, 10);
            Finaliza = day + '/' + month + '/' + year;

            cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].modalidad + "*" + obj.data[i].codigo + "*" + obj.data[i].idinsp;


            //CAMBIA EL COLOR DEL TEXTO DEL ESTATUS EN CURSOS PROGRAMADOS
            if (obj.data[i].proceso == "FINALIZADO") {
                proceso = "<span style='font-weight: bold; height: 50px; color:green;'>FINALIZADO</span>";
                //console.log(proceso);
            } else
            if (obj.data[i].proceso == "PENDIENTE") {
                proceso = "<span style='font-weight: bold; height: 50px; color: #F39403;'>POR VENCER</span>";

            } else
            if (obj.data[i].proceso == "EN PROCESO") {
                proceso = "<span style='font-weight: bold; height: 50px; color: ##3C8DBC;'>EN PROCESO</span>";
            }

            if (factual > fcurso && obj.data[i].proceso == "PENDIENTE") {

                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td><span style='font-weight: bold; height: 50px; color: #D73925;'>VENCIDO</span></td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
            }


            if (factual <= fcurso && obj.data[i].proceso == "PENDIENTE") {

                var termino = new Date(obj.data[i].fechaf);
                var finaliza = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());

                finaliza.setMonth(finaliza.getMonth() - 3);

                if (factual >= finaliza && obj.data[i].proceso == "PENDIENTE") {
                    html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td><span style='font-weight: bold; height: 50px; color: #F39403;'>POR VENCER</span></td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                }

            }



            // if (factual >= finaliza && obj.data[i].proceso == "PENDIENTE") {
            // html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + Finaliza + "</td><td>" + obj.data[i].prtcpnts + "</td><td><span style='font-weight: bold; height: 50px; color: #D73925;'>VENCIDO</span></td><td> <a href='javascript:openCurso()' onclick='curso(" + '"' + cursos + '"' + ")' class='datos btn btn-default' ><i class='fa fa-list-alt text-success'></i></a><a type='button' onclick='agrPart(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-participnt'><i class='fa fa-user-plus text-info'></i></a><a type='button' onclick='eliminar(" + '"' + cursos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";

            //     }


        }
        html += '</tbody></table>';
        $("#listaVencer").html(html);
    })
}

function curso(cursos) {

    var d = cursos.split("*");

    gstIdlsc = d[0];

    $("#impri #gstIdlstc").val(d[0]);
    $("#impri #gstTitulo").val(d[1]);
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
    $("#Dtall #modalidads").val(d[14]);
    $("#Dtall #linkcur").val(d[13]);

    codigo = d[15];

    //$("#Dtall #contracur").val(d[15]); falta la contraseña en base de datos

    modalidadcur = document.getElementById('modalidads').value; //variable para declara la modalidad
    dismod = document.getElementById("dismod"); //variable para el contenedor de el link y la contraseña

    if (modalidadcur == "A DISTANCIA") { //se visualiza el link y contraseña 
        dismod.style.display = '';
    }
    if (modalidadcur == "PRESENCIAL (SEMIPRESENCIAL)") { //se visualiza el link y contraseña 
        linidismodnpu.style.display = '';
    }
    if (modalidadcur == "PRESENCIAL") { //se oculta el link y la contraseña
        dismod.style.display = 'none';
    }


    $.ajax({
            url: '../php/curLista.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;
            //TODO AQUI ES
            html = '<table id="lstcurs" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width: 20px;"><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i>ESPECIALIDAD</th><th><i></i>ASISTENCIA</th><th style="width:18%"><i></i>ACCIONES</th></tr></thead><tbody>';
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

                cursos = obj.data[i].gstIdlsc + "*" + obj.data[i].gstTitlo + "*" + obj.data[i].gstTipo + "*" + obj.data[i].gstPrfil + "*" + obj.data[i].gstCntnc + "*" + obj.data[i].gstDrcin + "*" + obj.data[i].gstVignc + "*" + obj.data[i].gstObjtv + "*" + obj.data[i].hcurso + "*" + obj.data[i].fcurso + "*" + obj.data[i].fechaf + "*" + obj.data[i].idinst + "*" + obj.data[i].sede + "*" + obj.data[i].link + "*" + obj.data[i].gstNombr + "*" + obj.data[i].gstApell + "*" + obj.data[i].idmstr + "*" + obj.data[i].evaluacion + "*" + obj.data[i].idinsp + "*" + obj.data[i].id_curso + "*" + obj.data[i].confirmar + "*" + obj.data[i].codigo + "*" + obj.data[i].idinsp;


                if (obj.data[i].codigo == codigo && obj.data[i].proceso == 'PENDIENTE') {

                    if (obj.data[i].gstCargo == 'INSPECTOR' || obj.data[i].gstCargo == 'DIRECTOR' || obj.data[i].gstCargo == 'ADMINISTRATIVO') {

                        if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Pendiente por confirmar asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button right transition pend' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i>" + "</td><td>" + "</a> <a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";

                        } else if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }
                        if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }
                        if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }

                    } else if (obj.data[i].gstCargo == 'COORDINADOR') {

                        if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMAR') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a type='button' title='Pendiente por confirmar asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button right transition pend' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-time'  style='font-size:18px;'></i>" + "</td><td>" + "</a> <a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";

                        } else if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }
                        if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a><a type='button' title='Descarga de certificado' onclick='certificado()' class='btn btn-success'><i class='fa fa fa-download' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }
                        if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a type='button' title='Confirma asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        }

                    }

                    //ISPECTOR
                    if (obj.data[i].gstCargo == 'INSTRUCTOR' && obj.data[i].codigo == codigo) {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td></td>" + "<td>  <a type='button' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                    }

                } else if (obj.data[i].codigo == codigo && obj.data[i].proceso == 'FINALIZADO') {

                    if (obj.data[i].evaluacion == 0 && obj.data[i].confirmar == 'CONFIRMADO') {
                        if (obj.data[i].gstCargo == 'COORDINADOR') {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                        } else {
                            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' id='ev' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";

                        }

                    }
                    if (((obj.data[i].evaluacion) >= 80) && ((obj.data[i].evaluacion) <= 100)) {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia' style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-success' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' text-blue' style='font-size:18px;'></i></a><a type='button' title='Generar Certificado' onclick='gencerti(" + '"' + cursos + '"' + ") ' class='btn btn-primary' data-toggle='modal' data-target='#modal-acreditacion'><i class='fa fa fa-list-ul' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                    }
                    if (((obj.data[i].evaluacion) < 80) && ((obj.data[i].evaluacion) >= 1)) {
                        html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td> <a type='button' title='Confirma asistencia'style= 'red' onclick='agregar(" + '"' + obj.data[i].id_curso + '"' + ")' class='circular-button check green transition' data-toggle='modal' data-target='#modal-agregar'><i class='fa ion-android-done'  style='font-size:18px;'></i></a>" + "</td><td>" + "<a type='button' title='Evaluación Inspector' onclick='evaluarins(" + '"' + cursos + '"' + ")' class='btn btn-danger' data-toggle='modal' data-target='#modal-evaluar'><i class='fa ion-clipboard' style='font-size:18px;'></i></a><a type='button' title='Evaluación Curso' onclick='evalucurs(" + '"' + cursos + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-evalcurso'><i class='fa fa-pencil-square-o' style='font-size:18px;'></i></a><a type='button' title='Eliminar' onclick='eliminar(" + '"' + obj.data[i].id_curso + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger' style='font-size:18px;'></i></a></td></tr>";
                    }
                }


                //else if(obj.data[i].idmstr==gstIdlsc && obj.data[i].proceso=='CONFIRMADO'){
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


    var idcursoen = document.getElementById('idcursoen').value;//ID CURSO 
    
    var preg1 = $('input[name=preg1]:checked').val();//-
    var preg2 = $('input[name=preg2]:checked').val();// -
    var preg3 = $('input[name=preg3]:checked').val();//  -
    var preg4 = $('input[name=preg4]:checked').val();//   -
    var preg5 = $('input[name=preg5]:checked').val();//    -
    var preg6 = $('input[name=preg6]:checked').val();//     -
    var preg7 = $('input[name=preg7]:checked').val();//      -PREGUNTAS RADIO  
    var preg8 = $('input[name=preg8]:checked').val();//      -
    var preg9 = $('input[name=preg9]:checked').val();//     -
    var preg10 = $('input[name=preg10]:checked').val();//  -
    var preg11 = $('input[name=preg11]:checked').val();// -
    var preg12 = $('input[name=preg12]:checked').val();//-

    var preg13 = document.getElementById('preg13').value;//PREGUNTA ABIERTA 

    var preg14 = $('input[name=preg14]:checked').val();//PREGUNTAS RADIO


  if($('input[name=preg14]:checked').val()=='OTROS'){
    
        preg14 = document.getElementById('otros1').value;

    }



    var preg15 = $('input[name=preg15]:checked').val();//PREGUNTAS RADIO

    var preg16 = document.getElementById('preg16').value;//PREGUNTA ABIERTA 

    datos = 'idcursoen='+idcursoen+'&preg1='+preg1+'&preg2='+preg2+'&preg3='+preg3+'&preg4='+preg4+'&preg5='+preg5+'&preg6='+preg6+'&preg7='+preg7+'&preg8='+preg8+'&preg9='+preg9+'&preg10='+preg10+'&preg11='+preg11+'&preg12='+preg12+'&preg13='+preg13+'&preg14='+preg14+'&preg15='+preg15+'&preg16='+preg16+ '&opcion=agreaccion';

 
if(idcursoen == '' || !document.querySelector('input[name=preg1]:checked') || !document.querySelector('input[name=preg2]:checked') || !document.querySelector('input[name=preg3]:checked') || !document.querySelector('input[name=preg4]:checked') || !document.querySelector('input[name=preg5]:checked') || !document.querySelector('input[name=preg6]:checked') || !document.querySelector('input[name=preg7]:checked') || !document.querySelector('input[name=preg8]:checked') || !document.querySelector('input[name=preg9]:checked') || !document.querySelector('input[name=preg10]:checked') || !document.querySelector('input[name=preg11]:checked') || !document.querySelector('input[name=preg12]:checked') || preg13 == '' || !document.querySelector('input[name=preg14]:checked') || !document.querySelector('input[name=preg15]:checked') || preg16=='' || preg14 ==''){

    if(!document.querySelector('input[name=preg1]:checked')){$('#span1').show('toggle');}else{$('#span1').hide('toggle');} 
    if(!document.querySelector('input[name=preg2]:checked')){$('#span2').show('toggle');}else{$('#span2').hide('toggle');}
    if(!document.querySelector('input[name=preg3]:checked')){$('#span3').show('toggle');}else{$('#span3').hide('toggle');} 
    if(!document.querySelector('input[name=preg4]:checked')){$('#span4').show('toggle');}else{$('#span4').hide('toggle');}
    if(!document.querySelector('input[name=preg5]:checked')){$('#span5').show('toggle');}else{$('#span5').hide('toggle');} 
    if(!document.querySelector('input[name=preg6]:checked')){$('#span6').show('toggle');}else{$('#span6').hide('toggle');}
    if(!document.querySelector('input[name=preg7]:checked')){$('#span7').show('toggle');}else{$('#span7').hide('toggle');} 
    if(!document.querySelector('input[name=preg8]:checked')){$('#span8').show('toggle');}else{$('#span8').hide('toggle');}
    if(!document.querySelector('input[name=preg9]:checked')){$('#span9').show('toggle');}else{$('#span9').hide('toggle');}
    if(!document.querySelector('input[name=preg10]:checked')){$('#span10').show('toggle');}else{$('#span10').hide('toggle');}
    if(!document.querySelector('input[name=preg11]:checked')){$('#span11').show('toggle');}else{$('#span11').hide('toggle');}
    if(!document.querySelector('input[name=preg12]:checked')){$('#span12').show('toggle');}else{$('#span12').hide('toggle');}
    if(preg13==''){$('#span13').show('toggle');}else{$('#span13').hide('toggle');}
    if(!document.querySelector('input[name=preg14]:checked')){$('#span14').show('toggle');}else{$('#span14').hide('toggle');}
    if(!document.querySelector('input[name=preg15]:checked')){$('#span15').show('toggle');}else{$('#span15').hide('toggle');}
    if(preg16==''){$('#span16').show('toggle');}else{$('#span16').hide('toggle');}

    $('#pregunta').toggle('toggle');setTimeout(function() {$('#pregunta').toggle('toggle');}, 2000);    

}else{

        $.ajax({
            url: '../php/reaccion.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                $('#enviadoexito').toggle('toggle');
                setTimeout(function() {
                    $('#enviadoexito').toggle('toggle');
                }, 2000);
            } else if(respuesta == 2){
                $('#aviso').toggle('toggle');
                setTimeout(function() {
                    $('#aviso').toggle('toggle');
                }, 2000);
            }else{

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

function gencerti(cursos) { //GENERACIÓN DE CERTIFICADOS ETC.
    var cer = cursos.split("*");
    alert(cer[22]);
    $("#evaNombrc").val(cer[14] + " " + cer[15]); //NOMBRE COMPLETO
    $("#idperonc").val(cer[1]); //NOMBRE DEL CURSO
    $("#id_cursoc").val(cer[21]); //ID DEL CURSO
    $("#idinsevc1").val(cer[22]); //ID DEL LA PERSONA

    che1 = document.getElementById('che1'); //che1 
    che6 = document.getElementById('che6'); //che6
    // valor2 = document.getElementById('validoev').value; //VALIDACIÓN DE RESULTADO
    if (((cer[17]) >= 80) && ((cer[17]) <= 100)) {

        che6.style.display = '';
    } else {

        che6.style.display = 'none';
    }

    if (cer[20] == "CONFIRMADO") {

        che1.style.display = '';
    } else {

        che1.style.display = 'none';
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
    document.getElementById('idinst').disabled = false;
    document.getElementById('sede').disabled = false;
    document.getElementById('modalidads').disabled = false;
    document.getElementById('linkcur').disabled = false;
    document.getElementById('contracur').disabled = false;
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
    document.getElementById('idinst').disabled = true;
    document.getElementById('sede').disabled = true;
    document.getElementById('modalidads').disabled = true;
    document.getElementById('linkcur').disabled = true;
    document.getElementById('contracur').disabled = true;
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
                Swal.fire({
                    type: 'success',
                    title: 'EVALUADO CON ÉXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
                        rgba(100, 100, 100, 0.4)
                    `
                });
            } else {
                Swal.fire({
                    type: 'success',
                    title: 'EVALUADO CON ÉXITO',
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

function cursoeval(idcurso){

    $.ajax({
    url: '../php/curConfir.php',
    type: 'POST'
    }).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    for (i = 0; i < res.length; i++) {

        if(obj.data[i].id_curso == idcurso){

            $("#idcursoen").val(obj.data[i].id_curso); //ID DEL CURSO
                $("#nomcursoen").val(obj.data[i].gstTitlo); //NOMBRE DEL CURSO
                    $("#codigo").val(obj.data[i].codigo);

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

    $.ajax({
        url: 'enviarMail.php',
        type: 'POST',
        data: 'gstIdlsc=' + gstIdlsc
    }).done(function(html) {

        Swal.fire({
            type: 'success',
            title: 'ENVIADO CON ÉXITO',
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

    $.ajax({
        url: 'finalizar.php',
        type: 'POST',
        data: 'gstIdlsc=' + gstIdlsc
    }).done(function(respuesta) {
        // if (respuesta == 0) {
        //     Swal.fire({
        //         type: 'success',
        //         title: 'FINALIZADO',
        //         showConfirmButton: false,
        //         customClass: 'swal-wide',
        //         timer: 2000,
        //         backdrop: `
        //     rgba(100, 100, 100, 0.4)
        // `
        //     });

    });
}