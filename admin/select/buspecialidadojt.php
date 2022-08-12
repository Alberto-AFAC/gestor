<?php include ("../../conexion/conexion.php");

    
      $sql = "SELECT gstIdcat,gstCatgr,gstCsigl FROM categorias WHERE estado = 0 ORDER BY gstIdcat ASC";
      $cat = mysqli_query($conexion,$sql);
    ?>

			<select  id="isSpc2" class="form-control" class="selectpicker" name="isSpc2" type="text" data-live-search="true" style="width: 100%" >
			<option value="0">SELECIONE ESPECIALIDAD</option> 
			<?php while($idcat = mysqli_fetch_row($cat)):?>                      
			<option value="<?php echo $idcat[0]?>"><?php echo $idcat[1].' &#10143; '.$idcat[2]?></option>
			<?php endwhile; ?>

			</select>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#isSpc2').select2();

			$('#isSpc2').change(function(){
				
				var especialidas=document.getElementById('isSpc2').value;
				var ubic=document.getElementById('uboj').value;
				var ubicacion=document.getElementById('ubiojt');
				ubicacion.style.display="";
				
			    //alert(especialidas)
				$.ajax({
                    url: '../php/ojt_tareas.php',
                    type: 'POST'
                }).done(function(resp) {
                    obj = JSON.parse(resp);
                    var res = obj.data;
                    var n = 0;
                    html ='<div style="padding-top:5px;" class="col-md-12"><div class="nav-tabs-custom"><form id="Dtall" class="form-horizontal" action="" method="POST"><table width="100%" class="table table-striped table-hover center" ><thead><tr><th scope="col" style="width: 10%;">ID</th><th scope="col" style="width:650px">OJTS</th></th><th scope="col" style="">UBICACION</th><th scope="col" style="width:250px;">ACCIONES</th><th scope="col" style="display:none" >ID_REGISTRO</th></tr></thead><tbody>';
                    for (H = 0; H < res.length; H++) {
						if (obj.data[H].id_spc == especialidas && obj.data[H].idarea == ubicacion) {
                            var idojt = obj.data[H].id_ojt;
                            n++;
                            if (obj.data[H].ojt == 'SIN SUB TAREAS') {
                                html += '<tr><th scope="row">' + n + ')</th><td>' + obj.data[H].ojt_principal +'</td><td>' + obj.data[H].idarea +
                                '</td><td><a id="" type="button" title="Agregar tarea" class="asiste btn btn-default" data-toggle="modal" style="margin-left:2px" onclick="destarea()" data-target="#editartraprin"><i class="fa fa-plus"></i></a>'+
                                '</td><td style="display:none">' + obj.data[H].id_ojt; +'</td></tr>'
                            } else {
                                datos = obj.data[H].id_ojt + "*" + n;
                                html += '<tr><th scope="row">' + n + ')</th><td>' + obj.data[H].ojt_principal + '</td><td>' + obj.data[H].idarea +
                                '</td><td> <a title="Seleccionar las subtareas" class="label label-primary" style="font-weight: bold; height: 50px; font-size: 13px;"> +   SUB TAREAS</a>' +
                                '</td><td style="display:none">' + obj.data[H].id_ojt; +'</td></tr>'
                            }
                        }
					}
                    html += '</tbody></table></form></div></div>';
                    $("#tabtareas").html(html);
                    });
				    $.ajax({
					    type:"post",
					    data:'valor=' + $('#isSpc2').val(),
					    url:'session/',
					    success:function(r){
						    $('#tabSpcl').load('select/tablaSpcOJT.php');
					    }
				    });
			    });
		    });
	</script>
	

