function conPrsnl(){
    //destroy:true,
    $.ajax({
    url:'../php/consulta.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="prsnl" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th style="width:5%;"><i class="fa fa-sort-numeric-asc"></i>N°</th><th><i></i> Nombre</th><th><i></i> Apellidos</th><th style="width:20%" ><i></i>Acción</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;

            gstIdper = obj.data[i].gstIdper+'*'+obj.data[i].gstIDCat;

           // if(obj.data[i].gstCargo=='ENLACE'){

            //if(obj.data[i].gstIDCat == '0' && obj.data[i].gstIDSub == '0'){                    

            html +="<tr><td>"+obj.data[i].gstNmpld+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td> <a type='button' onclick='inspector("+'"'+gstIdper+'"'+")' class='btn btn-danger' data-toggle='modal' data-target='#modal-asignar'>ASIGNAR</a> <a type='button' onclick='estudio("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' onclick='profesion("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";
              //  }else{
           // html +="<tr><td>"+obj.data[i].gstNmpld+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td> <a href='javascript:openDtlls()' onclick='inspector("+'"'+gstIdper+'"'+")' class='datos btn btn-warning'>EVALUAR</a> <a type='button' onclick='estudio("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' onclick='profesion("+'"'+gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";                    
              //  }

           // }else{}
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


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="cnslt" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> Nombre</th><th><i></i> Apellidos</th><th style="width:14%" ><i></i>Acción</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;

            if(obj.data[i].gstCargo=='INSPECTOR'){
            html +="<tr><td>"+x+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td> <a href='javascript:openDtlls()' onclick='inspector("+'"'+obj.data[i].gstIdper+'"'+")' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' onclick='estudio("+'"'+obj.data[i].gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' onclick='profesion("+'"'+obj.data[i].gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";
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
}
//muestra ventana estudios
function estudio(gstIdper){
    $("#gstIDper").val(gstIdper);   
}


function agrStudio(){

var paqueteDeDatos = new FormData();
paqueteDeDatos.append('gstDocmt', $('#gstDocmt')[0].files[0]);
paqueteDeDatos.append('gstIDper', $('#gstIDper').prop('value'));
paqueteDeDatos.append('gstInstt', $('#gstInstt').prop('value'));
paqueteDeDatos.append('gstCiuda', $('#gstCiuda').prop('value'));
paqueteDeDatos.append('gstPriod', $('#gstPriod').prop('value'));
paqueteDeDatos.append('agrEstudio', $('#agrEstudio').prop('value'));
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
                    $('#vacio').slideDown('slow');
                    setTimeout(function(){
                    $('#vacio').slideUp('slow');
                    },4000);
                           
                    }else if(r==0){      
                    $('#exito').toggle('toggle');
                    setTimeout(function(){
                    $('#exito').toggle('toggle');
                    },4000);
 
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


function profesion(gstIdper){
    $("#gstIDper").val(gstIdper); 
}

function agrProfsn(){

    var gstIDper = document.getElementById('gstIDper').value; 
    var gstPusto = document.getElementById('gstPusto').value; 
    var gstMpres = document.getElementById('gstMpres').value; 
    var gstIDpai = document.getElementById('gstIDpai').value; 
    var gstCidua = document.getElementById('gstCidua').value; 
    var gstActiv = document.getElementById('gstActiv').value; 
    var gstFntra = document.getElementById('gstFntra').value; 
    var gstFslda = document.getElementById('gstFslda').value; 

        datas = 'gstIDper='+gstIDper+'&gstPusto='+gstPusto+'&gstMpres='+gstMpres+'&gstIDpai='+gstIDpai+'&gstCidua='+gstCidua+'&gstActiv='+gstActiv+'&gstFntra='+gstFntra+'&gstFslda='+gstFslda+'&opcion=agrProfsn';

    if(gstIDper== '' ||gstPusto== '' ||gstMpres== '' ||gstIDpai== '' ||gstCidua== '' ||gstActiv== '' ||gstFntra== '' ||gstFslda== ''){

        $('#empty2').toggle('toggle');
        setTimeout(function(){
        $('#empty2').toggle('toggle');
        },2000); 

        return;
    }else{
        $.ajax({
        url:'../php/regInspc.php',
        type:'POST',
        data:datas
        }).done(function(respuesta){
        if (respuesta==0) {
        $('#succe2').toggle('toggle');
        setTimeout(function(){
        $('#succe2').toggle('toggle');
        },2000);
        }else{
        $('#danger2').toggle('toggle');
        setTimeout(function(){
        $('#danger2').toggle('toggle');
        },2000);
        }                    
        }); 
    }
}
function inspector(gstIdper){

    var d=gstIdper.split("*");

    gstIdper = d[0];
    gstIDCat = d[1];
    alert(gstIdper);
    alert(gstIDCat);

$.ajax({
url:'../php/consulta.php',
type:'POST'
}).done(function(resp){
    obj = JSON.parse(resp);
    var res = obj.data;  

        for(i=0; i<res.length;i++){

            if(obj.data[i].gstIdper == gstIdper){
  //              alert(obj.data[i].gstIdper);

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

        $("#Pusto #gstNmpld").val(obj.data[i].gstNmpld);
        $("#Pusto #gstIdpst").val(obj.data[i].gstIdpst);
        $("#Pusto #gstCargo").val(obj.data[i].gstCargo);
        $("#Pusto #gstIDCat").val(obj.data[i].gstIDCat);
        $("#Pusto #gstIDSub").val(obj.data[i].gstIDSub);
        $("#Pusto #gstCorro").val(obj.data[i].gstCorro);
        $("#Pusto #gstIDara").val(obj.data[i].gstIDara);
        $("#Pusto #gstAcReg").val(obj.data[i].gstAcReg);
        $("#Pusto #gstIDuni").val(obj.data[i].gstIDuni);
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


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>Título</th><th><i></i>Tipo</th><th><i></i>Inicio</th><th><i></i>Observaciones</th><th><i></i>Evaluación</th></tr></thead><tbody>';
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


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="estudio" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>Nombre institución</th><th><i></i>Ciudad</th><th><i></i>Periodo</th><th><i></i>Documentación</th></tr></thead><tbody>';
            for(H=0; H<res.length;H++){
            x++;

            if(obj.data[H].gstIDper ==gstIdper){
                datos = 
                obj.data[H].gstIdstd+"*"+
                obj.data[H].gstIDper+"*"+
                obj.data[H].gstInstt+"*"+
                obj.data[H].gstCiuda+"*"+
                obj.data[H].gstPriod+"*"+
                obj.data[H].gstDocmt;
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


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="profesion" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>Puesto</th><th><i></i>Emprsa</th><th><i></i>Pais</th><th><i></i>Ciudad</th><th><i></i>Actividades</th><th><i></i>Fecha entrada</th><th><i></i>Fecha salida</th><th><i></i>Acción</th></tr></thead><tbody>';
            for(P=0; P<res.length;P++){
            x++;

            if(obj.data[P].gstIDper ==gstIdper){

                html +="<tr><td>"+P+"</td><td>"+obj.data[P].gstPusto+"</td><td>"+obj.data[P].gstMpres+"</td><td> "+obj.data[P].gstPais+"</td><td> "+obj.data[P].gstCidua+"</td><td> "+obj.data[P].gstActiv+"</td><td> "+obj.data[P].gstFntra+"</td><td> "+obj.data[P].gstFslda+"</td><td>  <a type='button' onclick='profesion("+'"'+obj.data[P].gstIdpro+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-edit text-info'></i></a></td> </tr>";
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


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>PARAMETROS</th><th><i></i>OBJETIVO</th><th style="width:5%"><i></i>ACTUAL</th><th style="width:5%"><i></i>CUMPLIO</th><th><i></i>COMENTARIOS</th><th><i></i>EVALUADOR</th></tr></thead><tbody>';
            for(E=0; E<res.length;E++){
            x++;

            if(obj.data[E].gstCatga == gstIDCat){

                html +="<tr><input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/><td>"+obj.data[E].gstOrden+"</td><td>"+obj.data[E].gstPrmtr+"</td><td>"+obj.data[E].gstObjtv+"</td><td> <input style='width:100%' type='text' id='actual' name='actual[]'></td><td><span class='label label-warning'>PENDIENTE</span></td><td><input id='' name=''> </td><td><input id='' name=''> </td></tr>";
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#evlacns").html(html);  
    })

}

function evaluar(){

var gstIdprm = new Array();
$("input[name='gstIdprm[]']:hidden").each(function() {
gstIdprm.push($(this).val());
});
var actual = new Array();
$("input[name='actual[]']:text").each(function() {
actual.push($(this).val());
});

datos = 'gstIdprm='+gstIdprm+'&actual='+actual+'&opcion=evaluar';

$.ajax({
        url:'../php/agrEvalu.php',
        type:'POST',
        data:datos
        }).done(function(respuesta){
        if (respuesta==0) {
        $('#succe1').toggle('toggle');
        setTimeout(function(){
        $('#succe1').toggle('toggle');
        },2000);
        }else{
        $('#danger').toggle('toggle');
        setTimeout(function(){
        $('#danger').toggle('toggle');
        },2000);
        }                    
        }); 

}


function actEstudio(datos){

    var d=datos.split("*");
    $("#Actuliza #actIDper").val(d[0]);
    $("#Actuliza #actInstt").val(d[2]);
    $("#Actuliza #actCiuda").val(d[3]);
    $("#Actuliza #actPriod").val(d[4]);

//     $("#Actuliza #pdf").html("<a href='"+d[5]+"' target='_blanck'><span class='icon-file-pdf' style='color:#f71505; font-size:22px;  cursor: pointer;' ></span></a>");
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
var gstCargo = document.getElementById('gstCargo').value;
var gstIDCat = document.getElementById('gstIDCat').value;
var gstIDSub = document.getElementById('gstIDSub').value;
var gstCorro = document.getElementById('gstCorro').value;
var gstIDara = document.getElementById('gstIDara').value;
var gstAcReg = document.getElementById('gstAcReg').value;
var gstIDuni = document.getElementById('gstIDuni').value;

datos = 'gstNombr='+gstNombr+'&gstApell='+gstApell+'&gstLunac='+gstLunac+'&gstFenac='+gstFenac+'&gstStcvl='+gstStcvl+'&gstCurp='+gstCurp+'&gstRfc='+gstRfc+'&gstNpspr='+gstNpspr+'&gstPsvig='+gstPsvig+'&gstVisa='+gstVisa+'&gstVignt='+gstVignt+'&gstNucrt='+gstNucrt+'&gstCalle='+gstCalle+'&gstNumro='+gstNumro+'&gstClnia='+gstClnia+'&gstCpstl='+gstCpstl+'&gstCiuda='+gstCiuda+'&gstStado='+gstStado+'&gstCasa='+gstCasa+'&gstClulr='+gstClulr+'&gstExTel='+gstExTel+'&gstNmpld='+gstNmpld+'&gstIdpst='+gstIdpst+'&gstCargo='+gstCargo+'&gstIDCat='+gstIDCat+'&gstIDSub='+gstIDSub+'&gstCorro='+gstCorro+'&gstIDara='+gstIDara+'&gstAcReg='+gstAcReg+'&gstIDuni='+gstIDuni+'&opcion=registrar';
  
 if(gstNombr=='' || gstApell=='' || gstLunac=='' || gstFenac=='' || gstStcvl=='' || gstCurp =='' || gstRfc  =='' || gstNpspr=='' || gstPsvig=='' || gstVisa =='' || gstVignt=='' || gstNucrt=='' || gstCalle=='' || gstNumro=='' || gstClnia=='' || gstCpstl=='' || gstCiuda=='' || gstStado=='' || gstCasa=='' || gstClulr=='' || gstExTel=='' || gstNmpld=='' || gstIdpst=='' || gstCargo=='' || gstIDCat=='' || gstIDSub=='' || gstCorro=='' || gstIDara=='' || gstAcReg=='' || gstIDuni==''){

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


function openEdit(){
	$("#buton").toggle(100);
    $("#butons").toggle(100);
//	document.getElementById('nombre').disabled='true';
}

function actualizar(){

var idusua = document.getElementById('idusua').value;
var nombre=document.getElementById('nombre').value;
var apellidos=document.getElementById('apellidos').value;
var ext_telf = document.getElementById('ext_telf').value;
var correo=document.getElementById('correo').value;
var cargo=document.getElementById('cargo').value;
var id_area=document.getElementById('id_area').value;
var idpuesto=document.getElementById('idpuesto').value;
var unidad=document.getElementById('unidad').value;
var idubicacion=document.getElementById('idubicacion').value;
var n_empleado=document.getElementById('n_empleado').value;

 datos = nombre+'*'+apellidos+'*'+ext_telf+'*'+correo+'*'+cargo+'*'+id_area+'*'+idpuesto+'*'+unidad+'*'+idubicacion+'*'+n_empleado;

 if(nombre =='' || apellidos =='' || ext_telf=='' || correo=='' || cargo=='' || id_area== '' || idpuesto=='' ||unidad=='' || idubicacion=='' || n_empleado==''){


		$('#empty').toggle('toggle');
		setTimeout(function(){
		$('#empty').toggle('toggle');
		},2000); 

		return;

 }else{
		$.ajax({
		url:'../php/regInspc.php',
		type:'POST',
		data: 'idusua='+idusua+'&nombre='+nombre+'&apellidos='+apellidos+'&ext_telf='+ext_telf+'&correo='+correo+'&cargo='+cargo+'&id_area='+id_area+'&idpuesto='+idpuesto+'&unidad='+unidad+'&idubicacion='+idubicacion+'&n_empleado='+n_empleado+'&opcion=actualizar'
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

