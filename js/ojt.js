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


function infdecOJT(pruebas){
    //alert(pruebas);
    







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

                var id_coordojt=obj.data[i].id_coorojt;
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
