<!DOCTYPE html><?php include ("../conexion/conexion.php");

$sql = "SELECT gstIdlsc, gstTitlo,gstTipo FROM listacursos WHERE estado = 0";
$curso = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstCargo = 'INSTRUCTOR' AND estado = 0";
$instructor = mysqli_query($conexion,$sql);

$sql = "SELECT gstIdper,gstNombr,gstApell,gstCargo FROM personal WHERE gstCargo = 'INSPECTOR' AND gstEvalu = 'SI' AND estado = 0 || gstCargo = 'DIRECTOR' AND estado = 0 ";
$inspector = mysqli_query($conexion,$sql);
include("../php/nivelSatis.php");
$query ="SELECT * FROM bitevaluacion ORDER BY id DESC LIMIT 1";
$resultado = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($resultado);
if(!$resultado) {
  var_dump(mysqli_error($conexion));
  exit;
}
?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../dist/img/iconafac.ico" />
  <title>Capacitación AFAC | Nivel de Calidad</title>
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
  <!--JQUERY CONFIRM-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../dist/css/card.css">
  <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">

  <script src="../dist/js/sweetalert2.all.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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

  <div class="wrapper">

    <?php
    include('header.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          HISTORIAL DE CONSTANCIAS, CERTIFICADOS Y DIPLOMAS.
        </h1>
      </section>
      <!-- Main content -->
      <form id="editarcons" action="" method="POST">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div style="padding-top: 65px;" class="container box box-solid">
                <ul class="nav nav-tabs" id="myNavTabs">
                  <li class="active"><a href="#navtabs1" data-toggle="tab">HISTORIAL</a>
                    <li><a href="#navtabs2" data-toggle="tab">VERIFICAR CADENA</a>
                      <li><a href="#navtabs3" data-toggle="tab">DESCARGA MASIVA</a>    

                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade in active" id="navtabs1"> <br><br>
                          <table id="data-table-ponderacion" class="table table-bordered" width="100%"
                          cellspacing="0">
                        </table>
                      </div>
                      <div class="tab-pane fade" id="navtabs2"><br><br>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                          <label for="">INGRESE ID DE CERTIFICADO, CONSTANCIA Ó DIPLOMA.</label>
                          <input class="form-control" type="text" name="validar" required><br>
                          <input class="btn btn-info" type="submit" value="VALIDAR" name="submit">
                        </form><br>
                        <?php 
                        if(isset($_POST['submit'])){
                          $validar = base64_decode($_POST['validar']);
                          echo "<img src='../dist/img/check.gif' style='display: block; margin-left: auto; margin-right: auto; width: 150px;'><br><center><span style='font-size: 24px; color: gray;'>{$validar}</span></center>";

                        }
                        ?>
                      </div>
                      <div class="tab-pane fade" id="navtabs3"> <br><br>
                        <table id="data-table-grupal" class="table table-bordered" width="100%"
                        cellspacing="0">
                      </table>
                    </div>                                
                  </div>

                </div>
                <!-- /.box -->
              </div>
            </section>
            <div>

            </div>
            <!-- /.content -->
          </div>

        </form>

        <!---------------------RANGO DE CONSTANCIAS--------------------------------->

        <form class="form-horizontal" action="constancia_masiva.php" target='_blank' method="POST" id="constanciasc">
          <div class="modal fade" id="modal-constancia">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar()">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-size:19px; color: #000000;">CONSTANCIAS</h4>

                  </div>
                  <div class="modal-body">
                    <div class="form-group">

                      <input type="hidden" id="foliop" name="foliop">
                      <input type="hidden" id="idlistap" name="idlistap">

                      <div class="col-sm-12">
                        <label class="label2" for="">TITULO DEL CURSO</label>
                        <p style="text-align: center;"><textarea row="2" class="form-control" id="coursetitle" name="coursetitle" disabled="" /> </textarea></p>
                      </div>

                      <div class="col-sm-6">
                        <label class="label2" for="">TOTAL PARTICIPANTES</label>
                        <p style="text-align: center;"><input class="form-control" id="participantes" name="participantes" disabled="" /> </p>
                      </div>

                      <div class="col-sm-6">
                        <label class="label2" for="">TOTAL CONSTANCIAS</label>
                        <p style="text-align: center;"><input class="form-control" id="certificadop" name="certificadop" disabled="" /> </p>
                      </div>


                      <div id="mostrarselec1">      
                        <div class="col-sm-offset-0 col-sm-6">
                          <label class="label2">SELECCIONE RANGO INICIO</label>
                          <select style='width: 100%' class='form-control inputalta' class='selectpicker' id='ini' name='ini' type='text' data-live-search='true' onchange='constanciafin()'>
                            <option value=''>SELECIONE...</option>
                            <option value='0'>1</option>          
                            <option value='50' id="ocul1" >50</option>          
                            <option value='100' id="ocul2" >100</option>          
                            <option value='150' id="ocul3" >150</option>          
                            <option value='200' id="ocul4" >200</option>          
                            <option value='250' id="ocul5" >250</option> 
                            <option value='300' id="ocul6" >300</option> 
                            <option value='350' id="ocul7" >350</option>
                            <option value='400' id="ocul8" >400</option>           
                            <option value='450' id="ocul9" >450</option>
                            <option value='500' id="ocul10" >500</option>
                            <option value='550' id="ocul11" >550</option>           
                            <option value='600' id="ocul12" >600</option>
                            <option value='650' id="ocul13" >650</option>
                            <option value='700' id="ocul14" >700</option>
                            <option value='750' id="ocul15" >750</option>
                            <option value='800' id="ocul16" >800</option>        
                          </select>
                        </div>


                        <div class="col-sm-6">
                          <label class="label2" for="">RANGO FINAL</label>
                          <p style="text-align: center;"><input class="form-control" id="fin" name="fin" readonly="readonly" /> </p>
                        </div>
                      </div>

                      <div class="col-sm-5" style="margin-top: 1em">
                        <button type="input" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px" onclick="constancia()">ACEPTAR</button>
                      </div>
                      <div class="col-sm-7" style="margin-top: 1em">
                        <button type="button" class="btn btn-primary altaboton" style=" float: right; font-size:14px; width:110px; height:35px" onclick="cerrar()" data-dismiss="modal">CERRAR</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!------------------------------RANGO CERTIFICADOS--------------------------------------------------->
          <form class="form-horizontal" action="certificados_masivos.php" target='_blank' method="POST" id="certificadosc">
            <div class="modal fade" id="modal-certificado">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar()">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" style="font-size:19px; color: #000000;">CERTIFICADOS</h4>

                    </div>
                    <div class="modal-body">
                      <div class="form-group">

                        <input type="hidden" id="foliop" name="foliop">
                        <input type="hidden" id="idlistap" name="idlistap">

                        <div class="col-sm-12">
                          <label class="label2" for="">TITULO DEL CURSO</label>
                          <p style="text-align: center;"><textarea row="2" class="form-control" id="coursetitle" name="coursetitle" disabled="" /> </textarea></p>
                        </div>

                        <div class="col-sm-6">
                          <label class="label2" for="">TOTAL PARTICIPANTES</label>
                          <p style="text-align: center;"><input class="form-control" id="participantes" name="participantes" disabled="" /> </p>
                        </div>

                        <div class="col-sm-6">
                          <label class="label2" for="">TOTAL CONSTANCIAS</label>
                          <p style="text-align: center;"><input class="form-control" id="certificadopc" name="certificadopc" disabled="" /> </p>
                        </div>

                        <div id="mostrarselec2">      
                          <div class="col-sm-offset-0 col-sm-6">
                            <label class="label2">SELECCIONE RANGO INICIO</label>
                            <select style='width: 100%' class='form-control inputalta' class='selectpicker' id='inic' name='inic' type='text' data-live-search='true' onchange='certificadofin()'>
                              <option value=''>SELECIONE...</option>
                              <option value='0'>1</option>          
                            <option value='50' id="1ocul1" >50</option>          
                            <option value='100' id="2ocul2" >100</option>          
                            <option value='150' id="3ocul3" >150</option>          
                            <option value='200' id="4ocul4" >200</option>          
                            <option value='250' id="5ocul5" >250</option> 
                            <option value='300' id="6ocul6" >300</option> 
                            <option value='350' id="7ocul7" >350</option>
                            <option value='400' id="8ocul8" >400</option>           
                            <option value='450' id="9ocul9" >450</option>
                            <option value='500' id="10ocul10" >500</option>
                            <option value='550' id="11ocul11" >550</option>           
                            <option value='600' id="12ocul12" >600</option>
                            <option value='650' id="13ocul13" >650</option>
                            <option value='700' id="14ocul14" >700</option>
                            <option value='750' id="15ocul15" >750</option>
                            <option value='800' id="16ocul16" >800</option>   
                            </select>
                          </div>

                          <div class="col-sm-6">
                            <label class="label2" for="">RANGO FINAL</label>
                            <p style="text-align: center;"><input class="form-control" id="finc" name="finc" readonly="readonly"/> </p>
                          </div>
                        </div>

                        <div class="col-sm-5" style="margin-top: 1em">
                          <button type="input" class="btn btn-primary altaboton" style="font-size:14px; width:110px; height:35px">ACEPTAR</button>
                        </div>
                        <div class="col-sm-7" style="margin-top: 1em">
                          <button type="button" class="btn btn-primary altaboton" style=" float: right; font-size:14px; width:110px; height:35px" onclick="cerrar()" data-dismiss="modal">CERRAR</button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!-------------------------------------------------------------------------------->
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
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Create the tabs -->
              <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
<!--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
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
          <a href="javascript:void(0)" class="text-red pull-right"><i
            class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>

<script type="text/javascript">
  function constanciafin() {
    let valores = document.getElementById("certificadop").value;
    let inicio = document.getElementById("ini").value;
    ini = parseInt(inicio);           
    compara = ini + 49;
    if(valores<compara){
      resultado = valores;
    }else{
      resultado = ini+50;
    }
    $("#fin").val(resultado); 
  }

  function certificadofin(){

    let valores = document.getElementById("certificadopc").value;
    let inicio = document.getElementById("inic").value;
    ini = parseInt(inicio);           
    let compara = ini + 49;

    if(valores<compara){
      resultado = valores;
    }else{
      resultado = ini+50;
    }
    $("#finc").val(resultado);     
  }

</script>

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <!-- EDICION DEL TEMARIO -->

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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap.min.js"></script>
  <script>

    var dataSet = [
    <?php 
    $query = "SELECT
    *,
    DATE_FORMAT( r.fechareac, '%d/%m/%Y' ) AS reaccion
    FROM
    cursos c,
    personal p,
    reaccion r,
    listacursos l
    WHERE
    c.idinsp = p.gstIdper 
    AND c.id_curso = r.id_curso 
    AND c.idmstr = l.gstIdlsc 
    AND c.idinsp != c.idinst
    AND c.proceso = 'FINALIZADO' 
    AND c.confirmar = 'CONFIRMADO'
    AND l.gstProvd = 'INTERNO'
    AND c.evaluacion >= 80 
    AND c.estado = 0
    GROUP BY
    c.id_curso";
    $resultado = mysqli_query($conexion, $query);

    while($data = mysqli_fetch_array($resultado)){ 

      $idperson = $data['idinsp'];
      $idmstr = $data['idmstr'];
      $idcuro = $data['id_curso'];
      $codigo = $data['codigo'];
      $id_reac = $data['id_reac'];
      $fec_reac = $data['reaccion'];
      $idlist = $data['gstIdlsc'];
      $titulo = $data['gstTitlo'];
      $constancia = $data['codigo'];
      $id_persona = $data['gstIdper'];

      $encrypidpersona = base64_encode($id_persona);
      $encryidlist = base64_encode($idlist); 
      $encrycodigo = base64_encode($codigo);

  if ($data['fcurso'] >= '2022-11-01'||$data['codigo'] == 'FO358'||$data['codigo'] == 'FO366'||$data['codigo'] == 'FO404'){

  if($data['gstCntnc']=='CONSTANCIA'){ ?>


        ["<?php echo $id_reac ?>", 
        "<?php echo $data['gstNombr']." ".$data['gstApell']?>",
"<?php echo $titulo ?>",//TODO AQUI VA
"<?php echo "<a href='constancia.php?data={$encrypidpersona}&cod={$encryidlist}&fol={$encrycodigo} ' target='_blank' title='Dar clic para consultar' onclick='visualcon({$idcuro})'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></a><span><center><span  data-toggle='modal' data-target='#correcionModal' style='cursor: pointer;' onclick='perfil({$idcuro})' class='btn-info badge'>REALIZAR CORRECIÓN</center></span>" ?>",


"<?php echo $fec_reac ?>",
"<?php echo $codigo ?>"
],

<?php }else{?>

  ["<?php echo $id_reac ?>", 
  "<?php echo $data['gstNombr']." ".$data['gstApell']?>",
"<?php echo $titulo ?>",//TODO AQUI VA
"<?php echo "<a href='constancia7.php?data={$encrypidpersona}&cod={$encryidlist}&fol={$encrycodigo} ' target='_blank' title='Dar clic para consultar' onclick='visualcon({$idcuro})'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></a><span><center><span  data-toggle='modal' data-target='#correcionModal' style='cursor: pointer;' onclick='perfil({$idcuro})' class='btn-info badge'>REALIZAR CORRECIÓN</center></span>" ?>",


"<?php echo $fec_reac ?>",
"<?php echo $codigo ?>"
],
<?php } 
    }
  }  
?>

];

var tableGenerarReporte = $('#data-table-ponderacion').DataTable({
  "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
  },
  "order": [
  [0, 'desc']
  ],
  orderCellsTop: true,
  fixedHeader: true,
  data: dataSet,
  columns: [{
    title: "FOLIO"
  },
  {
    title: "PARTICIPANTE"
  },
  {
    title: "CURSO"
  },
  {
    title: "DOCUMENTO"
  },
  {
    title: "FECHA DE GENERACIÓN"
  },
  {
    title: "FOLIO DEL CURSO"
  }

  ]
});


var dataSet = [
<?php 
$query = "SELECT
*,
COUNT(c.codigo) as total,
DATE_FORMAT( c.fcurso, '%d/%m/%Y' ) AS fecha_curso,
DATE_FORMAT( r.fechareac, '%d/%m/%Y' ) AS reaccion
FROM
cursos c,
reaccion r,
listacursos l
WHERE
c.id_curso = r.id_curso 
AND c.idmstr = l.gstIdlsc   
AND c.idinsp != c.idinst
AND c.proceso = 'FINALIZADO' 
AND c.confirmar = 'CONFIRMADO'
AND l.gstProvd = 'INTERNO'
AND c.evaluacion >= 80 
AND c.estado = 0
GROUP BY c.codigo";
$resultado = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($resultado)){ 

  $idmstr = $data['idmstr'];
  $idcuro = $data['id_curso'];
  $codigo = $data['codigo'];
  $id_reac = $data['id_reac'];
  $fec_reac = $data['reaccion'];
  $idlist = $data['gstIdlsc'];
  $titulo = $data['gstTitlo'];
  $constancia = $data['codigo'];
  $fecha_curso = $data['fecha_curso'];

  $encrypidpersona = base64_encode($id_persona);
  $encryidlist = base64_encode($idlist); 
  $encrycodigo = base64_encode($codigo);

  $total_certificado = $data['total'];

  $folio = substr($codigo, 2);

  $datas = $folio.'.'.$total_certificado.'9';


  if ($data['fcurso'] >= '2022-11-01'||$data['codigo'] == 'FO358'||$data['codigo'] == 'FO366'||$data['codigo'] == 'FO404'){
  
  if($data['gstCntnc']=='CONSTANCIA'){ ?>


    ["<?php echo $codigo ?>", 
"<?php echo $titulo ?>",//TODO AQUI VA
"<?php echo $fecha_curso?>",
"<?php echo $total_certificado?>",
"<?php echo "<span><center><span  data-toggle='modal' data-target='#modal-constancia' style='cursor: pointer;' onclick='constancia({$datas})' class='btn-default badge'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></center></span>" ?>"

],

<?php }else{ ?>

  ["<?php echo $codigo ?>", 
"<?php echo $titulo ?>",//TODO AQUI VA
"<?php echo $fecha_curso?>",
"<?php echo $total_certificado?>",
"<?php echo "<span><center><span  data-toggle='modal' data-target='#modal-certificado' style='cursor: pointer;' onclick='certificado({$datas})' class='btn-default badge'><center><img src='../dist/img/constancias.svg' width='30px;' alt='pdf'></center></center></span>" ?>"

],
<?php } 
  }
}
?>

];

var tableGenerarReporte = $('#data-table-grupal').DataTable({
  "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
  },
  "order": [
  [0, 'desc']
  ],
  orderCellsTop: true,
  fixedHeader: true,
  data: dataSet,
  columns: [{
    title: "FOLIO DEL CURSO"
  },
  {
    title: "TITULO DEL CURSO"
  },
  {
    title: "FECHA INICIO"
  },
  {
    title: "TOTAL DE CONSTANCIAS"
  },
  {
    title: "CONSTANCIAS"
  }

  ]
});


</script>


<div class="control-sidebar-bg"></div>
</div>

<!-- CONFIRMACIÓN ENVIÓ DE INVITACIÓN A PARTICIPANTES-->
<form id="editarcons" action="" method="POST">
  <div class="modal fade" id='correcionModal' tabindex="-1" role="dialog" aria-labelledby="correcionModalLabel" aria-hidden="true">  
    <div class="modal2" style="width:750px;">
      <div id="success-icon">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div>
          <img class="img-circle1" src="../dist/img/lapiz.png">
        </div>
      </div>

      <h5 style="font-size: 20px;" class="modal-title" id="correcionModalLabel">CORRECIÓN DE CONSTANCIAS Y CERTIFICADOS</h5>
      <div class="modal-body" style="text-align:left; font-size:16px;">
        <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="!">!</span> SI REQUIERE HACER UN CAMBIO EN EL <u>NOMBRE DEL PARTICIPANTE</u> ES IMPORTANTE QUE ACUDA AL AREA DE <span style="font-weight: bold;">RECURSOS HUMANOS.</span><br><br>
        <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="!">!</span> TOME EN CUENTA QUE EL SISTEMA AUTOMATIZA LOS DATOS EN LA GENERACIÓN DE LA CONSTANCIA Y/O CERTIFICADOS POR LO QUE UNICAMENTE PUEDE REALIZAR CAMBIOS EN EL TEMARIO.<br><br>
        <div class="container-fluid">
          <div class="row">
            <div class="table-responsive">
              <div id="temariotab"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>

  </form>
  <!-- page script -->



</body>

</html>

<script>
  function perfil(id) {
    $.ajax({
      url: '../php/temario.php',
      type: 'POST'
    }).done(function(resp) {

      obj = JSON.parse(resp);
      var res = obj.data;
      var x = 0;
      html =
      '<table class="table table-bordered"><tr><th style="width: 10px">#</th><th>TITULO</th>';


      for (i = 0; i < res.length; i++) {
        x++;
        if (obj.data[i].idcurso == id) {
          html += "<tr><td>" + x + "</td><td style='width: 75%;'>" + obj.data[i].titulo + "</td></tr>";
        }
      }
      html += '</table>';
      $("#temariotab").html(html);
    })
  }

  function visualcon(idcur){
//alert(idcur);
var curso_id=idcur;
//alert(curso_id);

var datos= 'curso_id=' + curso_id + '&opcion=descarga';
// alert(datos);
$.ajax({
  type:'POST',
  url: '../php/visulcons.php',
  data:datos
}).done(function(respuesta) {
  if (respuesta==0){
// alert("funciono bien");

}else{
//alert("no funciona suerte");
}
})
}

function constancia(datas){

  let text = datas.toString();

// nemp = document.getElementById('nemp').value;
// idlista = text.split(".")[0];
let folio = text.split(".")[0];
let certificados = text.split(".")[1];
const certificado = certificados.slice(0,-1);
var datos= 'folio=' + folio;
$.ajax({
  url: '../php/consulta_curso.php',
  type: 'POST',
  data:datos
}).done(function(resp) {

  obj = JSON.parse(resp);
  var res = obj.data;
  var x = 0;
  $("#constanciasc #idlistap").val(obj.data[0].gstIdlsc);
  $("#constanciasc #foliop").val(obj.data[0].codigo);
  $("#constanciasc #coursetitle").val(obj.data[0].gstTitlo);
  $("#constanciasc #participantes").val(obj.data[0].tcurso);
  $("#constanciasc #certificadop").val(certificado);

  if(certificado<50){
    $("#mostrarselec1").hide();
  }else{
    $("#mostrarselec1").show();


// inicio = 0;
valor = certificado;
v = valor.substr(0,2);          
$("#ocul2").hide(); $("#ocul3").hide();  $("#ocul4").hide();  $("#ocul5").hide(); $("#ocul6").hide(); $("#ocul7").hide(); $("#ocul8").hide();$("#ocul9").hide(); $("#ocul10").hide(); $("#ocul11").hide(); $("#ocul12").hide();$("#ocul13").hide(); $("#ocul14").hide(); $("#ocul15").hide(); $("#ocul16").hide();

  if(v == 10 || v == 11 || v == 12 || v == 13 || v == 14){
    $("#ocul2").show();
  }
  if(v == 15 || v == 16 || v == 17 || v == 18 || v == 19){
    $("#ocul2").show();$("#ocul3").show();
  }
  if(v == 20 || v == 21 || v == 22 || v == 23 || v == 24){
    $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();
  }
  if(v == 25 || v == 26 || v == 27 || v == 28 || v == 29){
    $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();
  }
  if(v == 30 || v == 31 || v == 32 || v == 33 || v == 34){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();
  }
  if(v == 35 || v == 36 || v == 37 || v == 38 || v == 39){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();
  }
  if(v == 40 || v == 41 || v == 42 || v == 43 || v == 44){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();
  }
  if(v == 45 || v == 46 || v == 47 || v == 48 || v == 49){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();
  }
  if(v == 50 || v == 51 || v == 52 || v == 53 || v == 54){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();    
  }
  if(v == 55 || v == 56 || v == 57 || v == 58 || v == 59){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();        
  }
  if(v == 60 || v == 61 || v == 62 || v == 63 || v == 64){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();            
  }
  if(v == 65 || v == 66 || v == 67 || v == 68 || v == 69){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();$("#ocul13").show();
  }
  if(v == 70 || v == 71 || v == 72 || v == 73 || v == 74){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();$("#ocul13").show();$("#ocul14").show();    
  }
  if(v == 75 || v == 76 || v == 77 || v == 78 || v == 79){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();$("#ocul13").show();$("#ocul14").show();$("#ocul15").show();        
  }
    if(v == 80 || v == 81 || v == 82 || v == 83 || v == 84){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();$("#ocul13").show();$("#ocul14").show();$("#ocul15").show();$("#ocul16").show();        
    }
    if(v == 85 || v == 86 || v == 87 || v == 88 || v == 89){
   $("#ocul2").show();$("#ocul3").show();$("#ocul4").show();$("#ocul5").show();$("#ocul6").show();$("#ocul7").show();$("#ocul8").show();$("#ocul9").show();$("#ocul10").show();$("#ocul11").show();$("#ocul12").show();$("#ocul13").show();$("#ocul14").show();$("#ocul15").show();$("#ocul16").show();                  
    }
}
})
}

function certificado(datas){

  let text = datas.toString();

// nemp = document.getElementById('nemp').value;
// idlista = text.split(".")[0];
let folio = text.split(".")[0];
let certificados = text.split(".")[1];
const certificado = certificados.slice(0,-1);
var datos= 'folio=' + folio;
$.ajax({
  url: '../php/consulta_curso.php',
  type: 'POST',
  data:datos
}).done(function(resp) {

  obj = JSON.parse(resp);
  var res = obj.data;
  var x = 0;
  $("#certificadosc #idlistap").val(obj.data[0].gstIdlsc);
  $("#certificadosc #foliop").val(obj.data[0].codigo);
  $("#certificadosc #coursetitle").val(obj.data[0].gstTitlo);
  $("#certificadosc #participantes").val(obj.data[0].tcurso);
  $("#certificadosc #certificadopc").val(certificado);


  if(certificado<50){
    $("#mostrarselec2").hide();
  }else{
    $("#mostrarselec2").show();

    valor = certificado;
    v = valor.substr(0,2);          
$("#2ocul2").hide(); $("#3ocul3").hide();  $("#4ocul4").hide();$("#5ocul5").hide(); $("#6ocul6").hide(); $("#7ocul7").hide(); 
$("#8ocul8").hide();$("#9ocul9").hide(); $("#10ocul10").hide(); $("#11ocul11").hide(); $("#12ocul12").hide();$("#13ocul13").hide(); 
$("#14ocul14").hide(); $("#15ocul15").hide(); $("#16ocul16").hide();

  if(v == 10 || v == 11 || v == 12 || v == 13 || v == 14){
    $("#2ocul2").show();
  }
  if(v == 15 || v == 16 || v == 17 || v == 18 || v == 19){
    $("#2ocul2").show();$("#3ocul3").show();
  }
  if(v == 20 || v == 21 || v == 22 || v == 23 || v == 24){
    $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();
  }
  if(v == 25 || v == 26 || v == 27 || v == 28 || v == 29){
    $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();
  }
  if(v == 30 || v == 31 || v == 32 || v == 33 || v == 34){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();
  }
  if(v == 35 || v == 36 || v == 37 || v == 38 || v == 39){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();
  }
  if(v == 40 || v == 41 || v == 42 || v == 43 || v == 44){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();
  }
  if(v == 45 || v == 46 || v == 47 || v == 48 || v == 49){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();
  }
  if(v == 50 || v == 51 || v == 52 || v == 53 || v == 54){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();    
  }
  if(v == 55 || v == 56 || v == 57 || v == 58 || v == 59){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();        
  }
  if(v == 60 || v == 61 || v == 62 || v == 63 || v == 64){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();            
  }
  if(v == 65 || v == 66 || v == 67 || v == 68 || v == 69){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();$("#13ocul13").show();
  }
  if(v == 70 || v == 71 || v == 72 || v == 73 || v == 74){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();$("#13ocul13").show();$("#14ocul14").show();    
  }
  if(v == 75 || v == 76 || v == 77 || v == 78 || v == 79){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();$("#13ocul13").show();$("#14ocul14").show();$("#15ocul15").show();        
  }
    if(v == 80 || v == 81 || v == 82 || v == 83 || v == 84){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();$("#13ocul13").show();$("#14ocul14").show();$("#15ocul15").show();$("#16ocul16").show();        
    }
    if(v == 85 || v == 86 || v == 87 || v == 88 || v == 89){
   $("#2ocul2").show();$("#3ocul3").show();$("#4ocul4").show();$("#5ocul5").show();$("#6ocul6").show();$("#7ocul7").show();$("#8ocul8").show();$("#9ocul9").show();$("#10ocul10").show();$("#11ocul11").show();$("#12ocul12").show();$("#13ocul13").show();$("#14ocul14").show();$("#15ocul15").show();$("#16ocul16").show();                  
        }

  }
})
}


function cerrar(){
  $("#constanciasc #ini").val('');
  $("#constanciasc #fin").val('');

  $("#certificadosc #ini2").val('');
  $("#certificadosc #fin2").val('');
}

</script>