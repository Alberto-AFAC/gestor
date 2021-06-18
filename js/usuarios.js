var listar_usuario = function(){
		//para mostrar las tablas del formulario
		//$("#cuadro5").hide("slow");
		$("#cuadro4").hide("slow");
		$("#cuadro3").hide("slow");
		$("#cuadro2").hide("slow");
		$("#cuadro1").slideDown("slow");
		//variable = identificador)funcion.DataTable
		var table = $("#usuario").DataTable({
			//aceptara la actualizacion de reiniciar la tabla de datos/ al registrar un correo se mostrar. si no colocamos la propiedad nos causaria problemas 
			"destroy":true,
			"ajax":{
//				"contentType":"application/json; charset=utf-8",
				//atributo 
				"method":"POST",
				//mencionmos la plantilla para que mustre la lista
				"url":"../../php/listar_usuarios.php"
			},
			//se va mostrar las columnas con las cuales vamos a trabajar 
			"columns":[
			//data que se menciona para que se pueda mostrar los registros de droma ordenada
			{"data":"id_usuario"},
			{"data":"nombre"},
			{"data":"apellidos"},
			{"data":"adscripcion"},
//			{"data":"extension"},
//			{"data":"correo"},
//			{"data":"ubicacion"},
			/*{"data":"n_empleado"},*/

			//vamos a crear botones para realizar las acciones.colocamos en estrctura un ,<th></th>
			{"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalEditar' class='editar btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></button>   <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash-o text-danger'></i></button>   <button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></button>"}
			],
			//<button type='button' data-toggle='modal' data-target='#modalEditar' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>   <button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash-o'></i></button>   <button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-warning'><i class='glyphicon glyphicon-user'></i></button>
			//creamos una variable
			"language":traduccion,

		});
			//llamando la funcion obtener data editar dentro de la funcion porque tenemos nuestro table, colocamos el identificador y hacemos referencia del tbody
			datos_editar("#usuario tbody",table);
			datos_eliminar("#usuario tbody",table);
			datos_detalles("#usuario tbody", table);
	}

//regustrando al usuario de lado del administrador
function registrar(){
	var nombre=document.getElementById('nombre').value;
	var apellidos=document.getElementById('apellidos').value;
	var id_area=document.getElementById('id_area').value;
	var extension=document.getElementById('extension').value;
	var correo=document.getElementById('correo').value;
	var ubicacion=document.getElementById('ubicacion').value;
	var n_empleado = document.getElementById('n_empleado').value;
	var id_cargo = document.getElementById('id_cargo').value;

	if(nombre=='' || apellidos=='' || id_area == '' || extension == '' || correo=='' || ubicacion=='' || n_empleado=='' || id_cargo == ''){

		$('#aviso_vacio').slideDown('slow');
		setTimeout(function(){
		$('#aviso_vacio').slideUp('slow');
		},2000); 

		return;
		}else{
		var nombre=$('#nombre').val();
		var apellidos=$('#apellidos').val();
		var id_area=$('#id_area').val();
		var extension=$('#extension').val();
		var correo=$('#correo').val();
		var ubicacion=$('#ubicacion').val();
		var n_empleado=$('#n_empleado').val();
		var id_cargo=$('#id_cargo').val();          

				$.ajax({
				url:'../../php/usuarios.php',
				type:'POST',
				data:'nombre='+nombre+'&apellidos='+apellidos+'&id_area='+id_area+'&extension='+extension+'&correo='+correo+'&ubicacion='+ubicacion+'&n_empleado='+n_empleado+'&id_cargo='+id_cargo+'&opcion=registrar'
				}).done(function(respuesta){
				if (respuesta==0) {
				$('#exito').slideDown('slow');
				setTimeout(function(){
				$('#exito').slideUp('slow');
				},2000);
		}else{
				$('#danger').slideDown('slow');
				setTimeout(function(){
				$('#danger').slideUp('slow');
				},2000);
			}                    
		});       
	}
}

		//creando la funcion modificar 
	
	function modificar(){

  var frm=$("#frmEditar").serialize();
    console.log(frm);

    $.ajax({
        url:"../../php/usuarios.php",
        type:'POST',
        data:frm+"&opcion=modificar"
    }).done(function(respuesta){
    	console.log(respuesta);
        if(respuesta==0)
        {         
				$('#echo').slideDown('slow');
				setTimeout(function(){
				$('#echo').slideUp('slow');
				},2000);

        }else if(respuesta==1){
       
				$('#vacio').slideDown('slow');
				setTimeout(function(){
				$('#vacio').slideUp('slow');
				},2000);            
       
        }else if(respuesta==2){

        		$('#error').slideDown('slow');
        			setTimeout(function(){
        				$('#error').slideUp('slow');
        			},2000);
        	}
    });

	}

//Usuario registrándose 
function registrarse(){
	var nombre=document.getElementById('nombre').value;
	var apellidos=document.getElementById('apellidos').value;
	var id_area=document.getElementById('id_area').value;
	var extension=document.getElementById('extension').value;
	var correo=document.getElementById('correo').value;
	var ubicacion=document.getElementById('ubicacion').value;
	var n_empleado = document.getElementById('n_empleado').value;
	var id_cargo = document.getElementById('id_cargo').value;
		
		if(nombre=='' || apellidos=='' || id_area == '' || extension == '' || correo=='' || ubicacion=='' || n_empleado=='' || id_cargo == ''){

				$('#aviso_vacio').slideDown('slow');
				setTimeout(function(){
				$('#aviso_vacio').slideUp('slow');
				},2000); 
					return;
			}else{
				var nombre=$('#nombre').val();
				var apellidos=$('#apellidos').val();
				var id_area=$('#id_area').val();
				var extension=$('#extension').val();
				var correo=$('#correo').val();
				var ubicacion=$('#ubicacion').val();
				var n_empleado=$('#n_empleado').val();
				var id_cargo=$('#id_cargo').val();
				$("#usua").val(n_empleado);

			$.ajax({
				url:'php/usuarios.php',
				type:'POST',
				data:'nombre='+nombre+'&apellidos='+apellidos+'&id_area='+id_area+'&extension='+extension+'&correo='+correo+'&ubicacion='+ubicacion+'&n_empleado='+n_empleado+'&id_cargo='+id_cargo+'&opcion=registrar'
			}).done(function(respuesta){
					if (respuesta==0) {
					$('#exito').slideDown('slow');
					setTimeout(function(){
					$('#exito').slideUp('slow');
					document.getElementById('btn__tecnicosesion').disabled='false';
					document.getElementById("btn__tecnicosesion").style.color = "silver";
			},2000);
				}else{
					$('#danger').slideDown('slow');
					setTimeout(function(){
					$('#danger').slideUp('slow');
				},2000);
			}                    
		});       
	}
}

function datos_detalles(tbody, table){

	$(tbody).on("click", "button.detalle", function(){			
			var data = table.row($(this).parents("tr")).data();
			console.log(data);
			var id_usuario = $("#frmDetalles #id_usuario").val(data.id_usuario),
			    nombre = $("#frmDetalles #nombre").val(data.nombre),
			    apellidos = $("#frmDetalles #apellidos").val(data.apellidos),
			    correo = $("#frmDetalles #correo").val(data.correo),
			    adscripcion = $("#frmDetalles #adscripcion").val(data.adscripcion),
			    extension = $("#frmDetalles #extension").val(data.extension),
			    n_empleado = $("#frmDetalles #n_empleado").val(data.n_empleado);		
		
		$("#cuadro1").hide("slow");
		$("#cuadro4").slideDown("slow");

	});
}

var datos_eliminar = function(tbody, table){
		$(tbody).on("click", "button.eliminar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			//console.log(data);
			var id_usuario = $("#EliminarUsuario #id_usuario").val(data.id_usuario);
				//nombre = $("#frmEliminarcorreo #nombre").val(data.nombre);				
		});
	}
	
	var eliminar_usuario = function(){
	//para realiza el evento del clic del boton
		$("#eliminar-usuario").on("click", function(){
			var id_usuario= $("#EliminarUsuario #id_usuario").val(),
			        opcion = $("#EliminarUsuario #opcion").val();

		  $.ajax({
		  	 method: "POST",
		  	 url: "../../php/usuarios.php",
		  	 data: {"id_usuario":id_usuario,"opcion": opcion}
		  	}).done(function(info){
		  			var json_info = JSON.parse(info); 
				mostrar_mensaje(json_info);
				limpiar_datos();			
				listar_usuario();
		});
	});	
}

	var RegistrarUsu = function(){
		limpiar_datos();
		$("#cuadro2").slideDown("slow");
			$("#cuadro1").hide("slow");
	}

	//funciones para obtener los datos. tendra dos parametros 
	var datos_editar = function(tbody, table){
	//al darle clicl al boton editar va desencadenar la funcion 
		$(tbody).on("click", "button.editar", function(){
		//el metodo row nos va dar el dato de cada fila	.. parets nos retorna todos los antesesores al metodo selecionado, en esta caso el metodso seleccionado es el boton pero antes de el esta un dt y antes esta un tr en este caso pasamos por parametro al tr que nos va devolver los data de esa fila
			var data = table.row( $(this).parents("tr") ).data();
				//console.log(data);///colocnado esta linea podremos ver desde la consola que datos nos etsa areojando
			//colocamos las variable de esta manera idenfificador, para mostrar los valores en el formulario.data nos permite costrar como objeto las variables.
			var id_usuario = $("#frmEditar #id_usuario").val(data.id_usuario),
				    nombre = $("#frmEditar #nombre").val(data.nombre),
				 apellidos = $("#frmEditar #apellidos").val(data.apellidos),
				   id_area = $("#frmEditar #idarea").val(data.id_area),
				 extension = $("#frmEditar #extension").val(data.extension),
				  correo = $("#frmEditar #correo").val(data.correo),
				    ubicacion = $("#frmEditar #ubicacion").val(data.ubicacion)
				    orden = $("#frmEditar #orden").val(data.orden),

				       n_empleado = $("#frmEditar #n_empleado").val(data.n_empleado),
				    opcion = $("#frmEditar #opcion").val("modificar");

			$("#cuadro3").slideDown("slow");
			$("#cuadro1").hide();

		});
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
