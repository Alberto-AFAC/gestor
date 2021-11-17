//destroy:true,
$.ajax({
    url: '../php/statusPer.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    var resultado = obj.data[0].instructor + obj.data[0].coordinador;

    $("#persona").html(obj.data[0].persona);
    $("#inspectores").html(obj.data[0].inspectores);
    $("#instructor").html(resultado);
    // $("#coordinador").html(obj.data[0].resultado);
});


var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var fecha_actual = years.getFullYear();
document.getElementById("fecha").innerHTML = "" + '<b>CURSOS AÑO ' + fecha_actual + '</b>';


$.ajax({
    url: '../php/statusCur.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    //var totalv = obj.data[0].vencido + obj.data[0].porvencer;

    $("#progrmas").html(obj.data[0].progrmas);
    $("#finalizado").html(obj.data[0].finalizado);
    $("#acreditar").html(obj.data[0].acreditar);
    $("#vencer").html(obj.data[0].vencido);

});

//PERFIL PRIVILEGIOS DE SESION
$.ajax({
    url: '../php/conResul.php',
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
    resttl = total - resultado;

    $("#personad").html(resttl);
    $("#inspectoresd").html(inspectores);
    $("#instructord").html(resultado);
    $("#coordinadord").html(resultado);
});


$.ajax({
    url: '../php/vigCursos.php',
    type: 'POST'
}).done(function(resp) {
    obj = JSON.parse(resp);
    var res = obj.data;

    //var totalv = obj.data[0].vencido + obj.data[0].porvencer;
    ttalvncr = obj.data[0].VENCER;
    $("#VENCIDO").html(obj.data[0].VENCIDO);
    $("#VENCER").html(obj.data[0].VENCER);
    $("#VIGENTE").html(obj.data[0].VIGENTE);
    //$("#vencer").html(obj.data[0].vencido);
document.getElementById("NOTVCD").innerHTML = "" + '<b>Tiene ' + ttalvncd + ' curso(s) por vencer</b>';
document.getElementById("NOTVNCR").innerHTML = "" + '<b>Tiene ' + ttalvncr + ' curso(s) por vencer</b>';
document.getElementById("NOTVGNT").innerHTML = "" + '<b>Tiene ' + ttalvgnt + ' curso(s) por vencer</b>';


});

