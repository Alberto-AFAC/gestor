
function insTctr(){
    //destroy:true,
    $.ajax({
    url:'../php/conPerson.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="instctr" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th style="width:14%" ><i></i>ACCIÓN</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;

            if(obj.data[i].gstCargo=='INSTRUCTOR'){
            html +="<tr><td>"+x+"</td><td>"+obj.data[i].gstNombr+"</td><td>"+obj.data[i].gstApell+"</td><td> <a href='javascript:openDtlls()' onclick='inspector("+'"'+obj.data[i].gstIdper+'"'+")' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> <a type='button' onclick='estudio("+'"'+obj.data[i].gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-estudio'><i class='fa fa-graduation-cap text-info'></i></a> <a type='button' onclick='profesion("+'"'+obj.data[i].gstIdper+'"'+")' class='btn btn-default' data-toggle='modal' data-target='#modal-profesion'><i class='fa fa-suitcase text-info'></i></a></td></tr>";
            }else{}
        } 
        html +='</tbody></table></div></div></div>';
        $("#instctrs").html(html);  
    })          
}