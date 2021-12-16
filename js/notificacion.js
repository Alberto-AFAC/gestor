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