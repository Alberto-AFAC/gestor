<!------------------------------------------------ DETALLES POR TAREA ---------------------------------------->
<div class="row" id="detproOJT" style="display:none;">
    <div class="col-md-12">
        <div class="box-tools pull-right">
            <button type="button" title="Cerrar" id="cerrarc" class="btn btn-box-tool" style="font-size:18px"
                data-widget="remove">
                <a href="javascript:dettcomis()"><i class='fa fa-times'></i></a>
            </button>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">INFORMACION DEL OJTS PROGRAMADOS</a></li>
            </ul>
            <form action="" method="get">
                <input type="hidden" class="form-control disabled inputalta" name="inspercooj" id="inspercooj" value="">
            </form>
            <div class="tab-content">
                <h4><label id="nominsp" name="nominsp" for="" style="color:#0B007A"></label></h4>
                <h3>
                    <p id="namecomis" name="namecomis" for="" style="color:#A2A2A2;"></p>
                </h3>
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <form class="form-horizontal" action="" method="POST" id="Dtall">
                            <div class="box-body">
                                <br>
                                <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
                                <table style="width: 100%;" id="data-table-OJTProgramados"
                                    class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>COMISIÓN</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------ DETALLES POR COMISION ---------------------------------------->
<div class="row" id="comision_dett" style="display:none;">
    <div class="col-md-12">
        <div class="box-tools pull-right">
            <button type="button" title="Cerrar" id="cerrarc" class="btn btn-box-tool" style="font-size:18px"
                data-widget="remove">
                <a href="catalogoOJT"><i class='fa fa-times'></i></a>
            </button>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">LISTA DE COMISIONES ASIGNADAS PARA
                        ENTRENAMIENTO OJT</a></li>

            </ul>
            <form action="" method="get">
                <input type="hidden" class="form-control disabled inputalta" name="inspercooj_1" id="inspercooj_1"
                    value="">
            </form>
            <div class="tab-content">
                <h4><label id="nominsp1" name="nominsp1" for="" style="color:#0B007A"></label></h4>
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <form class="form-horizontal" action="" method="POST" id="Dtall">
                            <div class="box-body">
                                <br>
                                <link rel="stylesheet" type="text/css" href="../dist/css/card.css">
                                <table style="width: 100%;" id="data-table-OJTprogramcomis"
                                    class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>COMISIÓN</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE FIN</th>
                                            <th>NIVEL</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>