// function enviarCorreo() {

//     correo = document.getElementById('correo').value;
//     if (correo != '') {
//         $.ajax({
//             url: 'php/conCorreo.php',
//             type: 'POST',
//             data: 'correo=' + correo
//         }).done(function(respuesta) {
//             //alert(respuesta);
//             if (respuesta == 0) {
//                 $('#exito').show();
//                 setTimeout(function() {
//                     $('#exito').hide();
//                 }, 4000);
//                 conprofesion(ActIdpro);
//             } else if (respuesta == 1) {
//                 $('#falla').show();
//                 setTimeout(function() {
//                     $('#falla').hide();
//                 }, 4000);
//             } else if (respuesta == 2) {
//                 $('#aviso').show();
//                 setTimeout(function() {
//                     $('#aviso').hide();
//                 }, 2000);
//             }
//         });
//     } else {
//         $('#vacio').show();
//         setTimeout(function() {
//             $('#vacio').hide();
//         }, 2000);
//     }
// }

function enviarCorreo() {

    correo = document.getElementById('correo').value;
    if (correo != '') {
        $.ajax({
            url: 'php/conCorreo.php',
            type: 'POST',
            data: 'correo=' + correo
        }).done(function(respuesta) {
            Swal.fire({
                type: 'success',
                title: 'ENVIADO CON ÉXITO',
                text: 'Revise su bandeja de entrada de correo electrónico',
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 2000,
                backdrop: `
                    rgba(100, 100, 100, 0.4)
                `
            });
            // alert("Tampoco se que sea");
            // conprofesion(ActIdpro);
            if (respuesta == 1) {
                // alert("No se que sea");
            } else if (respuesta == 2) {
                Swal.fire({
                    type: 'info',
                    title: 'Solicitud sin éxito',
                    text: 'El correo electrónico proporcionado no existe',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 2000,
                    backdrop: `
                    rgba(100, 100, 100, 0.4)
                `
                });
            }
        });
    } else {
        Swal.fire({
            type: 'info',
            title: '¡Atención!',
            text: 'Llene campos vacios',
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 2000,
            backdrop: `
            rgba(100, 100, 100, 0.4)
        `
        });
    }

}

var mostrar_mensaje = function(informacion) {
        var texto = "",
            color = "";
        if (informacion.respuesta == "BIEN") {
            texto = "Se han guardado los cambios correctamente.";
            color = "#379911";
        } else if (informacion.respuesta == "ERROR") {
            texto = "<strong>Error</strong>, no se ejecutó la consulta.";
            color = "#C9302C";
        } else if (informacion.respuesta == "EXISTE") {
            texto = "<strong>Información!</strong> el correo ya existe.";
            color = "#5b94c5";
        } else if (informacion.respuesta == "VACIO") {
            texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
            color = "#ddb11d";
        } else if (informacion.respuesta == "OPCION_VACIA") {
            texto = "<strong>Advertencia!</strong>la opción no existe o esta vacia, recarge la pagina.";
            color = "#ddb11d";
        }


        $(".mensaje").html(texto).css({ "color": color });
        $('.mensaje').fadeIn('slow');
        setTimeout(function() {
            $(this).html("");
            $('.mensaje').fadeOut('slow');
        }, 2000);

    }
    //limpiar los input text
var limpiar_datos = function() {
    $("#opcion").val("registrar");
    $("#id_usuario").val("");
    $("#nombre").val("").focus();
    $("#apellidos").val("");
    $("#idarea").val("");
    $("#extension").val("");
    $("#correo").val("");
    $("#ubicacion").val("");
    $("#n_empleado").val("");
}

var traduccion = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}