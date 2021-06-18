    //creamo la funcion listar
    var listar = function(){
        //para mostrar las tablas del formulario
        $("#cuadro2").hide();
        $("#cuadro3").hide();
        $("#cuadro1").slideDown("slow");
        //variable = identificador)funcion.DataTable
        var table = $("#datatable").DataTable({
            //aceptara la actualizacion de reiniciar la tabla de datos/ al registrar un usuario se mostrar. si no colocamos la propiedad nos causaria problemas 
            "destroy":true,
            "ajax":{
            //atributo 
            "method":"POST",
            //mencionmos la plantilla para que mustre la lista
            "url":"../../php/listar.php"
            },
            //se va mostrar las columnas con las cuales vamos a trabajar 
            "columns":[
            //data que se menciona para que se pueda mostrar los registros de droma ordenada
            {"data":"nombre"},
            {"data":"apellidos"},
            {"data":"usuario"},
            {"data":"privilegios"},
            
            //vamos a crear botones para realizar las acciones.colocamos en estrctura un ,<th></th>
            {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalEditar' class='editar btn btn-success'><i class='glyphicon glyphicon-user'></i></button> "}
            ],
            //creamos una variable
            "language":traduccion,


        });
            //llamando la funcion obtener data editar dentro de la funcion porque tenemos nuestro table, colocamos el identificador y hacemos referencia del tbody
            obtener_data_editar("#datatable tbody",table);
            mostrar_duplicado();

    }   

//funciones para obtener los datos. tendra dos parametros 
    var obtener_data_editar = function(tbody, table){
    //al darle clicl al boton editar va desencadenar la funcion 
        $(tbody).on("click", "button.editar", function(){
        //el metodo row nos va dar el dato de cada fila .. parets nos retorna todos los antesesores al metodo selecionado, en esta caso el metodso seleccionado es el boton pero antes de el esta un dt y antes esta un tr en este caso pasamos por parametro al tr que nos va devolver los data de esa fila
            var data = table.row( $(this).parents("tr") ).data();
                console.log(data);//colocnado esta linea podremos ver desde la consola que datos nos etsa areojando
            //colocamos las variable de esta manera idenfificador, para mostrar los valores en el formulario.data nos permite costrar como objeto las variables.
            var id_usuario = $("#frmEditarUsuarios #id_usuario").val(data.id_usuario),
                    nombre = $("#frmEditarUsuarios #nombre").val(data.nombre),
                 apellidos = $("#frmEditarUsuarios #apellidos").val(data.apellidos),
                   usuario = $("#frmEditarUsuarios #usuario").val(data.usuario),
            //      password = $("#frmEditarUsuarios #password").val(data.password),
               privilegios = $("#frmEditarUsuarios #privilegios").val(data.privilegios),
                    opcion = $("#frmEditarUsuarios #opcion").val("modificar");
            
            $("#cuadro3").slideDown("slow");
            $("#cuadro1").hide();
        });
            $("#password").val("");
            $("#pass").val("");
    }

function modificar(){

    var frm=$("#frmEditarUsuarios").serialize();
        console.log(frm);
        $.ajax({
        url:"../../php/guardar.php",
        type:'POST',
        data:frm+"&opcion=modificar"
        }).done(function(respuesta){
   // console.log(respuesta);
        if(respuesta==0){         
            $('#echo').slideDown('slow');
            setTimeout(function(){
            $('#echo').slideUp('slow');
            },2000);

        }else if(respuesta==4){
            $('#vacio').slideDown('slow');
            setTimeout(function(){
            $('#vacio').slideUp('slow');
            },2000);            

        }else if(respuesta==1){
            $('#error').slideDown('slow');
            setTimeout(function(){
            $('#error').slideUp('slow');
            },2000);
        
        }else if(respuesta==3){
            $('#danger').slideDown('slow');
            setTimeout(function(){
            $('#danger').slideUp('slow');
            },2000);
        
        }else if(respuesta==2){
            $('#aviso').slideDown('slow');
            setTimeout(function(){
            $('#aviso').slideUp('slow');
            },2000);
        }
    });
}

function mostrar_duplicado(){
        
    $.ajax({
        url:'../../php/duplicado.php',
        type: 'POST'

    }).done(function(resp){  
//     console.log(resp);   
if(resp == 0){

setTimeout(function(){
$(this).html("");
$("#mensaje").html('').fadeOut('slow');
},10);

mostrar_mensaje(resp);
}else{

obj = JSON.parse(resp);
var res = obj.data;
var usu = obj.data[0].usuario;

$("#mensaje").html('El usuario <b>'+usu+'</b> esta duplicado').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$("#mensaje").html('El usuario <b>'+usu+'</b> esta duplicado').fadeOut('slow');
},10000);       

}

    });

}


var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "Usuario actualizado.";
color = "#379911";
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
$("#usuario").val("");
$("#password").val("");
$("#pass").val("");
//$("#privilegios").val("");
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
