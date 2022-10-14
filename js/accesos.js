

function administrador(){
$("#aaltapersonl1").show();
$("#aaltapersonlxtrn1").show();
$("#aaltainstrucxtrn1").show();

$("#alistapersonl1").show();
$("#alistainspctr1").show();
$("#alistainstc1").show();

$("#bditarinspctr1").hide();
$("#beditausu1").hide();

        $.ajax({
        url: '../php/accesos.php',
        type: 'POST',
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;

         //alert(resp);
         for (i = 0; i < res.length; i++) {

                str = obj.data[i].acceso;
                acces = str.slice(1)
                activo = str.substring(-1,1);
                if(activo=='a'){
                $("#"+activo+acces+"1").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"1").hide();
                }else if(activo=='b'){
                $("#"+activo+acces+"1").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"1").hide();
                }

                if(obj.data[i].acceso=='beditausu'){

                    $("#beditausu1").show();
                    $("#alistapersonl1").hide();
                    $("#perosnasciaac").show();
                    $("#perosnas").hide();
                    $("#editarperfil").hide();
                    $("#check").hide();
                    $("#asignar").hide();
                }else{
                    // $("#perosnasciaac").hide();
                }

                if(obj.data[i].acceso=='bditarinspctr'){
                    $("#editinsp").hide();
                    $("#bditarinspctr1").show();
                    $("#alistainspctr1").hide();
                    $("#inspeciones").hide();
                    $("#inspecionciaac").show();

                 }

         }
    })
}

function directorAcceso(){

     $.ajax({
        url: '../php/accesos.php',
        type: 'POST',
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
         for (i = 0; i < res.length; i++) {

                str = obj.data[i].acceso;
                acces = str.slice(1)
                activo = str.substring(-1,1);
                if(activo=='a'){
                $("#"+activo+acces+"1").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"1").hide();
                }else if(activo=='b'){
                $("#"+activo+acces+"1").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"1").hide();
                }
         }
    });


}


function inspectorAcceso(){

        $.ajax({
        url: '../php/accesos.php',
        type: 'POST',
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
         for (i = 0; i < res.length; i++) {

                str = obj.data[i].acceso;
                acces = str.slice(1)
                activo = str.substring(-1,1);
                if(activo=='a'){
                $("#"+activo+acces+"1").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"1").hide();
                }else if(activo=='b'){
                $("#"+activo+acces+"1").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"1").hide();
                }
         }
    });
}

function humanosAcceso(){

        $.ajax({
        url: '../php/accesos.php',
        type: 'POST',
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
         for (i = 0; i < res.length; i++) {

                str = obj.data[i].acceso;
                acces = str.slice(1)
                activo = str.substring(-1,1);
                if(activo=='a'){
                $("#"+activo+acces+"1").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"1").hide();
                }else if(activo=='b'){
                $("#"+activo+acces+"1").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"1").hide();
                }
         }
    });
}

function coordinadorAcceso(){
        $.ajax({
        url: '../php/accesos.php',
        type: 'POST',
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
         for (i = 0; i < res.length; i++) {

                str = obj.data[i].acceso;
                acces = str.slice(1)
                activo = str.substring(-1,1);
                
                if(activo=='a'){
                $("#activo").show();
                }
                
                if(activo=='a'){
                $("#"+activo+acces+"1").show();
                    acceso = 'b'+acces;
                $("#"+acceso+"1").hide();
                }else if(activo=='b'){
                $("#"+activo+acces+"1").show();
                    acceso = 'a'+acces;
                $("#"+acceso+"1").hide();
                }
         }
    });
}