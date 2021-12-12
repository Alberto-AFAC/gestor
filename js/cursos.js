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
    }

    $("#confirma").html(confirma);
    $("#programados").html(programados);
    $("#cancelados").html(cancelados);
    $("#completos").html(completo);
    $("#noti").html(confirma);
    $("#vencidos").html(venci);
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirma + ' notificaciones.</b>';
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' cursos que confirmar.';


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

function confirmar(idcurso) {

    $.ajax({
        url: '../php/curConfir.php',
        type: 'POST'
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

                var fechai = new Date(obj.data[i].fcurso);
                var fcurso = fechai.getDate() + '-' + (fechai.getMonth() + 1) + '-' + fechai.getFullYear();

                var fechac = new Date(obj.data[i].fechaf);
                var fechaf = fechac.getDate() + '-' + (fechac.getMonth() + 1) + '-' + fechac.getFullYear();
                $("#fcurso").html(fcurso);
                $("#hcurso").html(obj.data[i].hcurso);
                $("#fechaf").html(fechaf);
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
                }
                $("#nombredeclin").html(obj.data[i].gstTitlo);
                $("#motivod").html('MOTIVO:' + obj.data[i].confirmar);
                if (obj.data[i].confirmar == 'OTROS') {
                    $("#arcpdf").html("<p style='text-align: center;font-size:20px;'>" + obj.data[i].justifi + "</p>");
                } else {
                    $("#arcpdf").html("<a class='btn btn-block btn-social btn-linkedin' href='" + obj.data[i].justifi + "' style='text-align: center;' target='_blanck'> <i class='fa fa-file-pdf-o'></i> VISUALIZAR EL PDF ADJUNTO</a>");
                }
            }
        }


        html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>NOMBRE</th><th>CARGO</th>';
        x = 0;
        for (i = 0; i < res.length; i++) {
            x++;

            // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
            if (obj.data[i].puesto == 'INSTCOOR' && obj.data[i].codigo == lista) {
                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + ' ' + obj.data[i].gstApell + "</td><td>" + 'INSTRUCTOR/COORDINADOR' + "</td></tr>";
            }else if(obj.data[i].puesto == 'COORDINADOR' && obj.data[i].codigo == lista){
                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + ' ' + obj.data[i].gstApell + "</td><td>" + obj.data[i].puesto + "</td></tr>";
            }else if(obj.data[i].puesto == 'INSTRUCTOR' && obj.data[i].codigo == lista){
                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + ' ' + obj.data[i].gstApell + "</td><td>" + obj.data[i].puesto + "</td></tr>";
            }




        }
        html += '</table>';
        $("#instruc").html(html);

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
        type: 'POST'
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
                document.getElementById('asisdetalle').style.display ='';

                var fechai = new Date(obj.data[i].fcurso);
                var fcurso = fechai.getDate() + '-' + (fechai.getMonth() + 1) + '-' + fechai.getFullYear();

                var fechac = new Date(obj.data[i].fechaf);
                var fechaf = fechac.getDate() + '-' + (fechac.getMonth() + 1) + '-' + fechac.getFullYear();
                $("#fcurso1").html(fcurso);
                $("#hcurso1").html(obj.data[i].hcurso);
                $("#fechaf1").html(fechaf);
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
                }
                
            }
        }


        html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>NOMBRE</th><th>CARGO</th>';
        x = 0;
        for (i = 0; i < res.length; i++) {
            x++;



            // TRAE EL CORDINADOR PRINCIPAL DEL CURSO
            if (obj.data[i].gstCargo == 'COORDINADOR' && obj.data[i].codigo == lista && obj.data[i].idinst == obj.data[i].idinsp || obj.data[i].gstCargo == 'INSTRUCTOR' && obj.data[i].codigo == lista) {

                html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstNombr + ' ' + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCargo + "</td></tr>";
            }




        }
        html += '</table>';
        $("#instruc1").html(html);

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
    // alert(idpersona1);
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