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

var accesopers = document.getElementById('idact').value; // SE RASTREA EL NUMERO DE EMPLEADO
    //alert(idpersona1);
    $.ajax({
            url: '../php/accesos-list.php',
            type: 'POST'
        }).done(function(resp) {
            obj = JSON.parse(resp);
            var res = obj.data;

            //AQUI03
            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>GRADO</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th><th><i></i>FECHA</th></tr></thead><tbody>';
            var n = 0;
            for (H = 0; H < res.length; H++) { //RASTREAR EL ID DE LA PERSONA
                //alert(obj.data[H].id_usu);
                if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '0' ) {
                    $('#modal-obligatorio').modal('show'); 
                    $("#usuarioobl").val(obj.data[H].gstNombr +" "+obj.data[H].gstApell  );
                }else if (obj.data[H].id_usu == accesopers && obj.data[H].cambio == '1' ) {
                    $('#modal-obligatorio').modal('hide');  
                }

        }
    })






// $.ajax({
//     url: '../php/vigCursos.php',
//     type: 'POST'
// }).done(function(resp) {
//     obj = JSON.parse(resp);
//     var res = obj.data;

//     //var totalv = obj.data[0].vencido + obj.data[0].porvencer;
//     ttal = obj.data[0].VENCER+obj.data[0].VENCIDO;

//     $("#VENCIDO").html(obj.data[0].VENCIDO);
//     $("#noticurso").html(ttal);
//     $("#VIGENTE").html(obj.data[0].VIGENTE);
//     //$("#vencer").html(obj.data[0].vencido);

//     if(ttal==1){
//     document.getElementById("noticursos").innerHTML = "" + '<b>Tienes ' + ttal + ' notificación.</b>';
//     }else{
//     document.getElementById("noticursos").innerHTML = "" + '<b>Tienes ' + ttal + ' notificaciones.</b>';
//     }

//     if(obj.data[0].VENCER==0){
//         $("#ocuvncr").hide();
//     }else if(obj.data[0].VENCER==1){
//     document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' curso por vencer';        
//     }else{
//     document.getElementById("notvencer").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCER + ' cursos por vencer';        
//     }


//     if(obj.data[0].VENCIDO==0){
//         $("#ocuvncd").hide();        
//     }else if(obj.data[0].VENCIDO==1){
//     document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' curso vencido';        
//     }else{
//     document.getElementById("notvencdo").innerHTML = "" + '<li class="fa fa-warning text-yellow"></li> Tienes ' + obj.data[0].VENCIDO + ' cursos vencidos';        
//     }

//  //document.getElementById("NOTVCD").innerHTML = "" + '<b>Tiene ' + ttalvncd + ' curso(s) por vencer</b>';

// //document.getElementById("NOTVGNT").innerHTML = "" + '<b>Tiene ' + ttalvgnt + ' curso(s) por vencer</b>';


// });

