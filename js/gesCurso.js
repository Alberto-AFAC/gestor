



/*function gesCurso(){
    $.ajax({
    url:'../php/gesCurso.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;


            html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="curso" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>Título</th><th><i></i>Tipo</th><th><i></i>Proceso</th><th><i></i>Observaciones</th><th><i></i>Evaluación</th></tr></thead><tbody>';
            for(ii=0; ii<res.length;ii++){
            x++;

            html +="<tr><td>"+x+"</td><td>"+obj.data[ii].gstTitlo+"</td><td>"+obj.data[ii].gstTipo+"</td><td>"+obj.data[ii].proceso+"</td><td>"+obj.data[ii].observ+"</td><td>"+obj.data[ii].evaluacion+"</td> </tr>";
        } 
        html +='</tbody></table></div></div></div>';
        $("#cursos").html(html);  
    })
}*/