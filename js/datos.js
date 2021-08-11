function openDtlls() {
    $("#detalles").toggle(250); //Muestra contenedor 
    $("#lista").toggle("fast"); //Oculta lista

    //document.getElementById('nombre').disabled='false';
}

function closeDtlls() {
    $("#lista").toggle(250); //Muestra lista  
    $("#detalles").toggle("fast"); //Oculta contenedor
    $("#buton").toggle();
    $("#butons").toggle();

    document.getElementById('gstNombr').disabled = true; // NOMBRE
    document.getElementById('gstApell').disabled = true; // APELLIDO
    document.getElementById('gstLunac').disabled = true; // LUGAR DE NACIMIENTO
    document.getElementById('gstFenac').disabled = true; // FECHA DE NACIMIENTO
    document.getElementById('gstStcvl').disabled = true; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = true; //CURP
    document.getElementById('gstRfc').disabled = true; //RFC
    document.getElementById('gstNpspr').disabled = true; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled = true; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled = true; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled = true; // VISA VIGENCIA
    document.getElementById('gstNucrt').disabled = true; // NUMERO DE CARTLLA
    document.getElementById('gstCalle').disabled = true; // CALLE
    document.getElementById('gstNumro').disabled = true; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled = true; // COLONIA
    document.getElementById('gstCpstl').disabled = true; // CODIGO POSTAL
    document.getElementById('gstStado').disabled = true; // CUIDAD
    document.getElementById('gstCasa').disabled = true; // NUM. DE CASA
    document.getElementById('gstClulr').disabled = true; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled = true; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled = true; // CUIDAD

    document.getElementById('gstNmpld').disabled = true; // NUM. DE EMPLEADO
    document.getElementById('gstIdpst').disabled = true; // NUM. DE EMPLEADO
    document.getElementById('gstCargo').disabled = true;

    document.getElementById('gstAreID').disabled = true; //ID área
    document.getElementById('gstPstID').disabled = true; //ID puesto
    document.getElementById('gstSpcID').disabled = true; //ID especialidad
    // document.getElementById('gstSigID').disabled=true;//ID siglas

    document.getElementById('gstIDCat').disabled = true;
    document.getElementById('gstIDSub').disabled = true;
    document.getElementById('gstCorro').disabled = true;
    document.getElementById('gstCinst').disabled = true;
    document.getElementById('gstFeing').disabled = true;

    document.getElementById('gstIDara').disabled = true; //ID del área
    document.getElementById('gstAcReg').disabled = true;
    document.getElementById('gstIDuni').disabled = true;

}

function pdf() {


    var pdfIdper = document.getElementById('pdfIdper').value;


    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;


        for (i = 0; i < res.length; i++) {
            x++;

            if (obj.data[i].gstIdper == pdfIdper) {

                valor = obj.data[i].gstIdper;
                cargo = obj.data[i].gstCargo;
                nombre = obj.data[i].gstNombr;
            }
        }
        var logo = new Image();
        logo.src = '../dist/img/ApéndiceE2-1-min.png';
        var pdf = new jsPDF("p", "mm", "a4");
        pdf.addImage(logo, 'PNG', 0, 0, 210, 280);

        /* INICIO DE PDF*/

        /* OBTENER FECHA DE IMPRESIÓN*/
        var currentDate = new Date().toLocaleDateString('en-GB', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        });

        var fecha = "Fecha de impresión : " + currentDate;
        pdf.setFontSize(9);
        pdf.text(15, 290, fecha);


        // /* OBTENER FECHA DE IMPRESIÓN*/

        /* FUNCIÓN PARA CREAR EL PIE DE PAGINA*/
        const pageCount = pdf.internal.getNumberOfPages();
        for (var i = 1; i <= pageCount; i++) {
            pdf.setFontSize(8)
            pdf.setPage(i);
            pdf.text('Página ' + String(i) + ' de ' + String(pageCount), 220 - 20, 320 - 30, null, null,
                "right");
        }
        /* FUNCIÓN PARA CREAR EL PIE DE PAGINA*/

        window.open(pdf.output('bloburl'))

    })
}
//muestra ventana estudios
function estudio(gstIdper) {

    //   var d=gstIdper.split("*");
    gstIdper;
    $("#Forstd #gstIDper").val(gstIdper);
}


function agrStudio() {

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('gstDocmt', $('#gstDocmt')[0].files[0]);
    paqueteDeDatos.append('gstIDper', $('#gstIDper').prop('value'));
    paqueteDeDatos.append('gstInstt', $('#gstInstt').prop('value'));
    paqueteDeDatos.append('gstCiudad', $('#gstCiudad').prop('value'));
    paqueteDeDatos.append('gstPriod', $('#gstPriod').prop('value'));
    //paqueteDeDatos.append('agrEstudio', $('#agrEstudio').prop('value'));
    //alert(paqueteDeDatos);

    $.ajax({
        url: '../php/docEstudios.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            //console.log(r);
            if (r == 8) {
                $('#vacio').toggle('toggle');
                setTimeout(function() {
                    $('#vacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito').toggle('toggle');
                setTimeout(function() {
                    $('#exito').toggle('toggle');
                }, 4000);

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

function actStudio() {

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('EgstDocmt', $('#EgstDocmt')[0].files[0]);
    paqueteDeDatos.append('EgstIDper', $('#EgstIDper').prop('value'));
    paqueteDeDatos.append('EgstInstt', $('#EgstInstt').prop('value'));
    paqueteDeDatos.append('EgstCiudad', $('#EgstCiudad').prop('value'));
    paqueteDeDatos.append('EgstPriod', $('#EgstPriod').prop('value'));
    //paqueteDeDatos.append('agrEstudio', $('#agrEstudio').prop('value'));
    //alert(paqueteDeDatos);

    $.ajax({
        url: '../php/actEstudios.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            //console.log(r);
            if (r == 8) {
                $('#vacio1').toggle('toggle');
                setTimeout(function() {
                    $('#vacio1').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito1').toggle('toggle');
                setTimeout(function() {
                    $('#exito1').toggle('toggle');
                }, 4000);

            } else if (r == 1) {
                $('#falla1').toggle('toggle');
                setTimeout(function() {
                    $('#falla1').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error1').toggle('toggle');
                setTimeout(function() {
                    $('#error1').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom1').toggle('toggle');
                setTimeout(function() {
                    $('#renom1').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn1').toggle('toggle');
                setTimeout(function() {
                    $('#forn1').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta1').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta1').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido1').toggle('toggle');
                setTimeout(function() {
                    $('#repetido1').toggle('toggle');
                }, 4000);
            }
        }
    });
}

function actProfsn() {


    var gstIdpro = document.getElementById('AgstIdpro').value;
    //var gstIDper = document.getElementById('AgstIDper').value;
    var gstPusto = document.getElementById('AgstPusto').value;
    var gstMpres = document.getElementById('AgstMpres').value;
    var gstIDpai = document.getElementById('AgstIDpai').value;
    var gstCidua = document.getElementById('AgstCidua').value;
    var gstActiv = document.getElementById('AgstActiv').value;
    var gstFntra = document.getElementById('AgstFntra').value;
    var gstFslda = document.getElementById('AgstFslda').value;

    datos = 'gstIdpro=' + gstIdpro + '&gstPusto=' + gstPusto + '&gstMpres=' + gstMpres + '&gstIDpai=' + gstIDpai + '&gstCidua=' + gstCidua + '&gstActiv=' + gstActiv + '&gstFntra=' + gstFntra + '&gstFslda=' + gstFslda + '&opcion=actProfsn';
    // alert(datos);

    if (gstIdpro == '' || gstPusto == '' || gstMpres == '' || gstIDpai == '' || gstCidua == '' || gstActiv == '' || gstFntra == '' || gstFslda == '') {

        $('#empty4').toggle('toggle');
        setTimeout(function() {
            $('#empty4').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#succe4').toggle('toggle');
                setTimeout(function() {
                    $('#succe4').toggle('toggle');
                }, 2000);
            } else {
                $('#danger4').toggle('toggle');
                setTimeout(function() {
                    $('#danger4').toggle('toggle');
                }, 2000);
            }
        });
    }

}

function profesion(gstIdper) {

    $("#Forpro #AgstIDper").val(gstIdper);
}

function actPrfsn(datos) {

    var d = datos.split("*");
    $("#actForpro #AgstIdpro").val(d[0]);
    $("#actForpro #AgstIDper").val(d[1]);
    $("#actForpro #AgstPusto").val(d[2]);
    $("#actForpro #AgstMpres").val(d[3]);
    $("#actForpro #AgstIDpai").val(d[4]);
    $("#actForpro #AgstCidua").val(d[5]);
    $("#actForpro #AgstActiv").val(d[6]);
    $("#actForpro #AgstFntra").val(d[7]);
    $("#actForpro #AgstFslda").val(d[8]);

}

function agrProfsn() {

    var gstIDper = document.getElementById('AgstIDper').value;
    var gstPusto = document.getElementById('gstPusto').value;
    var gstMpres = document.getElementById('gstMpres').value;
    var gstIDpai = document.getElementById('gstIDpai').value;
    var gstCidua = document.getElementById('gstCidua').value;
    var gstActiv = document.getElementById('gstActiv').value;
    var gstFntra = document.getElementById('gstFntra').value;
    var gstFslda = document.getElementById('gstFslda').value;

    datas = 'gstIDper=' + gstIDper + '&gstPusto=' + gstPusto + '&gstMpres=' + gstMpres + '&gstIDpai=' + gstIDpai + '&gstCidua=' + gstCidua + '&gstActiv=' + gstActiv + '&gstFntra=' + gstFntra + '&gstFslda=' + gstFslda + '&opcion=agrProfsn';

    //alert(datas);

    if (gstIDper == '' || gstPusto == '' || gstMpres == '' || gstIDpai == '' || gstCidua == '' || gstActiv == '' || gstFntra == '' || gstFslda == '') {

        $('#empty3').toggle('toggle');
        setTimeout(function() {
            $('#empty3').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: datas
        }).done(function(respuesta) {
            if (respuesta == 0) {
                $('#succe3').toggle('toggle');
                setTimeout(function() {
                    $('#succe3').toggle('toggle');
                }, 2000);

                $('#vaciar').show('slow');
                $('#agregar').hide();

                //$('#exito').slideDown('slow');
                //$('#exito').slideUp('slow');

            } else {
                $('#danger3').toggle('toggle');
                setTimeout(function() {
                    $('#danger3').toggle('toggle');
                }, 2000);
            }
        });
    }
}

function mostrar() {
    $('#vaciar').hide();
    $('#agregar').show();

}

function mosEtdio() {
    $('#vacia').hide();
    $('#agrega').show();

}


function asignacion(gstIdper) {

    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (i = 0; i < res.length; i++) {

            if (obj.data[i].gstIdper == gstIdper) {
                // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
                $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                $("#Dtall #gstApell").val(obj.data[i].gstApell);
                $("#Dtall #gstAreIDasig").val(obj.data[i].gstAreID); //ID área
                $("#Dtall #gstIDara").val(obj.data[i].gstIDara);
                $("#Dtall #gstANmpld").val(obj.data[i].gstNmpld);
            }
        }
    })

}


function perfil(gstIdper) {

    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (p = 0; p < res.length; p++) {
            if (obj.data[p].gstIdper == gstIdper) {


                personal = obj.data[p].gstIdper + '*' + obj.data[p].gstIDCat + '*' + obj.data[p].gstEvalu + '*' + obj.data[p].gstCatgr;

                var d = personal.split("*");
                gstIdper = d[0];
                gstIDCat = d[1];
                gstEvalu = d[2];
                gstCatgr = d[3];

                if (gstEvalu == 'NO') {
                    $("#ocultar1").hide();
                    $("#ocultar2").hide();
                } else {
                    $("#ocultar1").show();
                    $("#ocultar2").show();
                                        document.getElementById('evaluaciones').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                }


                $.ajax({
                    url: '../php/conDatos.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    for (i = 0; i < res.length; i++) {

                        if (obj.data[i].gstIdper == gstIdper) {

                            // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);


                            $("#Evalua #gstIDCate").val(obj.data[i].gstIDCat);
                            $("#Evalua #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            // $("#Evalúa #evalu_categr").val(obj.data[i].gstCatgr);
                            // $("#Evalúa #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#nombrecompleto").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#cargopersonal").val(obj.data[i].gstCargo);
                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
                            $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
                            $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
                            $("#Dtall #gstVignt").val(obj.data[i].gstVignt);
                            $("#Dtall #gstNucrt").val(obj.data[i].gstNucrt);
                            $("#Dtall #gstCalle").val(obj.data[i].gstCalle);
                            $("#Dtall #gstNumro").val(obj.data[i].gstNumro);
                            $("#Dtall #gstClnia").val(obj.data[i].gstClnia);
                            $("#Dtall #gstCpstl").val(obj.data[i].gstCpstl);
                            $("#Dtall #gstCiuda").val(obj.data[i].gstCiuda);
                            $("#Dtall #gstStado").val(obj.data[i].gstStado);
                            $("#Dtall #gstCasa").val(obj.data[i].gstCasa);
                            $("#Dtall #gstClulr").val(obj.data[i].gstClulr);
                            $("#Dtall #gstExTel").val(obj.data[i].gstExTel);

                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);

                            //alert(obj.data[i].gstIdpst);                           
                            $("#Pusto #Codig").val(obj.data[i].gstCodig);
                            $("#Pusto #Nivel").val(obj.data[i].gstNivel);
                            $("#Pusto #Gnric").val(obj.data[i].gstGnric);

                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);

                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);

                            $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            // $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);

                            $("#Dtall #gstCorro").val(obj.data[i].gstCorro);
                            $("#Dtall #gstCinst").val(obj.data[i].gstCinst);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            
                            $("#Pusto #IDuni").val(obj.data[i].gstIDuni);

                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);

                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara);

                            $("#Pusto #AcReg").val(obj.data[i].gstAcReg);                            
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

                            $("#Pusto #ejcutiva").val(obj.data[i].gstAreje);
                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área ejecutiva

                            $("#Pusto #gstNucrt").val(obj.data[i].gstNucrt); //ubicion
                            //        alert(obj.data[i].gstAreID);

                            $("#Pusto #nompuesto").val(obj.data[i].gstNpsto); //Nombre del puesto
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #spcialidad").val(obj.data[i].gstSpoac); //ID especialidad  
                            $("#Pusto #sigla").val(obj.data[i].gstSigla);
                            $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

                        }
                    }
                })

                $.ajax({
                    url: '../php/conPerson.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    for (i = 0; i < res.length; i++) {

                        if (obj.data[i].gstIdper == gstIdper) {

                            // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
                            $("#Evalúa #evalu_categr").val(obj.data[i].gstCatgr);
                            $("#Evalúa #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#nombrecompleto").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#cargopersonal").val(obj.data[i].gstCargo);
                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
                            $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
                            $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
                            $("#Dtall #gstVignt").val(obj.data[i].gstVignt);
                            $("#Dtall #gstNucrt").val(obj.data[i].gstNucrt);
                            $("#Dtall #gstCalle").val(obj.data[i].gstCalle);
                            $("#Dtall #gstNumro").val(obj.data[i].gstNumro);
                            $("#Dtall #gstClnia").val(obj.data[i].gstClnia);
                            $("#Dtall #gstCpstl").val(obj.data[i].gstCpstl);
                            $("#Dtall #gstCiuda").val(obj.data[i].gstCiuda);
                            $("#Dtall #gstStado").val(obj.data[i].gstStado);
                            $("#Dtall #gstCasa").val(obj.data[i].gstCasa);
                            $("#Dtall #gstClulr").val(obj.data[i].gstClulr);
                            $("#Dtall #gstExTel").val(obj.data[i].gstExTel);

                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
                            $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
                            $("#Pusto #gstCorro").val(obj.data[i].gstCorro);
                            $("#Pusto #gstCinst").val(obj.data[i].gstCinst);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara);

                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área

                            //        alert(obj.data[i].gstAreID);
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

                        }
                    }
                })

        $.ajax({
                    url: '../php/conSpcialidad.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var ss = 0;

                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead></thead><tbody>';
                    for (s = 0; s < res.length; s++) {
                        ss++;

                        if (obj.data[s].gstIDper == gstIdper) {
                            gstID = obj.data[s].gstIDper;
                            if (obj.data[s].gstIdcat != 24) {
                                html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td></tr>";
                            }
                            // <td><a class='btn btn-default'  href='" + /*obj.data[H].gstDocmt*/ + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + gstID + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td>
                        }
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#especialidades").html(html);
                })


     $.ajax({
                    url: '../php/gesCurso.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;


                    //TODO AQUÍ ES LO QUE LLEVA
                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>INICIO</th><th><i></i>HORA</th><th><i></i>FINAL</th><th><i></i>PROCESO</th><th><i></i>ESTATUS</th></tr></thead><tbody>';
                    for (ii = 0; ii < res.length; ii++) {
                        x++;

                        // if (gstIdper == obj.data[ii].idinsp) {

                        //     //BASICOS
                        //     if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                        //         document.getElementById('bscos').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                        //         $("#Bfecha").html(obj.data[ii].fcursof);

                        //     } else if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                        //         document.getElementById('bscos').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                        //         $("#Bfecha").html(obj.data[ii].fcursof);
                        //     } else
                        //     if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'PENDIENTE') {
                        //         document.getElementById('bscos').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                        //         $("#Bfecha").html('PENDIENTE');
                        //     }

                        //     //RECURRENTES recurnt
                        //     if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                        //         document.getElementById('recurnt').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                        //         $("#Rfecha").html(obj.data[ii].fcursof);

                        //     } else if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                        //         document.getElementById('recurnt').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                        //         $("#Rfecha").html(obj.data[ii].fcursof);
                        //     } else
                        //     if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'PENDIENTE') {
                        //         document.getElementById('recurnt').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                        //         $("#Rfecha").html('PENDIENTE');
                        //     }

                        //     //ESPECIFICOS specifico
                        //     if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                        //         document.getElementById('specifico').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                        //         $("#Efecha").html(obj.data[ii].fcursof);

                        //     } else if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                        //         document.getElementById('specifico').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                        //         $("#Efecha").html(obj.data[ii].fcursof);
                        //     } else
                        //     if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'PENDIENTE') {
                        //         document.getElementById('specifico').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                        //         $("#Efecha").html('PENDIENTE');
                        //     }

                        // }

                        gstVignc = obj.data[ii].gstVignc * 12;
                        vence = gstVignc - 6;

                        //oi = '2023/01/28';
                        //var hoy = new Date(oi);

                        var hoy = new Date();
                        var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

                        var termino = new Date(obj.data[ii].fechaf);
                        var finaliza = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());

                        finaliza.setMonth(finaliza.getMonth() + gstVignc);
                        termino.setMonth(termino.getMonth() + vence);
                        termino.setDate(termino.getDate() + 1);

                        var ftermino = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());


                        if (factual >= finaliza) {
                            status = "<a type='button' class='btn btn-danger' data-toggle='modal' >VENCIDO</a>";
                            //console.log(status);
                        } else
                        if (factual <= ftermino) {
                            status = "<a type='button' class='btn btn-success' data-toggle='modal' >VIGENTE</a>";
                            //console.log(status);
                        } else
                        if (factual >= ftermino) {
                            status = "<a type='button' class='btn btn-warning' data-toggle='modal' >POR VENCER</a>";
                            //console.log(status);
                        }

                        //
                        programados = 0;

                        if (obj.data[ii].idinsp == gstIdper) {
                            if (obj.data[ii].evaluacion >= '0') {

                                year = obj.data[ii].fcurso.substring(0, 4);
                                month = obj.data[ii].fcurso.substring(5, 7);
                                day = obj.data[ii].fcurso.substring(8, 10);
                                Finicio = day + '/' + month + '/' + year;

                                year = obj.data[ii].fechaf.substring(0, 4);
                                month = obj.data[ii].fechaf.substring(5, 7);
                                day = obj.data[ii].fechaf.substring(8, 10);
                                Final = day + '/' + month + '/' + year;

                                idlista = obj.data[ii].idmstr;
                                if (obj.data[ii].confirmar == 'CONFIRMAR') {
                                    html += "<tr><td>" + obj.data[ii].gstIdlsc + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><a type='button' title='Por confirmar' onclick='agregar(" + '"' + obj.data[ii].id_curso + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>" + obj.data[ii].proceso + "</a></td><td>" + status + "</td></tr>";
                                } else if (obj.data[ii].confirmar == 'CONFIRMADO') {
                                    html += "<tr><td>" + x + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><a type='button' title='Por confirmar' onclick='agregar(" + '"' + obj.data[ii].id_curso + '"' + ")' class='btn btn-success' data-toggle='modal' data-target='#modal-confirma'>CONFIRMADO</a></td><td>" + status + "</td></tr>";
                                } else {}

                                if (obj.data[ii].proceso == 'PENDIENTE') {
                                    programados++;
                                }


                                //$("#programado").html(programados); 
                                document.getElementById("programado").innerHTML = programados + '/22';
                            }
                        }

                    }
                    html += '</tbody></table></div></div></div>';
                    $("#cursos").html(html);
                })



         $.ajax({
                    url: '../php/conEstudios.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
                    for (H = 0; H < res.length; H++) {
                        x++;

                        if (obj.data[H].gstIDper == gstIdper) {

                            datos = obj.data[H].gstIdstd + "*" + obj.data[H].gstIDper + "*" + obj.data[H].gstInstt + "*" + obj.data[H].gstCiuda + "*" + obj.data[H].gstPriod + "*" + obj.data[H].gstDocmt + "*" + obj.data[H].gstIdstd;

                            html += "<tr><td>" + H + "</td><td>" + obj.data[H].gstInstt + "</td><td>" + obj.data[H].gstCiuda + "</td><td> " + obj.data[H].gstPriod + "</td><td><a class='btn btn-default'  href='" + obj.data[H].gstDocmt + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td> </tr>";
                           // document.getElementById('estudios').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';

                        } else {

                            //                      document.getElementById('estudios').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';

                        }

                    }
                    html += '</tbody></table></div></div></div>';
                    $("#studios").html(html);
                })

       $.ajax({
                    url: '../php/conProfesion.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>PAÍS</th><th><i></i>CIUDAD</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>ACCIÓN</th></tr></thead><tbody>';
                    for (P = 0; P < res.length; P++) {

                        year = obj.data[P].gstFntra.substring(0, 4);
                        month = obj.data[P].gstFntra.substring(5, 7);
                        day = obj.data[P].gstFntra.substring(8, 10);
                        gstFntra = day + '/' + month + '/' + year;

                        year = obj.data[P].gstFslda.substring(0, 4);
                        month = obj.data[P].gstFslda.substring(5, 7);
                        day = obj.data[P].gstFslda.substring(8, 10);
                        gstFslda = day + '/' + month + '/' + year;

                        x++;
                        datos = obj.data[P].gstIdpro + "*" + obj.data[P].gstIDper + "*" + obj.data[P].gstPusto + "*" + obj.data[P].gstMpres + "*" + obj.data[P].gstIDpai + "*" + obj.data[P].gstCidua + "*" + obj.data[P].gstActiv + "*" + obj.data[P].gstFntra + "*" + obj.data[P].gstFslda;

                        if (obj.data[P].gstIDper == gstIdper) {

                            html += "<tr><td>" + P + "</td><td>" + obj.data[P].gstPusto + "</td><td>" + obj.data[P].gstMpres + "</td><td> " + obj.data[P].gstPais + "</td><td> " + obj.data[P].gstCidua + "</td><td> " + obj.data[P].gstActiv + "</td><td> " + gstFntra + "</td><td> " + gstFslda + "</td><td> <a type='button' onclick='actPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalprofesion'><i class='fa fa-edit text-info'></i></a></td> </tr>";

                            //document.getElementById('profesions').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';

                        } else {
                            //                       document.getElementById('profesions').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                        }
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#profsions").html(html);
                })

                $.ajax({
                    url: '../php/conEvalu.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    // html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th><i></i>REQUISITOS</th><th style="width:5%"><i></i>CUMPLE</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
                    html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CUMPLE</th><th style="width:1%;"><i></i>SI</th><th style="width:1%"><i></i>NO</th></tr></thead><tbody>';
                    for (E = 0; E < res.length; E++) {
                        x++;

                        //if(obj.data[E].gstCatga == gstIDCat){

                        //if(obj.data[E].gstOrden==1){    
                        html += "<input type='hidden' name='gstInspr[]' id='gstInspr' value='" + gstIdper + "'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='" + obj.data[E].gstIdprm + "'/><td>" + obj.data[E].gstOrden + "</td><td>" + obj.data[E].gstPrmtr + "</td><td style='text-align: center;'> <input type='checkbox' value='SI' name='actual[]' /> </td> <td style='text-align: center;'> <input type='checkbox' value='NO' name='actual[]' /></td></tr>";
                        //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                        // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                        //}<td><input id='comntr' name='comntr[]'> </td>
                        //}
                    }
                    html += '</tbody></table></div>';
                    $("#evlacns").html(html);
                })
            }
        }
    })

}

//////////////DATOS DEL PERSONAL//////////// 

function inspector(gstIdper) {


    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (p = 0; p < res.length; p++) {
            if (obj.data[p].gstIdper == gstIdper) {


                personal = obj.data[p].gstIdper + '*' + obj.data[p].gstIDCat + '*' + obj.data[p].gstEvalu + '*' + obj.data[p].gstCatgr;

                var d = personal.split("*");
                gstIdper = d[0];
                gstIDCat = d[1];
                gstEvalu = d[2];
                gstCatgr = d[3];

                consultaCurso(gstIdper + '*' + gstIDCat);

                if (gstEvalu == 'NO') {
                    $("#ocultar1").hide();
                    $("#ocultar2").hide();
                    //                    document.getElementById('evaluaciones').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                } else {
                    $("#ocultar1").show();
                    $("#ocultar2").show();
                    document.getElementById('evaluaciones').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                }


                $.ajax({
                    url: '../php/conDatos.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    for (i = 0; i < res.length; i++) {

                        if (obj.data[i].gstIdper == gstIdper) {
//alert(gstIdper);


                            $("#Evalua #gstIDCate").val(obj.data[i].gstIDCat);
                            $("#Evalua #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#nombrecompleto").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#cargopersonal").val(obj.data[i].gstCargo);
                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstFeing").val(obj.data[i].gstFeing); //TODO AQUI LE MOVI
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
                            $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
                            $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
                            $("#Dtall #gstVignt").val(obj.data[i].gstVignt);
                            //$("#Dtall #gstNucrt").val(obj.data[i].gstNucrt);
                            $("#Dtall #gstCalle").val(obj.data[i].gstCalle);
                            $("#Dtall #gstNumro").val(obj.data[i].gstNumro);
                            $("#Dtall #gstClnia").val(obj.data[i].gstClnia);
                            $("#Dtall #gstCpstl").val(obj.data[i].gstCpstl);
                            $("#Dtall #gstCiuda").val(obj.data[i].gstCiuda);
                            $("#Dtall #gstStado").val(obj.data[i].gstStado);
                            $("#Dtall #gstCasa").val(obj.data[i].gstCasa);
                            $("#Dtall #gstClulr").val(obj.data[i].gstClulr);
                            $("#Dtall #gstExTel").val(obj.data[i].gstExTel);

                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);

                            $("#Pusto #gstNucrt").val(obj.data[i].gstNucrt); //ubicion
                            //alert(obj.data[i].gstIdpst);                           
                            $("#Pusto #Codig").val(obj.data[i].gstCodig);
                            $("#Pusto #Nivel").val(obj.data[i].gstNivel);
                            $("#Pusto #Gnric").val(obj.data[i].gstGnric);

                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);



                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);

                            // $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            // $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);

                            $("#Dtall #gstCorro").val(obj.data[i].gstCorro);
                            $("#Dtall #gstCinst").val(obj.data[i].gstCinst);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);

                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara);
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

                            $("#Pusto #ejcutiva").val(obj.data[i].gstAreje);
                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área ejecutiva

                            //        alert(obj.data[i].gstAreID);

                            $("#Pusto #nompuesto").val(obj.data[i].gstNpsto); //Nombre del puesto
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #spcialidad").val(obj.data[i].gstSpoac); //ID especialidad  
                            $("#Pusto #sigla").val(obj.data[i].gstSigla);
                            $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas




                        }
                    }
                })

                $.ajax({
                    url: '../php/conPerson.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    for (i = 0; i < res.length; i++) {

                        if (obj.data[i].gstIdper == gstIdper) {

                            // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
                            $("#Evalúa #evalu_categr").val(obj.data[i].gstCatgr);
                            $("#Evalúa #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#nombrecompleto").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#cargopersonal").val(obj.data[i].gstCargo);
                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
                            $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
                            $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
                            $("#Dtall #gstVignt").val(obj.data[i].gstVignt);

                            $("#Dtall #gstCalle").val(obj.data[i].gstCalle);
                            $("#Dtall #gstNumro").val(obj.data[i].gstNumro);
                            $("#Dtall #gstClnia").val(obj.data[i].gstClnia);
                            $("#Dtall #gstCpstl").val(obj.data[i].gstCpstl);
                            $("#Dtall #gstCiuda").val(obj.data[i].gstCiuda);
                            $("#Dtall #gstStado").val(obj.data[i].gstStado);
                            $("#Dtall #gstCasa").val(obj.data[i].gstCasa);
                            $("#Dtall #gstClulr").val(obj.data[i].gstClulr);
                            $("#Dtall #gstExTel").val(obj.data[i].gstExTel);

                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
                            $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
                            $("#Pusto #gstCorro").val(obj.data[i].gstCorro);
                            $("#Pusto #gstCinst").val(obj.data[i].gstCinst);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara);

                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área

                            //        alert(obj.data[i].gstAreID);
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

                        }
                    }
                })


                $.ajax({
                    url: '../php/conSpcialidad.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var ss = 0;

                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead></thead><tbody>';
                    for (s = 0; s < res.length; s++) {
                        ss++;

                        if (obj.data[s].gstIDper == gstIdper) {
                            gstID = obj.data[s].gstIDper;
                            if (obj.data[s].gstIdcat != 24) {
                                html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td></tr>";
                            }
                            // <td><a class='btn btn-default'  href='" + /*obj.data[H].gstDocmt*/ + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + gstID + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td>
                        }
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#especialidades").html(html);
                })


                $.ajax({
                    url: '../php/gesCurso.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;


                    //TODO AQUÍ ES LO QUE LLEVA
                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>INICIO</th><th><i></i>HORA</th><th><i></i>FINAL</th><th><i></i>PROCESO</th><th><i></i>ESTATUS</th></tr></thead><tbody>';
                    for (ii = 0; ii < res.length; ii++) {
                        x++;

                        if (gstIdper == obj.data[ii].idinsp) {




                            //BASICOS
                            if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                                $("#Bfecha").html(obj.data[ii].fcursof);

                            } else if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                                $("#Bfecha").html(obj.data[ii].fcursof);
                            } else
                            if (obj.data[ii].gstTipo == 'BÁSICO' && obj.data[ii].proceso == 'PENDIENTE') {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                                $("#Bfecha").html('PENDIENTE');
                            }

                            //RECURRENTES recurnt
                            if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                                document.getElementById('recurnt').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                                $("#Rfecha").html(obj.data[ii].fcursof);

                            } else if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                                document.getElementById('recurnt').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                                $("#Rfecha").html(obj.data[ii].fcursof);
                            } else
                            if (obj.data[ii].gstTipo == 'RECURRENTES' && obj.data[ii].proceso == 'PENDIENTE') {
                                document.getElementById('recurnt').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                                $("#Rfecha").html('PENDIENTE');
                            }

                            //ESPECIFICOS specifico
                            if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                                document.getElementById('specifico').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                                $("#Efecha").html(obj.data[ii].fcursof);

                            } else if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                                document.getElementById('specifico').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                                $("#Efecha").html(obj.data[ii].fcursof);
                            } else
                            if (obj.data[ii].gstTipo == 'ESPECIFICOS' && obj.data[ii].proceso == 'PENDIENTE') {
                                document.getElementById('specifico').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                                $("#Efecha").html('PENDIENTE');
                            }

                        }

                        gstVignc = obj.data[ii].gstVignc * 12;
                        vence = gstVignc - 6;

                        //oi = '2023/01/28';
                        //var hoy = new Date(oi);

                        var hoy = new Date();
                        var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

                        var termino = new Date(obj.data[ii].fechaf);
                        var finaliza = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());

                        finaliza.setMonth(finaliza.getMonth() + gstVignc);
                        termino.setMonth(termino.getMonth() + vence);
                        termino.setDate(termino.getDate() + 1);

                        var ftermino = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());


                        if (factual >= finaliza) {
                            status = "<a type='button' class='btn btn-danger' data-toggle='modal' >VENCIDO</a>";
                            //console.log(status);
                        } else
                        if (factual <= ftermino) {
                            status = "<a type='button' class='btn btn-success' data-toggle='modal' >VIGENTE</a>";
                            //console.log(status);
                        } else
                        if (factual >= ftermino) {
                            status = "<a type='button' class='btn btn-warning' data-toggle='modal' >POR VENCER</a>";
                            //console.log(status);
                        }

                        //
                        programados = 0;
                        FINALIZADO = 0;
                        CANCELADO = 0;
                        insp = 0 ;

                        if (obj.data[ii].idinsp == gstIdper) {
                            if (obj.data[ii].evaluacion >= '0') {

                                year = obj.data[ii].fcurso.substring(0, 4);
                                month = obj.data[ii].fcurso.substring(5, 7);
                                day = obj.data[ii].fcurso.substring(8, 10);
                                Finicio = day + '/' + month + '/' + year;

                                year = obj.data[ii].fechaf.substring(0, 4);
                                month = obj.data[ii].fechaf.substring(5, 7);
                                day = obj.data[ii].fechaf.substring(8, 10);
                                Final = day + '/' + month + '/' + year;

                                idlista = obj.data[ii].idmstr;
                                if (obj.data[ii].confirmar == 'CONFIRMAR') {
                                    html += "<tr><td>" + obj.data[ii].gstIdlsc + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><a type='button' title='Por confirmar' onclick='agregar(" + '"' + obj.data[ii].id_curso + '"' + ")' class='btn btn-warning' data-toggle='modal' data-target='#modal-confirma'>" + obj.data[ii].proceso + "</a></td><td>" + status + "</td></tr>";
                                } else if (obj.data[ii].confirmar == 'CONFIRMADO') {
                                    html += "<tr><td>" + x + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><a type='button' title='Por confirmar' onclick='agregar(" + '"' + obj.data[ii].id_curso + '"' + ")' class='btn btn-success' data-toggle='modal' data-target='#modal-confirma'>CONFIRMADO</a></td><td>" + status + "</td></tr>";
                                } else {}

                                if (obj.data[ii].proceso == 'PENDIENTE') {
                                    programados++;
                                }
                                if (obj.data[ii].proceso == 'FINALIZADO') {
                                    FINALIZADO++;
                                }
                                if (obj.data[ii].proceso == 'CANCELADO') {
                                    CANCELADO++;
                                }
                                if (obj.data[ii].estado == '0') {
                                    insp++;
                                }
                                //$("#programado").html(programados); 
                                document.getElementById("programado").innerHTML = programados + '/' + insp ;
                                document.getElementById("FINALIZADO").innerHTML = FINALIZADO + '/' + insp ;
                                document.getElementById("CANCELADO").innerHTML = CANCELADO + '/' + insp ;
                            }
                        }

                    }
                    html += '</tbody></table></div></div></div>';
                    $("#cursos").html(html);
                })


                $.ajax({
                    url: '../php/conEstudios.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
                    for (H = 0; H < res.length; H++) {
                        x++;

                        if (obj.data[H].gstIDper == gstIdper) {

                            datos = obj.data[H].gstIdstd + "*" + obj.data[H].gstIDper + "*" + obj.data[H].gstInstt + "*" + obj.data[H].gstCiuda + "*" + obj.data[H].gstPriod + "*" + obj.data[H].gstDocmt + "*" + obj.data[H].gstIdstd;

                            html += "<tr><td>" + H + "</td><td>" + obj.data[H].gstInstt + "</td><td>" + obj.data[H].gstCiuda + "</td><td> " + obj.data[H].gstPriod + "</td><td><a class='btn btn-default'  href='" + obj.data[H].gstDocmt + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td> </tr>";
                            document.getElementById('estudios').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';

                        } else {

                            //                      document.getElementById('estudios').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';

                        }




                    }
                    html += '</tbody></table></div></div></div>';
                    $("#studios").html(html);
                })

                $.ajax({
                    url: '../php/conProfesion.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>PAÍS</th><th><i></i>CIUDAD</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>ACCIÓN</th></tr></thead><tbody>';
                    for (P = 0; P < res.length; P++) {

                        year = obj.data[P].gstFntra.substring(0, 4);
                        month = obj.data[P].gstFntra.substring(5, 7);
                        day = obj.data[P].gstFntra.substring(8, 10);
                        gstFntra = day + '/' + month + '/' + year;

                        year = obj.data[P].gstFslda.substring(0, 4);
                        month = obj.data[P].gstFslda.substring(5, 7);
                        day = obj.data[P].gstFslda.substring(8, 10);
                        gstFslda = day + '/' + month + '/' + year;

                        x++;
                        datos = obj.data[P].gstIdpro + "*" + obj.data[P].gstIDper + "*" + obj.data[P].gstPusto + "*" + obj.data[P].gstMpres + "*" + obj.data[P].gstIDpai + "*" + obj.data[P].gstCidua + "*" + obj.data[P].gstActiv + "*" + obj.data[P].gstFntra + "*" + obj.data[P].gstFslda;

                        if (obj.data[P].gstIDper == gstIdper) {

                            html += "<tr><td>" + P + "</td><td>" + obj.data[P].gstPusto + "</td><td>" + obj.data[P].gstMpres + "</td><td> " + obj.data[P].gstPais + "</td><td> " + obj.data[P].gstCidua + "</td><td> " + obj.data[P].gstActiv + "</td><td> " + gstFntra + "</td><td> " + gstFslda + "</td><td> <a type='button' onclick='actPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalprofesion'><i class='fa fa-edit text-info'></i></a></td> </tr>";

                            document.getElementById('profesions').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';

                        } else {
                            //                       document.getElementById('profesions').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                        }
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#profsions").html(html);
                })

                $.ajax({
                    url: '../php/conEvalu.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    // html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th><i></i>REQUISITOS</th><th style="width:5%"><i></i>CUMPLE</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
                    html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CUMPLE</th><th style="width:1%;"><i></i>SI</th><th style="width:1%"><i></i>NO</th></tr></thead><tbody>';
                    for (E = 0; E < res.length; E++) {
                        x++;

                        //if(obj.data[E].gstCatga == gstIDCat){

                        //if(obj.data[E].gstOrden==1){    
                        html += "<input type='hidden' name='gstInspr[]' id='gstInspr' value='" + gstIdper + "'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='" + obj.data[E].gstIdprm + "'/><td>" + obj.data[E].gstOrden + "</td><td>" + obj.data[E].gstPrmtr + "</td><td style='text-align: center;'> <input type='checkbox' value='SI' name='actual[]' /> </td> <td style='text-align: center;'> <input type='checkbox' value='NO' name='actual[]' /></td></tr>";
                        //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                        // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                        //}<td><input id='comntr' name='comntr[]'> </td>
                        //}
                    }
                    html += '</tbody></table></div>';
                    $("#evlacns").html(html);
                })

            }
        }
    })

}
///////////DATOS PERSONAL FINAL DE CONSULTA/////////////

function consultaCurso(gst) {


    var d = gst.split("*");


    gstIdper = d[0];
    gstCateg = d[1];
    //alert('valor: '+d[0]);

    // $.ajax({
    //     url: '../php/gesCurso.php',
    //     type: 'POST'
    // }).done(function(resp) {
    //     obj = JSON.parse(resp);
    //     var res = obj.data;

 
        $.ajax({
            url: '../php/lisOblig.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;
            var x = 0;

            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="obliga" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>DURACIÓN</th><th><i></i>PROCESO</th></tr></thead><tbody>';
            for (o = 0; o < res.length; o++) {

                x++;

                if (obj.data[o].gstIDper == gstIdper && obj.data[o].gstCsigl == 'TODOS') {
          /*+ obj.data[o].status +*/ 
                    html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstDrcin + "</td><td>PENDIENTE</td> </tr>";
                }else{

                }


            }
            html += '</tbody></table></div></div></div>';
            $("#obligados").html(html);
        })


   // })


}


function evaluar() {

    var gstInspr = new Array();
    $("input[name='gstInspr[]']:hidden").each(function() {
        gstInspr.push($(this).val());
    });

    var gstIdprm = new Array();
    $("input[name='gstIdprm[]']:hidden").each(function() {
        gstIdprm.push($(this).val());
    });

    var actual = '';
    $('#evlacn input[type=checkbox]').each(function() {
        if (this.checked) {
            actual += ',' + $(this).val();
        }
    });

    $("input:checkbox").prop('checked', $(this).prop("checked"));



    actuals = actual.substr(1);

    comntr = document.getElementById('comntr').value;
    //evla = document.getElementById('evla').value;

    datos = 'gstInspr=' + gstInspr + '&gstIdprm=' + gstIdprm + '&actual=' + actuals + '&comntr=' + comntr + '&opcion=evaluar';
    //alert(datos);

    if (actual.length >= '12' && '12' >= actual.length) {


        if (gstInspr == ',,,' || gstIdprm == ',,,') {

            $('#empty0').toggle('toggle');
            setTimeout(function() {
                $('#empty0').toggle('toggle');
            }, 2000);

            return;
        } else {
            $.ajax({
                url: '../php/agrEvalu.php',
                type: 'POST',
                data: datos
            }).done(function(respuesta) {
                console.log(respuesta);
                if (respuesta == 0) {
                    $('#succe0').toggle('toggle');
                    setTimeout(function() {
                        $('#succe0').toggle('toggle');
                    }, 2000);

                    document.getElementById('button').disabled = 'false';
                    document.getElementById("button").style.color = "silver";

                } else {
                    $('#danger0').toggle('toggle');
                    setTimeout(function() {
                        $('#danger0').toggle('toggle');
                    }, 2000);
                }
            });
        }
    } else {

        $('#empty0').toggle('toggle');
        setTimeout(function() {
            $('#empty0').toggle('toggle');
        }, 2000);

        return;

    }

}


function resultado(result) {

    $.ajax({
        url: '../php/conResult.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        html = '<div class="col-sm-12"><table class="table table-striped table-bordered dataTable"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th style="width:70%"><i></i>PARAMETROS</th><th style="width:15%"><i></i>ESTADO</th></tr></thead><tbody>';
        for (i = 0; i < res.length; i++) {

            if (obj.data[i].gstIDins == result) {

                if (obj.data[i].gstCmpli == 'NO') {
                    html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-danger'>NO CUMPLE</span></td></tr>";
                }
                if (obj.data[i].gstCmpli == 'SI') {
                    html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-success'>CUMPLIO</span></td></tr>";
                }
            }
        }
        html += '</tbody></table></div>';
        $("#rsltad").html(html);
    })

    id = result;

    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (r = 0; r < res.length; r++) {
            if (obj.data[r].gstIdper == id) {


                result = obj.data[r].gstIdper + '*' + obj.data[r].gstNombr + '*' + obj.data[r].gstIDCat + '*' + obj.data[r].gstCatgr + '*' + obj.data[r].gstComnt;
                var d = result.split("*");

                $("#Result #pdfIdper").val(d[0]);
                $("#Result #evalu_nombre").val(d[1]);
                $("#Result #IDCat").val(d[2]);
                $("#Result #gstComnt").val(d[4]);
            }
        }
    })

}


function actEstudio(datos) {


    /*datos = obj.data[H].gstIdstd
    +"*"+obj.data[H].gstIDper
    +"*"+obj.data[H].gstInstt
    +"*"+obj.data[H].gstCiuda
    +"*"+obj.data[H].gstPriod
    +"*"+obj.data[H].gstDocmt*/

    var d = datos.split("*");

    // alert(d[0]);
    $("#Actuliza #EgstIDper").val(d[6]);
    $("#Actuliza #EgstInstt").val(d[2]);
    $("#Actuliza #EgstCiudad").val(d[3]);
    $("#Actuliza #EgstPriod").val(d[4]);

    //$("#Actuliza #gstpdf").html("<a href='"+d[5]+"' target='_blanck'><span class='icon-file-pdf' style='color:red; font-size:22px;  cursor: pointer;' ></span></a>");
}

function registrar() {
    //Datos personales
    var gstNombr = document.getElementById('gstNombr').value;
    var gstApell = document.getElementById('gstApell').value;
    var gstLunac = document.getElementById('gstLunac').value;
    var gstFenac = document.getElementById('gstFenac').value;
    var gstStcvl = document.getElementById('gstStcvl').value;
    var gstCurp = document.getElementById('gstCurp').value;
    var gstRfc = document.getElementById('gstRfc').value;
    var gstNpspr = document.getElementById('gstNpspr').value;
    var gstPsvig = document.getElementById('gstPsvig').value;
    var gstVisa = document.getElementById('gstVisa').value;
    var gstVignt = document.getElementById('gstVignt').value;
    var gstNucrt = document.getElementById('gstNucrt').value;
    //Domicilio
    var gstCalle = document.getElementById('gstCalle').value;
    var gstNumro = document.getElementById('gstNumro').value;
    var gstClnia = document.getElementById('gstClnia').value;
    var gstCpstl = document.getElementById('gstCpstl').value;
    var gstCiuda = document.getElementById('gstCiuda').value;
    var gstStado = document.getElementById('gstStado').value;
    //Contacto
    var gstCasa = document.getElementById('gstCasa').value;
    var gstClulr = document.getElementById('gstClulr').value;
    var gstExTel = document.getElementById('gstExTel').value;
    //Datos del puesto
    var gstNmpld = document.getElementById('gstNmpld').value;
    var gstIdpst = document.getElementById('gstIdpst').value;

    var gstAreID = document.getElementById('gstAreID').value;
    var gstPstID = document.getElementById('gstPstID').value;
    var gstSpcID = document.getElementById('gstSpcID').value;
    var gstSigID = 0;

    var gstCargo = document.getElementById('gstCargo').value;
    var gstIDCat = document.getElementById('gstIDCat').value;
    var gstIDSub = document.getElementById('gstIDSub').value;
    var gstCorro = document.getElementById('gstCorro').value;

    var gstCinst = document.getElementById('gstCinst').value;
    var gstFeing = document.getElementById('gstFeing').value;

    var gstIDara = document.getElementById('gstIDara').value;
    var gstAcReg = document.getElementById('gstAcReg').value;
    var gstIDuni = document.getElementById('gstIDuni').value;

    datos = 'gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstFenac=' + gstFenac + '&gstStcvl=' + gstStcvl + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstNpspr=' + gstNpspr + '&gstPsvig=' + gstPsvig + '&gstVisa=' + gstVisa + '&gstVignt=' + gstVignt + '&gstNucrt=' + gstNucrt + '&gstCalle=' + gstCalle + '&gstNumro=' + gstNumro + '&gstClnia=' + gstClnia + '&gstCpstl=' + gstCpstl + '&gstCiuda=' + gstCiuda + '&gstStado=' + gstStado + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstExTel=' + gstExTel + '&gstNmpld=' + gstNmpld + '&gstIdpst=' + gstIdpst + '&gstAreID=' + gstAreID + '&gstPstID=' + gstPstID + '&gstSpcID=' + gstSpcID + '&gstSigID=' + gstSigID + '&gstCargo=' + gstCargo + '&gstIDCat=' + gstIDCat + '&gstIDSub=' + gstIDSub + '&gstCorro=' + gstCorro + '&gstCinst=' + gstCinst + '&gstFeing=' + gstFeing + '&gstIDara=' + gstIDara + '&gstAcReg=' + gstAcReg + '&gstIDuni=' + gstIDuni + '&opcion=registrar';

//    alert(datos);
    if (gstNombr == '' || gstApell == '' || gstLunac == '' || gstFenac == '' || gstStcvl == '' || gstCurp == '' || gstRfc == '' || gstNucrt == '' || gstCalle == '' || gstNumro == '' || gstClnia == '' || gstCpstl == '' || gstCiuda == '' || gstStado == '' || gstCasa == '' || gstClulr == '' || gstExTel == '' || gstNmpld == '' || gstIdpst == '' || gstAreID == '' || gstPstID == '' || gstSpcID == '' || gstCargo == '' || gstIDCat == '' || gstIDSub == '' || gstCorro == '' || gstIDara == '' || gstAcReg == '' || gstIDuni == '' || gstCinst == '' || gstFeing == '') {

        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);
        return;
    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {

            if (respuesta == 0) {
                // alert(respuesta);
                Swal.fire({
                    type: 'success',
                    title: 'AFAC INFORMA',
                    text: 'Sus datos fueron guardados correctamente',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonColor: "#3C8DBC",
                    customClass: 'swal-wide',
                    confirmButtonText: '<span style="color: white;"><a class="a-alert" href="../admin/personal.php">¿Deseas agregar otro registro?</a></span>',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<a  class="a-alert" href="../admin/persona.php"><span style="color: white;">Cerrar</span></a>',
                    cancelButtonAriaLabel: 'Thumbs down'
                        // timer: 2900
                });
            }else if(respuesta==2){
                //Que el usuario este duplicado en número de empleado o nombre y apellidos 
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


function actDatos() {

    var gstIdper = document.getElementById('gstIdper').value;
    var gstNombr = document.getElementById('gstNombr').value; // NOMBRE
    var gstApell = document.getElementById('gstApell').value; // APELLIDO
    var gstLunac = document.getElementById('gstLunac').value; // LUGAR DE NACIMIENTO
    var gstFenac = document.getElementById('gstFenac').value; // FECHA DE NACIMIENTO
    var gstStcvl = document.getElementById('gstStcvl').value; // ESTADO CIVIL
    var gstCurp = document.getElementById('gstCurp').value; //CURP
    var gstRfc = document.getElementById('gstRfc').value; //RFC
    var gstNpspr = document.getElementById('gstNpspr').value; // NUMERO DE PASAPORTE
    var gstPsvig = document.getElementById('gstPsvig').value; // VIGENCIA DEL PASAPORTE
    var gstVisa = document.getElementById('gstVisa').value; // PAIS DE LA VISA
    var gstVignt = document.getElementById('gstVignt').value; // VISA VIGENCIA
    //var gstNucrt = document.getElementById('gstNucrt').value; // NUMERO DE CARTLLA
    var gstCalle = document.getElementById('gstCalle').value; // CALLE
    var gstNumro = document.getElementById('gstNumro').value; // NUMERO DE DOMICILIO
    var gstClnia = document.getElementById('gstClnia').value; // COLONIA
    var gstCpstl = document.getElementById('gstCpstl').value; // CODIGO POSTAL
    var gstCiuda = document.getElementById('gstCiuda').value; // CUIDAD
    var gstStado = document.getElementById('gstStado').value; // ESTADO
    var gstCasa = document.getElementById('gstCasa').value; // NUM. DE CASA
    var gstClulr = document.getElementById('gstClulr').value; // NUM. DE CELULAR
    var gstExTel = document.getElementById('gstExTel').value; // NUM. DE EXTENCION

    datos = 'gstIdper=' + gstIdper + '&gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstFenac=' + gstFenac + '&gstStcvl=' + gstStcvl + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstNpspr=' + gstNpspr + '&gstPsvig=' + gstPsvig + '&gstVisa=' + gstVisa + '&gstVignt=' + gstVignt + '&gstCalle=' + gstCalle + '&gstNumro=' + gstNumro + '&gstClnia=' + gstClnia + '&gstCpstl=' + gstCpstl + '&gstCiuda=' + gstCiuda + '&gstStado=' + gstStado + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstExTel=' + gstExTel + '&opcion=actualizar'

    if (gstNombr == '' || gstApell == '' || gstLunac == '' || gstFenac == '' || gstStcvl == '' || gstCurp == '' || gstRfc == '' || gstNpspr == '' || gstPsvig == '' || gstVisa == '' || gstVignt == '' || gstCalle == '' || gstNumro == '' || gstClnia == '' || gstCpstl == '' || gstCiuda == '' || gstStado == '' || gstCasa == '' || gstClulr == '' || gstExTel == '') {

        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
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

function actPuesto() {

    var pstIdper = document.getElementById('gstIdper').value;
    var gstNmpld = document.getElementById('gstNmpld').value;
    var gstIdpst = document.getElementById('gstIdpst').value;
    var gstCargo = document.getElementById('gstCargo').value;
    //var gstIDCat = document.getElementById('gstIDCat').value;
    //var gstIDSub = document.getElementById('gstIDSub').value;
    var gstCorro = document.getElementById('gstCorro').value;
    var gstCinst = document.getElementById('gstCinst').value;
    var gstFeing = document.getElementById('gstFeing').value;
    var gstIDuni = document.getElementById('gstIDuni').value;
    var gstIDSub = 0;

    var gstIDara = document.getElementById('gstIDara').value; //ID area
    var gstAreID = document.getElementById('gstAreID').value; //ID directivas
    var gstPstID = document.getElementById('gstPstID').value; //ID puesto
    var gstSpcID = document.getElementById('gstSpcID').value; //ID especialidad
    var gstAcReg = document.getElementById('gstAcReg').value;
    var gstNucrt = document.getElementById('gstNucrt').value;


    datos = 'pstIdper=' + pstIdper + '&gstNmpld=' + gstNmpld + '&gstIdpst=' + gstIdpst + '&gstCargo=' + gstCargo + '&gstIDCat=' + gstIDCat + '&gstIDSub=' + gstIDSub + '&gstAreID=' + gstAreID + '&gstPstID=' + gstPstID + '&gstSpcID=' + gstSpcID + '&gstIDara=' + gstIDara + '&gstCorro=' + gstCorro + '&gstCinst=' + gstCinst + '&gstFeing=' + gstFeing + '&gstIDuni=' + gstIDuni + '&gstAcReg=' + gstAcReg + '&gstNucrt=' + gstNucrt + '&opcion=actPrsnls';
    //alert(datos);
    if (pstIdper == '' || gstNmpld == '' || gstIdpst == '' || gstCargo == '' || gstIDCat == '' || gstCorro == '' || gstCinst == '' || gstFeing == '' || gstIDuni == '' || gstAcReg == '' || gstIDuni == '' || gstNucrt == '') {

        $('#empty1').toggle('toggle');
        setTimeout(function() {
            $('#empty1').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {

            console.log(respuesta);
            if (respuesta == 0) {
                $('#succe1').toggle('toggle');
                setTimeout(function() {
                    $('#succe1').toggle('toggle');
                }, 2000);
            } else {
                $('#danger1').toggle('toggle');
                setTimeout(function() {
                    $('#danger1').toggle('toggle');
                }, 2000);
            }
        });
    }
}


function openEdit() {


    $("#codigo").show();
    $("#nompusto").show();
    $("#especialidad").show();
    $("#ejecutiva").show();
    $("#comandancias").show();
    // alert("prueba2!"); 
    $("#buton").toggle(100);
    $("#butons").toggle(100);
    div = document.getElementById('cerrar1');
    div.style.display = '';
    div = document.getElementById('cerrar');
    div.style.display = 'none';
    //Habilita los campos INICIO
    document.getElementById('gstNombr').disabled = false; // NOMBRE
    document.getElementById('gstApell').disabled = false; // APELLIDO
    document.getElementById('gstLunac').disabled = false; // LUGAR DE NACIMIENTO
    document.getElementById('gstFenac').disabled = false; // FECHA DE NACIMIENTO
    document.getElementById('gstStcvl').disabled = false; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = false; //CURP
    document.getElementById('gstRfc').disabled = false; //RFC
    document.getElementById('gstNpspr').disabled = false; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled = false; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled = false; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled = false; // VISA VIGENCIA
    document.getElementById('gstNucrt').disabled = false; // NUMERO DE CARTLLA
    document.getElementById('gstCalle').disabled = false; // CALLE
    document.getElementById('gstNumro').disabled = false; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled = false; // COLONIA
    document.getElementById('gstCpstl').disabled = false; // CODIGO POSTAL
    document.getElementById('gstStado').disabled = false; // CUIDAD
    document.getElementById('gstCasa').disabled = false; // NUM. DE CASA
    document.getElementById('gstClulr').disabled = false; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled = false; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled = false; // CUIDAD

    //------ DATOS DEL PUESTO
    document.getElementById('gstNmpld').disabled = false; // NUM. DE EMPLEADO
    document.getElementById('gstIdpst').disabled = false; // NUM. DE EMPLEADO
    document.getElementById('gstCargo').disabled = false;
    //document.getElementById('gstIDCat').disabled = false;
    //document.getElementById('gstIDSub').disabled = false; //SUBCATEGORIA
    document.getElementById('gstCorro').disabled = false;
    document.getElementById('gstCinst').disabled = false;
    document.getElementById('gstFeing').disabled = false;
    // document.getElementById('gstIDuni').disabled = false;

    document.getElementById('gstAreID').disabled = false; //ID área
    document.getElementById('gstPstID').disabled = false; //ID puesto
    document.getElementById('gstSpcID').disabled = false; //ID especialidad
    //document.getElementById('gstSigID').disabled=false;//ID siglas
    document.getElementById('gstIDara').disabled = false; //ID del área
    document.getElementById('gstAcReg').disabled = false;
    document.getElementById('gstIDuni').disabled = false;
    document.getElementById('gstNucrt').disabled = false;
    //.../Habilita los campos FIN

}

//CIERRA LAS HABILITACIONES DE LA EDICIÓN EN PERFIL DE INSTRUCTOR
function cerrarEdit() {

    $("#codigo").hide();
    $("#nompusto").hide();
    $("#especialidad").hide();
    $("#ejecutiva").hide();
    $("#comandancias").hide();

    // alert("CERRAR!"); 
    $("#buton").toggle();
    $("#butons").toggle();
    div = document.getElementById('cerrar1');
    div.style.display = 'none';
    div = document.getElementById('cerrar');
    div.style.display = '';
    //Inhabilita los campos INICIO
    document.getElementById('gstNombr').disabled = true; // NOMBRE
    document.getElementById('gstApell').disabled = true; // APELLIDO
    document.getElementById('gstLunac').disabled = true; // LUGAR DE NACIMIENTO
    document.getElementById('gstFenac').disabled = true; // FECHA DE NACIMIENTO
    document.getElementById('gstStcvl').disabled = true; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = true; //CURP
    document.getElementById('gstRfc').disabled = true; //RFC
    document.getElementById('gstNpspr').disabled = true; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled = true; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled = true; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled = true; // VISA VIGENCIA
    document.getElementById('gstNucrt').disabled = true; // NUMERO DE CARTLLA
    document.getElementById('gstCalle').disabled = true; // CALLE
    document.getElementById('gstNumro').disabled = true; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled = true; // COLONIA
    document.getElementById('gstCpstl').disabled = true; // CODIGO POSTAL
    document.getElementById('gstStado').disabled = true; // CUIDAD
    document.getElementById('gstCasa').disabled = true; // NUM. DE CASA
    document.getElementById('gstClulr').disabled = true; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled = true; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled = true; // CUIDAD

    //------ DATOS DEL PUESTO
    document.getElementById('gstNmpld').disabled = true; // NUM. DE EMPLEADO
    document.getElementById('gstIdpst').disabled = true; // NUM. DE EMPLEADO
    document.getElementById('gstCargo').disabled = true;
    //document.getElementById('gstIDCat').disabled = true;
    // document.getElementById('gstIDSub').disabled = true; //SUBCATEGORIA
    document.getElementById('gstCorro').disabled = true;
    document.getElementById('gstCinst').disabled = true;
    document.getElementById('gstFeing').disabled = true;

    document.getElementById('gstAreID').disabled = true; //ID área
    document.getElementById('gstPstID').disabled = true; //ID puesto
    document.getElementById('gstSpcID').disabled = true; //ID especialidad
    //document.getElementById('gstSigID').disabled=true;//ID siglas
    document.getElementById('gstIDara').disabled = true; //ID del área
    document.getElementById('gstAcReg').disabled = true;
    document.getElementById('gstIDuni').disabled = true;
    document.getElementById('gstNucrt').disabled = true;
    //.../Habilita los campos FIN


}

function codigo() {
    $("#codigo1").toggle('toggle');
    $("#codigo2").toggle('toggle');
}

function nompusto() {
    $("#nompusto1").toggle('toggle');
    $("#nompusto2").toggle('toggle');
}

function especialidads() {
    $("#spcialidad1").toggle('toggle');
    $("#spcialidad2").toggle('toggle');
}

function ejecutiva() {
    $("#ejecutiva1").toggle('toggle');
    $("#ejecutiva2").toggle('toggle');
}

function comandancias(){
    $("#comandancias1").toggle('toggle');
    $("#comandancias2").toggle('toggle');  
}

function asignar() {

    var gstIdper = document.getElementById('gstIdper').value;
    var AgstCargo = document.getElementById('AgstCargo').value;
    var AgstIDCat = document.getElementById('AgstIDCat').value;
    var AgstIDSub = '0';
    var AgstIDuni = document.getElementById('gstIDuni').value;
    var AgstAcReg = document.getElementById('AgstAcReg').value;
    var AgstNucrt = document.getElementById('AgstNucrt').value;
    var gstNombr = document.getElementById('gstNombr').value;
    var gstNmpld = document.getElementById('gstANmpld').value;

    // var gstPrfil = ''

    // var selectObject = document.getElementById("gstPrfil");

    // for (var i = 0; i < selectObject.options.length; i++) {
    //     if (selectObject.options[i].selected == true) {

    //         gstPrfil += "," + selectObject.options[i].value;

    //     }
    // }
    //  gstPrfil = gstPrfil.substr(1);
    //datos = 'idPer-->'+gstIdper+'Cargo-->'+AgstCargo+'IDcat-->'+AgstIDCat+'IDsub-->'+AgstIDSub+'IDuni-->'+AgstIDuni+'Acreg-->'+AgstAcReg;


    if (AgstCargo != 'INSPECTOR') {
        AgstIDCat = '0';
    } else {}


    datas = 'gstIdper=' + gstIdper + '&AgstCargo=' + AgstCargo + '&AgstIDCat=' + AgstIDCat + '&AgstIDSub=' + AgstIDSub + '&AgstIDuni=' + AgstIDuni + '&AgstAcReg=' + AgstAcReg + '&AgstNucrt=' + AgstNucrt + '&gstNombr='+gstNombr+'&gstNmpld='+gstNmpld+'&opcion=asignar';

    //alert(datas);
    //alert(gstIdper+'/'+AgstCargo+'/'+AgstIDCat+'/'+AgstIDSub+'/'+AgstIDuni+'/'+AgstAcReg);

    if (AgstCargo == '' || AgstIDCat == '' || AgstIDSub == '' || AgstAcReg == '' || AgstIDuni == '' || AgstNucrt == '' || gstNombr == '' || gstNmpld == '') {

        //alert('llene');
        $('#empty2').toggle('toggle');
        setTimeout(function() {
            $('#empty2').toggle('toggle');
        }, 2000);

        return;
    } else {
        $.ajax({
           url: '../php/agrEvalu.php',
            type: 'POST',
            data: datas
        }).done(function(respuesta) {

            if (respuesta == 'INSPECTOR') {

                Swal.fire({
                    type: 'success',
                    title: 'AFAC INFORMA',
                    text: 'Sus datos fueron guardados correctamente',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'inspecion.php';", 2000);

            }else if(respuesta != 'INSPECTOR'){
                Swal.fire({
                    type: 'success',
                    title: 'AFAC INFORMA',
                    text: 'Sus datos fueron guardados correctamente',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                //setTimeout("location.href = 'persona.php';", 2000);

            }else if(respuesta == 1){
                $('#danger2').toggle('toggle');
                setTimeout(function() {
                    $('#danger2').toggle('toggle');
                }, 2000);
            }
        });
    }
}

//.....VISTA DE ELEMENTOS DE ASIGNACIÓN DEL PUESTO AL ELEGIR EL CARGO DE INSPECTOR
function asiginspec() {
    //alert(d[11]);
    var cargo = document.getElementById('AgstCargo').value; //select cargo
    var datosasig = document.getElementById("funcionemp") //caja de elementos
        //alert(cargo);
    var combo = document.getElementById("AgstCargo");
    var selected = combo.options[combo.selectedIndex].text
        //alert(selected);
    if (selected == "INSPECTOR") {
        datosasig.style.display = '';
    } else {
        datosasig.style.display = 'none';
    }

}