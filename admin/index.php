<!DOCTYPE html>
<?php include ("../conexion/conexion.php");?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
    <title>Gestor de Inspectores</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-gantt.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <script src="https://cdn.anychart.com/releases/8.10.0/locales/es-es.js"></script>
  <script src="https://cdn.anychart.com/releases/8.10.0/themes/dark_provence.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <script src="dist/js/sweetalert2.all.min.js"></script>
  <link href="dist/css/sweetalert2.min.css" type="text/css" rel="stylesheet">

  <style>
      #legend {
      height: 50px;
      background: #f7f7f7;
      border-bottom: 1px solid #d6d6d6;
    }

    .anychart-tooltip {
      padding: 0;
      background: white;
      color: #333;
      box-shadow: 2px 2px 5px #333;
      border-radius: 0;
    }

    .anychart-tooltip-title h5 {
      background: #455a64;
      padding: 10px 30px;
      margin: 0;
    }

    .anychart-tooltip-title h5.default {
      color: #fff;
    }

    .anychart-tooltip hr {
      margin: 0;
    }

    .anychart-tooltip .tooltip-content {
      padding: 0 30px;
    }
      </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
include('header.php');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Panel de Control</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa ion-android-home"></i> Inicio</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>


            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>
                                    <div id="persona"></div>
                                </h3>

                                <p>Total personal AFAC</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>
                            <a href="persona.php" class="small-box-footer">Mas information <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    <div id="inspectores"></div>
                                </h3>

                                <p>Total de inspectores</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-person"></i>
                            </div>
                            <a href="inspecion.php" class="small-box-footer">Mas information <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>
                                    <div id="instructor"></div>
                                </h3>

                                <p>Total de instructores</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-person"></i>
                            </div>
                            <a href="instructor.php" class="small-box-footer">Mas information <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>
                    </div>
                </div>
                <!-- =========================================================== -->
                <!--Fecha se ubica en apartado de status.js-->
                <H4>
                    <div id="fecha"></div>
                </H4>
                <div class="row">


                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa ion-easel"></i></span>

                            <?php 
                                $query ="SELECT 
                                  COUNT( id_curso ) AS COMPLETADOS,
                                  COUNT( CASE WHEN proceso = 'PENDIENTE' THEN 1 END ) AS PENDIENTES,
                                  COUNT( CASE WHEN proceso = 'ACREEDITADO' THEN 1 END ) AS ACREEDITADO,
                                  COUNT( CASE WHEN proceso = 'EN PROCESO' THEN 1 END ) AS PORACREEDITAR 
                                        FROM
                                        cursos";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL DE CURSOS</span>
                                <span class="info-box-text">PROGRAMADOS</span>
                                <span class="info-box-number"><?php echo $row['COMPLETADOS']?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">

                                    <a link rel="stylesheet" href="lisCurso.php" style="color:white"
                                        class="small-box-footer">information <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </span>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa ion-easel"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL DE CURSOS</span>
                                <span class="info-box-text">Acreditados</span>
                                <span class="info-box-number"><?php echo $row['ACREEDITADO']?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                    <a link rel="stylesheet" href="lisCurso.php" style="color:white"
                                        class="small-box-footer">information <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa ion-easel"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL DE CURSOS</span>
                                <span class="info-box-text">POR ACREDITAR</span>
                                <span class="info-box-number"><?php echo $row['PORACREEDITAR']?></span>
                                <span class="progress-description">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>

                                    <a link rel="stylesheet" href="lisCurso.php" style="color:white"
                                        class="small-box-footer">information <i
                                            class="fa fa-arrow-circle-right"></i></a>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa ion-easel"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL DE CURSOS</span>
                                <span class="info-box-text">Por vencer</span>
                                <span class="info-box-number">10</span>
                                <span class="progress-description">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a link rel="stylesheet" href="lisCurso.php" style="color:white"
                                            class="small-box-footer">information <i
                                                class="fa fa-arrow-circle-right"></i></a>


                            </div>
            </section>
            <div class="container">
                  <!-- /.content -->   <h3>Gantt Cursos Programados</h3>
                  <!-- <div id="container" style="width: 96%; height: 400px;"></div><br><br> -->
                  <div id="legend"></div>
                    <div style="width: 96%; height: 400px;" id="container"></div>
</div>
        </div>


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.1
            </div>
            <strong>AFAC&copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong>
            Todos los derechos Reservados AJ.
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
    <!-- jQuery UI 1.11.4 -->
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../bower_components/raphael/raphael.min.js"></script>
    <script src="../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <!-- <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../js/status.js"></script>
    <script src="js/anychart-base.min.js"></script>
    <script src="js/anychart-ui.min.js"></script>
    <script src="js/anychart-exports.min.js"></script>
    <script src="js/anychart-gantt.min.js"></script>
    <script src="js/anychart-data-adapter.min.js"></script>
    <script>

    anychart.onDocumentReady(function () {
        var locale = "es-mx";

        anychart.format.outputLocale('es-es');
      // create a data tree
      var treeData = anychart.data.tree(data, 'as-tree');

      // create a chart
      var chart = anychart.ganttProject();
      // set the data
      chart.data(treeData);

      // get chart data grid
      var dataGrid = chart.dataGrid();

      // enable tooltip html mode
      dataGrid.tooltip().useHtml(true);

      // set data grid column's width
      dataGrid.column(1).width(250);

      // set start splitter position settings
      chart.splitterPosition(303);

      // get chart's timeline
      var timeline = chart.getTimeline();

      //get chart's timeline milestones
      var milestones = timeline.milestones();

      // set default settings for the milestones
      // settings for other milestones was pre-setted in the data using "milestone" property
      milestones.markerType('square').fill('#96a6a6').stroke('#333');

      // set default tooltip's title formatter
      timeline.tooltip().titleFormat(function () {
        return '<h1 class="title default">' + this.name + '</h1>';
      });

      // set default tooltip's content formatter
      timeline
        .tooltip()
        .useHtml(true)
        .format(function () {
          return (
            '<div class="tooltip-content">\n' +
            '<p><b>Fecha de inicio</b>: ' +
            anychart.format.date(this.actualStart) +
            '</p>\n' +
            '<p><b> Fecha final</b>: ' +
            anychart.format.date(this.actualEnd) +
            '</p>\n' +
            '</div>'
          );
        });

      // set milestones tooltip's title formatter
      milestones
        .tooltip()
        .useHtml(true)
        .titleFormat(function () {
          var bgcolor = this.getData('milestone')
            ? this.getData('milestone').fill
            : '#96a6a6';
          return (
            '<h5 class="title" style="background: ' +
            bgcolor +
            '">' +
            this.name +
            '</h5>'
          );
        });

      // set milestones tooltip's content formatter
      milestones
        .tooltip()
        .useHtml(true)
        .format(function () {
          return (
            '<div class="tooltip-content"><p><b>Fecha de Inicio</b>: ' +
            anychart.format.date(this.actualStart) +
            '</p></div>'
          );
        });

      // enable milestones preview
      milestones.preview().enabled(true);

      // set the container id
      chart.container('container');

      // initiate drawing the chart
      chart.draw();

      chart.collapseAll();
      chart.expandTask('1');

      // set chart's initial zoom
      chart.zoomTo(Date.UTC(2019, 6, 1, 0), Date.UTC(2019, 6, 16, 0));

      // create gantt toolbar and render it in the container
      var toolbar = anychart.ui.ganttToolbar();
      toolbar.container('container');
      toolbar.target(chart);
      toolbar.draw();

      // set weekends fill color
      timeline.weekendsFill('red 0.2');

      // set holidays fill color
      timeline.holidaysFill('green 0.2');

      // get timeline calendar
      var calendar = timeline.scale().calendar();

      // set working hours  and holidays
      calendar
        .schedule([
          null,
          { from: 10, to: 18 },
          { from: 10, to: 18 },
          { from: 10, to: 18 },
          { from: 10, to: 18 },
          { from: 10, to: 18 },
          null
        ])
        .holidays([{ day: 4, month: 6, label: 'Independence Day' }]);

      // create and setup legend
     

      // draw legend
    });

    // create data
    var data = [
      {
        id: '1',
        name: 'Inducción',
        actualStart: '2019-07-01',
        actualEnd: '2019-08-03',
        children: [
          {
            id: '1.1',
            name: 'A Distancia',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-06',
            children: [
              {
                id: '1.1.1',
                name: 'Legislación Aeronáutica Internacional',
                actualStart: '2019-07-01',
                actualEnd: '2019-07-03'
              },
              {
                id: '1.1.2',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-05',
                actualEnd: '2019-07-05',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              },
              {
                id: '1.1.3',
                name: 'Inducción a la AFAC',
                actualStart: '2019-07-06',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.2',
            name: 'Mixta (Semipresencial)',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-11',
            children: [
              {
                id: '1.2.1',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-07',
                actualEnd: '2019-07-10'
              },
              {
                id: '1.2.2',
                name: 'Legislación Aeronáutica Nacional',
                actualStart: '2019-07-11',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.3',
            name: 'Autogestivo',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-14',
            children: [
              {
                id: '1.3.1',
                name: 'Básico Inspector de Exámenes',
                actualStart: '2019-07-10',
                actualEnd: '2019-07-13'
              },
              {
                id: '1.3.2',
                name: 'Básico de Operaciones Tierra',
                actualStart: '2019-07-14',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          
          
          
        ]
      },
      {
        id: '1',
        name: 'Básico/inicial',
        actualStart: '2019-07-01',
        actualEnd: '2019-08-03',
        children: [
          {
            id: '1.1',
            name: 'A Distancia',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-06',
            children: [
              {
                id: '1.1.1',
                name: 'Legislación Aeronáutica Internacional',
                actualStart: '2019-07-01',
                actualEnd: '2019-07-03'
              },
              {
                id: '1.1.2',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-05',
                actualEnd: '2019-07-05',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              },
              {
                id: '1.1.3',
                name: 'Inducción a la AFAC',
                actualStart: '2019-07-06',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.2',
            name: 'Mixta (Semipresencial)',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-11',
            children: [
              {
                id: '1.2.1',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-07',
                actualEnd: '2019-07-10'
              },
              {
                id: '1.2.2',
                name: 'Legislación Aeronáutica Nacional',
                actualStart: '2019-07-11',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.3',
            name: 'Autogestivo',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-14',
            children: [
              {
                id: '1.3.1',
                name: 'Básico Inspector de Exámenes',
                actualStart: '2019-07-10',
                actualEnd: '2019-07-13'
              },
              {
                id: '1.3.2',
                name: 'Básico de Operaciones Tierra',
                actualStart: '2019-07-14',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          
          
          
        ]
      },
      {
        id: '1',
        name: 'Transversales',
        actualStart: '2019-07-01',
        actualEnd: '2019-08-03',
        children: [
          {
            id: '1.1',
            name: 'A Distancia',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-06',
            children: [
              {
                id: '1.1.1',
                name: 'Legislación Aeronáutica Internacional',
                actualStart: '2019-07-01',
                actualEnd: '2019-07-03'
              },
              {
                id: '1.1.2',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-05',
                actualEnd: '2019-07-05',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              },
              {
                id: '1.1.3',
                name: 'Inducción a la AFAC',
                actualStart: '2019-07-06',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.2',
            name: 'Mixta (Semipresencial)',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-11',
            children: [
              {
                id: '1.2.1',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-07',
                actualEnd: '2019-07-10'
              },
              {
                id: '1.2.2',
                name: 'Legislación Aeronáutica Nacional',
                actualStart: '2019-07-11',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.3',
            name: 'Autogestivo',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-14',
            children: [
              {
                id: '1.3.1',
                name: 'Básico Inspector de Exámenes',
                actualStart: '2019-07-10',
                actualEnd: '2019-07-13'
              },
              {
                id: '1.3.2',
                name: 'Básico de Operaciones Tierra',
                actualStart: '2019-07-14',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          
          
          
        ]
      },
      {
        id: '1',
        name: 'Recurrentes',
        actualStart: '2019-07-01',
        actualEnd: '2019-08-03',
        children: [
          {
            id: '1.1',
            name: 'A Distancia',
            actualStart: '2019-07-01',
            actualEnd: '2019-07-06',
            children: [
              {
                id: '1.1.1',
                name: 'Legislación Aeronáutica Internacional',
                actualStart: '2019-07-01',
                actualEnd: '2019-07-03'
              },
              {
                id: '1.1.2',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-05',
                actualEnd: '2019-07-05',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              },
              {
                id: '1.1.3',
                name: 'Inducción a la AFAC',
                actualStart: '2019-07-06',
                milestone: {
                  enabled: true,
                  markerType: 'pentagon',
                  fill: '#64b5f6',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.2',
            name: 'Mixta (Semipresencial)',
            actualStart: '2019-07-07',
            actualEnd: '2019-07-11',
            children: [
              {
                id: '1.2.1',
                name: 'Curso Específico de Supervisión de la Normatividad de Aeronavegabilidad',
                actualStart: '2019-07-07',
                actualEnd: '2019-07-10'
              },
              {
                id: '1.2.2',
                name: 'Legislación Aeronáutica Nacional',
                actualStart: '2019-07-11',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          {
            id: '1.3',
            name: 'Autogestivo',
            actualStart: '2019-07-10',
            actualEnd: '2019-07-14',
            children: [
              {
                id: '1.3.1',
                name: 'Básico Inspector de Exámenes',
                actualStart: '2019-07-10',
                actualEnd: '2019-07-13'
              },
              {
                id: '1.3.2',
                name: 'Básico de Operaciones Tierra',
                actualStart: '2019-07-14',
                milestone: {
                  enabled: true,
                  markerType: 'diamond',
                  fill: '#ffd54f',
                  stroke: '#666'
                }
              }
            ]
          },
          
          
          
        ]
      }
    ];
  
</script>
</body>

</html>