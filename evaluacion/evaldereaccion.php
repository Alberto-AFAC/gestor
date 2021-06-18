<!DOCTYPE html><?php include ("../conexion/conexion.php");?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestor inspectores | Alta de persona</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../dist/css/skins/card.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php
include('header.php');
?> 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->

   <section class="content-header">
      <h1><i class="fa   fa-question-circle" style="color:#08308A"></i>
        EVALUACIÓN DE REACCIÓN      
      </h1>
      <br>
      <b> <label1 style="font-size: 14px">EL OBJETIVO DE ESTA EVALUACIÓN, ES CONOCER LA OPINIÓN ACERCA DE LA EFICACIA DEL CURSO Y SU DESARROLLO, LO QUE PERMITE ESTABLECER ACCIONES DE MEJORA CONTINUA HACIA LA CAPACITACIÓN.</label1></b>

<br> 
    </section>
<section class="content">
<div class="row">

<?php
 
?>
<!-- <img src="../dist/img/AFAC2.png" alt="Descripción de la imagen"> -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="box-header with-border">
	          	<form action="" class="formulario1">
	      	    	<div class="radio">
                        <div class="form-group ">
                        <div class="col-sm-8">
                          
                        <label1>ID DEL CURSO</label1>
                        </div>
                            <div class="col-sm-8">      
                            <input class="col-sm-2" type="text" name="idcursoen" id="idcursoen" style= "background-color: #E5E7EC; border: 0; outline: none">
                            </div>
                        
                            <div class="col-sm-8">
                        <label1>NOMBRE DEL CURSO</label1>
                        </div>
                            <div class="col-sm-10">      
                            <input class="col-sm-12" type="text" name="nomcursoen" id="nomcursoen" style= "background-color: #E5E7EC; border: 0; outline: none">
                          </div>
                        </div>
              </form>
            </div>
          </div>
          </div>   
</div>
</div>
<div class="box box-primary">
          <div class="box-header with-border">
	          	<form name= "form1" action=""  class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">SE ESPECIFICÓ LOS OBJETIVOS AL INICIO DEL CURSO, EN FORMA CLARA Y COMPRENSIBLE? </h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg1" value="DEFICIENTE" id="r1"  required>
			                        	 <label for="r1">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg1" value="NO SATISFACTORIO" id="r2">
			              	           <label for="r2">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg1" value="SATISFACTORIO" id="r3" >
			              	           <label for="r3">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg1" value="EXCELENTE" id="r4" >
			              	           <label for="r4">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
            </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form2" action=""  class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">SE EXPLICÓ EL MODO DE EVALUACIÓN AL INICIO DEL CURSO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg2" value="DEFICIENTE" id="r5">
			                        	 <label for="r5">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg2" value="NO SATISFACTORIO" id="r6">
			              	           <label for="r6">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg2" value="SATISFACTORIO" id="r7">
			              	           <label for="r7">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg2" value="EXCELENTE" id="r8">
			              	           <label for="r8">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form3" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">EL INSTRUCTOR/A CONTESTÓ LAS DUDAS EN TIEMPO Y FORMA?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg3" value="DEFICIENTE" id="r9">
			                        	 <label for="r9">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg3" value="NO SATISFACTORIO" id="r10">
			              	           <label for="r10">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg3" value="SATISFACTORIO" id="r11">
			              	           <label for="r11">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg3" value="EXCELENTE" id="r12">
			              	           <label for="r12">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form4"  action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">LOS CONOCIMIENTOS ADQUIRIDOS SON APLICABLES A TU PUESTO DE TRABAJO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg4" value="DEFICIENTE" id="r13">
			                        	 <label for="r13">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg4" value="NO SATISFACTORIO" id="r14">
			              	           <label for="r14">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg4" value="SATISFACTORIO" id="r15">
			              	           <label for="r15">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg4" value="EXCELENTE" id="r16">
			              	           <label for="r16">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form5" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">CONSIDERAS QUE EL CONTENIDO DEL CURSO FUE SUFICIENTE?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg5" id="r17">
			                        	 <label for="r17">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg5" id="r18">
			              	           <label for="r18">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg5" id="r19">
			              	           <label for="r19">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg5" id="r20">
			              	           <label for="r20">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form6" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">EL CURSO CUBRIÓ TUS EXPECTATIVAS?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg6" value="DEFICIENTE" id="r21">
			                        	 <label for="r21">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg6" value="NO SATISFACTORIO" id="r22">
			              	           <label for="r22">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg6"  value="SATISFACTORIO" id="r23">
			              	           <label for="r23">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg6" value="EXCELENTE" id="r24">
			              	           <label for="r24">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form7" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">EL CONTENIDO DEL CURSO AUMENTÓ TUS CONOCIMIENTOS Y COMPRENSIÓN DE LOS TEMAS REVISADOS?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg7" value="DEFICIENTE" id="r25">
			                        	 <label for="r25">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg7" value="NO SATISFACTORIO" id="r26">
			              	           <label for="r26">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg7" value="SATISFACTORIO" id="r27">
			              	           <label for="r27">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg7" value="EXCELENTE" id="r28">
			              	           <label for="r28">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form8" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">EL TIEMPO PARA ENTREGAR LAS ACTIVIDADES, FUE SUFICIENTE PARA CUMPLIR CON ELLAS?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg8" value="DEFICIENTE" id="r29">
			                        	 <label for="r29">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg8" value="NO SATISFACTORIO" id="r30">
			              	           <label for="r30">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg8" value="SATISFACTORIO" id="r31">
			              	           <label for="r31">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg8" value="EXCELENTE" id="r32">
			              	           <label for="r32">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form9" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">LA PRESENTACIÓN DEL CONTENIDO, FUE FÁCIL DE REVISAR?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg9" value="DEFICIENTE" id="r33">
			                        	 <label for="r33">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg9" value="NO SATISFACTORIO" id="r34">
			              	           <label for="r34">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg9" value="SATISFACTORIO" id="r35">
			              	           <label for="r35">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg9" value="EXCELENTE" id="r36">
			              	           <label for="r36">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form10" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">LA EXPLICACIÓN DE LAS TAREAS, FUERON CLARAS Y SENCILLAS?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg10" value="DEFICIENTE" id="r37">
			                        	 <label for="r37">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg10" value="NO SATISFACTORIO" id="r38">
			              	           <label for="r38">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg10" value="SATISFACTORIO" id="r39">
			              	           <label for="r39">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg10" value="EXCELENTE" id="r40">
			              	           <label for="r40">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form11" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">EL TIEMPO CON EL QUE RECIBIÓ LA INFORMACIÓN (INVITACIÓN, TEMARIO, ETC.) AL CURSO FUE ADECUADO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg11" value="DEFICIENTE" id="r41">
			                        	 <label for="r41">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg11" value="NO SATISFACTORIO" id="r42">
			              	           <label for="r42">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg11" value="SATISFACTORIO" id="r43">
			              	           <label for="r43">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg11" value="EXCELENTE" id="r44">
			              	           <label for="r44">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form12" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">CÓMO FUE EL MATERIAL DIDÁCTICO (AUDIOVISUALES, PRESENTACIÓN, TEXTOS, ENLACES) UTILIZADO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg12" value="DEFICIENTE" id="r45">
			                        	 <label for="r45">DEFICIENTE</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg12" value="NO SATISFACTORIO" id="r46">
			              	           <label for="r46">NO SATISFACTORIO</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg12" value="SATISFACTORIO" id="r47">
			              	           <label for="r47">SATISFACTORIO</label>
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg12" value="EXCELENTE" id="r48">
			              	           <label for="r48">EXCELENTE</label>
		              	        </div>
                          </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form13" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">MENCIONA ALGUNA MEJORA QUE SE PUDIERA REALIZAR A ESTE PROCESO DE APRENDIZAJE</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                          <div class="col-sm-12">
                     <input type="text" name="preg13" id="preg13" class="col-sm-12" onkeyup="mayus(this);" placeholder="TU RESPUESTA" style= "background-color: #E5E7EC; border: 0; outline: none" >
                    </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form14" action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">DÓNDE REALIZASTE TU CURSO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body" id=pregunta14>
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg14" value="OFICINA" id="r49">
			                        	 <label for="r49">OFICINA</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg14" value="CASA" id="r50">
			              	           <label for="r50">CASA</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg14" value="CAFÉ INTERNET" id="r51">
			              	           <label for="r51">CAFÉ INTERNET</label>
                                 
		              	        </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg14" value="OTROS" id="r52">
			              	           <label for="r52">OTROS</label>
                                 <input type="text" name="preg14" id="otros" onkeyup="mayus(this);" placeholder="TU RESPUESTA" style= "background-color: #E5E7EC; border: 0; outline: none">
		              	        </div>
                          
              </form>
            </div>
          </div>
        </div>
</div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form15"  action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">DÓNDE REALIZASTE TU CURSO?</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                            <div class="col-sm-12">
		                        		 <input type="radio" name="preg15" value="COMPUTADORA" id="r53" required>
			                        	 <label for="r53">COMPUTADORA</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg15" value="TABLET" id="r54">
			              	           <label for="r54">TABLET</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
			              	           <input type="radio" name="preg15" value="TELÉFONO" id="r55">
			              	           <label for="r55">TELÉFONO</label>
		              	        </div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>
<div class="box box-primary">
            <div class="box-header with-border">
	          	<form name= "form16"  action="" class="formulario1">
	      	    	<div class="radio">
                    <div class="box-header with-border">
                         <h3 class="box-title">COMPARTE TUS COMENTARIOS, QUEJAS, SUGERENCIAS...</h3>
                    </div>
                      <form class="form-horizontal">
                        <div class="box-body">
                          <div class="form-group">
                          <div class="col-sm-12">
                          <textarea class="col-sm-12"  name="comentarios" id="preg16" rows="10" cols="40" onkeyup="mayus(this);" style= "font-size: 20px; border-radius: 5px; background-color: #E5E7EC" placeholder ="ESCRIBE AQUÍ TUS COMENTARIOS"></textarea>
                    </div>
              </form>
            </div>
          </div>
        </div>
</div>

<!-- <form class="form-horizontal"> -->
              <div class="box-body">
                  
                <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    
                    <button type="button" class="btn btn-info btn-lg"  onclick="enviar();">ENVIAR</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="peligro">Los datos ya están agregados </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="enviadoexito">¡Se agregaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente1">Es necesario agregar la respuesta en la pregunta 1</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente2">Es necesario agregar la respuesta en la pregunta 2</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente3">Es necesario agregar la respuesta en la pregunta 3</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente4">Es necesario agregar la respuesta en la pregunta 4</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente5">Es necesario agregar la respuesta en la pregunta 5</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente6">Es necesario agregar la respuesta en la pregunta 6</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente7">Es necesario agregar la respuesta en la pregunta 7</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente8">Es necesario agregar la respuesta en la pregunta 8</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente9">Es necesario agregar la respuesta en la pregunta 9</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente10">Es necesario agregar la respuesta en la pregunta 10</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente11">Es necesario agregar la respuesta en la pregunta 11</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente12">Es necesario agregar la respuesta en la pregunta 12</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente13">Es necesario agregar la respuesta en la pregunta 13</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente14">Es necesario agregar la respuesta en la pregunta 14</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente17">Es necesario agregar la respuesta en la pregunta 17</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="pendiente16">Es necesario agregar la respuesta en la pregunta 16</p></b>

                </div>
                           
              </div>
              <script type="text/javascript" src="../js/encuestadatos.js"></script>


              
                <!-- /.post -->

                <!-- Post -->

                
<!---------------------12354568789---------------------->

     
                <!-- /.post -->

                <!-- Post -->

                <!-- /.post -->
              
              <!--contenedor EXPERIENCIA-->

                  <!-- /.user-block -->
         
                  <!-- /.row -->

           

             
                
                <!-- /.post -->
             
    
              

      

        <!-- /.col -->
      
      <!-- /.row -->

<!-- /.col -->

<!-- /.row -->
</section>  
<!-- /.col -->
  
    <!-- Main content -->
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.2
    </div>

    <strong>AFAC &copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<script type="text/javascript" src="../js/datos.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
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
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>
<script src="../../js/valida.js"></script>

<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">


</script>
</body>
</html>
