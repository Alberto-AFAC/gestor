 function openConteiner(){
    $("#Fregist").slideDown(250);//Muestra contenedor registro
    $("#list").slideUp("fast");//Oculta lista
   // listar_area();
}
function closeConteiner(){
  //  $("#Fregist").slideUp("fast");//Oculta contenedor registro
//    $("#list").slideDown(250);//Muestra lista
}
function openDet1(){
    $("#det1").slideDown(250);//Muestra contenedor detalles 1
    $("#list").slideUp("fast");//Oculta lista
}
function closeDet1(){
    $("#det1").slideUp("fast");//Oculta contenedor detalles 1
    $("#list").slideDown(250);//Muestra lista
}
function openDet2(){
    $("#det2").slideDown(250);//Muestra contenedor detalles 2
    $("#datos").slideUp("fast");//Oculta contenedor detalles 1
   // $("#list").slideUp("fast");
}
function closeDet2(){
    $("#det2").slideUp("fast");//Oculta contenedor detalles 2
   $("#datos").slideDown(250);//Muestra contenedor detalles 1
  //$("#list").slideDown(250);//Muestra lista
}
function openEdt1(){
  $("#edt1").slideDown(250);//Muestra contenedor editar 1
  $("#list").slideUp("fast");//Oculta lista
}
function closeEdt1(){
    $("#list").slideDown(250);//Oculta lista  
    $("#edt1").slideUp("fast");//Oculta contenedor editar 1
}