<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Table Data</title>
    <link href="https://playground.anychart.com/gallery/src/Gantt_Working_With_Data/Table_Data/iframe" rel="canonical">
    <meta content="AJAX Chart,Chart from JSON,Gantt Chart,Gantt Project Chart,JSON Chart,JSON Plot,Project Management" name="keywords">
    <meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css">
    <style>
        html,
        body,
        #container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="container"></div>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-gantt.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script type="text/javascript">
        anychart.onDocumentReady(function() {
            // The data used in this sample can be obtained from the CDN
            // https://cdn.anychart.com/samples/gantt-working-with-data/table-data/data.json
            anychart.data.loadJsonFile(
                'https://cdn.anychart.com/samples/gantt-working-with-data/table-data/data.json',
                function(data) {
                    // create data tree on raw data represented as table structure
                    var treeData = anychart.data.tree(data, 'as-table');

                    // create project gantt chart
                    var chart = anychart.ganttProject();

                    // set data for the chart
                    chart.data(treeData);

                    // set container id for the chart
                    chart.container('container');

                    // initiate chart drawing
                    chart.draw();

                    // zoom chart all dates range
                    chart.fitAll();
                }
            );
        });
    </script>
</body>

</html>