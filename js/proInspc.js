$.ajax({
    url: '../php/consulta.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var x = 0;
    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cnslt" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDOS</th><th><i></i> CORREO</th><th><i></i> CATEGORÍA</th></tr></thead><tbody>';
    for (i = 0; i < res.length; i++) {
        x++;
        //            alert(obj.data[i].gstCargo);
        if (obj.data[i].gstCargo == 'INSPECTOR' && obj.data[i].gstEvalu == 'SI' || obj.data[i].gstCargo == 'DIRECTOR' && obj.data[i].gstEvalu == 'SI') {
            html += "<tr><td><input type='checkbox' name='idinsp[]' id='id_insp' value='" + obj.data[i].gstIdper + "' /></td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCorro + "</td><td>" + obj.data[i].gstCatgr + "</td></tr>";
        } else {}
    }
    html += '</tbody></table></div></div></div>';
    $("#conslts").html(html);
})

function proCurso() {

    var idInsptr = new Array();

    $("input[name='idinsp[]']:checked").each(function() {
        idInsptr.push($(this).val());
    });

    var idInstr = ''

    var selectObject = document.getElementById("idinst");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            idInstr += "," + selectObject.options[i].value;

        }
    }

    idInstru = idInstr.substr(1);

    var id_mstr = document.getElementById('id_mstr').value;

    var hcurso = document.getElementById('hcurso').value;
    var fcurso = document.getElementById('fcurso').value;
    //Solo ID coordinadores 
    var idcord = document.getElementById('idcord').value;

    var sede = document.getElementById('sede').value;

    var fechaf = document.getElementById('fechaf').value;
    var modalidad = document.getElementById('modalidad').value;

    // var hoy = new Date();
    // var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
    // var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

    fvigd = fcurso.substring(8, 10);
    fvigm = fcurso.substring(5, 7);
    fvigy = fcurso.substring(0, 4);
    var f1 = new Date(fvigy, fvigm, fvigd);
    fvigd = fechaf.substring(8, 10);
    fvigm = fechaf.substring(5, 7);
    fvigy = fechaf.substring(0, 4);
    var f2 = new Date(fvigy, fvigm, fvigd);


    if (modalidad == 'PRESENCIAL') {
        var link = '0';
        var contracceso = '0';
        var classroom = '0';
    } else {
        var link = document.getElementById('link').value;
        var contracceso = document.getElementById('contracceso').value;
        var classroom = document.getElementById('classroom').value;
    }

    idinsps = idInsptr + '' + idInstr;

    datos = 'idinsps=' + idinsps + '&id_mstr=' + id_mstr + '&idcord=' + idcord + '&idInstru=' + idInstru + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&fechaf=' + fechaf + '&contracceso=' + contracceso + '&classroom=' + classroom + '&opcion=procurso'

    //alert(datos);

    if (idInsptr == '' || idinsps == '' || id_mstr == '' || hcurso == '' || fcurso == '' || idcord == '' || idInstru == '' || sede == '' || modalidad == '' || link == '' || fechaf == '' || contracceso == '') {


        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {

        if (f1 > f2) {
            $('#fechasA').toggle('toggle');
            setTimeout(function() {
                $('#fechasA').toggle('toggle');
            }, 3000);
            $('#av').toggle('toggle');
            setTimeout(function() {
                $('#av').toggle('toggle');
            }, 10000);
            $('#so').toggle('toggle');
            setTimeout(function() {
                $('#so').toggle('toggle');
            }, 10000);
        } else {

            $.ajax({
                url: '../php/proCurso.php',
                type: 'POST',
                data: datos
            }).done(function(respuesta) {
                if (respuesta == 1) {
                    Swal.fire({
                        type: 'success',
                        // title: 'AFAC INFORMA',
                        text: 'CURSO PROGRAMADO CORRECTAMENTE',
                        // showConfirmButton: false,
                        showCancelButton: true,
                        customClass: 'swal-wide',
                        confirmButtonText: '<a class="a-alert" href="programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                        cancelButtonText: '<a  class="a-alert" href="lisCurso"><span style="color: white;">Cerrar</span></a>',

                    });
                    // setTimeout("location.href = 'inspecion.php';", 2000);
                    $("#buttonpro").hide();
                } else

                if (respuesta == 0) {
                    Swal.fire({
                        type: 'success',
                        // title: 'AFAC INFORMA',
                        text: 'CURSO PROGRAMADO CORRECTAMENTE',
                        // showConfirmButton: false,
                        showCancelButton: true,
                        customClass: 'swal-wide',
                        confirmButtonText: '<a class="a-alert" href="programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                        cancelButtonText: '<a  class="a-alert" href="lisCurso"><span style="color: white;">Cerrar</span></a>',

                    });
                    // setTimeout("location.href = 'inspecion.php';", 2000);
                    $("#buttonpro").hide();
                } else {
                    Swal.fire({
                        type: 'success',
                        //title: 'CURSO PROGRAMADO CORRECTAMENTE',
                        html: `<p><code>EL PARTICIPANTE ${respuesta} ESTA EN CURSO</code></p>`,
                        showConfirmButton: false,
                        customClass: 'swal-wide',
                        timer: 10000
                    });
                    // Swal.fire({
                    //     type: 'success',
                    //     // title: 'AFAC INFORMA',
                    //     text: 'CURSO PROGRAMADO CORRECTAMENTE',
                    //     // showConfirmButton: false,
                    //     showCancelButton: true,
                    //     customClass: 'swal-wide',
                    //     confirmButtonText: '<a class="a-alert" href="../admin/programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                    //     cancelButtonText: '<a  class="a-alert" href="../admin/lisCurso"><span style="color: white;">Cerrar</span></a>',

                    // });

                    // $("#buttonpro").hide();

                }
            });

        }

    }

}
//COORDINADOR
function proCursoCord() {

    var idInsptr = new Array();

    $("input[name='idinsp[]']:checked").each(function() {
        idInsptr.push($(this).val());
    });

    var idInstr = ''

    var selectObject = document.getElementById("idinst");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            idInstr += "," + selectObject.options[i].value;

        }
    }


    // var idcord = document.getElementById('idcord').value;

    var id_mstr = document.getElementById('id_mstr').value;


    var hcurso = document.getElementById('hcurso').value;
    var fcurso = document.getElementById('fcurso').value;
    //Solo ID coordinadores 
    var idinst = document.getElementById('idcord').value;
    var sede = document.getElementById('sede').value;

    var fechaf = document.getElementById('fechaf').value;
    var modalidad = document.getElementById('modalidad').value;

    if (modalidad == 'PRESENCIAL') {
        var link = '0';
        var contracceso = '0';
        var classroom = '0';
    } else {
        var link = document.getElementById('link').value;
        var contracceso = document.getElementById('contracceso').value;
        var classroom = document.getElementById('classroom').value;

    }
    idinsps = idInsptr + '' + idInstr;

    datos = idinsps + '*' + id_mstr + '*' + hcurso + '*' + fcurso + '*' + idinst + '*' + sede + '*' + link + '*' + fechaf + '*' + contracceso + '*' + classroom;

    // alert(datos);

    if (idinsps == '' || id_mstr == '' || hcurso == '' || fcurso == '' || idinst == '' || sede == '' || modalidad == '' || link == '' || fechaf == '' || contracceso == '') {


        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: 'idinsps=' + idinsps + '&id_mstr=' + id_mstr + '&idinst=' + idinst + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&fechaf=' + fechaf + '&contracceso=' + contracceso + '&classroom=' + classroom + '&opcion=procurso'
        }).done(function(respuesta) {

            if (respuesta == 0) {
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'CURSO PROGRAMADO CORRECTAMENTE',
                    // showConfirmButton: false,
                    showCancelButton: true,
                    customClass: 'swal-wide',
                    confirmButtonText: '<a class="a-alert" href="programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                    cancelButtonText: '<a  class="a-alert" href="lisCurso"><span style="color: white;">Cerrar</span></a>',

                });
                // setTimeout("location.href = 'inspecion.php';", 2000);

            } else {
                Swal.fire({
                    type: 'warning',
                    // title: 'AFAC INFORMA',
                    text: 'ERROR AL AGREGAR CURSO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
            }
        });
    }

}
//HUMANOS
function proCursoH() {

    var idInsptr = new Array();

    $("input[name='idinsp[]']:checked").each(function() {
        idInsptr.push($(this).val());
    });

    var idInstr = ''

    var selectObject = document.getElementById("idinst");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            idInstr += "," + selectObject.options[i].value;

        }
    }


    // var idcord = document.getElementById('idcord').value;

    var id_mstr = document.getElementById('id_mstr').value;


    var hcurso = document.getElementById('hcurso').value;
    var fcurso = document.getElementById('fcurso').value;
    //Solo ID coordinadores 
    var idinst = document.getElementById('idcord').value;
    var sede = document.getElementById('sede').value;
    var link = document.getElementById('link').value;
    var fechaf = document.getElementById('fechaf').value;
    var modalidad = document.getElementById('modalidad').value;


    idinsps = idInsptr + '' + idInstr;

    datos = idinsps + '*' + id_mstr + '*' + hcurso + '*' + fcurso + '*' + idinst + '*' + sede + '*' + link + '*' + fechaf;

    // alert(datos);

    if (idinsps == '' || id_mstr == '' || hcurso == '' || fcurso == '' || idinst == '' || sede == '' || modalidad == '' || link == '' || fechaf == '') {


        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: 'idinsps=' + idinsps + '&id_mstr=' + id_mstr + '&idinst=' + idinst + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&fechaf=' + fechaf + '&opcion=procurso'
        }).done(function(respuesta) {

            console.log(respuesta);

            if (respuesta == 0) {
                // $('#succe').toggle('toggle');
                // setTimeout(function() {
                //     $('#succe').toggle('toggle');
                // }, 2000);

                // document.getElementById('button').disabled = 'false';
                // // document.getElementById('button').style.color = "silver"; 
                // $('#vaciar').toggle('toggle');
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'CURSO PROGRAMADO CORRECTAMENTE',
                    // showConfirmButton: false,
                    showCancelButton: true,
                    customClass: 'swal-wide',
                    confirmButtonText: '<a class="a-alert" href="programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                    cancelButtonText: '<a  class="a-alert" href="lisCurso"><span style="color: white;">Cerrar</span></a>',

                });
                // setTimeout("location.href = 'inspecion.php';", 2000);

            } else {
                Swal.fire({
                    type: 'warning',
                    // title: 'AFAC INFORMA',
                    text: 'ERROR AL AGREGAR CURSO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
            }
        });
    }

}

//COORDINADOR
function proCursoCoor() {

    var idInsptr = new Array();

    $("input[name='idinsp[]']:checked").each(function() {
        idInsptr.push($(this).val());
    });

    var idInstr = ''

    var selectObject = document.getElementById("idinst");

    for (var i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {

            idInstr += "," + selectObject.options[i].value;

        }
    }


    // var idcord = document.getElementById('idcord').value;

    var id_mstr = document.getElementById('id_mstr').value;


    var hcurso = document.getElementById('hcurso').value;
    var fcurso = document.getElementById('fcurso').value;
    //Solo ID coordinadores 
    var idinst = document.getElementById('idcord').value;
    var sede = document.getElementById('sede').value;
    var link = document.getElementById('link').value;
    var fechaf = document.getElementById('fechaf').value;
    var modalidad = document.getElementById('modalidad').value;


    idinsps = idInsptr + '' + idInstr;

    datos = idinsps + '*' + id_mstr + '*' + hcurso + '*' + fcurso + '*' + idinst + '*' + sede + '*' + link + '*' + fechaf;

    // alert(datos);

    if (idinsps == '' || id_mstr == '' || hcurso == '' || fcurso == '' || idinst == '' || sede == '' || modalidad == '' || link == '' || fechaf == '') {


        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: 'idinsps=' + idinsps + '&id_mstr=' + id_mstr + '&idinst=' + idinst + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&fechaf=' + fechaf + '&opcion=procurso'
        }).done(function(respuesta) {

            console.log(respuesta);

            if (respuesta == 0) {
                // $('#succe').toggle('toggle');
                // setTimeout(function() {
                //     $('#succe').toggle('toggle');
                // }, 2000);

                // document.getElementById('button').disabled = 'false';
                // // document.getElementById('button').style.color = "silver"; 
                // $('#vaciar').toggle('toggle');
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'CURSO PROGRAMADO CORRECTAMENTE',
                    // showConfirmButton: false,
                    showCancelButton: true,
                    customClass: 'swal-wide',
                    confirmButtonText: '<a class="a-alert" href="programa"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                    cancelButtonText: '<a  class="a-alert" href="lisCurso"><span style="color: white;">Cerrar</span></a>',

                });
                // setTimeout("location.href = 'inspecion.php';", 2000);

            } else {
                Swal.fire({
                    type: 'warning',
                    // title: 'AFAC INFORMA',
                    text: 'ERROR AL AGREGAR CURSO',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000
                });
            }
        });
    }

}

var limpiar_datos = function() {
    $("#id_mstr").val("");
}


function actualizar() {

    var idinsp = document.getElementById('idinsp').value;
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var correo = document.getElementById('correo').value;
    var id_area = document.getElementById('id_area').value;
    var puesto = document.getElementById('puesto').value;
    var unidad = document.getElementById('unidad').value;


    datos = nombre + '*' + apellidos + '*' + correo + '*' + id_area + '*' + puesto + '*' + unidad;


    if (idinsp == '' || nombre == '' || apellidos == '' || correo == '' || id_area == '' || puesto == '' || unidad == '') {


        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/regInspc.php',
            type: 'POST',
            data: 'idinsp=' + idinsp + '&nombre=' + nombre + '&apellidos=' + apellidos + '&correo=' + correo + '&id_area=' + id_area + '&puesto=' + puesto + '&unidad=' + unidad + '&opcion=actualizar'
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

function modalidades() {

    var seleccion = document.getElementById('modalidad');
    valor = seleccion.options[seleccion.selectedIndex].value;

    if (valor == 'PRESENCIAL') {
        $("#dismod").hide();
        $("#disocl").show();

    } else {
        $("#disocl").hide();
        $("#dismod").show();
    }
}

function hrsDias(){
//alert('ok');
  finicial = document.getElementById('fcurso').value;
  ffinal = document.getElementById('fechaf').value;


    if(finicial=='' || ffinal==''){
        //alert('ES NECESARIO AGREGAR FECHA');
        $("#vacio").show();
        $("#horario").hide();
        $("#mosbotn").hide();

    }else{
         $("#vacio").hide();
         $("#horario").show();
         $("#mosbotn").show();

    }

    datos = 'finicial='+finicial+'&ffinal='+ffinal;

    diai = finicial.substring(8,10);
    diaf = ffinal.substring(8,10);

    inici = finicial.substring(5,7);
    finan = ffinal.substring(5,7);    
    inicio = inici * 1;
    final = finan *1;

    anioi = finicial.substring(0,4);
    aniof = ffinal.substring(0,4);

$.ajax({
    url: '../php/diasHabiles.php',
    type: 'POST',
     data: datos
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    meses = ['0','ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
       'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE']
    //$("#titulos").html('DÍAS HÁBILES: DEL '+ diai+'/'+meses[inicio]+'/'+anioi +' AL '+ diaf+'/'+meses[final]+'/'+aniof);
    document.getElementById("titulos").innerHTML = "" + 'DÍAS HÁBILES: '+ diai+'/'+meses[inicio]+'/'+anioi +' AL '+ diaf+'/'+meses[final]+'/'+aniof;
    var x = 0;
    var v = 1;

    html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12">';
   
       for (m = inicio; m <= final; m++) {
        x++;

        html += '<table class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><td colspan="7" style="text-align:center;"><b>'+meses[m]+'</b></td></tr><tr><th><i></i>L</th><th><i></i>M</th><th><i></i>M</th><th><i></i>J</th><th><i></i>V</th><th><i></i>S</th><th><i></i>D</th></tr></thead><tbody>';
         for (i = 0; i < res.length; i++) {

        if(obj.data[i].mes==m){    
        if(obj.data[i].dias=='Lunes' && obj.data[i].inc==1){

             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";
         }else if(obj.data[i].dias=='Lunes'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";
            }
        if(obj.data[i].dias=='Martes' && obj.data[i].inc==1){
             html += "<td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";
         }else if(obj.data[i].dias=='Martes'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                                    
            }
        if(obj.data[i].dias=='Miércoles' && obj.data[i].inc==1){
             html += "<td></td><td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";            
         }else if(obj.data[i].dias=='Miércoles'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                                    
            }
        if(obj.data[i].dias=='Jueves' && obj.data[i].inc==1){
             html += "<td></td><td></td><td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";            
        }else if(obj.data[i].dias=='Jueves'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                        
            }
        if(obj.data[i].dias=='Viernes' && obj.data[i].inc==1){
            html += "<td></td><td></td><td></td><td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                        
        }else if(obj.data[i].dias=='Viernes'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                                   
            }
        if(obj.data[i].dias=='Sábado' && obj.data[i].inc==1){
             html += "<td></td><td></td><td></td><td></td><td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                                    
         }else if(obj.data[i].dias=='Sábado'){
             html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td>";                                                
            }
        if(obj.data[i].dias=='Domingo' && obj.data[i].inc==1){
            html += "<td></td><td></td><td></td><td></td><td></td><td></td><td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td><tr>";                                    
        }else if(obj.data[i].dias=='Domingo'){
            html += "<td><input type='checkbox' name='idias[]' id='idias' class='idias' value='" + obj.data[i].numero + "' /> <b>"+ obj.data[i].numero +"</b></td><tr>";                                                
            }       
        }

    }
          html += '</tbody></table>';

}
    html += '</div></div></div>';

    $("#diaHabil").html(html);

})

}

function agregarDias(){

    alert('ok');
}

