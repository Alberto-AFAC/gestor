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
    document.getElementById('gstSexo').disabled = true;
    document.getElementById('gstStcvl').disabled = true; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = true; //CURP
    document.getElementById('gstRfc').disabled = true; //RFC
    document.getElementById('gstisst').disabled = true;

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
    document.getElementById('sgtCrhnt').disabled = true;
    document.getElementById('gstRusp').disabled = true;
    document.getElementById('gstPlaza').disabled = true;
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
    document.getElementById('siglasoaci').disabled = true; //ESTATUS DE PERSONAL
}

function estudio(gstIdper) {
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
    paqueteDeDatos.append('EIdper', $('#EIdper').prop('value'));
    paqueteDeDatos.append('Nmplea', $('#Nmplea').prop('value'));

    EIdper = document.getElementById('EIdper').value;


    $.ajax({
        url: '../php/actEstudios.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            //alert(r);
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
                constudios(EIdper);
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
                constudios(EIdper);
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

    var ActIdpro = document.getElementById('ActIdpro').value;
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
                conprofesion(ActIdpro);
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
    $("#actForpro #ActIdpro").val(d[1]);
    $("#actForpro #AgstPusto").val(d[2]);
    $("#actForpro #AgstMpres").val(d[3]);
    $("#actForpro #AgstIDpai").val(d[4]);
    $("#actForpro #AgstCidua").val(d[5]);
    $("#actForpro #AgstActiv").val(d[6]);
    $("#actForpro #AgstFntra").val(d[7]);
    $("#actForpro #AgstFslda").val(d[8]);
}

function carPrfsn(datos) {

    var d = datos.split("*");
    $("#actForpro #DgstIdpro").val(d[0]);
    $("#actForpro #DgstIDper").val(d[1]);
    $("#actForpro #DgstPusto").val(d[2]);
    $("#actForpro #DgstMpres").val(d[3]);


}

function docProfsn() {

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('DgstDocep', $('#DgstDocep')[0].files[0]);
    paqueteDeDatos.append('DgstIdpro', $('#DgstIdpro').prop('value'));
    paqueteDeDatos.append('DgstIDper', $('#DgstIDper').prop('value'));
    paqueteDeDatos.append('DgstNemp', $('#DgstNemp').prop('value'));
    paqueteDeDatos.append('opcion', 'documento');

    DgstIDper = document.getElementById('DgstIDper').value;

    $.ajax({
        url: '../php/docProfesion.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            if (r == 8) {
                $('#vacio3').toggle('toggle');
                setTimeout(function() {
                    $('#vacio3').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito3').toggle('toggle');
                setTimeout(function() {
                    $('#exito3').toggle('toggle');
                }, 4000);

                conprofesion(DgstIDper);

            } else if (r == 1) {
                $('#falla3').toggle('toggle');
                setTimeout(function() {
                    $('#falla3').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error3').toggle('toggle');
                setTimeout(function() {
                    $('#error3').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom3').toggle('toggle');
                setTimeout(function() {
                    $('#renom3').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn3').toggle('toggle');
                setTimeout(function() {
                    $('#forn3').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta3').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta3').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido3').toggle('toggle');
                setTimeout(function() {
                    $('#repetido3').toggle('toggle');
                }, 4000);
            }
        }
    });

}

function agrProfsn() {

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('gstDocep', $('#gstDocep')[0].files[0]);
    paqueteDeDatos.append('AgstIDper', $('#AgstIDper').prop('value'));
    paqueteDeDatos.append('gstPusto', $('#gstPusto').prop('value'));
    paqueteDeDatos.append('gstMpres', $('#gstMpres').prop('value'));
    paqueteDeDatos.append('gstIDpai', $('#gstIDpai').prop('value'));
    paqueteDeDatos.append('gstCidua', $('#gstCidua').prop('value'));
    paqueteDeDatos.append('gstActiv', $('#gstActiv').prop('value'));
    paqueteDeDatos.append('gstFntra', $('#gstFntra').prop('value'));
    paqueteDeDatos.append('gstFslda', $('#gstFslda').prop('value'));
    paqueteDeDatos.append('opcion', 'profesion');

    $.ajax({
        url: '../php/docProfesion.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            //alert(r);
            //console.log(r);
            if (r == 8) {
                $('#vacio2').toggle('toggle');
                setTimeout(function() {
                    $('#vacio2').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito2').toggle('toggle');
                setTimeout(function() {
                    $('#exito2').toggle('toggle');
                }, 4000);

                $('#vaciar').show('slow');
                $('#agregar').hide();

            } else if (r == 1) {
                $('#falla2').toggle('toggle');
                setTimeout(function() {
                    $('#falla2').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error2').toggle('toggle');
                setTimeout(function() {
                    $('#error2').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom2').toggle('toggle');
                setTimeout(function() {
                    $('#renom2').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn2').toggle('toggle');
                setTimeout(function() {
                    $('#forn2').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta2').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta2').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido2').toggle('toggle');
                setTimeout(function() {
                    $('#repetido2').toggle('toggle');
                }, 4000);
            }
        }
    });

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
                $("#Dtall #gstIDara1").val(obj.data[i].gstIDara);
                $("#Dtall #gstANmpld").val(obj.data[i].gstNmpld);
            }
        }
    })

}

function perperexter(gstIdper) {
    var nacional = document.getElementById('nacional');
    $.ajax({
        url: '../php/conperext.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (i = 0; i < res.length; i++) {

            if (obj.data[i].gstIdper == gstIdper) {
                // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
                $("#gstIdper1").val(obj.data[i].gstIdper);
                $("#gstNombr1").val(obj.data[i].gstNombr);
                $("#gstApell1").val(obj.data[i].gstApell);
                $("#gstLunac1").val(obj.data[i].gstLunac);
                $("#gstCurp1").val(obj.data[i].gstCurp);
                $("#gstRfc1").val(obj.data[i].gstRfc);
                $("#gstStado1").val(obj.data[i].gstStado);
                $("#gstSexo1").val(obj.data[i].gstSexo);
                $("#sgtCrhnt2").val(obj.data[i].sgtCrhnt);
                $("#gstRusp2").val(obj.data[i].gstRusp);
                $("#gstIDCat1").val(obj.data[i].gstIDCat);
                $("#gstCasa1").val(obj.data[i].gstCasa);
                $("#gstClulr1").val(obj.data[i].gstClulr);
                $("#gstCorro1").val(obj.data[i].gstCorro);
                $("#gstSpcID1").val(obj.data[i].gstSpcID);

            }

            if (obj.data[i].gstLunac == "INTERNACIONAL") {
                //alert("si entra internacional")
                nacional.style.display = 'none';
            }

            if (obj.data[i].gstLunac == "NACIONAL") {
                //alert("si entra internacional")
                nacional.style.display = '';
            }
        }
    })
}

function opediext(gstIdper) {
    div = document.getElementById('cerreth');
    div.style.display = '';
    div1 = document.getElementById('openedth');
    div1.style.display = 'none';
    document.getElementById('gstIdper1').disabled = '';
    document.getElementById('gstNombr1').disabled = '';
    document.getElementById('gstApell1').disabled = '';
    document.getElementById('gstLunac1').disabled = '';
    document.getElementById('gstCurp1').disabled = '';
    document.getElementById('gstRfc1').disabled = '';
    document.getElementById('gstStado1').disabled = '';
    document.getElementById('gstSexo1').disabled = '';
    document.getElementById('sgtCrhnt2').disabled = '';
    document.getElementById('gstRusp2').disabled = '';
    document.getElementById('gstIDCat1').disabled = '';
    document.getElementById('gstCasa1').disabled = '';
    document.getElementById('gstClulr1').disabled = '';
    document.getElementById('gstCorro1').disabled = '';
    document.getElementById('gstSpcID1').disabled = '';
    document.getElementById('button1').style.display = '';


}

function closext(gstIdper) {
    div = document.getElementById('openedth');
    div.style.display = '';
    div1 = document.getElementById('cerreth');
    div1.style.display = 'none';
    document.getElementById('gstIdper1').disabled = 'none';
    document.getElementById('gstNombr1').disabled = 'none';
    document.getElementById('gstApell1').disabled = 'none';
    document.getElementById('gstLunac1').disabled = 'none';
    document.getElementById('gstCurp1').disabled = 'none';
    document.getElementById('gstRfc1').disabled = 'none';
    document.getElementById('gstStado1').disabled = 'none';
    document.getElementById('gstSexo1').disabled = 'none';
    document.getElementById('sgtCrhnt2').disabled = 'none';
    document.getElementById('gstRusp2').disabled = 'none';
    document.getElementById('gstIDCat1').disabled = 'none';
    document.getElementById('gstCasa1').disabled = 'none';
    document.getElementById('gstClulr1').disabled = 'none';
    document.getElementById('gstCorro1').disabled = 'none';
    document.getElementById('gstSpcID1').disabled = 'none';
    document.getElementById('button1').style.display = 'none';

}

function edithperext(gstIdper) {
    var gstNombr = $("#gstNombr1").val(); //NOMBRE
    var gstApell = $("#gstApell1").val(); //APELLIDO
    var gstLunac = $("#gstLunac1").val(); //TIPO DE PERSONA
    var gstCurp = $("#gstCurp1").val(); //CURP
    var gstRfc = $("#gstRfc1").val(); //RFC
    var gstSexo = $("#gstSexo1").val(); //SEXO
    var gstIDCat = $("#gstIDCat1").val(); //ESPECIALIDAD
    var gstCasa = $("#gstCasa1").val(); //TEL CASA
    var gstClulr = $("#gstClulr1").val(); //TEL CELULAR
    var gstCorro = $("#gstCorro1").val(); //CORREO PERSONAL
    var gstSpcID = $("#gstSpcID1").val(); //CORREO ALTERNATIVO
    var gstStado = $("#gstStado1").val(); //ESTADO
    var sgtCrhnt = $("#sgtCrhnt2").val(); //ORGANIZACIÓN
    var gstRusp = $("#gstRusp2").val(); //ÁREA DE ADSCRIPCIÓN
    var gstIdper = $("#gstIdper1").val();
    // swal.showLoading();
    var datos = 'gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstSexo=' + gstSexo + '&gstIDCat=' + gstIDCat + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstCorro=' + gstCorro + '&gstSpcID=' + gstSpcID + '&gstStado=' + gstStado + '&sgtCrhnt=' + sgtCrhnt + '&gstRusp=' + gstRusp + '&gstIdper=' + gstIdper + '&opcion=actualizar';
    //alert(datos);

    if (gstNombr == '' || gstApell == '' || gstSexo == '' || gstIDCat == '' || gstCorro == '' | gstLunac == '0') {
        Swal.fire({
            type: 'warning',
            text: 'Llene campos obligatorios* !',
            timer: 2500,
            showConfirmButton: false,
            customClass: 'swal-wide'
        });
    } else {
        $.ajax({
            type: "POST",
            url: "../php/insertarPersonal.php",
            data: datos
        }).done(function(respuesta) {
            if (respuesta == 0) {
                // document.getElementById("personal-ext").reset();
                Swal.fire({
                    type: 'success',
                    text: 'SE HA ACTUALIZADO EXITOSAMENTE',
                    showConfirmButton: false,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
                setTimeout("location.href = 'persona';", 2000);
            } else if (respuesta == 2) {

            } else {
                $('#dangeractu').toggle('toggle');
                setTimeout(function() {
                    $('#dangeractu').toggle('toggle');
                }, 2000);
            }
        });
    }
}

function deletexter(gstIdper) {
    //alert(gstIdper)
    document.getElementById('bajaIdex').vale
    $.ajax({
        url: '../php/conperext.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (i = 0; i < res.length; i++) {

            if (obj.data[i].gstIdper == gstIdper) {
                // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
                $("#bajaIdperex").val(obj.data[i].gstNombr + " " + obj.data[i].gstApell)
                $("#bajaIdex").val(obj.data[i].gstIdper)
            }
        }
    })
}

function borrarperext(gstIdper) {
    var gstIdper = $("#bajaIdex").val();
    // swal.showLoading();
    var datos = 'gstIdper=' + gstIdper + '&opcion=eliminar';
    //alert(datos);
    $.ajax({
        type: "POST",
        url: "../php/insertarPersonal.php",
        data: datos
    }).done(function(respuesta) {
        if (respuesta == 0) {
            // document.getElementById("personal-ext").reset();
            Swal.fire({
                type: 'success',
                text: 'SE HA ACTUALIZADO EXITOSAMENTE',
                showConfirmButton: false,
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000
            });
            setTimeout("location.href = 'persona';", 2000);
        } else if (respuesta == 2) {

        } else {
            $('#dangerdeext').toggle('toggle');
            setTimeout(function() {
                $('#dangerdeext').toggle('toggle');
            }, 2000);
        }
    });

}
//////////////DATOS DEL PERSONAL LISTA DE PERSONAS//////////// 
function perfil(gstIdper) {
    let id_perinsp = gstIdper;
    if (gstIdper === 1203) {
        document.getElementById('foto').innerHTML = '<span><img class="img-circle" src="../dist/img/profile-leonardoR.jpeg" alt="User Avatar" style="width: 80px;"></span>';

    } else {
        document.getElementById('foto').innerHTML = '<img class="img-circle" src="../dist/img/user1-128x128.jpg" style="width: 80px; alt="User Avatar">';
    }
    //LLAMA A LA TABLA DE CURSOS DE EL INSPECTOR 
    opendellcursins(id_perinsp);
    //FUNCION DE PORCENTAJES 27062022
    porcenperso(id_perinsp);

    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        //03092021
        for (p = 0; p < res.length; p++) {
            if (obj.data[p].gstIdper == gstIdper) {


                personal = obj.data[p].gstIdper + '*' + obj.data[p].gstIDCat + '*' + obj.data[p].gstEvalu + '*' + obj.data[p].gstCatgr;

                var d = personal.split("*");
                gstIdper = d[0];
                gstIDCat = d[1];
                gstEvalu = d[2];
                gstCatgr = d[3];

                consultaCurso(gstIdper + '*' + gstIDCat);
                $("#ocultar1").show();
                $("#ocultar2").show();

                $.ajax({
                    url: '../php/conDatosPersonal.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    // alert(obj.data[gstIdper].gstCorro);

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
                            $("#Dtall #gstSexo").val(obj.data[i].gstSexo);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstisst").val(obj.data[i].gstisst);
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


                            $("#Pusto #adscripcion").val(obj.data[i].adscripcion);
                            // $("#Pusto #subdir1").val(obj.data[i].gstAcReg); //area de adscripción modificar 

                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);

                            $("#Pusto #sgtCrhnt").val(obj.data[i].sgtCrhnt);
                            $("#Pusto #gstRusp").val(obj.data[i].gstRusp);
                            $("#Pusto #gstPlaza").val(obj.data[i].gstPlaza);

                            //alert(obj.data[i].gstIdpst);                           
                            $("#Pusto #Codig").val(obj.data[i].gstCodig);
                            $("#Pusto #Nivel").val(obj.data[i].gstNivel);
                            $("#Pusto #Gnric").val(obj.data[i].gstGnric);
                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
                            $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            // $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            $("#Pusto #IDuni").val(obj.data[i].gstIDuni);
                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);
                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara); //area de adscripcion
                            $("#Pusto #AcReg").val(obj.data[i].gstAcReg);
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);
                            $("#Pusto #ejcutiva").val(obj.data[i].gstAreje);
                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área ejecutiva
                            $("#Pusto #gstNucrt").val(obj.data[i].gstNucrt); //ubicion
                            //        alert(obj.data[i].gstAreID);
                            $("#Pusto #nompuesto").val(obj.data[i].gstNpsto); //NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span>
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #spcialidad").val(obj.data[i].gstSpoac); //ID especialidad  
                            $("#Pusto #sigla").val(obj.data[i].gstSigla);
                            $("#Pusto #subdir1").val(obj.data[i].descripsub); //adscripcion29092021
                            $("#Pusto #departam").val(obj.data[i].descripdep);
                            //$("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

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
                            $("#Dtall #gstSexo").val(obj.data[i].gstSexo);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstisst").val(obj.data[i].gstisst);

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
                            $("#Dtall #gstCorro").val(obj.data[i].gstCorro); // correo 1
                            $("#Dtall #gstCinst").val(obj.data[i].gstCinst); // correo 2
                            $("#Dtall #gstSpcID").val(obj.data[i].gstSpcID); // correo 3

                            $("#Pusto #gstSigID").val(obj.data[i].gstSigID); // Observaciones
                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
                            $("#Pusto #sgtCrhnt").val(obj.data[i].sgtCrhnt);
                            $("#Pusto #gstRusp").val(obj.data[i].gstRusp);
                            $("#Pusto #gstPlaza").val(obj.data[i].gstPlaza);
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

                            $("#Pusto #AcReg").val(obj.data[i].gstComnd); //comandancia
                            $("#Pusto #IDuni").val(obj.data[i].gstIDuni);
                            ////////////////////APARTADO PARA ADJUNTAR ARCHIVOS///////////////////////////////
                            $("#Actuliza #Nmplea").val(obj.data[i].gstNmpld);
                            $("#agregardoc #gstNemple").val(obj.data[i].gstNmpld);
                            $("#actualizardoc #actNemple").val(obj.data[i].gstNmpld);
                            $("#modaldocprofesion #DgstNemp").val(obj.data[i].gstNmpld);

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
                            if (obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 25 && obj.data[s].gstIdcat != 26 && obj.data[s].gstIdcat != 29 && obj.data[s].gstIdcat != 31) {
                                html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td></tr>";
                            }
                            // <td><a class='btn btn-default'  href='" + /*obj.data[H].gstDocmt*/ + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + gstID + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td>
                        }
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#especialidades").html(html);
                })


                /*$.ajax({
                    url: '../php/gesCurso.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;

                    programados = 0;
                    programados1 = 0;
                    DECLINADOS = 0;
                    FINALIZADO = 0;
                    CANCELADO = 0;
                    OTROS = 0;
                    insp = 0;


                    //TODO AQUÍ ES LO QUE LLEVA TABLA DE DETTALLE PERSONAL 11012022
                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap rounded table-responsive"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th>FOLIO</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>INICIO</th><th><i></i>HORA</th><th><i></i>FINAL</th><th><i></i>ASISTENCIA</th><th><i></i>VIGENCIA</th><th><i></i>PROCESO</th><th style="display:none;"><i></i>DOCUMENTO</th><th style="display:none;"><i></i>asitencia</th></tr></thead><tbody>';
                    //TRAE LOS DATOS DE CADA REGISTRO DE LA TABLA CHECK LIST DOCUMENTACIÓN
                    $(document).ready(function() {
                        $("#checkrh tr").on('click', function() {
                            var toma1 = "",
                                toma2 = ""; //declaramos las columnas NOMBRE DEL CURSO
                            toma1 += $(this).find('td:eq(0)').html(); //titulo del doc. 
                            toma2 += $(this).find('td:eq(0)').html(); //titulo del doc. 

                            $("#docadjunto").text(toma1); // Label del titulo del documento actualizar
                            $("#titledoc").text(toma2); // Label del titulo del documento eliminar
                            //alert(toma2)

                        });
                    });

                    //TRAE LOS DATOS DE CADA REGISTRO DE LA TABLA CURSOS DETALLE PERSONAS
                    $(document).ready(function() {
                        $("#curso tr").on('click', function() {
                            var toma1 = "",
                                toma2 = "",
                                toma3 = ""; //declaramos las columnas NOMBRE DEL CURSO
                            toma1 += $(this).find('td:eq(2)').html(); //NOMBRE DEL CURSO  
                            toma2 += $(this).find('td:eq(10)').html(); //PDF
                            toma3 += $(this).find('td:eq(11)').html(); //PDF                    
                            $("#nombredeclinp").text(toma1); // Label esta en valor.php
                            $("#declinpdfp").attr('href', toma2); // Label esta en valor.php
                            $("#motivodp").text('Motivo:' + toma3); // Label esta en valor.php
                            $("#otrosdp").text(toma2); // Label esta en valor.php

                            if (toma3 == 'OTROS') {
                                document.getElementById('otrosdp').style.display = '';
                                document.getElementById('declinpdfp').style.display = 'none';
                            }
                            if (toma3 == 'TRABAJO') {
                                document.getElementById('otrosdp').style.display = 'none';
                                document.getElementById('declinpdfp').style.display = '';
                            }
                            if (toma3 == 'ENFERMEDAD') {
                                document.getElementById('otrosdp').style.display = 'none';
                                document.getElementById('declinpdfp').style.display = '';
                            }
                        });
                    });

                    for (ii = 0; ii < res.length; ii++) {
                        x++;

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
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                            //console.log(status);
                        } else
                        if (factual <= ftermino) {
                            status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                            //console.log(status);
                        } else
                        if (factual >= ftermino) {
                            status = "<span style='background-color: dangerous; font-size: 14px;' class='badge'>POR VENCER</span>";
                            //console.log(status);
                        }
                        if (obj.data[ii].gstTipo == "INDUCCIÓN") { //UNICA VEZ EN ESTATUS "INDUCCIÓN"
                            status = "<span style='background-color:#3C8DBC; font-size: 14px;' class='badge'>UNICA VEZ</span>";
                            //console.log(status);
                        }

                        if (obj.data[ii].gstTipo == "BÁSICOS/INICIAL") { // UNICA VEZ EN ESTATUS "BASICOS/INICIAL"
                            status = "<span style='background-color:#3C8DBC; font-size: 14px;' class='badge'>UNICA VEZ</span>";
                            //console.log(status);
                        }
                        if (obj.data[ii].confirmar == 'TRABAJO') { //DECLINADO POR TRABAJO

                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadop' style='font-weight: bold; color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";

                        } else if (obj.data[ii].confirmar == 'ENFERMEDAD') { //DECLINADO POR ENFERMEDAD
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadop' style='font-weight: bold; color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";

                        } else if (obj.data[ii].confirmar == 'OTROS') { //DECLINADO POR OTROS
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinadop' style='font-weight: bold; color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                        }

                        if (obj.data[ii].confirmar == 'CONFIRMADO') { // ACEPTA LA CONVOCATORIA DEL CURSO
                            confirmar = "<span title='Confirma su asistencia' style='font-weight: bold; color: green;'>CONFIRMADO</span>";
                        }

                        if (obj.data[ii].confirmar == 'CONFIRMAR') {
                            status1 = "<span style='font-weight: bold; color: grey;'>PENDIENTE</span>";

                        } else if (obj.data[ii].proceso == 'CANCELADO') {
                            status1 = "<span style='font-weight: bold; color: red;'>CANCELADO</span>";

                        }
                        if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {

                            if (obj.data[ii].evaluacion == 'NULL') {
                                valua = 'FALTA EVALUACIÓN';
                                proc12 = "<span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO<br>" + valua + "</span>";
                            } else if (obj.data[ii].evaluacion > 79) {
                                valua = 'APROBO';
                                proc12 = "<span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO<br>" + valua + "</span>";
                            } else {
                                valua = 'NO APROBO';
                                proc12 = "<span style='background-color: red; font-size: 14px;' class='badge'>FINALIZADO<br>" + valua + "</span>";

                            }

                        } else if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                            proc12 = "<span style='background-color: orange; font-size: 14px;' class='badge'>PENDIENTE</span>";

                            //COMPARACION DE FECHAS 
                            feccomar = document.getElementById('fecomp1').value;
                            if (obj.data[ii].fcurso == feccomar && obj.data[ii].confirmar == 'CONFIRMADO') {
                                proc12 = "<span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span>";
                            }
                            if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                status1 = "<span style='font-weight: bold; color: orange;'>PENDIENTE</span>";
                            }
                        }
                        // FIN COMPARACIÓN FECHAS

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

                                //LISTA DE CURSOS PERSONAS
                                idlista = obj.data[ii].idmstr;

                                if (obj.data[ii].confirmar == 'CONFIRMAR') { //POR CONFIRMAR CURSO
                                    html += "<tr><td>" + obj.data[ii].gstIdlsc + "</td><td>" + obj.data[ii].codigo + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><span>" + status1 + "</span></td><td><span style='background-color: grey; font-size: 14px;' class='badge'>PENDIENTE</span></td><td><span style='background-color: grey; font-size: 14px;' class='badge'>EN ESPERA</span></td></tr>";
                                } else {
                                    html += "<tr><td>" + x + "</td><td>" + obj.data[ii].codigo + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td>" + confirmar + "</td><td>" + status + "</td><td>" + proc12 + "</td><td style='display:none;'>" + obj.data[ii].justifi + "</td><td style='display:none;'>" + obj.data[ii].confirmar + "</td></tr>";
                                }

                                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                    programados++;
                                }
                                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMAR') {
                                    programados1++;
                                }

                                if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                    FINALIZADO++;
                                }
                                if (obj.data[ii].confirmar == 'TRABAJO') {
                                    CANCELADO++;
                                }
                                if (obj.data[ii].confirmar == 'ENFERMEDAD') {
                                    DECLINADOS++;
                                }
                                if (obj.data[ii].confirmar == 'OTROS') {
                                    OTROS++;
                                }
                                if (obj.data[ii].estado == '0') {
                                    insp++;
                                }

                                document.getElementById("programado").innerHTML = (programados + programados1) + '/' + insp;
                                document.getElementById("FINALIZADO").innerHTML = FINALIZADO + '/' + insp;
                                document.getElementById("CANCELADO").innerHTML = (CANCELADO + DECLINADOS + OTROS) + '/' + insp;
                                //PORCENTAJE DE COMPLETADOS

                                var porcentaje1 = document.getElementById("porcentaje11");
                                resultado3 = ((FINALIZADO * 100) / insp);
                                var resFinal3 = resultado3.toFixed(0);
                                porcentaje1.style.width = (resFinal3 + "%");
                                porcentaje11.innerHTML = (resFinal3 + "%");
                                document.getElementById("porcentaje11").title = porcentaje11.innerHTML //title de porcentajes

                                // PORCENTAJE DE PROGRAMADOS
                                var porcentaje12 = document.getElementById("porcentaje12");
                                resultado = (((programados + programados1) * 100) / insp);

                                var resFinal = resultado.toFixed(0);
                                porcentaje12.style.width = (resFinal + "%");
                                porcentaje12.innerHTML = (resFinal + "%"); //VALOR
                                document.getElementById("porcentaje12").title = porcentaje12.innerHTML //title de porcentajes

                                // PORCENTAJE DE CANCELADO
                                var porcentaje13 = document.getElementById("porcentaje13");
                                resultado1 = (((CANCELADO + DECLINADOS + OTROS) * 100) / insp);
                                var resFinal1 = resultado1.toFixed(0);

                                porcentaje13.style.width = (resFinal1 + "%"); // DETALLE INSPECTOR
                                porcentaje13.innerHTML = (resFinal1 + "%"); //VALOR
                                document.getElementById("porcentaje13").title = porcentaje13.innerHTML //title de porcentajes

                            }
                        }
                        // TODO AQUI TERMINA
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#cursos").html(html);
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
                })*/
            }
        }
    })
    $("#gstIdperArc").val(gstIdper);
    $("#gstIdperAct").val(gstIdper);
    $("#gstIdperEli").val(gstIdper);
    // $("#arcIdperEli").val(gstIdper); 

    consultarDoc(gstIdper);
    consultarDocRes(gstIdper);
    constudios(gstIdper);
    conprofesion(gstIdper);



}
////////////////////CONSULTAR ARCHIVO///////////////////////////

function consultarDoc(gstIdper) {

    $.ajax({
        url: '../php/documentos.php',
        type: 'POST',
        data: 'gstIdper=' + gstIdper
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 1;

        html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><input type="hidden" name="gstIdper" id="gstIdper"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">ID</th><th scope="col" style="width:300px;">DOCUMENTO</th><th scope="col" style="width:150px;">ESTATUS</th> <th scope="col">ACCIONES</th> <th scope="col">DOCUMENTO ADJUNTO</th><th scope="col">FECHA DE ACTUALIZACION</th></tr></thead><tbody>';

        for (D = 0; D < res.length; D++) {

            if (obj.data[D].documentos == 'SI EXISTE') {
                if (obj.data[D].id_doc == 7) {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td><td></td><td></td><td>' + obj.data[D].fecactual + '</td></tr>';
                } else {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td><td><a type="button" title="Actualizar documento" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="adjactual(' + obj.data[D].id_doc + ');" data-target="#modal-actualizardoc"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="borrar(' + obj.data[D].id_doc + ');" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminararchi"><i class="fa fa-trash-o text-danger"></i></a></td><td><a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a></td><td>' + obj.data[D].fecactual + '</td></tr>';
                }
            } else {
                if (obj.data[D].id_doc == 7) {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/time.png" alt="YES" width="33px;"></td><td></td><td></td><td></td></tr>';
                } else {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/time.png" alt="YES" width="33px;"></td><td><a type="button" class="asiste btn btn-default" title="Subir documento" onclick="adjunuevo(' + obj.data[D].id_doc + ');" data-toggle="modal" data-target="#modal-agregardoc"><i class="fa fa-cloud-upload text-info"></i></a></td><td></td><td></td></tr>';
                }
            }
        }
        html += '</tbody></table></form></div></div>';

        $("#perdoc").html(html);
    })

}
////RESULTADO DOCUMENTACION/////////////


function consultarDocRes(gstIdper) {

    $.ajax({
        url: '../php/documentos.php',
        type: 'POST',
        data: 'gstIdper=' + gstIdper
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 1;

        html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">ID</th><th scope="col" style="width:300px;">DOCUMENTO</th><th scope="col" style="width:150px;">ESTATUS</th> <th scope="col">DOCUMENTO ADJUNTO</th><th scope="col">FECHA DE ACTUALIZACION</th></tr></thead><tbody>';

        for (D = 0; D < res.length; D++) {

            if (obj.data[D].documentos == 'SI EXISTE') {
                if (obj.data[D].id_doc == 7) {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td><td>' + obj.data[D].fecactual + '</td></tr>';
                } else {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/check.svg" alt="YES" width="25px;"></td><td><a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a></td><td>' + obj.data[D].fecactual + '</td></tr>';
                }
            } else {
                if (obj.data[D].id_doc == 7) {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/time.png" alt="YES" width="33px;"></td><td></td><td></td></tr>';
                } else {
                    html += '<tr><th scope="row">' + obj.data[D].id_doc + ')</th><td>' + obj.data[D].nombre + '</td><td><img src="../dist/img/time.png" alt="YES" width="33px;"></td><td></td><td></td></tr>';
                }
            }
        }
        html += '</tbody></table></form></div></div>';

        $("#perdocRes").html(html);
    })

}

////////////////////CONSULTA ESTUDIOS//////////////////
function constudios(gstIdper) {
    $.ajax({
        url: '../php/conEstudios.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        //alert("aqui es ")
        //AQUI03
        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th><th><i></i>FECHA</th></tr></thead><tbody>';
        var n = 0;
        for (H = 0; H < res.length; H++) {

            if (obj.data[H].gstIDper == gstIdper) {
                valor = obj.data[H].gstIDper;
                n++;
                datos = obj.data[H].gstIdstd + "*" + obj.data[H].gstIDper + "*" + obj.data[H].gstInstt + "*" + obj.data[H].gstCiuda + "*" + obj.data[H].gstPriod + "*" + obj.data[H].gstDocmt + "*" + obj.data[H].gstIdstd;

                html += "<tr><td>" + n + "</td><td>" + obj.data[H].gstInstt + "</td><td>" + obj.data[H].gstCiuda + "</td><td>" + obj.data[H].gstPriod + "</td><td><a class='btn btn-default'  href='" + obj.data[H].gstDocmt + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a> <a href='#' onclick='borrararc(" + '"' + datos + '"' + ");' type='button' style='margin-left:2px' title='Borrar documento'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminardoc'><i class='fa fa-trash-o text-danger'></i></a></td> <td>" + obj.data[H].fechar + "</td></tr>";
                //                            document.getElementById('estudios1').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
            } else {
                //                           document.getElementById('estudios1').innerHTML = '<img src="../dist/img/advertir.svg" alt="NO" width="25px;">';

            }

        }
        html += '</tbody></table></div></div></div>';
        $("#studios").html(html);
    })
}
////////CONSULTA PROFESIÓN///////////////////////

function conprofesion(gstIdper) {

    $.ajax({
        url: '../php/conProfesion.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;


        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>PAÍS</th><th><i></i>CIUDAD</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
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

            if (obj.data[P].gstIDper == gstIdper) {
                x++;
                html += "<tr><td>" + x + "</td><td>" + obj.data[P].gstPusto + "</td><td>" + obj.data[P].gstMpres + "</td><td> " + obj.data[P].gstPais + "</td><td> " + obj.data[P].gstCidua + "</td><td> " + obj.data[P].gstActiv + "</td><td> " + gstFntra + "</td><td> " + gstFslda + "</td><td><a class='btn btn-default'  href='" + obj.data[P].gstDocep + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a> <a type='button' onclick='actPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalprofesion'><i class='fa fa-edit text-info'></i></a> <a type='button' title='Subir archivo' onclick='carPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modaldocprofesion'><i class='fa fa-cloud-upload'></i></a> <a href='#' onclick='borrarpro(" + '"' + datos + '"' + ");' type='button' style='margin-left:2px' title='Borrar documento'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminarpro'><i class='fa fa-trash-o text-danger'></i></a></td> </tr>";

            } else {}
        }
        html += '</tbody></table></div></div></div>';
        $("#profsions").html(html);
    })
}

///////////////////////BORRAR/////////////////////////

function borrar(b) {

    $("#doceliminar").val(b);
}

function borrararc(datos) {

    var d = datos.split("*");
    $("#arceliminar").val(d[6]);
    $("#arcIdperEli").val(d[1]);

}

function borrardoc() {

    var gstIdperEli = document.getElementById('gstIdperEli').value;
    var doceliminar = document.getElementById('doceliminar').value;


    datos = 'gstIdperEli=' + gstIdperEli + '&doceliminar=' + doceliminar + '&opcion=elimnardoc';

    $.ajax({
        url: '../php/docDocumento.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        //alert(respuesta);
        if (respuesta == 0) {
            $('#succe7').toggle('toggle');
            setTimeout(function() {
                $('#succe7').toggle('toggle');
            }, 2000);

            consultarDoc(gstIdperEli);

        } else if (respuesta == 1) {
            $('#danger7').toggle('toggle');
            setTimeout(function() {
                $('#danger7').toggle('toggle');
            }, 2000);
        } else {
            $('#aviso7').toggle('toggle');
            setTimeout(function() {
                $('#aviso7').toggle('toggle');
            }, 2000);
        }
    });

}

function archiborrar() {

    var arcIdperEli = document.getElementById('arcIdperEli').value;
    var arceliminar = document.getElementById('arceliminar').value;
    // var documen = document.getElementById('documen').value;
    datos = 'arceliminar=' + arceliminar + '&opcion=arcelimnar';

    $.ajax({
        url: '../php/docDocumento.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        //alert(respuesta);
        if (respuesta == 0) {
            $('#succe8').toggle('toggle');
            setTimeout(function() {
                $('#succe8').toggle('toggle');
            }, 2000);

            constudios(arcIdperEli);

        } else if (respuesta == 1) {
            $('#danger8').toggle('toggle');
            setTimeout(function() {
                $('#danger8').toggle('toggle');
            }, 2000);
        } else {
            $('#aviso8').toggle('toggle');
            setTimeout(function() {
                $('#aviso8').toggle('toggle');
            }, 2000);
        }
    });
}

function proborrar() {

    var proIdperEli = document.getElementById('proIdperEli').value;
    var proliminar = document.getElementById('proliminar').value;
    // var documen = document.getElementById('documen').value;
    datos = 'proliminar=' + proliminar + '&opcion=proelimnar';

    $.ajax({
        url: '../php/docProfesion.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        //alert(respuesta);
        if (respuesta == 0) {
            $('#succe9').toggle('toggle');
            setTimeout(function() {
                $('#succe9').toggle('toggle');
            }, 2000);
            conprofesion(proIdperEli);
        } else if (respuesta == 1) {
            $('#danger9').toggle('toggle');
            setTimeout(function() {
                $('#danger9').toggle('toggle');
            }, 2000);
        } else {
            $('#aviso9').toggle('toggle');
            setTimeout(function() {
                $('#aviso9').toggle('toggle');
            }, 2000);
        }
    });
}
///////////////////BORRAR ARCHIVO, PROFESIONAL//////////////

function borrarpro(datos) {

    var d = datos.split("*");
    $("#proliminar").val(d[0]);
    $("#proIdperEli").val(d[1]);
}
//////////////////ADJUNTAR ARCHIVOS////////////////////////

function adjunuevo(v) {

    $("#docadjunto").val(v);

}

function adjuntar() {

    gstIdperArc = document.getElementById('gstIdperArc').value;

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('DgsAgra', $('#DgsAgra')[0].files[0]);
    paqueteDeDatos.append('gstIdperArc', $('#gstIdperArc').prop('value'));
    paqueteDeDatos.append('docadjunto', $('#docadjunto').prop('value'));
    paqueteDeDatos.append('gstNemple', $('#gstNemple').prop('value'));
    paqueteDeDatos.append('opcion', 'documento');
    $.ajax({
        url: '../php/docDocumento.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            if (r == 8) {
                $('#vacio5').toggle('toggle');
                setTimeout(function() {
                    $('#vacio5').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito5').toggle('toggle');
                setTimeout(function() {
                    $('#exito5').toggle('toggle');
                }, 4000);

                consultarDoc(gstIdperArc);

            } else if (r == 1) {
                $('#falla5').toggle('toggle');
                setTimeout(function() {
                    $('#falla5').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error5').toggle('toggle');
                setTimeout(function() {
                    $('#error5').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom5').toggle('toggle');
                setTimeout(function() {
                    $('#renom5').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn5').toggle('toggle');
                setTimeout(function() {
                    $('#forn5').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta5').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta5').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido5').toggle('toggle');
                setTimeout(function() {
                    $('#repetido5').toggle('toggle');
                }, 4000);
            }
        }
    });
}
////////////////////ACTUALIZAR ARCHIVO//////////////////

function adjactual(act) {
    $("#docactuali").val(act);

}

function adjuactual() {

    gstIdperAct = document.getElementById('gstIdperAct').value;

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('DgstActul', $('#DgstActul')[0].files[0]);
    paqueteDeDatos.append('gstIdperAct', $('#gstIdperAct').prop('value'));
    paqueteDeDatos.append('docactuali', $('#docactuali').prop('value'));
    paqueteDeDatos.append('actNemple', $('#actNemple').prop('value'));
    paqueteDeDatos.append('opcion', 'actualizar');

    $.ajax({
        url: '../php/docDocumento.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            //alert(r);
            // console.log(r);
            if (r == 8) {
                $('#vacio6').toggle('toggle');
                setTimeout(function() {
                    $('#vacio6').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito6').toggle('toggle');
                setTimeout(function() {
                    $('#exito6').toggle('toggle');
                }, 4000);
                consultarDoc(gstIdperAct);

            } else if (r == 1) {
                $('#falla6').toggle('toggle');
                setTimeout(function() {
                    $('#falla6').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error6').toggle('toggle');
                setTimeout(function() {
                    $('#error6').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom6').toggle('toggle');
                setTimeout(function() {
                    $('#renom6').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn6').toggle('toggle');
                setTimeout(function() {
                    $('#forn6').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta6').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta6').toggle('toggle');
                }, 4000);
            }
        }
    });
}
//ADJUNTAR OJT Y BITACORA

function adjunojt(v) {

    $("#ojtbit").html(v);
    $("#modal-doc #ojtdocadjunto").val(v);
}

function adjuntarOjt() {

    ojtIdper = document.getElementById('ojtIdper').value;

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('OjtAgra', $('#OjtAgra')[0].files[0]);
    paqueteDeDatos.append('ojtIdper', $('#ojtIdper').prop('value'));
    paqueteDeDatos.append('ojtdocadjunto', $('#ojtdocadjunto').prop('value'));
    paqueteDeDatos.append('ojtNemple', $('#ojtNemple').prop('value'));
    paqueteDeDatos.append('opcion', 'documento');
    $.ajax({
        url: '../php/docInpector.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {

            $('#nota').show();

            if (r == 8) {
                $('#vaciojt').toggle('toggle');
                setTimeout(function() {
                    $('#vaciojt').toggle('toggle');
                }, 4000);

                $("#nota").hide();

            } else if (r == 0) {
                $('#exitojt').toggle('toggle');
                setTimeout(function() {
                    $('#exitojt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
                consultardocIns(ojtIdper);

            } else if (r == 1) {
                $('#fallajt').toggle('toggle');
                setTimeout(function() {
                    $('#fallajt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            } else if (r == 2) {
                $('#errorjt').toggle('toggle');
                setTimeout(function() {
                    $('#errorjt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            } else if (r == 3) {
                $('#renomjt').toggle('toggle');
                setTimeout(function() {
                    $('#renomjt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            } else if (r == 4) {
                $('#fornjt').toggle('toggle');
                setTimeout(function() {
                    $('#fornjt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            } else if (r == 6) {
                $('#adjuntajt').toggle('toggle');
                setTimeout(function() {
                    $('#adjuntajt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            } else if (r == 7) {
                $('#repetidojt').toggle('toggle');
                setTimeout(function() {
                    $('#repetidojt').toggle('toggle');
                }, 4000);
                $("#nota").hide();
            }
        }
    });
}

///ACTUALIZAR

function actualOjt() {

    // ojtIdperact = document.getElementById('ojtIdperact').value;

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('OjtAgraAct', $('#OjtAgraAct')[0].files[0]);
    paqueteDeDatos.append('ojtIdperact', $('#ojtIdperact').prop('value'));
    paqueteDeDatos.append('docactuali', $('#docactuali').prop('value'));
    paqueteDeDatos.append('ojtdocadact', $('#ojtdocadact').prop('value'));
    paqueteDeDatos.append('ojtNempleact', $('#ojtNempleact').prop('value'));
    paqueteDeDatos.append('opcion', 'actdoc');
    $.ajax({
        url: '../php/docInpector.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            if (r == 8) {
                $('#vaciobit').toggle('toggle');
                setTimeout(function() {
                    $('#vaciobit').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exitobit').toggle('toggle');
                setTimeout(function() {
                    $('#exitobit').toggle('toggle');
                }, 4000);

                consultardocIns(ojtIdperact);

            } else if (r == 1) {
                $('#fallabit').toggle('toggle');
                setTimeout(function() {
                    $('#fallabit').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#errorbit').toggle('toggle');
                setTimeout(function() {
                    $('#errorbit').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renombit').toggle('toggle');
                setTimeout(function() {
                    $('#renombit').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#fornbit').toggle('toggle');
                setTimeout(function() {
                    $('#fornbit').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjuntabit').toggle('toggle');
                setTimeout(function() {
                    $('#adjuntabit').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetidobit').toggle('toggle');
                setTimeout(function() {
                    $('#repetidobit').toggle('toggle');
                }, 4000);
            }
        }
    });
}

//////////////DATOS DEL PERSONAL INSPECTOR//////////// 

function inspector(gstIdper) {
    let id_perinsp = gstIdper;
    if (gstIdper === 1203) {
        document.getElementById('foto').innerHTML = '<span><img class="img-circle" src="../dist/img/profile-leonardoR.jpeg" alt="User Avatar" style="width: 80px;"></span>';

    } else {
        document.getElementById('foto').innerHTML = '<img class="img-circle" src="../dist/img/user1-128x128.jpg" style="width: 80px; alt="User Avatar">';
    }
    //LLAMA A LA TABLA DE CURSOS DE EL INSPECTOR 
    opendellcursins(id_perinsp);
    //FUNCION DE PORCENTAJES 27062022
    porceninsp(id_perinsp);
    // .l.
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
                spcialidads(gstIdper);
                $("#insparea").html(gstCatgr); //especialidad Card


                if (gstEvalu == 'NO') { //SE QUITA LA VALIDACIÓN26052022
                    $("#ocultar1").show();
                    $("#ocultar2").show();
                    //                    document.getElementById('evaluaciones').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                } else {
                    $("#ocultar1").show();
                    $("#ocultar2").show();

                    document.getElementById('evaluaciones').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                }

                $.ajax({
                    url: '../php/conDatosPersonal.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;

                    for (i = 0; i < res.length; i++) {

                        if (obj.data[i].gstIdper == gstIdper) {
                            $("#Evalua #reset").val(1);
                            $("#Evalua #idspc").val(obj.data[i].gstIDCat);
                            $("#Evalua #gstIDCate").val(obj.data[i].gstIDCat);
                            $("#Evalua #evalu_nombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#nombrecompleto").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#cargopersonal").val(obj.data[i].gstCargo);
                            $("#id_inspp").val(obj.data[i].gstIdper);
                            $("#id_persinsp").val(obj.data[i].gstIdper);


                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstFeing").val(obj.data[i].gstFeing); //TODO AQUI LE MOVI
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstSexo").val(obj.data[i].gstSexo);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstisst").val(obj.data[i].gstisst);
                            $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
                            $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
                            $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
                            $("#Dtall #gstVignt").val(obj.data[i].gstVignt);

                            $("#Dtall #gstCorro").val(obj.data[i].gstCorro); // correo 1
                            $("#Dtall #gstCinst").val(obj.data[i].gstCinst); // correo 2
                            $("#Dtall #gstSpcID").val(obj.data[i].gstSpcID); // correo 3
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
                            $("#Pusto #sgtCrhnt").val(obj.data[i].sgtCrhnt);
                            $("#Pusto #gstRusp").val(obj.data[i].gstRusp);
                            $("#Pusto #gstPlaza").val(obj.data[i].gstPlaza);
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
                            $("#Pusto #nompuesto").val(obj.data[i].gstNpsto); //NOMBRE DEL PUESTO<span class="text-red" style="font-size:20px">*</span>
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #spcialidad").val(obj.data[i].gstSpoac); //ID especialidad  
                            $("#Pusto #sigla").val(obj.data[i].gstSigla);
                            $("#Dtall #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas
                            $("#Pusto #adscripcion").val(obj.data[i].adscripcion); //adscripcion29092021
                            $("#Pusto #subdir1").val(obj.data[i].descripsub); //adscripcion29092021
                            $("#Pusto #departam").val(obj.data[i].descripdep);

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

                    html = '<select id="especins" name="especins" onchange="cursoespci()" class="form-control" data-placeholder="SELECCIONE A LA ESPECIALIDAD">';
                    for (s = 0; s < res.length; s++) {
                        ss++;

                        if (obj.data[s].gstIDper == gstIdper) {
                            if (obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 25 && obj.data[s].gstIdcat != 26 && obj.data[s].gstIdcat != 29 && obj.data[s].gstIdcat != 31) {
                                html += "<option value=" + obj.data[s].gstIdcat + ">" + obj.data[s].gstCatgr;
                            }
                            // <td><a class='btn btn-default'  href='" + /*obj.data[H].gstDocmt*/ + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + gstID + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td>
                        }
                    }
                    html += '</option>';
                    $("#seleces").html(html);
                })

                $.ajax({
                    url: '../php/curespecial.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;
                    html = '<div class="table-wrapper table-responsive"><table style="width:100%" id="datavaofi1" name="datavaofi1" class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable"><thead><tr><th><i></i>OBLIGATORIOS</th><th><i></i>ESPECIFICOS</th><th><i></i>TRANSVERSALES</th></tr></thead><tbody>';
                    for (U = 0; U < res.length; U++) {
                        if (obj.data[U].especial == document.getElementById('especins').value) {
                            x++;
                            pruebas = "pruebas";

                            html += "<tr><td>" + obj.data[U].basicos + "</td><td>" + obj.data[U].especificos + "</td><td>" + obj.data[U].transversales + "</td></tr>";

                        }

                    }
                    html += '</div></tbody></table></div></div>';
                    $("#cursoespecial").html(html);
                    'use strict';

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
                            $("id_inspp").val(obj.data[i].gstIdper);
                            $("#Dtall #gstIdper").val(obj.data[i].gstIdper);
                            $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
                            $("#Dtall #gstApell").val(obj.data[i].gstApell);
                            $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
                            $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
                            $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
                            $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
                            $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
                            $("#Dtall #gstisst").val(obj.data[i].gstisst);
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
                            $("#Dtall #gstCorro").val(obj.data[i].gstCorro); // correo 1
                            $("#Dtall #gstCinst").val(obj.data[i].gstCinst); // correo 2
                            $("#Dtall #gstSpcID").val(obj.data[i].gstSpcID); // correo 3

                            $("#Pusto #gstSigID").val(obj.data[i].gstSigID); // Observaciones
                            $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
                            $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
                            $("#Pusto #sgtCrhnt").val(obj.data[i].sgtCrhnt);
                            $("#Pusto #gstRusp").val(obj.data[i].gstRusp);
                            $("#Pusto #gstPlaza").val(obj.data[i].gstPlaza);
                            $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
                            $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
                            $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
                            $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
                            $("#Pusto #gstCorro").val(obj.data[i].gstCorro);
                            $("#Pusto #gstCinst").val(obj.data[i].gstCinst);
                            $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
                            $("#Pusto #gstIDara").val(obj.data[i].gstIDara);
                            $("#Pusto #gstNucrt").val(obj.data[i].gstNucrt); //ubicion

                            $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);
                            $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

                            $("#Pusto #gstAreID").val(obj.data[i].gstAreID); //ID área

                            //        alert(obj.data[i].gstAreID);
                            $("#Pusto #gstPstID").val(obj.data[i].gstPstID); //ID puesto
                            $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID); //ID especialidad
                            //  $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

                            $("#Pusto #AcReg").val(obj.data[i].gstComnd); //comandancia
                            $("#Pusto #IDuni").val(obj.data[i].gstIDuni);
                            //DATOS ESPECIALIDAD
                            // alert(obj.data[i].gstIdper);
                            // $("#Spcialidad #spcialidadnombre").val(obj.data[i].gstNombr + ' ' + obj.data[i].gstApell);
                            $("#Spcialidad #gstIDpr").val(obj.data[i].gstIdper);
                            //PARA ADJUNTAR ARCHIVOS OJT Y BITACORA

                            $("#modal-doc #ojtNemple").val(obj.data[i].gstNmpld);
                            $("#modal-doc #ojtIdper").val(obj.data[i].gstIdper);

                            $("#modal-docactualizar #ojtNempleact").val(obj.data[i].gstNmpld);
                            $("#modal-docactualizar #ojtIdperact").val(obj.data[i].gstIdper);


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

                    html = '<select id="especins" name="especins" onchange="cursoespci()" class="form-control" data-placeholder="SELECCIONE A LA ESPECIALIDAD">';
                    for (s = 0; s < res.length; s++) {
                        ss++;

                        if (obj.data[s].gstIDper == gstIdper) {
                            if (obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 25 && obj.data[s].gstIdcat != 26 && obj.data[s].gstIdcat != 29 && obj.data[s].gstIdcat != 31) {
                                html += "<option value=" + obj.data[s].gstIdcat + ">" + obj.data[s].gstCatgr;
                            }
                            // <td><a class='btn btn-default'  href='" + /*obj.data[H].gstDocmt*/ + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + gstID + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td>
                        }
                    }
                    html += '</option>';
                    $("#seleces").html(html);
                })

                $.ajax({
                    url: '../php/curespecial.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;
                    html = '<div class="table-wrapper table-responsive"><table style="width:100%" id="datavaofi1" name="datavaofi1" class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable"><thead><tr><th><i></i>OBLIGATORIOS</th><th><i></i>ESPECIFICOS</th><th><i></i>TRANSVERSALES</th></tr></thead><tbody>';
                    for (U = 0; U < res.length; U++) {
                        if (obj.data[U].especial == document.getElementById('especins').value) {
                            x++;
                            pruebas = "pruebas";

                            html += "<tr><td>" + obj.data[U].basicos + "</td><td>" + obj.data[U].especificos + "</td><td>" + obj.data[U].transversales + "</td></tr>";

                        }

                    }
                    html += '</div></tbody></table></div></div>';
                    $("#cursoespecial").html(html);
                    'use strict';

                })

                //comentar de aqui antigua tablas

                /*$.ajax({
                    url: '../php/gesCurso.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 0;
                    //30082021
                    programados = 0;
                    programados1 = 0;
                    DECLINADOS = 0;
                    FINALIZADO = 0;
                    CANCELADO = 0;
                    OTROS = 0;
                    insp = 0;

                    //TODO AQUÍ ES LO QUE LLEVA TABLA DE DETTALLE INSPECTOR
                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap rounded table-responsive"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th>FOLIO</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>INICIO</th><th><i></i>HORA</th><th><i></i>FINAL</th><th><i></i>ASISTENCIA</th><th><i></i>VIGENCIA</th><th><i></i>PROCESO</th><th style="display:none;"><i></i>DOCUMENTO</th><th style="display:none;"><i></i>asitencia</th></tr></thead><tbody>';
                    //26082021
                    //TRAE LOS DATOS DE LA TABLA CELDA
                    $(document).ready(function() {
                        $("#curso tr").on('click', function() {
                            var toma1 = "",
                                toma2 = "",
                                toma3 = ""; //declaramos las columnas NOMBRE DEL CURSO
                            toma1 += $(this).find('td:eq(2)').html(); //NOMBRE DEL CURSO  
                            toma2 += $(this).find('td:eq(10)').html(); //PDF
                            toma3 += $(this).find('td:eq(11)').html(); //PDF                    
                            $("#nombredeclin").text(toma1); // Label esta en valor.php
                            $("#declinpdf").attr('href', toma2); // Label esta en valor.php
                            $("#motivod").text('Motivo:' + toma3); // Label esta en valor.php
                            $("#otrosd").text(toma2); // Label esta en valor.php

                            if (toma3 == 'OTROS') {
                                document.getElementById('otrosd').style.display = '';
                                document.getElementById('declinpdf').style.display = 'none';
                            }
                            if (toma3 == 'TRABAJO') {
                                document.getElementById('otrosd').style.display = 'none';
                                document.getElementById('declinpdf').style.display = '';
                            }
                            if (toma3 == 'ENFERMEDAD') {
                                document.getElementById('otrosd').style.display = 'none';
                                document.getElementById('declinpdf').style.display = '';
                            }
                        });
                    });


                    for (ii = 0; ii < res.length; ii++) {
                        x++;

                        if (gstIdper == obj.data[ii].idinsp) {

                            //BASICOS CHECK LIST INSPECTOR DAMIAN1
                            if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                                $("#Bfecha").html(obj.data[ii].fcursof);

                            } else if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                                $("#Bfecha").html(obj.data[ii].fcursof);
                            } else
                            if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'PENDIENTE') {
                                document.getElementById('bscos').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                                $("#Bfecha").html('PENDIENTE');
                            }

                            //RECURRENTES recurnt CHECK LIST INSPECTOR
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

                            //ESPECIFICOS specifico CHECK LIST INSPECTOR
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

                        //ESTATUS UNICA VEZ +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++    
                        if (obj.data[ii].gstVignc == 101 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) { // UNICA VEZ EN ESTATUS "BASICOS/INICIAL"
                            status = "<span style='background-color:#3C8DBC; font-size: 14px;' class='badge'>UNICA VEZ</span>";
                            //console.log(status);
                        }
                        //ESTATUS VENCIDO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        //vencido todos menos basicos
                        if (factual >= finaliza && obj.data[ii].fcurso <= obj.data[ii].recursado && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo != "BÁSICOS/INICIAL") {
                            status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                            //console.log(status);
                        }
                        //vencido basicos
                        if (factual >= finaliza && obj.data[ii].fcurso <= obj.data[ii].recurrente && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo == "BÁSICOS/INICIAL") {
                            status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                        }

                        //ESTATUS CURSADO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        if (factual >= finaliza && obj.data[ii].fcurso < obj.data[ii].recursado && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo != "BÁSICOS/INICIAL") {
                            status = "<span style='background-color:#083368; font-size: 14px;' class='badge'>RENOVADO</span>";
                            //console.log(status);
                        }
                        //cursado basicos
                        if (factual >= finaliza && obj.data[ii].fcurso < obj.data[ii].recurrente && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo == "BÁSICOS/INICIAL") {
                            status = "<span style='background-color:#083368; font-size: 14px;' class='badge'>RECURRENCIA</span>";
                            //console.log(status);
                        }
                        //ESTATUS POR VENCER +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        if (factual >= ftermino && obj.data[ii].fcurso <= obj.data[ii].recursado && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo != "BÁSICOS/INICIAL") {
                            status = "<span style='background-color: orange; font-size: 14px;' class='badge'>POR VENCER</span>";
                            //console.log(status);
                        }
                        //cursado basicos
                        if (factual >= ftermino && obj.data[ii].fcurso <= obj.data[ii].recurrente && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101 && obj.data[ii].gstTipo == "BÁSICOS/INICIAL") {
                            status = "<span style='background-color: orange; font-size: 14px;' class='badge'>POR VENCER</span>";
                            //console.log(status);
                        }
                        //ESTATUS REENOVADO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        if (factual >= ftermino && obj.data[ii].fcurso < obj.data[ii].recursado && obj.data[ii].gstTipo != 'BÁSICOS/INICIAL' && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101) {
                            status = "<span style='background-color: #083368; font-size: 14px;' class='badge'>RENOVADO</span>";
                            //console.log(status);
                        }
                        //cursos básicos
                        if (factual >= finaliza && obj.data[ii].fcurso < obj.data[ii].recurrente && obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101) {
                            status = "<span style='background-color:#083368; font-size: 14px;' class='badge'>RECURRENCIA</span>";
                            //console.log(status);
                        }
                        //ESTATUS VIGENTE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        if (factual <= ftermino && obj.data[ii].fcurso == obj.data[ii].recursado && obj.data[ii].gstTipo != 'BÁSICOS/INICIAL' && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101) {
                            status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                            //console.log(status);
                        }
                        //cursos básicos
                        if (factual <= ftermino && obj.data[ii].fcurso == obj.data[ii].recurrente && obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].evaluacion >= 80 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].gstVignc != 101) {
                            status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                            //console.log(status);
                        }
                        //ESTATUS REPROBADO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

                        if (obj.data[ii].evaluacion <= 79 && obj.data[ii].confirmar == 'CONFIRMADO' && obj.data[ii].proceso == 'FINALIZADO') {
                            status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                        }
                        //ESTATUS PENDIENTE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        if (obj.data[ii].evaluacion == 'NULL') {
                            status = "<span style='background-color: dangerous; font-size: 14px;' class='badge'>PENDIENTE</span>";
                            //console.log(status);
                        }
                        //ESTATUS DE ASISTENCIA **********************************************************
                        if (obj.data[ii].confirmar == 'TRABAJO') { //DECLINADO POR TRABAJO
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                        } else if (obj.data[ii].confirmar == 'ENFERMEDAD') { //DECLINADO POR ENFERMEDAD
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                        } else if (obj.data[ii].confirmar == 'OTROS' && obj.data[ii].justifi != 'NO ASISTIÓ') {
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                            proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                        } else if (obj.data[ii].confirmar == 'OTROS' && obj.data[ii].justifi == 'NO ASISTIÓ' && obj.data[ii].proceso == 'FINALIZADO') {
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>NO ASISTIO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>NO ACREDITO</span>";
                            proc12 = "<span style='color:green; font-size: 14px;'>FINALIZADO</span>";
                        } else if (obj.data[ii].confirmar == 'OTROS' && obj.data[ii].justifi == 'NO ASISTIÓ' && obj.data[ii].proceso == 'PENDIENTE') {
                            confirmar = "<a type'button' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>NO ASISTIO</a>";
                            status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>NO ACREDITO</span>";
                            proc12 = "<span style='color:grey; font-size: 14px;'>PENDIENTE</span>";
                        }


                        if (obj.data[ii].confirmar == 'CONFIRMADO') { // ACEPTA LA CONVOCATORIA DEL CURSO
                            confirmar = "<span title='Confirma su asistencia' style='color: green;'>CONFIRMADO</span>";
                        }
                        //ESTATUS DE ASISTENCIA **********************************************************


                        if (obj.data[ii].confirmar == 'CONFIRMAR') {
                            status1 = "<span style='font-weight: bold; color: grey;'>PENDIENTE</span>";

                        } else if (obj.data[ii].proceso == 'CANCELADO') {
                            status1 = "<span style='font-weight: bold; color: red;'>CANCELADO</span>";

                        }
                        if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {


                            if (obj.data[ii].evaluacion == 'NULL') {
                                valua = 'FALTA EVALUACIÓN';
                                proc12 = "<span style='color: grey; font-size: 14px;'>FINALIZADO<br>" + valua + "</span>";
                            } else if (obj.data[ii].evaluacion > 79) {
                                valua = 'APROBO';
                                proc12 = "<span style='color: green; font-size: 14px;'>FINALIZADO<br>" + valua + "</span>";
                            } else {
                                valua = 'NO APROBO';
                                proc12 = "<span style='color: red; font-size: 14px;'>FINALIZADO<br>" + valua + "</span>";

                            }






                        } else if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                            proc12 = "<span style='background-color: orange; font-size: 14px;' class='badge'>PENDIENTE</span>";

                            //COMPARACION DE FECHAS 
                            feccomar = document.getElementById('fecomp1').value;
                            if (obj.data[ii].fcurso == feccomar && obj.data[ii].confirmar == 'CONFIRMADO') {
                                proc12 = "<span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span>";
                            }
                            if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                status1 = "<span style='font-weight: bold; color: orange;'>PENDIENTE</span>";
                            }

                            // FIN COMPARACIÓN FECHAS
                        }
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
                                if (obj.data[ii].confirmar == 'CONFIRMAR') { // LISTA INSPECTOR
                                    html += "<tr><td>" + obj.data[ii].gstIdlsc + "</td><td>" + obj.data[ii].codigo + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td><span>" + status1 + "</span></td><td><span style='background-color: grey; font-size: 14px;' class='badge'>PENDIENTE</span></td><td><span style='background-color: grey; font-size: 14px;' class='badge'>EN ESPERA</span></td></tr>";
                                } else {
                                    html += "<tr><td>" + x + "</td><td>" + obj.data[ii].codigo + "</td><td>" + obj.data[ii].gstTitlo + "</td><td>" + obj.data[ii].gstTipo + "</td><td>" + Finicio + "</td><td>" + obj.data[ii].hcurso + "</td><td>" + Final + "</td><td>" + confirmar + "</td><td>" + status + "</td><td>" + proc12 + "</td><td style='display:none;'>" + obj.data[ii].justifi + "</td><td style='display:none;'>" + obj.data[ii].confirmar + "</td></tr>";
                                }

                                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                    programados++;
                                }
                                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMAR') {
                                    programados1++;
                                }


                                if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {
                                    FINALIZADO++;
                                }
                                if (obj.data[ii].confirmar == 'TRABAJO') {
                                    CANCELADO++;
                                }
                                if (obj.data[ii].confirmar == 'ENFERMEDAD') {
                                    DECLINADOS++;
                                }
                                if (obj.data[ii].confirmar == 'OTROS') {
                                    OTROS++;
                                }
                                if (obj.data[ii].estado == '0') {
                                    insp++;
                                }

                                document.getElementById("programado").innerHTML = (programados + programados1) + '/' + insp;
                                document.getElementById("FINALIZADO").innerHTML = FINALIZADO + '/' + insp;
                                document.getElementById("CANCELADO").innerHTML = (CANCELADO + DECLINADOS + OTROS) + '/' + insp;
                                //PORCENTAJE DE COMPLETADOS

                                var porcentaje1 = document.getElementById("porcentaje11");
                                resultado3 = ((FINALIZADO * 100) / insp);
                                var resFinal3 = resultado3.toFixed(0);
                                porcentaje1.style.width = (resFinal3 + "%");
                                porcentaje11.innerHTML = (resFinal3 + "%");
                                document.getElementById("porcentaje11").title = porcentaje11.innerHTML //title de porcentajes

                                // PORCENTAJE DE PROGRAMADOS
                                var porcentaje12 = document.getElementById("porcentaje12");
                                resultado = (((programados + programados1) * 100) / insp);

                                var resFinal = resultado.toFixed(0);
                                porcentaje12.style.width = (resFinal + "%");
                                porcentaje12.innerHTML = (resFinal + "%"); //VALOR
                                document.getElementById("porcentaje12").title = porcentaje12.innerHTML //title de porcentajes

                                // PORCENTAJE DE CANCELADO
                                var porcentaje13 = document.getElementById("porcentaje13");
                                resultado1 = (((CANCELADO + DECLINADOS + OTROS) * 100) / insp);
                                var resFinal1 = resultado1.toFixed(0);

                                porcentaje13.style.width = (resFinal1 + "%"); // DETALLE INSPECTOR
                                porcentaje13.innerHTML = (resFinal1 + "%"); //VALOR
                                document.getElementById("porcentaje13").title = porcentaje13.innerHTML //title de porcentajes

                            }
                        }
                        // TODO AQUI TERMINA
                    }
                    html += '</tbody></table></div></div></div>';
                    $("#cursos").html(html);

                })*/


                $.ajax({
                    url: '../php/conEstudios.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp)
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
                    for (H = 0; H < res.length; H++) {
                        x++;

                        if (obj.data[H].gstIDper == gstIdper) {

                            datos = obj.data[H].gstIdstd + "*" + obj.data[H].gstIDper + "*" + obj.data[H].gstInstt + "*" + obj.data[H].gstCiuda + "*" + obj.data[H].gstPriod + "*" + obj.data[H].gstDocmt + "*" + obj.data[H].gstIdstd;

                            html += "<tr><td>" + H + "</td><td>" + obj.data[H].gstInstt + "</td><td>" + obj.data[H].gstCiuda + "</td><td> " + obj.data[H].gstPriod + "</td><td><a class='btn btn-default'  href='" + obj.data[H].gstDocmt + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td> </tr>";
                            document.getElementById('estudios').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                            document.getElementById('std-pdf').innerHTML = '<a href="' + obj.data[H].gstDocmt + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a>';
                            document.getElementById('std-fec').innerHTML = obj.data[H].fechar;


                        } else {

                            //                      document.getElementById('estudios').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';

                        }

                    }
                    html += '</tbody></table></div></div></div>';
                    $("#studios").html(html);
                })

                $.ajax({
                    url: '../php/conProfesion.php', //DETALLE PERFIL INSPECTOR
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var x = 1;


                    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>PAÍS</th><th><i></i>CIUDAD</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
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

                            html += "<tr><td>" + P + "</td><td>" + obj.data[P].gstPusto + "</td><td>" + obj.data[P].gstMpres + "</td><td> " + obj.data[P].gstPais + "</td><td> " + obj.data[P].gstCidua + "</td><td> " + obj.data[P].gstActiv + "</td><td> " + gstFntra + "</td><td> " + gstFslda + "</td><td><a class='btn btn-default' title='Descargar archivo' href='" + obj.data[P].gstDocep + "' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a> <a type='button' title='Editar experiencia profesional' onclick='actPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modalprofesion'><i class='fa fa-edit text-info'></i></a> <a type='button' title='Subir archivo' onclick='carPrfsn(" + '"' + datos + '"' + ")' class='btn btn-default' data-toggle='modal' data-target='#modaldocprofesion'><i class='fa fa-cloud-upload'></i></a></td> </tr>";

                            document.getElementById('profesions').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                            document.getElementById('pro-pdf').innerHTML = '<a href="' + obj.data[P].gstDocep + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a>';
                            document.getElementById('pro-fec').innerHTML = obj.data[P].profec;
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
                    //04012022
                    html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>CUMPLE</th><th style="width:1%;"><i></i>SI</th><th style="width:1%"><i></i>NO</th></tr></thead><tbody>';
                    for (E = 0; E < res.length; E++) {
                        x++;
                        //alert(gstIDCat) //categoria 


                        if (obj.data[E].gstCatga == gstIDCat) {

                            //if(obj.data[E].gstOrden==1){    
                            html += "<input type='hidden' name='gstInspr[]' id='gstInspr' value='" + gstIdper + "'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='" + obj.data[E].gstIdprm + "'/><td>" + obj.data[E].gstOrden + "</td><td>" + obj.data[E].gstPrmtr + "</td><td style='text-align: center;'> <input type='checkbox' value='SI' name='actual[]' /> </td> <td style='text-align: center;'> <input type='checkbox' value='NO' name='actual[]' /></td></tr>";
                            //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                            // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                            //}<td><input id='comntr' name='comntr[]'> </td>
                        }
                    }
                    html += '</tbody></table></div>';
                    $("#evlacns").html(html);
                })

            }
        }
    })

    consultardocIns(gstIdper);

}
//FUNCION PARA VER EL DETALLE DE NO ASISTIO
function modaldeclin(id_curso) {
    //alert(id_curso);
    //alert("MODAL NO ASISTIO");
    $.ajax({
        url: '../php/consporce.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        for (ii = 0; ii < res.length; ii++) {
            x++;
            if (id_curso == obj.data[ii].id_curso) {
                //alert(obj.data[ii].justifi);
                let toma1 = obj.data[ii].gstTitlo; //NOMBRE DEL CURSO  
                let toma2 = obj.data[ii].justifi; //JUSTIFICACIÓN
                let toma3 = obj.data[ii].confirmar; //MOTIVO     
                $("#nombredeclin").text(toma1); // Label esta en valor.php
                $("#declinpdf").attr('href', toma2); // Label esta en valor.php
                $("#motivod").text('Motivo:' + toma3); // Label esta en valor.php
                $("#otrosd").text(toma2); // Label esta en valor.php

                if (toma3 == 'OTROS' && toma2 != 'NO ASISTIÓ') {
                    document.getElementById('otrosd').style.display = '';
                    document.getElementById('declinpdf').style.display = 'none';
                }
                if (toma3 == 'OTROS' && toma2 == 'NO ASISTIÓ') {
                    document.getElementById('otrosd').style.display = 'none';
                    document.getElementById('declinpdf').style.display = 'none';
                    $("#motivod").text('Motivo:' + ' NO ASISTIÓ');
                }
                if (toma3 == 'TRABAJO') {
                    document.getElementById('otrosd').style.display = 'none';
                    document.getElementById('declinpdf').style.display = '';
                }
                if (toma3 == 'ENFERMEDAD') {
                    document.getElementById('otrosd').style.display = 'none';
                    document.getElementById('declinpdf').style.display = '';
                }

            }
        }
    })

}
//FUNCION PARA VER EL DETALLE DE PORCENTAJE DE LOS CURSOS 
function porceninsp(id_perinsp) {
    //alert(id_perinsp);
    //alert("PORCENTAJE");
    $.ajax({
        url: '../php/consporce.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        //30082021
        programados = 0;
        programados1 = 0;
        DECLINADOS = 0;
        FINALIZADO = 0;
        CANCELADO = 0;
        OTROS = 0;
        insp = 0;

        for (ii = 0; ii < res.length; ii++) {
            x++;
            if (id_perinsp == obj.data[ii].idinsp) {
                //BÁSICOS CHECK LIST INSPECTOR
                if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                    document.getElementById('bscos').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                    $("#Bfecha").html(obj.data[ii].fcursof);
                }
                if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                    document.getElementById('bscos').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                    $("#Bfecha").html(obj.data[ii].fcursof);
                }
                if (obj.data[ii].gstTipo == 'BÁSICOS/INICIAL' && obj.data[ii].proceso == 'PENDIENTE') {
                    document.getElementById('bscos').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                    $("#Bfecha").html('PENDIENTE');
                }
                //RECURRENTES CHECK LIST INSPECTOR
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
                //ESPECIFICOS CHECK LIST INSPECTOR
                if (obj.data[ii].gstTipo == 'ESPECÍFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion >= 80) {
                    document.getElementById('specifico').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                    $("#Efecha").html(obj.data[ii].fcursof);

                } else if (obj.data[ii].gstTipo == 'ESPECÍFICOS' && obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].evaluacion < 80) {
                    document.getElementById('specifico').innerHTML = '<img src="../dist/img/uncheked.svg" alt="NO" width="25px;">';
                    $("#Efecha").html(obj.data[ii].fcursof);
                } else
                if (obj.data[ii].gstTipo == 'ESPECÍFICOS' && obj.data[ii].proceso == 'PENDIENTE') {
                    document.getElementById('specifico').innerHTML = '<img src="../dist/img/pendientes.svg" alt="NO" width="25px;">';
                    $("#Efecha").html('PENDIENTE');
                }

                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                    programados++;
                }
                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMAR') {
                    programados1++;
                }


                if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {
                    FINALIZADO++;
                }
                if (obj.data[ii].confirmar == 'TRABAJO') {
                    CANCELADO++;
                }
                if (obj.data[ii].confirmar == 'ENFERMEDAD') {
                    DECLINADOS++;
                }
                if (obj.data[ii].confirmar == 'OTROS') {
                    OTROS++;
                }
                if (obj.data[ii].estado == '0') {
                    insp++;
                }

                document.getElementById("programado").innerHTML = (programados + programados1) + '/' + insp;
                document.getElementById("FINALIZADO").innerHTML = FINALIZADO + '/' + insp;
                document.getElementById("CANCELADO").innerHTML = (CANCELADO + DECLINADOS + OTROS) + '/' + insp;
                //PORCENTAJE DE COMPLETADOS

                var porcentaje1 = document.getElementById("porcentaje11");
                resultado3 = ((FINALIZADO * 100) / insp);
                var resFinal3 = resultado3.toFixed(0);
                porcentaje1.style.width = (resFinal3 + "%");
                porcentaje11.innerHTML = (resFinal3 + "%");
                document.getElementById("porcentaje11").title = porcentaje11.innerHTML //title de porcentajes

                // PORCENTAJE DE PROGRAMADOS
                var porcentaje12 = document.getElementById("porcentaje12");
                resultado = (((programados + programados1) * 100) / insp);

                var resFinal = resultado.toFixed(0);
                porcentaje12.style.width = (resFinal + "%");
                porcentaje12.innerHTML = (resFinal + "%"); //VALOR
                document.getElementById("porcentaje12").title = porcentaje12.innerHTML //title de porcentajes

                // PORCENTAJE DE CANCELADO
                var porcentaje13 = document.getElementById("porcentaje13");
                resultado1 = (((CANCELADO + DECLINADOS + OTROS) * 100) / insp);
                var resFinal1 = resultado1.toFixed(0);

                porcentaje13.style.width = (resFinal1 + "%"); // DETALLE INSPECTOR
                porcentaje13.innerHTML = (resFinal1 + "%"); //VALOR
                document.getElementById("porcentaje13").title = porcentaje13.innerHTML //title de porcentajes

            }
        }
    })
}
//FUNCION PARA VER EL DETALLE DE PORCENTAJE DE LOS CURSOS 
function porcenperso(id_perinsp) {
    //alert(id_perinsp);
    //alert("PORCENTAJE PERSONAS");
    $.ajax({
        url: '../php/consporce.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        //30082021
        programados = 0;
        programados1 = 0;
        DECLINADOS = 0;
        FINALIZADO = 0;
        CANCELADO = 0;
        OTROS = 0;
        insp = 0;

        for (ii = 0; ii < res.length; ii++) {
            x++;
            if (id_perinsp == obj.data[ii].idinsp) {

                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMADO') {
                    programados++;
                }
                if (obj.data[ii].proceso == 'PENDIENTE' && obj.data[ii].confirmar == 'CONFIRMAR') {
                    programados1++;
                }

                if (obj.data[ii].proceso == 'FINALIZADO' && obj.data[ii].confirmar == 'CONFIRMADO') {
                    FINALIZADO++;
                }
                if (obj.data[ii].confirmar == 'TRABAJO') {
                    CANCELADO++;
                }
                if (obj.data[ii].confirmar == 'ENFERMEDAD') {
                    DECLINADOS++;
                }
                if (obj.data[ii].confirmar == 'OTROS') {
                    OTROS++;
                }
                if (obj.data[ii].estado == '0') {
                    insp++;
                }

                document.getElementById("programado").innerHTML = (programados + programados1) + '/' + insp;
                document.getElementById("FINALIZADO").innerHTML = FINALIZADO + '/' + insp;
                document.getElementById("CANCELADO").innerHTML = (CANCELADO + DECLINADOS + OTROS) + '/' + insp;
                //PORCENTAJE DE COMPLETADOS

                var porcentaje1 = document.getElementById("porcentaje11");
                resultado3 = ((FINALIZADO * 100) / insp);
                var resFinal3 = resultado3.toFixed(0);
                porcentaje1.style.width = (resFinal3 + "%");
                porcentaje11.innerHTML = (resFinal3 + "%");
                document.getElementById("porcentaje11").title = porcentaje11.innerHTML //title de porcentajes

                // PORCENTAJE DE PROGRAMADOS
                var porcentaje12 = document.getElementById("porcentaje12");
                resultado = (((programados + programados1) * 100) / insp);

                var resFinal = resultado.toFixed(0);
                porcentaje12.style.width = (resFinal + "%");
                porcentaje12.innerHTML = (resFinal + "%"); //VALOR
                document.getElementById("porcentaje12").title = porcentaje12.innerHTML //title de porcentajes

                // PORCENTAJE DE CANCELADO
                var porcentaje13 = document.getElementById("porcentaje13");
                resultado1 = (((CANCELADO + DECLINADOS + OTROS) * 100) / insp);
                var resFinal1 = resultado1.toFixed(0);

                porcentaje13.style.width = (resFinal1 + "%"); // DETALLE INSPECTOR
                porcentaje13.innerHTML = (resFinal1 + "%"); //VALOR
                document.getElementById("porcentaje13").title = porcentaje13.innerHTML //title de porcentajes

            }
        }
    })
}
//FUNCION PARA FILTRAR ESPECIALIDAD VISTA 2
function cursoespci() {

    $.ajax({
        url: '../php/curespecial.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        html = '<div class="table-wrapper table-responsive"><table style="width:100%" id="datavaofi1" name="datavaofi1" class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable"><thead><tr><th><i></i>OBLIGATORIOS</th><th><i></i>ESPECIFICOS</th><th><i></i>TRANSVERSALES</th></tr></thead><tbody>';
        for (U = 0; U < res.length; U++) {
            if (obj.data[U].especial == document.getElementById('especins').value) {
                x++;
                pruebas = "pruebas";

                html += "<tr><td>" + obj.data[U].basicos + "</td><td>" + obj.data[U].especificos + "</td><td>" + obj.data[U].transversales + "</td></tr>";

            }

        }
        html += '</div></tbody></table></div></div>';
        $("#cursoespecial").html(html);
        'use strict';

    })


}

////////////////////CONSULTA OJT Y BITACORA///////////////

function consultardocIns(gstIdper) {
    //alert(gstIdper);
    $.ajax({
        url: "../php/InsDoc.php",
        type: "POST",
        data: 'gstIdper=' + gstIdper
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;
        var y = 0;

        //        html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form class="form-horizontal" action="" method="POST"><input type="hidden" name="gstIdper" id="gstIdper"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">#</th><th scope="col" style="width:100px;">DOCUMENTO</th><th scope="col">FECHA</th> <th scope="col">ACCIONES</th> </tr></thead><tbody>';
        html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form class="form-horizontal" action="" method="POST"><input type="hidden" name="gstIdper" id="gstIdper"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">#</th> <th scope="col">OJT - ACTUALIZAR </th> </tr></thead><tbody>';

        for (D = 0; D < res.length; D++) {

            if (obj.data[D].documento === 'OJT') {
                dato = obj.data[D].idi + '*' + obj.data[D].idperdoc + '*' + obj.data[D].documento;
                x++;
                var cadena = obj.data[D].docajunto;
                var extraida = cadena.substring(25, 200000);

                html += '<tr><td>' + x + '</td><td><a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:14px;color:black; " target="_blanck"> <i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>' + " " + extraida + '</a></td><td><a type="button" title="Actualizar documento" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="ctualDoc(' + "'" + dato + "'" + ');" data-target="#modal-docactualizar"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="borrarOjt(' + "'" + dato + "'" + ')" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminarojt"><i class="fa fa-trash-o text-danger"></i></a></td></tr>';
                document.getElementById('ojt').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                document.getElementById('ojt-pdf').innerHTML = '<a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a>';
                document.getElementById('ojt-fec').innerHTML = obj.data[D].fecactual;
                $("#oclOJT").hide();


            }

        }
        html += '</tbody></table></form></div></div>';

        $("#docInsp").html(html);

        if (x === 0) {
            $("#oclOJT").show();
            $("#ojt").hide();
            $("#ojt-pdf").hide();
            $("#ojt-fec").hide();
        } else {
            $("#ojt").show();
            $("#ojt-pdf").show();
            $("#ojt-fec").show();
        }

        html = '<div style="padding-top: 5px;" class="col-md-12"><div class="nav-tabs-custom"><form class="form-horizontal" action="" method="POST"><input type="hidden" name="gstIdper" id="gstIdper"><table style="width: 100%;" id="checkrh" class="table table-striped table-hover center" ><thead><tr><th scope="col">#</th> <th scope="col">BITÁCORA - ACTUALIZAR </th> </tr></thead><tbody>';

        for (D = 0; D < res.length; D++) {

            if (obj.data[D].documento === 'BITACORA') {
                dato = obj.data[D].idi + '*' + obj.data[D].idperdoc + '*' + obj.data[D].documento;
                y++;
                var cadena1 = obj.data[D].docajunto;
                var extraid1 = cadena1.substring(30, 200000);

                html += '<tr><td>' + y + '</td><td><a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:14px;color:black;" target="_blanck"> <i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>' + " " + extraid1 + '</a></td><td><a type="button" title="Actualizar documento" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="ctualDoc(' + "'" + dato + "'" + ');" data-target="#modal-docactualizar"><i class="fa fa-refresh text-info"></i></a><a href="#" onclick="borrarOjt(' + "'" + dato + "'" + ')" type="button" style="margin-left:2px" title="Borrar documento"  class="eliminar btn btn-default" data-toggle="modal" data-target="#eliminarojt"><i class="fa fa-trash-o text-danger"></i></a></td></tr>';
                document.getElementById('btcr').innerHTML = '<img src="../dist/img/check.svg" alt="YES" width="25px;">';
                document.getElementById('btcr-pdf').innerHTML = '<a href="' + obj.data[D].docajunto + '" style="text-align: center; font-size:20px;color:red; " target="_blanck"> <i class="fa fa-file-pdf-o"></i></a>';
                document.getElementById('btcr-fec').innerHTML = obj.data[D].fecactual;
                $("#oclBTC").hide();
            }

        }
        html += '</tbody></table></form></div></div>';

        $("#docBita").html(html);

        if (y === 0) {
            $("#oclBTC").show();
            $("#btcr").hide();
            $("#btcr-pdf").hide();
            $("#btcr-fec").hide();
        } else {
            $("#btcr").show();
            $("#btcr-pdf").show();
            $("#btcr-fec").show();
        }
    })

}

///ELIMINAR DOCUMENTOS

function borrarOjt(dato) {

    var d = dato.split("*");

    $("#eliminarojt #ojtIdperEli").val(d[0]);
    $("#eliminarojt #ojtidperdoc").val(d[1]);
}

function borrarojt() {

    var ojtIdperEli = document.getElementById('ojtIdperEli').value;
    var ojtidperdoc = document.getElementById('ojtidperdoc').value;
    //alert(ojtIdperEli);
    datos = 'ojtIdperEli=' + ojtIdperEli + '&opcion=elimiarojt';

    $.ajax({
        url: '../php/docInpector.php',
        type: 'POST',
        data: datos
    }).done(function(respuesta) {
        //alert(respuesta);
        if (respuesta == 0) {
            $('#succei').toggle('toggle');
            setTimeout(function() {
                $('#succei').toggle('toggle');
            }, 2000);

            consultardocIns(ojtidperdoc);

        } else if (respuesta == 1) {
            $('#dangeri').toggle('toggle');
            setTimeout(function() {
                $('#dangeri').toggle('toggle');
            }, 2000);
        } else {
            $('#avisoi').toggle('toggle');
            setTimeout(function() {
                $('#avisoi').toggle('toggle');
            }, 2000);
        }
    });

}
///ACTUALIZAR OJT O BITACORA

function ctualDoc(dato) {

    d = dato.split('*');
    $("#docactuali").val(d[0]);
    $("#ojtdocadact").val(d[2]);
}
///CONSULTA ESPECIALIDAD
function spcialidads(gstIdper) {

    $.ajax({
        url: '../php/conSpcialidad.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var ss = 0;

        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><th>#</th><th>TITULO</th><th>EVALUACIÓN</th><th>ACCIONES</th></thead><tbody>';
        for (s = 0; s < res.length; s++) {


            if (obj.data[s].gstIDper == gstIdper) {


                datos = obj.data[s].gstIDper + '.' + obj.data[s].gstIDcat;
                dato = gstIdper + '*' + obj.data[s].gstIDcat + '*' + obj.data[s].gstCatgr;
                gstID = obj.data[s].gstIDper;
                if (obj.data[s].gstIdcat != 24 && obj.data[s].gstIdcat != 25 && obj.data[s].gstIdcat != 26 && obj.data[s].gstIdcat != 29 && obj.data[s].gstIdcat != 31) {
                    ss++;

                    //alert(obj.data[s].gstIDeva);
                    if (obj.data[s].gstIDeva == 'NO') {

                        //if(ss===1){
                        //html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td><td><a type='button' title='Por evaluación' onclick='inspectores(" + '"' + dato + '"' + ")' class='btn btn-warning'  data-toggle='modal' style='background-color:silver;' ><i class='fa ion-android-clipboard' style='font-size:23px; '></i></a></td><td><a onclick='spcBorrar(" + '"' + dato + '"' + ")' type='button' style='margin-left:2px' title='Borrar especialidad'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminarspci'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                        //  }else{
                        html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td><td><a type='button' title='Por evaluación' onclick='inspectores(" + '"' + dato + '"' + ")' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a></td><td><a onclick='spcBorrar(" + '"' + dato + '"' + ")' type='button' style='margin-left:2px' title='Borrar especialidad'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminarspci'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                        //  }

                    } else {
                        html += "<tr><td>" + ss + "</td><td>" + obj.data[s].gstCatgr + "</td><td><a type='button' title='Evaluado' onclick='resultados(" + datos + ")' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a></td><td><a onclick='spcBorrar(" + '"' + dato + '"' + ")' type='button' style='margin-left:2px' title='Borrar especialidad'  class='eliminar btn btn-default' data-toggle='modal' data-target='#eliminarspci'><i class='fa fa-trash-o text-danger'></i></a></td></tr>";
                    }

                }
            }
        }
        html += '</tbody></table></div></div></div>';
        $("#especialidades").html(html);
    })
}
////////////////EVALUACIÓN //////////////////

function inspectores(dato) {

    // alert(dato);
    var d = dato.split("*");
    $("#idspc").val(d[1]);
    $("#reset").val(0);
    $('#Evalua #button').show();
}
///////////DATOS PERSONAL FINAL DE CONSULTA/////////////

function consultaCurso(gst) {


    var d = gst.split("*");



    gstIdper = d[0];
    gstCateg = d[1];
    $.ajax({
        url: '../php/lisOblig.php',
        type: 'POST',
        data: 'gstIdper=' + gstIdper

    }).done(function(resp) {
        // alert(resp);
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="obliga" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>PERFIL</th><th><i></i>DURACIÓN</th><th><i></i>PROCESO</th></tr></thead><tbody>';
        for (o = 0; o < res.length; o++) {
            x++;
            //alert(obj.data[o].gstIDper+' '+obj.data[o].gstCsigl+' '+obj.data[o].proceso);

            //MODIFICACIÓN 06/01/2022
            if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'EN CURSO') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td><span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span></td> </tr>";
            } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'PENDIENTE') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: orange; font-size: 14px;' class='badge'>PENDIENTE</span></td> </tr>";
            } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'FINALIZADO') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO</span></td> </tr>";
            } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'REPROBO') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td> </tr>";
            } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'DECLINO') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td> </tr>";
            } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'PENDIENTE1') {
                html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>" + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td> </tr>";
            }

            //CODIGO ORIGINAL ANGEL 
            /* if (obj.data[o].gstCsigl == 'OBLIGATORIO') { //FILTRA LOS CURSOS OBLIGATORIOS
                 if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'EN CURSO') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"+ obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td><span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span></td> </tr>";
                 } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'PENDIENTE') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"  + obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td> </tr>";
                 } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'FINALIZADO') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"+ obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO</span></td> </tr>";
                 }
             } else {

                 if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'EN CURSO') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"+ obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td><span style='background-color: #3C8DBC; font-size: 14px;' class='badge'>EN CURSO</span></td> </tr>";
                 } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'PENDIENTE') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"+ obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: grey; font-size: 14px;' class='badge'>SIN CURSAR</span></td> </tr>";
                 } else if (obj.data[o].gstIDper == gstIdper && obj.data[o].proceso == 'FINALIZADO') {
                     html += "<tr><td>" + x + "</td><td>" + obj.data[o].gstTitlo + "</td><td>" + obj.data[o].gstTipo + "</td><td>"+ obj.data[o].gstCsigl + "</td><td>" + obj.data[o].gstDrcin + "</td><td> <span style='background-color: green; font-size: 14px;' class='badge'>FINALIZADO</span></td> </tr>";
                 }


             }*/
            //FIN DEL CODIGO ORIGINAL ANGEL 
            //alert(obj.data[o].gstIDper);


        }
        html += '</tbody></table></div></div></div>';
        $("#cursosObligados").html(html);
    })
}


function evaluar() {
    // alert('pruebaevaluacion')
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
    idspc = document.getElementById('idspc').value;
    gstInpct = document.getElementById('gstInspr').value;

    reset = document.getElementById('reset').value;

    datos = 'gstInspr=' + gstInspr + '&gstIdprm=' + gstIdprm + '&actual=' + actuals + '&comntr=' + comntr + '&idspc=' + idspc + '&opcion=evaluar';
    //alert(actual);
    //SE COMENTA 04012022 PARA QUE DEJE GUARDAR ESPECIALIDAD CON DOS PARAMETROS
    // if (actual.length >= '12' && '12' >= actual.length) {

    //    if (gstInspr == ',' || gstIdprm == ',') { //original de angel

    if (actual == '') { //modificación jessica para que no deje guardar si no esta seleccionado ningun check

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
            // alert(respuesta);
            // console.log(respuesta);
            if (respuesta == 0) {

                // Swal.fire({
                //     type: 'success',
                //     title: 'AFAC INFORMA',
                //     text: 'Se evaluó con éxito ',
                //     showConfirmButton: false,
                //     customClass: 'swal-wide',
                //     timer: 3000
                // });

                $('#succe0').toggle('toggle');
                $('#Evalua #button').hide();
                setTimeout(function() {
                    $('#succe0').toggle('toggle');
                }, 2000);


                if (reset == 0) {
                    spcialidads(gstInpct);
                } else {
                    setTimeout("location.href = 'inspecion';", 1500);
                }


            } else {
                $('#empty0').toggle('toggle');
                setTimeout(function() {
                    $('#empty0').toggle('toggle');
                }, 2000);
            }
        });
    }
    //} else {

    // $('#empty0').toggle('toggle');
    //setTimeout(function() {
    //  $('#empty0').toggle('toggle');
    //}, 2000);

    //return;

}

//}

function resultados(datos) {
    result = datos;

    //    alert(result);

    $.ajax({
        url: '../php/conResult.php',
        type: 'POST',
        data: 'result=' + result
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        html = '<div class="col-sm-12"><table class="table table-striped table-bordered dataTable"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th style="width:70%"><i></i>PARAMETROS</th><th style="width:15%"><i></i>ESTADO</th></tr></thead><tbody>';
        for (i = 0; i < res.length; i++) {
            resul = obj.data[i].gstIDins;
            // if (obj.data[i].gstIDins == result) {

            if (obj.data[i].gstCmpli == 'NO') {
                html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-danger'>NO CUMPLE</span></td></tr>";
            }
            if (obj.data[i].gstCmpli == 'SI') {
                html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-success'>CUMPLIO</span></td></tr>";
            }
            //}
        }
        html += '</tbody></table></div>';
        $("#rsltad").html(html);
    })

    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (r = 0; r < res.length; r++) {

            if (obj.data[r].gstIdper == resul) {


                result = obj.data[r].gstIdper + '*' + obj.data[r].gstNombr + '*' + obj.data[r].gstIDCat + '*' + obj.data[r].gstCatgr + '*' + obj.data[r].gstComnt + '*' + obj.data[r].gstApell + '*' + obj.data[r].gstCsigl + '*' + obj.data[r].adscripcion + '*' + obj.data[r].descripdep;
                var d = result.split("*");

                $("#Result #pdfIdper").val(d[0]);
                $("#Result #evalu_nombre").val(d[1]);
                $("#Result #IDCat").val(d[2]);
                $("#Result #especialidad").val(d[3]);
                $("#Result #gstComnt").val(d[4]);
                $("#Result #apellido").val(d[5]);
                $("#Result #siglas").val(d[6]);
                $("#Result #adscripcion").val(d[7]);
                $("#Result #departamento").val(d[8]);


            }
        }
    })


}

function resultado(result) {

    $.ajax({
        url: '../php/conResult.php',
        type: 'POST',
        data: 'result=' + result
    }).done(function(resp) {

        obj = JSON.parse(resp);
        var res = obj.data;

        html = '<div class="col-sm-12"><table class="table table-striped table-bordered dataTable"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th style="width:70%"><i></i>PARAMETROS</th><th style="width:15%"><i></i>ESTADO</th></tr></thead><tbody>';
        for (i = 0; i < res.length; i++) {

            resul = obj.data[i].gstIDins;
            // if (obj.data[i].gstIDins == result) {

            if (obj.data[i].gstCmpli == 'NO') {
                html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-danger'>NO CUMPLE</span></td></tr>";
            }
            if (obj.data[i].gstCmpli == 'SI') {
                html += "<td>" + obj.data[i].gstOrden + "</td><td>" + obj.data[i].gstPrmtr + "</td><td><span class='label label-success'>CUMPLIO</span></td></tr>";
            }
            //}
        }
        html += '</tbody></table></div>';
        $("#rsltad").html(html);
    })



    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (r = 0; r < res.length; r++) {

            if (obj.data[r].gstIdper == resul) {


                result = obj.data[r].gstIdper + '*' + obj.data[r].gstNombr + '*' + obj.data[r].gstIDCat + '*' + obj.data[r].gstCatgr + '*' + obj.data[r].gstComnt + '*' + obj.data[r].gstApell + '*' + obj.data[r].gstCsigl + '*' + obj.data[r].adscripcion + '*' + obj.data[r].descripdep;
                var d = result.split("*");

                $("#Result #pdfIdper").val(d[0]);
                $("#Result #evalu_nombre").val(d[1]);
                $("#Result #IDCat").val(d[2]);
                $("#Result #especialidad").val(d[3]);
                $("#Result #gstComnt").val(d[4]);
                $("#Result #apellido").val(d[5]);
                $("#Result #siglas").val(d[6]);
                $("#Result #adscripcion").val(d[7]);
                $("#Result #departamento").val(d[8]);

            }
        }
    })

}


function actEstudio(datos) {

    var d = datos.split("*");
    // alert(d[0]);
    $("#Actuliza #EIdper").val(d[1]);
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
    var gstisst = document.getElementById('gstisst').value;
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

    var sgtCrhnt = document.getElementById('sgtCrhnt').value;
    var gstRusp = document.getElementById('gstRusp').value;
    var gstPlaza = document.getElementById('gstPlaza').value;

    var gstAreID = document.getElementById('gstAreID').value;
    var gstPstID = document.getElementById('gstPstID').value;
    var gstSpcID = document.getElementById('gstSpcID').value;
    // var gstSigID = 0;
    var gstSigID = document.getElementById('gstSigID').value;

    var gstCargo = document.getElementById('gstCargo').value;
    var gstIDCat = document.getElementById('gstIDCat').value;
    var gstIDSub = document.getElementById('gstIDSub').value;
    var gstCorro = document.getElementById('gstCorro').value;

    var gstCinst = document.getElementById('gstCinst').value;
    var gstFeing = document.getElementById('gstFeing').value;

    var gstIDara = document.getElementById('gstIDara').value;
    var gstAcReg = document.getElementById('gstAcReg').value;
    var gstIDuni = document.getElementById('gstIDuni').value;
    var gstSexo = document.getElementById('gstSexo').value;



    datos = 'gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstFenac=' + gstFenac + '&gstSexo=' + gstSexo + '&gstStcvl=' + gstStcvl + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstisst=' + gstisst + '&gstNpspr=' + gstNpspr + '&gstPsvig=' + gstPsvig + '&gstVisa=' + gstVisa + '&gstVignt=' + gstVignt + '&gstNucrt=' + gstNucrt + '&gstCalle=' + gstCalle + '&gstNumro=' + gstNumro + '&gstClnia=' + gstClnia + '&gstCpstl=' + gstCpstl + '&gstCiuda=' + gstCiuda + '&gstStado=' + gstStado + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstExTel=' + gstExTel + '&gstNmpld=' + gstNmpld + '&gstIdpst=' + gstIdpst + '&sgtCrhnt=' + sgtCrhnt + '&gstRusp=' + gstRusp + '&gstPlaza=' + gstPlaza + '&gstAreID=' + gstAreID + '&gstPstID=' + gstPstID + '&gstSpcID=' + gstSpcID + '&gstSigID=' + gstSigID + '&gstCargo=' + gstCargo + '&gstIDCat=' + gstIDCat + '&gstIDSub=' + gstIDSub + '&gstCorro=' + gstCorro + '&gstCinst=' + gstCinst + '&gstFeing=' + gstFeing + '&gstIDara=' + gstIDara + '&gstAcReg=' + gstAcReg + '&gstIDuni=' + gstIDuni + '&opcion=registrar';

    if (gstNombr == '' || gstApell == '' || gstFenac == '' || gstSexo == '' || gstCurp == '' || gstRfc == '' || gstCalle == '' || gstNumro == '' || gstClnia == '' || gstCpstl == '' || gstCiuda == '' || gstStado == '' || gstNmpld == '' || gstAreID == '' || gstIDara == '' || gstFeing == '') {

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
                //alert(respuesta);
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SUS DATOS FUERON GUARDADOS CORRECTAMENTE',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonColor: "#3C8DBC",
                    customClass: 'swal-wide',
                    confirmButtonText: '<span style="color: white;"><a class="a-alert" href="personal">¿Deseas agregar otro registro?</a></span>',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<a  class="a-alert" href="persona"><span style="color: white;">Cerrar</span></a>',
                    cancelButtonAriaLabel: 'Thumbs down'
                        // timer: 2900
                });
            } else if (respuesta == 2) {
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

// HUMANOS
function registrarH() {
    //Datos personales

    var gstNombr = document.getElementById('gstNombr').value;
    var gstApell = document.getElementById('gstApell').value;
    var gstLunac = document.getElementById('gstLunac').value;
    var gstFenac = document.getElementById('gstFenac').value;
    var gstStcvl = document.getElementById('gstStcvl').value;
    var gstCurp = document.getElementById('gstCurp').value;
    var gstRfc = document.getElementById('gstRfc').value;
    var gstisst = document.getElementById('gstisst').value;
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

    var sgtCrhnt = document.getElementById('sgtCrhnt').value;
    var gstRusp = document.getElementById('gstRusp').value;
    var gstPlaza = document.getElementById('gstPlaza').value;

    var gstAreID = document.getElementById('gstAreID').value;
    var gstPstID = document.getElementById('gstPstID').value;
    var gstSpcID = document.getElementById('gstSpcID').value;
    // var gstSigID = 0;
    var gstSigID = document.getElementById('gstSigID').value;

    var gstCargo = document.getElementById('gstCargo').value;
    var gstIDCat = document.getElementById('gstIDCat').value;
    var gstIDSub = document.getElementById('gstIDSub').value;
    var gstCorro = document.getElementById('gstCorro').value;

    var gstCinst = document.getElementById('gstCinst').value;
    var gstFeing = document.getElementById('gstFeing').value;

    var gstIDara = document.getElementById('gstIDara').value;
    var gstAcReg = document.getElementById('gstAcReg').value;
    var gstIDuni = document.getElementById('gstIDuni').value;
    var gstSexo = document.getElementById('gstSexo').value;



    datos = 'gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstFenac=' + gstFenac + '&gstSexo=' + gstSexo + '&gstStcvl=' + gstStcvl + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstisst=' + gstisst + '&gstNpspr=' + gstNpspr + '&gstPsvig=' + gstPsvig + '&gstVisa=' + gstVisa + '&gstVignt=' + gstVignt + '&gstNucrt=' + gstNucrt + '&gstCalle=' + gstCalle + '&gstNumro=' + gstNumro + '&gstClnia=' + gstClnia + '&gstCpstl=' + gstCpstl + '&gstCiuda=' + gstCiuda + '&gstStado=' + gstStado + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstExTel=' + gstExTel + '&gstNmpld=' + gstNmpld + '&gstIdpst=' + gstIdpst + '&sgtCrhnt=' + sgtCrhnt + '&gstRusp=' + gstRusp + '&gstPlaza=' + gstPlaza + '&gstAreID=' + gstAreID + '&gstPstID=' + gstPstID + '&gstSpcID=' + gstSpcID + '&gstSigID=' + gstSigID + '&gstCargo=' + gstCargo + '&gstIDCat=' + gstIDCat + '&gstIDSub=' + gstIDSub + '&gstCorro=' + gstCorro + '&gstCinst=' + gstCinst + '&gstFeing=' + gstFeing + '&gstIDara=' + gstIDara + '&gstAcReg=' + gstAcReg + '&gstIDuni=' + gstIDuni + '&opcion=registrar';

    if (gstNombr == '' || gstApell == '' || gstLunac == '' || gstFenac == '' || gstSexo == '' || gstStcvl == '' || gstCurp == '' || gstRfc == '' || gstisst == '' || gstNucrt == '' || gstCalle == '' || gstNumro == '' || gstClnia == '' || gstCpstl == '' || gstCiuda == '' || gstStado == '' || gstCasa == '' || gstClulr == '' || gstExTel == '' || gstNmpld == '' || sgtCrhnt == '' || gstRusp == '' || gstPlaza == '' || gstIdpst == '' || gstAreID == '' || gstPstID == '' || gstCargo == '' || gstIDCat == '' || gstIDSub == '' || gstCorro == '' || gstIDara == '' || gstAcReg == '' || gstIDuni == '' || gstCinst == '' || gstFeing == '') {

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
                //alert(respuesta);
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SUS DATOS FUERON GUARDADOS CORRECTAMENTE',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonColor: "#3C8DBC",
                    customClass: 'swal-wide',
                    confirmButtonText: '<span style="color: white;"><a class="a-alert" href="personal">¿Deseas agregar otro registro?</a></span>',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<a  class="a-alert" href="persona"><span style="color: white;">Cerrar</span></a>',
                    cancelButtonAriaLabel: 'Thumbs down'
                        // timer: 2900
                });
            } else if (respuesta == 2) {
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
    var gstisst = document.getElementById('gstisst').value;
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

    var gstCorro = document.getElementById('gstCorro').value; //CORREO 1 
    var gstCinst = document.getElementById('gstCinst').value; // CORREO 2 
    var gstSpcID = document.getElementById('gstSpcID').value; // CORREO 3
    var gstSexo = document.getElementById('gstSexo').value;

    datos = 'gstIdper=' + gstIdper + '&gstNombr=' + gstNombr + '&gstApell=' + gstApell + '&gstLunac=' + gstLunac + '&gstFenac=' + gstFenac + '&gstSexo=' + gstSexo + '&gstStcvl=' + gstStcvl + '&gstCurp=' + gstCurp + '&gstRfc=' + gstRfc + '&gstisst=' + gstisst + '&gstNpspr=' + gstNpspr + '&gstPsvig=' + gstPsvig + '&gstVisa=' + gstVisa + '&gstVignt=' + gstVignt + '&gstCalle=' + gstCalle + '&gstNumro=' + gstNumro + '&gstClnia=' + gstClnia + '&gstCpstl=' + gstCpstl + '&gstCiuda=' + gstCiuda + '&gstStado=' + gstStado + '&gstCasa=' + gstCasa + '&gstClulr=' + gstClulr + '&gstExTel=' + gstExTel + '&gstCorro=' + gstCorro + '&gstCinst=' + gstCinst + '&gstSpcID=' + gstSpcID + '&opcion=actualizar'

    if (gstNombr == '' || gstApell == '' || gstLunac == '' || gstFenac == '' || gstSexo == '' || gstStcvl == '' || gstCurp == '' || gstRfc == '' || gstCalle == '' || gstNumro == '' || gstClnia == '' || gstCpstl == '' || gstCiuda == '' || gstStado == '' || gstCasa == '' || gstClulr == '' || gstExTel == '') {

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
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SE ACTUALIZÓ CON EXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                cerrarEdit() //se llama a la función cerrar edit
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

    var pstIdper = document.getElementById('gstIdper').value; //id persona
    var gstNmpld = document.getElementById('gstNmpld').value; //numero de empledo

    var sgtCrhnt = document.getElementById('sgtCrhnt').value;
    var gstRusp = document.getElementById('gstRusp').value;
    var gstPlaza = document.getElementById('gstPlaza').value;

    var gstFeing = document.getElementById('gstFeing').value; //fecha de ingreso
    var gstSigID = document.getElementById('gstSigID').value; //observaciones

    var gstIdpst = document.getElementById('gstIdpst').value; //codigo puesto
    var gstPstID = document.getElementById('gstPstID').value; //ID puesto (nombre)
    var gstAreID = document.getElementById('gstAreID').value; //ID Dir. ejecutiva

    var gstIDara = document.getElementById('gstIDara').value; //ID Dir. adscripción
    var gstAcReg = document.getElementById('subdireccion').value; //SUBDIRECCION

    var gstCargo = document.getElementById('gstCargo').value;
    var gstNucrt = document.getElementById('gstNucrt').value; //ubicacion de la persona

    var gstIDuni = document.getElementById('gstIDuni').value; //UNIDAD

    var gstIDSub = document.getElementById('depart').value; //DEPARTAMENTO
    var gstSpcID = document.getElementById('gstSpcID').value; //ID especialidad 

    var gstComnd = document.getElementById('gstComnd').value;
    //22092021

    datos = 'pstIdper=' + pstIdper + '&gstNmpld=' + gstNmpld + '&sgtCrhnt=' + sgtCrhnt + '&gstRusp=' + gstRusp + '&gstPlaza=' + gstPlaza + '&gstIdpst=' + gstIdpst + '&gstCargo=' + gstCargo + '&gstIDCat=' + gstIDCat + '&gstIDSub=' + gstIDSub + '&gstAreID=' + gstAreID + '&gstPstID=' + gstPstID + '&gstSpcID=' + gstSpcID + '&gstIDara=' + gstIDara + '&gstFeing=' + gstFeing + '&gstIDuni=' + gstIDuni + '&gstAcReg=' + gstAcReg + '&gstNucrt=' + gstNucrt + '&gstSigID=' + gstSigID + '&gstComnd=' + gstComnd + '&opcion=actPrsnls';

    if (pstIdper == '' || gstNmpld == '' || gstIdpst == '' || gstCargo == '' || gstIDCat == '' || gstFeing == '' || gstIDuni == '' || gstAcReg == '' || gstIDuni == '' || gstNucrt == '') {

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
            //console.log(respuesta);

            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SE ACTUALIZÓ CON EXITO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                cerrarEdit() //se llama a la función cerrar edit
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

    //alert('inspector')

    $("#codigo").show();
    $("#nompusto").show();
    $("#especialidad").show();
    $("#subdirec1").show();
    $("#ejecutiva").show();
    $("#depart").show();
    $("#adscrip").show(); //adscripción 23092021 
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
    document.getElementById('gstSexo').disabled = false;
    document.getElementById('gstStcvl').disabled = false; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = false; //CURP
    document.getElementById('gstRfc').disabled = false; //RFC
    document.getElementById('gstisst').disabled = false;

    document.getElementById('gstNpspr').disabled = false; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled = false; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled = false; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled = false; // VISA VIGENCIA

    document.getElementById('gstCalle').disabled = false; // CALLE
    document.getElementById('gstNumro').disabled = false; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled = false; // COLONIA
    document.getElementById('gstCpstl').disabled = false; // CODIGO POSTAL
    document.getElementById('gstStado').disabled = false; // CUIDAD
    document.getElementById('gstCasa').disabled = false; // NUM. DE CASA
    document.getElementById('gstClulr').disabled = false; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled = false; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled = false; // CUIDAD
    document.getElementById('gstCorro').disabled = false; //correo personal
    document.getElementById('gstCinst').disabled = false; //correo institucional
    document.getElementById('gstSpcID').disabled = false; //correo opcion3

    //------ DATOS DEL PUESTO


    document.getElementById('gstNmpld').disabled = false; // NUM. DE EMPLEADO jess
    document.getElementById('sgtCrhnt').disabled = false;
    document.getElementById('gstRusp').disabled = false;
    document.getElementById('gstPlaza').disabled = false;
    document.getElementById('gstFeing').disabled = false; //FECHA DE INGRESO
    document.getElementById('gstSigID').disabled = false;
    document.getElementById('gstCargo').disabled = false;
    document.getElementById('gstNucrt').disabled = false; // NUMERO DE CARTLLA 
    // document.getElementById('gstIdpst').disabled = false; // NUM. DE EMPLEADO

    // //document.getElementById('gstIDCat').disabled = false;
    // //document.getElementById('gstIDSub').disabled = false; //SUBCATEGORIA


    // // document.getElementById('gstIDuni').disabled = false;

    // document.getElementById('gstAreID').disabled = false; //ID área
    // document.getElementById('gstPstID').disabled = false; //ID puesto

    // //document.getElementById('gstSigID').disabled=false;//ID siglas
    // document.getElementById('gstIDara').disabled = false; //ID del área
    // document.getElementById('gstAcReg').disabled = false;
    // document.getElementById('gstIDuni').disabled = false;
    // document.getElementById('gstNucrt').disabled = false;

    // document.getElementById('AgstAcReg').disabled = false; //ESTATUS DE PERSONAL

    //.../Habilita los campos FIN


}

//CIERRA LAS HABILITACIONES DE LA EDICIÓN EN PERFIL DE INSTRUCTOR
function cerrarEdit() {

    //$("#subdirec2").show();
    // $("#subdirec3").hide();
    $("#codigo").hide();
    $("#nompusto").hide();
    $("#especialidad").hide();
    $("#ejecutiva").hide();
    $("#adscrip").hide(); //adscripción oculta 23092021
    $("#comandancias").hide();
    $("#subdirec1").hide();
    $("#depart").hide();
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
    document.getElementById('gstSexo').disabled = true;
    document.getElementById('gstStcvl').disabled = true; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled = true; //CURP
    document.getElementById('gstRfc').disabled = true; //RFC
    document.getElementById('gstisst').disabled = true; //RFC

    document.getElementById('gstNpspr').disabled = true; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled = true; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled = true; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled = true; // VISA VIGENCIA

    document.getElementById('gstCalle').disabled = true; // CALLE
    document.getElementById('gstNumro').disabled = true; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled = true; // COLONIA
    document.getElementById('gstCpstl').disabled = true; // CODIGO POSTAL
    document.getElementById('gstStado').disabled = true; // CUIDAD
    document.getElementById('gstCasa').disabled = true; // NUM. DE CASA
    document.getElementById('gstClulr').disabled = true; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled = true; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled = true; // CUIDAD
    document.getElementById('gstCorro').disabled = true; //correo personal
    document.getElementById('gstCinst').disabled = true; //correo institucional
    document.getElementById('gstSpcID').disabled = true; //correo opcion3

    //------ DATOS DEL PUESTO //28102021
    document.getElementById('gstNmpld').disabled = true; // NUM. DE EMPLEADO
    document.getElementById('sgtCrhnt').disabled = true;
    document.getElementById('gstRusp').disabled = true;
    document.getElementById('gstPlaza').disabled = true;
    document.getElementById('gstFeing').disabled = true;
    document.getElementById('gstSigID').disabled = true;
    document.getElementById('gstCargo').disabled = true;
    document.getElementById('gstNucrt').disabled = true; // NUMERO DE CARTLLA 

    // document.getElementById('gstNmpld').disabled = true; // NUM. DE EMPLEADO
    // document.getElementById('gstIdpst').disabled = true; // NUM. DE EMPLEADO
    // document.getElementById('gstCargo').disabled = true;
    // //document.getElementById('gstIDCat').disabled = true;
    // // document.getElementById('gstIDSub').disabled = true; //SUBCATEGORIA
    // document.getElementById('gstCorro').disabled = true;
    // document.getElementById('gstCinst').disabled = true;
    // document.getElementById('gstFeing').disabled = true;

    // document.getElementById('gstAreID').disabled = true; //ID área
    // document.getElementById('gstPstID').disabled = true; //ID puesto
    // document.getElementById('gstSpcID').disabled = true; //ID especialidad
    // document.getElementById('gstIDara').disabled = true; //ID del área
    // document.getElementById('gstAcReg').disabled = true;
    // document.getElementById('gstIDuni').disabled = true;
    // document.getElementById('gstNucrt').disabled = true;
    // document.getElementById('gstSigID').disabled = true; //ESTATUS DE PERSONAL
    // document.getElementById('subdir1').disabled = true; //ESTATUS DE PERSONAL

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

function adscripcion() {
    $("#adscrip1").toggle('toggle');
    $("#adscrip2").toggle('toggle');
}

function adscripcion2() {
    $("#adscrip1").toggle('toggle');
    $("#adscrip2").toggle('toggle');
}

function subdireccion() {
    $("#subdirec2").toggle('toggle');
    $("#subdirec3").toggle('toggle');
}

function subdireccion1() {
    $("#subdirec2").toggle('toggle');
    $("#subdirec3").toggle('toggle');
}

function comandancias() {
    $("#comandancias1").toggle('toggle');
    $("#comandancias2").toggle('toggle');
}

function departamento1() {
    $("#depart1").toggle('toggle');
    $("#depart2").toggle('toggle');
}




function asignar() {

    var gstIdper = document.getElementById('gstIdper').value; //ID DE LA PERSONAL
    var AgstCargo = document.getElementById('AgstCargo').value; //CARGO
    var AgstIDCat = document.getElementById('AgstIDCat').value; //
    var AgstIDSub = document.getElementById('depart').value;
    var AgstIDuni = document.getElementById('gstIDuniAct').value;
    var AgstAcReg = document.getElementById('subdireccion1').value; //subdirección
    var AgstNucrt = document.getElementById('AgstNucrt').value;
    var gstNombr = document.getElementById('gstNombr').value;
    var gstNmpld = document.getElementById('gstANmpld').value; //NUMERO DE EMPLEADO
    var gstComnd = document.getElementById('AgstAcReg').value;


    if (AgstCargo != 'INSPECTOR') {
        AgstIDCat = '0';
    } else {}

    //alert(AgstIDuni);

    datas = 'gstIdper=' + gstIdper + '&gstComnd=' + gstComnd + '&AgstCargo=' + AgstCargo + '&AgstIDCat=' + AgstIDCat + '&AgstIDSub=' + AgstIDSub + '&AgstIDuni=' + AgstIDuni + '&AgstAcReg=' + AgstAcReg + '&AgstNucrt=' + AgstNucrt + '&gstNombr=' + gstNombr + '&gstNmpld=' + gstNmpld + '&opcion=asignar';

    //alert(gstIdper+'/'+AgstCargo+'/'+AgstIDCat+'/'+AgstIDSub+'/'+AgstIDuni+'/'+AgstAcReg);

    if (AgstCargo == '' || AgstIDCat == '' || AgstIDSub == '' || AgstAcReg == '' || AgstNucrt == '' || gstNombr == '' || gstNmpld == '') {

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

            if (respuesta == 0) {

                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SUS DATOS FUERON GUARDADOS CORRECTAMENTE',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'inspecion';", 2000);

            } else if (respuesta == 2) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'SUS DATOS FUERON GUARDADOS CORRECTAMENTE',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 3000
                });
                setTimeout("location.href = 'persona';", 2000);

            } else if (respuesta == 1) {
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

function spcialidad(gstIdper) {

    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;

        for (r = 0; r < res.length; r++) {
            if (obj.data[r].gstIdper == gstIdper) {


                result = obj.data[r].gstIdper + '*' + obj.data[r].gstNombr + '*' + obj.data[r].gstIDCat + '*' + obj.data[r].gstCatgr + '*' + obj.data[r].gstComnt;
                var d = result.split("*");

                $("#Espcial #gstIDpr").val(d[0]);
                $("#Espcial #spcialid_nombre").val(d[1]);
                // $("#Result #IDCat").val(d[2]);
                // $("#Result #gstComnt").val(d[4]);
            }
        }
    })
}

function spcBorrar(dato) {

    //  alert(dato);

    var d = dato.split("*");

    $("#eliminarspci #spcId").val(d[1]);
    $("#eliminarspci #idUsu").val(d[0]);
    $("#spcldd").html(d[2]);

}

function borrarSpc() {

    spcId = document.getElementById('spcId').value;
    idUsu = document.getElementById('idUsu').value;
    //alert(spcId+'*'+idUsu);
    $.ajax({
        url: '../php/agrEvalu.php',
        type: 'POST',
        data: 'idUsu=' + idUsu + '&spcId=' + spcId + '&opcion=bajaSpc'
    }).done(function(respuesta) {
        //console.log(respuesta);

        if (respuesta == 0) {
            //$("#baja").hide();
            $('#succe12').toggle('toggle');
            setTimeout(function() {
                $('#succe12').toggle('toggle');
            }, 2000);
            let gstInpct = idUsu;
            // spcialidads(idUsu);
            spcialidads(gstInpct);

        } else {
            $('#danger12').toggle('toggle');
            setTimeout(function() {
                $('#danger12').toggle('toggle');
            }, 2000);
        }
    });
}


function especialidad() {

    var gstIDpr = document.getElementById('gstIDpr').value;
    var gstIDSpe = document.getElementById('gstIDSpe').value;

    if (gstIDpr == '' || gstIDSpe == '') {

        $('#emptyE').toggle('toggle');
        setTimeout(function() {
            $('#emptyE').toggle('toggle');
        }, 2000);
        return;
    } else {
        $.ajax({
            url: '../php/agrEvalu.php',
            type: 'POST',
            data: 'gstIDpr=' + gstIDpr + '&gstIDSpe=' + gstIDSpe + '&opcion=especialidad'
        }).done(function(respuesta) {
            //alert(respuesta);
            if (respuesta == 0) {
                $('#succeE').toggle('toggle');
                setTimeout(function() {
                    $('#succeE').toggle('toggle');
                }, 2000);
                spcialidads(gstIdper);
            } else {
                $('#dangerE').toggle('toggle');
                setTimeout(function() {
                    $('#dangerE').toggle('toggle');
                }, 2000);
            }
        });
    }


}

function bajaUsu(gstIdper) {

    $('#bajaIdper').val(gstIdper);

}

function usuBaja() {

    idPer = document.getElementById('bajaIdper').value;

    $.ajax({
        url: '../php/regInspc.php',
        type: 'POST',
        data: 'idPer=' + idPer + '&opcion=bajaUsu'
    }).done(function(respuesta) {
        //console.log(respuesta);

        if (respuesta == 0) {
            $("#baja").hide();
            $('#succe11').toggle('toggle');
            setTimeout(function() {
                $('#succe11').toggle('toggle');
            }, 2000);
            setTimeout("location.href = 'persona';", 2200);

        } else {
            $('#danger11').toggle('toggle');
            setTimeout(function() {
                $('#danger11').toggle('toggle');
            }, 2000);
        }
    });
}



function opendellcursins(id_perinsp) {
    // var id_perinsp = document.getElementById('id_persinsp').value;
    //alert(id_perinsp);
    var tableCursosProgramados = $('#data-table-cursosProgramados2').DataTable({
        "order": [
            [3, "asc"]
        ],
        "ajax": {
            "url": "../php/detallescurper.php",
            "type": "GET",
            "data": function(d) {
                d.id_perinsp = id_perinsp;
            }
        },
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
    });

}