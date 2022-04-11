<!DOCTYPE html><?php include ("../conexion/conexion.php");
$sqlEspecialidad = "SELECT * FROM categorias WHERE estado = 0 ";
$especialidad = mysqli_query($conexion,$sqlEspecialidad);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Capacitación AFAC | Programacion OJT</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
  <link href="dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">
    <style>
	.swal-wide {
        width: 500px !important;
        font-size: 16px !important;
    }
    /* Base for label styling */
	[type="checkbox"]:not(:checked),
	[type="checkbox"]:checked {
		position: absolute;
		left: 0;
		opacity: 0.01;
	}
	[type="checkbox"]:not(:checked) + label,
	[type="checkbox"]:checked + label {
		position: relative;
		padding-left: 2.3em;
		font-size: 1.05em;
		line-height: 1.7;
		cursor: pointer;
	}

	/* checkbox aspect */
	[type="checkbox"]:not(:checked) + label:before,
	[type="checkbox"]:checked + label:before {
		content: '';
		position: absolute;
		left: 0;
		top: 0;
		width: 1.4em;
		height: 1.4em;
		border: 1px solid #aaa;
		background: #FFF;
		border-radius: .2em;
		box-shadow: inset 0 1px 3px rgba(0,0,0, .1), 0 0 0 rgba(66, 154, 236, .2);
		-webkit-transition: all .275s;
				transition: all .275s;
	}

	/* checked mark aspect */
	[type="checkbox"]:not(:checked) + label:after,
	[type="checkbox"]:checked + label:after {
		content: '✔';
		position: absolute;
		top: .525em;
		left: .18em;
		font-size: 1.375em;
		color: #074899;
		line-height: 0;
		-webkit-transition: all .2s;
				transition: all .2s;
	}

	/* checked mark aspect changes */
	[type="checkbox"]:not(:checked) + label:after {
		opacity: 0;
		-webkit-transform: scale(0) rotate(45deg);
				transform: scale(0) rotate(45deg);
	}

	[type="checkbox"]:checked + label:after {
		opacity: 1;
		-webkit-transform: scale(1) rotate(0);
				transform: scale(1) rotate(0);
	}

	/* Disabled checkbox */
	[type="checkbox"]:disabled:not(:checked) + label:before,
	[type="checkbox"]:disabled:checked + label:before {
		box-shadow: none;
		border-color: #bbb;
		background-color: #e9e9e9;
	}

	[type="checkbox"]:disabled:checked + label:after {
		color: #777;
	}

	[type="checkbox"]:disabled + label {
		color: #aaa;
	}

	/* Accessibility */
	[type="checkbox"]:checked:focus + label:before,
	[type="checkbox"]:not(:checked):focus + label:before {
		box-shadow: inset 0 1px 3px rgba(0,0,0, .1), 0 0 0 6px rgba(66, 154, 236, .2);
	}

    
    </style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

    <div class="wrapper">

        <?php include('header.php');?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content" id="detalles" style="display: none;">
                <div class="row">
                    <?php include('valores.php'); ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <section class="content" id="listaOJT">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">LISTA DE PROGRMACION DE OJT</h3>
                                <div class="pull-right">

                                    <div class="btn-group">
                                        <a type="button" href="accesos" class="btn btn-default btn-sm"><i
                                                class="fa fa-refresh"></i></a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                            </div>
                            <div class="box-body">
                                <table style="width: 100%;" id="data-table-proOJT" class="table table-striped table-hover"></table>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <section class="content" id="viscurso">
                <!-- vista de las subtareas de cada pparticipante -->
                    <?php include('visprojt.php');?>
                    
                
            </section>
        </div>
        
        <?php include('../perfil/modalojt.php');?>

        




        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?php 
                                $query ="SELECT 
                                        *
                                        FROM
                                        controlvers";
                                $resultado = mysqli_query($conexion, $query);

                                $row = mysqli_fetch_assoc($resultado);
                                if(!$resultado) {
                                    var_dump(mysqli_error($conexion));
                                    exit;
                                }
                                ?>
                <?php echo $row['version']?>
            </div>

            <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
            Todos los derechos Reservados DDE
.
        </footer>

        <!-- Control Sidebar -->
        <?php include('panel.html');?>
        
        
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script src="../js/global.js"></script>
    <script src="../js/datos.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>


</body>

</html>
<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#id_area').select2();
    
});
</script>
<script src="../js/select2.js"></script>
<script type="text/javascript">
var dataSet = [
    <?php 
$query = "SELECT * FROM prog_ojt 
INNER JOIN ojts ON ojts.id_spc = prog_ojt.id_esp
INNER JOIN personal ON prog_ojt.id_pers = personal.gstIdper
INNER JOIN ojts_subs ON ojts_subs.idtarea = ojts.id_ojt
INNER JOIN categorias ON categorias.gstIdcat  = prog_ojt.id_esp
WHERE prog_ojt.estado = 0 GROUP BY prog_ojt.id_pers ORDER BY id_pers ASC";


$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 
$perona =$data['id_pers'];

?>

    //console.log('<?php //echo $gstIdper ?>');

    ["<?php echo $data['id_pers']?>", "<?php echo $data['gstNombr']?>", "<?php echo $data['gstApell']?>",
        "<?php echo $data['gstCatgr']?>", 
        "<?php echo "<a title='Ver detalle' onclick='openOJT($perona)' type='button' data-toggle='modal' data-target='' class='editar btn btn-default'><i class='fa fa-list-ul'></i></a>"?>"
    ],


    <?php } ?>
];

var tableGenerarReporte = $('#data-table-proOJT').DataTable({
    responsive: true,


    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [

        {
            title: "ID"
        },
        {
            title: "NOMBRE"
        },
        {
            title: "APELLIDO"
        },
        {
            title: "ESPECIALIDAD"
        },
        {
            title: "ACCIÓN"
        }
    ],
});

//FUNCION PARA TRAER LOS DATOS DE LA TAREAS POR INSPECTOR
function infor(perona){
    //alert(perona);
    var pe1=perona
    $("#detproOJT").toggle(250); //Muestra contenedor 
    $("#listaOJT").toggle("fast"); //Oculta lista
    //alert(perona);
    document.getElementById('inspercooj').value=perona;
    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].gstIdper == perona){
                // alert(id_persona);
                datos = 
                obj.data[U].gstNombr  + '*' +
                obj.data[U].gstApell;    
                var d = datos.split("*");   
                $("#nominsp").html('INSPECTOR / ' + d[0] + ' ' +d[1]);                
            }
        }
    });
        //ENTRA LA OTRA FUNSION         
}

//FUNCIÓN PARA TRAER LAS SUBTAREAS DE EL INSPECTOR
function openOJT(perona) {
    var pe1=perona
    $("#detproOJT").toggle(250); //Muestra contenedor 
    $("#listaOJT").toggle("fast"); //Oculta lista
    //alert(perona);
    document.getElementById('inspercooj').value=perona;
    $.ajax({
        url: '../php/conPerson.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].gstIdper == perona){
                // alert(id_persona);
                datos = 
                obj.data[U].gstNombr  + '*' +
                obj.data[U].gstApell;    
                var d = datos.split("*");   
                $("#nominsp").html('INSPECTOR / ' + d[0] + ' ' +d[1]);                
            }
        }
    });
    
    var id = perona

    var tableCursosProgramados = $('#data-table-OJTProgramados').DataTable({
        "order": [
            [3, "asc"]
        ],
        "ajax": {
            "url": "../php/programojt.php",
            "type": "GET",
            "data": function(d) {
                d.id = id;
            }
        },


        "language": {

            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },

    });

}

//FUNCION PARA TRAER NIVEL LOS DATOS DE NIVEL 1 -----------------------------------------------------------------------------------------------
function evalun1(registro){
    //alert(registro);
    $("#data-table-OJTProgramados tr").on('click', function() {
        var tareas = "";
        var subtarea = "";
        tareas += $(this).find('td:eq(2)').html(); //Toma el id de la persona 
        subtarea += $(this).find('td:eq(3)').html(); //Toma el id de la persona 
        document.getElementById('taroj').value=tareas
        document.getElementById('suboj').value=subtarea
    })
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].id_proojt == registro){
                idpersonaOJTE1 = obj.data[U].id_pers; //id persona
                idinstruOJTE2= obj.data[U].id_insojt; // id instructor
                datos = 
                obj.data[U].id_coorojt  + '*' +
                obj.data[U].id_insojt  + '*' +
                obj.data[U].comision;    
                var d = datos.split("*");   
                $("#modal-evaluarojt #idinspo").val(d[0]);   
                $("#modal-evaluarojt #idintucco").val(d[1]);  
                $("#modal-evaluarojt #evcomision").val(d[2]);   
                          
            }    
        }
    //TRAE A LA PERSONA
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idpersonaOJTE1){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojt #nompoj1").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
        //TRAE A INSTRUCTOR
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idinstruOJTE2){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojt #tipooj1").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
    }); 
}
//FUNCIÓN DE EVALUACIÓN NIVEL 2 ---------------------------------------------------------------------------
function evalun2(registro){
    //alert(registro);
    $("#data-table-OJTProgramados tr").on('click', function() {
        var tareas = "";
        var subtarea = "";
        tareas += $(this).find('td:eq(1)').html(); //Toma el id de la persona 
        subtarea += $(this).find('td:eq(2)').html(); //Toma el id de la persona 
        document.getElementById('tarojII').value=tareas
        document.getElementById('subojII').value=subtarea
    })
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].id_proojt == registro){
                idpersonaOJTE1 = obj.data[U].id_pers; //id persona
                idinstruOJTE2= obj.data[U].id_insojt; // id instructor
                // alert(id_persona);           
            }    
        }
    }); 
    //TRAE A LA PERSONA
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idpersonaOJTE1){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojtII #nompoj1II").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
        //TRAE A INSTRUCTOR
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idinstruOJTE2){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojtII #tipooj1II").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
}
//FUNCIÓN DE EVALUACIÓN NIVEL 3 ------------------------------------------------
function evalun3(registro){
    //alert(registro);
    $("#data-table-OJTProgramados tr").on('click', function() {
        var tareas = "";
        var subtarea = "";
        tareas += $(this).find('td:eq(1)').html(); //Toma el id de la persona 
        subtarea += $(this).find('td:eq(2)').html(); //Toma el id de la persona 
        document.getElementById('tarojII3').value=tareas
        document.getElementById('subojII3').value=subtarea
    })
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].id_proojt == registro){
                idpersonaOJTE3 = obj.data[U].id_pers; //id persona
                idinstruOJTE3= obj.data[U].id_insojt; // id instructor
                // alert(id_persona);           
            }    
        }
    }); 
    //TRAE A LA PERSONA
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idpersonaOJTE3){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojtIII #nompoj1II3").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
        //TRAE A INSTRUCTOR
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idinstruOJTE3){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-evaluarojtIII #tipooj1II3").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
}
//FUNCION PARA TRAER INFO DE OJT PROGRAMADO
function ojtprogram(idregistro){
    //alert(idregistro);
    document.getElementById('idinfregistro').value=idregistro;
    var fin =document.getElementById('buttofnojt');
    $("#data-table-OJTProgramados tr").on('click', function() {
        var tareas = "";
        var subtarea = "";
        tareas += $(this).find('td:eq(2)').html(); //Toma el id de la persona 
        subtarea += $(this).find('td:eq(3)').html(); //Toma el id de la persona 
        document.getElementById('inftarepromojt').value=tareas;
        document.getElementById('infsubtareojt').value=subtarea; 
    })
    $.ajax({
        url: '../php/conproojt.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        var res = obj.data;
        var x = 0;
        for (U = 0; U < res.length; U++) { 
            if (obj.data[U].id_proojt == idregistro){
                idpersonaOJT = obj.data[U].id_pers; //id persona
                idcoordina = obj.data[U].id_coorojt; // id coordinador
                idinstruOJT= obj.data[U].id_insojt; // id instructor
                //alert(idcoordina);
                datos = 
                obj.data[U].ubicojt  + '*' +
                obj.data[U].fec_inioj  + '*' +
                obj.data[U].fec_finoj  + '*' +
                obj.data[U].nivel  + '*' +
                obj.data[U].lugar  + '*' +
                obj.data[U].sede  + '*' +
                obj.data[U].id_esp  + '*' +
                obj.data[U].comision  + '*' +
                obj.data[U].feini_comision  + '*' +
                obj.data[U].fecfin_comision;    
                var d = datos.split("*");   
                $("#modal-proojt #inftipojt").val(d[0]); 
                $("#modal-proojt #infinicioojt").val(d[1]);
                $("#modal-proojt #inffinojt").val(d[2]);     
                $("#modal-proojt #infnivelojt").val(d[3]);
                $("#modal-proojt #influgarojt").val(d[4]);
                $("#modal-proojt #infsedeojt").val(d[5]);  
                $("#modal-proojt #infespeojt").val(d[6]);
                $("#modal-proojt #infcomision").val(d[7]);
                $("#modal-proojt #infiniciocom").val(d[8]);
                $("#modal-proojt #infincomi").val(d[9]);
                
            }
        }

        //TRAE A LA PERSONA
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj1 = JSON.parse(respuesta);
            var perss = obj1.data;
            var x = 0;
            for (A = 0; A < perss.length; A++) { 
                if (obj1.data[A].gstIdper == idpersonaOJT){
                    datos2 = 
                    obj1.data[A].gstNombr  + '*' +
                    obj1.data[A].gstApell;    
                    var s = datos2.split("*");   
                    $("#modal-proojt #infojnombre").val(s[0]+' '+ s[1] );         
                }
            }
        }); 
        //TRAE A AL COORDINADOR
        //alert(idpersonaOJT)
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj2 = JSON.parse(respuesta);
            var perss = obj2.data;
            var x = 0;
            for (C = 0; C < perss.length; C++) { 
                if (obj2.data[C].gstIdper == idcoordina){
                    datos3 =        
                    obj2.data[C].gstNombr  + '*' +
                    obj2.data[C].gstApell;    
                    var o = datos3.split("*");   
                    $("#modal-proojt #infocoordojt").val(o[0]+' '+ o[1] );         
                }
            }
        });
        //TRAE A AL INSTRUCTOR
        //alert(idinstruOJT)
        $.ajax({
            url: '../php/conPerson.php',
            type: 'POST'
        }).done(function(respuesta) {
            obj2 = JSON.parse(respuesta);
            var perss = obj2.data;
            var x = 0;
            for (C = 0; C < perss.length; C++) { 
                if (obj2.data[C].gstIdper == idinstruOJT){
                    datos3 = 
                    obj2.data[C].gstNombr  + '*' +
                    obj2.data[C].gstApell;    
                    var o = datos3.split("*");   
                    $("#modal-proojt #infinstrojt").val(o[0]+' '+ o[1] );         
                }
            }
        });

        
    });    //FIN
}

//FUNCION PARA TRAER INFO DE OJT PROGRAMADO
function endojt(){
    var id_proojt  = document.getElementById('idinfregistro').value;
    var datos= 'id_proojt=' + id_proojt + '&opcion=finalizarojt';

    //INICIO DE LA FUNCIÓN PARA GUARDAR SUBTAREAS
        $.ajax({
            type:"POST",
            url:"../php/insertOJT.php",
            data:datos
          }).done(function(respuesta){
            if (respuesta==0){
                Swal.fire({
                    type: 'success',
                    // title: 'AFAC INFORMA',
                    text: 'EL OJT SE FINALIZADO',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                    showConfirmButton: false,
                });
                setTimeout("location.href = 'catalogoOJT';", 2500);


            }else if (respuesta == 2) {
                Swal.fire({
                type: 'info',
                text: 'NO SE PUEDE FINALIZAR ESTA PENDIENTE LA EVALUACIÓN',
                timer: 2000,
                customClass: 'swal-wide',
                showConfirmButton: false,
            });
            }else{
                
                
            }
        });//FIN DE AJAX
}
function enviarMailOjt(ojt){
    
    num = ojt;
    text = num.toString();
    idojt = text.split(".")[0];
    idper = text.split(".")[1];
    Swal.fire({
        html: 'Espera un momento...', // add html attribute if you want or remove
        allowOutsideClick: false,
        customClass: 'swal-wide',
        onBeforeOpen: () => {
            Swal.showLoading()
        },
    });
    $.ajax({
        url: '../admin/enviarMailOjt.php',
        type: 'POST',
        data: 'idojt=' + idojt + '&idper=' + idper 
    }).done(function(html) {
        Swal.fire({
            type: 'success',
            text: 'ENVIADO CON ÉXITO',
            showSpinner: true,
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 2000,
            backdrop: `
                rgba(100, 100, 100, 0.4)
            `
        });

    });

}
</script>