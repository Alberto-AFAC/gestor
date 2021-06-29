
    //destroy:true,
    $.ajax({
    url:'../php/cursos.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var programados = 0;
        var completos=0;
        var cancelados=0;
        var confirmar=0;

        for(i=0; i<res.length;i++){
        
        if(obj.data[i].evaluacion == '0'){  
            confirmar++;  
        }
         if(obj.data[i].evaluacion=='CONFIRMADO' || obj.data[i].evaluacion == '0'){
            programados++;               
            }
        if(obj.data[i].evaluacion=='CANCELADO'){
            cancelados++;
            }
        if(obj.data[i].evaluacion=='FINALIZADO'){
            completos++;
            }
        } 

        $("#confirma").html(confirmar);
        $("#programados").html(programados); 
         $("#cancelados").html(cancelados); 
          $("#completos").html(completos);
            $("#noti").html(confirmar);
        document.getElementById("notif").innerHTML = ""+'<b>Tienes '+confirmar+' notificaciones.</b>';
        document.getElementById("confirmar").innerHTML = ""+'<i class="fa fa-warning text-yellow"></i> Tienes '+confirmar+' cursos que confirmar.';


});



//var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
//var fecha_actual = years.getFullYear();
//document.getElementById("fecha").innerHTML = ""+'<b>CURSOS AÑO '+fecha_actual+'</b>';
 


function confirmar(idcurso){

    $.ajax({
        url: '../php/curConfir.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

        for (i = 0; i < res.length; i++) {
                      
                if (obj.data[i].id_curso == idcurso) {


                lista = obj.data[i].idmstr;      
                $("#id_curso").val(idcurso);
                $("#gstTitlo").html(obj.data[i].gstTitlo);
                $("#gstTipo").html(obj.data[i].gstTipo);



var fechai = new Date(obj.data[i].fcurso);
var fcurso = fechai.getDate()+'-'+(fechai.getMonth()+1)+'-'+fechai.getFullYear();

var fechac = new Date(obj.data[i].fechaf);
var fechaf = fechac.getDate()+'-'+(fechac.getMonth()+1)+'-'+fechac.getFullYear();
                $("#fcurso").html(fcurso);
                $("#hcurso").html(obj.data[i].hcurso);
                $("#fechaf").html(fechaf);
                $("#sede").html(obj.data[i].sede);
                $("#modalidad").html(obj.data[i].modalidad);


            }
        }


        html = '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>NOMBRE</th><th>CARGO</th>';
        x=0;
    for(i = 0; i < res.length; i++){
        x++;
            if(obj.data[i].gstCargo=='COORDINADOR' && obj.data[i].idmstr == lista || obj.data[i].gstCargo=='INSTRUCTOR' && obj.data[i].idmstr == lista){
                        
                      html += "<tr><td>"+x+"</td><td>"+obj.data[i].gstNombr+' '+obj.data[i].gstApell+"</td><td>"+obj.data[i].gstCargo+"</td></tr>";
            }
        }
        html += '</table>';
        $("#instruc").html(html);

    })

}

$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="no"){
            $("#obser").show();
        } else if (valor == "si") {
            $("#obser").hide();
        } 
    });
}); 

function confirma(){


    var gstNombr = document.getElementById('gstNombr').value;

    
}