
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
        
        if(obj.data[i].confirmar == 'CONFIRMAR' && obj.data[i].proceso == 'PENDIENTE'){  
            confirmar++;  
        }
         if(obj.data[i].confirmar=='CONFIRMADO' && obj.data[i].proceso == 'PENDIENTE' || obj.data[i].confirmar!='CONFIRMADO' && obj.data[i].proceso == 'PENDIENTE'){
            programados++;               
            }
        if(obj.data[i].proceso=='CANCELADO'){
            cancelados++;
            }
        if(obj.data[i].proceso=='FINALIZADO'){
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


                lista = obj.data[i].codigo;
                $("#id_curso").val(idcurso);
                $("#idinsp").val(obj.data[i].idinsp);      
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




            if(obj.data[i].gstCargo=='COORDINADOR' && obj.data[i].codigo == lista || obj.data[i].gstCargo=='INSTRUCTOR' && obj.data[i].codigo == lista){
                        
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
        if(valor =="NO"){
            $("#noasis").show();
            $("#asiste").hide();
            limCampos();
        } else if (valor == "SI") {
            $("#asiste").show();
            $("#conf").val('CONFIRMADO');
            $("#noasis").hide();
            $("#obser").hide();
            $("#archivo").hide(); 
        } 
    });
}); 

function confirma(){

    var id_curso = document.getElementById('id_curso').value;
    var idinsp = document.getElementById('idinsp').value;
   var conf = document.getElementById('conf').value;
    
if(conf==0){

        var confir = document.getElementById('confir').value;
    if(confir=='OTROS'){
         var justifi = document.getElementById('obser').value;
           
    }else{
        
         var justifi = document.getElementById('archivo').value;   
    }

    }else if(conf != 0){
    var id_curso = document.getElementById('id_curso').value;
    var confir = conf;
    var justifi = 0;

    }

    var paqueteDeDatos = new FormData();
    paqueteDeDatos.append('archivo', $('#archivo')[0].files[0]);
    paqueteDeDatos.append('confir', confir);
    paqueteDeDatos.append('justifi', justifi);
    paqueteDeDatos.append('id_curso', id_curso);
    paqueteDeDatos.append('idinsp', idinsp);

    $.ajax({
        url: '../php/confirmar.php',
        data: paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success: function(r) {
            console.log(r);
            if (r == 8) {
                $('#vacio').toggle('toggle');
                setTimeout(function() {
                    $('#vacio').toggle('toggle');
                }, 4000);

            } else if (r == 0) {
                $('#exito').toggle('toggle');
                setTimeout(function() {
                    $('#exito').toggle('toggle');
                }, 4000);

                        // setTimeout(function(){
                        // $("#data-table-confirmar").load(location.reload() + " #data-table-confirmar");
                        // }, 3100);                

                $('#vacia').show('slow');
                $('#agrega').hide();

            } else if (r == 1) {
                $('#falla').toggle('toggle');
                setTimeout(function() {
                    $('#falla').toggle('toggle');
                }, 4000);
            } else if (r == 2) {
                $('#error').toggle('toggle');
                setTimeout(function() {
                    $('#error').toggle('toggle');
                }, 4000);
            } else if (r == 3) {
                $('#renom').toggle('toggle');
                setTimeout(function() {
                    $('#renom').toggle('toggle');
                }, 4000);
            } else if (r == 4) {
                $('#forn').toggle('toggle');
                setTimeout(function() {
                    $('#forn').toggle('toggle');
                }, 4000);
            } else if (r == 6) {
                $('#adjunta').toggle('toggle');
                setTimeout(function() {
                    $('#adjunta').toggle('toggle');
                }, 4000);
            } else if (r == 7) {
                $('#repetido').toggle('toggle');
                setTimeout(function() {
                    $('#repetido').toggle('toggle');
                }, 4000);
            }
        }
    });
}

function justificacion()
{

var seleccion=document.getElementById('confir');
valor = seleccion.options[seleccion.selectedIndex].value;
if(valor == 'TRABAJO' || valor == 'ENFERMEDAD'){

    $("#archivo").show();
    $("#obser").hide();
}else
    if(valor == 'OTROS'){
     $("#obser").show();
     $("#archivo").hide();   
    }

}

function limCampos(){
$("#obser").val('');
$("#archivo").val('');
$("#conf").val('0');
}