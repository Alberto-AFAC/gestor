
    //destroy:true,
    $.ajax({
    url:'../php/conPerson.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var personas = 0;
        var inspectores=0;
        var instructor=0;
        var coordinador=0;
        var total = 0;
        for(i=0; i<res.length;i++){
        
         if(obj.data[i].gstCargo=='INSPECTOR' || obj.data[i].gstCargo=='DIRECTOR' ){
            inspectores++;    
        }else if(obj.data[i].gstCargo=='INSTRUCTOR'){
            instructor++;
        }else if(obj.data[i].gstCargo=='COORDINADOR'){
            coordinador++;
        }else if(obj.data[i].gstIDCat == '0' && obj.data[i].gstIDSub == '0'){  
            personas++;
            }
            total++;

        } 

        $("#persona").html(total); 
        $("#inspectores").html(inspectores); 
        $("#instructor").html(instructor);
        $("#coordinador").html(coordinador); 
});


var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var fecha_actual = years.getFullYear();
document.getElementById("fecha").innerHTML = ""+'<b>CURSOS AÑO '+fecha_actual+'</b>';
 


