  <div class="modal fade" id="modal-evaluar">
          <div class="col-xs-12 .col-md-0"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EVALUAR</h4>
              </div>
              <div class="modal-body">
              <form>
              <div class="row">  
              <div id="evlacns"></div>



<div class="col-sm-12">
  <table id="evlacn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info">
    <thead>
      <tr>
        <th><i class="fa fa-sort-numeric-asc"></i>ID</th>
        <th><i></i>PARAMETROS</th>
        <th><i></i>OBJETIVO</th>
        <th style="width:5%"><i></i>ACTUAL</th>
        <th style="width:5%"><i></i>CUMPLIO</th>
        <th><i></i>COMENTARIOS</th>
        <th><i></i>EVALUADOR</th>
      </tr>
    </thead>
    <tbody>

<tr>
  <input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/>
  <td>1</td>
  <td>EXPERIENCIA EN TRASPORTE AÉREO</td>
  <td >5</td><td> 
  <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' >
    <option value='PE'></option>
    <option value='SI'>SI</option>
    <option value='NO'>NO</option>
  </select></td>
  <td>
    <span class='label label-warning' id='PE'>PENDIENTE</span> 
    <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> 
    <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span>
  </td>
  <td><input id='comntr' name='comntr[]'></td>
  <td><input id='eval' name='eval[]' value='1'></td>
</tr>    

<tr>
  <input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/>
  <td>2</td>
  <td>EXPERIENCIA CON LA GESTIÓN U OPERACIÓN DE AÉRONAVES COMERCIALES</td>
  <td >SI</td><td> 
  <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' >
    <option value='0'></option>
    <option value='SI'>SI</option>
    <option value='NO'>NO</option>
  </select></td>
  <td>
    <span class='label label-warning' id='PE'>PENDIENTE</span> 
    <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> 
    <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span>
  </td>
  <td><input id='comntr' name='comntr[]'></td>
  <td><input id='eval' name='eval[]' value='1'></td>
</tr>  

<tr>
  <input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/>
  <td>3</td>
  <td>CONOCIMIENTOS Y EXPERIENCIA EN METEOROLOGÍA</td>
  <td >SI</td><td> 
  <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' >
    <option value='0'></option>
    <option value='SI'>SI</option>
    <option value='NO'>NO</option>
  </select></td>
  <td>
    <span class='label label-warning' id='PE'>PENDIENTE</span> 
    <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> 
    <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span>
  </td>
  <td><input id='comntr' name='comntr[]'></td>
  <td><input id='eval' name='eval[]' value='1'></td>
</tr>  

<tr>
  <input type='hidden' name='gstIdprm[]' id='gstIdprm' value='"+obj.data[E].gstIdprm+"'/>
  <td>4</td>
  <td>CUALIDADES DE INICITAIVA, TACTO, TOLERANCIA Y PACÍENCIA</td>
  <td>SI</td><td> 
  <select style='width: 100%' id='actual' name='actual[]' onchange='seleccionado()' >
    <option value='0'></option>
    <option value='SI'>SI</option>
    <option value='NO'>NO</option>
  </select></td>
  <td>
    <span class='label label-warning' id='PE'>PENDIENTE</span> 
    <span class='label label-success' id='SI' style='display:none;'>CUMPLIO</span> 
    <span class='label label-danger' id='NO' style='display:none;'>NO CUMPLE</span>
  </td>
  <td><input id='comntr' name='comntr[]'></td>
  <td><input id='eval' name='eval[]' value='1'></td>
</tr>  
  </tbody></table></div>


              <div class="form-group" id="buton">
              <div class="col-sm-7">
              <button type="button" id="button" class="btn btn-info" onclick="evaluar();">ACEPTAR</button>
              </div>
              <b><p class="alert alert-success text-center padding exito" id="succe1">¡Se ha evaluado con éxito!</p></b>
              <b><p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar los datos que se solicitan </p></b>
              </div>
             </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>