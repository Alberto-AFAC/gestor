//function listar(){
//destroy:true,
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
    //}

// $(document).ready(function() {
//     $("input[type=radio]").click(function(event){
//         var valor = $(event.target).val();
//         if(valor =="si"){
//             $("#seecioncat").show();
//             $("#selecurso").hide();
//             $("#partici").show();
//             limpiar_datos();
//         } else if (valor == "no") {
//             $("#seecioncat").hide();
//             $("#selecurso").show();
//             $("#partici").hide();
//             limpiar_datos();
//         } 
//     });
// }); 

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

    alert(datos);

    if (idcord == '' || idinsps == '' || id_mstr == '' || hcurso == '' || fcurso == '' || idinst == '' || sede == '' || modalidad == '' || link == '' || fechaf == '') {

        $('#empty').toggle('toggle');
        setTimeout(function() {
            $('#empty').toggle('toggle');
        }, 2000);

        return;

    } else {
        $.ajax({
            url: '../php/proCurso.php',
            type: 'POST',
            data: 'idcord=' + idcord + '&idinsps=' + idinsps + '&id_mstr=' + id_mstr + '&idinst=' + idinst + '&fcurso=' + fcurso + '&hcurso=' + hcurso + '&sede=' + sede + '&modalidad=' + modalidad + '&link=' + link + '&fechaf=' + fechaf + '&opcion=procurso'
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
                    title: 'AFAC INFORMA',
                    text: 'Curso programado correctamente',
                    // showConfirmButton: false,
                    showCancelButton: true,
                    customClass: 'swal-wide',
                    confirmButtonText: '<a class="a-alert" href="../admin/programa.php"><span style="color: white;">¿Deseas agregar otro curso?</span></a>',
                    cancelButtonText: '<a  class="a-alert" href="../admin/lisCurso.php"><span style="color: white;">Cerrar</span></a>',

                });
                // setTimeout("location.href = 'inspecion.php';", 2000);

            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'AFAC INFORMA',
                    text: 'Error al agregar curso',
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