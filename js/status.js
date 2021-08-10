//destroy:true,
$.ajax({
    url: '../php/conPerson.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var personas = 0;
    var inspectores = 0;
    var instructor = 0;
    var coordinador = 0;
    var total = 0;
    for (i = 0; i < res.length; i++) {

        if (obj.data[i].gstCargo == 'INSPECTOR' || obj.data[i].gstCargo == 'DIRECTOR') {
            inspectores++;
        } else if (obj.data[i].gstCargo == 'INSTRUCTOR') {
            instructor++;
        } else if (obj.data[i].gstCargo == 'COORDINADOR') {
            coordinador++;
        } else if (obj.data[i].gstIDCat == '0' && obj.data[i].gstIDSub == '0') {
            personas++;
        }
        total++;

    }
    resultado = coordinador + instructor;

    $("#persona").html(total);
    $("#inspectores").html(inspectores);
    $("#instructor").html(resultado);
    $("#coordinador").html(resultado);
});


var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var fecha_actual = years.getFullYear();
document.getElementById("fecha").innerHTML = "" + '<b>CURSOS AÑO ' + fecha_actual + '</b>';


$.ajax({
    url: '../php/lisCurso.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;
    var progrmas = 0;
    var finalizado = 0;
    var acreditar = 0;
    var vencer = 0;

    for (i = 0; i < res.length; i++) {

        var hoy = new Date();
        var factual = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

        var fcurso = new Date(obj.data[i].fcurso);
        var fcurso = new Date(fcurso.getFullYear(), fcurso.getMonth(), fcurso.getDate());


        if (obj.data[i].proceso == 'FINALIZADO') {
            finalizado++;
        }
        if (obj.data[i].proceso == 'PENDIENTE' && factual <= fcurso) {
            acreditar++;
        }

        progrmas++;




        // finaliza.setMonth(obj.data[i].fechaf.getMonth() - 3);

        // var finaliza = new Date(finaliza.getFullYear(), finaliza.getMonth(), finaliza.getDate());

        //alert(factual+'=='+finaliza);

        if (factual <= fcurso) {

            // alert(factual+' === '+fcurso);

            var termino = new Date(obj.data[i].fechaf);
            var finaliza = new Date(termino.getFullYear(), termino.getMonth(), termino.getDate());

            finaliza.setMonth(finaliza.getMonth() - 3);

            if (factual >= finaliza) {
                vencer++;
            }
        }

        // if(factual >= finaliza){
        //             alert('VENCIÓ');    
        // }



    }

    $("#progrmas").html(progrmas);
    $("#finalizado").html(finalizado);
    $("#acreditar").html(acreditar);
    $("#vencer").html(vencer);

});