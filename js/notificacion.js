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

    $.ajax({
        url: '../php/vigCursos.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
    ttal = obj.data[0].VENCER+obj.data[0].VENCIDO;  
    $("#VENCIDO").html(obj.data[0].VENCIDO);
    $("#noticurso").html(ttal);
    $("#VIGENTE").html(obj.data[0].VIGENTE);
    

    notificacion = ttal+confirma;

    $("#confirma").html(notificacion);
    $("#programados").html(programados);
    $("#cancelados").html(cancelados);
    $("#completos").html(completo);
    $("#noti").html(notificacion);
    $("#vencidos").html(venci);


    if(notificacion==1){
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + notificacion + ' notificación.</b>';
    }else{
    document.getElementById("notif").innerHTML = "" + '<b>Tienes ' + notificacion + ' notificaciones.</b>';
    }

    if(confirma==0){
        $("#ocucnfir").hide();        
    }
    else if(confirma==1){
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' curso que confirmar.';
    }else{
    document.getElementById("confirmar").innerHTML = "" + '<i class="fa fa-warning text-yellow"></i> Tienes ' + confirma + ' cursos que confirmar.';
    }

    if(obj.data[0].VENCER==0){
        $("#ocuvncr").hide();
    }else if(obj.data[0].VENCER==1){
    document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' curso recurrente por vencer';        
    }else{
    document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' cursos recurrentes por vencer';        
    }
    if(obj.data[0].VENCIDO==0){
        $("#ocuvncd").hide();        
    }else if(obj.data[0].VENCIDO==1){
    document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' curso recurrente vencido';        
    }else{
    document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' cursos recurrentes vencidos';        
    }

});
});    


/*$.ajax({
    url: '../php/vigCursos.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    ttal = obj.data[0].VENCER+obj.data[0].VENCIDO;  
    $("#VENCIDO").html(obj.data[0].VENCIDO);
    $("#noticurso").html(ttal);
    $("#VIGENTE").html(obj.data[0].VIGENTE);

    if(ttal==1){
    document.getElementById("noticursos").innerHTML = "" + '<b>Tienes ' + ttal + ' notificación.</b>';
    }else{
    document.getElementById("noticursos").innerHTML = "" + '<b>Tienes ' + ttal + ' notificaciones.</b>';
    }

    if(obj.data[0].VENCER==0){
        $("#ocuvncr").hide();
    }else if(obj.data[0].VENCER==1){
    document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' curso por vencer';        
    }else{
    document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' cursos por vencer';        
    }
    if(obj.data[0].VENCIDO==0){
        $("#ocuvncd").hide();        
    }else if(obj.data[0].VENCIDO==1){
    document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' curso vencido';        
    }else{
    document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' cursos vencidos';        
    }

});*/