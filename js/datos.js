function conPrsnl(){
    //destroy:true,
    $.ajax({
    url:'../php/conPerson.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="prsnl" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width:5%;"><i class="fa fa-sort-numeric-asc"></i>N°</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th style="width:20%" ><i></i>ACCIÓN</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;

            gstIdper = obj.data[i].gstIdper+'*'+obj.data[i].gstIDCat;


            if(obj.data[i].gstIDCat == '0' && obj.data[i].gstIDSub == '0'){  
            html +="<tr><td>"+obj.data[i].gstNmpld+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td> <a type='button' title='Evaluación' onclick='inspector("+'"'+gstIdper+'"'+")' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a> <a type='button' title='Agregar estudios' onclick='estudio("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#prsnls").html(html);  
    })          
}


function insPctr(){
    //destroy:true,
    $.ajax({
    url:'../php/consulta.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cnslt" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i> CATEGORÍA</th><th style="width:160px" ><i></i>ACCIÓN</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;

              gstIdper = obj.data[i].gstIdper+'*'+obj.data[i].gstIDCat+'*'+obj.data[i].gstEvalu;
              result = obj.data[i].gstIdper+'*'+obj.data[i].gstNombr+'*'+obj.data[i].gstIDCat;
            if(obj.data[i].gstCargo=='INSPECTOR' || obj.data[i].gstCargo=='DIRECTOR' ){
            
            if(obj.data[i].gstEvalu=='NO'){
                html +="<tr><td>"+obj.data[i].gstNmpld+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td>"+obj.data[i].gstCatgr+"</td><td> <a type='button' title='Por evaluación' onclick='inspector("+'"'+gstIdper+'"'+")' class='btn btn-warning'  data-toggle='modal' data-target='#modal-evaluar' ><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector("+'"'+gstIdper+'"'+")' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";            
                }else if(obj.data[i].gstEvalu=='SI'){
                html +="<tr><td>"+x+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td>"+obj.data[i].gstCatgr+"</td><td><a type='button' title='Evaluado' onclick='resultado("+'"'+result+'"'+")' class='datos btn btn-success'  data-toggle='modal' data-target='#modal-resultado'><i class='fa ion-android-clipboard' style='font-size:23px;'></i></a> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector("+'"'+gstIdper+'"'+")' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' title='Agregar estudios' onclick='estudio("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' title='Agregar experiencia profesional' onclick='profesion("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";    
                }


            }else{}
        } 
        html +='</tbody></table></div></div></div>';
        $("#conslts").html(html);  
    })          
}


function openDtlls(){
  $("#detalles").toggle(250);//Muestra contenedor 
  $("#lista").toggle("fast");//Oculta lista

//document.getElementById('nombre').disabled='false';
}
function closeDtlls(){
    $("#lista").toggle(250);//Muestra lista  
    $("#detalles").toggle("fast");//Oculta contenedor
    $("#buton").toggle();
    $("#butons").toggle(); 

    document.getElementById('gstNombr').disabled=true; // NOMBRE
    document.getElementById('gstApell').disabled=true; // APELLIDO
    document.getElementById('gstLunac').disabled=true; // LUGAR DE NACIMIENTO
    document.getElementById('gstFenac').disabled=true; // FECHA DE NACIMIENTO
    document.getElementById('gstStcvl').disabled=true; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled=true; //CURP
    document.getElementById('gstRfc').disabled=true; //RFC
    document.getElementById('gstNpspr').disabled=true; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled=true; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled=true; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled=true; // VISA VIGENCIA
    document.getElementById('gstNucrt').disabled=true; // NUMERO DE CARTLLA
    document.getElementById('gstCalle').disabled=true; // CALLE
    document.getElementById('gstNumro').disabled=true; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled=true; // COLONIA
    document.getElementById('gstCpstl').disabled=true; // CODIGO POSTAL
    document.getElementById('gstStado').disabled=true; // CUIDAD
    document.getElementById('gstCasa').disabled=true; // NUM. DE CASA
    document.getElementById('gstClulr').disabled=true; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled=true; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled=true; // CUIDAD

    document.getElementById('gstNmpld').disabled=true; // NUM. DE EMPLEADO
    document.getElementById('gstIdpst').disabled=true; // NUM. DE EMPLEADO
    document.getElementById('gstCargo').disabled=true;

    document.getElementById('gstAreID').disabled=true;//ID área
    document.getElementById('gstPstID').disabled=true;//ID puesto
    document.getElementById('gstSpcID').disabled=true;//ID especialidad
    document.getElementById('gstSigID').disabled=true;//ID siglas

    document.getElementById('gstIDCat').disabled=true;
    document.getElementById('gstIDSub').disabled=true;
    document.getElementById('gstCorro').disabled=true;
    document.getElementById('gstCinst').disabled=true;
    document.getElementById('gstFeing').disabled=true;
    document.getElementById('gstIDuni').disabled=true;

    document.getElementById('gstIDara').disabled=true;//ID del área

}
//muestra ventana estudios
function estudio(gstIdper){

    var d=gstIdper.split("*");
         gstIdper = d[0];
    $("#Forstd #gstIDper").val(gstIdper);
}


function agrStudio(){

var paqueteDeDatos = new FormData();
paqueteDeDatos.append('gstDocmt', $('#gstDocmt')[0].files[0]);
paqueteDeDatos.append('gstIDper', $('#gstIDper').prop('value'));
paqueteDeDatos.append('gstInstt', $('#gstInstt').prop('value'));
paqueteDeDatos.append('gstCiudad', $('#gstCiudad').prop('value'));
paqueteDeDatos.append('gstPriod', $('#gstPriod').prop('value'));
//paqueteDeDatos.append('agrEstudio', $('#agrEstudio').prop('value'));
//alert(paqueteDeDatos);

            $.ajax({
                url:'../php/docEstudios.php',
                data:paqueteDeDatos,
                type: "POST",
                contentType: false,
                processData: false,
                success:
                    function (r) {
                    //console.log(r);
                    if(r==8){
                    $('#vacio').toggle('toggle');
                    setTimeout(function(){
                    $('#vacio').toggle('toggle');
                    },4000);
                           
                    }else if(r==0){      
                    $('#exito').toggle('toggle');
                    setTimeout(function(){
                    $('#exito').toggle('toggle');
                    },4000);

                    $('#vacia').show('slow');
                    $('#agrega').hide();

                    }else if(r==1){      
                    $('#falla').toggle('toggle');
                    setTimeout(function(){
                    $('#falla').toggle('toggle');
                    },4000);}

                    else if(r==2){      
                    $('#error').toggle('toggle');
                    setTimeout(function(){
                    $('#error').toggle('toggle');
                    },4000);}

                    else if(r==3){      
                    $('#renom').toggle('toggle');
                    setTimeout(function(){
                    $('#renom').toggle('toggle');
                    },4000);}

                    else if(r==4){      
                    $('#forn').toggle('toggle');
                    setTimeout(function(){
                    $('#forn').toggle('toggle');
                    },4000);}

                    else if(r==6){      
                    $('#adjunta').toggle('toggle');
                    setTimeout(function(){
                    $('#adjunta').toggle('toggle');
                    },4000);}

                    else if(r==7){      
                    $('#repetido').toggle('toggle');
                    setTimeout(function(){
                    $('#repetido').toggle('toggle');
                    },4000);}                
                }
            });
 }

function actStudio(){

var paqueteDeDatos = new FormData();
paqueteDeDatos.append('EgstDocmt', $('#EgstDocmt')[0].files[0]);
paqueteDeDatos.append('EgstIDper', $('#EgstIDper').prop('value'));
paqueteDeDatos.append('EgstInstt', $('#EgstInstt').prop('value'));
paqueteDeDatos.append('EgstCiudad', $('#EgstCiudad').prop('value'));
paqueteDeDatos.append('EgstPriod', $('#EgstPriod').prop('value'));
//paqueteDeDatos.append('agrEstudio', $('#agrEstudio').prop('value'));
//alert(paqueteDeDatos);

    $.ajax({
        url:'../php/actEstudios.php',
        data:paqueteDeDatos,
        type: "POST",
        contentType: false,
        processData: false,
        success:
            function (r) {
            //console.log(r);
            if(r==8){
            $('#vacio1').toggle('toggle');
            setTimeout(function(){
            $('#vacio1').toggle('toggle');
            },4000);
                   
            }else if(r==0){      
            $('#exito1').toggle('toggle');
            setTimeout(function(){
            $('#exito1').toggle('toggle');
            },4000);

            }else if(r==1){      
            $('#falla1').toggle('toggle');
            setTimeout(function(){
            $('#falla1').toggle('toggle');
            },4000);}

            else if(r==2){      
            $('#error1').toggle('toggle');
            setTimeout(function(){
            $('#error1').toggle('toggle');
            },4000);}

            else if(r==3){      
            $('#renom1').toggle('toggle');
            setTimeout(function(){
            $('#renom1').toggle('toggle');
            },4000);}

            else if(r==4){      
            $('#forn1').toggle('toggle');
            setTimeout(function(){
            $('#forn1').toggle('toggle');
            },4000);}

            else if(r==6){      
            $('#adjunta1').toggle('toggle');
            setTimeout(function(){
            $('#adjunta1').toggle('toggle');
            },4000);}

            else if(r==7){      
            $('#repetido1').toggle('toggle');
            setTimeout(function(){
            $('#repetido1').toggle('toggle');
            },4000);}                
        }
    });   
}

function actProfsn(){

 
var gstIdpro = document.getElementById('AgstIdpro').value;
//var gstIDper = document.getElementById('AgstIDper').value;
var gstPusto = document.getElementById('AgstPusto').value;
var gstMpres = document.getElementById('AgstMpres').value;
var gstIDpai = document.getElementById('AgstIDpai').value;
var gstCidua = document.getElementById('AgstCidua').value;
var gstActiv = document.getElementById('AgstActiv').value;
var gstFntra = document.getElementById('AgstFntra').value;
var gstFslda = document.getElementById('AgstFslda').value;

    datos = 'gstIdpro='+gstIdpro+'&gstPusto='+gstPusto+'&gstMpres='+gstMpres+'&gstIDpai='+gstIDpai+'&gstCidua='+gstCidua+'&gstActiv='+gstActiv+'&gstFntra='+gstFntra+'&gstFslda='+gstFslda+'&opcion=actProfsn';
   // alert(datos);

 if(gstIdpro== '' ||gstPusto== '' ||gstMpres== '' ||gstIDpai== '' ||gstCidua== '' ||gstActiv== '' ||gstFntra== '' ||gstFslda== ''){

        $('#empty4').toggle('toggle');
        setTimeout(function(){
        $('#empty4').toggle('toggle');
        },2000); 

        return;
    }else{
        $.ajax({
        url:'../php/regInspc.php',
        type:'POST',
        data:datos
        }).done(function(respuesta){
        if (respuesta==0) {
        $('#succe4').toggle('toggle');
        setTimeout(function(){
        $('#succe4').toggle('toggle');
        },2000);
        }else{
        $('#danger4').toggle('toggle');
        setTimeout(function(){
        $('#danger4').toggle('toggle');
        },2000);
        }                    
        }); 
    }

}

function profesion(gstIdper){

var d=gstIdper.split("*");

    gstIdper = d[0];
    $("#Forpro #AgstIDper").val(gstIdper); 
}

function actPrfsn(datos){
 
    var d=datos.split("*");
    $("#actForpro #AgstIdpro").val(d[0]);
    $("#actForpro #AgstIDper").val(d[1]);
    $("#actForpro #AgstPusto").val(d[2]);
    $("#actForpro #AgstMpres").val(d[3]);
    $("#actForpro #AgstIDpai").val(d[4]);
    $("#actForpro #AgstCidua").val(d[5]);
    $("#actForpro #AgstActiv").val(d[6]);
    $("#actForpro #AgstFntra").val(d[7]);
    $("#actForpro #AgstFslda").val(d[8]);

}
function agrProfsn(){

    var gstIDper = document.getElementById('AgstIDper').value; 
    var gstPusto = document.getElementById('gstPusto').value; 
    var gstMpres = document.getElementById('gstMpres').value; 
    var gstIDpai = document.getElementById('gstIDpai').value; 
    var gstCidua = document.getElementById('gstCidua').value; 
    var gstActiv = document.getElementById('gstActiv').value; 
    var gstFntra = document.getElementById('gstFntra').value; 
    var gstFslda = document.getElementById('gstFslda').value; 

        datas = 'gstIDper='+gstIDper+'&gstPusto='+gstPusto+'&gstMpres='+gstMpres+'&gstIDpai='+gstIDpai+'&gstCidua='+gstCidua+'&gstActiv='+gstActiv+'&gstFntra='+gstFntra+'&gstFslda='+gstFslda+'&opcion=agrProfsn';

        //alert(datas);

    if(gstIDper== '' ||gstPusto== '' ||gstMpres== '' ||gstIDpai== '' ||gstCidua== '' ||gstActiv== '' ||gstFntra== '' ||gstFslda== ''){

        $('#empty3').toggle('toggle');
        setTimeout(function(){
        $('#empty3').toggle('toggle');
        },2000); 

        return;
    }else{
        $.ajax({
        url:'../php/regInspc.php',
        type:'POST',
        data:datas
        }).done(function(respuesta){
        if (respuesta==0) {
        $('#succe3').toggle('toggle');
        setTimeout(function(){
        $('#succe3').toggle('toggle');
        },2000);

        $('#vaciar').show('slow');
        $('#agregar').hide();
        
//$('#exito').slideDown('slow');
//$('#exito').slideUp('slow');

        }else{
        $('#danger3').toggle('toggle');
        setTimeout(function(){
        $('#danger3').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}
function mostrar(){
    $('#vaciar').hide();
    $('#agregar').show();

}
function mosEtdio(){
    $('#vacia').hide();
    $('#agrega').show();

}

function inspector(gstIdper){

    var d=gstIdper.split("*");

    gstIdper = d[0];
    gstIDCat = d[1];
    gstEvalu = d[2];

    if(gstEvalu=='NO'){ $("#ocultar").hide(); }else{ $("#ocultar").show(); }

$.ajax({
url:'../php/conPerson.php',
type:'POST'
}).done(function(resp){
    obj = JSON.parse(resp);
    var res = obj.data;  

        for(i=0; i<res.length;i++){

            if(obj.data[i].gstIdper == gstIdper){
                
       // $("#Dtall #AgstIdper").val(obj.data[i].gstIdper);
        $("#Evalúa #evalu_categr").val(obj.data[i].gstCatgr);
        $("#Evalúa #evalu_nombre").val(obj.data[i].gstNombr+' '+obj.data[i].gstApell);
        $("#nombrecompleto").val(obj.data[i].gstNombr+' '+obj.data[i].gstApell);
        $("#cargopersonal").val(obj.data[i].gstCargo);     
        $("#Dtall #gstIdper").val(obj.data[i].gstIdper);    	
        $("#Dtall #gstNombr").val(obj.data[i].gstNombr);
        $("#Dtall #gstApell").val(obj.data[i].gstApell);       
        $("#Dtall #gstLunac").val(obj.data[i].gstLunac);
        $("#Dtall #gstFenac").val(obj.data[i].gstFenac);
        $("#Dtall #gstStcvl").val(obj.data[i].gstStcvl);
        $("#Dtall #gstCurp").val(obj.data[i].gstCurp);
        $("#Dtall #gstRfc").val(obj.data[i].gstRfc);
        $("#Dtall #gstNpspr").val(obj.data[i].gstNpspr);
        $("#Dtall #gstPsvig").val(obj.data[i].gstPsvig);
        $("#Dtall #gstVisa").val(obj.data[i].gstVisa);
        $("#Dtall #gstVignt").val(obj.data[i].gstVignt);
        $("#Dtall #gstNucrt").val(obj.data[i].gstNucrt);
        $("#Dtall #gstCalle").val(obj.data[i].gstCalle);
        $("#Dtall #gstNumro").val(obj.data[i].gstNumro);
        $("#Dtall #gstClnia").val(obj.data[i].gstClnia);
        $("#Dtall #gstCpstl").val(obj.data[i].gstCpstl);
        $("#Dtall #gstCiuda").val(obj.data[i].gstCiuda);
        $("#Dtall #gstStado").val(obj.data[i].gstStado);
        $("#Dtall #gstCasa").val(obj.data[i].gstCasa);
        $("#Dtall #gstClulr").val(obj.data[i].gstClulr);
        $("#Dtall #gstExTel").val(obj.data[i].gstExTel);

        $("#Pusto #pstIdper").val(obj.data[i].gstIdper);
        $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
        $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
        $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
        $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
        $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
        $("#Pusto #gstCorro").val(obj.data[i].gstCorro);
        $("#Pusto #gstCinst").val(obj.data[i].gstCinst);
        $("#Pusto #gstFeing").val(obj.data[i].gstFeing);
        $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);

        $("#Pusto #gstIDara").val(obj.data[i].gstIDara);
        $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);

        $("#Pusto #gstAreID").val(obj.data[i].gstAreID);//ID área
//        alert(obj.data[i].gstAreID);
        $("#Pusto #gstPstID").val(obj.data[i].gstPstID);//ID puesto
        $("#Pusto #gstSpcID").val(obj.data[i].gstSpcID);//ID especialidad
        $("#Pusto #gstSigID").val(obj.data[i].gstSigID);//ID siglas

         }
       } 
  })  

    $.ajax({
    url:'../php/gesCurso.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>TÍTULO</th><th><i></i>TIPO</th><th><i></i>INICIO</th><th><i></i>OBSERVACIONES</th><th><i></i>EVALUACIÓN</th></tr></thead><tbody>';
            for(ii=0; ii<res.length;ii++){
            x++;
            if(obj.data[ii].idinsp ==gstIdper){
                if(obj.data[ii].evaluacion=='0'){

                    year = obj.data[ii].fcurso.substring(0,4);
                    month = obj.data[ii].fcurso.substring(5,7);
                    day = obj.data[ii].fcurso.substring(8,10);
                    Finicio = day+'/'+month+'/'+year;

                html +="<tr><td>"+x+"</td><td>"+obj.data[ii].gstTitlo+"</td><td>"+obj.data[ii].gstTipo+"</td><td>"+Finicio+"</td><td>"+obj.data[ii].observ+"</td><td>PENDIENTE</td> </tr>";
                }else if(obj.data[ii].evaluacion=='50'){
                html +="<tr><td>"+x+"</td><td>"+obj.data[ii].gstTitlo+"</td><td>"+obj.data[ii].gstTipo+"</td><td>"+Finicio+"</td><td>"+obj.data[ii].observ+"</td><td>EN PROCESO</td> </tr>";
                }else{}
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#cursos").html(html);  
    })

   $.ajax({
    url:'../php/conEstudios.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 1;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>NOMBRE INSTITUCIÓN</th><th><i></i>CIUDAD</th><th><i></i>PERIODO</th><th><i></i>DOCUMENTACIÓN</th></tr></thead><tbody>';
            for(H=0; H<res.length;H++){
            x++;

            if(obj.data[H].gstIDper ==gstIdper){
              
                datos = obj.data[H].gstIdstd+"*"+obj.data[H].gstIDper+"*"+obj.data[H].gstInstt+"*"+obj.data[H].gstCiuda+"*"+obj.data[H].gstPriod+"*"+obj.data[H].gstDocmt+"*"+obj.data[H].gstIdstd;

                    html +="<tr><td>"+H+"</td><td>"+obj.data[H].gstInstt+"</td><td>"+obj.data[H].gstCiuda+"</td><td> "+obj.data[H].gstPriod+"</td><td><a class='btn btn-default'  href='"+obj.data[H].gstDocmt+"' target='_blanck'><span class='fa fa-file-pdf-o' style='color:#f71505; cursor: pointer;' ></span></a>  <a type='button' onclick='actEstudio("+'"'+datos+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modalestudio'><i class='fa fa-edit text-info'></i></a></td> </tr>";
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#studios").html(html);  
    })
   
   $.ajax({
    url:'../php/conProfesion.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 1;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PUESTO</th><th><i></i>EMPRESA</th><th><i></i>PAÍS</th><th><i></i>CIUDAD</th><th><i></i>ACTIVIDADES</th><th><i></i>FECHA ENTRADA</th><th><i></i>FECHA SALIDA</th><th><i></i>ACCIÓN</th></tr></thead><tbody>';
            for(P=0; P<res.length;P++){
            x++;
                datos = obj.data[P].gstIdpro+"*"+obj.data[P].gstIDper+"*"+obj.data[P].gstPusto+"*"+obj.data[P].gstMpres+"*"+obj.data[P].gstIDpai+"*"+obj.data[P].gstCidua+"*"+obj.data[P].gstActiv+"*"+obj.data[P].gstFntra+"*"+obj.data[P].gstFslda; 
           
            if(obj.data[P].gstIDper ==gstIdper){

                html +="<tr><td>"+P+"</td><td>"+obj.data[P].gstPusto+"</td><td>"+obj.data[P].gstMpres+"</td><td> "+obj.data[P].gstPais+"</td><td> "+obj.data[P].gstCidua+"</td><td> "+obj.data[P].gstActiv+"</td><td> "+obj.data[P].gstFntra+"</td><td> "+obj.data[P].gstFslda+"</td><td> <a type='button' onclick='actPrfsn("+'"'+datos+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modalprofesion'><i class='fa fa-edit text-info'></i></a></td> </tr>";
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#profsions").html(html);  
    })

  $.ajax({
    url:'../php/conEvalu.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 1;


           // html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th><i></i>REQUISITOS</th><th style="width:5%"><i></i>CUMPLE</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
            html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th style="width:5%"><i></i>CUMPLE</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
            for(E=0; E<res.length;E++){
            x++;

            //if(obj.data[E].gstCatga == gstIDCat){

                //if(obj.data[E].gstOrden==1){    
                html +="<input type='hidden' name='gstInspr[]' id='gstInspr' value='"+gstIdper+"'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td><input style='width: 100%' text='number' id='actual' name='actual[]'value='SI' ></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";
                //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                //}
            //}
        } 
        html +='</tbody></table></div>';
        $("#evlacns").html(html);  
    })

}

function seleccionado(){
    var opt = $('#actual').val();
    
   // alert(opt);
    if(opt=="SI"){
        $('#SI').show();
        $('#NO').hide();
        $('#PE').hide();
    }else{
        if(opt=="NO"){
            $('#SI').hide();
            $('#NO').show();
            $('#PE').hide();
        }else if(opt=="PE"){    
        $('#PE').show();            
        $('#SI').hide();
        $('#NO').hide();
        }
    }
}
    

function evaluar(){

var gstInspr = new Array();
$("input[name='gstInspr[]']:hidden").each(function() {
gstInspr.push($(this).val());
});

var gstIdprm = new Array();
$("input[name='gstIdprm[]']:hidden").each(function() {
gstIdprm.push($(this).val());
});
var actual = new Array();
$("input[name='actual[]']:text").each(function() {
actual.push($(this).val());
});

var comntr = new Array();
$("input[name='comntr[]']:text").each(function() {
comntr.push($(this).val());
});


datos = 'gstInspr='+gstInspr+'&gstIdprm='+gstIdprm+'&actual='+actual+'&comntr='+comntr+'&opcion=evaluar';


if(gstInspr== ',,,' || gstIdprm== ',,,' || actual== ',,,' || comntr== ',,,' || comntr== ',,,'){

        $('#empty0').toggle('toggle');
        setTimeout(function(){
        $('#empty0').toggle('toggle');
        },2000); 

        return;
    }else{
$.ajax({
        url:'../php/agrEvalu.php',
        type:'POST',
        data:datos
        }).done(function(respuesta){
            console.log(respuesta);
        if (respuesta==0) {
        $('#succe0').toggle('toggle');
        setTimeout(function(){
        $('#succe0').toggle('toggle');
        },2000);

        document.getElementById('button').disabled='false';
        document.getElementById("button").style.color = "silver";

        }else{
        $('#danger0').toggle('toggle');
        setTimeout(function(){
        $('#danger0').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}


function resultado(result){

 var d=result.split("*");

    gstIdper = d[0];

    $("#Result #evalu_nombre").val(d[1]);
    $("#Result #evalu_categr").val(d[2]);


  $.ajax({
    url:'../php/conResult.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 1;


           // html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th><i></i>REQUISITOS</th><th style="width:5%"><i></i>CUMPLE</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
            html = '<div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th style="width:5%"><i></i>ESTADO</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
            for(E=0; E<res.length;E++){
            x++;

            if(obj.data[E].gstIDins == gstIdper){

                //if(obj.data[E].gstOrden==1){    

                if(obj.data[E].gstCmpli== 'NO'){    
                html +="<input type='hidden' name='gstInspr[]' id='gstInspr' value='"+gstIdper+"'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td><span class='label label-danger'>NO CUMPLE</span></td><td>"+obj.data[E].gstComen+"</td><td><input id='eval' name='eval[]' value='1'> </td></tr>";
                   }else if(obj.data[E].gstCmpli== 'SI'){
                html +="<input type='hidden' name='gstInspr[]' id='gstInspr' value='"+gstIdper+"'/> <tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td><span class='label label-success'>CUMPLIO</span></td><td>"+obj.data[E].gstComen+"</td><td><input id='eval' name='eval[]' value='1'> </td></tr>";                    
                   } 
                //}else{ <span class='label label-warning'>PENDIENTE</span> <span class='label label-success'>CUMPLIO</span> <span class='label label-danger'>NO CUMPLE</span>
                // html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' ><option value='0'></option><option value='SI'>SI</option><option value='NO'>NO</option></select></td><td><span class='label label-warning' id='PE'>PENDIENTE</span> <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span></td><td><input id='comntr' name='comntr[]'> </td><td><input id='eval' name='eval[]' value='1'> </td></tr>";     
                //}
            }
        } 
        html +='</tbody></table></div>';
        $("#rsltad").html(html);  
    })



}



function actEstudio(datos){


/*datos = obj.data[H].gstIdstd
+"*"+obj.data[H].gstIDper
+"*"+obj.data[H].gstInstt
+"*"+obj.data[H].gstCiuda
+"*"+obj.data[H].gstPriod
+"*"+obj.data[H].gstDocmt*/

    var d=datos.split("*");

   // alert(d[0]);
    $("#Actuliza #EgstIDper").val(d[6]);
    $("#Actuliza #EgstInstt").val(d[2]);
    $("#Actuliza #EgstCiudad").val(d[3]);
    $("#Actuliza #EgstPriod").val(d[4]);

//$("#Actuliza #gstpdf").html("<a href='"+d[5]+"' target='_blanck'><span class='icon-file-pdf' style='color:red; font-size:22px;  cursor: pointer;' ></span></a>");
}



function registrar(){


//Datos personales
var gstNombr = document.getElementById('gstNombr').value;
var gstApell = document.getElementById('gstApell').value;
var gstLunac = document.getElementById('gstLunac').value;
var gstFenac = document.getElementById('gstFenac').value;
var gstStcvl = document.getElementById('gstStcvl').value;
var gstCurp  = document.getElementById('gstCurp').value;
var gstRfc   = document.getElementById('gstRfc').value;
var gstNpspr = document.getElementById('gstNpspr').value;
var gstPsvig = document.getElementById('gstPsvig').value;
var gstVisa  = document.getElementById('gstVisa').value;
var gstVignt = document.getElementById('gstVignt').value;
var gstNucrt = document.getElementById('gstNucrt').value;
//Domicilio
var gstCalle = document.getElementById('gstCalle').value;
var gstNumro = document.getElementById('gstNumro').value;
var gstClnia = document.getElementById('gstClnia').value;
var gstCpstl = document.getElementById('gstCpstl').value;
var gstCiuda = document.getElementById('gstCiuda').value;
var gstStado = document.getElementById('gstStado').value;
//Contacto
var gstCasa  = document.getElementById('gstCasa').value;
var gstClulr = document.getElementById('gstClulr').value;
var gstExTel = document.getElementById('gstExTel').value;
//Datos del puesto
var gstNmpld = document.getElementById('gstNmpld').value;
var gstIdpst = document.getElementById('gstIdpst').value;

var gstAreID = document.getElementById('gstAreID').value;
var gstPstID = document.getElementById('gstPstID').value;
var gstSpcID = document.getElementById('gstSpcID').value;
var gstSigID = 0;

var gstCargo = document.getElementById('gstCargo').value;
var gstIDCat = document.getElementById('gstIDCat').value;
var gstIDSub = document.getElementById('gstIDSub').value;
var gstCorro = document.getElementById('gstCorro').value;

var gstCinst = document.getElementById('gstCinst').value;
var gstFeing = document.getElementById('gstFeing').value;

var gstIDara = document.getElementById('gstIDara').value;
var gstAcReg = document.getElementById('gstAcReg').value;
var gstIDuni = document.getElementById('gstIDuni').value;


datos = 'gstNombr='+gstNombr+'&gstApell='+gstApell+'&gstLunac='+gstLunac+'&gstFenac='+gstFenac+'&gstStcvl='+gstStcvl+'&gstCurp='+gstCurp+'&gstRfc='+gstRfc+'&gstNpspr='+gstNpspr+'&gstPsvig='+gstPsvig+'&gstVisa='+gstVisa+'&gstVignt='+gstVignt+'&gstNucrt='+gstNucrt+'&gstCalle='+gstCalle+'&gstNumro='+gstNumro+'&gstClnia='+gstClnia+'&gstCpstl='+gstCpstl+'&gstCiuda='+gstCiuda+'&gstStado='+gstStado+'&gstCasa='+gstCasa+'&gstClulr='+gstClulr+'&gstExTel='+gstExTel+'&gstNmpld='+gstNmpld+'&gstIdpst='+gstIdpst+'&gstAreID='+gstAreID+'&gstPstID='+gstPstID+'&gstSpcID='+gstSpcID+'&gstSigID='+gstSigID+'&gstCargo='+gstCargo+'&gstIDCat='+gstIDCat+'&gstIDSub='+gstIDSub+'&gstCorro='+gstCorro+'&gstCinst='+gstCinst+'&gstFeing='+gstFeing+'&gstIDara='+gstIDara+'&gstAcReg='+gstAcReg+'&gstIDuni='+gstIDuni+'&opcion=registrar';
  
  //alert(datos);

 if(gstNombr=='' || gstApell=='' || gstLunac=='' || gstFenac=='' || gstStcvl=='' || gstCurp =='' || gstRfc  =='' || gstNpspr=='' || gstPsvig=='' || gstVisa =='' || gstVignt=='' || gstNucrt=='' || gstCalle=='' || gstNumro=='' || gstClnia=='' || gstCpstl=='' || gstCiuda=='' || gstStado=='' || gstCasa=='' || gstClulr=='' || gstExTel=='' || gstNmpld=='' || gstIdpst=='' || gstAreID=='' || gstPstID=='' || gstSpcID=='' || gstCargo=='' || gstIDCat=='' || gstIDSub=='' || gstCorro=='' || gstIDara=='' || gstAcReg=='' || gstIDuni=='' || gstCinst=='' || gstFeing==''){

		$('#empty').toggle('toggle');
		setTimeout(function(){
		$('#empty').toggle('toggle');
		},2000); 

		return;
 }else{
		$.ajax({
		url:'../php/regInspc.php',
		type:'POST',
		data:datos
		}).done(function(respuesta){
		if (respuesta==0) {
            //alert(respuesta);
		$('#succe').toggle('toggle');
		setTimeout(function(){
		$('#succe').toggle('toggle');
		},2000);
		}else{
		$('#danger').toggle('toggle');
		setTimeout(function(){
		$('#danger').toggle('toggle');
		},2000);
		}                    
		}); 
     }
}

function actDatos(){

    var gstIdper = document.getElementById('gstIdper').value;
    var gstNombr = document.getElementById('gstNombr').value; // NOMBRE
    var gstApell = document.getElementById('gstApell').value; // APELLIDO
    var gstLunac = document.getElementById('gstLunac').value; // LUGAR DE NACIMIENTO
    var gstFenac = document.getElementById('gstFenac').value; // FECHA DE NACIMIENTO
    var gstStcvl = document.getElementById('gstStcvl').value; // ESTADO CIVIL
    var gstCurp  = document.getElementById('gstCurp').value; //CURP
    var gstRfc   = document.getElementById('gstRfc').value; //RFC
    var gstNpspr = document.getElementById('gstNpspr').value; // NUMERO DE PASAPORTE
    var gstPsvig = document.getElementById('gstPsvig').value; // VIGENCIA DEL PASAPORTE
    var gstVisa  = document.getElementById('gstVisa').value; // PAIS DE LA VISA
    var gstVignt = document.getElementById('gstVignt').value; // VISA VIGENCIA
    var gstNucrt = document.getElementById('gstNucrt').value; // NUMERO DE CARTLLA
    var gstCalle = document.getElementById('gstCalle').value; // CALLE
    var gstNumro = document.getElementById('gstNumro').value; // NUMERO DE DOMICILIO
    var gstClnia = document.getElementById('gstClnia').value; // COLONIA
    var gstCpstl = document.getElementById('gstCpstl').value; // CODIGO POSTAL
    var gstCiuda = document.getElementById('gstCiuda').value; // CUIDAD
    var gstStado = document.getElementById('gstStado').value; // ESTADO
    var gstCasa  = document.getElementById('gstCasa').value; // NUM. DE CASA
    var gstClulr = document.getElementById('gstClulr').value; // NUM. DE CELULAR
    var gstExTel = document.getElementById('gstExTel').value; // NUM. DE EXTENCION

       datos = 'gstIdper='+gstIdper+'&gstNombr='+gstNombr+'&gstApell='+gstApell+'&gstLunac='+gstLunac+'&gstFenac='+gstFenac+'&gstStcvl='+gstStcvl+'&gstCurp='+gstCurp+'&gstRfc='+gstRfc+'&gstNpspr='+gstNpspr+'&gstPsvig='+gstPsvig+'&gstVisa='+gstVisa+'&gstVignt='+gstVignt+'&gstNucrt='+gstNucrt+'&gstCalle='+gstCalle+'&gstNumro='+gstNumro+'&gstClnia='+gstClnia+'&gstCpstl='+gstCpstl+'&gstCiuda='+gstCiuda+'&gstStado='+gstStado+'&gstCasa='+gstCasa+'&gstClulr='+gstClulr+'&gstExTel='+gstExTel+'&opcion=actualizar'

     if(gstNombr== '' || gstApell== '' || gstLunac== '' || gstFenac== '' || gstStcvl== '' || gstCurp == '' || gstRfc  == '' || gstNpspr== '' || gstPsvig== '' || gstVisa == '' || gstVignt== '' || gstNucrt== '' || gstCalle== '' || gstNumro== '' || gstClnia== '' || gstCpstl== '' || gstCiuda== '' || gstStado== '' || gstCasa == '' || gstClulr== '' || gstExTel == ''){

        $('#empty').toggle('toggle');
        setTimeout(function(){
        $('#empty').toggle('toggle');
        },2000); 

        return;

 }else{
        $.ajax({
        url:'../php/regInspc.php',
        type:'POST',
        data: datos
        }).done(function(respuesta){
        if (respuesta==0) {
        $('#succe').toggle('toggle');
        setTimeout(function(){
        $('#succe').toggle('toggle');
        },2000);
        }else{
        $('#danger').toggle('toggle');
        setTimeout(function(){
        $('#danger').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}

function actPuesto(){

    var pstIdper = document.getElementById('gstIdper').value;
    var gstNmpld = document.getElementById('gstNmpld').value;
    var gstIdpst = document.getElementById('gstIdpst').value;
    var gstCargo = document.getElementById('gstCargo').value;
    var gstIDCat = document.getElementById('gstIDCat').value;
    //var gstIDSub = document.getElementById('gstIDSub').value;
    var gstCorro = document.getElementById('gstCorro').value;
    var gstCinst = document.getElementById('gstCinst').value;
    var gstFeing = document.getElementById('gstFeing').value;
    var gstIDuni = document.getElementById('gstIDuni').value;
    var gstIDSub = 7;
           datos = 'pstIdper='+pstIdper+'&gstNmpld='+gstNmpld+'&gstIdpst='+gstIdpst+'&gstCargo='+gstCargo+'&gstIDCat='+gstIDCat+'&gstIDSub='+gstIDSub+'&gstCorro='+gstCorro+'&gstCinst='+gstCinst+'&gstFeing='+gstFeing+'&gstIDuni='+gstIDuni+'&opcion=actPrsnls';

//alert(datos);
     if(pstIdper=='' || gstNmpld=='' || gstIdpst=='' || gstCargo=='' || gstIDCat=='' || gstIDSub=='' || gstCorro=='' || gstCinst=='' || gstFeing=='' || gstIDuni==''){

        $('#empty1').toggle('toggle');
        setTimeout(function(){
        $('#empty1').toggle('toggle');
        },2000); 

        return;

 }else{
        $.ajax({
        url:'../php/regInspc.php',
        type:'POST',
        data: datos
        }).done(function(respuesta){

            console.log(respuesta);
        if (respuesta==0) {
        $('#succe1').toggle('toggle');
        setTimeout(function(){
        $('#succe1').toggle('toggle');
        },2000);
        }else{
        $('#danger1').toggle('toggle');
        setTimeout(function(){
        $('#danger1').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}


function openEdit(){
	$("#buton").toggle(100);
    $("#butons").toggle(100);
//Habilita los campos INICIO
    document.getElementById('gstNombr').disabled=false; // NOMBRE
    document.getElementById('gstApell').disabled=false; // APELLIDO
    document.getElementById('gstLunac').disabled=false; // LUGAR DE NACIMIENTO
    document.getElementById('gstFenac').disabled=false; // FECHA DE NACIMIENTO
    document.getElementById('gstStcvl').disabled=false; // ESTADO CIVIL
    document.getElementById('gstCurp').disabled=false; //CURP
    document.getElementById('gstRfc').disabled=false; //RFC
    document.getElementById('gstNpspr').disabled=false; // NUMERO DE PASAPORTE
    document.getElementById('gstPsvig').disabled=false; // VIGENCIA DEL PASAPORTE
    document.getElementById('gstVisa').disabled=false; // PAIS DE LA VISA
    document.getElementById('gstVignt').disabled=false; // VISA VIGENCIA
    document.getElementById('gstNucrt').disabled=false; // NUMERO DE CARTLLA
    document.getElementById('gstCalle').disabled=false; // CALLE
    document.getElementById('gstNumro').disabled=false; // NUMERO DE DOMICILIO
    document.getElementById('gstClnia').disabled=false; // COLONIA
    document.getElementById('gstCpstl').disabled=false; // CODIGO POSTAL
    document.getElementById('gstStado').disabled=false; // CUIDAD
    document.getElementById('gstCasa').disabled=false; // NUM. DE CASA
    document.getElementById('gstClulr').disabled=false; // NUM. DE CELULAR
    document.getElementById('gstExTel').disabled=false; // NUM. DE EXTENCION
    document.getElementById('gstCiuda').disabled=false; // CUIDAD

//------ DATOS DEL PUESTO
    document.getElementById('gstNmpld').disabled=false; // NUM. DE EMPLEADO
    document.getElementById('gstIdpst').disabled=false; // NUM. DE EMPLEADO
    document.getElementById('gstCargo').disabled=false;
    document.getElementById('gstIDCat').disabled=false;
    //document.getElementById('gstIDSub').disabled=false;
    document.getElementById('gstCorro').disabled=false;
    document.getElementById('gstCinst').disabled=false;
    document.getElementById('gstFeing').disabled=false;
    document.getElementById('gstIDuni').disabled=false;
    
    document.getElementById('gstAreID').disabled=false;//ID área
    document.getElementById('gstPstID').disabled=false;//ID puesto
    document.getElementById('gstSpcID').disabled=false;//ID especialidad
    document.getElementById('gstSigID').disabled=false;//ID siglas
    document.getElementById('gstIDara').disabled=false;//ID del área

//.../Habilita los campos FIN
}

function asignar(){
    var gstIdper = document.getElementById('gstIdper').value;
    var AgstCargo = document.getElementById('AgstCargo').value;
    var AgstIDCat = document.getElementById('AgstIDCat').value;
    var AgstIDSub = document.getElementById('AgstIDSub').value;
    var AgstIDuni = document.getElementById('AgstIDuni').value;

    datas = 'gstIdper='+gstIdper+'&AgstCargo='+AgstCargo+'&AgstIDCat='+AgstIDCat+'&AgstIDSub='+AgstIDSub+'&AgstIDuni='+AgstIDuni+'&opcion=asignar';

    //alert(datas);

   if(AgstCargo == '' || AgstIDCat == '' || AgstIDSub == '' || AgstIDuni==''){

        $('#empty2').toggle('toggle');
        setTimeout(function(){
        $('#empty2').toggle('toggle');
        },2000); 

        return;
 }else{
        $.ajax({
        url:'../php/agrEvalu.php',
        type:'POST',
        data:datas
        }).done(function(respuesta){
        if (respuesta==0) {

        $('#succe2').toggle('toggle');
        setTimeout(function(){
        $('#succe2').toggle('toggle');
         location.href='inspecion.php';
        },2500);

         
        }else{
        $('#danger2').toggle('toggle');
        setTimeout(function(){
        $('#danger2').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}

