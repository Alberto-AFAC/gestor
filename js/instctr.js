function insTctr() {
    //destroy:true,
    $.ajax({
        url: '../php/consulta.php',
        type: 'POST'
    }).done(function(resp) {
        obj = JSON.parse(resp);
        var res = obj.data;
        var x = 0;


        html = '<div class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="instctr" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> NOMBRE(S)</th><th><i></i> APELLIDO(S)</th><th><i></i> CATEGORÍA</th><th><i></i> CARGO</th><th style="width:5%" ><i></i>ACCIÓN</th></tr></thead><tbody>';
        for (i = 0; i < res.length; i++) {
            x++;

            gstIdper = obj.data[i].gstIdper + '*' + obj.data[i].gstIDCat + '*' + obj.data[i].gstEvalu;
            result = obj.data[i].gstIdper + '*' + obj.data[i].gstNombr + '*' + obj.data[i].gstIDCat;
            if (obj.data[i].gstCargo == 'INSTRUCTOR' || obj.data[i].gstCargo == 'COORDINADOR') {

                html += "<tr><td>" + obj.data[i].gstNmpld + "</td><td>" + obj.data[i].gstNombr + "</td><td>" + obj.data[i].gstApell + "</td><td>" + obj.data[i].gstCatgr + "</td><td>" + obj.data[i].gstCargo + "</td><td> <a href='javascript:openDtlls()' title='Perfil' onclick='inspector(" + '"' + gstIdper + '"' + ")' class='datos btn btn-default'><i class='glyphicon glyphicon-user text-success'></i></a> </td></tr>";
            } else {}
        }
        html += '</tbody></table></div></div></div>';
        $("#instctrs").html(html);
    })
}