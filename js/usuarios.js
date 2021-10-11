function enviarCorreo(){

	correo = document.getElementById('correo').value;
	if(correo!=''){
    $.ajax({
        url: 'php/conCorreo.php',
        type: 'POST',
        data: 'correo='+correo
    }).done(function(respuesta) {
    	alert(respuesta);
        if (respuesta == 0) {
            // $('#succe4').toggle('toggle');
            // setTimeout(function() {
            //     $('#succe4').toggle('toggle');
            // }, 2000);   conprofesion(ActIdpro);
        } else if(respuesta==1){
            // $('#danger4').toggle('toggle');
            // setTimeout(function() {
            //     $('#danger4').toggle('toggle');
            // }, 2000);
        } else if(respuesta==2){
            // $('#danger4').toggle('toggle');
            // setTimeout(function() {
            //     $('#danger4').toggle('toggle');
            // }, 2000);        	
        }
    });
}else{	    // $('#danger4').toggle('toggle');
			// setTimeout(function() {
			//     $('#danger4').toggle('toggle');
			// }, 2000);        	
}
}
		
var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "Se han guardado los cambios correctamente.";
color = "#379911";
}else if( informacion.respuesta == "ERROR"){
texto = "<strong>Error</strong>, no se ejecutó la consulta.";
color = "#C9302C";
}else if( informacion.respuesta == "EXISTE" ){
texto = "<strong>Información!</strong> el correo ya existe.";
color = "#5b94c5";
}else if( informacion.respuesta == "VACIO" ){
texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
color = "#ddb11d";
}else if(informacion.respuesta == "OPCION_VACIA"){
texto = "<strong>Advertencia!</strong>la opción no existe o esta vacia, recarge la pagina.";
color = "#ddb11d";
}


$(".mensaje").html( texto ).css({"color": color });
$('.mensaje').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$('.mensaje').fadeOut('slow');
},2000);

}
//limpiar los input text
var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#id_usuario").val("");
$("#nombre").val("").focus();
$("#apellidos").val("");
$("#idarea").val("");
$("#extension").val("");
$("#correo").val("");
$("#ubicacion").val("");
$("#n_empleado").val("");
}		

		var traduccion = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
