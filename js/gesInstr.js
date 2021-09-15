function conCurso() {
    $.ajax({
        url: '../php/conCurso.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        var hoy = new Date();
        var fecha_actual = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();


        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curInst" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> TÍTULO</th><th><i></i> TIPO</th><th><i></i> PERFIL</th><th><i></i> DURACIÓN</th><th><i></i> DOCUMENTO</th><th><i></i> VIGENCIA </th><th><i></i> TEMARIO</th><th><i></i>ACCIÓN</th></tr></thead><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;
            var f1 = new Date(hoy.getFullYear(), (hoy.getMonth() + 1), hoy.getDate());
            fvigd = obj.data[i].gstFalta.substring(8, 10);
            fvigm = obj.data[i].gstFalta.substring(5, 7);
            fvigy = obj.data[i].gstFalta.substring(0, 4);
            var f2 = new Date(fvigy, fvigm, fvigd);

            datos = obj.data[i].gstIdlsc + '*' + obj.data[i].gstTitlo + '*' + obj.data[i].gstTipo + '*' + obj.data[i].gstPrfil + '*' + obj.data[i].gstCntnc + '*' + obj.data[i].gstDrcin + '*' + obj.data[i].gstVignc + '*' + obj.data[i].gstObjtv + '*' + obj.data[i].gstTmrio;


            // if(f2 <= f1){
            html += "<tr><td>" + x + "</td><td>" + obj.data[i].gstTitlo + "</td><td>" + obj.data[i].gstTipo + "</td><td>" + obj.data[i].gstPrfil + "</td><td>" + obj.data[i].gstDrcin + "</td><td>" + obj.data[i].gstCntnc + "</td><td>" + obj.data[i].gstVignc + "</td><td><a href='" + obj.data[i].gstTmrio + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; font-size:22px;  cursor: pointer;' ></span></a></td><td> <a href='#' onclick='dato(" + '"' + datos + '"' + ")' type='button' class='btn btn-default' data-toggle='modal' data-target='#modalVal'><i class='fa ion-compose text-info'></i></a><a href='#' onclick='eliminar(" + '"' + datos + '"' + ")' type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-eliminar'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
            //}else{
            //         html +="<tr><td>"+x+"</td><td>"+obj.data[i].gstTitlo+"</td><td>"+obj.data[i].gstTipo+"</td><td>"+obj.data[i].gstVignc+"</td><td>"+obj.data[i].gstPrfil+"</td><td>"+obj.data[i].gstObjtv+"</td><td>"+obj.data[i].gstDrcin+"</td><td>"+obj.data[i].gstCntnc+"</td><td><a href='"+obj.data[i].gstTmrio+"' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; font-size:22px;  cursor: pointer;' ></span></a></td><td> <a href='#' onclick='dato("+'"'+datos+'"'+")' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%; font-size: 25px;'><i class='fa ion-compose text-info'></i></a></td></tr>";
            //}
        }
        html += '</tbody></table></div></div></div>';
        $("#curInsts").html(html);
    })
}

function dato(gstIdlsc) {

    $.ajax({
        url: '../php/conCurso.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (i = 0; i < res.length; i++) {
            if (obj.data[i].gstIdlsc == gstIdlsc) {

                datos = obj.data[i].gstIdlsc + '*' + obj.data[i].gstTitlo + '*' + obj.data[i].gstTipo + '*' + obj.data[i].gstPrfil + '*' + obj.data[i].gstCntnc + '*' + obj.data[i].gstDrcin + '*' + obj.data[i].gstVignc + '*' + obj.data[i].gstObjtv + '*' + obj.data[i].gstTmrio;

                var d = datos.split("*");
                $("#modalVal #AgstIdlsc").val(d[0]);
                $("#AgstIdlsc #AgstIdlsc").val(d[0]);
                $("#modalUpdate #Idlsc").val(d[0]);
                $("#modalVal #AgstTitlo").val(d[1]);
                $("#modalUpdate #AgstTitlo").val(d[1]);
                $("#modalVal #AgstTipo").val(d[2]);
                $("#gstPrfil").html(d[3]);
                $("#modalVal #AgstCntnc").val(d[4]);

                Ahr = d[5].substr(0, 2);
                Amin = d[5].substr(8, 2);
                //                Atmp = d[5].substr(6,4);

                $("#modalVal #Ahr").val(Ahr);
                $("#modalVal #Amin").val(Amin);

                $("#modalVal #AgstVignc").val(d[6]);
                $("#modalVal #AgstObjtv").val(d[7]);
                $("#modalVal #AgstTmrio").val(d[8]);
                $("#modalUpdate #AgstTmrio").val(d[8]);
                $("#modalVal #AgstProvd").val(obj.data[i].gstProvd);
                $("#modalVal #AgstCntro").val(obj.data[i].gstCntro);

            }
        }
    })
}

function regCurso() {

    var tPrfil = ''

    var selectObject = document.getElementById("gstPrfil");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            tPrfil += ',' + selectObject.options[i].value;

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

    gstPrfiles = tPrfil.substr(1);

    var gstPrfil = gstPrfiles;
    // var gstTitlo =  document.getElementById('gstTitlo').value;
    var gstTitlo = document.getElementById('gstTitlo').value;
    var gstTipo = document.getElementById('gstTipo').value;
    var gstVignc = document.getElementById('gstVignc').value;
    var gstObjtv = document.getElementById('gstObjtv').value;
    var hr = document.getElementById('hr').value;
    var tmp1 = document.getElementById('tmp1').value;
    var min = document.getElementById('min').value;
    var tmp2 = document.getElementById('tmp2').value;
    var gstCntnc = document.getElementById('gstCntnc').value;
    var gstProvd = document.getElementById('gstProvd').value;
    var gstCntro = document.getElementById('gstCntro').value;

    datos = 'gstPrfil=' + gstPrfil + '&gstTitlo=' + gstTitlo + '&gstTipo=' + gstTipo + '&gstVignc=' + gstVignc + '&gstObjtv=' + gstObjtv + '&hr=' + hr + '&tmp1=' + tmp1 + '&min=' + min + '&tmp2=' + tmp2 + '&gstCntnc=' + gstCntnc + '&gstProvd=' + gstProvd + '&gstCntro=' + gstCntro + '&array=' + array + '&opcion=insert';
    if (gstPrfil == '' || gstTitlo == '' || gstTipo == '' || gstVignc == '' || gstObjtv == '' || hr == '' || tmp1 == '' || min == '' || tmp2 == '' || gstCntnc == '' || gstProvd == '' || gstCntro == '') {
        Swal.fire({
            type: 'error',
            title: 'ATENCIÓN!',
            text: 'Verificar campos faltantes o con información incorrecta',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 3000

        });
    } else {
        $.ajax({
            url: '../php/docCursos.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            document.getElementById("addcurse").reset();

            // alert(respuesta);

            if (respuesta == 0) {
                // alert(respuesta);
                Swal.fire({
                    type: 'success',
                    title: 'AFAC INFORMA',
                    text: 'CURSO GUARDADO CON ÉXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
            } else {
                alert("AQUÍ ESTA VACÍO");
                // Swal.fire({
                //     type: 'success',
                //     title: 'AFAC INFORMA',
                //     text: 'CURSO GUARDADO CON ÉXITO',
                //     showConfirmButton: false,
                //     customClass: 'swal-wide',
                //     timer: 3000
                // });
            }
        });
    }
}


function actCurso() {

    var tPrfil = ''

    var selectObject = document.getElementById("AgstPrfil");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            tPrfil += ',' + selectObject.options[i].value;

        }
    }

    gstPrfiles = tPrfil.substr(1);


    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('AgstTmrio', $('#AgstTmrio')[0].files[0]);
    //paqueteDeDatos.append('gstPriod', $('#gstPriod').prop('value'));
    paqueteDeDatos.append('AgstTitlo', $('#AgstTitlo').prop('value'));
    paqueteDeDatos.append('AgstTipo', $('#AgstTipo').prop('value'));
    paqueteDeDatos.append('AgstVignc', $('#AgstVignc').prop('value'));
    paqueteDeDatos.append('AgstPrfil', gstPrfiles);
    paqueteDeDatos.append('AgstObjtv', $('#AgstObjtv').prop('value'));
    paqueteDeDatos.append('Ahr', $('#Ahr').prop('value'));
    paqueteDeDatos.append('Atmp1', $('#Atmp1').prop('value'));
    paqueteDeDatos.append('Amin', $('#Amin').prop('value'));
    paqueteDeDatos.append('Atmp2', $('#Atmp2').prop('value'));
    paqueteDeDatos.append('AgstCntnc', $('#AgstCntnc').prop('value'));
    paqueteDeDatos.append('AgstIdlsc', $('#AgstIdlsc').prop('value'));

    paqueteDeDatos.append('AgstProvd', $('#AgstProvd').prop('value'));
    paqueteDeDatos.append('AgstCntro', $('#AgstCntro').prop('value'));

    $.ajax({
        url: '../php/actCursos.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            // alert(r);
            console.log(r);
            if (r == 8) {
                $('#avacio').toggle('toggle');
                setTimeout(function() {
                    $('#avacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#aexito').toggle('toggle');
                setTimeout(function() {
                    $('#aexito').toggle('toggle');
                }, 4000);
                conCurso('');
            } else if (r == 1) {
                $('#afalla').toggle('toggle');
                setTimeout(function() {
                    $('#afalla').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#aerror').toggle('toggle');
                setTimeout(function() {
                    $('#aerror').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#arenom').toggle('toggle');
                setTimeout(function() {
                    $('#arenom').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#aforn').toggle('toggle');
                setTimeout(function() {
                    $('#aforn').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#aadjunta').toggle('toggle');
                setTimeout(function() {
                    $('#aadjunta').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#arepetido').toggle('toggle');
                setTimeout(function() {
                    $('#arepetido').toggle('toggle');
                }, 4000);
            }
        }
    });

}

function updatePDF() {
    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('AgstIdlsc', $('#AgstIdlsc').prop('value'));
    paqueteDeDatos.append('AgstTmrio', $('#AgstTmrio')[0].files[0]);


    $.ajax({
        url: '../php/updatePDF.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            // alert(r);
            console.log(r);
            if (r == 8) {
                $('#avacio').toggle('toggle');
                setTimeout(function() {
                    $('#avacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#aexito').toggle('toggle');
                setTimeout(function() {
                    $('#aexito').toggle('toggle');
                }, 4000);
                conCurso('');
            } else if (r == 1) {
                $('#afalla').toggle('toggle');
                setTimeout(function() {
                    $('#afalla').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#aerror').toggle('toggle');
                setTimeout(function() {
                    $('#aerror').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#arenom').toggle('toggle');
                setTimeout(function() {
                    $('#arenom').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#aforn').toggle('toggle');
                setTimeout(function() {
                    $('#aforn').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#aadjunta').toggle('toggle');
                setTimeout(function() {
                    $('#aadjunta').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#arepetido').toggle('toggle');
                setTimeout(function() {
                    $('#arepetido').toggle('toggle');
                }, 4000);
            }
        }
    });

}

function eliminar(gstIdlsc) {

    //alert(gstIdlsc);
    //  var d=datos.split("*");


    $("#modal-eliminar #EgstIdlsc").val(gstIdlsc);
    //$("#modal-eliminar #EgstTitlo").val(d[1]);

}

function eliCurso() {

    var EgstIdlsc = document.getElementById('EgstIdlsc').value;

    //alert(EgstIdlsc);
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
            data: 'EgstIdlsc=' + EgstIdlsc + '&opcion=eliCurso'
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#succe').toggle('toggle');
                setTimeout(function() {
                    $('#succe').toggle('toggle');
                    location.href = 'conCursos.php';
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


$(document).ready(function() {
    $('#btnguardar').click(function() {
        var fecha_salida = $("#fecha_salida").val();
        var hora_salida = $("#hora_salida").val();
        var origenVuelo = $("#origenVuelo").val();
        var destinoVuelo = $("#destinoVuelo").val();
        var aerolinea = $("#aerolinea").val();
        var nVuelo = $("#nVuelo").val();
        var email = $("#email").val();
        var telefono = $("#telefono").val();
        var pais = $("#pais").val();
        var estado = $("#estado").val();
        var cp = $("#cp").val();
        var nombres = $("#nombres").val();
        var pApellido = $("#pApellido").val();
        var sApellido = $("#sApellido").val();
        var edad = $("#edad").val();
        var genero = $("#genero").val();
        var nacionalidad = $("#nacionalidad").val();
        var sintomasC = $("#sintomasC1").val();
        swal.showLoading();
        if (fecha_salida == '' || hora_salida == '' || origenVuelo == '' || destinoVuelo == '' || aerolinea == '' || nVuelo == '' || email == '' || telefono == '' || pais == '' || estado == '' || cp == '' || nombres == '' || pApellido == '' || sApellido == '' || edad == '' || genero == '' || nacionalidad == '' || sintomasC == '' || pruebaC == '') {
            Swal.fire({
                type: 'error',
                title: 'ATENCIÓN!',
                text: 'Verificar campos faltantes o con información incorrecta',
                showConfirmButton: false,
            });
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/php/insert.php",
                data: { fecha_salida: fecha_salida, hora_salida: hora_salida, hora_salida: hora_salida, origenVuelo: origenVuelo, destinoVuelo: destinoVuelo, aerolinea: aerolinea, nVuelo: nVuelo, email: email, telefono: telefono, pais: pais, estado: estado, cp: cp, nombres: nombres, pApellido: pApellido, sApellido: sApellido, edad: edad, genero: genero, nacionalidad: nacionalidad, sintomasC: sintomasC1, pruebaC: pruebaC },
                success: function(data) {
                    document.getElementById("datosPersonales").reset();
                    Swal.fire({
                        type: 'success',
                        title: 'AFAC INFORMA',
                        text: 'Sus datos fueron guardados correctamente',
                        showConfirmButton: false,
                        timer: 2900,
                        showConfirmButton: false,
                    });
                }
            });
        }

        return false;
    });
});