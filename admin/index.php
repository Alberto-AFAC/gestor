<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <link href="https://playground.anychart.com/gallery/src/Gantt_Charts/Planned-vs-Actual_Chart/iframe" rel="canonical">
  <!-- <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://cdn.anychart.com/releases/8.10.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4"
        rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
              <h3><div id="persona"></div></h3>

              <p>Total personal AFAC</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="persona.php"  class="small-box-footer">Mas information  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><div id="inspectores"></div></h3>

              <p>Total de inspectores</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
            <a href="inspecion.php" class="small-box-footer">Mas information <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><div id="instructor"></div></h3>

              <p>Total de instructores</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
            <a href="instructor.php" class="small-box-footer">Mas information <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
        </div>
    <!-- =========================================================== -->
    <!--Fecha se ubica en apartado de status.js-->
 <H4><div id="fecha"></div></H4>
    <div class="row">
      
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa ion-easel"></i></span>
            

            <div class="info-box-content">
              <span class="info-box-text">TOTAL DE CURSOS</span>
              <span class="info-box-text">PROGRAMADOS</span>
              <span class="info-box-number">191</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">

                    <a link rel="stylesheet" href="lisCurso.php" style = "color:white" class="small-box-footer">information <i class="fa fa-arrow-circle-right"></i></a>
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
              <span class="info-box-number">50</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    <a link rel="stylesheet" href="lisCurso.php" style = "color:white" class="small-box-footer">information <i class="fa fa-arrow-circle-right"></i></a>
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
              <span class="info-box-number">23</span>
              <span class="progress-description"> 
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>

                    <a link rel="stylesheet" href="lisCurso.php" style = "color:white" class="small-box-footer">information <i class="fa fa-arrow-circle-right"></i></a>
                  
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
                  <a link rel="stylesheet" href="lisCurso.php" style = "color:white" class="small-box-footer">information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
           
            <!-- /.info-box-content -->
        
    </section>
    <div class="container">
    <!-- <div style="margin: 0; padding: 0; width: 100%; height: 100%;" id="container"></div> -->
    <div style="margin: 0; padding: 0; width: 100%; height: 100%;" id="container"></div>

    </div>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1
    </div>
    <strong>AFAC&copy; 2021 <a href="https://www.gob.mx/afac">Agencia Federal de Aviación Cilvil</a>.</strong> Todos los derechos Reservados AJ.
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
<script
        src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script
        src="https://cdn.anychart.com/releases/8.10.0/js/anychart-gantt.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script
        src="https://cdn.anychart.com/releases/8.10.0/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script type="text/javascript">
    anychart.onDocumentReady(function () {

// create data
var data = [
  {
    id: "1",
    name: "BASICO",
    start_date: "2018-01-15",
    end_date: "2018-03-10",
    child_items: [
      {
        id: "1_1",
        name: "INSPECTOR AERONAUTICO",
        start_date: "2018-01-15",
        end_date: "2018-01-25"
      },
      {
        id: "1_2",
        name: "INSPECTOR AERONAUTICO",
        start_date: "2018-01-20",
        end_date: "2018-02-04"
      },
      {
        id: "1_3",
        name: "INSPECTOR AERONAUTICO",
        start_date: "2018-02-05",
        actualEnd: "2018-02-05"
      },
      {
        id: "1_4",
        name: "INSPECTOR AERONAUTICO",
        start_date: "2018-02-05",
        end_date: "2018-02-24"
      },
      {
        id: "1_5",
        name: "INSPECTOR AERONAUTICO",
        start_date: "2018-02-25",
        end_date: "2018-03-10"
      }
  ]}
];

// create a data tree
var treeData = anychart.data.tree(data, "as-tree", null, {children: "child_items"});

// map the data
var mapping = treeData.mapAs({actualStart: "start_date", actualEnd: "end_date"});

// create a chart
var chart = anychart.ganttProject();

// set the data
chart.data(mapping);

// configure the scale
chart.getTimeline().scale().maximum("2018-03-15");

// set the container id
chart.container("container");

// initiate drawing the chart
chart.draw();

// fit elements to the width of the timeline
chart.fitAll();
});
    </script>
<!-- <script src="js/anychart-base.min.js"></script>
  <script src="js/anychart-ui.min.js"></script>
  <script src="js/anychart-exports.min.js"></script>
  <script src="js/anychart-gantt.min.js"></script>
  <script src="js/anychart-data-adapter.min.js"></script>
  <script type="text/javascript">anychart.onDocumentReady(function () {
  // The data used in this sample can be obtained from the CDN
  // https://cdn.anychart.com/samples/gantt-charts/server-status-list/data.json
  anychart.data.loadJsonFile(
    'http://localhost/gestor/php/lisCurso.php',
    function (data) {
      // create data tree on our data
      var treeData = anychart.data.tree(data, 'as-table');

      // create project gantt chart
      var chart = anychart.ganttResource();

      // set data for the chart
      chart.data(treeData);

      // set start splitter position settings
      chart.splitterPosition(320);

      // get chart data grid link to set column settings
      var dataGrid = chart.dataGrid();

      // hide first column
      dataGrid.column(0).enabled(false);

      // get chart timeline
      var timeLine = chart.getTimeline();
      // set base fill
      timeLine.elements().fill(function () {
        // get status from data item
        var status = this.period.status;

        // create fill object
        var fill = {
          // if this element has children, then add opacity to it
          opacity: this.item.numChildren() ? 1 : 0.6
        };

        // set fill color by status
        switch (status) {
          case 'online':
            fill.color = 'green';
            break;
          case 'maintenance':
            fill.color = 'orange';
            break;
          case 'offline':
            fill.color = 'red';
            break;
          default:
        }

        return fill;
      });

      // set base stroke
      timeLine.elements().stroke('none');
      // set select fill
      timeLine.elements().selected().fill('#ef6c00');

      // set first column settings
      var firstColumn = dataGrid.column(1);
      firstColumn.labels().hAlign('left');
      firstColumn
        .title('CURSO')
        .width(140)
        .labelsOverrider(labelTextSettingsOverrider)
        .labels()
        .format(function () {
          return this.item.get('gstTitlo') || '';
        });

      // set first column settings
      var secondColumn = dataGrid.column(2);
      secondColumn.labels().hAlign('right');
      secondColumn
        .title('Sede')
        .width(60)
        .labelsOverrider(labelTextSettingsOverrider)
        .labels()
        .format(function () {
          return this.item.get('sede') || '';
        });

      // set first column settings
      var thirdColumn = dataGrid.column(3);
      thirdColumn.labels().hAlign('right');
      thirdColumn
        .title('Maintenance')
        .width(60)
        .labelsOverrider(labelTextSettingsOverrider)
        .labels()
        .format(function () {
          return this.item.get('maintenance') || '';
        });

      // set first column settings
      var fourthColumn = dataGrid.column(4);
      fourthColumn.labels().hAlign('right');
      fourthColumn
        .title('Offline')
        .width(60)
        .labelsOverrider(labelTextSettingsOverrider)
        .labels()
        .format(function () {
          return this.item.get('offline') || '';
        });

      // set container id for the chart
      chart.container('container');

      // initiate chart drawing
      chart.draw();

      // zoom chart to specified date
      chart.zoomTo(
        Date.UTC(2008, 0, 31, 1, 36),
        Date.UTC(2008, 1, 15, 10, 3)
      );
    }
  );
});

function labelTextSettingsOverrider(label, item) {
  switch (item.get('status')) {
    case 'online':
      label.fontColor('green').fontWeight('bold');
      break;
    case 'maintenance':
      label.fontColor('orange').fontWeight('bold');
      break;
    case 'offline':
      label.fontColor('red').fontWeight('bold');
      break;
    default:
  }
}</script> -->
</body>
</html>

 


