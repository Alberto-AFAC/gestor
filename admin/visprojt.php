<!-- Main content -->
<div class="row" id="detproOJT" style="display:none;">

    <!-- /.col -->
    <div class="col-md-12">
        <div class="box-tools pull-right">
            <button type="button" title="Cerrar" id="cerrarc" class="btn btn-box-tool" style="font-size:18px"
                data-widget="remove">
                <a href="catalogoOJT"><i class='fa fa-times'></i></a>
            </button>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            
                <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DEL OJTS PROGRAMADOS</a></li>
                <h4><label id="nominsp" name="nominsp" for="" style="color:#0B007A"></label></h4>
            
                <!-- <li><a href="#timeline" data-toggle="tab">PARTICIPANTES</a></li> -->
            </ul>
            <form action="" method="get">
                <input type="hidden" class="form-control disabled inputalta" name="inspercooj" id="inspercooj" value="" >
            </form>
            <div class="tab-content">
                
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <form class="form-horizontal" action="" method="POST" id="Dtall">
                                <!-- <div id="curscoord"></div> -->
                                <div class="box-body">
                                <br>
                                <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
                                <!-- <div id="proCursos"></div> -->
                                <!-- <table class="display table table-striped table-bordered dataTable" id="data-table-OJTProgramados" style="width:100%"> -->
                                <table style="width: 100%;" id="data-table-OJTProgramados" class="table table-striped table-hover">
                                <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TAREA</th>
                                            <th>SUBTAREA PROGRAMADA</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE FIN</th>
                                            <th>NIVEL</th>
                                            <th>ASISTENCIA</th>
                                            <th>ESTATUS</th>
                                            <th>ACCIONES</th>

                                        </tr>
                                    </thead>
                            
                            </table>

                               
                            </div>
                            </form>
                        </div>
                    <!-- Post -->
            </div>
        </div>
            <!-- /.tab-content -->
    </div>
        <!-- /.nav-tabs-custom -->
</div>
    <!-- /.col -->
    
</div>

<div class="row" id="dettareproOJT" style="display:none;">

    <!-- /.col -->
    <div class="col-md-12">
        <div class="box-tools pull-right">
            <button type="button" title="Cerrar" id="cerrarc" class="btn btn-box-tool" style="font-size:18px"
                data-widget="remove">
                <a href="catalogoOJT"><i class='fa fa-times'></i></a>
            </button>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            
                <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DEL OJTS PROGRAMADOS</a></li>
                <h4><label id="nominsp" name="nominsp" for="" style="color:#0B007A"></label></h4>
            
                <!-- <li><a href="#timeline" data-toggle="tab">PARTICIPANTES</a></li> -->
            </ul>
            <input type="hidden" class="form-control disabled inputalta" name="inspercooj" id="inspercooj" value="" >
            <div class="tab-content">
                
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <form class="form-horizontal" action="" method="POST" id="Dtall">
                                <!-- <div id="curscoord"></div> -->
                                <div class="box-body">
                                <br>
                                <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
                                <table style="width: 100%;" id="data-table-OJTProgrtareas" class="table table-striped table-hover"></table>

                                </table>
                            </div>
                            </form>
                        </div>
                    <!-- Post -->
            </div>
        </div>
            <!-- /.tab-content -->
    </div>
        <!-- /.nav-tabs-custom -->
</div>
    <!-- /.col -->
    
</div>


<!-- /.row -->