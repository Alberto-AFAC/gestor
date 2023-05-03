<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <title>Capacitación AFAC | Perfil Inspector</title>
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/skins/card.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css"
        integrity="sha512-rogivVAav89vN+wNObUwbrX9xIA8SxJBWMFu7jsHNlvo+fGevr0vACvMN+9Cog3LAQVFPlQPWEOYn8iGjBA71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.js"
        integrity="sha512-2sjxi4MoP9Gn7QE0NhJdxOFVMK/qYsZO6JnO6pngGvck8p5UPwFX2LV5AsAMOQYgvbzMmki6sIqJ90YO3STAnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    .swal-wide {
        width: 500px !important;
        font-size: 16px !important;
    }

    .a-alert {
        outline: none;
        text-decoration: none;
        padding: 2px 1px 0;
    }

    .a-alert:link {
        color: white;
    }

    .a-alert:visited {
        color: white;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

        <?php include('header.php'); ?>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       
        
        <section class="content-header">
            <h1>Dashboard<small>PERFIL</small></h1>
        </section>
                
        <section class="content">
        <div class="row">
                    <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-blue">
                                <div class="widget-user-image">

                                    <?php if($datos[1] == 'CARLOS ANTONIO' && $datos[2] == 'RODRIGUEZ MUNGUIA'){
                                        echo "<img class='img-circle' src='../dist/img/general.jpeg'
                                        alt='User Avatar'>";
                                    }else if($datos[1] == 'JACOB' && $datos[2] == 'GONZALEZ MACIAS'){
                                        echo "<img class='img-circle' src='../dist/img/JACOB_DDE.png'
                                        alt='User Avatar'>";
                                    }else{
                                        echo "<img class='img-circle' src='../dist/img/AFAC.png'
                                        alt='User Avatar'>";
                                    }
                                    ?>

                                    <!-- <img class="img-circle" src="../dist/img/AFAC.png" alt="User Avatar"> -->
                                </div>
                                <h3 class="widget-user-username"><?php echo $datos[1]?></h3>
                                <h5 id="" class="widget-user-desc"><?php echo $datos[3]?></h5>
                                <input type="text" style="display:none;" name="f1t1" id="f1t1"
                                    value="<?php echo $datos[0]?>">
                                    <input type="text" style="display:none;" name="ojt" id="ojt"
                                    value="<?php echo $datos[3]?>">

                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <!-- <li><a style="cursor: pointer;" onclick="perinsp();" data-toggle='modal' data-target='#modal-datpersonales'>INFORMACION PERSONAL <span class="pull-right badge bg-blue"></span></a></li> -->
                                    <li><a style="cursor: pointer;" onclick="perinsp();" data-toggle='modal' data-target='#modal-info'>INFORMACIÓN PERSONAL <span class="pull-right badge bg-red"></span></a></li>
                                    <li><a style="cursor: pointer;" onclick="constudios();" data-toggle='modal' data-target='#modal-estud'>EDUCACIÓN <span class="pull-right badge bg-aqua"></span></a></li>
                                    <li><a style="cursor: pointer;" onclick="conprofesion();" data-toggle='modal' data-target='#modal-exprofe'>EXPERIENCIA LABORAL <span class="pull-right badge bg-green"></span></a></li>
                                    <!-- <li><a href="#">CONVOCATORIAS PENDIENTES<span class="pull-right badge bg-yellow"><div id="notpend"></div></span></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><div id="sumacur"></div></h3>
                                <p>CURSOS PROGRAMADOS</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa ion-easel"></i>
                            </div>
                            <a href="inspector"  class="small-box-footer"> Mas información <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <?php 

if($datos[3]== 'INSPECTOR'){

    echo "<div class='col-lg-4 col-xs-6'>
    <div class='small-box bg-blue'>
        <div class='inner'>
            <h3><div id='sumacurOJT'></h3>
            <p>OJT PROGRAMADOS</p>
        </div>
        <div class='icon'>
            <i class='fa fa ion-easel'></i>
        </div>
        <a style='cursor: pointer;' href='ojtprogramados' class='small-box-footer'> Mas información <i class='fa fa-arrow-circle-right'></i></a>
    </div>
</div>";
}else{
    echo "<div class='col-lg-4 col-xs-6'>
    <div class='small-box bg-aqua-active' style='background-color: #afd9ee;'>
        <div class='inner'>
            <h3>1</h3>
            <p>CURSOS OBLIGATORIOS </p>
        </div>
        <div class='icon'>
            <i class='fa fa ion-easel'></i>
        </div>
        <a style='' disable onclick='' class='small-box-footer'>.</a>
    </div>
</div>";

}
?>
        

                    
                    <!-- <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>150</h3>
                                <p>OJT PROGRAMADOS</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa ion-easel"></i>
                            </div>
                            <a style="cursor: pointer;" onclick="prf();" class="small-box-footer"> Mas información <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div> -->

                    <div class="col-lg-8 col-xs-4">
                        <div class="box box-info collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Cursos obligatorios</h3>
                                <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                               <table style="width: 100%;" id="data-table-obliga" class="table display table-striped "></table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                    </div>
                
                    
                    
       
                   
                    </div>    
                    
    <!-- /.content-wrapper -->
    </section>
    
   
    
    </div>
    
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> <?php 
                $query ="SELECT * FROM controlvers";
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
        Todos los derechos Reservados DDE.

    </footer>
    <?php include('../perfil/modal.php');?>
                    <?php include('../admin/panel.html');?>
    <!--  -->
    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <!-- <div class="control-sidebar-bg"></div> -->

    <!-- ./wrapper -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/demo.js"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="../js/lisCurso.js"></script>
    <script type="text/javascript" src="../js/cursos.js"></script>
    <script src="../js/notificacion.js"></script>
   
    <!-- <script type="text/javascript" src="../js/ojt.js"></script> -->


    <?php include('../perfil/cursos.php'); ?>
    <script type="text/javascript" src="../js/accesos.js"></script>
    
</body>
<script>
    inspectorAcceso();
    function prf(){
    
        alert("dded");
        var fechaf = document.getElementById('ojt').value;
        alert(fechaf);
    }
    
</script>
                
</html>
