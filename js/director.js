//destroy:true,
$.ajax({
    url: '../php/notidirector.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    // var programados = 0;
    var completos = 0;
    // var cancelados = 0;
    var confirmar = 0;

    for (i = 0; i < res.length; i++) {

        if (obj.data[i].gstCargo == 'NUEVO INGRESO') {
            confirmar++;
        }
        // if (obj.data[i].confirmar == 'CONFIRMADO' && obj.data[i].proceso == 'PENDIENTE' || obj.data[i].confirmar != 'CONFIRMADO' && obj.data[i].proceso == 'PENDIENTE') {
        //     programados++;
        // }
        // if (obj.data[i].proceso == 'CANCELADO') {
        //     cancelados++;
        // }
        if (obj.data[i].proceso == 'FINALIZADO') {
            completos++;
        }
    }


    $("#confirma").html(confirmar);
    //$("#programados").html(programados);
   // $("#cancelados").html(cancelados);
   // $("#completos").html(completos);
    $("#noti").html(confirmar);
    if(confirmar==1){
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirmar + ' notificación.</b>';        
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirmar + ' nuevo personal asignado';
    }else{
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + confirmar + ' notificaciones.</b>';        
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirmar + ' nuevos personales asignados';
    }

});
