//destroy:true,
$.ajax({
    url: '../php/cursos.php',
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
    for (i = 0; i < res.length; i++) {

        confirma = obj.data[i].confirmar;
        programados = obj.data[i].proceso;
        venci = obj.data[i].vencido;
        cancelados = obj.data[i].declina;
        completo = obj.data[i].finalizado;
        suma = obj.data[i].finalizado + obj.data[i].confirmar + obj.data[i].proceso + obj.data[i].vencido + obj.data[i].declina;
    }

    $("#confirma").html(confirma);
    $("#programados").html(programados);
    $("#cancelados").html(cancelados);
    $("#completos").html(completo);
    $("#noti").html(confirma);
    $("#notpend").html(confirma);
    $("#vencidos").html(venci);
    $("#sumacur").html(suma);
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirma + ' notificaciones.</b>';
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' cursos que confirmar.';

});

$.ajax({
    url: '../php/ojtinf.php',
    type: 'POST'
}).done(function(resp1) {
    obj = JSON.parse(resp1);
    var res1 = obj.data;
    var programados = 0;
    var completos = 0;
    var cancelados = 0;
    var confirmar = 0;
    var conteo = 0;
    var fecha = 0;
    var ffin = 0;
    for (O = 0; O < res1.length; O++) {

        confirmaOJT = obj.data[O].confirmar;
        programadosOJT = obj.data[O].proceso;
        venciOJT = obj.data[O].vencido;
        canceladosOJT = obj.data[O].declina;
        completoOJT = obj.data[O].finalizado;
        sumaOJT = obj.data[O].finalizado + obj.data[O].confirmar + obj.data[O].proceso + obj.data[O].vencido + obj.data[O].declina;
    }

    $("#confirma").html(confirmaOJT);
    $("#programadosOJT").html(programadosOJT);
    $("#canceladosOJT").html(canceladosOJT);
    $("#completosOJT").html(completoOJT);
    $("#noti").html(confirmaOJT);
    $("#notpend").html(confirmaOJT);
    $("#vencidos").html(venciOJT);
    $("#sumacurOJT").html(sumaOJT);
    //document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirma + ' notificaciones.</b>';
    //document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' cursos que confirmar.';

});



//DECLINA ENFERMEDAD
function declina() {
    $(document).ready(function() {
        //alert("declina")
        $("#data-table-programado tr").on('click', function() {
            var toma1 = "",
                toma2 = "",
                toma3 = ""; //declaramos las columnas NOMBRE DEL CURSO
            toma1 += $(this).find('td:eq(0)').html(); //NOMBRE DEL CURSO  
            toma2 += $(this).find('td:eq(2)').html(); //PDF
            toma3 += $(this).find('td:eq(6)').html(); //PDF                    
            $("#nombredeclin").text(toma1); // Label esta en valor.php
            //$("#declinpdf").attr('href',toma2); // Label esta en valor.php
            // $("#motivod").text('MOTIVO: ENFERMEDAD'); // Label esta en valor.php
            //$("#otrosd").text(toma2); // Label esta en valor. php
        });
    });

}


//var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
//var fecha_actual = years.getFullYear();
//document.getElementById("fecha").innerHTML = ""+'<b>CURSOS AÑO '+fecha_actual+'</b>';

function confirmar(idcurso) { //01112022
    //alert(idcurso);
    $.ajax({
        url: '../php/curConfir.php',
        type: 'GET',
        data: 'idcurso=' + idcurso
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_curso == idcurso) {
                lista = obj.data[i].codigo;
                $("#id_curso").val(idcurso);
                $("#idinsp").val(obj.data[i].idinsp);
                $("#gstTitlo").html(obj.data[i].gstTitlo);
                $("#gstTipo").html(obj.data[i].gstTipo);
                $("#gstfolio").html(obj.data[i].codigo); // folio
                $("#fcurgrupo").html(obj.data[i].grupo); // Grupo
                $("#coordininf").html('COORDINADOR: ' + obj.data[i].coordname + ' ' + obj.data[i].coordlastname);

                var fechai = new Date(obj.data[i].fcurso);
                var fcurso = fechai.getDate() + '-' + (fechai.getMonth() + 1) + '-' + fechai.getFullYear();

                var fechac = new Date(obj.data[i].fechaf);
                var fechaf = fechac.getDate() + '-' + (fechac.getMonth() + 1) + '-' + fechac.getFullYear();
                $("#fcurso").html(obj.data[i].inico);
                $("#hcurso").html(obj.data[i].hcurso);
                $("#fechaf").html(obj.data[i].fin);
                $("#sede").html(obj.data[i].sede);

                $("#modalidad").html(obj.data[i].modalidad);
                if (obj.data[i].modalidad == 'PRESENCIAL') {
                    $("#ocul1").hide();
                    $("#ocul2").hide();
                    $("#ocul3").hide();

                    $("#link").hide();
                    $("#contracur").hide();
                    $("#classroom").hide();
                } else {
                    $("#link").html(obj.data[i].link);
                    $("#contracur").html(obj.data[i].contracur);
                    $("#classroom").html(obj.data[i].classroom);

                    $("#ocul1").show();
                    $("#ocul2").show();
                    $("#ocul3").show();

                    $("#link").show();
                    $("#contracur").show();
                    $("#classroom").show();
                }
                $("#nombredeclin").html(obj.data[i].gstTitlo);
                $("#motivod").html('MOTIVO:' + obj.data[i].confirmar);
                if (obj.data[i].confirmar == 'OTROS') {
                    $("#arcpdf").html("<p style='text-align: center;font-size:20px;'>" + obj.data[i].justifi + "</p>");
                } else {
                    $("#arcpdf").html("<a class='btn btn-block btn-social btn-linkedin' href='" + obj.data[i].justifi + "' style='text-align: center;' target='_blanck'> <i class='fa fa-file-pdf-o'></i> VISUALIZAR EL PDF ADJUNTO</a>");
                }

                //----------------------TABLA DE INSTRUCTORES Y COORDINADORES 28092022
                let folio = obj.data[i].codigo;
                //alert(folio);
                $.ajax({
                    url: '../php/coninstcurs.php',
                    type: 'GET',
                    data: 'folio=' + folio
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    let res = obj.data;
                    let x = 0;
                    html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>NOMBRE</th>';
                    for (U = 0; U < res.length; U++) {
                        // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
                        x++;
                        html += "<tr><td>" + x + "</td><td>" + obj.data[U].gstNombr + ' ' + obj.data[U].gstApell + "</td></tr>";
                    }
                    html += '</table>';
                    $("#instruc").html(html);
                });
                //------------DIAS DEL CURSO
                let finicial = obj.data[i].fcurso; //fecha inicial
                let codigo = obj.data[i].codigo; //codigo
                let ffinal = obj.data[i].fechaf;
                let hora_ini = obj.data[i].hcurso;
                let diai = finicial.substring(8, 10);
                let diaf = ffinal.substring(8, 10);
                let inici = finicial.substring(5, 7);
                let finan = ffinal.substring(5, 7);
                let inicio = inici * 1;
                let final = finan * 1;
                let anioi = finicial.substring(0, 4);
                let aniof = ffinal.substring(0, 4);
                datos = 'finicial=' + finicial + '&ffinal=' + ffinal + '&codigo=' + codigo;
                //alert(datos);
                $.ajax({
                    url: '../php/mosDias.php',
                    type: 'POST',
                    data: datos
                }).done(function(resp) {

                    obj = JSON.parse(resp);
                    var res = obj.data;
                    $("#hora_fin").val(obj.data[0].horaf);
                    meses = ['0', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
                        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
                    ];

                    //document.getElementById("ftitulo").innerHTML = "" + 'DÍAS HÁBILES: ' + diai + '/' + meses[inicio] + '/' + anioi + ' AL ' + diaf + '/' + meses[final] + '/' + aniof;
                    var x = 0;
                    var v = 1;

                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12">';
                    //CONTEO DEL MES, INICIO A FIN 
                    for (m = inicio; m <= final; m++) {
                        x++;
                        html += '<table disabled class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><td colspan="7" style="text-align:center;"><b>' + meses[m] + '</b></td></tr><tr><th><i></i>L</th><th><i></i>M</th><th><i></i>M</th><th><i></i>J</th><th><i></i>V</th><th><i></i>S</th><th><i></i>D</th></tr></thead><tbody>';
                        for (i = 0; i < res.length; i++) {
                            if (obj.data[i].habil == 'SI') {
                                //diasp = "<input disabled type='checkbox' name='idias' id='idias' class='idias' value='" + obj.data[i].numero + "' checked='checked'/>";
                                diasp = "<p class='flex items-center -mx-2 text-gray-700 dark:text-gray-200'><svg xmlns='http://www.w3.org/2000/svg' width='20px' style='color:blue' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path></svg></p>";
                                // html= "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='infinal' id='infinal'/>"
                            } else {
                                diasp = "<p style='display:none' class='flex items-center -mx-2 text-gray-700 dark:text-gray-200'></p>";
                            }
                            if (obj.data[i].mes == m) {
                                if (obj.data[i].dias == 'Lunes' && obj.data[i].inc == 1) {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Lunes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Martes' && obj.data[i].inc == 1) {
                                    html += "<td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Martes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Miércoles' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Miércoles') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Jueves' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Jueves') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Viernes' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Viernes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Sábado' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Sábado') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Domingo' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td><tr>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Domingo') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td><tr>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                            }
                        }
                        html += '</tbody></table>';
                    }
                    html += '</div></div></div>';
                    $("#habilDias3").html(html);
                })
            }
        }

    })
}

$(document).ready(function() {
    $("input[type=radio]").click(function(event) {
        var valor = $(event.target).val();
        if (valor == "NO") {
            $("#noasis").show();
            $("#asiste").hide();
            $("#confiras").hide();
            limCampos();
        } else if (valor == "SI") {
            $("#asiste").show();
            $("#conf").val('CONFIRMADO');
            $("#noasis").hide();
            $("#obser").hide();
            $("#archivo").hide();
            $("#confiras").hide();
        }
    });
});

//FUNCION PARA DETALLE DEL CURSO (EN PERFIL DE ADMINISTRATIVO)
function confirmar1(idcurso) {
    $.ajax({
        url: '../php/curConfir.php',
        type: 'GET',
        data: 'idcurso=' + idcurso
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        for (i = 0; i < res.length; i++) {
            if (obj.data[i].id_curso == idcurso) {
                lista = obj.data[i].codigo;
                $("#id_curso1").val(idcurso);
                $("#idinsp1").val(obj.data[i].idinsp);
                $("#gstTitlo1").html(obj.data[i].gstTitlo);
                $("#gstTipo1").html(obj.data[i].gstTipo);
                $("#gstfolio1").html(obj.data[i].codigo); // folio
                $("#fcurgrupo1").html(obj.data[i].grupo); // Grupo
                $("#coordininf1").html('COORDINADOR: ' + obj.data[i].coordname + ' ' + obj.data[i].coordlastname);
                document.getElementById('asisdetalle').style.display = '';

                var fechai = new Date(obj.data[i].fcurso);
                var fcurso = fechai.getDate() + '-' + (fechai.getMonth() + 1) + '-' + fechai.getFullYear();

                var fechac = new Date(obj.data[i].fechaf);
                var fechaf = fechac.getDate() + '-' + (fechac.getMonth() + 1) + '-' + fechac.getFullYear();
                $("#fcurso1").html(obj.data[i].inico);
                $("#hcurso1").html(obj.data[i].hcurso);
                $("#fechaf1").html(obj.data[i].fin);
                $("#sede1").html(obj.data[i].sede);

                $("#modalidad1").html(obj.data[i].modalidad);
                if (obj.data[i].modalidad == 'PRESENCIAL') {
                    $("#ocul11").hide();
                    $("#ocul22").hide();
                    $("#ocul33").hide();

                    $("#link1").hide();
                    $("#contracur1").hide();
                    $("#classroom1").hide();
                } else {
                    $("#link1").html(obj.data[i].link);
                    $("#contracur1").html(obj.data[i].contracur);
                    $("#classroom1").html(obj.data[i].classroom);

                    $("#ocul11").show();
                    $("#ocul22").show();
                    $("#ocul33").show();

                    $("#link1").show();
                    $("#contracur1").show();
                    $("#classroom1").show();
                }
                //----------------------TABLA DE INSTRUCTORES Y COORDINADORES 28092022
                let folio = obj.data[i].codigo;
                //alert(folio);
                $.ajax({
                    url: '../php/coninstcurs.php',
                    type: 'GET',
                    data: 'folio=' + folio
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    let res = obj.data;
                    let x = 0;
                    html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>NOMBRE</th>';
                    for (U = 0; U < res.length; U++) {
                        // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
                        x++;
                        html += "<tr><td>" + x + "</td><td>" + obj.data[U].gstNombr + ' ' + obj.data[U].gstApell + "</td></tr>";
                    }
                    html += '</table>';
                    $("#instruc1").html(html);
                });

                //------------DIAS DEL CURSO
                let finicial = obj.data[i].fcurso; //fecha inicial
                let codigo = obj.data[i].codigo; //codigo
                let ffinal = obj.data[i].fechaf;
                let hora_ini = obj.data[i].hcurso;
                let diai = finicial.substring(8, 10);
                let diaf = ffinal.substring(8, 10);
                let inici = finicial.substring(5, 7);
                let finan = ffinal.substring(5, 7);
                let inicio = inici * 1;
                let final = finan * 1;
                let anioi = finicial.substring(0, 4);
                let aniof = ffinal.substring(0, 4);
                datos = 'finicial=' + finicial + '&ffinal=' + ffinal + '&codigo=' + codigo;
                //alert(datos);
                $.ajax({
                    url: '../php/mosDias.php',
                    type: 'POST',
                    data: datos
                }).done(function(resp) {

                    obj = JSON.parse(resp);
                    var res = obj.data;
                    $("#hora_fin").val(obj.data[0].horaf);
                    meses = ['0', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
                        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
                    ];

                    //document.getElementById("ftitulo").innerHTML = "" + 'DÍAS HÁBILES: ' + diai + '/' + meses[inicio] + '/' + anioi + ' AL ' + diaf + '/' + meses[final] + '/' + aniof;
                    var x = 0;
                    var v = 1;

                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12">';
                    //CONTEO DEL MES, INICIO A FIN 
                    for (m = inicio; m <= final; m++) {
                        x++;
                        html += '<table class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><td colspan="7" style="text-align:center;"><b>' + meses[m] + '</b></td></tr><tr><th><i></i>L</th><th><i></i>M</th><th><i></i>M</th><th><i></i>J</th><th><i></i>V</th><th><i></i>S</th><th><i></i>D</th></tr></thead><tbody>';
                        for (i = 0; i < res.length; i++) {
                            if (obj.data[i].habil == 'SI') {
                                //diasp = "<input type='checkbox' name='idias' id='idias' class='idias' value='" + obj.data[i].numero + "' checked='checked'/>";
                                // html= "<input type='checkbox' style='width:17px; height:17px;' checked='true' name='infinal' id='infinal'/>"
                                diasp = "<p class='flex items-center -mx-2 text-gray-700 dark:text-gray-200'><svg xmlns='http://www.w3.org/2000/svg' width='20px' style='color:blue' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path></svg></p>";
                            } else {
                                diasp = "<p style='display:none' class='flex items-center -mx-2 text-gray-700 dark:text-gray-200'></p>";
                            }
                            if (obj.data[i].mes == m) {
                                if (obj.data[i].dias == 'Lunes' && obj.data[i].inc == 1) {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Lunes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Martes' && obj.data[i].inc == 1) {
                                    html += "<td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Martes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Miércoles' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Miércoles') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Jueves' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Jueves') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Viernes' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Viernes') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Sábado' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Sábado') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                                if (obj.data[i].dias == 'Domingo' && obj.data[i].inc == 1) {
                                    html += "<td></td><td></td><td></td><td></td><td></td><td></td><td>" + diasp + " <b>" + obj.data[i].numero + "</b></td><tr>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                } else if (obj.data[i].dias == 'Domingo') {
                                    html += "<td>" + diasp + " <b>" + obj.data[i].numero + "</b></td><tr>";
                                    html += "<input type='hidden' name='mes' value=" + obj.data[i].mes + " /><input type='hidden' name='anio' value=" + obj.data[i].anio + " />";
                                }
                            }
                        }
                        html += '</tbody></table>';
                    }
                    html += '</div></div></div>';
                    $("#habilDias2").html(html);
                })
            }
        }
    })
}


function confirasict() {

    var id_curso = document.getElementById('id_curso').value;
    var idinsp = document.getElementById('idinsp').value;
    var conf = document.getElementById('conf').value;

    if (conf == 0) {

        var confir = document.getElementById('confir').value;
        if (confir == 'OTROS') {
            var justifi = document.getElementById('obser').value;

        } else {

            var justifi = document.getElementById('archivo').value;
        }

    } else if (conf != 0) {
        var id_curso = document.getElementById('id_curso').value;
        var confir = conf;
        var justifi = 0;

    }

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('archivo', $('#archivo')[0].files[0]);
    paqueteDeDatos.append('confir', confir);
    paqueteDeDatos.append('justifi', justifi);
    paqueteDeDatos.append('id_curso', id_curso);
    paqueteDeDatos.append('idinsp', idinsp);

    $.ajax({
        url: '../php/confirmar.php',
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
                setTimeout("location.href = 'inspector';", 2000);
                // $('#exito').toggle('toggle');
                //setTimeout(function() {
                //  $('#exito').toggle('toggle');
                //}, 4000);

                // setTimeout(function(){
                // $("#data-table-confirmar").load(location.reload() + " #data-table-confirmar");
                // }, 3100);                

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

function justificacion() {

    var seleccion = document.getElementById('confir');
    valor = seleccion.options[seleccion.selectedIndex].value;
    if (valor == 'TRABAJO' || valor == 'ENFERMEDAD') {

        $("#archivo").show();
        $("#obser").hide();
    } else
    if (valor == 'OTROS') {
        $("#obser").show();
        $("#archivo").hide();
    }

}

function limCampos() {
    $("#obser").val('');
    $("#archivo").val('');
    $("#conf").val('0');
}


function constudios(gstIdper) {

    var idpersona1 = document.getElementById('f1t1').value; // SE RASTREA EL NUMERO DE EMPLEADO
    //alert(idpersona1);
    $.ajax({
            url: '../php/conEstudios.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;

            //AQUI03
            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th><th><i></i>FECHA</th></tr></thead><tbody>';
            var n = 0;
            for (H = 0; H < res.length; H++) { //RASTREAR EL ID DE LA PERSONA

                if (obj.data[H].gstIDper == idpersona1) {
                    valor = obj.data[H].gstIDper;
                    n++;
                    datos = obj.data[H].gstIdstd + "*" + obj.data[H].gstIDper + "*" + obj.data[H].gstInstt + "*" + obj.data[H].gstCiuda + "*" + obj.data[H].gstPriod + "*" + obj.data[H].gstDocmt + "*" + obj.data[H].gstIdstd;

                    html += "<tr><td>" + n + "</td><td>" + obj.data[H].gstInstt + "</td><td>" + obj.data[H].gstCiuda + "</td><td>" + obj.data[H].gstPriod + "</td><td><a class='btn btn-default' title='visualizar el documento' href='" + obj.data[H].gstDocmt + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a></td> <td>" + obj.data[H].fechar + "</td></tr>";
                } else {

                }

            }
            html += '</tbody></table></div></div></div>';
            $("#studios").html(html);
        })
        //alert('pruebas')
}

function perinsp(gstIdper) {
    var idpersona1 = document.getElementById('f1t1').value; // SE RASTREA EL NUMERO DE EMPLEADO
    // alert(idpersona1);
    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert(idpersona1)

        var n = 0;
        for (R = 0; R < res.length; R++) { //RASTREAR EL ID DE LA PERSONA
            if (obj.data[R].gstIdper == idpersona1) {

                $("#insnombre").val(obj.data[R].gstNombr);
                $("#insapellido").val(obj.data[R].gstApell);
                $("#insfecnac").val(obj.data[R].gstFenac);
                $("#insiss").val(obj.data[R].gstisst);
                $("#insexo").val(obj.data[R].gstSexo);
                $("#insrfc").val(obj.data[R].gstRfc);
                $("#inscurp").val(obj.data[R].gstCurp);

                $("#inscalle").val(obj.data[R].gstCalle);
                $("#insnum").val(obj.data[R].gstNumro);
                $("#inscol").val(obj.data[R].gstClnia);
                $("#inscp").val(obj.data[R].gstCpstl);
                $("#insciud").val(obj.data[R].gstCiuda);
                $("#insest").val(obj.data[R].gstStado);

                $("#inscasa").val(obj.data[R].gstCasa);
                $("#inscel").val(obj.data[R].gstClulr);
                $("#insext").val(obj.data[R].gstExTel);
                $("#inscorreper").val(obj.data[R].gstCorro);
                $("#inscorreins").val(obj.data[R].gstCinst);
                $("#inscorrealt").val(obj.data[R].gstSpcID);

                $("#insnemple").val(obj.data[R].gstNmpld);
                $("#insfecini").val(obj.data[R].gstFeing);
            }
        }

    })

    $.ajax({
        url: '../php/adscripcion.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert("ADSCRIPCIÓN")

        var n = 0;
        for (K = 0; K < res.length; K++) { //RASTREAR EL ID DE LA PERSONA
            if (obj.data[K].gstIdper == idpersona1) {

                $("#insdirec").val(obj.data[K].gstAreje);
                $("#insdireca").val(obj.data[K].adscripcion);
                $("#inssub").val(obj.data[K].descripsub);
                $("#insdep").val(obj.data[K].descripdep);

            }
        }

    })
    $.ajax({
        url: '../php/conDatos.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert("PUESTO")

        var n = 0;
        for (J = 0; J < res.length; J++) { //RASTREAR EL ID DE LA PERSONA
            if (obj.data[J].gstIdper == idpersona1) {

                $("#inscodpre").val(obj.data[J].gstCodig);
                $("#inspues").val(obj.data[J].gstGnric);

                $("#insnomp").val(obj.data[J].gstNpsto);
            }
        }

    })

    $.ajax({
            url: '../php/inspespecial.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>ESPECIALIDAD</th></tr></thead><tbody>';
            for (V = 0; V < res.length; V++) {


                datos = obj.data[V].gstCatgr;

                if (obj.data[V].gstIDper == idpersona1) {
                    x++;
                    html += "<tr><td>" + x + "</td><td>" + obj.data[V].gstCatgr + "</td></tr>";

                } else {}
            }
            html += '</tbody></table></div></div></div>';
            $("#insespecialidad").html(html);
        })
        //alert('pruebas')
}

function conprofesion() {
    var idpersona1 = document.getElementById('f1t1').value; // SE RASTREA EL NUMERO DE EMPLEADO
    // alert(idpersona1);
    $.ajax({
        url: '../php/conProfesion.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;


        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
        for (P = 0; P < res.length; P++) {

            year = obj.data[P].gstFntra.substring(0, 4);
            month = obj.data[P].gstFntra.substring(5, 7);
            day = obj.data[P].gstFntra.substring(8, 10);
            gstFntra = day + '/' + month + '/' + year;

            year = obj.data[P].gstFslda.substring(0, 4);
            month = obj.data[P].gstFslda.substring(5, 7);
            day = obj.data[P].gstFslda.substring(8, 10);
            gstFslda = day + '/' + month + '/' + year;


            datos = obj.data[P].gstIdpro + "*" + obj.data[P].gstIDper + "*" + obj.data[P].gstPusto + "*" + obj.data[P].gstMpres + "*" + obj.data[P].gstIDpai + "*" + obj.data[P].gstCidua + "*" + obj.data[P].gstActiv + "*" + obj.data[P].gstFntra + "*" + obj.data[P].gstFslda;

            if (obj.data[P].gstIDper == idpersona1) {
                x++;
                html += "<tr><td>" + x + "</td><td>" + obj.data[P].gstPusto + "</td><td>" + obj.data[P].gstMpres + "</td><td> " + obj.data[P].gstActiv + "</td><td> " + gstFntra + "</td><td> " + gstFslda + "</td><td><a class='btn btn-default'  href='" + obj.data[P].gstDocep + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a></td> </tr>";

            } else {}
        }
        html += '</tbody></table></div></div></div>';
        $("#profsions").html(html);
    })
}



// SHOW PASSWORD
$('.toggle-password').click(function() {
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});


function actContr() {

    idper = document.getElementById('idper').value;
    usu = document.getElementById('usu').value;
    password = document.getElementById('password').value;
    pass = document.getElementById('pass').value;
    pass2 = document.getElementById('pass2').value;
    dato = 'idper=' + idper + '&usu=' + usu + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&opcion=actCont';

    $.ajax({
        url: '../php/actContra.php',
        type: 'POST',
        data: dato
    }).done(function(respuesta) {

        if (respuesta == 7) {
            $('#echo').toggle('toggle');
            setTimeout(function() {
                $('#echo').toggle('toggle');
            }, 2000);
        } else if (respuesta == 2) {
            $('#invalida').toggle('toggle');
            setTimeout(function() {
                $('#invalida').toggle('toggle');
            }, 2000);
        } else if (respuesta == 3) {
            $('#falso').toggle('toggle');
            setTimeout(function() {
                $('#falso').toggle('toggle');
            }, 2000);
        } else if (respuesta == 4) {
            $('#vacios').toggle('toggle');
            setTimeout(function() {
                $('#vacios').toggle('toggle');
            }, 2000);
        } else if (respuesta == 1) {
            $('#error').toggle('toggle');
            setTimeout(function() {
                $('#error').toggle('toggle');
            }, 2000);
        }
    });
}

function actContrMeay() {

    idper = document.getElementById('idper').value;
    usu = document.getElementById('usu').value;
    password = document.getElementById('password').value;
    pass = document.getElementById('pass').value;
    pass2 = document.getElementById('pass2').value;
    dato = 'idper=' + idper + '&usu=' + usu + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&opcion=actCont';

    $.ajax({
        url: '../../php/actContra.php',
        type: 'POST',
        data: dato
    }).done(function(respuesta) {

        if (respuesta == 7) {
            $('#echo').toggle('toggle');
            setTimeout(function() {
                $('#echo').toggle('toggle');
            }, 2000);
        } else if (respuesta == 2) {
            $('#invalida').toggle('toggle');
            setTimeout(function() {
                $('#invalida').toggle('toggle');
            }, 2000);
        } else if (respuesta == 3) {
            $('#falso').toggle('toggle');
            setTimeout(function() {
                $('#falso').toggle('toggle');
            }, 2000);
        } else if (respuesta == 4) {
            $('#vacios').toggle('toggle');
            setTimeout(function() {
                $('#vacios').toggle('toggle');
            }, 2000);
        } else if (respuesta == 1) {
            $('#error').toggle('toggle');
            setTimeout(function() {
                $('#error').toggle('toggle');
            }, 2000);
        }
    });
}

function contraseña() {
    var nMay = 0,
        nMin = 0,
        nNum = 0
    var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    var t2 = "abcdefghijklmnopqrstuvwxyz"
    var t3 = "0123456789"
    var password1 = document.getElementById('password1').value;
    if (password1.length < 8) {
        $('#validcarac').toggle('toggle');
        setTimeout(function() {
            $('#validcarac').toggle('toggle');
        }, 2500);
        document.getElementById('password1').focus();
        document.getElementById('password2').disabled = true;
        //alert("Su password, debe tener almenos 8 letras");
    } else {
        //Aqui continua si la variable ya tiene mas de 8 letra

        for (i = 0; i < password1.length; i++) {
            if (t1.indexOf(password1.charAt(i)) != -1) { nMay++ }
            if (t2.indexOf(password1.charAt(i)) != -1) { nMin++ }
            if (t3.indexOf(password1.charAt(i)) != -1) { nNum++ }


        }
        if (nMay > 0 && nMin > 0 && nNum > 0) {
            //alert("correcto")
            $('#contraexit').toggle('toggle');
            setTimeout(function() {
                $('#contraexit').toggle('toggle');
            }, 2500);
            document.getElementById('password2').disabled = false;
            document.getElementById('password2').focus();
            form.submit()
        } else {
            $('#caratesp').toggle('toggle');
            setTimeout(function() {
                $('#caratesp').toggle('toggle');
            }, 2500);

            document.getElementById('password1').focus();
            document.getElementById('password2').disabled = true;


            return;
        }
    }
}


function actControbli() {
    //alert(document.getElementById("test1").checked)
    idper = document.getElementById('idact').value;
    usu = document.getElementById('usuarioobl').value;
    password = document.getElementById('usuarcontraseio').value;
    pass = document.getElementById('password1').value;
    pass2 = document.getElementById('password2').value;


    /*if (document.getElementById('test1').checked==false) {
        Swal.fire({
            type: 'warning',
            text: 'Se necesita Aceptar el aviso de privacidad!',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 2500,
            backdrop: `
                rgba(100, 100, 100, 0.4)`
        });
    }else{*/
    dato = 'idper=' + idper + '&usu=' + usu + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&opcion=actCont';
    $.ajax({
        url: '../php/actContra.php',
        type: 'POST',
        data: dato
    }).done(function(respuesta) {
        //alert(respuesta)
        if (respuesta == 7) {
            Swal.fire({
                type: 'success',
                title: 'SE ACTUALIZO CON EXITO',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
                    rgba(100, 100, 100, 0.4)`
            });
            $('#modal-obligatorio').modal('hide');
        } else if (respuesta == 2) {
            Swal.fire({
                type: 'warning',
                text: 'Las contraseñas no coiciden!',
                timer: 2500,
                showConfirmButton: false,
                customClass: 'swal-wide'
            });
        } else if (respuesta == 3) {
            Swal.fire({
                type: 'warning',
                text: 'Contraseña Actual incorrecta!',
                timer: 2500,
                showConfirmButton: false,
                customClass: 'swal-wide'
            });
        } else if (respuesta == 4) {
            Swal.fire({
                type: 'warning',
                text: 'LLENAR TODOS LOS CAMPOS!',
                timer: 2500,
                showConfirmButton: false,
                customClass: 'swal-wide'
            });
        } else if (respuesta == 1) {
            Swal.fire({
                type: 'error',
                title: 'ATENCIÓN!',
                customClass: 'swal-wide',
                timer: 2300,
                text: 'Datos no actualizados! comunicarse con el soporte tecnico',
                showConfirmButton: false,
            });
        }
    });
}
//}