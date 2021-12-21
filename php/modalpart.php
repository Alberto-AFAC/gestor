<div class="modal-body">
    <form class="form-horizontal" id="Prtcpnt">
        <input type="hidden" name="acodigos" id="acodigos">
        <input type="hidden" class="form-control" id="gstIdlsc" name="gstIdlsc">
        <div class="form-group">
            <div class="col-sm-6">
                <label>TÍTULO</label>
                <input type="text" onkeyup="mayus(this);" class="form-control" id="gstTitlo" name="gstTitlo"
                    disabled="">
            </div>
            <div class="col-sm-3">
                <label>INICIO</label>
                <input type="data" onkeyup="mayus(this);" class="form-control" id="finicio" name="finicio" disabled="">
            </div>
            <div class="col-sm-3">
                <label>DURACIÓN</label>
                <input type="text" onkeyup="mayus(this);" class="form-control" id="gstDrcin" name="gstDrcin"
                    disabled="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label>PARTICIPANTE</label>
                <select class="form-control" id="idinsp" name="idinsp" style="width: 100%;">
                    <option value="">ELIJA PARTICIPANTE PARA ASISTIR AL
                        CURSO </option>
                    <?php while($inspectors = mysqli_fetch_row($inspector)):?>
                    <option value="<?php echo $inspectors[0]?>">
                        <?php echo $inspectors[1].' '.$inspectors[2].' ('.$inspectors[3].' '.$inspectors[4].')'?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="hrcurs" id="hrcurs">
        <input type="hidden" name="finalf" id="finalf">
        <input type="hidden" name="idcord" id="idcord">
        <input type="hidden" name="idntrc" id="idntrc">
        <input type="hidden" name="sede" id="sede">
        <input type="hidden" name="linke" id="linke">
        <input type="hidden" name="modalidad" id="modalidad">
        <input type="hidden" name="contracceso" id="contracceso">
        <input type="hidden" name="classroom" id="classroom">
        <div class="form-group">
            <div class="col-sm-5">
                <button type="button" id="buttons" class="btn btn-info" onclick="agrPartc();">ACEPTAR</button>
            </div>
            <b>
                <p class="alert alert-info text-center padding error" id="danger">El participante ya está agregado </p>
            </b>
            <b>
                <p class="alert alert-success text-center padding exito" id="succe">¡Se agregó el participante con
                    éxito!</p>
            </b>
            <b>
                <p class="alert alert-warning text-center padding aviso" id="empty">Elija participante </p>
            </b>
        </div>
    </form>
</div>

<script type="text/javascript">
function agrinspctor(tbody, table) {

    $(tbody).on("click", "a.asiste", function() {
        var data = table.row($(this).parents("tr")).data();

        $("#Prtcpnt #gstIdlsc").val(data[15]);
        $("#Prtcpnt #acodigos").val(data[9]);
        $("#Prtcpnt #gstTitlo").val(data[1]);
        $("#Prtcpnt #finicio").val(data[3]);
        $("#Prtcpnt #gstDrcin").val(data[10]);

        $("#Prtcpnt #hrcurs").val(data[17]);
        $("#Prtcpnt #finalf").val(data[5]);
        $("#Prtcpnt #idcord").val(data[21]);
        $("#Prtcpnt #idntrc").val(data[16]);
        $("#Prtcpnt #sede").val(data[12]);
        $("#Prtcpnt #linke").val(data[13]);
        $("#Prtcpnt #modalidad").val(data[14]);
        $("#Prtcpnt #contracceso").val(data[19]);
        $("#Prtcpnt #classroom").val(data[20]);

        if (data[18] == 'FINALIZADO' || data[18] == 'VENCIDO') {
            $("#buttons").hide();
        } else {
            $("#buttons").show();
        }


    });
}
</script>