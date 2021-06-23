
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
        } 

        $("#persona").html(personas); 
        $("#inspectores").html(inspectores); 
        $("#instructor").html(instructor);
        $("#coordinador").html(coordinador); 
});


var years = new Date();
//var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var fecha_actual = years.getFullYear();
document.getElementById("fecha").innerHTML = ""+'<b>CURSOS AÑO '+fecha_actual+'</b>';
 


// $.ajax({
//     url:'../php/conYears.php',
//     type:'POST'
//     }).done(function(resp){
//         obj = JSON.parse(resp);
//         var res = obj.data; 

//         var years = 0;

//         for(i=0; i<res.length;i++){
        
//             year = obj.data[i].start.substring(0,4);
            

//             for(val= '2020'; val>year; val++){

//                 //alert(val);
//                 if(year ==val){
//                 years++;    
//                 }
//             }

//         } 
            //alert(years);
        // $("#persona").html(personas); 
        // $("#inspectores").html(inspectores); 
        // $("#instructor").html(instructor);
        // $("#coordinador").html(coordinador); 
//});
